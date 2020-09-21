<!-- Content area -->
<div class="content pt-0">
	<!-- Dashboard content -->
	<div class="row">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-body">
					<form action="#">
						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Text input</label>
							<div class="col-lg-9">
								<input type="text" class="form-control">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Password</label>
							<div class="col-lg-9">
								<input type="password" class="form-control">
							</div>
						</div>

						<div class="form-group row">
						    <label class="col-lg-3 col-form-label">Kayıt Tarihi</label>
						    <div class="input-group col-lg-9">
						        <span class="input-group-prepend">
						            <span class="input-group-text"><i class="icon-calendar22"></i></span>
						        </span>
						        <input type="text" class="form-control yenitarih"  name="[tarihKayit]" value="">
						    </div>
						</div>

						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Select</label>
							<div class="col-lg-9">
								<select class="form-control select-search" data-fouc>
									<option value="AZ">Arizona</option>
									<option value="CO">Colorado</option>
									<option value="ID">Idaho</option>
									<option value="WY">Wyoming</option>
								</select>
							</div>
						</div>

						<div class="form-group pt-2">
							<label class="font-weight-semibold">Left stacked styled</label>
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" class="form-check-input-styled" name="stacked-radio-left" checked>
									Selected styled
								</label>
							</div>

							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" class="form-check-input-styled" name="stacked-radio-left">
									Unselected styled
								</label>
							</div>

							<div class="form-check disabled">
								<label class="form-check-label">
									<input type="radio" class="form-check-input-styled" disabled>
									Disabled styled
								</label>
							</div>
						</div>

						<div class="form-group">
							<label class="d-block font-weight-semibold">Left inline checkboxes</label>
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" class="custom-control-input" id="custom_checkbox_inline_unchecked" checked>
								<label class="custom-control-label" for="custom_checkbox_inline_unchecked">Custom checked</label>
							</div>

							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" class="custom-control-input" id="custom_checkbox_inline_checked">
								<label class="custom-control-label" for="custom_checkbox_inline_checked">Custom unchecked</label>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Textarea</label>
							<div class="col-lg-9">
								<textarea rows="5" cols="5" class="form-control" placeholder="Default textarea"></textarea>
							</div>
						</div>

						<div class="text-right">
							<button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /dashboard content -->
</div>
<!-- /content area -->