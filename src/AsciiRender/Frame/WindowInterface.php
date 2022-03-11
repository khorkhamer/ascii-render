<?php
declare(strict_types=1);

namespace AsciiRender\Frame;

use AsciiRender\Dto\Point;

interface WindowInterface extends Resizable
{
    public function addFrame(Frame $item, Point $position): void;
}
