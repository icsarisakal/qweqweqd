
<?php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
<div id="ekleForm_<?php echo $ad?>" style="display:none">
<form action="sayfa/nesne/yonet_ajx.php?ekle=<?php echo $ad?>" class="ajaxNesneEkle" method="post">
    <table cellpadding="0" cellspacing="0">
        <?php foreach($n['alan2'] as $fei=>$fed){
            echo '<tr><th>'.$fed.'</th><td><input type="text" class="form-control" name="nesne['.$fei.']" tabindex="1"/></td></tr>';
        }?>
        <tr><th colspan="2" align="center"><input type="submit" class="form-control" value="KAYDET" /></th></tr>
    </table>
</form>
</div>
<?php }?>

<?php if(!empty($_NSN1))foreach($_NSN1 as $ad=>$n){?>
<div id="ekleForm_<?php echo $ad?>" style="display:none">
<form action="sayfa/nesne/yonet_ajx.php?ekle=<?php echo $ad?>" class="ajaxNesneEkle" method="post">
    <table cellpadding="0" cellspacing="0">
        <?php foreach($n['alan2'] as $fei=>$fed){
            echo '<tr><th>'.$fed.'</th><td><input type="text" class="form-control" name="nesne['.$fei.']" tabindex="1"/></td></tr>';
        }?>
        <tr><th colspan="2" align="center"><input type="submit" class="form-control" value="KAYDET" /></th></tr>
    </table>
</form>
</div>
<?php }?>

<?php if(!empty($_NSN2))foreach($_NSN2 as $ad=>$n){?>
<div id="ekleForm_<?php echo $ad?>" style="display:none">
<form action="sayfa/nesne/yonet_ajx.php?ekle=<?php echo $ad?>" class="ajaxNesneEkle" method="post">
    <table cellpadding="0" cellspacing="0">
        <?php foreach($n['alan2'] as $fei=>$fed){
            echo '<tr><th>'.$fed.'</th><td><input type="text" class="form-control" name="nesne['.$fei.']" tabindex="1"/></td></tr>';
        }?>
        <tr><th colspan="2" align="center"><input type="submit" class="form-control" value="KAYDET" /></th></tr>
    </table>
</form>
</div>
<?php }?>

<?php if(!empty($_NSN3))foreach($_NSN3 as $ad=>$n){?>
<div id="ekleForm_<?php echo $ad?>" style="display:none">
<form action="sayfa/nesne/yonet_ajx.php?ekle=<?php echo $ad?>" class="ajaxNesneEkle" method="post">
    <table cellpadding="0" cellspacing="0">
        <?php foreach($n['alan2'] as $fei=>$fed){
            echo '<tr><th>'.$fed.'</th><td><input type="text" class="form-control" name="nesne['.$fei.']" tabindex="1"/></td></tr>';
        }?>
        <tr><th colspan="2" align="center"><input type="submit" class="form-control" value="KAYDET" /></th></tr>
    </table>
</form>
</div>
<?php }?>

<?php if(!empty($_NSN4))foreach($_NSN4 as $ad=>$n){?>
<div id="ekleForm_<?php echo $ad?>" style="display:none">
<form action="sayfa/nesne/yonet_ajx.php?ekle=<?php echo $ad?>" class="ajaxNesneEkle" method="post">
    <table cellpadding="0" cellspacing="0">
        <?php foreach($n['alan2'] as $fei=>$fed){
            echo '<tr><th>'.$fed.'</th><td><input type="text" class="form-control" name="nesne['.$fei.']" tabindex="1"/></td></tr>';
        }?>
        <tr><th colspan="2" align="center"><input type="submit" class="form-control" value="KAYDET" /></th></tr>
    </table>
</form>
</div>
<?php }?>



