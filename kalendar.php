<?php
#header("Content-Type: image/svg+xml");
#header('Content-Disposition: attachment; filename="bogomili-kalendar.svg"');

require_once('calculate.php'); 

global $step, $isleapbg;
if (!$step) { $step = 150;}
$gap = 5;
$margin = -20;
$radius = $step * sqrt(2) / 2;
$cellsize = $step * 4 / 27;
$fontsize = round($cellsize * 5 / 8, 0, PHP_ROUND_HALF_DOWN);
$fontsize = $fontsize <= 3 ? 12 : $fontsize;

$colorpletenica = "rgb(194,74,74)";
#$colorpletenica = "rgb(144,24,44)";
#$colorpletenica = "rgb(109,19,26)";
#$colorpletenica = "rgb(86,1,11)";
#$colorpletenica   = "rgb(76,0,9)";
$colorborders   = "rgb(76,0,9)";
$colormonths    = "rgb(76,0,9)";

function mrusnitsi($x, $y, $name, $leap) {
  global $fontsize, $cellsize;
  $linecolor = "black";
  $linewidth = 1;
  $fontgap = ($cellsize - $fontsize) / 2;
  $days = $leap ? 6 : 5;

  echo "<line x1=\"$x\" y1=\"".($y+$cellsize * 1)."\"  x2=\"".($x + $cellsize * $days)."\" y2=\"".($y + $cellsize * 1)."\" stroke=\"$linecolor\" stroke-width=\"$linewidth\" />\n";
  echo "<line x1=\"$x\" y1=\"".($y+$cellsize * 2)."\"  x2=\"".($x + $cellsize * $days)."\" y2=\"".($y + $cellsize * 2)."\" stroke=\"$linecolor\" stroke-width=\"$linewidth\" />\n";

  $names = array('ог', 'въ', 'ну', 'во', 'зе', 'ен');
  for ($i = 0; $i <= $days; $i++) {
    echo "<line x1=\"".($x + $cellsize * $i)."\" y1=\"".($y+$cellsize/($i == 0 || $i == $days? 1 : 2))."\"  x2=\"".($x + $cellsize * $i)."\" y2=\"".($y + $cellsize * 2)."\" stroke=\"$linecolor\" stroke-width=\"$linewidth\" />\n";
    if ($i != $days) {
       echo "<text x=\"".($x + $cellsize * ($i) + $fontgap)."\" y=\"".($y + $cellsize * 2 - $fontgap)."\" class=\"week\">".($i+1)."</text>\n";
       echo "<text x=\"".($x + $cellsize * ($i) + $fontgap)."\" y=\"".($y + $cellsize - $fontgap)."\" class=\"weekday\">".($names[$i])."</text>\n";
    }
  }
  echo "<text x=\"".($x + $cellsize/2)."\" y=\"".($y - $fontgap)."\" class=\"month\">$name</text>\n";
}

