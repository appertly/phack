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

class LazyConcatIterable implements \HH\HackIterable
{
    use LazyIterable;

    private $iterable1;
    private $iterable2;

    public function __construct($iterable1, $iterable2)
    {
        $this->iterable1 = $iterable1;
        $this->iterable2 = $iterable2;
    }
    public function getIterator()
    {
        return new LazyConcatIterator(
            $this->iterable1->getIterator(),
            $this->iterable2->getIterator()
        );
    }
}
