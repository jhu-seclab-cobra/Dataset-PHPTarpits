# PHPTarpits — concept

## 1. Context

**Problem Statement**

A static taint analyzer for PHP is judged by the flows it finds and the calls it resolves. The upstream benchmark [@kassar_testability_2022] supplies code patterns that trap such analyzers, but no expected analysis result and no cases for modern PHP language features. PHPTarpits supplies both: a labeled ground truth for each case, and a case for every non-structural node type of the PHP 8 syntax tree.

**System Role**

PHPTarpits is the benchmark dataset against which the flows and call edges a PHP taint analyzer reports are scored. It accompanies the analyzer paper [@xu_cobra_2026].

**Data Flow**

- **Inputs:** the pattern code of the upstream benchmark; the node types of PHP-Parser [@php-parser]; the repositories of PHPCVEs [@phpcves].
- **Outputs:** cases with ground truth (call edges, true positives, false positives) and construct usage per case.
- **Connections:** [upstream patterns; PHP-Parser node types; PHPCVEs] → [PHPTarpits] → [analyzer evaluation]

**Scope Boundaries**

- **Owned:** case curation; ground truth annotation; construct usage per case; consistency of the files ([model.md](model.md)).
- **Not Owned:** the analyzer under evaluation; scoring and reporting beyond the README example; the PHPCVEs corpus.

## 2. Concepts

**Conceptual Diagram**

```text
upstream patterns ──(corrected, labeled)──────────▶ cases under patterns/ ─┐
PHP-Parser node types ──(one case or variants)────▶ cases under extends/ ──┼─▶ ground truth ─▶ analyzer scoring
PHPCVEs repositories ──(count rarest construct)───▶ construct usage ───────┘
```

**Core Concepts**

- **Name:** [Tarpit](glossary-ground-truth.md#tarpit)
  - **Role:** names what a case under `patterns/` is built around, so that the dataset keeps the upstream benchmark's vocabulary.
  - **Scope:** a code pattern that traps a class of static analysis tools; a case under `extends/` exercises a node type instead.
  - **Relationships:** a case holds one tarpit or one construct; its ground truth says how an analyzer should fare on it.
- **Name:** [Case](glossary-ground-truth.md#case) and [variant](glossary-ground-truth.md#variant)
  - **Role:** the unit of analysis and of scoring; cases are independent, so a flow never crosses into another case.
  - **Scope:** a directory of PHP files with its `meta.json`; a node type with several syntactic forms has one variant per form.
  - **Relationships:** a case has one [ground truth](glossary-ground-truth.md#ground-truth) and one [construct usage](glossary-usage.md#construct-usage).
- **Name:** [Source](glossary-ground-truth.md#source), [sink](glossary-ground-truth.md#sink) and [taint flow](glossary-ground-truth.md#taint-flow)
  - **Role:** define what a [taint analysis](glossary-ground-truth.md#taint-analysis) must find.
  - **Scope:** a source is attacker-controlled input, a sink an operation that makes it a vulnerability, a flow the path between them in one execution.
  - **Relationships:** a pair of a source and a sink is a true positive or a false positive.
- **Name:** [True positive](glossary-ground-truth.md#true-positive) and [false positive](glossary-ground-truth.md#false-positive)
  - **Role:** the scoring labels; reporting a true positive earns [recall](glossary-ground-truth.md#recall), reporting a false positive costs [precision](glossary-ground-truth.md#precision).
  - **Scope:** a pair carries a [vulnerability type](glossary-ground-truth.md#vulnerability-type); a false positive is a pair that an imprecise analyzer might report.
  - **Relationships:** true positives and false positives never share a pair in one case.
- **Name:** [Call edge](glossary-ground-truth.md#call-edge)
  - **Role:** the expected callee of each call, which an analyzer needs to follow flows across function boundaries.
  - **Scope:** a callsite, a [callee](glossary-ground-truth.md#callee) and a [call edge type](glossary-ground-truth.md#call-edge-type): `STATIC`, `DYNAMIC` or `SUSPICIOUS`.
  - **Relationships:** a flow through a call needs the call edge that carries it.
- **Name:** [Construct usage](glossary-usage.md#construct-usage)
  - **Role:** weights a case by how common its syntax is in real vulnerable projects, so a missed case can be ranked by real-world relevance.
  - **Scope:** the share of PHPCVEs repositories that contain the case's [rarest construct](glossary-usage.md#rarest-construct).
  - **Relationships:** it derives from the [defining constructs](glossary-usage.md#defining-construct) of the case.

## 3. Contracts & Flow

**Data Contracts**

- **With an analyzer evaluator:** the evaluator runs the analyzer on a case directory and compares the pairs it reports with the true positives (recall) and the false positives (precision). The call edges give the expected callee of each callsite. The README shows the comparison.
- **With the upstream benchmark:** the cases under `patterns/` derive from its patterns. This dataset adds the ground truth and corrects the syntax for PHP 8; the cases under `extends/` are new. Attribution and changes: [THIRD_PARTY_NOTICES.md](THIRD_PARTY_NOTICES.md).
- **With PHPCVEs:** its repositories are the corpus in which constructs are counted.

**Internal Processing Flow** — the counting of construct usage is owned by the README section "How Usage Is Counted". The semantics of the ground truth are owned by [model.md](model.md).

## 4. Scenarios

- **Typical:** in `patterns/02_global_variables`, `$_GET["p1"]` (line 10) is passed to `F`, which stores it in a global that line 13 echoes. The call edge at line 11 is `STATIC` and the pair from line 10 to line 13 is a true positive.
- **Boundary:** in `extends/Stmt_If`, `callee` echoes `$data1` when `$cond` holds and `$data2` otherwise. The safe value is always the first argument, so the pair from the source to `echo $data1` is a false positive and the pair to `echo $data2` is a true positive.
- **Boundary:** in `patterns/76_function_variable`, `$func = "F"; $func($b);` calls `F` through a variable. The call edge is `DYNAMIC` with callee `unknown@Stretch`, and the flow from `$b` to the `echo` inside `F` is a true positive.
- **Interaction:** the two files of `patterns/76_function_variable` do not include each other, so the source of one file paired with the sink of the other is a false positive.
- **Interaction:** in `extends/Expr_Eval`, code passed to `eval` is represented by an [eval file](glossary-ground-truth.md#eval-file). The call edge from the `eval` callsite to it is `STATIC`, and the flow from `$_GET` to the `echo` in it is a true positive.
