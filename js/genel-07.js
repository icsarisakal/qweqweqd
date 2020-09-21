$(document).ready(function(e) {
	/*flatpickr(".flatpickr", {
		"locale": "tr",
		mode: "multiple",
		dateFormat: "Y-m-d"
	});*/
});
var pencereID='';
function pencereAc(id){
	if(!id)id='.pencerelik';
	pencereID=id;
	if(id!='.pencerelik')$('body').append('<div id="pencereBg" onclick="pencereKapat()">&nbsp;</div>');
	else {$(id).click(pencereKapat);setTimeout(function(){pencereKapat(id);},$(id).html().length*28);}
	
	$(id).addClass('pencere').css( {'left':(window.innerWidth/2)-($(id).outerWidth()/2), 'top':(window.scrollY+40)+"px"} ).fadeIn('fast')/*.css('left','50%').css('left',parseInt($(id).css('left')) - parseInt() )*/;
}
function filtregoster(ths){
	$(ths).parent().find(".araGizliGrup").toggle();
}
function pencereOrtala(id){
	if(!id)id=pencereID;
	var x=(window.innerWidth/2)-($(id).outerWidth()/2);
	var y=(window.innerHeight/2)-($(id).outerHeight()/2);
	$(id).animate({'left':x,'top':y},500);
}
function pencereKapat(id){
	if(!id)id=pencereID;
	$(id).fadeOut('fast',function(){$(this).removeClass('pencere');$('body #pencereBg').remove();});
	$('.pencerelik').hide();
}
function tabKontrol(id){
	$('.tab-group .tab').slideUp('fast',function(){alert();
		$(id).slideDown('fast');
	});
}
function git(url){
	window.location.href=url;
}
var uyrA=Array(),uyrY=0;
function uyr(msj,id,tip,sure){
	var url="";
	if(Array.isArray(msj)){
		url=msj[0];
		msj=msj[1];
	}

	if(!id)id='genel';
	if(!uyrA[id]){
		if(msj){
			loop=false;
			$('#uyr_'+id).remove();
			switch(tip){
				case 'alarm':icon='drm4';sesAd='alarm';break;
				case 'destek':icon='drm4';sesAd='destek';loop=true;break;
				default: sesAd='tamam';icon='drm4';
			}
			if(icon)msj='<span><img src="img/'+icon+'.png"></span><span style="border:0px;display:inline-block; vertical-align:top; padding:10px">'+msj+'</span>';
			$('body').append('<div id="uyr_'+id+'" style="display:none" onclick="git(\''+url+'\')">'+msj+'</div>');
			$('#uyr_'+id).click(function(){$(this).fadeOut('fast',function(){$(this).remove();uyrA[id]=false;});ses('cevap');});
			if(id&&sure){
				setTimeout( function(){$('#uyr_'+id).fadeOut('fast',function(){$('#uyr_'+id).remove();uyrA[id]=false;});ses('cevap');},sure*1000);
			}
			$('#uyr_'+id).addClass('pencere').fadeIn('fast').css('left','50%').css('top','20%').css('left',parseInt($('#uyr_'+id).css('left'))-($('#uyr_'+id).width()/2)).css('top',parseInt($('#uyr_'+id).css('top'))+uyrY);
			uyrY+=$('#uyr_'+id).outerHeight()+6;
			uyrA[id]=true;
			
			if(sesAd)ses(sesAd,loop);
		}
	}
	else return uyrA[id];
}

