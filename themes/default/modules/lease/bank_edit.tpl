<!-- BEGIN: main -->

<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">{LANG.bank}</div>
	<div class="pl-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item">
						<a href="/"><i class='bx bx-home-alt'></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">{LANG.bank_edit}</li>
				</ol>
			</nav>
		</div>
	<div class="ml-auto">
			<div class="btn-group">
				<a type="button" class="btn btn-success" href="{bank_add}"><i class="lni lni-add-files mrg-r-5"></i>{LANG.add}</a>
				
			</div>
		</div>
</div>


<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.bank_edit}</h4>
		</div>
		<hr/>	
		<!-- BEGIN: error -->
		<div class="alert alert-warning">{ERROR}</div>
		<!-- END: error -->
		<div class="panel panel-default">
			<div class="panel-body">
				<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}/edit" method="post">
					<input type="hidden" name="id" value="{ROW.id}" />
					<div class="form-row">
						<div class="col-md-3 mb-3">
							<label>Tên Công Ty <span class="red">(*)</span></label>
							<select class="form-control" name="companyid">
								<option value=""> - Chọn công ty- </option>
								<!-- BEGIN: select_companyid -->
								<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
								<!-- END: select_companyid -->
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-3 mb-3">
							<label>{LANG.vi_bank_number} <span class="red">(*)</span></label>
							<input class="form-control" type="text" name="vi_bank_number" value="{ROW.vi_bank_number}" />
						</div>
						<div class="col-md-3 mb-3">
							<label>{LANG.vi_bank_account_holder} <span class="red">(*)</span></label>
							<input class="form-control" type="text" name="vi_bank_account_holder" value="{ROW.vi_bank_account_holder}" />
						</div>
						<div class="col-md-3 mb-3">
							<label>{LANG.vi_bank_name} <span class="red">(*)</span></label>
							<input class="form-control" type="text" name="vi_bank_name" value="{ROW.vi_bank_name}" />
						</div>
						<div class="col-md-3 mb-3">
							<label>{LANG.vi_address}<span class="red">(*)</span></label>
							<input class="form-control" type="text" name="vi_address" value="{ROW.vi_address}" />
						</div>
						<div class="col-md-3 mb-3">
							<label>{LANG.en_bank_number} <span class="red">(*)</span></label>
							<input class="form-control" type="text" name="en_bank_number" value="{ROW.en_bank_number}" />
						</div>
						
						<div class="col-md-3 mb-3">
							<label>{LANG.en_bank_account_holder} <span class="red">(*)</span></label>
							<input class="form-control" type="text" name="en_bank_account_holder" value="{ROW.en_bank_account_holder}" />
						</div>
						
						<div class="col-md-3 mb-3">
							<label>{LANG.en_bank_name} <span class="red">(*)</span></label>
							<input class="form-control" type="text" name="en_bank_name" value="{ROW.en_bank_name}" />
						</div>
						
						<div class="col-md-3 mb-3">
							<label>{LANG.en_address} <span class="red">(*)</span></label>
							<input class="form-control" type="text" name="en_address" value="{ROW.en_address}" />
						</div>
						<div class="col-md-3 mb-3">
							<label>{LANG.swiftcode} <span class="red">(*)</span></label>
							<input class="form-control" type="text" name="swiftcode" value="{ROW.swiftcode}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
						</div>
					</div>
					<div class="text-center">
						<button class="btn btn-primary" name="submit" type="submit"><i class="lni lni-save mrg-r-5"></i>{LANG.save}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- END: main -->