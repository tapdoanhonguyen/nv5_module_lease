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
//them code bắt buộc đăng nhập thi mới cho sử dụng chức năng
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
		$xtpl->assign($op . '_import', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '/import'),true);
		$xtpl->assign($op . '_export', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '/export',true));
	if(	$action == "add" or $action == "edit"){
		$row = array();
		$error = array();
		$row['cid'] = $nv_Request->get_int('cid', 'post,get', 0);
		if ($nv_Request->isset_request('submit', 'post')) {
			$row['title'] = $nv_Request->get_title('title', 'post', '');
			$row['cuscode'] = $nv_Request->get_title('cuscode', 'post', '');
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
						if($row['cuscode'] == ''){
							$cuscode = $db->query('SELECT max(cid) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_customer')->fetchColumn();
							$cuscode = intval($cuscode) + 1;
							$row['cuscode'] = vsprintf($array_config['customer_format_code'], $cuscode).$array_config['contract_center_prefix'].$row['year'].'/'.$row['company_code'];;
						}
						$row['adminid'] = $user_info['userid'];
						
						$row['crtd_date'] = NV_CURRENTTIME;
						$row['update_date'] = NV_CURRENTTIME;
						$row['userid_edit'] = $user_info['userid'];
					
						$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_customer (cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, active, weight, adminid, crtd_date, userid_edit, update_date, status_del) VALUES (:cuscode, :companyid, :title, :gid, :address, :mobile, :fax, :email, :taxcode, :person_legal, :person_legal_mobile, :vi_note, :en_note, :active, :weight, ' . $user_info['userid'] . ', ' .  NV_CURRENTTIME. ', ' . $user_info['userid'] . ', ' .  NV_CURRENTTIME. ', 0)');

						$stmt->bindValue(':active', 1, PDO::PARAM_INT);
						$stmt->bindValue(':companyid', $row['companyid'], PDO::PARAM_INT);
						$weight = $db->query('SELECT max(weight) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_customer WHERE status_del =1')->fetchColumn();
						$weight = intval($weight) + 1;
						$stmt->bindParam(':weight', $weight, PDO::PARAM_INT);


					} else {
						$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_customer SET title = :title, cuscode = :cuscode, gid = :gid, address = :address, mobile = :mobile, fax = :fax, email = :email, taxcode = :taxcode, person_legal = :person_legal, person_legal_mobile = :person_legal_mobile, vi_note = :vi_note, en_note = :en_note, userid_edit = ' . $user_info['userid'] . ', update_time = ' .  NV_CURRENTTIME. ' WHERE cid=' . $row['cid']);
					}$stmt->bindParam(':cuscode', $row['cuscode'], PDO::PARAM_STR);
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
	}elseif($action=="view"){
		
		$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_customer WHERE cuscode="' . str_replace("-","/",$array_op[2]) . '"')->fetch();
			if (empty($row)) {
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		$xtpl->assign('ROW', $row);
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
				$sql = 'SELECT cid FROM ' . NV_PREFIXLANG . '_' . $module_data . '_customer WHERE status_del= 1 AND cid!=' . $cid . ' AND weight!=0 ORDER BY weight ASC';
				$result = $db->query($sql);
				$weight = 0;
				while ($row = $result->fetch())
				{
					++$weight;
					if ($weight == $new_vid) ++$weight;             $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_customer SET weight=' . $weight . ' WHERE cid=' . $row['cid'];
					$db->query($sql);
				}
				$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_customer SET  weight=' . $new_vid . ' WHERE status_del= 1 AND  cid=' . $cid;
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
				$sql = 'SELECT weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_customer WHERE status_del= 1 AND  cid =' . $db->quote($cid);
				$result = $db->query($sql);
				list($weight) = $result->fetch(3);
				
				$db->query('UPDATE  ' . NV_PREFIXLANG . '_' . $module_data . '_customer SET status_del =1, weight =0 WHERE cid = ' . $db->quote($cid));
				if ($weight > 0)         {
					$sql = 'SELECT cid, weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_customer WHERE status_del = 1 AND weight >' . $weight;
					$result = $db->query($sql);
					while (list($cid, $weight) = $result->fetch(3))
					{
						$weight--;
						$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_customer SET weight=' . $weight . ' WHERE cid=' . intval($cid));
					}
				}
				$nv_Cache->delMod($module_name);
				nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Customer', 'ID: ' . $cid, $user_info['userid']);
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		}

	



		$q = $nv_Request->get_title('q', 'post,get');

		// Fetch Limit
		$show_view = false;
		if (!$nv_Request->isset_request('id', 'post,get')) {
			$show_view = true;
			$per_page = 2000;
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
				->order('weight ASC')
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
				
				for($i = 1; $i <= $num_items; ++$i) {
					$xtpl->assign('WEIGHT', array(
						'key' => $i,
						'title' => $i,
						'selected' => ($i == $view['weight']) ? ' selected="selected"' : ''));
					$xtpl->parse('main.view.loop.update_date_loop');
				}
				$xtpl->assign('CHECK', $view['active'] == 1 ? 'checked' : '');
				$view['gid'] = $array_gid_lease[$view['gid']]['title'];
				$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/edit&amp;cid=' . $view['cid'];
				$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_cid=' . $view['cid'] . '&amp;delete_checkss=' . md5($view['cid'] . NV_CACHE_PREFIX . $client_info['session_id']);
				$view['link_view'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/view/' . str_replace("/","-",$view['cuscode']) . '';
				$xtpl->assign('VIEW', $view);
				if($view['status_del']==0){
					$xtpl->parse('main.view.loop');
				}
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