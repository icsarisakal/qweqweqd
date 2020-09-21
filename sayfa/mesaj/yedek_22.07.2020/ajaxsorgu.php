<?php 

        $gelenveri=z(9);
$veri=array();
//$verigelenmesaj=array();
//$verigidenmesaj=array();
$veriduzensiz=array();
$veriduzenli=array();
$verimesajlar=array();
$sonoku=array();
$dmSon=array();
$gelenYenile=array();
$kisiler=array();
$sonmesaj=array();
$bildirimKutusu=array();



//fonksiyonlar
function grupCek(){
    $idList=array();

   $tumMesaj = Z(1,'WHERE personel_IDalici='.z('lgn','ID').' OR personel_IDgonderen='.z('lgn','ID'),'','mesaj');

    foreach ($tumMesaj as $key => $value) {
        
        if($value['personel_IDalici']==z('lgn','ID')){

                if(in_array($value['personel_IDgonderen'],$idList)==false){
                    array_push($idList,$value['personel_IDgonderen']);

                }


        } else if($value['personel_IDgonderen']==z('lgn','ID')){

            if(in_array($value['personel_IDalici'],$idList)==false){
                array_push($idList,$value['personel_IDalici']);

            }


    }


    }

 return $idList;

}
function bildirimKutusu($array){

    $bildirimList=array();
    
    if(!empty($array)){
        for ($i=1; $i <= 5; $i++) {
    
            if(count($array)!=0){
                array_push($bildirimList,$array[count($array)-1]);
                unset($array[count($array)-1]);   
       

            }
            
         
        
        }


    }

 
 return $bildirimList;



}
//ajax postları

