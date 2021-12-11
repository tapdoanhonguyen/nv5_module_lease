<!-- BEGIN: main -->
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />

<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<div class="panel panel-default">
<div class="panel-body">
<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <input type="hidden" name="id" value="{ROW.id}" />
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.contractid}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <select class="form-control" name="contractid">
                <option value=""> --- </option>
                <!-- BEGIN: select_contractid -->
                <option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
                <!-- END: select_contractid -->
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.productid}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <select class="form-control" name="productid">
                <option value=""> --- </option>
                <!-- BEGIN: select_productid -->
                <option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
                <!-- END: select_productid -->
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.customerid}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <select class="form-control" name="customerid">
                <option value=""> --- </option>
                <!-- BEGIN: select_customerid -->
                <option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
                <!-- END: select_customerid -->
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.serviceid}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <select class="form-control" name="serviceid">
                <option value=""> --- </option>
                <!-- BEGIN: select_serviceid -->
                <option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
                <!-- END: select_serviceid -->
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.yearmonth}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="yearmonth" value="{ROW.yearmonth}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.datedocument}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <div class="input-group">
            <input class="form-control" type="text" name="datedocument" value="{ROW.datedocument}" id="datedocument" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" id="datedocument-btn">
                        <em class="fa fa-calendar fa-fix"> </em>
                    </button> </span>
                </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.feedatefrom}</strong></label>
        <div class="col-sm-19 col-md-20">
            <div class="input-group">
            <input class="form-control" type="text" name="feedatefrom" value="{ROW.feedatefrom}" id="feedatefrom" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" />
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" id="feedatefrom-btn">
                        <em class="fa fa-calendar fa-fix"> </em>
                    </button> </span>
                </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.feedateto}</strong></label>
        <div class="col-sm-19 col-md-20">
            <div class="input-group">
            <input class="form-control" type="text" name="feedateto" value="{ROW.feedateto}" id="feedateto" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" />
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" id="feedateto-btn">
                        <em class="fa fa-calendar fa-fix"> </em>
                    </button> </span>
                </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.price_vi}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="price_vi" value="{ROW.price_vi}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.price_en}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="price_en" value="{ROW.price_en}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.fee_vi}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="fee_vi" value="{ROW.fee_vi}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.fee_en}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="fee_en" value="{ROW.fee_en}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.active}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="active" value="{ROW.active}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.status_del}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="status_del" value="{ROW.status_del}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.adminid}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="adminid" value="{ROW.adminid}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.crt_date}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="crt_date" value="{ROW.crt_date}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.userid_edit}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="userid_edit" value="{ROW.userid_edit}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.update_time}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="update_time" value="{ROW.update_time}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group" style="text-align: center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
</form>
</div></div>

<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>

<script type="text/javascript">
//<![CDATA[
    $("#datedocument,#feedatefrom,#feedateto").datepicker({
        dateFormat : "dd/mm/yy",
        changeMonth : true,
        changeYear : true,
        showOtherMonths : true,
    });

//]]>
</script>
<!-- END: main -->