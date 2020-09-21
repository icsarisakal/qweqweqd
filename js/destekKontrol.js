function destekKontrol(){
	id='destekKontrol';
	if(!uyr('',id)){
		$.get('parca/destekKontrol.php?sure=600',function(e){
			if(e){
				a=JSON.parse(e);
				if(a){
					uyr(a.mesaj,id,'destek');
				}
			}
		});
	}
	else $.get('parca/destekKontrol.php?surex=1');
	//console.log("Destek kontrol");
    setTimeout(destekKontrol,1000);
}
$(document).ready(function(e){
	setTimeout(destekKontrol,2000);
});