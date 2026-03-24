# Third-Party Notices

## TestabilityTarpits

The `patterns/` directory in this dataset is derived from the PHP testability patterns in the **TestabilityTarpits** project.

**Repository:** https://github.com/enferas/TestabilityTarpits

**Paper:**
Feras Al Kassar, Giulia Clerici, Luca Compagna, Davide Balzarotti, and Fabian Yamaguchi.
"Testability Tarpits: the Impact of Code Patterns on the Security Testing of Web Applications."
*Proceedings of the Network and Distributed System Security Symposium (NDSS)*, 2022.

**What was used:**
- 96 PHP testability pattern test cases from `PHP/TestabilityPatterns/`
- Each pattern's PHP source code and README documentation

**What was modified:**
- Syntax corrections for PHP 8+ compatibility
- Added `meta.json` ground truth annotations (call edges, true positives, false positives)
- Reorganized directory structure with numeric prefixes (`01_static_variables/`, etc.)

**License:**
The TestabilityTarpits repository does not include an explicit license file. The work is published as an academic research artifact accompanying the NDSS 2022 paper listed above. Usage in this dataset is for research and evaluation purposes.
