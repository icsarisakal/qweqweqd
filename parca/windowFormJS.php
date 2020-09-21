<style>
#silSub{
    display:initial !important;
    outline:none;
}
.btn{
    display:initial !important;
    outline:none;
}
</style>
<script>
    let keyWindow='false';
    $('input').change(function(){keyWindow='true';});
    $('input').keyup(function(){keyWindow='true';});
    $('select').on('change',function(){keyWindow='true';});
    $('form').submit(function(){keyWindow='false';})
    window.addEventListener('beforeunload', function (e) { console.log(keyWindow); if(keyWindow=='true'){e.preventDefault();e.returnValue = ''; } }); 
</script>