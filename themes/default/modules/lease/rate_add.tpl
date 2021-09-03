<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<div class="panel panel-default">
<div class="panel-body">
<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <input type="hidden" name="id" value="{ROW.id}" />
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.mount}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <select class="form-control" name="mount">
                <option value=""> --- </option>
                <!-- BEGIN: select_mount -->
                <option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
                <!-- END: select_mount -->
            </select>
        </div>
    </div>
    <div class="form-group" style="text-align: center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
</form>
</div></div>
<!-- END: main -->