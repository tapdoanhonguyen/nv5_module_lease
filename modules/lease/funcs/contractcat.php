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
			$ciđ = $nv_Request->get_int('ciđ', 'post, get', 0);
			$content = 'NO_' . $ciđ;

			$query = 'SELECT active FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract_cat WHERE ciđ=' . $ciđ;
			$row = $db->query($query)->fetch();
			if (isset($row['active']))     {
				$active = ($row['active']) ? 0 : 1;
				$query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_contract_cat SET active=' . intval($active) . ' WHERE ciđ=' . $ciđ;
				$db->query($query);
				$content = 'OK_' . $ciđ;
			}
			$nv_Cache->delMod($module_name);
			include NV_ROOTDIR . '/includes/header.php';
			echo $content;
			include NV_ROOTDIR . '/includes/footer.php';
		}

		if ($nv_Request->isset_request('ajax_action', 'post')) {
			$ciđ = $nv_Request->get_int('ciđ', 'post', 0);
			$new_vid = $nv_Request->get_int('new_vid', 'post', 0);
			$content = 'NO_' . $ciđ;
			if ($new_vid > 0)     {
				$sql = 'SELECT ciđ FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract_cat WHERE ciđ!=' . $ciđ . ' ORDER BY weight ASC';
				$result = $db->query($sql);
				$weight = 0;
				while ($row = $result->fetch())
				{
					++$weight;
					if ($weight == $new_vid) ++$weight;             $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_contract_cat SET weight=' . $weight . ' WHERE ciđ=' . $row['ciđ'];
					$db->query($sql);
				}
				$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_contract_cat SET weight=' . $new_vid . ' WHERE ciđ=' . $ciđ;
				$db->query($sql);
				$content = 'OK_' . $ciđ;
			}
			$nv_Cache->delMod($module_name);
			include NV_ROOTDIR . '/includes/header.php';
			echo $content;
			include NV_ROOTDIR . '/includes/footer.php';
		}

		if ($nv_Request->isset_request('delete_ciđ', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
			$ciđ = $nv_Request->get_int('delete_ciđ', 'get');
			$delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
			if ($ciđ > 0 and $delete_checkss == md5($ciđ . NV_CACHE_PREFIX . $client_info['session_id'])) {
				$weight=0;
				$sql = 'SELECT weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract_cat WHERE ciđ =' . $db->quote($ciđ);
				$result = $db->query($sql);
				list($weight) = $result->fetch(3);
				
				$db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract_cat  WHERE ciđ = ' . $db->quote($ciđ));
				if ($weight > 0)         {
					$sql = 'SELECT ciđ, weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract_cat WHERE weight >' . $weight;
					$result = $db->query($sql);
					while (list($ciđ, $weight) = $result->fetch(3))
					{
						$weight--;
						$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_contract_cat SET weight=' . $weight . ' WHERE ciđ=' . intval($ciđ));
					}
				}
				$nv_Cache->delMod($module_name);
				nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Contractcat', 'ID: ' . $ciđ, $admin_info['userid']);
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		}

		$row = array();
		$error = array();
		$array_parentid_lease = array();
		$_sql = 'SELECT ciđ,title FROM vidoco_vi_lease_contract_cat';
		$_query = $db->query($_sql);
		while ($_row = $_query->fetch()) {
			$array_parentid_lease[$_row['ciđ']] = $_row;
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
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_contract_cat');

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
				->order('weight ASC')
				->limit($per_page)
				->offset(($page - 1) * $per_page);
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_title', '%' . $q . '%');
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
				$view['parentid'] = $array_parentid_lease[$view['parentid']]['title'];
				$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;ciđ=' . $view['ciđ'];
				$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_ciđ=' . $view['ciđ'] . '&amp;delete_checkss=' . md5($view['ciđ'] . NV_CACHE_PREFIX . $client_info['session_id']);
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

	$page_title = $lang_module['contractcat'];

	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}