if($gelenveri['durum']=='gelenmesaj'){

    //son mesaja göre tarih sırala hepsine göre değil!!!!!
    
    $data=z(1,'WHERE personel_IDalici='.z('lgn','ID').'','','mesaj');
    $data2=z(1,'WHERE personel_IDgonderen='.z('lgn','ID').'','','mesaj');

    foreach ($data as $key => $value) {
        
        $ad=z(1,'WHERE ID='.$value['personel_IDgonderen'],'ad','personel');
        $geciciarray=array(
            'id'=>$value['ID'],
            'personel_IDgonderen'=>$value['personel_IDgonderen'],
            'ad'=>$ad[0],
            'konu'=>$value['konu'],
            'mesaj'=>$value['mesaj'],
            'tarih'=>$value['tarih'],
            'durum'=>$value['durum']

        );


        array_push($verimesajlar,$geciciarray);


        
    }
    foreach ($data2 as $key => $value) {
        
        $ad=z(1,'WHERE ID='.$value['personel_IDalici'],'ad','personel');
        $geciciarray=array(
            'id'=>$value['ID'],
            'personel_IDgonderen'=>$value['personel_IDalici'],
            'ad'=>$ad[0],
            'konu'=>$value['konu'],
            'mesaj'=>$value['mesaj'],
            'tarih'=>$value['tarih'],
            'durum'=>$value['durum']

        );


        array_push($verimesajlar,$geciciarray);


        
    }
    //z(1,'WHERE ID='.$data['personel_IDgonderen'],'ad','personel');

    




}else if($gelenveri['durum']=='mesajcek'){

  //alici ver gonderici arasındaki tüm konuşmayı çeker
  $gelenmesajlar=z(1,'WHERE personel_IDgonderen='.$gelenveri['personel_IDgonderen'].' AND personel_IDalici='.z('lgn','ID'),'ID,tarih,mesaj','mesaj');
  $gidenmesajlar=z(1,'WHERE personel_IDgonderen='.z('lgn','ID').' AND personel_IDalici='.$gelenveri['personel_IDgonderen'],'ID,tarih,mesaj','mesaj');
  //gelen mesajlara okundu olarak işaretler


  z(3,'WHERE personel_IDgonderen='.$gelenveri['personel_IDgonderen'].' AND durum="0" ',['durum'=>1],'mesaj');







    if(!empty($gelenmesajlar)){
    foreach ($gelenmesajlar as $key => $value) {

        $ad=z(1,'WHERE ID='.$gelenveri['personel_IDgonderen'],'ad','personel');
        $geciciarraygelen=array(

            'ad'=>$ad[0],
           
            'mesaj'=>$value['mesaj'],
            'tarih'=>$value['tarih'],
            'mesaj_ID'=>$value['ID'],
    
    
    
        );
        array_push($veriduzensiz,$geciciarraygelen);

        


    }    
}
if(!empty($gidenmesajlar)){
    foreach ($gidenmesajlar as $key => $value) {

        //$ad=z(1,'WHERE personel_ID='.$value['personel_IDgonderen'],'ad','personel');
        $geciciarraygiden=array(

            'ad'=>'Ben',
            
            'mesaj'=>$value['mesaj'],
            'tarih'=>$value['tarih'],
            'mesaj_ID'=>$value['ID'],
    
    
    
        );
        array_push($veriduzensiz,$geciciarraygiden);

        


    }    
}
    
 

function sirala($a, $b)
{
    if ($a['tarih'] > $b['tarih'])
        return 1;
    elseif ($a['tarih'] == $b['tarih'])
        return 0;
    else
        return -1;
}

usort($veriduzensiz, 'sirala');
//__($verimesajlar);
//usort($verimesajlar,'sirala');
//__($verimesajlar);
//print_r($veriduzensiz);
$veriduzenli=$veriduzensiz;


}else if($gelenveri['durum']=='mesajgonder'){



        z(2,['personel_IDgonderen'=>z('lgn','ID'),'personel_IDalici'=>$gelenveri['personel_IDalici'],'mesaj'=>$gelenveri['mesaj']],'mesaj');




}else if($gelenveri['durum']=='sonoku'){
    
    $sonoku=z(1,'WHERE personel_IDalici='.z('lgn','ID').' AND personel_IDgonderen='.$gelenveri['personel_IDgonderen'].' AND durum="0" ','','mesaj');
   


}else if($gelenveri['durum']=='dmSon'){

    $dmSon=z(1,'WHERE personel_IDalici='.z('lgn','ID').' AND personel_IDgonderen='.$gelenveri['personel_IDgonderen'].' AND durum="0" ','mesaj,tarih','mesaj');

    z(3,'WHERE personel_IDgonderen='.$gelenveri['personel_IDgonderen'].' AND durum="0" ',['durum'=>1],'mesaj');

    
    



}else if($gelenveri['durum']=='gelenkisiler'){
    //GELEN KUTUSU SON MESAJLAR GÖSTERİR
    
    

   $kisiler=grupCek();
   // print_r($kisiler);

    $gelensirala = z(1,'WHERE personel_IDalici='.z('lgn','ID').' OR personel_IDgonderen='.z('lgn','ID').'','','mesaj');
    //__($gelensirala);
   foreach ($kisiler as $k => $v) {
    $yeniMesajSayisi=0;
       
  // print_r($v);
   
  //__($gelensirala);

  if($v!=Z('lgn','ID')){
     
      foreach ($gelensirala as $key => $value) {
      
        if($value['personel_IDgonderen']==$v || $value['personel_IDalici']==$v){
           // print_r($v);
           //print_r($value);
           if($value['durum']==0 && $value['personel_IDalici']==z('lgn','ID')){ $yeniMesajSayisi++;}
           
            array_push($sonmesaj,$value);
            //print_r($sonmesaj);
             
 
        }
    }
 


  }
   
  //__($sonmesaj);
  //print_r('sayi:'.$yeniMesajSayisi);
   //__($sonmesaj);
   
    
   if(!empty($sonmesaj)){
        
    $test=$sonmesaj[count($sonmesaj)-1];
   //print_r($test);

//adını ekleme işleminde kaldım sonrası bitti sayılır

   if($test['personel_IDgonderen']!=z('lgn','ID')){

    $ad=z(1,'WHERE ID='.$test['personel_IDgonderen'],'ad','personel');



   }else if($test['personel_IDalici']!=z('lgn','ID')){


    $ad=z(1,'WHERE ID='.$test['personel_IDalici'],'ad','personel');


   }else if($test['personel_IDalici']==z('lgn','ID') && $test['personel_IDgonderen']==z('lgn','ID')){

        
    $ad=z(1,'WHERE ID='.z('lgn','ID'),'ad','personel');    

   }



  
  // echo 'test'; 
 // print_r($test);
 
   $test += [ "ad" => $ad[0] ];
   $test += ["yeniMesaj" => $yeniMesajSayisi];
   

   if(in_array($test,$gelenYenile)==false){

    array_push($gelenYenile,$test);
    
   }

  
  // print_r($array_name);
  // $ad=array_combine(['ad'],$ad[0]);
  //array_push($test,$ad);

  


   }
   





   }
  

 



//print_r($gelenYenile);

function sirala($a, $b)
{
    if ($a['tarih'] > $b['tarih'])
        return 1;
    elseif ($a['tarih'] == $b['tarih'])
        return 0;
    else
        return -1;
}

usort($gelenYenile,'sirala');

//__($gelenYenile);

if($gelenveri['bildirimkutusu']=='1'){

   $bildirimKutusu = bildirimKutusu($gelenYenile);
   
  // __($bildirimKutusu);

}



}

    
        // __($data); 
         

         
        //__($veriduzenli);
//__($verimesajlar);

//$veri='tanımlanmadı ajaxsorgu.php kontrol et...!';
$json['sonuc']=1;
$json['cevap']=array(
    'verimesajlar'=>$verimesajlar,
    'mesajDM'=>$veriduzenli,
    'sonoku'=>$sonoku,
    'dmSon'=>$dmSon,
    'gelenkisiler'=>$gelenYenile,
    'kisilistesi'=>$kisiler,
    'bildirimkutusu'=>$bildirimKutusu,
);


?>