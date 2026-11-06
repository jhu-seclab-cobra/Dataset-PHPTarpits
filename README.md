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

Each case directory holds `main.php` (plus any files it includes) and `meta.json`; the analyzer runs on the case directory.

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

`cve_usage` weighs a case by how common its syntax is in the [PHPCVEs](https://github.com/jhu-seclab-cobra/Dataset-PHPCVEs) corpus (release v2025.03): 258 CVE snapshots from 130 GitHub repositories, each repository counted once through its snapshot with the highest CVE id, own code only (`vendor/` and `node_modules/` excluded), parsed with PHP-Parser 5.4.

| Field | Content |
|---|---|
| `defining_constructs` | Each construct the case exercises, with the number of repositories (of 130) containing it |
| `rarest_construct` | The defining construct found in the fewest repositories; it gives the case's usage |
| `repositories`, `repositories_percent` | Repositories containing the rarest construct |
| `occurrences` | Its total nodes in the 130 repositories |
| `snapshots` | CVE snapshots (of 258) containing it |

- A construct is a node type, a `Kind[field=value]` variant (by-reference, variadic or unpacked forms, expression names and callees, include types), `func:<name>` for a builtin function call, or `magic:<name>` for a declared magic method.
- An `extends/` case's defining construct is its node type, refined by its variant where the variant differs in syntax. A `patterns/` case's defining constructs are all constructs beyond `<?php $x = $_GET["a"]; echo $x;`, so an incidental construct can be its rarest one.

## Citation

If you use PHPTarpits, please cite the paper it accompanies:

```bibtex
@misc{citation_placeholder,
  title = {{TODO: paper title — not yet released}},
  author = {{TODO: authors}},
  year = {{TODO}},
  note = {Paper not yet released. Citation entry will be updated on publication.}
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

## License

TODO: license not yet chosen; no `LICENSE` file exists. Third-party terms for `patterns/`: [`docs/THIRD_PARTY_NOTICES.md`](docs/THIRD_PARTY_NOTICES.md).
