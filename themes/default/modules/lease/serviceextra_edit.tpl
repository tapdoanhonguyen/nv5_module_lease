<!-- BEGIN: main -->
<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<div class="well" style="display:none">
	<form action="{NV_BASE_SITEURL}index.php" method="get">
		<input type="hidden" name="{NV_LANG_VARIABLE}"  value="{NV_LANG_DATA}" />
		<input type="hidden" name="{NV_NAME_VARIABLE}"  value="{MODULE_NAME}" />
		<input type="hidden" name="{NV_OP_VARIABLE}"  value="{OP}" />
		<div class="row">
			<div class="col-xs-24 col-md-6">
				<div class="form-row">
					<input class="form-control" type="text" value="{Q}" name="q" maxlength="255" placeholder="{LANG.search_title}" />
				</div>
			</div>
			<div class="col-xs-12 col-md-3">
				<div class="form-row">
					<input class="btn btn-primary" type="submit" value="{LANG.search_submit}" />
				</div>
			</div>
		</div>
	</form>
</div>
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">{LANG.serviceextra}</div>
	<div class="pl-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item">
					<a href="/"><i class='bx bx-home-alt'></i></a>
				</li>			
				<li class="breadcrumb-item active" aria-current="page">{LANG.serviceextra_edit}</li>
			</ol>
		</nav>
	</div>
	<div class="ml-auto">
		<div class="btn-group">
			<a type="button" class="btn btn-success" href="{serviceextra_add}"><i class="lni lni-add-files mrg-r-5"></i>{LANG.add}</a>
		</div>
	</div>
</div>
<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.serviceextra_edit}</h4>
		</div>
		<!-- BEGIN: error -->
		<div class="alert alert-warning">{ERROR}</div>
		<!-- END: error -->
		<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}/edit" method="post">
			<input type="hidden" name="id" value="{ROW.id}" />
			<div class="form-row">
				<div class="col-md-3 mb-3">
					<label>Dịch vụ <span class="red">(*)</span></label>
					<select class="form-control" name="sid" id="serviceextraid">
						<option value="0">--Chọn dịch vụ tạo phiếu --</option>
						<!-- BEGIN: select_sid -->
						<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
						<!-- END: select_sid -->
					</select>
				</div>
				<div class="col-md-3 mb-3">
					<label>Sản phẩm <span class="red">(*)</span></label>
					<select class="form-control" name="pid">
						<option value="0">--{LANG.pid} --</option>
						<!-- BEGIN: select_pid -->
						<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
						<!-- END: select_pid -->
					</select>
				</div>
				<div class="col-md-3 mb-3">
					<label>Khách hàng <span class="red">(*)</span></label>
					<select class="form-control" name="cid" id="cid">
						<option value="0">-- {LANG.serviceextra_customer} --</option>
						<!-- BEGIN: select_cid -->
						<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
						<!-- END: select_cid -->
					</select>
				</div>
				<div class="col-md-3 mb-3">
					<label>{LANG.yearmonth} <span class="red">(*)</span></label>
					<div class="form-row" >
						<div class="col-md-6">
							<select class="form-control" name="month">
								<option value=""> -Chọn tháng - </option>
								<!-- BEGIN: select_month -->
								<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
								<!-- END: select_month -->
							</select>
						</div>
						<div class="col-md-6">
							<select class="form-control" name="year">
								<option value=""> - Chọn năm - </option>
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
					<label>{LANG.datefrom} <span class="red">(*)</span></label>
					<div class="input-group">
						<input class="form-control" type="text" name="datefrom" value="{ROW.datefrom}" id="datefrom" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
						<div class="input-group-append">
							<button class="btn btn-primary" type="button"><i class="lni lni-calendar"></i></button>
						</div>
					</div>
				</div>
				<div class="col-md-3 mb-3">
					<label>{LANG.dateto} <span class="red">(*)</span></label>
					<div class="input-group">
						<input class="form-control" type="text" name="dateto" value="{ROW.dateto}" id="dateto" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
						<div class="input-group-append">
							<button class="btn btn-primary" type="button"><i class="lni lni-calendar"></i></button>
						</div>
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-3 mb-3">
					<label>{LANG.amount}</label>
					<input class="mask form-control" type="text" name="amount" value="{ROW.amount}" id="amount" />
				</div>
				<div class="col-md-4 mb-3">
					<div class="form-group">
						<label>{LANG.pricevnd}</label>
						<input class="mask form-control" type="text" name="pricevnd" value="{ROW.pricevnd}" id="pricevnd" />
					</div>
					<div class="form-group">
						<label>{LANG.priceusd}</label>
						<input class="mask form-control" type="text" name="priceusd" value="{ROW.priceusd}" id="priceusd"/>
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<div class="form-group">
						<label>{LANG.totalvnd}</label>
						<input readonly class="mask form-control" type="text" name="totalvnd" value="{ROW.totalvnd}" id="totalvnd" />
					</div>
					<div class="form-group">
						<label>{LANG.totalusd}</label>
						<input readonly class="mask form-control" type="text" name="totalusd" value="{ROW.totalusd}" id="totalusd"/>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>{LANG.note}</label>
				{ROW.note}
			</div>
			<div class="text-center">
				<button class="btn btn-primary" name="submit" type="submit"><i class="lni lni-save mrg-r-5"></i>{LANG.save}</button>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<link href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css" type="text/css" rel="stylesheet" />

<script type="text/javascript">
	
	// $('#cid').select2({
	// 	placeholder:"Chọn khách hàng", 
	// 	ajax: {
	// 		url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax1&mod=select_cid',
	// 		dataType: 'json',
	// 		delay: 250,
	// 		data: function (params) {
	// 			var query = {
	// 				q: params.term
	// 			}
	// 			return query;
	// 		},
	// 		processResults: function (data) {
	// 			return {
	// 				results: data
	// 			};
	// 		},
	// 		cache: true
	// 	}
	// })
//<![CDATA[
$("#datefrom,#dateto").datepicker({
	dateFormat : "dd/mm/yy",
	changeMonth : true,
	changeYear : true,
	showOtherMonths : true,
});
function change_serviceextra(){
	var serviceextra = $("#serviceextraid").val();
	$.ajax({
		type: 'POST',
		url: nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=lease&' + nv_fc_variable + '=ajax/ChangeServiceExtra',
		cache: !1,
		data: {
			nv_ajax: 1,
			serviceextra: serviceextra
		},
		dataType: "json"
	}).done(function(a) {
		var amount = $("#amount").val();
		if (a.status == "OKE") {
			var totalvnd = a.message.price_vnd*amount;
			var totalusd = a.message.price_usd*amount;
			$("#pricevnd").val(a.message.price_vnd);
			$("#totalvnd").val(totalvnd);
			$("#priceusd").val(a.message.price_usd);
			$("#totalusd").val(totalusd);
		} else {
			console.log('Error' + a.message);
		}
	});
}
function change_total(){

	var amount = $("#amount").val();
	var pricevnd = $("#pricevnd").val();
	var priceusd = $("#priceusd").val();
	var totalvnd = pricevnd*amount;
	var totalusd = priceusd*amount;
	$("#totalvnd").val(totalvnd);
	$("#totalusd").val(totalusd);
}
$(document).ready(function(){

	$("#serviceextraid").on("change",function(){
		change_serviceextra();
	});
	$("#amount").on("change",function(){
		change_total();
	});
	$("#pricevnd").on("change",function(){
		change_total();
	});
	$("#priceusd").on("change",function(){
		change_total();
	});
	change_serviceextra();

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
<!-- END: main -->