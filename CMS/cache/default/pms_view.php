<script type="text/javascript">
//<![CDATA[
var pm = new Request('request.php?co=pms&act=1&id=<?=$id?>','main','');
function PM_Edit() { location='?co=pms&act=e&id=<?=$id?>'; }
function PM_Del() { pm.add('act2','del'); pm.run(1); }
function PM_Arch() { pm.add('act2','arch'); pm.run(1); }
//]]>
</script>

<table cellspacing="1" class="tb">
<tbody class="bg">
<tr>
<td class="h" colspan="2"><b><?=$pm['topic']?></b></td>
</tr>
<tr>
<td class="pth" align="right" style="width: 25%"><?=$lang['author']?>:&nbsp;</td>
<td><?=$pm['usr']?></td>
</tr>
<tr>
<td class="pth" align="right"><?=$lang['sent']?>:&nbsp;</td>
<td><?=$pm['date']?></td>
</tr>
<tr>
<td colspan="2"><?=$pm['txt']?></td>
</tr>
<tr>
<td class="eth" colspan="2" id="pm_foot">
<input type="button" value="<?=$edit?>" onclick="PM_Edit()" />
<input type="button" value="<?=$lang['del']?>" onclick="PM_Del()" />
<?php if($pm['st']===2){ ?><input type="button" value="<?=$lang['pm_25']?>" onclick="PM_Arch()" /><?php } ?>
</td>
</tr>
</tbody>
</table>