function tarihOlustur(id){
	if(!id)id='#araTarih';
	var gun='',ay='',yil='';
	if($('.trh_tarih:eq(2)').val()>0){
		yil=$('.trh_tarih:eq(2)').val();
		$(id).val(yil);
	}
	if(yil&&$('.trh_tarih:eq(1)').val()>0){
		ay='-'+$('.trh_tarih:eq(1)').val();
		$(id).val(yil+''+ay);
	}
	if(ay&&$('.trh_tarih:eq(0)').val()>0){
		gun='-'+$('.trh_tarih:eq(0)').val();
		$(id).val(yil+''+ay+''+gun);
	}
	if(!(gun+ay+yil))$(id).val('');
}
function tarihOlustur2(id,clas){
	if(!id)id='#araTarih';
	if(!clas)clas='.trh_tarih';
	var gun='',ay='',yil='';
	if($(clas+':eq(2)').val()>0){
		yil=$(clas+':eq(2)').val();
		$(id).val(yil);
	}
	if(yil&&$(clas+':eq(1)').val()>0){
		ay='-'+$(clas+':eq(1)').val();
		$(id).val(yil+''+ay);
	}
	if(ay&&$(clas+':eq(0)').val()>0){
		gun='-'+$(clas+':eq(0)').val();
		$(id).val(yil+''+ay+''+gun);
	}
	if(!(gun+ay+yil))$(id).val('');
}
function ses(a,loop,oto){
	if(!oto)oto='autoplay="autoplay"';
	if(loop)loop='loop="loop"';
	$('audio').remove();
	$('body').append('<audio '+oto+' '+loop+' volume="0.5"><source src="audio/'+a+'.ogg" type="audio/ogg"><source src="audio/'+a+'.mp3" type="audio/mp3"></audio>');
}
var _Ses={};
function _yses(a,id,b){
	if(!b){
		b='';
	}
	if(a==1){
		if(!_Ses[id]){
			$('body').append('<audio id="ses'+id+'" src="audio/alarm'+b+'.mp3" autoplay="autoplay" loop="loop">');
			_Ses[id] = 1;
		}
		else {
			$('#ses'+id).remove();
			_Ses[id] = 0;
		}
	}
	else if(a==2){
		$('body').append('<audio class="sesTamam" src="audio/tamam.mp3" autoplay="autoplay">');
	}
	else if(a==3){
		$('body').append('<audio class="sesErtele" src="audio/ertele.mp3" autoplay="autoplay">');
	}
	else if(a==4){
		$('body').append('<audio class="sesCevap" src="audio/cevap.mp3" autoplay="autoplay">');
	}
}
function sy(a,b){if(!a)a=0;if(b)return ( parseFloat(parseFloat(a).toFixed(b)) + 0 ).toString().replace('.',',');else return parseFloat(a.toString().replace(',','.'));}
//function sy(a,b){if(!a)a=0;if(b)return (Math.round(a*b)/b).toString().replace('.',',');else return parseFloat(a.toString().replace(',','.'));}
function araGrupla(_Ara){
	$('.araGrup').each(function(i,e){
		var aid='.araGrup:eq('+i+')';
		var nm=$(aid+' .ara:first-child').attr('name');
		var inm=aid+' .ara';
		if($(inm).length>1){
			_Ara[nm]=[];
			$(inm).each(function(index, element) {
				_Ara[nm][index]=$(this).val(); 
			});
		}
		else _Ara[nm]=$(inm).val();
	});
	$('.araGrupChck').each(function(i,e){//console.log(i);alert();
		var aid='.araGrupChck:eq('+i+')';
		var nm=$(aid+' .ara:first-child').attr('name');
		var inm=aid+' .ara';
		if($(inm).length>1){
			nm=nm.replace('ara[','')
			.replace(']','');
			_Ara[nm]=[];
			var sil=1;
			$(inm).each(function(index, element) {
				if($(this).prop('checked')){
					_Ara[nm][index]=$(this).val();
					sil=0;
				}
				else{
					_Ara[nm][index]="";
				}
			});
			if(sil){
				delete _Ara[nm];
			}
				//console.log(nm);
				//console.log(_Ara);
			}
			else _Ara[nm]='';
		});
	//console.log(_Ara);
	return _Ara;
}
function galeriSonraki(){
	var ilkSrc=$('.galeri a.img:eq(0) img').attr('src');
	var sonrakiSrc='';
	$('.galeri a').each(function(index, element) {
		if($('#galeriBox img').attr('src')==$('.galeri a.img:eq('+index+') img').attr('src')){
			sonrakiSrc=$('.galeri a.img:eq('+(index+1)+') img').attr('src');
		}
	});
	//$('#galeriBox img').fadeToggle('fast',function(){
		$('#galeriBox img').animate({'opacity':0},function(){
			if(sonrakiSrc)$(this).attr('src',sonrakiSrc);
			else if(ilkSrc)$(this).attr('src',ilkSrc);
			pencereOrtala();
			$(this).animate({'opacity':1});
		});
	}
	function galeriYukle(){
		$('.galeri a.img img').click(function(e) {
			$('body #galeriBox').remove();
			$('body').append('<div id="pencereBg" onclick="pencereKapat()">&nbsp;</div><div id="galeriBox" style="display:none"><div style="text-align:right" onclick="pencereKapat()"><b style="cursor:pointer">&nbsp;X&nbsp;</b></div><img src="'+$(this).attr('src')+'" style="cursor:pointer;max-height:'+(window.innerHeight-70)+'px;max-width:'+(window.innerWidth-70)+'px;" onclick="galeriSonraki()" onDblClick="pencereKapat()" /></div>');
			pencereAc('#galeriBox');
			pencereOrtala();
			return false;
		});;
	}
	var i_durum="", i_icerik="";
	function i(a,b,c,d,e,CB){
		switch(a){
			case 'cvr':
			$.getJSON( 'i.php?i=cvr&bunu='+b+'&buna='+c+'&'+b+'='+d, function(data){CB(data);} );
			break;
			case 'oku':
			var sQ="";
			for(key in c){
				if(sQ)sQ+='&';
				sQ+=key+"="+c[key];
			}
			//$.getJSON( 'i.php?i=oku&oku='+b+'&'+sQ, function(data){d(data);} );
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					i_icerik=this.responseText;
					if(this.responseText){
						i_durum=this.responseText;
						try{
							if(!CB&&d)CB=d;
							CB(JSON.parse(this.responseText));
						}
						catch{
							i_durum="Ajax veri çöktü";
						}
						i_durum="Ajax veri parçalandı.";
					}
					else{
						i_durum="Ajax sonucu boş";
					}
				}
			};
			var iurl='i.php?i=oku&oku='+b+'&'+sQ;
			//console.log('AJAX get: '+iurl);
			xhttp.open("GET", iurl, true);
			xhttp.send();
			break;
		}
	}
	function jsonToSelectOption(id,data) {
		$(id).html("");
		if(data){
			data.forEach(function(d){
				$(id).append('<option value="'+d.ID+'">'+d.ad+'</option>');
			});
			$(id+"_div").slideDown();
		}
		else{
			$(id).append('<option value="">--içerik bulunamadı--</option>');
			$(id+"_div").slideUp();
		}
	}
	function kopyalaYapistir(id,id2){
		var cln=document.getElementById(id).getElementsByTagName('table')[0].cloneNode(true);
		document.getElementById(id2).appendChild(cln);
		return cln;
	}
	function alttrGenislet(btid){
	//console.log('.alttr_'+btid+' genişlet');
	$('.alttr_'+btid).toggle();
	window.location.hash=btid;
}
function enterTabindex(id){
	if(!id)id="";
	$(id+'[tabindex]').keypress(function(e){
		if(e.keyCode==13 && $(this).context.type!='submit'){ 
			if(!window.gonderAnahtar){
				if($(this).context.nodeName!='TEXTAREA'){

					e.preventDefault();
					var tabx = $(this).attr('tabindex');
					var inpx=$('[tabindex="'+tabx+'"]');
					var j=0,lng=0;
					inpx.each(function(){lng++;});
					inpx.each(function(i,e2){
						if($(this).is(':focus')){
							if(lng-1 == j){
								j=-1;
								tabx++;
							}
							$('[tabindex="'+tabx+'"]:eq('+(j+1)+')').focus();
							return false;
						}
						j++;
					});

					
				}
			}
			window.gonderAnahtar=1; setTimeout(function(){window.gonderAnahtar=0;},200);
		}
	});

}

