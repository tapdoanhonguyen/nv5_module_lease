<!-- BEGIN: main -->
<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">{LANG.floor}</div>
	<div class="pl-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item">
						<a href="/"><i class='bx bx-home-alt'></i></a>
					</li>
					<li class="breadcrumb-item" aria-current="page">{LANG.floor}</li>
					<li class="breadcrumb-item active" aria-current="page">{LANG.floor_add}</li>
				</ol>
			</nav>
		</div>
	<div class="ml-auto">
			<div class="btn-group">
				<a type="button" class="btn btn-primary" href="{FLOOR_ADD}">{LANG.add}</a>
				
			</div>
		</div>
</div>

<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <input type="hidden" name="fid" value="{ROW.fid}" />
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.title}</strong> <span class="red">(*)</span></label>
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
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.common_area}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="common_area" value="{ROW.common_area}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.area_for_rent}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="area_for_rent" value="{ROW.area_for_rent}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.elevator}</strong></label>
        <div class="col-sm-19 col-md-20">

            <!-- BEGIN: radio_elevator -->
                <label><input class="form-control" type="radio" name="elevator" value="{OPTION.key}" {OPTION.checked}>{OPTION.title} &nbsp;</label> 
            <!-- END: radio_elevator -->
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.stair}</strong></label>
        <div class="col-sm-19 col-md-20">

            <!-- BEGIN: radio_stair -->
                <label><input class="form-control" type="radio" name="stair" value="{OPTION.key}" {OPTION.checked}>{OPTION.title} &nbsp;</label> 
            <!-- END: radio_stair -->
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.image}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="image" value="{ROW.image}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.note}</strong></label>
        <div class="col-sm-19 col-md-20">
{ROW.note}        </div>
    </div>
    <div class="form-group" style="text-align: center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
</form>




<!-- END: main -->

