# PHPTarpits

> A tarpit is a code pattern that traps static analyzers, after [Testability Tarpits](https://github.com/enferas/TestabilityTarpits) (Al Kassar et al., NDSS 2022).

Labeled PHP taint-analysis benchmark: 259 cases covering every non-structural PHP 8 AST node type.

## Install

```bash
git clone https://github.com/jhu-seclab-cobra/Dataset-PHPTarpits.git
```

## Usage

Score an analyzer's reported source-to-sink pairs against the ground truth:

```python
import json

truth = json.load(open("truth.json"))
reported = {("extends/Expr_Array", "main.php:3", "main.php:8")}  # (case, source, sink) from your analyzer

tp = fp = 0
for case in truth:
    for f in case["true_positives"]:
        tp += (case["name"], f["source"], f["sink"]) in reported
    for f in case["false_positives"]:
        fp += (case["name"], f["source"], f["sink"]) in reported
total_tp = sum(len(c["true_positives"]) for c in truth)
print(f"recall {tp}/{total_tp}, false positives reported {fp}")
```

Each case directory holds its PHP files (usually `main.php` and any files it includes) and `meta.json`; the analyzer runs on the case directory. The terms used here are defined in [`docs/glossary.md`](docs/glossary.md).

## Dataset

| Directory | Organized by | Cases | True positives | False positives | Call edges |
|---|---|---|---|---|---|
| `extends/` | [PHP-Parser](https://github.com/nikic/PHP-Parser) node type (`Expr_*`, `Stmt_*`, `Scalar_*`) | 163 | 666 | 644 | 1,677 |
| `patterns/` | analysis challenge, from [TestabilityTarpits](https://github.com/enferas/TestabilityTarpits) | 96 | 117 | 410 | 341 |
| Total | | 259 | 783 | 1,054 | 2,018 |

- `extends/` covers all 142 non-structural AST node types of PHP 8+. A node type with several variants has one subdirectory per variant, e.g. `extends/Expr_FuncCall/str_callee`.
- `patterns/` keeps the 96 PHP patterns of TestabilityTarpits, corrected to PHP 8 syntax and labeled, e.g. `patterns/02_global_variables`. Changes are listed in [`docs/THIRD_PARTY_NOTICES.md`](docs/THIRD_PARTY_NOTICES.md).

## Format

`truth.json` is a list with one entry per case; the case's `meta.json` holds the same entry plus `cve_usage`.

| Field | Content |
|---|---|
| `name` | Case path, e.g. `patterns/02_global_variables` or `extends/Expr_MethodCall/meth_norm` |
| `call_edges[]` | `type` (`STATIC`, `DYNAMIC` or `SUSPICIOUS`), `callsite` (`file:line`), `callee` (`name@file:line` or `name@Builtin[kind]`) |
| `true_positives[]` | Real flows: `type` ([CWE](https://cwe.mitre.org/) id, e.g. `79`), `source` (`file:line`), `sink` (`file:line`) |
| `false_positives[]` | Source-to-sink pairs with no real flow, same fields |
| `cve_usage` | `meta.json` only: how often the case's syntax occurs in real vulnerable projects (below) |

```json
{
  "name": "patterns/02_global_variables",
  "call_edges": [{"type": "STATIC", "callsite": "main.php:11", "callee": "F@main.php:3"}],
  "true_positives": [{"type": 79, "source": "main.php:10", "sink": "main.php:13"}],
  "false_positives": [{"type": 79, "source": "main.php:10", "sink": "main.php:12"}]
}
```

## Construct Usage

`cve_usage` weighs a case by how common its syntax is in real vulnerable PHP applications, measured on the [PHPCVEs](https://github.com/jhu-seclab-cobra/Dataset-PHPCVEs) dataset (release v2025.03). A case's usage is the share of the 130 PHPCVEs repositories that contain its rarest defining construct.

| Repositories containing the case's rarest construct | Cases | True positives | False positives |
|---|---|---|---|
| ≥ 50% | 164 | 526 | 628 |
| 10–50% | 73 | 210 | 381 |
| above 0, below 10% | 18 | 34 | 35 |
| 0 | 4 | 13 | 10 |
| Total | 259 | 783 | 1,054 |

Weighting each true positive by its case's share gives 466.6 of 783.

Cases found in fewer than 10% of the repositories (repositories of 130):

| Repositories | Cases (rarest construct) |
|---|---|
| 0 | `Expr_AssignOp_Pow`, `Expr_FuncCall/str_callee` (`Expr_FuncCall[callee=Scalar_String]`), `Stmt_HaltCompiler`, `patterns/19_closures` (`Expr_FuncCall[callee=Expr_FuncCall]`) |
| 1 | `Scalar_MagicConst_Trait`, `patterns/77_object_callable` (`Expr_FuncCall[callee=Expr_Array]`) |
| 3 | `Expr_YieldFrom`, `Stmt_Enum`, `Stmt_EnumCase`, `Stmt_GroupUse` |
| 4–8 | `Expr_NullsafePropertyFetch`, `Expr_Match`, `Expr_NullsafeMethodCall`, `patterns/67_odbc` (`func:odbc_connect`), `Stmt_Goto`, `Stmt_Label`, `patterns/55_goto` (`Stmt_Label`) |
| 10–12 | `Expr_AssignOp_Coalesce`, `patterns/37_callstatic_overloading` (`magic:__callstatic`), `Expr_BinaryOp_Spaceship`, `Expr_Yield`, `patterns/54_generators` (`Expr_Yield`) |

| Field | Content |
|---|---|
| `defining_constructs` | Each construct the case exercises, with the number of repositories (of 130) containing it |
| `rarest_construct` | The defining construct found in the fewest repositories; it gives the case's usage |
| `repositories`, `repositories_percent` | Repositories containing the rarest construct |
| `occurrences` | Its total nodes in the 130 repositories |
| `snapshots` | CVE snapshots (of 258) containing it |

## How Usage Is Counted

1. **Projects.** PHPCVEs v2025.03 holds 258 CVE snapshots from 130 GitHub repositories (one repository, phpMyFAQ, has 57). Each repository counts once, through its snapshot with the highest CVE id, so a repository with many CVEs does not dominate. Only the repository's own code is counted: files under `vendor/` and `node_modules/` are excluded.
2. **Parsing.** Every `.php`, `.inc` and `.phtml` file (264,011 in all snapshots) is parsed with [PHP-Parser](https://github.com/nikic/PHP-Parser) 5.4 for the newest PHP version, and retried with the PHP 5.6 grammar on a syntax error; 358 files parse only with the PHP 5.6 grammar, and 83 fail both, mostly truncated files in four 2013 snapshots.
3. **Constructs.** Each file contributes every node type it contains (`Node::getType()`), plus these variants:
   - `Kind[byRef]`, `Kind[variadic]`, `Kind[unpack]` when that flag is set;
   - `Kind[name=Expr]`, `Kind[class=Expr]` when the name or class is an expression (`$$v`, `$o->$m()`, `new $c`);
   - `Expr_FuncCall[callee=Kind]` for a call whose callee is an expression, and `func:<name>` for a call by name;
   - `Expr_Include[type=…]` for `include`, `include_once`, `require` and `require_once`;
   - `Stmt_Function[nested]` for a function declared inside a function;
   - `magic:<name>` for a declared magic method.
4. **Defining constructs of a case.**
   - An `extends/` case: the node type its directory names, refined by the variant where the variant differs in syntax (`str_callee` → `Expr_FuncCall[callee=Scalar_String]`, `str_param_*` → `Expr_FuncCall[callee=Expr_Variable]`, `func_nest_defs` → `Stmt_Function[nested]`). Three cases contain a different construct than their directory names, and that construct is counted: `Stmt_Throw` → `Expr_Throw`, `Expr_Cast_Unset` → `Stmt_Unset`, `Stmt_Nop` → `Stmt_While`.
   - A `patterns/` case: every construct its files contain beyond the baseline program `<?php $x = $_GET["a"]; echo $x;`, excluding wrapper nodes with no syntax of their own (names, identifiers, arguments, parameters, array items) and calls to functions that are not PHP builtins. An incidental construct can therefore be a `patterns/` case's rarest one: `19_closures` scores 0 because of the chained call `$fn1("safe")($b)`.
5. **Usage.** The rarest defining construct (fewest repositories, then fewest occurrences) gives the case's `repositories`, `occurrences` and `snapshots`.

[`tools/cve-usage/`](tools/cve-usage/README.md) reproduces these counts from a PHPCVEs checkout, and its `--write-meta` flag rewrites every `cve_usage` field:

```bash
cd tools/cve-usage
composer install
python3 run.py --tarpits ../.. --cves /path/to/PHPCVEs --out /path/to/out --write-meta
```

## Citation

If you use PHPTarpits, please cite the paper it accompanies:

```bibtex
@inproceedings{xu_cobra_2026,
  title = {{CoBrA}: Context-, Branch-sensitive Static Analysis for Detecting Taint-style Vulnerabilities in {PHP} Web Applications},
  author = {Xu, Yichao and Kang, Mingqing and Thimmaiah, Neil and Gjomemo, Rigel and Venkatakrishnan, V. N. and Cao, Yinzhi},
  booktitle = {Proceedings of the IEEE/ACM 48th International Conference on Software Engineering (ICSE)},
  publisher = {ACM},
  pages = {1943--1954},
  year = {2026},
  doi = {10.1145/3744916.3773195}
}
```

The `patterns/` cases derive from TestabilityTarpits; please also cite:

```bibtex
@inproceedings{alkassar2022testability,
  title = {Testability Tarpits: the Impact of Code Patterns on the Security Testing of Web Applications},
  author = {Al Kassar, Feras and Clerici, Giulia and Compagna, Luca and Balzarotti, Davide and Yamaguchi, Fabian},
  booktitle = {Proceedings of the Network and Distributed System Security Symposium (NDSS)},
  publisher = {Internet Society},
  year = {2022},
  doi = {10.14722/ndss.2022.24150}
}
```

The usage counts in `cve_usage` come from PHPCVEs; please cite it when you use them:

```bibtex
@misc{phpcves,
  title = {{PHPCVEs}: {PHP} Web Applications with Taint-Style {CVEs}},
  author = {{jhu-seclab-cobra}},
  year = {2025},
  version = {v2025.03},
  howpublished = {\url{https://github.com/jhu-seclab-cobra/Dataset-PHPCVEs/releases/tag/v2025.03}}
}
```

## License

[GPL-2.0](LICENSE). Third-party terms for `patterns/`: [`docs/THIRD_PARTY_NOTICES.md`](docs/THIRD_PARTY_NOTICES.md).
