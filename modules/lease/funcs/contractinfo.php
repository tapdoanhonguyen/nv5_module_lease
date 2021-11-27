<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2021 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_IS_MOD_LEASE'))
    die('Stop!!!');

$row = array();
$error = array();
$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $row['contractid'] = $nv_Request->get_int('contractid', 'post', 0);
    $row['productid'] = $nv_Request->get_int('productid', 'post', 0);
    $row['customerid'] = $nv_Request->get_int('customerid', 'post', 0);
    $row['serviceid'] = $nv_Request->get_int('serviceid', 'post', 0);
    $row['yearmonth'] = $nv_Request->get_title('yearmonth', 'post', '');
    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('datedocument', 'post'), $m))     {
        $_hour = 0;
        $_min = 0;
        $row['datedocument'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
    }
    else
    {
        $row['datedocument'] = 0;
    }
    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('feedatefrom', 'post'), $m))     {
        $_hour = 0;
        $_min = 0;
        $row['feedatefrom'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
    }
    else
    {
        $row['feedatefrom'] = 0;
    }
    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('feedateto', 'post'), $m))     {
        $_hour = 0;
        $_min = 0;
        $row['feedateto'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
    }
    else
    {
        $row['feedateto'] = 0;
    }
    $row['price_vi'] = $nv_Request->get_title('price_vi', 'post', '');
    $row['price_en'] = $nv_Request->get_title('price_en', 'post', '');
    $row['fee_vi'] = $nv_Request->get_title('fee_vi', 'post', '');
    $row['fee_en'] = $nv_Request->get_title('fee_en', 'post', '');
    $row['active'] = $nv_Request->get_int('active', 'post', 0);
    $row['status_del'] = $nv_Request->get_int('status_del', 'post', 0);
    $row['adminid'] = $nv_Request->get_int('adminid', 'post', 0);
    $row['crt_date'] = $nv_Request->get_int('crt_date', 'post', 0);
    $row['userid_edit'] = $nv_Request->get_int('userid_edit', 'post', 0);
    $row['update_time'] = $nv_Request->get_int('update_time', 'post', 0);

    if (empty($row['contractid'])) {
        $error[] = $lang_module['error_required_contractid'];
    } elseif (empty($row['productid'])) {
        $error[] = $lang_module['error_required_productid'];
    } elseif (empty($row['customerid'])) {
        $error[] = $lang_module['error_required_customerid'];
    } elseif (empty($row['serviceid'])) {
        $error[] = $lang_module['error_required_serviceid'];
    } elseif (empty($row['yearmonth'])) {
        $error[] = $lang_module['error_required_yearmonth'];
    } elseif (empty($row['datedocument'])) {
        $error[] = $lang_module['error_required_datedocument'];
    } elseif (empty($row['price_vi'])) {
        $error[] = $lang_module['error_required_price_vi'];
    } elseif (empty($row['price_en'])) {
        $error[] = $lang_module['error_required_price_en'];
    } elseif (empty($row['fee_vi'])) {
        $error[] = $lang_module['error_required_fee_vi'];
    } elseif (empty($row['fee_en'])) {
        $error[] = $lang_module['error_required_fee_en'];
    }

    if (empty($error)) {
        try {
            if (empty($row['id'])) {
                $row['weight'] = 0;

                $stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_contract_info (contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES (:contractid, :productid, :customerid, :serviceid, :yearmonth, :datedocument, :feedatefrom, :feedateto, :price_vi, :price_en, :fee_vi, :fee_en, :active, :weight, :status_del, :adminid, :crt_date, :userid_edit, :update_time)');

                $stmt->bindParam(':weight', $row['weight'], PDO::PARAM_INT);

            } else {
                $stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_contract_info SET contractid = :contractid, productid = :productid, customerid = :customerid, serviceid = :serviceid, yearmonth = :yearmonth, datedocument = :datedocument, feedatefrom = :feedatefrom, feedateto = :feedateto, price_vi = :price_vi, price_en = :price_en, fee_vi = :fee_vi, fee_en = :fee_en, active = :active, status_del = :status_del, adminid = :adminid, crt_date = :crt_date, userid_edit = :userid_edit, update_time = :update_time WHERE id=' . $row['id']);
            }
            $stmt->bindParam(':contractid', $row['contractid'], PDO::PARAM_INT);
            $stmt->bindParam(':productid', $row['productid'], PDO::PARAM_INT);
            $stmt->bindParam(':customerid', $row['customerid'], PDO::PARAM_INT);
            $stmt->bindParam(':serviceid', $row['serviceid'], PDO::PARAM_INT);
            $stmt->bindParam(':yearmonth', $row['yearmonth'], PDO::PARAM_STR);
            $stmt->bindParam(':datedocument', $row['datedocument'], PDO::PARAM_INT);
            $stmt->bindParam(':feedatefrom', $row['feedatefrom'], PDO::PARAM_INT);
            $stmt->bindParam(':feedateto', $row['feedateto'], PDO::PARAM_INT);
            $stmt->bindParam(':price_vi', $row['price_vi'], PDO::PARAM_STR);
            $stmt->bindParam(':price_en', $row['price_en'], PDO::PARAM_STR);
            $stmt->bindParam(':fee_vi', $row['fee_vi'], PDO::PARAM_STR);
            $stmt->bindParam(':fee_en', $row['fee_en'], PDO::PARAM_STR);
            $stmt->bindParam(':active', $row['active'], PDO::PARAM_INT);
            $stmt->bindParam(':status_del', $row['status_del'], PDO::PARAM_INT);
            $stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
            $stmt->bindParam(':crt_date', $row['crt_date'], PDO::PARAM_INT);
            $stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);
            $stmt->bindParam(':update_time', $row['update_time'], PDO::PARAM_INT);

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['id'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Contractinfo', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Contractinfo', 'ID: ' . $row['id'], $admin_info['userid']);
                }
                nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract_info WHERE id=' . $row['id'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
} else {
    $row['id'] = 0;
    $row['contractid'] = 0;
    $row['productid'] = 0;
    $row['customerid'] = 0;
    $row['serviceid'] = 0;
    $row['yearmonth'] = '';
    $row['datedocument'] = 0;
    $row['feedatefrom'] = 0;
    $row['feedateto'] = 0;
    $row['price_vi'] = '0';
    $row['price_en'] = '0';
    $row['fee_vi'] = '0';
    $row['fee_en'] = '0';
    $row['active'] = 0;
    $row['status_del'] = 0;
    $row['adminid'] = 0;
    $row['crt_date'] = 0;
    $row['userid_edit'] = 0;
    $row['update_time'] = 0;
}

if (empty($row['datedocument'])) {
    $row['datedocument'] = '';
}
else
{
    $row['datedocument'] = date('d/m/Y', $row['datedocument']);
}

if (empty($row['feedatefrom'])) {
    $row['feedatefrom'] = '';
}
else
{
    $row['feedatefrom'] = date('d/m/Y', $row['feedatefrom']);
}

if (empty($row['feedateto'])) {
    $row['feedateto'] = '';
}
else
{
    $row['feedateto'] = date('d/m/Y', $row['feedateto']);
}
$array_contractid_lease = array();
$_sql = 'SELECT id,ccode FROM vidoco_vi_lease_contract';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_contractid_lease[$_row['id']] = $_row;
}

