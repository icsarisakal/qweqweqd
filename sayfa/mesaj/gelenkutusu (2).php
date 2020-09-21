 
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


</style>

</head>
<body>

<div class="container">
<h3 class=" text-center">Messaging</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
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
            
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div> -->


            
          </div>     <!---->


        </div>





        <!--mesajlaşma alanı -->
        <div class="mesgs">
          <div class="msg_history">

        



        </div>
        
        <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" class="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
      </div>
      
      
      
      
    </div></div>


    <script>
 
 function say(array){

var sayisi=0;
var obje=null;
var geciciarray=[];
var yeniarray=[];
var yeninesne={};
  array.forEach(function(item,index){

    geciciarray.push(item['personel_IDgonderen']);

    

  });

console.log('gecici :'+geciciarray);
  for (var i = 0; i < geciciarray.length; i++) {


    if(geciciarray[i]==obje){

      sayisi++;


    }else if(geciciarray[i]!=obje){

      if(sayisi>0){

        yeniarray.push({
        'ID':obje,
        'sayisi':sayisi

      });
      obje=geciciarray[i];
      sayisi=1;


      }
      
    }
    
  }
 return yeniarray;
    
 }
 

 setInterval(function(){ 
     console.log('yenileme');
     
    $.ajax({


            url:'ajaxayar.php?s=mesaj&a=ajaxsorgu&durum=gelenmesaj',
            success:function(e){
            //alert('test');
            var dataMesajlar=e.cevap.verimesajlar;
           // console.log(dataMesajlar);
            var el=$('<div></div>');
            dataMesajlar.forEach(function(k,v){
              
              
              
                el.append('<div onclick="mesajoku(this)" id="'+k.id+'" name="'+k.personel_IDgonderen+'" class="chat_list" id="chat" ><div class="chat_people"   ><div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div><div class="chat_ib"><h5>'+k.ad+'<span class="chat_date">'+k.tarih+'</span></h5><p>'+k.konu+'</p></div></div><div class="numarator">5</div</div>');
            });
            $('.inbox_chat').html(el);
        }
    });
}, 30000);


 function mesajoku(t){
     alert('oku');
        var id = $(t).attr('id');
        var personel_IDgonderen= $(t).attr('name');
        //alert(personel_IDgonderen);
    $.ajax({


        url:'ajaxayar.php?s=mesaj&a=ajaxsorgu&durum=mesajcek&id='+id+'&personel_IDgonderen='+personel_IDgonderen,
        success:function(e){
            //var dataMesajlar=e.cevap.verimesajlar;
            var dataDM=e.cevap.mesajDM;
            
            console.log(dataDM);
            
            var el=$('<div></div>');
            dataDM.forEach(function(k,v){
                console.log(v);
                if(k.ad!='Ben'){

                  el.append('<div id="'+k.mesaj_ID+'" class="incoming_msg"><div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div><div class="received_msg"><div class="received_withd_msg"><p>'+k.mesaj+'</p><span class="time_date">'+k.tarih+'</span></div></div></div>');  

                }else if(k.ad=='Ben'){
                    el.append('<div id="'+k.mesaj_ID+'" class="outgoing_msg"><div class="sent_msg"><p>'+k.mesaj+'</p><span class="time_date">'+k.tarih+'</span> </div></div>');

                }

                //$('.inbox_chat').append('<div onclick="tikla(this)" id="'+k.id+'" name="'+k.personel_IDgonderen+'" class="chat_list" id="chat" ><div class="chat_people"   ><div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div><div class="chat_ib"><h5>'+k.ad+'<span class="chat_date">'+k.tarih+'</span></h5><p>'+k.konu+'</p></div></div></div>');




            });

            $('.msg_history').html(el);
    
        }
    });

}

 

$(document).ready(function(){

  
  $.ajax({


            url:'ajaxayar.php?s=mesaj&a=ajaxsorgu&durum=gelenmesaj',
            success:function(e){
            //alert('test');
            var dataMesajlar=e.cevap.verimesajlar;
            console.log(dataMesajlar);
            var sayi=say(dataMesajlar);
           console.log(sayi);
            var el=$('<div></div>');
            
            
            dataMesajlar.forEach(function(k,v){
              
                //javascriptte dizilerdeki aynı value sahip elemanların sayısını bulan algoritma yazılacak ve buna göre gruplama yapılacak



                el.append('<div onclick="mesajoku(this)" id="'+k.id+'" name="'+k.personel_IDgonderen+'" class="chat_list" id="chat" ><div class="chat_people"   ><div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div><div class="chat_ib"><h5>'+k.ad+'<span class="chat_date">'+k.tarih+'</span></h5><p>'+k.konu+'</p></div></div><div class="numarator">5</div</div>');
          
          
          
            });
            $('.inbox_chat').html(el);
        }
    });
   
    
  //  $('.inbox_chat').children().css('color','red');
    // $('.inbox_chat').on("click",".chat_list", function(){
                
    //             aler('tedaew');
    //          }); 

    
   // $('.inbox_chat').find('.chat_list').text('tes');
    
  

   
  //  $('.inbox_chat').append('<div class="chat_list"><div class="chat_people"><div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div><div class="chat_ib"><h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5><p>Test, which is a new approach to have all solutions astrology under one roof.</p></div></div></div>');

  //  $('.inboxchat')
});


</script>
    </body>
    </html>