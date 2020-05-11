<?php


class ListLine
{
    public $length = 0;
    public $maxLength;

    public $data = [];

    public function __construct($maxLength)
    {
        $this->maxLength = $maxLength;
    }

    public function listIsEmpty()
    {
        return $this->length === 0 ? true : false;
    }

    public function listInsert($index, $v)
    {
        if ($this->length >= $this->maxLength) {
            return false;
        }

        if ($index < 0 || $index > $this->length) {
            return false;
        }

        if ($index <= $this->length - 1) {
            for ($i = $this->length - 1; $i >= $index; $i--) {
                $this->data[$i + 1] = $this->data[$i];
            }
        }

        $this->data[$index] = $v;
        $this->length++;
        return true;
    }

    public function listDelete($index)
    {
        if ($index > $this->maxLength - 1) {
            return false;
        }

        if ($this->length <= 0) {
            return false;
        }

        for ($i = $index; $i < $this->length - 1; $i++) {
            $this->data[$i] = $this->data[$i + 1];
        }

        unset($this->data[$this->length - 1]);

        $this->length--;

        return true;
    }

    public function listClear()
    {
        for ($i = 0; $i <= $this->length - 1; $i++) {
            unset($this->data[$i]);
        }

        $this->length = 0;

        return true;
    }

    public function getElem($index)
    {
        if ($index > $this->length - 1) {
            return false;
        }

        return $this->data[$index];
    }
}


$listLine = new ListLine(20);

$listLine->listInsert(0, 1);
$listLine->listInsert(1, 2);
$listLine->listInsert(2, 3);
$listLine->listInsert(3, 4);
$listLine->listInsert(4, 5);
$listLine->listInsert(5, 6);
$listLine->listInsert(1, 100);
$listLine->listInsert(8, 120);

$listLine->listDelete(1);

var_dump($listLine->getElem(1));

$listLine->listClear();

var_dump($listLine->listIsEmpty());
exit;
