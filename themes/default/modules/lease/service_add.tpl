<!-- BEGIN: main -->
<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">{LANG.service}</div>
	<div class="pl-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item">
					<a href="/"><i class='bx bx-home-alt'></i></a>
				</li>
				<li class="breadcrumb-item" aria-current="page">{LANG.service}</li>
				<li class="breadcrumb-item active" aria-current="page">{LANG.service_add}</li>
			</ol>
		</nav>
	</div>
	<div class="ml-auto">
		<div class="btn-group">
			<a type="button" class="btn btn-primary" href="{service_add}"><i class="lni lni-add-files mrg-r-5"></i>{LANG.add}</a>
		</div>
	</div>
</div>
<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.service_add}</h4>
		</div>
		<hr/>
		<!-- BEGIN: error -->
		<div class="alert alert-warning">{ERROR}</div>
		<!-- END: error -->
		<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}/add" method="post">
			<input type="hidden" name="sid" value="{ROW.sid}" />
			<div class="form-group">
				<label>{LANG.service_code} <span class="red">(*)</span></label>
				<input class="form-control" type="text" name="servicecode" value="{ROW.servicecode}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
			</div>
			<div class="form-row">
				<div class="col-md-6 mb-3">
					<label>{LANG.service_title_vi} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="title_vi" value="{ROW.title_vi}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
				<div class="col-md-6 mb-3">
					<label>{LANG.service_title_en} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="title_en" value="{ROW.title_en}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
			
				<div class="col-md-6 mb-3">
					<label>{LANG.catid} <span class="red">(*)</span></label>
					<select class="form-control" name="catid">
						<option value=""> --- </option>
						<!-- BEGIN: select_catid -->
						<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
						<!-- END: select_catid -->
					</select>
				</div>
				<div class="col-md-6 mb-3">
					<label>{LANG.unitid} <span class="red">(*)</span></label>
					<select class="form-control" name="unitid">
						<option value=""> --- </option>
						<!-- BEGIN: select_unitid -->
						<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
						<!-- END: select_unitid -->
					</select>
				</div>	
				<div class="col-md-6 mb-3">
					<label>{LANG.price_usd}<span class="red">(*)</span></label>
					<input class="mask form-control" type="text" name="price_usd" value="{ROW.price_usd}" required="required"/>
				</div>
				<div class="col-md-6 mb-3">
					<label>{LANG.price_vnd}<span class="red">(*)</span></label>
					<input class="mask form-control" type="text" name="price_vnd" value="{ROW.price_vnd}" required="required"/>
				</div>
				<div class="col-md-6 mb-3">
					<label>{LANG.chargeid} <span class="red">(*)</span></label>
					<select class="form-control" name="chargeid">
						<!-- BEGIN: select_chargeid -->
						<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
						<!-- END: select_chargeid -->
					</select>
				</div>
				<div class="col-md-6 mb-3">
					<label>{LANG.daily_report} <span class="red">(*)</span></label>
					<select class="form-control" name="dailyreport">
						<!-- BEGIN: daily_report -->
						<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
						<!-- END: daily_report -->
					</select>
				</div>
				<div class="col-md-6 mb-3">
					<label>{LANG.typein} <span class="red">(*)</span></label>
					<select class="form-control" name="typein">
						<!-- BEGIN: typein -->
						<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
						<!-- END: typein -->
					</select>
				</div>
				<div class="col-md-6 mb-3">
					<label>{LANG.service_type} <span class="red">(*)</span></label>
					<div class="d-flex mb-3">
						<div class="custom-control custom-radio mrg-r-15">
							<input type="radio" id="service_main" value="1" name="service_main" {smchecked} class="custom-control-input">
							<label class="custom-control-label" for="service_main">{LANG.service_main}</label>
						</div>
						<div class="custom-control custom-radio mrg-r-15">
							<input type="radio" id="service_extra"value="0" name="service_main" {sechecked} class="custom-control-input">
							<label class="custom-control-label" for="service_extra">{LANG.service_extra}</label>
						</div>
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
<script type="text/javascript">
                function readURL(input) {
                  if (input.files && input.files[0]) {
                    var reader = new FileReader();
					console.log(input.files[0].name);
                    reader.onload = function(e) {
                      $('#review_img').attr('src', e.target.result);
                      $('#imgfile').val(nv_base_siteurl + 'uploads/lease/product/' + input.files[0].name);
                      $('#fileToUpload').val(e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]);
              }
          }
          $(document).ready( function() {
            $('#select_file').click(function(){
                $("#homeimg").click();
            });
        });

          $("#homeimg").change(function() {
            $('#review_img').removeClass('hidden');
            readURL(this);
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
    </script>	
<script type="text/javascript">
//<![CDATA[
    function nv_change_weight(id) {
        var nv_timer = nv_settimeout_disable('id_weight_' + id, 5000);
        var new_vid = $('#id_weight_' + id).val();
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=service&nocache=' + new Date().getTime(), 'ajax_action=1&sid=' + id + '&new_vid=' + new_vid, function(res) {
            var r_split = res.split('_');
            if (r_split[0] != 'OK') {
                alert(nv_is_change_act_confirm[2]);
            }
            window.location.href = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=service';
            return;
        });
        return;
    }


    function nv_change_status(id) {
        var new_status = $('#change_status_' + id).is(':checked') ? true : false;
        if (confirm(nv_is_change_act_confirm[0])) {
            var nv_timer = nv_settimeout_disable('change_status_' + id, 5000);
            $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=service&nocache=' + new Date().getTime(), 'change_status=1&sid='+id, function(res) {
                var r_split = res.split('_');
                if (r_split[0] != 'OK') {
                    alert(nv_is_change_act_confirm[2]);
                }
            });
        }
        else{
            $('#change_status_' + id).prop('checked', new_status ? false : true);
        }
        return;
    }


//]]>
</script>

<script src="/themes/softs/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function () {
			//Default data table
			$('#example').DataTable();
		});
	</script>
	
<!-- END: main -->