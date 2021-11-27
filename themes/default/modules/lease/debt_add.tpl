<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<div class="panel panel-default">
<div class="panel-body">
<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <input type="hidden" name="id" value="{ROW.id}" />
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.customerid}</strong></label>
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
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.customername}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="customername" value="{ROW.customername}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.yearmonth}</strong></label>
        <div class="col-sm-19 col-md-20">
            <select class="form-control" name="yearmonth">
                <option value=""> --- </option>
                <!-- BEGIN: select_yearmonth -->
                <option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
                <!-- END: select_yearmonth -->
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.note_vi}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="note_vi" value="{ROW.note_vi}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.note_en}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="note_en" value="{ROW.note_en}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.exchangeusd}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="exchangeusd" value="{ROW.exchangeusd}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.total_vi}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="total_vi" value="{ROW.total_vi}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.total_en}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="total_en" value="{ROW.total_en}" />
        </div>
    </div>
    <div class="form-group" style="text-align: center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
</form>
</div></div>
<!-- END: main -->