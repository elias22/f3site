<?php /* Funkcje kategorii */

#Zmie� ilo�� pozycji
function SetItems($id,$ile)
{
	global $db;
	$id=(int)$id;
	$ile=(int)$ile;
	$ile=($ile>0) ? '+'.$ile : '-'.$ile;

	#Zmie� ilo�� w docelowej kategorii
	$db->exec('UPDATE '.PRE.'cats SET num=num'.$ile.' WHERE ID='.$id);

	#Pobierz LFT i RGT
	$res=$db->query('SELECT sc,lft,rgt FROM '.PRE.'cats WHERE ID='.$id);
	$cat=$res->fetch(3); //NUM
	$res->closeCursor();
	$IDs=array($id);

	#Z�� dane
	if($cat[0])
	{
		$res=$db->query('SELECT sc FROM '.PRE.'cats WHERE lft<='.$cat[1].
			' && rgt>='.$cat[0].' && access!=2 && access!=3');

		foreach($res as $cat) { if($cat['sc']) $IDs[]=$cat['sc']; }
	}

	#Zmie� ilo�� ca�kowit� w wy�szych
	if($IDs)
	{
		$db->exec('UPDATE '.PRE.'cats SET nums=nums'.$ile.' WHERE ID IN('.join(',',$IDs).')');
	}	
}

#Lista podkategorii
function Slaves($type=0,$id=0,$o=null)
{
	$where=array();
	if(is_numeric($o)) $where[]='ID!='.$o;

	#Prawa i typ
	if(LEVEL!=4 && !($o && !$where && Admit($o)))
	{
		$where[]='ID IN (SELECT CatID FROM '.PRE.'acl WHERE UID='.UID.')';
	}
	if($type!=0)
	{
		$where[]='type='.(int)$type;
	}

	#Odczyt
	$res=$GLOBALS['db']->query('SELECT ID,name,rgt FROM '.PRE.'cats'.
		(($where)?' WHERE '.join(' && ',$where):''));
	$depth=0;
	$last=1;
	$o='';

	#Lista
	foreach($res as $cat)
	{
		#Poziom
		if($last>$cat['rgt'])
			++$depth;

		elseif($depth>0 && $last+2!=$cat['rgt'])
			$depth-=ceil(($cat['rgt']-$last)/2);

		$last=$cat['rgt'];

		$o.='<option value="'.$cat['ID'].'" style="margin-left: '.$depth.'em"'
		.(($id==$cat['ID'])? ' selected="selected"':'').'">'.$cat['name'].'</option>';
	}
	return $o;
}

#Przelicz zawarto�� w kat.
function CountItems()
{
	#Odczyt
	global $db;
	$res=$db->query('SELECT ID,type,access,sc FROM '.PRE.'cats');
	$cat=$res->fetchAll(3); //NUM
	unset($res);

	$ile=count($cat);
	if($ile>0)
	{
		for($i=0;$i<$ile;$i++)
		{
			$id=$cat[$i][0];
			$num[$id]=db_count('ID',typeOf($cat[$i][1]),' WHERE cat='.$id.' AND access!=2');
			$sub[$id]=$cat[$i][3];
			$total[$id]=$num[$id];
		}
		for($i=0;$i<$ile;$i++)
		{
			#Je�eli dost�pna
			if($cat[$i][2]!=2 && $cat[$i][2]!=3)
			{
				$x=$cat[$i][3]; #Nadkat.
				while($x!=0 && is_numeric($x))
				{
					#Dolicz
					$total[$x]+=$total[$cat[$i][0]];
					$x=$sub[$x];
				}
			}
		}
		foreach($total as $k=>$x)
		{
			#Zapis
			if(is_numeric($x) && is_numeric($num[$k])) $db->exec('UPDATE '.PRE.'cats SET num='.$num[$k].', nums='.$x.' WHERE ID='.$k);
		}
	}
}

//Help: sitepoint.com
function RTR($parent,$left)
{
	global $db;
	if($left)
	$right = $left+1;
	$result = $db->query('SELECT ID FROM '.PRE.'cats WHERE sc="'.$parent.'";');
	$all=$result->fetchAll(3);
	foreach($all as $row)
	{
		$right = rebuild_tree($row[0], $right);
	}
	$db->exec('UPDATE '.PRE.'cats SET lft='.$left.', rgt='.$right.' WHERE ID='.$parent);
	return $right+1;
}
function RebuildTree()
{
	$left=1;
	foreach($GLOBALS['db']->query('SELECT ID FROM '.PRE.'cats') as $x)
	{
		$left=RTR($x['ID'],$left);
	}
}
?>