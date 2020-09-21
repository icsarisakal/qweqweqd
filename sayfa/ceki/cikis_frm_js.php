
<script type="text/javascript">
	var cikis_frm2 = {
		// Ajax işlemlerinde kullanılacak değerleri saklar
		fd:{},
		formId:'#stokcikis_frm2',

		// Başlangıç değerlerini kaydeder ve form penceresini açar
		formAc: function(o){
			var _=this;

			if(o){
				for(key in o){
					_.fd[key]=o[key];
				}
			}

			_.formDatayiInputlaraYansit();

			var rttmp=_.radioTableEtiketineYansitTemp;
			if(rttmp.length){
				for (var i = 0; i < rttmp.length; i++) {
					var tbod=document.getElementById(rttmp[i]);
					if(tbod){
						tbod.innerHTML="";
					}
				}
				console.log("radioTableEtiketineYansitTemp temizlendi.");
			}

			pencereAc(_.formId);

			console.log("Çıkış formu 2 açıldı.");
			console.log(_);

			setTimeout(function(){
				$(".tab-button[tab-checked]").click();
			},360);
		},

		// Çıkışın nereye yapılacağını kaydeder
		hedefSec: function(s){
			var _=this;

			_.fd.giris=s;

			_.formDatayiInputlaraYansit();

		},


		// Boyahane Fonksiyonları
		boyahaneGetir: function(CB){
			var _=this;

			console.log("boyahaneGetir("+JSON.stringify(_.fd)+")");
			//console.log(_.fd);
			
			i('oku','boyahaneGetir',_.fd,function(d){
				console.log("boyahaneGetir Veri geldi");
				console.log(d);

				var slctbx=document.getElementById("select_boyahane");
				var xval=slctbx.value;
				xval=xval?xval:Object.keys(d)[0];
				_.boyahaneSec(xval);
				_.selectEtiketineYansit('select_boyahane',d);
				slctbx.querySelector('option[value="'+xval+'"]').setAttribute('selected','selected');

				if(CB)CB();
            });
		},
		// Çıkışın yapılabileceği girdilerin boyahane bazlı filtresi
		boyahaneSec: function(s){
			var _=this;

			_.fd.nesne_IDboyahane=s;
			console.log(s+" idli boyahane seçildi");
		},
		boyatakipGetir: function(){
			var _=this;
			_.boyatakipmamulGetir();
			/*
			console.log("boyatakipGetir("+JSON.stringify(_.fd)+")");
			
			i('oku','boyatakipGetir',_.fd,function(d){
				console.log("boyatakip Veri geldi");
				console.log(d);
				_.radioTableEtiketineYansit('radio_boyatakip',d);

            });
            */

		},
		boyatakipmamulGetir: function(){
			var _=this;

			console.log("boyatakipmamulGetir("+JSON.stringify(_.fd)+")");
			
			i('oku','boyatakipmamulGetir',_.fd,function(d){
				console.log("boyatakip Veri geldi");
				console.log(d);
				_.radioTableEtiketineYansit('radio_boyatakip',d);

            });
		},


		// Ham Bez Stok Fonksiyonları
		hamkumasstokGetir: function(CB){
			var _=this;

			console.log("hamkumasstokGetir("+JSON.stringify(_.fd)+")");
			//console.log(_.fd);
			
			i('oku','hamkumasstokGetir',_.fd,function(d){
				console.log("hamkumasstokGetir Veri geldi");
				console.log(d);
				_.hamkumasstokSec(Object.keys(d)[0]);
				_.selectEtiketineYansit('select_hamkumasstok',d);

				if(CB)CB();
            });
		},
		// Çıkışın yapılabileceği girdilerin hamkumasstok(kumaş kalitesi) bazlı filtresi
		hamkumasstokSec: function(s){
			var _=this;

			_.fd.hamkumasstok_ID=s;
			console.log(s+" idli kumaş kalitesi seçildi");
		},
		hambezstokGetir: function(){
			var _=this;

			console.log("hambezstokGetir("+JSON.stringify(_.fd)+")");
			
			i('oku','hambezstokGetir',_.fd,function(d){
				console.log("hambezstok Veri geldi");
				console.log(d);
				_.radioTableEtiketineYansit('radio_hambezstok',d);
            });
		},


		// Çözgü Salonu Fonksiyonları
		cozguSalonuGetir: function(CB){
			var _=this;

			console.log("cozguSalonuGetir("+JSON.stringify(_.fd)+")");
			//console.log(_.fd);
			
			i('oku','cozguSalonuGetir',_.fd,function(d){
				console.log("cozguSalonuGetir Veri geldi");
				console.log(d);
				_.cozguSalonuSec(Object.keys(d)[0]);
				_.selectEtiketineYansit('select_cozgu',d);

				if(CB)CB();
            });
		},
		// Çıkışın nereye yapılacağını kaydeder
		cozguSalonuSec: function(s){
			var _=this;

			_.fd.nesne_IDcozgu=s;
			console.log(s+" idli çözgü salonu seçildi");
		},
		cozgustokGetir: function(){
			var _=this;

			console.log("cozgustokGetir("+JSON.stringify(_.fd)+")");
			
			i('oku','cozgustokGetir',_.fd,function(d){
				console.log("cozgustok Veri geldi");
				console.log(d);
				_.radioTableEtiketineYansit('radio_cozgustok',d);

            });
		},


		// Dokuma Salonu Fonksiyonları
		dokumaSalonuGetir: function(CB){
			var _=this;

			console.log("dokumaSalonuGetir("+JSON.stringify(_.fd)+")");
			
			i('oku','dokumaSalonuGetir',_.fd,function(d){
				console.log("dokumaSalonu Veri geldi");
				console.log(d);

				var slctbx=document.getElementById("select_dokumaSalonu");
				var xval=slctbx.value;
				xval=xval?xval:Object.keys(d)[0];
				_.dokumaSalonuSec(xval);
				_.selectEtiketineYansit('select_dokumaSalonu',d);
				slctbx.querySelector('option[value="'+xval+'"]').setAttribute('selected','selected');

				if(CB)CB();
            });
		},
		dokumaSalonuSec: function(s){
			var _=this;

			_.fd.nesne_IDdokumaSalonu=s;
			console.log(s+" idli dokuma salonu seçildi");
		},
		dokumastokGetir: function(){
			var _=this;

			console.log("dokumastokGetir("+JSON.stringify(_.fd)+")");
			
			i('oku','dokumastokGetir',_.fd,function(d){
				console.log("dokumastok Veri geldi");
				console.log(d);
				_.radioTableEtiketineYansit('radio_dokumastok',d);
            });
		},


		// İplik Stok Fonksiyonları
		iplikstokGetir: function(){
			var _=this;

			console.log("iplikstokGetir("+JSON.stringify(_.fd)+")");
			
			i('oku','iplikstokGetir',_.fd,function(d){
				console.log("iplikstok Veri geldi");
				console.log(d);
				_.radioTableEtiketineYansit('radio_iplikstok',d);

            });
		},


		// İplik Sipariş Fonksiyonları
		ipliksiparisGetir: function(){
			var _=this;

			console.log("ipliksiparisGetir("+JSON.stringify(_.fd)+")");
			
			i('oku','ipliksiparisGetir',_.fd,function(d){
				console.log("ipliksiparis Veri geldi");
				console.log(d);
				_.radioTableEtiketineYansit('radio_ipliksiparis',d);
            });
		},


		// İlmar Fonksiyonları
		ilmarGetir: function(){
			var _=this;

			console.log("ilmarGetir("+JSON.stringify(_.fd)+")");
			
			i('oku','ilmarGetir',_.fd,function(d){
				console.log("ilmar Veri geldi");
				console.log(d);
				_.radioTableEtiketineYansit('radio_ilmar',d);
            });
		},


		// İplik Satış Fonksiyonları
		firmaSec: function(s){
			var _=this;

			_.fd.firma_ID=s;
			console.log(s+" idli firma seçildi");
			
			_.formDatayiInputlaraYansit();

		},
		stoksatisGetir: function(){
			var _=this;

			console.log("stoksatisGetir("+JSON.stringify(_.fd)+")");
			
			i('oku','stoksatisGetir',_.fd,function(d){
				console.log("stoksatis Veri geldi");
				console.log(d);
				_.radioTableEtiketineYansit('radio_stoksatis',d);
            });
		},




		// Yardımcı Fonksiyonlar

		formDatayiInputlaraYansit: function(){
			var _=this;
			
			if(_.fd.lot){
			    $('input[name="cekicikisfrm[lot]"]').val(_.fd.lot);
			}
			console.log("formDatayiInputlaraYansit fonksiyonu çalıştı");
		},

		selectEtiketineYansitTemp: [],
		selectEtiketineYansit: function(id,d){
			var _=this;

			var slct=document.getElementById(id);
			slct.innerHTML="";
			for(key in d){
				var q=document.createElement("option");
				q.value=key;
				q.innerText=d[key].metin1;
				//q.setAttribute("id","myInput");
				slct.appendChild(q);
			}
			_.selectEtiketineYansitTemp.push(id);
			console.log("Veri "+ id+" idli select etiketine yansıtıldı.");
		},

		radioTableEtiketineYansitTemp: [],
		radioTableEtiketineYansit: function(id,d){
			var _=this;
			
			var tbod=document.getElementById(id);
			if(!tbod){ console.log("Gelen veri yansıtılmak istend fakat "+id+" idye sahip radio table bulunamadı."); return null;}
			console.log(tbod);
			tbod.innerHTML="";
			if(d&&Object.keys(d).length){
				for(key in d){
					if(id!='detayBaslik'){
						var tip=id.split('_');
						console.log('tip');
						console.log(tip);

						switch(tip[1]){
                    		<?php $tab_boyatakipJsA=1; require(__DIR__.'/../boyatakip/ceki_prc/tab_boyatakip.php'); $tab_boyatakipJsA=0; ?>
							case 'hambezstok':
								//if(d[key].kumasKalitesi){
									tbod.innerHTML+='\
					                    <tr class="radio-tr">\
					                        <td><input type="radio" tabindex="1" name="'+tip[1]+'_cekicikisfrm['+tip[1]+'_ID]" value="'+ key +'"></td>\
					                        <td>'+d[key].ID+'</td>\
					                    </tr>\
					                ';
								//}
								break;
							case 'cozgustok':
								if(d[key].detay){
									tbod.innerHTML+='\
					                    <tr class="radio-tr">\
					                        <td><input type="radio" tabindex="1" name="'+tip[1]+'_cekicikisfrm['+tip[1]+'_ID]" value="'+ key +'"></td>\
					                        <td>'+d[key].detay+'</td>\
					                    </tr>\
					                ';
								}
								break;
							case 'dokumastok':
								//if(d[key].kumasKalitesi){
									tbod.innerHTML+='\
					                    <tr class="radio-tr">\
					                        <td><input type="radio" tabindex="1" name="'+tip[1]+'_cekicikisfrm['+tip[1]+'_ID]" value="'+ key +'"></td>\
					                        <td>'+d[key].kumasKalitesi+'</td>\
					                        <td>'+d[key].siparisMetraj+'</td>\
					                        <td>'+d[key].lot+'</td>\
					                    </tr>\
					                ';
								//}
								break;
							case 'ipliksiparis':
								//if(d[key].kumasKalitesi){
									tbod.innerHTML+='\
					                    <tr class="radio-tr">\
					                        <td><input type="radio" tabindex="1" name="'+tip[1]+'_cekicikisfrm['+tip[1]+'_ID]" value="'+ key +'"></td>\
					                        <td>'+d[key].iplikGrubu+'</td>\
					                        <td>'+d[key].siparisIpMiktar+'</td>\
					                        <td>'+d[key].kalanIpMiktar+'</td>\
					                        <td>'+d[key].tarihSiparis+'</td>\
					                    </tr>\
					                ';
								//}
								break;
							default:
								tbod.innerHTML+='\
				                    <tr class="radio-tr">\
				                        <td><input type="radio" tabindex="1" name="'+tip[1]+'_cekicikisfrm['+tip[1]+'_ID]" value="'+ key +'"></td>\
				                        <td>'+d[key].lot+'</td>\
				                        <td>'+d[key].kg+'</td>\
				                        <td>'+d[key].cuval+'</td>\
				                    </tr>\
				                ';
								break;
						}
						
					}
					else{
						$("#"+id+"_detayBaslik").text(d[key]);
					}
				}
			}
			else{
				tbod.innerHTML+='\
                    <tr class="radio-tr">\
                        <td colspan="12">Eşleşen girdi bulunamadı.</td>\
                    </tr>\
                ';
			}

            //RADİO TR SEÇİMİ
            $('.radio-tr').click(function(){
                $(this).find('input[type="radio"]').prop('checked',true);
            });
			
			_.radioTableEtiketineYansitTemp.push(id);

			console.log("Veri "+ id+" idli radio table etiketine yansıtıldı.");
		}


	};
	

	//cikis_frm2.formAc({"iplikno_ID":3,"giris":"dokumastok"});
	//cikis_frm2.formAc({"iplikno_ID":3});
	
	//cikis_frm2.hedefSec("cozgustok");
	//cikis_frm2.cozguSalonuGetir();
	//cikis_frm2.cozguSalonuSec(148);
	//cikis_frm2.cozgustokGetir();

	//cikis_frm2.hedefSec("dokumastok");
	//cikis_frm2.dokumaSalonuGetir();
	//cikis_frm2.dokumaSalonuSec(114);
	//cikis_frm2.dokumastokGetir();
	
	//cikis_frm2.formAc({"iplikno_ID":3,"lot":"10"});
	
	//cikis_frm2.iplikstokGetir();
	//cikis_frm2.ilmarGetir();
	//cikis_frm2.ipliksatisGetir();

	//cikis_frm2.hedefSec("ipliksiparis");
	//cikis_frm2.ipliksiparisGetir();


	$(document).ready(function(){
		 // tab seçimi takini
            $('input[name="cekicikisfrm[giris]"]').change(function(){ var ths=this; setTimeout(function(){
                switch($(ths).val()){
               		case 'boyatakip':
						cikis_frm2.hedefSec("boyatakip");

						cikis_frm2.boyahaneGetir(function(){
							cikis_frm2.boyatakipGetir();
						});
						break;
               		case 'hambezstok':
						cikis_frm2.hedefSec("hambezstok");
						cikis_frm2.hamkumasstokGetir(function(){
							cikis_frm2.hambezstokGetir();
						});
						break;
               		case 'cozgustok':
						cikis_frm2.hedefSec("cozgustok");
						cikis_frm2.cozguSalonuGetir(function(){
							cikis_frm2.cozgustokGetir();
						});

						break;
               		case 'dokumastok':
						cikis_frm2.hedefSec("dokumastok");
						cikis_frm2.dokumaSalonuGetir(function(){
							cikis_frm2.dokumastokGetir();
						});
						break;
               		case 'iplikstok':
						cikis_frm2.hedefSec("iplikstok");
						cikis_frm2.iplikstokGetir();
						break;
               		case 'ipliksiparis':
						cikis_frm2.hedefSec("ipliksiparis");
						cikis_frm2.ipliksiparisGetir();
						break;
               		case 'ilmar':
						cikis_frm2.hedefSec("ilmar");
						cikis_frm2.ilmarGetir();
						break;
               		case 'ipliksatis':
						cikis_frm2.hedefSec("ipliksatis");
						break;
                }
            },200);		});



            $('#select_boyahane').change(function(){
				cikis_frm2.boyahaneSec($(this).val());
				cikis_frm2.boyatakipGetir();
            });

            $('#select_hamkumasstok').change(function(){
				cikis_frm2.hamkumasstokSec($(this).val());
				cikis_frm2.boyatakipmamulGetir();
            });

            $('#select_cozgu').change(function(){
				cikis_frm2.cozguSalonuSec($(this).val());
            	cikis_frm2.cozgustokGetir();
            });

            $('#select_dokumaSalonu').change(function(){
				cikis_frm2.dokumaSalonuSec($(this).val());
            	cikis_frm2.dokumastokGetir();
            });

            $('#select_firma').change(function(){
				cikis_frm2.firmaSec($(this).val());
				cikis_frm2.stoksatisGetir();
            });

            /*********************************************************************************************************************************************************/
            $(document).ready(function(){
                 
            // tab_cozgustok işlemleri
/*
            var nesne_IDcozgu="",iplikno_ID="";
            $('#select_cozgu').change(function(){
                $('#radio_cozgustok').html("");
                nesne_IDcozgu=$(this).val();
                i('oku','zdxcdsjknrf',{
                	's':'<?php echo $syf; ?>',
                    '<?php echo $syf ?>_ID':<?php echo $ID; ?>,
                    'nesne_IDcozgu':nesne_IDcozgu,
                    'iplikno_ID':$('input[name="cekicikisfrm[iplikno_ID]"]').val()
                },function(d){
                    console.log(d);
                    if(d){
                        d.forEach(function(fed,i){
                            console.log(fed);
                            var lot='';
                            if(fed.ipliknolar){
                                var ipliknolar=JSON.parse(fed.ipliknolar);
                                for (var i=0; i<ipliknolar['iplikno_ID'].length; i++) {
                                    if(ipliknolar['iplikno_ID'][i]==fed.iplikno_ID){
                                        lot=ipliknolar['lot'][i];
                                    }
                                }
                            }
                            $('#radio_cozgustok').append('\
                                <tr class="radio-tr">\
                                    <td><input type="radio" tabindex="1" name="cekicikisfrm[cozgustok_ID]" value="'+ fed.ID +'"></td>\
                                    <td>'+ (lot?lot:'') +'</td>\
                                    <td>'+ fed.kg +'</td>\
                                    <td>'+ fed.cuval +'</td>\
                                </tr>\
                            ');
                            //        <td>'+ (fed.iplikno?fed.iplikno:'') +'</td>\


                            //RADİO TR SEÇİMİ
                            if($('.radio-tr').length>0){    
                                $('.radio-tr').click(function(){
                                    $(this).find('input[type="radio"]').prop('checked',true);
                                });
                            }   
                                    
                        });
                    }
                });
            });
            // tab_cozgustok bitti
            



            // lOT SEÇ
            /*$('#select_cozgu_iplikno').change(function(){
                iplikno_ID=$(this).val();
                
                i('cvr','nesne_IDcozgu','cozgustok',$(this).val(),'',function(d){
                        //jsonToSelectOption('#select_cozgu_iplikno',d);
                        jsonToSelectOption('#radio_cozgustok',d);

                    
                });
            });*/

            $('.iade_checkbox').change(function(){
                if($(this).prop('checked')){
                    $('input[name="cekicikisfrm[form]"]').val('cikisiade');
                }
                else{
                    $('input[name="cekicikisfrm[form]"]').val('cikis');
                }
            });





        });

	});

/*
    function cikisFormAc(id,data) {
        //if(data && data.iplikno_ID){
            //$('input[name="cekicikisfrm[iplikno_ID]"]').val(data.iplikno_ID);
            cikis_frm2.formAc({"iplikno_ID":data.iplikno_ID,"lot":(data.lot?data.lot:"")});

            
       /* }
        else{
            cikis_frm2.formAc({});

            //alert('İplik no belirtilmemiş.');
        }
    }*/
</script>