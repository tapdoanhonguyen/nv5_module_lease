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
		$xtpl->assign('PRODUCT_ADD', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=product/add'),true);
		$xtpl->assign('PRODUCT_IMPORT', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=product/import'),true);
		$xtpl->assign('PRODUCT_EXPORT', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=product/export',true));
		
	if(	$action == "add" or $action == "edit"){
	}elseif(	$action == "payment" ){
		$row['id'] = $nv_Request->get_int('id', 'post, get', 0);
		
		$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote WHERE id=' . $row['id'])->fetch();
		if ($nv_Request->isset_request('submit', 'post, get')) {	
			$row['payment_price'] = $nv_Request->get_int('payment_price', 'post', 0);
			$row['money_type'] = $nv_Request->get_title('money_type', 'post', 'VND');
			$where='debitnoteid = ' . $row['id'];
			$db->sqlreset()
				->select('*')
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_debitnote_extra')
				->where($where);
			$sth = $db->query($db->sql());
			$total_vi = 0;
			$total_en = 0;
			while ($r = $sth->fetch()){
				$total_vi = $total_vi+$r['total_vi'];
				$total_en = $total_en+$r['total_en'];		
			}
			$row['total_vi'] = $total_vi;
			$row['total_en'] = $total_en;
			$row['customername'] = $array_cid_lease[$row['cid']]['title'];
			if($row['payment_price'] == $row['total_vi']){
				$status = 4;
			}else{
				$status = 3;
			}
			if($row['money_type'] == 'USD'){
				$row['payment_price_en'] = $row['payment_price'];
				$row['payment_price_vi'] = $row['payment_price_en']*$row['exchangeusd'];
			}else{
				$row['payment_price_vi'] = $row['payment_price'];
				$row['payment_price_en'] = $row['payment_price_vi']/$row['exchangeusd'];
			}
			if (empty($error)) {
				try {
					$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_payment (id, debitnote, customerid, customername, yearmonth, addtime, note_vi, note_en, exchangeusd, total_vi, total_en, adminid, crt_date, userid_edit, update_date, status_payment) VALUES (NULL,:debitnote, :customerid, :customername, :yearmonth, ' . NV_CURRENTTIME . ', :note_vi, :note_en, :exchangeusd, :total_vi, :total_en, :adminid, ' . NV_CURRENTTIME . ', :userid_edit, ' . NV_CURRENTTIME . ', 1)');
					$stmt->bindParam(':adminid', $user_info['userid'], PDO::PARAM_INT);
					$stmt->bindParam(':debitnote', $row['id'], PDO::PARAM_INT);
					$stmt->bindParam(':customerid', $row['cid'], PDO::PARAM_INT);
					$stmt->bindParam(':customername', $row['customername'], PDO::PARAM_STR);
					$stmt->bindParam(':yearmonth', $row['yearmonth'], PDO::PARAM_STR);
					$stmt->bindParam(':note_vi', $row['note_vi'], PDO::PARAM_STR, strlen($row['note_vi']));
					$stmt->bindParam(':note_en', $row['note_en'], PDO::PARAM_STR, strlen($row['note_en']));
					$stmt->bindParam(':exchangeusd', $row['exchangeusd'], PDO::PARAM_INT);
					$stmt->bindParam(':total_vi', $row['payment_price_vi'], PDO::PARAM_STR);
					$stmt->bindParam(':total_en', $row['payment_price_en'], PDO::PARAM_STR);
					$stmt->bindParam(':userid_edit', $user_info['userid'], PDO::PARAM_INT);
					$exc = $stmt->execute();

					if ($exc) {
						$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote SET status=' . $status . ' WHERE id=' .  $row['id'];
						$stmt = $db->prepare($sql);
						$exc = $stmt->execute();
						if (empty($row['id'])) {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Add payment_add', ' ', $user_info['userid']);
						}
						nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
					}	
				} catch(PDOException $e) {
					trigger_error($e->getMessage());
					die($e->getMessage()); //Remove this line after checks finished
				}
			
			}
			die;
		}
		if (empty($row)) {
			nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
		}
		if (empty($row['debitnotedate'])) {
			$row['debitnotedate'] = '';
		}
		else
		{
			$row['debitnotedate'] = date('d/m/Y', $row['debitnotedate']);
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
		$row['month'] = $row['yearmonth'][0].$row['yearmonth'][1];
		$row['year'] = $row['yearmonth'][2].$row['yearmonth'][3].$row['yearmonth'][4].$row['yearmonth'][5];
		$where ="debitnoteid= ". $row['id'] ;
	
			$db->sqlreset()
			->select('*')
			->from('' . NV_PREFIXLANG . '_' . $module_data . '_debitnote_extra')
			->order('service_main DESC')
			->where($where);
		$sth = $db->query($db->sql());

		
		$xtpl->assign('ROW', $row);
			$total_vi = 0;
			$total_en = 0;

		
		
		
		$xtpl->assign('ROW', $row);
			$total_vi = 0;
			$total_en = 0;
		foreach ($array_money_type as $key=>$value){
			$option = array(
				'key' => $key,
				'title' => $value
			);
			$xtpl->assign('OPTION', $option);
			$xtpl->parse('main.select_money_type');
		}
		
		while ($r = $sth->fetch()){
			
			$r['service'] =  $array_sid_lease[$r['serviceid']]['title_vi'];
			$r['datefrom'] =  date('d/m/Y', $r['datefrom']);
			$r['dateto'] =  date('d/m/Y', $r['dateto']);
			$r['price_vi'] = number_format($r['price_vi']);
			$r['price_en'] = number_format($r['price_en']);
			$total_vi += $r['total_vi'];
			$total_en += $r['total_en'];
			$r['total_vi'] = number_format($r['total_vi']);
			$r['total_en'] = number_format($r['total_en']);
			
			
			$xtpl->assign('DBN', $r);
			$xtpl->parse('main.service_vi');
			$xtpl->parse('main.service_en');
		}
		$xtpl->assign('total_vi', number_format($total_vi));
		$xtpl->assign('total_en', number_format($total_en));
		$xtpl->parse('main.payment');
	}else{
		// Change status
		if ($nv_Request->isset_request('change_status', 'post, get')) {
			$id = $nv_Request->get_int('id', 'post, get', 0);
			$content = 'NO_' . $id;

			$query = 'SELECT active FROM ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote WHERE id=' . $id;
			$row = $db->query($query)->fetch();
			if (isset($row['active']))     {
				$active = ($row['active']) ? 0 : 1;
				$query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote SET active=' . intval($active) . ' WHERE id=' . $id;
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
				$sql = 'SELECT id FROM ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote WHERE id!=' . $id . ' ORDER BY weight ASC';
				$result = $db->query($sql);
				$weight = 0;
				while ($row = $result->fetch())
				{
					++$weight;
					if ($weight == $new_vid) ++$weight;             $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote SET weight=' . $weight . ' WHERE id=' . $row['id'];
					$db->query($sql);
				}
				$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote SET weight=' . $new_vid . ' WHERE id=' . $id;
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
				$sql = 'SELECT weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote WHERE id =' . $db->quote($id);
				$result = $db->query($sql);
				list($weight) = $result->fetch(3);
				
				//$db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote  WHERE id = ' . $db->quote($id));
				if ($weight > 0)         {
					$sql = 'SELECT id, weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote WHERE weight >' . $weight;
					$result = $db->query($sql);
					while (list($id, $weight) = $result->fetch(3))
					{
						$weight--;
						$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote SET weight=' . $weight . ' WHERE id=' . intval($id));
					}
				}
				$nv_Cache->delMod($module_name);
				nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Receipt', 'ID: ' . $id, $admin_info['userid']);
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		}

		$row = array();
		$error = array();

		$q = $nv_Request->get_title('q', 'post,get');

		// Fetch Limit
		$show_view = false;
		if (!$nv_Request->isset_request('id', 'post,get')) {
			$show_view = true;
			$per_page = 20;
			$page = $nv_Request->get_int('page', 'post,get', 1);
			$db->sqlreset()
				->select('COUNT(*)')
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_debitnote');

			if (!empty($q)) {
				$db->where('pid LIKE :q_pid OR cid LIKE :q_cid OR yearmonth LIKE :q_yearmonth OR debitnotedate LIKE :q_debitnotedate OR datefrom LIKE :q_datefrom OR dateto LIKE :q_dateto OR recipients_vi LIKE :q_recipients_vi OR recipients_en LIKE :q_recipients_en OR companyid LIKE :q_companyid OR comapyname_vi LIKE :q_comapyname_vi OR comapyname_en LIKE :q_comapyname_en OR manager_name_vi LIKE :q_manager_name_vi OR manager_name_en LIKE :q_manager_name_en OR active LIKE :q_active');
			}
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_pid', '%' . $q . '%');
				$sth->bindValue(':q_cid', '%' . $q . '%');
				$sth->bindValue(':q_yearmonth', '%' . $q . '%');
				$sth->bindValue(':q_debitnotedate', '%' . $q . '%');
				$sth->bindValue(':q_datefrom', '%' . $q . '%');
				$sth->bindValue(':q_dateto', '%' . $q . '%');
				$sth->bindValue(':q_recipients_vi', '%' . $q . '%');
				$sth->bindValue(':q_recipients_en', '%' . $q . '%');
				$sth->bindValue(':q_companyid', '%' . $q . '%');
				$sth->bindValue(':q_comapyname_vi', '%' . $q . '%');
				$sth->bindValue(':q_comapyname_en', '%' . $q . '%');
				$sth->bindValue(':q_manager_name_vi', '%' . $q . '%');
				$sth->bindValue(':q_manager_name_en', '%' . $q . '%');
				$sth->bindValue(':q_active', '%' . $q . '%');
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
				$sth->bindValue(':q_debitnotedate', '%' . $q . '%');
				$sth->bindValue(':q_datefrom', '%' . $q . '%');
				$sth->bindValue(':q_dateto', '%' . $q . '%');
				$sth->bindValue(':q_recipients_vi', '%' . $q . '%');
				$sth->bindValue(':q_recipients_en', '%' . $q . '%');
				$sth->bindValue(':q_companyid', '%' . $q . '%');
				$sth->bindValue(':q_comapyname_vi', '%' . $q . '%');
				$sth->bindValue(':q_comapyname_en', '%' . $q . '%');
				$sth->bindValue(':q_manager_name_vi', '%' . $q . '%');
				$sth->bindValue(':q_manager_name_en', '%' . $q . '%');
				$sth->bindValue(':q_active', '%' . $q . '%');
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
				
				$view['month'] = date("m",NV_CURRENTTIME);
				$view['year'] = date("Y",NV_CURRENTTIME);
				$view['datefrom'] = date("d/m/Y",NV_CURRENTTIME);
				$view['dateto'] = date("d/m/Y",NV_CURRENTTIME);
				$view['debitnotedate'] = date("d/m/Y",NV_CURRENTTIME);
				$view['customer'] = $array_cid_lease[$view['cid']]['title'];
				$view['product'] = $array_pid_lease[$view['pid']]['title_vi'];
				for($i = 1; $i <= $num_items; ++$i) {
					$xtpl->assign('WEIGHT', array(
						'key' => $i,
						'title' => $i,
						'selected' => ($i == $view['weight']) ? ' selected="selected"' : ''));
					$xtpl->parse('main.view.loop.weight_loop');
				}
				$xtpl->assign('CHECK', $view['active'] == 1 ? 'checked' : '');
				$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;id=' . $view['id'];
				$view['link_payment'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/payment&amp;id=' . $view['id'];
				$xtpl->assign('VIEW', $view);
				$xtpl->parse('main.view.loop.payment');
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

	$page_title = $lang_module['receipt'];

	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}