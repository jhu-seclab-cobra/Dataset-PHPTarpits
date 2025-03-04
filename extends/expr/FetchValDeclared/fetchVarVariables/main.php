<?php

$vul_data = $_GET["user-input"];

// Case 1: Fetch directly by variable name (Regular String)
$userVar1 = "value1"; // Regular string variable
if ($userVar1 === "value1") {
    echo "Case 1 (Direct - Regular String): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 1 (Direct - Regular String): " . $vul_data . " (false positive)\n";
}

// Case 2: Fetch directly by variable name (Null)
$userVar2 = null; // Null variable
if (is_null($userVar2)) {
    echo "Case 2 (Direct - Null): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 2 (Direct - Null): " . $vul_data . " (false positive)\n";
}

// Case 3: Fetch directly by variable name (Boolean false)
$userVar3 = false; // Boolean false variable
if ($userVar3 === false) {
    echo "Case 3 (Direct - Boolean false): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 3 (Direct - Boolean false): " . $vul_data . " (false positive)\n";
}

// Case 4: Fetch directly by variable name (Integer 0)
$userVar4 = 0; // Integer zero
if ($userVar4 === 0) {
    echo "Case 4 (Direct - Integer 0): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 4 (Direct - Integer 0): " . $vul_data . " (false positive)\n";
}

// Case 5: Fetch dynamically by variable name using a string variable
$varName = "userVar1";
if ($$varName === "value1") {
    echo "Case 5 (Dynamic Variable Name): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 5 (Dynamic Variable Name): " . $vul_data . " (false positive)\n";
}
