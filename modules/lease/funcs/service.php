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
if(defined('NV_IS_USER') && $permission[$op]){
	
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
		$row['sid'] = $nv_Request->get_int('sid', 'post,get', 0);
		if ($nv_Request->isset_request('submit', 'post')) {
			$row['servicecode'] = $nv_Request->get_title('servicecode', 'post', '');
			$row['title_vi'] = $nv_Request->get_title('title_vi', 'post', '');
			$row['title_en'] = $nv_Request->get_title('title_en', 'post', '');
			$row['typein'] = $nv_Request->get_title('typein', 'post', '');
			$row['catid'] = $nv_Request->get_int('catid', 'post', 0);
			$row['unitid'] = $nv_Request->get_int('unitid', 'post', 0);
			$row['price_usd'] = str_replace(',','',$nv_Request->get_title('price_usd', 'post', ''));
			$row['price_vnd'] = str_replace(',','',$nv_Request->get_title('price_vnd', 'post', ''));
			$row['chargeid'] = $nv_Request->get_int('chargeid', 'post', 0);
			$row['dailyreport'] = $nv_Request->get_int('dailyreport', 'post', 0);
			$row['service_main'] = $nv_Request->get_int('service_main', 'post', 0);
			$row['service_static'] = $nv_Request->get_int('service_static', 'post', 0);
			$row['note'] = $nv_Request->get_editor('note', '', NV_ALLOWED_HTML_TAGS);

			if (empty($row['title_vi'])) {
				$error[] = $lang_module['error_required_title'];
			} elseif (empty($row['catid'])) {
				$error[] = $lang_module['error_required_catid'];
			} elseif (empty($row['unitid'])) {
				$error[] = $lang_module['error_required_unitid'];
			} elseif (empty($row['chargeid'])) {
				$error[] = $lang_module['error_required_chargeid'];
			}

			if (empty($error)) {
				try {
					if (empty($row['sid'])) {
						$row['adminid'] = 0;
						$row['crtd_date'] = 0;
						$row['userid_edit'] = 0;

						$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_service (title_vi, title_en, servicecode, service_main, service_static, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, active, typein, weight, adminid, crtd_date, userid_edit, update_time) VALUES (:title_vi, :title_en, :servicecode, :service_main, :service_static, :catid, :unitid, :price_usd, :price_vnd, :chargeid, :dailyreport, :note, :active, :typein, :weight, ' . $user_info['userid'] . ', ' .  NV_CURRENTTIME. ', ' . $user_info['userid'] . ', ' .  NV_CURRENTTIME. ')');

						$stmt->bindValue(':active', 1, PDO::PARAM_INT);

						$weight = $db->query('SELECT max(weight) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service')->fetchColumn();
						$weight = intval($weight) + 1;
						$stmt->bindParam(':weight', $weight, PDO::PARAM_INT);


					} else {
						$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service SET title_vi = :title_vi, title_en = :title_en, servicecode = :servicecode, service_main = :service_main, service_static = :service_static, catid = :catid, unitid = :unitid, price_usd = :price_usd, price_vnd = :price_vnd, chargeid = :chargeid, dailyreport = :dailyreport, typein = :typein, note = :note, userid_edit = ' . $user_info['userid'] . ', update_time = ' .  NV_CURRENTTIME. ' WHERE sid=' . $row['sid']);
					}
					$stmt->bindParam(':servicecode', $row['servicecode'], PDO::PARAM_STR);
					$stmt->bindParam(':service_main', $row['service_main'], PDO::PARAM_STR);
					$stmt->bindParam(':service_static', $row['service_static'], PDO::PARAM_STR);
					$stmt->bindParam(':title_vi', $row['title_vi'], PDO::PARAM_STR);
					$stmt->bindParam(':title_en', $row['title_en'], PDO::PARAM_STR);
					$stmt->bindParam(':catid', $row['catid'], PDO::PARAM_INT);
					$stmt->bindParam(':unitid', $row['unitid'], PDO::PARAM_INT);
					$stmt->bindParam(':price_usd', $row['price_usd'], PDO::PARAM_STR);
					$stmt->bindParam(':price_vnd', $row['price_vnd'], PDO::PARAM_STR);
					$stmt->bindParam(':typein', $row['typein'], PDO::PARAM_STR);
					$stmt->bindParam(':chargeid', $row['chargeid'], PDO::PARAM_INT);
					$stmt->bindParam(':dailyreport', $row['dailyreport'], PDO::PARAM_INT);
					$stmt->bindParam(':note', $row['note'], PDO::PARAM_STR, strlen($row['note']));

					$exc = $stmt->execute();
					if ($exc) {
						$nv_Cache->delMod($module_name);
						if (empty($row['sid'])) {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Service', ' ', $user_info['userid']);
						} else {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Service', 'ID: ' . $row['sid'], $user_info['userid']);
						}
						nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
					}
				} catch(PDOException $e) {
					trigger_error($e->getMessage());
					die($e->getMessage()); //Remove this line after checks finished
				}
			}
		} elseif ($row['sid'] > 0) {
			$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service WHERE sid=' . $row['sid'])->fetch();
			if (empty($row)) {
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		} else {
			$row['sid'] = 0;
			$row['servicecode'] = '';
			$row['title_vi'] = '';
			$row['title_en'] = '';
			$row['catid'] = 0;
			$row['unitid'] = 0;
			$row['price_usd'] = '';
			$row['price_vnd'] = '';
			$row['chargeid'] = 0;
			$row['dailyreport'] = 0;
			$row['service_static'] = 0;
			$row['service_main'] = 0;
			$row['note'] = '';
		}
		

		$row['note'] = nv_htmlspecialchars(nv_editor_br2nl($row['note']));
		$row['note'] = nv_module_aleditor('note', '100%', '300px', $row['note']);

		$xtpl->assign('ROW', $row);
		foreach ($array_catid_lease as $value) {
			$xtpl->assign('OPTION', array(
				'key' => $value['cid'],
				'title' => $value['title'],
				'selected' => ($value['cid'] == $row['catid']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_catid');
		}
		foreach ($array_unitid_lease as $value) {
			$xtpl->assign('OPTION', array(
				'key' => $value['uid'],
				'title' => $value['title'],
				'selected' => ($value['uid'] == $row['unitid']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_unitid');
		}
		foreach ($array_chargeid_lease as $value) {
			$xtpl->assign('OPTION', array(
				'key' => $value['cid'],
				'title' => $value['title'],
				'selected' => ($value['cid'] == $row['chargeid']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_chargeid');
		}
		foreach ($daily_report as $key =>$value) {
			$xtpl->assign('OPTION', array(
				'key' => $key,
				'title' => $value,
				'selected' => ($key == $row['dailyreport']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.daily_report');
		}
		foreach ($array_typein_lease as $key =>$value) {
			$xtpl->assign('OPTION', array(
				'key' => $key,
				'title' => $value,
				'selected' => ($key == $row['typein']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.typein');
		}
		if($row['service_main'] == 1){
			$xtpl->assign('smchecked', 'checked="checked"');
			$xtpl->assign('sechecked', '');
		}elseif($row['service_main'] == 0){
			$xtpl->assign('smchecked', '');
			$xtpl->assign('sechecked', ' checked="checked"');
		}
		if($row['service_static'] == 1){
			$xtpl->assign('sschecked', 'checked="checked"');
			$xtpl->assign('sdchecked', '');
		}elseif($row['service_main'] == 0){
			$xtpl->assign('sschecked', '');
			$xtpl->assign('sdchecked', ' checked="checked"');
		}
	}else{
		// Change status
		if ($nv_Request->isset_request('change_status', 'post, get')) {
			$sid = $nv_Request->get_int('sid', 'post, get', 0);
			$content = 'NO_' . $sid;

			$query = 'SELECT active FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service WHERE sid=' . $sid;
			$row = $db->query($query)->fetch();
			if (isset($row['active']))     {
				$active = ($row['active']) ? 0 : 1;
				$query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service SET active=' . intval($active) . ' WHERE sid=' . $sid;
				$db->query($query);
				$content = 'OK_' . $sid;
			}
			$nv_Cache->delMod($module_name);
			include NV_ROOTDIR . '/includes/header.php';
			echo $content;
			include NV_ROOTDIR . '/includes/footer.php';
		}

		if ($nv_Request->isset_request('ajax_action', 'post')) {
			$sid = $nv_Request->get_int('sid', 'post', 0);
			$new_vid = $nv_Request->get_int('new_vid', 'post', 0);
			$content = 'NO_' . $sid;
			if ($new_vid > 0)     {
				$sql = 'SELECT sid FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service WHERE sid!=' . $sid . ' and weight !=0 ORDER BY weight ASC';
				$result = $db->query($sql);
				$update_time = 0;
				while ($row = $result->fetch())
				{
					++$update_time;
					if ($update_time == $new_vid) ++$update_time;             $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service SET weight=' . $update_time . ' WHERE sid=' . $row['sid'];
					$db->query($sql);
				}
				$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service SET weight=' . $new_vid . ' WHERE sid=' . $sid;
				$db->query($sql);
				$content = 'OK_' . $sid;
			}
			$nv_Cache->delMod($module_name);
			include NV_ROOTDIR . '/includes/header.php';
			echo $content;
			include NV_ROOTDIR . '/includes/footer.php';
		}

		if ($nv_Request->isset_request('delete_sid', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
			$sid = $nv_Request->get_int('delete_sid', 'get');
			$delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
			if ($sid > 0 and $delete_checkss == md5($sid . NV_CACHE_PREFIX . $client_info['session_id'])) {
				$update_time=0;
				$sql = 'SELECT weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service WHERE sid =' . $db->quote($sid);
				$result = $db->query($sql);
				list($update_time) = $result->fetch(3);
				$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service SET status_del=1, weight =0 WHERE sid=' . intval($sid));
				//$db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service  WHERE sid = ' . $db->quote($sid));
				if ($update_time > 0)         {
					$sql = 'SELECT sid, weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service WHERE weight >' . $update_time;
					$result = $db->query($sql);
					while (list($sid, $update_time) = $result->fetch(3))
					{
						$update_time--;
						$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service SET weight=' . $update_time . ' WHERE sid=' . intval($sid));
					}
				}
				$nv_Cache->delMod($module_name);
				nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Service', 'ID: ' . $sid, $user_info['userid']);
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
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_service');

			if (!empty($q)) {
				$db->where('title LIKE :q_title OR catid LIKE :q_catid OR unitid LIKE :q_unitid OR price_usd LIKE :q_price_usd OR price_vnd LIKE :q_price_vnd');
			}
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_title', '%' . $q . '%');
				$sth->bindValue(':q_catid', '%' . $q . '%');
				$sth->bindValue(':q_unitid', '%' . $q . '%');
				$sth->bindValue(':q_price_usd', '%' . $q . '%');
				$sth->bindValue(':q_price_vnd', '%' . $q . '%');
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
				$sth->bindValue(':q_catid', '%' . $q . '%');
				$sth->bindValue(':q_unitid', '%' . $q . '%');
				$sth->bindValue(':q_price_usd', '%' . $q . '%');
				$sth->bindValue(':q_price_vnd', '%' . $q . '%');
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
					$xtpl->parse('main.view.loop.update_time_loop');
				}
				$xtpl->assign('CHECK', $view['active'] == 1 ? 'checked' : '');
				$view['price_vnd_format'] = number_format($view['price_vnd']);
				$view['price_usd_format'] = number_format($view['price_usd']);
				$view['servicecat'] = $array_catid_lease[$view['catid']]['title'];
				$view['unitname'] = $array_unitid_lease[$view['unitid']]['title'];
				$view['chargename'] = $array_chargeid_lease[$view['chargeid']]['title'];
				$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/edit&amp;sid=' . $view['sid'];
				$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_sid=' . $view['sid'] . '&amp;delete_checkss=' . md5($view['sid'] . NV_CACHE_PREFIX . $client_info['session_id']);
				$xtpl->assign('VIEW', $view);
				if($view['status_del'] == 0 )
					$xtpl->parse('main.view.loop');
			}
			$xtpl->parse('main.view');
		}


		if (!empty($error)) {
			$xtpl->assign('ERROR', implode('<br />', $error));
			$xtpl->parse('main.error');
		}

		

		$page_title = $lang_module['service'];
	}
	$xtpl->parse('main');
	$contents = $xtpl->text('main');
	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}