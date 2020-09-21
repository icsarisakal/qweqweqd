<?Php

// MESAJ TANIMLAMALARI
$_LogMesaj=array(
	// -1 ve aşağısı Genel İşlemler
	-1=>'[PERSONEL] isimli kullanıcı bir [NESNE] sildi.',
	-2=>'[PERSONEL] isimli kullanıcı kalıcı olarak bir [NESNE] sildi.',
	
	-4=>'[PERSONEL] isimli kullanıcı bir [NESNE] arşive gönderdi.',
	-5=>'[PERSONEL] isimli kullanıcı bir [NESNE] arşivden çıkardı.',
	
	-10=>'[PERSONEL] isimli kullanıcı [NESNE] çoklu seçim ile [ISLEM] işlemi uyguladı.',
	-11=>'[PERSONEL] isimli kullanıcı [NESNE] indirme işlemi uyguladı.',
	
	// 1-100 Kullanıcı Girişi ve Personel İşlemlerinin Log Mesajları
	1=>'[PERSONEL] isimli kullanıcı başarıyla giriş yaptı.',
	2=>'[IP] ip\'ye sahip misafir, [REQUEST]kullanici[/REQUEST] kullanıcı adıyla giriş yapmaya çalıştı fakat kullanıcı adı veya şifre hatalı.',
	3=>'[PERSONEL] isimli kullanıcı çıkış yaptı.',
	4=>'[PERSONEL] isimli kullanıcı bilgilerini güncelledi.',
	5=>'[PERSONEL] isimli kullanıcı şifresini güncelledi.',
	11=>'[IP] ip\'ye sahip misafir, aktifleştirilmemiş veya sonradan yöneticiler tarafından pasifleştirilmiş üyeliğe([REQUEST]kullanici[/REQUEST]) kullanıcı girişi yapmaya çalıştı fakat giriş sistem tarafından iptal edildi.',
	12=>'[IP] ip\'ye sahip misafir, hatalı giriş sebebiyle bloke edilmiş üyeliğe([REQUEST]kullanici[/REQUEST]) giriş yapmaya çalıştı (kullanıcı adı ve şifre doğru) fakat giriş sistem tarafından iptal edildi.',
	13=>'[IP] ip\'ye sahip misafir, hatalı giriş sebebiyle [REQUEST]kullanici[/REQUEST] kullanıcısının bloke olmasına sebep oldu.',
	14=>'[IP] ip\'ye sahip misafir, hatalı giriş sebebiyle bloke edilmiş üyeliğe([REQUEST]kullanici[/REQUEST]) giriş yapmaya çalıştı fakat kullanıcı adı veya parola hatalı.',
	15=>'[PERSONEL] isimli kullanıcı oturumu açık tut özelliğini kullanarak sisteme giriş yaptı.',
	16=>'[PERSONEL] isimli kullanıcı otomatik giriş linkini kullanarak sisteme giriş yaptı.',
	17=>'[IP] ip\'ye sahip misafir, otomatik giriş linkini kullanarak ([REQUEST]d1[/REQUEST] kullanıcı adı ile) sisteme kaydoldu.',
	18=>'[IP] ip\'ye sahip misafir, otomatik giriş linki sayfasını görüntüledi.',
	21=>'[PERSONEL] isimli kullanıcı yeni bir personel ekledi.',
	22=>'[PERSONEL] isimli kullanıcı bir personelin bilgilerini düzenledi.',
	
	// 101-200 Destek Talebi İşlemlerinin Log Mesajları	
	101=>'[PERSONEL] isimli kullanıcı yeni bir destek talebi oluşturdu.',
	102=>'[PERSONEL] isimli kullanıcı destek talebine cevap yazdı.',
	103=>'[PERSONEL] isimli kullanıcı destek talebini işleme aldı.',
	104=>'[PERSONEL] isimli kullanıcı destek talebini başka bir departmana devretti.',
	105=>'[PERSONEL] isimli kullanıcı destek talebini devraldı.',
	106=>'[PERSONEL] isimli kullanıcı destek talebini sonlandırdı.',
	107=>'[PERSONEL] isimli kullanıcı destek talebinin memnuniyet anketini oyladı.',
	110=>'[PERSONEL] isimli kullanıcı destek talebini okudu.',
	
	// 201-300 Sipariş İşlemlerinin Log Mesajları
	201=>'[PERSONEL] isimli kullanıcı, yeni bir sipariş oluşturdu ve sipariş otomatik onaylandı.',
	202=>'[PERSONEL] isimli kullanıcı, sipariş oluşturmak istedi fakat başarısız oldu.',
	203=>'[PERSONEL] isimli kullanıcı, yeni bir sipariş oluşturdu fakat girilen bilgilerin bazıları kaydolamadı ve düzenleme sayfasına yönlendirildi.',
	204=>'[PERSONEL] isimli kullanıcı, yeni bir sipariş oluşturdu fakat bakiye limiti yetersizliği sebebiyle sipariş yetkililerin onayını bekliyor.',
	
	211=>'[PERSONEL] isimli kullanıcı, siparişi düzenledi ve sipariş otomatik onaylandı.',
	212=>'[PERSONEL] isimli kullanıcı, siparişi düzenlemek istedi fakat başarısız oldu.',
	213=>'[PERSONEL] isimli kullanıcı, siparişi düzenledi fakat girilen bilgilerin bazıları kaydolamadı.',
	214=>'[PERSONEL] isimli kullanıcı, siparişi düzenledi fakat bakiye limiti yetersizliği sebebiyle sipariş yetkililerin onayını bekliyor.',
	
	220=>'[PERSONEL] isimli kullanıcı, siparişin tekrar gözden geçirilmesi gerekçesi ile siparişin durumunu sıfırladı.',
	221=>'[PERSONEL] isimli kullanıcı, siparişi onayladı.',
	222=>'[PERSONEL] isimli kullanıcı, siparişi reddetti.',
	
	// 301-400 Firma işlemlerinin Log Mesajları
	301=>'[PERSONEL] isimli kullanıcı yeni bir firma ekledi.',
	302=>'[PERSONEL] isimli kullanıcı bir firmanın bilgilerini düzenledi.',
	303=>'[PERSONEL] isimli kullanıcı yeni bir firma eklemeye çalıştı başarısız oldu.',
	304=>'[PERSONEL] isimli kullanıcı bir firmanın bilgilerini düzenlemeye çalıştı başarısız oldu.',
	
	// 401-500 Nesne işlemlerinin Log Mesajları
	401=>'[PERSONEL] isimli kullanıcı yeni bir nesne ekledi.',
	402=>'[PERSONEL] isimli kullanıcı nesneleri düzenledi.',
	403=>'[PERSONEL] isimli kullanıcı nesneleri düzenledi fakat bazı değerler kaydolamadı.',
	404=>'[PERSONEL] isimli kullanıcı nesneleri düzenlemek istedi fakat başarısız oldu.',


	1001=>'[NESNE] [ISLEM] işlemi başarıyla gerçekleştirildi.',

	

);
if(!empty($_Log['mesaj'])&&is_numeric($_Log['mesaj']))$_Log['mesaj']=!empty($_LogMesaj[$_Log['mesaj']])?$_LogMesaj[$_Log['mesaj']]:'';

