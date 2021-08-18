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

if ($nv_Request->isset_request('get_alias_title', 'post')) {
    $alias = $nv_Request->get_title('get_alias_title', 'post', '');
    $alias = change_alias($alias);
    die($alias);
}

$row = array();
$error = array();
$row['pid'] = $nv_Request->get_int('pid', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $row['fid'] = $nv_Request->get_int('fid', 'post', 0);
    $row['title'] = $nv_Request->get_title('title', 'post', '');
    $row['alias'] = $nv_Request->get_title('alias', 'post', '');
    $row['alias'] = (empty($row['alias'])) ? change_alias($row['title']) : change_alias($row['alias']);
    $row['area'] = $nv_Request->get_title('area', 'post', '');
    $row['price_usd_min'] = $nv_Request->get_title('price_usd_min', 'post', '');
    $row['price_usd_max'] = $nv_Request->get_title('price_usd_max', 'post', '');
    $row['price_vnd_min'] = $nv_Request->get_title('price_vnd_min', 'post', '');
    $row['price_vnd_max'] = $nv_Request->get_title('price_vnd_max', 'post', '');
    $row['rent_status'] = $nv_Request->get_int('rent_status', 'post', 0);
    $row['image'] = $nv_Request->get_title('image', 'post', '');
    $row['note'] = $nv_Request->get_textarea('note', '', NV_ALLOWED_HTML_TAGS);
    $row['active'] = $nv_Request->get_int('active', 'post', 0);
    $row['adminid'] = $nv_Request->get_int('adminid', 'post', 0);
    $row['crtd_date'] = $nv_Request->get_int('crtd_date', 'post', 0);
    $row['userid_edit'] = $nv_Request->get_int('userid_edit', 'post', 0);

    if (empty($row['fid'])) {
        $error[] = $lang_module['error_required_fid'];
    } elseif (empty($row['title'])) {
        $error[] = $lang_module['error_required_title'];
    } elseif (empty($row['alias'])) {
        $error[] = $lang_module['error_required_alias'];
    }

    if (empty($error)) {
        try {
            if (empty($row['pid'])) {
                $row['update_date'] = 0;

                $stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_product (fid, title, alias, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, active, adminid, crtd_date, userid_edit, update_date) VALUES (:fid, :title, :alias, :area, :price_usd_min, :price_usd_max, :price_vnd_min, :price_vnd_max, :rent_status, :image, :note, :active, :adminid, :crtd_date, :userid_edit, :update_date)');

                $stmt->bindParam(':update_date', $row['update_date'], PDO::PARAM_INT);

            } else {
                $stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_product SET fid = :fid, title = :title, alias = :alias, area = :area, price_usd_min = :price_usd_min, price_usd_max = :price_usd_max, price_vnd_min = :price_vnd_min, price_vnd_max = :price_vnd_max, rent_status = :rent_status, image = :image, note = :note, active = :active, adminid = :adminid, crtd_date = :crtd_date, userid_edit = :userid_edit WHERE pid=' . $row['pid']);
            }
            $stmt->bindParam(':fid', $row['fid'], PDO::PARAM_INT);
            $stmt->bindParam(':title', $row['title'], PDO::PARAM_STR);
            $stmt->bindParam(':alias', $row['alias'], PDO::PARAM_STR);
            $stmt->bindParam(':area', $row['area'], PDO::PARAM_STR);
            $stmt->bindParam(':price_usd_min', $row['price_usd_min'], PDO::PARAM_STR);
            $stmt->bindParam(':price_usd_max', $row['price_usd_max'], PDO::PARAM_STR);
            $stmt->bindParam(':price_vnd_min', $row['price_vnd_min'], PDO::PARAM_STR);
            $stmt->bindParam(':price_vnd_max', $row['price_vnd_max'], PDO::PARAM_STR);
            $stmt->bindParam(':rent_status', $row['rent_status'], PDO::PARAM_INT);
            $stmt->bindParam(':image', $row['image'], PDO::PARAM_STR);
            $stmt->bindParam(':note', $row['note'], PDO::PARAM_STR, strlen($row['note']));
            $stmt->bindParam(':active', $row['active'], PDO::PARAM_INT);
            $stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
            $stmt->bindParam(':crtd_date', $row['crtd_date'], PDO::PARAM_INT);
            $stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['pid'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Product_alias', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Product_alias', 'ID: ' . $row['pid'], $admin_info['userid']);
                }
                nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['pid'] > 0) {
    $row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_product WHERE pid=' . $row['pid'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
} else {
    $row['pid'] = 0;
    $row['fid'] = 0;
    $row['title'] = '';
    $row['alias'] = '';
    $row['area'] = '';
    $row['price_usd_min'] = '';
    $row['price_usd_max'] = '';
    $row['price_vnd_min'] = '';
    $row['price_vnd_max'] = '';
    $row['rent_status'] = 0;
    $row['image'] = '';
    $row['note'] = '';
    $row['active'] = 0;
    $row['adminid'] = 0;
    $row['crtd_date'] = 0;
    $row['userid_edit'] = 0;
}

$row['note'] = nv_htmlspecialchars(nv_br2nl($row['note']));

$xtpl = new XTemplate('product_alias.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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
if (empty($row['pid'])) {
    $xtpl->parse('main.auto_get_alias');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['product_alias'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
