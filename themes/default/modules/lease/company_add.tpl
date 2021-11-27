<!-- BEGIN: main -->
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">{LANG.company}</div>
	<div class="pl-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item">
					<a href="/"><i class='bx bx-home-alt'></i></a>
				</li>
				<li class="breadcrumb-item" aria-current="page">{LANG.company}</li>
				<li class="breadcrumb-item active" aria-current="page">{LANG.company_add}</li>
			</ol>
		</nav>
	</div>
	<div class="ml-auto">
		<div class="btn-group">
			<a type="button" class="btn btn-primary" href="{company_add}"><i class="lni lni-add-files mrg-r-5"></i>{LANG.add}</a>
		</div>
	</div>
</div>
<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.company}</h4>
		</div>
		<hr/>	
		<!-- BEGIN: error -->
		<div class="alert alert-warning">{ERROR}</div>
		<!-- END: error -->
		<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}/add" method="post">
			<input type="hidden" name="cid" value="{ROW.cid}" />
			<div class="form-group">
				<label>{LANG.companycode} <span class="red">(*)</span></label>
				<input class="form-control" type="text" name="companycode" value="{ROW.companycode}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
			</div>
			<div class="form-row">
				<div class="col-md-6 mb-3">
					<label>{LANG.vi_title} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="vi_title" value="{ROW.vi_title}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
				<div class="col-md-6 mb-3">
					<label>{LANG.vi_address} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="vi_address" value="{ROW.vi_address}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
				<div class="col-md-6 mb-3">
					<label>{LANG.vi_province} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="vi_province" value="{ROW.vi_province}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
			</div>
			<hr />
			<div class="form-row">
				<div class="col-md-6 mb-3">
					<label>{LANG.en_title} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="en_title" value="{ROW.en_title}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
				<div class="col-md-6 mb-3">
					<label>{LANG.en_address} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="en_address" value="{ROW.en_address}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
				<div class="col-md-6 mb-3">
					<label>{LANG.en_province} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="en_province" value="{ROW.en_province}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
			</div>
			<hr />
			<div class="form-row">
				<div class="col-md-4 mb-3">
					<label>{LANG.phone} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="phone" value="{ROW.phone}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
				<div class="col-md-4 mb-3">
					<label>{LANG.fax} </label>
					<input class="form-control" type="text" name="fax" value="{ROW.fax}"  oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
				<div class="col-md-4 mb-3">
					<label>{LANG.email}</label>
					<input class="form-control" type="text" name="email" value="{ROW.email}" />
				</div>
			</div>
			<div class="text-center">
					<button class="btn btn-primary" name="submit" type="submit"><i class="lni lni-save mrg-r-5"></i>{LANG.save}</button>
				</div>
		</form>
	</div>
</div>
<!-- END: main -->