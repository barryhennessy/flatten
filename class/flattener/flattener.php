<?php
/**
 * Handles flattening of multidimensional arrays.
 *
 * @author Barry Hennessy <barryhenn@gmail.com>
 */
class Flattener
{
    /**
     * Flattens multi dimensional arrays of integers into a single array of
     * integers
     *
     * @param array $multiDimArray A (possibly) multi dimensional array of ints
     *
     * @throws UnexpectedValueException when non integer values are discovered
     *
     * @return array A 1 dimensional array of the ints in $multiDimArray in 
     *               the same order
     */
    public static function flatten(array $multiDimArray)
    {
        $flat = array();

        array_walk_recursive($multiDimArray, function($value, $key) use (&$flat) {
            if (!is_int($value))
            {
                // This is an arbitrary restriction, the code would work fine
                // without it but the test specified ints
                throw new UnexpectedValueException(
                    "Flatten works on integers only"
                );
            }

            $flat[] = $value;
        });

        return $flat;
    }
}