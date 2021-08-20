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
	$xtpl = new XTemplate('bank_'.$action.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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
		$xtpl->assign('FLOOR_ADD', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=floor/add'),true);
		//$xtpl->assign('PRODUCT_IMPORT', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=product/import'),true);
		//$xtpl->assign('PRODUCT_EXPORT', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=product/export',true));
	if(	$action == "add" or $action == "edit"){
		
	}else{
		// Change status
		if ($nv_Request->isset_request('change_status', 'post, get')) {
			$id = $nv_Request->get_int('id', 'post, get', 0);
			$content = 'NO_' . $id;

			$query = 'SELECT active FROM ' . NV_PREFIXLANG . '_' . $module_data . '_bank WHERE id=' . $id;
			$row = $db->query($query)->fetch();
			if (isset($row['active']))     {
				$active = ($row['active']) ? 0 : 1;
				$query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_bank SET active=' . intval($active) . ' WHERE id=' . $id;
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
				$sql = 'SELECT id FROM ' . NV_PREFIXLANG . '_' . $module_data . '_bank WHERE id!=' . $id . ' ORDER BY weight ASC';
				$result = $db->query($sql);
				$weight = 0;
				while ($row = $result->fetch())
				{
					++$weight;
					if ($weight == $new_vid) ++$weight;             $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_bank SET weight=' . $weight . ' WHERE id=' . $row['id'];
					$db->query($sql);
				}
				$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_bank SET weight=' . $new_vid . ' WHERE id=' . $id;
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
				$sql = 'SELECT weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_bank WHERE id =' . $db->quote($id);
				$result = $db->query($sql);
				list($weight) = $result->fetch(3);
				
				$db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_bank  WHERE id = ' . $db->quote($id));
				if ($weight > 0)         {
					$sql = 'SELECT id, weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_bank WHERE weight >' . $weight;
					$result = $db->query($sql);
					while (list($id, $weight) = $result->fetch(3))
					{
						$weight--;
						$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_bank SET weight=' . $weight . ' WHERE id=' . intval($id));
					}
				}
				$nv_Cache->delMod($module_name);
				nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Bank', 'ID: ' . $id, $user_info['userid']);
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		}

		$row = array();
		$error = array();
		$array_companyid_lease = array();
		$_sql = 'SELECT cid,vi_title FROM vidoco_vi_lease_company';
		$_query = $db->query($_sql);
		while ($_row = $_query->fetch()) {
			$array_companyid_lease[$_row['cid']] = $_row;
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
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_bank');

			if (!empty($q)) {
				$db->where('vi_bank_number LIKE :q_vi_bank_number OR en_bank_number LIKE :q_en_bank_number OR vi_bank_account_holder LIKE :q_vi_bank_account_holder OR en_bank_account_holder LIKE :q_en_bank_account_holder OR vi_bank_name LIKE :q_vi_bank_name OR en_bank_name LIKE :q_en_bank_name OR vi_address LIKE :q_vi_address OR en_address LIKE :q_en_address OR swiftcode LIKE :q_swiftcode');
			}
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_vi_bank_number', '%' . $q . '%');
				$sth->bindValue(':q_en_bank_number', '%' . $q . '%');
				$sth->bindValue(':q_vi_bank_account_holder', '%' . $q . '%');
				$sth->bindValue(':q_en_bank_account_holder', '%' . $q . '%');
				$sth->bindValue(':q_vi_bank_name', '%' . $q . '%');
				$sth->bindValue(':q_en_bank_name', '%' . $q . '%');
				$sth->bindValue(':q_vi_address', '%' . $q . '%');
				$sth->bindValue(':q_en_address', '%' . $q . '%');
				$sth->bindValue(':q_swiftcode', '%' . $q . '%');
			}
			$sth->execute();
			$num_items = $sth->fetchColumn();

			$db->select('*')
				->order('weight ASC')
				->limit($per_page)
				->offset(($page - 1) * $per_page);
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_vi_bank_number', '%' . $q . '%');
				$sth->bindValue(':q_en_bank_number', '%' . $q . '%');
				$sth->bindValue(':q_vi_bank_account_holder', '%' . $q . '%');
				$sth->bindValue(':q_en_bank_account_holder', '%' . $q . '%');
				$sth->bindValue(':q_vi_bank_name', '%' . $q . '%');
				$sth->bindValue(':q_en_bank_name', '%' . $q . '%');
				$sth->bindValue(':q_vi_address', '%' . $q . '%');
				$sth->bindValue(':q_en_address', '%' . $q . '%');
				$sth->bindValue(':q_swiftcode', '%' . $q . '%');
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
				$view['companyid'] = $array_companyid_lease[$view['companyid']]['vi_title'];
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


		$page_title = $lang_module['bank'];
	}

	$xtpl->parse('main');
	$contents = $xtpl->text('main');
	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}