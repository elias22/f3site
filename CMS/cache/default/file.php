<div class="cs">

<?php if($file['edit']){ ?>
<div style="float: right">
<img src="img/icon/edit.png" alt="&rarr;" /> <a href="<?=$file['edit'];?>"><?=$lang['edit'];?></a>
</div>
<?php } ?>

<a href="?co=cats&amp;id=2"><?=$lang['files'];?></a> &raquo; <?=$path;?>
</div>

<table cellpadding="4" cellspacing="1" class="tb">
<tbody class="bg">
<tr>
 <td class="h" colspan="2"><b><?=$file['date'];?> - <?=$file['name'];?></b></td>
</tr>
<tr>
 <td style="width: 150px"><b><?=$lang['desc'];?></b></td>
 <td><?=$file['dsc'];?></td>
</tr>
<tr>
 <td><b><?=$lang['size'];?>:</b></td>
 <td><?=$file['size'];?></td>
</tr>
<tr>
 <td><b><?=$lang['author'];?>:</b></td>
 <td><?=$file['author'];?></td>
</tr>
<tr>
 <td><b><?=$lang['rate'];?>:</b></td>
 <td><?=$file['rate'];?></td>
</tr>
<tr>
 <td><b><?=$lang['numofd'];?>:</b></td>
 <td><?=$file['dls'];?></td>
</tr>
<tr>
 <td colspan="2">
  <center>
   <input type="button" style="margin-bottom: 3px" value="<?=$lang['dl'];?>" onclick="location='<?=$url;?>'" />
  </center>
  <?=$file['fulld'];?>
 </td>
</tr>
</tbody></table>