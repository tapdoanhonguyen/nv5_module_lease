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
		
	}else{

		// Change status
		if ($nv_Request->isset_request('change_status', 'post, get')) {
			$id = $nv_Request->get_int('id', 'post, get', 0);
			$content = 'NO_' . $id;

			$query = 'SELECT active FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract WHERE id=' . $id;
			$row = $db->query($query)->fetch();
			if (isset($row['active']))     {
				$active = ($row['active']) ? 0 : 1;
				$query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_contract SET active=' . intval($active) . ' WHERE id=' . $id;
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
				$sql = 'SELECT id FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract WHERE id!=' . $id . ' ORDER BY weight ASC';
				$result = $db->query($sql);
				$weight = 0;
				while ($row = $result->fetch())
				{
					++$weight;
					if ($weight == $new_vid) ++$weight;             $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_contract SET weight=' . $weight . ' WHERE id=' . $row['id'];
					$db->query($sql);
				}
				$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_contract SET weight=' . $new_vid . ' WHERE id=' . $id;
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
				$sql = 'SELECT weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract WHERE id =' . $db->quote($id);
				$result = $db->query($sql);
				list($weight) = $result->fetch(3);
				
				$db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract  WHERE id = ' . $db->quote($id));
				if ($weight > 0)         {
					$sql = 'SELECT id, weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract WHERE weight >' . $weight;
					$result = $db->query($sql);
					while (list($id, $weight) = $result->fetch(3))
					{
						$weight--;
						$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_contract SET weight=' . $weight . ' WHERE id=' . intval($id));
					}
				}
				$nv_Cache->delMod($module_name);
				nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Contract', 'ID: ' . $id, $admin_info['userid']);
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		}

		$row = array();
		$error = array();
		$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
		if ($nv_Request->isset_request('submit', 'post')) {
			$row['pid'] = $nv_Request->get_int('pid', 'post', 0);
			$row['cid'] = $nv_Request->get_int('cid', 'post', 0);
			$row['yearmonth'] = $nv_Request->get_int('yearmonth', 'post', 0);
			$row['datefrom'] = $nv_Request->get_int('datefrom', 'post', 0);
			$row['dateto'] = $nv_Request->get_int('dateto', 'post', 0);
			$row['ccode'] = $nv_Request->get_title('ccode', 'post', '');
			$row['pricevnd'] = $nv_Request->get_title('pricevnd', 'post', '');
			$row['priceusd'] = $nv_Request->get_title('priceusd', 'post', '');
			$row['note'] = $nv_Request->get_textarea('note', '', NV_ALLOWED_HTML_TAGS);
			$row['feevnd'] = $nv_Request->get_int('feevnd', 'post', 0);
			$row['feeusd'] = $nv_Request->get_int('feeusd', 'post', 0);
			$row['areareal'] = $nv_Request->get_title('areareal', 'post', '');
			$row['ccat'] = $nv_Request->get_int('ccat', 'post', 0);

			if (empty($error)) {
				try {
					if (empty($row['id'])) {
						$row['adminid'] = 0;
						$row['crtd_date'] = 0;
						$row['userid_edit'] = 0;
						$row['update_date'] = 0;

						$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_contract (pid, cid, yearmonth, datefrom, dateto, ccode, pricevnd, priceusd, note, active, weight, adminid, crtd_date, userid_edit, update_date, feevnd, feeusd, areareal, ccat) VALUES (:pid, :cid, :yearmonth, :datefrom, :dateto, :ccode, :pricevnd, :priceusd, :note, :active, :weight, :adminid, :crtd_date, :userid_edit, :update_date, :feevnd, :feeusd, :areareal, :ccat)');

						$stmt->bindValue(':active', 1, PDO::PARAM_INT);

						$weight = $db->query('SELECT max(weight) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract')->fetchColumn();
						$weight = intval($weight) + 1;
						$stmt->bindParam(':weight', $weight, PDO::PARAM_INT);

						$stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
						$stmt->bindParam(':crtd_date', $row['crtd_date'], PDO::PARAM_INT);
						$stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);
						$stmt->bindParam(':update_date', $row['update_date'], PDO::PARAM_INT);

					} else {
						$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_contract SET pid = :pid, cid = :cid, yearmonth = :yearmonth, datefrom = :datefrom, dateto = :dateto, ccode = :ccode, pricevnd = :pricevnd, priceusd = :priceusd, note = :note, feevnd = :feevnd, feeusd = :feeusd, areareal = :areareal, ccat = :ccat WHERE id=' . $row['id']);
					}
					$stmt->bindParam(':pid', $row['pid'], PDO::PARAM_INT);
					$stmt->bindParam(':cid', $row['cid'], PDO::PARAM_INT);
					$stmt->bindParam(':yearmonth', $row['yearmonth'], PDO::PARAM_INT);
					$stmt->bindParam(':datefrom', $row['datefrom'], PDO::PARAM_INT);
					$stmt->bindParam(':dateto', $row['dateto'], PDO::PARAM_INT);
					$stmt->bindParam(':ccode', $row['ccode'], PDO::PARAM_STR);
					$stmt->bindParam(':pricevnd', $row['pricevnd'], PDO::PARAM_STR);
					$stmt->bindParam(':priceusd', $row['priceusd'], PDO::PARAM_STR);
					$stmt->bindParam(':note', $row['note'], PDO::PARAM_STR, strlen($row['note']));
					$stmt->bindParam(':feevnd', $row['feevnd'], PDO::PARAM_INT);
					$stmt->bindParam(':feeusd', $row['feeusd'], PDO::PARAM_INT);
					$stmt->bindParam(':areareal', $row['areareal'], PDO::PARAM_STR);
					$stmt->bindParam(':ccat', $row['ccat'], PDO::PARAM_INT);

					$exc = $stmt->execute();
					if ($exc) {
						$nv_Cache->delMod($module_name);
						if (empty($row['id'])) {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Contract', ' ', $admin_info['userid']);
						} else {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Contract', 'ID: ' . $row['id'], $admin_info['userid']);
						}
						nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
					}
				} catch(PDOException $e) {
					trigger_error($e->getMessage());
					die($e->getMessage()); //Remove this line after checks finished
				}
			}
		} elseif ($row['id'] > 0) {
			$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract WHERE id=' . $row['id'])->fetch();
			if (empty($row)) {
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		} else {
			$row['id'] = 0;
			$row['pid'] = 0;
			$row['cid'] = 0;
			$row['yearmonth'] = 0;
			$row['datefrom'] = 0;
			$row['dateto'] = 0;
			$row['ccode'] = '';
			$row['pricevnd'] = '0';
			$row['priceusd'] = '0';
			$row['note'] = '';
			$row['feevnd'] = 0;
			$row['feeusd'] = 0;
			$row['areareal'] = '0';
			$row['ccat'] = 0;
		}

		$row['note'] = nv_htmlspecialchars(nv_br2nl($row['note']));

		$array_ccat_lease = array();
		$_sql = 'SELECT ciđ,title FROM vidoco_vi_lease_contract_cat';
		$_query = $db->query($_sql);
		while ($_row = $_query->fetch()) {
			$array_ccat_lease[$_row['ciđ']] = $_row;
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
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_contract');

			if (!empty($q)) {
				$db->where('pid LIKE :q_pid OR cid LIKE :q_cid OR yearmonth LIKE :q_yearmonth OR datefrom LIKE :q_datefrom OR dateto LIKE :q_dateto OR ccode LIKE :q_ccode');
			}
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_pid', '%' . $q . '%');
				$sth->bindValue(':q_cid', '%' . $q . '%');
				$sth->bindValue(':q_yearmonth', '%' . $q . '%');
				$sth->bindValue(':q_datefrom', '%' . $q . '%');
				$sth->bindValue(':q_dateto', '%' . $q . '%');
				$sth->bindValue(':q_ccode', '%' . $q . '%');
			}
			$sth->execute();
			$num_items = $sth->fetchColumn();

			$db->select('*')
				->order('weight ASC')
				->limit($per_page)
				->offset(($page - 1) * $per_page);
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_pid', '%' . $q . '%');
				$sth->bindValue(':q_cid', '%' . $q . '%');
				$sth->bindValue(':q_yearmonth', '%' . $q . '%');
				$sth->bindValue(':q_datefrom', '%' . $q . '%');
				$sth->bindValue(':q_dateto', '%' . $q . '%');
				$sth->bindValue(':q_ccode', '%' . $q . '%');
			}
			$sth->execute();
		}


		$xtpl->assign('ROW', $row);

		foreach ($array_ccat_lease as $value) {
			$xtpl->assign('OPTION', array(
				'key' => $value['ciđ'],
				'title' => $value['title'],
				'selected' => ($value['ciđ'] == $row['ccat']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_ccat');
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
						'selected' => ($i == $view['weight']) ? ' selected="selected"' : ''));
					$xtpl->parse('main.view.loop.weight_loop');
				}
				$xtpl->assign('CHECK', $view['active'] == 1 ? 'checked' : '');
				$view['ccat'] = $array_ccat_lease[$view['ccat']]['title'];
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

	$page_title = $lang_module['contract'];

	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}