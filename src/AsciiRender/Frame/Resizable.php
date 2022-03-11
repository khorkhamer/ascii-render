<?php
declare(strict_types=1);

namespace AsciiRender\Frame;

interface Resizable
{
    public function resize(int $width, int $height): void;
}
