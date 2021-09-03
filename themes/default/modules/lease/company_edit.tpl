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
					<li class="breadcrumb-item" aria-current="page">{LANG.company}</li>
					<li class="breadcrumb-item active" aria-current="page">{LANG.company}</li>
				</ol>
			</nav>
		</div>
	<div class="ml-auto">
			<div class="btn-group">
				<a type="button" class="btn btn-primary" href="{company_add}">{LANG.add}</a>
				
			</div>
		</div>
</div>


<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.company}</h4>
		</div>
		<hr/>	
		<!-- BEGIN: view -->
		<div class="well">
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
		<form action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th class="w100">{LANG.weight}</th>
							<th>{LANG.vi_title}</th>
							<th>{LANG.en_title}</th>
							<th>{LANG.vi_address}</th>
							<th>{LANG.en_address}</th>
							<th>{LANG.vi_province}</th>
							<th>{LANG.en_province}</th>
							<th>{LANG.phone}</th>
							<th>{LANG.fax}</th>
							<th>{LANG.email}</th>
							<th>{LANG.active}</th>
							<th class="w100 text-center">{LANG.active}</th>
							<th class="w150">&nbsp;</th>
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
							<td> {VIEW.vi_title} </td>
							<td> {VIEW.en_title} </td>
							<td> {VIEW.vi_address} </td>
							<td> {VIEW.en_address} </td>
							<td> {VIEW.vi_province} </td>
							<td> {VIEW.en_province} </td>
							<td> {VIEW.phone} </td>
							<td> {VIEW.fax} </td>
							<td> {VIEW.email} </td>
							<td> {VIEW.active} </td>
							<td class="text-center"><input type="checkbox" name="active" id="change_status_{VIEW.cid}" value="{VIEW.cid}" {CHECK} onclick="nv_change_status({VIEW.cid});" /></td>
							<td class="text-center"><i class="fa fa-edit fa-lg">&nbsp;</i> <a href="{VIEW.link_edit}#edit">{LANG.edit}</a> - <em class="fa fa-trash-o fa-lg">&nbsp;</em> <a href="{VIEW.link_delete}" onclick="return confirm(nv_is_del_confirm[0]);">{LANG.delete}</a></td>
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