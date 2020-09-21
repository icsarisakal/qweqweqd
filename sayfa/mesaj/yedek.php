
<!--ekle_prc.php içinden alındı-->


<tr><th>Resim</th><td><input type="file" class="form-control" name="<?php echo $tbl; ?>[img]" accept="image/x-png,image/gif,image/jpeg" style="position: relative; width:100%; left: 0px; visibility:visible;"><?php /* bu satırdaki kodda resim olup olmkonuıgı sorguluyor yani kısacası sorgulama yaptırıyoruz.*/ ?>
<?php  if(!empty($_X['img'])){ ?><?php /* bu alanda ekleme sayfasına eklediğimiz resmi veya */?>
    <img src="upload/kumaskarti/<?php echo $_X['img'];?>" class="prcimg"><?php /* ?>fotografı görmek için yazılan koddur*/?> 
    <span style="float:left;"><?php echo $_X['img'];?></span>
<?php } ?>

<!--ekle_prc.php içinden alındı-->

<div class="form-group row">
    <label class="col-lg-3 col-form-label">Kayit Tarihi</label>
    <div class="input-group col-lg-9">
        <span class="input-group-prepend">
            <span class="input-group-text"><i class="icon-calendar22"></i></span>
        </span>
        <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarih]" value="<?php echo !empty($_X['tarih'])?$_X['tarih']:''?>">
    </div>
</div>

<!--modal content baslangic-->

<div class="container">
  <h2>Basic Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<!--modal content bitis-->