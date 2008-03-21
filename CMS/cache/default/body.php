<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?= $nlang; ?>">
<head>
<meta name="description" content="<?=$cfg['meta_d'];?>" />
<meta name="keywords" content="<?=$cfg['meta_k'];?>" />
<meta name="robots" content="<?=$cfg['robots'];?>" />
<link type="text/css" rel="stylesheet" href="style/default/s.css" />
<?= $cfg['dkh'].$content->head; ?>
<title><?= $cfg['title']; ?> :: <?= $content->title; ?></title>
<script type="text/javascript" src="lib/js.js"></script>
</head>
<body>

<table class="all" cellspacing="1" align="center">
<tbody style="background-color: #E8E8E6">
<tr>
<td colspan="3" id="header">
<table><tbody>
<tr>
<td><img src="style/continuous/img/bnr.png" alt="Logo" /></td>
<td><?=Banners(1);?></td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td id="gm" colspan="3">
<div style="float: left">
<a href="?co=cats&amp;id=5"><?=$lang['news'];?></a> |
<a href="?co=cats&amp;id=1"><?=$lang['arts'];?></a> |
<a href="?co=cats&amp;id=2"><?=$lang['files'];?></a>
</div>
<div style="float: right"><?=TODAY;?></div>
</td>
</tr>
<tr>
<td class="nav" valign="top"><?php newnav(1); ?></td>
<td id="main" valign="top"><?php $content->display(); ?></td>
<td class="nav" valign="top"><?php newnav(2); ?></td>
</tr>
</tbody>
</table>
<center>
<div id="footer"><?=$cfg['footer'];?></div>
<div style="font-size: 10px">Powered by <a href="http://compmaster.prv.pl">F3Site</a>.</div>
</center>

</body>
</html>