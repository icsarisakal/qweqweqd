<?Php
if(z(8,'id')||z(8,'kod')){
$ID=z(8,'id');
if(z(8,'kod'))$ID=z(34,z(8,'kod'),1);

$_X=z(1,$ID,NULL,$tbl);
if(!empty($_X)){
$_Y=z(1,NULL,NULL,'personel');if(!empty($_Y))foreach($_Y as $y)$_P[$y['ID']]=$y;
$ytkl=ytk($syf,'duzenle');
if($admn||$ytkl||$_X['personel_ID']==z('lgn','ID')){
	$_Y=z(1,NULL,NULL,'nesne');if(!empty($_Y))foreach($_Y as $y)$_Nesne[$y['ID']]=$y;
	z(6,$tbl);
	if(empty($_X['durum'])&&$_X['personel_ID']!=z('lgn','ID'))z(3,$ID,array('durum'=>1,'tarihDurum'=>z('datetime')));
	else if($_X['durum']==2&&$_X['personel_ID']==z('lgn','ID'))z(3,$ID,array('durum'=>3,'tarihDurum'=>z('datetime')));
	if(z(7,'mesaj')){
		if(z(2,array(
			'destek_ID'=>$ID,
			'personel_ID'=>z('lgn','ID'),
			'tarih'=>z('datetime'),
			'ip'=>z('sw','REMOTE_ADDR'),
			'mesaj'=>z(7,'mesaj')
		),$tbl.'mesaj')){
			z(33,'cevap',1);
			z(6,$tbl);
			z(3,$ID,array('durum'=>($_X['personel_ID']==z('lgn','ID')?0:2),'tarihDurum'=>z('datetime')));
			header('Location: ?s='.$tbl.'&a=detay&id='.$ID);die;
		}
	}
	
?>
<style type="text/css">
#mesajBox{ width:640px; margin:auto; margin-top:1px; background-color:#eee; padding:4px; border:1px solid #aaa; border-radius:8px;}
#mesajBox #mesajBaslik{ padding:4px; margin:4px; border-radius:4px; font-size:18px; font-weight:bold;}
#mesajBox .bilgilendirme,#mesajBox .kutu{ padding:4px; margin:4px 4px 10px 4px; border:1px solid #aaa; border-radius:4px; background-color:#fff;}
#mesajBox #mesajlar{}
#mesajBox #mesajlar .mesaj{ padding:4px; margin:4px; border:1px solid #aaa; border-radius:6px; background-color:#ddd;}
#mesajBox #mesajlar .mesaj .yazan{ padding:2px;font-weight:bold;}
#mesajBox #mesajlar .mesaj .micerik{ padding:8px; background-color:#fff; border-radius:inherit; border:1px solid #bbb;}
#mesajBox #mesajlar .mesaj .mtarih{ padding:2px; text-align:right; color:#444;}
#mesajBox #mesajlar .mesaj .mimza{ padding:4px 2px 2px 2px;color:#444; border-top:1px solid #eee;}

#mesajBox #cevapForm,#mesajBox #devretForm,#mesajBox #tamamlaForm{ padding:4px; margin:10px 4px 4px 4px; border:1px solid #aaa; border-radius:4px; background-color:#ddd;}
#mesajBox #cevapForm .txtDiv{ display:inline-block; width:498px;}
#mesajBox #cevapForm .txtDiv textarea{ width:100%; height:120px; border:#bbb solid 1px;}
#mesajBox #cevapForm .subDiv{ text-indent:8px; display:inline-block;}
#mesajBox #cevapForm .subDiv input{ width:110px; height:64px; border:#bbb solid 1px;}
</style>
<div class="sayfa">
    <div class="baslik"><h3><?Php echo $_Nesne[$_X['nesne_IDddepartman']]['metin1'].' -> '.$_X['baslik']?></h3></div>
    <div class="icerik">
    	<?Php switch(z(33,'ekle')){
			case 1:_uyr(1,'Destek talebiniz başarıyla oluşturuldu. Yetkili personel en kısa zamanda size dönüş yapacaktır. Dilerseniz bu sayfadan ayrılabilirsiniz.');break;
		}switch(z(33,'cevap')){
			case 1:_uyr(1,'Mesaj gönderildi.');break;
		}?>
        <div id="mesajBox">
            <div id="mesajBaslik"><?Php echo $_X['baslik']?></div>
			<div class="bilgilendirme">Destek talebiniz işleme alındı. En kısa zamanda size dönüş yapılacaktır.</div>
            <div id="mesajlar">
                <?Php require(__DIR__.'/detay_prc.php')?>
            </div>
            <div id="cevapForm">
        	<form action="" method="post">
            	<div class="txtDiv"><textarea name="mesaj" autofocus></textarea></div>
            	<div class="subDiv"><input type="submit" value="Gönder" class="btn3" /></div>
            </form>
            </div>
            <?Php if(($admn||$ytkl)&&$_X['islem']<2){?>
                <div id="devretForm">
                <form action="" method="post">
                    <div class="kutu">Lütfen devredilecek departmanı seçiniz.<br>
                    <?Php echo select(Array('name'=>$tbl.'[nesne_IDddepartman]','detay'=>'class="required" required','t'=>'nesne','alan'=>'ID,metin1','sd'=>"WHERE ad='ddepartman' && ID<>'".$_X['nesne_IDddepartman']."'",'icerik'=>'<option value="">seçiniz</option>','sec'=>!empty($_X['nesne_IDddepartman'])?$_X['nesne_IDddepartman']:''))?></div>
                    <div class="bilgilendirme">Belirtmek istediğiniz tamamlama mesajı varsa eğer bu alana yazınız. Zorunlu değildir ve sadece yetkililer görebilir.<br /><textarea name="mesaj" autofocus placeholder="" style="width:98%;"></textarea></div>
                    <div class="kutu"><input type="submit" class="btn3" value="&nbsp;Destek Talebini Devret&nbsp;" onClick="return confirm('Destek talebini devretmek istediğinizden emin misiniz?')"  /></div>
                    <input name="formTip" type="hidden" value="devret" />
                </form>
                </div>
                <div id="tamamlaForm">
                <form action="" method="post">
                    <div class="kutu">Lütfen durumu belirtiniz.<br>
                    <?Php foreach(array('2'=>'<img src="img/drm1.png" height="16">Tamamlandı','3'=>'<img src="img/drm2.png" height="16">Askıya alındı','4'=>'<img src="img/drm0.png" height="16">Reddedildi') as $fei=>$fed){?><label><input type="radio" name="<?Php echo $tbl?>[islem]" value="<?Php echo $fei?>" <?Php echo $fei==2?'checked':''?> /><?Php echo $fed?></label><?Php }?></div>
                    <div class="bilgilendirme">Belirtmek istediğiniz tamamlama mesajı varsa eğer bu alana yazınız. Zorunlu değildir ve sadece yetkililer görebilir.<br /><textarea name="mesaj" autofocus placeholder="" style="width:98%;"></textarea></div>
                    <div class="kutu"><input type="submit" class="btn3" value="&nbsp;Destek Talebini Sonlandır&nbsp;" onClick="return confirm('Destek talebini sonlandırmak istediğinizden emin misiniz?')"  /></div>
                    <input name="formTip" type="hidden" value="bitir" />
                </form>
                </div>
            <?Php }?>
         </div>
         <script type="text/javascript">
		 	var mesajlar='',msesA=false;
			function destekMesajYenile(){
				$.get('sayfa/<?Php echo $tbl?>/detay_ajx.php?id=<?Php echo $ID?>',function(e){
					if(e){
						if(e!=100){
							if(mesajlar!=e){
								mesajlar=e;
								if(msesA)
								ses('tamam');
								msesA=true;
							}
							$('#mesajlar').html(e);
						}
					}
				});
			}
			$(document).ready(function(e) {
				mesajlar=$('#mesajlar').html();
				setInterval(destekMesajYenile,1200);
				$('#devretForm,#tamamlaForm').hide();
			});
         </script>
    </div>
</div>
<?Php if(z(8,'yazdir')){?><script type="text/javascript">window.print();</script><?Php }?>
<?Php }else _uyr(2,'Sayfayı görüntüleme izniniz yok.');?>
<?Php }else _uyr(2,'Görüntülenecek içerik bulunamadı.');?>
<?Php }else _uyr(2,'Görüntülenecek içerik bulunamadı.');?>