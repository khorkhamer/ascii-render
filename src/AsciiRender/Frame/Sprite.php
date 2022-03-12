<?php
declare(strict_types=1);

namespace AsciiRender\Frame;

class Sprite extends Frame
{
    const MAP = [
        '>' => '<',
        '<' => '>',
        '\\' => '/',
        '/' => '\\',
        '(' => ')',
        ')' => '(',
        '[' => ']',
        ']' => '[',
        '{' => '}',
        '}' => '{',
    ];

    public function __construct(string $string)
    {
        $string = trim($string, "\n");
        $lines = explode("\n", $string);
        $this->lines = array_map(function ($line) {
            return str_split($line);
        }, $lines);
    }

    public function reverse(): void
    {
        foreach ($this->lines as &$line) {
            foreach ($line as &$char) {
                if ($reversedChar = self::MAP[$char]) {
                    $char = $reversedChar;
                }
            }
            $line = array_reverse($line);
        }
    }
}
