function siparisKontrol(){
	id='siparisKontrol';
	if(!uyr('',id)){
		$.get('parca/siparisKontrol.php?sure=600',function(e){
			if(e){
				a=JSON.parse(e);
				if(a){
					uyr('Onaylanmayı bekleyen '+a.length+' adet sipariş formu var. Lütfen kontrol ediniz.',id,'alarm');
				}
			}
		});
	}
	else $.get('parca/siparisKontrol.php?surex=1');
    //setTimeout(siparisKontrol,1000);
}
$(document).ready(function(e){
	//setTimeout(siparisKontrol,2000);
});