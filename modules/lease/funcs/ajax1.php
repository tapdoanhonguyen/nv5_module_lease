<?php
$mod = $nv_Request->get_string( 'mod', 'get,post', '' );
//select 2
if($mod=="select_cid"){
	$q=$nv_Request->get_string('q', 'get','');
	$list = $db->query("SELECT * FROM " . NV_PREFIXLANG . '_' . $module_data . "_customer WHERE title like '%".str_replace(' ','%',$q)."%' ORDER BY title")->fetchAll();
	foreach($list as $result){
		$json[] = ['id'=>$result['cid'], 'text'=>$result['title']];
	}
	print_r(json_encode($json));die(); 
}