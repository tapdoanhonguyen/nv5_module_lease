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
	$xtpl = new XTemplate('company_'.$action.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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
		$row['cid'] = $nv_Request->get_int('cid', 'post,get', 0);
		if ($nv_Request->isset_request('submit', 'post')) {
			$row['vi_title'] = $nv_Request->get_title('vi_title', 'post', '');
			$row['en_title'] = $nv_Request->get_title('en_title', 'post', '');
			$row['vi_address'] = $nv_Request->get_title('vi_address', 'post', '');
			$row['en_address'] = $nv_Request->get_title('en_address', 'post', '');
			$row['vi_province'] = $nv_Request->get_title('vi_province', 'post', '');
			$row['en_province'] = $nv_Request->get_title('en_province', 'post', '');
			$row['phone'] = $nv_Request->get_title('phone', 'post', '');
			$row['fax'] = $nv_Request->get_title('fax', 'post', '');
			$row['email'] = $nv_Request->get_title('email', 'post', '');
			$row['active'] = $nv_Request->get_int('active', 'post', 0);
			$row['adminid'] = $nv_Request->get_int('adminid', 'post', 0);
			$row['crt_date'] = $nv_Request->get_int('crt_date', 'post', 0);
			$row['userid_edit'] = $nv_Request->get_int('userid_edit', 'post', 0);
			$row['update_date'] = $nv_Request->get_int('update_date', 'post', 0);

			if (empty($error)) {
				try {
					if (empty($row['cid'])) {
						$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_company (vi_title, en_title, vi_address, en_address, vi_province, en_province, phone, fax, email, active, weight, adminid, crt_date, userid_edit, update_date) VALUES (:vi_title, :en_title, :vi_address, :en_address, :vi_province, :en_province, :phone, :fax, :email, :active, :weight, :adminid, :crt_date, :userid_edit, :update_date)');

						$weight = $db->query('SELECT max(weight) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_company')->fetchColumn();
						$weight = intval($weight) + 1;
						$stmt->bindParam(':weight', $weight, PDO::PARAM_INT);


					} else {
						$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_company SET vi_title = :vi_title, en_title = :en_title, vi_address = :vi_address, en_address = :en_address, vi_province = :vi_province, en_province = :en_province, phone = :phone, fax = :fax, email = :email, active = :active, adminid = :adminid, crt_date = :crt_date, userid_edit = :userid_edit, update_date = :update_date WHERE cid=' . $row['cid']);
					}
					$stmt->bindParam(':vi_title', $row['vi_title'], PDO::PARAM_STR);
					$stmt->bindParam(':en_title', $row['en_title'], PDO::PARAM_STR);
					$stmt->bindParam(':vi_address', $row['vi_address'], PDO::PARAM_STR);
					$stmt->bindParam(':en_address', $row['en_address'], PDO::PARAM_STR);
					$stmt->bindParam(':vi_province', $row['vi_province'], PDO::PARAM_STR);
					$stmt->bindParam(':en_province', $row['en_province'], PDO::PARAM_STR);
					$stmt->bindParam(':phone', $row['phone'], PDO::PARAM_STR);
					$stmt->bindParam(':fax', $row['fax'], PDO::PARAM_STR);
					$stmt->bindParam(':email', $row['email'], PDO::PARAM_STR);
					$stmt->bindParam(':active', $row['active'], PDO::PARAM_INT);
					$stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
					$stmt->bindParam(':crt_date', $row['crt_date'], PDO::PARAM_INT);
					$stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);
					$stmt->bindParam(':update_date', $row['update_date'], PDO::PARAM_INT);

					$exc = $stmt->execute();
					if ($exc) {
						$nv_Cache->delMod($module_name);
						if (empty($row['cid'])) {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Company', ' ', $user_info['userid']);
						} else {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Company', 'ID: ' . $row['cid'], $user_info['userid']);
						}
						nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
					}
				} catch(PDOException $e) {
					trigger_error($e->getMessage());
					die($e->getMessage()); //Remove this line after checks finished
				}
			}
		} elseif ($row['cid'] > 0) {
			$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_company WHERE cid=' . $row['cid'])->fetch();
			if (empty($row)) {
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		} else {
			$row['cid'] = 0;
			$row['vi_title'] = '';
			$row['en_title'] = '';
			$row['vi_address'] = '';
			$row['en_address'] = '';
			$row['vi_province'] = '';
			$row['en_province'] = '';
			$row['phone'] = '';
			$row['fax'] = '';
			$row['email'] = '';
			$row['active'] = 0;
			$row['adminid'] = 0;
			$row['crt_date'] = 0;
			$row['userid_edit'] = 0;
			$row['update_date'] = 0;
		}
	}else{
		// Change status
		if ($nv_Request->isset_request('change_status', 'post, get')) {
			$cid = $nv_Request->get_int('cid', 'post, get', 0);
			$content = 'NO_' . $cid;

			$query = 'SELECT active FROM ' . NV_PREFIXLANG . '_' . $module_data . '_company WHERE cid=' . $cid;
			$row = $db->query($query)->fetch();
			if (isset($row['active']))     {
				$active = ($row['active']) ? 0 : 1;
				$query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_company SET active=' . intval($active) . ' WHERE cid=' . $cid;
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
				$sql = 'SELECT cid FROM ' . NV_PREFIXLANG . '_' . $module_data . '_company WHERE cid!=' . $cid . ' ORDER BY weight ASC';
				$result = $db->query($sql);
				$weight = 0;
				while ($row = $result->fetch())
				{
					++$weight;
					if ($weight == $new_vid) ++$weight;             $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_company SET weight=' . $weight . ' WHERE cid=' . $row['cid'];
					$db->query($sql);
				}
				$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_company SET weight=' . $new_vid . ' WHERE cid=' . $cid;
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
				$weight=0;
				$sql = 'SELECT weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_company WHERE cid =' . $db->quote($cid);
				$result = $db->query($sql);
				list($weight) = $result->fetch(3);
				
				$db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_company  WHERE cid = ' . $db->quote($cid));
				if ($weight > 0)         {
					$sql = 'SELECT cid, weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_company WHERE weight >' . $weight;
					$result = $db->query($sql);
					while (list($cid, $weight) = $result->fetch(3))
					{
						$weight--;
						$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_company SET weight=' . $weight . ' WHERE cid=' . intval($cid));
					}
				}
				$nv_Cache->delMod($module_name);
				nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Company', 'ID: ' . $cid, $user_info['userid']);
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
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_company');

			if (!empty($q)) {
				$db->where('vi_title LIKE :q_vi_title OR en_title LIKE :q_en_title OR vi_address LIKE :q_vi_address OR en_address LIKE :q_en_address OR vi_province LIKE :q_vi_province OR en_province LIKE :q_en_province OR phone LIKE :q_phone OR fax LIKE :q_fax OR email LIKE :q_email');
			}
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_vi_title', '%' . $q . '%');
				$sth->bindValue(':q_en_title', '%' . $q . '%');
				$sth->bindValue(':q_vi_address', '%' . $q . '%');
				$sth->bindValue(':q_en_address', '%' . $q . '%');
				$sth->bindValue(':q_vi_province', '%' . $q . '%');
				$sth->bindValue(':q_en_province', '%' . $q . '%');
				$sth->bindValue(':q_phone', '%' . $q . '%');
				$sth->bindValue(':q_fax', '%' . $q . '%');
				$sth->bindValue(':q_email', '%' . $q . '%');
			}
			$sth->execute();
			$num_items = $sth->fetchColumn();

			$db->select('*')
				->order('weight ASC')
				->limit($per_page)
				->offset(($page - 1) * $per_page);
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_vi_title', '%' . $q . '%');
				$sth->bindValue(':q_en_title', '%' . $q . '%');
				$sth->bindValue(':q_vi_address', '%' . $q . '%');
				$sth->bindValue(':q_en_address', '%' . $q . '%');
				$sth->bindValue(':q_vi_province', '%' . $q . '%');
				$sth->bindValue(':q_en_province', '%' . $q . '%');
				$sth->bindValue(':q_phone', '%' . $q . '%');
				$sth->bindValue(':q_fax', '%' . $q . '%');
				$sth->bindValue(':q_email', '%' . $q . '%');
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
				$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/edit&amp;cid=' . $view['cid'];
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
	}
	$xtpl->parse('main');
	$contents = $xtpl->text('main');

	$page_title = $lang_module['company'];

	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}
 