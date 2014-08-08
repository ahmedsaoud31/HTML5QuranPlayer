<?php
/**
 * @author		Ahmed Aboelsaoud Ahmed <ahmedsaoud31@gmail.com>
 * @copyright	© 2014
 * @license		GPL
 * @license		http://opensource.org/licenses/gpl-license.php
 * @link		https://github.com/ahmedsaoud31/HTML5QuranPlayer
 * @version		0.0.1
 **/
	/*
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	*/
	$sitePath = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	include_once('config.php');
	$rwaya = array();
	$data = array();
	$moqre = array();
	$soar = array();
	$audioPath = 'audio';
	
	if(file_exists($audioPath) and is_dir($audioPath))
	{
		foreach(scandir($audioPath) as $value)
		{
			if($value != '.' and $value != '..' and is_dir($audioPath.'/'.$value))
			{
				foreach(scandir($audioPath.'/'.$value) as $value2)
				{
					if($value2 != '.' and $value2 != '..' and is_dir($audioPath.'/'.$value.'/'.$value2))
					{
						foreach(scandir($audioPath.'/'.$value.'/'.$value2) as $value3)
						{
							if(!is_dir($audioPath.'/'.$value.'/'.$value2.'/'.$value3))
							{
								$soar[] = $value3;
							}
						}
						$moqre[$value2] = $soar;
						$soar = array();
					}
				}
				$rwaya[$value] =  $moqre;
				$moqre = array();
			}
		}
	}
	else
	{
		echo "<h1>مجلد الصوتيات غير موجود</h1>";
	}
	foreach($rwaya as $key=>$value)
	{
		foreach($value as $key2=>$value2)
		{
			$count = count($value2);
			if($count == 114)
			{
				$data['some'][$key][$key2] = $rwaya[$key][$key2];
			}
			if($count > 0)
			{
				$data['all'][$key][$key2] = $rwaya[$key][$key2];
			}
		}
	}
	$data['defaultRwaya'] = $defaultRwaya;
