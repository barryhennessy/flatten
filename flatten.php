#! /usr/bin/env php
<?php
/**
 * Converts the given (possibly) nested JSON array to a flattened array
 * structure with elements in the same order
 *
 * Usage:
 *      ./flatten.php "[1, 2, 3, [4, 5], 6]"
 *
 * Requires PHP 5.3 or greater
 *
 * @author Barry Hennessy <barryhenn@gmail.com>
 */

require_once "class/flattener/flattener.php";

if (!isset($argv[1]) || count($argv) > 2)
{
    echo "The first and only argument must be a JSON array of integers" . PHP_EOL;
    exit;
}

$toFlatten = json_decode($argv[1]);

if ($toFlatten === NULL)
{
    echo "The JSON entered is invalid" . PHP_EOL;
    exit;
}
else if ($toFlatten instanceof stdClass)
{
    echo "Please enter a JSON array i.e. [1, 2, [3, 4]]" . PHP_EOL;
    exit;
}


$flat = Flattener::flatten($toFlatten);

echo json_encode($flat) . PHP_EOL;