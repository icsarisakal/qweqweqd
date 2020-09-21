<form action="?s=<?php echo $syf ?>&a=topluekle<?php
    echo 
    (z(8,'hambezstok_ID','sayi')?'&hambezstok_ID='.z(8,'hambezstok_ID','sayi'):'').
    (z(8,'barkodluA','sayi')?'&barkodluA='.z(8,'barkodluA','sayi'):'')
    ;
?>" method="post" id="stokcikis_frm2" style="display: none;">
    <div class="blok">
        <table cellpadding="0" cellspacing="0"><tbody>
            <tr>
                <th colspan="2">ÇIKIŞ İŞLEMİ GERÇEKLEŞTİR</th>
            </tr>
            <tr>
                <th colspan="2" class="tab-buttons">
                    <?php foreach (array('boyatakip'=>'BOYAHANE','hambezstok'=>'HAM BEZ STOK',/*'dokumastok'=>'DOKUMA'
                    ,*/'hambezsatis'=>'HAM BEZ SATIŞ'
                    //,'mamulbezsatis'=>'MAMUL BEZ SATIŞ'
                    ) as $ind=>$val) { ?>
                    <label style="border-radius:0"><input type="radio" required="required" name="cekicikisfrm[giris]" value="<?php echo $ind ?>" <?php echo !empty($_XP['giris'])&&$_XP['giris']==$ind?'tab-checked="1"':'' ?> tabindex="1" autofocus="autofocus" class="tab-button" tab-id=".tab_<?php echo $ind ?>" >&nbsp;<span style="vertical-align: top; font-size: 14px"><?php echo $val; ?></span></label>
                    <?php } ?>
                </th>
            </tr>
            <tr>
                <td colspan="2" class="tab-group">
                    <?php require(__DIR__.'/../boyatakip/ceki_prc/tab_boyatakip.php'); ?>
                    <?php //require(__DIR__.'/../hambezstok/ceki_prc/tab_hambezstok.php'); ?>
                    <div class="tab tab_hambezstok">
                        <div style="font-size: 16px; font-weight: bold; background-color: white; padding: 0.3em;">
                        KUMAŞ KALİTESİ SEÇİNİZ<br>
                        </div>

                        
                        
                        <?Php echo select(Array('name'=>'hambezstok_cekicikisfrm[hamkumasstok_ID]','detay'=>'id="select_hamkumasstok" class="buyuk-select" tabindex="1" autofocus="autofocus" style="width:100%"','t'=>'hamkumasstok','alan'=>'ID,kumasIsmi,numuneIsmi','ayrac'=>' // ','sd'=>"",'icerik'=>'<option value="">seçiniz</option>','sec'=>!empty($_XP['hamkumasstok_ID'])?$_XP['hamkumasstok_ID']:0))?>
                        <?php /*<div id="select_cozgu_iplikno_div" class="gizli">
                            İPLİK NO SEÇİNİZ<br>
                            <select name="cekicikisfrm[iplikno_ID]" class="buyuk-select" id="select_cozgu_iplikno"></select>
                        </div> */?>
                        <br>
                        <div style="font-size: 16px; font-weight: bold; background-color: white; padding: 0.3em;" id="radio_hambezstok_bilgiMetin">
                            HAM BEZ STOĞU SEÇİNİZ
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    
                                    <th>Seçim</th>
                                    <?php /*/ ?>
                                    <th id="radio_hambezstok_detayBaslik" colspan="2">Kumaş Kalitesi</th>
                                    <?php /*/ ?>
                                    <th id="radio_hambezstok_detayBaslik">Ham Bez Stok No</th>

                                </tr>
                            </thead>
                            <tbody id="radio_hambezstok">
                            </tbody>
                        </table>                        
                    </div>
                    <div class="tab tab_dokumastok">
                        <div style="font-size: 16px; font-weight: bold; background-color: white; padding: 0.3em;">
                        DOKUMA SALONU SEÇİNİZ<br></div>
                        
                        <?Php echo select(Array('name'=>'dokumastok_cekicikisfrm[nesne_IDdokumaSalonu]','detay'=>'id="select_dokumaSalonu" class="buyuk-select" tabindex="1" autofocus="autofocus" style="width:100%"','t'=>'nesne','alan'=>'ID,metin1','ayrac'=>' - ','sd'=>"WHERE ad='dokumaSalonu'",'icerik'=>'<option value="">seçiniz</option>','sec'=>!empty($_XP['nesne_IDdokumaSalonu'])?$_XP['nesne_IDdokumaSalonu']:0))?>
                        <div style="font-size: 16px; font-weight: bold; background-color: white; padding: 0.3em;">
                            DOKUMA İŞ PARÇACIĞI SEÇİNİZ
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Seçim</th>
                                    <th>Kumaş Kalitesi</th>
                                    <th>Sipariş Metrajı</th>
                                    <th>Atkıdaki Lotlar</th>
                                </tr>
                            </thead>
                            <tbody id="radio_dokumastok">
                            </tbody>
                        </table>
                    </div>
                        
                    <div class="tab tab_hambezsatis">
                        <div style="font-size: 16px; font-weight: bold; background-color: white; padding: 0.3em;">
                        SEVKEDİLECEK FİRMAYI SEÇİNİZ<br></div>
                        
                        <?Php echo select(Array('name'=>'hambezsatis_cekicikisfrm[firma_ID]','detay'=>'id="select_firma" class="buyuk-select" tabindex="1" autofocus="autofocus" style="width:100%"','t'=>'firma','alan'=>'ID,ad','ayrac'=>' - ','sd'=>" ",'icerik'=>'<option value="">FİRMAYI SEÇİNİZ</option>','sec'=>!empty($_XP['firma_ID'])?$_XP['firma_ID']:0))?>
                        
                        <?php /*/ ?>
                        <br>
                        <div style="font-size: 16px; font-weight: bold; background-color: white; padding: 0.3em;" id="radio_stoksatis_bilgiMetin">
                            İŞ PARÇACIĞI SEÇİNİZ
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    
                                    <th>Seçim</th>
                                    
                                    <th id="radio_stoksatis_detayBaslik">İplik No ve Lot</th>
                                </tr>
                            </thead>
                            <tbody id="radio_stoksatis">
                            </tbody>
                        </table>         

                        <div style="font-size: 16px; font-weight: bold; background-color: white; padding: 0.3em;">
                        İPLİK NUMARASINI SEÇİNİZ<br></div>
                        
                        <?Php echo select(Array('name'=>'cekicikisfrm[iplikno_ID]','detay'=>'id="select_IS_iplikno" class="buyuk-select" tabindex="1" autofocus="autofocus" style="width:100%"','t'=>'iplikno','alan'=>'ID,ad','ayrac'=>' - ','sd'=>" ",'icerik'=>'<option value="">İPLİK NUMARASINI SEÇİNİZ</option>','sec'=>!empty($_XP['iplikno_ID'])?$_XP['iplikno_ID']:0))?>
                        
                        <?php /*/ ?>
                    </div>
                        
                    <div class="tab tab_mamulbezsatis">
                        <div style="font-size: 16px; font-weight: bold; background-color: white; padding: 0.3em;">
                        SEVKEDİLECEK FİRMAYI SEÇİNİZ<br></div>
                        
                        <?Php echo select(Array('name'=>'mamulbezsatis_cekicikisfrm[firma_ID]','detay'=>'id="select_firma" class="buyuk-select" tabindex="1" autofocus="autofocus" style="width:100%"','t'=>'firma','alan'=>'ID,ad','ayrac'=>' - ','sd'=>" ",'icerik'=>'<option value="">FİRMAYI SEÇİNİZ</option>','sec'=>!empty($_XP['firma_ID'])?$_XP['firma_ID']:0))?>
                    </div>
                </td>
            </tr>

            <?php /*/ ?>
            <?php foreach (array('kg'=>'Kg','cuval'=>'Çuval Adet','lot'=>'Lot No') as $fei=>$fed) { ?>
            <tr><th><?php echo $fed ?></th><td><input type="text" name="cekicikisfrm[<?php echo $fei ?>]" required="required"  tabindex="1" placeholder="0,00" /></td></tr>
            <?php } ?>
            <?php /*/ ?>
            <tr>
                <th>Tarih</th><td>
                    <?Php slctrh('cekicikisfrm[tarihIslem]',!empty($_XP['tarihIslem'])?$_XP['tarihIslem']:'')?>
                </td>
            </tr>
            <tr>
                <th>Açıklama</th><td>
                    <textarea name="cekicikisfrm[aciklama]" tabindex="1"><?php echo !empty($_XP['aciklama'])?$_XP['aciklama']:'' ?></textarea>
                </td>
            </tr>


            <tr><td colspan="2"><label style="background-color: white"><input type="checkbox" value="1" class="iade_checkbox" name="cekicikisfrm[iade]" <?php echo !empty($_XP['iade'])?'checked="checked"':'' ?> /> İADE : (Çıkış işlemini geriye iade olarak gerçekleştiriyor iseniz, bu seçeneği işaretleyiniz.</label></td></tr>
            <tr><th colspan="2"><input type="submit" value="Kaydet" tabindex="1" /></th></tr>
        </tbody></table>
    </div>
    <input type="hidden" name="git1" value="<?php echo !empty($git)?$git:'?s='.$syf.'&a=listele'; ?>" />

    <input type="hidden" name="cekicikisfrm[cikis]" value="<?php echo !empty($_XP['cikis'])?$_XP['cikis']:z(8,'cikistip'); ?>">

    <input type="hidden" name="cekicikisfrm[hamkumasstok_ID]" value="<?php echo z(8,'hamkumasstok_ID'); ?>">
    <?php if(z(8,'dokumasiparis_ID')){ ?>
    <input type="hidden" name="cekicikisfrm[dokumasiparis_ID]" value="<?php echo z(8,'dokumasiparis_ID')?z(8,'dokumasiparis_ID'):( !empty($_XP['dokumasiparis_ID'])?$_XP['dokumasiparis_ID']:'' ); ?>">
    <?php } else { ?>
    <input type="hidden" name="cekicikisfrm[boyatakipsiparis_ID]" value="<?php echo z(8,'boyatakipsiparis_ID')?z(8,'boyatakipsiparis_ID'):( !empty($_XP['boyatakipsiparis_ID'])?$_XP['boyatakipsiparis_ID']:'' ); ?>">
    <?php } ?>
    <?php /*/ ?>
    <input type="hidden" name="cekicikisfrm[iplikno_ID]" value="0">
    <input type="hidden" name="cekicikisfrm[lot]" value="">
    <input type="hidden" name="cekicikisfrm[form]" value="cikis">
    <?php if(!empty($IO['nesne_IDmarka'])){ ?>
        <input type="hidden" name="cekicikisfrm[nesne_IDmarka]" value="<?php echo $IO['nesne_IDmarka'] ?>">
    <?php } ?>
    <?php /*/ ?>
    
</form>