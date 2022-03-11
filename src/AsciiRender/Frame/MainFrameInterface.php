<?php
declare(strict_types=1);

namespace App\Frame;

use App\Dto\Point;

interface MainFrameInterface extends Resizable
{
    public function fill(): void;

    public function addFrame(Frame $frame, Point $position): void;

    public function format(): string;
}
