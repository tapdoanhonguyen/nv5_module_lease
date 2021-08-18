<!-- BEGIN: main -->

<div class="well" style="display:none">
<form action="{NV_BASE_SITEURL}index.php" method="get">
    <input type="hidden" name="{NV_LANG_VARIABLE}"  value="{NV_LANG_DATA}" />
    <input type="hidden" name="{NV_NAME_VARIABLE}"  value="{MODULE_NAME}" />
    <input type="hidden" name="{NV_OP_VARIABLE}"  value="{OP}" />
    <div class="row">
        <div class="col-xs-24 col-md-6">
            <div class="form-group">
                <input class="form-control" type="text" value="{Q}" name="q" maxlength="255" placeholder="{LANG.search_title}" />
            </div>
        </div>
        <div class="col-xs-12 col-md-3">
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="{LANG.search_submit}" />
            </div>
        </div>
    </div>
</form>
</div>
<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

		
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">Sản phẩm</div>
	<div class="pl-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="/"><i class='bx bx-home-alt'></i></a>
									</li>
									<li class="breadcrumb-item"><a href="/lease/product/">{LANG.product}</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">{LANG.product_add}</li>
								</ol>
							</nav>
						</div>
	<div class="ml-auto">
							<div class="btn-group">
								<a type="button" class="btn btn-primary" href="{PRODUCT_ADD}">{LANG.product_add}</a> 
								<button type="button" class="btn btn-primary bg-split-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">	<span class="sr-only">{LANG.product_more}</span>
								</button>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
									<a class="dropdown-item" href="{PRODUCT_IMPORT}">{LANG.product_import}</a>
									<a class="dropdown-item" href="{PRODUCT_EXPORT}">{LANG.product_export}</a>
									<div class="dropdown-divider"></div>	
								</div>
							</div>
						</div>
</div>
		
		<div class="card">
			<div class="card-body">
				<div class="card-title">
					<h4 class="mb-0">{LANG.product_add}</h4>
				</div>
				<hr/>	
				<!-- BEGIN: error -->
				<div class="alert alert-warning">{ERROR}</div>
				<!-- END: error -->
				<div class="panel panel-default">
				<div class="panel-body">
				<form class="form-horizontal" action="{PRODUCT_ADD}" method="post">
					<input type="hidden" name="pid" value="{ROW.pid}" />
					<div class="form-group">
						<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.fid}</strong> <span class="red">(*)</span></label>
						<div class="col-sm-19 col-md-20">
							<select class="form-control" name="fid">
								<option value=""> --- </option>
								<!-- BEGIN: select_fid -->
								<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
								<!-- END: select_fid -->
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.title_product}</strong> <span class="red">(*)</span></label>
						<div class="col-sm-19 col-md-20">
							<input class="form-control" type="text" name="title" value="{ROW.title}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.area}</strong> <span class="red">(*)</span></label>
						<div class="col-sm-19 col-md-20">
							<input class="form-control" type="text" name="area" value="{ROW.area}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.price_usd_min}</strong> <span class="red">(*)</span></label>
						<div class="col-sm-19 col-md-20">
							<input class="form-control" type="text" name="price_usd_min" value="{ROW.price_usd_min}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.price_usd_max}</strong> <span class="red">(*)</span></label>
						<div class="col-sm-19 col-md-20">
							<input class="form-control" type="text" name="price_usd_max" value="{ROW.price_usd_max}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.price_vnd_min}</strong> <span class="red">(*)</span></label>
						<div class="col-sm-19 col-md-20">
							<input class="form-control" type="text" name="price_vnd_min" value="{ROW.price_vnd_min}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.price_vnd_max}</strong> <span class="red">(*)</span></label>
						<div class="col-sm-19 col-md-20">
							<input class="form-control" type="text" name="price_vnd_max" value="{ROW.price_vnd_max}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.rent_status}</strong> <span class="red">(*)</span></label>
						<div class="col-sm-19 col-md-20">
							<select class="form-control" name="rent_status">
								<option value=""> --- </option>
								<!-- BEGIN: select_rent_status -->
								<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
								<!-- END: select_rent_status -->
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.image}</strong></label>
						<div class="col-sm-19 col-md-20">
							<div class="input-group">
							<input class="form-control" type="text" name="image" value="{ROW.image}" id="id_image" />
							<span class="input-group-btn">
								<button class="btn btn-default selectfile" type="button" >
								<em class="fa fa-folder-open-o fa-fix">&nbsp;</em>
							</button>
							</span>
						</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.note}</strong></label>
						<div class="col-sm-19 col-md-20">
				{ROW.note}        </div>
					</div>
					<div class="form-group" style="text-align: center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
				</form>
				</div></div>

				<script type="text/javascript">
				//<![CDATA[
					$(".selectfile").click(function() {
						var area = "id_image";
						var path = "{NV_UPLOADS_DIR}/{MODULE_UPLOAD}";
						var currentpath = "{NV_UPLOADS_DIR}/{MODULE_UPLOAD}";
						var type = "image";
						nv_open_browse(script_name + "?" + nv_name_variable + "=upload&popup=1&area=" + area + "&path=" + path + "&type=" + type + "&currentpath=" + currentpath, "NVImg", 850, 420, "resizable=no,scrollbars=no,toolbar=no,location=no,status=no");
						return false;
					});

				//]]>
				</script>
			</div>
		</div>	
 
<script src="/themes/softs/js/jquery.dataTables.min.js"></script>


<!-- END: main -->

