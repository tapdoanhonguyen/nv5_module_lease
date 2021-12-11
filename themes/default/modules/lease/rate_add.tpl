<!-- BEGIN: main -->
<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">{LANG.rate}</div>
	<div class="pl-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item">
					<a href="/"><i class='bx bx-home-alt'></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Thêm tỷ giá</li>
			</ol>
		</nav>
	</div>
	<div class="ml-auto">
		<div class="btn-group">
			<a type="button" class="btn btn-success" href="{rate_add}"><i class="lni lni-add-files mrg-r-5"></i>{LANG.add}</a>
			
		</div>
	</div>
</div>
<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.rate}</h4>
		</div>
		<hr/>
		<!-- BEGIN: error -->
		<div class="alert alert-warning">{ERROR}</div>
		<!-- END: error -->
		<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}/add" method="post">
			<input type="hidden" name="id" value="{ROW.id}" />
			 <div class="form-group">
				<label>{LANG.mount} <span class="red">(*)</span></label>
				<select class="form-control" name="mount">
					<option value=""> --- </option>
					<!-- BEGIN: select_mount -->
					<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
					<!-- END: select_mount -->
				</select>
			</div>
			<div class="form-group">
				<label>{LANG.year} <span class="red">(*)</span></label>
				<select class="form-control" name="year">
					<option value=""> --- </option>
					<!-- BEGIN: select_year -->
					<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
					<!-- END: select_mount -->
				</select>
			</div>
			<div class="form-group">
				<label>{LANG.exchange_rate} <span class="red">(*)</span></label>
				<input class="form-control" type="text" name="exchange_rate" value="{ROW.exchange_rate}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" required="required" />
			</div>
			<div class="text-center">
				<button class="btn btn-primary" name="submit" type="submit"><i class="lni lni-save mrg-r-5"></i>{LANG.save}</button>
			</div>
		</form>
	</div>
</div>		
<!-- END: main -->