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
// Các tham số tùy chọn của mỗi API để vào biến $parameters
$apisecret = 'b85ZW18b4K4rEVOdIfshUD85R02X0r6l';
$timestamp = time();
$parameters = [];
$request = [
    // Tham số bắt buộc
	'apikey' => 'm7AGgHIJuAx50csrd8Js45enRiQq2zo1',
	'timestamp' => $timestamp,
	'hashsecret' => password_hash($apisecret . '_' . $timestamp, PASSWORD_DEFAULT),
	'language' => 'vi',
	'action' => 'GetService',
	'module' => 'lease',
];
$request = array_merge($request, $parameters);

$NV_Http = new NukeViet\Http\Http($global_config, NV_TEMP_DIR);
$args = [
	'headers' => [
		'Referer' => NV_MY_DOMAIN
	],
	'body' => $request,
	'timeout' => 20
];
$responsive = $NV_Http->post($NV_Http, $args);

$res = [];
$error = '';

if (is_array($responsive) and empty(NukeViet\Http\Http::$error)) {
	$res = !empty($responsive['body']) ? json_decode($responsive['body'], true) : [];
} elseif (!empty(NukeViet\Http\Http::$error)) {
	$error = 'Lỗi truy vấn: ' . NukeViet\Http\Http::$error;
} else {
	$error = 'Lỗi khác';
}



if(!defined('NV_IS_USER'))
	die('Stop!!!');
if($array_op[1] == "") {
	die('Stop!!!');
}else{
	$action = $array_op[1];
}