function month($x, $y, $name) {
  global $fontsize, $cellsize;
  $linecolor = "black";
  $linewidth = 1;
  $fontgap = ($cellsize - $fontsize) / 2;


  echo "<rect x=\"".($x + 5*$cellsize)."\" y=\"".($y+$cellsize)."\" width=\"".$cellsize."\" height=\"".($cellsize*6)."\" style=\"fill:rgb(255,100,100, 0.4);stroke-width:0;\" />\n";

  #echo "<line x1=\"$x\" y1=\"".($y+$cellsize * 0)."\"  x2=\"".($x + $cellsize * 6)."\" y2=\"".($y + $cellsize * 0)."\" stroke=\"$linecolor\" stroke-width=\"$linewidth\" />\n";
  echo "<line x1=\"$x\" y1=\"".($y+$cellsize * 1)."\"  x2=\"".($x + $cellsize * 6)."\" y2=\"".($y + $cellsize * 1)."\" stroke=\"$linecolor\" stroke-width=\"$linewidth\" />\n";
  echo "<line x1=\"$x\" y1=\"".($y+$cellsize * 2)."\"  x2=\"".($x + $cellsize * 6)."\" y2=\"".($y + $cellsize * 2)."\" stroke=\"$linecolor\" stroke-width=\"$linewidth\" />\n";
  echo "<line x1=\"$x\" y1=\"".($y+$cellsize * 3)."\"  x2=\"".($x + $cellsize * 6)."\" y2=\"".($y + $cellsize * 3)."\" stroke=\"$linecolor\" stroke-width=\"$linewidth\" />\n";
  echo "<line x1=\"$x\" y1=\"".($y+$cellsize * 4)."\"  x2=\"".($x + $cellsize * 6)."\" y2=\"".($y + $cellsize * 4)."\" stroke=\"$linecolor\" stroke-width=\"$linewidth\" />\n";
  echo "<line x1=\"$x\" y1=\"".($y+$cellsize * 5)."\"  x2=\"".($x + $cellsize * 6)."\" y2=\"".($y + $cellsize * 5)."\" stroke=\"$linecolor\" stroke-width=\"$linewidth\" />\n";
  echo "<line x1=\"$x\" y1=\"".($y+$cellsize * 6)."\"  x2=\"".($x + $cellsize * 6)."\" y2=\"".($y + $cellsize * 6)."\" stroke=\"$linecolor\" stroke-width=\"$linewidth\" />\n";
  echo "<line x1=\"$x\" y1=\"".($y+$cellsize * 7)."\"  x2=\"".($x + $cellsize * 6)."\" y2=\"".($y + $cellsize * 7)."\" stroke=\"$linecolor\" stroke-width=\"$linewidth\" />\n";

  echo "<line x1=\"".($x                )."\" y1=\"".($y+$cellsize  )."\"  x2=\"".($x                )."\" y2=\"".($y + $cellsize * 7)."\" stroke=\"$linecolor\" stroke-width=\"$linewidth\" />\n";
  echo "<line x1=\"".($x + $cellsize * 1)."\" y1=\"".($y+$cellsize/2)."\"  x2=\"".($x + $cellsize * 1)."\" y2=\"".($y + $cellsize * 7)."\" stroke=\"$linecolor\" stroke-width=\"$linewidth\" />\n";
  echo "<line x1=\"".($x + $cellsize * 2)."\" y1=\"".($y+$cellsize/2)."\"  x2=\"".($x + $cellsize * 2)."\" y2=\"".($y + $cellsize * 7)."\" stroke=\"$linecolor\" stroke-width=\"$linewidth\" />\n";
  echo "<line x1=\"".($x + $cellsize * 3)."\" y1=\"".($y+$cellsize/2)."\"  x2=\"".($x + $cellsize * 3)."\" y2=\"".($y + $cellsize * 7)."\" stroke=\"$linecolor\" stroke-width=\"$linewidth\" />\n";
  echo "<line x1=\"".($x + $cellsize * 4)."\" y1=\"".($y+$cellsize/2)."\"  x2=\"".($x + $cellsize * 4)."\" y2=\"".($y + $cellsize * 7)."\" stroke=\"$linecolor\" stroke-width=\"$linewidth\" />\n";
  echo "<line x1=\"".($x + $cellsize * 5)."\" y1=\"".($y+$cellsize/2)."\"  x2=\"".($x + $cellsize * 5)."\" y2=\"".($y + $cellsize * 7)."\" stroke=\"$linecolor\" stroke-width=\"$linewidth\" />\n";
  echo "<line x1=\"".($x + $cellsize * 6)."\" y1=\"".($y+$cellsize  )."\"  x2=\"".($x + $cellsize * 6)."\" y2=\"".($y + $cellsize * 7)."\" stroke=\"$linecolor\" stroke-width=\"$linewidth\" />\n";

  echo "<text x=\"".($x + $cellsize * 2)."\" y=\"".($y - $fontgap)."\" class=\"month\">$name</text>\n";

  echo "<text x=\"".($x + $fontgap)."\" y=\"".($y + $cellsize - $fontgap)."\" class=\"weekday\">no</text>";
  echo "<text x=\"".($x + $cellsize * 1 + $fontgap)."\" y=\"".($y + $cellsize - $fontgap)."\" class=\"weekday\">вт</text>\n";
  echo "<text x=\"".($x + $cellsize * 2 + $fontgap)."\" y=\"".($y + $cellsize - $fontgap)."\" class=\"weekday\">cp</text>\n";
  echo "<text x=\"".($x + $cellsize * 3 + $fontgap)."\" y=\"".($y + $cellsize - $fontgap)."\" class=\"weekday\">чe</text>\n";
  echo "<text x=\"".($x + $cellsize * 4 + $fontgap)."\" y=\"".($y + $cellsize - $fontgap)."\" class=\"weekday\">ne</text>\n";
  echo "<text x=\"".($x + $cellsize * 5 + $fontgap)."\" y=\"".($y + $cellsize - $fontgap)."\" class=\"weekday\">нe</text>\n";

  echo "<text x=\"".($x + $cellsize * 0 + $fontgap)."\" y=\"".($y + $cellsize * 2 - $fontgap)."\" class=\"week\">1</text>\n";
  echo "<text x=\"".($x + $cellsize * 1 + $fontgap)."\" y=\"".($y + $cellsize * 2 - $fontgap)."\" class=\"week\">2</text>\n";
  echo "<text x=\"".($x + $cellsize * 2 + $fontgap)."\" y=\"".($y + $cellsize * 2 - $fontgap)."\" class=\"week\">3</text>\n";
  echo "<text x=\"".($x + $cellsize * 3 + $fontgap)."\" y=\"".($y + $cellsize * 2 - $fontgap)."\" class=\"week\">4</text>\n";
  echo "<text x=\"".($x + $cellsize * 4 + $fontgap)."\" y=\"".($y + $cellsize * 2 - $fontgap)."\" class=\"week\">5</text>\n";
  echo "<text x=\"".($x + $cellsize * 5 + $fontgap)."\" y=\"".($y + $cellsize * 2 - $fontgap)."\" class=\"week\">6</text>\n";

  echo "<text x=\"".($x + $cellsize * 0 + $fontgap)."\" y=\"".($y + $cellsize * 3 - $fontgap)."\" class=\"week\">7</text>\n";
  echo "<text x=\"".($x + $cellsize * 1 + $fontgap)."\" y=\"".($y + $cellsize * 3 - $fontgap)."\" class=\"week\">8</text>\n";
  echo "<text x=\"".($x + $cellsize * 2 + $fontgap)."\" y=\"".($y + $cellsize * 3 - $fontgap)."\" class=\"week\">9</text>\n";
  echo "<text x=\"".($x + $cellsize * 3 + $fontgap)."\" y=\"".($y + $cellsize * 3 - $fontgap)."\" class=\"week\">10</text>\n";
  echo "<text x=\"".($x + $cellsize * 4 + $fontgap)."\" y=\"".($y + $cellsize * 3 - $fontgap)."\" class=\"week\">11</text>\n";
  echo "<text x=\"".($x + $cellsize * 5 + $fontgap)."\" y=\"".($y + $cellsize * 3 - $fontgap)."\" class=\"week\">12</text>\n";

  echo "<text x=\"".($x + $cellsize * 0 + $fontgap)."\" y=\"".($y + $cellsize * 4 - $fontgap)."\" class=\"week\">13</text>\n";
  echo "<text x=\"".($x + $cellsize * 1 + $fontgap)."\" y=\"".($y + $cellsize * 4 - $fontgap)."\" class=\"week\">14</text>\n";
  echo "<text x=\"".($x + $cellsize * 2 + $fontgap)."\" y=\"".($y + $cellsize * 4 - $fontgap)."\" class=\"week\">15</text>\n";
  echo "<text x=\"".($x + $cellsize * 3 + $fontgap)."\" y=\"".($y + $cellsize * 4 - $fontgap)."\" class=\"week\">16</text>\n";
  echo "<text x=\"".($x + $cellsize * 4 + $fontgap)."\" y=\"".($y + $cellsize * 4 - $fontgap)."\" class=\"week\">17</text>\n";
  echo "<text x=\"".($x + $cellsize * 5 + $fontgap)."\" y=\"".($y + $cellsize * 4 - $fontgap)."\" class=\"week\">18</text>\n";

  echo "<text x=\"".($x + $cellsize * 0 + $fontgap)."\" y=\"".($y + $cellsize * 5 - $fontgap)."\" class=\"week\">19</text>\n";
  echo "<text x=\"".($x + $cellsize * 1 + $fontgap)."\" y=\"".($y + $cellsize * 5 - $fontgap)."\" class=\"week\">20</text>\n";
  echo "<text x=\"".($x + $cellsize * 2 + $fontgap)."\" y=\"".($y + $cellsize * 5 - $fontgap)."\" class=\"week\">21</text>\n";
  echo "<text x=\"".($x + $cellsize * 3 + $fontgap)."\" y=\"".($y + $cellsize * 5 - $fontgap)."\" class=\"week\">22</text>\n";
  echo "<text x=\"".($x + $cellsize * 4 + $fontgap)."\" y=\"".($y + $cellsize * 5 - $fontgap)."\" class=\"week\">23</text>\n";
  echo "<text x=\"".($x + $cellsize * 5 + $fontgap)."\" y=\"".($y + $cellsize * 5 - $fontgap)."\" class=\"week\">24</text>\n";

  echo "<text x=\"".($x + $cellsize * 0 + $fontgap)."\" y=\"".($y + $cellsize * 6 - $fontgap)."\" class=\"week\">25</text>\n";
  echo "<text x=\"".($x + $cellsize * 1 + $fontgap)."\" y=\"".($y + $cellsize * 6 - $fontgap)."\" class=\"week\">26</text>\n";
  echo "<text x=\"".($x + $cellsize * 2 + $fontgap)."\" y=\"".($y + $cellsize * 6 - $fontgap)."\" class=\"week\">27</text>\n";
  echo "<text x=\"".($x + $cellsize * 3 + $fontgap)."\" y=\"".($y + $cellsize * 6 - $fontgap)."\" class=\"week\">28</text>\n";
  echo "<text x=\"".($x + $cellsize * 4 + $fontgap)."\" y=\"".($y + $cellsize * 6 - $fontgap)."\" class=\"week\">29</text>\n";
  echo "<text x=\"".($x + $cellsize * 5 + $fontgap)."\" y=\"".($y + $cellsize * 6 - $fontgap)."\" class=\"week\">30</text>\n";

  echo "<text x=\"".($x + $cellsize * 0 + $fontgap)."\" y=\"".($y + $cellsize * 7 - $fontgap)."\" class=\"week\">31</text>\n";
  echo "<text x=\"".($x + $cellsize * 1 + $fontgap)."\" y=\"".($y + $cellsize * 7 - $fontgap)."\" class=\"week\">32</text>\n";
  echo "<text x=\"".($x + $cellsize * 2 + $fontgap)."\" y=\"".($y + $cellsize * 7 - $fontgap)."\" class=\"week\">33</text>\n";
  echo "<text x=\"".($x + $cellsize * 3 + $fontgap)."\" y=\"".($y + $cellsize * 7 - $fontgap)."\" class=\"week\">34</text>\n";
  echo "<text x=\"".($x + $cellsize * 4 + $fontgap)."\" y=\"".($y + $cellsize * 7 - $fontgap)."\" class=\"week\">35</text>\n";
  echo "<text x=\"".($x + $cellsize * 5 + $fontgap)."\" y=\"".($y + $cellsize * 7 - $fontgap)."\" class=\"week\">36</text>\n";


}

