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
		$fid = $nv_Request->get_int('fid', 'post, get', 0);
		$content = 'NO_' . $fid;

		$query = 'SELECT active FROM ' . NV_PREFIXLANG . '_' . $module_data . '_floor WHERE fid=' . $fid;
		$row = $db->query($query)->fetch();
		if (isset($row['active']))     {
			$active = ($row['active']) ? 0 : 1;
			$query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_floor SET active=' . intval($active) . ' WHERE fid=' . $fid;
			$db->query($query);
			$content = 'OK_' . $fid;
		}
		$nv_Cache->delMod($module_name);
		include NV_ROOTDIR . '/includes/header.php';
		echo $content;
		include NV_ROOTDIR . '/includes/footer.php';
	}

	if ($nv_Request->isset_request('ajax_action', 'post')) {
		$fid = $nv_Request->get_int('fid', 'post', 0);
		$new_vid = $nv_Request->get_int('new_vid', 'post', 0);
		$content = 'NO_' . $fid;
		if ($new_vid > 0)     {
			$sql = 'SELECT fid FROM ' . NV_PREFIXLANG . '_' . $module_data . '_floor WHERE fid!=' . $fid . ' ORDER BY update_time ASC';
			$result = $db->query($sql);
			$update_time = 0;
			while ($row = $result->fetch())
			{
				++$update_time;
				if ($update_time == $new_vid) ++$update_time;             $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_floor SET update_time=' . $update_time . ' WHERE fid=' . $row['fid'];
				$db->query($sql);
			}
			$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_floor SET update_time=' . $new_vid . ' WHERE fid=' . $fid;
			$db->query($sql);
			$content = 'OK_' . $fid;
		}
		$nv_Cache->delMod($module_name);
		include NV_ROOTDIR . '/includes/header.php';
		echo $content;
		include NV_ROOTDIR . '/includes/footer.php';
	}

	if ($nv_Request->isset_request('delete_fid', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
		$fid = $nv_Request->get_int('delete_fid', 'get');
		$delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
		if ($fid > 0 and $delete_checkss == md5($fid . NV_CACHE_PREFIX . $client_info['session_id'])) {
			$update_time=0;
			$sql = 'SELECT update_time FROM ' . NV_PREFIXLANG . '_' . $module_data . '_floor WHERE fid =' . $db->quote($fid);
			$result = $db->query($sql);
			list($update_time) = $result->fetch(3);
			
			$db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_floor  WHERE fid = ' . $db->quote($fid));
			if ($update_time > 0)         {
				$sql = 'SELECT fid, update_time FROM ' . NV_PREFIXLANG . '_' . $module_data . '_floor WHERE update_time >' . $update_time;
				$result = $db->query($sql);
				while (list($fid, $update_time) = $result->fetch(3))
				{
					$update_time--;
					$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_floor SET update_time=' . $update_time . ' WHERE fid=' . intval($fid));
				}
			}
			$nv_Cache->delMod($module_name);
			nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Floor', 'ID: ' . $fid, $admin_info['userid']);
			nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
		}
	}

	$row = array();
	$error = array();
	$row['fid'] = $nv_Request->get_int('fid', 'post,get', 0);
	if ($nv_Request->isset_request('submit', 'post')) {
		$row['title'] = $nv_Request->get_title('title', 'post', '');
		$row['area'] = $nv_Request->get_title('area', 'post', '');
		$row['common_area'] = $nv_Request->get_title('common_area', 'post', '');
		$row['area_for_rent'] = $nv_Request->get_title('area_for_rent', 'post', '');
		$row['elevator'] = $nv_Request->get_int('elevator', 'post', 0);
		$row['stair'] = $nv_Request->get_int('stair', 'post', 0);
		$row['image'] = $nv_Request->get_title('image', 'post', '');
		$row['note'] = $nv_Request->get_editor('note', '', NV_ALLOWED_HTML_TAGS);

		if (empty($row['title'])) {
			$error[] = $lang_module['error_required_title'];
		} elseif (empty($row['area'])) {
			$error[] = $lang_module['error_required_area'];
		} elseif (empty($row['common_area'])) {
			$error[] = $lang_module['error_required_common_area'];
		}

		if (empty($error)) {
			try {
				if (empty($row['fid'])) {
					$row['adminid'] = 0;
					$row['crtd_date'] = 0;
					$row['userid_edit'] = 0;

					$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_floor (title, area, common_area, area_for_rent, elevator, stair, image, note, active, adminid, crtd_date, userid_edit, update_time) VALUES (:title, :area, :common_area, :area_for_rent, :elevator, :stair, :image, :note, :active, :adminid, :crtd_date, :userid_edit, :update_time)');

					$stmt->bindValue(':active', 1, PDO::PARAM_INT);

					$stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
					$stmt->bindParam(':crtd_date', $row['crtd_date'], PDO::PARAM_INT);
					$stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);
					$weight = $db->query('SELECT max(update_time) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_floor')->fetchColumn();
					$weight = intval($weight) + 1;
					$stmt->bindParam(':update_time', $weight, PDO::PARAM_INT);


				} else {
					$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_floor SET title = :title, area = :area, common_area = :common_area, area_for_rent = :area_for_rent, elevator = :elevator, stair = :stair, image = :image, note = :note WHERE fid=' . $row['fid']);
				}
				$stmt->bindParam(':title', $row['title'], PDO::PARAM_STR);
				$stmt->bindParam(':area', $row['area'], PDO::PARAM_STR);
				$stmt->bindParam(':common_area', $row['common_area'], PDO::PARAM_STR);
				$stmt->bindParam(':area_for_rent', $row['area_for_rent'], PDO::PARAM_STR);
				$stmt->bindParam(':elevator', $row['elevator'], PDO::PARAM_INT);
				$stmt->bindParam(':stair', $row['stair'], PDO::PARAM_INT);
				$stmt->bindParam(':image', $row['image'], PDO::PARAM_STR);
				$stmt->bindParam(':note', $row['note'], PDO::PARAM_STR, strlen($row['note']));

				$exc = $stmt->execute();
				if ($exc) {
					$nv_Cache->delMod($module_name);
					if (empty($row['fid'])) {
						nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Floor', ' ', $admin_info['userid']);
					} else {
						nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Floor', 'ID: ' . $row['fid'], $admin_info['userid']);
					}
					nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
				}
			} catch(PDOException $e) {
				trigger_error($e->getMessage());
				die($e->getMessage()); //Remove this line after checks finished
			}
		}
	} elseif ($row['fid'] > 0) {
		$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_floor WHERE fid=' . $row['fid'])->fetch();
		if (empty($row)) {
			nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
		}
	} else {
		$row['fid'] = 0;
		$row['title'] = '';
		$row['area'] = '';
		$row['common_area'] = '';
		$row['area_for_rent'] = '';
		$row['elevator'] = 0;
		$row['stair'] = 0;
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

	$array_elevator = array();
	$array_elevator[1] = 'có';

	$array_stair = array();
	$array_stair[1] = 'có';
	$array_active[1] = 'Kích hoạt';

	$q = $nv_Request->get_title('q', 'post,get');

	// Fetch Limit
	$show_view = false;
	if (!$nv_Request->isset_request('id', 'post,get')) {
		$show_view = true;
		$per_page = 20;
		$page = $nv_Request->get_int('page', 'post,get', 1);
		$db->sqlreset()
			->select('COUNT(*)')
			->from('' . NV_PREFIXLANG . '_' . $module_data . '_floor');

		if (!empty($q)) {
			$db->where('title LIKE :q_title OR area LIKE :q_area OR common_area LIKE :q_common_area OR area_for_rent LIKE :q_area_for_rent OR active LIKE :q_active');
		}
		$sth = $db->prepare($db->sql());

		if (!empty($q)) {
			$sth->bindValue(':q_title', '%' . $q . '%');
			$sth->bindValue(':q_area', '%' . $q . '%');
			$sth->bindValue(':q_common_area', '%' . $q . '%');
			$sth->bindValue(':q_area_for_rent', '%' . $q . '%');
			$sth->bindValue(':q_active', '%' . $q . '%');
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
			$sth->bindValue(':q_area', '%' . $q . '%');
			$sth->bindValue(':q_common_area', '%' . $q . '%');
			$sth->bindValue(':q_area_for_rent', '%' . $q . '%');
			$sth->bindValue(':q_active', '%' . $q . '%');
		}
		$sth->execute();
	}

	$xtpl = new XTemplate('floor.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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


	foreach ($array_elevator as $key => $title) {
		$xtpl->assign('OPTION', array(
			'key' => $key,
			'title' => $title,
			'checked' => ($key == $row['elevator']) ? ' checked="checked"' : ''
		));
		$xtpl->parse('main.radio_elevator');
	}

	foreach ($array_stair as $key => $title) {
		$xtpl->assign('OPTION', array(
			'key' => $key,
			'title' => $title,
			'checked' => ($key == $row['stair']) ? ' checked="checked"' : ''
		));
		$xtpl->parse('main.radio_stair');
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
			$view['elevator'] = $array_elevator[$view['elevator']];
			$view['stair'] = $array_stair[$view['stair']];
			$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;fid=' . $view['fid'];
			$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_fid=' . $view['fid'] . '&amp;delete_checkss=' . md5($view['fid'] . NV_CACHE_PREFIX . $client_info['session_id']);
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

	$page_title = $lang_module['floor'];

	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
} elseif ($array_post_user['addcontent']) {
    nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '&contentid=0&checkss=' . md5('0' . NV_CHECK_SESSION));
}