<!-- BEGIN: main -->
<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/lobibox.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="{NV_BASE_SITEURL}themes/default/js/moment.js"></script>
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
				<li class="breadcrumb-item active" aria-current="page">{LANG.debitnote_add}</li>
			</ol>
		</nav>
	</div>
	<div class="ml-auto">
		<div class="btn-group">
			<a type="button" class="btn btn-success" href="{debitnote_add}"><i class="lni lni-add-files mrg-r-5"></i>{LANG.add}</a>
		</div>
	</div>
</div>
<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.debitnote_add}</h4>
		</div>
		
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
						<label>{LANG.debitnotedate}</label>
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
								<label>{LANG.areareal}</label>
								<div class="input-group">
									<input class="form-control" type="text" name="areareal" id="arearealh" value="{ROW.areareal}" />
									<input class="form-control" type="text" name="" id="areareal" value="{ROW.areareal}" disabled/>
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label>{LANG.exchangeusd}</label>
								<input readonly class="mask form-control" type="text" name="exchangeusd" id="exchangeusd" value="{ROW.exchangeusd}" onkeyup="this.value=FormatNumber(this.value);"/>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row ">
					<div class="col-md-12 mb-3 ">
						
						<button  type="button"  id="update_service"   > {LANG.update_service} </button>
					</div>
				</div>
				<div class="form-row ">
					<div class="col-md-12 mb-3 ">
						<label>{LANG.explain_vi}</label>
						<input class="form-control" type="text" name="explain_vi" id="explain_vi" value="{ROW.explain_vi}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
					</div>
				</div>
				<div class="table-responsive">
					<table id="datatable-vi" class="table table-striped table-bordered">
						<thead class="thead-dark">
							<tr>
								<th>Tên dịch vụ</th>
								<th>{LANG.price}</th>
								<th>{LANG.areal}</th>
								<th>{LANG.amount}</th>
								<th>{LANG.total}</th>
							</tr>
						</thead>
						<tbody id="servicemainvi"></tbody>
						<tfoot >
							<tr>
								<th colspan="4">Thành tiền</th>
								<th><input class="mask form-control" type="text" name="total" value="{ROW.total}" id="total_vi" onkeyup="this.value=FormatNumber(this.value);" readonly=""/></th>
							</tr>
							<tr>
								<th colspan="4">Thuế 10%</th>
								<th><input class="mask form-control" type="text" name="vat" value="{ROW.vat}" id="vat_vi" onkeyup="this.value=FormatNumber(this.value);" readonly='' /></th>
							</tr>
							<tr>
								<th colspan="4">Tổng thành tiền</th>
								<th><input class="mask form-control" type="text" name="sum_total" value="{ROW.vat}" id="sum_total_vi" onkeyup="this.value=FormatNumber(this.value);" readonly=''/></th>
							</tr>
						</tfoot>
					</table>
				</div>
				<div class="alert alert-info" role="alert">
					<h4 class="alert-heading">Thông tin thanh toán:</h4>
						<p>
							<ul>
								<li>{LANG.bank_name_vi}: {ROW.bank_name_vi} - Chi nhánh: {ROW.bank_address_vi}</li>
								<li>{LANG.holding_vi}: {ROW.holding_vi}</li>
								<li>{LANG.account_bank_vi}: {ROW.account_bank_vi}</li>
							</ul>
						</p>
						<hr>
						<p class="mb-0">Lưu ý thanh toán: {ROW.note_vi}</p>
				</div>

				<div class="form-row">
					<div class="col-md-12 mb-3">
						<label>{LANG.note}</label>
						<textarea class="form-control" style="height:114px;" cols="75" rows="5" name="note">{ROW.note}</textarea>
					</div>
				</div>	
				<div class="form-row">
					<div class="col-md-3 mb-3 ">
						<label>{LANG.recipients_vi} <span class="red">(*)</span></label>
						<input class="form-control" type="text" name="recipients_vi" id="recipients_vi" value="{ROW.recipients_vi}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
					</div>
					
					<div class="col-md-3 mb-3">
						<label>{LANG.comapyname_vi}</label>
						<input class="form-control" type="text" name="comapyname_vi" value="{ROW.comapyname_vi}" disabled />
					</div>
					<div class="col-md-3 mb-3">
						<label>{LANG.manager_name_vi}</label>
								<input class="form-control" type="text" name="manager_name_vi" value="{ROW.manager_name_vi}" disabled />
					</div>
					<div class="col-md-3 mb-3">
						<label>Ngày ký</label>
						<input class="form-control" type="text" name="" value="{ROW.}" disabled />
					</div>
				</div>
			</div>
			<div class="en">
				<div class="form-row">
					<div class="form-group col-md-3 mb-3">
						<label>Code</label>			
						<input class="form-control" type="text" name="debitcode" value="{ROW.debitcode}" disabled/>
					</div>
					<div class="form-group col-md-3 mb-3">
						<label>Product <span class="red">(*)</span></label>
						<select class="form-control" name="pid_en" id="productid_en" onchange="change_product_en(this)">
							<option value="0" > --  {LANG.product_choose} --</option>
							<!-- BEGIN: select_pid_en -->
								<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
							<!-- END: select_pid_en -->
						</select>
					</div>
					<div class="form-group col-md-3 mb-3">
						<label>Customer <span class="red">(*)</span></label>
						<div >
							<select class="form-control" name="cid_en" id ="customerid_en" onchange="change_customer_en(this)">
								<!-- BEGIN: select_cid_en -->
								<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
								<!-- END: select_cid_en -->
							</select>
						</div>
					</div>
					<div class="form-group col-md-3 mb-3">
						<label>Payment period <span class="red">(*)</span></label>
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
						<label>Date created</label>
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
								<label>From day <span class="red">(*)</span></label>
								<div class="input-group">
									<input class="form-control" type="text" name="datefrom_en" value="{ROW.datefrom}" id="datefrom_en" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
									<div class="input-group-append">
										<button class="btn btn-primary" type="button"><i class="lni lni-calendar"></i></button>
									</div>
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label>To Date <span class="red">(*)</span></label>
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
								<label>Actual rental area</label>
								<div class="input-group">
									<input class="form-control" type="text" name="areareal_en" id="arearealh_en" value="{ROW.areareal}" />
									<input class="form-control" type="text" name="" id="areareal_en" value="{ROW.areareal}" disabled/>
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label>Exchange rate</label>
								<input class="mask form-control" type="text" name="exchangeusd_en" id="exchangeusd_en" value="{ROW.exchangeusd}" readonly onkeyup="this.value=FormatNumber(this.value);"/>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row mb-3">
					<div class="col-md-12 mb-3 ">
						<label>{LANG.explain_en} <span class="red">(*)</span></label>
						<input class="form-control" type="text" name="explain_en" id="explain_en" value="{ROW.explain_en}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
					</div>
				</div>
				
				<div class="table-responsive">
						<table id="datatable-en" class="table table-striped table-bordered">
							<thead class="thead-dark">
								<tr>
									<th>Rental service</th>
									<th>Price</th>
									<th>Amount</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody id="servicemainen"></tbody>
							<tfoot >
							<tr>
								<th colspan="4">Total</th>
								<th><input class="mask form-control" type="text" name="total_en" value="{ROW.total}" id="total_en" onkeyup="this.value=FormatNumber(this.value);"/></th>
							</tr>
							<tr>
								<th colspan="4">VAT 10%</th>
								<th><input class="mask form-control" type="text" name="vat_en" value="{ROW.vat}" id="vat_en" onkeyup="this.value=FormatNumber(this.value);"/></th>
							</tr>
							<tr>
								<th colspan="4">Sum Total</th>
								<th><input class="mask form-control" type="text" name="sumtotal_en" value="{ROW.vat}" id="sumtotal_en" onkeyup="this.value=FormatNumber(this.value);"/></th>
							</tr>
						</tfoot>
						</table>
					</div>
					
				<div class="alert alert-info" role="alert">
					<h4 class="alert-heading">Billing Information:</h4>
						<p>
							<ul>
								<li>{LANG.bank_name_en}: {ROW.bank_name_en} - Branch: {ROW.bank_address_en}</li>
								<li>{LANG.holdingen_en}: {ROW.holding_en}</li>
								<li>{LANG.account_bank_en}: {ROW.account_bank_en}</li>
								<li>{LANG.swiftcode}: {ROW.swiftcode}</li>
							</ul>
						</p>
						<hr>
						<p class="mb-0">Pay Attention: {ROW.note_en}</p>
				</div>
				<div class="form-row">
					<div class="col-md-12 mb-3">
						<label>Note</label>
						<textarea class="form-control" style="height:114px;" cols="75" rows="5" name="note">{ROW.note}</textarea>
					</div>
				</div>
					
				<div class="form-row">
					<div class="col-md-3 mb-3 ">
						<label>{LANG.recipients_en} <span class="red">(*)</span></label>
						<input class="form-control" type="text" name="recipients_en" id="recipients_en" value="{ROW.recipients_en}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
					</div>
					<div class="col-md-3 mb-3">
						<label>{LANG.comapyname_en}</label>
						<input class="form-control" type="text" name="comapyname_en" value="{ROW.comapyname_en}" disabled />
					</div>
					<div class="col-md-3 mb-3">
						<label>{LANG.manager_name_en} </label>
						<input class="form-control" type="text" name="manager_name_en" value="{ROW.manager_name_en}" disabled />
					</div>
					<div class="col-md-3 mb-3">
						<label>Sign day</label>
						<input class="form-control" type="text" name="manager_name_en" value="{ROW.manager_name_en}" disabled />
					</div>
				</div>
						
			</div>
			
			<div class="text-center">
				<input type="hidden" name="list_mainservices" id="list_mainservices" value="{LIST_ALL}" />
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
	let list_all = [];
	function check_services(){
		var customerid = $("#customerid").val();
		var productid = $("#productid").val();
		var month = $("#month").val();
		var year = $("#year").val();
		var yearmonth = month+year;
		var datefrom = $("#datefrom").val();
		var dateto = $("#dateto").val();
		var datea = datefrom.split("/", 3);
		var dateb = dateto.split("/", 3);
		var array_3month = [];
		if(month == '01'){
			array_3month=['01',"02","03"];
		}else
		if(month == '02'){
			 array_3month=['04',"05","06"];
		}else
		if(month == '03'){
			 array_3month=['07',"08","09"];
		}else
		if(month == '04'){
			 array_3month=['10',"11","12"];
		}
		for (var i = 0; i < datea.length; i++) {

			if(i==0){
				var dated = datea[i];
			}else if(i==1){
				var datem = datea[i];
			}else if(i==2){
				var datey = datea[i];
			}
		}
		a = datey + '-' + datem + '-' + dated;

		for (var i = 0; i < dateb.length; i++) {

			if(i==0){
				var dated1 = dateb[i];
			}else if(i==1){
				var datem1 = dateb[i];
			}else if(i==2){
				var datey1 = dateb[i];
			}
		}
		b = datey1 + '-' + datem1 + '-' + dated1;

		var time_begin_int=moment(new Date(a)).unix();
		var time_end_int=moment(new Date(b)).unix();



		var time_begin_string = moment(moment(time_begin_int*1000).format('DD/MM/YYYY'), 'DD/MM/YYYY');
		var time_end_string = moment(moment(time_end_int*1000).format('DD/MM/YYYY'), 'DD/MM/YYYY');
		if(time_end_string < time_begin_string){
			alert('Ngày kết thúc phải lớn hơn ngày bắt đầu!');
		}
		pos = array_3month.indexOf(datem);
		console.log(pos);
		if(pos == -1){
			alert('Ngày bắt đầu không thuộc quý ' + month);
		}
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
				yearmonth: yearmonth,
				datefrom: datefrom,
				dateto: dateto
			},
			dataType: "json"
		}).done(function(a) {
			var html_vi='';
			var html_en='';
			if (a.status == "OKE") {
				$('#servicemainvi').html('');
				var i=0;
				var total=0;
				$.each(a.message,function(index, data){ 
					$.each(data.data,function(key, debitnote){
						i++;
						html_vi = '<tr id="row_' + debitnote.i + '"><td >' + debitnote.service_name_vi + ' {LANG.yearmonth_vi} ' + debitnote.yearmonth_format + '</td><td><input class="mask form-control" type="text" name="priceusd_' + debitnote.i + '[]" id="priceusd_' + debitnote.i + '" value="' + debitnote.price_f_en + '" onkeyup="this.value=FormatNumber(this.value);" onchange="total_debitnote();"> (USD) <span id="pricevnd_' + debitnote.i + '">' + debitnote.price_f_vi + ' </span>VNĐ/m2</td><td>' + debitnote.area_f_vi + ' ' + debitnote.areal_unit_vi + '</td><td>' + debitnote.amountmonth_f_en + ' ' + debitnote.unit_month_vi + ',' + debitnote.amountday_f_en + ' ' + debitnote.unit_day_vi + '</td><td><input class="mask form-control" type="text" name="priceusdtoltal_' + debitnote.i + '[]"  id="priceusdtoltal_' + debitnote.i + '" value="' + debitnote.total_priceusd_f_en + '" onkeyup="this.value=FormatNumber(this.value);" readonly = ""> (USD) <span id="totalvnd_' + debitnote.i + '" > ' + debitnote.total_pricevnd_f_vi + '</span> VNĐ <input type="hidden" name="service_' + debitnote.i + '[]" id="service_' + debitnote.i + '" value="' + debitnote.serviceid + '" ><input type="hidden" name="yearmonth_' + debitnote.i + '[]" id="yearmonth_' + debitnote.i + '" value="' + debitnote.yearmonth + '" ><input type="hidden" name="amount_month_' + debitnote.i + '[]" id="amount_month_' + debitnote.i + '" value="' + debitnote.amountmonth_f_en + '" ><input type="hidden" name="amount_day_' + debitnote.i + '[]" id="amount_day_' + debitnote.i + '" value="' + debitnote.amountday_f_en + '" ><input type="hidden" name="area_' + debitnote.i + '[]" id="area_' + debitnote.i + '" value="' + debitnote.amount + '" ></td></tr>';
						$('#servicemainvi').append(html_vi);
						list_all.push({"name_service":debitnote.serviceid,"time_begin":index,"time_end":index,"priceusd":debitnote.price_f_en,"quantity":debitnote.amount,"month":debitnote.amountmonth, "day":debitnote.amountday});
					});
					
					
				});
				total_debitnote();
				$('#areareal').val(a.areareal);
				$('#arearealh').val(a.areareal);
				//html_vi = html_vi + '<tr><td >' + a.message.service_name_vi + ' {LANG.yearmonth_vi} ' + a.message.yearmonth_format + '</td><td><input class="mask form-control" type="text" name="pricevnd" value="' + a.message.price_f_vi + '" onkeyup="this.value=FormatNumber(this.value);"></td><td><input  type="text" name="pricevndamount" value="' + a.message.amount + '" id="pricevndamount"> ' + a.message.unit_vi + '</td><td><input class="mask form-control" type="text" name="pricevndtoltal" value="' + a.message.total_pricevnd_f_vi + '" onkeyup="this.value=FormatNumber(this.value);"></td></tr>';
				//html_vi = html_vi + '<tr><td >{LANG.feevnd_vi} {LANG.yearmonth_vi} ' + a.message.yearmonth_format + '</td><td><input class="mask form-control" type="text" name="feevnd" value="' + a.message.fee_f_vi + '" onkeyup="this.value=FormatNumber(this.value);"></td><td><input  type="text" name="feevndamount" value="' + a.message.amount + '" id="feevndamount"> ' + a.message.unit_vi + '</td><td><input class="mask form-control" type="text" name="feevndtoltal" value="' + a.message.total_feevnd_f_vi + '" onkeyup="this.value=FormatNumber(this.value);"></td></tr>';
				//html_en = html_en + '<tr><td >' + a.message.service_name_en + ' {LANG.yearmonth_en} ' + a.message.yearmonth_format + '</td><td><input class="mask form-control" type="text" name="priceusd" value="' + a.message.price_f_en + '" onkeyup="this.value=FormatNumber(this.value);"></td><td><input  type="text" name="priceusdamount" value="' + a.message.amount + '" id="priceusdamount"> ' + a.message.unit_en + '</td><td><input class="mask form-control" type="text" name="priceusdtoltal" value="' + a.message.total_priceusd_f_en + '" onkeyup="this.value=FormatNumber(this.value);"></td></tr>';
				//html_en = html_en + '<tr><td > {LANG.feeusd_en} {LANG.yearmonth_en}' + a.message.yearmonth_format + '</td><td><input class="mask form-control" type="text" name="feeusd" value="' + a.message.fee_f_en + '" onkeyup="this.value=FormatNumber(this.value);"></td><td><input  type="text" name="feeusdamount" value="' + a.message.amount + '" id="feeusdamount"> ' + a.message.unit_en + '</td><td><input class="mask form-control" type="text" name="feeusdtoltal" value="' + a.message.total_feeusd_f_en + '" onkeyup="this.value=FormatNumber(this.value);"></td></tr>';

				//$('#servicemainvi').html(html_vi);
				//$('#servicemainen').html(html_en);
				//$("input.mask").on("change");
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
				check_services();
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
	function total_debitnote(){
		console.log(list_all);
		list_all = [];
		var item = $('#servicemainvi > tr');
		var total =0;
		var exchangeusd = $("#exchangeusd").val();
		for (var i = 1; i <= item.length; i++) {
			serviceid = $('#service_' + i).val();
			yearmonth = $('#yearmonth_' + i).val();
			priceusd = $('#priceusd_' + i).val();
			$('#pricevnd_' + i).val(priceusd*exchangeusd);
			console.log(priceusd);
			area = $('#area_' + i).val();
			console.log(area);
			amount_month = $('#amount_month_' + i).val();
			console.log(amount_month);
			amount_day = $('#amount_day_' + i).val();
			console.log(amount_day);
			total_i = parseFloat(priceusd)*parseFloat(area)*parseFloat(amount_month) + (((parseFloat(priceusd)*parseFloat(area))/30)*parseFloat(amount_day));
			$('#priceusdtoltal_'  + i).val(total_i);
			$('#totalvnd_' + i).val(total_i*exchangeusd);
			total += parseFloat(total_i);
			list_all.push({"name_service":serviceid,"time_begin":yearmonth,"time_end":yearmonth,"priceusd":priceusd,"quantity":area,"month":amount_month, "day":amount_day});
			
		}
		total_vat = parseFloat(total)*10/100;
		sum_total = total + total_vat;
		console.log(list_all);
		listall = JSON.stringify(list_all)
		$("#list_mainservices").val(listall);
		$("#total_vi").val(total);
		$("#vat_vi").val(total_vat);
		$("#sum_total_vi").val(sum_total);
		console.log(item.length);
	}
	function change_date(){
		var datefrom = $("#datefrom").val();
		var dateto = $("#dateto").val();
		var month = $("#month").val();
		var year = $("#year").val();
		var datea = datefrom.split("/", 3);
		var dateb = dateto.split("/", 3);
		var array_3month = [];
		if(month == '01'){
			array_3month=['01',"02","03"];
		}else
		if(month == '02'){
			 array_3month=['04',"05","06"];
		}else
		if(month == '03'){
			 array_3month=['07',"08","09"];
		}else
		if(month == '04'){
			 array_3month=['10',"11","12"];
		}
		for (var i = 0; i < datea.length; i++) {

			if(i==0){
				var dated = datea[i];
			}else if(i==1){
				var datem = datea[i];
			}else if(i==2){
				var datey = datea[i];
			}
		}
		datefrom = dated + '/' + array_3month[0] + '/' + year;

		for (var i = 0; i < dateb.length; i++) {

			if(i==0){
				var dated1 = dateb[i];
			}else if(i==1){
				var datem1 = dateb[i];
			}else if(i==2){
				var datey1 = dateb[i];
			}
		}
		dateto = dated1 + '/' + array_3month[2] + '/' + year;
		$("#datefrom").val(datefrom);
		$("#dateto").val(dateto);
		var explain_vi = '{LANG.note_explain_vi} {LANG.from_vi} ' + datefrom + ' {LANG.to_vi} ' + dateto ;
		$("#explain_vi").val(explain_vi);
		var explain_en = '{LANG.note_explain_en} {LANG.from_en} ' + datefrom + ' {LANG.to_en} ' + dateto ;
		$("#explain_en").val(explain_en);
		
	}
	$(document).ready(function(){
		$("#month,#year").on("change",function(){
			change_customer();
			change_exchange();
			change_date();
			
		});
		$("#productid").on("change",function(){
			change_product();
		});
		$("#update_service").click(function(){
			change_product();
			change_exchange();
			change_date();
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