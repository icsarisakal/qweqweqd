
<!------ Include the above in your HEAD tag ---------->


<html>
<head>

<style>

.container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%;
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}


.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
.numarator{

    float:right;
    width:5px;
    height:5px;
    font-size: 12px;
    padding-bottom:50px;
    z-index:5;

}
.yenimesaj{

  z-index:4;
  


}
.icon-compose{
  
}

</style>

</head>
<body>

<div class="container">
<h3 class=" text-center">Mesajlaşma Uygulaması</h3><h6 id="dmAd" name="<?php echo z('lgn','ID'); ?>" class="text-right">---</h6>

<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Son Mesajlar</h4>
            </div>
            <div hidden="true" class="srch_bar">
              <div class="stylish-input-group">
                <input  type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat" >
<!--
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
-->



          </div>     

          <div class="yenimesaj" ><a id="modalac" href="#" data-toggle="modal" data-target="#myModal" class="text-default"><i class="icon-compose" style="width:40px;height:40px;"></i></a></div>

        </div>





        <!--mesajlaşma alanı -->
        <div class="mesgs">
          <div class="msg_history">


            Lütfen listeden bir mesaj kanalı seçiniz....!


        </div>

        <div class="type_msg">
            <div class="input_msg_write">
              <input id="mesajYaz" type="text" class="write_msg" placeholder="Mesajınızı giriniz..." />
              <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
      </div>

      <a id="capala" href="#capa" hidden="true" >CAPALAAAA</a>


    </div></div>
    
<!--modal content baslangic-->

<div class="container">
  
  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

  <!-- Modal -->
  <form id="modalForm">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">Yeni Mesaj</h4>
        </div>
        <div class="modal-body">
        <div class="form-group row">
     <label class="col-lg-3 col-form-label">Alıcı</label>
        <div class="col-lg-9">
            <select id="modalPersonel_IDalici" class="form-control">

                <option value="0">Bir Alıcı Seçiniz</option>
                <?php
                    $alici = z(1,'WHERE arsiv!="-1"','ID,ad','personel');
                    
                      foreach ($alici as $key => $value) { echo "<option value='".$value['ID']."'>".$value['ad']."</option>"; }
                ?>
            </select>
        </div>
</div>
</form>

<div class="form-group row">
    <label class="col-lg-3 col-form-label"> Mesaj </label>
    <div class="col-lg-9">
        <textarea id="modalMesaj" placeholder="Lütfen mesajınızı giriniz...!" type="text" class="form-control" tabindex="1" name="mesajGonderilen" autofocus="autofocus" required="required"  autocomplete="on"></textarea>
    </div>
</div>
   
        </div>
        <div class="modal-footer">
        <button id="modalGonder" class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
        </div>
      </div>
      
    </div>
  </div>
  <a id="dmac" hidden="true" href="">TESTTT</a>
</div>

<!--modal content bitis-->

    <script>




 let dMyenile=null;
let gelenKisiler=[];
let geciciarray=[];
let kisisayisi=[];
 function ekle(gelenyenimesaj,el,id,personel_IDgonderen,ad,tarih,mesaj,sayisi){

  //ekle(el,k.id,k.personel_IDgonderen,k.ad,k.tarih,k.mesaj,key['sayisi']);


  if(sayisi<=0){








            el.prepend('<div onclick="mesajoku(this)" value="'+ad+'" id="'+id+'" name="'+personel_IDgonderen+'" class="chat_list" id="chat" ><div class="chat_people"   ><div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div><div class="chat_ib"><h5 >'+ad+'<span class="chat_date">'+tarih+'</span></h5><p>'+mesaj+'</p></div></div><div class="numarator"></div</div>');







  }else {
          gelenyenimesaj.prepend('<div onclick="mesajoku(this)" value="'+ad+'" id="'+id+'" name="'+personel_IDgonderen+'" class="chat_list" style="background-color:#FFEAC9;" id="chat" ><div class="chat_people"   ><div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div><div class="chat_ib"><h5 >'+ad+'<span class="chat_date">'+tarih+'</span></h5><p>'+mesaj+'</p></div></div><div class="numarator "><span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">'+sayisi+'</span></div></div>');

  }





 }




