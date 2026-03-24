# PHPTarpits Dataset

## Overview
The **PHPTarpits** dataset provides a collection of test challenges for evaluating a static analysis approach for PHP [not_released](?).
In total, there are **259** patterns, including **805 true positive instances** and **1034 false positive instances**. This dataset builds on **TestabilityTarpits** (Al Kassar et al., NDSS 2022), retaining 96 PHP-specific patterns. Additionally, we introduce **163 new patterns** organized by PHP-Parser AST node types to cover all 142 non-structural AST node types in PHP 8+.


## Dataset Structure
The dataset is organized into two main directories:

### **1. `./patterns/` (Modified Testability Cases)**
This directory contains modified versions of the original **TestabilityTarpits** patterns, ensuring syntax correctness. It includes:
- **96 patterns**
- **537 instances**, categorized as:
  - **143 true positive cases**
  - **394 false positive cases**

### **2. `./extends/` (Extended Patterns by AST Node Type)**
This directory introduces additional patterns organized by PHP-Parser AST node type names (`Expr_*`, `Stmt_*`, `Scalar_*`). Each directory corresponds to a specific AST construct and contains test cases for taint vulnerability detection through that construct. It includes:
- **163 patterns** covering all **142** non-structural AST node types
- **1,312 instances**, categorized as:
  - **667 true positive cases**
  - **645 false positive cases**
  - **1,677 call edges**

Multi-case AST types (e.g., `Expr_FuncCall/`, `Expr_MethodCall/`) contain subdirectories for each test variant. Single-case types contain `main.php` and `.tarpit.meta.json` directly.

## Ground Truth Data
To facilitate evaluation, we provide ground truth files in JSON format.
**`truth.json`** (located in the repository root) -- Contains call-edges, true-positive and false-positive lists for each test case, along with the relative path to each case.

**Example JSON Format**
Each test case entry in the JSON files follows this structure:
- **name**: The relative path to the test case, e.g., `patterns/02_global_variables` or `extends/Expr_MethodCall/meth_norm`.
- **call_edges**: A list of function call edges, each containing:
  - **type**: Edge resolvability (`STATIC`, `DYNAMIC`, or `SUSPICIOUS`).
  - **callsite**: The call location in `filename:line_number` format.
  - **callee**: The target in `name@location` format (e.g., `func@main.php:3`, `echo@Builtin[keyword]`).
- **true_positives**: A list of confirmed vulnerabilities, each containing:
  - **type**: The vulnerability category (e.g., `79` for XSS).
  - **source**: The source location in the format `filename:line_number`.
  - **sink**: The affected location in the format `filename:line_number`.
- **false_positives**: A list of incorrectly flagged vulnerabilities, following the same format as `true_positives`.

```json
[
  {
    "name": "patterns/02_global_variables",
    "call_edges": [
      {"type": "STATIC", "callsite": "main.php:11", "callee": "F@main.php:3"},
      {"type": "STATIC", "callsite": "main.php:5", "callee": "echo@Builtin[keyword]"}
    ],
    "true_positives": [
      {"type": 79, "source": "main.php:10", "sink": "main.php:13"}
    ],
    "false_positives": [
      {"type": 79, "source": "main.php:10", "sink": "main.php:12"}
    ]
  },
  {
    "name": "extends/Expr_MethodCall/meth_norm",
    "call_edges": [
      {"type": "STATIC", "callsite": "main.php:16", "callee": "callee::sink@main.php:5"}
    ],
    "true_positives": [
      {"type": 79, "source": "main.php:3", "sink": "main.php:12"}
    ],
    "false_positives": [
      {"type": 79, "source": "main.php:17", "sink": "main.php:12"}
    ]
  }
]
```

## Attribution
The `patterns/` directory is derived from the [TestabilityTarpits](https://github.com/enferas/TestabilityTarpits) project. See `docs/THIRD_PARTY_NOTICES.md` for full attribution.

## Usage
This dataset serves as a benchmark for assessing the effectiveness of PHP static analysis tools, particularly [not_released](?). Researchers and developers can leverage it to analyze detection accuracy and refine static analysis techniques.

## Contact
For inquiries or contributions, please contact the project maintainers.
