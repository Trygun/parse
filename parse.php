<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Hello World!</title>
</head>
<body>

<?php
include 'phpQuery-onefile.php';

$elem[1]['address'] = "http://sky-worker.ru/";//&laquo; &raquo;
$elem[1]['title'] = "ООО «ФАБС Логистик» - Современное оборудование для склада";
$elem[1]['description'] = 'ООО &quot;ФАБС Логистик&quot; - российский системный интегратор в сфере автоматизации складской логистики. Мы предлагаем широкий спектр оборудования для склада: стеллажи, конвейеры и пластиковую тару самых разных видов.';
$elem[1]['h1'] = "Ключевые продукты";

	$a = file_get_contents($elem[1]['address']);
	$file = 'test.html';
	phpQuery::newDocumentFileHTML('http://www.fabslog.ru/');

//var_dump(phpQuery::newDocumentFileHTML('http://www.fabslog.ru/'));
$titleElement = pq('title');

$title = $titleElement->html();
print_r(mb_detect_encoding($a, "auto"));
//print_r(htmlentities($title));

	if(preg_match('|<title.*?>(.*)</title>|', $a, $temp)){
	 	$q = preg_replace('|<title.*?>(.*)</title>|', '\1', $temp[0]);
		//if (strcmp($q, $elem[1]['title']) == 0){
			//print_r('<meta name="Description" content="'.$q.'"></meta>');
		//}
	}
print_r("sdsd")	;
	if(preg_match('|(<meta[^>]*name[^>]*)description([^>]*>)|i', $a, $temp)){
		//$temp[0] = preg_replace('|content\="(.*)"|', '1yy'.'\1', $temp[0]);
		$q = preg_replace('|<meta(?=[^>]* name *= *"?description"?) [^>]*?(?<= )content *= *"([^"]*)"[^>]*>|i', '\1', $temp[0]);
		if (strcmp($q, $elem[1]['description']) == 0){
			//print_r("Description = ".$q);
		////print_r(strcmp($q, $elem[1]['description']));
		}
	}
	 if(preg_match('|<h1.*?>(.*)</h1>|', $a, $temp)){
	 	$q = preg_replace('|<h1.*?>(.*)</h1>|', '\1', $temp[0]);
	 	if (strcmp($q, $elem[1]['h1']) == 0){
	 		//print_r("<br />"."h1 = ".$q);
	 	}
	 }
	 if(preg_match('|<title.*?>(.*)</title>|', $a, $temp)){
	 	$q = preg_replace('|<title.*?>(.*)</title>|', '\1', $temp[0]);
	 	//if (strcmp($q, $elem[1]['title']) == 0){
	 		//print_r("<br />"."Title = ".$q);
	 	//}
	 }
//<meta name="Description" content="ООО &quot;ФАБС Логистик&quot; - российский системный интегратор в сфере автоматизации складской логистики. Мы предлагаем широкий спектр оборудования для склада: стеллажи, конвейеры и пластиковую тару самых разных видов.">
?>
</body>
</html>