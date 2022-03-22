<?php
declare(strict_types=1);

namespace AsciiRender\Frame;

use AsciiRender\Dto\Point;

class MainFrame extends Frame implements MainFrameInterface
{
    public function __construct(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
        $this->fill();
    }

    public function getSize(): array
    {
        return [$this->width, $this->height];
    }

    public function addFrame(Frame $frame, Point $position): void
    {
        foreach($frame->lines as $i => $line) {
            foreach ($line as $j => $char) {
                $this->addChar($char, new Point($i + $position->x, $j + $position->y));
            }
        }
    }

    public function resize(int $width, int $height): void
    {
        $this->width = $width;
        $this->height = $height;
        $this->fill();
    }

    public function output(): string
    {
        return implode("\n", array_map(function (array $line) {
            return implode('', $line);
        }, $this->lines));
    }
}
