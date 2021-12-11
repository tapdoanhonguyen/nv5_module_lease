<!-- BEGIN: main -->
<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">{LANG.contract}</div>
	<div class="pl-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item">
					<a href="/"><i class='bx bx-home-alt'></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">{LANG.contract_edit}</li>
			</ol>
		</nav>
	</div>
	<div class="ml-auto">
		<div class="btn-group">
			<a type="button" class="btn btn-success" href="{contract_add}"><i class="lni lni-add-files mrg-r-5"></i>{LANG.add}</a>
		</div>
	</div>
</div>
<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.contract_edit}</h4>
		</div>
		<hr/>

		<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />

		<!-- BEGIN: error -->
		<div class="alert alert-warning">{ERROR}</div>
		<!-- END: error -->
		<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}/edit" method="post">
			<input type="hidden" name="id" value="{ROW.id}" />
			<input type="hidden" name="companyid" value="{ROW.companyid}" />
			<input type="hidden" name="month" value="{ROW.month}" />
			<input type="hidden" name="year" value="{ROW.year}" />
			<input type="hidden" name="companyid" value="{ROW.companyid}" />
			<input type="hidden" name="yearpercent" value="{ROW.yearpercent}" />
			<div class="form-row">
				<div class="col-md-2 mb-3">
					<label>{LANG.ccode} <span class="red">(*)</span></label>
					<input readonly class="form-control" type="text" name="ccode" value="{ROW.ccode}" />
				</div>
				<div class="col-md-4 mb-3">
					<label>{LANG.customer} <span class="red">(*)</span></label>
					<select readonly class="form-control" name="cid" id="customerid">
						<option value="0">-- Chọn khách hàng --</option>
						<!-- BEGIN: select_cid -->
						<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
						<!-- END: select_cid -->
					</select>
				</div>
				<div class="col-md-2 mb-3">
					<label>Sản phẩm <span class="red">(*)</span></label>
					<select readonly class="form-control" name="pid" id="productid">
						<option value="0">-- Chọn Sản phẩm --</option>
						<!-- BEGIN: select_pid -->
						<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
						<!-- END: select_pid -->
					</select>
				</div>

				<div class="col-md-2 mb-3">
					<label>{LANG.datefrom}</label>
					<div class="input-group">
						<input class="form-control" type="text" name="datefrom" value="{ROW.datefrom}" id="datefrom" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" />
						<div class="input-group-append">
							<button class="btn btn-primary" type="button" id="datefrom-btn"><i class="lni lni-calendar"></i></button>
						</div>
					</div>
				</div>
				<div class="col-md-2 mb-3">
					<label>{LANG.dateto}</label>
					<div class="input-group">
						<input class="form-control" type="text" name="dateto" value="{ROW.dateto}" id="dateto" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" />
						<div class="input-group-append">
							<button class="btn btn-primary" type="button" id="dateto-btn"><i class="lni lni-calendar"></i></button>
						</div>
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3">
					<label>{LANG.ccat}</label>
					<select class="form-control" name="ccat">
						<!-- BEGIN: select_ccat -->
						<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
						<!-- END: select_ccat -->
					</select>
				</div>
				<div class="col-md-2 mb-3">
					<label>{LANG.sid} <span class="red">(*)</span></label>
					<select class="form-control" name="sid">
						<!-- BEGIN: select_sid -->
						<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
						<!-- END: select_sid -->
					</select>
				</div>
				<div class="col-md-2 mb-3">
					<label>{LANG.areareal}</label>
					<input class="mask form-control" type="text" name="areareal" value="{ROW.areareal}" />
				</div>
				<div class="col-md-2 mb-3">
					<label>{LANG.cycle} <span class="red">(*)</span></label>
					<select class="form-control" name="cycle">
						<!-- BEGIN: select_cycle-->
						<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
						<!-- END: select_cycle -->
					</select>
				</div>
				<div class="col-md-2 mb-3">
					<label>Ngày bắt đầu tính tiền</label>
					<div class="input-group">
						<input class="form-control" type="text" name="feedatefrom" value="{ROW.feedatefrom}" id="feedatefrom" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" />
						<div class="input-group-append">
							<button class="btn btn-primary" type="button" id="feedatefrom-btn">
								<i class="lni lni-calendar"></i>
							</button>
						</div>
					</div>
				</div>
				<div class="col-md-2 mb-3">
					<label for="title">{LANG.feedateto}</label>
					<div class="input-group">
						<input class="form-control" type="text" name="feedateto" value="{ROW.feedateto}" id="feedateto" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" />
						<div class="input-group-append">
							<button class="btn btn-primary" type="button" id="feedateto-btn">
								<i class="lni lni-calendar"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
			
			<div class="form-row">
				<div class="col-md-3 mb-3">
					<label>{LANG.pricevnd} <span class="red">(*)</span></label>
					<input class="mask form-control" type="text" name="pricevnd" value="{ROW.pricevnd}" />
				</div>
				<div class="col-md-3 mb-3">
					<label>{LANG.priceusd}</label>
					<input class="mask form-control" type="text" name="priceusd" value="{ROW.priceusd}" />
				</div>
				<div class="col-md-3 mb-3">
					<label>{LANG.feevnd}</label>
					<input class="mask form-control" type="text" name="feevnd" value="{ROW.feevnd}"  />
				</div>
				<div class="col-md-3 mb-3">
					<label>{LANG.feeusd}</label>
					<input class="mask form-control" type="text" name="feeusd" value="{ROW.feeusd}"  />
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-3 mb-3">
					<label>{LANG.date_fee_service_main}</label>
					<input class="form-control" type="text" name="feedatemain" value="{ROW.feedatemain}" id="feedatemain" />	
				</div>
				<div class="col-md-3 mb-3">
					<label>{LANG.date_fee_service_extra}</label>
					<input class="form-control" type="text" name="feedateextra" value="{ROW.feedateextra}" id="feedateextra"  />
				</div>
			</div>


























			<div class="form-row">

				
				<div class="col-md-12 mb-12" >
					<label for="title">{LANG.service_main}</label>
					
				</div>
				
			</div>
			<div class="table-responsive" style="zoom: 100%;">
				<table id="datatable-vi" class="table table-striped table-bordered">
					<thead class="thead-dark">
						<tr>
							<th>{LANG.service_title}</th>
							
							<th>Ngày bắt đầu</th>
							<th>Ngày kết thúc</th>
							<th>{LANG.price}</th>
							<th>{LANG.amount}</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody id="servicemainvi">
						<tr>
							<td>
								<select class="form-control" name="sid" id="name_service">
									<option value="" class="hidden">-- {LANG.sid} --</option>
									<!-- BEGIN: select_sid -->
									<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
									<!-- END: select_sid -->
								</select>
							</td>
							
							<td >
								<div style="display: flex;">
									<input class="form-control" type="text" name="time_begin" value="{ROW.time_begin}" id="time_begin" placeholder="Ngày bắt đầu" readonly="" />
									<button class="btn btn-primary" type="button" id="time_begin-btn"><i class="lni lni-calendar"></i></button>
								</div>
							</td>
							<td >
								<div style="display: flex;">
									<input class="form-control" type="text" name="time_end" value="{ROW.time_end}" id="time_end" placeholder="Ngày kết thúc" readonly="" />
									<button class="btn btn-primary" type="button" id="time_end-btn"><i class="lni lni-calendar"></i></button>
								</div>
							</td>
							<td>
								<input type="number" step="0.1" name="priceusd" id="priceusd" class="form-control" placeholder="Nhập đơn giá">
							</td>
							<td>
								<input type="number" name="quantity" id="quantity" class="form-control" placeholder="Nhập số lượng" readonly="">
							</td>

							<td>
								<input type="hidden" name="list_mainservice" id="list_mainservice" value="{LIST_ALL}" />
								<button type="button" class="btn btn-primary" onclick="add_contract()">Thêm</button>
							</td>
						</tr>










						<!-- BEGIN: service1 -->
						<!-- BEGIN: loop -->
						<tr class="row_add_{STT1} main_tr">
							<td >
								{SV1.service_name}
								<input type="hidden" name="servicemain[]" value="25">
							</td>
							<td>
								<div style="display: flex;">
									<div>
										{SV1.feedatefrom}
										<input type="hidden" name="servicemain_datefrom[]" value="{SV1.feedatefrom}">
									</div>
								</div>
							</td>
							<td>
								<div style="display: flex;">
									<div>
										{SV1.feedateto}
										<input type="hidden" name="servicemain_dateto[]" value="{SV1.feedateto}">
									</div>
								</div>
							</td>
							<td>
								<div>
									{SV1.price_usd}
									<input type="hidden" name="servicemain_price[]" value="{SV1.price_usd}">
								</div>
							</td>
							<td>
								<div>
									{ROW.areareal}
									<input type="hidden" name="servicemain_quantity[]" value="{ROW.areareal}">
								</div>
							</td>
							<td>
								<button type="button" class="btn btn-primary" onclick="delete_contract({STT1})">
									Xóa
								</button>
							</td>
						</tr>
						<!-- END: loop -->
						<!-- END: service1 -->


					</tbody>
				</table>
			</div>
			<div class="form-row">

				
				<div class="col-md-12 mb-12" >
					<label for="title">{LANG.serviceextra}</label>
					
				</div>
				
			</div>
			<div class="table-responsive" style="zoom: 100%;">
				<table id="datatable-vi" class="table table-striped table-bordered">
					<thead class="thead-dark">
						<tr>
							<th>{LANG.service_title}</th>
							
							<th>Ngày bắt đầu</th>
							<th>Ngày kết thúc</th>
							<th>{LANG.price}</th>
							<th>{LANG.amount}</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody id="serviceextravi">
						<tr>
							<td>
								<select class="form-control" name="sid_2" id="name_service_2">
									<option value="" class="hidden">-- {LANG.sid} --</option>
									<!-- BEGIN: select_sid_2 -->
									<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
									<!-- END: select_sid_2 -->
								</select>
							</td>
							
							<td >
								<div style="display: flex;">
									<input class="form-control" type="text" name="time_begin_2" value="{ROW.time_begin_2}" id="time_begin_2" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" placeholder="Ngày bắt đầu" readonly="" />
									<button class="btn btn-primary" type="button" id="time_begin_2-btn"><i class="lni lni-calendar"></i></button>
								</div>
							</td>
							<td >
								<div style="display: flex;">
									<input class="form-control" type="text" name="time_end_2" value="{ROW.time_end_2}" id="time_end_2"  placeholder="Ngày kết thúc"  readonly=""/>
									<button class="btn btn-primary" type="button" id="time_end_2-btn"><i class="lni lni-calendar"></i></button>
								</div>
							</td>
							<td>
								<input type="number" step="0.1" name="priceusd_2" id="priceusd_2" class="form-control" placeholder="Nhập đơn giá">
							</td>
							<td>
								<input type="number" name="quantity_2" id="quantity_2" class="form-control" placeholder="Nhập số lượng" >
							</td>

							<td>
								<input type="hidden" name="list_extraservice" id="list_extraservice" value="" />
								<button type="button" class="btn btn-primary" onclick="add_contract_2()">Thêm</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="form-row">

				
				<div class="col-md-12 mb-12" >
					<label for="title">{LANG.service_static}</label>
					
				</div>
				
			</div>
			<div class="table-responsive" style="zoom: 100%;">
				<table id="datatable-vi" class="table table-striped table-bordered">
					<thead class="thead-dark">
						<tr>
							<th>{LANG.service_title}</th>
							<th>Ngày bắt đầu</th>
							
							<th>{LANG.price}</th>
							<th>Số lượng</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody id="servicestaticvi">
						<tr>
							<td >
								<select class="form-control" name="sid_3" id="name_service_3">
									<option value="" class="hidden">-- {LANG.sid} --</option>
									<!-- BEGIN: select_sid_3 -->
									<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
									<!-- END: select_sid_3 -->
								</select>
							</td>
							
							<td >
								<div style="display: flex;">
									<input class="form-control" type="text" name="time_begin_3" value="{ROW.time_begin_3}" id="time_begin_3" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" placeholder="Ngày bắt đầu" readonly="" />
									<button class="btn btn-primary" type="button" id="time_begin_3-btn"><i class="lni lni-calendar"></i></button>
								</div>
							</td>
							
							
							<td>
								<input type="number" step="0.1" name="price_3" id="price_3" class="form-control" placeholder="Nhập đơn giá">
							</td>
							<td>
								<input type="number" name="quantity_3" id="quantity_3" class="form-control" placeholder="Nhập số lượng" >
							</td>
							<td>
								<input type="hidden" name="time_end_3" id="time_end_3" value="" />
								<input type="hidden" name="list_sv_3" id="list_sv_3" value="" />
								<button type="button" class="btn btn-primary" onclick="add_contract_3()">Thêm</button>
							</td>
						</tr>
					</tbody>
				</table>
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

<script type="text/javascript">
	function delete_contract(stt){
		$('.row_add_' + stt).remove();
	}
	function delete_contract_2(stt){
		$('.row2_add_' + stt).remove();
	}
	function delete_contract_3(stt){
		$('.row3_add_' + stt).remove();
	}





//<![CDATA[
$("#datefrom,#dateto,#feedatefrom,#feedateto,#time_begin,#time_end,#time_begin_2,#time_end_2,#time_begin_3").datepicker({
	dateFormat : "dd/mm/yy",
	changeMonth : true,
	changeYear : true,
	showOtherMonths : true,
});
$('#time_begin-btn').click(function() {
	$("#time_begin").datepicker('show');
});
$('#time_end-btn').click(function() {
	$("#time_end").datepicker('show');
});
$('#time_begin_2-btn').click(function() {
	$("#time_begin_2").datepicker('show');
});
$('#time_end_2-btn').click(function() {
	$("#time_end_2").datepicker('show');
});
$('#time_begin_3-btn').click(function() {
	$("#time_begin_3").datepicker('show');
});
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
$(document).ready(function(){
	$("#productid").on("change",function(){
		change_product();
	});

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