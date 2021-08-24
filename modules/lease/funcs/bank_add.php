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
    $row['companyid'] = $nv_Request->get_int('companyid', 'post', 0);
    $row['vi_bank_number'] = $nv_Request->get_title('vi_bank_number', 'post', '');
    $row['en_bank_number'] = $nv_Request->get_title('en_bank_number', 'post', '');
    $row['vi_bank_account_holder'] = $nv_Request->get_title('vi_bank_account_holder', 'post', '');
    $row['en_bank_account_holder'] = $nv_Request->get_title('en_bank_account_holder', 'post', '');
    $row['vi_bank_name'] = $nv_Request->get_title('vi_bank_name', 'post', '');
    $row['en_bank_name'] = $nv_Request->get_title('en_bank_name', 'post', '');
    $row['vi_address'] = $nv_Request->get_title('vi_address', 'post', '');
    $row['en_address'] = $nv_Request->get_title('en_address', 'post', '');
    $row['swiftcode'] = $nv_Request->get_int('swiftcode', 'post', 0);

    if (empty($error)) {
        try {
            if (empty($row['id'])) {
                $row['active'] = 0;
                $row['adminid'] = 0;
                $row['crtd_date'] = 0;
                $row['weight'] = 0;
                $row['sort'] = 0;
                $row['userid_edit'] = 0;
                $row['update_date'] = 0;

                $stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_bank (companyid, vi_bank_number, en_bank_number, vi_bank_account_holder, en_bank_account_holder, vi_bank_name, en_bank_name, vi_address, en_address, swiftcode, active, adminid, crtd_date, weight, sort, userid_edit, update_date) VALUES (:companyid, :vi_bank_number, :en_bank_number, :vi_bank_account_holder, :en_bank_account_holder, :vi_bank_name, :en_bank_name, :vi_address, :en_address, :swiftcode, :active, :adminid, :crtd_date, :weight, :sort, :userid_edit, :update_date)');

                $stmt->bindParam(':active', $row['active'], PDO::PARAM_INT);
                $stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
                $stmt->bindParam(':crtd_date', $row['crtd_date'], PDO::PARAM_INT);
                $stmt->bindParam(':weight', $row['weight'], PDO::PARAM_INT);
                $stmt->bindParam(':sort', $row['sort'], PDO::PARAM_INT);
                $stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);
                $stmt->bindParam(':update_date', $row['update_date'], PDO::PARAM_INT);

            } else {
                $stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_bank SET companyid = :companyid, vi_bank_number = :vi_bank_number, en_bank_number = :en_bank_number, vi_bank_account_holder = :vi_bank_account_holder, en_bank_account_holder = :en_bank_account_holder, vi_bank_name = :vi_bank_name, en_bank_name = :en_bank_name, vi_address = :vi_address, en_address = :en_address, swiftcode = :swiftcode WHERE id=' . $row['id']);
            }
            $stmt->bindParam(':companyid', $row['companyid'], PDO::PARAM_INT);
            $stmt->bindParam(':vi_bank_number', $row['vi_bank_number'], PDO::PARAM_STR);
            $stmt->bindParam(':en_bank_number', $row['en_bank_number'], PDO::PARAM_STR);
            $stmt->bindParam(':vi_bank_account_holder', $row['vi_bank_account_holder'], PDO::PARAM_STR);
            $stmt->bindParam(':en_bank_account_holder', $row['en_bank_account_holder'], PDO::PARAM_STR);
            $stmt->bindParam(':vi_bank_name', $row['vi_bank_name'], PDO::PARAM_STR);
            $stmt->bindParam(':en_bank_name', $row['en_bank_name'], PDO::PARAM_STR);
            $stmt->bindParam(':vi_address', $row['vi_address'], PDO::PARAM_STR);
            $stmt->bindParam(':en_address', $row['en_address'], PDO::PARAM_STR);
            $stmt->bindParam(':swiftcode', $row['swiftcode'], PDO::PARAM_INT);

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['id'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Bank_add', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Bank_add', 'ID: ' . $row['id'], $admin_info['userid']);
                }
                nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_bank WHERE id=' . $row['id'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
} else {
    $row['id'] = 0;
    $row['companyid'] = 0;
    $row['vi_bank_number'] = '';
    $row['en_bank_number'] = '';
    $row['vi_bank_account_holder'] = '';
    $row['en_bank_account_holder'] = '';
    $row['vi_bank_name'] = '';
    $row['en_bank_name'] = '';
    $row['vi_address'] = '';
    $row['en_address'] = '';
    $row['swiftcode'] = 0;
}
$array_companyid_lease = array();
$_sql = 'SELECT cid,vi_title FROM vidoco_vi_lease_company';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_companyid_lease[$_row['cid']] = $_row;
}

$xtpl = new XTemplate('bank_add.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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

foreach ($array_companyid_lease as $value) {
    $xtpl->assign('OPTION', array(
        'key' => $value['cid'],
        'title' => $value['vi_title'],
        'selected' => ($value['cid'] == $row['companyid']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_companyid');
}

if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['bank_add'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
