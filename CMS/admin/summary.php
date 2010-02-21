<?php if(iCMSa!=1) exit;

#Aktualizuj notatnik
if($_POST && isset($_POST['notes']))
{
	if(!file_exists('./cfg/notes.txt'))
	{
		touch('./cfg/notes.txt');
		chmod('./cfg/notes.txt', 0600);
	}
	$notes = clean($_POST['notes'], 999, 1);
	file_put_contents('./cfg/notes.txt', $notes, 2);
}
elseif(file_exists('./cfg/notes.txt'))
{
	$notes = file_get_contents('./cfg/notes.txt');
}
else
{
	$notes = '';
}

#Do szablonu
$content->data = array(
	'intro'  => sprintf($lang['admIntro'], $cfg['title']),
	'notes'  => $notes,
	'server' => $_SERVER['SERVER_SOFTWARE']
);

#Katalog INSTALL
if(LEVEL==4 && is_dir('install'))
{
	$content->info('<b>'.$lang['INSTALL'].'</b>', null, 'error');
}

#Kompiluj szablony
if(isset($_GET['compile']))
{
	include_once './lib/compiler.php';
	try
	{
		$comp = new Compiler;
		$comp->examine();
		$comp->src = SKIN_DIR;
		$comp->cache = VIEW_DIR;
		$comp->examine();
	}
	catch(Exception $e)
	{
		$content->message($e->getMessage());
	}
}