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
				<li class="breadcrumb-item" >{LANG.debitnote}</li>
				<li class="breadcrumb-item active" aria-current="page">{LANG.debitnote_add}</li>
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
			<h4 class="mb-0">{LANG.debitnote_edit}</h4>
		</div>
		<hr/>
		<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />

		<!-- BEGIN: error -->
		<div class="alert alert-warning">{ERROR}</div>
		<!-- END: error -->
		<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}/edit" method="post">
			<input type="hidden" name="id" value="{ROW.id}" />
			<input type="hidden" name="compannycode" value="{ROW.company_code}" />
			<input type="hidden" name="compannyid" value="{ROW.companyid}" />
			<div class="form-row">
				
				<div class="col-md-3 mb-3">
					<label>{LANG.debitcode}</label>			
					<input class="form-control" type="text" name="debitcode" value="{ROW.debitcode}" disabled/>
				</div>
				<div class="col-md-3 mb-3">
					<label for="title">{LANG.pid} <span class="red">(*)</span></label>
					<div >
						<select class="form-control" name="pid" id="productid" onchange="change_debitnote(this)">
							<option value=""> --- </option>
							<!-- BEGIN: select_pid -->
							<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
							<!-- END: select_pid -->
						</select>
					</div>
				</div>
				<div class="col-md-3 mb-3">
					<label for="title">{LANG.serviceextra_customer} <span class="red">(*)</span></label>
					<div >
						<select class="form-control" name="cid" id ="customerid" >
							<option value=""> --- </option>
							<!-- BEGIN: select_cid -->
							<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
							<!-- END: select_cid -->
						</select>
					</div>
				</div>
				<div class="col-md-3 mb-3">
					<label for="title">{LANG.yearmonth} <span class="red">(*)</span></label>
					<div class="form-row" >
						<div class="col-md-4 mb-3">
							<select class="form-control" name="month" id="month" > 
								<option value=""> --- </option>
								<!-- BEGIN: select_month -->
								<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
								<!-- END: select_month -->
							</select>
						</div>
						<div class="col-md-3 mb-3">
							<select class="form-control" name="year" id="year" >
								<option value=""> --- </option>
								<!-- BEGIN: select_year -->
								<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
								<!-- END: select_year -->
							</select>
						</div>
						
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-3 mb-3">
					<label for="title">{LANG.debitnotedate} <span class="red">(*)</span></label>
					<div class="input-group">
						<input class="form-control" type="text" name="debitnotedate" value="{ROW.debitnotedate}" id="debitnotedate" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
						<span class="input-group-btn">
							<button class="btn btn-default" type="button" id="debitnotedate-btn">
								<em class="fa fa-calendar fa-fix"> </em>
							</button> </span>
					</div>
				</div>
				<div class="col-md-9 mb-3">
					<div class="form-row">
						<div class="col-md-3 mb-3">
							<label for="title">{LANG.datefrom} <span class="red">(*)</span></label>
							
							<div class="input-group">
							<input class="form-control" type="text" name="datefrom" value="{ROW.datefrom}" id="datefrom" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
								<span class="input-group-btn">
								<button class="btn btn-default" type="button" id="datefrom-btn">
									<em class="fa fa-calendar fa-fix"> </em>
								</button> </span>
							</div>
							
						</div>
						<div class="col-md-3 mb-3">
							<label for="title">{LANG.dateto} <span class="red">(*)</span></label>
							<div class="input-group">
								<input class="form-control" type="text" name="dateto" value="{ROW.dateto}" id="dateto" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
								<span class="input-group-btn">
									<button class="btn btn-default" type="button" id="dateto-btn">
										<em class="fa fa-calendar fa-fix"> </em>
									</button> </span>
							</div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="title">{LANG.areareal} <span class="red">(*)</span></label>
							<div class="input-group">
								<input class="form-control" type="hidden" name="areareal" id="arearealh" value="{ROW.areareal}" />
								<input class="form-control" type="text" name="" id="areareal" value="{ROW.areareal}" disabled/>
							</div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="title">{LANG.exchangeusd} <span class="red">(*)</span></label>
							<input class="form-control" type="text" name="exchangeusd" id="exchangeusd" value="{ROW.exchangeusd}"  />
						</div>
					</div>
				</div>
			</div>
			<div> 
				<label for="title">{LANG.listservice} <span class="red">(*)</span></label> 
				<a type="button" class="btn btn-primary vi" href="javascript:check_services()">{LANG.debitnodemain}</a>
				<a type="button" class="btn btn-primary vi" href="javascript:check_services_extra()">{LANG.debitnodeextra}</a>
				<a type="button" class="btn btn-primary en" href="#">{LANG.debitnodeextra}</a>
				<a type="button" class="btn btn-primary en" href="#">{LANG.debitnodeextra}</a>
				<div class="col-md-6 mb-3 vi">
					<label>{LANG.explain_vi} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="explain_vi" id="explain_vi" value="{ROW.explain_vi}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
				<div class="col-md-6 mb-3 en">
					<label>{LANG.explain_en} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="explain_en" id="explain_en" value="{ROW.explain_en}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
				<div  class="vi">
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
							<tbody id="lableservicemainvi">
								<tr id="">
									<td colspan="6">{LANG.servicemain_vi}</td>
								</tr>
							</tbody>
							<tbody id="servicemainvi">
							</tbody>
							<tbody id="lableserviceextravi">
								<tr id="">
									<td colspan="6">{LANG.serviceextra_vi}</td>
								</tr>
							</tbody>
							<tbody id="serviceextravi">
							</tbody>
							<tfoot>
								<tr>
									<th>{LANG.service}</th>
									<th>{LANG.datefrom}</th>
									<th>{LANG.dateto}</th>
									<th>{LANG.price}</th>
									<th>{LANG.amount}</th>
									<th>{LANG.total}</th>
								</tr>
							</tfoot>	
						</table>
					</div>
				</div>
			</div>
			<div  class="en">
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
						<tbody id="lableservicemainen">
							<tr id="">
								<td colspan="6">{LANG.servicemain_en}</td>
							</tr>
						</tbody>
						<tbody id="servicemainen">
						</tbody>
						<tbody id="lableserviceextraen">
							<tr id="">
								<td colspan="6">{LANG.serviceextra_en}</td>
							</tr>
						</tbody>
						<tbody id="serviceextraen">
						</tbody>
						<tfoot>
							<tr>
								<th>{LANG.service}</th>
								<th>{LANG.datefrom}</th>
								<th>{LANG.dateto}</th>
								<th>{LANG.price}</th>
								<th>{LANG.amount}</th>
								<th>{LANG.total}</th>
							</tr>
						</tfoot>	
					</table>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-6 mb-3">
					<div class="col-md-6 mb-3 vi">
						<label for="title">{LANG.recipients_vi}<span class="red">(*)</span></label>
						<input class="form-control" type="text" name="recipients_vi" value="{ROW.recipients_vi}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
					</div>
					<div class="col-md-6 mb-3 en">
						<label>{LANG.recipients_en} <span class="red">(*)</span></label>
						<input class="form-control" type="text" name="recipients_en" value="{ROW.recipients_en}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
					</div>
				</div>
				<div class="col-md-6 mb-3 ">
					
				</div>
			</div>
			<div class="vi">
				<div class="form-row">
					<div class="col-md-3 mb-3">
						<label>{LANG.account_bank_vi} <span class="red">(*)</span></label>
						<input class="form-control" type="text" name="account_bank_vi" value="{ROW.account_bank_vi}" disabled />
					</div>
					<div class="col-md-3 mb-3">
						<label>{LANG.holding_vi} <span class="red">(*)</span></label>
						<input class="form-control" type="text" name="holding_vi" value="{ROW.holding_vi}" disabled />
					</div>
					<div class="col-md-3 mb-3">
						<label>{LANG.bank_name_vi} <span class="red">(*)</span></label>
						<input class="form-control" type="text" name="bank_name_vi" value="{ROW.bank_name_vi}" disabled />
					</div>
				</div>
				<div class="form-group">
					<label>{LANG.bank_address_vi} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="bank_address_vi" value="{ROW.bank_address_vi}" disabled />
				</div>
				<div class="form-group">
					<label>{LANG.note_vi} <span class="red">(*)</span></label>
					<textarea class="form-control" style="height:100px;" cols="75" rows="5" name="note_vi"  id="note_vi" disabled>{ROW.note_vi}</textarea>
				</div>
			</div>
			<div class="en">
				<div class="form-row">
					<div class="col-md-3 mb-3">
						<label>{LANG.account_bank_en} <span class="red">(*)</span></label>
						<input class="form-control" type="text" name="account_bank_en" value="{ROW.account_bank_en}" disabled />
					</div>
					<div class="col-md-3 mb-3">
						<label>{LANG.holding_en} <span class="red">(*)</span></label>
						<input class="form-control" type="text" name="holding_en" value="{ROW.holding_en}" disabled />
					</div>
					<div class="col-md-3 mb-3">
						<label>{LANG.bank_name_en} <span class="red">(*)</span></label>
						<input class="form-control" type="text" name="bank_name_en" value="{ROW.bank_name_en}" disabled />
					</div>
				</div>
				<div class="form-group">
					<label>{LANG.bank_address_en} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="bank_address_en" value="{ROW.bank_address_en}" disabled />
				</div>
				<div class="form-group">
					<label>{LANG.note_en} <span class="red">(*)</span></label>
					<textarea class="form-control" style="height:100px;" cols="75" rows="5" name="note_en"  id="note_vi">{ROW.note_en}</textarea>
				</div>
			</div>
			<div class="form-group">
				<label>{LANG.swiftcode} <span class="red">(*)</span></label>
				<input class="form-control" type="text" name="swiftcode" value="{ROW.swiftcode}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
			</div>
			<div class="form-group">
				<label>{LANG.comapyname_vi} <span class="red">(*)</span></label>
				<input class="form-control" type="text" name="comapyname_vi" value="{ROW.comapyname_vi}" disabled />
			</div>
			<input class="form-control" type="hidden" name="manager_name_vi" value="{ROW.manager_name_vi}"  />
			<div class="en">
				<div class="form-group">
					<label>{LANG.comapyname_en} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="comapyname_en" value="{ROW.comapyname_en}" disabled />
				</div>
			</div>
			<input class="form-control" type="hidden" name="manager_name_en" value="{ROW.manager_name_en}"  />
			<div class="form-group">
				<label>{LANG.note}</label>
				<textarea class="form-control" style="height:100px;" cols="75" rows="5" name="note">{ROW.note}</textarea>
			</div>
			<div class="form-group" style="text-align: center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
		</form>
	</div>
