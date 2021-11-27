<!-- BEGIN: main -->


<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">



<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">{LANG.debt}</div>
	<div class="pl-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item">
						<a href="/"><i class='bx bx-home-alt'></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">{LANG.debt}</li>
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
			<h4 class="mb-0">{LANG.debt}</h4>
		</div>
		<hr/>
	<!-- BEGIN: view -->


	<form action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>{LANG.title}</th>
						<th>{LANG.gid}</th>
						<th>{LANG.address}</th>
						<th>{LANG.mobile}</th>
						<th>{LANG.email}</th>
						<th>{LANG.taxcode}</th>
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
						
						<td> <a href ="{VIEW.link_view}" >{VIEW.title}</a> </td>
						<td> {VIEW.gid} </td>
						<td> {VIEW.address} </td>
						<td> {VIEW.mobile} </td>
						<td> {VIEW.email} </td>
						<td> {VIEW.taxcode} </td>
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
	</form>
	<!-- END: view -->
</div></div>
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




