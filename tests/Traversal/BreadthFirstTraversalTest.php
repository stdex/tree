<?php declare(strict_types=1);

namespace Jorpo\Tree\Traversal;

/**
 *               A
 *              / \
 *             B   C
 *            / \
 *           D   E
 *              / \
 *             F   G
 *            /
 *           H
 *
 *    A, B, C, D, E, F, G, H
 */
class BreadthFirstTraversalTest extends AlgorithmTestCase
{
    public function testThatAlgorithmSortsNodeTree()
    {
        $traversal = new BreadthFirstTraversal;

        list($a, $b, $c, $d, $e, $f, $g, $h) = $this->buildNodeTree();

        $this->assertSame([$a, $b, $c, $d, $e, $f, $g, $h], $traversal->sort($a));
    }

    public function testThatAlgorithmTraversesNodeTree()
    {
        $traversal = new BreadthFirstTraversal;

        list($a) = $this->buildNodeTree();
        $traversed = "";

        $traversal->traverse($a, function ($node) use (&$traversed) {
            $traversed .= $node->getValue();
        });

        $this->assertSame('ABCDEFGH', $traversed);
    }
}
