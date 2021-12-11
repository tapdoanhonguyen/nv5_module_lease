<!-- BEGIN: main -->
<style type="text/css">
	.main_tr > td{
		background: #cbcdf5 !important;
		color: #000;
	}
</style>
<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="{NV_BASE_SITEURL}themes/default/js/moment.js"></script>
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">{LANG.contract}</div>
	<div class="pl-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item">
					<a href="/"><i class='bx bx-home-alt'></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">{LANG.contract_add}</li>
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
			<h4 class="mb-0">{LANG.contract_add}</h4>
		</div>
		<hr/>

		<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />

		<!-- BEGIN: error -->
		<div class="alert alert-warning">{ERROR}</div>
		<!-- END: error -->
		<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}/add" method="post">
			<input type="hidden" name="id" value="{ROW.id}" />
			<input type="hidden" name="companyid" value="{ROW.companyid}" />
			<input type="hidden" name="month" value="{ROW.month}" />
			<input type="hidden" name="year" value="{ROW.year}" />
			<input type="hidden" name="companyid" value="{ROW.companyid}" />
			<input type="hidden" name="yearpercent" value="{ROW.yearpercent}" />
			<div class="form-row">
				<div class="col-md-2 mb-3">
					<label>{LANG.ccode} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="ccode" value="{ROW.ccode}" />
				</div>
				<div class="col-md-4 mb-3">
					<label>{LANG.customer} <span class="red">(*)</span></label>
					<div class="input-group">
						<select class="form-control" name="cid">
							<option value="0">-- Chọn khách hàng --</option>
							<!-- BEGIN: select_cid -->
							<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
							<!-- END: select_cid -->
						</select>
						<div class="input-group-append">
							<a type="button" class="btn btn-primary btn-sm" href="/lease/customer/add/"><i class="lni lni-add-files mrg-r-5"></i>Thêm mới</a>
						</div>
					</div>
				</div>
				<div class="col-md-2 mb-3">
					<label>Sản phẩm <span class="red">(*)</span></label>
					<select class="form-control" name="pid" id="productid">
						<option value="">-- Chọn Sản phẩm --</option>
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
						<option value="0">-- Chọn loại hợp đồng --</option>
						<!-- BEGIN: select_ccat -->
						<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
						<!-- END: select_ccat -->
					</select>
				</div>

				
				<div class="col-md-2 mb-3">
					<label>{LANG.areareal}</label>
					<input class="mask form-control" type="text" name="areareal" id="areareal" value="{ROW.areareal}" />
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
				<div class="col-md-2 mb-3" style="display:none">
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
			<script type="text/javascript">
				let i = 1;
				let list_all = [];
				let list_all_2 = [];
				let list_all_3 = [];
				<!-- BEGIN: list_all -->
				<!-- BEGIN: list_all_child -->
				list_all_mainservice_contract_info.push({"mainservice":1,"staticservice":0,"name_service":name_service,"time_begin":time_yearmonth,"priceusd":priceusd,"quantity":quantity});
				<!-- END: list_all_child -->
				$('#servicemainvi').append('<tr class="row_add_{OPTION.stt} main_tr">' +
					'<td rowspan="{OPTION.stt}">' + 
					'{OPTION.name_service}'  +
					'<input type="hidden" name = "servicemain[]" value="' + 
					'{OPTION.name_service}' + 
					'" />' + 
					'</td>' + 
					
					'<td >' + 
					'<div style="display: flex;">' + 
					'<div>' + 
					'{OPTION.time_begin}' +
					'<input type="hidden" name = "servicemain_datefrom[]" value="' +
					'{OPTION.time_begin}' +
					'" />' +
					'</div>' + 

					'</div>' + 
					'</td>' + 
					'<td >' + 
					'<div style="display: flex;">' + 
					'<div>' +
					'{OPTION.time_end}' +
					'<input type="hidden" name = "servicemain_dateto[]" value="' +
					'{OPTION.time_end}' +
					'" />' +
					'</div>' + 
					'</div>' + 
					'</td>' + 
					'<td>' + 
					'<div>' +
					'{OPTION.priceusd}' +
					'<input type="hidden" name = "servicemain_price[]"value="' +
					'{OPTION.priceusd}' +
					'" />' +
					'</div>' + 
					'</td>' + 
					'<td>' +
					'<div>' +
					'{OPTION.quantity}' +
					'<input type="hidden" name = "servicemain_quantity[]" value="' +
					'{OPTION.quantity}' +
					'" />' +
					'</div>' +  
					'</td>' + 

					'<td>' + 
					'<button type="button" class="btn btn-primary" onclick="delete_contract({OPTION.stt})">Xóa</button>' + 
					'</td>' + 
					'</tr>' );
				list_all.push({"name_service":name_service,"time_begin":time_begin,"time_end":time_end,"priceusd":priceusd,"quantity":quantity,"listchild":list_all_mainservice_contract_info});
				<!-- END: list_all -->
				<!-- BEGIN: list_all_2 -->
				<!-- BEGIN: list_all_child -->
				list_all_mainservice_contract_info.push({"mainservice":1,"staticservice":0,"name_service":name_service,"time_begin":time_yearmonth,"priceusd":priceusd,"quantity":quantity});
				<!-- END: list_all_child -->
				list_all.push({"name_service":name_service,"time_begin":time_begin,"time_end":time_end,"priceusd":priceusd,"quantity":quantity,"listchild":list_all_mainservice_contract_info});
				<!-- END: list_all_2 -->
				<!-- BEGIN: list_all_3 -->
				<!-- BEGIN: list_all_child -->
				list_all_mainservice_contract_info.push({"mainservice":1,"staticservice":0,"name_service":name_service,"time_begin":time_yearmonth,"priceusd":priceusd,"quantity":quantity});
				<!-- END: list_all_child -->
				list_all.push({"name_service":name_service,"time_begin":time_begin,"time_end":time_end,"priceusd":priceusd,"quantity":quantity,"listchild":list_all_mainservice_contract_info});
				<!-- END: list_all_3 -->
				let list_all_staticservice_contract_info = [];
				function add_contract(){
					
					var name_service = $('#name_service').val();
					var time_begin = $('#time_begin').val();
					var time_end = $('#time_end').val();
					var priceusd = $('#priceusd').val();
					var quantity = $('#areareal').val();
					var name_sv = $("#name_service option:selected").text();
					var productid = $('#productid').val();
					
					




					if(name_service && priceusd && quantity && time_begin && time_end && productid){
						list_all_mainservice_contract_info = [];
						
						var chuoia = time_begin.split("/", 3);
						var chuoib = time_end.split("/", 3);

						for (var i = 0; i < chuoia.length; i++) {

							if(i==0){
								var ngay = chuoia[i];
							}else if(i==1){
								var thang = chuoia[i];
							}else if(i==2){
								var nam = chuoia[i];
							}
						}
						a = nam + '-' + thang + '-' + ngay;

						for (var i = 0; i < chuoib.length; i++) {

							if(i==0){
								var ngay1 = chuoib[i];
							}else if(i==1){
								var thang1 = chuoib[i];
							}else if(i==2){
								var nam1 = chuoib[i];
							}
						}
						b = nam1 + '-' + thang1 + '-' + ngay1;

						var time_begin_int=moment(new Date(a)).unix();
						var time_end_int=moment(new Date(b)).unix();



						var time_begin_string = moment(moment(time_begin_int*1000).format('DD/MM/YYYY'), 'DD/MM/YYYY');
						var time_end_string = moment(moment(time_end_int*1000).format('DD/MM/YYYY'), 'DD/MM/YYYY');
						var html_dich_vu_chinh = '<tr class="row_add_' + i + '">' +


						'<td >' + 
						'Thời gian' +
						'</td>' + 
						'<td >' + 
						'Đơn giá' +
						'</td>' + 
						'<td >' + 
						'Số lượng' + 
						'</td>' + 

						'</tr>';
						if(time_end_string < time_begin_string){
							alert('Ngày kết thúc phải lớn hơn ngày bắt đầu!');
						}else{
							var week1 =moment.duration(time_end_string.diff(time_begin_string)).asWeeks();
							var week = Math.floor(week1 * 1) / 1;
							var month1 =moment.duration(time_end_string.diff(time_begin_string)).asMonths();

							var month = Math.floor(month1 * 1) / 1;
							var month_plus = (Math.floor(month1 * 1) / 1) + 1;

							var ngay_theo_tuan = week * 7;
							var day = moment.duration(time_end_string.diff(time_begin_string)).asDays();
							var day_remaining = day - ngay_theo_tuan;
							for(var ii=0;ii<month_plus;ii++){
								var time_begin_string_new=moment(time_begin_string).unix()
								var time_new=moment(time_begin_string_new*1000).add(ii,'M')
								var time_yearmonth = moment(time_new).format('MM/YYYY');
								html_dich_vu_chinh = html_dich_vu_chinh + '<tr class="row_add_' + i + '">' +
								'<td >' + 
								moment(time_new).format('MM/YYYY') +
								'</td>' + 
								'<td>' + 
								'<div>' +
								priceusd +
								'<input type="hidden" name = "servicemain_price[]"value="' +
								priceusd +
								'" />' +
								'</div>' + 
								'</td>' + 
								'<td>' +
								'<div>' +
								quantity +
								'<input type="hidden" name = "servicemain_quantity[]" value="' +
								quantity +
								'" />' +
								'</div>' +  
								'</td>' +  
								'</tr>';
								list_all_mainservice_contract_info.push({"mainservice":1,"staticservice":0,"name_service":name_service,"time_begin":time_yearmonth,"priceusd":priceusd,"quantity":quantity});
							}


						}








						list_all.push({"name_service":name_service,"time_begin":time_begin,"time_end":time_end,"priceusd":priceusd,"quantity":quantity,"listchild":list_all_mainservice_contract_info});
						$('#servicemainvi').append('<tr class="row_add_' + i + ' main_tr">' +
							'<td rowspan="' + month_plus + '">' + 
							name_sv + 
							'<input type="hidden" name = "servicemain[]" value="' + 
							name_service + 
							'" />' + 
							'</td>' + 
							
							'<td >' + 
							'<div style="display: flex;">' + 
							'<div>' + 
							time_begin +
							'<input type="hidden" name = "servicemain_datefrom[]" value="' +
							time_begin +
							'" />' +
							'</div>' + 

							'</div>' + 
							'</td>' + 
							'<td >' + 
							'<div style="display: flex;">' + 
							'<div>' +
							time_end +
							'<input type="hidden" name = "servicemain_dateto[]" value="' +
							time_end +
							'" />' +
							'</div>' + 
							'</div>' + 
							'</td>' + 
							'<td>' + 
							'<div>' +
							priceusd +
							'<input type="hidden" name = "servicemain_price[]"value="' +
							priceusd +
							'" />' +
							'</div>' + 
							'</td>' + 
							'<td>' +
							'<div>' +
							quantity +
							'<input type="hidden" name = "servicemain_quantity[]" value="' +
							quantity +
							'" />' +
							'</div>' +  
							'</td>' + 

							'<td>' + 
							'<button type="button" class="btn btn-primary" onclick="delete_contract(' + i + ')">Xóa</button>' + 
							'</td>' + 
							'</tr>' );
						i = i + 1;
						listall = JSON.stringify(list_all)
						$('#list_mainservice').val(listall);
						$('#name_service').val('');
						$('#time_begin').val('');
						$('#time_end').val('');
						$('#priceusd').val('');
					}else{
						if(!productid){
							alert('Vui lòng chọn sản phẩm!');
						}else{
							alert('Vui lòng nhập đầy đủ thông tin!');
						}
						
					}
				}













































				function add_contract_2(){
					var name_service = $('#name_service_2').val();
					var time_begin = $('#time_begin_2').val();
					var time_end = $('#time_end_2').val();
					var priceusd = $('#priceusd_2').val();
					var quantity = $('#quantity_2').val();
					var name_sv = $("#name_service_2 option:selected").text();
					var productid = $('#productid').val();
					if(name_service && priceusd && quantity && time_begin && time_end && productid){
						list_all_serviceextra_contract_info = [];
						var chuoia = time_begin.split("/", 3);
						var chuoib = time_end.split("/", 3);

						for (var i = 0; i < chuoia.length; i++) {

							if(i==0){
								var ngay = chuoia[i];
							}else if(i==1){
								var thang = chuoia[i];
							}else if(i==2){
								var nam = chuoia[i];
							}
						}
						a = nam + '-' + thang + '-' + ngay;
						for (var i = 0; i < chuoib.length; i++) {

							if(i==0){
								var ngay1 = chuoib[i];
							}else if(i==1){
								var thang1 = chuoib[i];
							}else if(i==2){
								var nam1 = chuoib[i];
							}
						}
						b = nam1 + '-' + thang1 + '-' + ngay1;
						var time_begin_int=moment(new Date(a)).unix();
						var time_end_int=moment(new Date(b)).unix();
						var time_begin_string = moment(moment(time_begin_int*1000).format('DD/MM/YYYY'), 'DD/MM/YYYY');
						var time_end_string = moment(moment(time_end_int*1000).format('DD/MM/YYYY'), 'DD/MM/YYYY');
						var html_dich_vu_chinh = '<tr class="row_add_' + i + '">' +
						'<td >' + 
						'Thời gian' +
						'</td>' + 
						'<td >' + 
						'Đơn giá' +
						'</td>' + 
						'<td >' + 
						'Số lượng' + 
						'</td>' + 
						'</tr>';
						if(time_end_string < time_begin_string){
							alert('Ngày kết thúc phải lớn hơn ngày bắt đầu!');
						}else{
							var week1 =moment.duration(time_end_string.diff(time_begin_string)).asWeeks();
							var week = Math.floor(week1 * 1) / 1;
							var month1 =moment.duration(time_end_string.diff(time_begin_string)).asMonths();
							var month = Math.floor(month1 * 1) / 1;
							var month_plus = (Math.floor(month1 * 1) / 1) + 1;
							var ngay_theo_tuan = week * 7;
							var day = moment.duration(time_end_string.diff(time_begin_string)).asDays();
							var day_remaining = day - ngay_theo_tuan;
						}
						for(var ii=0;ii<month_plus;ii++){
							var time_begin_string_new=moment(time_begin_string).unix()
							var time_new=moment(time_begin_string_new*1000).add(ii,'M')
							var time_yearmonth = moment(time_new).format('MM/YYYY');
							html_dich_vu_chinh = html_dich_vu_chinh + '<tr class="row_add_' + i + '">' +
							'<td >' + 
							moment(time_new).format('MM/YYYY') +
							'</td>' + 
							'<td>' + 
							'<div>' +
							priceusd +
							'<input type="hidden" name = "serviceextra_price[]"value="' +
							priceusd +
							'" />' +
							'</div>' + 
							'</td>' + 
							'<td>' +
							'<div>' +
							quantity +
							'<input type="hidden" name = "serviceextra_quantity[]" value="' +
							quantity +
							'" />' +
							'</div>' +  
							'</td>' +  
							'</tr>';
							list_all_serviceextra_contract_info.push({"mainservice":0,"staticservice":0,"name_service":name_service,"time_begin":time_yearmonth,"priceusd":priceusd,"quantity":quantity});
						}
						list_all_2.push({"mainservice":0,"staticservice":0,"name_service":name_service,"time_begin":time_begin,"time_end":time_end,"priceusd":priceusd,"quantity":quantity,"listchild":list_all_serviceextra_contract_info});
						$('#serviceextravi').append('<tr class="row_add_' + i + ' main_tr">' +
							'<td rowspan="' + month_plus + '">' + 
							name_sv + 
							'<input type="hidden" name = "serviceextra[]" value="' + 
							name_service + 
							'" />' + 
							'</td>' + 
							
							'<td >' + 
							'<div style="display: flex;">' + 
							'<div>' + 
							time_begin +
							'<input type="hidden" name = "serviceextra_datefrom[]" value="' +
							time_begin +
							'" />' +
							'</div>' + 

							'</div>' + 
							'</td>' + 
							'<td >' + 
							'<div style="display: flex;">' + 
							'<div>' +
							time_end +
							'<input type="hidden" name = "serviceextra_dateto[]" value="' +
							time_end +
							'" />' +
							'</div>' + 
							'</div>' + 
							'</td>' + 
							'<td>' + 
							'<div>' +
							priceusd +
							'<input type="hidden" name = "serviceextra_price[]"value="' +
							priceusd +
							'" />' +
							'</div>' + 
							'</td>' + 
							'<td>' +
							'<div>' +
							quantity +
							'<input type="hidden" name = "serviceextra_quantity[]" value="' +
							quantity +
							'" />' +
							'</div>' +  
							'</td>' + 

							'<td>' + 
							'<button type="button" class="btn btn-primary" onclick="delete_contract_2(' + i + ')">Xóa</button>' + 
							'</td>' + 
							'</tr>' );
						i = i + 1;
						listall = JSON.stringify(list_all_2)
						$('#list_extraservice').val(listall);
						$('#name_service_2').val('');
						$('#time_begin_2').val('');
						$('#price_2').val('');
						$('#quantity_2').val('');
					}else{
						if(!productid){
							alert('Vui lòng chọn sản phẩm!');
						}else{
							alert('Vui lòng nhập đầy đủ thông tin!');
						}
						
					}
				}









































				function add_contract_3(){
					var name_service = $('#name_service_3').val();
					var time_begin = $('#time_begin_3').val();
					var time_end = $('#dateto').val();
					var priceusd = $('#price_3').val();
					var quantity = $('#quantity_3').val();
					var name_sv = $("#name_service_3 option:selected").text();
					var productid = $('#productid').val();
					if(name_service && priceusd && quantity && time_begin && time_end && productid){
						list_child_3 = [];
						var chuoia = time_begin.split("/", 3);
						var chuoib = time_end.split("/", 3);
						for (var i = 0; i < chuoia.length; i++) {

							if(i==0){
								var ngay = chuoia[i];
							}else if(i==1){
								var thang = chuoia[i];
							}else if(i==2){
								var nam = chuoia[i];
							}
						}
						a = nam + '-' + thang + '-' + ngay;
						for (var i = 0; i < chuoib.length; i++) {

							if(i==0){
								var ngay1 = chuoib[i];
							}else if(i==1){
								var thang1 = chuoib[i];
							}else if(i==2){
								var nam1 = chuoib[i];
							}
						}
						b = nam1 + '-' + thang1 + '-' + ngay1;
						var time_begin_int=moment(new Date(a)).unix();
						var time_end_int=moment(new Date(b)).unix();
						var time_begin_string = moment(moment(time_begin_int*1000).format('DD/MM/YYYY'), 'DD/MM/YYYY');
						var time_end_string = moment(moment(time_end_int*1000).format('DD/MM/YYYY'), 'DD/MM/YYYY');
						var html_dich_vu_chinh = '<tr class="row_add_' + i + '">' +
						'<td >' + 
						'Thời gian' +
						'</td>' + 
						'<td >' + 
						'Đơn giá' +
						'</td>' + 
						'<td >' + 
						'Số lượng' + 
						'</td>' + 
						'</tr>';
						if(time_end_string < time_begin_string){
							alert('Ngày bắt đầu phải nhỏ hơn ngày kết thúc hợp đồng!');
						}else{
							var week1 =moment.duration(time_end_string.diff(time_begin_string)).asWeeks();
							var week = Math.floor(week1 * 1) / 1;
							var month1 =moment.duration(time_end_string.diff(time_begin_string)).asMonths();

							var month = Math.floor(month1 * 1) / 1;
							var month_plus = (Math.floor(month1 * 1) / 1) + 1;

							var ngay_theo_tuan = week * 7;
							var day = moment.duration(time_end_string.diff(time_begin_string)).asDays();
							var day_remaining = day - ngay_theo_tuan;

							for(var ii=0;ii<month_plus;ii++){
								var time_begin_string_new=moment(time_begin_string).unix()
								var time_new=moment(time_begin_string_new*1000).add(ii,'M')
								var time_yearmonth = moment(time_new).format('MM/YYYY');
								html_dich_vu_chinh = html_dich_vu_chinh + '<tr class="row_add_' + i + '">' +
								'<td >' + 
								moment(time_new).format('MM/YYYY') +
								'</td>' + 
								'<td>' + 
								'<div>' +
								priceusd +
								'<input type="hidden" name = "serviceextra_price[]"value="' +
								priceusd +
								'" />' +
								'</div>' + 
								'</td>' + 
								'<td>' +
								'<div>' +
								quantity +
								'<input type="hidden" name = "serviceextra_quantity[]" value="' +
								quantity +
								'" />' +
								'</div>' +  
								'</td>' +  
								'</tr>';
								list_child_3.push({"mainservice":0,"staticservice":1,"name_service":name_service,"time_begin":time_yearmonth,"priceusd":priceusd,"quantity":quantity});
							}
							list_all_3.push({"mainservice":0,"staticservice":1,"name_service":name_service,"time_begin":time_begin,"time_end":time_end,"priceusd":priceusd,"quantity":quantity,"listchild":list_child_3});
							$('#servicestaticvi').append('<tr class="row_add_' + i + ' main_tr">' +
								'<td rowspan="' + month_plus + '">' + 
								name_sv + 
								'<input type="hidden" name = "serviceextra[]" value="' + 
								name_service + 
								'" />' + 
								'</td>' + 
								'<td >' + 
								'<div style="display: flex;">' + 
								'<div>' + 
								time_begin +
								'<input type="hidden" name = "serviceextra_datefrom[]" value="' +
								time_begin +
								'" />' +
								'</div>' + 
								'</div>' + 
								'</td>' + 
								
								'<td>' + 
								'<div>' +
								priceusd +
								'<input type="hidden" name = "serviceextra_price[]"value="' +
								priceusd +
								'" />' +
								'</div>' + 
								'</td>' + 
								'<td>' +
								'<div>' +
								quantity +
								'<input type="hidden" name = "serviceextra_quantity[]" value="' +
								quantity +
								'" />' +
								'</div>' +  
								'</td>' + 

								'<td>' + 
								'<button type="button" class="btn btn-primary" onclick="delete_contract_2(' + i + ')">Xóa</button>' + 
								'</td>' + 
								'</tr>' );
							i = i + 1;
							var listall = JSON.stringify(list_all_3)
							$('#list_sv_3').val(listall);
							$('#name_service_3').val('');
							$('#time_begin_3').val('');
							$('#price_3').val('');
							$('#quantity_3').val('');
						}
					}else{
						if(!productid){
							alert('Vui lòng chọn sản phẩm!');
						}else{
							alert('Vui lòng nhập đầy đủ thông tin!');
						}
						
					}
				}

























				function delete_contract(stt){
					$('.row_add_' + stt).remove();
				}
				function delete_contract_2(stt){
					$('.row2_add_' + stt).remove();
				}
				function delete_contract_3(stt){
					$('.row3_add_' + stt).remove();
				}
			</script>
			
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
//]]>
</script>

