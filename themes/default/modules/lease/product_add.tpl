<!-- BEGIN: main -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">{LANG.product}</div>
	<div class="pl-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="/"><i class='bx bx-home-alt'></i></a>
				</li>
				<li class="breadcrumb-item"><a href="/lease/product/">{LANG.product}</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">{LANG.product_add}</li>
			</ol>
		</nav>
	</div>
	<div class="ml-auto">
		<div class="btn-group">
			<a type="button" class="btn btn-primary" href="{PRODUCT_ADD}"><i class="lni lni-add-files mrg-r-5"></i>{LANG.product_add}</a> 
			<button type="button" class="btn btn-primary bg-split-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">	<span class="sr-only">{LANG.product_more}</span>
			</button>
			<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
				<a class="dropdown-item" href="{PRODUCT_IMPORT}">{LANG.product_import}</a>
				<a class="dropdown-item" href="{PRODUCT_EXPORT}">{LANG.product_export}</a>
				<div class="dropdown-divider"></div>	
			</div>
		</div>
	</div>
</div>	
<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">{LANG.product_add}</h4>
		</div>
		<hr/>	
		<!-- BEGIN: error -->
			<div class="alert alert-warning">{ERROR}</div>
		<!-- END: error -->
				
		<form class="needs-validation" action="{PRODUCT_ADD}" method="post">
			<input type="hidden" name="pid" value="{ROW.pid}" />
			<div class="form-row">
				<div class="col-md-6 mb-3">
					<label>{LANG.productcode}
						<span class="red">(*)</span>
					</label>
					<input class="form-control" type="text" name="productcode" value="{ROW.productcode}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
				<div class="col-md-6 mb-3">
					<label for="title_en">{LANG.title_product_vi}
						<span class="red">(*)</span>
					</label>
					<input class="form-control" type="text" name="title_vi" value="{ROW.title_vi}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
				<div class="col-md-6 mb-3">
					<label for="title_en">{LANG.title_product_en}
						<span class="red">(*)</span>
					</label>
					<input class="form-control" type="text" name="title_en" value="{ROW.title_en}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
				</div>
				<div class="col-md-6 mb-3">
					<label>{LANG.alias} <span class="red">(*)</span></label>
					<div class="input-group">
						<input class="form-control" type="text" name="alias" value="{ROW.alias}" id="id_alias" required="required" oninvalid="setCustomValidity(nv_required)"  />
						<div class="input-group-append">
							<button onclick="nv_get_alias('id_alias');" class="btn btn-info" type="button">
								<i class="fa fa-refresh fa-lg icon-pointer"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-6 mb-3">
					<label>{LANG.fid} <span class="red">(*)</span></label>
					<select class="form-control" name="fid">
							<option value=""> Chọn Tầng </option>
							<!-- BEGIN: select_fid -->
							<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
							<!-- END: select_fid -->
					</select>
				</div>
				<div class="col-md-6 mb-3">
					<label>{LANG.area} <span class="red">(*)</span></label>
					<input class="mask form-control" type="text" name="area" value="{ROW.area}" required="required"  />
				</div>
			</div>
			<div class="mb-3">
				<label>{LANG.image}</label><span class="red">(*)</span>
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
    function nv_get_alias(id) {
        var title = strip_tags($("[name='title_vi']").val());
        if (title != '') {
            $.post(nv_base_siteurl + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=product/alias&nocache=' + new Date().getTime(), 'get_alias_title=' + encodeURIComponent(title), function(res) {
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
<div class="form-row">
	<div class="col-md-3 mb-3">
		<label> {LANG.price_usd_min} <span class="red">(*)</span></label>
		<input class="mask form-control" type="number" name="price_usd_min" value="{ROW.price_usd_min}" required="required" pattern="^([0-9]*)(\.*)([0-9]+)$" oninvalid="setCustomValidity(nv_number)" oninput="setCustomValidity('')" />
	</div>
	<div class="col-md-3 mb-3">
		<label>{LANG.price_usd_max}<span class="red">(*)</span></label>
		<input class="mask form-control" type="number" name="price_usd_max" value="{ROW.price_usd_max}" required="required" pattern="^([0-9]*)(\.*)([0-9]+)$" oninvalid="setCustomValidity(nv_number)" oninput="setCustomValidity('')" />
	</div>
	<div class="col-md-3 mb-3">
		<label>{LANG.price_vnd_min} <span class="red">(*)</span></label>
		
			<input class="mask form-control" type="number" name="price_vnd_min" value="{ROW.price_vnd_min}" required="required" pattern="^([0-9]*)(\.*)([0-9]+)$" oninvalid="setCustomValidity(nv_number)" oninput="setCustomValidity('')" />
	</div>
	<div class="col-md-3 mb-3">
		<label>{LANG.price_vnd_max} <span class="red">(*)</span></label>
		<input class="mask form-control" type="text" name="price_vnd_max" value="{ROW.price_vnd_max}" required="required"  />
	</div>
</div>

<div class="form-row">
	<div class="col-md-3 mb-3">
		<label>{LANG.rent_status} </label>
		<select class="form-control" name="rent_status">
				<option value=""> --- </option>
				<!-- BEGIN: select_rent_status -->
				<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
				<!-- END: select_rent_status -->
		</select>
	</div>
</div>