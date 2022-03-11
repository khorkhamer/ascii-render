<?php
declare(strict_types=1);

namespace App\Frame;

use App\Dto\Point;

interface WindowInterface extends Resizable
{
    public function addFrame(Frame $item, Point $position): void;
}
