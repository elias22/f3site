<?php //F3Site 3.1 - (C) 2010 COMPMaster
define('iCMS',1);
require './kernel.php';

#Maintenance mode
if(isset($cfg['MA']) && !IS_EDITOR)
{
	header('Service Unavailable', true, 503);
	header('Retry-After: 7200');
	$content->message(10, UID ? null : 'login.php');
}

#Default META description
$content->desc = $cfg['metaDesc'];

#Load module or display 404 page
if(isset($URL[0]) && !is_numeric($URL[0]) && strpos($URL[0],'/')===false && !isset($URL[0][30]))
{
	#Default template
	$content->file = array($URL[0]);

	#Sequence: built-in module, extension, 404
	if(file_exists('./mod/'.$URL[0].'.php'))
	{
		(include './mod/'.$URL[0].'.php') OR $content->set404();
	}
	elseif(file_exists('./plugins/'.$URL[0].'/default.php'))
	{
		(include './plugins/'.$URL[0].'/default.php') OR $content->set404();
	}
	else
	{
		$content->set404();
	}
}

#Category
else
{
	include './lib/category.php';
}

#AJAX
if(JS)
{
	$content->display();
}
else
{
	#Menu
	if(!file_exists('./cache/menu'.LANG.'.php'))
	{
		include './lib/mcache.php';
		RenderMenu();
	}
	require './cache/menu'.LANG.'.php';

	#RSS
	$channel = empty($cfg['RSS'][LANG]) ? array() : $cfg['RSS'][LANG];

	#Main template
	include $content->path('body');
}