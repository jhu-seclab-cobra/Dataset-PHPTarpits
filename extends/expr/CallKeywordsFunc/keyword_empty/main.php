<?php

if (empty('')) {
    echo "1 EMPTY CHR\n";
}
if (!empty('1')) {
    echo "2 NOT EMPTY CHR\n";
}
if (empty("")) {
    echo "3 EMPTY STR\n";
}
if (!empty("str")) {
    echo "4 NOT EMPTY STR\n";
}
if (empty('0')) {
    echo "5 EMPTY STR 0\n";
}
if (!empty('1')) {
    echo "6 NOT EMPTY STR 1\n";
}
if (empty(null)) {
    echo "7 NULL VAL\n";
}
if (empty(0)) {
    echo "8 EMPTY NUM \n";
}
if (!empty(1)) {
    echo "9 NOT EMPTY NUM \n";
}
if (empty(array())) {
    echo "10 EMPTY FLOAT\n";
}
if (!empty(array(1))) {
    echo "11 EMPTY FLOAT\n";
}
if (!empty((object)array())) {
    echo "12 NOT EMPTY OBJ\n";
}
if (empty($undefined)) {
    echo "13 EMPTY UNDEFINED\n";
}
