<style type="text/css">
    form.nt-form{
        display: table;
        width: 100%;
        -webkit-box-shadow: 0 0 9px 1px rgba(0,0,0,0.3); 
        -moz-box-shadow: 0 0 9px 1px rgba(0,0,0,0.3);
        box-shadow: 0 0 9px 1px rgba(0,0,0,0.3);
    }
    form.nt-form .nt-form-sol{
        display: inline-table;
        background-color: red;
        width: 70%;
    }
    form.nt-form .nt-form-sag{
        background-color: #0ff;
        display: inline-table;
        width: 30%;
    }
    form.nt-form .nt-form-sol textarea{
        margin: 0;
        padding: 0.6em;
        display: inline-table;
        min-height: 100px;
        border:0;
        background-color: white;
        width: 100%;
        box-sizing: border-box;
        outline-style: none;
    }
    form.nt-form .nt-form-sag input{
        margin: 0;
        padding: 0.6em; 
        display: inline-table;
        min-height: 100px;
        border:0;
        background-color: white;
        width: 100%;
        border-left:1px solid #aaa;
        box-sizing: border-box;
    }
    form.nt-form .nt-form-sag input:active{
        background-color: #eee;
    }

    ul.notlar{
        margin: 0;
        padding: 0;
        list-style: none;
        display: table;
        width: 100%;
    }
    ul.notlar li{
        display: inline-table;
        padding: 0.6em;
        vertical-align: top;
        width: 33%;
        box-sizing: border-box;
    }
    ul.notlar li .nt-container{
        padding: 0.6em 0.6em 40px 0.6em;
        min-height: 100px;
        background-color: #fff;
        -webkit-box-shadow: 0 0 9px 1px rgba(0,0,0,0.3); 
        -moz-box-shadow: 0 0 9px 1px rgba(0,0,0,0.3);
        box-shadow: 0 0 9px 1px rgba(0,0,0,0.3);
        position: relative;
        box-sizing: border-box;
    }
    ul.notlar li.nt-drm-1 .nt-container{
        background-color: #cfc;
    }
    ul.notlar li .nt-container .nt-durumcubugu{
        position: absolute;
        bottom:0;
        left: 0; 
        right: 0;
        padding: 0.6em;
    }

    ul.notlar li .nt-container .nt-durumcubugu .nt-drm-btn{
        padding: 0.4em;
        padding-left: 2.2em;
        font-size: 7pt;
        color: #444;
        text-decoration: none;
        text-indent: 30px;
        background-color: #eee;
        background-repeat: no-repeat;
        background-size: contain;
        border:1px solid #fff;
    }
     ul.notlar li .nt-container .nt-durumcubugu .nt-drm-btn:active{
        background-color: #fee;
    }
    ul.notlar li .nt-container .nt-durumcubugu .nt-drm-btn-0{
        background-image:url(img/drm.png);
    }
    ul.notlar li .nt-container .nt-durumcubugu .nt-drm-btn-1{
        background-image:url(img/drm1.png);
    }
    ul.notlar li .nt-container .nt-durumcubugu .nt-drm-btn-2{
        background-image:url(img/dsy/rar.png);
    }
    ul.notlar li .nt-container .nt-durumcubugu .nt-drm-btn-3{
        background-image:url(img/drm0.png);
    }
    ul.notlar li .nt-container .nt-durumcubugu .nt-drm-btn-4{
        background-image:url(img/geri.png);
    }
    @media only screen and (max-width: 500px) {
        ul.notlar li {
            display: block;
            width: 100%;
        }
    }
</style>