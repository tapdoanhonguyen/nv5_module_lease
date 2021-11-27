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
					<li class="breadcrumb-item" >{LANG.customer}</li>
					<li class="breadcrumb-item active" aria-current="page">{LANG.debt_customer_view}</li>
				</ol>
			</nav>
		</div>
	<div class="ml-auto">
			<div class="btn-group">
			</div>
		</div>
</div>
		
<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.debt_customer_view} : {ROW.cuscode} ({ROW.title})</h4>
		</div>
		<hr/>


		<!-- BEGIN: error -->
		<div class="alert alert-warning">{ERROR}</div>
		<!-- END: error -->
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-row">
					<div class="col-md-6 mb-3">
						<label for="title">
							{LANG.customer} : {ROW.title}
						</label>
				
			
					</div>
					<div class="col-md-6 mb-3">
						<label>{LANG.gid} : {ROW.gid}
						</label>
					</div>
				</div>
				<div class="form-row">
					<label >{LANG.address} : {ROW.address}</label>
				</div>
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="title">{LANG.mobile} : {ROW.mobile}</label>
					</div>
					<div class="col-md-4 mb-3">
						<label >{LANG.fax} : {ROW.fax}</label>
					</div>
					<div class="col-md-4 mb-3">
						<label >{LANG.email} : {ROW.email}</label>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="title">{LANG.taxcode} : {ROW.taxcode}</label>
					</div>
					<div class="col-md-4 mb-3">
						<label class="col-sm-5 col-md-4 control-label">{LANG.person_legal} : {ROW.person_legal}</label>
					</div>
					<div class="col-md-4 mb-3">
						<label >{LANG.person_legal_mobile} : {ROW.person_legal_mobile}</label>
					</div>
				</div>
				
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				{LANG.debt_of_debitnote}
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>{LANG.debitcode}</th>
								<th>{LANG.product}</th>
								<th>{LANG.yearmonth}</th>
								<th>{LANG.debitnotedate}</th>
								<th>{LANG.datefrom} - {LANG.dateto}</th>
								<th class="w100 text-center">{LANG.total_vi}</th>
								<th class="w100 text-center">{LANG.total_payment_vi}</th>
								<th class="w100 text-center">{LANG.debt_total_vi}</th>
								<th class="w150">{LANG.total_en}</th>
								<th class="w100 text-center">{LANG.total_payment_en}</th>
								<th class="w150">{LANG.debt_total_en}</th>
							</tr>
						</thead>
						<!-- BEGIN: generate_page -->
						<tfoot>
							<tr>
								<td class="text-center" colspan="9">{NV_GENERATE_PAGE}</td>
							</tr>
						</tfoot>
						<!-- END: generate_page -->
						<tbody>
							<!-- BEGIN: loop -->
							<tr>
								
								<td> <a href ="{VIEW.link_view}" >{VIEW.debitcode}</a> </td>
								<td> {VIEW.product} </td>
								<td> {VIEW.month}/{VIEW.year} </td>
								<td> {VIEW.debitnotedate} </td>
								<td> {VIEW.datefrom} - {VIEW.dateto} </td>
								<td> {VIEW.total_format_vi} </td>
								<td> {VIEW.total_payment_format_vi} </td>
								<td> {VIEW.total_debt_format_vi} </td>
								<td> {VIEW.total_format_en} </td>
								<td> {VIEW.total_payment_format_en} </td>
								<td> {VIEW.total_debt_format_en} </td>
								</tr>
							<!-- END: loop -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
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
<!-- END: main -->