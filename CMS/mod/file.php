<?php
if(iCMS!=1) exit;
require './cfg/content.php';

#Get record to $file
if(!$file = $db->query('SELECT f.*,c.opt FROM '.PRE.'files f INNER JOIN '.
PRE.'cats c ON f.cat=c.ID WHERE c.access!=3 AND f.ID='.$id)->fetch(2)) return;

#Disabled
if(!$file['access'])
{
	if(!admit($file['cat'],'CAT')) return;
	$content->info(sprintf($lang['NVAL'], $file['name']), null, 'warning');
}

#Tytu� strony
$content->title = $file['name'];

#Zdalny
$remote = strpos($file['file'], ':');

#Rozmiar i URL
if($remote OR file_exists('./'.$file['file']))
{
	$file['url']  = isset($cfg['fgets']) ? 'go.php?file='.$id : $file['file'];
	if(!$file['size'] && !$remote)
	{
		$size = filesize($file['file']);
		if($file['size'] > 1048575)
		{
			$file['size'] = round($size/1048576) . ' MB';
		}
		else
		{
			$file['size'] = round($size/1024) . ' KB';
		}
	}
}
else
{
	$file['size'] = 'File not found';
	$file['url'] = '#';
}

#Ocena
if(isset($cfg['frate']) AND $file['opt'] & 4)
{
	$content->addCSS(SKIN_DIR.'rate.css');
	$rate = 'vote.php?type=2&amp;id='.$id;
}
else
{
	$rate = 0;
}

#Data, autor
$file['date'] = genDate($file['date'], true);
$file['author'] = autor($file['author']);

#Do szablonu
$content->data = array(
	'file' => &$file,
	'path' => catPath($file['cat']),
	'rates'=> $rate,
	'cats' => url('cats/files'),
	'edit' => admit($file['cat'],'CAT') ? url('edit/2/'.$id, 'ref') : false
);

#Komentarze
if(isset($cfg['fcomm']) && $file['opt']&2)
{
	require './lib/comm.php';
	comments($id, 2);
}