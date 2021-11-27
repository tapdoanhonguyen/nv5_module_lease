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
				<li class="breadcrumb-item active" aria-current="page">{action}</li>
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
			<h4 class="mb-0">{action}</h4>
		</div>
		<hr/>
		<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
		<!-- BEGIN: error -->
		<div class="alert alert-warning">{ERROR}</div>
		<!-- END: error -->
		<!-- BEGIN: form -->
		<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}/waitingview" method="post">
			<input type="hidden" name="id" value="{ROW.id}" />
			<input type="hidden" name="compannycode" value="{ROW.company_code}" />
			<input type="hidden" name="compannyid" value="{ROW.companyid}" />
			<input type="hidden" name="status" value="2" />
			<!-- END: form -->
			<div class="table-responsive" style="margin-bottom: 20px">
				<table border="1" cellpadding="10" cellspacing="1" width="100%">
					<tr>
						<td>
							<strong>{LANG.debitcode}: </strong>{ROW.debitcode}	
						</td>
						<td>
							<strong>{LANG.product}: </strong>{ROW.product}	
						</td>
						<td>
							<strong>{LANG.customer}: </strong>{ROW.customer}	
						</td>
					</tr>
					<tr>
						<td>
							<strong>{LANG.debitnotedate}: </strong>{ROW.debitnotedate}
						</td>
						<td>
							<strong>{LANG.areareal}: </strong>{ROW.areareal} {LANG.m2}
						</td>
						<td>
							<strong>{LANG.exchangeusd}: </strong>{ROW.exchangeusd}
						</td>
					</tr>

				</table>
			</div>
			<div>
				<strong>{LANG.listservice}</strong> 
			</div>
			<div class="vi">
				<strong>{LANG.explain_vi}: </strong>{ROW.explain_vi}
			</div>
			<div class="en">
				<strong>{LANG.explain_en}: </strong>{ROW.explain_en}
			</div>
			<div  class="vi">
				<div class="table-responsive" style="margin-bottom: 20px">
					<table border="1" cellpadding="10" cellspacing="1" width="100%">
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
							<!-- BEGIN: service_vi -->
							<tr>
								<td>{DBN.service_name}</td>
								<td>{ROW.datefrom_format}</td>
								<td>{ROW.dateto_format}</td>
								<td style="text-align:right">{DBN.price_format_vi}</td>
								<td style="text-align:right">{DBN.amount_format}</td>
								<td style="text-align:right">{DBN.total_format_vi}</td>
							</tr>
							<!-- END: service_vi -->
						</tbody>
						<tfoot>
							<tr>
								<th colspan="5" style="text-align:right">{LANG.total}</th>
								<th style="text-align:right">{total_format_vi}</th>
							</tr>
							
						</tfoot>	
					</table>
				</div>
			</div>
			<div  class="en">
				<div class="table-responsive" style="margin-bottom: 20px">
					<table border="1" cellpadding="10" cellspacing="1" width="100%">
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
								<th colspan="5" style="text-align:right">{LANG.total}</th>
								<th style="text-align:right">{total_format_en}</th>
							</tr>
						</tfoot>		
					</table>
				</div>
			</div>
			<div style="margin-bottom: 20px">
				<div class="vi">
					<strong>{LANG.recipients_vi}: </strong>{ROW.recipients_vi}
				</div>
				<div class="en">
					<strong>{LANG.recipients_en}: </strong>{ROW.recipients_en}
				</div>
			</div>
			<div class="vi">
				<div class="table-responsive" style="margin-bottom: 20px">
					<table border="1" cellpadding="10" cellspacing="1" width="100%">
						<tbody>
							<tr>
								<td>
									<strong>{LANG.account_bank_vi}: </strong>{ROW.account_bank_vi}
								</td>
								<td>
									<strong>{LANG.holding_vi}: </strong>{ROW.holding_vi}
								</td>
							</tr>
							<tr>
								<td>
									<strong>{LANG.bank_name_vi}: </strong>{ROW.bank_name_vi}
								</td>
								<td>
									<strong>{LANG.bank_address_vi}: </strong>{ROW.bank_address_vi}
								</td>
							</tr>
							<tr>
								<td colspan="4">
									<strong>{LANG.note_vi}: </strong>{ROW.node_vi}
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="en">
				<div class="table-responsive" style="margin-bottom: 20px">
					<table border="1" cellpadding="10" cellspacing="1" width="100%">
						<tbody>
							<tr>
								<td>
									<strong>{LANG.account_bank_en}: </strong>{ROW.account_bank_en}
								</td>
								<td>
									<strong>{LANG.holding_en}: </strong>{ROW.holding_en}
								</td>
							</tr>
							<tr>
								<td>
									<strong>{LANG.bank_name_en}: </strong>{ROW.bank_name_en}
								</td>
								<td>
									<strong>{LANG.bank_address_en}: </strong>{ROW.bank_address_en}
								</td>
							</tr>
							<tr>
								<td>
									<strong>{LANG.note_en}: </strong>{ROW.node_en}
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="table-responsive" style="margin-bottom: 20px">
				<table border="1" cellpadding="10" cellspacing="1" width="100%">
					<tbody>
						<tr>
							<td>
								<strong>{LANG.swiftcode}: </strong>{ROW.swiftcode}
							</td>
							<td class="vi">
								<strong>{LANG.comapyname_vi}: </strong>{ROW.comapyname_vi}
							</td>
							<td class="en">
								<strong>{LANG.comapyname_en}: </strong>{ROW.comapyname_en}
							</td>
							<td>
								<strong>{LANG.note}: </strong>{ROW.note}
							</td>
						<tr>
					</tbody>
				</table>
			</div>
			<input class="form-control" type="hidden" name="manager_name_en" value="{ROW.manager_name_en}"  />
			<!-- BEGIN: form1 -->
			<div class="form-group" style="text-align: center">
				<!-- BEGIN: sign -->
				<input class="btn btn-primary" name="submit" type="submit" value="{LANG.sign}" />
				<!-- END: sign -->
				<!-- BEGIN: pdf_vi -->
				<a type="button" class="btn btn-primary vi" href="javascript:check_savepdf({ROW.id},'PdfVi')">{LANG.viewpdf_vi}</a>
				<!-- END: pdf_vi -->
				<!-- BEGIN: pdf_en -->
				<a type="button" class="btn btn-primary vi" href="javascript:check_savepdf({ROW.id},'PdfEn')">{LANG.viewpdf_en}</a>
				<!-- END: pdf_en -->
				<!-- BEGIN: send_mail -->
				<a type="button" class="btn btn-primary vi" href="javascript:send_mail({ROW.id})">{LANG.send_mail}</a>
				<!-- END: send_mail -->
			</div>
		</form>
		<!-- END: form1 -->
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
	function send_mail(debitcode){
		 $.ajax({
			type: 'POST',
			url: nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=lease&' + nv_fc_variable + '=ajax/SendMail',
			cache: !1,
			data: {
				nv_ajax: 1,
				debitcode: debitcode
			},
			dataType: "json"
		}).done(function(a) {
			if (a.status == "OKE") {
				alert(a.message);
				
			} else {
				console.log('Error' + a.message);
			}
		});
	}
	function download_file(fileURL, fileName) {
		if (!window.ActiveXObject) {
			var save = document.createElement('a');
			save.href = fileURL;
			save.target = '_blank';
			var filename = fileURL.substring(fileURL.lastIndexOf('/')+1);
			save.download = fileName || filename;
			   if ( navigator.userAgent.toLowerCase().match(/(ipad|iphone|safari)/) && navigator.userAgent.search("Chrome") < 0) {
					document.location = save.href; 
				}else{
					var evt = new MouseEvent('click', {
						'view': window,
						'bubbles': true,
						'cancelable': false
					});
					save.dispatchEvent(evt);
					(window.URL || window.webkitURL).revokeObjectURL(save.href);
				}   
		}
	}
	function check_savepdf(debitcode,lang){
		 $.ajax({
			type: 'POST',
			url: nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=lease&' + nv_fc_variable + '=ajax/' + lang,
			cache: !1,
			data: {
				nv_ajax: 1,
				debitcode: debitcode
			},
			dataType: "json"
		}).done(function(a) {
			if (a.status == "OKE") {
				download_file(a.message.link, a.message.filename);
				
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
			change_exchange();
		});
		$("#customerid").on("change",function(){
			change_customer();
		});
		change_exchange();
		change_date();
		change_customer();
		check_services_extra();
		
	});
//]]>
</script>
<!-- END: main -->

				<a type="button" class="btn btn-primary vi" href="javascript:check_services_vi()">{LANG.debitnode_vi}</a>
				<a type="button" class="btn btn-primary vi" href="javascript:check_services_en()">{LANG.debitnode_en}</a>
