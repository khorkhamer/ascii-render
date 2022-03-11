<?php
declare(strict_types=1);

namespace AsciiRender\Pool;

use AsciiRender\Dto\FrameItem;
use AsciiRender\Dto\Point;
use AsciiRender\Frame\Frame;

class Screen extends Pool
{
    public function add(Frame $frame, int $x, int $y): void
    {
        $this->push(new FrameItem($frame, new Point($x, $y)));
    }
}
