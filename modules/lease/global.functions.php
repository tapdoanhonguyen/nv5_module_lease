<?php
$array_permission_groups = array();
$_sql = 'SELECT * FROM ' .NV_PREFIXLANG . '_' . $module_data . '_permission_groups';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
	$array_permission_groups[$_row['id']] = $_row;
}
$array_permission_func = array();
$_sql = 'SELECT * FROM ' .NV_PREFIXLANG . '_' . $module_data . '_permission_func';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
	$array_permission_func[$_row['id']] = $_row;
}
$array_permission = array();
$_sql = 'SELECT * FROM ' .NV_PREFIXLANG . '_' . $module_data . '_permission';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
	$array_permission[$_row['funccode']] = $_row;
}
$array_fid_lease = array();
$_sql = 'SELECT * FROM ' .NV_PREFIXLANG . '_' . $module_data . '_floor';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
	$array_fid_lease[$_row['fid']] = $_row;
}
$array_pid_lease = array();
$_sql = 'SELECT * FROM ' .NV_PREFIXLANG . '_' . $module_data . '_product';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
	$array_pid_lease[$_row['pid']] = $_row;
}
$array_gid_lease = array();
	$_sql = 'SELECT * FROM ' .NV_PREFIXLANG . '_' . $module_data . '_groups_customer';
	$_query = $db->query($_sql);
	while ($_row = $_query->fetch()) {
		$array_gid_lease[$_row['id']] = $_row;
	}
$array_cid_lease = array();
$_sql = 'SELECT * FROM ' .NV_PREFIXLANG . '_' . $module_data . '_customer';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
	$array_cid_lease[$_row['cid']] = $_row;
}

$array_sid_lease = array();
$_sql = 'SELECT * FROM ' .NV_PREFIXLANG . '_' . $module_data . '_service';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
	$array_sid_lease[$_row['sid']] = $_row;
}
$array_ccat_lease = array();
$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract_cat ORDER BY sort ASC';
$list = $nv_Cache->db($sql, 'catid', $module_name);
if (!empty($list)) {
    foreach ($list as $l) {
        $array_ccat_lease[$l['catid']] = $l;
        //$array_ccat_lease[$l['catid']]['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $l['alias'];
        if ($alias_cat_url == $l['alias']) {
            $catid = $l['catid'];
            $parentid = $l['parentid'];
        }
    }
}



/* 
$_sql = 'SELECT * FROM ' .NV_PREFIXLANG . '_' . $module_data . '_contract_cat';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
	$array_ccat_lease[$_row['cid']] = $_row;
} */
$array_userid_users = array();
$_sql = 'SELECT * FROM vidoco_users';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
	$array_userid_users[$_row['userid']] = $_row;
}

$array_companyid_lease = array();
$_sql = 'SELECT * FROM ' .NV_PREFIXLANG . '_' . $module_data . '_company';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
	$array_companyid_lease[$_row['cid']] = $_row;
}

$array_rent_status_lease = array();
$_sql = 'SELECT rid,decription FROM ' .NV_PREFIXLANG . '_' . $module_data . '_rent_status';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
	$array_rent_status_lease[$_row['rid']] = $_row;
}
$array_unitid_lease = array();
$_sql = 'SELECT uid,title FROM ' .NV_PREFIXLANG . '_' . $module_data . '_unit';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
	$array_unitid_lease[$_row['uid']] = $_row;
}
$array_catid_lease = array();
$_sql = 'SELECT cid,title FROM ' .NV_PREFIXLANG . '_' . $module_data . '_service_cat';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
	$array_catid_lease[$_row['cid']] = $_row;
}



$array_chargeid_lease = array();
$_sql = 'SELECT cid,title FROM ' .NV_PREFIXLANG . '_' . $module_data . '_charge';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
	$array_chargeid_lease[$_row['cid']] = $_row;
}
$array_invoice_status_lease = array();
$_sql = 'SELECT * FROM ' .NV_PREFIXLANG . '_' . $module_data . '_invoice_status';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
	$array_invoice_status_lease[$_row['id']] = $_row;
}
$array_month = array();
$array_month['01'] = 'Tháng 1';
$array_month['02'] = 'Tháng 2';
$array_month['03'] = 'Tháng 3';
$array_month['04'] = 'Tháng 4';
$array_month['05'] = 'Tháng 5';
$array_month['06'] = 'Tháng 6';
$array_month['07'] = 'Tháng 7';
$array_month['08'] = 'Tháng 8';
$array_month['09'] = 'Tháng 9';
$array_month['10'] = 'Tháng 10';
$array_month['11'] = 'Tháng 11';
$array_month['12'] = 'Tháng 12';

$array_year = array();
$array_money_type = array();
$array_money_type['VND'] = 'VND';
$array_money_type['USD'] = 'USD';
$array_config = array();
$array_config['contract_center_prefix'] = '/HD/';
$array_config['debitnote_center_prefix'] = '/DN/';
$array_config['debitnote_format_code'] = '%04s';
$array_config['contract_format_code'] = '%04s';
$array_config['customer_format_code'] = 'KH%06s';
$array_elevator = array();
$array_elevator[1] = $lang_module['stair'];
$array_elevator[0] = $lang_module['elevator'];
$array_cycle_lease = array();
$array_cycle_lease['day'] = $lang_module['cycle_day'];
$array_cycle_lease['month'] = $lang_module['cycle_month'];
$array_cycle_lease['3month'] = $lang_module['cycle_3month'];
$array_cycle_lease['year'] = $lang_module['cycle_year'];
$array_typein_lease = array();
$array_typein_lease['day'] = $lang_module['typein_day'];
$array_typein_lease['month'] = $lang_module['typein_month'];
$array_typein_lease['3month'] = $lang_module['typein_3month'];
$array_typein_lease['year'] = $lang_module['typein_year'];
$daily_report = array();
$daily_report['0'] = $lang_module['report_default'];
$daily_report['1'] = $lang_module['report_hour'];
$daily_report['2'] = $lang_module['report_date'];
$daily_report['3'] = $lang_module['report_month'];
$daily_report['4'] = $lang_module['report_3month'];
$daily_report['5'] = $lang_module['report_year'];
//$array_config['contract_center_prefix'] = '/KH/';
if(defined('NV_IS_USER')){
	$my_groups = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_company_users WHERE userid=' . $user_info['userid'])->fetch();
	$permission = array();
	foreach ($array_permission_groups as $value) {
		if($value['id'] == $my_groups['permissionid']){
			foreach ($array_permission_func as $func){
				$permission[$func['funccode']] = $array_permission[$func['funccode']]['act_' . $value['id']];
			}
		}
	}
}


function nextMonth()
{
    $nextMonthNumber = date('M', strtotime('first day of +1 month'));
    $nextMonthDate = new DateTime();
    $nextMonthDate->add(new DateInterval('P1M'));
    while ($nextMonthDate->format('M') != $nextMonthNumber) {
        $nextMonthDate->sub(new DateInterval('P1D'));
    }
    return $nextMonthDate;
}