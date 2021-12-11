<!-- BEGIN: main -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">Tầng</div>
	<div class="pl-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item">
					<a href="/"><i class='bx bx-home-alt'></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">{LANG.floor_edit}</li>
			</ol>
		</nav>
	</div>
	<div class="ml-auto">
		<div class="btn-group">
			<a type="button" class="btn btn-success" href="{FLOOR_ADD}"><i class="lni lni-add-files mrg-r-5"></i>{LANG.add}</a>
			
		</div>
	</div>
</div>
<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">Sửa tầng</h4>
		</div>
		<hr/>	
		<!-- BEGIN: error -->
		<div class="alert alert-warning">{ERROR}</div>
		<!-- END: error -->
		<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}/add" method="post" enctype="multipart/form-data" >
			<input type="hidden" name="fid" value="{ROW.fid}" />
			<div class="form-row">
				<div class="col-md-3 mb-3">
					<label>{LANG.floorcode} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="floorcode" value="{ROW.floorcode}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
				<div class="col-md-3 mb-3">
					<label>{LANG.title} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="title_vi" value="{ROW.title_vi}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
				<div class="col-md-3 mb-3">
					<label>{LANG.title_en} <span class="red">(*)</span></label>
					<input class="form-control" type="text" name="title_en" value="{ROW.title_en}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
				<div class="col-md-3 mb-3">
					<label>{LANG.alias} <span class="red">(*)</span></label>
					<div class="input-group">
						<input class="form-control" type="text" name="alias" value="{ROW.alias}" id="id_alias" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" readonly />
						<div class="input-group-append">
							<button onclick="nv_get_alias('id_alias');" class="btn btn-info" type="button">
								<i class="fa fa-refresh fa-lg icon-pointer">&nbsp;</i>
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-3 mb-3">
					<label>{LANG.area}</label>
					<input class="mask form-control" type="text" name="area" value="{ROW.area}"   required="required"/>
				</div>
				<div class="col-md-3 mb-3">
					<label>{LANG.common_area}</label>
					<input class="mask form-control" type="text" name="common_area" value="{ROW.common_area}"   required="required"/>
				</div>
				<div class="col-md-3 mb-3">
					<label>{LANG.area_for_rent} <span class="red">(*)</span></label>
					<input class="mask form-control" type="text" name="area_for_rent" value="{ROW.area_for_rent}"   required="required"/>
				</div>
				<div class="col-md-3  mb-3">
					
						<label class="mrg-r-15"> {LANG.elevatortype}:</label>
						<div class="d-flex">
							<!-- BEGIN: radio_elevator -->
							<span class="custom-control custom-radio mrg-r-15">
								<input type="radio" value="{OPTION.key}" id="elevator-{OPTION.key}" name="elevator" class="custom-control-input" {OPTION.checked}>
								<label class="custom-control-label" for="elevator-{OPTION.key}">{OPTION.title}</label>
							</span>
							<!-- END: radio_elevator -->
						</div>
				</div>
			</div>
			
			<div class="mb-3">
				<label>{LANG.image}</label>
				<div class="input-group">
					<input class="form-control" type="text" name="image" value="{ROW.image}" id="imgfile"/>
					<input type='file' id="homeimg" class="hidden" name="images"  />
					<div class="input-group-append">
						<button class="btn btn-primary" id="select_file" type="button">
							<em class="fa fa-folder-open-o fa-fix">&nbsp;</em> 
							{LANG.image}
						</button> 
					</div>
				</div>
				<img id="review_img" style="right: 16px; top: 0" src="{ROW.image}" alt="your image" class="{HIDDEN} img1 img3x4" style="object-fit: cover"/>
			</div>
			<div class="form-row">
				<div class="col-md-12 mb-3">
					<label>{LANG.note}</label>
					<div>
						{ROW.note}        
					</div>
				</div>
			</div>
			<button class="btn btn-primary" name="submit" type="submit"><i class="lni lni-save mrg-r-5"></i>{LANG.save}</button>
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
		  $('#imgfile').val(nv_base_siteurl + 'uploads/lease/floor/' + input.files[0].name);
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
	

})
</script>
<script type="text/javascript">
//<![CDATA[
    function nv_get_alias(id) {
        var title = strip_tags($("[name='title_vi']").val());
        if (title != '') {
            $.post(nv_base_siteurl + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=floor/alias&nocache=' + new Date().getTime(), 'get_alias_title=' + encodeURIComponent(title), function(res) {
                $("#"+id).val(strip_tags(res));
            });
        }
        return false;
    }
//]]>
</script>
<!-- BEGIN: auto_get_alias -->
<script type="text/javascript">
//<![CDATA[
    $("[name='title_vi']").change(function() {
        nv_get_alias('id_alias');
    });
//]]>
</script>
<!-- END: auto_get_alias -->
<!-- END: main -->