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
	// Change status
	if ($nv_Request->isset_request('change_status', 'post, get')) {
		$pid = $nv_Request->get_int('pid', 'post, get', 0);
		$content = 'NO_' . $pid;

		$query = 'SELECT active FROM ' . NV_PREFIXLANG . '_' . $module_data . '_product WHERE pid=' . $pid;
		$row = $db->query($query)->fetch();
		if (isset($row['active']))     {
			$active = ($row['active']) ? 0 : 1;
			$query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_product SET active=' . intval($active) . ' WHERE pid=' . $pid;
			$db->query($query);
			$content = 'OK_' . $pid;
		}
		$nv_Cache->delMod($module_name);
		include NV_ROOTDIR . '/includes/header.php';
		echo $content;
		include NV_ROOTDIR . '/includes/footer.php';
	}

	if ($nv_Request->isset_request('ajax_action', 'post')) {
		$pid = $nv_Request->get_int('pid', 'post', 0);
		$new_vid = $nv_Request->get_int('new_vid', 'post', 0);
		$content = 'NO_' . $pid;
		if ($new_vid > 0)     {
			$sql = 'SELECT pid FROM ' . NV_PREFIXLANG . '_' . $module_data . '_product WHERE pid!=' . $pid . ' ORDER BY update_date ASC';
			$result = $db->query($sql);
			$update_date = 0;
			while ($row = $result->fetch())
			{
				++$update_date;
				if ($update_date == $new_vid) ++$update_date;             $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_product SET update_date=' . $update_date . ' WHERE pid=' . $row['pid'];
				$db->query($sql);
			}
			$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_product SET update_date=' . $new_vid . ' WHERE pid=' . $pid;
			$db->query($sql);
			$content = 'OK_' . $pid;
		}
		$nv_Cache->delMod($module_name);
		include NV_ROOTDIR . '/includes/header.php';
		echo $content;
		include NV_ROOTDIR . '/includes/footer.php';
	}

	if ($nv_Request->isset_request('delete_pid', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
		$pid = $nv_Request->get_int('delete_pid', 'get');
		$delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
		if ($pid > 0 and $delete_checkss == md5($pid . NV_CACHE_PREFIX . $client_info['session_id'])) {
			$update_date=0;
			$sql = 'SELECT update_date FROM ' . NV_PREFIXLANG . '_' . $module_data . '_product WHERE pid =' . $db->quote($pid);
			$result = $db->query($sql);
			list($update_date) = $result->fetch(3);
			
			$db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_product  WHERE pid = ' . $db->quote($pid));
			if ($update_date > 0)         {
				$sql = 'SELECT pid, update_date FROM ' . NV_PREFIXLANG . '_' . $module_data . '_product WHERE update_date >' . $update_date;
				$result = $db->query($sql);
				while (list($pid, $update_date) = $result->fetch(3))
				{
					$update_date--;
					$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_product SET update_date=' . $update_date . ' WHERE pid=' . intval($pid));
				}
			}
			$nv_Cache->delMod($module_name);
			nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Product', 'ID: ' . $pid, $admin_info['userid']);
			nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
		}
	}

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
		$row['note'] = $nv_Request->get_editor('note', '', NV_ALLOWED_HTML_TAGS);

		if (empty($row['fid'])) {
			$error[] = $lang_module['error_required_fid'];
		} elseif (empty($row['title'])) {
			$error[] = $lang_module['error_required_title'];
		} elseif (empty($row['area'])) {
			$error[] = $lang_module['error_required_area'];
		}

		if (empty($error)) {
			try {
				if (empty($row['pid'])) {
					$row['adminid'] = 0;
					$row['crtd_date'] = 0;
					$row['userid_edit'] = 0;

					$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_product (fid, title, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, active, adminid, crtd_date, userid_edit, update_date) VALUES (:fid, :title, :area, :price_usd_min, :price_usd_max, :price_vnd_min, :price_vnd_max, :rent_status, :image, :note, :active, :adminid, :crtd_date, :userid_edit, :update_date)');

					$stmt->bindValue(':active', 1, PDO::PARAM_INT);

					$stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
					$stmt->bindParam(':crtd_date', $row['crtd_date'], PDO::PARAM_INT);
					$stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);
					$weight = $db->query('SELECT max(update_date) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_product')->fetchColumn();
					$weight = intval($weight) + 1;
					$stmt->bindParam(':update_date', $weight, PDO::PARAM_INT);


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
						nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Product', ' ', $admin_info['userid']);
					} else {
						nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Product', 'ID: ' . $row['pid'], $admin_info['userid']);
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
		$row['area'] = '';
		$row['price_usd_min'] = '';
		$row['price_usd_max'] = '';
		$row['price_vnd_min'] = '';
		$row['price_vnd_max'] = '';
		$row['rent_status'] = 0;
		$row['image'] = '';
		$row['note'] = '';
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
			$db->where('fid LIKE :q_fid OR title LIKE :q_title OR area LIKE :q_area OR price_usd_min LIKE :q_price_usd_min OR price_usd_max LIKE :q_price_usd_max OR price_vnd_min LIKE :q_price_vnd_min OR price_vnd_max LIKE :q_price_vnd_max OR rent_status LIKE :q_rent_status');
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
		}
		$sth->execute();
	}

	$xtpl = new XTemplate('product.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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
	$xtpl->assign('Q', $q);

	if ($show_view) {
		$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
		if (!empty($q)) {
			$base_url .= '&q=' . $q;
		}
		$generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);
		if (!empty($generate_page)) {
			$xtpl->assign('NV_GENERATE_PAGE', $generate_page);
			$xtpl->parse('main.view.generate_page');
		}
		$number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
		while ($view = $sth->fetch()) {
			for($i = 1; $i <= $num_items; ++$i) {
				$xtpl->assign('WEIGHT', array(
					'key' => $i,
					'title' => $i,
					'selected' => ($i == $view['update_date']) ? ' selected="selected"' : ''));
				$xtpl->parse('main.view.loop.update_date_loop');
			}
			$xtpl->assign('CHECK', $view['active'] == 1 ? 'checked' : '');
			$view['fid'] = $array_fid_lease[$view['fid']]['title'];
			$view['rent_status'] = $array_rent_status_lease[$view['rent_status']]['decription'];
			$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=product_add&amp;pid=' . $view['pid'];
			$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_pid=' . $view['pid'] . '&amp;delete_checkss=' . md5($view['pid'] . NV_CACHE_PREFIX . $client_info['session_id']);
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

	$page_title = $lang_module['product'];

	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}