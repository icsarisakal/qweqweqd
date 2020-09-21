<?php
$tarihh=z('datetime');
$dd=strtotime($tarihh);
$gunn = date("D", $dd);
function guncek($gunno) { 
    switch ($gunno) { 
        case 'Mon': return 'Pzt'; break;
        case 'Tue': return 'Sal'; break;
        case 'Wed': return 'Crs'; break;
        case 'Thu': return 'Prs'; break; 
        case 'Fri': return 'Cum'; break;
        case 'Sat': return 'Cmt'; break;
        case 'Sun': return 'Pzr'; break;
    }
}
?>

<style type="text/css">
    .inptrh input{
        width:98% !important;
    }
    label{
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none;
        cursor: pointer;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $(".s1").hide();
        $(".s2").hide();
        $(".s3").hide();
        $(".toplu").hide();
        $("#teksefer").click(function(){
            $('.toplu').hide();
            $('.hatirlatmatarih').hide();
            $('.haftalik').show();
        });
        $("#haftalik").click(function(){
            $('.toplu').hide();
            $('.haftalik').hide();
            $('.hatirlatmatarih').show();
        });
        $("#aylik").click(function(){
            $('.toplu').hide();
            $('.haftalik').hide();
            $('.hatirlatmatarih').show();
        });
        $("#yillik").click(function(){
            $('.haftalik').hide();
            $('.toplu').hide();
            $('.hatirlatmatarih').show();
        });
        $hftici=0;
        $hftsonu=0;
        $hrgn=0;
        $(".s1").show();
        $("#standart").click(function(){
            $(".s1").show();
            $(".toplu").hide();
            $(".toplu input").val('');
        });
        $("#coklu").click(function(){
            $(".toplu").show();
            $(".s1").hide();
            $(".s2").hide();
            $(".s3").hide();
            $(".hatirlatmatarih input").val('');
            $(".s1 input[type ='radio']").prop('checked', false);
            $(".haftalik input[type ='radio']").prop('checked', false);
            $(".haftalik input[type ='checkbox']").prop('checked', false);
            $hftici=0;
            $hftsonu=0;
            $hrgn=0;
        });
        $("#teksefer, #aylik, #yillik").click(function(){
            $hftici=0;
            $hftsonu=0;
            $hrgn=0; 
            $(".s0").hide();
            $(".haftalik input[type ='radio']").prop('checked', false);
            $(".haftalik input[type ='checkbox']").prop('checked', false);
            $(".s2").show();
        });
        $("#haftalik").click(function(){
            $hftici=0;
            $hftsonu=0;
            $hrgn=0;
            $(".s0").hide();
            $(".hatirlatmatarih input").val('');
            $(".s3").show();
        });
        $("#hrgn").click(function(){
            if ($hrgn==0) {
                $(".haftalik input[type ='checkbox']").prop('checked', false);
                $(".haftalik input[type ='checkbox']").prop('checked', true);
                $hrgn=1;
                $hftici=0;
                $hftsonu=0;
            }
        });
        $("#hfti").click(function(){
            if ($hftici==0) {
                $(".haftalik input[type ='checkbox']").prop('checked', false);
                $(".hici input[type ='checkbox']").prop('checked', true);
                $hrgn=0;
                $hftici=1;
                $hftsonu=0;
            }
        });
        $("#hfts").click(function(){
            if ($hftsonu==0) {
                $(".hsonu input[type ='checkbox']").prop('checked', true);
                $(".hici input[type ='checkbox']").prop('checked', false);
                $hrgn=0;
                $hftici=0;
                $hftsonu=1;
            }
        });
        <?php if (z(8,'a')=='duzenle') { ?>
            <?php if(!empty($_X['secim'])&&$_X['secim']==1){
                echo '$(".s1").show();';
            } ?>
            <?php if(!empty($_X['secim'])&&$_X['secim']==2){
                echo '$(".toplu").show();
                $(".s1").hide();
                $(".s2").hide();
                $(".s3").hide();';
            } ?>
            <?php if(!empty($_X['tekrar'])&&$_X['tekrar']==1||$_X['tekrar']==3||$_X['tekrar']==4){?>
               $(".s2").show();
           <?php } ?>
           <?php if(!empty($_X['tekrar'])&&$_X['tekrar']==2){?>
            $(".s3").show();
        <?php } ?>
    <?php } ?>


        // Kimlere Gönderilsin Toplu Seçim
        $('.kimlere_gonderilsin_herkese').change(function(){
            if($(this).prop('checked')){
                $('.kimlere_gonderilsin').prop('checked',true);
            }
            else{
                $('.kimlere_gonderilsin').prop('checked',false);
            }
        });

        $('.persec').hide();
        $('.personellere').click(function(){
            $('.persec').show();
        });

        <?php if(!empty($_X['personelMulti'])){ ?>
            $('.persec').show();
        <?php } ?>

        // Gönderim Şekli SMS uyarısı
        $('input[name="<?php echo $tbl?>[bildirimSms]"]').change(function(e){
            e.preventDefault();
            if(confirm("Bildiri: Ücretli SMS tarifenizden tek seferde birden fazla mesaj gönderilebilir. Ayrıca hatırlatma mesajı bir kısa mesaja sığmayacak kadar uzun ise her kişi için birden fazla kısa mesaj gönderimi gerçekleşebilir.")){
                $(this).prop('checked',true);
            }
            else{
                $(this).prop('checked',false);
            }
        });
        
    });
