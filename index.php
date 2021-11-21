<?php 
require_once('calculate.php'); 
$step = 115;
?><html>
<head>
  <style>
   @font-face {
     font-family: izhitsa;
     src: url(fonts/izhitsa-cyrillic.ttf);
   }
    @font-face {
        font-family: notos;
        src: url('fonts/notoserif-regular.ttf');
    }
    @font-face {
        font-family: "Harlow Solid Italic";
        src: url('fonts/harlow.ttf');
    }
    text {
        font-family: notos;
        font-weight: bold;
    }
   .oldbg
   {
     text-align: justifjustify;
     font-family: "izhitsa", "Times New Roman", "Times", "serif";
   }
  </style>
</head>
<!-- <body style="background-color: rgb(255, 254, 254);background-image: url(seamless-wood-background-1.jpg)"> -->
<body style="background-color: rgb(255, 254, 254);background-image: url(images/seamless-wood1.jpg);background-repeat:repeat;background-size: contain;font-family: notos;">
<div style="width: <?php echo 8*$step;?>px; border: 1px solid rgb(90, 40, 40);border-radius: 1em; margin-left: auto; margin-right: auto; background-color: rgba(254, 214, 214, 0.4);margin-bottom: 3em;">
  <div style="width: 20em; align: left;margin-left: 3em; float: left;">
      <h1 style="text-shadow: 3px 3px 1px rgb(220, 110, 110)">Богомилски календар<br/><?php echo $daybg;?>-<?php echo $monthbg;?>-<?php echo $yearbg;?></h1>
  </div>
  <div style="width: 22em; align: right;text-align: right;margin-right: 3em;margin-left: auto;">
      <h1 style="text-shadow: 3px 3px 1px rgb(220, 110, 110)"> Григориански календар<br/><?php echo $daygr;?>-<?php echo $monthgr;?>-<?php echo $yeargr;?></h1>
  </div>

  <?php include('kalendar.php');?>
  <div style="padding: 2em;">
  <div class="oldbg" style="max-width: 90%; padding: 1em; margin: 1em; background-color: rgba(257, 192, 150, 1); border: 1px solid rgb(90, 40, 40);border-radius: 1em;">
    <h2>Богомилският календар</h2>

    Според т. 1 част I от богомилското учение, годината се състояла от десет месеца.<br/><br/>

    Всеки месец е имал по 36 дни, а всяка седмица шест дни.<br/><br/>

    Наименованието на месеците е било: яр, фиар, мар, рар, юар, аврар, севар, окар, ноар и декар.<br/><br/>

    Според етап 36-и на част първа от мировозрението за сътворението на света, тези десет месеца и тям съответните божества са се назовавали и с други имена, както следва: ар (земята), шо (водата), му (слънцето), ко (зеленината), йо (трудът), хо (топлината), цо (плодът), ри (беритбата), со (пазарите), за (веселието). Тия названия на месеците са били изхвърлени от богомилите, като чужди на славянобългарския език, усвоен от тях.<br/><br/>

    Богомилите са или изхвърлили имената и на двете главни божества: Ра (творческата сила, бог на доброто) и Зо (разрушителната сила, бог на злото, демонът).<br/><br/>

    Последните две имена, дадени на двете главни богомилски божества, както и ония на десетте божества, споменати по-горе, са били от произход съвсем чужд на богомилите, поради което в глава I, т. 1 на богомилското учение изрично се забранява споменаването им, като се е разчитало, че така ще бъдат забравени.<br/><br/>

    След изтичането на десетте месеца по богомилския календар, прибавят се за обикновената година пет мъртви дни, без име, празници, посветени на силата на сътворението, а за високосната година се прибавя още един мъртъв ден, посветен на силата на разрушението.<br/><br/>

    Тия пет или шест мъртви дни в края на годината и сега се тачат от населението по някои места и нас и те пак се наричат мъртви дни, а някъде мръсни дни. Шестте седмици в месеца са имали по шест дни, които са се назовавали: понеделник, вторник, среду, четвъртък, петък и неделя. всеки шести ден е бил празник. Празнуването през работните пет дни в седмицата е било забранено. Наименованието на дните през календарната година с човешки имена е било също забранено.<br/><br/>

    Презвитер Козма твърди, че богомилите не са спазвали неделните дни и другите празници, установени от християните, което показва, че богомилският календар е бил действително такъв, какъвто го описахме. За него във всеки случай други данни не притежаваме.<br/><br/>

    Летоброенето на богомилите е почнало, според етап 33 от тяхното мировъзрение, от рождението на човековдъхновителя, т.е. от рождество Христово.<br/><br/>

    Главните божества на богомилите са били силата на сътворението и силата на разрушението, които не са носили никакви други имена.
  </div>
  <div class="oldbg" style="max-width: 90%; padding: 1em; margin: 1em; background-color: rgba(257, 192, 150, 1); border: 1px solid rgb(90, 40, 40);border-radius: 1em;">
    <h2>Пътят на богомилите</h2>
    <img src="images/path.jpg" style="max-width: 99%"/>
  </div>
  <div class="oldbg" style="max-width: 90%; padding: 1em; margin: 1em; background-color: rgba(257, 192, 150, 1); border: 1px solid rgb(90, 40, 40);border-radius: 1em;">
    <h2>Богомилско учение</h2>
    <a href="doc/bogomilstvo.doc">Богомилство</a>
  </div>
  <!-- Tracker -->
  <div style="margin-left:1em; padding-left: 1em;"><script src="https://efreecode.com/js.js" id="eXF-bogomili-0" async defer></script></div>
</div>
</body>
</html>
