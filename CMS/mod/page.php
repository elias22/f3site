<?php
if(iCMS!=1) exit;

#Pobierz
if($id)
{
	if(!$page = $db->query('SELECT * FROM '.PRE.'pages WHERE ID='.$id.
	' AND (access=1'.((UID) ? ' OR access=3' : '').')')->fetch(2)) return;
}
else return;

#PHP - nale�y wykona� go najpierw
if($page['opt'] & 16)
{
	ob_start();
	eval('?>'.$page['text']);
	$page['text'] = ob_get_clean();
}

#Emotikony
if($page['opt'] & 2)
{
	$page['text'] = emots($page['text']);
}

#BR
if($page['opt'] & 1)
{
	$page['text'] = nl2br($page['text']);
}

#Szablon
$content->title = $page['name'];
$content->data = array(
	'page' => &$page,
	'box'  => $page['opt'] & 4,
	'edit' => admit('P') ? url('editPage/'.$page['ID'], '', 'admin') : false
);

#Komentarze
if($page['opt'] & 8)
{
	require './lib/comm.php';
	comments($page['ID'], 59);
}