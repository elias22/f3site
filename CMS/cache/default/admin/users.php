<script type="text/javascript">
<!--
function Del(id)
{
if(confirm("<?= $lang['ap_delc'] ?>"))
{
if(confirm("<?= $lang['ap_userdel2'] ?>\n"+'i'+id.innerHTML)) c=1; else c=2;
del=new Request("adm.php?x=del&id="+id+"&all="+c,'i'+id,'test');
del.loadText='abc';
del.method='POST'
del.add('co','user')
del.run();
}
}
-->
</script>

<table cellspacing="1" class="tb">
<tbody class="bg">
<tr>
<td class="h" colspan="5"><b><?= $lang['users'] ?></b></td>
</tr>
<tr>
<th><?= $lang['login'] ?></th>
<th style="width: 50px">ID</th>
<th><?= $lang['rights'] ?></th>
<th><?= $lang['opt'] ?></th>
</tr>

<?php foreach($users as $user): echo '
<tr>
<td id="i'.$user['ID'].'">'.$user['num'].'. <a href="'.$user['url'].'">'.$user['login'].'</a></td>
<td align="center">'.$user['ID'].'</td>
<td align="center">'.$user['level'].'</td>
<td align="center">'.
(($user['options']) ? '
<a href="?a=edituser&amp;id='.$user['ID'].'">'.$lang['profile'].'</a>
&middot; <a href="">'.$lang['privs'].'</a>
&middot; <a href="javascript:Del('.$user['ID'].')">'.$lang['del'].'</a>'
:'').'
</td>
</tr>';
endforeach ?>

<tr class="eth">
<td colspan="2">
<form action="adm.php" method="get" style="margin: 0"><?= $lang['search'] ?>:
<input name="s" value="<?= $search ?>" style="height: 14px" />
<input type="hidden" value="users" name="a" />
</form>
</td>
<td colspan="2"><?= $lang['page'].': '.$pages ?></td>
</tr>
</tbody>
</table>