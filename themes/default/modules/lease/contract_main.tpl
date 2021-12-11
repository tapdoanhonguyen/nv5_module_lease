<!-- BEGIN: main -->
<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">{LANG.contract}</div>
	<div class="pl-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item">
					<a href="/"><i class='bx bx-home-alt'></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">{LANG.servicemain_vi}</li>
			</ol>
		</nav>
	</div>
	<div class="ml-auto">
		<div class="btn-group">
			<a type="button" class="btn btn-success" href="{contract_add}"><i class="lni lni-add-files mrg-r-5"></i>{LANG.add}</a>
		</div>
	</div>
</div>
<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.servicemain_vi}</h4>
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
								<th>{LANG.func}</th>
								<th>{LANG.ccode}</th>
								<th>{LANG.customer}</th>
								<th>{LANG.product_vi}</th>
								<th>{LANG.thoihanhopdong}</th>
								<th>{LANG.status}</th>
								<th>{LANG.active}</th>
							</tr>
						</thead>
						
						<tbody>
							<!-- BEGIN: loop -->
							<tr>
								<td>
									<select class="form-control" id="id_weight_{VIEW.id}" onchange="nv_change_weight('{VIEW.id}');">
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
								<td>{VIEW.ccode}</td>
								<td><a class="text-info" href ="{VIEW.link_view_cus}" >{VIEW.cid_vi}</a></td>
								<td><a class="text-info" href ="{VIEW.link_view_product}" >{VIEW.pid_vi}</a></td>
								<td>Từ {VIEW.datefrom_format} đến {VIEW.dateto_format}</td>
								<td>
									{VIEW.contract_status_format}
								</td>
								<td class="text-center">
									<div class="custom-control custom-switch">
										<input class="custom-control-input" type="checkbox" name="active" id="change_active_{VIEW.id}" value="{VIEW.id}" {CHECK} onclick="nv_change_active({VIEW.id});" /><label class="custom-control-label" for="change_active_{VIEW.id}" data-toggle="tooltip" data-placement="top" title="{LANG.on_off}" data-original-title="{LANG.on_off}"></label>
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
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=contract&nocache=' + new Date().getTime(), 'ajax_action=1&id=' + id + '&new_vid=' + new_vid, function(res) {
            var r_split = res.split('_');
            if (r_split[0] != 'OK') {
                alert(nv_is_change_act_confirm[2]);
            }
            window.location.href = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=contract';
            return;
        });
        return;
    }


    function nv_change_active(id) {
		var new_active = $('#change_active_' + id).is(':checked') ? true : false;
		if (confirm(nv_is_change_act_confirm[0])) {
			var nv_timer = nv_settimeout_disable('change_active_' + id, 5000);
			$.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=contract&nocache=' + new Date().getTime(), 'change_active=1&cid='+id, function(res) {
				var r_split = res.split('_');
				if (r_split[0] != 'OK') {
					alert(nv_is_change_act_confirm[2]);
					
				}else{
					window.location.href = window.location.href;
				}
			});
		}
		else{
			$('#change_active_' + id).prop('checked', new_active ? false : true);
		}
		return;
	}


//]]>
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
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.pid}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="pid" value="{ROW.pid}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.cid}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="cid" value="{ROW.cid}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.yearmonth}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="yearmonth" value="{ROW.yearmonth}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.datefrom}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="datefrom" value="{ROW.datefrom}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.dateto}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="dateto" value="{ROW.dateto}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.ccode}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="ccode" value="{ROW.ccode}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.pricevnd}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="pricevnd" value="{ROW.pricevnd}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.priceusd}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="priceusd" value="{ROW.priceusd}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.note}</strong></label>
        <div class="col-sm-19 col-md-20">
            <textarea class="form-control" style="height:100px;" cols="75" rows="5" name="note">{ROW.note}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.feevnd}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="feevnd" value="{ROW.feevnd}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.feeusd}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="feeusd" value="{ROW.feeusd}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.areareal}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="areareal" value="{ROW.areareal}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.ccat}</strong></label>
        <div class="col-sm-19 col-md-20">
            <select class="form-control" name="ccat">
                <option value=""> --- </option>
                <!-- BEGIN: select_ccat -->
                <option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
                <!-- END: select_ccat -->
            </select>
        </div>
    </div>
    <div class="text-center">
		<button class="btn btn-primary" name="submit" type="submit"><i class="lni lni-save mrg-r-5"></i>{LANG.save}</button>
	</div>
</form>
</div></div>
