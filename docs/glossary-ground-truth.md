# Glossary: cases and ground truth

## Cases

### Tarpit
- **Definition:** A code pattern known to cause problems for a class of static analysis tools.
- **Example:** `$f = "F"; $f($b);` → the variable function call, a tarpit because the callee is not named in the code.
- **Source:** `README.md` "PHPTarpits"
- **Literature:** [@kassar_testability_2022, sec. I] — borrowed

### Case
- **Definition:** A self-contained directory of PHP files that isolates one tarpit or one language construct and holds its ground truth in a `meta.json` file.
- **Example:** `patterns/02_global_variables` → the case that holds `main.php` and `meta.json`.
- **Source:** `truth.json` `name`; `meta.json` `name`

### Variant
- **Is a:** Case
- **Definition:** A case that exercises one syntactic form of a node type that has several forms, held in its own subdirectory of the node type's directory.
- **Example:** `extends/Expr_FuncCall/str_callee` → the variant `str_callee` of the node type `Expr_FuncCall`.
- **Source:** `truth.json` `name`

### Ground truth
- **Definition:** The expected analysis result of one case: its call edges, true positives and false positives.
- **Source:** `truth.json`; `meta.json`

## Taint flows

### Taint analysis
- **Definition:** A static analysis that follows data from sources to sinks to find the flows that reach a sink.
- **Source:** `README.md` "PHPTarpits"

### Location
- **Definition:** A position in a case written `file:line`, with the file named relative to the case directory.
- **Example:** `main.php:13` → line 13 of `main.php` in the case `patterns/02_global_variables`.
- **Source:** `truth.json` `source`; `truth.json` `sink`; `truth.json` `callsite`

### Eval file
- **Definition:** A virtual file that stands for the code a string passed to `eval` executes, named under a hidden directory of the case.
- **Example:** `eval($code);` in `extends/Expr_Eval` → the location `.eval/site_e9cde72c/eb1fd8af.php:1`, the `echo` in the evaluated function.
- **Source:** `truth.json` `callee`

### Source
- **Definition:** A location where input an attacker controls enters the program, here a read of `$_GET` or another request-bound array.
- **Example:** `$words = $_GET["p1"];` → the source `main.php:10` in `patterns/02_global_variables`.
- **Source:** `truth.json` `source`
- **Literature:** [@kassar_testability_2022, sec. III-A] — same

### Sink
- **Definition:** A location where data is consumed by an operation that makes it a vulnerability, such as `echo`, a database query or a shell command.
- **Example:** `echo $result;` → the sink `main.php:13` in `patterns/02_global_variables`.
- **Source:** `truth.json` `sink`
- **Literature:** [@kassar_testability_2022, sec. III-A] — same

### Taint flow
- **Definition:** A path along which data moves from a source to a sink during an execution of a case.
- **Example:** `$b = $_GET["p1"]; echo $b;` → a taint flow from the first line to the second.
- **Source:** `README.md` "Format"

### Vulnerability type
- **Definition:** The CWE identifier of the weakness class that the operation at a sink exposes, such as 79 for `echo`.
- **Source:** `truth.json` `type`

### True positive
- **Definition:** A pair of a source and a sink, with a vulnerability type, between which a taint flow occurs in the case; an analyzer should report it.
- **Example:** in `extends/Stmt_If`, `$_GET["user-input"]` reaches `echo $data2` guarded by `!$cond` → the true positive from `main.php:14` to `main.php:9`.
- **Source:** `truth.json` `true_positives`

### False positive
- **Definition:** A pair of a source and a sink, with a vulnerability type, between which no taint flow occurs in the case; an analyzer should not report it.
- **Example:** in `extends/Stmt_If`, `echo $data1` receives only the safe argument → the false positive from `main.php:14` to `main.php:6`.
- **Source:** `truth.json` `false_positives`

### Recall
- **Definition:** The share of the true positives of the scored cases that an analyzer reports.
- **Source:** `README.md` "Usage"

### Precision
- **Definition:** The share of an analyzer's reported pairs that are true positives, lowered by each false positive it reports.
- **Source:** `README.md` "Usage"

## Call edges

### Call edge
- **Definition:** A ground-truth record that the code at a callsite invokes a callee, labeled with a call edge type.
- **Example:** `F($words);` on line 11 → `{"type": "STATIC", "callsite": "main.php:11", "callee": "F@main.php:4"}`.
- **Source:** `truth.json` `call_edges`

### Callsite
- **Definition:** The location of an expression or keyword that invokes a callee, including `echo` and `include`.
- **Source:** `truth.json` `callsite`

### Callee
- **Definition:** What a callsite invokes, written `name@file:line` for code in the case, `name@Builtin[kind]` for a PHP builtin or keyword, `__file__@file` for an included file, and `unknown@Stretch` when no name resolves.
- **Example:** `echo $result;` → the callee `echo@Builtin[keyword]`.
- **Source:** `truth.json` `callee`

## Call edge types

### Call edge type
- **Definition:** The label that says how firmly the code fixes the callee of a call edge.
- **Source:** `truth.json` `type`

| Member | Definition | Reference | Literature | Tools |
|---|---|---|---|---|
| `STATIC` | The code at the callsite names the callee. | none | none | none |
| `DYNAMIC` | The callee depends on a run-time value, such as a variable function name, a callable, the receiver object or a magic method. | none | none | none |
| `SUSPICIOUS` | The callee is ambiguous: it depends on an undeclared function, a path built at run time or code the case never reaches. | none | none | none |
