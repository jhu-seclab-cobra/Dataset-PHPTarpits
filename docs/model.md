# Domain Model: PHPTarpits

Semantics of the ground truth of a case. Why the dataset exists and how its concepts relate: [concept.md](concept.md). The format of each field: the README.

## Entities

- [Case](glossary-ground-truth.md#case): a directory of PHP files, named by its path relative to the dataset root. A case exists when its directory holds a `meta.json` file. A [variant](glossary-ground-truth.md#variant) is a case. No case directory lies inside another.
- [Ground truth](glossary-ground-truth.md#ground-truth): one per case. It holds zero or more [call edges](glossary-ground-truth.md#call-edge), zero or more [true positives](glossary-ground-truth.md#true-positive) and zero or more [false positives](glossary-ground-truth.md#false-positive).
- [Location](glossary-ground-truth.md#location): a line of a file of one case, or of an [eval file](glossary-ground-truth.md#eval-file) of that case.
- [Source](glossary-ground-truth.md#source) and [sink](glossary-ground-truth.md#sink): locations of one case that a true positive or a false positive pairs.
- [Callsite](glossary-ground-truth.md#callsite) and [callee](glossary-ground-truth.md#callee): the two ends of a call edge.
- [Construct usage](glossary-usage.md#construct-usage): one per case, held in `cve_usage` of its `meta.json`; it derives from the case's [defining constructs](glossary-usage.md#defining-construct).

## Relations

| Relation | Meaning | Cardinality |
|---|---|---|
| Case has ground truth | The expected result of analyzing that case alone | one to one |
| True positive pairs source and sink | A [taint flow](glossary-ground-truth.md#taint-flow) from the source to the sink occurs | many per case, possibly none |
| False positive pairs source and sink | No taint flow from the source to the sink occurs | many per case, possibly none |
| Pair has vulnerability type | The [CWE](glossary-ground-truth.md#vulnerability-type) weakness class the sink's operation exposes | one per pair |
| Call edge joins callsite and callee | The code at the callsite invokes the callee | many per case, possibly none |
| Call edge has call edge type | How firmly the code fixes the callee: `STATIC`, `DYNAMIC` or `SUSPICIOUS` | one per call edge |
| Case has construct usage | How common the case's rarest construct is in PHPCVEs | one per case |

A source or a sink takes part in many pairs: one source reaches several sinks, one sink receives several sources.

## Invariants

- A case names no other case: a location carries no case component, so no pair and no call edge crosses cases.
- The `name` of a case is unique and equals the path of its directory relative to the dataset root.
- The cases are exactly the directories that hold a `meta.json`.
- No pair of a source and a sink is both a true positive and a false positive of one case.
- No true positive, false positive or call edge repeats within its list.
- A source, sink or callsite names a file of its case and a line within that file, except an eval file location, and except the sink `*`, which one false positive of `patterns/69_create_function` uses for the `echo` inside a string argument of `create_function`.
- The call edge type is `STATIC`, `DYNAMIC` or `SUSPICIOUS`.
- The `meta.json` of a case holds its entry of `truth.json` and `cve_usage`; `truth.json` lists the entries in name order.

## Cross-Structure Contracts

- **`truth.json` and `meta.json`.** `truth.json` is the list of the ground truth of every case, without `cve_usage`. A case's `meta.json` holds the same entry plus `cve_usage`.
- **Case and construct usage.** The count of a case's rarest construct follows the counting method of the README section "How Usage Is Counted", which is not restated here.