?>
<script type="text/javascript">
	var defaultMokr = '';
	var count = 0;
	var json = {};
	var data = {};
	var path = '';
	var html = '';
	var html2 = '';
	var html3 = '';
	var temp = '';
	json = <?php echo json_encode($data); ?>;
	data = json.all;
	var defaultRwaya = json.defaultRwaya;
	path = '<?php echo $sitePath.$audioPath; ?>';
			var allSoar = {	'001':'الفاتحة',
						'002':'البقرة',
						'003':'آل عمران',
						'004':'النساء',
						'005':'المائدة',
						'006':'الأنعام',
						'007':'الأعراف',
						'008':'الأنفال',
						'009':'التوبة',
						'010':'يونس',
						'011':'هود',
						'012':'يوسف',
						'013':'الرعد',
						'014':'إبراهيم',
						'015':'الحجر',
						'016':'النحل',
						'017':'الإسراء',
						'018':'الكهف',
						'019':'مريم',
						'020':'طه',
						'021':'الأنبياء',
						'022':'الحج',
						'023':'المؤمنون',
						'024':'النّور',
						'025':'الفرقان',
						'026':'الشعراء',
						'027':'النّمل',
						'028':'القصص',
						'029':'العنكبوت',
						'030':'الرّوم',
						'031':'لقمان',
						'032':'السجدة',
						'033':'الأحزاب',
						'034':'سبأ',
						'035':'فاطر',
						'036':'يس',
						'037':'الصافات',
						'038':'ص',
						'039':'الزمر',
						'040':'غافر',
						'041':'فصّلت',
						'042':'الشورى',
						'043':'الزخرف',
						'044':'الدّخان',
						'045':'الجاثية',
						'046':'الأحقاف',
						'047':'محمد',
						'048':'الفتح',
						'049':'الحجرات',
						'050':'ق',
						'051':'الذاريات',
						'052':'الطور',
						'053':'النجم',
						'054':'القمر',
						'055':'الرحمن',
						'056':'الواقعة',
						'057':'الحديد',
						'058':'المجادلة',
						'059':'الحشر',
						'060':'الممتحنة',
						'061':'الصف',
						'062':'الجمعة',
						'063':'المنافقون',
						'064':'التغابن',
						'065':'الطلاق',
						'066':'التحريم',
						'067':'الملك',
						'068':'القلم',
						'069':'الحاقة',
						'070':'المعارج',
						'071':'نوح',
						'072':'الجن',
						'073':'المزّمّل',
						'074':'المدّثر',
						'075':'القيامة',
						'076':'الإنسان',
						'077':'المرسلات',
						'078':'النبأ',
						'079':'النازعات',
						'080':'عبس',
						'081':'التكوير',
						'082':'الإنفطار',
						'083':'المطفّفين',
						'084':'الإنشقاق',
						'085':'البروج',
						'086':'الطارق',
						'087':'الأعلى',
						'088':'الغاشية',
						'089':'الفجر',
						'090':'البلد',
						'091':'الشمس',
						'092':'الليل',
						'093':'الضحى',
						'094':'الشرح',
						'095':'التين',
						'096':'العلق',
						'097':'القدر',
						'098':'البينة',
						'099':'الزلزلة',
						'100':'العاديات',
						'101':'القارعة',
						'102':'التكاثر',
						'103':'العصر',
						'104':'الهمزة',
						'105':'الفيل',
						'106':'قريش',
						'107':'الماعون',
						'108':'الكوثر',
						'109':'الكافرون',
						'110':'النصر',
						'111':'المسد',
						'112':'الإخلاص',
						'113':'الفلق',
						'114':'النّاس'};
	//---------------------------------------------
	
	$(function(){
		
		function runQuran(){
			var sign = false;
			for(var i in data)
			{
				if(defaultRwaya == i){
					sign = true;
				}
			}
			for(var i in data)
			{
				if(!sign){
					defaultRwaya = i;
					sign = true;
				}
				if(defaultRwaya == i){
					html += '<option selected value="'+i+'">'+i+'</option>';
				}else{
					html += '<option value="'+i+'">'+i+'</option>';
				}
			}
			$('#rwayaName').html(html);
			html = '';
			count = 0;
			for(var i in data[defaultRwaya])
			{
				if(count == 0){
					defaultMokr = i;
				}
				html += '<option value="'+i+'">'+i+'</option>';
				++count;
			}
			$('#mokrName').html(html);
			html = '';
			temp = '';
			for(var i in data[defaultRwaya][defaultMokr])
			{
				temp = data[defaultRwaya][defaultMokr][i];
				temp = temp[0]+temp[1]+temp[2];
				html += '<option value="'+data[defaultRwaya][defaultMokr][i]+'">'+allSoar[temp]+'</option>';
			}
			$('#imageName').html(html);
			html = 	path+'/'
					+defaultRwaya+'/'
					+defaultMokr+'/'
					+data[defaultRwaya][defaultMokr][0];
			$('#audioWrite2').attr('src',html);
			$('#audioWrite2').play();
		}
		
		//---------------------------------------------
		
		html = '';
		$('#rwayaName').change(function(){
			var html = '';
			var defaultMokr = '';
			var count = 0;
			var temp = '';
			for(var i in data[$(this).val()])
			{
				if(count == 0){
					defaultMokr = i;
				}
				html += '<option value="'+i+'">'+i+'</option>';
				++count;
			}
			$('#mokrName').html(html);
			html = '';
			for(var i in data[$(this).val()][defaultMokr])
			{
				temp = data[$(this).val()][defaultMokr][i];
				temp = temp[0]+temp[1]+temp[2];
				html += '<option value="'+data[$(this).val()][defaultMokr][i]+'">'+allSoar[temp]+'</option>';
				
			}
			$('#imageName').html(html);
			html = 	path+'/'
				+$(this).val()+'/'
				+defaultMokr+'/'
				+data[$(this).val()][defaultMokr][0];
			$('#audioWrite2').attr('src',html);
			$('#audioWrite2').play();
		});
		
		//---------------------------------------------
		
		html = '';
		$('#mokrName').change(function(){
			var html = '';
			var count = 0;
			var temp = '';
			for(var i in data[$('#rwayaName').val()][$(this).val()])
			{
				if(count == 0){
					temp = data[$('#rwayaName').val()][$(this).val()][i];
					temp = temp[0]+temp[1]+temp[2];
					html += '<option value="'+data[$('#rwayaName').val()][$(this).val()][i]+'" slected>'+allSoar[temp]+'</option>';
				}else{
					temp = data[$('#rwayaName').val()][$(this).val()][i];
					temp = temp[0]+temp[1]+temp[2];
					html += '<option value="'+data[$('#rwayaName').val()][$(this).val()][i]+'">'+allSoar[temp]+'</option>';
				}
				++count;
			}
			$('#imageName').html(html);
			html = 	path+'/'
					+$('#rwayaName').val()+'/'
					+$(this).val()+'/'
					+data[$('#rwayaName').val()][$(this).val()][0];
			$('#audioWrite2').attr('src',html);
			$('#audioWrite2').play();
		});
		
		//---------------------------------------------
		
		html = '';
		$('#imageName').change(function(){
			html = 	path+'/'
					+$('#rwayaName').val()+'/'
					+$('#mokrName').val()+'/'
					+$(this).val();
			$('#audioWrite2').attr('src',html);
			$('#audioWrite2').play();
			
		});
		
		//---------------------------------------------
		
		$('#audioWrite2').bind('ended', function(){
			if($('#loopSign').data('sign') == '1'){
				temp = $('#imageName').val();
			}else if($('#loopSign').data('sign') == '2'){
				var elm = $('#imageName option:selected').next();
				temp = elm.val();
				if(typeof temp === 'undefined'){
					$('#imageName option:selected').removeAttr('selected');
					$('#imageName option').first().attr('selected',true);
					temp = $('#imageName option').first().val();
				}else{
					$('#imageName option:selected').removeAttr('selected');
					elm.attr('selected',true);
				}
			}
			if($('#loopSign').data('sign') != '0'){
				html = 	path+'/'
						+$('#rwayaName').val()+'/'
						+$('#mokrName').val()+'/'
						+temp;
				$('#audioWrite2').attr('src',html);
				$('#audioWrite2').play();
			}
		});
		
		//---------------------------------------------
		
		$('#loopSign').click(function(){
			if($('#loopSign').data('sign') == '0'){
				$('#loopSign').data('sign','1');
				$('#loopSign span').attr('title','تكرار الصورة');
				$('#loopSign span').css({backgroundImage:"url(css/images/icon2.png)"});
			}else if($('#loopSign').data('sign') == '1'){
				$('#loopSign').data('sign','2');
				$('#loopSign span').attr('title','تكرار كل الصور');
				$('#loopSign span').css({backgroundImage:"url(css/images/icon3.png)"});
			}else if($('#loopSign').data('sign') == '2'){
				$('#loopSign').data('sign','0');
				$('#loopSign span').attr('title','التكرار متوقف');
				$('#loopSign span').css({backgroundImage:"url(css/images/icon1.png)"});
			}
		});
		
		//---------------------------------------------
		
		$('#fullImages').click(function(){
			$('#rwayaName').html('');
			$('#mokrName').html('');
			$('#imageName').html('');
			$('#audioWrite2').attr('src','');
			if($(this).is(':checked')){
				data = json.some;
			}else{
				data = json.all;
			}
			runQuran();
		});
		
		//alert(JSON.stringify(data));
		
		runQuran();
	});
</script>