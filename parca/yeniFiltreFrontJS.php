<style>
.anahtarKelime{
    display:flex;

}
.spanDiv{
    margin:3px 5px;
    border-radius: 25px;
    border: 2px solid #252c38;
    padding: 5px;
    font-weight:700;
}
.spanDiv:hover{
    background-color:gray;
}
.spanDiv span:last-child{
    color:red !important;
    margin-left: 3px;
    background-color:white !important;

}
.spanDiv span:last-child:hover{
    cursor:pointer;
}
.aramaInput{
    width:50%;
    min-width:300px;
    margin:auto 0px;
    border-radius: 0px 5px 5px 0px;
    border:4px solid #252c38;
    background-color:#E8E8E8;
    height:35px;
    font-size:14px;
    padding-left:15px;
}
.aramaInput:focus{
    outline:none;
}
.aramaCubugu{
    display:flex;
    margin-left:5px;
}
#bolumInput{
    color: #ffda96;
    background-color: #252c38;
    margin:auto 0px;
    
    border-radius: 5px 0px 0px 5px;
    min-width:200px;
    height:35px;
    border-right:none;
    text-align:center;
   padding-top:6px;
   font-size:14px;
    display:inline-block;
}

#ileriYon{
    float:right;
    cursor:e-resize;
}
#geriYon{
    float:left;
    margin-left:4px;
    cursor:w-resize;
}

.yonTus{
    width:15px;
    color: #ffda96;
    background-color: red;
    margin:auto 0px;
    
    border-radius: 25px;
  
    height:15px;
    border-right:none;
    text-align:center;
    display:inline-table;
   font-size:14px;
    position:relative;
    
}
.aramaCubugu > .yonTus:first-child {
    color:red !important;
    position:absolute;
}
.araGizliGrup{
    z-index: 10;
    background-color: #252c38 !important;
    color: #ffda96;
    border: 2px solid;
}
.araGrup > input{
    width:30px;
    background-image:url(../img/calendar.png) !important;
    height:30px;
}
.araGrup > button{
    font-size:14px;  
    font-weight:600;  
}
.araGrup{
    border: 1px solid black !important;
    margin:auto 5px;
   
   

}
#menuSs{
    
    border:none;
    overflow:hidden;
    background-color:#252c38 !important;
    color:#ffda96;
    outline:none;

    
}
.araGizliGrup .ggth{
    border-radius:0px !important;
    background-color:#252c38 !important;
    background-image:none !important;
}
.araGizliGrup .ggth > label{
    display:contents;

    background-color:#252c38 !important;
    border-bottom: 1px solid #ffda96 !important;
    border-radius:0px !important;
    color: white;
    margin-bottom:inherit;
    font-size:12px;
    

}
#silSub{
    display:initial !important;
    outline:none;
}



</style>
<?php //__(z(11,'ara'.$syf));




?>


<!-- <tr><div class="aramaCubugu"><input type="text" class="aramaInput"></div></tr>
            <tr><div class="anahtarKelime"></div></tr> -->
      
