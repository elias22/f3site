<?php
if(iCMSa!=1 || !Admit('CFG')) exit;
require LANG_DIR.'adm_conf.php';

#Tytu� strony
$content->title = $lang['aw_t'];

#Zapis
if($_POST)
{
	$num = count($_POST['bad']);
	$words1 = Array();
	$words2 = Array();

	for($i=0; $i<$num; ++$i)
	{
		$words1[] = substr($_POST['bad'][$i],0,50);
		$words2[] = substr($_POST['good'][$i],0,50);
	}

	#Klasa zapisu do pliku PHP
	require('./lib/config.php');
	try
	{
		$f = new Config('words');
		$f->add('words1', $words1);
		$f->add('words2', $words2);
		$f->save();
		$content->info($lang['saved']);
	}
	catch(Exception $e)
	{
		$content->info($lang['error'].$e);
	}
}

#Odczyt danych
else
{
	include './cfg/words.php';
	$num  = count($words1);
}

#FORM
$word = array();
for($i=0; $i<$num; ++$i)
{
	$word[] = array(Clean($words1[$i]), Clean($words2[$i]));
}

#Do szablonu
$content->addScript('lib/forms.js');
$content->info($lang['aw_i'].(($cfg['censor']==1)?'':'<br />'.$lang['aw_f']));
$content->data['word'] =& $word;