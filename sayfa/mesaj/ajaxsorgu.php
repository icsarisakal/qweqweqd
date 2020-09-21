<?php 


        $gelenveri=z(9);
$veri=array();
//$verigelenmesaj=array();
//$verigidenmesaj=array();
$veriduzensiz=array();
$veriduzenli=array();
$verimesajlar=array();
$eskioku=array();
$dmSon=array();
$gelenYenile=array();
$kisiler=array();
$sonmesaj=array();
$bildirimKutusu=array();
$cevap=null;
$_icerik=null;


//fonksiyonlar

function profilResim($id){
    $img=z(1,'WHERE ID='.$id,'img','personel');
    return $img[0];
}

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
        //kullanılmıyor ilk agoritmalardan kalan
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
  
  $gelenmesajlar=z(1,'WHERE personel_IDgonderen='.$gelenveri['personel_IDgonderen'].' AND personel_IDalici='.z('lgn','ID').' OR personel_IDalici='.$gelenveri['personel_IDgonderen'].' AND personel_IDgonderen='.z('lgn','ID').' ORDER BY tarih DESC LIMIT 10','ID,tarih,mesaj,personel_IDgonderen,personel_IDalici','mesaj');
  //$gidenmesajlar=z(1,'WHERE personel_IDgonderen='.z('lgn','ID').' AND personel_IDalici='.$gelenveri['personel_IDgonderen'],'ID,tarih,mesaj','mesaj');
  //gelen mesajlara okundu olarak işaretler

  
  z(3,'WHERE personel_IDgonderen='.$gelenveri['personel_IDgonderen'].' AND durum="0" ',['durum'=>1],'mesaj');







    if(!empty($gelenmesajlar)){
    foreach ($gelenmesajlar as $key => $value) {

        if($value['personel_IDgonderen']!=z('lgn','ID')){
            $ad=z(1,'WHERE ID='.$gelenveri['personel_IDgonderen'],'ad','personel');
            $geciciarraygelen=array(
    
                'ad'=>$ad[0],
               
                'mesaj'=>$value['mesaj'],
                'tarih'=>$value['tarih'],
                'mesaj_ID'=>$value['ID'],
        
        
        
            );
    



        }else{
        $ad=z(1,'WHERE ID='.$gelenveri['personel_IDgonderen'],'ad','personel');
        $geciciarraygelen=array(

            'ad'=>'Ben',
           
            'mesaj'=>$value['mesaj'],
            'tarih'=>$value['tarih'],
            'mesaj_ID'=>$value['ID'],
    
    
    
        );
    }

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
        $aD=z(1,'WHERE ID='.z('lgn','ID'),'ad','personel');
        $gMail=z(1,'WHERE ID='.$gelenveri['personel_IDalici'],'eposta','personel');
        if(!empty($gMail)){
            
        $kime=$gMail[0];
       // $kime='metehan.ozkan@netadim.com.tr';
       // $kime='halilbarim@gmail.com';
        $konu='Kayteks ERP Otomasyon Bilgilendirme';
        $gonderenAdi=$aD[0];
        $replyPosta='noreplyl@gmail.com';
        $mesaj=$gelenveri['mesaj'];
       

       
        if(empty($_icerik)){
           // $_icerik='	<table style="background-color: #F5F9FA; padding: 50px 0; width: 100%"><tr><td><table align="center" width="95%" style="font-family: sans-serif; table-layout: fixed; margin: 0 auto; background: #fff; width: 95%; padding: 50px; border-radius: 4px; box-shadow: 0 3px 6px rgba(0,0,0,0.16); max-width: 1300px"><tr><td><div class="main-header" style="margin-top: 20px;  font-weight: 700; width: 100%; color:#358bfc; font-size: 25px;">'.$gonderenAdi.' Bey den Mesaj Var...!</div></td></tr><tr><td><div class="header-style" style=" position:relative; width: 100%; margin-left: 88%; margin-top: 5px; margin-bottom: 15px; background: #fff; font-size: 15px; font-weight: 700;">'.z('datetime').'</div><div rules="all" style=" margin-top:20px; border: 3px solid  #a78730; padding: 30px; border-radius: 50px 20px; color: #000;" cellpadding="13"; width="100%"><div>'.$mesaj.'</div></div></tr></td></table></tr></td></table>';
            $_icerik='<table style="background-color: #F5F9FA; padding: 50px 0; width: 100%">
            <tr><td>
                    <table align="center" width="95%" style="font-family: sans-serif;  table-layout: auto; margin: 0 auto; background: rgb(253, 243, 214); width: 95%; padding: 50px; border-radius:  4px; box-shadow: 0 3px 6px rgba(0,0,0,0.16); max-width:1000px">
                    <tr><td>
                            <div><img style="width: 250px; margin-bottom:10px;" src="http://93.113.61.113/img/kaytekslogomuzz.png" alt=""></div>
                            
                            <table rules="all" style=" color: #000; table-layout: auto;" cellpadding="13"; width="100%">
                                    <tr >
                                            <td style="border-right: none;" > <div style="font-weight: bold; width: 50%; font-style: italic; margin-right:215px;">Gönderen Adı:</div>   </td><td style="border-left: none;"> <p style="display: block; top:0; right:0; height:100%; left:80% ;">'.$gonderenAdi.'</p>  </td>
                                        
                                    </tr>
                                    <tr>
                                        <td style="border-right: none;" > <div style="font-weight: bold; width: 50%; font-style: italic; margin-right:215px;">Gönderdiği Tarih</div>    </td> <td style="border-left: none;"> <p style="display: block; top:0; right:0; height:100%; left:80% ;">'.z('datetime').'</p> </td>
                                        
                                    </tr>
                                    <tr>
                                            <td style="font-weight: bold; width: 50%; font-style: italic; border-right: none;">Mesaj:</td>
                                            <td style="width: 100%; font-style: italic; border-left: none;"> “'.$mesaj.'”</td>
                                    </tr>
                                  
                                </table>
                    </tr></td>
                    </table>';
           
            $icerik=$_icerik;
        }else { $_icerik='Mail şablonunda hata var lütfen sistem yöneticiniz ile görüşünüz ajxsrg.php'; $icerik=$_icerik;}
       
        
       




        //__($icerik);
        smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta);

    }



}else if($gelenveri['durum']=='eskioku'){

    
    
    //$eskioku=$kX.'-:-'.$bX.'-:-'.$gelenveri['ic'].'-:-'.$gelenveri['idp'];
    //$eskioku=z(1,'WHERE personel_IDgonderen='.$gelenveri['idp'].' AND personel_IDalici='.z('lgn','ID').' OR personel_IDalici='.$gelenveri['idp'].' AND personel_IDgonderen='.z('lgn','ID').' AND ID BETWEEN '.$kX.' AND '.$bX.' ORDER BY tarih DESC','mesaj,tarih','mesaj');
    $eskioku=z(1,'WHERE ID<'.$gelenveri['idm'].' AND personel_IDgonderen='.$gelenveri['idp'].' AND personel_IDalici='.z('lgn','ID').' OR ID<'.$gelenveri['idm'].' AND personel_IDalici='.$gelenveri['idp'].' AND personel_IDgonderen='.z('lgn','ID').' ORDER BY tarih DESC LIMIT '.$gelenveri['ic'].' ','ID,personel_IDgonderen,mesaj,tarih','mesaj');


}else if($gelenveri['durum']=='dmSon'){

    $dmSon=z(1,'WHERE personel_IDalici='.z('lgn','ID').' AND personel_IDgonderen='.$gelenveri['personel_IDgonderen'].' AND durum="0" ','mesaj,tarih','mesaj');

    z(3,'WHERE personel_IDgonderen='.$gelenveri['personel_IDgonderen'].' AND durum="0" ',['durum'=>1],'mesaj');

    
    



}else if($gelenveri['durum']=='gelenkisiler'){
    //GELEN KUTUSU SON MESAJLAR GÖSTERİR
    $karakterSinir='30';
    

   $kisiler=grupCek();
   // print_r($kisiler);

    $gelensirala = z(1,'WHERE personel_IDalici='.z('lgn','ID').' OR personel_IDgonderen='.z('lgn','ID').'','ID,personel_IDgonderen,personel_IDalici,arsiv,tarih,tarihArsiv,konu,durum,SUBSTRING(mesaj,1,'.$karakterSinir.') AS mesaj','mesaj');
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

    $ad=z(1,'WHERE ID='.$test['personel_IDgonderen'],'ad,ID','personel');
    


   }else if($test['personel_IDalici']!=z('lgn','ID')){


    $ad=z(1,'WHERE ID='.$test['personel_IDalici'],'ad,ID','personel');


   }else if($test['personel_IDalici']==z('lgn','ID') && $test['personel_IDgonderen']==z('lgn','ID')){

        
    $ad=z(1,'WHERE ID='.z('lgn','ID'),'ad,ID','personel');    

   }


