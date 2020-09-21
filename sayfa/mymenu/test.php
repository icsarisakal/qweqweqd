<script src="global_assets\js\main\jquery.min.js"></script>
<?php

$menu=$ayr['menu'];
//__($menu);
__($_Favori);

foreach ($menu as $key => $value) {
    
  //  print_r($key);



}

?>

<script>

var target;


function ajaxsorgula(obje,durum,url){
var veri;
console.log('giriş');

$.ajax({
    
    type:'post',
    url:'ajaxayar.php?s=mymenu&a=ajaxsorgu&durum='+durum+'&data='+url,
    success:function(e){

       //console.log(e.cevap.gelen);
        console.log('başarılı');
        veri=e.cevap.gelen;
        if(durum=='anamenu'){
            
            console.log(veri);
           
            $('.altmenu option').remove();

            $.each(veri,function(k,v){

                //console.log(v.ad);
                 $('<option>').attr('id',k).val(v.url+'-'+k+'-'+url).text(v.ad).appendTo('.altmenu');

             });
        
        }else if(durum=='altmenu'){
            
            console.log(veri);
            $('.yanmenu option').remove();
           
            $.each(veri,function(k,v){

                //console.log(v.ad);
                 $('<option>').val(v.url).text(v.ad).appendTo('.yanmenu');
             });
        
        }


    }

});

}


function secim(a,b){
   // alert('test');
    if(b=='anamenu'){
     var deger =$(a).val();
      
        url='&key='+deger;

        console.log(deger+' secildi..!');
       ajaxsorgula(a,b,url);
         console.log('sorgu cevap: '+deger);
       // console.log(v);

    }else if(b=='altmenu'){

        var data = $(a).val();
        data= data.split('-');
       // console.log(data);
        


        console.log('gönderilen: '+data);
        ajaxsorgula(a,b,data);

    }
   

}








</script>



<div >

        <select class="anamenu" onchange="secim(this,'anamenu');">
        
        <?php   
        
            foreach ($menu as $key => $value) {  ?>
                
            

                <option value="<?php echo $key; ?>"><?php echo $menu[$key]['ad'] ?></option>
            
            
            <?php
            }
        
        ?>
        
             
            
</select>

</div>

<div>

        <select class="altmenu" onchange="secim(this,'altmenu')">


        </select>

</div>

<div >

        <select class="yanmenu" onchange="secim(this,'yanmenu')">


        </select>

</div>
