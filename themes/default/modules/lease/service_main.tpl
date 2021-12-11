<!-- BEGIN: main -->
<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">Dịch vụ</div>
	<div class="pl-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item">
					<a href="/"><i class='bx bx-home-alt'></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Danh sách dịch vụ</li>
			</ol>
		</nav>
	</div>
	<div class="ml-auto">
		<div class="btn-group">
			<a type="button" class="btn btn-success" href="{service_add}"><i class="lni lni-add-files mrg-r-5"></i>{LANG.add}</a>
		</div>
	</div>
</div>

<!-- BEGIN: view -->
<form action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
	<div class="card">
		<div class="card-body">
			<div class="card-title">
				<h4 class="mb-0">Danh sách dịch vụ</h4>
			</div>
			<hr/>	
			
				<div class="dataTables_wrapper dt-bootstrap4">
					<table id="datatable" class="table table-striped table-bordered dataTable">
						<thead class="thead-dark">
							<tr>
								<th>{LANG.number}</th>
								<th>{LANG.func}</th>
								<th>{LANG.service_code}</th>
								<th>{LANG.service_title_vi}</th>
								<th>{LANG.service_title_en}</th>
								<th>{LANG.catid}</th>
								<th>{LANG.unitid}</th>
								<th>{LANG.price_usd}</th>
								<th>{LANG.price_vnd}</th>
								<th class="text-center">{LANG.rent_status1}</th>
							</tr>
						</thead>
						<!-- BEGIN: generate_page -->
						<tfoot>
							<tr>
								<td class="text-center" colspan="8">{NV_GENERATE_PAGE}</td>
							</tr>
						</tfoot>
						<!-- END: generate_page -->
						<tbody>
							<!-- BEGIN: loop -->
							<tr>
								<td>
									<select class="form-control" id="id_weight_{VIEW.sid}" onchange="nv_change_weight('{VIEW.sid}');">
									<!-- BEGIN: update_time_loop -->
										<option value="{WEIGHT.key}"{WEIGHT.selected}>{WEIGHT.title}</option>
									<!-- END: update_time_loop -->
									</select>
								</td>
								<td class="text-center">
									<a class="large-icons-btn btn btn-primary" href="{VIEW.link_edit}#edit" data-toggle="tooltip" data-placement="top" title="{LANG.edit}" data-original-title="{LANG.edit}"><i class="lni lni-pencil"></i></a>&nbsp;&nbsp;
									<a class="large-icons-btn btn btn-danger" href="{VIEW.link_delete}" onclick="return confirm(nv_is_del_confirm[0]);" data-toggle="tooltip" data-placement="top" title="{LANG.delete}" data-original-title="{LANG.delete}"><i class="lni lni-trash"></i>
									</a>
								</td>
								<td> {VIEW.servicecode} </td>
								<td> {VIEW.title_vi} </td>
								<td> {VIEW.title_en} </td>
								<td> {VIEW.servicecat} </td>
								<td> {VIEW.unitname} </td>
								<td> {VIEW.price_usd_format} </td>
								<td> {VIEW.price_vnd_format} </td>
								<td class="text-center">
									<div class="custom-control custom-switch">
										<input class="custom-control-input" type="checkbox" name="active" id="change_status_{VIEW.sid}" value="{VIEW.sid}" {CHECK} onclick="nv_change_status({VIEW.sid});" /><label class="custom-control-label" for="change_status_{VIEW.sid}" data-toggle="tooltip" data-placement="top" title="{LANG.on_off}" data-original-title="{LANG.on_off}"></label>
									</div>
								</td>
							</tr>
							<!-- END: loop -->
						</tbody>
					</table>
				
			</div>
		</div>
    </div>
</form>
<!-- END: view -->
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

<!-- END: main -->