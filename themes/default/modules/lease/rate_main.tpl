<!-- BEGIN: main -->
<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">{LANG.rate}</div>
	<div class="pl-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item">
					<a href="/"><i class='bx bx-home-alt'></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">{LANG.rate}</li>
			</ol>
		</nav>
	</div>
	<div class="ml-auto">
		<div class="btn-group">
			<a type="button" class="btn btn-success" href="{rate_add}">{LANG.add}</a>
			
		</div>
	</div>
</div>
<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.rate}</h4>
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
				<div class="dataTables_wrapper dt-bootstrap4">
					<table id="datatable" class="table table-striped table-bordered dataTable">
						<thead class="thead-dark">
							<tr>
								<th class="text-center w100">{LANG.number}</th>
								<th class="text-center w150">{LANG.func}</th>
								<th>{LANG.mount}</th>
								<th>{LANG.exchange_rate}</th>
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
								<td class="text-center"> {VIEW.number}</td>
								<td class="text-center">
									<a class="large-icons-btn btn btn-primary" href="{VIEW.link_edit}#edit" data-toggle="tooltip" data-placement="top" title="{LANG.edit}" data-original-title="{LANG.edit}"><i class="lni lni-pencil"></i></a>&nbsp;&nbsp;
									<a class="large-icons-btn btn btn-danger" href="{VIEW.link_delete}" onclick="return confirm(nv_is_del_confirm[0]);" data-toggle="tooltip" data-placement="top" title="{LANG.delete}" data-original-title="{LANG.delete}"><i class="lni lni-trash"></i>
									</a>
								</td>
								<td> {VIEW.mount}</td>
								<td> {VIEW.exchange_rate} </td>
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


<!-- END: main -->



<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
