<?Php 
require(__DIR__.'/z/z.php');

if(z(8,'dbpw')){
	z(11,'dbpw',z(8,'dbpw'));
}
if(z(11,'dbpw')){
	$dbpw=z(11,'dbpw');
}
else{
	$dbpw='';
}

if(strpos(z('host'),'localhost')!==false || strpos(z('host'),'192.168.')!==false){   // Eğer yerel sunucuda isem
	z('con',Array('localhost','root',$dbpw,'kayteks','otm_'));   // Localhost veritabanına bağlan
}
else{   // Eğer yerel sunucuda değil isem
	z('con',Array('localhost','ng_otmkayteks','bycW1y55XREsddzg','ng_otmkayteks','otm_')
		,'SET sql_mode="TRADITIONAL"'   // Mysql modu katı ise bunu kullan
	);   // Host sunucuya bağlan
}

z('ini','default_time');
z('lgna','tablo','personel');
z('lgna','alan',Array('kullanici','sifre',true));
z('lgna','hatirla',true);
z('lgna','kaydet',Array('ID','admin','oturumID','kullanici','ad','soyad','departmanlar'));
z('lgna','guncelle',Array('tarihGiris'=>z('datetime')));

z('ini','display_errors',true);
z('ini','oturum_oe','hnc106_');
z('ini','cerez_oe','hnc106_');

z('ini','id_stl','ID');
   
?>