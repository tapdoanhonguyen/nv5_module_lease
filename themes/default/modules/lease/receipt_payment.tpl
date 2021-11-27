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
	<div class="breadcrumb-title pr-3">{LANG.payment}</div>
	<div class="pl-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item">
					<a href="/"><i class='bx bx-home-alt'></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">{LANG.add_payment}</li>
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
			<h4 class="mb-0">{LANG.add_payment} : {ROW.debitcode}</h4>
		</div>
		<hr/>	

		<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}/payment" method="post">
			<input type="hidden" name="id" value="{ROW.id}" />
			<input type="hidden" name="compannycode" value="{ROW.company_code}" />
			<input type="hidden" name="compannyid" value="{ROW.companyid}" />
			<input type="hidden" name="status" value="2" />
			<table id="example" class="table table-bordered" style="width:100%">
				<tbody >
					<tr>
						<td><strong>{LANG.debitcode}: </strong>{ROW.debitcode}</td>
						<td><strong>{LANG.product}: </strong>{ROW.product}</td>
						<td><strong>{LANG.customer}: </strong>{ROW.customer}</td>
					</tr>
					<tr>
						<td><strong>{LANG.debitnotedate}: </strong>{ROW.debitnotedate}</td>
						<td><strong>{LANG.areareal}: </strong>{ROW.areareal} {LANG.m2}</td>
						<td><strong>{LANG.exchangeusd}: </strong>{ROW.exchangeusd}</td>
					</tr>
				</tbody>
			</table>
			<label for="title">{LANG.listservice} </label> 
			<div  class="vi">
				<div class="table-responsive">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>{LANG.service}</th>
								<th>{LANG.datefrom}</th>
								<th>{LANG.dateto}</th>
								<th class="text-right">{LANG.price}</th>
								<th class="text-right">{LANG.amount}</th>
								<th class="text-right">{LANG.total}</th>
							</tr>
						</thead>
						<tbody >
							<!-- BEGIN: service_vi -->
							<tr >
								<td >{DBN.service}</td>
								<td >{ROW.datefrom}</td>
								<td >{ROW.dateto}</td>
								<td class="text-right">{DBN.price_vi}</td>
								<td class="text-right">{DBN.amount}</td>
								<td class="text-right">{DBN.total_vi}</td>
							</tr>
							<!-- END: service_vi -->
						</tbody>
						<tfoot>
							<tr>
								<td colspan="5" class="text-right">{LANG.total}</td>
								<th class="text-right">{total_vi}</th>
							</tr>
						</tfoot>	
					</table>
				</div>
			</div>
			<div  class="en" style = "display:none">
				<div class="table-responsive">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>{LANG.service}</th>
								<th>{LANG.datefrom}</th>
								<th>{LANG.dateto}</th>
								<th>{LANG.price}</th>
								<th>{LANG.amount}</th>
								<th>{LANG.total}</th>
							</tr>
						</thead>
						<tbody >
							<!-- BEGIN: service_en -->
							<tr >
								<td >{DBN.service}</td>
								<td >{ROW.datefrom}</td>
								<td >{ROW.dateto}</td>
								<td >{DBN.price_en}</td>
								<td >{DBN.amount}</td>
								<td >{DBN.total_en}</td>
							</tr>
							<!-- END: service_en -->
						</tbody>
						<tfoot>
							<tr>
								<td colspan="5" class="text-right">{LANG.total}</td>
								<th>{total_en}</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-3 mb-3">
					<label>{LANG.payment_price} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="payment_price" value="{ROW.payment_price}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />	
				</div>
				<div class="col-md-3 mb-3">
					<label>{LANG.money_type} <span class="red">(*)</span></label>
					<select class="form-control" name="money_type">
						<option value=""> --- </option>
						<!-- BEGIN: select_money_type -->
						<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
						<!-- END: select_money_type -->
					</select>
				</div>
			</div>

			<!-- BEGIN: payment -->
			<div class="text-center">
				<button class="btn btn-primary" name="submit" type="submit"><i class="lni lni-save mrg-r-5"></i>{LANG.save}</button>
			</div>
			<!-- END: payment -->
		</form>
	</div>
</div>
<!-- END: main -->