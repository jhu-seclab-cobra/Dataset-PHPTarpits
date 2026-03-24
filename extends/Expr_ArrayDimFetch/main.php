<?php

$vul_data = $_GET["user-input"];

// Define a simple associative array
$array = [
    "key1" => "value1",
    "key2" => 42,
    "key3" => null,
    "nested" => [
        "nestedKey" => "nestedValue"
    ]
];

// Case 1: Fetch array value directly using a string key
if ($array["key1"] === "value1") {
    echo "Case 1 (Direct - key1): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 1 (Direct - key1): " . $vul_data . " (false positive)\n";
}

// Case 2: Fetch array value using a dynamic key
$key = "key2";
if ($array[$key] === 42) {
    echo "Case 2 (Dynamic - key2): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 2 (Dynamic - key2): " . $vul_data . " (false positive)\n";
}

// Case 3: Fetch array value using a null value key
if ($array["key3"] === null) {
    echo "Case 3 (Null - key3): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 3 (Null - key3): " . $vul_data . " (false positive)\n";
}

// Case 4: Fetch value from a nested array
if ($array["nested"]["nestedKey"] === "nestedValue") {
    echo "Case 4 (Nested - nestedKey): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 4 (Nested - nestedKey): " . $vul_data . " (false positive)\n";
}

// Case 5: Handle non-existent key
if (!isset($array["nonExistentKey"])) {
    echo "Case 5 (Non-Existent Key): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 5 (Non-Existent Key): " . $vul_data . " (false positive)\n";
}

// Case 6: Fetch array value using a string array name and dynamic key
$arrayName = "array";
$key = "key2";
if ($$arrayName[$key] === 42) {
    echo "Case 6 (String Array Name - Dynamic key2): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 6 (String Array Name - Dynamic key2): " . $vul_data . " (false positive)\n";
}