<?php if(!empty($_NSN)){?>
<script type="text/javascript">
$(document).ready(function(e) {
	<?php foreach($_NSN as $ad=>$n){?>
	$(".nesneSlc_<?php echo $ad?>").change(function(e) {
        if($(this).val()=='yeni'){
			
			pencereAc("#ekleForm_<?php echo $ad?>");
			setTimeout(function(){
				$("#ekleForm_<?php echo $ad?> input:first").focus();
			},300);
		}
    });
	$('#ekleForm_<?php echo $ad?> form').ajaxForm(function(e) { 
		if(e>0){
			$(".nesneSlc_<?php echo $ad?>").append('<option value="'+e+'">'+<?php foreach($n['alan2'] as $fei=>$fed){?>$('#ekleForm_<?php echo $ad?> input[name="nesne[<?php echo $fei?>]"]').val()+' '+<?php }?>'</option>');
			$(".nesneSlc_<?php echo $ad?> option").attr('selected',false);
			$(".nesneSlc_<?php echo $ad?> option:last-child").attr('selected',true);
			<?php foreach($n['alan2'] as $fei=>$fed){?>$('#ekleForm_<?php echo $ad?> input[name="nesne[<?php echo $fei?>]"]').val('');<?php }?>
			pencereKapat();
		}
		else{
			alert('Ekleme başarısız, lütfen tekrar deneyiniz.');
		}
	});
    <?php }?>
});
</script>
<?php }?>

<?php if(!empty($_NSN1)){?>
<script type="text/javascript">
$(document).ready(function(e) {
	<?php foreach($_NSN1 as $ad=>$n){?>
	$(".nesneSlc_<?php echo $ad?>").change(function(e) {
        if($(this).val()=='yeni'){
			pencereAc("#ekleForm_<?php echo $ad?>");
			setTimeout(function(){
				$("#ekleForm_<?php echo $ad?> input:first").focus();
			},300);
		}
    });
	$('#ekleForm_<?php echo $ad?> form').ajaxForm(function(e) { 
		if(e>0){
			$(".nesneSlc_<?php echo $ad?>").append('<option value="'+e+'">'+<?php foreach($n['alan2'] as $fei=>$fed){?>$('#ekleForm_<?php echo $ad?> input[name="nesne[<?php echo $fei?>]"]').val()+' '+<?php }?>'</option>');
			$(".nesneSlc_<?php echo $ad?> option").attr('selected',false);
			$(".nesneSlc_<?php echo $ad?> option:last-child").attr('selected',true);
			<?php foreach($n['alan2'] as $fei=>$fed){?>$('#ekleForm_<?php echo $ad?> input[name="nesne[<?php echo $fei?>]"]').val('');<?php }?>
			pencereKapat();
		}
		else{
			alert('Ekleme başarısız, lütfen tekrar deneyiniz.');
		}
	});
    <?php }?>
});
</script>
<?php }?>

<?php if(!empty($_NSN2)){?>
<script type="text/javascript">
$(document).ready(function(e) {
	<?php foreach($_NSN2 as $ad=>$n){?>
	$(".nesneSlc_<?php echo $ad?>").change(function(e) {
        if($(this).val()=='yeni'){
			pencereAc("#ekleForm_<?php echo $ad?>");
			setTimeout(function(){
				$("#ekleForm_<?php echo $ad?> input:first").focus();
			},300);
		}
    });
	$('#ekleForm_<?php echo $ad?> form').ajaxForm(function(e) { 
		if(e>0){
			$(".nesneSlc_<?php echo $ad?>").append('<option value="'+e+'">'+<?php foreach($n['alan2'] as $fei=>$fed){?>$('#ekleForm_<?php echo $ad?> input[name="nesne[<?php echo $fei?>]"]').val()+' '+<?php }?>'</option>');
			$(".nesneSlc_<?php echo $ad?> option").attr('selected',false);
			$(".nesneSlc_<?php echo $ad?> option:last-child").attr('selected',true);
			<?php foreach($n['alan2'] as $fei=>$fed){?>$('#ekleForm_<?php echo $ad?> input[name="nesne[<?php echo $fei?>]"]').val('');<?php }?>
			pencereKapat();
		}
		else{
			alert('Ekleme başarısız, lütfen tekrar deneyiniz.');
		}
	});
    <?php }?>
});
</script>
<?php }?>

