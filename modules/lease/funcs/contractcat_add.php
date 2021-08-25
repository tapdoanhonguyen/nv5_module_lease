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
$row['ciđ'] = $nv_Request->get_int('ciđ', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $row['parentid'] = $nv_Request->get_int('parentid', 'post', 0);
    $row['title'] = $nv_Request->get_title('title', 'post', '');

    if (empty($row['parentid'])) {
        $error[] = $lang_module['error_required_parentid'];
    } elseif (empty($row['title'])) {
        $error[] = $lang_module['error_required_title'];
    }

    if (empty($error)) {
        try {
            if (empty($row['ciđ'])) {
                $row['active'] = 0;
                $row['weight'] = 0;
                $row['sort'] = 0;
                $row['lev'] = 0;
                $row['adminid'] = 0;
                $row['addtime'] = 0;

                $stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_contract_cat (parentid, title, active, weight, sort, lev, adminid, addtime) VALUES (:parentid, :title, :active, :weight, :sort, :lev, :adminid, :addtime)');

                $stmt->bindParam(':active', $row['active'], PDO::PARAM_INT);
                $stmt->bindParam(':weight', $row['weight'], PDO::PARAM_INT);
                $stmt->bindParam(':sort', $row['sort'], PDO::PARAM_INT);
                $stmt->bindParam(':lev', $row['lev'], PDO::PARAM_INT);
                $stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
                $stmt->bindParam(':addtime', $row['addtime'], PDO::PARAM_INT);

            } else {
                $stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_contract_cat SET parentid = :parentid, title = :title WHERE ciđ=' . $row['ciđ']);
            }
            $stmt->bindParam(':parentid', $row['parentid'], PDO::PARAM_INT);
            $stmt->bindParam(':title', $row['title'], PDO::PARAM_STR);

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['ciđ'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Contractcat_add', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Contractcat_add', 'ID: ' . $row['ciđ'], $admin_info['userid']);
                }
                nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['ciđ'] > 0) {
    $row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract_cat WHERE ciđ=' . $row['ciđ'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
} else {
    $row['ciđ'] = 0;
    $row['parentid'] = 0;
    $row['title'] = '';
}
$array_parentid_lease = array();
$_sql = 'SELECT ciđ,title FROM vidoco_vi_lease_contract_cat';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_parentid_lease[$_row['ciđ']] = $_row;
}

$xtpl = new XTemplate('contractcat_add.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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

foreach ($array_parentid_lease as $value) {
    $xtpl->assign('OPTION', array(
        'key' => $value['ciđ'],
        'title' => $value['title'],
        'selected' => ($value['ciđ'] == $row['parentid']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_parentid');
}

if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['contractcat_add'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
