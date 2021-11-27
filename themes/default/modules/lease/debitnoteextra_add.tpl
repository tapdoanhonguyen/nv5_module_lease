<!-- BEGIN: main -->
<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/lobibox.min.css" rel="stylesheet" type="text/css">
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
			<h4 class="mb-0">{LANG.debitnote_add}</h4>
		</div>
		<hr/>
		<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
		<!-- BEGIN: error -->
		<div class="alert alert-warning">{ERROR}</div>
		<!-- END: error -->
		<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}/add" method="post">
			<input type="hidden" name="id" value="{ROW.id}" />
			<input type="hidden" name="compannycode" value="{ROW.company_code}" />
			<input type="hidden" name="compannyid" value="{ROW.companyid}" />
			<div class="d-flex mb-3">
				<div class="custom-control custom-radio mrg-r-15">
					<input type="radio" id="vietnamese" name="lang-form" checked="checked" class="custom-control-input" onclick="vietnamese_show();">
					<label class="custom-control-label" for="vietnamese">{LANG.lang_vi}</label>
				</div>
				<div class="custom-control custom-radio mrg-r-15">
					<input type="radio" id="english" name="lang-form" class="custom-control-input" onclick="english_show();">
					<label class="custom-control-label" for="english">{LANG.lang_en}</label>
				</div>
				<div class="custom-control custom-radio mrg-r-15">
					<input type="radio" id="en_vi_show" name="lang-form" class="custom-control-input" onclick="en_vi_show();">
					<label class="custom-control-label" for="en_vi_show">{LANG.lang_en_vi}</label>
				</div>
			</div>
			<hr />
			<div class="vi"> 
				
				<div class="form-row">
					<div class="form-group col-md-3 mb-3">
						<label>{LANG.debitcode}</label>			
						<input class="form-control" type="text" name="debitcode" value="{ROW.debitcode}" disabled/>
					</div>
					<div class="form-group col-md-3 mb-3">
						<label>{LANG.pid} <span class="red">(*)</span></label>
						<div >
							<select class="form-control" name="pid" id="productid" >
								<option value="0" > --  {LANG.product_choose} --</option>
								<!-- BEGIN: select_pid -->
								<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
								<!-- END: select_pid -->
							</select>
						</div>
					</div>
					<div class="form-group col-md-3 mb-3">
						<label>{LANG.serviceextra_customer} <span class="red">(*)</span></label>
						<div >
							<select class="form-control" name="cid" id ="customerid" >
								<!-- BEGIN: select_cid -->
								<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
								<!-- END: select_cid -->
							</select>
						</div>
					</div>
					<div class="form-group col-md-3 mb-3">
						<label>{LANG.yearmonth} <span class="red">(*)</span></label>
						<div class="form-row" >
							<div class="form-group col-md-6 mb-3">
								<select class="form-control" name="month" id="month" > 
									<!-- BEGIN: select_month -->
									<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
									<!-- END: select_month -->
								</select>
							</div>
							<div class="form-group col-md-6 mb-3">
								<select class="form-control" name="year" id="year" >
									<!-- BEGIN: select_year -->
									<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
									<!-- END: select_year -->
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3 mb-3">
						<label>{LANG.debitnotedate} <span class="red">(*)</span></label>
						<div class="input-group">
							<input class="form-control" type="text" name="debitnotedate" value="{ROW.debitnotedate}" id="debitnotedate" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
							<div class="input-group-append">
								<button class="btn btn-primary" type="button"><i class="lni lni-calendar"></i></button>
							</div>
						</div>
					</div>
					<div class="form-group col-md-4 mb-3">
						<div class="form-row">
							<div class="col-md-6 mb-3">
								<label>{LANG.datefrom} <span class="red">(*)</span></label>
								<div class="input-group">
									<input class="form-control" type="text" name="datefrom" value="{ROW.datefrom}" id="datefrom" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
									<div class="input-group-append">
										<button class="btn btn-primary" type="button"><i class="lni lni-calendar"></i></button>
									</div>
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label>{LANG.dateto} <span class="red">(*)</span></label>
								<div class="input-group">
									<input class="form-control" type="text" name="dateto" value="{ROW.dateto}" id="dateto" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
									<div class="input-group-append">
										<button class="btn btn-primary" type="button"><i class="lni lni-calendar"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group col-md-5 mb-3">
						<div class="form-row">
							<div class="col-md-6 mb-3">
								<label>{LANG.areareal} <span class="red">(*)</span></label>
								<div class="input-group">
									<input class="form-control" type="text" name="areareal" id="arearealh" value="{ROW.areareal}" />
									<input class="form-control" type="text" name="" id="areareal" value="{ROW.areareal}" disabled/>
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label>{LANG.exchangeusd} <span class="red">(*)</span></label>
								<input class="mask form-control" type="text" name="exchangeusd" id="exchangeusd" value="{ROW.exchangeusd}" onkeyup="this.value=FormatNumber(this.value);"/>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row ">
					<div class="col-md-6 mb-3 ">
						<label>{LANG.explain_vi} <span class="red">(*)</span></label>
						<input class="form-control" type="text" name="explain_vi" id="explain_vi" value="{ROW.explain_vi}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
					</div>
					<div class="col-md-6 mb-3 ">
						<label>{LANG.recipients_vi} <span class="red">(*)</span></label>
						<input class="form-control" type="text" name="recipients_vi" id="recipients_vi" value="{ROW.recipients_vi}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
					</div>
				</div>
				<div  >
					<div class="table-responsive">
						<table id="datatable-vi" class="table table-striped table-bordered">
							<thead class="thead-dark">
								<tr>
									<th>{LANG.service}</th>
									<th>{LANG.price}</th>
									<th>{LANG.amount}</th>
									<th>{LANG.total}</th>
								</tr>
							</thead>
							<tbody id="serviceextravi">
							</tbody>
							
							<tfoot class="tfoot-dark">
								<tr>
									<th>{LANG.service}</th>
									<th>{LANG.price}</th>
									<th>{LANG.amount}</th>
									<th>{LANG.total}</th>
								</tr>
							</tfoot>	
						</table>
					</div>
				</div>
				
				<div >
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<div class="form-row">
								<div class="col-md-6 mb-3">
									<label>{LANG.account_bank_vi} <span class="red">(*)</span></label>
									<input class="form-control" type="text" name="account_bank_vi" value="{ROW.account_bank_vi}" disabled />
								</div>
								<div class="col-md-6 mb-3">
									<label>{LANG.holding_vi} <span class="red">(*)</span></label>
									<input class="form-control" type="text" name="holding_vi" value="{ROW.holding_vi}" disabled />
								</div>
								<div class="col-md-12 mb-3">
									<label>{LANG.bank_name_vi} <span class="red">(*)</span></label>
									<input class="form-control" type="text" name="bank_name_vi" value="{ROW.bank_name_vi}" disabled />
								</div>
								<div class="col-md-12 mb-3">
									<label>{LANG.bank_address_vi} <span class="red">(*)</span></label>
									<div class="col-sm-19 col-md-20">
										<input class="form-control" type="text" name="bank_address_vi" value="{ROW.bank_address_vi}" disabled />
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label>{LANG.note_vi} <span class="red">(*)</span></label>
							<textarea class="form-control" style="height:195px;" cols="75" rows="5" name="note_vi"  id="note_vi" disabled>{ROW.note_vi}</textarea>
						</div>
					</div>
				</div>
				<hr/>
				<div class="form-row">
					<div class="col-md-6 mb-3">
						<div class="vi">
							<div class="form-row">
								<div class="col-md-6 mb-3">
									<label>{LANG.comapyname_vi} <span class="red">(*)</span></label>
									<input class="form-control" type="text" name="comapyname_vi" value="{ROW.comapyname_vi}" disabled />
								</div>
								<div class="col-md-6 mb-3">
									<label>{LANG.manager_name_vi} <span class="red">(*)</span></label>
									<input class="form-control" type="text" name="manager_name_vi" value="{ROW.manager_name_vi}" disabled />
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>{LANG.swiftcode} <span class="red">(*)</span></label>
							<input class="form-control" type="text" name="swiftcode" value="{ROW.swiftcode}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
						</div>
					</div>
					<div class="col-md-6 mb-3">
						<label>{LANG.note}</label>
						<textarea class="form-control" style="height:114px;" cols="75" rows="5" name="note">{ROW.note}</textarea>
					</div>
				</div>
			</div>
			<div class="en">
				
				<div class="form-row">
					<div class="form-group col-md-3 mb-3">
						<label>{LANG.debitcode}</label>			
						<input class="form-control" type="text" name="debitcode" value="{ROW.debitcode}" disabled/>
					</div>
					<div class="form-group col-md-3 mb-3">
						<label>{LANG.pid} <span class="red">(*)</span></label>
						<div >
							<select class="form-control" name="pid_en" id="productid_en" onchange="change_product_en(this)">
								<!-- BEGIN: select_pid_en -->
								<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
								<!-- END: select_pid_en -->
							</select>
						</div>
					</div>
					<div class="form-group col-md-3 mb-3">
						<label>{LANG.serviceextra_customer} <span class="red">(*)</span></label>
						<div >
							<select class="form-control" name="cid_en" id ="customerid_en" onchange="change_customer_en(this)">
								<!-- BEGIN: select_cid_en -->
								<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
								<!-- END: select_cid_en -->
							</select>
						</div>
					</div>
					<div class="form-group col-md-3 mb-3">
						<label>{LANG.yearmonth} <span class="red">(*)</span></label>
						<div class="form-row" >
							<div class="form-group col-md-6 mb-3">
								<select class="form-control" name="month_en" id="month_en" > 
									<!-- BEGIN: select_month_en -->
									<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
									<!-- END: select_month_en -->
								</select>
							</div>
							<div class="form-group col-md-6 mb-3">
								<select class="form-control" name="year_en" id="year_en" >
									<!-- BEGIN: select_year_en -->
									<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
									<!-- END: select_year_en -->
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3 mb-3">
						<label>{LANG.debitnotedate} <span class="red">(*)</span></label>
						<div class="input-group">
							<input class="form-control" type="text" name="debitnotedate_en" value="{ROW.debitnotedate}" id="debitnotedate_en" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
							<div class="input-group-append">
								<button class="btn btn-primary" type="button"><i class="lni lni-calendar"></i></button>
							</div>
						</div>
					</div>
					<div class="form-group col-md-4 mb-3">
						<div class="form-row">
							<div class="col-md-6 mb-3">
								<label>{LANG.datefrom} <span class="red">(*)</span></label>
								<div class="input-group">
									<input class="form-control" type="text" name="datefrom_en" value="{ROW.datefrom}" id="datefrom_en" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
									<div class="input-group-append">
										<button class="btn btn-primary" type="button"><i class="lni lni-calendar"></i></button>
									</div>
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label>{LANG.dateto} <span class="red">(*)</span></label>
								<div class="input-group">
									<input class="form-control" type="text" name="dateto_en" value="{ROW.dateto}" id="dateto_en" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
									<div class="input-group-append">
										<button class="btn btn-primary" type="button"><i class="lni lni-calendar"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group col-md-5 mb-3">
						<div class="form-row">
							<div class="col-md-6 mb-3">
								<label>{LANG.areareal} <span class="red">(*)</span></label>
								<div class="input-group">
									<input class="form-control" type="text" name="areareal_en" id="arearealh_en" value="{ROW.areareal}" />
									<input class="form-control" type="text" name="" id="areareal_en" value="{ROW.areareal}" disabled/>
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label>{LANG.exchangeusd} <span class="red">(*)</span></label>
								<input class="mask form-control" type="text" name="exchangeusd_en" id="exchangeusd_en" value="{ROW.exchangeusd}" onkeyup="this.value=FormatNumber(this.value);"/>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row mb-3">
					
					<div class="col-md-6 mb-3 ">
						<label>{LANG.explain_en} <span class="red">(*)</span></label>
						<input class="form-control" type="text" name="explain_en" id="explain_en" value="{ROW.explain_en}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
					</div>
					<div class="col-md-6 mb-3 ">
						<label>{LANG.recipients_en} <span class="red">(*)</span></label>
						<input class="form-control" type="text" name="recipients_en" id="recipients_en" value="{ROW.recipients_en}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
					</div>
				</div>
				<div >
					<div class="table-responsive">
						<table id="datatable-en" class="table table-striped table-bordered">
							<thead class="thead-dark">
								<tr>
									<th>{LANG.service}</th>
									<th>{LANG.price}</th>
									<th>{LANG.amount}</th>
									<th>{LANG.total}</th>
								</tr>
							</thead>
							<tbody id="serviceextraen">
							</tbody>
							<tfoot class="tfoot-dark">
								<tr>
									<th>{LANG.service}</th>
									<th>{LANG.price}</th>
									<th>{LANG.amount}</th>
									<th>{LANG.total}</th>
								</tr>
							</tfoot>	
						</table>
					</div>
				</div>
				<div >
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<div class="form-row">
								<div class="col-md-6 mb-3">
									<label>{LANG.account_bank_en} <span class="red">(*)</span></label>
									<input class="form-control" type="text" name="account_bank_en" value="{ROW.account_bank_en}" disabled />
								</div>
								<div class="col-md-6 mb-3">
									<label>{LANG.holding_en} <span class="red">(*)</span></label>
									<input class="form-control" type="text" name="holding_en" value="{ROW.holding_en}" disabled />
								</div>
																<div class="col-md-12 mb-3">
									<label>{LANG.bank_name_en} <span class="red">(*)</span></label>
									<input class="form-control" type="text" name="bank_name_en" value="{ROW.bank_name_en}" disabled />
								</div>
								<div class="col-md-12 mb-3">
									<label>{LANG.bank_address_en} <span class="red">(*)</span></label>
									<div class="col-sm-19 col-md-20">
										<input class="form-control" type="text" name="bank_address_en" value="{ROW.bank_address_en}" disabled />
									</div>
								</div>

							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label>{LANG.note_en}<span class="red">(*)</span></label>
							<textarea class="form-control" style="height:195px;" cols="75" rows="5" name="note_en"  id="note_en" disabled>{ROW.note_en}</textarea>
						</div>
					</div>
				</div>
				<hr/>
				<div class="form-row">
					<div class="col-md-6 mb-3">
						<div class="vi">
							<div class="form-row">
								<div class="col-md-6 mb-3">
									<label>{LANG.comapyname_en} <span class="red">(*)</span></label>
									<input class="form-control" type="text" name="comapyname_en" value="{ROW.comapyname_en}" disabled />
								</div>
								<div class="col-md-6 mb-3">
									<label>{LANG.manager_name_en} <span class="red">(*)</span></label>
									<input class="form-control" type="text" name="manager_name_en" value="{ROW.manager_name_en}" disabled />
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>{LANG.swiftcode} <span class="red">(*)</span></label>
							<input class="form-control" type="text" name="swiftcode" value="{ROW.swiftcode}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
						</div>
					</div>
					<div class="col-md-6 mb-3">
						<label>{LANG.note}</label>
						<textarea class="form-control" style="height:114px;" cols="75" rows="5" name="note">{ROW.note}</textarea>
					</div>
				</div>
				
			</div>
			
			<div class="text-center">
				<button class="btn btn-primary" name="submit" type="submit"><i class="lni lni-save mrg-r-5"></i>{LANG.add}</button>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<div class="lobibox-notify-wrapper top right"></div>
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
			var html_vi='';
			var html_en='';
			if (a.status == "OKE") {
				$('#areareal').val(a.message.areareal);
				$('#arearealh').val(a.message.areareal);
				html_vi = html_vi + '<tr><td >{LANG.contract} ' + a.message.debitnote.yearmonth + '</td><td><input class="mask form-control" type="text" name="pricevnd" value="' + a.message.price_f_vi + '" onkeyup="this.value=FormatNumber(this.value);"></td><td>1 {LANG.month_vi}<input  type="hidden" name="pricevndamount" value="1" id="pricevndamount"></td><td><input class="mask form-control" type="text" name="pricevndtoltal" value="' + a.message.price_f_vi + '" onkeyup="this.value=FormatNumber(this.value);"></td></tr>';
				html_vi = html_vi + '<tr><td >{LANG.feevnd} ' + a.message.debitnote.yearmonth + '</td><td><input class="mask form-control" type="text" name="feevnd" value="' + a.message.fee_f_vi + '" onkeyup="this.value=FormatNumber(this.value);"></td><td>1 {LANG.month_vi}<input  type="hidden" name="feevndamount" value="1" id="feevndamount"></td><td><input class="mask form-control" type="text" name="feevndtoltal" value="' + a.message.fee_f_vi + '" onkeyup="this.value=FormatNumber(this.value);"></td></tr>';
				html_en = html_en + '<tr><td > {LANG.contract} ' + a.message.debitnote.yearmonth + '</td><td><input class="mask form-control" type="text" name="priceusd" value="' + a.message.price_f_en + '" onkeyup="this.value=FormatNumber(this.value);"></td><td>1 {LANG.month_en}<input  type="hidden" name="priceusdamount" value="1" id="priceusdamount"></td><td><input class="mask form-control" type="text" name="priceusdtoltal" value="' + a.message.price_f_en + '" onkeyup="this.value=FormatNumber(this.value);"></td></tr>';
				html_en = html_en + '<tr><td > {LANG.feeusd} ' + a.message.debitnote.yearmonth + '</td><td><input class="mask form-control" type="text" name="feeusd" value="' + a.message.fee_f_en + '" onkeyup="this.value=FormatNumber(this.value);"></td><td>1 {LANG.month_en}<input  type="hidden" name="feeusdamount" value="1" id="feeusdamount"></td><td><input class="mask form-control" type="text" name="feeusdtoltal" value="' + a.message.fee_f_en + '" onkeyup="this.value=FormatNumber(this.value);"></td></tr>';

				$('#servicemainvi').html(html_vi);
				$('#servicemainen').html(html_en);
				$("input.mask").on("change");
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
		var datefrom = $("#datefrom").val();
		var dateto = $("#dateto").val();
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
					
					html_vi = html_vi + '<tr><td > <a href="javascript:show_modal_serviceextrainfo_vi(' + data.sid + ');" id="serviceextra_detail_vi" data-id="' + data.sid + '">' + data.title + ' ' + data.yearmonth + '</a></td><td><input class="form-control" name="pricevnd" value="' + data.pricevnd_f + '" onkeyup="this.value=FormatNumber(this.value);"></td><td><input class="form-control" name="amountvndtoltal" id="amountvndtoltal" value="' + data.amount_f + '" onkeyup="this.value=FormatNumber(this.value);">' + ' ' + data.unit + '</td><td><input class="form-control" name="pricevndtoltal" value="' + data.totalvnd_f + '" onkeyup="this.value=FormatNumber(this.value);"></td></tr>';
					html_en = html_en + '<tr><td > <a href="javascript:show_modal_serviceextrainfo_en(' + data.sid + ');" id="serviceextra_detail_en" data-id="' + data.sid + '">' + data.title + ' ' + data.yearmonth + '</a></td><td><input class="form-control" name="priceusd" value="' + data.priceusd_f + '" onkeyup="this.value=FormatNumber(this.value);"></td><td><input class="form-control" name="amountusdtoltal" id="amountvndtoltal" value="' + data.amount_f + '" onkeyup="this.value=FormatNumber(this.value);">' + ' ' + data.unit + '</td><td><input class="form-control" name="priceusdtoltal" value="' + data.totalusd_f + '" onkeyup="this.value=FormatNumber(this.value);"></td></tr>';
				});
				
				$('#serviceextravi').html(html_vi);
				$('#serviceextraen').html(html_en);
			} else {
				$('#serviceextravi').html('<td colspan="6">{LANG.no_service_extra_vi}</td>');
				$('#serviceextraen').html('<td colspan="6">{LANG.no_service_extra_en}</td>');
			}
		});
	}
	function show_modal_serviceextrainfo_vi(sid){
		
		//var sid = $('#serviceextra_detail_vi').attr("data-id");
		var customerid = $("#customerid").val();
		var productid = $("#productid").val();
		var month = $("#month").val();
		var year = $("#year").val();
		var datefrom = $("#datefrom").val();
		var dateto = $("#dateto").val();
		var yearmonth = month+year;
		console.log(sid);
		 $.ajax({
			type: 'POST',
			url: nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=lease&' + nv_fc_variable + '=ajax/getServiceExtraInfo',
			cache: !1,
			beforeSend: function() {
				// setting a timeout
				return 1;
			},
			data: {
				nv_ajax: 1,
				customerid: customerid,
				productid: productid,
				yearmonth: yearmonth,
				sid: sid
			},
			dataType: "json"
		}).done(function(a) {
			var html_vi='';
			var html_en='';
			if (a.status == "OKE") {
				console.log(a);
			} else {
				console.log(a);
			}
		});
	}
	function show_modal_serviceextrainfo_en(sid){
		
		//var sid = $('#serviceextra_detail_vi').attr("data-id");
		var customerid = $("#customerid").val();
		var productid = $("#productid").val();
		var month = $("#month").val();
		var year = $("#year").val();
		var datefrom = $("#datefrom").val();
		var dateto = $("#dateto").val();
		var yearmonth = month+year;
		console.log(sid);
		 $.ajax({
			type: 'POST',
			url: nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=lease&' + nv_fc_variable + '=ajax/getServiceExtraInfo',
			cache: !1,
			beforeSend: function() {
				// setting a timeout
				return 1;
			},
			data: {
				nv_ajax: 1,
				customerid: customerid,
				productid: productid,
				yearmonth: yearmonth,
				sid: sid
			},
			dataType: "json"
		}).done(function(a) {
			var html_vi='';
			var html_en='';
			if (a.status == "OKE") {
				console.log(a);
			} else {
				console.log(a);
			}
		});
	}
	function change_product(){
		var productid = $("#productid").val();
		 $.ajax({
			type: 'POST',
			url: nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=lease&' + nv_fc_variable + '=ajax/GetCustomerAll',
			cache: !1,
			data: {
				nv_ajax: 1,
				productid: productid
			},
			dataType: "json"
		}).done(function(a) {
			if (a.status == "OKE") {
				$("#customerid").html('');
				$.each(a.message,function(index, data){ 
					
					$("#customerid").append('<option value="' + data.cid + '"> ' + data.title + '</option>');
				});
				
				change_customer();
			} else {
				console.log('Error' + a.message);
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
		var html_vi='';
			var html_en='';
			if (a.status == "OKE") {
				check_services_extra();
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
		var explain_en = '{LANG.note_explain_en} {LANG.from_en} ' + datefrom + ' {LANG.to_en} ' + dateto ;
		$("#explain_en").val(explain_en);
		
	}
	$(document).ready(function(){
		$("#month,#year").on("change",function(){
			change_customer()
			change_exchange();
			
		});
		$("#productid").on("change",function(){
			change_product();
		});
		$("#serviceextra_detail_vi").click(function(e){
		console.log(this);
			show_modal_serviceextrainfo(this);
		});
		$("#serviceextra_detail_en").click(function(e){
			show_modal_serviceextrainfo(this);
		});
		
		change_exchange();
		change_date();
		
	});
	$("input.mask").each((i,ele)=>{
            let clone=$(ele).clone(false)
            clone.attr("type","text")
            let ele1=$(ele)
            clone.val(Number(ele1.val()).toLocaleString("en"))
            $(ele).after(clone)
            $(ele).hide()
            clone.mouseenter(()=>{

                ele1.show()
                clone.hide()
            })
            setInterval(()=>{
                let newv=Number(ele1.val()).toLocaleString("en")
                if(clone.val()!=newv){
                    clone.val(newv)
                }
            },10)

            $(ele).mouseleave(()=>{
                $(clone).show()
                $(ele1).hide()
            })
            

        });
//]]>
</script>
<script src="/themes/softs/js/jquery.dataTables.min.js"></script>
<script src="/themes/softs/js/notifications.js"></script>
<script src="/themes/softs/js/notification-custom-script.js"></script>

<script>
$(document).ready(function () {
	//Default data table
	
	//$('#datatable-en').DataTable();
	
});
</script>
<script>

function FormatNumber(str) {

	var strTemp = GetNumber(str);
	if (strTemp.length <= 3)
		return strTemp;
	strResult = "";
	for (var i = 0; i < strTemp.length; i++)
		strTemp = strTemp.replace(",", "");
	var m = strTemp.lastIndexOf(".");
	if (m == -1) {
		for (var i = strTemp.length; i >= 0; i--) {
			if (strResult.length > 0 && (strTemp.length - i - 1) % 3 == 0)
				strResult = "," + strResult;
			strResult = strTemp.substring(i, i + 1) + strResult;
		}
	} else {
		var strNatural = strTemp.substring(0, strTemp.lastIndexOf("."));
		var strdecimals = strTemp.substring(strTemp.lastIndexOf("."), strTemp.length);
		var tam = 0;
		for (var i = strNatural.length; i >= 0; i--) {

			if (strResult.length > 0 && tam == 4) {
				strResult = "," + strResult;
				tam = 1;
			}

			strResult = strNatural.substring(i, i + 1) + strResult;
			tam = tam + 1;
		}
		strResult = strResult + strdecimals;
	}
	return strResult;
}

function GetNumber(str) {
	var count = 0;
	for (var i = 0; i < str.length; i++) {
		var temp = str.substring(i, i + 1);
		if (!(temp == "," || temp == "." || (temp >= 0 && temp <= 9))) {
			error_noti('{LANG.error}', '{LANG.error_input_number}');
			return str.substring(0, i);
		}
		if (temp == " ")
			return str.substring(0, i);
		if (temp == ".") {
			if (count > 0)
				return str.substring(0, ipubl_date);
			count++;
		}
	}
	return str;
}
function vietnamese_show()
{
	$('.vi').show('slow');
	$('.en').hide('slow');
}
function english_show()
{
	$('.en').show('slow');
	$('.vi').hide('slow');
}
function en_vi_show()
{
	$('.en').show('slow');
	$('.vi').show('slow');
}
</script>
<!-- END: main -->