<?php
/**
 * hcollection. Forked from hack.
 *
 * @copyright 2017 Appertly
 * @copyright 2014 Facebook, Inc. All rights reserved.
 * @license BSD-3-Clause
 *
 * Original license can be found in the THIRD-PARTY file at the root of this
 * source tree. An additional grant of patent rights can be found in the
 * PATENTS file in the "hphp/hack" directory of the HHVM Git repository.
 */

class LazySliceKeyedIterable implements \HH\KeyedIterable
{
    use LazyKeyedIterable;

    private $iterable;
    private $start;
    private $len;

    public function __construct($iterable, $start, $len)
    {
        $this->iterable = $iterable;
        $this->start = $start;
        $this->len = $len;
    }
    public function getIterator()
    {
        return new LazySliceKeyedIterator(
            $this->iterable->getIterator(),
            $this->start,
            $this->len
        );
    }
}
