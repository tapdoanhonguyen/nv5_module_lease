<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<div class="panel panel-default">
<div class="panel-body">
<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <input type="hidden" name="id" value="{ROW.id}" />
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.companyid}</strong></label>
        <div class="col-sm-19 col-md-20">
            <select class="form-control" name="companyid">
                <option value=""> --- </option>
                <!-- BEGIN: select_companyid -->
                <option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
                <!-- END: select_companyid -->
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.vi_bank_number}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="vi_bank_number" value="{ROW.vi_bank_number}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.en_bank_number}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="en_bank_number" value="{ROW.en_bank_number}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.vi_bank_account_holder}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="vi_bank_account_holder" value="{ROW.vi_bank_account_holder}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.en_bank_account_holder}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="en_bank_account_holder" value="{ROW.en_bank_account_holder}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.vi_bank_name}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="vi_bank_name" value="{ROW.vi_bank_name}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.en_bank_name}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="en_bank_name" value="{ROW.en_bank_name}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.vi_address}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="vi_address" value="{ROW.vi_address}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.en_address}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="en_address" value="{ROW.en_address}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.swiftcode}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="swiftcode" value="{ROW.swiftcode}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group" style="text-align: center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
</form>
</div></div>
<!-- END: main -->