</script>

<tr><th>Takvim Seçimi</th><td>    
    <label for="standart">
        <input type="radio" name="<?php echo $tbl?>[secim]" id="standart" value="1" <?php if(!empty($_X['secim'])&&$_X['secim']==1){echo 'checked';} ?> checked>
        Standart
    </label>
    <label for="coklu">
        <input type="radio" name="<?php echo $tbl?>[secim]" id="coklu" value="2" <?php if(!empty($_X['secim'])&&$_X['secim']==2){echo 'checked';} ?>>
        Çoklu Tarih Seçimi
    </label>
</td></tr>
<tr class="toplu"><th>Toplu Tarih</th><td class="inptrh"><?php slctrhflat($tbl.'[tarihMulti]',!empty($_X['tarihMulti'])?$_X['tarihMulti']:'')?></td></tr>
<tr class="s1"><th>Tekrar Periyodu</th><td>    
    <label for="teksefer">
        <input type="radio" name="<?php echo $tbl?>[tekrar]" id="teksefer" value="1" <?php if(!empty($_X['tekrar'])&&$_X['tekrar']==1){echo 'checked';} ?>>
        Tek Seferlik
    </label>
    <label for="haftalik">
        <input type="radio" name="<?php echo $tbl?>[tekrar]" id="haftalik" value="2" <?php if(!empty($_X['tekrar'])&&$_X['tekrar']==2){echo 'checked';} ?>>
        Haftalık
    </label>
    <label for="aylik">
        <input type="radio" name="<?php echo $tbl?>[tekrar]" id="aylik" value="3" <?php if(!empty($_X['tekrar'])&&$_X['tekrar']==3){echo 'checked';} ?>>
        Aylık
    </label>
    <label for="yillik">
        <input type="radio" name="<?php echo $tbl?>[tekrar]" id="yillik" value="4" <?php if(!empty($_X['tekrar'])&&$_X['tekrar']==4){echo 'checked';} ?>>
        Yıllık
    </label>
</td></tr>
<tr class="hatirlatmatarih s0 s2">
    <th>Hatırlatma Tarihi</th>
    <td class="inptrh"><?php slctrhsaat($tbl.'[tarihHatirlatici]',!empty($_X['tarihHatirlatici'])?$_X['tarihHatirlatici']:'')?></td>
