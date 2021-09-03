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
	if($array_op[1] == "") {
		$action = "main";
	}elseif($array_op[1] == "alias"){
		
		if ($nv_Request->isset_request('get_alias_title', 'post')) {
			$alias = $nv_Request->get_title('get_alias_title', 'post', '');
			$alias = change_alias($alias);
			die($alias);
		}
	}else{
		$action = $array_op[1];
	}
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
	$xtpl = new XTemplate($op . '_'.$action.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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
		$xtpl->assign($op . '_add', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '/add'),true);
		//$xtpl->assign('PRODUCT_IMPORT', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=product/import'),true);
		//$xtpl->assign('PRODUCT_EXPORT', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=product/export',true));
	if(	$action == "add" or $action == "edit"){
				
		$row = array();
		$error = array();
		$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
		if ($nv_Request->isset_request('submit', 'post')) {
			$row['pid'] = $nv_Request->get_int('pid', 'post', 0);
			$row['cid'] = $nv_Request->get_int('cid', 'post', 0);
			$row['mount'] = $nv_Request->get_int('mount', 'post', 0);
			$row['year'] = $nv_Request->get_int('year', 'post', 0);
			$row['yearmount'] = $row['mount'].$row['year'];
			if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('datefrom', 'post'), $m))     {
				$_hour = 0;
				$_min = 0;
				$row['datefrom'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
			}
			else
			{
				$row['datefrom'] = 0;
			}
			if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('dateto', 'post'), $m))     {
				$_hour = 0;
				$_min = 0;
				$row['dateto'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
			}
			else
			{
				$row['dateto'] = 0;
			}
			
			$row['sid'] = $nv_Request->get_int('sid', 'post', 0);
			$row['pricevnd'] = $nv_Request->get_title('pricevnd', 'post', '');
			$row['priceusd'] = $nv_Request->get_title('priceusd', 'post', '');
			$row['amount'] = $nv_Request->get_title('amount', 'post', '');
			$row['totalvnd'] = $nv_Request->get_title('totalvnd', 'post', '');
			$row['totalusd'] = $nv_Request->get_title('totalusd', 'post', '');
			$row['note'] = $nv_Request->get_textarea('note', '', NV_ALLOWED_HTML_TAGS);
			$row['userid_edit'] = $nv_Request->get_int('userid_edit', 'post', 0);
			$row['update_date'] = $nv_Request->get_int('update_date', 'post', 0);
			$row['adminid'] = $nv_Request->get_int('adminid', 'post', 0);
			$row['crt_date'] = $nv_Request->get_int('crt_date', 'post', 0);

			if (empty($row['pid'])) {
				$error[] = $lang_module['error_required_pid'];
			} elseif (empty($row['cid'])) {
				$error[] = $lang_module['error_required_cid'];
			} elseif (empty($row['yearmount'])) {
				$error[] = $lang_module['error_required_yearmount'];
			} elseif (empty($row['datefrom'])) {
				$error[] = $lang_module['error_required_datefrom'];
			} elseif (empty($row['dateto'])) {
				$error[] = $lang_module['error_required_dateto'];
			} elseif (empty($row['sid'])) {
				$error[] = $lang_module['error_required_sid'];
			}

			if (empty($error)) {
				try {
					if (empty($row['id'])) {
						$row['active'] = 0;
						$row['weight'] = 0;

						$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_service_extra (pid, cid, yearmount, datefrom, dateto, sid, pricevnd, priceusd, amount, totalvnd, totalusd, note, active, userid_edit, update_date, adminid, crt_date, weight) VALUES (:pid, :cid, :yearmount, :datefrom, :dateto, :sid, :pricevnd, :priceusd, :amount, :totalvnd, :totalusd, :note, :active, :userid_edit, :update_date, :adminid, :crt_date, :weight)');

						$stmt->bindParam(':active', $row['active'], PDO::PARAM_INT);
						$stmt->bindParam(':weight', $row['weight'], PDO::PARAM_INT);

					} else {
						$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service_extra SET  datefrom = :datefrom, dateto = :dateto, sid = :sid, pricevnd = :pricevnd, priceusd = :priceusd, amount = :amount, totalvnd = :totalvnd, totalusd = :totalusd, note = :note, userid_edit = :userid_edit, update_date = :update_date, adminid = :adminid, crt_date = :crt_date WHERE pid = :pid and cid = :cid and yearmount = :yearmount and id=' . $row['id']);
					}
					$stmt->bindParam(':pid', $row['pid'], PDO::PARAM_INT);
					$stmt->bindParam(':cid', $row['cid'], PDO::PARAM_INT);
					$stmt->bindParam(':yearmount', $row['yearmount'], PDO::PARAM_INT);
					$stmt->bindParam(':datefrom', $row['datefrom'], PDO::PARAM_INT);
					$stmt->bindParam(':dateto', $row['dateto'], PDO::PARAM_INT);
					$stmt->bindParam(':sid', $row['sid'], PDO::PARAM_INT);
					$stmt->bindParam(':pricevnd', $row['pricevnd'], PDO::PARAM_STR);
					$stmt->bindParam(':priceusd', $row['priceusd'], PDO::PARAM_STR);
					$stmt->bindParam(':amount', $row['amount'], PDO::PARAM_STR);
					$stmt->bindParam(':totalvnd', $row['totalvnd'], PDO::PARAM_STR);
					$stmt->bindParam(':totalusd', $row['totalusd'], PDO::PARAM_STR);
					$stmt->bindParam(':note', $row['note'], PDO::PARAM_STR, strlen($row['note']));
					$stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);
					$stmt->bindParam(':update_date', $row['update_date'], PDO::PARAM_INT);
					$stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
					$stmt->bindParam(':crt_date', $row['crt_date'], PDO::PARAM_INT);

					$exc = $stmt->execute();
					if ($exc) {
						$nv_Cache->delMod($module_name);
						if (empty($row['id'])) {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Serviceextra_add', ' ', $admin_info['userid']);
						} else {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Serviceextra_add', 'ID: ' . $row['id'], $admin_info['userid']);
						}
						nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
					}
				} catch(PDOException $e) {
					trigger_error($e->getMessage());
					die($e->getMessage()); //Remove this line after checks finished
				}
			}
		} elseif ($row['id'] > 0) {
			$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service_extra WHERE id=' . $row['id'])->fetch();
			if (empty($row)) {
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		} else {
			$row['id'] = 0;
			$row['pid'] = 0;
			$row['cid'] = 0;
			$row['mount'] = date("m",NV_CURRENTTIME);
			$row['year'] = date("Y",NV_CURRENTTIME);
			$row['datefrom'] = '';
			$row['dateto'] = '';
			$row['sid'] = 0;
			$row['pricevnd'] = '0';
			$row['priceusd'] = '0';
			$row['amount'] = '0';
			$row['totalvnd'] = '0';
			$row['totalusd'] = '0';
			$row['note'] = '';
			$row['userid_edit'] = 0;
			$row['update_date'] = 0;
			$row['adminid'] = 0;
			$row['crt_date'] = 0;
		}

		if (empty($row['datefrom'])) {
			$row['datefrom'] = '';
		}
		else
		{
			$row['datefrom'] = date('d/m/Y', $row['datefrom']);
		}

		if (empty($row['dateto'])) {
			$row['dateto'] = '';
		}
		else
		{
			$row['dateto'] = date('d/m/Y', $row['dateto']);
		}

		$row['note'] = nv_htmlspecialchars(nv_br2nl($row['note']));

		$array_pid_lease = array();
		$_sql = 'SELECT pid,title FROM vidoco_vi_lease_product';
		$_query = $db->query($_sql);
		while ($_row = $_query->fetch()) {
			$array_pid_lease[$_row['pid']] = $_row;
		}

		$array_cid_lease = array();
		$_sql = 'SELECT cid,title FROM vidoco_vi_lease_customer';
		$_query = $db->query($_sql);
		while ($_row = $_query->fetch()) {
			$array_cid_lease[$_row['cid']] = $_row;
		}

		$array_sid_lease = array();
		$_sql = 'SELECT sid,title FROM vidoco_vi_lease_service';
		$_query = $db->query($_sql);
		while ($_row = $_query->fetch()) {
			$array_sid_lease[$_row['sid']] = $_row;
		}
		$xtpl->assign('ROW', $row);

		foreach ($array_pid_lease as $value) {
			$xtpl->assign('OPTION', array(
				'key' => $value['pid'],
				'title' => $value['title'],
				'selected' => ($value['pid'] == $row['pid']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_pid');
		}
		foreach ($array_cid_lease as $value) {
			$xtpl->assign('OPTION', array(
				'key' => $value['cid'],
				'title' => $value['title'],
				'selected' => ($value['cid'] == $row['cid']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_cid');
		}
		foreach ($array_sid_lease as $value) {
			$xtpl->assign('OPTION', array(
				'key' => $value['sid'],
				'title' => $value['title'],
				'selected' => ($value['sid'] == $row['sid']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_sid');
		}

		$array_mount = array();
		$array_mount['01'] = 'Tháng 1';
		$array_mount['02'] = 'Tháng 2';
		$array_mount['03'] = 'Tháng 3';
		$array_mount['04'] = 'Tháng 4';
		$array_mount['05'] = 'Tháng 5';
		$array_mount['06'] = 'Tháng 6';
		$array_mount['07'] = 'Tháng 7';
		$array_mount['08'] = 'Tháng 8';
		$array_mount['09'] = 'Tháng 9';
		$array_mount['10'] = 'Tháng 10';
		$array_mount['11'] = 'Tháng 11';
		$array_mount['12'] = 'Tháng 12';

		$array_year = array();
		
		foreach ($array_mount as $key => $title) {
			$xtpl->assign('OPTION', array(
				'key' => $key,
				'title' => $title,
				'selected' => ($key == $row['mount']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_mount');
		}

		for ($i=1970;$i<2050;$i++) {
			$xtpl->assign('OPTION', array(
				'key' => $i,
				'title' => $i,
				'selected' => ($i == $row['year']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_year');
		}

		if (!empty($error)) {
			$xtpl->assign('ERROR', implode('<br />', $error));
			$xtpl->parse('main.error');
		}
	}else{

		// Change status
		if ($nv_Request->isset_request('change_status', 'post, get')) {
			$id = $nv_Request->get_int('id', 'post, get', 0);
			$content = 'NO_' . $id;

			$query = 'SELECT active FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service_extra WHERE id=' . $id;
			$row = $db->query($query)->fetch();
			if (isset($row['active']))     {
				$active = ($row['active']) ? 0 : 1;
				$query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service_extra SET active=' . intval($active) . ' WHERE id=' . $id;
				$db->query($query);
				$content = 'OK_' . $id;
			}
			$nv_Cache->delMod($module_name);
			include NV_ROOTDIR . '/includes/header.php';
			echo $content;
			include NV_ROOTDIR . '/includes/footer.php';
		}

		if ($nv_Request->isset_request('ajax_action', 'post')) {
			$id = $nv_Request->get_int('id', 'post', 0);
			$new_vid = $nv_Request->get_int('new_vid', 'post', 0);
			$content = 'NO_' . $id;
			if ($new_vid > 0)     {
				$sql = 'SELECT id FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service_extra WHERE id!=' . $id . ' ORDER BY weight ASC';
				$result = $db->query($sql);
				$weight = 0;
				while ($row = $result->fetch())
				{
					++$weight;
					if ($weight == $new_vid) ++$weight;             $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service_extra SET weight=' . $weight . ' WHERE id=' . $row['id'];
					$db->query($sql);
				}
				$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service_extra SET weight=' . $new_vid . ' WHERE id=' . $id;
				$db->query($sql);
				$content = 'OK_' . $id;
			}
			$nv_Cache->delMod($module_name);
			include NV_ROOTDIR . '/includes/header.php';
			echo $content;
			include NV_ROOTDIR . '/includes/footer.php';
		}

		if ($nv_Request->isset_request('delete_id', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
			$id = $nv_Request->get_int('delete_id', 'get');
			$delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
			if ($id > 0 and $delete_checkss == md5($id . NV_CACHE_PREFIX . $client_info['session_id'])) {
				$weight=0;
				$sql = 'SELECT weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service_extra WHERE id =' . $db->quote($id);
				$result = $db->query($sql);
				list($weight) = $result->fetch(3);
				
				$db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service_extra  WHERE id = ' . $db->quote($id));
				if ($weight > 0)         {
					$sql = 'SELECT id, weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service_extra WHERE weight >' . $weight;
					$result = $db->query($sql);
					while (list($id, $weight) = $result->fetch(3))
					{
						$weight--;
						$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service_extra SET weight=' . $weight . ' WHERE id=' . intval($id));
					}
				}
				$nv_Cache->delMod($module_name);
				nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Serviceextra', 'ID: ' . $id, $admin_info['userid']);
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
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
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_service_extra');

			if (!empty($q)) {
				$db->where('yearmount LIKE :q_yearmount OR datefrom LIKE :q_datefrom OR dateto LIKE :q_dateto OR sid LIKE :q_sid OR totalvnd LIKE :q_totalvnd OR totalusd LIKE :q_totalusd');
			}
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_yearmount', '%' . $q . '%');
				$sth->bindValue(':q_datefrom', '%' . $q . '%');
				$sth->bindValue(':q_dateto', '%' . $q . '%');
				$sth->bindValue(':q_sid', '%' . $q . '%');
				$sth->bindValue(':q_totalvnd', '%' . $q . '%');
				$sth->bindValue(':q_totalusd', '%' . $q . '%');
			}
			$sth->execute();
			$num_items = $sth->fetchColumn();

			$db->select('*')
				->order('weight ASC')
				->limit($per_page)
				->offset(($page - 1) * $per_page);
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_yearmount', '%' . $q . '%');
				$sth->bindValue(':q_datefrom', '%' . $q . '%');
				$sth->bindValue(':q_dateto', '%' . $q . '%');
				$sth->bindValue(':q_sid', '%' . $q . '%');
				$sth->bindValue(':q_totalvnd', '%' . $q . '%');
				$sth->bindValue(':q_totalusd', '%' . $q . '%');
			}
			$sth->execute();
		}

	
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
						'selected' => ($i == $view['weight']) ? ' selected="selected"' : ''));
					$xtpl->parse('main.view.loop.weight_loop');
				}
				$xtpl->assign('CHECK', $view['active'] == 1 ? 'checked' : '');
				$view['datefrom'] = (empty($view['datefrom'])) ? '' : nv_date('d/m/Y', $view['datefrom']);
				$view['dateto'] = (empty($view['dateto'])) ? '' : nv_date('d/m/Y', $view['dateto']);
				$view['pid'] = $array_pid_lease[$view['pid']]['title'];
				$view['cid'] = $array_cid_lease[$view['cid']]['title'];
				$view['sid'] = $array_sid_lease[$view['sid']]['title'];
				$view['yearmount'] = $array_yearmount[$view['yearmount']];
				$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;id=' . $view['id'];
				$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
				$xtpl->assign('VIEW', $view);
				$xtpl->parse('main.view.loop');
			}
			$xtpl->parse('main.view');
		}


		if (!empty($error)) {
			$xtpl->assign('ERROR', implode('<br />', $error));
			$xtpl->parse('main.error');
		}
	}
	$xtpl->parse('main');
	$contents = $xtpl->text('main');

	$page_title = $lang_module['serviceextra'];

	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}