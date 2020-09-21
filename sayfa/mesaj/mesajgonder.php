<style>

.mesajformu{

    margin-left:200px;
    margin-top: 100px



}



</style>


<div class="mesajformu" >

<form action="/gonder.php" method="post">
  <div class="form-row align-items-center">
    <div class="col-sm-3 my-1">
      <label>Konu</label>
      <input type="text" class="form-control" id="inlineFormInputName" placeholder="Jane Doe">
    </div>
    <div class="col-sm-3 my-1">
      <label >Gönderilen</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">@</div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Gönderilecek Kişi">
      </div>
    </div>
 
    <div class="col-auto my-1">
      <button class="btn btn-primary">Gonder</button>
    </div>
  </div>
  <div class="form-row align-items-center">
    <textarea name="mesaj" cols="150" rows="10"></textarea>
  
  
  </div>
</form>

</div>