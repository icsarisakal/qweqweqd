<style>

.btn{
	
    height: 30px;
    text-align: center;
    /* padding-bottom: inherit; */
    border-radius: 5px;
    font-weight: bold;
    font-size: 14px;
	margin:0px 4px;
}
.numuneClass > div{
	border: 1px solid black;
	display:block;
	padding: 20px;
	margin-bottom: 20px;
	margin-left:auto;
	margin-right:auto;
}
.gizliClass{
	display:none;
}
.stickerNumune{
	border: 1px solid black;
	padding-top:15px;

}
.stickerNumune > div > div > label{
	display:block;
	max-width:2300px;
 }

</style>



<?php

if(z(7,$tbl)){
	$aksesuarKontrol=false;
	$numuneTablosu=array();
	$kumasKontrol=false;
	$numuneKumas=null;
	$numuneAksesuar=null;
	$numuneArray=array();
	$numuneKayitArray=array();
	$geciciNumune=array();
	$kumasKontrol=false;
	$_X=z(7,$tbl);

	z(6,$tbl);
	//if(!empty($_X['ad'])){
		//if(!empty($_X['musteri_ID'])){
			//if(!z(1,"WHERE arsiv='0' AND ad='".$_X['ad']."'")){
				
				$_X['personel_ID']=z('lgn','ID');
				$_X['tarih']=z('datetime');

				//$_X['kumaskarti_ID']=json_decode($_X['kumaskarti_ID']);
			//__($_X);
			//!empty($_X['numuneCesitTip'])?array_push($numuneArray,['numuneCesitTip'=>$_X['numuneCesitTip']]):'';
			//!empty($_X['nesne_IDnumuneDurumTip'])?array_push($numuneArray,['nesne_IDnumuneDurumTip'=>$_X['nesne_IDnumuneDurumTip']]):'';	
			//__(count($_X['numuneCesitTip']));
			if(!empty($_X['numuneCesitInput'])){
				
				
						// !empty($_X['cari_ID'])?$numuneTablosu+=['cari_ID'=>($_X['cari_ID'])]:'';
						// !empty($_X['personel_ID'])?$numuneTablosu+=['personel_ID'=>($_X['personel_ID'])]:'';
						// !empty($_X['personel_IDkayit'])?$numuneTablosu+=['personel_IDkayit'=>($_X['personel_IDkayit'])]:'';
						// !empty($_X['tarihKayit'])?$numuneTablosu+=['tarihKayit'=>($_X['tarihKayit'])]:'';
						// !empty($_X['tarih'])?$numuneTablosu+=['tarih'=>($_X['tarih'])]:'';
						// $numuneTablosu+=['numune_ID'=>0,'numuneTur'=>0];
			

			if(count($_X['numuneCesitInput'])!=1){
				foreach ($_X['numuneCesitInput'] as $key => $value) {
				
				
					
						//kumas array doldurma
						!empty($_X['numuneCesitInput'])?$numuneArray+=['numuneCesitInput'=>json_encode($_X['numuneCesitInput'])]:'';
						!empty($_X['nesne_IDnumuneDurumTip'])?$numuneArray+=['nesne_IDnumuneDurumTip'=>json_encode($_X['nesne_IDnumuneDurumTip'])]:'';
						!empty($_X['cari_ID'])?$numuneArray+=['cari_ID'=>($_X['cari_ID'])]:'';
						!empty($_X['personel_ID'])?$numuneArray+=['personel_ID'=>($_X['personel_ID'])]:'';
						!empty($_X['personel_IDkayit'])?$numuneArray+=['personel_IDkayit'=>($_X['personel_IDkayit'])]:'';
						!empty($_X['tarihKayit'])?$numuneArray+=['tarihKayit'=>($_X['tarihKayit'])]:'';
						!empty($_X['tarih'])?$numuneArray+=['tarih'=>($_X['tarih'])]:'';
						
						!empty($_X['kumaskarti_ID'])?$numuneArray+=['kumaskarti_ID'=>json_encode($_X['kumaskarti_ID'])]:'';
						!empty($_X['composition'])?$numuneArray+=['composition'=>json_encode($_X['composition'])]:'';
						!empty($_X['renkkarti_ID'])?$numuneArray+=['renkkarti_ID'=>json_encode($_X['renkkarti_ID'])]:'';
						!empty($_X['ebat'])?$numuneArray+=['ebat'=>json_encode($_X['ebat'])]:'';
						!empty($_X['aciklama'])?$numuneArray+=['aciklama'=>json_encode($_X['aciklama'])]:'';
						!empty($_X['sampleName'])?$numuneArray+=['sampleName'=>json_encode($_X['sampleName'])]:'';
						!empty($_X['sampleType'])?$numuneArray+=['sampleType'=>json_encode($_X['sampleType'])]:'';
						!empty($_X['fabric'])?$numuneArray+=['fabric'=>json_encode($_X['fabric'])]:'';
						!empty($_X['color'])?$numuneArray+=['color'=>json_encode($_X['color'])]:'';
						!empty($_X['weight'])?$numuneArray+=['weight'=>json_encode($_X['weight'])]:'';
						!empty($_X['size'])?$numuneArray+=['size'=>json_encode($_X['size'])]:'';
						!empty($_X['comment'])?$numuneArray+=['comment'=>json_encode($_X['comment'])]:'';
						
						
					// 	foreach ($numuneArray as $key => $value) {
									
					// 		$value=($value);
					// 		$numuneArray[$key]=$value;


					// }
							$numuneKumas=$numuneArray;
							postKontrolTh($numuneKumas);
							
					
						// array_push($numuneKayitArray,$numuneArray);
						 	$numuneArray=array();
						
						//	__($numuneKayitArray);
						
					
					
						
				}

				
				// if(z(2,$numuneArray,'numunekumas')){

				// 	$kumasKontrol=true;
				// }

				
			}else {


				!empty($_X['numuneCesitInput'])?$numuneArray+=['numuneCesitInput'=>json_encode($_X['numuneCesitInput'])]:'';
				!empty($_X['nesne_IDnumuneDurumTip'])?$numuneArray+=['nesne_IDnumuneDurumTip'=>json_encode($_X['nesne_IDnumuneDurumTip'])]:'';
				!empty($_X['cari_ID'])?$numuneArray+=['cari_ID'=>($_X['cari_ID'])]:'';
				!empty($_X['personel_ID'])?$numuneArray+=['personel_ID'=>($_X['personel_ID'])]:'';
				!empty($_X['personel_IDkayit'])?$numuneArray+=['personel_IDkayit'=>($_X['personel_IDkayit'])]:'';
				!empty($_X['tarihKayit'])?$numuneArray+=['tarihKayit'=>($_X['tarihKayit'])]:'';
				!empty($_X['tarih'])?$numuneArray+=['tarih'=>($_X['tarih'])]:'';
				
				!empty($_X['kumaskarti_ID'])?$numuneArray+=['kumaskarti_ID'=>json_encode($_X['kumaskarti_ID'])]:'';
				!empty($_X['composition'])?$numuneArray+=['composition'=>json_encode($_X['composition'])]:'';
				!empty($_X['renkkarti_ID'])?$numuneArray+=['renkkarti_ID'=>json_encode($_X['renkkarti_ID'])]:'';
				!empty($_X['ebat'])?$numuneArray+=['ebat'=>json_encode($_X['ebat'])]:'';
				!empty($_X['aciklama'])?$numuneArray+=['aciklama'=>json_encode($_X['aciklama'])]:'';
				!empty($_X['sampleName'])?$numuneArray+=['sampleName'=>json_encode($_X['sampleName'])]:'';
				!empty($_X['sampleType'])?$numuneArray+=['sampleType'=>json_encode($_X['sampleType'])]:'';
				!empty($_X['fabric'])?$numuneArray+=['fabric'=>json_encode($_X['fabric'])]:'';
				!empty($_X['color'])?$numuneArray+=['color'=>json_encode($_X['color'])]:'';
				!empty($_X['weight'])?$numuneArray+=['weight'=>json_encode($_X['weight'])]:'';
				!empty($_X['size'])?$numuneArray+=['size'=>json_encode($_X['size'])]:'';
				!empty($_X['comment'])?$numuneArray+=['comment'=>json_encode($_X['comment'])]:'';
				
						
						$numuneKumas=$numuneArray;
						
						postKontrolTh($numuneKumas);
						
						

					
						$numuneArray=array();
				

				
				
				// foreach ($numuneArray as $key => $value) {
						    
				// 	$value=json_encode($value);
				// 	$numuneArray[$key]=$value;


				// }
				

			}
		}
			//kayıt sistemi
				//__($numuneAksesuar);
				// if(!empty($numuneAksesuar)){
				// 	$sIDa=z(2,$numuneAksesuar,'numuneaksesuar');
				// 	if($sIDa){
				// 		$numuneTablosu['numune_ID']=$sIDa;
				// 		$numuneTablosu['numuneTur']=1;
				// 		z(2,$numuneTablosu,$tbl);
				// 		$aksesuarKontrol=true;
				// 	}

				// } 
				// if(!empty($numuneKumas)){
				// 	__($numuneKumas);
				// 	$sIDk=z(2,$numuneKumas,$tbl);
				// 	if($sIDk){
				// 		$kumasKontrol=true;
				// 	}

				// }


			// //__($numuneKayitArray);
			// foreach ($numuneKayitArray as $key => $value) {
			// 	//print_r($key);
			// 	//__($value);
			// 	foreach ($value as $k => $v) {
			// 		//print_r($v);
			// 		if(!empty($v['numuneCesitInput'][$key])){
			// 			print_r($v['numuneCesitInput'][$key]);
			// 			foreach ($value as $ky => $val) {
			// 					print_r($val);
			// 					print_r('<br>');

			// 					if(count($val)>1){
			// 						$geciciNumune+=$val;
			// 					}
								
			// 			}	

			// 			__($geciciNumune);
						


			// 		}
					
					
			// 	}

			// }
		//	__('stop');
				//__($numuneArray);
				// $_X['ad']=!empty($_X['ad'])?$_X['ad']:'';

				// $urund=z(10,$tbl);
				// $dosya= $urund['img'];
				// if(in_array($dosya['type'], array('image/jpeg','image/pjpeg','image/png','age/x-png','image/gif'))){
				// 	$dosyaAd=z('yukle',__DIR__.'/../../upload/kumaskarti',$dosya); 
				// }
				// if (!empty($dosyaAd)) {
				// 	$_X['img']=$dosyaAd;
				// }

			//	postKontrolTh($_X);




				//__($_X);
				//$SID=z(2,$_X,$tbl);
				//__($numuneKumas);
				$SID=null;
				if(!empty($numuneKumas['cari_ID'])){$SID=z(2,$numuneKumas,$tbl);}else { ?><script>alert('Lütfen en az bir numune ekleyiniz.');</script><?php }
		if($SID){
			
			$SID=0;
		if(!z(8,'ajaxform')){ // Ymnlendirmeyi iptal et
			z(33,'ekle',1);
			z('git','geri');
		}
		else{ // Json çıktısını doldur
			$json['sonuc']=1;
			$json['cevap']=array(
				'ID'=>$SID,
				'ad'=>$_X['ad'],
			);
		}

		$json['mesaj']="Ekleme işlemi başarılı.";
		//$json['numune']="Kumas Ekleme : ".$kumasKontrol." Aksesuar Ekleme : ".$aksesuarKontrol." ";

	}
	else {
		
		if(!z(8,'ajaxform')){ // Ymnlendirmeyi iptal et
			z(33,'ekle',-1);
		}
		else{ // Json çıktısını doldur
			$json['sonuc']=0;
			$json['cevap']="";
			$json['mesaj']="Ekleme işlemi başarısız.";
		}
	}
}

