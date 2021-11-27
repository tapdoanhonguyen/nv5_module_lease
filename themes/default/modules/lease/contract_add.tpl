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
					<select class="form-control" name="pid">
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
						<option value="0">-- Chọn loại bảng giá --</option>
						<!-- BEGIN: select_ccat -->
						<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
						<!-- END: select_ccat -->
					</select>
				</div>
				<div class="col-md-2 mb-3">
					<label>Dịch vụ <span class="red">(*)</span></label>
					<select class="form-control" name="sid">
						<option value="0">-- {LANG.sid} --</option>
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
    $("#datefrom,#dateto,#feedatefrom,#feedateto").datepicker({
        dateFormat : "dd/mm/yy",
        changeMonth : true,
        changeYear : true,
        showOtherMonths : true,
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