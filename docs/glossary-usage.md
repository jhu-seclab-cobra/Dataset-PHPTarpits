# Glossary: construct usage

## Constructs

### Node type
- **Definition:** The name PHP-Parser gives to a kind of syntax tree node, such as `Expr_FuncCall` for a function call.
- **Example:** `echo $x;` → the node type `Stmt_Echo`.
- **Source:** `tools/cve-usage/dump.php` `V`
- **Tools:** [@php-parser] `Node::getType` — same

### Construct
- **Definition:** A syntax feature the usage count tracks: a node type, a variant of one such as `Expr_FuncCall[callee=Scalar_String]`, a call by name `func:<name>`, or a declared magic method `magic:<name>`.
- **Example:** `strlen($s);` → the constructs `Expr_FuncCall` and `func:strlen`, among others.
- **Source:** `tools/cve-usage/dump.php` `V`

### Defining construct
- **Definition:** A construct that a case exercises, taken from the node type and variant its directory names, or for a case adapted from TestabilityTarpits from the constructs its files hold beyond a baseline program.
- **Example:** `extends/Expr_FuncCall/str_callee` → the defining construct `Expr_FuncCall[callee=Scalar_String]`.
- **Source:** `tools/cve-usage/run.py` `VARIANT`; `tools/cve-usage/run.py` `RENAMED`; `tools/cve-usage/run.py` `BASELINE`; `meta.json` `cve_usage`

### Rarest construct
- **Is a:** Defining construct
- **Definition:** The defining construct of a case found in the fewest repositories, then with the fewest occurrences.
- **Example:** `patterns/19_closures` → `Expr_FuncCall[callee=Expr_FuncCall]`, found in no repository.
- **Source:** `meta.json` `cve_usage`

## Usage

### CVE snapshot
- **Definition:** A copy of a vulnerable repository's source code as of one CVE, as PHPCVEs holds it.
- **Source:** `tools/cve-usage/run.py` `list_cves`

### Construct usage
- **Definition:** The share of PHPCVEs repositories that contain a case's rarest construct, recorded with the construct's occurrences and snapshots in the `cve_usage` of the case's `meta.json`.
- **Example:** `patterns/02_global_variables` → `Stmt_Global`, found in 79 of the 130 repositories, a usage of 60.8 percent.
- **Source:** `meta.json` `cve_usage`; `tools/cve-usage/run.py`