//En kritik json sonucunu ekrana basan kod
if(z(8,'ajaxform')){
	echo json_encode($json);
	//_z(33,'ekle');
	die;
}

?>
<div class="sayfa">
	<div class="baslik"><h3><?php echo $metin['menu_yeni_ekle']; ?></h3></div>
    <div class="icerik">
    	<?php switch(z(33,'ekle')){
			case -1:_uyr(0,'Kayıt başarısız.');break;
			case 1:_uyr(1,'Kayıt başarılı.');break;
			case 3:_uyr(2,'<strong>'.$_X['ad'].'</strong> daha önceden kaydedilmiş. Lütfen başka bir isim kullanınız.');break;
			case 11:_uyr(2,'Lütfen adı giriniz.');break;
			case 12:_uyr(2,'Lütfen bir müşteri seçiniz.');break;
			case 13:_uyr(2,'Lütfen bir numune ekleyiniz.');break;
		}?>

		<!-- Page header -->
		<div class="page-header page-header-light mb-3">

			<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
				<div class="d-flex">
					<div class="breadcrumb">
						<a href="./?s=<?php echo $sayfayiyakala1s; ?>&a=listele" class="breadcrumb-item"><i class="icon-home2 mr-2"></i><?php echo $anamoduladi; ?></a>
						<span class="breadcrumb-item active"><?php echo $yanmoduladi; ?></span>
					</div>

					<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
				</div>

				<div class="header-elements d-none">
					<div class="breadcrumb justify-content-center">
						<a href="#" class="breadcrumb-elements-item">
							<i class="icon-comment-discussion mr-2"></i>
							Support
						</a>

						<div class="breadcrumb-elements-item dropdown p-0">
							<a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
								<i class="icon-gear mr-2"></i>
								Settings
							</a>

							<div class="dropdown-menu dropdown-menu-right">
								<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
								<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
								<a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
								<div class="dropdown-divider"></div>
								<a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
							</div>
							
						</div>
					</div>
				</div>
				
			</div>

		</div>
		<!-- /page header -->

        <div class="content pt-0">
	<!-- Dashboard content -->
	<?php //require(__DIR__.'/cesitli.php'); ?>
	<div class="row">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-body">
		        	<form action="" method="post">
						<?php  require(__DIR__.'/ekle_prc.php'); ?>
						<div class="form-group row">
						    <div class="col-lg-12 text-right">
					    		<input type="submit" class="btn btn-primary" value="Kaydet">
						    </div>
						</div>
		        	</form>
					
        		</div>
			</div>
		</div>
	</div>
	<!-- /dashboard content -->
