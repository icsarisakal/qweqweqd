<?Php
$sd='';
if(!empty($b)){
	if(is_numeric($b)){
		$sd="WHERE ID='".$b."' LIMIT 1";
	}
	else if($b=='son'){
		$sd="ORDER BY ID DESC LIMIT 1";
	}
	else{
		$sd=$b;
	}
}
if(!empty($c)){
	z(6,$c);
}
$srg="DELETE FROM `".$con['vt']."`.`".$con['oe'].$con['t']."` ".$sd.";";
$GLOBALS['pdo']->query($srg);
$snc=z(5,$sd)==0?1:0;
?>