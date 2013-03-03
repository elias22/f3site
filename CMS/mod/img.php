<?php
if(iCMS!=1) exit;
require './cfg/content.php';

#Get data
if(!$img = $db->query('SELECT i.*,c.opt FROM '.PRE.'imgs i INNER JOIN '.
PRE.'cats c ON i.cat=c.ID WHERE c.access!=3 AND i.ID='.$id)->fetch(2)) return;

#Disabled
if(!$img['access'])
{
	if(!admit($img['cat'],'CAT')) return;
	$content->info(sprintf($lang['NVAL'], $img['name']), null, 'warning');
}

#Dimensions
$size = strpos($img['size'], '|') ? explode('|', $img['size']) : null;

#Data, autor
$img['date'] = genDate($img['date'], true);
$img['author'] = autor($img['author']);

#Ocena
if(isset($cfg['irate']) AND $img['opt'] & 4)
{
	$content->css(SKIN_DIR.'rate.css');
	$rates = 'vote.php?type=3&amp;id='.$id;
}
else
{
	$rates = 0;
}

#Tag title and meta description - clean temporary
$content->title = $img['name'];
$content->desc  = $img['dsc'] ? clean(substr($img['dsc'], 0, 150)) : $cfg['metaDesc'];

#Description
$img['dsc'] = nl2br($img['dsc']);

#Template
$content->add('img', array(
	'img'   => &$img,
	'size'  => &$size,
	'rates' => $rates,
	'image' => $img['type'] === '1' ? true : false,
	'flash' => $img['type'] === '2' ? true : false,
	'audio' => $img['type'] === '3' ? true : false,
	'video' => $img['type'] === '4' ? true : false,
	'path'  => catPath($img['cat']),
	'edit'  => admit($img['cat'],'CAT') ? url('edit/3/'.$id,'ref') : false,
	'root'  => isset($cfg['allCat']) ? $lang['cats'] : $lang['imgs'],
	'cats'  => url(isset($cfg['allCat']) ? 'cats' : 'cats/images'),
	'lightbox' => isset($cfg['lightbox'])
));

#Tags
if(isset($cfg['tags']))
{
	include './lib/tags.php';
	tags($id, 3);
}

#Comments
if(isset($cfg['icomm']) && $img['opt']&2)
{
	require 'lib/comm.php';
	comments($id, 3);
}
