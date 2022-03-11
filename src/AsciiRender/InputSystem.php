<?php
declare(strict_types=1);

namespace AsciiRender;

use PhpSchool\Terminal\IO\ResourceInputStream;
use PhpSchool\Terminal\IO\ResourceOutputStream;
use PhpSchool\Terminal\Terminal;
use PhpSchool\Terminal\UnixTerminal;

class InputSystem
{
    private Terminal $terminal;

    public function __construct()
    {
        $this->terminal = new UnixTerminal(new ResourceInputStream(), new ResourceOutputStream());
        stream_set_blocking(STDIN, false);
    }

    public function listen(): string
    {
        return $this->terminal->read(8);
    }
}
