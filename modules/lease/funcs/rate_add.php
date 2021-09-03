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
    $row['mount'] = $nv_Request->get_title('mount', 'post', '');

    if (empty($row['mount'])) {
        $error[] = $lang_module['error_required_mount'];
    }

    if (empty($error)) {
        try {
            if (empty($row['id'])) {
                $row['exchange_rate'] = 0;

                $stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_exchange_rate (mount, exchange_rate) VALUES (:mount, :exchange_rate)');

                $stmt->bindParam(':exchange_rate', $row['exchange_rate'], PDO::PARAM_INT);

            } else {
                $stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_exchange_rate SET mount = :mount WHERE id=' . $row['id']);
            }
            $stmt->bindParam(':mount', $row['mount'], PDO::PARAM_STR);

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['id'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Rate_add', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Rate_add', 'ID: ' . $row['id'], $admin_info['userid']);
                }
                nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_exchange_rate WHERE id=' . $row['id'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
} else {
    $row['id'] = 0;
    $row['mount'] = '';
}

$array_mount = array();
$array_mount[01] = 'Tháng 1';
$array_mount[02] = 'Tháng 2';
$array_mount[03] = 'Tháng 3';
$array_mount[04] = 'Tháng 4';
$array_mount[05] = 'Tháng 5';
$array_mount[06] = 'Tháng 6';
$array_mount[07] = 'Tháng 7';
$array_mount[08] = 'Tháng 8';
$array_mount[09] = 'Tháng 9';
$array_mount[10] = 'Tháng 10';
$array_mount[11] = 'Tháng 11';
$array_mount[12] = 'Tháng 12';

$array_exchange_rate = array();
$array_exchange_rate[1970] = '1970';
$xtpl = new XTemplate('rate_add.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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


foreach ($array_mount as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'selected' => ($key == $row['mount']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_mount');
}

foreach ($array_exchange_rate as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'selected' => ($key == $row['exchange_rate']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_exchange_rate');
}

if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['rate_add'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
