<!-- BEGIN: main -->
<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">{LANG.customer}</div>
	<div class="pl-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item">
					<a href="/"><i class='bx bx-home-alt'></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">{LANG.customer_groups}</li>
			</ol>
		</nav>
	</div>
	<div class="ml-auto">
		<div class="btn-group">
			<a type="button" class="btn btn-success" href="{customer_groups_add}"><i class="lni lni-add-files mrg-r-5"></i>{LANG.add}</a>
		</div>
	</div>
</div>
<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.customer_groups}</h4>
		</div>
		<hr/>
		<!-- BEGIN: view -->
		<form action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
				<table class="table table-striped table-bordered table-hover">
					<thead class="thead-dark">
						<tr>
							<th class="w100 text-center">{LANG.stt}</th>
							<th class="w100 text-center">{LANG.func}</th>
							<th>Tên Nhóm</th>
							<th class="text-center">{LANG.status}</th>
						</tr>
					</thead>
					<!-- BEGIN: generate_page -->
					<tfoot>
						<tr>
							<td class="text-center" colspan="5">{NV_GENERATE_PAGE}</td>
						</tr>
					</tfoot>
					<!-- END: generate_page -->
					<tbody>
						<!-- BEGIN: loop -->
						<tr>
							<td>
								<select class="form-control" id="id_weight_{VIEW.id}" onchange="nv_change_weight('{VIEW.id}');">
								<!-- BEGIN: time_update_loop -->
									<option value="{WEIGHT.key}"{WEIGHT.selected}>{WEIGHT.title}</option>
								<!-- END: time_update_loop -->
							</select>
							</td>
							<td class="text-center">
								<a class="large-icons-btn btn btn-primary" href="{VIEW.link_edit}#edit" data-toggle="tooltip" data-placement="top" title="{LANG.edit}" data-original-title="{LANG.edit}"><i class="lni lni-pencil"></i></a>&nbsp;&nbsp;
								<a class="large-icons-btn btn btn-danger" href="{VIEW.link_delete}" onclick="return confirm(nv_is_del_confirm[0]);" data-toggle="tooltip" data-placement="top" title="{LANG.delete}" data-original-title="{LANG.delete}"><i class="lni lni-trash"></i></a>
							</td>
							<td>
								{VIEW.title}
							</td>
							<td class="text-center">
								<div class="custom-control custom-switch">
									<input class="custom-control-input" type="checkbox" name="active" id="change_status_{VIEW.id}" value="{VIEW.id}" {CHECK} onclick="nv_change_status({VIEW.id});" /><label class="custom-control-label" for="change_status_{VIEW.id}" data-toggle="tooltip" data-placement="top" title="{LANG.on_off}" data-original-title="{LANG.on_off}"></label>
								</div>
							</td>
						</tr>
						<!-- END: loop -->
					</tbody>
				</table>
			</div>
		</form>
	</div>
</div>
<!-- END: view -->
<script type="text/javascript">
//<![CDATA[
    function nv_change_weight(id) {
        var nv_timer = nv_settimeout_disable('id_weight_' + id, 5000);
        var new_vid = $('#id_weight_' + id).val();
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=customer_groups&nocache=' + new Date().getTime(), 'ajax_action=1&id=' + id + '&new_vid=' + new_vid, function(res) {
            var r_split = res.split('_');
            if (r_split[0] != 'OK') {
                alert(nv_is_change_act_confirm[2]);
            }
            window.location.href = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=customer_groups';
            return;
        });
        return;
    }


    function nv_change_status(id) {
        var new_status = $('#change_status_' + id).is(':checked') ? true : false;
        if (confirm(nv_is_change_act_confirm[0])) {
            var nv_timer = nv_settimeout_disable('change_status_' + id, 5000);
            $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=customer_groups&nocache=' + new Date().getTime(), 'change_status=1&id='+id, function(res) {
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