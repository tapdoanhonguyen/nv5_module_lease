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
if(defined('NV_IS_USER')&& $permission[$op]){
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
		$row['rid'] = $nv_Request->get_int('rid', 'post,get', 0);
		if ($nv_Request->isset_request('submit', 'post')) {
			$row['decription'] = $nv_Request->get_title('decription', 'post', '');

			if (empty($row['decription'])) {
				$error[] = $lang_module['error_required_decription'];
			}

			if (empty($error)) {
				try {
					if (empty($row['rid'])) {
					$row['adminid'] = $user_info['userid'];
						$row['crtd_date'] = NV_CURRENTTIME;
						$row['update_date'] = NV_CURRENTTIME;
						$row['userid_edit'] = $user_info['userid'];

						$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_rent_status (decription, active, adminid, crtd_date, userid_edit, update_date) VALUES (:decription, :active, :adminid, :crtd_date, :userid_edit, :update_date)');

						$stmt->bindValue(':active', 1, PDO::PARAM_INT);

						$stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
						$stmt->bindParam(':crtd_date', $row['crtd_date'], PDO::PARAM_INT);
						$stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);
						$stmt->bindParam(':update_date', $row['update_date'] , PDO::PARAM_INT);


					} else {
						$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_rent_status SET decription = :decription, userid_edit = ' . $user_info['userid'] . ', update_date = ' . NV_CURRENTTIME . ' WHERE rid=' . $row['rid']);
					}
					$stmt->bindParam(':decription', $row['decription'], PDO::PARAM_STR);

					$exc = $stmt->execute();
					if ($exc) {
						$nv_Cache->delMod($module_name);
						if (empty($row['rid'])) {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Status', ' ', $user_info['userid']);
						} else {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Status', 'ID: ' . $row['rid'], $user_info['userid']);
						}
						nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
					}
				} catch(PDOException $e) {
					trigger_error($e->getMessage());
					die($e->getMessage()); //Remove this line after checks finished
				}
			}
		} elseif ($row['rid'] > 0) {
			$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rent_status WHERE rid=' . $row['rid'])->fetch();
			if (empty($row)) {
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		} else {
			$row['rid'] = 0;
			$row['decription'] = '';
		}
		$xtpl->assign('ROW', $row);
		$page_title = $lang_module['product_add'];
	}else{
		// Change status
		if ($nv_Request->isset_request('change_status', 'post, get')) {
			$rid = $nv_Request->get_int('rid', 'post, get', 0);
			$content = 'NO_' . $rid;

			$query = 'SELECT active FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rent_status WHERE rid=' . $rid;
			$row = $db->query($query)->fetch();
			if (isset($row['active']))     {
				$active = ($row['active']) ? 0 : 1;
				$query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_rent_status SET active=' . intval($active) . ' WHERE rid=' . $rid;
				$db->query($query);
				$content = 'OK_' . $rid;
			}
			$nv_Cache->delMod($module_name);
			include NV_ROOTDIR . '/includes/header.php';
			echo $content;
			include NV_ROOTDIR . '/includes/footer.php';
		}

		if ($nv_Request->isset_request('ajax_action', 'post')) {
			$rid = $nv_Request->get_int('rid', 'post', 0);
			$new_vid = $nv_Request->get_int('new_vid', 'post', 0);
			$content = 'NO_' . $rid;
			if ($new_vid > 0)     {
				$sql = 'SELECT rid FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rent_status WHERE rid!=' . $rid . ' AND weight!=0 ORDER BY weight ASC';
				$result = $db->query($sql);
				$update_date = 0;
				while ($row = $result->fetch())
				{
					++$update_date;
					if ($update_date == $new_vid) ++$update_date;             $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_rent_status SET weight=' . $update_date . ' WHERE rid=' . $row['rid'];
					$db->query($sql);
				}
				$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_rent_status SET weight=' . $new_vid . ' WHERE rid=' . $rid;
				$db->query($sql);
				$content = 'OK_' . $rid;
			}
			$nv_Cache->delMod($module_name);
			include NV_ROOTDIR . '/includes/header.php';
			echo $content;
			include NV_ROOTDIR . '/includes/footer.php';
		}

		if ($nv_Request->isset_request('delete_rid', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
			$rid = $nv_Request->get_int('delete_rid', 'get');
			$delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
			if ($rid > 0 and $delete_checkss == md5($rid . NV_CACHE_PREFIX . $client_info['session_id'])) {
				$update_date=0;
				$sql = 'SELECT weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rent_status WHERE rid =' . $db->quote($rid);
				$result = $db->query($sql);
				list($update_date) = $result->fetch(3);
				$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_rent_status SET status_del=1, weight =0 WHERE rid=' . intval($rid));
				//$db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rent_status  WHERE rid = ' . $db->quote($rid));
				if ($update_date > 0)         {
					$sql = 'SELECT rid, weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rent_status WHERE weight >' . $update_date;
					$result = $db->query($sql);
					while (list($rid, $update_date) = $result->fetch(3))
					{
						$update_date--;
						$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_rent_status SET weight=' . $update_date . ' WHERE rid=' . intval($rid));
					}
				}
				$nv_Cache->delMod($module_name);
				nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Status', 'ID: ' . $rid, $user_info['userid']);
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
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_rent_status');

			if (!empty($q)) {
				$db->where('decription LIKE :q_decription');
			}
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_decription', '%' . $q . '%');
			}
			$sth->execute();
			$num_items = $sth->fetchColumn();

			$db->select('*')
				->order('weight ASC')
				->limit($per_page)
				->offset(($page - 1) * $per_page);
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_decription', '%' . $q . '%');
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
					if($view['weight'] != 0){
						$xtpl->assign('WEIGHT', array(
							'key' => $i,
							'title' => $i,
							'selected' => ($i == $view['weight']) ? ' selected="selected"' : ''));
						$xtpl->parse('main.view.loop.update_date_loop');
					}
				}
				$xtpl->assign('CHECK', $view['active'] == 1 ? 'checked' : '');
				$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/edit&amp;rid=' . $view['rid'];
				$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_rid=' . $view['rid'] . '&amp;delete_checkss=' . md5($view['rid'] . NV_CACHE_PREFIX . $client_info['session_id']);
				if($view['maindefault'] ==1)
					$view['maindefault_value']=$lang_module['maindefault_choose'];
				else
					$view['maindefault_value']='';
				$xtpl->assign('VIEW', $view);
				if($view['status_del'] == 0 )
					$xtpl->parse('main.view.loop');
			}
			
				$xtpl->parse('main.view');
		}


		
	}
	$xtpl->parse('main');
	$contents = $xtpl->text('main');

	$page_title = $lang_module['status'];

	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}