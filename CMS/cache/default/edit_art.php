<!--Podgl�d-->
<div id="dbox" style="display: none">
<table cellspacing="1" class="tb">
<tbody class="bg">
<tr>
<td class="h"><b><?=$lang['preview'];?></b></td>
</tr>
<tr>
<td id="tbox" class="txt"></td>
</tr>
</tbody>
</table>
</div>

<!--FORM-->
<form action="<?=$url;?>" name="art" method="post">
<table cellspacing="1" class="tb">
<tbody class="bg">
<tr>
<td class="h" colspan="2"><b><?=$this->title;?></b></td>
</tr>
<tr>
<td style="width: 30%"><b>1. <?=$lang['cat'];?>:</b></td>
<td><select name="x_c">
<option value="1"><?=$lang['choose'];?></option>
<?=$cats;?>
</select></td>
</tr>
<tr>
<td><b>2. <?=$lang['name'];?>:</b></td>
<td><input maxlength="50" name="x_n" value="<?=$art['name'];?>" /></td>
</tr>
<tr>
<td><b>3. <?=$lang['published'];?>?</b></td>
<td>
<input type="checkbox" name="x_a"<?php if($art['access']){ ?> checked="checked"<?php } ?> /> <?=$lang['yes'];?>
</td>
</tr>
<tr>
  <td><b>4. <?=$lang['priot'];?>:</b></td>
  <td><select name="x_p">
<option value="1"><?=$lang['high'];?></option>
<option value="2"<?php if($art['priority'] = 2){ ?> selected="selected"<?php } ?>><?=$lang['normal'];?></option>
<option value="3"<?php if($art['priority'] = 3){ ?> selected="selected"<?php } ?>><?=$lang['low'];?></option>
</select></td>
</tr>
<tr>
<td><b>5. <?=$lang['desc'];?>:</b></td>
<td><textarea name="x_d" cols="40" rows="2"><?=$art['dsc'];?></textarea></td>
</tr>
<tr>
<td><b>6. <?=$lang['author'];?>:</b><br /><small><?=$lang['nameid'];?></small></td>
<td><input name="x_au" value="<?=$art['author'];?>" maxlength="30" /></td>
</tr>
<tr>
<th colspan="2"><?=$lang['text'];?></th>
</tr>
<tr>
<td align="center" colspan="2">
<div style="padding-bottom: 5px" id="tabs"><?=$lang['page'];?>:
<input type="button" class="tab" value="<?=$lang['add'];?>" onclick="NP()" />

<!--Karty-->
<?php
for($i=1;$i<=$ile;++$i)
{
echo '<input type="button" class="tab" value="'.$i.'" id="tab'.$i.'" onclick="CP('.$i.')"'.(($i==1)?' style="font-weight: bold"':'').' />';
}
echo '</div><div id="tps">';

#Tre��
for($i=1;$i<=$ile;++$i)
{
$y=$i-1;
echo '<div id="tp'.$i.'" style="display: none">
<textarea name="x_txt['.$i.']" id="tpx'.$i.'" style="width: 100%" rows="18">'. 
Clean($fart[$y][1]).'</textarea>
<fieldset>
<legend>'.$lang['opt'].'</legend>
<input type="checkbox" name="x_emo['.$i.']" onclick="Em()"'.(($fart[$y][2]&2)?' checked="checked"':'').' /> '.$lang['e_emo'].'&nbsp;
<input type="checkbox" name="x_br['.$i.']"'.(($fart[$y][2]&1)?' checked="checked"':'').' /> '.$lang['e_br'].' &nbsp;
<input type="checkbox" name="x_col['.$i.']"'.(($fart[$y][2]&4)?' checked="checked"':'').' /> '.$lang['e_col'].'
</fieldset>
</div>';
}
?>
<script type="text/javascript">
<!--
var pv=new Request('request.php?co=preview','tbox','')
pv.method='POST'
var f=document.forms['art'].elements;

function Prev()
{
Show('dbox',1)
location='#dbox'
if(f['x_emo'+c].checked) pv.add('EMOTS',1)
if(f['x_br'+c].checked) pv.add('NL',1)
pv.add('HTML',1)
pv.add('text',d('tpx'+c).value)
pv.run()
}
var c=0;
var ile=<?=$ile;?>;
function CP(p)
{
if(c!=0)
{
d('tp'+c).style.display='none';
d('tab'+c).removeAttribute('style')
}
Show('tp'+p,1)
d('tab'+p).style.fontWeight='bold'
ed.id='tpx'+p;
c=p
}
function NP()
{
++ile
d('tabs').innerHTML+='<input class="tab" value="'+ile+'" type="button" id="tab'+ile+'" onclick="CP('+ile+')" />'
var x=document.createElement('div')
x.id='tp'+ile;
x.innerHTML='<textarea rows="18" style="width: 100%" name="x_txt['+ile+']" id="tpx'+ile+'">'+
'</textarea><fieldset><legend><?=$lang['opt'];?></legend>'+
'<input type="checkbox" name="x_emo['+ile+']" onclick="Em()" /> <?=$lang['e_emo'];?>'+
'<input type="checkbox" name="x_br['+ile+']" /> <?=$lang['e_br'];?>'+
'<input type="checkbox" name="x_col['+ile+']" /> <?=$lang['e_col'];?></fieldset>'
d('tps').appendChild(x)
CP(ile)
}
function Em()
{
if(f['x_emo'+c].checked) ed.Emots(); else ed.Emots(0)
}
var ed=new Editor('tp1');
CP(1);
-->
</script>
</div>

<?=$lang['arttip'];?>
</td>
</tr>
<tr>
<td class="eth" colspan="2">
<input type="submit" value="<?=$lang['save'];?>" />
<input type="button" value="<?=$lang['preview'];?>" onclick="Prev()" /></td>
</tr>
</tbody>
</table>
</form>
