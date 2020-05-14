<?php

class Node
{
    public $val;
    public $next;

    public function __construct($val, Node $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class LinkList
{
    public $header;

    public $length = 0;

    public function __construct()
    {
        $this->header = [];

        $this->length = 0;
    }

    public function addHeader($val)
    {
        $this->header = new Node($val);
        $this->length++;
    }

    public function add($index, $val)
    {
        if ($index > $this->length && $index != 0) {
            return false;
        }

        $prev = $this->header;

        for ($i = 0; $i < $index - 1; $i++) {
            $prev = $prev->next;
        }

        $after = $prev->next;

        $prev->next = new Node($val);

        $prev->next->next = $after;
        $this->length++;

        return true;
    }

    public function get($index)
    {
        if ($index > $this->length) {
            return false;
        }

        if ($index == 0) {
            return $this->header->val;
        }


        $node = $this->header;
        for ($i = 0; $i < $index; $i++) {
            $node = $node->next;
        }

        return $node->val;
    }

    public function delete($index)
    {
        if ($index > $this->length) {
            return false;
        }

        $node = $this->header;
        for ($i = 0; $i < $index; $i++) {
            if ($i == $index - 1) {
                $prev = $node;
            }

            $node = $node->next;
        }

        $prev->next = $node->next;

        unset($node);

        $this->length++;

        return true;

    }

}

$linkList = new LinkList();
$linkList->addHeader(1);

$linkList->add(1,2);
$linkList->add(2,3);
$linkList->add(2,4);

print_r($linkList->get(0));
print_r($linkList->get(1));
$linkList->delete(2);
print_r($linkList->get(2));
