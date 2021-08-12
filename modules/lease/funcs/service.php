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
		$sid = $nv_Request->get_int('sid', 'post, get', 0);
		$content = 'NO_' . $sid;

		$query = 'SELECT active FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service WHERE sid=' . $sid;
		$row = $db->query($query)->fetch();
		if (isset($row['active']))     {
			$active = ($row['active']) ? 0 : 1;
			$query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service SET active=' . intval($active) . ' WHERE sid=' . $sid;
			$db->query($query);
			$content = 'OK_' . $sid;
		}
		$nv_Cache->delMod($module_name);
		include NV_ROOTDIR . '/includes/header.php';
		echo $content;
		include NV_ROOTDIR . '/includes/footer.php';
	}

	if ($nv_Request->isset_request('ajax_action', 'post')) {
		$sid = $nv_Request->get_int('sid', 'post', 0);
		$new_vid = $nv_Request->get_int('new_vid', 'post', 0);
		$content = 'NO_' . $sid;
		if ($new_vid > 0)     {
			$sql = 'SELECT sid FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service WHERE sid!=' . $sid . ' ORDER BY update_time ASC';
			$result = $db->query($sql);
			$update_time = 0;
			while ($row = $result->fetch())
			{
				++$update_time;
				if ($update_time == $new_vid) ++$update_time;             $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service SET update_time=' . $update_time . ' WHERE sid=' . $row['sid'];
				$db->query($sql);
			}
			$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service SET update_time=' . $new_vid . ' WHERE sid=' . $sid;
			$db->query($sql);
			$content = 'OK_' . $sid;
		}
		$nv_Cache->delMod($module_name);
		include NV_ROOTDIR . '/includes/header.php';
		echo $content;
		include NV_ROOTDIR . '/includes/footer.php';
	}

	if ($nv_Request->isset_request('delete_sid', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
		$sid = $nv_Request->get_int('delete_sid', 'get');
		$delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
		if ($sid > 0 and $delete_checkss == md5($sid . NV_CACHE_PREFIX . $client_info['session_id'])) {
			$update_time=0;
			$sql = 'SELECT update_time FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service WHERE sid =' . $db->quote($sid);
			$result = $db->query($sql);
			list($update_time) = $result->fetch(3);
			
			$db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service  WHERE sid = ' . $db->quote($sid));
			if ($update_time > 0)         {
				$sql = 'SELECT sid, update_time FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service WHERE update_time >' . $update_time;
				$result = $db->query($sql);
				while (list($sid, $update_time) = $result->fetch(3))
				{
					$update_time--;
					$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service SET update_time=' . $update_time . ' WHERE sid=' . intval($sid));
				}
			}
			$nv_Cache->delMod($module_name);
			nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Service', 'ID: ' . $sid, $admin_info['userid']);
			nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
		}
	}

	$row = array();
	$error = array();
	$row['sid'] = $nv_Request->get_int('sid', 'post,get', 0);
	if ($nv_Request->isset_request('submit', 'post')) {
		$row['title'] = $nv_Request->get_title('title', 'post', '');
		$row['catid'] = $nv_Request->get_int('catid', 'post', 0);
		$row['unitid'] = $nv_Request->get_int('unitid', 'post', 0);
		$row['price_usd'] = $nv_Request->get_title('price_usd', 'post', '');
		$row['price_vnd'] = $nv_Request->get_title('price_vnd', 'post', '');
		$row['chargeid'] = $nv_Request->get_int('chargeid', 'post', 0);
		$row['note'] = $nv_Request->get_editor('note', '', NV_ALLOWED_HTML_TAGS);

		if (empty($row['title'])) {
			$error[] = $lang_module['error_required_title'];
		} elseif (empty($row['catid'])) {
			$error[] = $lang_module['error_required_catid'];
		} elseif (empty($row['unitid'])) {
			$error[] = $lang_module['error_required_unitid'];
		} elseif (empty($row['chargeid'])) {
			$error[] = $lang_module['error_required_chargeid'];
		}

		if (empty($error)) {
			try {
				if (empty($row['sid'])) {
					$row['adminid'] = 0;
					$row['crtd_date'] = 0;
					$row['userid_edit'] = 0;

					$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_service (title, catid, unitid, price_usd, price_vnd, chargeid, note, active, adminid, crtd_date, userid_edit, update_time) VALUES (:title, :catid, :unitid, :price_usd, :price_vnd, :chargeid, :note, :active, :adminid, :crtd_date, :userid_edit, :update_time)');

					$stmt->bindValue(':active', 1, PDO::PARAM_INT);

					$stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
					$stmt->bindParam(':crtd_date', $row['crtd_date'], PDO::PARAM_INT);
					$stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);
					$weight = $db->query('SELECT max(update_time) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service')->fetchColumn();
					$weight = intval($weight) + 1;
					$stmt->bindParam(':update_time', $weight, PDO::PARAM_INT);


				} else {
					$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service SET title = :title, catid = :catid, unitid = :unitid, price_usd = :price_usd, price_vnd = :price_vnd, chargeid = :chargeid, note = :note WHERE sid=' . $row['sid']);
				}
				$stmt->bindParam(':title', $row['title'], PDO::PARAM_STR);
				$stmt->bindParam(':catid', $row['catid'], PDO::PARAM_INT);
				$stmt->bindParam(':unitid', $row['unitid'], PDO::PARAM_INT);
				$stmt->bindParam(':price_usd', $row['price_usd'], PDO::PARAM_STR);
				$stmt->bindParam(':price_vnd', $row['price_vnd'], PDO::PARAM_STR);
				$stmt->bindParam(':chargeid', $row['chargeid'], PDO::PARAM_INT);
				$stmt->bindParam(':note', $row['note'], PDO::PARAM_STR, strlen($row['note']));

				$exc = $stmt->execute();
				if ($exc) {
					$nv_Cache->delMod($module_name);
					if (empty($row['sid'])) {
						nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Service', ' ', $admin_info['userid']);
					} else {
						nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Service', 'ID: ' . $row['sid'], $admin_info['userid']);
					}
					nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
				}
			} catch(PDOException $e) {
				trigger_error($e->getMessage());
				die($e->getMessage()); //Remove this line after checks finished
			}
		}
	} elseif ($row['sid'] > 0) {
		$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service WHERE sid=' . $row['sid'])->fetch();
		if (empty($row)) {
			nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
		}
	} else {
		$row['sid'] = 0;
		$row['title'] = '';
		$row['catid'] = 0;
		$row['unitid'] = 0;
		$row['price_usd'] = '';
		$row['price_vnd'] = '';
		$row['chargeid'] = 0;
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
	$array_catid_lease = array();
	$_sql = 'SELECT cid,title FROM vidoco_vi_lease_service_cat';
	$_query = $db->query($_sql);
	while ($_row = $_query->fetch()) {
		$array_catid_lease[$_row['cid']] = $_row;
	}

	$array_unitid_lease = array();
	$_sql = 'SELECT uid,title FROM vidoco_vi_lease_unit';
	$_query = $db->query($_sql);
	while ($_row = $_query->fetch()) {
		$array_unitid_lease[$_row['uid']] = $_row;
	}

	$array_chargeid_lease = array();
	$_sql = 'SELECT cid,title FROM vidoco_vi_lease_charge';
	$_query = $db->query($_sql);
	while ($_row = $_query->fetch()) {
		$array_chargeid_lease[$_row['cid']] = $_row;
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
			->from('' . NV_PREFIXLANG . '_' . $module_data . '_service');

		if (!empty($q)) {
			$db->where('title LIKE :q_title OR catid LIKE :q_catid OR unitid LIKE :q_unitid OR price_usd LIKE :q_price_usd OR price_vnd LIKE :q_price_vnd');
		}
		$sth = $db->prepare($db->sql());

		if (!empty($q)) {
			$sth->bindValue(':q_title', '%' . $q . '%');
			$sth->bindValue(':q_catid', '%' . $q . '%');
			$sth->bindValue(':q_unitid', '%' . $q . '%');
			$sth->bindValue(':q_price_usd', '%' . $q . '%');
			$sth->bindValue(':q_price_vnd', '%' . $q . '%');
		}
		$sth->execute();
		$num_items = $sth->fetchColumn();

		$db->select('*')
			->order('update_time ASC')
			->limit($per_page)
			->offset(($page - 1) * $per_page);
		$sth = $db->prepare($db->sql());

		if (!empty($q)) {
			$sth->bindValue(':q_title', '%' . $q . '%');
			$sth->bindValue(':q_catid', '%' . $q . '%');
			$sth->bindValue(':q_unitid', '%' . $q . '%');
			$sth->bindValue(':q_price_usd', '%' . $q . '%');
			$sth->bindValue(':q_price_vnd', '%' . $q . '%');
		}
		$sth->execute();
	}

	$xtpl = new XTemplate('service.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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

	foreach ($array_catid_lease as $value) {
		$xtpl->assign('OPTION', array(
			'key' => $value['cid'],
			'title' => $value['title'],
			'selected' => ($value['cid'] == $row['catid']) ? ' selected="selected"' : ''
		));
		$xtpl->parse('main.select_catid');
	}
	foreach ($array_unitid_lease as $value) {
		$xtpl->assign('OPTION', array(
			'key' => $value['uid'],
			'title' => $value['title'],
			'selected' => ($value['uid'] == $row['unitid']) ? ' selected="selected"' : ''
		));
		$xtpl->parse('main.select_unitid');
	}
	foreach ($array_chargeid_lease as $value) {
		$xtpl->assign('OPTION', array(
			'key' => $value['cid'],
			'title' => $value['title'],
			'selected' => ($value['cid'] == $row['chargeid']) ? ' selected="selected"' : ''
		));
		$xtpl->parse('main.select_chargeid');
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
					'selected' => ($i == $view['update_time']) ? ' selected="selected"' : ''));
				$xtpl->parse('main.view.loop.update_time_loop');
			}
			$xtpl->assign('CHECK', $view['active'] == 1 ? 'checked' : '');
			$view['catid'] = $array_catid_lease[$view['catid']]['title'];
			$view['unitid'] = $array_unitid_lease[$view['unitid']]['title'];
			$view['chargeid'] = $array_chargeid_lease[$view['chargeid']]['title'];
			$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;sid=' . $view['sid'];
			$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_sid=' . $view['sid'] . '&amp;delete_checkss=' . md5($view['sid'] . NV_CACHE_PREFIX . $client_info['session_id']);
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

	$page_title = $lang_module['service'];

	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}