<?php
declare(strict_types=1);

namespace AsciiRender\Pool;

use AsciiRender\Dto\FrameItem;

interface PoolInterface
{
    public function fill(): void;

    public function push(FrameItem $frameItem): void;

    public function resize(int $width, int $height): void;

    public function format(): string;
}
