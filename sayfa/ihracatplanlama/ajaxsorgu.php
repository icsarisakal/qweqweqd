 <?php 
    $kumaskarti_ID =  !empty(z(8,'kumas_ID'))?z(8,'kumas_ID'):'0';

    if($kumaskarti_ID!=0){
        $kumasturu_ID = z(1,$kumaskarti_ID,'kumasturu_ID','kumaskarti');
        if(!empty($kumasturu_ID)){
            $makinecesitleri_ID = z(1,$kumasturu_ID,'makinacesitleri_ID','kumasturu');
             $makinecesitleri_ID = !empty($makinecesitleri_ID)?$makinecesitleri_ID:null;
            if($makinecesitleri_ID!=null){
                $pus_JSON = z(1,$makinecesitleri_ID,'pus','makinacesitleri');
                $pus = !empty($pus_JSON)?json_decode($pus_JSON):null;
            }
        }
    }


    $json['sonuc']=1;
    $json['cevap']= array(
        'pus'=>$pus,
    );
 ?>