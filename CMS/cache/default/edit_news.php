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
<td><b>2. <?=$lang['title'];?>:</b></td>
<td><input maxlength="50" name="x_n" value="<?=$news['name'];?>" /></td>
</tr>
<tr>
<td><b>3. <?=$lang['published'];?>?</b></td>
<td><input type="checkbox" name="x_a"<?php if($news['access'] = 1){ ?> checked="checked"<?php } ?> /></td>
</tr>
<tr>
<td><b>4. <?=$lang['img'];?>:</b></td>
<td>
<input name="x_i" id="x_i" value="<?=$news['img'];?>" />
<?php
if(Admit('FM'))
{
echo '<input type="button" value="'.$lang['images'].' &raquo;" onclick="Okno(\'?x=fm&amp;ff=xu_i\',580,400,150,150)" />';
}
?>
</td>
</tr>
<tr>
<td><b>5. <?=$lang['opt'];?>:</b></td>
<td>
<input type="checkbox" name="x_br"<?= (($news['opt']&1)?' checked="checked"':'') ?> /> <?=$lang['e_br'];?><br />
<input type="checkbox" name="x_emo"<?= (($news['opt']&2)?' checked="checked"':'') ?> /> <?=$lang['emoon'];?><br />
<input type="checkbox" id="fn" onclick="FN()" name="x_fn"<?= (($news['opt']&4)?' checked="checked"':'') ?> /> <?=$lang['ftxt'];?>
</td>
</tr>
</tbody>
</table>

<!-- TRE�� -->
<table cellspacing="1" class="tb">
<tbody class="bg">
<tr>
<td class="h" colspan="2"><b><?=$lang['text'];?></b></td>
</tr>
<tr>
<td align="center">
<textarea style="width: 100%" rows="10" id="x_txt" name="x_txt"><?= Clean($news['txt']) ?></textarea>
</td>
</tr>
<tr class="eth">
<td>
<input type="button" value="<?=$lang['preview'];?>" onclick="Prev()" />
<input type="submit" name="sav" value="<?=$lang['save'];?>" />
</td>
</tr>
</tbody>
</table>

<!-- Pe�na tre�� -->
<div id="full" style="display: none">
<table cellspacing="1" class="tb">
<tbody class="bg">
<tr>
<td class="h" colspan="2"><b><?=$lang['ftxt'];?></b></td>
</tr>
<tr>
  <td align="center">
<textarea style="width: 100%" id="x_ftxt" rows="13" name="x_ftxt"><?= Clean($news['text']) ?></textarea>
</td>
</tr>
</tbody>
</table>
</div>
</form>
<script type="text/javascript">
<!--
var ed=new Editor('x_txt');
ed.Emots();
var done=(d('fn').checked)?1:0;

function FN(x)
{
Show('full');
if(done!=1 || x==1)
{
var ed2=new Editor('x_ftxt');
ed2.Emots(emots);
done=1;
}
}
if(done==1) FN(1);
-->
</script>
