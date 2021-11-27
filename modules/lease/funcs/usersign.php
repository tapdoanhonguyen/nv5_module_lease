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
if(defined('NV_IS_USER')){
	$row = array();
	$error = array();
	$row['userid'] = $user_info['userid'];
	if ($nv_Request->isset_request('submit', 'post')) {
		$row['sign_vi'] = $nv_Request->get_title('sign_vi', 'post', '');
		$row['image_sign_vi'] = $nv_Request->get_title('image_sign_vi', 'post', '');
		$row['sign_en'] = $nv_Request->get_title('sign_en', 'post', '');
		$row['image_sign_en'] = $nv_Request->get_title('image_sign_en', 'post', '');

		if (empty($error)) {
			try {
				if (empty($row['userid'])) {
					$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_sign (userid, sign_vi, image_sign_vi, sign_en, image_sign_en) VALUES (:sign_vi, :image_sign_vi, :sign_en, :image_sign_en)');
				} else {
					$stmt = $db->prepare('REPLACE INTO ' . NV_PREFIXLANG . '_' . $module_data . '_sign (userid, sign_vi, image_sign_vi, sign_en, image_sign_en) VALUES (' . $row['userid'] . ', :sign_vi, :image_sign_vi, :sign_en, :image_sign_en)');
				}
				$stmt->bindParam(':sign_vi', $row['sign_vi'], PDO::PARAM_STR);
				$stmt->bindParam(':image_sign_vi', $row['image_sign_vi'], PDO::PARAM_STR);
				$stmt->bindParam(':sign_en', $row['sign_en'], PDO::PARAM_STR);
				$stmt->bindParam(':image_sign_en', $row['image_sign_en'], PDO::PARAM_STR);

				$exc = $stmt->execute();
				if ($exc) {
					$nv_Cache->delMod($module_name);
					if (empty($row['userid'])) {
						nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Usersign', ' ', $user_info['userid']);
					} else {
						nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Usersign', 'ID: ' . $row['userid'], $user_info['userid']);
					}
					nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
				}
			} catch(PDOException $e) {
				trigger_error($e->getMessage());
				die($e->getMessage()); //Remove this line after checks finished
			}
		}
	} elseif ($row['userid'] > 0) {
		 $row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_sign WHERE userid=' . $row['userid'])->fetch();
		 
	}
	$xtpl = new XTemplate('usersign.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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

	$page_title = $lang_module['usersign'];

	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}