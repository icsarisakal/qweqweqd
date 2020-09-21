<style type="text/css">
	.genelblok{
		width: 100%;
		height: auto;
		float: left;
		box-sizing: border-box;
	}
	.genelblok2{
		margin:10px;
		box-sizing: border-box;
	}
	.parcablok{
		background: #fff;
		display: block;
		float: left;
		border-radius: 10px;
		border: 0.2px solid #0000009c;
		width: 100%;
		margin-bottom: 10px;
		overflow: hidden;
		-webkit-box-shadow: 0 4px 5px #777;
		-moz-box-shadow: 0 4px 5px #777;
		box-shadow: 0 4px 5px #777;
		color: #000;
	}
	.metinblok{
		width: 100%;
		float: left;
		padding: 8px;
		padding-left: 10px;
		letter-spacing: 0.5px;
		box-sizing: border-box;
	}
	.gelecekhatirlatma{
		background: #fffa65;
		font-weight: bold;
		font-size: 9px;
		border-top: 0.2px solid #000000;
		width: 100%;
		height: auto;
		overflow: hidden;
		padding: 3px 6px 3px 10px;
	}
	.gecmishatirlatma{
		background: #ff4d4d;
		color: white;
		font-size: 9px;
		border-top: 0.2px solid #000000;
		width: 100%;
		height: auto;
		overflow: hidden;
		padding: 3px 6px 3px 10px;
	}
	.topluhatirlatma{
		background: #3c40c6;
		color: white;
		font-size: 9px;
		border-top: 0.2px solid #000000;
		width: 100%;
		height: auto;
		overflow: hidden;
		padding: 3px 6px 3px 10px;
	}

	.toplutarih{
		background: #ffa801;
		color: white;
		font-size: 9px;
		border-top: 0.2px solid #000000;
		width: 100%;
		height: auto;
		overflow: hidden;
		padding: 3px 6px 3px 10px;
	}

	.haftatarih{
		background: #0fbcf9;
		color: white;
		font-size: 9px;
		border-top: 0.2px solid #000000;
		width: 100%;
		height: auto;
		overflow: hidden;
		padding: 3px 6px 3px 10px;
	}
	.genelmodal{
		position: absolute;
		width: 90%;
		left: 2%;
		top: 10%;
		background: transparent;
		z-index: 1;
	}
	.genelmodal .blok{
		width: 100%;
		box-shadow: 0 0 10px 1px #736c6c;
	}
	.genelmodal table{
		width: 100%;
	}
	.genelkarart{
		background: black;
		opacity: 0.8;
		position: fixed;
		left: 0px;
		right: 0px;
		top: 0px;
		bottom: 0px;
	}
</style>
<script type="text/javascript">
	var mclick=0;
	$(document).ready(function(){
		$(".genelmodal").hide();
		$(".genelkarart").hide();
		$(".blok").hide();
	});
	$(document).click(function(e) {
		if (!$(e.target).is('.modulac, .genelmodal, .genelform, .blok *')) {
			$(".genel-form").hide();
			$(".genelkarart").hide();
			$(".blok").hide();
			var mclick=1;
		}
	});
	$(document).ready(function(){
		$(".btniptal").click(function() {
			$(".genelkarart").hide();
			$(".genel-form").hide();
			$(".blok").hide();
			var mclick=1;
		});
		if(mclick=1){
			$(".modulac").click(function(){
				$(".genelmodal").show();
				$(".genel-form").show();
				$(".genelkarart").show();
				$(".blok").show();
				var mclick=0;
			});
		}
	});
</script>
<div class="genelblok">
	<div class="genelblok2">
		<button class="modulac">Modülü Aç</button>
		<?php $mustericek=z(1,'','',$tbl);
		$_Firma=z(37,z(1,"WHERE arsiv<>'-1' AND ".z(38,$mustericek,'firma_ID'),'ID,ad','firma'));
		if(!empty($mustericek)){
			foreach ($mustericek as $mc) { ?>
				<a href="./?s=<?php echo $tbl; ?>&a=duzenle&id=<?php if(!empty($mc['ID'])){echo $mc['ID'];} ?>">
					<div class="parcablok">
						<div class="metinblok">
							<?php if(!empty($mc['ad'])){echo $mc['ad'];} ?><br>
							<?php if(!empty($mc['aciklama'])){echo $mc['aciklama'];} ?><br>
							<?php echo (!empty($_Firma[$mc['firma_ID']]['ad'])?$_Firma[$mc['firma_ID']]['ad']:'&nbsp;').
							(!empty($_Firma[$mc['firma_ID']]['ilgili'])?' / '.$_Firma[$mc['firma_ID']]['ilgili']:'&nbsp;'); ?><br>
						</div>
					</a>
					<?php
					$tablohatirlatici=$mc['hatirlaticilar'];
					$tablohtex=explode(',', $tablohatirlatici);
					$tablosayi=count($tablohtex);
					$suankitarihsaat=z('datetime');
					$suankitarih=z('date');

					if($tablosayi>1){ ?>
						<a href="<?php echo "?s=".$tbl."&a=hatirlatici-detay&id=".$mc['ID']; ?>"><div class="topluhatirlatma">Bu bilgiye birden fazla hatırlatma eklenmiş.</div></a>
					<?php } else {
						$htconn=z(1,$tablohatirlatici,'','hatirlatici');
						$htrht=$htconn['tarihHatirlatici'];
						$veriyolla='';
						$vericlass='';
						if(!empty($htrht)&&$htrht<$suankitarihsaat){
							$veriyolla="Bu bilginin ".$htrht." tarihinde hatırlatması mevcuttur.";
							$vericlass='gecmishatirlatma';
						} else if(!empty($htrht)&&$htrht>$suankitarihsaat){
							$veriyolla="Bu bilginin ".$htrht." tarihinde hatırlatması mevcuttur.";
							$vericlass='gelecekhatirlatma';
						} else if(!empty($htconn['tarihMulti'])){
							$veriyolla="Bu bilginin ".$htconn['tarihMulti']." tarihlerinde hatırlatması mevcuttur.";
							$vericlass='toplutarih';
						} else if(!empty($htconn['hftMulti'])){
							$veriyolla="Bu bilginin ".$htconn['hftMulti']." günleri hatırlatması mevcuttur.";
							$vericlass='haftatarih';
						}
						?>
						<a href="<?php echo "?s=".$tbl."&a=hatirlatici-detay&id=".$mc['ID']; ?>"><div class="<?php echo $vericlass; ?>"><?php echo $veriyolla; ?></div></a>
					<?php } ?>
				</div>
			<?php } ?>
		<?php } else {
			echo '<h1>Veri eklenmemiş veya bulunamadı.</h1>';
		} ?>
	</div>
</div>
<div class="genelmodal">
	<div class="genelform">
		<form action="?s=<?php echo $syf ?>&a=ekle" method="post" id="<?php echo $syf ?>_ekle">
			<div class="blok">
				<table cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<th colspan="2">MÜŞTERİ TAKİP EKLE</th>
						</tr>
						<?php require(__DIR__.'/ekle_prc.php'); ?>
						<?php /*/ ?>
						<tr><th colspan="2"><a href="javascript:pencereKapat('#<?php echo $syf ?>_ekle')" class="btn btniptal">İptal</a><input type="submit" value="Kaydet" /></th></tr>
						<?php /*/ ?>

					</tbody>
				</table>
			</div>
		</form>
	</div>
</div>
<div class="genelkarart"></div>