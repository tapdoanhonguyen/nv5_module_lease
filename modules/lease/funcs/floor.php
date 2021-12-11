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
	$xtpl = new XTemplate('floor_'.$action.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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
		$xtpl->assign('FLOOR_ADD', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=floor/add'),true);
		//$xtpl->assign('PRODUCT_IMPORT', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=product/import'),true);
		//$xtpl->assign('PRODUCT_EXPORT', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=product/export',true));
	if(	$action == "add" or $action == "edit"){
		$row = array();
		$error = array();
		$row['fid'] = $nv_Request->get_int('fid', 'post,get', 0);
		if ($nv_Request->isset_request('submit', 'post')) {
			$row['title_vi'] = $nv_Request->get_title('title_vi', 'post', '');
			$row['title_en'] = $nv_Request->get_title('title_en', 'post', '');
			$row['alias'] = $nv_Request->get_title('alias', 'post', '');
			$row['area'] = str_replace(',','',$nv_Request->get_title('area', 'post', ''));
			$row['common_area'] = str_replace(',','',$nv_Request->get_title('common_area', 'post', ''));
			$row['area_for_rent'] = str_replace(',','',$nv_Request->get_title('area_for_rent', 'post', ''));
			$row['elevator'] = $nv_Request->get_int('elevator', 'post', 0);
			if($row['elevator'] == 0  ){
				$check_elevator = 1;
				$check_stair =0;
			}
			if($row['elevator'] == 1 ){
				$check_elevator = 0;
				$check_stair =1;
			}
			
			$row['image'] = $nv_Request->get_title('image', 'post', '');
			$row['oldimage'] = $nv_Request->get_title('oldimage', 'post', '');
			$row['images'] = $nv_Request->get_title('images', 'post', '');
			$row['floorcode'] = $nv_Request->get_title('floorcode', 'post', '');
			$row['note'] = $nv_Request->get_editor('note', '', NV_ALLOWED_HTML_TAGS);
print_r($row);
			if (empty($row['title_vi'])) {
				$error[] = $lang_module['error_required_title'];
			} elseif (empty($row['area'])) {
				$error[] = $lang_module['error_required_area'];
			} elseif (empty($row['common_area'])) {
				$error[] = $lang_module['error_required_common_area'];
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
					$row['userid_edit'] = $user_info['userid'];
					if (empty($row['fid'])) {
						$row['adminid'] = $user_info['userid'];
						

						$stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_floor (title_vi, title_en, floorcode, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time) VALUES (:title_vi, :title_en, :floorcode,  :alias, :area, :common_area, :area_for_rent, :elevator, :stair, :image, :note, :weight, :active, ' . $user_info['userid'] . ', ' .  NV_CURRENTTIME. ', ' . $user_info['userid'] . ', ' .  NV_CURRENTTIME. ')');

						$stmt->bindValue(':active', 1, PDO::PARAM_INT);

						
						$weight = $db->query('SELECT max(weight) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_floor')->fetchColumn();
						$weight = intval($weight) + 1;
						$stmt->bindParam(':weight', $weight, PDO::PARAM_INT);


					} else {
						$stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_floor SET title_vi = :title_vi, title_en = :title_en, floorcode = :floorcode, alias = :alias, area = :area, common_area = :common_area, area_for_rent = :area_for_rent, elevator = :elevator, stair = :stair, image = :image, note = :note, userid_edit = ' . $user_info['userid'] . ', update_time = ' .  NV_CURRENTTIME. ' WHERE fid=' . $row['fid']);
					}
					$stmt->bindParam(':title_vi', $row['title_vi'], PDO::PARAM_STR);
					$stmt->bindParam(':title_en', $row['title_en'], PDO::PARAM_STR);
					$stmt->bindParam(':floorcode', $row['floorcode'], PDO::PARAM_STR);
					$stmt->bindParam(':alias', $row['alias'], PDO::PARAM_STR);
					$stmt->bindParam(':area', $row['area'], PDO::PARAM_STR);
					$stmt->bindParam(':common_area', $row['common_area'], PDO::PARAM_STR);
					$stmt->bindParam(':area_for_rent', $row['area_for_rent'], PDO::PARAM_STR);
					$stmt->bindParam(':elevator', $check_elevator, PDO::PARAM_INT);
					$stmt->bindParam(':stair', $check_stair, PDO::PARAM_INT);
					$stmt->bindParam(':image', $row['image'], PDO::PARAM_STR);
					$stmt->bindParam(':note', $row['note'], PDO::PARAM_STR, strlen($row['note']));
					
						
					$exc = $stmt->execute();
					if ($exc) {
						$nv_Cache->delMod($module_name);
						if (empty($row['fid'])) {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Floor', ' ', $user_info['userid']);
						} else {
							nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Floor', 'ID: ' . $row['fid'], $user_info['userid']);
						}
						nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
					}
				} catch(PDOException $e) {
					trigger_error($e->getMessage());
					die($e->getMessage()); //Remove this line after checks finished
				}
			}
		} elseif ($row['fid'] > 0) {
			$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_floor WHERE fid=' . $row['fid'])->fetch();
			$row['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/floor' . '/' . $row['image'];
			if (empty($row)) {
				nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
			}
		} else {
			$row['fid'] = 0;
			$row['title'] = '';
			$row['alias'] = '';
			$row['area'] = '';
			$row['common_area'] = '';
			$row['area_for_rent'] = '';
			$row['elevator'] = 0;
			$row['stair'] = 0;
			$row['image'] = '';
			$row['oldimage'] = '';
			$row['note'] = '';
		}

		$row['note'] = nv_htmlspecialchars(nv_editor_br2nl($row['note']));
		$row['note'] = nv_module_aleditor('note', '100%', '300px', $row['note']);


		$array_active[1] = 'Kích hoạt';

		$xtpl->assign('ROW', $row);
		if (!nv_is_url($row['image']) and nv_is_file($row['image'], NV_UPLOADS_DIR . '/' . $module_upload . '/floor')) {
			$xtpl->assign('HIDDEN', '');
		}else{
			$row['image'] = '';
			$xtpl->assign('HIDDEN', 'hidden');
		}


		if($row['elevator'] == 1 and $row['stair'] == 1 ){
			$check = 0;
		}
		if($row['stair'] == 1 and $row['elevator'] == 0){
			$check = 1;
		}

		foreach ($array_elevator as $key => $title) {
			$xtpl->assign('OPTION', array(
				'key' => $key,
				'title' => $title,
				'checked' => ($key == $check) ? ' checked="checked"' : ''
			));
			$xtpl->parse('main.radio_elevator');
		}

		if (!empty($error)) {
			$xtpl->assign('ERROR', implode('<br />', $error));
			$xtpl->parse('main.error');
		}
			$xtpl->parse('main.auto_get_alias');
		$page_title = $lang_module['floor'];
	}else{
		// Change status
		if ($nv_Request->isset_request('change_status', 'post, get')) {
			$fid = $nv_Request->get_int('fid', 'post, get', 0);
			$content = 'NO_' . $fid;

			$query = 'SELECT active FROM ' . NV_PREFIXLANG . '_' . $module_data . '_floor WHERE fid=' . $fid;
			$row = $db->query($query)->fetch();
			if (isset($row['active']))     {
				$active = ($row['active']) ? 0 : 1;
				$query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_floor SET active=' . intval($active) . ' WHERE fid=' . $fid;
				$db->query($query);
				$content = 'OK_' . $fid;
			}
			$nv_Cache->delMod($module_name);
			include NV_ROOTDIR . '/includes/header.php';
			echo $content;
			include NV_ROOTDIR . '/includes/footer.php';
		}

		if ($nv_Request->isset_request('ajax_action', 'post')) {
			$fid = $nv_Request->get_int('fid', 'post', 0);
			$new_vid = $nv_Request->get_int('new_vid', 'post', 0);
			$content = 'NO_' . $fid;
			if ($new_vid > 0)     {
				$sql = 'SELECT fid FROM ' . NV_PREFIXLANG . '_' . $module_data . '_floor WHERE fid!=' . $fid . ' AND weight!=0 ORDER BY weight ASC';
				$result = $db->query($sql);
				$update_time = 0;
				while ($row = $result->fetch())
				{
					++$update_time;
					if ($update_time == $new_vid) ++$update_time;             $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_floor SET weight=' . $update_time . ' WHERE fid=' . $row['fid'];
					$db->query($sql);
				}
				$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_floor SET weight=' . $new_vid . ' WHERE fid=' . $fid;
				$db->query($sql);
				$content = 'OK_' . $fid;
			}
			$nv_Cache->delMod($module_name);
			include NV_ROOTDIR . '/includes/header.php';
			echo $content;
			include NV_ROOTDIR . '/includes/footer.php';
		}

		if ($nv_Request->isset_request('delete_fid', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
			$fid = $nv_Request->get_int('delete_fid', 'get');
			$delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
			if ($fid > 0 and $delete_checkss == md5($fid . NV_CACHE_PREFIX . $client_info['session_id'])) {
				$update_time=0;
				$sql = 'SELECT update_time FROM ' . NV_PREFIXLANG . '_' . $module_data . '_floor WHERE fid =' . $db->quote($fid);
				$result = $db->query($sql);
				list($update_time) = $result->fetch(3);
				$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_floor SET status_del=1 WHERE rid=' . intval($rid));
				//$db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_floor  WHERE fid = ' . $db->quote($fid));
				if ($update_time > 0)         {
					$sql = 'SELECT fid, update_time FROM ' . NV_PREFIXLANG . '_' . $module_data . '_floor WHERE update_time >' . $update_time;
					$result = $db->query($sql);
					while (list($fid, $update_time) = $result->fetch(3))
					{
						$update_time--;
						$db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_floor SET update_time=' . $update_time . ' WHERE fid=' . intval($fid));
					}
				}
				$nv_Cache->delMod($module_name);
				nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Floor', 'ID: ' . $fid, $user_info['userid']);
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
				->from('' . NV_PREFIXLANG . '_' . $module_data . '_floor');

			if (!empty($q)) {
				$db->where('title LIKE :q_title OR area LIKE :q_area OR common_area LIKE :q_common_area OR area_for_rent LIKE :q_area_for_rent OR active LIKE :q_active');
			}
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_title', '%' . $q . '%');
				$sth->bindValue(':q_area', '%' . $q . '%');
				$sth->bindValue(':q_common_area', '%' . $q . '%');
				$sth->bindValue(':q_area_for_rent', '%' . $q . '%');
				$sth->bindValue(':q_active', '%' . $q . '%');
			}
			$sth->execute();
			$num_items = $sth->fetchColumn();

			$db->select('*')
				->order('weight ASC');
			$sth = $db->prepare($db->sql());

			if (!empty($q)) {
				$sth->bindValue(':q_title', '%' . $q . '%');
				$sth->bindValue(':q_area', '%' . $q . '%');
				$sth->bindValue(':q_common_area', '%' . $q . '%');
				$sth->bindValue(':q_area_for_rent', '%' . $q . '%');
				$sth->bindValue(':q_active', '%' . $q . '%');
			}
			$sth->execute();
		}

		$xtpl->assign('ROW', $row);
		if($row['elevator'] == 1 and $row['stair'] == 1 ){
			$check = 0;
		}
		if($row['stair'] == 1 and $row['elevator'] == 0){
			$check = 1;
		}

		foreach ($array_elevator as $key => $title) {
			$xtpl->assign('OPTION', array(
				'key' => $key,
				'title' => $title,
				'checked' => ($key == $check) ? ' checked="checked"' : ''
			));
			$xtpl->parse('main.radio_elevator');
		}

		foreach ($array_stair as $key => $title) {
			$xtpl->assign('OPTION', array(
				'key' => $key,
				'title' => $title,
				'checked' => ($key == $row['stair']) ? ' checked="checked"' : ''
			));
			$xtpl->parse('main.radio_stair');
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
					$xtpl->parse('main.view.loop.update_time_loop');
				}
				$view['area_format'] = number_format($view['area']);
				$view['common_area_format'] = number_format($view['common_area']);
				$view['area_for_rent_format'] = number_format($view['area_for_rent']);
				$xtpl->assign('CHECK', $view['active'] == 1 ? 'checked' : '');
				$view['elevator'] = $array_elevator[$view['elevator']];
				$view['stair'] = $array_stair[$view['stair']];
				$view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/edit&amp;fid=' . $view['fid'];
				$view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_fid=' . $view['fid'] . '&amp;delete_checkss=' . md5($view['fid'] . NV_CACHE_PREFIX . $client_info['session_id']);
				$xtpl->assign('VIEW', $view);
				if($view['status_del'] == 0 )
					$xtpl->parse('main.view.loop');
			}
			$xtpl->parse('main.view');
		}


		if (!empty($error)) {
			$xtpl->assign('ERROR', implode('<br />', $error));
			$xtpl->parse('main.error');
		}

		

		$page_title = $lang_module['floor'];
	}
	$xtpl->parse('main');
		$contents = $xtpl->text('main');
	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}else{
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']) . '&checkss=' . md5('0' . NV_CHECK_SESSION));
}