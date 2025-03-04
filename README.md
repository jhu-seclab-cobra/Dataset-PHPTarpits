# PHPTarpits Dataset

## Overview
The **PHPTarpits** dataset provides a collection of test challenges for evaluating a static analysis approach for PHP [not_released](?).
In total, there are **237** patterns, including **750 true positive instances** and **1041 false positive instances**. This dataset is a fork of **TestabilityTarpits**, retaining 96 patterns PHP-specific patterns. Additionally, we introduce **153 new patterns** to cover more complex syntaxes and edge cases.


## Dataset Structure
The dataset is organized into two main directories:

### **1. `./patterns/` (Modified Testability Cases)**
This directory contains modified versions of the original **TestabilityTarpits** patterns, ensuring syntax correctness. It includes:
- **96 patterns**
- **537 instances**, categorized as:
  - **143 true positive cases**
  - **394 false positive cases**

### **2. `./extends/` (Extended Patterns for PHP 8+ and Built-in Functions)**
This directory introduces additional patterns, covering PHP 8+ features and previously ignored built-in functions. It includes:
- **141 patterns**
- **1,254 instances**, categorized as:
  - **607 true positive cases**
  - **647 false positive cases**

## Ground Truth Data
To facilitate evaluation, we provide ground truth files in JSON format. 
**`truth.json`** (located in the repository root) – Contains call-edges, true-positive and false-positive lists for each test case, along with the relative path to each case.

**Example JSON Format**
Each test case entry in the JSON files follows this structure:
- **name**: The relative path to the test case, e.g., `patterns/02_global_variables` or `extends/expr/CallFunctionLike/meth_norm`.
- **call_edges**: A list storing function call dependencies (currently empty `[]` but can be used for interprocedural analysis).
- **true_positives**: A list of confirmed vulnerabilities, each containing:
  - **type**: The vulnerability category (e.g., `79` for XSS).
  - **source**: The source location in the format `filename:line_number`.
  - **sink**: The affected location in the format `filename:line_number`.
- **false_positives**: A list of incorrectly flagged vulnerabilities, following the same format as `true_positives`.

```json
[
  {
    "name": "patterns/02_global_variables",
    "call_edges": [],
    "true_positives": [
      {"type": 79,"source": "main.php:10","sink": "main.php:13"}
    ],
    "false_positives": [
      {"type": 79,"source": "main.php:10","sink": "main.php:12"}
    ]
  },
  {
    "name": "extends/expr/CallFunctionLike/meth_norm",
    "call_edges": [],
    "true_positives": [
      {"type": 79,"source": "main.php:3","sink": "main.php:12"}
    ],
    "false_positives": [
      {"type": 79,"source": "main.php:17","sink": "main.php:12"},
      {"type": 79,"source": "main.php:17","sink": "main.php:7"}
    ]
  }, 
]
```

## Usage
This dataset serves as a benchmark for assessing the effectiveness of PHP static analysis tools, particularly [not_released](?). Researchers and developers can leverage it to analyze detection accuracy and refine static analysis techniques.

## Contact
For inquiries or contributions, please contact the project maintainers.