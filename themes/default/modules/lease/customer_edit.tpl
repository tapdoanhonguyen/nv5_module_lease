<!-- BEGIN: main -->
<!-- BEGIN: view -->
<div class="well">
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
<form action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="w100">{LANG.update_date}</th>
                    <th>{LANG.title}</th>
                    <th>{LANG.gid}</th>
                    <th>{LANG.address}</th>
                    <th>{LANG.mobile}</th>
                    <th>{LANG.email}</th>
                    <th>{LANG.taxcode}</th>
                    <th class="w100 text-center">{LANG.active}</th>
                    <th class="w150">&nbsp;</th>
                </tr>
            </thead>
            <!-- BEGIN: generate_page -->
            <tfoot>
                <tr>
                    <td class="text-center" colspan="9">{NV_GENERATE_PAGE}</td>
                </tr>
            </tfoot>
            <!-- END: generate_page -->
            <tbody>
                <!-- BEGIN: loop -->
                <tr>
                    <td>
                        <select class="form-control" id="id_weight_{VIEW.cid}" onchange="nv_change_weight('{VIEW.cid}');">
                        <!-- BEGIN: update_date_loop -->
                            <option value="{WEIGHT.key}"{WEIGHT.selected}>{WEIGHT.title}</option>
                        <!-- END: update_date_loop -->
                    </select>
                </td>
                    <td> {VIEW.title} </td>
                    <td> {VIEW.gid} </td>
                    <td> {VIEW.address} </td>
                    <td> {VIEW.mobile} </td>
                    <td> {VIEW.email} </td>
                    <td> {VIEW.taxcode} </td>
                    <td class="text-center"><input type="checkbox" name="active" id="change_status_{VIEW.cid}" value="{VIEW.cid}" {CHECK} onclick="nv_change_status({VIEW.cid});" /></td>
                    <td class="text-center"><i class="fa fa-edit fa-lg">&nbsp;</i> <a href="{VIEW.link_edit}#edit">{LANG.edit}</a> - <em class="fa fa-trash-o fa-lg">&nbsp;</em> <a href="{VIEW.link_delete}" onclick="return confirm(nv_is_del_confirm[0]);">{LANG.delete}</a></td>
                </tr>
                <!-- END: loop -->
            </tbody>
        </table>
    </div>
</form>
<!-- END: view -->

<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<div class="panel panel-default">
<div class="panel-body">
<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <input type="hidden" name="cid" value="{ROW.cid}" />
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.title}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="title" value="{ROW.title}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.gid}</strong> <span class="red">(*)</span></label>
        <div class="col-sm-19 col-md-20">
            <select class="form-control" name="gid">
                <option value=""> --- </option>
                <!-- BEGIN: select_gid -->
                <option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
                <!-- END: select_gid -->
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.address}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="address" value="{ROW.address}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.mobile}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="mobile" value="{ROW.mobile}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.fax}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="fax" value="{ROW.fax}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.email}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="email" value="{ROW.email}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.taxcode}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="taxcode" value="{ROW.taxcode}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.person_legal}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="person_legal" value="{ROW.person_legal}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.person_legal_mobile}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="person_legal_mobile" value="{ROW.person_legal_mobile}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.note}</strong></label>
        <div class="col-sm-19 col-md-20">
{ROW.note}        </div>
    </div>
    <div class="form-group" style="text-align: center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
</form>
</div></div>

<script type="text/javascript">
//<![CDATA[
    function nv_change_weight(id) {
        var nv_timer = nv_settimeout_disable('id_weight_' + id, 5000);
        var new_vid = $('#id_weight_' + id).val();
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=customer&nocache=' + new Date().getTime(), 'ajax_action=1&cid=' + id + '&new_vid=' + new_vid, function(res) {
            var r_split = res.split('_');
            if (r_split[0] != 'OK') {
                alert(nv_is_change_act_confirm[2]);
            }
            window.location.href = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=customer';
            return;
        });
        return;
    }


    function nv_change_status(id) {
        var new_status = $('#change_status_' + id).is(':checked') ? true : false;
        if (confirm(nv_is_change_act_confirm[0])) {
            var nv_timer = nv_settimeout_disable('change_status_' + id, 5000);
            $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=customer&nocache=' + new Date().getTime(), 'change_status=1&cid='+id, function(res) {
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
<!-- END: main -->