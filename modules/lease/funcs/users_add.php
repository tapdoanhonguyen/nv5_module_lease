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
$row['companyid'] = $nv_Request->get_int('companyid', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $row['userid'] = $nv_Request->get_int('userid', 'post', 0);

    if (empty($error)) {
        try {
            if (empty($row['companyid'])) {
                $row['weight'] = 0;
                $row['active'] = 0;

                $stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_company_users (userid, companyid, weight, active) VALUES (:userid, :weight, :active)');

                $stmt->bindParam(':weight', $row['weight'], PDO::PARAM_INT);
                $stmt->bindParam(':active', $row['active'], PDO::PARAM_INT);

            } else {
                $stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_company_users SET userid = :userid WHERE companyid=' . $row['companyid']);
            }
            $stmt->bindParam(':userid', $row['userid'], PDO::PARAM_INT);

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['companyid'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Users_add', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Users_add', 'ID: ' . $row['companyid'], $admin_info['userid']);
                }
                nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['companyid'] > 0) {
    $row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_company_users WHERE companyid=' . $row['companyid'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
} else {
    $row['userid'] = 0;
    $row['companyid'] = 0;
}
$array_userid_users = array();
$_sql = 'SELECT userid,username FROM vidoco_users';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_userid_users[$_row['userid']] = $_row;
}

$array_companyid_lease = array();
$_sql = 'SELECT cid,vi_title FROM vidoco_vi_lease_company';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_companyid_lease[$_row['cid']] = $_row;
}

$xtpl = new XTemplate('users_add.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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

foreach ($array_userid_users as $value) {
    $xtpl->assign('OPTION', array(
        'key' => $value['userid'],
        'title' => $value['username'],
        'selected' => ($value['userid'] == $row['userid']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_userid');
}
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

$page_title = $lang_module['users_add'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