</div>


    </div>
</div>
<?php require(__DIR__.'/contentForm.php'); ?>

<!-- AYARDAN İSTENEN AÇILIR EKLEME FORMLARI -->
<?php if(!empty($hizliEkleForm)) foreach ($hizliEkleForm as $hef) {
    if(file_exists(__DIR__.'/../'.$hef.'/hizli-ekle-form.php')){
        $formAdi=$hef;
        require(__DIR__.'/../'.$hef.'/hizli-ekle-form.php'); 
    }
}?>
<!-- AYARDAN İSTENEN AÇILIR EKLEME FORMLARI SON -->


<!-- AÇILIR NESNE EKLEME FORMU -->
<?php require(__DIR__.'/../../parca/nesne-hizli-ekle-form.php'); ?>
<!-- AÇILIR NESNE EKLEME FORMU SON -->

<script>
  $(document).ready(function(){

$('.numuneCesitTip').val(0);

});

</script>







<script>


let dataKumasKarti=<?php echo json_encode(z(37,$kumasKarti));  ?>;

let dataCari=<?php echo json_encode(z(37,$_cari_Musteri)); ?>;
//let dataAksesuar=<?php //echo json_encode(z(37,$_aksesuarKarti)); ?>;
let dataNesne=<?php echo json_encode(z(37,$_nesneData)); ?>;
let dataKumasTuru=<?php echo json_encode(z(37,$_kumasTuru)); ?>;
// let dataMakinaCesitleri=<?php //echo json_encode(z(37,$_makinaCesitleri));?>;
// let dataBoyaBaski=<?php // echo json_encode(z(37,$_boyaBaski));?>;


