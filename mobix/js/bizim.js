// BİZİM FONKSİYONLARIMIZ


/*/
// POST tipindeki formu oku ajax olarak gönder
// Kullanımı
ajaxPostGonder( 'iof-'+id, function(sonuc){
	alert('bitti'+sonuc);
});
/*/
function ajaxPostGonder(formId,bitinceCB,gondermedenOnceCB){
	if(gondermedenOnceCB)gondermedenOnceCB();
	
	var http = new XMLHttpRequest();
	var form = document.getElementById(formId);
		var formData=new FormData(form);
	http.open("POST",form.getAttribute('action'),true);

	//http.setRequestHeader('Content-type',"application/x-www-form-urlencoded");

	http.onreadystatechange = function () {
		if(http.readyState == 4 && http.status == 200 ){
			bitinceCB(http.responseText);
		}
	} 
	http.send(formData);

	return false;
}

/*/
// Hızlıca GET request yap ve callback ile devam et
// Kullanımı
ajaxGet('ajax.php?s=hayvan&a=hizliimha_form',function(sonucText){
   	alert(sonucText);
});
/*/
function ajaxGet(url,CB){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			CB(this.responseText);
		}
	};
	xhttp.open("GET", url, true);
	xhttp.send();

	return false;
}

// input checkbox kontrolü ile bir dibi gizleyip gösterir (hatırlatma da eklensin mi? gizli formu)
function gizleGoster(ths,hedef,sec){
	if(!sec){
		if($(ths).prop('checked')){
			$(hedef).slideDown('fast');
		}
		else{
			$(hedef).slideUp('fast');
		}
	}
	else{
		if($(ths).val()==sec){
			$(hedef).slideDown('fast');
		}
		else{
			$(hedef).slideUp('fast');
		}
	}
}


// YENİ GÖREV OLUŞTURURKEN musteritakip/mobix-ekle.php
function firmaAdIleKisilerSelect(firma_ad){
	ajaxGet('ajax.php?s=kisi&a=kisiler-json&firma_ad='+firma_ad,function(sonucText){
	   	if(sonucText && sonucText.length>1){
	   		var sonucJson=JSON.parse(sonucText);
	   		if( sonucJson.sonuc=="1" ){
	   			_Kisi=sonucJson.cevap;
	   			//console.log(_Kisi);
				if(_Kisi && _Kisi.length>0){
	   				$('[name="musteritakip[kisi_ID]"]').html("");
	   				for(i in _Kisi){
	   					$('[name="musteritakip[kisi_ID]"]').append('<option value="'+_Kisi[i].ID+'">'+_Kisi[i].ad+' '+_Kisi[i].soyad+'</option>');
	   				}
	   			}
	   			else console.log("Kişi bulunamadı");
	   		}
	   		else console.log("Kişiler okunamadı.");
	   	}
	});
}
// Firma popup açarken
function popupFirmaEkleAc(){
	$('#popup-firma-ekle-firmaAd').val("");
	$('#popup-firma-ekle-firmaAd').val( $('[name="musteritakip[firma_ad]"]').val() );
	myApp.popup(".popup-firma-ekle");
	$('.musteritakip-ekle-uyari-kutusu').hide().html("");
}

$(document).ready(function(){
	setTimeout(function(){
		$('.jstarih').datetimepicker({lang:'tr',timepicker:false,format:'Y-m-d'});
		$('.jstarihsaat').datetimepicker({lang:'tr',timepicker:true,format:'Y-m-d H:i'});
		$(document).click(function(e) {
			if (!$(e.target).is('.xdsoft_datetimepicker')) {
				$('.xdsoft_datetimepicker').hide();
			}
		});
	},300);
});


$$(document).on('pageInit', function (e) {
	setTimeout(function(){
		$('.jstarih').datetimepicker({lang:'tr',timepicker:false,format:'Y-m-d'});
		$('.jstarihsaat').datetimepicker({lang:'tr',timepicker:true,format:'Y-m-d H:i'});
	},1100);
});

// Anasayfa yüklendiğinde
$$(document).on('pageInit', '.page[data-page="index"]', function (e) {
    myApp.mainView.history=[];
    myApp.mainView.router.history=[];
    console.log('Geçmiş temizlendi');
});


var _FirmaMusteri=[],_Kisi=[];
// Firma Ekleme Sayfası Açılınca
$$(document).on('pageInit', '.page[data-page="firma-ekle"]', function (e) {
	setTimeout(function(){

		////// YENİ GÖREV OLUŞTURMA SAYFASI AKSİYONLARI

		/* BİZİM bizim Autocomplete Kurum  */
		var autocompleteDropdownSimple = myApp.autocomplete({
			input: '#musteritakip-ekle-musteritakip-firma_ad',
			openIn: 'dropdown',
			source: function (autocomplete, query, render) {
				var results = [];
				if (query.length === 0) {
					render(results);
					return;
				}
				for (var i = 0; i < _FirmaMusteri.length; i++) {
					if (_FirmaMusteri[i].ad.toLowerCase().indexOf(query.toLowerCase()) >= 0) results.push(_FirmaMusteri[i].ad);
				}
				render(results);
			}
		});
		
		ajaxGet('ajax.php?s=firma&a=musteriler-json',function(sonucText){
		   	if(sonucText.length>1){
		   		var sonucJson=JSON.parse(sonucText);
		   		if( sonucJson.sonuc=="1" ){
		   			_FirmaMusteri=sonucJson.cevap.musteriler;
		   			//_Kisi=sonucJson.cevap.kisiler;
		   		}
		   		else console.log("Müşteri firmalar okunamadı.");
		   	}
		});


		$('[name="musteritakip[firma_ad]"]').change(function(){
			var firma_ad=$(this).val();
			var kisiAraAnahtar=false;
			for(i in _FirmaMusteri){
				if(_FirmaMusteri[i].ad==firma_ad){
					kisiAraAnahtar=true;
					break;
				}
			}
			if(kisiAraAnahtar){
				firmaAdIleKisilerSelect(firma_ad);
			}
			else{
				$('[name="musteritakip[kisi_ID]"]').html("");
				//$(this).val("");
			}
		});

		$('.popup-firma-ekle-tetik').click(function(){
			popupFirmaEkleAc();
		});

	    var requiredCheckboxes = $(':checkbox[required]');
	    requiredCheckboxes.change(function(){
	        if(requiredCheckboxes.is(':checked')) {
	            requiredCheckboxes.removeAttr('required');
	        }
	        else {
	            requiredCheckboxes.attr('required', 'required');
	        }
	    });

	    /*/
	    $$('.hatirlatici-sure-select').on('change', function(e){
			alert();
		});
	    /*/

	    setInterval(function(){
	    	if($('.hatirlatici-sure-select select').length>0){

		    	var vl=$('.hatirlatici-sure-select select').val();
		    	if(vl=='ozel_tarih'){
					$('.ozel-tarih-kutu').slideDown('fast');
		    	}
		    	else{
					$('.ozel-tarih-kutu').slideUp('fast');
		    	}
		    	console.log('.hatirlatici-sure-select '.vl);
	    	}
	    },1500);


		////// YENİ GÖREV OLUŞTURMA SAYFASI AKSİYONLARI END


	},1100);

});