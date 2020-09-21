<tr><th>Resim</th><td><input type="file" class="form-control" name="<?php echo $tbl; ?>[img]" accept="image/x-png,image/gif,image/jpeg" style="position: relative; width:100%; left: 0px; visibility:visible;"><?php /* bu satırdaki kodda resim olup olmadıgı sorguluyor yani kısacası sorgulama yaptırıyoruz.*/ ?>
<?php  if(!empty($_X['img'])){ ?><?php /* bu alanda ekleme sayfasına eklediğimiz resmi veya */?>
    <img src="upload/kumaskarti/<?php echo $_X['img'];?>" class="prcimg"><?php /* ?>fotografı görmek için yazılan koddur*/?> 
    <span style="float:left;"><?php echo $_X['img'];?></span>
<?php } ?>
if(!empty($iplkler['elyaf'])){
            $elyafcek=$iplkler['elyaf'];
            $elyafarray=(!empty($iplkler['elyaf'])?json_decode($iplkler['elyaf'],1):'');
            if(!empty($elyafarray)){
                $elyafarray=str_replace('puan','',$elyafarray);
            }
            if(!empty($elyafarray)){
                foreach($elyafarray as $i => $elyf){
                    $elyafnesne=(!empty($_Nesneiplik[$i]['metin1'])?$_Nesneiplik[$i]['metin1']:'&nbsp;');
                    $elyafmetin.='%'.$elyf.' '.$elyafnesne.' '; 
                } 
            }  
        }

        <div class="form-group row">
    <label class="col-lg-3 col-form-label"> Kompozisyon</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[nesne_IDkumasTipi]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['agirlik'])?$_X['agirlik']:''?>" autocomplete="off">
    </div>
</div>


