<?php
declare(strict_types=1);

namespace App;

use App\Pool\Screen;
use PhpSchool\Terminal\IO\ResourceInputStream;
use PhpSchool\Terminal\IO\ResourceOutputStream;
use PhpSchool\Terminal\Terminal;
use PhpSchool\Terminal\UnixTerminal;

class GraphicSystem
{
    private Terminal $terminal;

    public function __construct()
    {
        $this->terminal = new UnixTerminal(new ResourceInputStream(), new ResourceOutputStream());
        $this->terminal->disableCanonicalMode();
        $this->terminal->disableEchoBack();
        $this->terminal->disableCursor();
        pcntl_signal(SIGINT, fn() => 1);
    }

    public function createScreen(): Screen
    {
        return new Screen($this->terminal->getWidth(), $this->terminal->getHeight());
    }

    public function destroy(string $text = "Die!\n"): void
    {
        $this->terminal->moveCursorToTop();
        $this->terminal->clearDown();
        $this->terminal->enableCanonicalMode();
        $this->terminal->enableEchoBack();
        $this->terminal->enableCursor();
        die($text);
    }

    public function clear(): void
    {
        $this->terminal->clearDown();
    }

    public function display(Screen $screen): void
    {
        $this->terminal->moveCursorToTop();
        $this->terminal->write($screen->output());
        $screen->fill();
    }
}
