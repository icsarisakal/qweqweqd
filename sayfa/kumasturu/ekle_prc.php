
<div class="form-group row">
        <label class="col-lg-3 col-form-label">Kumaş Türü Adı *</label>
    <div class="col-lg-9">
        <input type="text" tabindex="1" class="form-control" name="<?php echo $tbl?>[ad]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['ad'])?$_X['ad']:''?>" autocomplete="off">
    </div>
</div>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#makinacesidi').change(function() {
                        var makinacesidi_ID = makinacesidi.options[makinacesidi.selectedIndex].value;
                        $.ajax({
                            type:"POST",
                            url:"ajaxayar.php?s=kumasturu&a=ajaxsorgu&makina="+makinacesidi_ID,
                            success:function(gelensorgu){
                                console.log(gelensorgu);
                                if(gelensorgu.sonuc==1){
                                var makinedegerleri=gelensorgu.cevap.makinedegerleri;
                                console.log(makinedegerleri);
                                if(makinedegerleri!=null){
                                    $('#makineislevi option').remove();
                                    $.each(makinedegerleri, function(k, v) {
                                        $('<option>').val(k).text(v).appendTo('#makineislevi');
                                    });
                                } else{
                                    $('#makineislevi option').remove();
                                }
                                var makinedegerleri2=gelensorgu.cevap.makinedegerleri2;
                                if(makinedegerleri2!=null){
                                    $('#pusvefayn option').remove();
                                    $("#pusvefayn2").html('');
                                    $.each(makinedegerleri2, function(k2, v2) {

                                        var clonemuz='<div class="custom-control custom-checkbox custom-control-inline"><input type="checkbox" class="custom-control-input" id="fname'+k2+'" name="kumasturu[pusvefayn][]" value="'+k2+'"><label class="custom-control-label" for="fname'+k2+'">'+v2+':</label></div>';
                                        $("#pusvefayn2").append(clonemuz);
                                        //$('<option>').val(k2).text(v2).appendTo('#pusvefayn');
                                    });
                                } else{
                                    $('#pusvefayn option').remove();
                                }
                            } else {
                                alert('Makina Çeşitlerini okuma başarısız');
                            }
                            }
                        });
                    });
                });
            </script>

            <script type="text/javascript">
                $(document).ready(function(){
                    $('#makineislevi').change(function(e) {
                        var makinacesidi_ID = makinacesidi.options[makinacesidi.selectedIndex].value;
                        var makineislevi_ID = makineislevi.options[makineislevi.selectedIndex].value;
                        console.log(makinacesidi_ID);
                        console.log(makineislevi_ID);
                        $.ajax({
                            type:"POST",
                            url:"ajaxayar.php?s=kumasturu&a=ajaxsorgu&makina="+makinacesidi_ID+"&makineislevi="+makineislevi_ID,
                            success:function(gelensorgu){
                                console.log(gelensorgu);
                                if(gelensorgu.sonuc==1){
                                var makinedegerleri2=gelensorgu.cevap.makinedegerleri2;
                                if(makinedegerleri2!=null){
                                    $('#pusvefayn option').remove();
                                    $("#pusvefayn2").html('');
                                    $.each(makinedegerleri2, function(k2, v2) {
                                        var clonemuz='<div class="custom-control custom-checkbox custom-control-inline"><input type="checkbox" class="custom-control-input" id="fname'+k2+'" name="kumasturu[pusvefayn][]" value="'+k2+'"><label class="custom-control-label" for="fname'+k2+'">'+v2+':</label></div>';
                                        $("#pusvefayn2").append(clonemuz);
                                        //$('<option>').val(k2).text(v2).appendTo('#pusvefayn');
                                    });
                                } else{
                                    $('#pusvefayn option').remove();
                                }
                            } else {
                                alert('Makina İşlevlerini okuma başarısız');
                            }
                            }
                        });
                    });
                });
            </script>
            <?php $sd=""; ?>
			<?php if(z(8,'a')=='duzenle'&&!empty($_X['makinacesitleri_ID'])){
                $makinaoku=z(1,$_X['makinacesitleri_ID'],'','makinacesitleri');
                $makinedegeriarray=(!empty($makinaoku['makineyetenegi'])?json_decode($makinaoku['makineyetenegi'],1):'');
                $makinesayi=count($makinedegeriarray);
                $sorgubiriktir='(';
                if(!empty($makinedegeriarray)){
                    $makidsayi=0;
                    foreach ($makinedegeriarray as $mkd => $mkdarray) {
                        $makidsayi++;
                        if($makinesayi!=$makidsayi){
                            $sorgubiriktir.="ID='".$mkdarray."' OR ";
                        } else {
                            $sorgubiriktir.=" ID='".$mkdarray."')";
                        }
                    }

                    $sd="WHERE arsiv='0' AND ".$sorgubiriktir;
                }
            } ?>

        <div class="form-group row">
                <label class="col-lg-3 col-form-label">Makine Çeşitleri</label>
            <div class="col-lg-9">
                <?php echo select(Array('name'=>$tbl.'[makinacesitleri_ID]','detay'=>'class="form-control select-search " id="makinacesidi"','t'=>'makinacesitleri','alan'=>'ID,ad','ayrac'=>' /// ','sd'=>"",'icerik'=>'<option value="">Seçiniz</option>','sec'=>!empty($_X['makinacesitleri_ID'])?$_X['makinacesitleri_ID']:0)); ?>
            </div>
        </div>


            <?php if(!empty($_NSN2))foreach($_NSN2 as $ad=>$n){
                $sorgudetay="WHERE ad='".$ad."'";
                if(!empty($sd)){
                    $sorgudetay=$sd;
                }?>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label"><?php echo $n['ad']?></label>
                <div class="col-lg-9">
                <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="form-control select-search nesneSlc_'.$ad.'" id="makineislevi"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
                </div>
            </div>

            <?php }?>

              
            
            
            <?php if(z(8,'a')=='duzenle'){
                $pus='';  
                $fayn='';
                $makinedegerleri=array();
                if(!empty($_X['makinacesitleri_ID'])){
                    $makinaoku=z(1,$_X['makinacesitleri_ID'],'','makinacesitleri');
                    $makinedegeripusarray=(!empty($makinaoku['pus'])?json_decode($makinaoku['pus'],1):'');
                    $makinedegerifaynarray=(!empty($makinaoku['fayn'])?json_decode($makinaoku['fayn'],1):'');
                    $makinesayi=count($makinedegeripusarray);
                    $makinedegeriarray=(!empty($makinaoku['makineyetenegi'])?json_decode($makinaoku['makineyetenegi'],1):'');
                    $makineislevi=(!empty($_X['nesne_IDmakineYetenegi'])?$_X['nesne_IDmakineYetenegi']:'');

                    $makinedegerleri=array();
                    $makinedegerleri2=array();
                    $nesnemetinid=0;
                    if(!empty($makinedegeriarray)){
                        foreach ($makinedegeriarray as $mkd => $makinedegeri) {
                            $nesneoku=z(1,$makinedegeri,'','nesne');
                            $nesnemetin1=(!empty($nesneoku['metin1'])?$nesneoku['metin1']:'');
                            $nesnemetinid=(!empty($nesneoku['ID'])?$nesneoku['ID']:$mkd);
                            $makinedegerleri[$nesnemetinid]=$nesnemetin1;
                            if(!empty($makineislevi)){
                                if($makineislevi==$nesnemetinid){
                                    $makinedonguid=$mkd;
                                }
                            }
                        }
                    }

                    if(!empty($makinedonguid)||$makinedonguid==0){
                        $makinedongupus=$makinedegeripusarray[$makinedonguid];
                        $makinedongufayn=$makinedegerifaynarray[$makinedonguid];
                        foreach ($makinedongupus as $mkdpus => $mkdongu) {
                            $makinedegerleri2[$mkdpus]=(!empty($mkdongu)?$mkdongu:'');
                            $makinedegerleri2[$mkdpus].=(!empty($makinedongufayn[$mkdpus])?' - '.$makinedongufayn[$mkdpus]:'');
                        }
                    }
                } 
            } ?>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Makine Özellikleri </label>
                    <div id="pusvefayn2" class="col-lg-9">
                        <?php if(z(8,'a')=='duzenle'){ ?>
                        <?php 
                        foreach($makinedegerleri2 as $mk => $mkdgr) {
                            $pusvefayncek=$_X['pusvefayn'];
                            $pusvefaynarray=(!empty($_X['pusvefayn'])?json_decode($_X['pusvefayn'],1):'');
                        ?>
                        <div class="custom-control custom-checkbox custom-control-inline"><input type="checkbox" class="custom-control-input" id="fname<?php echo $mk; ?>" name="kumasturu[pusvefayn][]" value="<?php echo $mk; ?>" <?php if(!empty($_X['pusvefayn'])&&in_array($mk,$pusvefaynarray)){ echo 'checked'; } ?>><label class="custom-control-label" for="fname<?php echo $mk; ?>"><?php echo (!empty($mkdgr)?$mkdgr:''); ?></label></div>
                        <?php } ?>
                        <?php } ?>
                    </div> 
                </div>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Fason Maliyet </label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[fasonmaliyet]" autofocus="autofocus" value="<?php echo !empty($_X['fasonmaliyet'])?$_X['fasonmaliyet']:''?>" autocomplete="off">
                </div>
            </div>


                      <?php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label"><?php echo $n['ad']?></label>
                    <div class="col-lg-9">
                <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
                    </div>
            </div>
        <?php }?>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Kayıt Tarihi</label>
                    <div class="input-group col-lg-9">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-calendar22"></i></span>
                        </span>
                        <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarihKayit]" value="<?php echo (!empty($_X['tarihKayit'])?z('date',$_X['tarihKayit']):z('datetime')); ?>">
                    </div>
                </div>
    
            <?php /*/ ?>
            <tr><th>Adres</th><td><textarea name="<?php echo $tbl?>[adres]"  tabindex="1" ><?php echo !empty($_X['adres'])?$_X['adres']:''?></textarea></td></tr>
            <tr><th>Açıklama</th><td><textarea name="<?php echo $tbl?>[aciklama]"  tabindex="1" ><?php echo !empty($_X['aciklama'])?$_X['aciklama']:''?></textarea></td></tr>
            <?php if(!empty($_OZNSN))foreach($_OZNSN as $ad=>$n){?>
            <tr><th><?php echo $n['ad']?></th><td><?php echo select(Array('name'=>$tbl.'['.$ad.']','detay'=>'class="nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'sayi1,'.$n['alan'], 'value'=>'sayi1', 'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option>','sec'=>!empty($_X[''.$ad])?$_X[''.$ad]:0))?></td></tr>
            <?php }?>

            
            <tr><th>Adet</th><td><input type="text" tabindex="1" name="<?php echo $tbl?>[adet]" value="<?php echo !empty($_X['adet'])?z(36,$_X['adet'],2):''?>" autocomplete="off"></td></tr>
            <tr><th>Gramaj</th><td><input type="text" name="<?php echo $tbl?>[gramaj]" value="<?php echo !empty($_X['gramaj'])?z(36,$_X['gramaj'],2):''?>" autocomplete="off"></td></tr>
             <tr><th>Kayit Tarihi</th><td><?php slctrh($tbl.'[tarihKayit]',!empty($_X['tarihKayit'])?$_X['tarihKayit']:'')?></td></tr>
           


            <tr><th>Atkı</th><td>
                <label><input type="checkbox" name="<?php echo $tbl?>[atki]" value="1" <?php echo !empty($_X['atki'])?'checked="checked"':''?>" /> Atkı</label>
            </td></tr>
            <?php /*/ ?>