</tr>
<tr class="haftalik s0 s3"><th>Haftalık</th><td>
    <label for="hrgn">
        <input type="radio" name="hftsec" value="hrgn" id="hrgn">
        Hergün
    </label>
    <label for="hfti">
        <input type="radio" name="hftsec" value="hfti" id="hfti">
        Hafta içi
    </label>
    <label for="hfts">
        <input type="radio" name="hftsec" value="hfts" id="hfts">
        Hafta sonu
    </label>
    <hr>
    <div class="hici">
        <?php if(z(8,'a')=='duzenle'){ ?>
            <?php if(!empty($_X['hftMulti'])){ ?>
                <?php $sorguhft=json_decode($_X['hftMulti'],1); ?>
            <?php } ?>
        <?php } ?>
        <label for="pzt">
            <input type="checkbox" name="<?php echo $tbl?>[hftMulti][]" value="pzt" id="pzt"  <?php if(!empty($_X['hftMulti'])&&in_array('pzt',$sorguhft)){echo 'checked';} ?> <?php if(z(8,'a')=='ekle'&&guncek($gunn)=='Pzt'){ echo 'checked'; } ?>>
            Pzt
        </label>
        <label for="sal">
            <input type="checkbox" name="<?php echo $tbl?>[hftMulti][]" value="sal" id="sal" <?php if(!empty($_X['hftMulti'])&&in_array('sal',$sorguhft)){echo 'checked';} ?> <?php if(z(8,'a')=='ekle'&&guncek($gunn)=='Sal'){ echo 'checked'; } ?>>
            Sal
        </label>
        <label for="crs">
            <input type="checkbox" name="<?php echo $tbl?>[hftMulti][]" value="crs" id="crs" <?php if(!empty($_X['hftMulti'])&&in_array('crs',$sorguhft)){echo 'checked';} ?> <?php if(z(8,'a')=='ekle'&&guncek($gunn)=='Crs'){ echo 'checked'; } ?>>
            Çar
        </label>
        <label for="prs">
            <input type="checkbox" name="<?php echo $tbl?>[hftMulti][]" value="prs" id="prs" <?php if(!empty($_X['hftMulti'])&&in_array('prs',$sorguhft)){echo 'checked';} ?> <?php if(z(8,'a')=='ekle'&&guncek($gunn)=='Prs'){ echo 'checked'; } ?>>
            Per
        </label>
        <label for="cum">
            <input type="checkbox" name="<?php echo $tbl?>[hftMulti][]" value="cum" id="cum" <?php if(!empty($_X['hftMulti'])&&in_array('cum',$sorguhft)){echo 'checked';} ?> <?php if(z(8,'a')=='ekle'&&guncek($gunn)=='Cum'){ echo 'checked'; } ?>>
            Cum
        </label>
        <label>
            <input type="text" name="<?php echo $tbl?>[tarihSaat]" class="jssaat" value="<?php if(!empty($_X['tarihSaat'])){ echo z('saat',$_X['tarihSaat']); } else { echo '';} ?>" autocomplete="off">
        </label>
    </div>
    <div class="hsonu"> 
        <label for="cmt">
            <input type="checkbox" name="<?php echo $tbl?>[hftMulti][]" value="cmt" id="cmt" <?php if(!empty($_X['hftMulti'])&&in_array('cmt',$sorguhft)){echo 'checked';} ?> <?php if(z(8,'a')=='ekle'&&guncek($gunn)=='Cmt'){ echo 'checked'; } ?> <?php if(!empty($gunsorgu)){ echo 'checked'; } ?>>
            Cmt
        </label>
        <label for="pzr">
            <input type="checkbox" name="<?php echo $tbl?>[hftMulti][]" value="pzr" id="pzr" <?php if(!empty($_X['hftMulti'])&&in_array('pzr',$sorguhft)){echo 'checked';} ?> <?php if(z(8,'a')=='ekle'&&guncek($gunn)=='Pzr'){ echo 'checked'; } ?>>
            Pzr
        </label>
    </div>
</td></tr>
<tr><th>Hatırlatıcının Açıklaması</th><td><textarea name="<?php echo $tbl?>[aciklama]" style="width:98%;"><?php echo !empty($_X['aciklama'])?$_X['aciklama']:''?></textarea></td></tr>







<tr>
    <th colspan="2">
        <hr>
        Hatırlatma Kimlere Gönderilsin?
        &nbsp;&nbsp;&nbsp;
        <label>
            Herkese
            <input type="radio" class="kimlere_gonderilsin_herkese" name="<?php echo $tbl?>[herkes]" value="1" <?php if(!empty($_X['herkes'])&&$_X['herkes']==1){echo 'checked';} ?>>
        </label>
        <label>
            Kendime
            <input type="radio" class="kimlere_gonderilsin_kendime" name="<?php echo $tbl?>[herkes]" value="2" <?php if(!empty($_X['herkes'])&&$_X['herkes']==2){echo 'checked';} ?>>
        </label>
        <label>
            Personel Seç
            <input type="radio" class="personellere" name="<?php echo $tbl?>[herkes]" value="3" <?php if(!empty($_X['herkes'])&&$_X['herkes']==3){echo 'checked';} ?>>
        </label>
    </th>
