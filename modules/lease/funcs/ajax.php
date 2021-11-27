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
	$where ="";
	if($yearmonth != ""){
		$where ="cid=" . $customerid ." AND pid=" . $productid;
	
		$db->sqlreset()
			->select('*')
			->from('' . NV_PREFIXLANG . '_' . $module_data . '_contract')
			->where($where);
		$sth = $db->query($db->sql());
		$data = $sth->fetch();
		$start_month = date("m",$data['feedatefrom']);
		$start_year= date("Y",$data['feedatefrom']);
		$end_month = date("m",$data['feedateto']);
		$end_year= date("Y",$data['feedateto']);
		$contract_info = array();
		$row = array();
		$row['contractid'] = $data['id'];
		$row['productid'] = $data['pid'];
		$row['customerid'] = $data['cid'];
		$row['serviceid'] = $data['sid'];

		$row['datedocument'] = NV_CURRENTTIME;
		$row['feedatefrom'] = $data['feedatefrom'];
		$row['feedateto'] = $data['feedatefrom'];
		$row['price_vi'] = $data['pricevnd'];
		$data['price_f_vi'] = number_format($data['pricevnd']);
		$row['price_en'] = $data['priceusd'];
		$data['price_f_en'] = number_format($data['priceusd']);
		$row['fee_vi'] = $data['feevnd'];
		$data['fee_f_vi'] = number_format($data['feevnd']);
		$row['fee_en'] = $data['feeusd'];
		$data['fee_f_en'] = number_format($data['feeusd']);
		for($i= $start_year; $i<= $end_year; $i++){
			if($i == $start_year){
				for($j= $start_month; $j<= 12; $j++){
					if($j<10){
						$month='0'.$j;
					}else{
						$month=$j;
					}
					$row['yearmonth'] = $month.''.$i;
					$contract_info[$month.''.$i] = $row;
				}
			}elseif($i == $end_year){
				for($j= 1; $j<= $end_month; $j++){
					if($j<10){
						$month='0'.$j;
					}else{
						$month=$j;
					}
					$row['yearmonth'] = $month.''.$i;
					$contract_info[$month.''.$i] = $row;
				}
			} else{
				for($j= 1; $j<= 12; $j++){
					if($j<10){
						$month='0'.$j;
					}else{
						$month=$j;
					}
					$row['yearmonth'] = $month.''.$i;
					$contract_info[$month.''.$i] = $row;
				}
			}
			
		}

		if($data){
			$row['month'] = $yearmonth[0].$yearmonth[1];
			$row['year'] = $yearmonth[2].$yearmonth[3].$yearmonth[4].$yearmonth[5];
			$data['datefrom'] = '01/'.$row['month'].'/'.$row['year'];
			if($row['year']%4 == 0)
				$day_month_2 = 29;
			else
				$day_month_2 = 28;
			switch($row['month']){
				case "02" : $day_end_of_month = $day_month_2; break;
				case "04":
				case "06":
				case "09":
				case "11" : $day_end_of_month = 31; break;
				default : $day_end_of_month = 30;
			}
			$data['dateto'] = $day_end_of_month.'/'.$row['month'].'/'.$row['year'];
			$data['debitnote'] = $contract_info[$yearmonth];
			$content=json_encode(array('status'=>"OKE","code" => "000", "message" =>$data));
		}else{
			$content=json_encode(array('status'=>"ERROR","code" => "020", "message" =>$data));
		}
	}else{
		$content=json_encode(array('status'=>"ERROR","code" => "020", "message" =>'No Contract'));
	}																
	echo $content;
}
if($action == 'GetServiceExtra'){
	$productid = $nv_Request->get_int('productid', 'get,post',0);
	$customerid = $nv_Request->get_int('customerid', 'get,post',0);
	$yearmonth = $nv_Request->get_title('yearmonth', 'get,post');
	$dateto = $nv_Request->get_title('dateto', 'get,post');
	$datefrom = $nv_Request->get_title('datefrom', 'get,post');
	$where ="";
	$month = $yearmonth[0].$yearmonth[1];
	$year = $yearmonth[2].$yearmonth[3].$yearmonth[4].$yearmonth[5];
	if($yearmonth != ""){
		$where ="se.yearmonth='". $yearmonth ."' AND se.cid=" . $customerid ." AND se.pid=" . $productid;
	
		$db->sqlreset()
			->select('SUM(totalvnd) totalvnd ,SUM(totalusd) totalusd,SUM(amount) amount, se.pricevnd,se.priceusd,s.title_vi title,s.unitid,s.sid')
			->from('' . NV_PREFIXLANG . '_' . $module_data . '_service_extra se')
			->join(' LEFT JOIN ' . NV_PREFIXLANG . '_' . $module_data . '_service s ON se.sid = s.sid ' )
			->group('se.sid')
			->where($where);
		$sth = $db->query($db->sql());
		$data = $sth->fetchAll();
		
		if($data){
			
			foreach ($data as $key => $value){
				
				$value['datefrom'] = date("d/m/Y",$value['datefrom']);
				$value['dateto'] = date("d/m/Y",$value['dateto']);
				$value['yearmonth'] = $month.'/'.$year;
				$value['pricevnd_f'] = number_format($value['pricevnd']);
				$value['priceusd_f'] = number_format($value['priceusd']);
				$value['totalvnd_f'] = number_format($value['totalvnd']);
				$value['totalusd_f'] = number_format($value['totalusd']);
				$value['amount_f'] = number_format($value['amount']);
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
		$where ="mount='". $yearmonth ."'";
	
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
		$where ="con.pid='". $productid ."'";
	
		$db->sqlreset()
			->select(' cus.*')
			->from('' . NV_PREFIXLANG . '_' . $module_data . '_contract con')
			-> join('LEFT JOIN ' . NV_PREFIXLANG . '_' . $module_data . '_customer cus ON con.cid = cus.cid AND con.active = 1 AND cus.active = 1')
			->where($where);
		$sth = $db->query($db->sql());
		$data = $sth->fetchAll();
		if($data){
			
			
			$content=json_encode(array('status'=>"OKE","code" => "000", "message" =>$data));
		}else{
			$content=json_encode(array('status'=>"ERROR","code" => "020", "message" =>$db->sql()));
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
		$content=json_encode(array('status'=>"OKE","code" => "000", "message" =>$sth->fetch()));
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