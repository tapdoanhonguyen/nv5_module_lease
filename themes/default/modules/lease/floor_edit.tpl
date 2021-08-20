<!-- BEGIN: main -->

<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">{LANG.floor}</div>
	<div class="pl-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item">
						<a href="/"><i class='bx bx-home-alt'></i></a>
					</li>
					<li class="breadcrumb-item" aria-current="page">{LANG.floor}</li>
					<li class="breadcrumb-item active" aria-current="page">{LANG.floor_edit}</li>
				</ol>
			</nav>
		</div>
	<div class="ml-auto">
			<div class="btn-group">
				<a type="button" class="btn btn-primary" href="{FLOOR_ADD}">{LANG.add}</a>
			</div>
		</div>
</div>

<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.floor_edit}</h4>
		</div>
		<hr/>
		<!-- BEGIN: error -->
			<div class="alert alert-warning">{ERROR}</div>
		<!-- END: error -->
		<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
			<input type="hidden" name="fid" value="{ROW.fid}" />
			
			<div class="form-row">
				<div class="col-md-6 mb-3">
					<label>{LANG.title} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="title" value="{ROW.title}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
				<div class="col-md-6 mb-3">
					<label>{LANG.alias} <span class="red">(*)</span></label>
					<div class="input-group">
						<input class="form-control" type="text" name="alias" value="{ROW.alias}" id="id_alias" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
						<div class="input-group-append">
							<button onclick="nv_get_alias('id_alias');" class="btn btn-outline-secondary" type="button">
								<i class="fa fa-refresh fa-lg icon-pointer">&nbsp;</i>
							</button>
						</div>
					</div>
				</div>
			</div>
				
			<div class="form-row">
				<div class="col-md-4 mb-3">	
					<label>{LANG.area} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="area" value="{ROW.area}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
				<div class="col-md-4 mb-3">	
					<label>{LANG.common_area} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="common_area" value="{ROW.common_area}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
				<div class="col-md-4 mb-3">	
					<label>{LANG.area_for_rent}</label>
					<input class="form-control" type="text" name="area_for_rent" value="{ROW.area_for_rent}" />
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-4 mb-3">	
					<label>{LANG.elevator}</label>
						<!-- BEGIN: radio_elevator -->
							<label><input class="form-control" type="radio" name="elevator" value="{OPTION.key}" {OPTION.checked}>{OPTION.title} &nbsp;</label> 
						<!-- END: radio_elevator -->
				</div>
				<div class="col-md-4 mb-3">	
					<label><strong>{LANG.stair}</strong></label>
					<!-- BEGIN: radio_stair -->
						<label><input class="form-control" type="radio" name="stair" value="{OPTION.key}" {OPTION.checked}>{OPTION.title} &nbsp;</label> 
					<!-- END: radio_stair -->
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-12 mb-3">
					<label>{LANG.image}</label>
					<input class="form-control" type="text" name="image" value="{ROW.image}" />
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-12 mb-3">
					<label>{LANG.note}</label>
					<div class="col-sm-19 col-md-20">
						{ROW.note}
					</div>
				</div>
			</div>
			<input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" />
		</form>
	</div>
</div>



<!-- END: main -->

