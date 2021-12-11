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
	if(	$action == "add"){
				
		$row = array();
		$error = array();
		$row['companyid'] = $nv_Request->get_int('companyid', 'post,get', 0);
		if ($nv_Request->isset_request('submit', 'post')) {
			$row['userid'] = $nv_Request->get_int('userid', 'post', 0);
			$row['permissionid'] = $nv_Request->get_int('permissionid', 'post', 0);

			if (empty($error)) {
				try {
					
						$row['weight'] = 0;
						$row['active'] = 1;

						$stmt = $db->prepare('REPLACE INTO ' . NV_PREFIXLANG . '_' . $module_data . '_company_users (userid, companyid, permissionid, weight, active) VALUES (:userid, :companyid, :permissionid, :weight, :active)');

						$stmt->bindParam(':weight', $row['weight'], PDO::PARAM_INT);
						$stmt->bindParam(':active', $row['active'], PDO::PARAM_INT);
						$stmt->bindParam(':userid', $row['userid'], PDO::PARAM_INT);
						$stmt->bindParam(':permissionid', $row['permissionid'], PDO::PARAM_INT);
						$stmt->bindParam(':companyid', $row['companyid'], PDO::PARAM_INT);

					$exc = $stmt->execute();
					if ($exc) {
						$nv_Cache->delMod($module_name);
						if (empty($row['companyid'])) {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Comapny to Usersid', ' ', $user_info['userid']);
						} else {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Change Company for Usersid', 'ID: ' . $row['userid'], $user_info['userid']);
						}
						nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
					}
				} catch(PDOException $e) {
					trigger_error($e->getMessage());
					die($e->getMessage()); //Remove this line after checks finished
				}
			}
		} elseif ($row['companyid'] > 0) {
			$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_company_users WHERE companyid=' . $row['companyid'])->fetch();
			if (empty($row)) {
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		} else {
			$row['userid'] = 0;
			$row['companyid'] = 0;
			$row['permissionid'] = 0;
		}
		$xtpl->assign('ROW', $row);


		foreach ($array_userid_users as $value) {
			$xtpl->assign('OPTION', array(
				'key' => $value['userid'],
				'title' => $value['username'],
				'selected' => ($value['userid'] == $row['userid']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_userid');
		}
		foreach ($array_companyid_lease as $value) {
			if($value['status_del'] == 0){
				$xtpl->assign('OPTION', array(
					'key' => $value['cid'],
					'title' => $value['vi_title'],
					'selected' => ($value['cid'] == $row['companyid']) ? ' selected="selected"' : ''
				));
				$xtpl->parse('main.select_companyid');
			}
		}
		foreach ($array_permission_groups as $value) {
			$xtpl->assign('OPTION', array(
				'key' => $value['id'],
				'title' => $value['title'],
				'selected' => ($value['id'] == $row['permissionid']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_permission');
		}
		if (!empty($error)) {
			$xtpl->assign('ERROR', implode('<br />', $error));
			$xtpl->parse('main.error');
		}
	}elseif(	$action == "edit"){
		$list_user =  array();
		foreach ($array_userid_users as $value) {
			$list_user[$value['userid']] =  array(
				'key' => $value['userid'],
				'title' => $value['username']
			);
		}
		$row['userid'] = $nv_Request->get_int('id', 'post,get', 0);
		$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_company_users WHERE userid=' . $row['userid'])->fetch();

		$row['username'] = $list_user[$row['userid']]['title'];
		$xtpl->assign('ROW', $row);
		
		foreach ($array_companyid_lease as $value) {
			$xtpl->assign('OPTION', array(
				'key' => $value['cid'],
				'title' => $value['vi_title'],
				'selected' => ($value['cid'] == $row['companyid']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_companyid');
		}
		foreach ($array_permission_groups as $value) {
			$xtpl->assign('OPTION', array(
				'key' => $value['id'],
				'title' => $value['title'],
				'selected' => ($value['id'] == $row['permissionid']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_permission');
		}
	}else{
		if ($nv_Request->isset_request('delete_companyid', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
			$companyid = $nv_Request->get_int('delete_companyid', 'get');
			$delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
			if ($companyid > 0 and $delete_checkss == md5($companyid . NV_CACHE_PREFIX . $client_info['session_id'])) {
				$db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_company_users  WHERE companyid = ' . $db->quote($companyid));
				$nv_Cache->delMod($module_name);
				nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Users', 'ID: ' . $companyid, $admin_info['userid']);
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		}
		$row = array();
		$error = array();

		$q = $nv_Request->get_title('q', 'post,get');

		// Fetch Limit
		$show_view = false;
		if (!$nv_Request->isset_request('userid', 'post,get')) {
			$show_view = true;
			$per_page = 20;
			$page = $nv_Request->get_int('page', 'post,get', 1);
			$db->sqlreset()
				->select('COUNT(*)')
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_company_users');

			if (!empty($q)) {
				$db->where('userid LIKE :q_userid OR companyid LIKE :q_companyid');
			}
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_userid', '%' . $q . '%');
				$sth->bindValue(':q_userid', '%' . $q . '%');
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
				$sth->bindValue(':q_companyid', '%' . $q . '%');
			}
			$sth->execute();
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
				
				$view['usercompanyid'] = $view['userid'] . '-' . $view['companyid'];
				$username=$db->query('SELECT username, email, first_name, last_name FROM ' . NV_USERS_GLOBALTABLE . ' WHERE userid = ' . $view['userid'])->fetch();	
	
				$view['username'] = $username['username'];
				$view['email'] = $username['email'];
				$view['fullname'] = $username['first_name'] . ' ' . $username['last_name'];
				$view['companyid'] = $array_companyid_lease[$view['companyid']][NV_LANG_DATA . '_title'];
				$view['permission'] = $array_permission_groups[$view['permissionid']]['title'];
				$xtpl->assign('CHECK', $view['active'] == 1 ? 'checked' : '');
				$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/edit&amp;id=' . $view['userid'];
				$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['userid'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
				$xtpl->assign('VIEW', $view);
				$xtpl->parse('main.view.loop');
			}
			$xtpl->parse('main.view');
		}


		$page_title = $lang_module['users'];
	}
	$xtpl->parse('main');
	$contents = $xtpl->text('main');

	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}