<?php
 
/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Jun 20, 2010 8:59:32 PM
 */
 
namespace NukeViet\Module\lease\Api;
 
use NukeViet\Api\Api;
use NukeViet\Api\ApiResult;
use NukeViet\Api\IApi;
 
if (!defined('NV_ADMIN') or !defined('NV_MAINFILE')) {
    die('Stop!!!');
}

class GetService implements IApi
{
    private $result;
 
    /**
     * @return number
     */
    public static function getAdminLev()
    {
        return Api::ADMIN_LEV_MOD;
    }
 
    /**
     * @return string
     */
    public static function getCat()
    {
        return 'users';
    }
 
    /**
     * {@inheritDoc}
     * @see \NukeViet\Api\IApi::setResultHander()
     */
    public function setResultHander(ApiResult $result)
    {
        $this->result = $result;
    }
	
 
    /**
     * {@inheritDoc}
     * @see \NukeViet\Api\IApi::execute()
     */
    public function execute()
    {
        global $db, $nv_Cache, $global_config, $nv_Request,$lang_global,$lang_module, $db_config, $crypt;
		$module_name = Api::getModuleName();
		$module_info = Api::getModuleInfo();
     
		$timestamp = $nv_Request->get_int('timestamp', 'post', '');
		$http_authorization = explode(":",base64_decode($_SERVER["HTTP_" .  $timestamp]));
		$access_token = NV_CHECK_SESSION;
		
		$this->result->set('message',$timestamp);

        $this->result->setSuccess();
 
        return $this->result->getResult();
    }
}