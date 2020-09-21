<?PHP 
	function OneSignalSend($playerId,$mesaj='Uygulamanın bildirimleri aktif edildi.',$data=array('data'=>'demo')){

		/* 
			Bu fonksiyon istenilen cihaza veya cihazlara php sunucu üzerinden yönetici müdahalesi olmaksızın onesignal bildirim gönderebilmeyi sağlar
			Projenizin idlerini tanımladıktan sonra tek ihtiyacı "OneSignal Player ID" dir
			
			Öncelikle; 
			- Uygulamaya, firebase.google.com yardımıyla onesignal.com üzerinden onesignal bildirim hizmetini kurup panelden bildirim gönderilebiliyor olmansı gerekiyor.
			- Onesignal -> SeninProjen -> All Users -> Tabloda "Player ID" sütunundaki hangi idnin hangi cihaza ait olduğunu senin php sunucun biliyor olması gerekiyor 
			- Player ID yi sunucu kayıt altına alabilmesi için uygulama ilk açılışta OneSignal tarafından onun için oluşturulmuş Player IDyi sunucuya göndermesi gerekiyor. Bu yöntem için cordova js örneği http://zertel.net/paylasim/onesignal-cordova-js-ile-playerid-ogrenme.html
			Eğer onesignal'ın üzerinden bildirim gönderebiliyor isen;
			- Onesignal.com da projesinin içine gir.
			- App Setting menüsüne gir
			- Yukarıda sağ üstteki menüden "Keys & IDs" sekmesine gir
			- "OneSignal App ID" ve "REST API Key" değerlerini aşağıdaki değişkenlere uyarla
			- Bu fonksiyonu php sisteminin her hangi bir bölgesine uyarla
			- Id lerin aktif ve doğru ise bu fonksiyonu her kullandığında seçtiğin telefona bir bildirim gönderilecektir

			Kullanım Örneği;
			
			Bir Kullanıcıya:
			OneSignalSend( "Player ID xxxx-xxx-x-xxxxx-xxx", "Doğum gününüz kutlu olsun sayın kullanıcımız" );

			Veya çoklu gönderim:
			OneSignalSend( Array(
				"1. Player ID xxxx-xxx-x-xxxxx-xxx",
				"2. Player ID xxxx-xxx-x-xxxxx-xxx",
				"3. Player ID xxxx-xxx-x-xxxxx-xxx",
				"4. Player ID xxxx-xxx-x-xxxxx-xxx",
			), "Düğünümüz var, sizide bekleriz sayın kullanıcımız." );

		*/

		$onesignal_app_id="0eb6d819-fdda-400b-ac7b-bbc05dcf9e0c";
		$onesignal_rest_api_key="NDdmMmExYjAtMjNkOC00N2I5LWFlMGUtYjRhZWJhZGQ3MWIy";


		if(!empty($playerId)){
			
			$content = array(
				"en" => $mesaj
				);
			
			$fields = array(
				'app_id' => $onesignal_app_id,
				'include_player_ids' => is_array($playerId)?$playerId:array($playerId),
				//'included_segments' => array('All'),
				'data' => $data,
				'contents' => $content
			);
			
			$fields = json_encode($fields);
	    	//print("\nJSON sent:\n");
	    	//print($fields);
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
													   'Authorization: Basic '.$onesignal_rest_api_key ));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

			$response = curl_exec($ch);
			curl_close($ch);

			if(!empty($response)){
				$response=json_decode($response,1);
				return !empty($response['recipients'])?$response['recipients']:0;
			}

			return 0;
			
		}
		return false;
	}
	


?>