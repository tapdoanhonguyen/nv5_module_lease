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

$q = $nv_Request->get_title('q', 'post,get');

// Fetch Limit
$show_view = false;
if (!$nv_Request->isset_request('id', 'post,get')) {
    $show_view = true;
    $per_page = 20;
    $page = $nv_Request->get_int('page', 'post,get', 1);
    $db->sqlreset()
        ->select('COUNT(*)')
        ->from('' . NV_PREFIXLANG . '_' . $module_data . '_product');

    if (!empty($q)) {
        $db->where('fid LIKE :q_fid OR title LIKE :q_title OR area LIKE :q_area OR price_usd_min LIKE :q_price_usd_min OR price_usd_max LIKE :q_price_usd_max OR price_vnd_min LIKE :q_price_vnd_min OR price_vnd_max LIKE :q_price_vnd_max OR rent_status LIKE :q_rent_status OR image LIKE :q_image OR note LIKE :q_note OR active LIKE :q_active OR adminid LIKE :q_adminid OR crtd_date LIKE :q_crtd_date OR userid_edit LIKE :q_userid_edit');
    }
    $sth = $db->prepare($db->sql());

    if (!empty($q)) {
        $sth->bindValue(':q_fid', '%' . $q . '%');
        $sth->bindValue(':q_title', '%' . $q . '%');
        $sth->bindValue(':q_area', '%' . $q . '%');
        $sth->bindValue(':q_price_usd_min', '%' . $q . '%');
        $sth->bindValue(':q_price_usd_max', '%' . $q . '%');
        $sth->bindValue(':q_price_vnd_min', '%' . $q . '%');
        $sth->bindValue(':q_price_vnd_max', '%' . $q . '%');
        $sth->bindValue(':q_rent_status', '%' . $q . '%');
        $sth->bindValue(':q_image', '%' . $q . '%');
        $sth->bindValue(':q_note', '%' . $q . '%');
        $sth->bindValue(':q_active', '%' . $q . '%');
        $sth->bindValue(':q_adminid', '%' . $q . '%');
        $sth->bindValue(':q_crtd_date', '%' . $q . '%');
        $sth->bindValue(':q_userid_edit', '%' . $q . '%');
    }
    $sth->execute();
    $num_items = $sth->fetchColumn();

    $db->select('*')
        ->order('update_date ASC')
        ->limit($per_page)
        ->offset(($page - 1) * $per_page);
    $sth = $db->prepare($db->sql());

    if (!empty($q)) {
        $sth->bindValue(':q_fid', '%' . $q . '%');
        $sth->bindValue(':q_title', '%' . $q . '%');
        $sth->bindValue(':q_area', '%' . $q . '%');
        $sth->bindValue(':q_price_usd_min', '%' . $q . '%');
        $sth->bindValue(':q_price_usd_max', '%' . $q . '%');
        $sth->bindValue(':q_price_vnd_min', '%' . $q . '%');
        $sth->bindValue(':q_price_vnd_max', '%' . $q . '%');
        $sth->bindValue(':q_rent_status', '%' . $q . '%');
        $sth->bindValue(':q_image', '%' . $q . '%');
        $sth->bindValue(':q_note', '%' . $q . '%');
        $sth->bindValue(':q_active', '%' . $q . '%');
        $sth->bindValue(':q_adminid', '%' . $q . '%');
        $sth->bindValue(':q_crtd_date', '%' . $q . '%');
        $sth->bindValue(':q_userid_edit', '%' . $q . '%');
    }
    $sth->execute();
}

$xtpl = new XTemplate('product_export.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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
	$xtpl->assign('PRODUCT_IMPORT', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=product_import'),true);
	$xtpl->assign('PRODUCT_EXPORT', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=product_export',true));

$xtpl->assign('Q', $q);

if ($show_view) {
    $base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
    if (!empty($q)) {
        $base_url .= '&q=' . $q;
    }
    
    while ($view = $sth->fetch()) {
        
        $xtpl->assign('VIEW', $view);
        $xtpl->parse('main.view.loop');
    }
    $xtpl->parse('main.view');
}


if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['product_export'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
