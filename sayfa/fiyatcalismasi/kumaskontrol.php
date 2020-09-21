<?php

$fiyat_id=z(8,'fiyat');
$kumas_id=z(8,'kumas');
$blok_id=z(8,'blok'); 
$parca_id=z(8,'parca'); 
$cakmakumas_id=z(8,'cakmakumas'); 
$tip=z(8,'tip'); 
$set=z(8,'set'); 
$blok_id=(!empty($blok_id)?$blok_id:0);
$parca_id=(!empty($parca_id)?$parca_id:0);
$cakmakumas_id=(!empty($cakmakumas_id)?$cakmakumas_id:0);
$set=(!empty($set)?$set:0);
$kumasbilgi=z(1,$kumas_id,'','kumaskarti');

if(!empty($kumas_id)){


    $_X=array();
    $blok='';
    $parca='';
    $cakma='';
    if(!empty($parca_id)){
        $parca=" AND parca_ID='".$parca_id."'";
    }
    if(!empty($blok_id)){
        $blok=" AND blok_ID='".$blok_id."'";
    }
    if(!empty($cakmakumas_id)){
        $cakma=" AND cakmakumas_ID='".$cakmakumas_id."'";
    }
    $setsorgu=" AND set_ID='".$set."' ";

    $kumasfiyatkontrol="WHERE arsiv='0' AND fiyat_ID='".$fiyat_id."' AND kumas_ID='".$kumas_id."' ".$blok.$parca.$cakma.$setsorgu;
    $kumasfiyattablo=z(1,$kumasfiyatkontrol,'','kumaskartifiyat');
    $kumasfiyatveri=(!empty($kumasfiyattablo[0])?$kumasfiyattablo[0]:0);



    if(!empty($kumasfiyatveri)){

        $_X=$kumasfiyattablo[0];

    } else {

        if(!empty($kumasid)){

            $yenikumasarray=array();
            $yenikumasarray['personel_ID']=z('lgn','ID');
            $yenikumasarray['tarih']=z('datetime');
            $yenikumasarray['fiyat_ID']=$fiyat_id;
            $yenikumasarray['kumas_ID']=$kumas_id;
            $yenikumasarray['blok_ID']=$blok_id;
            $yenikumasarray['parca_ID']=$parca_id; 
            $yenikumasarray['cakmakumas_ID']=$cakmakumas_id; 
            $yenikumasarray['nesne_IDiplikkartTipi']=(!empty($kumasbilgi['nesne_IDiplikkartTipi'])?$kumasbilgi['nesne_IDiplikkartTipi']:0);
            $yenikumasarray['nesne_IDdoviz']=(!empty($kumasbilgi['nesne_IDdoviz'])?$kumasbilgi['nesne_IDdoviz']:0);
            $yenikumasarray['nesne_IDdovizfason']=(!empty($kumasbilgi['nesne_IDdovizfason'])?$kumasbilgi['nesne_IDdovizfason']:0);
            $yenikumasarray['nesne_IDkumasTipi']=(!empty($kumasbilgi['nesne_IDkumasTipi'])?$kumasbilgi['nesne_IDkumasTipi']:0);
            $yenikumasarray['makinacesitleri_ID']=(!empty($kumasbilgi['makinacesitleri_ID'])?$kumasbilgi['makinacesitleri_ID']:0);
            $yenikumasarray['kumasturu_ID']=(!empty($kumasbilgi['kumasturu_ID'])?$kumasbilgi['kumasturu_ID']:0);
            $yenikumasarray['boyabaski_ID']=(!empty($kumasbilgi['boyabaski_ID'])?$kumasbilgi['boyabaski_ID']:0);
            $yenikumasarray['revize_ID']=(!empty($kumasbilgi['revize_ID'])?$kumasbilgi['revize_ID']:0);
            $yenikumasarray['tedarikci_ID']=(!empty($kumasbilgi['tedarikci_ID'])?$kumasbilgi['tedarikci_ID']:0);
            $yenikumasarray['birimTipi']=(!empty($kumasbilgi['birimTipi'])?$kumasbilgi['birimTipi']:0);
            $yenikumasarray['hamTipi']=(!empty($kumasbilgi['hamTipi'])?$kumasbilgi['hamTipi']:0);
            $yenikumasarray['enTipi']=(!empty($kumasbilgi['enTipi'])?$kumasbilgi['enTipi']:0);
            $yenikumasarray['mkurusd']=(!empty($kumasbilgi['mkurusd'])?$kumasbilgi['mkurusd']:0);
            $yenikumasarray['mkureur']=(!empty($kumasbilgi['mkureur'])?$kumasbilgi['mkureur']:0);
            $yenikumasarray['mkurgbp']=(!empty($kumasbilgi['mkurgbp'])?$kumasbilgi['mkurgbp']:0);
            $yenikumasarray['fiyat']=(!empty($kumasbilgi['fiyat'])?$kumasbilgi['fiyat']:0);
            $yenikumasarray['kumasfiyat']=(!empty($kumasbilgi['kumasfiyat'])?$kumasbilgi['kumasfiyat']:0);
            $yenikumasarray['fire']=(!empty($kumasbilgi['fire'])?$kumasbilgi['fire']:0);
            $yenikumasarray['kodu']=(!empty($kumasbilgi['kodu'])?$kumasbilgi['kodu']:null);
            $yenikumasarray['fasonmaliyet']=(!empty($kumasbilgi['fasonmaliyet'])?$kumasbilgi['fasonmaliyet']:null);
            $yenikumasarray['fasonmaliyet2']=(!empty($kumasbilgi['fasonmaliyet2'])?$kumasbilgi['fasonmaliyet2']:null);
            $yenikumasarray['grm']=(!empty($kumasbilgi['grm'])?$kumasbilgi['grm']:null);
            $yenikumasarray['kumasen']=(!empty($kumasbilgi['kumasen'])?$kumasbilgi['kumasen']:null);
            $yenikumasarray['telsayisi']=(!empty($kumasbilgi['telsayisi'])?$kumasbilgi['telsayisi']:null);
            $yenikumasarray['kombikumastl']=(!empty($kumasbilgi['kombikumastl'])?$kumasbilgi['kombikumastl']:null);
            $yenikumasarray['kombitoplamtl']=(!empty($kumasbilgi['kombitoplamtl'])?$kumasbilgi['kombitoplamtl']:null);
            $yenikumasarray['fiyatselect']=(!empty($kumasbilgi['fiyatselect'])?$kumasbilgi['fiyatselect']:null);
            $yenikumasarray['ismi']=(!empty($kumasbilgi['ismi'])?$kumasbilgi['ismi']:null);
            $yenikumasarray['iplikkartlari']=(!empty($kumasbilgi['iplikkartlari'])?$kumasbilgi['iplikkartlari']:null);
            $yenikumasarray['iplikfireleri']=(!empty($kumasbilgi['iplikfireleri'])?$kumasbilgi['iplikfireleri']:null);
            $yenikumasarray['boyamaliyet']=(!empty($kumasbilgi['boyamaliyet'])?$kumasbilgi['boyamaliyet']:null);
            $yenikumasarray['ekhizmet']=(!empty($kumasbilgi['ekhizmet'])?$kumasbilgi['ekhizmet']:null);
            $yenikumasarray['maliyetham']=(!empty($kumasbilgi['maliyetham'])?$kumasbilgi['maliyetham']:null);
            $yenikumasarray['enbilgisi']=(!empty($kumasbilgi['enbilgisi'])?$kumasbilgi['enbilgisi']:null);
            $yenikumasarray['enbilgisiaciken']=(!empty($kumasbilgi['enbilgisiaciken'])?$kumasbilgi['enbilgisiaciken']:null);
            $yenikumasarray['ekkumas']=(!empty($kumasbilgi['ekkumas'])?$kumasbilgi['ekkumas']:null);
            $yenikumasarray['karoranlari']=(!empty($kumasbilgi['karoranlari'])?$kumasbilgi['karoranlari']:null);
            $yenikumasarray['elyaforanlari']=(!empty($kumasbilgi['elyaforanlari'])?$kumasbilgi['elyaforanlari']:null);
            $yenikumasarray['pusvefayn']=(!empty($kumasbilgi['pusvefayn'])?$kumasbilgi['pusvefayn']:null);
            $yenikumasarray['pusvefaynaciken']=(!empty($kumasbilgi['pusvefaynaciken'])?$kumasbilgi['pusvefaynaciken']:null);
            $yenikumasarray['img']=(!empty($kumasbilgi['img'])?$kumasbilgi['img']:null);
            $yenikumasarray['imgtext']=(!empty($kumasbilgi['imgtext'])?$kumasbilgi['imgtext']:null);
            $yenikumasarray['article']=(!empty($kumasbilgi['article'])?$kumasbilgi['article']:null);
            $yenikumasarray['fiyatlar']=(!empty($kumasbilgi['fiyatlar'])?$kumasbilgi['fiyatlar']:null);
            $yenikumasarray['ilavenot']=(!empty($kumasbilgi['ilavenot'])?$kumasbilgi['ilavenot']:null);

            $yenikumastipi=$yenikumasarray['nesne_IDkumasTipi'];
            $yenienbilgi=$yenikumasarray['enbilgisi'];

            $sonid=z(2,$yenikumasarray,'kumaskartifiyat');
            $sonolusanveri=z(1,$sonid,'','kumaskartifiyat');
            $_X=$sonolusanveri;

            if($yenikumastipi==180){
                $yenienbilgi=!empty($yenienbilgi)?json_decode($yenienbilgi):Null;
                if(!empty($yenienbilgi)){
                    foreach ($yenienbilgi as $yenikey => $yenivalue) {
                        $orjuretimkumas=z(1,$yenikey,'','kumaskarti');
                        $orjuretimkumas['fiyat_ID']=$yenikumasarray['fiyat_ID'];
                        $orjuretimkumas['kumas_ID']=$yenikey;
                        $orjuretimkumas['cakmakumas_ID']=$sonid;
                        $orjuretimkumas['personel_ID']=z('lgn','ID');
                        $orjuretimkumas['tarih']=z('datetime');
                        unset($orjuretimkumas['ID']);
                        foreach ($yenivalue as $yenikey2 => $yenivalue2) {
                            $orjuretimkumas['parca_ID']=$yenikey2;
                            z(2,$orjuretimkumas,'kumaskartifiyat');
                        }
                        z(11,"sonduzenleme",1);
                    }
                }
            }

        }


    

    }

}





?>