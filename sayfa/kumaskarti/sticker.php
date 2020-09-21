<style>
.navbar{
    display:none;
}
.sidebar{
    display:none;
}
body {
  background: rgb(204,204,204); 
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size="A4"][layout="landscape"] {
  width: 29.7cm;
  height: 21cm;  
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="landscape"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="landscape"] {
  width: 21cm;
  height: 14.8cm;  
}
.altkolon{
    width:7cm;
    height:4.95cm;
    float:left;
    border:1px solid #efefee;
    cursor:pointer;
}
.altkolon:hover{
    background:lightblue;
}
.stickeryazdir{
    position:absolute;
    width:200px;
    left:0;
}
.stickeryazdir2{
    position:absolute;
    width:200px;
    right:0;
}
.sticker{

}
.enler{
    margin-left:3px;
}
.stickertop{
    font-size: 0.3cm;
    /* padding-top: 0.2cm; */
    padding-left: 0.10cm;
    padding-right: 0.10cm;
}
.code span:nth-child(1){
    /* width: 1.4cm; */
    display: block;
    float: left;
    font-weight:bold;
}
.article span:nth-child(1){
    /* width: 1.4cm; */
    display: block;
    float: left;
    font-weight:bold;
}
.composition span:nth-child(1){
    /* width: 1.4cm; */
    display: block;
    float: left;
    font-weight:bold;
}
.composition span:nth-child(2){

}
.gsm span:nth-child(1){
    /* width: 1.4cm; */
    display: block;
    float: left;
    font-weight:bold;
}

.code{
    /* margin-bottom: 10px; */
    /* margin-top: 10px; */
    float:left;
    width:100%;
}

