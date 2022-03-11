<?php
declare(strict_types=1);

namespace App\Pool;

use App\Dto\FrameItem;
use App\Dto\Point;
use App\Frame\Frame;

class Screen extends Pool
{
    public function add(Frame $frame, int $x, int $y): void
    {
        $this->push(new FrameItem($frame, new Point($x, $y)));
    }
}
