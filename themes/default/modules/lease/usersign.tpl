<!-- BEGIN: main -->
<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">{LANG.users}</div>
	<div class="pl-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="/"><i class='bx bx-home-alt'></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">{LANG.user_sign}</li>
			</ol>
		</nav>
	</div>
	<div class="ml-auto">
		<div class="btn-group">

		</div>
	</div>
</div>	
<div class="card">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.user_sign}</h4>
		</div>
		<hr/>	
		<!-- BEGIN: error -->
		<div class="alert alert-warning">{ERROR}</div>
		<!-- END: error -->
		<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
			<input type="hidden" name="userid" value="{ROW.userid}" />
			<div class="form-row">
				<div class="col-md-6 mb-3">
					<label>{LANG.sign_vi}</label>
					<input class="form-control" type="text" name="sign_vi" value="{ROW.sign_vi}" />
				</div>
				<div class="col-md-6 mb-3">
					<label>{LANG.image_sign_vi}</label>
					<input class="form-control" type="text" name="image_sign_vi" value="{ROW.image_sign_vi}" />
				</div>
				
				<div class="col-md-6 mb-3">
					<label>{LANG.sign_en}</label>
					<input class="form-control" type="text" name="sign_en" value="{ROW.sign_en}" />
				</div>
				<div class="col-md-6 mb-3">
					<label>{LANG.image_sign_en}</label>
					<input class="form-control" type="text" name="image_sign_en" value="{ROW.image_sign_en}" />
				</div>
			</div>
			<div class="text-center">
				<button class="btn btn-primary" name="submit" type="submit"><i class="lni lni-save mrg-r-5"></i>{LANG.save}</button>
			</div>
		</form>
	</div>
</div>
<!-- END: main -->