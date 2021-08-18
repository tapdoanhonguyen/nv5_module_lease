<!-- BEGIN: main -->
<!-- BEGIN: view -->

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
<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

		
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">Sản phẩm</div>
	<div class="pl-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="/"><i class='bx bx-home-alt'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">{LANG.product}</li>
								</ol>
							</nav>
						</div>
	<div class="ml-auto">
							<div class="btn-group">
								<a type="button" class="btn btn-primary" href="{PRODUCT_ADD}">{LANG.product_add}</a> 
								<button type="button" class="btn btn-primary bg-split-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">	<span class="sr-only">{LANG.product_more}</span>
								</button>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
									<a class="dropdown-item" href="{PRODUCT_IMPORT}">{LANG.product_import}</a>
									<a class="dropdown-item" href="{PRODUCT_EXPORT}">{LANG.product_export}</a>
									<div class="dropdown-divider"></div>	
								</div>
							</div>
						</div>
</div>
		
		<div class="card">
			<div class="card-body">
				<div class="card-title">
					<h4 class="mb-0">{LANG.product_list}</h4>
				</div>
				<hr/>	
				<form action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>{LANG.title_product}</th>
											<th>{LANG.fid}</th>
											<th>{LANG.area}</th>
											<th>{LANG.price_usd_min_max}</th>
											<th>{LANG.price_vnd_min_max}</th>
											<th>{LANG.rent_status}</th>
											<th>{LANG.rent_status1}</th>
											<th class="text-center">{LANG.active}</th>
										</tr>
									</thead>
									<tbody>
										<!-- BEGIN: loop -->
										<tr>
											<td> <a href ="{VIEW.link_view}" >{VIEW.title}</a> </td>
											<td>{VIEW.fid}</td>
											<td>{VIEW.area}</td>
											<td> 				  				            {VIEW.price_usd_min} $- {VIEW.price_usd_max} $
											</td>
											<td>{VIEW.price_vnd_min} đ - {VIEW.price_vnd_max} đ</td>
											<td>{VIEW.rent_status}</td>
											<td class="text-center">
												<input type="checkbox" name="active" id="change_status_{VIEW.pid}" value="{VIEW.pid}" {CHECK} onclick="nv_change_status({VIEW.pid});" />
											</td>
											<td class="text-center">
												<i class="fa fa-edit fa-lg">&nbsp;</i> <a href="{VIEW.link_edit}#edit">{LANG.edit}</a> - <em class="fa fa-trash-o fa-lg">&nbsp;</em> <a href="{VIEW.link_delete}" onclick="return confirm(nv_is_del_confirm[0]);">{LANG.delete}</a>
											</td>
										</tr>
										 <!-- END: loop -->
									</tbody>
									<tfoot>
										<tr>
											<th>{LANG.title_product}</th>
											<th>{LANG.fid}</th>
											<th>{LANG.area}</th>
											<th>{LANG.price_usd_min_max}</th>
											<th>{LANG.price_vnd_min_max}</th>
											<th>{LANG.rent_status}</th>
											<th>{LANG.rent_status1}</th>
											<th class="text-center">{LANG.active}</th>
										</tr>
									</tfoot>
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
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=product&nocache=' + new Date().getTime(), 'ajax_action=1&pid=' + id + '&new_vid=' + new_vid, function(res) {
            var r_split = res.split('_');
            if (r_split[0] != 'OK') {
                alert(nv_is_change_act_confirm[2]);
            }
            window.location.href = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=product';
            return;
        });
        return;
    }


    function nv_change_status(id) {
        var new_status = $('#change_status_' + id).is(':checked') ? true : false;
        if (confirm(nv_is_change_act_confirm[0])) {
            var nv_timer = nv_settimeout_disable('change_status_' + id, 5000);
            $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=product&nocache=' + new Date().getTime(), 'change_status=1&pid='+id, function(res) {
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
	function add_product() {
        window.location.href = '{PRODUCT_ADD}';
    }

//]]>
</script>
<script>
		$(document).ready(function () {
			//Default data table
			$('#example').DataTable();
			
		});
		
</script>

<script src="/themes/softs/js/jquery.dataTables.min.js"></script>


<!-- END: main -->