<?php
declare(strict_types=1);

namespace AsciiRender\Pool;

use AsciiRender\Dto\FrameItem;
use AsciiRender\Frame\MainFrame;

class Pool
{
    /** @var FrameItem[] */
    private array $frameItems;

    private MainFrame $mainFrame;

    public function __construct(int $width, int $height)
    {
        $this->mainFrame = new MainFrame($width, $height);
        $this->frameItems = [];
    }

    protected function push(FrameItem $frameItem): void
    {
        $this->frameItems[] = $frameItem;
    }

    public function fill(): void
    {
        $this->mainFrame->fill();
        $this->frameItems = [];
    }

    public function output(): string
    {
        foreach ($this->frameItems as $frameItem) {
            $this->mainFrame->addFrame($frameItem->getFrame(), $frameItem->getPosition());
        }

        return $this->mainFrame->format();
    }
}