<script type="text/javascript">
//<![CDATA[

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
			url: nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=lease&' + nv_fc_variable + '=ajax/GetArea',
			cache: !1,
			data: {
				nv_ajax: 1,
				productid: productid
			},
			dataType: "json"
		}).done(function(a) {
			if (a.status == "OKE") {
				$("#areareal").val(a.message.area);
				$("#quantity").val(a.message.area);
				
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
		var feedatefrom = $("#feedatefrom").val();
		var dateto = $("#dateto").val();
		var feedateto = $("#feedateto").val();
		$("#feedateto").val(dateto);
		$("#time_end_2").val(dateto);
		$("#time_end_3").val(dateto);
		var explain_vi = '{LANG.note_explain_vi} {LANG.from_vi} ' + datefrom + ' {LANG.to_vi} ' + dateto ;
		$("#explain_vi").val(explain_vi);
		var explain_en = '{LANG.note_explain_en} {LANG.from_en} ' + datefrom + ' {LANG.to_en} ' + dateto ;
		$("#explain_en").val(explain_en);
		
	}
	$(document).ready(function(){
		$("#datefrom,#dateto,#feedatefrom").on("change",function(){
			change_date();
			
		});
		$("#productid").on("change",function(){
			change_product();
			
		});
		change_date();
		change_product();
		
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

<div class="col-md-3 mb-3">
	<label for="title">{LANG.yearmonth} <span class="red">(*)</span></label>
	<div class="col-md-6 mb-3">
		<select class="form-control" name="month">
			<option value=""> --- </option>
			<!-- BEGIN: select_mount -->
			<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
			<!-- END: select_mount -->
		</select>
	</div>
	<div class="col-md-6 mb-3">
		<select class="form-control" name="year">
			<option value=""> --- </option>
			<!-- BEGIN: select_year -->
			<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
			<!-- END: select_year -->
		</select>
	</div>
</div>



function add_contract_2(){
var name_service = $('#name_service').val();
var time_begin = $('#time_begin').val();
var time_end = $('#time_end').val();
var price = $('#price').val();
var quantity = $('#areareal').val();
var name_sv = $("#name_service option:selected").text();

var chuoia = time_begin.split("/", 3);
var chuoib = time_end.split("/", 3);

for (var i = 0; i < chuoia.length; i++) {

if(i==0){
var ngay = chuoia[i];
}else if(i==1){
var thang = chuoia[i];
}else if(i==2){
var nam = chuoia[i];
}
}
a = nam + '-' + thang + '-' + ngay;

for (var i = 0; i < chuoib.length; i++) {

if(i==0){
var ngay1 = chuoib[i];
}else if(i==1){
var thang1 = chuoib[i];
}else if(i==2){
var nam1 = chuoib[i];
}
}
b = nam1 + '-' + thang1 + '-' + ngay1;

var time_begin_int=moment(new Date(a)).unix();
var time_end_int=moment(new Date(b)).unix();



var time_begin_string = moment(moment(time_begin_int*1000).format('DD/MM/YYYY'), 'DD/MM/YYYY');
var time_end_string = moment(moment(time_end_int*1000).format('DD/MM/YYYY'), 'DD/MM/YYYY');

if(time_end_string < time_begin_string){
alert('Ngày kết thúc phải lớn hơn ngày bắt đầu!');
}else{
var week1 =moment.duration(time_end_string.diff(time_begin_string)).asWeeks();
var week = Math.floor(week1 * 1) / 1;
var month1 =moment.duration(time_end_string.diff(time_begin_string)).asMonths();

var month = Math.floor(month1 * 1) / 1;

var ngay_theo_tuan = week * 7;
var day = moment.duration(time_end_string.diff(time_begin_string)).asDays();
var day_remaining = day - ngay_theo_tuan;
console.log(month)

}




if(name_service && price && quantity && time_begin && time_end){
list_all_2.push({"name_service":name_service,"time_begin":time_begin,"time_begin":time_begin,"time_end":time_end,"price":price,"quantity":quantity});
$('#servicemainvi_2').append('<tr id="row2_add_' + i + '">' +
	'<td>' + 
		name_sv + 
		'<input type="hidden" name = "serviceextra[]" value="' + 
		name_service + 
		'" />' + 
	'</td>' + 

	'<td >' + 
		'<div style="display: flex;">' + 
			'<div>' + 
				time_begin +
				'<input type="hidden" name = "serviceextra_datefrom[]" value="' +
				time_begin +
				'" />' +
			'</div>' + 

		'</div>' + 
	'</td>' + 
	'<td >' + 
		'<div style="display: flex;">' + 
			'<div>' +
				time_end +
				'<input type="hidden" name = "serviceextra_dateto[]" value="' +
				time_end +
				'" />' +
			'</div>' + 
		'</div>' + 
	'</td>' + 
	'<td>' + 
		'<div>' +
			price +
			'<input type="hidden" name = "serviceextra_price[]"value="' +
			price +
			'" />' +
		'</div>' + 
	'</td>' + 
	'<td>' +
		'<div>' +
			quantity +
			'<input type="hidden" name = "serviceextra_quantity[]" value="' +
			quantity +
			'" />' +
		'</div>' +  
	'</td>' + 

	'<td>' + 
		'<button type="button" class="btn btn-primary" onclick="delete_contract_2(' + i + ')">Xóa</button>' + 
	'</td>' + 
'</tr>');
i = i + 1;
$('#name_service').val('');
$('#time_begin').val('');
$('#time_end').val('');
$('#price').val('');
$('#quantity').val(quantity);
}else{
alert('Vui lòng nhập đầy đủ thông tin!');
}
}
function add_contract_3(){
var name_service = $('#name_service').val();
var time_begin = $('#time_begin').val();
var time_end = $('#time_end').val();
var price = $('#price').val();
var quantity = $('#areareal').val();
var name_sv = $("#name_service option:selected").text();

var chuoia = time_begin.split("/", 3);
var chuoib = time_end.split("/", 3);

for (var i = 0; i < chuoia.length; i++) {

if(i==0){
var ngay = chuoia[i];
}else if(i==1){
var thang = chuoia[i];
}else if(i==2){
var nam = chuoia[i];
}
}
a = nam + '-' + thang + '-' + ngay;

for (var i = 0; i < chuoib.length; i++) {

if(i==0){
var ngay1 = chuoib[i];
}else if(i==1){
var thang1 = chuoib[i];
}else if(i==2){
var nam1 = chuoib[i];
}
}
b = nam1 + '-' + thang1 + '-' + ngay1;

var time_begin_int=moment(new Date(a)).unix();
var time_end_int=moment(new Date(b)).unix();



var time_begin_string = moment(moment(time_begin_int*1000).format('DD/MM/YYYY'), 'DD/MM/YYYY');
var time_end_string = moment(moment(time_end_int*1000).format('DD/MM/YYYY'), 'DD/MM/YYYY');

if(time_end_string < time_begin_string){
alert('Ngày kết thúc phải lớn hơn ngày bắt đầu!');
}else{
var week1 =moment.duration(time_end_string.diff(time_begin_string)).asWeeks();
var week = Math.floor(week1 * 1) / 1;
var month1 =moment.duration(time_end_string.diff(time_begin_string)).asMonths();

var month = Math.floor(month1 * 1) / 1;

var ngay_theo_tuan = week * 7;
var day = moment.duration(time_end_string.diff(time_begin_string)).asDays();
var day_remaining = day - ngay_theo_tuan;
console.log(month)

}




if(name_service && price && quantity && time_begin && time_end){
list_all_3.push({"name_service":name_service,"time_begin":time_begin,"time_begin":time_begin,"time_end":time_end,"price":price,"quantity":quantity});
$('#servicemainvi_3').append('<tr id="row3_add_' + i + '">' +
	'<td>' + 
		name_sv + 
		'<input type="hidden" name = "servicestatic[]" value="' + 
		name_service + 
		'" />' + 
	'</td>' + 

	'<td >' + 
		'<div style="display: flex;">' + 
			'<div>' + 
				time_begin +
				'<input type="hidden" name = "servicestatic_datefrom[]" value="' +
				time_begin +
				'" />' +
			'</div>' + 

		'</div>' + 
	'</td>' + 
	'<td >' + 
		'<div style="display: flex;">' + 
			'<div>' +
				time_end +
				'<input type="hidden" name = "servicestatic_dateto[]" value="' +
				time_end +
				'" />' +
			'</div>' + 
		'</div>' + 
	'</td>' + 
	'<td>' + 
		'<div>' +
			price +
			'<input type="hidden" name = "servicestatic_price[]"value="' +
			price +
			'" />' +
		'</div>' + 
	'</td>' + 
	'<td>' +
		'<div>' +
			quantity +
			'<input type="hidden" name = "servicestatic_quantity[]" value="' +
			quantity +
			'" />' +
		'</div>' +  
	'</td>' + 

	'<td>' + 
		'<button type="button" class="btn btn-primary" onclick="delete_contract_3(' + i + ')">Xóa</button>' + 
	'</td>' + 
'</tr>');
i = i + 1;
$('#name_service').val('');
$('#time_begin').val('');
$('#time_end').val('');
$('#price').val('');
$('#quantity').val(quantity);
}else{
alert('Vui lòng nhập đầy đủ thông tin!');
}
}