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
$array_rent_status_lease = array();
$_sql = 'SELECT * FROM ' .NV_PREFIXLANG . '_' . $module_data . '_rent_status';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
	$array_rent_status_lease[$_row['id']] = $_row;
}
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
	$xtpl = new XTemplate('product_'.$action.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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
		$row = array();
		$error = array();
		$row['pid'] = $nv_Request->get_int('pid', 'post,get', 0);
		$xtpl->assign('PRODUCT_EDIT', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=product/edit&pid=' . $row['pid']),true);

		if ($nv_Request->isset_request('submit', 'post')) {
			$row['fid'] = $nv_Request->get_int('fid', 'post', 0);
			$row['productcode'] = $nv_Request->get_title('productcode', 'post', '');
			$row['title_vi'] = $nv_Request->get_title('title_vi', 'post', '');
			$row['title_en'] = $nv_Request->get_title('title_en', 'post', '');
			$row['alias'] = $nv_Request->get_title('alias', 'post', '');
			$row['alias'] = empty($row['alias']) ? change_alias($row['title_vi']) : change_alias($row['alias']);
			$row['area'] = str_replace(',','',$nv_Request->get_title('area', 'post', ''));
			$row['price_usd_min'] = str_replace(',','',$nv_Request->get_title('price_usd_min', 'post', '0'));
			$row['price_usd_max'] = str_replace(',','',$nv_Request->get_title('price_usd_max', 'post', '0'));
			$row['price_vnd_min'] = str_replace(',','',$nv_Request->get_title('price_vnd_min', 'post', '0'));
			$row['price_vnd_max'] = str_replace(',','',$nv_Request->get_title('price_vnd_max', 'post', '0'));
			$row['rent_status'] = $nv_Request->get_int('rent_status', 'post', 0);
			$row['image'] = $nv_Request->get_title('image', 'post', '');	
			$row['oldimage'] = $nv_Request->get_title('oldimage', 'post', '');
			$row['images'] = $nv_Request->get_title('images', 'post', '');

			if (is_file(NV_DOCUMENT_ROOT . $row['image']))     {
				$row['image'] = substr($row['image'], strlen(NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/'));
			} else {
				$row['image'] = '';
			}
			$row['note'] = $nv_Request->get_editor('note', '', NV_ALLOWED_HTML_TAGS);

			if (empty($row['fid'])) {
				$error[] = $lang_module['error_required_fid'];
			} elseif (empty($row['title_vi'])) {
				$error[] = $lang_module['error_required_title'];
			}elseif ($is_exists) {
				$error[] = $lang_module['error_required_alias'];
			} elseif (empty($row['area'])) {
				$error[] = $lang_module['error_required_area'];
			} 
			$file = end(explode('/',$row['image']));
			
			$path = nv_check_path_upload(NV_UPLOADS_DIR . '/' . $module_upload . '/' . $op);
			$allow_files_type = [
				'images'
			];
			$sys_max_size = $sys_max_size_local = min($global_config['nv_max_size'], nv_converttoBytes(ini_get('upload_max_filesize')), nv_converttoBytes(ini_get('post_max_size')));
			if ($global_config['nv_overflow_size'] > $sys_max_size and $global_config['upload_chunk_size'] > 0) {
				$sys_max_size_local = $global_config['nv_overflow_size'];
			}

			$upload = new NukeViet\Files\Upload($allow_files_type, $global_config['forbid_extensions'], $global_config['forbid_mimes'], [$sys_max_size, $sys_max_size_local], NV_MAX_WIDTH, NV_MAX_HEIGHT);
			$upload->setLanguage($lang_module);
			if (isset($_FILES['images']['tmp_name']) and is_uploaded_file($_FILES['images']['tmp_name'])) {
				// Upload Chunk (nhiều phần)
				if ($global_config['upload_chunk_size'] > 0 and $chunk_upload['chunks'] > 0) {
					$upload->setChunkOption($chunk_upload);
				}
				$upload_info = $upload->save_file($_FILES['images'], NV_ROOTDIR . '/' . $path, false, $global_config['nv_auto_resize']);
			}
			 if ($global_config['nv_auto_resize'] and ($upload_info['img_info'][0] > NV_MAX_WIDTH or $upload_info['img_info'][1] > NV_MAX_HEIGHT)) {
				$createImage = new NukeViet\Files\Image(NV_ROOTDIR . '/' . $path . '/' . $upload_info['basename'], $upload_info['img_info'][0], $upload_info['img_info'][1]);
				$createImage->resizeXY(NV_MAX_WIDTH, NV_MAX_HEIGHT);
				$createImage->save(NV_ROOTDIR . '/' . $path, $upload_info['basename'], $thumb_config['thumb_quality']);
				$createImage->close();
				$info = $createImage->create_Image_info;
				$upload_info['img_info'][0] = $info['width'];
				$upload_info['img_info'][1] = $info['height'];
				$upload_info['size'] = filesize(NV_ROOTDIR . '/' . $path . '/' . $upload_info['basename']);
			}
			 if (!nv_is_url($row['image']) and nv_is_file($row['image'], NV_UPLOADS_DIR . '/' . $module_upload . '/floor')) {
					$lu = strlen(NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/floor' . '/');
					$row['image'] = substr($row['image'], $lu);
				} else {
					$row['image'] = '';
				}
			if (empty($error)) {
				try {
					if (empty($row['pid'])) {
						$row['rent_status'] = $db->query('SELECT rid FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rent_status WHERE maindefault = 1')->fetchColumn();
						$row['update_date'] = 0;
//print_r('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_product (fid, title_vi, alias, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, active, adminid, crtd_date) VALUES (:fid, :title_vi, :alias, :area, :price_usd_min, :price_usd_max, :price_vnd_min, :price_vnd_max, :rent_status, :image, :note, 1, ' . $user_info['userid'] . ', ' .  NV_CURRENTTIME. ')');die;
						$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_product (fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, active, adminid, crtd_date) VALUES (:fid, :title_vi, :title_en, :alias, :productcode, :area, :price_usd_min, :price_usd_max, :price_vnd_min, :price_vnd_max, :rent_status, :image, :note, 1, ' . $user_info['userid'] . ', ' .  NV_CURRENTTIME. ')');	
						
					$stmt->bindParam(':rent_status', $row['rent_status'], PDO::PARAM_INT);
					} else {
						$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_product SET fid = :fid, title_vi = :title_vi, title_en = :title_en, alias = :alias, productcode = :productcode, area = :area, price_usd_min = :price_usd_min, price_usd_max = :price_usd_max, price_vnd_min = :price_vnd_min, price_vnd_max = :price_vnd_max, image = :image, note = :note, userid_edit = ' . $user_info['userid'] . ', update_date = ' . NV_CURRENTTIME . ' WHERE pid=' . $row['pid']);
					}
					$stmt->bindParam(':fid', $row['fid'], PDO::PARAM_INT);
					$stmt->bindParam(':productcode', $row['productcode'], PDO::PARAM_STR);
					$stmt->bindParam(':title_vi', $row['title_vi'], PDO::PARAM_STR);
					$stmt->bindParam(':title_en', $row['title_en'], PDO::PARAM_STR);
					$stmt->bindParam(':alias', $row['alias'], PDO::PARAM_STR);
					$stmt->bindParam(':area', $row['area'], PDO::PARAM_STR);
					$stmt->bindParam(':price_usd_min', $row['price_usd_min'], PDO::PARAM_STR);
					$stmt->bindParam(':price_usd_max', $row['price_usd_max'], PDO::PARAM_STR);
					$stmt->bindParam(':price_vnd_min', $row['price_vnd_min'], PDO::PARAM_STR);
					$stmt->bindParam(':price_vnd_max', $row['price_vnd_max'], PDO::PARAM_STR);
					$stmt->bindParam(':image', $row['image'], PDO::PARAM_STR);
					$stmt->bindParam(':note', $row['note'], PDO::PARAM_STR, strlen($row['note']));


					$exc = $stmt->execute();
					if ($exc) {
						$nv_Cache->delMod($module_name);
						if (empty($row['pid'])) {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Product_add', ' ', $user_info['userid']);
						} else {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Product_add', 'ID: ' . $row['pid'], $user_info['userid']);
						}
						nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=product');
					}
				} catch(PDOException $e) {
					trigger_error($e->getMessage());
					die($e->getMessage()); //Remove this line after checks finished
				}
			}
		} elseif ($row['pid'] > 0) {
			$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_product WHERE pid=' . $row['pid'])->fetch();
			if (empty($row)) {
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=product');
			}
		} else {
			$row['pid'] = 0;
			$row['fid'] = 0;
			$row['title_vi'] = '';
			$row['title_vi'] = '';
			$row['alias'] = '';
			$row['area'] = '';
			$row['price_usd_min'] = '';
			$row['price_usd_max'] = '';
			$row['price_vnd_min'] = '';
			$row['price_vnd_max'] = '';
			$row['rent_status'] = 0;
			$row['image'] = '';
			$row['note'] = '';
		}
		if (!empty($row['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $row['image'])) {
			$row['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $row['image'];
		}

		

		$row['note'] = nv_htmlspecialchars(nv_editor_br2nl($row['note']));
		$row['note'] = nv_module_aleditor('note', '100%', '300px', $row['note']);
		$xtpl->assign('ROW', $row);
		if (!nv_is_url($row['image']) and nv_is_file($row['image'], NV_UPLOADS_DIR . '/' . $module_upload . '/floor')) {
			$xtpl->assign('HIDDEN', '');
		}else{
			$row['image'] = '';
			$xtpl->assign('HIDDEN', 'hidden');
		}


		foreach ($array_fid_lease as $value) {
			$xtpl->assign('OPTION', array(
				'key' => $value['fid'],
				'title' => $value['title_vi'],
				'selected' => ($value['fid'] == $row['fid']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_fid');
		}
		foreach ($array_rent_status_lease as $value) {
			$xtpl->assign('OPTION', array(
				'key' => $value['rid'],
				'title' => $value['decription'],
				'selected' => ($value['rid'] == $row['rent_status']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.select_rent_status');
		}
		
		if (!empty($error)) {
			$xtpl->assign('ERROR', implode('<br />', $error));
			$xtpl->parse('main.error');
		}
		if (empty($row['pid'])) {
			$xtpl->parse('main.auto_get_alias');
		}

		$page_title = $lang_module['product_add'];
	}elseif($action == "import"){
		
	}elseif($action=="export"){
		
	}elseif($action=="view"){
		$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_product WHERE alias="' . $array_op[2] . '"')->fetch();
		if (empty($row)) {
			nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
		}
		$xtpl->assign('ROW', $row);
	}else{
		// Change status
		if ($nv_Request->isset_request('change_status', 'post, get')) {
			$pid = $nv_Request->get_int('pid', 'post, get', 0);
			$content = 'NO_' . $pid;

			$query = 'SELECT active FROM ' . NV_PREFIXLANG . '_' . $module_data . '_product WHERE pid=' . $pid;
			$row = $db->query($query)->fetch();
			if (isset($row['active']))     {
				$active = ($row['active']) ? 0 : 1;
				$query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_product SET active=' . intval($active) . ' WHERE pid=' . $pid;
				$db->query($query);
				$content = 'OK_' . $pid;
			}
			$nv_Cache->delMod($module_name);
			include NV_ROOTDIR . '/includes/header.php';
			echo $content;
			include NV_ROOTDIR . '/includes/footer.php';
		}

		if ($nv_Request->isset_request('ajax_action', 'post')) {
			$pid = $nv_Request->get_int('pid', 'post', 0);
			$new_vid = $nv_Request->get_int('new_vid', 'post', 0);
			$content = 'NO_' . $pid;
			if ($new_vid > 0)     {
				$sql = 'SELECT pid FROM ' . NV_PREFIXLANG . '_' . $module_data . '_product WHERE pid!=' . $pid . ' AND weight !=0 ORDER BY weight ASC';
				$result = $db->query($sql);
				$update_date = 0;
				while ($row = $result->fetch())
				{
					++$update_date;
					if ($update_date == $new_vid) ++$update_date;             $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_product SET weight=' . $update_date . ' WHERE pid=' . $row['pid'];
					$db->query($sql);
				}
				$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_product SET weight=' . $new_vid . ' WHERE pid=' . $pid;
				$db->query($sql);
				$content = 'OK_' . $pid;
			}
			$nv_Cache->delMod($module_name);
			include NV_ROOTDIR . '/includes/header.php';
			echo $content;
			include NV_ROOTDIR . '/includes/footer.php';
		}

		if ($nv_Request->isset_request('delete_pid', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
			$pid = $nv_Request->get_int('delete_pid', 'get');
			$delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
			if ($pid > 0 and $delete_checkss == md5($pid . NV_CACHE_PREFIX . $client_info['session_id'])) {
				$update_date=0;
				$sql = 'SELECT weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_product WHERE pid =' . $db->quote($pid) ;
				$result = $db->query($sql);
				list($update_date) = $result->fetch(3);
				
				$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_product SET status_del=1, weight =0 WHERE rid=' . intval($rid));
				//$db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_product  WHERE pid = ' . $db->quote($pid));
				if ($update_date > 0)         {
					$sql = 'SELECT pid, weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_product WHERE weight >' . $update_date;
					$result = $db->query($sql);
					while (list($pid, $update_date) = $result->fetch(3))
					{
						$update_date--;
						$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_product SET weight=' . $update_date . ' WHERE pid=' . intval($pid));
					}
				}
				$nv_Cache->delMod($module_name);
				nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Product', 'ID: ' . $pid, $user_info['userid']);
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		}


		$row['note'] = nv_htmlspecialchars(nv_editor_br2nl($row['note']));
		$row['note'] = nv_module_aleditor('note', '100%', '300px', $row['note']);



		$q = $nv_Request->get_title('q', 'post,get');

		// Fetch Limit
		$show_view = false;
		if (!$nv_Request->isset_request('id', 'post,get')) {
			$show_view = true;
			$per_page = 2000;
			$page = $nv_Request->get_int('page', 'post,get', 1);
			$db->sqlreset()
				->select('COUNT(*)')
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_product');

			if (!empty($q)) {
				$db->where('fid LIKE :q_fid OR title_vi LIKE :q_title OR area LIKE :q_area OR price_usd_min LIKE :q_price_usd_min OR price_usd_max LIKE :q_price_usd_max OR price_vnd_min LIKE :q_price_vnd_min OR price_vnd_max LIKE :q_price_vnd_max OR rent_status LIKE :q_rent_status');
			}
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_fid', '%' . $q . '%');
				$sth->bindValue(':q_title', '%' . $q . '%');
				$sth->bindValue(':q_area', '%' . $q . '%');
				$sth->bindValue(':q_price_usd_min', '%' . $q . '%');
				$sth->bindValue(':q_price_usd_max', '%' . $q . '%');
				$sth->bindValue(':q_price_vnd_min', '%' . $q . '%');
				$sth->bindValue(':q_price_vnd_max', '%' . $q . '%');
				$sth->bindValue(':q_rent_status', '%' . $q . '%');
			}
			$sth->execute();
			$num_items = $sth->fetchColumn();

			$db->select('*')
				->order('update_date ASC');
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_fid', '%' . $q . '%');
				$sth->bindValue(':q_title', '%' . $q . '%');
				$sth->bindValue(':q_area', '%' . $q . '%');
				$sth->bindValue(':q_price_usd_min', '%' . $q . '%');
				$sth->bindValue(':q_price_usd_max', '%' . $q . '%');
				$sth->bindValue(':q_price_vnd_min', '%' . $q . '%');
				$sth->bindValue(':q_price_vnd_max', '%' . $q . '%');
				$sth->bindValue(':q_rent_status', '%' . $q . '%');
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
					$xtpl->parse('main.view.loop.update_date_loop');
				}
				$view['price_format_vnd_min']=number_format($view['price_vnd_min'],0);
				$view['area_format']=number_format($view['area'],0);
				$view['price_format_vnd_max']=number_format($view['price_vnd_max'],0);
				$view['price_format_usd_min']=number_format($view['price_usd_min'],0);
				$view['price_format_usd_max']=number_format($view['price_usd_max'],0);
				$xtpl->assign('CHECK', $view['active'] == 1 ? 'checked' : '');
				$view['floorname'] = $array_fid_lease[$view['fid']]['title_vi'];
				$view['rent_status'] = $array_rent_status_lease[$view['rent_status']]['decription'];
				$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=product/edit&amp;pid=' . $view['pid'];
				$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_pid=' . $view['pid'] . '&amp;delete_checkss=' . md5($view['pid'] . NV_CACHE_PREFIX . $client_info['session_id']);
				$view['link_view'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/view/' . $view['alias'] . '';
				$xtpl->assign('VIEW', $view);
				$xtpl->parse('main.view.loop');
			}
			$xtpl->parse('main.view');
		}


		if (!empty($error)) {
			$xtpl->assign('ERROR', implode('<br />', $error));
			$xtpl->parse('main.error');
		}

		

		$page_title = $lang_module['product'];
	}
	$xtpl->parse('main');
	$contents = $xtpl->text('main');
	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}