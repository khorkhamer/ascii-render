<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

$static =
"  0
/   \
 =+=
 | |
";


$up =
"  ^
/   \
 ===
 | |
";

$to =
" ->
|  \
 ==
/  \
";

$from =
" <-
/  |
 ==
/  \
";
$map =
"
controls: w, d, s, a
_______________________________________________________________________________________
   |                                                                                  |
   |----------------------------------------------------------------------------------|
  /                                                                                   |
 /                                                                                    |
/                                                                                     |
_________________________________________________________________________             |
                                                                        |             |
                                                                        |             |
                                                                        |             |
                                                                        |             |
                                                                        |             |
                                                                        |             |
                                                                     ----             ----
                                                                    |                     |
                                                                    |                     |
                                                                    |                     |
                                                                    |                     |
                                                                    |                     |
                                                                    |                     |
                                                                    |                     |
                                                                    |                     |
                                                                    |                     |
                                                                    |_____________________|
";

$present =
"

 ????
/####\
";

$presentUp =
"
  ??
 ?  ?
/####\
";

$win =
"
---             ---      ---        ----   ---
\  \    ---    /  /     |   |      |     \|   |
 \  \  /   \  /  /      |   |      |  |\      |
  \      _      /       |   |      |  | \     |
   \___/   \___/        |___|      |__|  \____|
   
   
                      enter 'w'
";


$render = new \AsciiRender\GraphicSystem();
$listener = new \AsciiRender\InputSystem();
$screen = $render->createScreen();
$to = new \AsciiRender\Frame\Sprite($to);
$from = new \AsciiRender\Frame\Sprite($from);
$stand = new \AsciiRender\Frame\Sprite($static);
$up = new \AsciiRender\Frame\Sprite($up);
$map = new \AsciiRender\Frame\Sprite($map);
$win = new \AsciiRender\Frame\Sprite($win);
$present = new \AsciiRender\Frame\Sprite($present);
$presentUp = new \AsciiRender\Frame\Sprite($presentUp);
$_ = [$present, $presentUp];
$pr = $present;
$x = 5.0;
$y = 12.0;
$t = 10;
$speed = 1;
$sprite = $to;
$now = time();
$d = 1;
while (true) {
//    $d = time() - $now;
//    if ($x >= 22 && $y >= 75 && $y <= 83) {
//        $screen->add($win, 25, 70, 10000);
//        $render->clear();
//        $render->display($screen);
//        while (true) {
//            $char = $listener->listen();
//            if ($char === 'w') {
//                $render->destroy("You win!!!\n");
//            }
//        }
//    }
    $screen->add($map, 3, 1, 1);
    $screen->add($sprite, (int)$x, (int)$y, 3);
//    $screen->add($pr, 24, 77, 2);
    $render->clear();
    $render->display($screen);
    $char = $listener->listen();
    switch ($char) {
        case 'w':
            $sprite = $up;
            $x -= $speed;
            break;
        case 'd':
            $sprite = $to;
            $y += $speed;
            break;
        case 's':
            $sprite = $stand;
            $x += $speed;
            break;
        case 'a':
            $sprite = $from;
            $y -= $speed;
            break;
        case 'e':
            $render->destroy("Bye!\n");
    }
//    if ($t === 0) {
//        $pr = array_pop($_);
//        array_unshift($_, $pr);
//        $t = 10;
//    }
//    $t -= $d * 5;
}
