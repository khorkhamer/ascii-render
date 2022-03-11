<?php
declare(strict_types=1);

namespace AsciiRender\Frame;

class Sprite extends Frame
{
    public function __construct(string $string)
    {
        $string = trim($string, "\n");
        $lines = explode("\n", $string);
        $this->lines = array_map(function ($line) {
            return str_split($line);
        }, $lines);
    }

    public function getLines(): array
    {
        return $this->lines;
    }
}
