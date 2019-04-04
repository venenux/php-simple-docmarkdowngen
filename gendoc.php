<?php

// usage: "php gendoc.php > outputexample.md" at same directory of files

error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'ClassMarkdown.php';

$out = ClassMarkdown::printMarkdown('ClassMarkdown.php').PHP_EOL;
$out .= ClassMarkdown::printMarkdown('ClassParser.php').PHP_EOL;
$out .= ClassMarkdown::printMarkdown('TextTable.php').PHP_EOL;

