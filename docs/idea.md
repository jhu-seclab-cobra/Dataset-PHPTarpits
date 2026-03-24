# PHPTarpits: Taint Analysis Benchmark Dataset

## 1. Context

**Problem Statement**

Static taint analysis for PHP lacks a comprehensive, precisely annotated benchmark that covers both classic vulnerability patterns and modern PHP 8+ language features. Existing benchmarks (e.g., TestabilityTarpits) provide foundational test cases but suffer from limited pattern coverage, missing call graph data, and incomplete edge-case handling. PHPTarpits addresses this gap by providing a curated, verified dataset with fine-grained ground truth for evaluating PHP static analyzers.

**System Role**

PHPTarpits serves as the ground truth benchmark dataset for evaluating the precision and recall of PHP taint analysis engines within the Cobra static analysis framework.

**Data Flow**
- **Inputs:** PHP source code snippets organized as self-contained test cases
- **Outputs:** Ground truth annotations (call edges, true positives, false positives) consumed by analysis evaluators
- **Connections:** [PHP Source Patterns] → [PHPTarpits Benchmark] → [Cobra Analyzer Evaluation]

**Scope Boundaries**
- **Owned:** Test case curation, vulnerability annotation, call graph ground truth, dataset structural integrity
- **Not Owned:** Static analysis engine implementation, vulnerability detection algorithms, analysis scoring/reporting

---

## 2. Concepts

**Conceptual Diagram**
```
PHPTarpits Dataset
├── patterns/                        (96 cases - Classic PHP patterns)
│   └── {id}_{name}/
│       ├── *.php                    (Source code)
│       └── .tarpit.meta.json        (Ground truth)
│
├── extends/                         (158 cases - PHP-Parser AST node types)
│   ├── Expr_FuncCall/               (Multi-case: function call variants)
│   │   ├── func_norm/
│   │   ├── str_callee/
│   │   └── ...
│   ├── Expr_MethodCall/             (Multi-case: method call variants)
│   │   ├── meth_norm/
│   │   └── ...
│   ├── Expr_Assign/                 (Single-case: direct files)
│   │   ├── main.php
│   │   └── .tarpit.meta.json
│   ├── Stmt_If/                     (Single-case)
│   ├── Scalar_String/               (Single-case)
│   └── ...                          (137 AST node type directories total)
│
└── truth.json                       (Consolidated ground truth)
```

**Core Concepts**

- **Test Case.** A self-contained directory containing one or more PHP source files and a `.tarpit.meta.json` annotation file. Each test case isolates a specific PHP language feature or vulnerability pattern. Test cases are independent — taint flows within one case never cross into another.

- **Taint Source.** A code location where untrusted user input enters the program. In this dataset, sources are primarily PHP superglobals (`$_GET`, `$_POST`, `$_REQUEST`, `$_COOKIE`, `$_SESSION`, `$_SERVER`, `$_FILES`). Each source is identified by `file:line` notation.

- **Taint Sink.** A code location where data is consumed in a security-sensitive operation. Sink types are categorized by vulnerability class: `echo`/`print` for XSS (type 79), `query`/`exec` for SQLi (type 89), `system`/`exec` for command injection (type 77), `include`/`require` for file inclusion (type 78), and `unlink` for file deletion (type 434).

- **True Positive (TP).** A source-to-sink data flow that represents a real, exploitable vulnerability. An ideal analyzer must detect this flow. Each TP is annotated with vulnerability type, source location, and sink location.

- **False Positive (FP).** A source-to-sink pair that an imprecise analyzer might incorrectly flag as a vulnerability. The flow either does not exist at runtime (due to control flow conditions, variable scoping, or type constraints) or the sink consumes only safe data. FPs serve as precision tests — an ideal analyzer should not report them.

- **Call Edge.** A function/method invocation relationship between a callsite and a callee. Each edge is classified by resolvability: **STATIC** (target fully determined at analysis time), **DYNAMIC** (target depends on runtime values, e.g., `$func()`, `new $class()`), or **SUSPICIOUS** (target ambiguous, potentially unresolvable). Call edges form the interprocedural call graph that an analyzer must construct to track taint across function boundaries.

- **Callee Reference.** The target of a call edge, encoded as `name@location`. User-defined callees use `func@file:line` (e.g., `F@main.php:3`). Built-in callees use `func@Builtin[module]` (e.g., `echo@Builtin[keyword]`). Unresolvable dynamic targets use `unknown@Stretch`.

