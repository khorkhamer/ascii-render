<?php
declare(strict_types=1);

namespace AsciiRender\Frame;

use AsciiRender\Dto\Point;

abstract class Frame
{
    protected array $lines;

    protected int $width;

    protected int $height;

    public function fill(string $char = " "): void
    {
        $this->lines = [];
        for ($i = 0; $i < $this->height; $i++) {
            $line = [];
            for ($j = 0; $j < $this->width; $j++) {
                $line[] = $char;
            }
            $this->lines[] = $line;
        }
    }

    public function addChar(string $char, Point $position): void
    {
        $this->lines[$position->x][$position->y] = $char;
    }
}
