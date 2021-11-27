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

if ($nv_Request->isset_request('delete_id', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
    $id = $nv_Request->get_int('delete_id', 'get');
    $delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
    if ($id > 0 and $delete_checkss == md5($id . NV_CACHE_PREFIX . $client_info['session_id'])) {
        $db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote_money  WHERE id = ' . $db->quote($id));
        $nv_Cache->delMod($module_name);
        nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Debitnotemoney', 'ID: ' . $id, $admin_info['userid']);
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
}

$row = array();
$error = array();
$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $row['debitnoteid'] = $nv_Request->get_int('debitnoteid', 'post', 0);
    $row['pid'] = $nv_Request->get_int('pid', 'post', 0);
    $row['cid'] = $nv_Request->get_int('cid', 'post', 0);
    $row['yearmonth'] = $nv_Request->get_title('yearmonth', 'post', '');
    $row['adddate'] = $nv_Request->get_int('adddate', 'post', 0);
    $row['serviceid'] = $nv_Request->get_int('serviceid', 'post', 0);
    $row['exchangeid'] = $nv_Request->get_int('exchangeid', 'post', 0);
    $row['price_vi'] = $nv_Request->get_title('price_vi', 'post', '');
    $row['price_en'] = $nv_Request->get_title('price_en', 'post', '');
    $row['amount'] = $nv_Request->get_title('amount', 'post', '');
    $row['total_vi'] = $nv_Request->get_title('total_vi', 'post', '');
    $row['total_en'] = $nv_Request->get_title('total_en', 'post', '');
    $row['note'] = $nv_Request->get_textarea('note', '', NV_ALLOWED_HTML_TAGS);
    $row['userid_edit'] = $nv_Request->get_int('userid_edit', 'post', 0);
    $row['update_date'] = $nv_Request->get_int('update_date', 'post', 0);
    $row['adminid'] = $nv_Request->get_int('adminid', 'post', 0);
    $row['crt_date'] = $nv_Request->get_int('crt_date', 'post', 0);
    $row['active'] = $nv_Request->get_int('active', 'post', 0);

    if (empty($error)) {
        try {
            if (empty($row['id'])) {
                $row['weight'] = 0;

                $stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote_money (debitnoteid, pid, cid, yearmonth, adddate, serviceid, exchangeid, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) VALUES (:debitnoteid, :pid, :cid, :yearmonth, :adddate, :serviceid, :exchangeid, :price_vi, :price_en, :amount, :total_vi, :total_en, :note, :userid_edit, :update_date, :adminid, :crt_date, :weight, :active)');

                $stmt->bindParam(':weight', $row['weight'], PDO::PARAM_INT);

            } else {
                $stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote_money SET debitnoteid = :debitnoteid, pid = :pid, cid = :cid, yearmonth = :yearmonth, adddate = :adddate, serviceid = :serviceid, exchangeid = :exchangeid, price_vi = :price_vi, price_en = :price_en, amount = :amount, total_vi = :total_vi, total_en = :total_en, note = :note, userid_edit = :userid_edit, update_date = :update_date, adminid = :adminid, crt_date = :crt_date, active = :active WHERE id=' . $row['id']);
            }
            $stmt->bindParam(':debitnoteid', $row['debitnoteid'], PDO::PARAM_INT);
            $stmt->bindParam(':pid', $row['pid'], PDO::PARAM_INT);
            $stmt->bindParam(':cid', $row['cid'], PDO::PARAM_INT);
            $stmt->bindParam(':yearmonth', $row['yearmonth'], PDO::PARAM_STR);
            $stmt->bindParam(':adddate', $row['adddate'], PDO::PARAM_INT);
            $stmt->bindParam(':serviceid', $row['serviceid'], PDO::PARAM_INT);
            $stmt->bindParam(':exchangeid', $row['exchangeid'], PDO::PARAM_INT);
            $stmt->bindParam(':price_vi', $row['price_vi'], PDO::PARAM_STR);
            $stmt->bindParam(':price_en', $row['price_en'], PDO::PARAM_STR);
            $stmt->bindParam(':amount', $row['amount'], PDO::PARAM_STR);
            $stmt->bindParam(':total_vi', $row['total_vi'], PDO::PARAM_STR);
            $stmt->bindParam(':total_en', $row['total_en'], PDO::PARAM_STR);
            $stmt->bindParam(':note', $row['note'], PDO::PARAM_STR, strlen($row['note']));
            $stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);
            $stmt->bindParam(':update_date', $row['update_date'], PDO::PARAM_INT);
            $stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
            $stmt->bindParam(':crt_date', $row['crt_date'], PDO::PARAM_INT);
            $stmt->bindParam(':active', $row['active'], PDO::PARAM_INT);

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['id'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Debitnotemoney', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Debitnotemoney', 'ID: ' . $row['id'], $admin_info['userid']);
                }
                nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote_money WHERE id=' . $row['id'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
} else {
    $row['id'] = 0;
    $row['debitnoteid'] = 0;
    $row['pid'] = 0;
    $row['cid'] = 0;
    $row['yearmonth'] = '';
    $row['adddate'] = 0;
    $row['serviceid'] = 0;
    $row['exchangeid'] = 0;
    $row['price_vi'] = '';
    $row['price_en'] = '';
    $row['amount'] = '0';
    $row['total_vi'] = '';
    $row['total_en'] = '';
    $row['note'] = '';
    $row['userid_edit'] = 0;
    $row['update_date'] = 0;
    $row['adminid'] = 0;
    $row['crt_date'] = 0;
    $row['active'] = 0;
}

$row['note'] = nv_htmlspecialchars(nv_br2nl($row['note']));

$xtpl = new XTemplate('debitnotemoney.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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


if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['debitnotemoney'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
