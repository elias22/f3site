<?php
if(iCMS!=1) exit;
OpenBox($lang['poll']);

echo '<tr><td>
<center>'.$poll['q'].'</center>
<table align="center" cellspacing="0" cellpadding="0" style="padding: 3px; width: 300px">
<tbody>';

#Generowanie
for($i=0;$i<$ile;$i++)
{
	echo '<tr>
  <td>'.$option[$i][1].'</td>
	<td>&nbsp;<b>'.$option[$i][2].'</b></td>
</tr>
<tr>
  <td><div style="height: 10px; width: '.$pollproc[$i].'%" class="pollstrip"></div></td>
  <td style="width: 20px">&nbsp;'.$pollproc[$i].'%</td>
</tr>';
}
echo '
</tbody>
</table>
<div align="center" style="padding: 5px">'.$lang['votes'].': <b>'.$poll['num'].'</b> | Start: <b>'.genDate($poll['date']).'</b> | <a href="?co=polls">'.$lang['archive'].'</a></div></td></tr>';

CloseBox();
?>