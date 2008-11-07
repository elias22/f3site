<?php
if(iCMSa!=1 || !Admit('CFG')) exit;

#Dost�pne opcje
if($_POST) { $opt =& $_POST; } else { $opt =& $cfg; }

#Typy kategorii
$type = array();
$data = parse_ini_file('./cfg/types.ini', 1);

#Zapis
if($_POST)
{
	#Typy danych musz� by� numeryczne
	if(isset($_POST['newTypes']))
	{
		foreach($_POST['newTypes'] as &$x) $x = (int)$x;
	}
	try
	{
		include './lib/config.php';
		$f = new Config('latest');
		$f -> save($_POST);
		include './admin/config.php';
		return 1;
	}
	catch(Exception $e)
	{
		$content->info($lang['error'].$e);
	}
}
else
{
	require './cfg/latest.php';
}
require LANG_DIR.'adm_cfgz.php';

foreach($data as $num => &$x)
{
	$type[] = array(
		'id' => $num,
		'on' => isset($opt['newTypes'][$num]),
		'title' => isset($x[$nlang]) ? $x[$nlang] : $x['en']
	);
}

$content->title = $lang['latest'];
$content->data = array('cfg'=>$opt, 'type'=>$type);