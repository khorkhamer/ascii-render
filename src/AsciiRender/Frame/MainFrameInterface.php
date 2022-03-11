<?php
declare(strict_types=1);

namespace AsciiRender\Frame;

use AsciiRender\Dto\Point;

interface MainFrameInterface extends Resizable
{
    public function fill(): void;

    public function addFrame(Frame $frame, Point $position): void;

    public function format(): string;
}
