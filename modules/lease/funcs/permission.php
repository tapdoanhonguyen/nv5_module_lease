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
		
	}elseif($action == "view" ){
	}elseif($action == "func" ){
				
		$row = array();
		$error = array();
		$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
		if ($nv_Request->isset_request('submit', 'post')) {
			$row['funccode'] = $nv_Request->get_title('funccode', 'post', '');
			$row['title'] = $nv_Request->get_title('title', 'post', '');

			if (empty($row['funccode'])) {
				$error[] = $lang_module['error_required_funccode'];
			} elseif (empty($row['title'])) {
				$error[] = $lang_module['error_required_title'];
			}

			if (empty($error)) {
				try {
					if (empty($row['id'])) {
						$row['adminid'] = 0;
						$row['crt_date'] = 0;
						$row['userid_edit'] = 0;
						$row['update_time'] = 0;

						$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_permission_func (funccode, title, adminid, crt_date, userid_edit, update_time) VALUES (:funccode, :title, :adminid, :crt_date, :userid_edit, :update_time)');

						$stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
						$stmt->bindParam(':crt_date', $row['crt_date'], PDO::PARAM_INT);
						$stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);
						$stmt->bindParam(':update_time', $row['update_time'], PDO::PARAM_INT);

					} else {
						$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_permission_func SET funccode = :funccode, title = :title WHERE id=' . $row['id']);
					}
					$stmt->bindParam(':funccode', $row['funccode'], PDO::PARAM_STR);
					$stmt->bindParam(':title', $row['title'], PDO::PARAM_STR);

					$exc = $stmt->execute();
					if ($exc) {
						$nv_Cache->delMod($module_name);
						if (empty($row['id'])) {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Func', ' ', $admin_info['userid']);
						} else {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Func', 'ID: ' . $row['id'], $admin_info['userid']);
						}
						nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '/func');
					}
				} catch(PDOException $e) {
					trigger_error($e->getMessage());
					die($e->getMessage()); //Remove this line after checks finished
				}
			}
		} elseif ($row['id'] > 0) {
			$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_permission_func WHERE id=' . $row['id'])->fetch();
			if (empty($row)) {
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '/func');
			}
		} else {
			$row['id'] = 0;
			$row['funccode'] = '';
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
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_permission_func');

			if (!empty($q)) {
				$db->where('funccode LIKE :q_funccode OR title LIKE :q_title');
			}
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_funccode', '%' . $q . '%');
				$sth->bindValue(':q_title', '%' . $q . '%');
			}
			$sth->execute();
			$num_items = $sth->fetchColumn();

			$db->select('*')
				->order('id DESC')
				->limit($per_page)
				->offset(($page - 1) * $per_page);
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_funccode', '%' . $q . '%');
				$sth->bindValue(':q_title', '%' . $q . '%');
			}
			$sth->execute();
		}

		$xtpl = new XTemplate('permission_func.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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
			$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/func';
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
				$view['number'] = $number++;
				$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/func&amp;id=' . $view['id'];
				$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/func&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
				$xtpl->assign('VIEW', $view);
				$xtpl->parse('main.view.loop');
			}
			$xtpl->parse('main.view');
		}


		if (!empty($error)) {
			$xtpl->assign('ERROR', implode('<br />', $error));
			$xtpl->parse('main.error');
		}
	}elseif($action == "groups" ){
		
		$row = array();
		$error = array();
		$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
		if ($nv_Request->isset_request('submit', 'post')) {
			$row['title'] = $nv_Request->get_title('title', 'post', '');

			if (empty($row['title'])) {
				$error[] = $lang_module['error_required_title'];
			}

			if (empty($error)) {
				try {
					if (empty($row['id'])) {
						$row['groupid'] = 0;
						$row['addtime'] = 0;
						$row['adminid'] = 0;
						$row['edittime'] = 0;
						$row['userid'] = 0;

						$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_permission_groups (title, groupid, addtime, adminid, edittime, userid) VALUES (:title, :groupid, :addtime, :adminid, :edittime, :userid)');

						$stmt->bindParam(':groupid', $row['groupid'], PDO::PARAM_INT);
						$stmt->bindParam(':addtime', $row['addtime'], PDO::PARAM_INT);
						$stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
						$stmt->bindParam(':edittime', $row['edittime'], PDO::PARAM_INT);
						$stmt->bindParam(':userid', $row['userid'], PDO::PARAM_INT);

					} else {
						$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_permission_groups SET title = :title WHERE id=' . $row['id']);
					}
					$stmt->bindParam(':title', $row['title'], PDO::PARAM_STR);

					$exc = $stmt->execute();
					if ($exc) {
						$nv_Cache->delMod($module_name);
						$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_permission_groups WHERE fun=' . $row['id'])->fetch();
						$db->query("ALTER TABLE " . NV_PREFIXLANG . "_" . $module_data . "_permission ADD act_" . $row['id'] .  " TINYINT(3) NOT NULL DEFAULT '0' AFTER update_time");
						if (empty($row['id'])) {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Pergroups', ' ', $admin_info['userid']);
						} else {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Pergroups', 'ID: ' . $row['id'], $admin_info['userid']);
						}
						nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op.'/groups');
					}
				} catch(PDOException $e) {
					trigger_error($e->getMessage());
					die($e->getMessage()); //Remove this line after checks finished
				}
			}
		} elseif ($row['id'] > 0) {
			$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_permission_groups WHERE id=' . $row['id'])->fetch();
			if (empty($row)) {
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op.'/groups');
			}
		} else {
			$row['id'] = 0;
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
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_permission_groups');

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
				->order('id DESC')
				->limit($per_page)
				->offset(($page - 1) * $per_page);
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_title', '%' . $q . '%');
			}
			$sth->execute();
		}
		$xtpl = new XTemplate('permission_groups.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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
				$view['number'] = $number++;
				$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/groups&amp;id=' . $view['id'];
				$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/groups&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
				$xtpl->assign('VIEW', $view);
				$xtpl->parse('main.view.loop');
			}
			$xtpl->parse('main.view');
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

			$query = 'SELECT addtime FROM ' . NV_PREFIXLANG . '_' . $module_data . '_permission_groups WHERE id=' . $id;
			$row = $db->query($query)->fetch();
			if (isset($row['addtime']))     {
				$addtime = ($row['addtime']) ? 0 : 1;
				$query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_permission_groups SET addtime=' . intval($addtime) . ' WHERE id=' . $id;
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
				$sql = 'SELECT id FROM ' . NV_PREFIXLANG . '_' . $module_data . '_permission_groups WHERE id!=' . $id . ' ORDER BY edittime ASC';
				$result = $db->query($sql);
				$edittime = 0;
				while ($row = $result->fetch())
				{
					++$edittime;
					if ($edittime == $new_vid) ++$edittime;             $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_permission_groups SET edittime=' . $edittime . ' WHERE id=' . $row['id'];
					$db->query($sql);
				}
				$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_permission_groups SET edittime=' . $new_vid . ' WHERE id=' . $id;
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
				$edittime=0;
				$sql = 'SELECT edittime FROM ' . NV_PREFIXLANG . '_' . $module_data . '_permission_groups WHERE id =' . $db->quote($id);
				$result = $db->query($sql);
				list($edittime) = $result->fetch(3);
				
				$db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_permission_groups  WHERE id = ' . $db->quote($id));
				if ($edittime > 0)         {
					$sql = 'SELECT id, edittime FROM ' . NV_PREFIXLANG . '_' . $module_data . '_permission_groups WHERE edittime >' . $edittime;
					$result = $db->query($sql);
					while (list($id, $edittime) = $result->fetch(3))
					{
						$edittime--;
						$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_permission_groups SET edittime=' . $edittime . ' WHERE id=' . intval($id));
					}
				}
				$nv_Cache->delMod($module_name);
				nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Permission', 'ID: ' . $id, $admin_info['userid']);
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		}

		$row = array();
		$error = array();
		$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
		
		if ($nv_Request->isset_request('submit', 'post')) {
			$array_func = array();
			

			if (empty($error)) {
					foreach ($array_permission_func as $func) {
						$array_per_groups = array();
						$$array_key_groups = array();
						$$array_value_groups = array();
						foreach ($array_permission_groups as $groups) {
							 $array_per_groups ['act_' . $groups['id']]= $nv_Request->get_int($func['funccode'] . '_' . $groups['id'], 'post', 0);
							 $array_key_groups[] = 'act_' . $groups['id'] . ' = ' . $array_per_groups ['act_' . $groups['id']] ;
						}
						$array_func[$func['funccode']] = $array_per_groups;
						$exc = $db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_permission SET ' . implode(', ',  $array_key_groups) . '  WHERE funccode="' . $func['funccode'].'"');
						//print_r('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_permission SET ' . implode(', ',  $array_key_groups) . '  WHERE funccode="' . $func['funccode'].'"');
					}	
					
					if ($exc) {
						$nv_Cache->delMod($module_name);
						nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Permission', '' , $user_info['userid']);
						nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
					}
			}
		} elseif ($row['id'] > 0) {
			$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_permission_groups WHERE id=' . $row['id'])->fetch();
			if (empty($row)) {
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		} else {
			$row['id'] = 0;
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
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_permission_func');

			if (!empty($q)) {
				$db->where('title LIKE :q_title ');
			}
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_title', '%' . $q . '%');
			}
			$sth->execute();
			$num_items = $sth->fetchColumn();

			$db->select('*')
				->order('id ASC')
				->limit($per_page)
				->offset(($page - 1) * $per_page);
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_title', '%' . $q . '%');
			}
			$sth->execute();
		}

		foreach ($array_permission_groups as $value) {
			$xtpl->assign('PERMISSION', array(
				'key' => $value['id'],
				'title' => $value['title']
			));
			$xtpl->parse('main.view.permission');
		}
		foreach ($array_groupid_users as $value) {
			$xtpl->assign('OPTION', array(
				'key' => $value['group_id'],
				'title' => $value['title'],
				'selected' => ($value['group_id'] == $row['groupid']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_groupid');
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
						'selected' => ($i == $view['edittime']) ? ' selected="selected"' : ''));
					$xtpl->parse('main.view.loop.edittime_loop');
				}
				$xtpl->assign('CHECK', $view['addtime'] == 1 ? 'checked' : '');
				$view['groupid'] = $array_groupid_users[$view['groupid']]['title'];
				$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;id=' . $view['id'];
				$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
				$xtpl->assign('VIEW', $view);
				foreach ($array_permission_groups as $value) {
					$xtpl->assign('PERMISSION_VALE', array(
						'key' => $value['id'],
						'title' => $value['title'], 
						'checked' => ($array_permission[$view['funccode']]['act_' . $value['id']] == 1) ? ' checked="checked"' : ''
					));
					$xtpl->parse('main.view.loop.permission_value');
				}
				$xtpl->parse('main.view.loop');
			}
			$xtpl->parse('main.view');
		}
		$xtpl->assign('permission_groups', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op.'/groups');
		$xtpl->assign('permission_users', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . 'users');

		if (!empty($error)) {
			$xtpl->assign('ERROR', implode('<br />', $error));
			$xtpl->parse('main.error');
		}
	}
	$xtpl->parse('main');
	$contents = $xtpl->text('main');

	$page_title = $lang_module['permission'];

	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}