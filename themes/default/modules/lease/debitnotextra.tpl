<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<div class="panel panel-default">
<div class="panel-body">
<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <input type="hidden" name="id" value="{ROW.id}" />
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.debitnoteid}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="debitnoteid" value="{ROW.debitnoteid}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.pid}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="pid" value="{ROW.pid}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.cid}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="cid" value="{ROW.cid}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.yearmonth}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="yearmonth" value="{ROW.yearmonth}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.adddate}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="adddate" value="{ROW.adddate}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.serviceid}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="serviceid" value="{ROW.serviceid}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.exchangeid}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="exchangeid" value="{ROW.exchangeid}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.price_vi}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="price_vi" value="{ROW.price_vi}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.price_en}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="price_en" value="{ROW.price_en}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.amount}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="amount" value="{ROW.amount}" />
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
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.note}</strong></label>
        <div class="col-sm-19 col-md-20">
            <textarea class="form-control" style="height:100px;" cols="75" rows="5" name="note">{ROW.note}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.userid_edit}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="userid_edit" value="{ROW.userid_edit}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.update_date}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="update_date" value="{ROW.update_date}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
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
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.active}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="active" value="{ROW.active}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group" style="text-align: center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
</form>
</div></div>
<!-- END: main -->