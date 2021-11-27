<?php

/**
 * @Project NUKEVIET 4.x
 * @Author NVholding <contact@nvholding.vn>
 * @Copyright (C) 2021 NVholding. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Tue, 03 Aug 2021 12:28:23 GMT
 */

if (!defined('NV_IS_MOD_LEASE'))
    die('Stop!!!');

/**
 * nv_theme_lease_main()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_lease_main($array_data)
{
    global $module_info, $lang_module, $lang_global, $op;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    //------------------
    // Viết code vào đây
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_lease_floor()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_lease_floor($array_data)
{
    global $module_info, $lang_module, $lang_global, $op;

    $xtpl = new XTemplate('floor_add.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    //------------------
    // Viết code vào đây
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_lease_customer_groups()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_lease_customer_groups($array_data)
{
    global $module_info, $lang_module, $lang_global, $op;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    //------------------
    // Viết code vào đây
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_lease_customer()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_lease_customer($array_data)
{
    global $module_info, $lang_module, $lang_global, $op;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    //------------------
    // Viết code vào đây
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_lease_cat()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_lease_cat($array_data)
{
    global $module_info, $lang_module, $lang_global, $op;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    //------------------
    // Viết code vào đây
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_lease_charge()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_lease_charge($array_data)
{
    global $module_info, $lang_module, $lang_global, $op;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    //------------------
    // Viết code vào đây
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_lease_product()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_lease_product($array_data)
{
    global $module_info, $lang_module, $lang_global, $op;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    //------------------
    // Viết code vào đây
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_lease_permission()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_lease_permission($array_data)
{
    global $module_info, $lang_module, $lang_global, $op;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    //------------------
    // Viết code vào đây
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}

function send_mail($title,$my_sig,$my_mail,$mess,$row,$debitnoteextra,$company){
	global $global_config, $user_info,$module_info, $lang_module, $lang_global;
	$xtpl = new XTemplate('message.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	$xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
	$xtpl->assign('SITE_NAME', $company->vi_title);
	$xtpl->assign('SITE_SLOGAN', $global_config['site_description']);
	$xtpl->assign('SITE_EMAIL', $company->email);
	$xtpl->assign('SITE_FONE', $company->phone);
	$xtpl->assign('SITE_URL', $global_config['site_url']);
	$xtpl->assign('TITLE', $title);
	$xtpl->assign('CONTENT', $mess);
	$xtpl->assign('AUTHOR_SIG', $my_sig);
	$xtpl->assign('AUTHOR_NAME', $user_info['username']);
	$xtpl->assign('AUTHOR_POS', $user_info['position']);
	$xtpl->assign('AUTHOR_EMAIL', $my_mail);
	$xtpl->assign('ROW', $row);
		$total_vi = 0;
		$total_en = 0;
	foreach ($debitnoteextra as $r ){
		
		$r['service'] =  $array_sid_lease[$r['serviceid']]['title'];
		$r['datefrom'] =  date('d/m/Y', $r['datefrom']);
		$r['dateto'] =  date('d/m/Y', $r['dateto']);
		$total_vi += $r['total_vi'];
		$total_en += $r['total_en'];
		$xtpl->assign('DBN', $r);
		$xtpl->parse('main.service_vi');
		$xtpl->parse('main.service_en');
	}
	$xtpl->assign('total_vi', $total_vi);
	$xtpl->assign('total_en', $total_en);

	
	$xtpl->parse('main');
	return $xtpl->text('main');
}
function save_pdf_vi($debitnode){
	global $module_info,$global_config,$lang_module;
	$xtpl = new XTemplate('debitnote_pdf.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	
	$xtpl->assign('SITE_NAME', $global_config['site_name']);
	$xtpl->assign('SITE_SLOGAN', $global_config['site_description']);
	$xtpl->assign('SITE_EMAIL', $global_config['site_email']);
	$xtpl->assign('SITE_FONE', $global_config['site_phone']);
	$xtpl->assign('SITE_URL', $global_config['site_url']);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('ROW', $debitnode);
	foreach ($debitnode['data'] as $r){
		$xtpl->assign('DBN', $r);
			$xtpl->parse('main.vi.service_vi');
	}
	$xtpl->parse('main.vi');
	$xtpl->parse('main');
	return $xtpl->text('main');
}
function save_pdf_en($debitnode){
	global $module_info,$global_config,$lang_module;
	$xtpl = new XTemplate('debitnote_pdf.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	
	$xtpl->assign('SITE_NAME', $global_config['site_name']);
	$xtpl->assign('SITE_SLOGAN', $global_config['site_description']);
	$xtpl->assign('SITE_EMAIL', $global_config['site_email']);
	$xtpl->assign('SITE_FONE', $global_config['site_phone']);
	$xtpl->assign('SITE_URL', $global_config['site_url']);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('ROW', $debitnode);
	foreach ($debitnode['data'] as $r){
		$xtpl->assign('DBN', $r);
			$xtpl->parse('main.vi.service_vi');
	}
	$xtpl->parse('main.en');
	$xtpl->parse('main');
	return $xtpl->text('main');
}