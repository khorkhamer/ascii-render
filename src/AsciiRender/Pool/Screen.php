<?php
declare(strict_types=1);

namespace AsciiRender\Pool;

use AsciiRender\Dto\FrameItem;
use AsciiRender\Dto\Point;
use AsciiRender\Frame\Frame;

class Screen extends Pool
{
    public function add(Frame $frame, int $x, int $y, int $level): void
    {
        $this->push(new FrameItem($frame, new Point($x, $y), $level));
    }

    public function output(): string
    {
        if (count($this->frameItems) > 1) {
            usort($this->frameItems, function (FrameItem $a, FrameItem $b) {
                return $a->getLevel() > $b->getLevel();
            });
        }
        return parent::output();
    }
}