<script>


    //inialization
	


    
	var formCheck = $('#topluIslemForm').length;
    if(formCheck>0){$('#topluIslemForm').prepend('<div class="aramaCubugu"><input type="text" class="aramaInput"></div><div class="anahtarKelime"></div>');}else {console.log('#topluFormIslem bulunamadı....');}
    
    
    var dataFiltre= [<?php echo json_encode(z(11,'ara'.$syf)); ?> ]; dataFiltre=dataFiltre[0];
    var dataTh= [<?php echo json_encode($_Th); ?> ]; dataTh=dataTh[0];
    $('.labelSearch').hide();
    var onMouseInput='false';


   
    
   
    
   
    $('.aramaCubugu').prepend('<div id="bolumInput"><div class="yonTus" id="geriYon"><</div><span id="menuS"></span><div class="yonTus" id="ileriYon">></div></div>');
    
    
    // $('<div class="yonTus"><</div>').insertBefore($('#bolumInput'));
    // $('<div class="yonTus">></div>').insertAfter($('#bolumInput'));
    $('.aramaInput').attr('placeholder','Soldan menu seçiniz...');
	//anahtar kelime üzerinden filtreleri çarpıya basarak silmeyi saglar
	function filtreSil(t){
		var test=$(t).attr('value');
		var nameInput=$(t).attr('name');
		var valueInput=$(t).attr('value');
		// console.log('name: '+nameInput);
		// console.log('value: '+valueInput);
		 	$('input[name="'+nameInput+'"][value="'+valueInput+'"]').click();
			 $(t).parentsUntil('.anahtarKelime').remove();
			

		}
	$(document).ready(function(e){
        //sayfa refhlesh olduğunda seçili filtreleri tekrar doldurur
		function filtreDoldur(){
			var txtFiltre='';
			$.each(dataFiltre,function(item,index){

				if(dataFiltre[item]!=''){
					//	console.log(dataFiltre[item]);
						if(Array.isArray(dataFiltre[item])){

							$.each(dataFiltre[item],function(itm,idx){

								if(idx!=''){

                                 txtFiltre=$($('.ggtdi > label > input[name="ara['+item+']"][value="'+idx+'"]').next()).text();
                                
                                if(txtFiltre==''){ txtFiltre=$($('.ggtdi > label > input[name="ara['+item+']"][value="'+idx+'"]').parent()).text(); }
                              //  console.log(txtFiltre);
								var clsFiltre = $('.ggtdi > label > input[name="ara['+item+']"][value="'+idx+'"]').attr('class');
										$('.anahtarKelime').append('<div class="spanDiv"> <span>'+txtFiltre+'</span><span onclick="filtreSil(this);" name="ara['+item+']" class="'+clsFiltre+'" value="'+idx+'">X</span> </div>');			
                                
                                        
                                }
							});
						//	$('.anahtarKelime').append('<div class="spanDiv"> <span>'+$($(this).find('span')).text()+'</span><span onclick="filtreSil(this);" name="ara['+item+']" class="'+$($(this).find('input')).attr('class')+'" value="'+$($(this).find('input')).attr('value')+'">X</span> </div>');

						}
				}

			});
		}
		filtreDoldur();
		


		//seçilen filtreleri anahtar kelime olarak ekrana basar
		$('.ggtdi > label').on('mouseup',function(){
            var anahtar='false';
            var ismi=$(this).attr('value');
            var ckName =  $($(this).find('input')).attr('name');
            var ckValue = $($(this).find('input')).attr('value');
			if(ismi!=''){

                $.each($('.anahtarKelime > div'),function(it,ix){
                  //  console.log(ix);
                    var ixName= $(ix).children().last().attr('name');
                    var ixValue = $(ix).children().last().attr('value');
               
                   
                    if(ixName==ckName&&ixValue==ckValue){
                        $('span[name="'+ixName+'"][value="'+ixValue+'"]').parentsUntil('.anahtarKelime').remove();
                       anahtar='true'; 
                    }
                    
                });
                if(anahtar=='false'){

                   var spanName = $($(this).find('span')).text();
                        
                    if(spanName==''){
                        
                        spanName=$(this).text();
                    }   
                     $('.anahtarKelime').append('<div class="spanDiv"> <span>'+spanName+'</span><span onclick="filtreSil(this);" name="'+$($(this).find('input')).attr('name')+'" class="'+$($(this).find('input')).attr('class')+'" value="'+$($(this).find('input')).attr('value')+'">X</span> </div>');
                    
                }
				//console.log(anahtar);
				

				
				
				
				}
		});

        //arama cubugu-----------------------------------------------
        var filtreGrup = $('.printx > .araGrupChck');
       // console.log(filtreGrup);
        var dataInput = $('th > input[class^="ara"]');
        var dataTarih=[];
        
        var selectBoxOptions='';
        var gecisElementi=$('<div></div>');
        var selectElement =$('<select name="menuS" id="menuSs"><option value="-1">Seçiniz..</option>'+selectBoxOptions+'</select>');
        $('#menuS').html(selectElement);
       
        //selectbox icinin doldurulması
        $.each(dataInput,function(key,value){
            var nameInput = $(value).attr('name');
            if(nameInput.toLowerCase().indexOf('tarih')==-1){
                filtreGrup.push(value);
            }
            
        });        
        
        

        $.each(filtreGrup,function(key,value){
            var test='';
            var ayarFiltreGru='';
           // console.log('-----------');
           if($(value)[0].nodeName=='INPUT'){
             test = ($(value).attr('name').split('[')[1]).split(']')[0];
          //   console.log('test: '+test);
           }else{

             test= ($(value).find('.araGizliGrup > .ggtd > .ggtdi > label > input').attr('name').split('[')[1]).split(']')[0];
          //  console.log('test: '+test);
           }
          // console.log('-----------');
           
           dataTh.forEach(function(item,index){

            var kontrolNoktasi='false';
            var valueKontrolNoktasi='false';
                if(item['filtreGrup']){
                if(item['filtreGrup']!=''){
                   
                   //test.includes(item['filtreGrup'])==true
                   test=test.toLowerCase();
                   ayarFiltreGrup=item['filtreGrup'].toLowerCase();
                   
                 
                    if(test==ayarFiltreGrup){
                        
                        kontrolNoktasi='true';
                     
                       
                       
                        

                        
                          //  console.log('item içeriği:'+$(item['thIcerigi']).text()+' KEY:'+key);
                            
                            $('#menuSs').append('<option value="'+key+'">'+$(item['thIcerigi']).text()+'</option>');
                        
                       
                        selectBoxOptions+='<option value="'+key+'">'+$(item['thIcerigi']).text()+'</option>';
                        
                        
                        
                    }else if(kontrolNoktasi=='false') {

                        if(ayarFiltreGrup!=''){
                            if(test==ayarFiltreGrup){
                                var kelime =$(item['thIcerigi']).text();
                                
                             
                                kontrolNoktasi='true';
                                
                       
                                
                                
                                    $('#menuSs').append('<option value="'+key+'">'+$(item['thIcerigi']).text()+'</option>');
                                
                            
                                selectBoxOptions+='<option value="'+key+'">'+$(item['thIcerigi']).text()+'</option>';
                                
                                
                            }

                        }

                    }
                }
           }else {//console.log('moduladi/ayar.php - filtre ayarlarını kontrol ediniz... ');
           }

           });
           
        });
       
        
       

        $('#menuSs').change(function(){
 
            var selectedValue=$(this).children('option:selected').val();
            $.each(filtreGrup,function(key,value){



                if(key!=selectedValue){
                
                    $(filtreGrup[key]).children('.araGizliGrup').css('display','none');
                    $(filtreGrup[key]).children('.araGizliGrup').removeAttr('id');
                    
                    if($(filtreGrup[key])[0].nodeName=='INPUT'){
                        $(filtreGrup[key]).removeAttr('data-id');
                    }
                }




                
            });

             
            $('#aktifArama').find('.labelSearch').val('');
                $('#aktifArama').find('.labelSearch').keyup();
                $('.aramaInput').val('');
                if(selectedValue<filtreGrupSayisi){
                  
                    //console.log($(filtreGrup[selectedValue])[0].nodeName);
                    if($(filtreGrup[selectedValue])[0].nodeName!='INPUT'){

                           // console.log(filtreGrup[selectedValue]);
                            $(filtreGrup[selectedValue]).children('.araGizliGrup').slideDown();
                            $(filtreGrup[selectedValue]).children('.araGizliGrup').css({'display':'block','position':'absolute','left':posX,'top':posY});
                          
                            $(filtreGrup[selectedValue]).children('.araGizliGrup').prop('id','aktifArama');
                          //  console.log(filtreGrup[selectedValue]);
                           // console.log(selectedValue);
                            var nTip=($('#aktifArama > .ggtd > .ggtdi >label:first >input').attr('name').split('[')[1]).split(']')[0];
                            
                            // dataTh.forEach(function(itemT,indexT){
                            // if(itemT['sutunAdi']!=''){

                                
                            //     if(nTip.includes(itemT['sutunAdi'])==true){
                                    
                            //         if($(itemT['thIcerigi']).text()!=''){
                            //             $('#bolumInput > span').text($(itemT['thIcerigi']).text());
                            //         }else {
                            //             $('#bolumInput > span').text(itemT['thIcerigi']);
                            //         }
                                    
                            //     }
                            // }
                            // });
                    }
                    else if($(filtreGrup[selectedValue])[0].nodeName=='INPUT') {
                           // console.log(filtreGrup[selectedValue]);
                            $(filtreGrup[selectedValue]).attr('data-id','aktifArama');
                            //$(filtreGrup[selectedValue]).prop('data-id','');
                          var nTip=$('input[data-id]').attr('name');
                          if(nTip.includes('[')){
                          //    console.log('parantez var');
                              nTip=($('input[data-id]').attr('name').split('[')[1]).split(']')[0];
                          
                            
                           
                            $('.aramaInput').val( $('input[data-id]').val());
                            // dataTh.forEach(function(itemT,indexT){
                            //     if(itemT['sutunAdi']!=''){


                                
                            //     if(nTip.includes(itemT['sutunAdi'])==true){
                                    
                            //         if($(itemT['thIcerigi']).text()!=''){
                            //             $('#bolumInput > span').text($(itemT['thIcerigi']).text());
                            //         }else {
                            //             $('#bolumInput > span').text(itemT['thIcerigi']);
                            //         }
                                    
                            //     }
                            //     }
                            // });
                          }
                    }
                   // console.log(dataTh[1]);
                // var aramaTablo = $(filtreGrup[selectedValue]).children('.araGizliGrup').clone();//
                //    $(aramaTablo).css({'display':'block','background-color':'white','position':'fixed'});
                //     $('.aramaCubugu').append(aramaTablo)
                    
                    
                    

                    
                }
               

          

        });
      
        
       // console.log(filtreGrup);
        $(dataInput).each(function(){

            var nameInput=$(this).attr('name');

            if(nameInput.toLowerCase().indexOf('tarih')!=-1){
                
                var el =$(this).parent();
                
                dataTarih.push(el);
                //$('.aramaCubugu').append(el);
            }else{
                filtreGrup.push(this);
            }

        });
       
        function tarihInput(dataTarih){
            var ayarFiltreGrup='';
            dataTarih.forEach(function(item,index){
                var nameTarih =$(item).find('input').attr('name');
               // var el = $('<div class="tarihInput"><div>');
                var elSpan = $('<div class="tarihIsım"></div>')
              //  console.log('tarih name: '+nameTarih);
                dataTh.forEach(function(it,ix){
                   nameTarih=nameTarih.toLowerCase();
                   ayarFiltreGrup=it['filtreGrup'].toLowerCase();

                  if(ayarFiltreGrup==nameTarih){

                 //   console.log('tarih filtreGrup: '+it['filtreGrup']);
                   // console.log('tarih ıcerigi: '+it['thIcerigi']);
                    $(elSpan).text($(it['thIcerigi']).text());
                    $(item).append(elSpan);

                  }

                });
                $('.aramaCubugu').append(item);

            });

        }
        tarihInput(dataTarih);
       
        var filtreGrupSayisi=filtreGrup.length;
        var filtreGrupSayac=0;
        var filtreNodeSayac=0;
        var filtreGrupSayacGeri=filtreGrupSayisi-1;
       
        var posX = $('.aramaInput').position().left;
        var posY = $('.aramaInput').position().top+$('.aramaInput').height()*2;

        $('.aramaInput').on('keyup',function(event){

       
            if(event.which!=16 && event.which!=27){
                

                    $('input[data-id]').val($('.aramaInput').val());
                    $('input[data-id]').keyup();
                
             $('#aktifArama').find('.labelSearch').val($('.aramaInput').val());
             $('#aktifArama').find('.labelSearch').keyup();
           
                //$(filtreGrup[filtreGrupSayac]).find('.labelSearch').keyup();

            }

            


            // if(event.which==16){
                  
                
            //     $('#aktifArama').find('.labelSearch').val('');
            //     $('#aktifArama').find('.labelSearch').keyup();
            //     $('.aramaInput').val('');
            //     if($(filtreGrup[filtreNodeSayac])[0].nodeName!='INPUT'){

            //         $(filtreGrup[filtreGrupSayac-1]).children('.araGizliGrup').css('display','none');
                
            //          $(filtreGrup[filtreGrupSayac-1]).children('.araGizliGrup').removeAttr('id');
            //     } else if($(filtreGrup[filtreNodeSayac])[0].nodeName=='INPUT'){
                
            //          $(filtreGrup[filtreGrupSayac-1]).removeAttr('data-id');
            //          $(filtreGrup[filtreGrupSayac-1]).children('.araGizliGrup').css('display','none');

            //          $(filtreGrup[filtreGrupSayac-1]).children('.araGizliGrup').removeAttr('id');
            //     }
            //     if(filtreGrupSayac==filtreGrupSayisi){filtreGrupSayac=0;}
            //     filtreNodeSayac=filtreGrupSayac;
            //     console.log('ilk' +filtreGrupSayac);
            //     if(filtreGrupSayac<filtreGrupSayisi){
                  
            //         //console.log($(filtreGrup[filtreGrupSayac])[0].nodeName);
            //         if($(filtreGrup[filtreGrupSayac])[0].nodeName!='INPUT'){

            //                 console.log(filtreGrup[filtreGrupSayac]);
            //                 $(filtreGrup[filtreGrupSayac]).children('.araGizliGrup').css({'display':'block','position':'absolute','left':posX,'top':posY});
            //                 $(filtreGrup[filtreGrupSayac]).children('.araGizliGrup').prop('id','aktifArama');
            //                 console.log(filtreGrup[filtreGrupSayac]);
            //                 console.log(filtreGrupSayac);
            //                 var nTip=($('#aktifArama > .ggtd > .ggtdi >label:first >input').attr('name').split('[')[1]).split(']')[0];
                            
            //                 dataTh.forEach(function(itemT,indexT){
            //                 if(itemT['sutunAdi']!=''){

                                
            //                     if(nTip.includes(itemT['sutunAdi'])==true){
                                    
            //                         if($(itemT['thIcerigi']).text()!=''){
            //                             $('#bolumInput > span').text($(itemT['thIcerigi']).text());
            //                         }else {
            //                             $('#bolumInput > span').text(itemT['thIcerigi']);
            //                         }
                                    
            //                     }
            //                 }
            //                 });
            //         }
            //         else if($(filtreGrup[filtreGrupSayac])[0].nodeName=='INPUT') {
            //                 console.log(filtreGrup[filtreGrupSayac]);
            //                 $(filtreGrup[filtreGrupSayac]).attr('data-id','aktifArama');
            //                 //$(filtreGrup[filtreGrupSayac]).prop('data-id','');
            //               var nTip=$('input[data-id]').attr('name');
            //               if(nTip.includes('[')){
            //                   console.log('parantez var');
            //                   nTip=($('input[data-id]').attr('name').split('[')[1]).split(']')[0];
                          
                            
                           
            //                 $('.aramaInput').val( $('input[data-id]').val());
            //                 dataTh.forEach(function(itemT,indexT){
            //                     if(itemT['sutunAdi']!=''){


                                
            //                     if(nTip.includes(itemT['sutunAdi'])==true){
                                    
            //                         if($(itemT['thIcerigi']).text()!=''){
            //                             $('#bolumInput > span').text($(itemT['thIcerigi']).text());
            //                         }else {
            //                             $('#bolumInput > span').text(itemT['thIcerigi']);
            //                         }
                                    
            //                     }
            //                     }
            //                 });
            //               }
            //         }
            //        // console.log(dataTh[1]);
            //     // var aramaTablo = $(filtreGrup[filtreGrupSayac]).children('.araGizliGrup').clone();//
            //     //    $(aramaTablo).css({'display':'block','background-color':'white','position':'fixed'});
            //     //     $('.aramaCubugu').append(aramaTablo)
                    
            //         filtreGrupSayac++;
                    

                    
            //     }
            //     console.log(filtreGrupSayac);

            // }else if(event.which==13){
                
            //    // alert('asdasa');
            // }
        });
        $(document).on('keyup',function(e){
            if(e.which==27){
                $('#aktifArama').find('.labelSearch').val('');
                $('#aktifArama').find('.labelSearch').keyup();
                $('.aramaInput').val('');
                $('#menuSs').val(-1);
                $('.aramaInput').attr('placeholder','Soldan menu seçiniz...');
                
                $('input[data-id]').removeAttr('data-id');
                $.each(filtreGrup,function(key,value){
                    $(filtreGrup[key]).children('.araGizliGrup').removeAttr('id');
                    $(filtreGrup[key]).children('.araGizliGrup').css('display','none');
                

                });
              
                //$('.aramaCubugu > .araGizliGrup').remove();

             }
          

        });
           
           $('.aramaInput').mouseover(function(){
               onMouseInput='true';
           });
           $('.aramaInput').mouseleave(function(){
               onMouseInput='false';
           });
           $('.araGizliGrup').mouseover(function(){
               onMouseInput='true';
           });
           $('.araGizliGrup').mouseleave(function(){
               onMouseInput='false';
           });
           $('#bolumInput').mouseover(function(){
               onMouseInput='true';
           });
           $('#bolumInput').mouseleave(function(){
               onMouseInput='false';
           });
           $(document).click(function(){
               if(onMouseInput=='false'){
                        console.log('dısında');
                        $('#aktifArama').find('.labelSearch').val('');
                        $('#aktifArama').find('.labelSearch').keyup();
                        $('.aramaInput').val('');
                        
                        //$('#menuSs > option[value="-1"]').attr('selected');
                        $('#menuSs').val(-1);
                        $('input[data-id]').removeAttr('data-id');
                        $(filtreGrup[filtreGrupSayac-1]).children('.araGizliGrup').removeAttr('id');

                        $(filtreGrup[filtreGrupSayac-1]).children('.araGizliGrup').css('display','none');
                        
                        $('.aramaInput').attr('placeholder','Soldan menu seçiniz...');
                        $.each(filtreGrup,function(key,value){
                            
                                $(filtreGrup[key]).children('.araGizliGrup').css('display','none');
                            
                        });

               }
               else if(onMouseInput='true'){
                        console.log('ustunde');

               }
           });


           
           //enter basildiğinda submit iptal eder...  
           //$('#topluIslemForm').off('submit');$("#topluIslemForm").submit(function(e){ e.preventDefault(); return '';});
           
       //$('#silSub').fadeIn(0);
           
           
          

          //
         
           //ileri geri buton kontrolleri
           var els = ($('#menuSs > option')).length;
                     els-=1;
                  //   console.log('els: '+els);
           $('#ileriYon').click(function(event){
              
                  //   console.log(els);         
               var selectValue = $('#menuSs').val();
           
               selectValue++;
              // console.log('secilen: '+selectValue);
              if(selectValue<els){
             //   console.log('kucuk');
             //   console.log('selectV: '+selectValue);
               $('#menuSs').val(selectValue);
               $('#menuSs').change();
              }else if(selectValue==els){
                  selectValue=-1;
               //   console.log('buyuk');
              
             //   console.log('selectV: '+selectValue);
                $('#menuSs').val(selectValue);
                $('#menuSs').change();
              }
               
          

              
           });

           $('#geriYon').click(function(){
           
           //  console.log(els);
             var selectValue= $('#menuSs').val();
           //  console.log('secilen: '+selectValue);
             selectValue--;
             if(selectValue>-1){
               //  console.log('buyuk');
               //  console.log('selectV: '+selectValue);
                 $('#menuSs').val(selectValue);
                 $('#menuSs').change();
                 
             }else if(selectValue<=-1){
              //  console.log('kucuk'); 
              selectValue=els-1;
              //  console.log('selectV: '+selectValue);
                $('#menuSs').val(selectValue);
                $('#menuSs').change();

             }


           });
        //    $('#menuSs').on('click',function(){
        //        if($(this).val()!=-1){
        //            $('#menuSs').change();
        //        }
        //    });



	});


	

</script>