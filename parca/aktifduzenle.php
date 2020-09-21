<?php if($admn||!empty($i_aktifduzenleYetkiA)||ytk($tbl,'duzenle')){ ?>
<script type="text/javascript">
	function aktifListeEventListener(){	
		$(".aktifduzenle").dblclick(function(){
			var adid=$(this).attr('data-aktifduzenle-id');
			if(adid){
				var add=prompt("Lütfen yeni değeri giriniz.",$('[data-aktifduzenle-id="'+adid+'"]').text());
				//if(add!=""||confirm("Değeri boş olarak kaydetmek üzeresiniz.")){

				//}
				if(add!==null){
					$.get('i.php?i=aktifduzenle&id='+adid+'&d='+add,function(d){
						if(d){ 
							var D=JSON.parse(d);
							if(D.sonuc==1){ 
								uyr("Alan güncellendi.","","","1");
								$('[data-aktifduzenle-id="'+adid+'"]').text(D.yeniDeger);

								if(D.data&&D.data._YeniDeger&&D.data._YeniDeger.length>0){
									for (var i = 0; i < D.data._YeniDeger.length; i++) {
										var xadid='[data-aktifduzenle-id="'+D.data._YeniDeger[i][1]+'"]';
										switch(D.data._YeniDeger[i][0]){
											case 'text': // html
												$(xadid).text(D.data._YeniDeger[i][2]);
												break;
											case 'value':
												$(xadid).val(D.data._YeniDeger[i][2]);
												break;
											case 'checked':
												$(xadid).prop('checked',D.data._YeniDeger[i][2]);
												break;
											case 'selected':
												$(xadid).prop('selected',D.data._YeniDeger[i][2]);
												break;
											default: // html
												$(xadid).html(D.data._YeniDeger[i][2]);
												break;
										}
									}
								}
							}
							else if(D.sonuc==101){
								uyr("Yetkiniz yetersiz.","","","1");
							}
							else alert(d);
						}
					});	
				}
			}
			
		});
	}
$(document).ready(function() { 
	aktifListeEventListener();
});
</script>
<style type="text/css">
	.aktifduzenle{ cursor: pointer; }
</style>
<?php } ?>