function isEmpty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}   
function ck(veri){
	
	if(veri == undefined){
		return '-';
	}

	
	// if(veri=='' || veri==null){
	// console.log('test '+veri);
	// return ' ';
	// } 
	// if(veri!='' || veri!=null ){
		
	// 	return veri;
	// }
	if(isEmpty(veri)){
		return '-';
	}
	else { return veri;}
	



}
  
	$('.arttir').on('click',function(){
	
        
		var deger = $('.numuneCesitTip').val();

    
        if(deger!=0){
           
                //alert('kumas');
                var el=$('.cocukClassKumas').first().clone();
                $(el).find('.sampleName').text($('.numuneCesitTip').find('option[value="'+deger+'"]').text());
				$(el).find('.sampleNameInput').val($('.numuneCesitTip').find('option[value="'+deger+'"]').text());
				
				$(el).find('.numuneCesitInput').val(deger);
				$('.numuneClass').append(el);
			

           
        }else {alert('lütfen bir seçim yapınız..')}
        
		$('.kumasClass').append(el);
        select2kontrol();
	});
	$('.musteri').on('change',function(){
		if($(this).val()!=0){
			$('.stickerNumune').find('.cari_nameInput').val($(this).find('option[value="'+$(this).val()+'"]').text());
			$('.stickerNumune').find('.cari_name').text($(this).find('option[value="'+$(this).val()+'"]').text());

		}else {
			$('.stickerNumune').find('.cari_nameInput').val('-');
			$('.stickerNumune').find('.cari_name').text('-');

		}
		

	});
    $('.numuneClass').on('click','.sil',function(){
		
        // var numuneSayisi=$($('.kumasClass').children()).length;
        // if(numuneSayisi>1){

          
        // }
        $(this).parentsUntil('.numuneClass').remove();

	});

    // $('.kumasClass').on('change','.numuneCesitTip',function(){
       
    //     if($(this).val()==277){
    //         //kumaşş
    //         var parentElement= $(this).parentsUntil('.kumasClass');
    //      $(parentElement).find('.kumasKartiSelect').css('display','flex');
    //      $(parentElement).find('.aksesuarSelect').find('select').val(0);
    //      $(parentElement).find('.aksesuarSelect').hide();
    //      $(parentElement).find('input[name="<?php// echo $tbl;?>[nesne_IDkumasTipi]"]').val('deneme');
      


    //     }else if($(this).val()==278){
    //         //aksesuar
    //         var parentElement= $(this).parentsUntil('.kumasClass');
    //         $(parentElement).find('.kumasKartiSelect').find('select').val(0);
    //         $(parentElement).find('.kumasKartiSelect').hide();
           
    //         $(parentElement).find('.aksesuarSelect').css('display','flex');

    //     }
    // });
    
    $('.numuneCesitTip').on('change',function(){
		


	});
    $('.numuneClass').on('change','.kumasKartiSelect > div > select',function(){

        

         var parentElement= $(this).parentsUntil('.numuneClass');
        var valueKumas =$(this).val();

        if(valueKumas!=''&&valueKumas!=null){
            try {  $(parentElement).find('.kumaskartiIDdty').attr('href',' /?s=kumaskarti&a=detay&id='+ck(valueKumas)); } catch (error) {  $(parentElement).find('.kumaskartiIDdty').attr('href','#'); }
            try {  $(parentElement).find('.fabric').text(ck(dataKumasKarti[valueKumas]['kodu'])); } catch (error) {  $(parentElement).find('.fabric').text(' '); }
			try {  $(parentElement).find('.fabricInput').val(ck(dataKumasKarti[valueKumas]['kodu']));   } catch (error) {  $(parentElement).find('.fabricInput').val(' ');   }
			try { $(parentElement).find('.weight').text(ck(dataKumasKarti[valueKumas]['grm']));} catch (error) { $(parentElement).find('.weight').text(' '); }
			try {  $(parentElement).find('.weightInput').val(ck(dataKumasKarti[valueKumas]['grm'])); } catch (error) {  $(parentElement).find('.weightInput').val(' '); }
			
			
				//$(parentElement).find('.composition').val(ck(dataKumasKarti[valueKumas]['grm']));
				$.ajax({
					url:'ajaxayar.php?s=numune&a=ajaxsorgu&durum=elyafcek&veri='+valueKumas,
					success:function(e){
						console.log('Cevap');
						
							try {  $(parentElement).find('.compositionInput').val(ck(e.cevap.elyafmetin)); } catch (error) {  $(parentElement).find('.compositionInput').val(' '); }
							try {  $(parentElement).find('.composition').text(ck(e.cevap.elyafmetin)); } catch (error) {  $(parentElement).find('.composition').text(' '); }
						
					
						
					}
				});

			
			
			
			// try { $(parentElement).find('.kumasturu').text(ck(dataKumasTuru[dataKumasKarti[valueKumas]['kumasturu_ID']]['ad'])); } catch (error) { $(parentElement).find('.kumasturu').text(' '); }
			// try { $(parentElement).find('.kumasturuInput').val(ck(dataKumasTuru[dataKumasKarti[valueKumas]['kumasturu_ID']]['ID']));   } catch (error) { 	$(parentElement).find('.kumasturuInput').val(' ');   }
			// try { $(parentElement).find('.makina').text(ck(dataMakinaCesitleri[dataKumasKarti[valueKumas]['makinacesitleri_ID']]['ad'])); } catch (error) {   $(parentElement).find('.makina').text(' '); }
			// try {   $(parentElement).find('.makinaInput').val(ck(dataMakinaCesitleri[dataKumasKarti[valueKumas]['makinacesitleri_ID']]['ID']));   } catch (error) {   $(parentElement).find('.makinaInput').val(' ');   }
			// try { $(parentElement).find('.kumaskartiIDinput').val(ck(valueKumas)); } catch (error) { $(parentElement).find('.kumaskartiIDinput').val(' '); }
		
            
		
				
				
			
			 
           
           
             
             
            //  $(parentElement).find('.boya').text(dataBoyaBaski[dataKumasKarti[valueKumas]['boyabaski_ID']]['tipi']);
            //  $(parentElement).find('.boyaInput').val(dataBoyaBaski[dataKumasKarti[valueKumas]['boyabaski_ID']]['tipi']);

            
             

                // $.ajax({
                    
                //     url: "ajaxayar.php?s=numune&a=ajaxsorgu&durum=iplikKart&veri="+dataKumasKarti[valueKumas]['iplikkartlari']+" ", 
                //     success: function(e){
                //         console.log('adsasd');
                //         console.log(e.cevap.elyafmetin);
                   
                   
                // }});
                
              
             
            

        }

    });


    $('.numuneClass').on('change','.aksesuarSelect > div > select',function(){
         var parentElement= $(this).parentsUntil('.numuneClass');
        var valueAksesuar =$(this).val();
       
        if(valueAksesuar!=null&&valueAksesuar!=''){
			   
           
            if(dataAksesuar[valueAksesuar]!=''&&dataAksesuar[valueAksesuar]!=null){
				//console.log(dataNesne[dataAksesuar[valueAksesuar]['nesne_IDaksesuargruplari']]);
				try { $(parentElement).find('.aksesuarIDdty').attr('href',' /?s=aksesuarkarti&a=detay&id='+ck(valueAksesuar)); } catch (error) { $(parentElement).find('.aksesuarIDdty').attr('href','#'); }
				try { $(parentElement).find('.aciklamaA').text(ck(dataAksesuar[valueAksesuar]['aciklama'])); } catch (error) { $(parentElement).find('.aciklamaA').text(' '); }
				try { $(parentElement).find('.aciklamaAInput').val(ck(dataAksesuar[valueAksesuar]['ID']));  } catch (error) { $(parentElement).find('.aciklamaAInput').val(' ');   }
				try { $(parentElement).find('.tedarikA').text(ck(dataCari[dataAksesuar[valueAksesuar]['cari_ID']]['ad'])); } catch (error) { $(parentElement).find('.tedarikA').text(' '); }
				try { $(parentElement).find('.tedarikAInput').val(ck(dataCari[dataAksesuar[valueAksesuar]['cari_ID']]['ID'])); } catch (error) { $(parentElement).find('.tedarikAInput').val(' '); }
				try { $(parentElement).find('.grupA').text(ck(dataNesne[dataAksesuar[valueAksesuar]['nesne_IDaksesuargruplari']]['metin1']));} catch (error) { $(parentElement).find('.grupA').text(' '); }
				try { $(parentElement).find('.grupAInput').val(ck(dataNesne[dataAksesuar[valueAksesuar]['nesne_IDaksesuargruplari']]['ID']));   } catch (error) { $(parentElement).find('.grupAInput').val(' ');   }
				
				
                
                
				
                




            }
        
        }
        
        
       
    });
    

    $('.numuneClass').on('change','.numuneTip',function(){
		var parentElement= $(this).parentsUntil('.numuneClass');

		try { $(parentElement).find('.sampleType').text(ck($(this).find('option[value="'+$(this).val()+'"]').text())); } catch (error) { $(parentElement).find('.sampleType').text(' '); }
		try { $(parentElement).find('.sampleTypeInput').val(ck($(this).find('option[value="'+$(this).val()+'"]').text())); } catch (error) { $(parentElement).find('.sampleTypeInput').val(' '); }
		


	});

    $('.numuneClass').on('change','.renkSelect',function(){
		var parentElement= $(this).parentsUntil('.numuneClass');

		if($(this).val()!=0){
			try { $(parentElement).find('.color').text(ck($(this).find('option[value="'+$(this).val()+'"]').text())); } catch (error) { $(parentElement).find('.color').text(' ');  }
			try { $(parentElement).find('.colorInput').val(ck($(this).find('option[value="'+$(this).val()+'"]').text())); } catch (error) { $(parentElement).find('.colorInput').val(' '); }
		
		}else{
			 $(parentElement).find('.color').text('-');  
			$(parentElement).find('.colorInput').val('-'); 
		
		}
		



	});

	$('.numuneClass').on('keyup','.ebat',function(){
		var parentElement= $(this).parentsUntil('.numuneClass');

		try { $(parentElement).find('.size').text(ck($(this).val())); } catch (error) { $(parentElement).find('.size').text(' '); }
		try { $(parentElement).find('.sizeInput').val(ck($(this).val())); } catch (error) { $(parentElement).find('.sizeInput').val(' '); }	
			


	});
	
	$('.numuneClass').on('keyup','.aciklama',function(){
		var parentElement= $(this).parentsUntil('.numuneClass');
		try { $(parentElement).find('.comment').text(ck($(this).val())); } catch (error) { $(parentElement).find('.comment').text(' '); }
		try { $(parentElement).find('.commentInput').val(ck($(this).val())); } catch (error) { $(parentElement).find('.commentInput').val(' '); }	
			


	});

	
	
    //nesneler icin
	





</script>