//capaa
 // __($ad);
  // echo 'test'; 
 // print_r($test);
   if(!empty(profilResim($ad[0]['ID'])))$test += ["img" => profilResim($ad[0]['ID'])];else $test += ["img" => 'yok'];
   $test += [ "ad" => $ad[0]['ad'] ];
   $test += ["yeniMesaj" => $yeniMesajSayisi];
   
 
   if(in_array($test,$gelenYenile)==false){

    array_push($gelenYenile,$test);
    
   }

  
  // print_r($array_name);
  // $ad=array_combine(['ad'],$ad[0]);
  //array_push($test,$ad);

  


   }
   





   }
  

 


//karakter sınırlaması gelecek
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
   $gelenYenile=null;
   
  // __($bildirimKutusu);

}



}else if($gelenveri['durum']=='deneme'){
    $cevap='test';

}


    
        // __($data); 
         

         
        //__($veriduzenli);
//__($verimesajlar);

//$veri='tanımlanmadı ajaxsorgu.php kontrol et...!';
$json['sonuc']=1;
$json['cevap']=array(
    'verimesajlar'=>$verimesajlar,
    'mesajDM'=>$veriduzenli,
    'eskioku'=>$eskioku,
    'dmSon'=>$dmSon,
    'gelenkisiler'=>$gelenYenile,
    'kisilistesi'=>$kisiler,
    'bildirimkutusu'=>$bildirimKutusu,
    'test'=>$cevap,
);


?>