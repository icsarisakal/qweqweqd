<?php 
$cakmakumas_ID = !empty(z(8,'id'))?z(8,'id'):'';
$fiyat_ID = !empty(z(8,'fiyat_ID'))?z(8,'fiyat_ID'):'';
$blok_ID = !empty(z(8,'blok_ID'))?z(8,'blok_ID'):'0';

$kontrol = 0;
if(z(11,'editcheck')==1){
        $kontrol = 1;
        z(11,'editcheck','0');
        $getParams = [
            'cakmakumas_ID' =>  $cakmakumas_ID,
            'fiyat_ID' => $fiyat_ID,
            'blok_ID' => $blok_ID
        ];
        
    $sorgumuz = "WHERE revize_ID='0' AND cakmakumas_ID='".$cakmakumas_ID."' AND fiyat_ID='".$fiyat_ID."' AND blok_ID='".$blok_ID."'";
    $kumaskartifiyatveri = !empty(z(1,$sorgumuz,'','kumaskartifiyat'))?z(1,$sorgumuz,'','kumaskartifiyat'):'';

    foreach ($kumaskartifiyatveri as $key => $data) {
        $pusvefaynveri[$key] = !empty($data['pusvefayn'])?json_decode($data['pusvefayn']):'';
        $fiyatlarveri[$key] = !empty($data['fiyatlar'])?json_decode($data['fiyatlar']):'';
        $boyabaski[$key] = !empty($data['boyamaliyet'])?json_decode($data['boyamaliyet']):'';

        $doviz[$key] = !empty($data['nesne_IDdoviz'])?z(1,$data['nesne_IDdoviz'],'metin1','nesne'):'';
        $boyabaskikey = get_object_vars($boyabaski[$key]);
        $boyabaskikey = array_keys($boyabaskikey);
        $boyabaski[$key]=$boyabaskikey;

        if(!empty($data['birimTipi'])&&$data['birimTipi']==1){$birimTipi[$key] = 'kg';}elseif(!empty($data['birimTipi'])&&$data['birimTipi']==2){$birimTipi[$key] = 'm';}else{$birimTipi[$key] = '';}
    }

    $artansayi=0;
    foreach ($boyabaski as $key => $boyabaskikeyy) {
        foreach ($boyabaskikeyy as $key2 => $boyabaskiTipi) {
            $boyabaskiname[$artansayi] = z(1,$boyabaskiTipi,'tipi','boyabaski');
            $artansayi++;
        }
    }
}

$json['sonuc']=1;
$json['cevap']= array(
    'fiyatlar' => isset($fiyatlarveri)?$fiyatlarveri:'',
    'pusvefayn' => isset($pusvefaynveri)?$pusvefaynveri:'',
    'kumaskartifiyatveri' => isset($kumaskartifiyatveri)?$kumaskartifiyatveri:'',
    'doviz' => isset($doviz)?$doviz:'',
    'kontrol' => $kontrol,
    'getParams' => isset($getParams)?$getParams:'',
    'boyabaskikey' => isset($boyabaskikey)?$boyabaskikey:'',
    'boyabaskiname' => isset($boyabaskiname)?$boyabaskiname:'',
    'birimTipi' => isset($birimTipi)?$birimTipi:'',
    'editCheck' => isset($editCheck)?$editCheck:'',
);

?>