// ETİKET TANIMA ve TANIMLAMA İŞLEMLERİ
$_Etkt=array('MESAJ','PERSONEL','NESNE','ISLEM','IP','REQUEST');
$etA=true;$etI=0;
while($etA&&$etI<50){$etA=false;$etI++;
	foreach($_Etkt as $et){
		if(strpos($_Log['mesaj'],'['.$et.']')!==false){$etA=true;
			$etF=array('['.$et.']','[/'.$et.']');
			$etD='';
			if(strpos($_Log['mesaj'],$etF[1])!==false){
				$bas=strpos($_Log['mesaj'],$etF[0]);
				$son=strpos($_Log['mesaj'],$etF[1]);
				$len=strlen($et)+2;
				$etD=substr($_Log['mesaj'],$bas+$len,$son-($bas+$len));
				$_Log['mesaj']=substr($_Log['mesaj'],0,$bas).$etF[0].$etF[1].substr($_Log['mesaj'],$son+$len+1);
			}else $_Log['mesaj']=str_replace($etF[0],$etF[0].$etF[1],$_Log['mesaj']);
			switch($et){
				case'PERSONEL':
					$logPID=!empty($etD)?$etD:z('lgn','ID');
					$_LP=z(1,$logPID,NULL,'personel');
					$_Log['mesaj']=str_replace($etF,array('<a href="?s=personel&a=profil&id='.$logPID.'">'.(!empty($_LP['ad'])?$_LP['ad']:''),'('.(!empty($_LP['kullanici'])?$_LP['kullanici']:'').')</a>'),$_Log['mesaj']);
				break;
				case'MESAJ':
					$_Log['mesaj']=str_replace($etF,array($_LogMesaj[$etD],''),$_Log['mesaj']);
				break;
				case'NESNE':
					$_Log['mesaj']=str_replace($etF,array('<b>'.
					(!empty($_LogTip[$_Log['nesne']]['ad'])?$_LogTip[$_Log['nesne']]['ad']:$_Log['nesne'])
					.'</b>',''),$_Log['mesaj']);
				break;
				case'ISLEM':
					if(!empty($_Log['islem'])){
						$_Log['mesaj']=str_replace($etF,array('<b>'.
						(!empty($_LogTip[$_Log['nesne']][$_Log['islem']])?$_LogTip[$_Log['nesne']][$_Log['islem']]
						:(!empty($_Islm[$_Log['islem']])?$_Islm[$_Log['islem']]:$_Log['islem']))
						.'</b>',''),$_Log['mesaj']);
					}
				break;
				case'IP':
					$_Log['mesaj']=str_replace($etF,array('"'.z('sw','REMOTE_ADDR').'"',''),$_Log['mesaj']);
				break;
				case'REQUEST':
					$_Log['mesaj']=str_replace($etF,array('"'.z(9,$etD).'"',''),$_Log['mesaj']);
				break;
			}
		}
	}
}

// LOG KAYIT İŞLEMİ
if(empty($_Log['personel_ID'])&&z('lgn','ID'))$_Log['personel_ID']=z('lgn','ID');
if(empty($_Log['ip']))$_Log['ip']=z('sw','REMOTE_ADDR').':'.z('sw','REMOTE_PORT');
if(empty($_Log['nesne'])&&z(8,'s'))$_Log['nesne']=z(8,'s');
if(empty($_Log['nesne']))$_Log['nesne']='bilinmiyor';
if(empty($_Log['nesneID']))$_Log['nesneID']=0;
if(empty($_Log['islem'])&&z(8,'a'))$_Log['islem']=z(8,'a');
if(empty($_Log['sonuc'])&&isset($GLOBALS['snc']))$_Log['sonuc']=$GLOBALS['snc'];
if(empty($_Log['sonuc']))$_Log['sonuc']=0;
if(empty($_Log['tarih']))$_Log['tarih']=z('datetime');
if(empty($_Log['url']))$_Log['url']=z('sw','SERVER_NAME').z('sw','REQUEST_URI');
$logsnc=z(2,$_Log,'log');
?>