if($action == 'GetService'){
	$productid = $nv_Request->get_int('productid', 'get,post',0);
	$customerid = $nv_Request->get_int('customerid', 'get,post',0);
	$yearmonth = $nv_Request->get_title('yearmonth', 'get,post');
	$datefrom = $nv_Request->get_title('datefrom', 'get,post');
	$dateto = $nv_Request->get_title('dateto', 'get,post');
	$row = array();
	$row['3month'] = $yearmonth[0].$yearmonth[1];
	$row['year'] = $yearmonth[2].$yearmonth[3].$yearmonth[4].$yearmonth[5];
	if($row['3month'] == '01'){
		$month_array = $array_3month[$row['3month']]['month'];
	}
	if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $datefrom, $m))     {
		$_hour = 0;
		$_min = 0;
		$datefrom_time = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
		
	}
	else
	{
		$datefrom_time = 0;
	}
	
	if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $dateto, $m))     {
		$_hour = 0;
		$_min = 0;
		$dateto_time = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
		
	}
	else
	{
		$dateto_time = 0;
	}
	$where ="";
	if($yearmonth != ""){
		$data = array();
		$num_month =0;
		$i=0;
		foreach ($month_array as $month){
			$i++;
			
			$contract_info = array();
			$where ="ci.mainservice = 1 AND ci.yearmonth = '" . $month . $row['year'] . "' AND ci.customerid=" . $customerid ." AND ci.productid=" . $productid . ' AND c.status_del = 0 AND c.active = 1';

			$db->sqlreset()
			->select('ci.*')
			->from('' . NV_PREFIXLANG . '_' . $module_data . '_contract_info ci')
			->join('LEFT JOIN ' . NV_PREFIXLANG . '_' . $module_data . '_contract c ON ci.contractid = c.id')
			->where($where);
			$sth = $db->query($db->sql());
			$contract_info = $sth->fetchAll();
			$where ="yearmonth='". $month . $row['year'] ."'";

			$db->sqlreset()
			->select('*')
			->from('' . NV_PREFIXLANG . '_' . $module_data . '_exchange_rate')
			->where($where);
			$sth = $db->query($db->sql());
			$exchange_rate=$sth->fetch();
			if($i==1){
				$exchange_rate_global = $exchange_rate['exchange_rate'];
			}
			$start_month = date("m",$data['datefrom']);
			$start_year= date("Y",$data['datefrom']);
			$end_month = date("m",$data['dateto']);
			$end_year= date("Y",$data['dateto']);
			
			
			
			
			

			if($contract_info){
				$num_month++;
				$data[$month . $row['year']]['data'] = array();
				foreach ($contract_info as $info){
					if($month == date('m', $datefrom_time) && intval($month) < intval(date('m', $dateto_time))){
						$_hour = 0;
						$_min = 0;
						if($row['year']%4 == 0)
							$day_month_2 = '29';
						else
							$day_month_2 = '28';
						switch($month){
							case "02" : $day_end_of_month = $day_month_2; break;
							case "04":
							case "06":
							case "09":
							case "11" : $day_end_of_month = '30'; break;
							default : $day_end_of_month = '31';
						}
						$datefrom_3month = $datefrom_time;
						$dateto_3month = mktime($_hour, $_min, 0, $month, $day_end_of_month , $row['year']); 
						$datefrom_of_date_day = date('d', $datefrom_3month);
						$datefrom_of_date_month = date('m', $datefrom_3month);
						$datefrom_of_date_year = date('Y', $datefrom_3month);
						$dateto_of_date_day = date('d', $dateto_3month);
						$dateto_of_date_month = date('m', $dateto_3month);
						$dateto_of_date_year = date('Y', $dateto_3month);
						
					}elseif(intval($month) < intval(date('m', $dateto_time))){
						$_hour = 0;
						$_min = 0;
						if($row['year']%4 == 0)
							$day_month_2 = '29';
						else
							$day_month_2 = '28';
						switch($month){
							case "02" : $day_end_of_month = $day_month_2; break;
							case "04":
							case "06":
							case "09":
							case "11" : $day_end_of_month = '30'; break;
							default : $day_end_of_month = '31';
						}
						$datefrom_3month = mktime($_hour, $_min, 0, $month, '01' , $row['year']); 
						$dateto_3month = mktime($_hour, $_min, 0, $month, $day_end_of_month , $row['year']); 
						
					}elseif(intval($month) == intval(date('m', $dateto_time))){
						$_hour = 0;
						$_min = 0;
						if($row['year']%4 == 0)
							$day_month_2 = '29';
						else
							$day_month_2 = '28';
						switch($month){
							case "02" : $day_end_of_month = $day_month_2; break;
							case "04":
							case "06":
							case "09":
							case "11" : $day_end_of_month = '30'; break;
							default : $day_end_of_month = '31';
						}
						$datefrom_3month = mktime($_hour, $_min, 0, $month, '01' , $row['year']); 
						$dateto_3month = $dateto_time;
						$datefrom_of_date_day = date('d', $datefrom_3month);
						$datefrom_of_date_month = date('m', $datefrom_3month);
						$datefrom_of_date_year = date('Y', $datefrom_3month);
					}
					$row['contractid'] = $$info['id'];
					$row['productid'] = $info['pid'];
					$row['customerid'] = $info['cid'];
					$row['serviceid'] = $info['sid'];
					
					$info['fee_name_vi'] = $lang_module['feevnd2_vi'];
					$info['fee_name_en'] = $lang_module['feeusd2_en'];
					$row['datedocument'] = NV_CURRENTTIME;
					$info['yearmonth_format'] = $month . '/' . $row['year'];
					/* if($row['year']%4 == 0)
						$day_month_2 = '29';
					else
						$day_month_2 = '28';
					switch($month){
						case "02" : $day_end_of_month = $day_month_2; break;
						case "04":
						case "06":
						case "09":
						case "11" : $day_end_of_month = '30'; break;
						default : $day_end_of_month = '31';
					} */
					
					
					$info['datefrom_3month'] = $datefrom_3month;
					if(date('d', $datefrom_3month) =='01' && date('d', $dateto_3month) == $day_end_of_month && in_array(date('m', $datefrom_3month), $month_array) && in_array(date('m', $dateto_3month), $month_array)  ) {
						
						$info['amountday'] = 1;
						$info['amounttype'] = 'm';
						$info['datefrom'] = '01/'.$month.'/'.$row['year'];	
						$info['dateto'] = $day_end_of_month.'/'.$month.'/'.$row['year'];
							
						$info['unit_vi'] = $lang_module['month_vi'];
						$info['unit_en'] = $lang_module['month_en'];
						$info['priceusd'] = $info['price_en']*$info['amount'];
						if($exchange_rate['exchange_rate']>0){
							$info['pricevnd'] = $info['priceusd']*$exchange_rate['exchange_rate'];
						}
					}else{
						
						
						$first_date = strtotime($datefrom_of_date_year . '-' . $datefrom_of_date_month . '-' . $datefrom_of_date_day);
						$second_date = strtotime($dateto_of_date_year . '-' . $dateto_of_date_month . '-' . $dateto_of_date_day);
						$datediff = abs($first_date - $second_date);
						$count_day = floor($datediff / (60*60*24));
						$info['amountday'] = $count_day+1;
						$info['amounttype'] = 'd';
						
						$info['datefrom'] = '01/'.$month.'/'.$row['year'];	
						$info['dateto'] = $day_end_of_month.'/'.$month.'/'.$row['year'];
						$info['priceusd'] = $info['price_en']/30*$info['amount'];
						if($exchange_rate['exchange_rate']>0){
							$info['pricevnd'] = $info['priceusd']*$exchange_rate['exchange_rate'];
						}
						
						
						$info['feevnd'] = $info['feevnd']/30;
						$info['feeusd'] = $info['feeusd']/30;
						
						$info['unit_vi'] = $lang_module['day_vi'];
						$info['unit_en'] = $lang_module['day_en'];
					}
					$row['feedatefrom'] = $info['feedatefrom'];
					$row['feedateto'] = $info['feedatefrom'];
					//$row['price_vi'] = $info['pricevnd'];
					
					$data[$month . $row['year']]['data'][] = $info;//$db->sql();//
				}
			}else{
				$content=json_encode(array('status'=>"ERROR","code" => "020", "message" =>'No info'));
			}
			
		}
		$i=1;
		$total_debit = 0;
		foreach ($array_sid_lease as $key => $service){
			
			if($service['service_main'] == 1){
				$info=$info_month_s=array();
				$info_month_s['pricevnd'] = 0;
				$info_month_s['priceusd'] = 0;
				$info_month_s['amountmonth'] = 0;
				$info_month_s['amountday'] = 0;
				$info_month_s['service_name_vi'] = $array_sid_lease[$service['sid']]['title_vi'];
				$info_month_s['service_name_en'] = $array_sid_lease[$service['sid']]['title_en'];
				foreach ($data as $yearmonth_i => $data_month){
					
					foreach ($data_month['data'] as $month_i => $data_month_i){
						$info_month_s['amountmonth'] =0;
						$info_month_s['amountday'] =0;
						$info_month_s['yearmonth'] ='';
						if( $service['sid'] == $data_month_i['serviceid']){
							$info_month_s['serviceid'] = $data_month_i['serviceid'];
							$info_month_s['priceusd'] = $data_month_i['price_en'];
							$info_month_s['amount'] = $data_month_i['amount'];
							$info_month_s['yearmonth'] =$data_month_i['yearmonth'];
							$info_month_s['pricevnd'] = $info_month_s['priceusd']* $exchange_rate_global;
							if($data_month_i['amounttype'] == 'm'){
								$info_month_s['amountmonth'] = $data_month_i['amountday'];
							}
							if($data_month_i['amounttype'] == 'd'){
								$info_month_s['amountday'] = $data_month_i['amountday'];
							}
							$info_month_s['total_priceusd'] = (($info_month_s['priceusd']*$info_month_s['amount']*$info_month_s['amountmonth'])+((($info_month_s['priceusd']*$info_month_s['amount'])/30)*$info_month_s['amountday']));
							$info_month_s['total_pricevnd'] = (($info_month_s['pricevnd']*$info_month_s['amount']*$info_month_s['amountmonth'])+((($info_month_s['price_vi']*$info_month_s['amount'])/30)*$info_month_s['amountday']));
							$info_month_s['area_f_vi'] = number_format($info_month_s['amount']);
							$info_month_s['areal_unit_vi'] = 'm2';
							$info_month_s['unit_day_vi'] = $lang_module['day_vi'];
							$info_month_s['unit_month_vi'] = $lang_module['month_vi'];
							$info_month_s['area_f_en'] = number_format($info_month_s['pricevnd']);
							$info_month_s['price_f_vi'] = number_format($info_month_s['pricevnd']);
							$info_month_s['amountmonth_f_vi'] = number_format($info_month_s['amountmonth']);
							$info_month_s['amountmonth_f_en'] = number_format($info_month_s['amountmonth']);
							
							$info_month_s['amountday_f_vi'] = number_format($info_month_s['amountday']);
							$info_month_s['amountday_f_en'] = number_format($info_month_s['amountday']);
							//$row['price_en'] = $info_month_s['priceusd'];
							$info_month_s['price_f_en'] = number_format($info_month_s['priceusd']);
							$info_month_s['total_pricevnd_f_vi'] = number_format($info_month_s['total_pricevnd']);
							$info_month_s['total_priceusd_f_en'] = number_format($info_month_s['total_priceusd']);
							$info_month_s['yearmonth_format'] = substr($yearmonth_i,0,2).'/'.substr($yearmonth_i,2,4);
							$info_month_s['i'] = $i;
							$debitnote[$yearmonth]['data'][] = $info_month_s;
							$total_debit_en += $info_month_s['total_priceusd'];
							$total_debit_vi += $info_month_s['total_pricevnd'];
							$i++;
						}
					}
					
					
				}
				
			}
			
		}
		$total_debit_vat_en = $total_debit_en*10/100;
		$total_debit_vat_vi = $total_debit_vi*10/100;
		$total = array(
			'totalnum' => $i,
			'total_debit_en' => $total_debit_en,
			'total_debit_vat_en' => $total_debit_vat_en,
			'total_debit_vat_en' => $total_debit_en+$total_debit_vat_en,
			'total_debit_en_f' => number_format($total_debit_en),
			'total_debit_vat_en_f' => number_format($total_debit_vat_en),
			'total_debit_vat_en_f' => number_format($total_debit_en+$total_debit_vat_en),
			'total_debit_vi' => $total_debit_vi,
			'total_debit_vat_vi' => $total_debit_vat_vi,
			'total_debit_vat_vi' => $total_debit_vi+$total_debit_vat_vi,
			'total_debit_vi_f' => number_format($total_debit_vi),
			'total_debit_vat_vi_f' => number_format($total_debit_vat_vi),
			'total_debit_vat_vi_f' => number_format($total_debit_vi+$total_debit_vat_vi)
		);
		
		$content=json_encode(array('status'=>"OKE","code" => "000", "message" =>$debitnote, "areareal" =>$array_pid_lease[$productid]['area'], "total" =>$total));
	}else{
		$content=json_encode(array('status'=>"ERROR","code" => "020", "message" =>'No Contract'));
	}																
	echo $content;
}
if($action == 'GetServiceExtra'){
	$productid = $nv_Request->get_int('productid', 'get,post',0);
	$customerid = $nv_Request->get_int('customerid', 'get,post',0);
	$yearmonth = $nv_Request->get_title('yearmonth', 'get,post');
	$exchangeusd = str_replace(',','',$nv_Request->get_title('exchangeusd', 'post', 0));
	$dateto = $nv_Request->get_title('dateto', 'get,post');
	$datefrom = $nv_Request->get_title('datefrom', 'get,post');
	$where ="";
	$row = array();
	$row['month'] = $yearmonth[0].$yearmonth[1];
	$row['year'] = $yearmonth[2].$yearmonth[3].$yearmonth[4].$yearmonth[5];
	if($yearmonth != ""){
		$contract_info = array();
			$where ="ci.mainservice = 0 AND ci.yearmonth = '" . $row['month'] . $row['year'] . "' AND ci.customerid=" . $customerid ." AND ci.productid=" . $productid . ' AND c.status_del = 0 AND c.active = 1';

			$db->sqlreset()
			->select('ci.*')
			->from('' . NV_PREFIXLANG . '_' . $module_data . '_contract_info ci')
			->join('LEFT JOIN ' . NV_PREFIXLANG . '_' . $module_data . '_contract c ON ci.contractid = c.id')
			->where($where);
			$sth = $db->query($db->sql());
			$contract_info = $sth->fetchAll();
		
		if($contract_info){
			$i = 1;
			foreach ($contract_info as $key => $value){
				$value['i'] = $i;
				if($value['staticservice'] == 1){
					$value['info_service_extra'] = $db->query('SELECT amount_old, amount_new, amount   FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service_extra WHERE debit_service_extraid = ' . $value['serviceid'] . ' AND cid = ' . $value['customerid'] . ' AND pid = ' . $value['productid'] . ' AND yearmonth = "' . $row['month'].$row['year'] . '"AND active = 1 AND status_del = 0')->fetch();
					if($value['info_service_extra']['amount']>0){
						$value['amount'] = $value['info_service_extra']['amount'];
					}else{
						$value['amount'] =0;
					}
				}
				$value['datefrom'] = date("d/m/Y",$value['datefrom']);
				$value['service_name_vi'] = $array_sid_lease[$value['serviceid']]['title_vi'];
				$value['dateto'] = date("d/m/Y",$value['dateto']);
				$value['yearmonth_format'] = $row['month'].'/'.$row['year'];
				$value['pricevnd'] = $value['price_en'] * intval($exchangeusd);
				$value['price_f_vi'] = number_format($value['pricevnd']);
				$value['price_f_en'] = number_format($value['price_en']);
				$value['total_pricevnd_f_vi'] = number_format($value['pricevnd']*$value['amount']);
				$value['total_priceusd_f_en'] = number_format($value['price_en']*$value['amount']);
				$value['area_f_vi'] = number_format($value['amount']);
				$value['areal_unit_vi'] = number_format($value['amount']);
				$value['unit'] = $array_unitid_lease[$value['unitid']]['title'];
				$debitnote[$yearmonth]['data'][]=$value;
				$i++;
			}
			$content=json_encode(array('status'=>"OKE","code" => "000", "message" =>$debitnote));
		}else{
			$content=json_encode(array('status'=>"ERROR","code" => "020", "message" =>'No data'));
		}
	}else{
		$content=json_encode(array('status'=>"ERROR","code" => "020", "message" =>$yearmonth));
	}																
	echo $content;
}
if($action == 'ChangeServiceExtra'){
	$serviceextra = $nv_Request->get_int('serviceextra', 'get,post',0);
	$where ="";
	if($serviceextra != ""){
		$where ="sid='". $serviceextra ."'";

		$db->sqlreset()
		->select('*')
		->from('' . NV_PREFIXLANG . '_' . $module_data . '_service ')
		->where($where);
		$sth = $db->query($db->sql());
		$content=json_encode(array('status'=>"OKE","code" => "000", "message" =>$sth->fetch()));
	}else{
		$content=json_encode(array('status'=>"ERROR","code" => "020", "message" =>'No Contract'));
	}																
	echo $content;
}
if($action == 'getServiceExtraInfo'){
	$sid = $nv_Request->get_int('sid', 'get,post',0);
	$productid = $nv_Request->get_int('productid', 'get,post',0);
	$customerid = $nv_Request->get_int('customerid', 'get,post',0);
	$yearmonth = $nv_Request->get_title('yearmonth', 'get,post');
	$dateto = $nv_Request->get_title('dateto', 'get,post');
	$datefrom = $nv_Request->get_title('datefrom', 'get,post');
	$where ="";
	$month = $yearmonth[0].$yearmonth[1];
	$year = $yearmonth[2].$yearmonth[3].$yearmonth[4].$yearmonth[5];
	if($yearmonth != ""){
		$where ="se.yearmonth='". $yearmonth ."' AND se.cid=" . $customerid ." AND se.pid=" . $productid . " AND se.sid = " . $sid;

		$db->sqlreset()
		->select('se.*,s.title_vi title,s.unitid')
		->from('' . NV_PREFIXLANG . '_' . $module_data . '_service_extra se')
		->join(' LEFT JOIN ' . NV_PREFIXLANG . '_' . $module_data . '_service s ON se.sid = s.sid ' )
		->where($where);
		$sth = $db->query($db->sql());
		$data = $sth->fetchAll();
		
		if($data){
			
			foreach ($data as $key => $value){
				
				$value['datefrom'] = date("d/m/Y",$value['datefrom']);
				$value['dateto'] = date("d/m/Y",$value['dateto']);
				$value['unit'] = $array_unitid_lease[$value['unitid']]['title'];
				$data[$key]=$value;
			}
			$content=json_encode(array('status'=>"OKE","code" => "000", "message" =>$data));
		}else{
			$content=json_encode(array('status'=>"ERROR","code" => "020", "message" =>$db->sql()));
		}
	}else{
		$content=json_encode(array('status'=>"ERROR","code" => "020", "message" =>$yearmonth));
	}																
	echo $content;
}
if($action == 'GetExchange'){
	$yearmonth = $nv_Request->get_title('yearmonth', 'get,post');
	$where ="";
	if($yearmonth != ""){
		$where ="yearmonth='". $yearmonth ."'";

		$db->sqlreset()
		->select('*')
		->from('' . NV_PREFIXLANG . '_' . $module_data . '_exchange_rate')
		->where($where);
		$sth = $db->query($db->sql());
		$content=json_encode(array('status'=>"OKE","code" => "000", "message" =>$sth->fetch()));
		
	}else{
		$content=json_encode(array('status'=>"ERROR","code" => "020", "message" =>'No YearMonth'));
	}																
	echo $content;
}
if($action == 'GetCustomerAll'){
	$productid = $nv_Request->get_title('productid', 'get,post');
	$where ="";
	if($productid != ""){
		$where ="con.pid='". $productid ."' AND con.status_del = 0 AND cus.status_del = 0 ";

		$db->sqlreset()
		->select(' cus.*')
		->from('' . NV_PREFIXLANG . '_' . $module_data . '_contract con')
		-> join('LEFT JOIN ' . NV_PREFIXLANG . '_' . $module_data . '_customer cus ON con.cid = cus.cid AND con.active = 1 AND cus.active = 1 ')
		->group('cus.cid')
		->where($where);
		$sth = $db->query($db->sql());
		$data = $sth->fetchAll();
		if($data){
			
			
			$content=json_encode(array('status'=>"OKE","code" => "000", "message" =>$data));
		}else{
			$content=json_encode(array('status'=>"ERROR","code" => "020", "message" =>'No data'));
		}
	}else{
		$content=json_encode(array('status'=>"ERROR","code" => "020", "message" =>'No YearMonth'));
	}
	echo $content;
}
if($action == 'GetCustomer'){
	$customerid = $nv_Request->get_title('customerid', 'get,post');
	$where ="";
	if($customerid != ""){
		$where ="cid='". $customerid ."'";

		$db->sqlreset()
		->select(' *')
		->from('' . NV_PREFIXLANG . '_' . $module_data . '_customer')
		->where($where);
		$sth = $db->query($db->sql());
		$content=json_encode(array('status'=>"OKE","code" => "000", "message" =>'No data'));
	}else{
		$content=json_encode(array('status'=>"ERROR","code" => "020", "message" =>'No YearMonth'));
	}
	echo $content;
}
if($action == 'GetArea'){
	$productid = $nv_Request->get_title('productid', 'get,post');
	$where ="";
	if($productid != ""){
		/* $where ="pid='". $productid ."'";

		$db->sqlreset()
		->select(' *')
		->from('' . NV_PREFIXLANG . '_' . $module_data . '_product')
		->where($where);
		$sth = $db->query($db->sql());
		$content=json_encode(array('status'=>"OKE","code" => "000", "message" =>$sth->fetch())); */
		$content=json_encode(array('status'=>"OKE","code" => "000", "message" =>$array_pid_lease[$productid]));
	}else{
		$content=json_encode(array('status'=>"ERROR","code" => "020", "message" =>'No YearMonth'));
	}
	echo $content;
}
if($action == 'InfoDebitNote'){
	$productid = $nv_Request->get_title('productid', 'get,post');
	$customerid = $nv_Request->get_title('customerid', 'get,post');
	$yearmount = $nv_Request->get_title('yearmount', 'get,post');
	$where ="";
	if($yearmount != ""){
		$where ="mount='". $yearmount ."'";
	}
	$db->sqlreset()
	->select('*')
	->from('' . NV_PREFIXLANG . '_' . $module_data . '_exchange_rate')
	->where($where);
	$sth = $db->query($db->sql());
	$content=json_encode(array('status'=>"OKE","code" => "000", "message" =>$sth->fetch()));
	echo $content;
}
if($action == 'SendMail'){
	$debitid = $nv_Request->get_title('debitcode', 'get,post');
	$where ="id = " . $debitid;

	$db->sqlreset()
	->select('*')
	->from('' . NV_PREFIXLANG . '_' . $module_data . '_debitnote')
	->where($where);
	$sth = $db->query($db->sql())->fetch(5);
	$wherec ="cid = " . $sth->cid;

	$db->sqlreset()
	->select('*')
	->from('' . NV_PREFIXLANG . '_' . $module_data . '_customer')
	->where($wherec);
	$customer = $db->query($db->sql())->fetch(5);
	$debitcode = $sth->debitcode;
	$wherecp = 'cu.userid = ' . $user_info['userid'];
	$db->sqlreset()
	->select('*')
	->from('' . NV_PREFIXLANG . '_' . $module_data . '_company c')
	->join('LEFT JOIN ' . NV_PREFIXLANG . '_' . $module_data . '_company_users cu ON c.cid = cu.companyid')
	->where($wherecp);
	$company = $db->query($db->sql())->fetch(5);
	$title = sprintf($lang_module['sendmail_debitnote_title'], $company->vi_title, $debitcode);
	$my_sig = (!empty($admin_info['sig'])) ? $admin_info['sig'] : 'All the best';
	$my_mail = $company->email;
	if (empty($reason)) {
		$message = sprintf($lang_module['sendmail_debitnote_mess0'], $company->vi_title, nv_date('d/m/Y H:i', NV_CURRENTTIME), $my_mail);
	} else {
		$message = sprintf($lang_module['sendmail_debitnote_mess1'], $company->vi_title, nv_date('d/m/Y H:i', NV_CURRENTTIME), $reason, $my_mail);
	}
	$row = array();
	$error = array();
	$row['id'] = $sth->id;

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
	$where ="yearmonth='". $row['yearmonth'] ."' AND cid=" . $row['cid'] ." AND pid=" . $row['pid'];
	
	$db->sqlreset()
	->select('*')
	->from('' . NV_PREFIXLANG . '_' . $module_data . '_debitnote_extra')
	->order('service_main DESC')
	->where($where);
	$sth = $db->query($db->sql());
	$db->sqlreset()
	->select('*')
	->from('' . NV_PREFIXLANG . '_' . $module_data . '_contract')

	->where($where);
	$sthc = $db->query($db->sql());

	$debitnoteextra = $sth->fetchAll();
	$message = trim($message);

	$mess = $message;
	$mess = nv_nl2br($mess, '<br />');

	$content=send_mail($title,$my_sig,$my_mail,$mess,$row, $debitnoteextra,$company);

	$from = [$user_info['username'], $my_mail];
	$to = $customer->email;
	$send = nv_sendmail($from, $to, $title, $content);
	if (!$send) {
		$content=json_encode(array('status'=>"ERROR","code" => "022", "message" =>$lang_module['send_mail_not_send']));
	}else{
		$content=json_encode(array('status'=>"OKE","code" => "000", "message" =>$lang_module['send_mail_oke']));
	}
	
	echo $content;
}
if($action == 'PdfVi'){
	$debitid = $nv_Request->get_title('debitcode', 'get,post');
	$where ="id = " . $debitid;

	$db->sqlreset()
	->select('*')
	->from('' . NV_PREFIXLANG . '_' . $module_data . '_debitnote')
	->where($where);
	$row = $db->query($db->sql())->fetch();
	$debitcode = str_replace("/","-",$row['debitcode']);
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
	$row['product'] = $array_pid_lease[$row['pid']]['title_vi'];
	$row['customer'] = $array_cid_lease[$row['cid']]['title'];
	$where ="debitnoteid= ". $row['id'] ;
	
	$db->sqlreset()
	->select('*')
	->from('' . NV_PREFIXLANG . '_' . $module_data . '_debitnote_extra')
	->order('service_main DESC')
	->where($where);
	$sth = $db->query($db->sql());
	$total_vi = 0;
	$total_en = 0;


	while ($r = $sth->fetch()){

		$r['service'] =  $array_sid_lease[$r['serviceid']]['title_vi'];
		$r['datefrom'] =  date('d/m/Y', $r['datefrom']);
		$r['dateto'] =  date('d/m/Y', $r['dateto']);
		$total_vi += $r['total_vi'];
		$row['data'][] = $r;
	}
	//$content = '<page style="font-family: freeserif"><br />'.nl2br(save_pdf($row)).'</page>';
	//$content = save_pdf($row);


	$content = html_entity_decode(save_pdf_vi($row), ENT_COMPAT | ENT_HTML401, 'UTF-8');
	//$content = file_get_contents(NV_ROOTDIR.'/vendor/tecnickcom/tcpdf/examples/data/utf8test.txt');
    //$content = '<page style="font-family: freeserif"><br />'.nl2br($content).'</page>';
	$content = html_entity_decode(htmlentities($content), ENT_COMPAT | ENT_HTML401, 'UTF-8');
	//print_r($content);die;
	//require(NV_ROOTDIR . '/includes/html2fpdf.php');
	require(NV_ROOTDIR . '/vendor/tecnickcom/tcpdf/tcpdf.php');

	//use Spipu\Html2Pdf;
	//use Spipu\Html2Pdf\Exception\Html2PdfException;
	//use Spipu\Html2Pdf\Exception\ExceptionFormatter;	
	//require(NV_ROOTDIR . '/modules/lease/Html2Pdf.php');

	$html2pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'fr');
	$html2pdf->pdf->SetDisplayMode('real');
	$html2pdf->setDefaultFont('freeserif');
	$html2pdf->writeHTML($content);
	$html2pdf->Output(NV_ROOTDIR . '/uploads/lease/data/debitnode/' . $debitcode . "-VI.pdf","F");
		/* $f = fopen(NV_ROOTDIR . '/uploads/lease/data/debitnode/' . $debitcode . "-VI.pdf",'x+');
		fwrite ($html2pdf->Output(NV_ROOTDIR . '/uploads/lease/data/debitnode/' . $debitcode . "-VI.pdf"));
		//file_put_contents("{$N}.pdf", $data);
		fclose($f); */


		$content=json_encode(array('status'=>"OKE","code" => "000", "message" => array("link" => NV_MY_DOMAIN . "/uploads/lease/data/debitnode/" . $debitcode . "-VI.pdf" , "filename" => $debitcode . "-VI.pdf")));

		echo $content;
	}
	if($action == 'PdfEn'){
		$debitid = $nv_Request->get_title('debitcode', 'get,post');
		$where ="id = " . $debitid;

		$db->sqlreset()
		->select('*')
		->from('' . NV_PREFIXLANG . '_' . $module_data . '_debitnote')
		->where($where);
		$row = $db->query($db->sql())->fetch();
		$debitcode = str_replace("/","-",$row['debitcode']);
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
		$row['product'] = $array_pid_lease[$row['pid']]['title_en'];
		$row['customer'] = $array_cid_lease[$row['cid']]['title'];
		$where ="debitnoteid= ". $row['id'] ;

		$db->sqlreset()
		->select('*')
		->from('' . NV_PREFIXLANG . '_' . $module_data . '_debitnote_extra')
		->order('service_main DESC')
		->where($where);
		$sth = $db->query($db->sql());
		$total_vi = 0;
		$total_en = 0;

		
		while ($r = $sth->fetch()){
			
			$r['service'] =  $array_sid_lease[$r['serviceid']]['title_en'];
			$r['datefrom'] =  date('d/m/Y', $r['datefrom']);
			$r['dateto'] =  date('d/m/Y', $r['dateto']);
			$total_en += $r['total_en'];
			$row['data'][] = $r;
		}
		$content = html_entity_decode(save_pdf_en($row), ENT_COMPAT | ENT_HTML401, 'UTF-8');
	//$content = file_get_contents(NV_ROOTDIR.'/vendor/tecnickcom/tcpdf/examples/data/utf8test.txt');
    //$content = '<page style="font-family: freeserif"><br />'.nl2br($content).'</page>';
		$content = html_entity_decode(htmlentities($content), ENT_COMPAT | ENT_HTML401, 'UTF-8');
	//print_r($content);die;
	//require(NV_ROOTDIR . '/includes/html2fpdf.php');
		require(NV_ROOTDIR . '/vendor/tecnickcom/tcpdf/tcpdf.php');

	//use Spipu\Html2Pdf;
	//use Spipu\Html2Pdf\Exception\Html2PdfException;
	//use Spipu\Html2Pdf\Exception\ExceptionFormatter;	
	//require(NV_ROOTDIR . '/modules/lease/Html2Pdf.php');

		$html2pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'fr');
		$html2pdf->pdf->SetDisplayMode('real');
		$html2pdf->setDefaultFont('freeserif');
		$html2pdf->writeHTML($content);
		$html2pdf->Output(NV_ROOTDIR . '/uploads/lease/data/debitnode/' . $debitcode . "-EN.pdf","F");
		/* $f = fopen(NV_ROOTDIR . '/uploads/lease/data/debitnode/' . $debitcode . "-VI.pdf",'x+');
		fwrite ($html2pdf->Output(NV_ROOTDIR . '/uploads/lease/data/debitnode/' . $debitcode . "-VI.pdf"));
		//file_put_contents("{$N}.pdf", $data);
		fclose($f); */


		$content=json_encode(array('status'=>"OKE","code" => "000", "message" => array("link" => NV_MY_DOMAIN . "/uploads/lease/data/debitnode/" . $debitcode . "-EN.pdf" , "filename" => $debitcode . "-EN.pdf")));


		echo $content;
	}