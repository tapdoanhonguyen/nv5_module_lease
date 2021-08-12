<?php

/**
 * @Project NUKEVIET 4.x
 * @Author NVholding <contact@nvholding.vn>
 * @Copyright (C) 2021 NVholding. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Tue, 03 Aug 2021 12:28:23 GMT
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    die('Stop!!!');
}

$id = $nv_Request->get_int('id', 'get', 0);
$area = $nv_Request->get_int('area', 'get', 0);

// Sử dụng $id và $area để truy vấn vào CSDL, xác định ra dữ liệu của bài viết
// Dưới đây là code mẫu. Xem hướng dẫn ở https://wiki.nukeviet.vn/programming4:module:comment

// Ví dụ
/*
$rowcontent = $db_slave->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rows WHERE id=' . $id)->fetch();
if (!empty($rowcontent)) {
    // Chuyển hướng trình duyệt đến trang chi tiết bài viết
    nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $rowcontent['alias'] . '-' . $rowcontent['id'] . $global_config['rewrite_exturl']);
}
 */

// Thông báo lỗi không tồn tại bài viết
nv_info_die($lang_global['error_404_title'], $lang_global['error_404_title'], $lang_global['admin_no_allow_func'], 404);
