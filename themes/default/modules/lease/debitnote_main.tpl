<!-- BEGIN: main -->
<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
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
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">{LANG.debitnote}</div>
	<div class="pl-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item">
					<a href="/"><i class='bx bx-home-alt'></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">{LANG.debitnote}</li>
			</ol>
		</nav>
	</div>
	<div class="ml-auto">
		<div class="btn-group">
			<a type="button" class="btn btn-primary" href="{debitnote_add}"><i class="lni lni-add-files mrg-r-5"></i>{LANG.add}</a>
			
		</div>
	</div>
</div>
<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.list_invoice_nextmonth}</h4>
		</div>
		<hr/>	
		<!-- BEGIN: viewnext -->

		<form action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
			<div class="table-responsive">
				<div class="dataTables_wrapper dt-bootstrap4">
					<table id="datatable" class="table table-striped table-bordered table-hover">
						<thead class="thead-dark">
							<tr>
								<th>{LANG.ccode}</th>
								<th>{LANG.product_vi}</th>
								<th>{LANG.customer}</th>
								<th>{LANG.yearmonth}</th>
								<th>{LANG.debitnotedate}</th>
								<th>{LANG.datefrom}</th>
								<th>{LANG.dateto}</th>
								<th>{LANG.comapyname_vi}</th>
								<th>{LANG.comapyname_en}</th>
								
							</tr>
						</thead>
						<tbody>
							<!-- BEGIN: list -->
							<tr>
								<td>{VIEWNEXT.ccode}</td>
								<td>{VIEWNEXT.product_name_vi}</td>
								<td>{VIEWNEXT.customer_name_vi}</td>
								<td>{VIEWNEXT.yearmonth_format}</td>
								<td>{VIEWNEXT.debitnotedate_format}</td>
								<td>{VIEWNEXT.datefrom_format}</td>
								<td>{VIEWNEXT.dateto_format}</td>
								<td>{VIEWNEXT.comapyname_vi}</td>
								<td>{VIEWNEXT.comapyname_en}</td>
							</tr>
							<!-- END: list -->
						</tbody>
					</table>
				</div>
			</div>
		</form>
		<!-- END: viewnext -->
	</div>
</div>
<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.debitnote}</h4>
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
					<table id="datatable" class="table table-striped table-bordered table-hover">
						<thead class="thead-dark">
							<tr>
								<th class="w100">{LANG.stt}</th>
								<th class="w150">{LANG.active}</th>
								<th class="w100">{LANG.debitcode}</th>
								<th>{LANG.product_vi}</th>
								<th>{LANG.customer}</th>
								<th>{LANG.yearmonth}</th>
								<th>{LANG.debitnotedate}</th>
								<th>{LANG.datefrom}</th>
								<th>{LANG.dateto}</th>
								<th>{LANG.comapyname_vi}</th>
								<th>{LANG.comapyname_en}</th>
								<th>{LANG.manager_name_vi}</th>
								<th>{LANG.manager_name_en}</th>
								<th class="w100 text-center">{LANG.status}</th>
								
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
								<td class="w100">
									<select class="form-control" id="id_weight_{VIEW.id}" onchange="nv_change_weight('{VIEW.id}');">
									<!-- BEGIN: weight_loop -->
										<option value="{WEIGHT.key}"{WEIGHT.selected}>{WEIGHT.title}</option>
									<!-- END: weight_loop -->
									</select>
								</td>
								<td class="text-center">
									<!-- BEGIN: user -->
									<a class="large-icons-btn btn btn-primary" href="{VIEW.link_edit}#edit" data-toggle="tooltip" data-placement="top" title="{LANG.edit}" data-original-title="{LANG.edit}"><i class="lni lni-pencil"></i></a>&nbsp;&nbsp;
									<!-- END: user -->
									<!-- BEGIN: viewdn -->
									<a class="large-icons-btn btn btn-primary" href="{VIEW.link_view}#edit" data-toggle="tooltip" data-placement="top" title="{LANG.view}" data-original-title="{LANG.view}"><i class="lni lni-eye"></i></a>&nbsp;&nbsp;
									<!-- END: viewdn -->
									<!-- BEGIN: admin -->
									<a class="large-icons-btn btn btn-danger" href="{VIEW.link_delete}" onclick="return confirm(nv_is_del_confirm[0]);" data-toggle="tooltip" data-placement="top" title="{LANG.delete}" data-original-title="{LANG.delete}"><i class="lni lni-trash"></i>
									</a>
									<!-- END: admin -->
								</td>
								<td>{VIEW.debitcode}</td>
								<td>{VIEW.product_name}</td>
								<td>{VIEW.customer_name}</td>
								<td>{VIEW.yearmonth_format}</td>
								<td>{VIEW.debitnotedate_format}</td>
								<td>{VIEW.datefrom_format}</td>
								<td>{VIEW.dateto_format}</td>
								<td>{VIEW.comapyname_vi}</td>
								<td>{VIEW.comapyname_en}</td>
								<td>{VIEW.manager_name_vi}</td>
								<td>{VIEW.manager_name_en}</td>
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
	        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=customer&nocache=' + new Date().getTime(), 'ajax_action=1&cid=' + id + '&new_vid=' + new_vid, function(res) {
	            var r_split = res.split('_');
	            if (r_split[0] != 'OK') {
	                alert(nv_is_change_act_confirm[2]);
	            }
	            window.location.href = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=customer';
	            return;
	        });
	        return;
	    }
	
	
	    function nv_change_status(id) {
	        var new_status = $('#change_status_' + id).is(':checked') ? true : false;
	        if (confirm(nv_is_change_act_confirm[0])) {
	            var nv_timer = nv_settimeout_disable('change_status_' + id, 5000);
	            $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=customer&nocache=' + new Date().getTime(), 'change_status=1&cid='+id, function(res) {
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