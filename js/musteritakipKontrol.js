function musteritakipKontrol(){
	id='musteritakipKontrol';
	if(!uyr('',id)){
		$.get('parca/musteritakipKontrol.php?sure=6000',function(e){
			console.log("Müşteri takip kontrol");
			if(e){
				a=JSON.parse(e);
				if(a){
					uyr(['?s=musteritakip&a=listele_durum0','Kontrol etmeniz gereken '+a.length+' adet iş kaydı var. Lütfen Müşteri Takip sayfasında kontrol ediniz.'],id,'alarm');
				}
			}
		});
	}
	else $.get('parca/musteritakipKontrol.php?surex=1');
    setTimeout(musteritakipKontrol,2000);
}
$(document).ready(function(e){
	setTimeout(musteritakipKontrol,3000);
});