<?php if(!empty($_NSN3)){?>
<script type="text/javascript">
$(document).ready(function(e) {
	<?php foreach($_NSN3 as $ad=>$n){?>
	$(".nesneSlc_<?php echo $ad?>").change(function(e) {
		
        if($(this).val()=='yeni'){
			pencereAc("#ekleForm_<?php echo $ad?>");
			setTimeout(function(){
				$("#ekleForm_<?php echo $ad?> input:first").focus();
			},300);
		}
    });
	$('#ekleForm_<?php echo $ad?> form').ajaxForm(function(e) { 
		if(e>0){
			$(".nesneSlc_<?php echo $ad?>").append('<option value="'+e+'">'+<?php foreach($n['alan2'] as $fei=>$fed){?>$('#ekleForm_<?php echo $ad?> input[name="nesne[<?php echo $fei?>]"]').val()+' '+<?php }?>'</option>');
			$(".nesneSlc_<?php echo $ad?> option").attr('selected',false);
			$(".nesneSlc_<?php echo $ad?> option:last-child").attr('selected',true);
			<?php foreach($n['alan2'] as $fei=>$fed){?>$('#ekleForm_<?php echo $ad?> input[name="nesne[<?php echo $fei?>]"]').val('');<?php }?>
			pencereKapat();
		}
		else{
			alert('Ekleme başarısız, lütfen tekrar deneyiniz.');
		}
	});
    <?php }?>
});
</script>
<?php }?>


<?php if(!empty($_NSN4)){?>
<script type="text/javascript">
$(document).ready(function(e) {
	<?php foreach($_NSN4 as $ad=>$n){?>

	$(".nesneSlc_<?php echo $ad?>").change(function(e) {
		
        if($(this).val()=='yeni'){
			pencereAc("#ekleForm_<?php echo $ad?>");
			setTimeout(function(){
				$("#ekleForm_<?php echo $ad?> input:first").focus();
			},300);
		}
    });

	$('#ekleForm_<?php echo $ad?> form').ajaxForm(function(e) { 
		if(e>0){
			$(".nesneSlc_<?php echo $ad?>").append('<option value="'+e+'">'+<?php foreach($n['alan2'] as $fei=>$fed){?>$('#ekleForm_<?php echo $ad?> input[name="nesne[<?php echo $fei?>]"]').val()+' '+<?php }?>'</option>');
			$(".nesneSlc_<?php echo $ad?> option").attr('selected',false);
			$(".nesneSlc_<?php echo $ad?> option:last-child").attr('selected',true);
			<?php foreach($n['alan2'] as $fei=>$fed){?>$('#ekleForm_<?php echo $ad?> input[name="nesne[<?php echo $fei?>]"]').val('');<?php }?>
			pencereKapat();
		}
		else{
			alert('Ekleme başarısız, lütfen tekrar deneyiniz.');
		}
	});
    <?php }?>
});
</script>
<?php }?>


<?php $sayideger=0; if(!empty($nesnemarka))foreach($nesnemarka as $ad2=>$n){ if($sayideger==0){ ?>
<div id="ekleForm_iplikMarka" style="display:none">
<form action="sayfa/nesne/yonet_ajx.php?ekle=iplikMarka" class="ajaxNesneEkle" method="post">
    <table cellpadding="0" cellspacing="0">
		<tr><th>Marka Adı</th><td class="yenimarkatd"><input type="text" class="yenimarka" name="nesne[metin1]" tabindex="1"><input type="hidden" name="nesne[ad]" tabindex="1" value="iplikMarka"></td></tr>
        <tr><th colspan="2" align="center"><input type="submit" value="KAYDET" /></th></tr>
    </table>
</form>
</div>
<?php $sayideger++; } }?>



<?php if(!empty($nesnemarka)){?>
<script type="text/javascript">
$(document).ready(function(e) {
	<?php foreach($nesnemarka as $ad2=>$n){?>
	$(".yenimarka").click(function(e) {
		pencereAc("#ekleForm_iplikMarka");
		setTimeout(function(){
			$("#ekleForm_iplikMarka input:first").focus();
		},300);
    });
	$('#ekleForm_iplikMarka form').ajaxForm(function(e) { 
		console.log(e);
		if(e>0){
			var yenimarka=$(".yenimarkatd input").val();
			$(".markalar").append('<input type="checkbox" id="marka'+e+'" name="tedarikci[markalar][]" value="'+e+'"><label for="marka'+e+'">'+yenimarka+'</label><br>');
			pencereKapat();
			$(".yenimarkatd input").val('');
		}
		else{
			alert('Ekleme başarısız, lütfen tekrar deneyiniz.');
		}
	});
    <?php }?>
	$(document).click(function(e) {
		if (!$(e.target).is('.pencere, .yenimarka *')) {
			//$(".pencere").hide();
			$("#pencereBg").remove();
		}
	});
	$(".yenimarka").click(function() {
		$(".pencere").show();
	});
});
</script>
<?php }?>