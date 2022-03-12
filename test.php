<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

$render = new \AsciiRender\GraphicSystem();
$listener = new \AsciiRender\InputSystem();
$screen = $render->createScreen();

$to =
"
 -> 
|  \
 == 
/  \
";

$to =
"
|\   
| \  
|  \ 
|   \
|    \
|     |
|    /
|   / 
|  /  
| /
|/
";

$q =
"
 ---
|   |
|   |
|   |
 ---
";

$bullet =
"
---
|    )
---
";

$to = new \AsciiRender\Frame\Sprite($to);
$sprite = $to;
$q = new \AsciiRender\Frame\Sprite($q);

$running = true;
$x =  10;
$y = 10;
$speed = 0.01;
$i = $speed;
$bulAmin = function () {
};
$bX = 1;
$bY = 11.0;
$t = false;
$tt = true;
while ($running) {
    $screen->add($sprite, (int)$x, (int)$y, 1);
    if ($tt)
        $screen->add($q, 30, 100, 10000000);
    $render->clear();
    $render->display($screen);
    if ($char = $listener->listen()) {
        if ($char === 'e' || $char === 'E') {
            $running = false;
        }
        if ($char === 'w') {
            $x--;
        }
        if ($char === 's') {
            $x++;
        }
        if ($char === 'q') {
            unset($b);
            $bX = $x + 4;
            $bY = $y + 4;
            $b = new \AsciiRender\Frame\Sprite($bullet);
            $t = true;
            $bulAmin = function () use ($screen, $b, $x, $y, $bX, &$bY, &$t) {
                if ($bY > 150) {
                    unset($b);
                    $t = false;
                    $bY = 10.0;
                    return;
                }
                $screen->add($b, $bX , (int)$bY, 100);
                $bY += 0.1;
            };
        }
    }
    if ($bY >= 100 && $bX > 27 && $bX < 35) {
        $t = false;
        $tt = false;
    }
    if ($t) {
        $bulAmin();
    }
}

$render->destroy("Hello в рот!\n");
