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
		$cid = $nv_Request->get_int('cid', 'post, get', 0);
		$content = 'NO_' . $cid;

		$query = 'SELECT active FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service_cat WHERE cid=' . $cid;
		$row = $db->query($query)->fetch();
		if (isset($row['active']))     {
			$active = ($row['active']) ? 0 : 1;
			$query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service_cat SET active=' . intval($active) . ' WHERE cid=' . $cid;
			$db->query($query);
			$content = 'OK_' . $cid;
		}
		$nv_Cache->delMod($module_name);
		include NV_ROOTDIR . '/includes/header.php';
		echo $content;
		include NV_ROOTDIR . '/includes/footer.php';
	}

	if ($nv_Request->isset_request('ajax_action', 'post')) {
		$cid = $nv_Request->get_int('cid', 'post', 0);
		$new_vid = $nv_Request->get_int('new_vid', 'post', 0);
		$content = 'NO_' . $cid;
		if ($new_vid > 0)     {
			$sql = 'SELECT cid FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service_cat WHERE cid!=' . $cid . ' ORDER BY update_date ASC';
			$result = $db->query($sql);
			$update_date = 0;
			while ($row = $result->fetch())
			{
				++$update_date;
				if ($update_date == $new_vid) ++$update_date;             $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service_cat SET update_date=' . $update_date . ' WHERE cid=' . $row['cid'];
				$db->query($sql);
			}
			$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service_cat SET update_date=' . $new_vid . ' WHERE cid=' . $cid;
			$db->query($sql);
			$content = 'OK_' . $cid;
		}
		$nv_Cache->delMod($module_name);
		include NV_ROOTDIR . '/includes/header.php';
		echo $content;
		include NV_ROOTDIR . '/includes/footer.php';
	}

	if ($nv_Request->isset_request('delete_cid', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
		$cid = $nv_Request->get_int('delete_cid', 'get');
		$delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
		if ($cid > 0 and $delete_checkss == md5($cid . NV_CACHE_PREFIX . $client_info['session_id'])) {
			$update_date=0;
			$sql = 'SELECT update_date FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service_cat WHERE cid =' . $db->quote($cid);
			$result = $db->query($sql);
			list($update_date) = $result->fetch(3);
			
			$db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service_cat  WHERE cid = ' . $db->quote($cid));
			if ($update_date > 0)         {
				$sql = 'SELECT cid, update_date FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service_cat WHERE update_date >' . $update_date;
				$result = $db->query($sql);
				while (list($cid, $update_date) = $result->fetch(3))
				{
					$update_date--;
					$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service_cat SET update_date=' . $update_date . ' WHERE cid=' . intval($cid));
				}
			}
			$nv_Cache->delMod($module_name);
			nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Cat', 'ID: ' . $cid, $admin_info['userid']);
			nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
		}
	}

	$row = array();
	$error = array();
	$row['cid'] = $nv_Request->get_int('cid', 'post,get', 0);
	if ($nv_Request->isset_request('submit', 'post')) {
		$row['title'] = $nv_Request->get_title('title', 'post', '');

		if (empty($row['title'])) {
			$error[] = $lang_module['error_required_title'];
		}

		if (empty($error)) {
			try {
				if (empty($row['cid'])) {
					$row['adminid'] = 0;
					$row['crtd_date'] = 0;
					$row['userid_edit'] = 0;

					$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_service_cat (title, active, adminid, crtd_date, userid_edit, update_date) VALUES (:title, :active, :adminid, :crtd_date, :userid_edit, :update_date)');

					$stmt->bindValue(':active', 1, PDO::PARAM_INT);

					$stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
					$stmt->bindParam(':crtd_date', $row['crtd_date'], PDO::PARAM_INT);
					$stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);
					$weight = $db->query('SELECT max(update_date) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service_cat')->fetchColumn();
					$weight = intval($weight) + 1;
					$stmt->bindParam(':update_date', $weight, PDO::PARAM_INT);


				} else {
					$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service_cat SET title = :title WHERE cid=' . $row['cid']);
				}
				$stmt->bindParam(':title', $row['title'], PDO::PARAM_STR);

				$exc = $stmt->execute();
				if ($exc) {
					$nv_Cache->delMod($module_name);
					if (empty($row['cid'])) {
						nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Cat', ' ', $admin_info['userid']);
					} else {
						nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Cat', 'ID: ' . $row['cid'], $admin_info['userid']);
					}
					nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
				}
			} catch(PDOException $e) {
				trigger_error($e->getMessage());
				die($e->getMessage()); //Remove this line after checks finished
			}
		}
	} elseif ($row['cid'] > 0) {
		$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service_cat WHERE cid=' . $row['cid'])->fetch();
		if (empty($row)) {
			nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
		}
	} else {
		$row['cid'] = 0;
		$row['title'] = '';
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
			->from('' . NV_PREFIXLANG . '_' . $module_data . '_service_cat');

		if (!empty($q)) {
			$db->where('title LIKE :q_title');
		}
		$sth = $db->prepare($db->sql());

		if (!empty($q)) {
			$sth->bindValue(':q_title', '%' . $q . '%');
		}
		$sth->execute();
		$num_items = $sth->fetchColumn();

		$db->select('*')
			->order('update_date ASC')
			->limit($per_page)
			->offset(($page - 1) * $per_page);
		$sth = $db->prepare($db->sql());

		if (!empty($q)) {
			$sth->bindValue(':q_title', '%' . $q . '%');
		}
		$sth->execute();
	}

	$xtpl = new XTemplate('cat.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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
			$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;cid=' . $view['cid'];
			$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_cid=' . $view['cid'] . '&amp;delete_checkss=' . md5($view['cid'] . NV_CACHE_PREFIX . $client_info['session_id']);
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

	$page_title = $lang_module['cat'];

	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}