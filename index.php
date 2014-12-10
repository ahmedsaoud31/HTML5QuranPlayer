<!--
 - @author		Ahmed Aboelsaoud Ahmed <ahmedsaoud31@gmail.com>
 - @copyright	© 2014
 - @license		GPL
 - @license		http://opensource.org/licenses/gpl-license.php
 - @link		https://github.com/ahmedsaoud31/HTML5QuranPlayer
 - @version		0.0.1
-->
<!DOCTYPE html>
<html dir="rtl">
<head>
	<meta charset="utf-8" />
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/code.js"></script>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<title>Quran Play</title>
	<meta name="description" content="Quran Play"/>
    <meta name="keywords" content="Quran Play"/>
</head>
<body>
<?php include_once('code.php'); ?>
<div id="HTML5QuranPlayer">
	<div>
		<div class="title">المقرئ</div>
		<select name="mokrName" id="mokrName" class="mokrNameSelectFormat">
			<!-- ............................. -->
		</select>
	</div>
	
	<div>
		<div class="title">الرواية</div>
		<div class="select" >
		 <select name="rwayaName" id="rwayaName" onchange="rwayaSet();" class="rwayaSelectFormat">
			<!-- ............................. -->
		 </select>
		 </div>
	</div>
	
	<div>
		<div class="title">السور</div>
		<select name="imageName" id="imageName">
			<!-- ............................. -->
		</select>
	</div>
	
	<div class="title">
		<input type="checkbox" value="ON" id="fullImages"><label> المصحف كاملاً</label>
	</div>
	
	<div class="title">
		<span id="loopSign" data-sign="0">
			<span></span>
		</span>
	</div>
	
	<div class="title">
		<span id="audioWrite" dir="ltr" align="center">
			<audio id="audioWrite2" controls autoplay autobuffer preload src="">
		</span>
	</div>
</div>
</body>
</html>