//gelen kutusundaki son mesajları kontrol eder...

    setInterval(function(){
      var kisiler='';
      var yenikisiler='';
       // console.log('kisisayisiii: '+kisisayisi);

      if(true){

        // kisisayisi.forEach(function(a,b){
          
        //   kisiler+=a['ID']+',';


        // });
    
      //console.log('kisiler: >'+kisiler);

      
        
        $.ajax({
        url:'ajaxayar.php?s=mesaj&a=ajaxsorgu&durum=gelenkisiler&bildirimkutusu=0',
        success:function(e){
          var el=$('<div></div>');
          var gelenyenimesaj=$('<div id="gelenyenimesaj" ></div>');

         // console.log('gelen kutusu yenile');
           var data = e.cevap.gelenkisiler;
           var loginID=$('#dmAd').attr('name');
           //alert(loginID);
           var personel_IDgonderenYeni=0;
          //console.log('YENİLEEE: '+data);
          data.forEach(function(key,value){


              if(key.personel_IDgonderen==loginID){

                personel_IDgonderenYeni=key.personel_IDalici;



              }else if(key.personel_IDalici==loginID){
                personel_IDgonderenYeni=key.personel_IDgonderen;


              }
                
              ekle(gelenyenimesaj,el,key.ID,personel_IDgonderenYeni,key.ad,key.tarih,key.mesaj,key.yeniMesaj);


                   


          });$('.inbox_chat').html(el); $('.inbox_chat').prepend(gelenyenimesaj);
          
          
        }


    });




      }
      
    },4000);
    








//DM Yükle VB.

var anahtarr = null;




 function mesajoku(t,durum){
    //  alert('mesaj oku');
        var sayyyy=0;
       var id = $(t).attr('id');
       var dmAd=$(t).attr('value');
        var personel_IDgonderen=$(t).attr('name');
      //alert(dmAd);
 if(durum=='bildirimkutusu'){

personel_IDgonderen=t[0];
dmAd=t[1];

}





//console.log('mesaj oku: '+sayyyy++);
//yenileme durdurma





//  alert('oku');

        //alert(personel_IDgonderen);
    $.ajax({


        url:'ajaxayar.php?s=mesaj&a=ajaxsorgu&durum=mesajcek&id='+id+'&personel_IDgonderen='+personel_IDgonderen,
        success:function(e){
            //var dataMesajlar=e.cevap.verimesajlar;
            var dataDM=e.cevap.mesajDM;

            //console.log(dataDM);

            var el=$('<div></div>');
            $('#dmAd').text(dmAd);
            $('.msg_history').prop('id',personel_IDgonderen);
                        dataDM.forEach(function(k,v){

                if(k.ad!='Ben'){
                 
                  el.append('<div name="'+personel_IDgonderen+'" id="'+k.mesaj_ID+'" class="incoming_msg"><div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div><div class="received_msg"><div class="received_withd_msg"><p>'+k.mesaj+'</p><span class="time_date">'+k.tarih+'</span></div></div></div>');

                }else if(k.ad=='Ben'){
                  
                    el.append('<div id="'+k.mesaj_ID+'" class="outgoing_msg"><div class="sent_msg"><p>'+k.mesaj+'</p><span class="time_date">'+k.tarih+'</span> </div></div>');

                }

                //$('.inbox_chat').append('<div onclick="tikla(this)" id="'+k.id+'" name="'+k.personel_IDgonderen+'" class="chat_list" id="chat" ><div class="chat_people"   ><div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div><div class="chat_ib"><h5>'+k.ad+'<span class="chat_date">'+k.tarih+'</span></h5><p>'+k.konu+'</p></div></div></div>');




            });
            el.append('<div id="capa"></div>');
            $('.msg_history').html(el);

            $('#capa')[0].scrollIntoView(true);



        }
    });






//YENİLEME SÜRESİ




// $('.inbox_chat').click(function(){
//       console.log('deneme interval durdu');
// clearInterval(dMyenile);
//       dMyenile=null;
// });




}


//DM yenile
setInterval(function(){

  var personel_IDgonderen = $('.msg_history').attr('id');
 // console.log('msg history yenileme: '+personel_IDgonderen);
  if(personel_IDgonderen){

    $.ajax({
    url:'ajaxayar.php?s=mesaj&a=ajaxsorgu&durum=dmSon&personel_IDgonderen='+personel_IDgonderen,
    success:function(e){
      // var data=e.cevap.dmSon;
        //console.log('gelenkutusu: '+data + 'ID: '+personel_IDgonderen);
      if(e.cevap.dmSon!=null){

        $('.msg_history').append('<div class="incoming_msg"><div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div><div class="received_msg"><div class="received_withd_msg"><p>'+e.cevap.dmSon[0]['mesaj']+'</p><span class="time_date">'+e.cevap.dmSon[0]['tarih']+'</span></div></div></div>');
       
        $('#capa')[0].scrollIntoView(true);


      }

      //$('.msg_history').append('<div>test</div>');
    }


  });




  }





},4000);



// $('.inbox_chat').click(function(){

//   if(dMyenile!=null){
//     clearInterval(dMyenile);

//     alert('interval temizlendi');

//   }

// });



// function mesajoku(t){ baslaYenile(t); yenile(t);}

// function baslaYenile(t) {
//   if (! anahtarr){anahtarr = setInterval(yenile, 2000);console.log('deneme: yenile basla');}else{console.log('deneme: yenile boss');}


// }

