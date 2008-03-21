<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php if($link){ ?>
<meta http-equiv="Refresh" content="2; URL=<?=$link;?>" />
<?php } ?>
  <meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" />
  <meta name="Robots" content="no-index" />
  <title><?=$lang['info'];?></title>
  <link rel="stylesheet" type="text/css" href="style/default/s.css" />
</head>
<body>

<div style="margin: 30px auto; width: 300px; padding: 5px; text-align: center; border: 1px solid #8C9F9B; background-color: #F0F0EE">
<p><?=$info;?></p>
<?php if($link){ ?>
<a href="<?=$link;?>">OK &raquo;</a>
<?php } ?>
</div>

</body>
</html>
