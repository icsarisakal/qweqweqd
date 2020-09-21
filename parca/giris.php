<!--div class="ortala">
    	<div class="blok" style="margin-top:3em;">
			<div class="baslik"><h2>PERSONEL GİRİŞİ</h2></div>
			<div class="icerik">
				<form action="" method="post" style="margin:0px;">
					<input type="text" name="kullanici" placeholder="Kul. Adı veya E-posta" style="width:150px;" /><br><input name="sifre" type="password" placeholder="Şifre" style="width:150px;" />
                    <div>Oturumu açık tut:<input type="checkbox" name="hatirla" value="1" /></div>
					<div style="text-align:center; padding:2px;">
						<input type="submit" value="TAMAM" />
					</div>
				</form>
			</div>
		</div>
        </div-->

<style type="text/css">
	body{
		background-color: #f8f8f8;
	}

	.login-container{
		margin-top:2em;
		padding: 1em;
		opacity: 1;
		transition: all 0.8s ease-out;
		-webkit-transition: all 0.8s ease-out;
	}
	.login-box{
		background-image: url("img/logo.jpg");
		background-position: 50px 50px;
		background-size: 140px;
		background-repeat: no-repeat;

		padding-left:280px;
		margin: auto;
		box-sizing: border-box;
		max-width: 540px;
			
		-webkit-box-shadow: 0 0 9px 4px rgba(0,0,0,0.1); 
		-moz-box-shadow: 0 0 9px 4px rgba(0,0,0,0.1);
		box-shadow: 0 0 9px 4px rgba(0,0,0,0.1);

		padding: 2em;
		padding-left: 240px;
		background-color: white;
		border-radius: 30px;
	}
	.login-row{
		padding: 0.4em;
		box-sizing: border-box;
	}
    .login-row .login-input,.login-row .login-input:hover{
    	border:0;
    	background-color: white;
    	padding: 0.4em;
    	padding-left: 1em;
    	margin: 0;
    	font-size: 14pt;
    	color:#333;
    	font-family: arial;
    	width: 100%;
    	display: block;
		box-sizing: border-box;
    	border-radius: 0;

		transition: all 0.4s;
		-webkit-transition: all 0.4s;
		outline: none;
    }
	.login-row .login-input{
		background-color: #f8f8f8;
		border-radius: 40px;
	}
    .login-row .login-input:hover{
    	background-color: #eee;
    }

	@media only screen and (max-width: 600px) {
	    .login-box {
			padding-left:0px;
			padding-top:340px;
			background-position: top;
	    }
	    .login-input{

	    }
		.login-container{
			margin-top:0.7em;
		}
	}
	@media only screen and (max-width: 411px) {
	    .login-box {
			padding-top:300px;
	    }
	}
	@media only screen and (max-width: 320px) {
	    .login-box {
			padding-top:260px;
	    }
	}


</style>
<form action="" method="post">
<div class="login-container" id="login-container">
	<div class="login-box">
		<div class="login-row">
			<input type="text" class="login-input" name="kullanici" placeholder="Kullanıcı Adı" />
		</div>
		<div class="login-row">
			<input name="sifre" type="password" class="login-input"  placeholder="Şifre" />
		</div>
		<div class="login-row">
			<label class="login-input">Oturumu açık tut: <input type="checkbox" name="hatirla" value="1" /></label>
		</div>
		<div class="login-row">
			<input type="submit" class="login-input" value="Giriş Yap" />
		</div>
	</div>
</div>
</form>
<script type="text/javascript">
		document.getElementById('login-container').style.opacity="1";

	window.onload=function(){
		document.body.style.opacity=1;
//		document.getElementById('login-container').style.opacity="1";
	};
</script>