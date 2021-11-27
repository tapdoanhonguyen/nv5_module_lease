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
			$row['month'] = $nv_Request->get_title('month', 'post', 0);
			$row['year'] = $nv_Request->get_title('year', 'post', 0);
			$row['yearmonth'] = $row['month'].$row['year'];
			if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('debitnotedate', 'post'), $m))     {
				$_hour = 0;
				$_min = 0;
				$row['debitnotedate'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
			}
			else
			{
				$row['debitnotedate'] = 0;
			}
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
			$row['areareal'] = str_replace(',','',$nv_Request->get_title('areareal', 'post', ''));
			$row['exchangeusd'] = str_replace(',','',$nv_Request->get_int('exchangeusd', 'post', 0));
			$row['recipients_vi'] = $nv_Request->get_title('recipients_vi', 'post', '');
			$row['recipients_en'] = $nv_Request->get_title('recipients_en', 'post', '');
			$row['explain_vi'] = $nv_Request->get_title('explain_vi', 'post', '');
			$row['explain_en'] = $nv_Request->get_title('explain_en', 'post', '');
			$row['account_bank_vi'] = $nv_Request->get_title('account_bank_vi', 'post', '');
			$row['account_bank_en'] = $nv_Request->get_title('account_bank_en', 'post', '');
			$row['holding_vi'] = $nv_Request->get_title('holding_vi', 'post', '');
			$row['holding_en'] = $nv_Request->get_title('holding_en', 'post', '');
			$row['bank_name_vi'] = $nv_Request->get_title('bank_name_vi', 'post', '');
			$row['bank_name_en'] = $nv_Request->get_title('bank_name_en', 'post', '');
			$row['bank_address_vi'] = $nv_Request->get_title('bank_address_vi', 'post', '');
			$row['bank_address_en'] = $nv_Request->get_title('bank_address_en', 'post', '');
			$row['swiftcode'] = $nv_Request->get_title('swiftcode', 'post', '');
			$row['note_vi'] = $nv_Request->get_textarea('note_vi', '', NV_ALLOWED_HTML_TAGS);
			$row['note_en'] = $nv_Request->get_textarea('note_en', '', NV_ALLOWED_HTML_TAGS);
			$row['companyid'] = $nv_Request->get_int('companyid', 'post', 0);
			$row['comapyname_vi'] = $nv_Request->get_title('comapyname_vi', 'post', '');
			$row['comapyname_en'] = $nv_Request->get_title('comapyname_en', 'post', '');
			$row['manager_name_vi'] = $nv_Request->get_title('manager_name_vi', 'post', '');
			$row['manager_name_en'] = $nv_Request->get_title('manager_name_en', 'post', '');
			$row['adminid'] = $nv_Request->get_int('adminid', 'post', 0);
			$row['crt_date'] = $nv_Request->get_int('crt_date', 'post', 0);
			$row['userid_edit'] = $nv_Request->get_int('userid_edit', 'post', 0);
			$row['update_date'] = $nv_Request->get_int('update_date', 'post', 0);
			$row['debitcode'] = $nv_Request->get_title('debitcode', 'post', '');
			$row['note'] = $nv_Request->get_textarea('note', '', NV_ALLOWED_HTML_TAGS);
			$company_code=$db->query("SELECT cp.* FROM " . NV_PREFIXLANG . "_" . $module_data . "_company cp LEFT JOIN " . NV_PREFIXLANG . "_" . $module_data . "_company_users cpus ON cp.cid = cpus.companyid WHERE cpus.userid = " . $user_info['userid'])->fetch();
			$row['company_code'] = $company_code['companycode'];
			$row['companyid'] = $company_code['cid'];
			$row['comapyname_vi'] = $company_code['vi_title'];
			$row['comapyname_en'] = $company_code['en_title'];
			$bank=$db->query("SELECT b.* FROM " . NV_PREFIXLANG . "_" . $module_data . "_bank b LEFT JOIN " . NV_PREFIXLANG . "_" . $module_data . "_company_users cpus ON b.companyid = cpus.companyid WHERE cpus.userid = " . $user_info['userid'])->fetch();
			$row['account_bank_vi'] = $bank['vi_bank_number'];
			$row['account_bank_en'] = $bank['en_bank_number'];
			$row['holding_vi'] = $bank['vi_bank_account_holder'];
			$row['holding_en'] = $bank['en_bank_account_holder'];
			$row['bank_name_vi'] = $bank['vi_bank_name'];
			$row['bank_name_en'] = $bank['en_bank_name'];
			$row['bank_address_vi'] = $bank['vi_address'];
			$row['bank_address_en'] = $bank['en_address'];
			$row['swiftcode'] = $bank['swiftcode'];
			$maxweight=$db->query('SELECT max(weight) as maxweight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote WHERE 	companyid = ' . $row['companyid'] . ' AND year = ' . $row['year'])->fetch(5)->maxweight;
			if($maxweight == 0){$maxweight=1;}else{$maxweight++;}
			$row['debitcode'] = vsprintf($array_config['debitnote_format_code'], $maxweight).$array_config['debitnote_center_prefix'].$row['year'].'/'.$row['company_code'];
			$debitnoteidexit=$db->query("SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_debitnote WHERE 	pid = " . $row['pid'] . " AND cid = " . $row['cid'] . " AND yearmonth = '" . $row['month'].$row['year'] . "'")->fetch();
			
			if (empty($row['pid'])) {
				$error[] = $lang_module['error_required_pid'];
			} elseif (empty($row['cid'])) {
				$error[] = $lang_module['error_required_cid'];
			} elseif (empty($row['yearmonth'])) {
				$error[] = $lang_module['error_required_yearmonth'];
			} elseif (empty($row['debitnotedate'])) {
				$error[] = $lang_module['error_required_debitnotedate'];
			} elseif (empty($row['datefrom'])) {
				$error[] = $lang_module['error_required_datefrom'];
			} elseif (empty($row['dateto'])) {
				$error[] = $lang_module['error_required_dateto'];
			}  elseif (empty($row['exchangeusd'])) {
				$error[] = $lang_module['error_required_exchangeusd'];
			} elseif (empty($row['recipients_vi'])) {
				$error[] = $lang_module['error_required_recipients_vi'];
			} elseif (empty($row['recipients_en'])) {
				$error[] = $lang_module['error_required_recipients_en'];
			} elseif (empty($row['explain_vi'])) {
				$error[] = $lang_module['error_required_explain_vi'];
			} elseif (empty($row['explain_en'])) {
				$error[] = $lang_module['error_required_explain_en'];
			}  elseif (empty($row['swiftcode'])) {
				$error[] = $lang_module['error_required_swiftcode'];
			}elseif($debitnoteidexit['id'] >0){
				$error[] = $lang_module['error_debitnoteidexit'] . ',' . $lang_module['number_debitnote'] . '' . $debitnoteidexit['debitcode'];
			}; 
			//print_r($debitnoteidexit);die;
			if (empty($error)) {
				try {
					if (empty($row['id'])) {
						$row['weight'] = $maxweight;
						$row['active'] = 1;

						$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote (pid, cid, yearmonth, debitnotedate, mainservice, datefrom, dateto, areareal, exchangeusd, recipients_vi, recipients_en, explain_vi, explain_en, account_bank_vi, account_bank_en, holding_vi, holding_en, bank_name_vi, bank_name_en, bank_address_vi, bank_address_en, swiftcode, note_vi, note_en, companyid, year, comapyname_vi, comapyname_en, manager_name_vi, manager_name_en, adminid, crt_date, userid_edit, update_date, weight, debitcode, active, note, status) VALUES (:pid, :cid, :yearmonth, :debitnotedate, 1, :datefrom, :dateto, :areareal, :exchangeusd, :recipients_vi, :recipients_en, :explain_vi, :explain_en, :account_bank_vi, :account_bank_en, :holding_vi, :holding_en, :bank_name_vi, :bank_name_en, :bank_address_vi, :bank_address_en, :swiftcode, :note_vi, :note_en, :companyid, :year, :comapyname_vi, :comapyname_en, :manager_name_vi, :manager_name_en, :adminid, ' . NV_CURRENTTIME . ', :userid_edit, ' . NV_CURRENTTIME . ', :weight, :debitcode, :active, :note, 1)');

						$stmt->bindParam(':weight', $row['weight'], PDO::PARAM_INT);
						$stmt->bindParam(':active', $row['active'], PDO::PARAM_INT);
						$stmt->bindParam(':adminid', $user_info['userid'], PDO::PARAM_INT);

					} else {
						$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote SET pid = :pid, cid = :cid, yearmonth = :yearmonth, debitnotedate = :debitnotedate, datefrom = :datefrom, dateto = :dateto, areareal = :areareal, exchangeusd = :exchangeusd, recipients_vi = :recipients_vi, recipients_en = :recipients_en, explain_vi = :explain_vi, explain_en = :explain_en, account_bank_vi = :account_bank_vi, account_bank_en = :account_bank_en, holding_vi = :holding_vi, holding_en = :holding_en, bank_name_vi = :bank_name_vi, bank_name_en = :bank_name_en, bank_address_vi = :bank_address_vi, bank_address_en = :bank_address_en, swiftcode = :swiftcode, note_vi = :note_vi, note_en = :note_en, companyid = :companyid, year = :year, comapyname_vi = :comapyname_vi, comapyname_en = :comapyname_en, manager_name_vi = :manager_name_vi, manager_name_en = :manager_name_en, userid_edit = :userid_edit, update_date = ' . NV_CURRENTTIME . ', debitcode = :debitcode, note = :note WHERE id=' . $row['id']);
					}
					$stmt->bindParam(':pid', $row['pid'], PDO::PARAM_INT);
					$stmt->bindParam(':cid', $row['cid'], PDO::PARAM_INT);
					$stmt->bindParam(':yearmonth', $row['yearmonth'], PDO::PARAM_STR);
					$stmt->bindParam(':debitnotedate', $row['debitnotedate'], PDO::PARAM_INT);
					$stmt->bindParam(':datefrom', $row['datefrom'], PDO::PARAM_INT);
					$stmt->bindParam(':dateto', $row['dateto'], PDO::PARAM_INT);
					$stmt->bindParam(':areareal', $row['areareal'], PDO::PARAM_STR);
					$stmt->bindParam(':exchangeusd', $row['exchangeusd'], PDO::PARAM_INT);
					$stmt->bindParam(':recipients_vi', $row['recipients_vi'], PDO::PARAM_STR);
					$stmt->bindParam(':recipients_en', $row['recipients_en'], PDO::PARAM_STR);
					$stmt->bindParam(':explain_vi', $row['explain_vi'], PDO::PARAM_STR);
					$stmt->bindParam(':explain_en', $row['explain_en'], PDO::PARAM_STR);
					$stmt->bindParam(':account_bank_vi', $row['account_bank_vi'], PDO::PARAM_STR);
					$stmt->bindParam(':account_bank_en', $row['account_bank_en'], PDO::PARAM_STR);
					$stmt->bindParam(':holding_vi', $row['holding_vi'], PDO::PARAM_STR);
					$stmt->bindParam(':holding_en', $row['holding_en'], PDO::PARAM_STR);
					$stmt->bindParam(':bank_name_vi', $row['bank_name_vi'], PDO::PARAM_STR);
					$stmt->bindParam(':bank_name_en', $row['bank_name_en'], PDO::PARAM_STR);
					$stmt->bindParam(':bank_address_vi', $row['bank_address_vi'], PDO::PARAM_STR);
					$stmt->bindParam(':bank_address_en', $row['bank_address_en'], PDO::PARAM_STR);
					$stmt->bindParam(':swiftcode', $row['swiftcode'], PDO::PARAM_STR);
					$stmt->bindParam(':note_vi', $row['note_vi'], PDO::PARAM_STR, strlen($row['note_vi']));
					$stmt->bindParam(':note_en', $row['note_en'], PDO::PARAM_STR, strlen($row['note_en']));
					$stmt->bindParam(':companyid', $row['companyid'], PDO::PARAM_INT);
					$stmt->bindParam(':year', $row['year'], PDO::PARAM_INT);
					$stmt->bindParam(':comapyname_vi', $row['comapyname_vi'], PDO::PARAM_STR);
					$stmt->bindParam(':comapyname_en', $row['comapyname_en'], PDO::PARAM_STR);
					$stmt->bindParam(':manager_name_vi', $row['manager_name_vi'], PDO::PARAM_STR);
					$stmt->bindParam(':manager_name_en', $row['manager_name_en'], PDO::PARAM_STR);
					$stmt->bindParam(':userid_edit', $user_info['userid'], PDO::PARAM_INT);
					$stmt->bindParam(':debitcode', $row['debitcode'], PDO::PARAM_STR);
					$stmt->bindParam(':note', $row['note'], PDO::PARAM_STR, strlen($row['note']));

					$exc = $stmt->execute();
					$debitnotetid=$db->query("SELECT id FROM " . NV_PREFIXLANG . "_" . $module_data . "_debitnote WHERE debitcode = '" . $row['debitcode'] ."'")->fetch();
					$row['debitnoteid'] = $debitnotetid['id'];
					$where ="yearmonth='". $row['yearmonth'] ."' AND cid=" . $row['cid'] ." AND pid=" . $row['pid'];
				
					$db->sqlreset()
						->select('*')
						->from('' . NV_PREFIXLANG . '_' . $module_data . '_contract')
						->where($where);
					$sth = $db->query($db->sql());
					$data_contract = $sth->fetch();
					
					if ($exc) {
						$nv_Cache->delMod($module_name);
						$value = $data_contract;
						$weightse = 1;
						if(!empty($value)){
							$value['stitle'] = $array_sid_lease[$value['sid']]['title_vi'];
							if (empty($row['id'])) {
								$value['service_main'] = 1;
								$value['amount'] = 1;
								
								$value['totalvnd'] = $value['pricevnd'] * $value['amount'];
								$value['totalusd'] = $value['priceusd'] * $value['amount'];
								
								$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote_extra (debitnoteid, pid, cid, yearmonth, adddate, serviceid, service_name, service_main, exchangeusd, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) 
																													  VALUES (:debitnoteid, :pid, :cid, :yearmonth, :adddate, :serviceid, :service_name, :service_main, :exchangeusd, :price_vi, :price_en, :amount, :total_vi, :total_en, :note, :userid_edit, ' . NV_CURRENTTIME . ', :adminid, ' . NV_CURRENTTIME . ', :weight, :active)');

								$stmt->bindParam(':weight', $weightse, PDO::PARAM_INT);
								$stmt->bindParam(':service_main', $value['service_main'], PDO::PARAM_INT);
								$stmt->bindParam(':adminid', $user_info['userid'], PDO::PARAM_INT);

							} else {
								$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote_extra SET debitnoteid = :debitnoteid, pid = :pid, cid = :cid, yearmonth = :yearmonth, adddate = :adddate, serviceid = :serviceid, exchangeusd = :exchangeusd, price_vi = :price_vi, price_en = :price_en, amount = :amount, total_vi = :total_vi, total_en = :total_en, note = :note, userid_edit = :userid_edit, update_date = ' . NV_CURRENTTIME . ', active = :active WHERE debitnoteid=' . $row['id']);
							}
							$stmt->bindParam(':debitnoteid', $row['debitnoteid'], PDO::PARAM_INT);
							$stmt->bindParam(':pid', $row['pid'], PDO::PARAM_INT);
							$stmt->bindParam(':cid', $row['cid'], PDO::PARAM_INT);
							$stmt->bindParam(':yearmonth', $value['yearmonth'], PDO::PARAM_STR);
							$stmt->bindParam(':adddate', $row['debitnotedate'], PDO::PARAM_INT);
							$stmt->bindParam(':serviceid', $value['sid'], PDO::PARAM_INT);
							$stmt->bindParam(':service_name', $value['stitle'], PDO::PARAM_STR);
							
							$stmt->bindParam(':exchangeusd', $row['exchangeusd'], PDO::PARAM_INT);
							$stmt->bindParam(':price_vi', $value['pricevnd'], PDO::PARAM_STR);
							$stmt->bindParam(':price_en', $value['priceusd'], PDO::PARAM_STR);
							$stmt->bindParam(':amount', $value['amount'], PDO::PARAM_STR);
							$stmt->bindParam(':total_vi', $value['totalvnd'], PDO::PARAM_STR);
							$stmt->bindParam(':total_en', $value['totalusd'], PDO::PARAM_STR);
							$stmt->bindParam(':note', $value['note'], PDO::PARAM_STR, strlen($row['note']));
							$stmt->bindParam(':userid_edit', $user_info['userid'], PDO::PARAM_INT);
							$stmt->bindParam(':active', $row['active'], PDO::PARAM_INT);

							$exc = $stmt->execute();
							if($exc){
								if (empty($row['id'])) {
									$value['service_main'] = 1;
									$value['amount'] = 1;
									
									$value['totalvnd'] = $value['feevnd'] * $value['amount'];
									$value['totalusd'] = $value['feeusd'] * $value['amount'];
									
									$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote_extra (debitnoteid, pid, cid, yearmonth, adddate, serviceid, service_name, service_main, exchangeusd, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) 
																														  VALUES (:debitnoteid, :pid, :cid, :yearmonth, :adddate, :serviceid, :service_name, :service_main, :exchangeusd, :price_vi, :price_en, :amount, :total_vi, :total_en, :note, :userid_edit, ' . NV_CURRENTTIME . ', :adminid, ' . NV_CURRENTTIME . ', :weight, :active)');

									$stmt->bindParam(':weight', $weightse, PDO::PARAM_INT);
									$stmt->bindParam(':service_main', $value['service_main'], PDO::PARAM_INT);
									$stmt->bindParam(':adminid', $user_info['userid'], PDO::PARAM_INT);

								} else {
									$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote_extra SET debitnoteid = :debitnoteid, pid = :pid, cid = :cid, yearmonth = :yearmonth, adddate = :adddate, serviceid = :serviceid, exchangeusd = :exchangeusd, price_vi = :price_vi, price_en = :price_en, amount = :amount, total_vi = :total_vi, total_en = :total_en, note = :note, userid_edit = :userid_edit, update_date = ' . NV_CURRENTTIME . ', active = :active WHERE debitnoteid=' . $row['id']);
								}
								$stmt->bindParam(':debitnoteid', $row['debitnoteid'], PDO::PARAM_INT);
								$stmt->bindParam(':pid', $row['pid'], PDO::PARAM_INT);
								$stmt->bindParam(':cid', $row['cid'], PDO::PARAM_INT);
								$stmt->bindParam(':yearmonth', $value['yearmonth'], PDO::PARAM_STR);
								$stmt->bindParam(':adddate', $row['debitnotedate'], PDO::PARAM_INT);
								$stmt->bindParam(':serviceid', $value['sid'], PDO::PARAM_INT);
								$stmt->bindParam(':service_name', $lang_module['feeusd'], PDO::PARAM_STR);
								
								$stmt->bindParam(':exchangeusd', $row['exchangeusd'], PDO::PARAM_INT);
								$stmt->bindParam(':price_vi', $value['feevnd'], PDO::PARAM_STR);
								$stmt->bindParam(':price_en', $value['feeusd'], PDO::PARAM_STR);
								$stmt->bindParam(':amount', $value['amount'], PDO::PARAM_STR);
								$stmt->bindParam(':total_vi', $value['totalvnd'], PDO::PARAM_STR);
								$stmt->bindParam(':total_en', $value['totalusd'], PDO::PARAM_STR);
								$stmt->bindParam(':note', $value['note'], PDO::PARAM_STR, strlen($row['note']));
								$stmt->bindParam(':userid_edit', $user_info['userid'], PDO::PARAM_INT);
								$stmt->bindParam(':active', $row['active'], PDO::PARAM_INT);

								$exc = $stmt->execute();
							}
						}
						
					}
					/* if ($exc) {
						if (empty($row['id'])) {

							$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote_money (debitnoteid, pid, cid, yearmonth, adddate, serviceid, exchangeid, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) VALUES (:debitnoteid, :pid, :cid, :yearmonth, :adddate, :serviceid, :exchangeid, :price_vi, :price_en, :amount, :total_vi, :total_en, :note, :userid_edit, ' . NV_CURRENTTIME . ', :adminid, ' . NV_CURRENTTIME . ', :weight, :active)');

							$stmt->bindParam(':weight', $row['weight'], PDO::PARAM_INT);
							$stmt->bindParam(':adminid', $user_info['userid'], PDO::PARAM_INT);

						} else {
							$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote_money SET debitnoteid = :debitnoteid, pid = :pid, cid = :cid, yearmonth = :yearmonth, adddate = :adddate, serviceid = :serviceid, exchangeid = :exchangeid, price_vi = :price_vi, price_en = :price_en, amount = :amount, total_vi = :total_vi, total_en = :total_en, note = :note, userid_edit = :userid_edit, update_date = ' . NV_CURRENTTIME . ', active = :active WHERE debitnoteid=' . $row['id']);
						}
						$stmt->bindParam(':debitnoteid', $row['debitnoteid'], PDO::PARAM_INT);
						$stmt->bindParam(':pid', $row['pid'], PDO::PARAM_INT);
						$stmt->bindParam(':cid', $row['cid'], PDO::PARAM_INT);
						$stmt->bindParam(':yearmonth', $row['yearmonth'], PDO::PARAM_STR);
						$stmt->bindParam(':adddate', $row['debitnotedate'], PDO::PARAM_INT);
						$stmt->bindParam(':serviceid', $row['sid'], PDO::PARAM_INT);
						$stmt->bindParam(':exchangeid', $row['exchangeid'], PDO::PARAM_INT);
						$stmt->bindParam(':price_vi', $row['price_vi'], PDO::PARAM_STR);
						$stmt->bindParam(':price_en', $row['price_en'], PDO::PARAM_STR);
						$stmt->bindParam(':amount', $row['amount'], PDO::PARAM_STR);
						$stmt->bindParam(':total_vi', $row['total_vi'], PDO::PARAM_STR);
						$stmt->bindParam(':total_en', $row['total_en'], PDO::PARAM_STR);
						$stmt->bindParam(':note', $row['note'], PDO::PARAM_STR, strlen($row['note']));
						$stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);
						$stmt->bindParam(':active', $row['active'], PDO::PARAM_INT);

						$exc = $stmt->execute();
						
					}	 */
					if ($exc) {
						if (empty($row['id'])) {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Debitnote_add', ' ', $user_info['userid']);
						} else {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Debitnote_add', 'ID: ' . $row['id'], $user_info['userid']);
						}
						nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
					}							
					
				} catch(PDOException $e) {
					trigger_error($e->getMessage());
					die($e->getMessage()); //Remove this line after checks finished
				}
			}
		} elseif ($row['id'] > 0) {
			$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote WHERE id=' . $row['id'])->fetch();
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
			
		} else {
			
			$row['note_vi'] = nv_htmlspecialchars(nv_br2nl($row['note_vi']));
			$row['note_en'] = nv_htmlspecialchars(nv_br2nl($row['note_en']));
			$row['note'] = nv_htmlspecialchars(nv_br2nl($row['note']));
			$row['pid'] = 0;
			$row['cid'] = 0;
			$row['month'] = date("m",NV_CURRENTTIME);
			$row['year'] = date("Y",NV_CURRENTTIME);
			$row['datefrom'] = date("d/m/Y",NV_CURRENTTIME);
			$row['dateto'] = date("d/m/Y",NV_CURRENTTIME);
			$row['debitnotedate'] = date("d/m/Y",NV_CURRENTTIME);
			$row['areareal'] = '';
			$row['exchangeusd'] = 1;
			$row['recipients_vi'] = $lang_module['default_recip_vi'];
			$row['recipients_en'] = $lang_module['default_recip_en'];
			$row['explain_vi'] = '';
			$row['explain_en'] = '';
			$row['note_vi'] = '';
			$row['note_en'] = '';
			
			$row['adminid'] = $user_info['userid'];
			$row['crt_date'] = NV_CURRENTTIME;
			$row['userid_edit'] = $user_info['userid'];
			$row['update_date'] = NV_CURRENTTIME;
						$row['note'] = '';
		}
			$company_code=$db->query("SELECT cp.* FROM " . NV_PREFIXLANG . "_" . $module_data . "_company cp LEFT JOIN " . NV_PREFIXLANG . "_" . $module_data . "_company_users cpus ON cp.cid = cpus.companyid WHERE cpus.userid = " . $user_info['userid'])->fetch();
			$row['company_code'] = $company_code['companycode'];
			$row['companyid'] = $company_code['cid'];
			$row['comapyname_vi'] = $company_code['vi_title'];
			$row['comapyname_en'] = $company_code['en_title'];
			$bank=$db->query("SELECT b.* FROM " . NV_PREFIXLANG . "_" . $module_data . "_bank b LEFT JOIN " . NV_PREFIXLANG . "_" . $module_data . "_company_users cpus ON b.companyid = cpus.companyid WHERE cpus.userid = " . $user_info['userid'])->fetch();
			$row['account_bank_vi'] = $bank['vi_bank_number'];
			$row['account_bank_en'] = $bank['en_bank_number'];
			$row['holding_vi'] = $bank['vi_bank_account_holder'];
			$row['holding_en'] = $bank['en_bank_account_holder'];
			$row['bank_name_vi'] = $bank['vi_bank_name'];
			$row['bank_name_en'] = $bank['en_bank_name'];
			$row['bank_address_vi'] = $bank['vi_address'];
			$row['bank_address_en'] = $bank['en_address'];
			$row['swiftcode'] = $bank['swiftcode'];
			$maxweight=$db->query('SELECT max(weight) as maxweight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote WHERE 	companyid = ' . $row['companyid'] . ' AND year = ' . $row['year'])->fetch(5)->maxweight;
			if($maxweight == 0){$maxweight=1;}else{$maxweight=$maxweight+1;}
			$row['debitcode'] = vsprintf($array_config['debitnote_format_code'], $maxweight).$array_config['debitnote_center_prefix'].$row['year'].'/'.$row['company_code'];
			
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
		foreach ($array_exchangeusd_lease as $value) {
			$xtpl->assign('OPTION', array(
				'key' => $value['id'],
				'title' => $value['month'],
				'selected' => ($value['id'] == $row['exchangeusd']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_exchangeusd');
		}
		foreach ($array_companyid_lease as $value) {
			$xtpl->assign('OPTION', array(
				'key' => $value['cid'],
				'title' => $value['vi_title'],
				'selected' => ($value['cid'] == $row['companyid']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_companyid');
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
			$xtpl->assign('ERROR', implode('<br />', $error));
			$xtpl->parse('main.error');
		}
		$xtpl->assign('ROW', $row);
	}elseif($action == "waiting"){
		
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
				$db->where('pid LIKE :q_pid OR cid LIKE :q_cid OR yearmonth LIKE :q_yearmonth OR debitnotedate LIKE :q_debitnotedate OR datefrom LIKE :q_datefrom OR dateto LIKE :q_dateto OR comapyname_vi LIKE :q_comapyname_vi OR comapyname_en LIKE :q_comapyname_en OR manager_name_vi LIKE :q_manager_name_vi OR manager_name_en LIKE :q_manager_name_en');
			}
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_pid', '%' . $q . '%');
				$sth->bindValue(':q_cid', '%' . $q . '%');
				$sth->bindValue(':q_yearmonth', '%' . $q . '%');
				$sth->bindValue(':q_debitnotedate', '%' . $q . '%');
				$sth->bindValue(':q_datefrom', '%' . $q . '%');
				$sth->bindValue(':q_dateto', '%' . $q . '%');
				$sth->bindValue(':q_comapyname_vi', '%' . $q . '%');
				$sth->bindValue(':q_comapyname_en', '%' . $q . '%');
				$sth->bindValue(':q_manager_name_vi', '%' . $q . '%');
				$sth->bindValue(':q_manager_name_en', '%' . $q . '%');
			}
			$sth->execute();
			$num_items = $sth->fetchColumn();

			$db->select('*')
				->order('weight ASC')
				->where('status <= 2')
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
				$sth->bindValue(':q_comapyname_vi', '%' . $q . '%');
				$sth->bindValue(':q_comapyname_en', '%' . $q . '%');
				$sth->bindValue(':q_manager_name_vi', '%' . $q . '%');
				$sth->bindValue(':q_manager_name_en', '%' . $q . '%');
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
			$view['customer_name'] = $array_cid_lease[$view['cid']]['title'];
			$view['product_name'] = $array_pid_lease[$view['pid']]['title_vi'];
				for($i = 1; $i <= $num_items; ++$i) {
					$xtpl->assign('WEIGHT', array(
						'key' => $i,
						'title' => $i,
						'selected' => ($i == $view['weight']) ? ' selected="selected"' : ''));
					$xtpl->parse('main.view.loop.weight_loop');
				}
				$xtpl->assign('CHECK', $view['active'] == 1 ? 'checked' : '');
				if($action == 'waiting'){
					$view['link_view'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/waitingview&amp;id=' . $view['id'];
		
				}else{
					$view['link_view'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/view&amp;id=' . $view['id'];
				
				}
				if(defined("NV_IS_GOLDADMIN")){
					$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
					$xtpl->parse('main.view.loop.admin');
				}
				$xtpl->assign('VIEW', $view);
				if($view['status'] < 2 && $view['status'] > 0){
					$xtpl->parse('main.view.loop.waiting');
				}else{
					$xtpl->parse('main.view.loop.link_view');
				}
 				$xtpl->parse('main.view.loop');
			}
			
			$xtpl->parse('main.view');
		}


	}elseif($action == "view" or $action == "waitingview"){
		if ($nv_Request->isset_request('status', 'post')) {
			$id = $nv_Request->get_int('id', 'post', 0);
			$status = $nv_Request->get_int('status', 'post', 0);
			$content = 'NO_' . $id;
			if ($status > 0)     {
				$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_sign WHERE userid=' . $user_info['userid'])->fetch();
				$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote SET status=' . $status . ', manager_name_vi=:manager_name_vi, manager_name_en=:manager_name_en WHERE id=' . $id;
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':manager_name_vi', $row['sign_vi'], PDO::PARAM_STR);
				$stmt->bindParam(':manager_name_en', $row['sign_en'], PDO::PARAM_STR);
				$exc = $stmt->execute();
				if($exc){
					$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote WHERE id=' . $id)->fetch();
					$where='debitnoteid = ' . $id;
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
					if (empty($error)) {
						try {
							$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_payment (id, debitnote, customerid, customername, yearmonth, addtime, note_vi, note_en, exchangeusd, total_vi, total_en, adminid, crt_date, userid_edit, update_date, status_payment) VALUES (NULL,:debitnote, :customerid, :customername, :yearmonth, ' . NV_CURRENTTIME . ', :note_vi, :note_en, :exchangeusd, :total_vi, :total_en, :adminid, ' . NV_CURRENTTIME . ', :userid_edit, ' . NV_CURRENTTIME . ', -1)');
							$stmt->bindParam(':adminid', $user_info['userid'], PDO::PARAM_INT);
							$stmt->bindParam(':debitnote', $row['id'], PDO::PARAM_INT);
							$stmt->bindParam(':customerid', $row['cid'], PDO::PARAM_INT);
							$stmt->bindParam(':customername', $row['customername'], PDO::PARAM_STR);
							$stmt->bindParam(':yearmonth', $row['yearmonth'], PDO::PARAM_STR);
							$stmt->bindParam(':note_vi', $row['note_vi'], PDO::PARAM_STR, strlen($row['note_vi']));
							$stmt->bindParam(':note_en', $row['note_en'], PDO::PARAM_STR, strlen($row['note_en']));
							$stmt->bindParam(':exchangeusd', $row['exchangeusd'], PDO::PARAM_INT);
							$stmt->bindParam(':total_vi', $row['total_vi'], PDO::PARAM_STR);
							$stmt->bindParam(':total_en', $row['total_en'], PDO::PARAM_STR);
							$stmt->bindParam(':userid_edit', $user_info['userid'], PDO::PARAM_INT);
							$exc = $stmt->execute();

							if ($exc) {
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
				}
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '/waitingview&id=' . $id);
			}
		}
		$xtpl = new XTemplate('debitnote_view.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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
		if($action == "view"){
			$xtpl->assign('action', $lang_module['debitnote_view']);
		}elseif($action == "waitingview"){
			$xtpl->assign('action', $lang_module['accept']);
			
		}
		$row = array();
		$error = array();
		$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
			
			$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote WHERE id=' . $row['id'])->fetch();
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
			$row['product'] = $array_pid_lease[$row['pid']]['title'];
			$row['customer'] = $array_cid_lease[$row['cid']]['title'];
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

		
		while ($r = $sth->fetch()){
			
			$r['service'] =  $array_sid_lease[$r['serviceid']]['title_vi'];
			$r['datefrom'] =  date('d/m/Y', $r['datefrom']);
			$r['dateto'] =  date('d/m/Y', $r['dateto']);
			$total_vi += $r['total_vi'];
			$total_en += $r['total_en'];
			$xtpl->assign('DBN', $r);
			$xtpl->parse('main.service_vi');
			$xtpl->parse('main.service_en');
		}
		$xtpl->assign('total_vi', $total_vi);
		$xtpl->assign('total_en', $total_en);
		if($action == "waitingview"){
			$xtpl->parse('main.form');
			if($row['status'] != 2 ){
				$xtpl->parse('main.form1.sign');
				
			}
			if($row['manager_name_vi'] != ''){
				$xtpl->parse('main.form1.pdf_vi');
			}
			if($row['manager_name_en'] != ''){
				$xtpl->parse('main.form1.pdf_en');
			}
			if($row['status'] > 1 ){
				$xtpl->parse('main.form1.send_mail');
			}
			$xtpl->parse('main.form1');
		}
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
				
				$query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote SET status = 0 WHERE id=' . $id;
				$db->query($query);
				$content = 'OK_' . $id;
				
				$nv_Cache->delMod($module_name);
				nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Debitnote', 'ID: ' . $id, $user_info['userid']);
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
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_debitnote');

			if (!empty($q)) {
				$db->where('pid LIKE :q_pid OR cid LIKE :q_cid OR yearmonth LIKE :q_yearmonth OR debitnotedate LIKE :q_debitnotedate OR datefrom LIKE :q_datefrom OR dateto LIKE :q_dateto OR comapyname_vi LIKE :q_comapyname_vi OR comapyname_en LIKE :q_comapyname_en OR manager_name_vi LIKE :q_manager_name_vi OR manager_name_en LIKE :q_manager_name_en');
			}
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_pid', '%' . $q . '%');
				$sth->bindValue(':q_cid', '%' . $q . '%');
				$sth->bindValue(':q_yearmonth', '%' . $q . '%');
				$sth->bindValue(':q_debitnotedate', '%' . $q . '%');
				$sth->bindValue(':q_datefrom', '%' . $q . '%');
				$sth->bindValue(':q_dateto', '%' . $q . '%');
				$sth->bindValue(':q_comapyname_vi', '%' . $q . '%');
				$sth->bindValue(':q_comapyname_en', '%' . $q . '%');
				$sth->bindValue(':q_manager_name_vi', '%' . $q . '%');
				$sth->bindValue(':q_manager_name_en', '%' . $q . '%');
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
				$sth->bindValue(':q_comapyname_vi', '%' . $q . '%');
				$sth->bindValue(':q_comapyname_en', '%' . $q . '%');
				$sth->bindValue(':q_manager_name_vi', '%' . $q . '%');
				$sth->bindValue(':q_manager_name_en', '%' . $q . '%');
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
				$view['mount'] = $view['yearmonth'][0].$view['yearmonth'][1];
				$view['year'] = $view['yearmonth'][2].$view['yearmonth'][3].$view['yearmonth'][4].$view['yearmonth'][5];
				$view['yearmonth_format'] = $view['mount'].'/'.$view['year'];
				$view['datefrom_format'] = date("d/m/Y",$view['datefrom']);
				$view['dateto_format'] = date("d/m/Y",$view['dateto']);
				$view['debitnotedate_format'] = date("d/m/Y",$view['debitnotedate']);
				$view['customer_name'] = $array_cid_lease[$view['cid']]['title'];
				$view['product_name'] = $array_pid_lease[$view['pid']]['title_vi'];
				$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/edit&amp;id=' . $view['id'];
				$view['link_view'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/view&amp;id=' . $view['id'];
				$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);

				for($i = 1; $i <= $num_items; ++$i) {
					$xtpl->assign('WEIGHT', array(
						'key' => $i,
						'title' => $i,
						'selected' => ($i == $view['weight']) ? ' selected="selected"' : ''));
					$xtpl->parse('main.view.loop.weight_loop');
				}
				$xtpl->assign('CHECK', $view['active'] == 1 ? 'checked' : '');
				$xtpl->assign('VIEW', $view);
				if($view['status'] ==1 AND  $view['adminid'] == $user_info['userid'] ){

					$xtpl->parse('main.view.loop.user');
				}else{
					$xtpl->parse('main.view.loop.viewdn');
				}
				if(defined("NV_IS_GOLDADMIN")){
					$xtpl->parse('main.view.loop.admin');
				}
				if($view['mainservice'] == 1) {
					$xtpl->parse('main.view.loop');
				}
			}
			$xtpl->parse('main.view');
			
		}
		$nextmonth = nextMonth();
		$month = $nextmonth->format('m');
		$year = $nextmonth->format('Y');
		$db->sqlreset()
			->select('*')
			->from('' . NV_PREFIXLANG . '_' . $module_data . '_contract')
			->order('weight ASC');
		$sthc = $db->prepare($db->sql());
		$sthc->execute();
		while ($viewnext = $sthc->fetch()) {
			$viewnext['yearmonth'] = $month . $year;
			$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote WHERE yearmonth=' . $viewnext['yearmonth'] . ' AND pid = ' . $viewnext['pid'] . ' AND cid = ' . $viewnext['cid'] . ' AND mainservice = 1 ' )->fetch();
			if(empty($row['id'])){
				$xtpl->assign('CHECK', $viewnext['active'] == 1 ? 'checked' : '');
				$viewnext['yearmonth_format'] = $month . '/' . $year;
				$viewnext['datefrom_format'] = (empty($viewnext['datefrom'])) ? '' : nv_date('d/m/Y', $viewnext['datefrom']);
				$viewnext['debitnotedate_format'] = $viewnext['feedatemain'] . '/' . $month . '/' . $year;
				$viewnext['dateto_format'] = (empty($viewnext['dateto'])) ? '' : nv_date('d/m/Y', $viewnext['dateto']);
				$viewnext['product_name_vi'] = $array_pid_lease[$viewnext['pid']]['title_vi'];
				$viewnext['product_name_en'] = $array_pid_lease[$viewnext['pid']]['title_en'];
				$viewnext['link_view_product'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=product/view/' . str_replace("/","-",$array_pid_lease[$view['cid']]['alias']) . '';
				$viewnext['customer_name_vi'] = $array_cid_lease[$viewnext['cid']]['title'];
				$viewnext['customer_name_en'] = $array_cid_lease[$viewnext['cid']]['title'];
				$viewnext['comapyname_vi'] = $array_companyid_lease[$viewnext['companyid']]['vi_title'];
				$viewnext['comapyname_en'] = $array_companyid_lease[$viewnext['companyid']]['en_title'];
				$viewnext['link_view_cus'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=debt/view/' . str_replace("/","-",$array_cid_lease[$view['cid']]['cuscode']) . '';
				$viewnext['sid_vi'] = $array_sid_lease[$viewnext['sid']]['title_vi'];
				$viewnext['sid_en'] = $array_sid_lease[$viewnext['sid']]['title_en'];
				$viewnext['contract_status_format'] = $array_contract_status_lease[$viewnext['contract_status']]['title_vi'];
				$viewnext['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/edit&amp;id=' . $view['id'];
				$viewnext['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
				
				$xtpl->assign('VIEWNEXT', $viewnext);
				
				if($view['status_del']==0){
					$xtpl->parse('main.viewnext.list');
				}
			}
		}
		$xtpl->parse('main.viewnext');

	}
	$xtpl->parse('main');
	$contents = $xtpl->text('main');

	$page_title = $lang_module['debitnote'];

	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}