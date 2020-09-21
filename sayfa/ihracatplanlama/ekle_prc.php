<?php  
       $kumasKartiData = z(1,'WHERE arsiv=0 AND revize_ID=0','','kumaskarti');
        
?>
<div class="form-group row">
    <label class="col-lg-3 col-form-label"> Ürün Adı</label>
    <div class="col-lg-9">
        <select class="urunadi form-control select2 select-search"name="<?php echo $tbl?>[urunAdi]">
            <option value="0">Seçiniz</option>
            <?php foreach ($kumasKartiData as $key => $kumasName) {?>
                    <option value=<?php echo $kumasName['ID'] ?>><?php echo $kumasName['ismi'].' / '.$kumasName['article'];?> </option>
            <?php } ?>
        </select>
    </div>
</div>

<div hidden class="form-group row">
    <label class="col-lg-3 col-form-label">Pus Seçimi</label>
    <div class="pusdiv col-lg-9">
    
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label"> Koli</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[koli]" autofocus="autofocus" value="<?php echo !empty($_X['koli'])?$_X['koli']:''?>" autocomplete="off">
    </div>
</div>
<div class="form-group row">
    <label class="col-lg-3 col-form-label"> Ebat</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[ebat]" autofocus="autofocus" value="<?php echo !empty($_X['ebat'])?$_X['ebat']:''?>" autocomplete="off">
    </div>
</div>

<!-- <div class="artandiv form-group row">
    <label class="notclone col-lg-2 col-form-label">
    <span class="btnas btn btn-success divarttir" style="font-size:70%; cursor:pointer;">Arttır</span>
    <span class="btnas btn btn-danger divazalt" style="font-size:70%; cursor:pointer;">Sil</span>
    </label>
    <span><input type="checkbox" style="width:50px;" class="form-control silinecekurundiv"></span></div> -->

<div style="float:right;" class="d-flex flex-row mb-4">
    <table style="float:left; width:10%;"> 
        <tbody>
            <tr>
                <th>Ürün Adı</th>
                <th>Ebat/Koli</th>
            </tr>

            <tr>
                <td class="urunaditd"></td>
                <td><b>1PERSOON (28x38x41) </b></td>
            </tr>
        </tbody>
    </table>

<table style="float:left; width:70%;">
    <tbody>
    <tr>
        <th>##</th>
        <th>
        &nbsp;<span class="btnas btn btn-success trarttir" style="font-size:70%; cursor:pointer;">Arttır</span>
        <span class="btnas btn btn-danger trazalt" style="font-size:70%; cursor:pointer;">Sil</span>
        </th>
        <th>Adet</th>
        <th>Palet</th>
        <th>Koli</th>
        <th>Boyalı Kumaş Miktarı</th>
        <th>Ham Kumaş Miktarı</th>
       
    </tr>

    <tr class="artantr">
    
        <td>
            <input type="checkbox" style="width:25px;" class="form-control silinecektr">
        </td>

        <td>
            <select class="form-control select2 select-search"name="<?php echo $tbl?>[renkler]">
                <option value="0">Renk Seçiniz</option>
            </select>
        </td>

        <td>        
            <input style="width:60px;" type="number" class="form-control" tabindex="1" name="<?php echo $tbl?>[adet]" autofocus="autofocus" value="<?php echo !empty($_X['adet'])?$_X['adet']:''?>" autocomplete="off">
        </td>

        <td class="palet">
            <span>--</span>
        </td>

        <td class="koli">
            <span>--</span>
        </td>

        <td class="boyalikumasmiktari"> 
            <span>--</span>
        </td>
                
        <td class="hamkumasmiktari"> 
            <span>--</span>
        </td>

    </tr>
    </tbody>
</table>

<table style="float:left; width:15%;"> 
    <tbody>
        <tr>
            <th>NET GRMJ</th>
            <th>M³</th>
            <th>KESİM ÖLÇÜLERİ</th>
        </tr>
        <tr>
            <td><b>1260</b></td>
            <td><b>4,536896</b></td>
            <td><b>EN: 185cm - BOY: 275cm - KÖŞE: 50cm</b></td>
        </tr>
    </tbody>
</table>

</div>
<br><br>
<div class="form-group row">
    <label class="col-lg-3 col-form-label">Kayit Tarihi</label>
    <div class="input-group col-lg-9">
        <span class="input-group-prepend">
            <span class="input-group-text"><i class="icon-calendar22"></i></span>
        </span>
        <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarihKayit]" value="<?php echo !empty($_X['tarihKayit'])?$_X['tarihKayit']:z('datetime')?>">
    </div>
</div>


<script>

$(".trarttir").click(function(){
    var cloneMytr = $(".artantr:eq(0)").clone();
    $(".artantr:eq(0)").after(cloneMytr);
    $(".artantr:eq(0) .notclone").remove();
});

$(".trazalt").click(function(){
        $('.silinecektr').each(function(iham, objham){
            if(iham!=0){
                var chekinboksusayi=$('.silinecektr').length;
                if(objham.checked&&chekinboksusayi>1){
                    $(objham).parent().parent().remove();
                }
                if(objham.checked&&chekinboksusayi==1){
                    alert("Son kalan veriyi silemezsiniz");
                }
            }

        });
    });

    $(".urunadi").change(function(){
         $("input[type=radio]").remove();
         $("span[class=spanpus]").remove();
     var kumasKarti_ID = $('.urunadi').val();
     var kumasKarti_txt = $('.urunadi option:selected').text();
     var urunaditd = kumasKarti_txt;
     $(".urunaditd").text(urunaditd);
     var pus = [];
     var radiobutton = [];
     console.log(kumasKarti_ID);
    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=ihracatplanlama&a=ajaxsorgu&kumas_ID="+kumasKarti_ID,
        success:function(gelensorgu){
          pus = gelensorgu.cevap.pus[128];
          console.log(pus);
          if(pus!='undefined'){
              $.each(pus,function(index){
             radiobutton[index] = "<span class='spanpus'>"+pus[index]+"</span>"+"<input class='pusradio' type='radio' value="+pus[index]+" name=ihracatplanlama[pus]> ";
             $(".pusdiv").parent().removeAttr("hidden");
              $(".pusdiv").append(radiobutton[index]);
              });
             
          }
        }
    });
});

$(".pusradio").change(function(){
    // urunaditd+=$(".pusradio").val();
    //  $(".urunaditd").text().append($(".pusradio").val());
    console.log("nbr");
});


</script>