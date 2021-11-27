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
		$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
		if ($nv_Request->isset_request('submit', 'post')) {
			$row['pid'] = $nv_Request->get_int('pid', 'post', 0);
			$row['cid'] = $nv_Request->get_int('cid', 'post', 0);
			$row['month'] = $nv_Request->get_int('month', 'post', 0);
			$row['year'] = $nv_Request->get_int('year', 'post', 0);
			$row['yearmonth'] = $row['month'].$row['year'];
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
			$row['pricevnd'] = str_replace(',','',$nv_Request->get_title('pricevnd', 'post', ''));
			$row['priceusd'] = str_replace(',','',$nv_Request->get_title('priceusd', 'post', ''));
			$row['amount'] = str_replace(',','',$nv_Request->get_title('amount', 'post', ''));
			$row['totalvnd'] = str_replace(',','',$nv_Request->get_title('totalvnd', 'post', ''));
			$row['totalusd'] = str_replace(',','',$nv_Request->get_title('totalusd', 'post', ''));
			$row['note'] = $nv_Request->get_editor('note', '', NV_ALLOWED_HTML_TAGS);

			if (empty($row['pid'])) {
				$error[] = $lang_module['error_required_pid'];
			} elseif (empty($row['cid'])) {
				$error[] = $lang_module['error_required_cid'];
			} elseif (empty($row['yearmonth'])) {
				$error[] = $lang_module['error_required_yearmonth'];
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

						$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_service_extra (pid, cid, yearmonth, datefrom, dateto, sid, pricevnd, priceusd, amount, totalvnd, totalusd, note, active, userid_edit, update_date, adminid, crt_date, weight) VALUES (:pid, :cid, :yearmonth, :datefrom, :dateto, :sid, :pricevnd, :priceusd, :amount, :totalvnd, :totalusd, :note, 1, 0, 0, ' . intval($user_info['userid']) . ', ' . NV_CURRENTTIME . ', :weight)');

						$stmt->bindParam(':weight', $row['weight'], PDO::PARAM_INT);

					} else {
						$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service_extra SET  datefrom = :datefrom, dateto = :dateto, sid = :sid, pricevnd = :pricevnd, priceusd = :priceusd, amount = :amount, totalvnd = :totalvnd, totalusd = :totalusd, note = :note, userid_edit = ' . intval($user_info['userid']) . ', update_date = ' . NV_CURRENTTIME . ' WHERE pid = :pid and cid = :cid and yearmonth = :yearmonth and id=' . $row['id']);
					}
					$stmt->bindParam(':pid', $row['pid'], PDO::PARAM_INT);
					$stmt->bindParam(':cid', $row['cid'], PDO::PARAM_INT);
					$stmt->bindParam(':yearmonth', $row['yearmonth'], PDO::PARAM_INT);
					$stmt->bindParam(':datefrom', $row['datefrom'], PDO::PARAM_INT);
					$stmt->bindParam(':dateto', $row['dateto'], PDO::PARAM_INT);
					$stmt->bindParam(':sid', $row['sid'], PDO::PARAM_INT);
					$stmt->bindParam(':pricevnd', $row['pricevnd'], PDO::PARAM_STR);
					$stmt->bindParam(':priceusd', $row['priceusd'], PDO::PARAM_STR);
					$stmt->bindParam(':amount', $row['amount'], PDO::PARAM_STR);
					$stmt->bindParam(':totalvnd', $row['totalvnd'], PDO::PARAM_STR);
					$stmt->bindParam(':totalusd', $row['totalusd'], PDO::PARAM_STR);
					$stmt->bindParam(':note', $row['note'], PDO::PARAM_STR, strlen($row['note']));

					$exc = $stmt->execute();
					if ($exc) {
						$nv_Cache->delMod($module_name);
						if (empty($row['id'])) {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Serviceextra_add', ' ', $user_info['userid']);
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
			$row['mount'] = $row['yearmonth'][0].$row['yearmonth'][1];
			$row['year'] = $row['yearmonth'][2].$row['yearmonth'][3].$row['yearmonth'][4].$row['yearmonth'][5];
		} else {
			$row['id'] = 0;
			$row['pid'] = 0;
			$row['cid'] = 0;
			$row['month'] = date("m",NV_CURRENTTIME);
			$row['year'] = date("Y",NV_CURRENTTIME);
			$row['datefrom'] = date("d/m/Y",NV_CURRENTTIME);
			$row['dateto'] = date("d/m/Y",NV_CURRENTTIME);
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

		

		$row['note'] = nv_htmlspecialchars(nv_editor_br2nl($row['note']));
		$row['note'] = nv_module_aleditor('note', '100%', '300px', $row['note']);
		$xtpl->assign('ROW', $row);

		$array_pid_contract_lease = array();
		$_sql = 'SELECT p.* FROM ' .NV_PREFIXLANG . '_' . $module_data . '_contract c LEFT JOIN ' .NV_PREFIXLANG . '_' . $module_data . '_product p ON p.pid = c.pid WHERE c.active = 1 AND p.active = 1 GROUP BY p.pid';
		$_query = $db->query($_sql);
		while ($_row = $_query->fetch()) {
			$array_pid_contract_lease[$_row['pid']] = $_row;
		}
		foreach ($array_pid_contract_lease as $value) {
			$xtpl->assign('OPTION', array(
				'key' => $value['pid'],
				'title' => $value['title_vi'],
				'selected' => ($value['pid'] == $row['pid']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_pid');
			$xtpl->parse('main.select_pid_en');
		}
		foreach ($array_sid_lease as $value) {
			if($value['service_main'] != 1){
				$xtpl->assign('OPTION', array(
					'key' => $value['sid'],
					'title' => $value['title_vi'],
					'selected' => ($value['sid'] == $row['sid']) ? ' selected="selected"' : ''
				));
				$xtpl->parse('main.select_sid');
			}
		}
		
		foreach ($array_month as $key => $title) {
			$xtpl->assign('OPTION', array(
				'key' => $key,
				'title' => $title,
				'selected' => ($key == $row['month']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_month');
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
				nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Serviceextra', 'ID: ' . $id, $user_info['userid']);
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		}

		

		$q = $nv_Request->get_title('q', 'post,get');
		$pid = $nv_Request->get_int('pid', 'post,get', 0);
		$cid = $nv_Request->get_int('cid', 'post,get', 0);
		$sid = $nv_Request->get_int('sid', 'post,get', 0);
		$month = $nv_Request->get_int('month', 'post,get', 0);
		$year = $nv_Request->get_int('year', 'post,get', 0);
		$yearmonth = $month.$year;
		$where = '';
		if($cid > 0){
			$where .= ' AND cid = ' . $cid ;
		}
		if($sid > 0){
			$where .= ' AND sid = ' . $sid;
		}
		if($pid > 0){
			$where .= ' AND pid = ' . $pid . ' ';
		}
		if($month > 0 && $year > 0){
			$where .= 'AND yearmonth = "' . $yearmonth . '"';
		}
		
		// Fetch Limit
		$show_view = false;
		if (!$nv_Request->isset_request('id', 'post,get')) {
			$show_view = true;
			$per_page = 20;
			$page = $nv_Request->get_int('page', 'post,get', 1);
			$db->sqlreset()
				->select('COUNT(*)')
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_service_extra');

			
				$db->where(' 1 ' . $where);
			
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
			}
			
			$sth->execute();

			$num_items = $sth->fetchColumn();

			$db->select('*')
				->order('weight ASC')
				->limit($per_page)
				->offset(($page - 1) * $per_page);
			$sth = $db->prepare($db->sql());
		
			if (!empty($q)) {
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
				$xtpl->assign('CHECK', $view['active'] == 1 ? 'checked' : '');
				$view['datefrom_format'] = (empty($view['datefrom'])) ? '' : nv_date('d/m/Y', $view['datefrom']);
				$view['dateto_format'] = (empty($view['dateto'])) ? '' : nv_date('d/m/Y', $view['dateto']);
				$view['mount'] = $view['yearmonth'][0].$view['yearmonth'][1];
				$view['year'] = $view['yearmonth'][2].$view['yearmonth'][3].$view['yearmonth'][4].$view['yearmonth'][5];
				$view['yearmonth_format'] = $view['mount'].'/'.$view['year'];
				$view['product_name'] = $array_pid_lease[$view['pid']]['title_vi'];
				$view['customer_name'] = $array_cid_lease[$view['cid']]['title'];
				$view['service_name'] = $array_sid_lease[$view['sid']]['title_vi'];
				$view['invoice_status'] = $array_invoice_status_lease[$view['invoice']]['title_vi'];
				$view['totalvnd_format'] = number_format($view['totalvnd']);
				$view['totalusd_format'] = number_format($view['totalusd']);
				$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/edit&amp;id=' . $view['id'];
				$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
				$xtpl->assign('VIEW', $view);
				$xtpl->parse('main.view.loop');
			}
			foreach ($array_pid_lease as $value) {
				$xtpl->assign('OPTION', array(
					'key' => $value['pid'],
					'title' => $value['title_vi'],
					'selected' => ($value['pid'] == $pid) ? ' selected="selected"' : ''
				));
				$xtpl->parse('main.view.select_pid');
			}
			foreach ($array_cid_lease as $value) {
				$xtpl->assign('OPTION', array(
					'key' => $value['cid'],
					'title' => $value['title'],
					'selected' => ($value['cid'] == $cid) ? ' selected="selected"' : ''
				));
				$xtpl->parse('main.view.select_cid');
			}
			foreach ($array_sid_lease as $value) {
				if($value['service_main'] != 1){
					$xtpl->assign('OPTION', array(
						'key' => $value['sid'],
						'title' => $value['title_vi'],
						'selected' => ($value['sid'] == $sid) ? ' selected="selected"' : ''
					));
					$xtpl->parse('main.view.select_sid');
				}
			}
			
			foreach ($array_month as $key => $title) {
				$xtpl->assign('OPTION', array(
					'key' => $key,
					'title' => $title,
					'selected' => ($key == $month) ? ' selected="selected"' : ''
				));
				$xtpl->parse('main.view.select_month');
			}

			for ($i=1970;$i<2050;$i++) {
				$xtpl->assign('OPTION', array(
					'key' => $i,
					'title' => $i,
					'selected' => ($i == $year) ? ' selected="selected"' : ''
				));
				$xtpl->parse('main.view.select_year');
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