$array_productid_lease = array();
$_sql = 'SELECT pid,title_vi FROM vidoco_vi_lease_product';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_productid_lease[$_row['pid']] = $_row;
}

$array_customerid_lease = array();
$_sql = 'SELECT cid,title FROM vidoco_vi_lease_customer';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_customerid_lease[$_row['cid']] = $_row;
}

$array_serviceid_lease = array();
$_sql = 'SELECT sid,title_vi FROM vidoco_vi_lease_service';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_serviceid_lease[$_row['sid']] = $_row;
}

$xtpl = new XTemplate('contractinfo.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('MODULE_UPLOAD', $module_upload);
$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
$xtpl->assign('OP', $op);
$xtpl->assign('ROW', $row);

foreach ($array_contractid_lease as $value) {
    $xtpl->assign('OPTION', array(
        'key' => $value['id'],
        'title' => $value['ccode'],
        'selected' => ($value['id'] == $row['contractid']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_contractid');
}
foreach ($array_productid_lease as $value) {
    $xtpl->assign('OPTION', array(
        'key' => $value['pid'],
        'title' => $value['title_vi'],
        'selected' => ($value['pid'] == $row['productid']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_productid');
}
foreach ($array_customerid_lease as $value) {
    $xtpl->assign('OPTION', array(
        'key' => $value['cid'],
        'title' => $value['title'],
        'selected' => ($value['cid'] == $row['customerid']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_customerid');
}
foreach ($array_serviceid_lease as $value) {
    $xtpl->assign('OPTION', array(
        'key' => $value['sid'],
        'title' => $value['title_vi'],
        'selected' => ($value['sid'] == $row['serviceid']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_serviceid');
}

if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['contractinfo'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
