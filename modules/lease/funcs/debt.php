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
		$xtpl->assign($op . '_import', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '/import'),true);
		$xtpl->assign($op . '_export', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '/export',true));
	if(	$action == "add" or $action == "edit"){
		$row = array();
		$error = array();
		$row['cid'] = $nv_Request->get_int('cid', 'post,get', 0);
		if ($nv_Request->isset_request('submit', 'post')) {
			$row['title'] = $nv_Request->get_title('title', 'post', '');
			$row['gid'] = $nv_Request->get_int('gid', 'post', 0);
			$row['address'] = $nv_Request->get_title('address', 'post', '');
			$row['mobile'] = $nv_Request->get_title('mobile', 'post', '');
			$row['fax'] = $nv_Request->get_title('fax', 'post', '');
			$row['email'] = $nv_Request->get_title('email', 'post', '');
			$row['taxcode'] = $nv_Request->get_title('taxcode', 'post', '');
			$row['person_legal'] = $nv_Request->get_title('person_legal', 'post', '');
			$row['person_legal_mobile'] = $nv_Request->get_title('person_legal_mobile', 'post', '');
			$row['vi_note'] = $nv_Request->get_editor('vi_note', '', NV_ALLOWED_HTML_TAGS);
			$row['en_note'] = $nv_Request->get_editor('en_note', '', NV_ALLOWED_HTML_TAGS);

			if (empty($row['title'])) {
				$error[] = $lang_module['error_required_title'];
			} elseif (empty($row['gid'])) {
				$error[] = $lang_module['error_required_gid'];
			}

			if (empty($error)) {
				try {
					if (empty($row['cid'])) {
						$row['year'] = date("Y",NV_CURRENTTIME);
						$company_code=$db->query("SELECT cp.* FROM " . NV_PREFIXLANG . "_" . $module_data . "_company cp LEFT JOIN " . NV_PREFIXLANG . "_" . $module_data . "_company_users cpus ON cp.cid = cpus.companyid WHERE cpus.userid = " . $user_info['userid'])->fetch();
						$row['company_code'] = $company_code['companycode'];
						$row['companyid'] = $company_code['cid'];
						$cuscode = $db->query('SELECT max(cid) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_customer')->fetchColumn();
						$cuscode = intval($cuscode) + 1;
						$row['adminid'] = $user_info['userid'];
						$row['cuscode'] = vsprintf($array_config['customer_format_code'], $cuscode).$array_config['contract_center_prefix'].$row['year'].'/'.$row['company_code'];;
						$row['crtd_date'] = NV_CURRENTTIME;
						$row['userid_edit'] = $user_info['userid'];
					
						$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_customer (cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, active, adminid, crtd_date, userid_edit, update_date) VALUES (:cuscode, :companyid, :title, :gid, :address, :mobile, :fax, :email, :taxcode, :person_legal, :person_legal_mobile, :vi_note, :en_note, :active, :adminid, :crtd_date, :userid_edit, :update_date)');

						$stmt->bindValue(':active', 1, PDO::PARAM_INT);
						$stmt->bindValue(':cuscode', $row['cuscode'], PDO::PARAM_STR);
						$stmt->bindValue(':companyid', $row['companyid'], PDO::PARAM_INT);

						$stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
						$stmt->bindParam(':crtd_date', $row['crtd_date'], PDO::PARAM_INT);
						$stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);
						$weight = $db->query('SELECT max(update_date) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_customer')->fetchColumn();
						$weight = intval($weight) + 1;
						$stmt->bindParam(':update_date', $weight, PDO::PARAM_INT);


					} else {
						$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_customer SET title = :title, gid = :gid, address = :address, mobile = :mobile, fax = :fax, email = :email, taxcode = :taxcode, person_legal = :person_legal, person_legal_mobile = :person_legal_mobile, vi_note = :vi_note, en_note = :en_note WHERE cid=' . $row['cid']);
					}
					$stmt->bindParam(':title', $row['title'], PDO::PARAM_STR);
					$stmt->bindParam(':gid', $row['gid'], PDO::PARAM_INT);
					$stmt->bindParam(':address', $row['address'], PDO::PARAM_STR);
					$stmt->bindParam(':mobile', $row['mobile'], PDO::PARAM_STR);
					$stmt->bindParam(':fax', $row['fax'], PDO::PARAM_STR);
					$stmt->bindParam(':email', $row['email'], PDO::PARAM_STR);
					$stmt->bindParam(':taxcode', $row['taxcode'], PDO::PARAM_STR);
					$stmt->bindParam(':person_legal', $row['person_legal'], PDO::PARAM_STR);
					$stmt->bindParam(':person_legal_mobile', $row['person_legal_mobile'], PDO::PARAM_STR);
					$stmt->bindParam(':vi_note', $row['vi_note'], PDO::PARAM_STR, strlen($row['vi_note']));
					$stmt->bindParam(':en_note', $row['en_note'], PDO::PARAM_STR, strlen($row['en_note']));

					$exc = $stmt->execute();
					if ($exc) {
						$nv_Cache->delMod($module_name);
						if (empty($row['cid'])) {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Customer', ' ', $user_info['userid']);
						} else {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Customer', 'ID: ' . $row['cid'], $user_info['userid']);
						}
						nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
					}
				} catch(PDOException $e) {
					trigger_error($e->getMessage());
					die($e->getMessage()); //Remove this line after checks finished
				}
			}
		} elseif ($row['cid'] > 0) {
			$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_customer WHERE cid=' . $row['cid'])->fetch();
			if (empty($row)) {
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		} else {
			$row['cid'] = 0;
			$row['title'] = '';
			$row['gid'] = 0;
			$row['address'] = '';
			$row['mobile'] = '';
			$row['fax'] = '';
			$row['email'] = '';
			$row['taxcode'] = '';
			$row['person_legal'] = '';
			$row['person_legal_mobile'] = '';
			$row['vi_note'] = '';
		}
		$row['vi_note'] = nv_htmlspecialchars(nv_editor_br2nl($row['vi_note']));
		$row['vi_note'] = nv_module_aleditor('vi_note', '100%', '300px', $row['vi_note']);
		$row['en_note'] = nv_htmlspecialchars(nv_editor_br2nl($row['en_note']));
		$row['en_note'] = nv_module_aleditor('en_note', '100%', '300px', $row['en_note']);
		$xtpl->assign('ROW', $row);

		foreach ($array_gid_lease as $value) {
			$xtpl->assign('OPTION', array(
				'key' => $value['id'],
				'title' => $value['title'],
				'selected' => ($value['id'] == $row['gid']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_gid');
		}
		$xtpl->assign('Q', $q);
		if (!empty($error)) {
			$xtpl->assign('ERROR', implode('<br />', $error));
			$xtpl->parse('main.error');
		}
	}elseif($action == "view" ){
		//print_r('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_customer WHERE cuscode="' . $array_op[2] .'"');die;
		$row = array();
		$error = array();
		$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_customer WHERE cuscode="' . str_replace("-","/",$array_op[2]) .'"')->fetch();
		if (empty($row)) {
			nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
		}
		$where='cid = ' . $row['cid'] . '';
		$db->sqlreset()
			->select('*')
			->from('' . NV_PREFIXLANG . '_' . $module_data . '_debitnote')
			->where($where);
		$sthc = $db->query($db->sql());
		$where='customerid = ' . $row['cid'] . ' AND status_payment = 1';
		$db->sqlreset()
			->select('*')
			->from('' . NV_PREFIXLANG . '_' . $module_data . '_payment')
			->where($where);
		$sthp = $db->query($db->sql());
		$total_vi = 0;
		$total_en = 0;
		while ($r = $sthp->fetch()){
			$total_vi = $total_vi+$r['total_vi'];
			$total_en = $total_en+$r['total_en'];		
		}
		$view['total_payment_vi'] = $total_vi;
		$view['total_payment_format_vi'] = number_format($total_vi,0);
		$view['total_payment_en'] = $total_en;
		$view['total_payment_format_en'] = number_format($total_en,0);
		$view['debt_total_vi'] = $view['total_vi'] - $view['total_payment_vi'];
		$view['total_debt_format_vi'] = number_format($view['debt_total_vi'],0);
		$view['debt_total_en'] = $view['total_en'] - $view['total_payment_en'];	
		$view['total_debt_format_en'] = number_format($view['debt_total_en'],0);
		$xtpl = new XTemplate('debt_view.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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

		$xtpl->assign('ROW', $row);
		while ($r = $sthc->fetch()){
			$where='debitnoteid = ' . $r['id'];
			$db->sqlreset()
				->select('*')
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_debitnote_extra')
				->where($where);
			$sth = $db->query($db->sql());
			$total_vi = 0;
			$total_en = 0;
			while ($rex = $sth->fetch()){
				$total_vi = $total_vi+$rex['total_vi'];
				$total_en = $total_en+$rex['total_en'];		
			}
			$r['total_vi'] = $total_vi;
			$r['total_format_vi'] = number_format($total_vi,0);
			$r['total_en'] = $total_en;
			$r['total_format_en'] = number_format($total_en,0);
			$where='debitnote = ' . $r['id'] . ' AND status_payment = 1';
			$db->sqlreset()
				->select('*')
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_payment')
				->where($where);
			$sthp = $db->query($db->sql());
			$total_vi = 0;
			$total_en = 0;
			while ($rp = $sthp->fetch()){
				$total_vi = $total_vi+$rp['total_vi'];
				$total_en = $total_en+$rp['total_en'];		
			}
			$r['total_payment_vi'] = $total_vi;
			$r['total_payment_format_vi'] = number_format($total_vi,0);
			$r['total_payment_en'] = $total_en;
			$r['total_payment_format_en'] = number_format($total_en,0);
			$r['debt_total_vi'] = $r['total_vi'] - $r['total_payment_vi'];
			$r['total_debt_format_vi'] = number_format($r['debt_total_vi'],0);
			$r['debt_total_en'] = $r['total_en'] - $r['total_payment_en'];	
			$r['total_debt_format_en'] = number_format($r['debt_total_en'],0);
			if (empty($r['debitnotedate'])) {
				$r['debitnotedate'] = '';
			}
			else
			{
				$r['debitnotedate'] = date('d/m/Y', $r['debitnotedate']);
			}
			if (empty($r['datefrom'])) {
				$r['datefrom'] = '';
			}
			else
			{
				$r['datefrom'] = date('d/m/Y', $r['datefrom']);
			}

			if (empty($r['dateto'])) {
				$r['dateto'] = '';
			}
			else
			{
				$r['dateto'] = date('d/m/Y', $r['dateto']);
			}
			$r['product'] = $array_pid_lease[$r['pid']]['title'];
			$r['month'] = $r['yearmonth'][0].$r['yearmonth'][1];
			$r['year'] = $r['yearmonth'][2].$r['yearmonth'][3].$r['yearmonth'][4].$r['yearmonth'][5];
			$r['link_view'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=invoice/view/' . str_replace("/","-",$r['debitcode']) . '';
			$xtpl->assign('VIEW', $r);
			$xtpl->parse('main.loop');
			
		}
	}else{
		// Change status
		if ($nv_Request->isset_request('change_status', 'post, get')) {
			$cid = $nv_Request->get_int('cid', 'post, get', 0);
			$content = 'NO_' . $cid;

			$query = 'SELECT active FROM ' . NV_PREFIXLANG . '_' . $module_data . '_customer WHERE cid=' . $cid;
			$row = $db->query($query)->fetch();
			if (isset($row['active']))     {
				$active = ($row['active']) ? 0 : 1;
				$query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_customer SET active=' . intval($active) . ' WHERE cid=' . $cid;
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
				$sql = 'SELECT cid FROM ' . NV_PREFIXLANG . '_' . $module_data . '_customer WHERE cid!=' . $cid . ' ORDER BY update_date ASC';
				$result = $db->query($sql);
				$update_date = 0;
				while ($row = $result->fetch())
				{
					++$update_date;
					if ($update_date == $new_vid) ++$update_date;             $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_customer SET update_date=' . $update_date . ' WHERE cid=' . $row['cid'];
					$db->query($sql);
				}
				$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_customer SET update_date=' . $new_vid . ' WHERE cid=' . $cid;
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
				$update_date=0;
				$sql = 'SELECT update_date FROM ' . NV_PREFIXLANG . '_' . $module_data . '_customer WHERE cid =' . $db->quote($cid);
				$result = $db->query($sql);
				list($update_date) = $result->fetch(3);
				
				$db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_customer  WHERE cid = ' . $db->quote($cid));
				if ($update_date > 0)         {
					$sql = 'SELECT cid, update_date FROM ' . NV_PREFIXLANG . '_' . $module_data . '_customer WHERE update_date >' . $update_date;
					$result = $db->query($sql);
					while (list($cid, $update_date) = $result->fetch(3))
					{
						$update_date--;
						$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_customer SET update_date=' . $update_date . ' WHERE cid=' . intval($cid));
					}
				}
				$nv_Cache->delMod($module_name);
				nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Customer', 'ID: ' . $cid, $user_info['userid']);
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		}

	

		
		$array_gid_lease = array();
		$_sql = 'SELECT id,title FROM vidoco_vi_lease_groups_customer';
		$_query = $db->query($_sql);
		while ($_row = $_query->fetch()) {
			$array_gid_lease[$_row['id']] = $_row;
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
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_customer');

			if (!empty($q)) {
				$db->where('title LIKE :q_title OR gid LIKE :q_gid OR address LIKE :q_address OR mobile LIKE :q_mobile OR email LIKE :q_email OR taxcode LIKE :q_taxcode');
			}
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_title', '%' . $q . '%');
				$sth->bindValue(':q_gid', '%' . $q . '%');
				$sth->bindValue(':q_address', '%' . $q . '%');
				$sth->bindValue(':q_mobile', '%' . $q . '%');
				$sth->bindValue(':q_email', '%' . $q . '%');
				$sth->bindValue(':q_taxcode', '%' . $q . '%');
			}
			$sth->execute();
			$num_items = $sth->fetchColumn();

			$db->select('*')
				->order('update_date ASC')
				->limit($per_page)
				->offset(($page - 1) * $per_page);
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_title', '%' . $q . '%');
				$sth->bindValue(':q_gid', '%' . $q . '%');
				$sth->bindValue(':q_address', '%' . $q . '%');
				$sth->bindValue(':q_mobile', '%' . $q . '%');
				$sth->bindValue(':q_email', '%' . $q . '%');
				$sth->bindValue(':q_taxcode', '%' . $q . '%');
			}
			$sth->execute();
		}


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
				$where='cid = ' . $view['cid'];
				$db->sqlreset()
					->select('*')
					->from('' . NV_PREFIXLANG . '_' . $module_data . '_debitnote_extra')
					->where($where);
				$sthex = $db->query($db->sql());
				$total_vi = 0;
				$total_en = 0;
				while ($r = $sthex->fetch()){
					$total_vi = $total_vi+$r['total_vi'];
					$total_en = $total_en+$r['total_en'];		
				}
				$view['total_vi'] = $total_vi;
				$view['total_format_vi'] = number_format($total_vi,0);
				$view['total_en'] = $total_en;
				$view['total_format_en'] = number_format($total_en,0);
				$where='customerid = ' . $view['cid'] . ' AND status_payment = 1';
				$db->sqlreset()
					->select('*')
					->from('' . NV_PREFIXLANG . '_' . $module_data . '_payment')
					->where($where);
				$sthp = $db->query($db->sql());
				$total_vi = 0;
				$total_en = 0;
				while ($r = $sthp->fetch()){
					$total_vi = $total_vi+$r['total_vi'];
					$total_en = $total_en+$r['total_en'];		
				}
				$view['total_payment_vi'] = $total_vi;
				$view['total_payment_format_vi'] = number_format($total_vi,0);
				$view['total_payment_en'] = $total_en;
				$view['total_payment_format_en'] = number_format($total_en,0);
				$view['debt_total_vi'] = $view['total_vi'] - $view['total_payment_vi'];
				$view['total_debt_format_vi'] = number_format($view['debt_total_vi'],0);
				$view['debt_total_en'] = $view['total_en'] - $view['total_payment_en'];	
				$view['total_debt_format_en'] = number_format($view['debt_total_en'],0);
				for($i = 1; $i <= $num_items; ++$i) {
					$xtpl->assign('WEIGHT', array(
						'key' => $i,
						'title' => $i,
						'selected' => ($i == $view['update_date']) ? ' selected="selected"' : ''));
					$xtpl->parse('main.view.loop.update_date_loop');
				}
				$xtpl->assign('CHECK', $view['active'] == 1 ? 'checked' : '');
				$view['gid'] = $array_gid_lease[$view['gid']]['title'];
				$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/edit&amp;cid=' . $view['cid'];
				$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_cid=' . $view['cid'] . '&amp;delete_checkss=' . md5($view['cid'] . NV_CACHE_PREFIX . $client_info['session_id']);
				$view['link_view'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/view/' . str_replace("/","-",$view['cuscode']) . '';
				$xtpl->assign('VIEW', $view);
				$xtpl->parse('main.view.loop');
			}
			$xtpl->parse('main.view');
		}

		$page_title = $lang_module['customer'];
	}
	$xtpl->parse('main');
	$contents = $xtpl->text('main');

	

	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	//nếu chưa đăng nhập thì chuyển sang module user để login
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=users&amp;' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}
/* if ($nv_Request->isset_request('delete_id', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
    $id = $nv_Request->get_int('delete_id', 'get');
    $delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
    if ($id > 0 and $delete_checkss == md5($id . NV_CACHE_PREFIX . $client_info['session_id'])) {
        $db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_payment  WHERE id = ' . $db->quote($id));
        $nv_Cache->delMod($module_name);
        nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Dept', 'ID: ' . $id, $admin_info['userid']);
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
}

$row = array();
$error = array();
$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $row['customerid'] = $nv_Request->get_int('customerid', 'post', 0);
    $row['customername'] = $nv_Request->get_title('customername', 'post', '');
    $row['yearmonth'] = $nv_Request->get_title('yearmonth', 'post', '');
    $row['note_vi'] = $nv_Request->get_title('note_vi', 'post', '');
    $row['note_en'] = $nv_Request->get_title('note_en', 'post', '');
    $row['exchangeusd'] = $nv_Request->get_int('exchangeusd', 'post', 0);
    $row['total_vi'] = $nv_Request->get_title('total_vi', 'post', '');
    $row['total_en'] = $nv_Request->get_title('total_en', 'post', '');

    if (empty($error)) {
        try {
            if (empty($row['id'])) {
                $row['debitnote'] = 0;
                $row['addtime'] = 0;
                $row['status_payment'] = -1;
                $row['adminid'] = 0;

                $stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_payment (debitnote, customerid, customername, yearmonth, addtime, note_vi, note_en, exchangeusd, total_vi, total_en, status_payment, adminid) VALUES (:debitnote, :customerid, :customername, :yearmonth, :addtime, :note_vi, :note_en, :exchangeusd, :total_vi, :total_en, :status_payment, :adminid)');

                $stmt->bindParam(':debitnote', $row['debitnote'], PDO::PARAM_INT);
                $stmt->bindParam(':addtime', $row['addtime'], PDO::PARAM_INT);
                $stmt->bindParam(':status_payment', $row['status_payment'], PDO::PARAM_INT);
                $stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);

            } else {
                $stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_payment SET customerid = :customerid, customername = :customername, yearmonth = :yearmonth, note_vi = :note_vi, note_en = :note_en, exchangeusd = :exchangeusd, total_vi = :total_vi, total_en = :total_en WHERE id=' . $row['id']);
            }
            $stmt->bindParam(':customerid', $row['customerid'], PDO::PARAM_INT);
            $stmt->bindParam(':customername', $row['customername'], PDO::PARAM_STR);
            $stmt->bindParam(':yearmonth', $row['yearmonth'], PDO::PARAM_STR);
            $stmt->bindParam(':note_vi', $row['note_vi'], PDO::PARAM_STR);
            $stmt->bindParam(':note_en', $row['note_en'], PDO::PARAM_STR);
            $stmt->bindParam(':exchangeusd', $row['exchangeusd'], PDO::PARAM_INT);
            $stmt->bindParam(':total_vi', $row['total_vi'], PDO::PARAM_STR);
            $stmt->bindParam(':total_en', $row['total_en'], PDO::PARAM_STR);

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['id'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Dept', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Dept', 'ID: ' . $row['id'], $admin_info['userid']);
                }
                nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_payment WHERE id=' . $row['id'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
} else {
    $row['id'] = 0;
    $row['customerid'] = 0;
    $row['customername'] = '';
    $row['yearmonth'] = '';
    $row['note_vi'] = '';
    $row['note_en'] = '';
    $row['exchangeusd'] = 1;
    $row['total_vi'] = '';
    $row['total_en'] = '';
}
$array_debitnote_lease = array();
$_sql = 'SELECT id,debitcode FROM vidoco_vi_lease_debitnote';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_debitnote_lease[$_row['id']] = $_row;
}

$array_customerid_lease = array();
$_sql = 'SELECT cid,title FROM vidoco_vi_lease_customer';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_customerid_lease[$_row['cid']] = $_row;
}


$array_yearmonth = array();
$array_yearmonth[092021] = '092021';
$xtpl = new XTemplate('dept.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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

foreach ($array_debitnote_lease as $value) {
    $xtpl->assign('OPTION', array(
        'key' => $value['id'],
        'title' => $value['debitcode'],
        'selected' => ($value['id'] == $row['debitnote']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_debitnote');
}
foreach ($array_customerid_lease as $value) {
    $xtpl->assign('OPTION', array(
        'key' => $value['cid'],
        'title' => $value['title'],
        'selected' => ($value['cid'] == $row['customerid']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_customerid');
}

foreach ($array_yearmonth as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'selected' => ($key == $row['yearmonth']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_yearmonth');
}

if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['dept'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
 */