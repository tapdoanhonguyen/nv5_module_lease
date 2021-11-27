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
$array_contract_status_lease = array();
$_sql = 'SELECT * FROM ' .NV_PREFIXLANG . '_' . $module_data . '_contract_status';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
	$array_contract_status_lease[$_row['id']] = $_row;
}
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
		
		$row = array();
		$error = array();
		$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
		if ($nv_Request->isset_request('submit', 'post')) {
			$row['pid'] = $nv_Request->get_int('pid', 'post', 0);
			$row['cid'] = $nv_Request->get_int('cid', 'post', 0);
			$row['feedatemain'] = $nv_Request->get_int('feedatemain', 'post', 0);
			$row['feedateextra'] = $nv_Request->get_int('feedateextra', 'post', 0);
			$row['companyid'] = $nv_Request->get_int('companyid', 'post', 0);
			$row['month'] = $nv_Request->get_string('month', 'post', '');
			$row['year'] = $nv_Request->get_string('year', 'post', '');
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
			if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('feedatefrom', 'post'), $m))     {
				$_hour = 0;
				$_min = 0;
				$row['feedatefrom'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
			}
			else
			{
				$row['feedatefrom'] = 0;
			}
			if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('feedateto', 'post'), $m))     {
				$_hour = 0;
				$_min = 0;
				$row['feedateto'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
			}
			else
			{
				$row['feedateto'] = 0;
			}
			$row['ccode'] = $nv_Request->get_title('ccode', 'post', '');
			$row['pricevnd'] = str_replace(',','',$nv_Request->get_title('pricevnd', 'post', ''));
			$row['priceusd'] = str_replace(',','',$nv_Request->get_title('priceusd', 'post', ''));
			$row['note'] = $nv_Request->get_editor('note', '', NV_ALLOWED_HTML_TAGS);
			$row['feevnd'] = str_replace(',','',$nv_Request->get_title('feevnd', 'post', 0));
			$row['feeusd'] = str_replace(',','',$nv_Request->get_title('feeusd', 'post', 0));
			$row['areareal'] = str_replace(',','',$nv_Request->get_title('areareal', 'post', ''));
			$row['ccat'] = $nv_Request->get_int('ccat', 'post', 0);
			$row['sid'] = $nv_Request->get_int('sid', 'post', 0);
			$row['cycle'] = $nv_Request->get_title('cycle', 'post', 'month');
			$row['yearpercent'] = $nv_Request->get_float('yearpercent', 'post', 0);
			$row['contract_status'] = $db->query('SELECT id FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract_status WHERE maindefault = 1')->fetchColumn();
			if (empty($row['pid'])) {
				$error[] = $lang_module['error_required_pid'];
			} elseif (empty($row['cid'])) {
				$error[] = $lang_module['error_required_cid'];
			} elseif (empty($row['datefrom'])) {
				$error[] = $lang_module['error_required_datefrom'];
			} elseif (empty($row['dateto'])) {
				$error[] = $lang_module['error_required_dateto'];
			} elseif (empty($row['sid'])) {
				$error[] = $lang_module['error_required_sid'];
			}

			if (empty($error)) {
				if (empty($row['id'])) {
					$weight = $db->query('SELECT max(weight) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract')->fetchColumn();
					$weight = intval($weight) + 1;
					$sql = 'INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_contract (pid, cid, companyid, year, yearmonth, datefrom, dateto, feedatefrom, feedateto, ccode, pricevnd, priceusd, note, active, weight, adminid, crtd_date, userid_edit, update_date, feevnd, feeusd, areareal, ccat,sid,yearpercent, cycle, contract_status) VALUES
							(:pid, :cid, :companyid, :year, :yearmonth, :datefrom, :dateto, :feedatefrom, :feedateto, :ccode, :pricevnd, :priceusd, :note, :active, :weight, ' . $user_info['userid'] . ', ' . NV_CURRENTTIME . ', ' . $user_info['userid'] . ', ' . NV_CURRENTTIME . ', :feevnd, :feeusd, :areareal, :ccat, :sid, :yearpercent, :cycle, :contract_status)';

					$data_insert = [];
					$data_insert['pid'] = $row['pid'];
					$data_insert['cid'] = $row['cid'];
					$data_insert['year'] = $row['year'];
					$data_insert['companyid'] = $row['companyid'];
					$data_insert['yearmonth'] = $row['yearmonth'];
					$data_insert['datefrom'] = $row['datefrom'];
					$data_insert['weight'] = $weight;
					$data_insert['feedatefrom'] = $row['feedatefrom'];
					$data_insert['dateto'] = $row['dateto'];
					$data_insert['feedateto'] = $row['feedateto'];
					$data_insert['ccode'] = $row['ccode'];
					$data_insert['pricevnd'] = $row['pricevnd'];
					$data_insert['priceusd'] = $row['priceusd'];
					$data_insert['note'] = $row['note'];
					$data_insert['feevnd'] = $row['feevnd'];
					$data_insert['feeusd'] = $row['feeusd'];
					$data_insert['areareal'] = $row['areareal'];
					$data_insert['ccat'] = $row['ccat'];
					$data_insert['sid'] = $row['sid'];
					$data_insert['cycle'] = $row['cycle'];
					$data_insert['yearpercent'] = $row['yearpercent'];
					$data_insert['active'] = 1;
					$data_insert['contract_status'] = $row['contract_status'];

					$contract_info_id = $db->insert_id($sql, 'catid', $data_insert);


				} else {
					$contract_info_id = $row['id'];
					$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_contract SET pid = :pid, cid = :cid, companyid=:companyid,year = :year, yearmonth = :yearmonth, datefrom = :datefrom, dateto = :dateto, feedatefrom = :feedatefrom, feedateto = :feedateto, ccode = :ccode, cycle = :cycle, pricevnd = :pricevnd, priceusd = :priceusd, note = :note, feevnd = :feevnd, feeusd = :feeusd, areareal = :areareal, ccat = :ccat, userid_edit = ' . $user_info['userid'] . ', update_date = ' . NV_CURRENTTIME . ', sid = :sid, yearpercent = :yearpercent, feedateextra = :feedateextra, feedatemain = :feedatemain  WHERE id=' . $row['id']);
					$stmt->bindParam(':pid', $row['pid'], PDO::PARAM_INT);
					$stmt->bindParam(':cid', $row['cid'], PDO::PARAM_INT);
					$stmt->bindParam(':year', $row['year'], PDO::PARAM_INT);
					$stmt->bindParam(':companyid', $row['companyid'], PDO::PARAM_INT);
					$stmt->bindParam(':yearmonth', $row['yearmonth'], PDO::PARAM_INT);
					$stmt->bindParam(':datefrom', $row['datefrom'], PDO::PARAM_INT);
					$stmt->bindParam(':feedatefrom', $row['feedatefrom'], PDO::PARAM_INT);
					$stmt->bindParam(':dateto', $row['dateto'], PDO::PARAM_INT);
					$stmt->bindParam(':feedateto', $row['feedateto'], PDO::PARAM_INT);
					$stmt->bindParam(':ccode', $row['ccode'], PDO::PARAM_STR);
					$stmt->bindParam(':pricevnd', $row['pricevnd'], PDO::PARAM_STR);
					$stmt->bindParam(':priceusd', $row['priceusd'], PDO::PARAM_STR);
					$stmt->bindParam(':note', $row['note'], PDO::PARAM_STR, strlen($row['note']));
					$stmt->bindParam(':feevnd', $row['feevnd'], PDO::PARAM_INT);
					$stmt->bindParam(':feeusd', $row['feeusd'], PDO::PARAM_INT);
					$stmt->bindParam(':areareal', $row['areareal'], PDO::PARAM_STR);
					$stmt->bindParam(':ccat', $row['ccat'], PDO::PARAM_INT);
					$stmt->bindParam(':sid', $row['sid'], PDO::PARAM_INT);
					$stmt->bindParam(':cycle', $row['cycle'], PDO::PARAM_INT);
					$stmt->bindParam(':yearpercent', $row['yearpercent'], PDO::PARAM_INT);
					$stmt->bindParam(':feedatemain', $row['feedatemain'], PDO::PARAM_INT);
					$stmt->bindParam(':feedateextra', $row['feedateextra'], PDO::PARAM_INT);
					$exc = $stmt->execute();
				}
				if ($contract_info_id) {

					$db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract_info  WHERE contractid = ' . $db->quote($contract_info_id));
					$start_month = date("m",$row['feedatefrom']);
					$start_year= date("Y",$row['feedatefrom']);
					$end_month = date("m",$row['feedateto']);
					$end_year= date("Y",$row['feedateto']);
					$contract_info = array();
					for($i= $start_year; $i<= $end_year; $i++){
						if($i == $start_year){
							for($j= $start_month; $j<= 12; $j++){
								if($j<10){
									$month='0'.$j;
								}else{
									$month=$j;
								}
								$contract_info[] = $month.''.$i;
							}
						}elseif($i == $end_year){
							for($j= 1; $j<= $end_month; $j++){
								if($j<10){
									$month='0'.$j;
								}else{
									$month=$j;
								}
								$contract_info[] = $month.''.$i;
							}
						} else{
							for($j= 1; $j<= 12; $j++){
								if($j<10){
									$month='0'.$j;
								}else{
									$month=$j;
								}
								$contract_info[] = $month.''.$i;
							}
						}
						
					}
					//print_r($contract_info);die;
					foreach ($contract_info as $yearmonth){
						print_r($yearmonth);
							$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_contract_info (contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES (:contractid, :productid, :customerid, :serviceid, :yearmonth, ' . NV_CURRENTTIME . ', :feedatefrom, :feedateto, :price_vi, :price_en, :fee_vi, :fee_en, 1, :weight, 0, ' . $user_info['userid'] . ',  ' . NV_CURRENTTIME . ', ' . $user_info['userid'] . ',  ' . NV_CURRENTTIME . ')');

							$weight = $db->query('SELECT max(weight) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract_info')->fetchColumn();
							$weight = intval($weight) + 1;
							$stmt->bindParam(':weight', $weight, PDO::PARAM_INT);

							$stmt->bindParam(':contractid', $contract_info_id, PDO::PARAM_INT);
							$stmt->bindParam(':productid', $row['pid'], PDO::PARAM_INT);
							$stmt->bindParam(':customerid', $row['cid'], PDO::PARAM_INT);
							$stmt->bindParam(':serviceid', $row['sid'], PDO::PARAM_INT);
							$stmt->bindParam(':yearmonth', $yearmonth, PDO::PARAM_STR);
							$stmt->bindParam(':feedatefrom', $row['feedatefrom'], PDO::PARAM_INT);
							$stmt->bindParam(':feedateto', $row['feedateto'], PDO::PARAM_INT);
							$stmt->bindParam(':price_vi', $row['pricevnd'], PDO::PARAM_STR);
							$stmt->bindParam(':price_en', $row['priceusd'], PDO::PARAM_STR);
							$stmt->bindParam(':fee_vi', $row['feevnd'], PDO::PARAM_STR);
							$stmt->bindParam(':fee_en', $row['feeusd'], PDO::PARAM_STR);

							$exc = $stmt->execute();
							if ($exc) {
								$nv_Cache->delMod($module_name);
								if (empty($row['id'])) {
									nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Contractinfo', $yearmonth , $user_info['userid']);
								} else {
									nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Contractinfo', 'ID: ' . $yearmonth, $user_info['userid']);
								}
							}
					}
				}
				$nv_Cache->delMod($module_name);
				if (empty($row['id'])) {
					nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Contract', ' ', $user_info['userid']);
				} else {
					nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Contract', 'ID: ' . $row['id'], $user_info['userid']);
				}
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
		
			}
		} elseif ($row['id'] > 0) {
			$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract WHERE id=' . $row['id'])->fetch();
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
			if (empty($row['datefrom'])) {
				$row['datefrom'] = '';
			}
			else
			{
				$row['feedatefrom'] = date('d/m/Y', $row['feedatefrom']);
			}

			if (empty($row['dateto'])) {
				$row['dateto'] = '';
			}
			else
			{
				$row['feedateto'] = date('d/m/Y', $row['feedateto']);
			}
			$row['month'] = $row['yearmonth'][0].$row['yearmonth'][1];
			$row['year'] = $row['yearmonth'][2].$row['yearmonth'][3].$row['yearmonth'][4].$row['yearmonth'][5];

		} else {
			$row['id'] = 0;
			$row['pid'] = 0;
			$row['cid'] = 0;
			
			$row['month'] = date("m",NV_CURRENTTIME);
			$row['year'] = date("Y",NV_CURRENTTIME);
			$row['datefrom'] = date("d/m/Y",NV_CURRENTTIME);
			$row['feedatefrom'] = date("d/m/Y",NV_CURRENTTIME);
			$row['dateto'] = date("d/m/Y",NV_CURRENTTIME);
			$row['feedateto'] = date("d/m/Y",NV_CURRENTTIME);
			$row['ccode'] = '';
			$row['pricevnd'] = '0';
			$row['priceusd'] = '0';
			$row['note'] = '';
			$row['feevnd'] = 0;
			$row['feeusd'] = 0;
			$row['areareal'] = '0';
			$row['ccat'] = 0;
			$row['cycle'] = 0;
			$company_code=$db->query("SELECT cp.* FROM " . NV_PREFIXLANG . "_" . $module_data . "_company cp LEFT JOIN " . NV_PREFIXLANG . "_" . $module_data . "_company_users cpus ON cp.cid = cpus.companyid WHERE cpus.userid = " . $user_info['userid'])->fetch();
				$row['company_code'] = $company_code['companycode'];
				$row['companyid'] = $company_code['cid'];
			$maxweight=$db->query('SELECT max(weight) as maxweight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract WHERE 	companyid = ' . $row['companyid'] . ' AND year = ' . $row['year'])->fetch(5)->maxweight;

			if($maxweight == 0){$maxweight=1;}else{$maxweight=$maxweight+1;}
			
			$row['ccode'] = vsprintf($array_config['contract_format_code'], $maxweight).$array_config['contract_center_prefix'].$row['year'].'/'.$row['company_code'];
			
		}
		
		$row['note'] = nv_htmlspecialchars(nv_editor_br2nl($row['note']));
		$row['note'] = nv_module_aleditor('note', '100%', '300px', $row['note']);
		$xtpl->assign('ROW', $row);
		if($action == "add"){
			foreach ($array_pid_lease as $value) {
				$xtpl->assign('OPTION', array(
					'key' => $value['pid'],
					'title' => $value['title_vi'],
					'selected' => ($value['pid'] == $row['pid']) ? ' selected="selected"' : ''
				));
				$xtpl->parse('main.select_pid');
			}
			foreach ($array_cid_lease as $value) {
				$xtpl->assign('OPTION', array(
					'key' => $value['cid'],
					'title' => $value['title'],
					'selected' => ($value['cid'] == $row['cid']) ? ' selected="selected"' : ''
				));
				$xtpl->parse('main.select_cid');
			}
		}elseif($action == "edit"){
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
			$array_cid_contract_lease = array();
			$_sql = 'SELECT cus.* FROM ' .NV_PREFIXLANG . '_' . $module_data . '_contract c LEFT JOIN ' .NV_PREFIXLANG . '_' . $module_data . '_customer cus ON cus.cid = c.cid WHERE c.active = 1 AND cus.active = 1 GROUP BY cus.cid';
			$_query = $db->query($_sql);
			while ($_row = $_query->fetch()) {
				$array_cid_contract_lease[$_row['cid']] = $_row;
			}
			foreach ($array_cid_contract_lease as $value) {
				$xtpl->assign('OPTION', array(
					'key' => $value['cid'],
					'title' => $value['title'],
					'selected' => ($value['cid'] == $row['cid']) ? ' selected="selected"' : ''
				));
				$xtpl->parse('main.select_cid');
			}
		}
		
		foreach ($array_sid_lease as $value) {
			if($value['service_main'] != 0){
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
				'selected' => ($key == $row['mount']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_mount');
		}

		for ($i=1970;$i<2050;$i++) {
			$xtpl->assign('OPTION', array(
				'key' => $i,
				'title' => $i,
				'selected' => ($i == $row['year']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_year');
		}
		foreach ($array_ccat_lease as $value) {
			$xtpl->assign('OPTION', array(
				'key' => $value['cid'],
				'title' => $value['title'],
				'selected' => ($value['cid'] == $row['ccat']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_ccat');
		}
		foreach ($array_cycle_lease as $key => $value) {
			$xtpl->assign('OPTION', array(
				'key' => $key,
				'title' => $value,
				'selected' => ($key == $row['cycle']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_cycle');
		}
	}else{

		// Change status
		if ($nv_Request->isset_request('change_active', 'post, get')) {
			$id = $nv_Request->get_int('cid', 'post, get', 0);
			$content = 'NO_' . $id;

			$query = 'SELECT active FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract WHERE id=' . $id;
			$row = $db->query($query)->fetch();
			if (isset($row['active']))     {
				$active = ($row['active']) ? 0 : 1;
				$query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_contract SET active=' . intval($active) . ' WHERE id=' . $id;
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
				$sql = 'SELECT id FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract WHERE id!=' . $id . ' AND weight!=0 ORDER BY weight ASC';
				$result = $db->query($sql);
				$weight = 0;
				while ($row = $result->fetch())
				{
					++$weight;
					if ($weight == $new_vid) ++$weight;             $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_contract SET weight=' . $weight . ' WHERE id=' . $row['id'];
					$db->query($sql);
				}
				$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_contract SET weight=' . $new_vid . ' WHERE id=' . $id;
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
				$sql = 'SELECT weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract WHERE id =' . $db->quote($id);
				$result = $db->query($sql);
				list($weight) = $result->fetch(3);
				$db->query('UPDATE  ' . NV_PREFIXLANG . '_' . $module_data . '_contract SET status_del =1, weight =0 WHERE id = ' . $db->quote($id));
				$db->query('UPDATE  ' . NV_PREFIXLANG . '_' . $module_data . '_contract_info SET status_del =1, weight =0 WHERE contractid = ' . $db->quote($id));
				//$db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract  WHERE id = ' . $db->quote($id));
				if ($weight > 0)         {
					$sql = 'SELECT id, weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract WHERE weight >' . $weight;
					$result = $db->query($sql);
					while (list($id, $weight) = $result->fetch(3))
					{
						$weight--;
						$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_contract SET weight=' . $weight . ' WHERE id=' . intval($id));
					}
				}
				$nv_Cache->delMod($module_name);
				nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Contract', 'ID: ' . $id, $user_info['userid']);
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
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_contract');

			if (!empty($q)) {
				$db->where('pid LIKE :q_pid OR cid LIKE :q_cid OR yearmonth LIKE :q_yearmonth OR datefrom LIKE :q_datefrom OR dateto LIKE :q_dateto OR ccode LIKE :q_ccode');
			}
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_pid', '%' . $q . '%');
				$sth->bindValue(':q_cid', '%' . $q . '%');
				$sth->bindValue(':q_yearmonth', '%' . $q . '%');
				$sth->bindValue(':q_datefrom', '%' . $q . '%');
				$sth->bindValue(':q_dateto', '%' . $q . '%');
				$sth->bindValue(':q_ccode', '%' . $q . '%');
			}
			$sth->execute();
			$num_items = $sth->fetchColumn();

			$db->select('*')
				->order('weight ASC');
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_pid', '%' . $q . '%');
				$sth->bindValue(':q_cid', '%' . $q . '%');
				$sth->bindValue(':q_yearmonth', '%' . $q . '%');
				$sth->bindValue(':q_datefrom', '%' . $q . '%');
				$sth->bindValue(':q_dateto', '%' . $q . '%');
				$sth->bindValue(':q_ccode', '%' . $q . '%');
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
				$view['ccat'] = $array_ccat_lease[$view['ccat']]['title'];
				
				$view['datefrom_format'] = (empty($view['datefrom'])) ? '' : nv_date('d/m/Y', $view['datefrom']);
				$view['dateto_format'] = (empty($view['dateto'])) ? '' : nv_date('d/m/Y', $view['dateto']);
				$view['pid_vi'] = $array_pid_lease[$view['pid']]['title_vi'];
				$view['pid_en'] = $array_pid_lease[$view['pid']]['title_en'];
				$view['link_view_product'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=product/view/' . str_replace("/","-",$array_pid_lease[$view['cid']]['alias']) . '';
				$view['cid_vi'] = $array_cid_lease[$view['cid']]['title'];
				$view['cid_en'] = $array_cid_lease[$view['cid']]['title'];
				$view['link_view_cus'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=debt/view/' . str_replace("/","-",$array_cid_lease[$view['cid']]['cuscode']) . '';
				$view['sid_vi'] = $array_sid_lease[$view['sid']]['title_vi'];
				$view['sid_en'] = $array_sid_lease[$view['sid']]['title_en'];
				$view['contract_status_format'] = $array_contract_status_lease[$view['contract_status']]['title_vi'];
				$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/edit&amp;id=' . $view['id'];
				$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
				
				$xtpl->assign('VIEW', $view);
				
				if($view['status_del']==0){
					$xtpl->parse('main.view.loop');
				}
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
	


	$page_title = $lang_module['contract'];

	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}