<!-- BEGIN: main -->

<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">



<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">{LANG.service}</div>
	<div class="pl-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item">
						<a href="/"><i class='bx bx-home-alt'></i></a>
					</li>
					<li class="breadcrumb-item" aria-current="page">{LANG.service}</li>
					<li class="breadcrumb-item active" aria-current="page">{LANG.service_edit}</li>
				</ol>
			</nav>
		</div>
	<div class="ml-auto">
			<div class="btn-group">
				<a type="button" class="btn btn-primary" href="{service_add}">{LANG.add}</a>
			</div>
		</div>
</div>
		
<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.service_edit}</h4>
		</div>
		<hr/>
		<!-- BEGIN: error -->
		<div class="alert alert-warning">{ERROR}</div>
		<!-- END: error -->
		<div class="panel panel-default">
		<div class="panel-body">
		<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}/edit" method="post">
			<input type="hidden" name="sid" value="{ROW.sid}" />
			<div class="form-group">
				<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.service_title}</strong> <span class="red">(*)</span></label>
				<div class="col-sm-19 col-md-20">
					<input class="form-control" type="text" name="title" value="{ROW.title}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.catid}</strong> <span class="red">(*)</span></label>
				<div class="col-sm-19 col-md-20">
					<select class="form-control" name="catid">
						<option value=""> --- </option>
						<!-- BEGIN: select_catid -->
						<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
						<!-- END: select_catid -->
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.unitid}</strong> <span class="red">(*)</span></label>
				<div class="col-sm-19 col-md-20">
					<select class="form-control" name="unitid">
						<option value=""> --- </option>
						<!-- BEGIN: select_unitid -->
						<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
						<!-- END: select_unitid -->
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.price_usd}</strong></label>
				<div class="col-sm-19 col-md-20">
					<input class="form-control" type="text" name="price_usd" value="{ROW.price_usd}" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.price_vnd}</strong></label>
				<div class="col-sm-19 col-md-20">
					<input class="form-control" type="text" name="price_vnd" value="{ROW.price_vnd}" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.chargeid}</strong> <span class="red">(*)</span></label>
				<div class="col-sm-19 col-md-20">
					<select class="form-control" name="chargeid">
						<option value=""> --- </option>
						<!-- BEGIN: select_chargeid -->
						<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
						<!-- END: select_chargeid -->
					</select>
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
</div></div>
<script type="text/javascript">
//<![CDATA[
    function nv_change_weight(id) {
        var nv_timer = nv_settimeout_disable('id_weight_' + id, 5000);
        var new_vid = $('#id_weight_' + id).val();
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=service&nocache=' + new Date().getTime(), 'ajax_action=1&sid=' + id + '&new_vid=' + new_vid, function(res) {
            var r_split = res.split('_');
            if (r_split[0] != 'OK') {
                alert(nv_is_change_act_confirm[2]);
            }
            window.location.href = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=service';
            return;
        });
        return;
    }


    function nv_change_status(id) {
        var new_status = $('#change_status_' + id).is(':checked') ? true : false;
        if (confirm(nv_is_change_act_confirm[0])) {
            var nv_timer = nv_settimeout_disable('change_status_' + id, 5000);
            $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=service&nocache=' + new Date().getTime(), 'change_status=1&sid='+id, function(res) {
                var r_split = res.split('_');
                if (r_split[0] != 'OK') {
                    alert(nv_is_change_act_confirm[2]);
                }
            });
        }
        else{
            $('#change_status_' + id).prop('checked', new_status ? false : true);
        }
        return;
    }


//]]>
</script>

<script src="/themes/softs/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function () {
			//Default data table
			$('#example').DataTable();
		});
	</script>
	
<!-- END: main -->