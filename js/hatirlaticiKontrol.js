function hatirlaticiKontrol(){
	id='hatirlaticiKontrol';
	if(!uyr('',id)){
		$.get('sayfa/hatirlatici/ajax-hatirlatici-kontrol.php',function(e){
			if(e){
				a=JSON.parse(e);
				if(a){
					uyr(a.mesaj,id,'hatirlatici');
				}
			}
		});
	}
	else $.get('sayfa/hatirlatici/ajax-hatirlatici-kontrol.php');
    //setTimeout(hatirlaticiKontrol,1000);
}
$(document).ready(function(e){
	//setTimeout(hatirlaticiKontrol,2000);
});