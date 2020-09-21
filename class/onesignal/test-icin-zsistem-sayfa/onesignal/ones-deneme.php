<?php 
	// Bu sayfa z sistemde one signla yüklendikten sonra sistemin her hangi bir yerinde, seçili player id ye direk bildirim atabilmeyi gösteren test sayfasıdır.
	// sayfa/onesignal/ klasörü içine atıldığındaki kullanım örneği adresi :    /?s=onesignal&a=ones-deneme
	// Test için Player id ye one signal yönetim panelinden ulaşılabilir. (Daha sonraları player idyi otomatik elde edebilmek için, one signal düzgün bir şekilde zsisteme dahil edilirse personel tablosunda onesignalUserIds sütununa kullanıcının kendi player(user) ID si otomatik olarak kaydoluyor. Personele bildirim gönderileceği zaman idsi veritabanından istenilebilir)
	$playerId='2298d40d-7fea-4caf-91f9-887a1aaea7f2';
	$mesaj='Deneme bildirim gönderimi php api';
	$data=array('test'=>'Data içerik');
	echo OneSignalSend($playerId,$mesaj,$data);
?>