<?php 
// Bu sayfa ajax olarak çalışmalı ve one signal id yi üyelik girişi yapılmış personele kaydeder
// Kullanım url örneği : http://hnc.ng.zertel.net/ajax.php?s=onesignal&a=user-id-kaydet&userId=aaaaa-aaaa-aaaa-aaaa-aaaa

	if(!empty($bnmID)){

		$userId=z(8,'userId');
		if(!empty($userId)&&strlen($userId)<50){

			$ben=z(1,$bnmID,'ID,onesignalUserIds','personel');
			if(!empty($ben['onesignalUserIds'])){
				$ben['onesignalUserIds']=json_decode($ben['onesignalUserIds']);
			}
			else {
				$ben['onesignalUserIds']=array();
			}

			if(!in_array($userId, $ben['onesignalUserIds'])){
				$ben['onesignalUserIds'][]=$userId;
			

				if(!empty($ben['onesignalUserIds'])){
					$xsnc=z(3,$bnmID,array('onesignalUserIds'=>json_encode($ben['onesignalUserIds'])),'personel');
					if(!empty($xsnc)){

						$json['sonuc']=1;
						$json['mesaj']="Onesignal User Id başarı ile kaydedildi.";

						// Daha önce bu cihazı kullanmış personel var ise onları unut. Artık sadece bu kullanıcı kullanıyor.
						$_Personel=z(1,"WHERE arsiv='0' AND ID<>'".$bnmID."' AND onesignalUserIds LIKE '%\"".$userId."\"%'",'ID,onesignalUserIds','personel');
						if(!empty($_Personel)){
							foreach ($_Personel as $prsnl) {
								$xids=json_decode($prsnl['onesignalUserIds'],1);
								$prsnl['onesignalUserIds']=array();
								foreach ($xids as $xid) {
									if($xid!=$userId){
										$prsnl['onesignalUserIds'][]=$xid;
									}
								}
								z(3,$prsnl['ID'],array('onesignalUserIds'=>json_encode($prsnl['onesignalUserIds'])),'personel');
							}

							$json['mesaj'].=" (Daha önce kullanan kullanıcıdan temizleme işlemi de çalıştı.)";
						}

					}
				}


			}
			else $json['mesaj']="Id daha onceden kaydedilmis.";

		}
		else $json['mesaj']="Id gecersiz.";

	}
	else $json['mesaj']="Oturum acilmamis.";

?>