</div>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>

<script type="text/javascript">
//<![CDATA[
    $("#debitnotedate,#datefrom,#dateto").datepicker({
        dateFormat : "dd/mm/yy",
        changeMonth : true,
        changeYear : true,
        showOtherMonths : true,
    });
	$(".en,#lableservicemainvi,#lableservicemainen,#lableserviceextravi,#lableserviceextraen").hide();
	function check_services(){
		var customerid = $("#customerid").val();
		var productid = $("#productid").val();
		var month = $("#month").val();
		var year = $("#year").val();
		var yearmonth = month+year;
		 $.ajax({
			type: 'POST',
			url: nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=lease&' + nv_fc_variable + '=ajax/GetService',
			cache: !1,
			beforeSend: function() {
				// setting a timeout
				$('#lableservicemainvi,#lableservicemainen').show();
				$('#servicemainvi').html('<td colspan="6">{LANG.load_service_main_vi}</td>');
				$('#servicemainen').html('<td colspan="6">{LANG.load_service_main_en}</td>');
				
			},
			data: {
				nv_ajax: 1,
				customerid: customerid,
				productid: productid,
				yearmonth: yearmonth
			},
			dataType: "json"
		}).done(function(a) {
			if (a.status == "OKE") {
				$('#areareal').val(a.message.areareal);
				$('#arearealh').val(a.message.areareal);
				$('#servicemainvi').html('<tr><td >{LANG.contract} ' + a.message.yearmonth + '</td><td>' + a.message.datefrom +'</td><td>' + a.message.dateto + '</td><td>' + a.message.pricevnd + '</td><td>1 {LANG.month_vi}</td><td>' + a.message.pricevnd + '</td></tr>');
				$('#servicemainen').html('<tr><td >{LANG.contract} ' + a.message.yearmonth + '</td><td>' + a.message.datefrom +'</td><td>' + a.message.dateto + '</td><td>' + a.message.priceusd + '</td><td>1 {LANG.month_en}</td><td>' + a.message.priceusd + '</td></tr>');
			} else {
				$('#servicemainvi').html('<td colspan="6">{LANG.no_service_main_vi}</td>');
				$('#servicemainen').html('<td colspan="6">{LANG.no_service_main_en}</td>');
			}
		});
	}
	function check_services_extra(){
		var customerid = $("#customerid").val();
		var productid = $("#productid").val();
		var month = $("#month").val();
		var year = $("#year").val();
		var yearmonth = month+year;
		 $.ajax({
			type: 'POST',
			url: nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=lease&' + nv_fc_variable + '=ajax/GetServiceExtra',
			cache: !1,
			beforeSend: function() {
				// setting a timeout
				$('#lableserviceextravi,#lableserviceextraen').show();
				$('#serviceextravi').html('<td colspan="6">{LANG.load_service_extra_vi}</td>');
				$('#serviceextraen').html('<td colspan="6">{LANG.load_service_extra_en}</td>');
			},
			data: {
				nv_ajax: 1,
				customerid: customerid,
				productid: productid,
				yearmonth: yearmonth
			},
			dataType: "json"
		}).done(function(a) {
			var html_vi='';
			var html_en='';
			if (a.status == "OKE") {
				$.each(a.message,function(index, data){ 
					
					html_vi = html_vi + '<tr><td >' + data.title + ' ' + data.yearmonth + '</td><td>' + data.datefrom +'</td><td>' + data.dateto + '</td><td>' + data.pricevnd + '</td><td>1</td><td>' + data.pricevnd + '</td></tr>';
					html_en = html_en + '<tr><td > ' + data.title + ' ' + data.yearmonth + '</td><td>' + data.datefrom +'</td><td>' + data.dateto + '</td><td>' + data.priceusd + '</td><td>1</td><td>' + data.priceusd + '</td></tr>';
				});
				
				$('#serviceextravi').html(html_vi);
				$('#serviceextraen').html(html_en);
			} else {
				$('#serviceextravi').html('<td colspan="6">{LANG.no_service_extra_vi}</td>');
				$('#serviceextraen').html('<td colspan="6">{LANG.no_service_extra_en}</td>');
			}
		});
	}
	function change_customer(){
		var customerid = $("#customerid").val();
		 $.ajax({
			type: 'POST',
			url: nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=lease&' + nv_fc_variable + '=ajax/GetCustomer',
			cache: !1,
			data: {
				nv_ajax: 1,
				customerid: customerid
			},
			dataType: "json"
		}).done(function(a) {
			if (a.status == "OKE") {
				$("#note_vi").val(a.message.vi_note);
				$("#note_en").val(a.message.en_note);
			} else {
				console.log('Error' + a.message);
			}
		});
	}
	function change_exchange(){
		var month = $("#month").val();
		var year = $("#year").val();
		var yearmonth = month+year;
		 $.ajax({
			type: 'POST',
			url: nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=lease&' + nv_fc_variable + '=ajax/GetExchange',
			cache: !1,
			data: {
				nv_ajax: 1,
				yearmonth: yearmonth
			},
			dataType: "json"
		}).done(function(a) {
			if (a.status == "OKE") {
				$("#exchangeusd").val(a.message.exchange_rate);
				
			} else {
				console.log('Error' + a.message);
			}
		});
	}
	function change_date(){
		var datefrom = $("#datefrom").val();
		var dateto = $("#dateto").val();
		var explain_vi = '{LANG.note_explain_vi} {LANG.from_vi} ' + datefrom + ' {LANG.to_vi} ' + dateto ;
		$("#explain_vi").val(explain_vi);
		var explain_vi = '{LANG.note_explain_en} {LANG.from_en} ' + datefrom + ' {LANG.to_en} ' + dateto ;
		$("#explain_en").val(explain_en);
		
	}
	$(document).ready(function(){
		$("#month,#year").on("change",function(){
			change_exchange();
		});
		$("#customerid").on("change",function(){
			change_customer();
		});
		change_exchange();
		change_date();
		change_customer();
		check_services();
		check_services_extra();
		
	});
//]]>
</script>
<!-- END: main -->