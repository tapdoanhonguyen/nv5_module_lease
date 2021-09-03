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
$row['cid'] = $nv_Request->get_int('cid', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $row['vi_title'] = $nv_Request->get_title('vi_title', 'post', '');
    $row['en_title'] = $nv_Request->get_title('en_title', 'post', '');
    $row['vi_address'] = $nv_Request->get_title('vi_address', 'post', '');
    $row['en_address'] = $nv_Request->get_title('en_address', 'post', '');
    $row['vi_province'] = $nv_Request->get_title('vi_province', 'post', '');
    $row['en_province'] = $nv_Request->get_title('en_province', 'post', '');
    $row['phone'] = $nv_Request->get_title('phone', 'post', '');
    $row['fax'] = $nv_Request->get_title('fax', 'post', '');
    $row['email'] = $nv_Request->get_title('email', 'post', '');

    if (empty($row['vi_title'])) {
        $error[] = $lang_module['error_required_vi_title'];
    } elseif (empty($row['en_title'])) {
        $error[] = $lang_module['error_required_en_title'];
    } elseif (empty($row['vi_address'])) {
        $error[] = $lang_module['error_required_vi_address'];
    } elseif (empty($row['en_address'])) {
        $error[] = $lang_module['error_required_en_address'];
    } elseif (empty($row['vi_province'])) {
        $error[] = $lang_module['error_required_vi_province'];
    } elseif (empty($row['en_province'])) {
        $error[] = $lang_module['error_required_en_province'];
    } elseif (empty($row['phone'])) {
        $error[] = $lang_module['error_required_phone'];
    } elseif (empty($row['fax'])) {
        $error[] = $lang_module['error_required_fax'];
    }

    if (empty($error)) {
        try {
            if (empty($row['cid'])) {
                $row['active'] = 0;
                $row['weight'] = 0;
                $row['adminid'] = 0;
                $row['crt_date'] = 0;
                $row['userid_edit'] = 0;
                $row['update_date'] = 0;

                $stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_company (vi_title, en_title, vi_address, en_address, vi_province, en_province, phone, fax, email, active, weight, adminid, crt_date, userid_edit, update_date) VALUES (:vi_title, :en_title, :vi_address, :en_address, :vi_province, :en_province, :phone, :fax, :email, :active, :weight, :adminid, :crt_date, :userid_edit, :update_date)');

                $stmt->bindParam(':active', $row['active'], PDO::PARAM_INT);
                $stmt->bindParam(':weight', $row['weight'], PDO::PARAM_INT);
                $stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
                $stmt->bindParam(':crt_date', $row['crt_date'], PDO::PARAM_INT);
                $stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);
                $stmt->bindParam(':update_date', $row['update_date'], PDO::PARAM_INT);

            } else {
                $stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_company SET vi_title = :vi_title, en_title = :en_title, vi_address = :vi_address, en_address = :en_address, vi_province = :vi_province, en_province = :en_province, phone = :phone, fax = :fax, email = :email WHERE cid=' . $row['cid']);
            }
            $stmt->bindParam(':vi_title', $row['vi_title'], PDO::PARAM_STR);
            $stmt->bindParam(':en_title', $row['en_title'], PDO::PARAM_STR);
            $stmt->bindParam(':vi_address', $row['vi_address'], PDO::PARAM_STR);
            $stmt->bindParam(':en_address', $row['en_address'], PDO::PARAM_STR);
            $stmt->bindParam(':vi_province', $row['vi_province'], PDO::PARAM_STR);
            $stmt->bindParam(':en_province', $row['en_province'], PDO::PARAM_STR);
            $stmt->bindParam(':phone', $row['phone'], PDO::PARAM_STR);
            $stmt->bindParam(':fax', $row['fax'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $row['email'], PDO::PARAM_STR);

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['cid'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Company_add', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Company_add', 'ID: ' . $row['cid'], $admin_info['userid']);
                }
                nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['cid'] > 0) {
    $row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_company WHERE cid=' . $row['cid'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
} else {
    $row['cid'] = 0;
    $row['vi_title'] = '';
    $row['en_title'] = '';
    $row['vi_address'] = '';
    $row['en_address'] = '';
    $row['vi_province'] = '';
    $row['en_province'] = '';
    $row['phone'] = '';
    $row['fax'] = '';
    $row['email'] = '';
}
$xtpl = new XTemplate('company_add.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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

$page_title = $lang_module['company_add'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
