<form action="<?=$url;?>" name="art" method="post">
<table cellspacing="1" class="tb">
<tbody class="bg">
<tr>
<td class="h" colspan="2"><b><?=$this->title;?></b></td>
</tr>
<tr>
  <td style="width: 31%"><b>1. <?=$lang['cat'];?>:</b></td>
  <td><select name="x_c">
<option value="0"><?=$lang['choose'];?></option><?=$cats;?>
</select></td>
</tr>
<tr>
  <td><b>2. <?=$lang['name'];?>:</b></td>
  <td><input maxlength="50" name="x_n" size="40" value="<?=$link['name'];?>" /></td>
</tr>
<tr>
  <td><b>3. <?=$lang['published'];?>?</b></td>
  <td><input type="checkbox" name="x_a"<?php if($link['access']){ ?> checked="checked"<?php } ?> /></td>
</tr>
<tr>
  <td><b>4. <?=$lang['priot'];?>:</b></td>
  <td><select name="x_p">
<option value="1"><?=$lang['high'];?></option>
<option value="2"<?php if($link['priority'] = 2){ ?> selected="selected"<?php } ?>><?=$lang['normal'];?></option>
<option value="3"<?php if($link['priority'] = 3){ ?> selected="selected"<?php } ?>><?=$lang['low'];?></option>
</select></td>
</tr>
<tr>
  <td><b>5. <?=$lang['desc'];?>:</b></td>
  <td><textarea name="x_d" style="width: 95%"><?=$link['dsc'];?></textarea></td>
</tr>
<tr>
  <td><b>6. <?=$lang['adr'];?>:</b></td>
  <td><input size="40" maxlength="200" name="x_adr" value="<?=$link['adr'];?>" /></td>
</tr>
<tr>
  <td><b>7. <?=$lang['opt'];?>:</b></td>
  <td><input type="checkbox" name="x_nw"<?php if($link['nw']){ ?> checked="checked"<?php } ?> /> <?=$lang['openinnw'];?></td>
</tr>
<tr>
  <td colspan="2" class="eth"><input type="submit" value="<?=$lang['save'];?>" /></td>
</tr>
</tbody>
</table>
</form>
