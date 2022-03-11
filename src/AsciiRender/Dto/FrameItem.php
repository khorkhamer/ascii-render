<?php
declare(strict_types=1);

namespace App\Dto;

use App\Frame\Frame;

class FrameItem
{
    public function __construct(
        private Frame $frame,
        private Point $position,
    ) { }

    /**
     * @return Frame
     */
    public function getFrame(): Frame
    {
        return $this->frame;
    }

    /**
     * @return Point
     */
    public function getPosition(): Point
    {
        return $this->position;
    }
}