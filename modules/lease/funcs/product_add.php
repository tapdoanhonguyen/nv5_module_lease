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
	$row['pid'] = $nv_Request->get_int('pid', 'post,get', 0);
	if ($nv_Request->isset_request('submit', 'post')) {
		$row['fid'] = $nv_Request->get_int('fid', 'post', 0);
		$row['title'] = $nv_Request->get_title('title', 'post', '');
		$row['area'] = $nv_Request->get_title('area', 'post', '');
		$row['price_usd_min'] = $nv_Request->get_title('price_usd_min', 'post', '');
		$row['price_usd_max'] = $nv_Request->get_title('price_usd_max', 'post', '');
		$row['price_vnd_min'] = $nv_Request->get_title('price_vnd_min', 'post', '');
		$row['price_vnd_max'] = $nv_Request->get_title('price_vnd_max', 'post', '');
		$row['rent_status'] = $nv_Request->get_int('rent_status', 'post', 0);
		$row['image'] = $nv_Request->get_title('image', 'post', '');
		if (is_file(NV_DOCUMENT_ROOT . $row['image']))     {
			$row['image'] = substr($row['image'], strlen(NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/'));
		} else {
			$row['image'] = '';
		}
		$row['note'] = $nv_Request->get_editor('note', '', NV_ALLOWED_HTML_TAGS);

		if (empty($row['fid'])) {
			$error[] = $lang_module['error_required_fid'];
		} elseif (empty($row['title'])) {
			$error[] = $lang_module['error_required_title'];
		} elseif (empty($row['area'])) {
			$error[] = $lang_module['error_required_area'];
		} elseif (empty($row['price_usd_min'])) {
			$error[] = $lang_module['error_required_price_usd_min'];
		} elseif (empty($row['price_usd_max'])) {
			$error[] = $lang_module['error_required_price_usd_max'];
		} elseif (empty($row['price_vnd_min'])) {
			$error[] = $lang_module['error_required_price_vnd_min'];
		} elseif (empty($row['price_vnd_max'])) {
			$error[] = $lang_module['error_required_price_vnd_max'];
		} elseif (empty($row['rent_status'])) {
			$error[] = $lang_module['error_required_rent_status'];
		}

		if (empty($error)) {
			try {
				if (empty($row['pid'])) {
					$row['active'] = 0;
					$row['adminid'] = 0;
					$row['crtd_date'] = 0;
					$row['userid_edit'] = 0;
					$row['update_date'] = 0;

					$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_product (fid, title, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, active, adminid, crtd_date, userid_edit, update_date) VALUES (:fid, :title, :area, :price_usd_min, :price_usd_max, :price_vnd_min, :price_vnd_max, :rent_status, :image, :note, :active, :adminid, :crtd_date, :userid_edit, :update_date)');

					$stmt->bindParam(':active', $row['active'], PDO::PARAM_INT);
					$stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
					$stmt->bindParam(':crtd_date', $row['crtd_date'], PDO::PARAM_INT);
					$stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);
					$stmt->bindParam(':update_date', $row['update_date'], PDO::PARAM_INT);

				} else {
					$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_product SET fid = :fid, title = :title, area = :area, price_usd_min = :price_usd_min, price_usd_max = :price_usd_max, price_vnd_min = :price_vnd_min, price_vnd_max = :price_vnd_max, rent_status = :rent_status, image = :image, note = :note WHERE pid=' . $row['pid']);
				}
				$stmt->bindParam(':fid', $row['fid'], PDO::PARAM_INT);
				$stmt->bindParam(':title', $row['title'], PDO::PARAM_STR);
				$stmt->bindParam(':area', $row['area'], PDO::PARAM_STR);
				$stmt->bindParam(':price_usd_min', $row['price_usd_min'], PDO::PARAM_STR);
				$stmt->bindParam(':price_usd_max', $row['price_usd_max'], PDO::PARAM_STR);
				$stmt->bindParam(':price_vnd_min', $row['price_vnd_min'], PDO::PARAM_STR);
				$stmt->bindParam(':price_vnd_max', $row['price_vnd_max'], PDO::PARAM_STR);
				$stmt->bindParam(':rent_status', $row['rent_status'], PDO::PARAM_INT);
				$stmt->bindParam(':image', $row['image'], PDO::PARAM_STR);
				$stmt->bindParam(':note', $row['note'], PDO::PARAM_STR, strlen($row['note']));

				$exc = $stmt->execute();
				if ($exc) {
					$nv_Cache->delMod($module_name);
					if (empty($row['pid'])) {
						nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Product_add', ' ', $admin_info['userid']);
					} else {
						nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Product_add', 'ID: ' . $row['pid'], $admin_info['userid']);
					}
					nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=product');
				}
			} catch(PDOException $e) {
				trigger_error($e->getMessage());
				die($e->getMessage()); //Remove this line after checks finished
			}
		}
	} elseif ($row['pid'] > 0) {
		$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_product WHERE pid=' . $row['pid'])->fetch();
		if (empty($row)) {
			nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=product');
		}
	} else {
		$row['pid'] = 0;
		$row['fid'] = 0;
		$row['title'] = '';
		$row['area'] = '';
		$row['price_usd_min'] = '';
		$row['price_usd_max'] = '';
		$row['price_vnd_min'] = '';
		$row['price_vnd_max'] = '';
		$row['rent_status'] = 0;
		$row['image'] = '';
		$row['note'] = '';
	}
	if (!empty($row['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $row['image'])) {
		$row['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $row['image'];
	}
	/**
	 * nv_module_aleditor()
	 *
	 * @param mixed $textareaname
	 * @param string $width
	 * @param string $height
	 * @param string $val
	 * @return
	 */
	function nv_module_aleditor($textareaname, $width = '100%', $height = '450px', $val = '')
	{
		global $global_config, $module_data;

		$return = '';
		if (!defined('CKEDITOR')) {
			define('CKEDITOR', true);
			$return .= '<script type="text/javascript" src="' . NV_BASE_SITEURL . NV_EDITORSDIR . '/ckeditor/ckeditor.js?t=' . $global_config['timestamp'] . '"></script>';
			$return .= '<script type="text/javascript">CKEDITOR.timestamp=CKEDITOR.timestamp+' . $global_config['timestamp'] . ';</script>';
		}

		$return .= '<textarea class="form-control" style="width: ' . $width . '; height:' . $height . ';" id="' . $module_data . '_' . $textareaname . '" name="' . $textareaname . '">' . $val . '</textarea>';
		$return .= "<script type=\"text/javascript\">CKEDITOR.replace('" . $module_data . "_" . $textareaname . "', {
		removePlugins: 'uploadfile,uploadimage,autosave',
		contentsCss: '" . NV_BASE_SITEURL . NV_EDITORSDIR . "/ckeditor/nv.css?t=" . $global_config['timestamp'] . "'
		});</script>";

		return $return;
	}

	$row['note'] = nv_htmlspecialchars(nv_editor_br2nl($row['note']));
	$row['note'] = nv_module_aleditor('note', '100%', '300px', $row['note']);
	$array_fid_lease = array();
	$_sql = 'SELECT fid,title FROM vidoco_vi_lease_floor';
	$_query = $db->query($_sql);
	while ($_row = $_query->fetch()) {
		$array_fid_lease[$_row['fid']] = $_row;
	}

	$array_rent_status_lease = array();
	$_sql = 'SELECT rid,decription FROM vidoco_vi_lease_rent_status';
	$_query = $db->query($_sql);
	while ($_row = $_query->fetch()) {
		$array_rent_status_lease[$_row['rid']] = $_row;
	}

	$xtpl = new XTemplate('product_add.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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

	foreach ($array_fid_lease as $value) {
		$xtpl->assign('OPTION', array(
			'key' => $value['fid'],
			'title' => $value['title'],
			'selected' => ($value['fid'] == $row['fid']) ? ' selected="selected"' : ''
		));
		$xtpl->parse('main.select_fid');
	}
	foreach ($array_rent_status_lease as $value) {
		$xtpl->assign('OPTION', array(
			'key' => $value['rid'],
			'title' => $value['decription'],
			'selected' => ($value['rid'] == $row['rent_status']) ? ' selected="selected"' : ''
		));
		$xtpl->parse('main.select_rent_status');
	}

	if (!empty($error)) {
		$xtpl->assign('ERROR', implode('<br />', $error));
		$xtpl->parse('main.error');
	}

	$xtpl->parse('main');
	$contents = $xtpl->text('main');

	$page_title = $lang_module['product_add'];

	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}