- **Vulnerability Type.** A numeric identifier classifying the security impact of a taint flow. The dataset covers type 79 (XSS, 97.3% of cases), type 89 (SQL injection), type 77 (command injection), type 78 (file inclusion), type 94 (variable manipulation), and type 434 (file deletion).

---

## 3. Contracts & Flow

**Data Contracts**

- **With Cobra Analyzer:** Each `.tarpit.meta.json` provides the expected analysis output. The analyzer produces detected flows; the evaluator compares them against TPs (for recall) and FPs (for precision). The `call_edges` field provides the expected call graph for interprocedural analysis validation.

- **With TestabilityTarpits (upstream):** The `patterns/` directory is derived from the 96 PHP testability patterns published in the [TestabilityTarpits](https://github.com/enferas/TestabilityTarpits) repository (Al Kassar et al., NDSS 2022). The original test cases provide PHP source code and tool measurement data; PHPTarpits adds `.tarpit.meta.json` ground truth annotations (call edges, true positives, false positives) and applies syntax corrections for PHP 8+ compatibility. The `extends/` directory is entirely new, created independently to cover modern PHP language features not present in the original benchmark. See `docs/THIRD_PARTY_NOTICES.md` for full attribution.

**Ground Truth Format**

Each `.tarpit.meta.json` follows a strict schema:
- `name` — relative path identifier for the test case
- `call_edges[]` — list of `{type, callsite, callee}` describing the call graph
- `true_positives[]` — list of `{type, source, sink}` representing real vulnerabilities
- `false_positives[]` — list of `{type, source, sink}` representing non-vulnerabilities

Invariants enforced:
1. No entry appears in both `true_positives` and `false_positives`
2. No duplicate entries within either list
3. All `file:line` references point to existing files with valid line numbers
4. All sources reference lines containing taint source expressions
5. All sinks reference lines containing security-sensitive operations
6. All call edge callsites reference actual call expressions (not definitions)

**Internal Processing Flow**

1. **Case Isolation** - Each test case directory is treated as an independent analysis unit with its own file scope
2. **Source Identification** - Locate all superglobal reads (`$_GET`, `$_POST`, etc.) as taint entry points
3. **Call Graph Construction** - Resolve function/method calls to build interprocedural edges; classify as STATIC, DYNAMIC, or SUSPICIOUS
4. **Taint Propagation** - Track data flow from sources through assignments, function parameters, return values, and object properties to potential sinks
5. **Flow Classification** - Each reachable source-sink pair is classified as TP (real vulnerability) or FP (false alarm) based on runtime semantics

---

## 4. Scenarios

**Typical: Direct taint flow through function call**

Source `$_GET["p1"]` is passed as argument to a user-defined function containing `echo $param`. The call edge is STATIC (target known), the source-sink pair is a TP (type 79 XSS), and any cross-file flow from a different `$_GET` to the same `echo` is an FP.

**Boundary: Control-flow-sensitive false positive**

A function receives tainted data as `$data` and a boolean condition `$cond`. The `echo $data` statement is guarded by `if (!$cond)`, but the callsite always passes `$cond = true`. A path-insensitive analyzer flags the flow as vulnerable (reporting `echo $data` as reachable), but the condition guarantees the tainted branch is never executed. This pair is classified as FP.

**Boundary: Dynamic dispatch through variable**

Code like `$func = $_GET["p2"]; $func($b);` creates a DYNAMIC call edge with callee `unknown@Stretch`. The analyzer cannot statically resolve the target function. The taint flow from `$_GET["p1"]` through the dynamic call to an `echo` inside the resolved function is a TP, while any flow to sinks in unrelated functions is an FP.

**Interaction: Cross-file include with session taint**

In a multi-file test case, `second_ex_a.php` writes `$_GET["p1"]` to `$_SESSION["data"]` then includes `second_ex_b.php`, which echoes `$_SESSION["data"]`. The call edge is `include@Builtin[keyword]`. The source in file A flowing to the sink in file B through the session superglobal is a TP. A flow from file A's source to a sink in an unrelated file C is an FP.

**Interaction: Eval-generated code**

A test case uses `eval()` to define a function containing `echo $data`. The eval-generated code is represented by a virtual file path (`.eval/site_hash/content_hash.php`). The call edge from the eval callsite to the virtual file is STATIC. The taint flow from `$_GET` through `eval` to the echo in virtual code is a TP.
