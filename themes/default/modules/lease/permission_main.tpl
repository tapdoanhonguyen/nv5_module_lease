<!-- BEGIN: main -->
<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">{LANG.permission}</div>
		<div class="pl-3">
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="/"><i class='bx bx-home-alt'></i></a>
				</li>
				<li class="breadcrumb-item active"><a href="/lease/permission/">{LANG.permission}</a>
				</li>
			</ol>
		</nav>
	</div>
	<div class="ml-auto">
		<div class="btn-group">
			<a type="button" class="btn btn-success" href="{permission_add}"><i class="lni lni-add-files mrg-r-5"></i>{LANG.permission_func_add}</a> 
			<button type="button" class="btn btn-success bg-split-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">	<span class="sr-only">{LANG.permission_func_add}</span>
			</button>
			<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
				<a class="dropdown-item" href="{permission_groups}">{LANG.permission_groups}</a>
				<a class="dropdown-item" href="{permission_users}">{LANG.permission_users}</a>
				<div class="dropdown-divider"></div>	
			</div>
		</div>
	</div>
</div>
<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.permission}</h4>
		</div>
		<hr/>	
		<!-- BEGIN: view -->
		<div class="well">
		<form action="{NV_BASE_SITEURL}index.php" method="get">
			<input type="hidden" name="{NV_LANG_VARIABLE}"  value="{NV_LANG_DATA}" />
			<input type="hidden" name="{NV_NAME_VARIABLE}"  value="{MODULE_NAME}" />
			<input type="hidden" name="{NV_OP_VARIABLE}"  value="{OP}" />
			<div class="form-row">
				<div class="col-md-6 mb-3">
					<div class="input-group">
						<input class="form-control" type="text" value="{Q}" name="q" maxlength="255" placeholder="{LANG.search_title}" />
						<div class="input-group-append">
							<button class="btn btn-primary" type="submit"><i class="lni lni-search-alt mrg-r-5"></i>{LANG.search_submit}</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		</div>
		<form action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
			<div class="table-responsive mb-3">
				<div class="dataTables_wrapper dt-bootstrap4">
					<table id="datatable1" class="table table-striped table-bordered table-hover">
						<thead class="thead-dark">
							<tr>
								<th>Danh mục</th>
								<!-- BEGIN: permission -->
								<th>{PERMISSION.title}</th>
								<!-- END: permission -->
							</tr>
						</thead>
						<!-- BEGIN: generate_page -->
						<tfoot>
							<tr>
								<td class="text-center" colspan="7">{NV_GENERATE_PAGE}</td>
							</tr>
						</tfoot>
						<!-- END: generate_page -->
						<tbody>
							<!-- BEGIN: loop -->
							<tr>
								<td>{VIEW.title}</td>
								<!-- BEGIN: permission_value -->
								<td>
									<div class="custom-control custom-switch">
										<input class="custom-control-input" type="checkbox" name="{VIEW.funccode}_{PERMISSION_VALE.key}" id="change_status_{VIEW.funccode}_{PERMISSION_VALE.key}" value="1" {PERMISSION_VALE.checked}/><label class="custom-control-label" for="change_status_{VIEW.funccode}_{PERMISSION_VALE.key}" data-toggle="tooltip" data-placement="top" title="{LANG.on_off}" data-original-title="{LANG.on_off}"></label>
									</div>
								</td>
								<!-- END: permission_value -->
							</tr>
							<!-- END: loop -->
						</tbody>
					</table>
				</div>
			</div>
			<div class="text-center">
				<button class="btn btn-primary" name="submit" type="submit">
					<i class="lni lni-save mrg-r-5"></i>{LANG.save}
				</button>
			</div>
		</form>
		<!-- END: view -->
	</div>
</div>
<script type="text/javascript">
//<![CDATA[
    function nv_change_weight(id) {
        var nv_timer = nv_settimeout_disable('id_weight_' + id, 5000);
        var new_vid = $('#id_weight_' + id).val();
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=permission&nocache=' + new Date().getTime(), 'ajax_action=1&id=' + id + '&new_vid=' + new_vid, function(res) {
            var r_split = res.split('_');
            if (r_split[0] != 'OK') {
                alert(nv_is_change_act_confirm[2]);
            }
            window.location.href = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=permission';
            return;
        });
        return;
    }


    function nv_change_status(id) {
        var new_status = $('#change_status_' + id).is(':checked') ? true : false;
        if (confirm(nv_is_change_act_confirm[0])) {
            var nv_timer = nv_settimeout_disable('change_status_' + id, 5000);
            $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=permission&nocache=' + new Date().getTime(), 'change_status=1&id='+id, function(res) {
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
		$('#datatable').DataTable();
	});
</script>
<!-- END: main -->




<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<div class="panel panel-default">
<div class="panel-body">
<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <input type="hidden" name="id" value="{ROW.id}" />
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.title}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="title" value="{ROW.title}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.groupid}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <select class="form-control" name="groupid">
                <option value=""> --- </option>
                <!-- BEGIN: select_groupid -->
                <option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
                <!-- END: select_groupid -->
            </select>
        </div>
    </div>
    <div class="form-group" style="text-align: center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
</form>
</div></div>