function renkYenileMini(){
	if($('.ara').length){
		$('.ara').each(function(index, element) {
			if(index&&$(this).val())$(this).css({'background-color':'#0a0','color':'#fff','font-size':'13px'});
			else $(this).css({'background-color':'#eee','color':'#000'});
		});
	}
}
function renkYenile(){
	if($('.araGrupChck').length>0){	
		$('.araGrupChck').each(function(i,e){
			var aid='.araGrupChck:eq('+i+')';
			var btnid=aid+' .araGrupBtn';
			var inm=aid+' .ara';
			$(inm).each(function(index, element) {
				if($(this).prop('checked')){
					$(btnid).css('background-color','#0f0');
					return false;
				}
				$(btnid).css('background-color','#eee');
			});
		});
	}
	// dolu ara renklendirmesi (yukarıda da var)
	renkYenileMini();
}
// Örnek al
function ornekOl(ths,ad){
	var _OrnekAl=document.querySelectorAll("[data-ornekal='"+ad+"']");
	if(_OrnekAl.length>0)
		for (var i = 0; i < _OrnekAl.length; i++)
			_OrnekAl[i].value=ths.value;
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



var secA=false,ggA=[],slaytNO=[],slaytA=[];
$(document).ready(function(e) {
	if($('.pencerelik').length==1){
		pencereAc('.pencerelik');
	}
	if($('.pencerelik2').length==1){
		pencereAc('.pencerelik2');
	}
	$('.tumunuSec').click(function(e) {
		secA=!secA;
		if(secA){
			$('.secilebilir').prop('checked',true);
			$('.tumunuSec').prop('checked',true);
		}
		else{
			$('.secilebilir').prop('checked',false);
			$('.tumunuSec').prop('checked',false);
		}
	});
	$('.tumunu-sec-hedef').change(function(e) {
		var hedefId=$(this).attr('data-hedef');
		$(hedefId).prop('checked', $(this).prop('checked') );
	});
		
	/*
    if($('th.printx .secilebilir').length>1){
    	//$('.secilebilir');
    	$('th.printx').click(function(){
    		var sclbl=$(this).children('.secilebilir');
    			setTimeout(function(){
    		if(sclbl.prop('checked')!=true){
    				//if(sclbl.prop('checked')!=true){
	    				sclbl.prop('checked',true);
	    			//}
    		}
    		else{
    				//if(sclbl.prop('checked')!=false){
	    				sclbl.prop('checked',false);
	    			//}
    		}
    			},100);
    	});
    
	}
	*/
	// ARA GRUP İNPUT
	if($('.araGrup').length>0){		
		$('.araGrup').append('<button type="button" id="grupEkleBtn">+</button><button type="button" id="grupSilBtn">-</button>');
		$('.araGrup #grupEkleBtn').click(function(e){
			$(this).parent().children('.ara:last').clone().insertBefore(this);
			$('.ara').change(ajaxAra).keyup(ajaxAra);
			$('.jstarih').datetimepicker({lang:'tr',timepicker:false,format:'Y-m-d'});
			//$('.yenitarih').datetimepicker({lang:'tr',showClose: true,autoclose: true,timepicker:false,format:'Y-m-d'});
			$('.jstarihsaat').datetimepicker({lang:'tr',timepicker:true,format:'Y-m-d H:i'});
		});
		$('.araGrup #grupSilBtn').click(function(e){
			if($(this).parent().children('.ara').length>1)$(this).parent().children('.ara:last').remove();
			else $(this).parent().children('.ara:last').val('');
			ajaxAra();
		});
	}
	//$('.yenitarih').datetimepicker({lang:'tr',showClose: true,autoclose: true,timepicker:false,format:'Y-m-d'});
	$('.jstarih').datetimepicker({lang:'tr',timepicker:false,format:'Y-m-d'});
	//$('.jstarihsaat').datetimepicker({lang:'tr',timepicker:true,format:'Y-m-d H:i'});
	//$('.jssaat').datetimepicker({lang:'tr',datepicker:false,timepicker:true,format:'H:i'});
	
	if($('.araGrupChck').length>0){	
		$('.araGrupChck').each(function(i,e){
			var aid='.araGrupChck:eq('+i+')';
			var btnid=aid+' .araGrupBtn';
			var xbtnid=aid+' .xGrupBtn';
			var ggid=aid+' .araGizliGrup';
			var tmid=aid+' .ggtumu';
			var inm=aid+' .ara';
			var ggw=$(aid).outerWidth(),ggh=$(aid).outerHeight();
			
			// dolu ara renklendirmesi (aşağıda da var)
			$(inm).each(function(index, element) {
				if($(this).prop('checked')){
					$(btnid).css('background-color','#0f0');
					return false;
				}
			});

			
			$(tmid).change(function(e) {
				$(inm).prop('checked',$(this).prop('checked'));
				ajaxAra();
			});

			function ggYerlestir(){
				var ggw=$(ggid).outerWidth();
				var aidw=$(aid).outerWidth();
				var ggp=$(ggid).position();
				var btnp=$(aid).position();
				var sidebar=0;
				var navbar=0;
				var mq = window.matchMedia( "(max-width: 600)" );
				if (mq.matches) {
					
				} else {
					sidebar=$(".sidebar").width();
					navbar=$(".navbar-collapse").height();
				}
				
				
				ggp.top=btnp.top+110+navbar;
				ggp.left=btnp.left-((ggw/2)-(aidw/2))+sidebar;
				if(ggp.left<0) ggp.left=0;
				$(ggid).css({'top':ggp.top,'left':ggp.left});
			}
			
			$(btnid+','+xbtnid).click(function(e) {
				if(ggA[i]){
					ggA[i]=0;
					$(ggid).fadeOut('fast');
					$(this).css('background-position','0px 0px');
				}
				else{
					ggYerlestir();
					ggA[i]=1;
					$(ggid).fadeIn('fast');
					$(this).css('background-position','-40px 0px');
					$(ggid).find('.labelSearch').focus();
				}
			});
			$(document).click(function(e) {
				if(ggA[i]){
					var scrly=document.body.scrollTop;
					var ggp=$(ggid).position();
					var ggw=$(ggid).outerWidth(),ggh=$(ggid).outerHeight();
					var mx=event.clientX,my=event.clientY;
					if(mx<ggp.left||mx>ggp.left+ggw||my<ggp.top-scrly-150||my>ggp.top+ggh){
						ggA[i]=0;
						$(ggid).fadeOut('fast');
						$(btnid).css('background-position','0px 0px');
					}
				}
			});
		});
	}
	if($("input[type='submit']").length){
		$("input[type='submit']").mouseup(function(e) {
			setTimeout(function(){ 
				$("input[type='submit']").fadeOut('fast');
				
				setTimeout(function(){ 
					$("input[type='submit']").fadeIn('slow');
				},5000);	
			},10);	
		});
		$("input").on('change',function(e) {
			$("input[type='submit']").fadeIn('slow');
		});
	}
	// dolu ara renklendirmesi (yukarıda da var)
	if($('.ara').length){
		$('.ara').each(function(index, element) {
			if(index&&$(this).val())$(this).css({'background-color':'#0a0','color':'#fff','font-size':'13px'});
		});
		setTimeout(function(){
			$('.ara').each(function(index, element) {
				if(index&&$(this).val())$(this).css({'background-color':'#eee','color':'#000','font-size':'13px'});
			});
		},1000);
		setTimeout(function(){
			$('.ara').each(function(index, element) {
				if(index&&$(this).val())$(this).css({'background-color':'#0a0','color':'#fff','font-size':'13px'});
			});
		},1500);
		setTimeout(function(){
			$('.ara').each(function(index, element) {
				if(index&&$(this).val())$(this).css({'background-color':'#eee','color':'#000','font-size':'13px'});
			});
		},2000);
		setTimeout(function(){
			$('.ara').each(function(index, element) {
				if(index&&$(this).val())$(this).css({'background-color':'#0a0','color':'#fff','font-size':'13px'});
			});
		},2500);

	}

	// LABELDE ARA
	if($('.labelSearch').length>0){	
		$('.labelSearch').on("keyup",function(){
			var arnn=$(this).val();
			$(this).parent("div").parent('div').children('div:last-child').children('label').each(function(index, element) {
				var icerik=$(this).text();
				icerik=icerik.replace(/İ/g,'i').replace(/Ü/g,'ü').replace(/[.]/g,'').toLowerCase();
				arnn=arnn.replace(/İ/g,'i').replace(/Ü/g,'ü').replace(/[.]/g,'').toLowerCase();
				arnn2=arnn.replace(/ı/g,'i');
				if( icerik.indexOf(arnn)!=-1 || icerik.indexOf(arnn2)!=-1 ){
					$(this).slideDown("fast");
				}else{
					$(this).slideUp("fast");
				}
			});
		});
	}


	// LABELDE ARA
	if($('.tab-buttons').length>0){	
		$('.tab-buttons .tab-button').on("change",function(){
			$('.tab-group .tab').slideUp('fast',function(){
			});
			$($(this).attr('tab-id')).slideDown('fast',function(){
				$(this).find('select:first').focus();
			});
		});
	}


	// Kopyalanabilir Obje
	if($('.kopyalanabilir').length>0){		
		$('.kopyalanabilir').parent().children('.kopyalanabilir:first').after('<tr><td colspan="3"><button type="button" style="padding:1em; line-height:0" class="btn kopyalanabilir-btn">Satır Ekle</button></td></tr>');
		$('.kopyalanabilir-btn').click(function(e){ 
			var baz=$(this).parent().parent().parent().children('.kopyalanabilir:first');
			var clon = baz.clone();
			clon.children('.kopyalanabilir-sil').html('<button type="button" class="btn kopyalanabilir-btn-sil">Sil</button>');
			clon.insertAfter(baz);
			clon.children('.kopyalanabilir-sil').click(function(e){
				if($(this).parent().parent().children('.kopyalanabilir').length>1)$(this).parent().remove();
			});
		});
	}

	// Yatakları hazır klonlama '.klon-tasiyicisi'
	if($('.klon-tasiyicisi').length>0){		
		$('.kopyalanabilir').parent().children('.kopyalanabilir:first').after('<tr><td colspan="3"><button type="button" style="padding:1em; line-height:0" class="btn kopyalanabilir-btn">Satır Ekle</button></td></tr>');
		$('.kopyalanabilir-btn').click(function(e){ 
			var baz=$(this).parent().parent().parent().children('.kopyalanabilir:first');
			var clon = baz.clone();
			clon.children('.kopyalanabilir-sil').html('<button type="button" class="btn kopyalanabilir-btn-sil">Sil</button>');
			clon.insertAfter(baz);
			clon.children('.kopyalanabilir-sil').click(function(e){
				if($(this).parent().parent().children('.kopyalanabilir').length>1)$(this).parent().remove();
			});
		});
	}

	$('.paylasimli-inp,.paylasimli-slc').on('change keyup',function(){
		$($(this).attr('data-paylasim-id')).val($(this).val());
	});

	$(document).keyup(function(e) {
	    if (e.keyCode == 27) { // escape key maps to keycode `27`
	    	pencereKapat();
	    }
	});

	//JS SELECT
	$("select.searchable").searchable({
        maxListSize: 100,                       // if list size are less than maxListSize, show them all
        maxMultiMatch: 50,                      // how many matching entries should be displayed
        exactMatch: false,                      // Exact matching on search
        wildcards: true,                        // Support for wildcard characters (*, ?)
        ignoreCase: true,                       // Ignore case sensitivity
        latency: 200,
        warnMultiMatch: 'toplam {0} sonuç ...',  // string to append to a list of entries cut short by maxMultiMatch
        warnNoMatch: ' ',          // string to show in the list when no entries match
        zIndex: 'auto'                          // zIndex for elements generated by this plugin
    });
	$('.select2').select2({
	    width: '100%' // need to override the changed default
	});


	//enterTabindex();

});

aktifListeEventListener="";