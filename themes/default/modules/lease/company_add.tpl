<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<div class="panel panel-default">
<div class="panel-body">
<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <input type="hidden" name="cid" value="{ROW.cid}" />
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.vi_title}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="vi_title" value="{ROW.vi_title}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.en_title}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="en_title" value="{ROW.en_title}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.vi_address}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="vi_address" value="{ROW.vi_address}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.en_address}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="en_address" value="{ROW.en_address}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.vi_province}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="vi_province" value="{ROW.vi_province}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.en_province}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="en_province" value="{ROW.en_province}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.phone}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="phone" value="{ROW.phone}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.fax}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="fax" value="{ROW.fax}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.email}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="email" value="{ROW.email}" />
        </div>
    </div>
    <div class="form-group" style="text-align: center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
</form>
</div></div>
<!-- END: main -->