function currentday() {
  global $daybg, $monthbg, $cellsize, $margin, $step;
  $startx = $margin;
  $starty = $margin;
  if ($monthbg ==0)        { $startx = $margin + $step *1.5; $starty = $margin + $step * 0.5; } 
  else if ($monthbg ==  1) { $startx = $margin + $step *3.5; $starty = $margin + $step * 0.5; }
  else if ($monthbg ==  2) { $startx = $margin + $step *1.5; $starty = $margin + $step * 2.5; }
  else if ($monthbg ==  3) { $startx = $margin + $step *3.5; $starty = $margin + $step * 2.5; }
  else if ($monthbg ==  4) { $startx = $margin + $step *5.5; $starty = $margin + $step * 2.5; }
  else if ($monthbg ==  5) { $startx = $margin + $step *2.5; $starty = $margin + $step * 3.5; }
  else if ($monthbg ==  6) { $startx = $margin + $step *4.5; $starty = $margin + $step * 3.5; }
  else if ($monthbg ==  7) { $startx = $margin + $step *1.5; $starty = $margin + $step * 4.5; }
  else if ($monthbg ==  8) { $startx = $margin + $step *3.5; $starty = $margin + $step * 4.5; }
  else if ($monthbg ==  9) { $startx = $margin + $step *5.5; $starty = $margin + $step * 4.5; }
  else if ($monthbg == 10) { $startx = $margin + $step *3.5; $starty = $margin + $step * 6.5; }
  $x = $startx + (($daybg - 1 )% 6) * $cellsize;
  $y = $starty + ((($daybg - 1) - (($daybg - 1)%6))  / 6) * $cellsize + $cellsize; 
  echo "<rect x=\"".($x)."\" y=\"".($y)."\" width=\"".$cellsize."\" height=\"".$cellsize."\" style=\"fill:rgb(245,90,90);stroke-width:3;stroke:rgb(41,20,20)\" />\n";
}

