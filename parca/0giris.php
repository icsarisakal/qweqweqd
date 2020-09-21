
<style>
	.navbar{
		display:none !important;
	}
	.arkaplan{
		background-color: rgba(0, 0, 0, 0);
	    background-repeat: no-repeat;
	    background-image: url(img/kayteksbg.jpg);
	    background-size: cover;
	    background-position: center top;
	    width: 100%;
	    height: 100%;
	    opacity: 1;
	    visibility: inherit;
	    position: fixed;
	}
</style>
<div class="arkaplan"></div>
<div class="navbar navbar-expand-md navbar-light">

		<!-- Header with logos -->
		<div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
			<div class="navbar-brand navbar-brand-md">
				<a href="index.html" class="d-inline-block">
					<img src="global_assets/images/logo_light.png" alt="">
				</a>
			</div>
			
			<div class="navbar-brand navbar-brand-xs">
				<a href="index.html" class="d-inline-block">
					<img src="global_assets/images/logo_icon_light.png" alt="">
				</a>
			</div>
		</div>
		<!-- /header with logos -->
	

		<!-- Mobile controls -->
		<div class="d-flex flex-1 d-md-none">
			<div class="navbar-brand mr-auto">
				<a href="index.html" class="d-inline-block">
					<img src="global_assets/images/logo_dark.png" alt="">
				</a>
			</div>	

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>

			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>
		<!-- /mobile controls -->


		<!-- Navbar content -->
		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>

				
			</ul>

			<span class=" ml-md-3 mr-md-auto">&nbsp;</span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
												<img src="global_assets/images/demo/users/face1.jpg" class="rounded-circle mr-2" height="34" alt="">
						<span>Yetkili Adı</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-switch2"></i> Çıkış Yap</a>
					</div>
				</li>
			</ul>
		</div>
		<!-- /navbar content -->
		
	</div>
<!-- Page content -->
<div class="page-content">
	<!-- Main content -->
	<div class="content-wrapper">
		<div class="content d-flex justify-content-center align-items-center">

			<!-- Login form -->
			<form class="login-form" action="" style="margin-top: 60px;">
				<div class="card mb-0">
					<div class="card-body">
						<div class="text-center mb-3">
							<img src="img/kaytekslogo.png" class="img-fluid" style="width:110px;">
							<h5 class="mb-0">Hesabınıza giriş yapın</h5>
						</div>

						<div class="form-group form-group-feedback form-group-feedback-left">
							<input type="text" class="form-control" placeholder="Kullanıcı Adı" name="kullanici">
							<div class="form-control-feedback" style="margin-top: 10px;">
								<i class="icon-user text-muted"></i>
							</div>
						</div>

						<div class="form-group form-group-feedback form-group-feedback-left">
							<input type="password" class="form-control" placeholder="Şifre" name="sifre">
							<div class="form-control-feedback" style="margin-top: 10px;">
								<i class="icon-lock2 text-muted"></i>
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Giriş yap <i class="icon-circle-right2 ml-2"></i></button>
						</div>

						<div class="text-center">
						</div>
					</div>
				</div>
			</form>
			<!-- /login form -->

		</div>
	</div>
	<!-- /main content -->
</div>
