<?php 
require_once('calculate.php'); 
$step = 115;
?><html>
<head>
</head>
<!-- <body style="background-color: rgb(255, 254, 254);background-image: url(seamless-wood-background-1.jpg)"> -->
<body style="background-color: rgb(255, 254, 254);background-image: url(seamless-wood1.jpg);background-repeat:repeat;background-size: contain;">
<div style="width: <?php echo 8*$step;?>px; border: 1px solid rgb(90, 40, 40);border-radius: 1em; margin-left: auto; margin-right: auto; background-color: rgba(254, 214, 214, 0.4);margin-bottom: 3em;">
  <div style="width: 20em; align: left;margin-left: 3em; float: left;">
      <h1 style="text-shadow: 3px 3px 1px rgb(220, 110, 110)">Богомилски календар <?php echo $daybg;?>-<?php echo $monthbg;?>-<?php echo $yearbg;?></h1>
  </div>
  <div style="width: 22em; align: right;text-align: right;margin-right: 3em;margin-left: auto;">
      <h1 style="text-shadow: 3px 3px 1px rgb(220, 110, 110)"> Григориански календар <?php echo $daygr;?>-<?php echo $monthgr;?>-<?php echo $yeargr;?></h1>
  </div>

  <?php include('kalendar.php');?>
  <center><h1 style="text-shadow: 3px 3px 1px rgb(220, 110, 110)">Богомилски календар</h1></center>
  <div style="padding: 2em;">
  Запазена е информация за богомилския календар. При него годината се дели на 10 месеца от по 36 дена и още 5 (при невисокосни години) или 6 (при високосни години) допълнителни дена, които  се наричат мръсни дни или "мръсници".
  Във всеки месец имаме 6 "седмици", като всяка от тях е от по 6 дена. Първите 5 дена на всяка седмица са работни (делнични дни). Техните имена са понеделник, вторник, сряда, четвъртък и петък. Шестият ден се нарича неделя и е почивен ден.
  <br/> <br/>
  <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>
  <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <div>
</div>
</body>
</html>