echo '<?xml version="1.0" encoding="UTF-8" standalone="no"?>';
?>
<svg height="<?php echo $margin + $step * 8;?>" width="<?php echo $margin + $step * 7.5;?>"
  xmlns:svg="http://www.w3.org/2000/svg"
  xmlns="http://www.w3.org/2000/svg">
  <style>
    @font-face {
        font-family: notos;
        src: url('fonts/notoserif-regular.ttf');
    }
    text {
        font-family: notos;
        font-weight: bold;
    }
    .weekday { font: bold <?php echo $fontsize;?>px times; fill: brown;font-family: notos, times; }
    .week { font: <?php echo $fontsize;?>px times; fill: black; font-family: notos, times;}
    .month { font: <?php echo $fontsize * 2;?>px times; fill: black; font-family: notos, times;}
  </style>
  <line x1="<?php echo $margin + 4 * $step - $gap?>" y1="<?php echo $margin + 2 * $step - $gap;?>" x2="<?php echo $margin + 3.5 * $step;?>" y2="<?php echo $margin + 1.5 * $step;?>" style="stroke:<?php echo $colorpletenica;?>;stroke-width:10" />

  <!-- arc up -->
  <path d="M <?php echo $margin + 3.5 * $step;?> <?php echo $margin + 1.5 * $step;?>   A <?php echo $radius;?> <?php echo $radius;?> 0 1 1 <?php echo $margin + 4.5 * $step;?> <?php echo $margin + 1.5 *$step;?>" stroke="<?php echo $colorpletenica;?>" fill="transparent" stroke-width="10" fill-opacity="0.5"/>

  <line x1="<?php echo $margin + 4.5 * $step;?>"      y1="<?php echo $margin + 1.5 *$step;?>"     x2="<?php echo $margin + 3 * $step + $gap;?>" y2="<?php echo $margin + 3 * $step - $gap;?>" style="stroke:<?php echo $colorpletenica;?>;stroke-width:10" />
  <line x1="<?php echo $margin + 3 * $step - $gap;?>" y1="<?php echo $margin + 3*$step + $gap;?>" x2="<?php echo $margin + $step;?>"            y2="<?php echo $margin + 5 * $step;?>"        style="stroke:<?php echo $colorpletenica;?>;stroke-width:10" />

  <!-- arc left down -->
  <path d="M <?php echo $margin + $step;?> <?php echo $margin + 5 * $step;?>   A <?php echo $radius;?> <?php echo $radius;?> 0 1 0 <?php echo $margin + 2 * $step;?> <?php echo $margin + 6 * $step;?>" stroke="<?php echo $colorpletenica;?>" fill="transparent" stroke-width="10" fill-opacity="0.5"/>

  <line x1="<?php echo $margin + 2 * $step;?>"        y1="<?php echo $margin + 6 * $step;?>"        x2="<?php echo $margin + 3 * $step - $gap;?>" y2="<?php echo $margin + 5 * $step + $gap;?>" style="stroke:<?php echo $colorpletenica;?>;stroke-width:10" />
  <line x1="<?php echo $margin + 3 * $step + $gap;?>" y1="<?php echo $margin + 5 * $step - $gap;?>" x2="<?php echo $margin + 5 * $step - $gap;?>" y2="<?php echo $margin + 3 * $step + $gap;?>" style="stroke:<?php echo $colorpletenica;?>;stroke-width:10" />
  <line x1="<?php echo $margin + 5 * $step + $gap;?>" y1="<?php echo $margin + 3 * $step - $gap;?>" x2="<?php echo $margin + 6 * $step;?>"        y2="<?php echo $margin + 2 * $step;?>"        style="stroke:<?php echo $colorpletenica;?>;stroke-width:10" />

  <!-- arc right up-->
  <path d="M <?php echo $margin + 6 * $step;?> <?php echo $margin + 2 * $step;?>   A <?php echo $radius;?> <?php echo $radius;?> 0 1 1 <?php echo $margin + 7 * $step;?> <?php echo $margin + 3 * $step;?>" stroke="<?php echo $colorpletenica;?>" fill="transparent" stroke-width="10" fill-opacity="0.5"/>

  <line x1="<?php echo $margin + 7 * $step;?>"        y1="<?php echo $margin + 3 * $step;?>"        x2="<?php echo $margin + 5 * $step + $gap;?>" y2="<?php echo $margin + 5 * $step - $gap;?>" style="stroke:<?php echo $colorpletenica;?>;stroke-width:10" />
  <line x1="<?php echo $margin + 5 * $step - $gap;?>" y1="<?php echo $margin + 5 * $step + $gap;?>" x2="<?php echo $margin + 3.5 * $step;?>"      y2="<?php echo $margin + 6.5 * $step;?>" style="stroke:<?php echo $colorpletenica;?>;stroke-width:10" />

  <!-- arc down -->
  <path d="M <?php echo $margin + 3.5 * $step;?> <?php echo $margin + 6.5 * $step;?>   A <?php echo $radius;?> <?php echo $radius;?> 0 1 0 <?php echo $margin + 4.5 * $step?> <?php echo $margin + 6.5 * $step;?>" stroke="<?php echo $colorpletenica;?>" fill="transparent" stroke-width="10" fill-opacity="0.5"/>

  <line x1="<?php echo $margin + 4.5 * $step?>" y1="<?php echo $margin + 6.5 * $step;?>" x2="<?php echo $margin + 4 * $step + $gap;?>" y2="<?php echo $margin + 6 * $step + $gap;?>" style="stroke:<?php echo $colorpletenica;?>;stroke-width:10" />
  <line x1="<?php echo $margin + 4 * $step - $gap;?>" y1="<?php echo $margin + 6 * $step - $gap;?>" x2="<?php echo $margin + 2 * $step + $gap;?>" y2="<?php echo $margin + 4 * $step + $gap;?>" style="stroke:<?php echo $colorpletenica;?>;stroke-width:10" />
  <line x1="<?php echo $margin + 2 * $step - $gap;?>" y1="<?php echo $margin + 4 * $step - $gap;?>" x2="<?php echo $margin + $step;?>" y2="<?php echo $margin + 3 * $step;?>" style="stroke:<?php echo $colorpletenica;?>;stroke-width:10" />

  <!-- arc left up -->
  <path d="M <?php echo $margin + $step;?> <?php echo $margin + 3 * $step;?>   A <?php echo $radius;?> <?php echo $radius;?> 0 1 1 <?php echo $margin + 2 * $step;?> <?php echo $margin + 2 * $step;?>" stroke="<?php echo $colorpletenica;?>" fill="transparent" stroke-width="10" fill-opacity="0.5"/>

  <line x1="<?php echo $margin + 2 * $step;?>" y1="<?php echo $margin + 2 * $step;?>" x2="<?php echo $margin + 4 * $step - $gap;?>" y2="<?php echo $margin + 4 * $step - $gap;?>" style="stroke:<?php echo $colorpletenica;?>;stroke-width:10" />
  <line x1="<?php echo $margin + 4 * $step + $gap;?>" y1="<?php echo $margin + 4 * $step + $gap;?>" x2="<?php echo $margin + 6 * $step;?>" y2="<?php echo $margin + 6 * $step;?>" style="stroke:<?php echo $colorpletenica;?>;stroke-width:10" />

  <!-- arc right down -->
  <path d="M <?php echo $margin + 6 * $step;?> <?php echo $margin + 6 * $step;?>   A <?php echo $radius;?> <?php echo $radius;?> 0 1 0 <?php echo $margin + 7 * $step;?> <?php echo $margin + 5 * $step;?>" stroke="<?php echo $colorpletenica;?>" fill="transparent" stroke-width="10" fill-opacity="0.5"/>

  <line x1="<?php echo $margin + 7 * $step;?>" y1="<?php echo $margin + 5 * $step;?>" x2="<?php echo $margin + 6 * $step + $gap;?>" y2="<?php echo $margin + 4 * $step + $gap;?>" style="stroke:<?php echo $colorpletenica;?>;stroke-width:10" />
  <line x1="<?php echo $margin + 6 * $step - $gap;?>" y1="<?php echo $margin + 4 * $step - $gap;?>" x2="<?php echo $margin + 4 * $step + $gap;?>" y2="<?php echo $margin + 2 * $step + $gap;?>" style="stroke:<?php echo $colorpletenica;?>;stroke-width:10" />

<?php 

currentday();

month($margin + $step * 3.5,$margin + $step * 0.5, "яp");
month($margin + $step * 1.5,$margin + $step * 2.5, "фuap");
month($margin + $step * 3.5,$margin + $step * 2.5, "мap");
month($margin + $step * 5.5,$margin + $step * 2.5, "pap");
month($margin + $step * 2.5,$margin + $step * 3.5, "юap");
month($margin + $step * 4.5,$margin + $step * 3.5, "aвpap");
month($margin + $step * 1.5,$margin + $step * 4.5, "ceвap");
month($margin + $step * 3.5,$margin + $step * 4.5, "okap");
month($margin + $step * 5.5,$margin + $step * 4.5, "нoap");
month($margin + $step * 3.5,$margin + $step * 6.5, "дekap");

mrusnitsi($margin + $step * 1.5, $margin + $step * 0.5, "мръсни дни", $isleapbg);

?>


</svg>