.composition{
    /* margin-bottom: 10px; */
    float:left;
    width:100%;
}
.gsm{
    float:left;
    width:100%;
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
  .enler{
    margin-left:3px;
}
  .sticker{
    /* margin-top:2%; */
    margin-left:5%;
  }
  .kolon{
    padding-top: 0.65cm;
  }
  .stickeryazdir{
      display:none;
  }
  .stickeryazdir2{
      display:none;
  }
  .altkolon{
    /*height:7.40cm;*/
    /* height:8.90cm; */
    height:7.30cm;
    width:30.5%;
    }
page[size="A4"] {  
    width: 34cm;
}
.code span:nth-child(1){
    font-size:20px;
    margin-right: 0.2cm;
}
.article span:nth-child(1){
    font-size:20px;
    margin-right: 0.2cm;
}
.composition span:nth-child(1){
    font-size:20px;
    margin-right: 0.2cm;
}
.gsm span:nth-child(1){
    font-size:20px;
    margin-right: 0.2cm;
}
.code span:nth-child(2){
    font-size:18px;
}
.article span:nth-child(2){
    font-size:18px;
}
.composition span:nth-child(2){
    font-size:18px;
}
.gsm span:nth-child(2){
    font-size:18px;
}
.stickerlogo{
    /* margin-top:20px; */
    /* margin-bottom:20px; */
}

  @page 
    {
        size:  A4;
        margin: 0mm;
    }
}
</style>
<?php
$id=z(8,'id');
$cokluid=z(8,'cokluid');
$kompmetin='';
$iplikkartlarimetin="";
$kompozisyonarray=array();
$_Nesne=z(37,z(1,"WHERE ad='' OR ad='iplikkartTipi' OR ad='elyafTipi' OR ad='doviz' OR ad='uretimTipi' OR ad='boyaKontrol' OR ad='dovizfason' ",'ID,ad,metin1,metin2','nesne'));
if(!empty($id)){
    $vt=z(1,$id,'',$tbl);
    if(!empty($vt['iplikkartlari'])){
        $iplikkartlaricek=$vt['iplikkartlari'];
        $iplikkartlariarray=(!empty($vt['iplikkartlari'])?json_decode($vt['iplikkartlari'],1):'');
        if(!empty($iplikkartlariarray)){
            $iplikkartlariarray=str_replace('puan','',$iplikkartlariarray);
        }
        if(!empty($iplikkartlariarray)){
            foreach($iplikkartlariarray as $i => $elyf){
                $iplikokuma=z(1,$i,'','iplik');
                $iplikkarti=(!empty($_Nesne[$iplikokuma['nesne_IDiplikkartTipi']]['metin1'])?$_Nesne[$iplikokuma['nesne_IDiplikkartTipi']]['metin1']:'');
                $uretimTipi=(!empty($_Nesne[$iplikokuma['nesne_IDuretimTipi']]['metin1'])?$_Nesne[$iplikokuma['nesne_IDuretimTipi']]['metin1']:'&nbsp;');
                $boyaKontrol=(!empty($_Nesne[$iplikokuma['nesne_IDboyaKontrol']]['metin1'])?$_Nesne[$iplikokuma['nesne_IDboyaKontrol']]['metin1']:'&nbsp;');
                $elyafTipi=(!empty($_Nesne[$i]['metin1'])?$_Nesne[$i]['metin1']:'&nbsp;');
                $iplikkartlarimetin=(!empty($elyf)?'%'.$elyf:''); 
                $elyafmetin="";
                if(!empty($iplikokuma['elyaf'])){
                    $elyafarray=(!empty($iplikokuma['elyaf'])?json_decode($iplikokuma['elyaf'],1):'');
                    if(!empty($elyafarray)){
                        $elyafarray=str_replace('puan','',$elyafarray);
                    }
                    if(!empty($elyafarray)){ foreach($elyafarray as $el => $elyfb){
                        $elyafnesne=(!empty($_Nesne[$el]['metin1'])?$_Nesne[$el]['metin1']:'&nbsp;');
                        $elyfbhesapla=($elyfb/100)*$elyf;
                        $elyfbhesapla=number_format($elyfbhesapla);
                        $elyafmetin.='%'.$elyfbhesapla.' '.$elyafnesne.' ';
                        if(!empty($kompozisyonarray[$elyafnesne])){
                            $eskihesaplama=$kompozisyonarray[$elyafnesne];
                            $yenihesaplama=($eskihesaplama+$elyfbhesapla);
                            $kompozisyonarray[$elyafnesne]=$yenihesaplama;
                        } else {
                            $kompozisyonarray[$elyafnesne]=$elyfbhesapla;
                        }
                    } }
                }
            } 
        }  
    }
    if(!empty($kompozisyonarray)){
        foreach ($kompozisyonarray as $karray => $kompozisyon2) {
            $kompmetin.='%'.$kompozisyon2.' '.$karray.' ';
        }
    }
}
?>
<a href="javascript:print()" class="btn btn-success stickeryazdir">YAZDIR</a>
<a href="javascript:print()" class="btn btn-success stickeryazdir2">YAZDIR</a>
<?php if(!empty($id)){ ?>
<page size="A4">
    <div class="kolon">
        <div class="altkolon altkolon1" onclick="klonla(this)">
        <div class="sticker">
			<div class="stickertop">
				<div style="float:left;">
                <div class="stickerlogo"><img src="img/kaytekslogomuzz.png" class="img-fluid" style="width:60%;"></div>
					<div class="code"><span>Code</span><span>: <?php if(!empty($vt['kodu'])){ echo $vt['kodu'];} ?> </span></div>
					<div class="article"><span>Article</span><span>: <?php if(!empty($vt['article'])){ echo $vt['article'];} ?> </span></div>
					<div class="composition"><span>Comp.</span><span>: <?php if(!empty($kompmetin)){ echo $kompmetin;} ?> </span></div>
					<div class="gsm"><span>GSM</span><span>: <?php if(!empty($vt['grm'])){ echo $vt['grm'];} ?> </span></div>
					<div class="gsm"><span>Sample Width</span><span>: <?php if(!empty($vt['enTipi'])){if($vt['enTipi']==1){echo 'Tüp';}elseif($vt['enTipi']==0){echo 'Açık En';}else{echo '';}} ?> </span></div>
                    <div class="gsm avb"><span>Available Width</span>:<br><span style="float:left;" class="enler"> <?php $pusvefaynData = json_decode($vt['pusvefayn']);
                        foreach ($pusvefaynData as $key => $tumEnler) {?>
					 <?php if(!empty($tumEnler['1'])){ echo $tumEnler['1'].'cm';} ?> 
                            
                      <?php }?> </span></div>
                     
				</div>
			</div>
		</div>
        </div>
        <div class="altkolon altkolon2" onclick="klonla(this)"></div>
        <div class="altkolon altkolon3" onclick="klonla(this)"></div>
        <div class="altkolon altkolon4" onclick="klonla(this)"></div>
        <div class="altkolon altkolon5" onclick="klonla(this)"></div>
        <div class="altkolon altkolon6" onclick="klonla(this)"></div>
        <div class="altkolon altkolon7" onclick="klonla(this)"></div>
        <div class="altkolon altkolon8" onclick="klonla(this)"></div>
        <div class="altkolon altkolon9" onclick="klonla(this)"></div>
        <div class="altkolon altkolon10" onclick="klonla(this)"></div>
        <div class="altkolon altkolon11" onclick="klonla(this)"></div>
        <div class="altkolon altkolon12" onclick="klonla(this)"></div>
        <div class="altkolon altkolon13" onclick="klonla(this)"></div>
        <div class="altkolon altkolon14" onclick="klonla(this)"></div>
        <div class="altkolon altkolon15" onclick="klonla(this)"></div>
        <div class="altkolon altkolon16" onclick="klonla(this)"></div>
        <div class="altkolon altkolon17" onclick="klonla(this)"></div>
        <div class="altkolon altkolon18" onclick="klonla(this)"></div>
    </div>
</page>
<?php } ?>
<?php
$idsirala=array();
if(!empty($cokluid)){ $idsirala=explode(",",$cokluid); ?>
    <?php if(!empty($idsirala)){ ?>
        <page size="A4">
            <div class="kolon">
                <?php foreach ($idsirala as $ids => $idsira) { $ids++; ?>
                <?php
                $kompmetin='';
                $iplikkartlarimetin="";
                $kompozisyonarray=array();
                    if(!empty($idsira)){
                        $vt=z(1,$idsira,'',$tbl);
                        if(!empty($vt['iplikkartlari'])){
                            $iplikkartlaricek=$vt['iplikkartlari'];
                            $iplikkartlariarray=(!empty($vt['iplikkartlari'])?json_decode($vt['iplikkartlari'],1):'');
                            if(!empty($iplikkartlariarray)){
                                $iplikkartlariarray=str_replace('puan','',$iplikkartlariarray);
                            }
                            if(!empty($iplikkartlariarray)){
                                foreach($iplikkartlariarray as $i => $elyf){
                                    $iplikokuma=z(1,$i,'','iplik');
                                    $iplikkarti=(!empty($_Nesne[$iplikokuma['nesne_IDiplikkartTipi']]['metin1'])?$_Nesne[$iplikokuma['nesne_IDiplikkartTipi']]['metin1']:'');
                                    $uretimTipi=(!empty($_Nesne[$iplikokuma['nesne_IDuretimTipi']]['metin1'])?$_Nesne[$iplikokuma['nesne_IDuretimTipi']]['metin1']:'&nbsp;');
                                    $boyaKontrol=(!empty($_Nesne[$iplikokuma['nesne_IDboyaKontrol']]['metin1'])?$_Nesne[$iplikokuma['nesne_IDboyaKontrol']]['metin1']:'&nbsp;');
                                    $elyafTipi=(!empty($_Nesne[$i]['metin1'])?$_Nesne[$i]['metin1']:'&nbsp;');
                                    $iplikkartlarimetin=(!empty($elyf)?'%'.$elyf:''); 
                                    $elyafmetin="";
                                    if(!empty($iplikokuma['elyaf'])){
                                        $elyafarray=(!empty($iplikokuma['elyaf'])?json_decode($iplikokuma['elyaf'],1):'');
                                        if(!empty($elyafarray)){
                                            $elyafarray=str_replace('puan','',$elyafarray);
                                        }
                                        if(!empty($elyafarray)){ foreach($elyafarray as $el => $elyfb){
                                            $elyafnesne=(!empty($_Nesne[$el]['metin1'])?$_Nesne[$el]['metin1']:'&nbsp;');
                                            $elyfbhesapla=($elyfb/100)*$elyf;
                                            $elyfbhesapla=number_format($elyfbhesapla);
                                            $elyafmetin.='%'.$elyfbhesapla.' '.$elyafnesne.' ';
                                            if(!empty($kompozisyonarray[$elyafnesne])){
                                                $eskihesaplama=$kompozisyonarray[$elyafnesne];
                                                $yenihesaplama=($eskihesaplama+$elyfbhesapla);
                                                $kompozisyonarray[$elyafnesne]=$yenihesaplama;
                                            } else {
                                                $kompozisyonarray[$elyafnesne]=$elyfbhesapla;
                                            }
                                        } }
                                    }
                                } 
                            }  
                        }
                        if(!empty($kompozisyonarray)){
                            foreach ($kompozisyonarray as $karray => $kompozisyon2) {
                                $kompmetin.='%'.$kompozisyon2.' '.$karray.' ';
                            }
                        }
                    }
                ?>
                    <div class="altkolon altkolon<?php echo $ids; ?>" onclick="klonla(this)">
                    <div class="sticker">
			<div class="stickertop">
				<div style="float:left;">
                <div class="stickerlogo"><img src="img/kaytekslogomuzz.png" class="img-fluid" style="width:60%;"></div>
					<div class="code"><span>Code</span><span>: <?php if(!empty($vt['kodu'])){ echo $vt['kodu'];} ?> </span></div>
					<div class="article"><span>Article</span><span>: <?php if(!empty($vt['article'])){ echo $vt['article'];} ?> </span></div>
					<div class="composition"><span>Comp.</span><span>: <?php if(!empty($kompmetin)){ echo $kompmetin;} ?> </span></div>
					<div class="gsm"><span>GSM</span><span>: <?php if(!empty($vt['grm'])){ echo $vt['grm'];} ?> </span></div>
					<div class="gsm"><span>Sample Width</span><span>: <?php if(!empty($vt['enTipi'])){if($vt['enTipi']==1){echo 'Tüp';}elseif($vt['enTipi']==0){echo 'Açık En';}else{echo '';}} ?> </span></div>
                    <div class="gsm avb"><span>Available Width</span>:<br><span class="enler" style="float:left;"><?php $pusvefaynData = json_decode($vt['pusvefayn']);
                        foreach ($pusvefaynData as $key => $tumEnler) {?>
					 <?php if(!empty($tumEnler['1'])){ echo $tumEnler['1'].'cm';} ?> 
                            
                      <?php }?> </span></div>
                     
				</div>
			</div>
		</div>
                    </div>
                <?php } ?>
            </div>
        </page>
    <?php } ?>
<?php } ?>
<!--
<page size="A4" layout="landscape"></page>
<page size="A5"></page>
<page size="A5" layout="landscape"></page>
<page size="A3"></page>
<page size="A3" layout="landscape"></page>
-->
<script>
$("div").removeClass("page-content");
$("div").removeClass("content-wrapper");
$(".sidebar").remove();
$(".navbar").remove();
function klonla(ths){
    <?php if(!empty($id)){ ?>
    var sticker=$(".sticker").html();
    sticker='<div class="sticker">'+sticker+'</div>';
    $(".sticker").remove();
    $(ths).append(sticker);
    <?php } ?>
}
</script>