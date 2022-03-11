<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';


$to = "
   ____
 |######\
 |#######|
  |###|___
 |########|
";

$from = "
    ____
  /######|
 |#######|
  ___|###|
 |########|
";


$render = new \AsciiRender\GraphicSystem();
$listener = new \AsciiRender\InputSystem();
$screen = $render->createScreen();
$to = new \AsciiRender\Frame\Sprite($to);
$from = new \AsciiRender\Frame\Sprite($from);
$x = 5;
$y = 5;
$sprite = $to;

while (true) {
    $screen->add($sprite, $x, $y);
    $render->clear();
    $render->display($screen);
    $char = $listener->listen();
    if ($char === 'e') {
        $render->destroy();
    }
    if ($char === 'w') {
        $x--;
    }
    if ($char === 'd') {
        $sprite = $to;
        $y++;
    }
    if ($char === 's') {
        $x++;
    }
    if ($char === 'a') {
        $sprite = $from;
        $y--;
    }
}
