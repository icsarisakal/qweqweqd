<?php 

$gelenveri=z(9);
$geciciArray=array();
$newlist=array();
$data[0]=array();






if($gelenveri['durum']=='ekle'){

   $sorgu='WHERE personel_ID='.$gelenveri['personel'];
   $data=z(1,$sorgu,'mymenuListe','mymenu');
  // __($data[0]);
   $arry=explode(',',$data[0]);
 //  __($arry);
    // yenikayit($data);
 
    


       if(in_array($gelenveri['id'],$arry)==null){

            $data[0].=','.$gelenveri['id'];

           


        }else {

           $a = array_search($gelenveri['id'],$arry);
           // __($a);
          unset($arry[$a]);
          $ar=array_values($arry);
          $data[0]=implode(",",$ar);

         // __($data[0]);
        



        }
    


    
         
    z(3,$sorgu,['mymenuListe'=>$data[0]],'mymenu');
    $menuDb = z(1,$sorgu,'mymenuListe','mymenu');

    $menuDb=explode(',',$menuDb[0]);

    foreach ($_Favori as $key => $value) {
        
        foreach ($menuDb as $k => $v) {

            if($value['ID']==$v){

                //print_r($value);
                array_push($geciciArray,$value);
                


            }



        }
        
    }


    
    
    



    
        

    }
    
    

if($gelenveri['durum']=='cek'){


    $myliste= z(1,'WHERE personel_ID='.z('lgn','ID'),'mymenuListe','mymenu');


	$myliste=explode(',',$myliste[0]);
	$newlist=array();
	foreach ($_Favori as $key => $value) {
	
		foreach ($myliste as $k => $v) {

			if($value['ID']==$v){

				//print_r($value);
				array_push($newlist,$value);
			


			 }



		}
	

    }
//$newlist='test';







}

// function yenikayit($person){

//     if($person){}else {z(2,['personel_ID'=>$gelenveri['personel']],'mymenu');}


// }

   //__($data);


   

   
$mymenu_favori=$geciciArray;



















//$veri='tanımlanmadı ajaxsorgu.php kontrol et...!';
$json['sonuc']=1;
$json['cevap']=array(
    'gelen'=>$data[0],
    'mymenuarray'=>$newlist

);


?>
