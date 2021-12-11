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
				<li class="breadcrumb-item" aria-current="page">Danh sách công ty</li>
			</ol>
		</nav>
	</div>
	<div class="ml-auto">
		<div class="btn-group">
			<a type="button" class="btn btn-success" href="{company_add}"><i class="lni lni-add-files mrg-r-5"></i>{LANG.add}</a>
		</div>
	</div>
</div>
<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">Danh sách công ty</h4>
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
			<div class="table-responsive">
				<div class="dataTables_wrapper dt-bootstrap4">
					<table id="datatable" class="table table-striped table-bordered dataTable">
						<thead class="thead-dark">
							<tr>
								<th>{LANG.stt}</th>
								<th class="text-center">{LANG.func}</th>
								<th>{LANG.vi_title}</th>
								<th>{LANG.en_title}</th>
								<th>{LANG.vi_address}</th>
								<th>{LANG.en_address}</th>
								<th>{LANG.vi_province}</th>
								<th>{LANG.en_province}</th>
								<th>{LANG.phone}</th>
								<th>{LANG.fax}</th>
								<th>{LANG.email}</th>
								<th>{LANG.status}</th>
							</tr>
						</thead>
						<!-- BEGIN: generate_page -->
						<tfoot>
							<tr>
								<td class="text-center" colspan="13">{NV_GENERATE_PAGE}</td>
							</tr>
						</tfoot>
						<!-- END: generate_page -->
						<tbody>
							<!-- BEGIN: loop -->
							<tr>
								<td>
									<select class="form-control" id="id_weight_{VIEW.cid}" onchange="nv_change_weight('{VIEW.cid}');">
									<!-- BEGIN: weight_loop -->
										<option value="{WEIGHT.key}"{WEIGHT.selected}>{WEIGHT.title}</option>
									<!-- END: weight_loop -->
									</select>
								</td>
								<td class="text-center">
									<a class="large-icons-btn btn btn-primary" href="{VIEW.link_edit}#edit" data-toggle="tooltip" data-placement="top" title="{LANG.edit}" data-original-title="{LANG.edit}"><i class="lni lni-pencil"></i></a>&nbsp;&nbsp;
									<a class="large-icons-btn btn btn-danger" href="{VIEW.link_delete}" onclick="return confirm(nv_is_del_confirm[0]);" data-toggle="tooltip" data-placement="top" title="{LANG.delete}" data-original-title="{LANG.delete}"><i class="lni lni-trash"></i>
									</a>
								</td>
								<td> {VIEW.vi_title} </td>
								<td> {VIEW.en_title} </td>
								<td> {VIEW.vi_address} </td>
								<td> {VIEW.en_address} </td>
								<td> {VIEW.vi_province} </td>
								<td> {VIEW.en_province} </td>
								<td> {VIEW.phone} </td>
								<td> {VIEW.fax} </td>
								<td> {VIEW.email} </td>
								<td class="text-center">
									<div class="custom-control custom-switch">
										<input class="custom-control-input" type="checkbox" name="active" id="change_status_{VIEW.cid}" value="{VIEW.cid}" {CHECK} onclick="nv_change_status({VIEW.cid});" /><label class="custom-control-label" for="change_status_{VIEW.cid}" data-toggle="tooltip" data-placement="top" title="{LANG.on_off}" data-original-title="{LANG.on_off}"></label>
									</div>
								</td>
							</tr>
							<!-- END: loop -->
						</tbody>
					</table>
				</div>
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
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=company&nocache=' + new Date().getTime(), 'ajax_action=1&cid=' + id + '&new_vid=' + new_vid, function(res) {
            var r_split = res.split('_');
            if (r_split[0] != 'OK') {
                alert(nv_is_change_act_confirm[2]);
            }
            window.location.href = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=company';
            return;
        });
        return;
    }


    function nv_change_status(id) {
        var new_status = $('#change_status_' + id).is(':checked') ? true : false;
        if (confirm(nv_is_change_act_confirm[0])) {
            var nv_timer = nv_settimeout_disable('change_status_' + id, 5000);
            $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=company&nocache=' + new Date().getTime(), 'change_status=1&cid='+id, function(res) {
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