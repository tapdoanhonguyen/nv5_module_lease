<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2021 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Fri, 20 Aug 2021 07:17:28 GMT
 */

if (!defined('NV_IS_FILE_MODULES'))
    die('Stop!!!');

$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_bank";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_charge";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_company";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_groups_customer";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rent_status";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_cat";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit";

$sql_create_module = $sql_drop_module;
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_bank(
  id int(11) NOT NULL AUTO_INCREMENT,
  companyid int(11) NOT NULL DEFAULT '0',
  vi_bank_number varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  en_bank_number varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_bank_account_holder varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  en_bank_account_holder varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_bank_name varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  en_bank_name varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_address varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  en_address varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  swiftcode int(2) NOT NULL DEFAULT '0',
  active tinyint(2) NOT NULL DEFAULT '0',
  adminid int(11) NOT NULL DEFAULT '0',
  crtd_date int(11) NOT NULL DEFAULT '0',
  weight int(11) NOT NULL DEFAULT '0',
  sort int(11) NOT NULL DEFAULT '0',
  userid_edit int(11) NOT NULL DEFAULT '0',
  update_date int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_charge(
  cid int(11) NOT NULL AUTO_INCREMENT,
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  active int(2) NOT NULL,
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  update_date int(11) NOT NULL,
  PRIMARY KEY (cid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_company(
  cid int(11) NOT NULL AUTO_INCREMENT,
  vi_title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  en_title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_address varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  en_address varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  vi_province varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  en_province varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  phone varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  fax varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  email varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  active int(11) NOT NULL DEFAULT '0',
  weight int(11) NOT NULL DEFAULT '0',
  adminid int(11) NOT NULL DEFAULT '0',
  crt_date int(11) NOT NULL DEFAULT '0',
  userid_edit int(11) NOT NULL DEFAULT '0',
  update_date int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (cid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer(
  cid int(11) NOT NULL AUTO_INCREMENT,
  cuscode varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  gid int(11) NOT NULL DEFAULT '0',
  address varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  mobile varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  fax varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  email varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  taxcode varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  person_legal varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  person_legal_mobile varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  note text COLLATE utf8mb4_unicode_ci NOT NULL,
  active int(1) NOT NULL,
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  update_date int(11) NOT NULL,
  PRIMARY KEY (cid),
  UNIQUE KEY cuscode (cuscode)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor(
  fid int(11) NOT NULL AUTO_INCREMENT,
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  area float NOT NULL,
  common_area float NOT NULL,
  area_for_rent float NOT NULL,
  elevator smallint(2) NOT NULL,
  stair smallint(2) NOT NULL,
  image varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  note text COLLATE utf8mb4_unicode_ci NOT NULL,
  active int(1) NOT NULL,
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  update_time int(11) NOT NULL,
  PRIMARY KEY (fid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_groups_customer(
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  note text COLLATE utf8mb4_unicode_ci NOT NULL,
  active int(1) NOT NULL,
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  time_update int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product(
  pid int(11) NOT NULL AUTO_INCREMENT,
  fid int(11) NOT NULL,
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  alias varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  area float NOT NULL,
  price_usd_min float NOT NULL,
  price_usd_max float NOT NULL,
  price_vnd_min float NOT NULL,
  price_vnd_max float NOT NULL,
  rent_status int(11) NOT NULL,
  image varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  note text COLLATE utf8mb4_unicode_ci NOT NULL,
  active tinyint(2) NOT NULL,
  adminid int(11) NOT NULL DEFAULT '0',
  crtd_date int(11) NOT NULL DEFAULT '0',
  userid_edit int(11) NOT NULL DEFAULT '0',
  update_date int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (pid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rent_status(
  rid int(11) NOT NULL AUTO_INCREMENT,
  decription varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  active int(2) NOT NULL,
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  update_date int(11) NOT NULL,
  PRIMARY KEY (rid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service(
  sid int(11) NOT NULL AUTO_INCREMENT,
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  catid int(11) NOT NULL,
  unitid int(11) NOT NULL,
  price_usd float NOT NULL,
  price_vnd float NOT NULL,
  chargeid int(11) NOT NULL,
  note text COLLATE utf8mb4_unicode_ci NOT NULL,
  active int(2) NOT NULL,
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  update_time int(11) NOT NULL,
  PRIMARY KEY (sid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_cat(
  cid int(11) NOT NULL AUTO_INCREMENT,
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  active int(2) NOT NULL,
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  update_date int(11) NOT NULL,
  PRIMARY KEY (cid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit(
  uid int(11) NOT NULL AUTO_INCREMENT,
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (uid)
) ENGINE=MyISAM";
