<?php require ("0header.php"); ?>
<style>
	.navbar{
		display:none !important;
	}
</style>
<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login form -->
				<form class="login-form" action="index.html">
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
								<h5 class="mb-0">Hesabınıza giriş yapın</h5>
								<span class="d-block text-muted">Kimlik bilgilerinizi aşağıya girin</span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control" placeholder="Kullanıcı Adı">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" class="form-control" placeholder="Şifre">
								<div class="form-control-feedback">
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
	<!-- /page content -->
	</body>
</html>