</tr>
<tr>
    <td colspan="2">

        <!-- Personel Departmanları -->
        <?php $_NesneDepartman=z(1,array('ad'=>'departman'),'ID,metin1','nesne'); ?>
        <?php if(!empty($_NesneDepartman))foreach ($_NesneDepartman as $departman) { ?>
            <label>
                <?php if(z(8,'a')=='duzenle'){ ?>
                    <?php if(!empty($_X['departman'])){ ?>
                        <?php $sorgudpt=json_decode($_X['departman'],1); ?>
                    <?php } ?>
                <?php } ?>
                <input type="checkbox" 
                class="kimlere_gonderilsin"
                name="<?php echo $tbl?>[gonderim][departman][]" 
                value="<?php echo $departman['ID']; ?>" 
                <?php if(!empty($_X['departman'])&&!empty($sorgudpt)&&in_array($departman['ID'],$sorgudpt)){echo 'checked';} ?> 
                >
                <?php echo $departman['metin1']; ?>
            </label>
        <?php } ?>
        <!-- Personel Departmanları SON -->

        <hr>


        <!-- Firma Tipleri -->
        <?php $_NesneFirmaTip=z(1,array('ad'=>'firmaTip'),'ID,metin1','nesne'); ?>
        <?php if(!empty($_NesneFirmaTip))foreach ($_NesneFirmaTip as $firmatip) { ?>
            <label>
                <?php if(z(8,'a')=='duzenle'){ ?>
                    <?php if(!empty($_X['firmaTip'])){ ?>
                        <?php $sorguft=json_decode($_X['firmaTip'],1); ?>
                    <?php } ?>
                <?php } ?>
                <input type="checkbox" 
                class="kimlere_gonderilsin"
                name="<?php echo $tbl?>[gonderim][firmaTip][]" 
                value="<?php echo $firmatip['ID']; ?>" 
                <?php if((!empty($_X['firmaTip'])&&!empty($sorguft))&&in_array($firmatip['ID'],$sorguft)){echo 'checked';} ?> 
                >
                <?php echo $firmatip['metin1']; ?>
            </label>
        <?php } ?>
        <!-- Firma Tipleri SON -->

        <hr>


        <!-- Rehber Grupları -->
        <?php $_NesneRehberGrup=z(1,array('ad'=>'rehberGrup'),'ID,metin1','nesne'); ?>
        <?php if(!empty($_NesneRehberGrup))foreach ($_NesneRehberGrup as $rehberGrup) { ?>
            <label>
                <?php if(z(8,'a')=='duzenle'){ ?>
                    <?php if(!empty($_X['rehberGrup'])){ ?>
                        <?php $sorgurg=json_decode($_X['rehberGrup'],1); ?>
                    <?php } ?>
                <?php } ?>
                <input type="checkbox" 
                class="kimlere_gonderilsin"
                name="<?php echo $tbl?>[gonderim][rehberGrup][]" 
                value="<?php echo $rehberGrup['ID']; ?>" 
                <?php if((!empty($_X['rehberGrup'])&&!empty($sorgurg))&&in_array($rehberGrup['ID'],$sorgurg)){echo 'checked';} ?> 
                >
                <?php echo $rehberGrup['metin1']; ?>
            </label>
        <?php } ?>
        <!-- Rehber Grupları SON -->
        <?php $sorgups=''; ?>
        <?php if(z(8,'a')=='duzenle'){ ?>
            <?php if(!empty($_X['personelMulti'])){ ?>
                <?php $sorgups=json_decode($_X['personelMulti'],1); ?>
            <?php } ?>
        <?php } ?>
        <div class="persec">
            <hr>
            <?php $personelcek=z(1,array('arsiv'=>0),'','personel'); ?>
            <h4>Personellere </h4>
            <select name="<?php echo $tbl; ?>[personelMulti][]" class="select2" multiple>
                <?php if(!empty($personelcek)){ foreach ($personelcek as $pcek) { ?>
                    <option value="<?php echo $pcek['ID']; ?>" <?php if(z(8,'a')=='duzenle'&&!empty($_X['personelMulti'])&&!empty($sorgups)&&!empty($pcek['ID'])&&in_array($pcek['ID'],$sorgups)){ echo 'selected';} ?> ><?php echo $pcek['ad'].' '.$pcek['soyad']; ?></option>
                <?php } } ?>
            </select>
        </div>


    </td>
</tr>

<tr>
    <th colspan="2"><hr>Gönderim Şekilleri</th>
</tr>
<tr>
    <td colspan="2">
        <label>
            <input type="checkbox" name="<?php echo $tbl?>[bildirimPanel]" value="1" <?php echo !empty($_X['bildirimPanel'])||!isset($_X['bildirimPanel'])?'checked="checked"':'' ?> >
            Panel Üzerinde Sesli Bildirim
        </label>

        <label>
            <input type="checkbox" name="<?php echo $tbl?>[bildirimEposta]" value="1" <?php echo !empty($_X['bildirimEposta'])||!isset($_X['bildirimEposta'])?'checked="checked"':'' ?> >
            E-Posta İle Bildirim
        </label>

        <label>
            <input type="checkbox" name="<?php echo $tbl?>[bildirimSms]" value="1" <?php echo !empty($_X['bildirimSms'])?'checked="checked"':'' ?> >
            SMS İle Bildirim
        </label>
    </td>
</tr>

<script type="text/javascript">

</script>