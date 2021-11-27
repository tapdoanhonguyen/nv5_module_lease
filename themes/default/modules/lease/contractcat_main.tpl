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
	<div class="breadcrumb-title pr-3">{LANG.contractcat}</div>
	<div class="pl-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item">
					<a href="/"><i class='bx bx-home-alt'></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">{LANG.contractcat}</li>
			</ol>
		</nav>
	</div>
	<div class="ml-auto">
		<div class="btn-group">
			<a type="button" class="btn btn-primary" href="{contractcat_add}"><i class="lni lni-add-files mrg-r-5"></i>{LANG.add}</a>
		</div>
	</div>
</div>
<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.contract}</h4>
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
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th class="w100">{LANG.stt}</th>
							<th class="w100 text-center">{LANG.active}</th>
							<th>{LANG.title}</th>
							<th class="w150 text-center">{LANG.status}</th>
						</tr>
					</thead>
					<!-- BEGIN: generate_page -->
					<tfoot>
						<tr>
							<td class="text-center" colspan="4">{NV_GENERATE_PAGE}</td>
						</tr>
					</tfoot>
					<!-- END: generate_page -->
					<tbody>
						<!-- BEGIN: loop -->
						<tr>
							<td>
								<select class="form-control" id="id_weight_{VIEW.ciđ}" onchange="nv_change_weight('{VIEW.ciđ}');">
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
							<td> {VIEW.title} </td>
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
		</form>
		<!-- END: view -->
	</div>
</div>
<!-- END: main -->