// function durdurYenile() {
//   console.log('deneme: durdur')
//   if (anahtarr)
//   {
//     clearInterval( anahtarr );
//     anahtarr = null;
//     console.log('deneme: timeout giris');
//     setTimeout( baslaYenile, 3000 );
//     console.log('deneme: timeout');
//   }
// }



// baslaYenile();


// $('.inbox_chat').click(function(){

//     durdurYenile();

// });



//ilk yükleme
$(document).ready(function(){



  $('#modalGonder').on('click',function(){

    var modalPersonel_IDalici=$('#modalPersonel_IDalici').val();
    var modalMesaj=$('#modalMesaj').val();
   // var modalAd=$('#modalPersonel_IDalici').text();
    //alert(modalPersonel_IDalici+' '+modalMesaj+' '+modalAd);

    //$('#dmac').prop('href','?s=mesaj&a=gelenkutusu&personel_IDgonderen='+modalPersonal_IDalici+'&ad='+modalAd+'')
    
    
    //console.log('Modal Ad: '+modalAd);
if(modalPersonel_IDalici!=0){

  //alert('ID: '+modalPersonel_IDalici+' MESAJ: '+modalMesaj);
  //$('.inbox_chat').append('<div onclick="mesajoku(this)"  name="'+modalPersonel_IDalici+'" class="chat_list" id="chat" ><div class="chat_people"   ><div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div><div class="chat_ib"><h5>'+modalAd+'<span class="chat_date">Az önce</span></h5><p>'+modalMesaj+'</p></div></div><div class="numarator"></div</div>');
  $.ajax({

    url:'ajaxayar.php?s=mesaj&a=ajaxsorgu&durum=mesajgonder&mesaj='+modalMesaj+'&personel_IDalici='+modalPersonel_IDalici,
    success:function(e){

   //   $('#dmac').click();

    }


  });


}else {alert('lütfen bir alıcı seçiniz...!');}
  
$("#modalForm")[0].reset();

  });


  var $_GET = <?php echo json_encode($_GET); ?>;

 // console.log('posttt: '+$_GET['personel_IDgonderen']);

  if($_GET['personel_IDgonderen']){

      mesajoku([$_GET['personel_IDgonderen'],$_GET['ad']],'bildirimkutusu');



  }else if($_GET['yenimesaj']=='true'){

      $('#modalac').click();


  }

  $('#mesajbox').prop('hidden','true');



  $.ajax({


            url:'ajaxayar.php?s=mesaj&a=ajaxsorgu&durum=gelenmesaj',
            success:function(e){
            //alert('test');
            var dataMesajlar=e.cevap.verimesajlar;
          //  console.log(dataMesajlar);
           // var sayi=say(dataMesajlar);
            var gelenliste=[];
           //console.log(sayi);
            //var el=$('<div class="panelll"></div>');
            //var gelenyenimesaj=$('<div id="gelenyenimesaj" ></div>')



  //     dataMesajlar.forEach(function(k,v){

  // //javascriptte dizilerdeki aynı value sahip elemanların sayısını bulan algoritma yazılacak ve buna göre gruplama yapılacak
  //   if(gelenliste.indexOf(k.personel_IDgonderen)==-1){
  //      sayi.forEach(function(key,value){


  //         if(key['ID']==k.personel_IDgonderen){
  //           --key['sayisi'];
  //              // console.log('BURADAYIMMMM  :'+key['ID']);
  //               ekle(gelenyenimesaj,el,k.id,k.personel_IDgonderen,k.ad,k.tarih,k.konu,key['sayisi']);


  //                 gelenliste.push(k.personel_IDgonderen);



  //               }
  //              });
  //             }
  //           });
            //$('.inbox_chat').html(el);  $('.inbox_chat').prepend(gelenyenimesaj);
        }
    });


  $('.msg_send_btn').on('click',function(){
      var tarih= new Date();
      tarih=tarih.toLocaleTimeString();
     // console.log('tarih: '+tarih);
      var mesaj=$('.write_msg').val();
      $('#mesajYaz').val(' ');
     
      $('.msg_history').append('<div class="outgoing_msg"><div class="sent_msg"><p>'+mesaj+'</p><span class="time_date">'+tarih+'</span> </div></div>');
      $('#capa')[0].scrollIntoView(true);
      //var hg=$('.panelll').height();

     // console.log('test '+hg);
         //  $('.panelll').scrollTo(0,595);
      var personel_IDalici=$('.msg_history').attr('id');
//alert(personel_IDalici);
      $.ajax({
        url:'ajaxayar.php?s=mesaj&a=ajaxsorgu&durum=mesajgonder&mesaj='+mesaj+'&personel_IDalici='+personel_IDalici,
        success:function(e){

           // console.log(e.cevap.gelen);

        }});
    });


  $('.write_msg').keypress(function(event){

        if(event.keyCode=='13'){

        //  alert('mesaj gönderildi');

          $('.msg_send_btn').click();
          

        }

      });




  //document ready sonu
  });


</script>
    </body>
    </html>