<?php

/**
 * @Project NUKEVIET 4.x
 * @Author NVholding <contact@nvholding.vn>
 * @Copyright (C) 2021 NVholding. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Tue, 03 Aug 2021 12:28:23 GMT
 */

if (!defined('NV_SYSTEM'))
    die('Stop!!!');

define('NV_IS_MOD_LEASE', true);

require NV_ROOTDIR . '/modules/' . $module_file . '/global.functions.php';


/**
 * nv_check_path_upload()
 *
 * @param mixed $path
 * @return
 */
function nv_check_path_upload($path)
{
    $path = htmlspecialchars(trim($path), ENT_QUOTES);
    $path = rtrim($path, '/');
    if (empty($path)) {
        return '';
    }

    $path = NV_ROOTDIR . '/' . $path;
    if (($path = realpath($path)) === false) {
        return '';
    }

    $path = str_replace("\\", '/', $path);
    $path = str_replace(NV_ROOTDIR . '/', '', $path);
    if (preg_match('/^' . nv_preg_quote(NV_UPLOADS_DIR) . '/', $path) or $path = NV_UPLOADS_DIR) {
        return $path;
    }
    return '';
}
