<tr>
	<th>Firma Adı</th><td><input type="text" name="<?php echo $tbl?>[ad]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['ad'])?$_X['ad']:''?>" /></td>
</tr>
<?php if(!empty($_OZNSN))foreach($_OZNSN as $ad=>$n){?>
	<tr><th><?php echo $n['ad']?></th><td><?php echo select(Array('name'=>$tbl.'['.$ad.']','detay'=>'class="nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'sayi1,'.$n['alan'], 'value'=>'sayi1', 'sd'=>"WHERE ad='".$ad."' ORDER BY sayi1",'icerik'=>''/*'<option value="">Seçiniz</option>'*/,'sec'=>!empty($_X[''.$ad])?$_X[''.$ad]:0))?></td></tr>
<?php }?>
<tr><th>Bölge</th><td>
	<select name="<?php echo $tbl; ?>[bolge_ID]" class="select2" id="select1">
		<option value="0">&nbsp;</option>
		<option value="1" <?php if(!empty($_X['bolge_ID'])&&$_X['bolge_ID']==1){ echo 'selected';} ?>>Akdeniz</option>
		<option value="2" <?php if(!empty($_X['bolge_ID'])&&$_X['bolge_ID']==2){ echo 'selected';} ?>>Ege</option>
		<option value="3" <?php if(!empty($_X['bolge_ID'])&&$_X['bolge_ID']==3){ echo 'selected';} ?>>Marmara</option>
		<option value="4" <?php if(!empty($_X['bolge_ID'])&&$_X['bolge_ID']==4){ echo 'selected';} ?>>Karadeniz</option>
		<option value="5" <?php if(!empty($_X['bolge_ID'])&&$_X['bolge_ID']==5){ echo 'selected';} ?>>İç Anadolu</option>
		<option value="6" <?php if(!empty($_X['bolge_ID'])&&$_X['bolge_ID']==6){ echo 'selected';} ?>>Doğu Anadolu</option>
		<option value="7" <?php if(!empty($_X['bolge_ID'])&&$_X['bolge_ID']==7){ echo 'selected';} ?>>Güneydoğu Anadolu</option>
	</select>
</td></tr>
<script type="text/javascript">
    $(document).ready(function(){
        $('#sehirler').hide();
        $('.ilgilibilgi').hide();
        <?php if(!empty($_X['bolge_ID'])){?>
            var bolge_id = <?php echo $_X['bolge_ID']; ?>;
        <?php } ?>
        $('#select1').change(function() {
            var bolge_id = select1.options[select1.selectedIndex].value;
            $.ajax({
                type:"POST",
                url:"ajaxayar.php?s=firma&a=bolgelist&bolge="+bolge_id,
                success:function(gelensorgu){
                    if(gelensorgu.sonuc==1){
                        //console.log(gelensorgu.cevap.bolge);
                        var sehir=gelensorgu.cevap.bolge;
                        if(sehir!=null){
                            $('#select2 option').remove();
                            $('#sehirler').show();
                            $.each(sehir, function(k, v) {
                                $('<option>').val(v.sehir_ID).text(v.sehir_ad).appendTo('#select2');
                            });
                        }
                    } else {
                        alert('İlçe okuma başarısız');
                    }
                }
            });
        });
        <?php if(!empty($_X['sehir_ID'])){?>
            $('#sehirler').show();
        <?php } ?>
    });
</script>
<tr id="sehirler">
    <th>Şehir</th>   
    <td>
        <select name="<?php echo $tbl; ?>[sehir_ID]" class="select2" id="select2">
            <?php if(!empty($_X['sehir_ID'])){?>
                <?php
                $ilcecek=z(1,array('bolge_ID'=>$_X['bolge_ID']),'','bolge');
                foreach ($ilcecek as $ic) { ?>
                    <option value="<?php echo $ic['sehir_ID']; ?>" <?php if(!empty($_X['sehir_ID'])&&$_X['sehir_ID']==$ic['sehir_ID']){echo 'selected';} ?> ><?php echo $ic['sehir_ad']; ?></option>
                <?php }
            } ?> 
        </select>
    </td>
</tr>
<tr><th>Telefon</th><td><input type="text" name="<?php echo $tbl?>[tel]" value="<?php echo !empty($_X['tel'])?$_X['tel']:''?>" /></td></tr>
<tr><th>Fax</th><td><input type="text" name="<?php echo $tbl?>[fax]" value="<?php echo !empty($_X['fax'])?$_X['fax']:''?>" /></td></tr>
<tr><th>E-Posta</th><td><input type="email" name="<?php echo $tbl?>[eposta]" value="<?php echo !empty($_X['eposta'])?$_X['eposta']:''?>" /></td></tr>
<tr><th>Vergi Dairesi</th><td><input type="text" name="<?php echo $tbl?>[vergiD]" value="<?php echo !empty($_X['vergiD'])?$_X['vergiD']:''?>" /></td></tr>
<tr><th>Vergi No</th><td><input type="text" name="<?php echo $tbl?>[vergiNo]" value="<?php echo !empty($_X['vergiNo'])?$_X['vergiNo']:''?>" /></td></tr>
<tr><th>Fatura Adresi</th><td><textarea name="<?php echo $tbl?>[adresFatura]"><?php echo !empty($_X['adresFatura'])?$_X['adresFatura']:''?></textarea></td></tr>
<tr><th>Sevk Adresi</th><td><textarea name="<?php echo $tbl?>[adresSevk]"><?php echo !empty($_X['adresSevk'])?$_X['adresSevk']:''?></textarea></td></tr>
<tr><th>Kayit Tarihi</th><td><?php slctrh($tbl.'[tarihKayit]',!empty($_X['tarihKayit'])?$_X['tarihKayit']:z('datetime'))?></td></tr>
<tr class="kisiler"></tr>
<tr><th colspan="2"><a href="?s=<?php echo $tbl.'&a=listele'; ?>" class="btn" style="padding-top: 0px;margin-top: 4px;">İptal</a><input type="submit" value="Kaydet" /></th></tr>