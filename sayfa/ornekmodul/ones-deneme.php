<?php 
	$playerId="f65cec98-8028-4a31-93a3-30141c97ad7d";
	$mesaj='Deneme bildirim gönderimi php api';
	//$data=array('test'=>'Data içerik');
	echo OneSignalSend($playerId,$mesaj);
?>