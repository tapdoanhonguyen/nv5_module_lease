<?php

/**
 * @Project NUKEVIET 4.x
 * @Author NVholding <contact@nvholding.vn>
 * @Copyright (C) 2021 NVholding. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Tue, 03 Aug 2021 12:28:23 GMT
 */

if (!defined('NV_MAINFILE'))
    die('Stop!!!');

$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_groups_customer";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rent_status";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_cat";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit";

$sql_create_module = $sql_drop_module;
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (
fid int(11) NOT NULL AUTO_INCREMENT,
  title varchar(250) NOT NULL,
  area float NOT NULL,
  common_area float NOT NULL,
  area_for_rent float NOT NULL,
  elevator smallint(2) NOT NULL,
  stair smallint(2) NOT NULL,
  image varchar(250) NOT NULL,
  note text NOT NULL,
  active int(1) NOT NULL,
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  update_time int(11) NOT NULL,
  PRIMARY KEY (fid)
) ENGINE=MyISAM;";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_groups_customer (
id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(250) NOT NULL,
  note text NOT NULL,
  active int(1) NOT NULL,
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  time_update int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM;";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (
 pid int(11) NOT NULL AUTO_INCREMENT,
  fid int(11) NOT NULL,
  title varchar(250) NOT NULL,
  area float NOT NULL,
  price_usd_min float NOT NULL,
  price_usd_max float NOT NULL,
  price_vnd_min float NOT NULL,
  price_vnd_max float NOT NULL,
  rent_status int(11) NOT NULL,
  image varchar(250) NOT NULL,
  note text NOT NULL,
  active tinyint(2) NOT NULL,
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  update_date int(11) NOT NULL,
  PRIMARY KEY (pid)
) ENGINE=MyISAM;";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rent_status (
rid int(11) NOT NULL AUTO_INCREMENT,
  decription varchar(250) NOT NULL,
  active int(2) NOT NULL,
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  update_date int(11) NOT NULL,
  PRIMARY KEY (rid)
) ENGINE=MyISAM;";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (
sid int(11) NOT NULL AUTO_INCREMENT,
  title varchar(250) NOT NULL,
  catid int(11) NOT NULL,
  unitid int(11) NOT NULL,
  price_usd float NOT NULL,
  price_vnd float NOT NULL,
  chargeid int(11) NOT NULL,
  note text NOT NULL,
  active int(2) NOT NULL,
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  update_time int(11) NOT NULL,
  PRIMARY KEY (sid)
) ENGINE=MyISAM;";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_cat (
cid int(11) NOT NULL AUTO_INCREMENT,
  title varchar(250) NOT NULL,
  active int(2) NOT NULL,
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  update_date int(11) NOT NULL,
  PRIMARY KEY (cid)
) ENGINE=MyISAM;";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit (
uid int(11) NOT NULL AUTO_INCREMENT,
  title varchar(250) NOT NULL,
  PRIMARY KEY (uid)
) ENGINE=MyISAM;";

// Comments
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'auto_postcomm', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'allowed_comm', '-1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'view_comm', '6')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'setcomm', '4')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'activecomm', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'emailcomm', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'adminscomm', '')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'sortcomm', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'captcha', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'perpagecomm', '5')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'timeoutcomm', '360')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'allowattachcomm', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'alloweditorcomm', '0')";
