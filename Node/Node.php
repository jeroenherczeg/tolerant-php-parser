<?php
/*---------------------------------------------------------------------------------------------
 * Copyright (c) Microsoft Corporation. All rights reserved.
 *  Licensed under the MIT License. See License.txt in the project root for license information.
 *--------------------------------------------------------------------------------------------*/

namespace PhpParser\Node;

//require_once (__DIR__ . "/../NodeKind.php");

use PhpParser\Token;

class Node implements \JsonSerializable {
    /** @var int */
    public $kind;
    /** @var Node | null */
    public $parent;

    public function __construct(int $kind) {
        $this->kind = $kind;
    }

    /**
     * Gets the root of the syntax tree. Returns `null` already at root node.
     */
    public function getRoot() {
        $node = $this;
        do {
            $node = $node->parent;
        } while ($node !== null && $node->parent !== null);
        return $node;
    }

    /**
     * Gets a list of all descendant Nodes and Tokens.
     *
     * @param callable|null $shouldDescendIntoChildrenFn
     * @return \Generator
     */
    public function getDescendantNodesAndTokens(callable $shouldDescendIntoChildrenFn = null) {
        foreach ($this->getChildNodesAndTokens() as $child) {
            if ($child instanceof Node) {
                yield $child;
                if ($shouldDescendIntoChildrenFn == null || $shouldDescendIntoChildrenFn($child)) {
                    foreach ($child->getDescendantNodesAndTokens($shouldDescendIntoChildrenFn) as $subChild) {
                        yield $subChild;
                    }
                }
            } elseif ($child instanceof Token) {
                yield $child;
            }
        }
    }

    /**
     * Returns all descendant Nodes.
     * @param callable|null $shouldDescendIntoChildrenFn
     * @return \Generator
     */
    public function getDescendantNodes(callable $shouldDescendIntoChildrenFn = null) {
        foreach ($this->getChildNodesAndTokens() as $child) {
            if ($child instanceof Node) {
                yield $child;
                if ($shouldDescendIntoChildrenFn == null || $shouldDescendIntoChildrenFn($child)) {
                    foreach ($child->getDescendantNodesAndTokens() as $subChild) {
                        yield $subChild;
                    }
                }
            }
        }
    }

    /**
     * Returns all descendant Tokens.
     * @param callable|null $shouldDescendIntoChildrenFn
     * @return \Generator
     */
    public function getDescendantTokens(callable $shouldDescendIntoChildrenFn = null) {
        foreach ($this->getChildNodesAndTokens() as $child) {
            if ($child instanceof Node) {
                if ($shouldDescendIntoChildrenFn == null || $shouldDescendIntoChildrenFn($child)) {
                    foreach ($child->getDescendantTokens($shouldDescendIntoChildrenFn) as $subChild) {
                        yield $subChild;
                    }
                }
            } elseif ($child instanceof Token) {
                yield $child;
            }
        }
    }

    /**
     * Gets a list of child Nodes and Tokens (direct descendants)
     */
    public function getChildNodesAndTokens() {
        foreach (call_user_func('get_object_vars', $this) as $i=>$val) {
            if ($i === "parent" || $i == "kind") {
                continue;
            }
            if (is_array($val)) {
                foreach ($val as $child) {
                    yield $child;
                }
                continue;
            }
            yield $val;
        }
    }

    /**
     * Gets a list of child Nodes (direct descendants)
     */
    public function getChildNodes() {
        foreach (call_user_func('get_object_vars', $this) as $i=>$val) {
            if ($i === "parent" || $i == "kind") {
                continue;
            }
            if (is_array($val)) {
                foreach ($val as $child) {
                    if ($child instanceof Node) {
                        yield $val;
                    }
                }
                continue;
            } elseif ($val instanceof Node) {
                yield $val;
            }
        }
    }

    /**
     * Gets a list of child Tokens (direct descendants)
     */
    public function getChildTokens() {
        foreach (call_user_func('get_object_vars', $this) as $i=>$val) {
            if ($i === "parent" || $i == "kind") {
                continue;
            }
            if (is_array($val)) {
                foreach ($val as $child) {
                    if ($child instanceof Token) {
                        yield $child;
                    }
                }
                continue;
            } elseif ($val instanceof Token) {
                yield $val;
            }
        }
    }

    /**
     * Returns the length of a Node (including trivia)
     */
    public function getLength() {
        $length = 0;

        foreach ($this->getChildNodesAndTokens() as $child) {
            if ($child instanceof Node) {
                $length += $child->getLength();
            } elseif ($child instanceof Token) {
                $length += $child->length;
            }
        }
        return $length;
    }

    protected function getChildrenKvPairs() {
        $result = array();
        foreach (call_user_func('get_object_vars', $this) as $i=>$val) {
            if ($i === "parent" || $i == "kind") {
                continue;
            }

            $result[$i] = $val;
        }
        return $result;
    }

    public function getStart() {
        $child = $this->getChildNodesAndTokens()[0];
        if ($child instanceof Node) {
            return $child->getStart();
        } elseif ($child instanceof Token) {
            return $child->start;
        }
        throw new \Exception("Unknown type in AST");
    }

    public function jsonSerialize() {
        $constants = (new \ReflectionClass("PhpParser\\NodeKind"))->getConstants();
        $kindName = $this->kind;
        foreach ($constants as $name=>$val) {
            if ($val == $this->kind) {
                $kindName = $name;
            }
        }

        return ["$kindName" => $this->getChildrenKvPairs()];
    }

    public function validateRules() {
        return [];
    }
}