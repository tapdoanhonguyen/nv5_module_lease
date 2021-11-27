<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2021 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Thu, 18 Nov 2021 10:35:33 GMT
 */

if (!defined('NV_IS_FILE_MODULES'))
    die('Stop!!!');

$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_bank";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_charge";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_company";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_company_users";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_cat";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_money";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_extra";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_money";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_discount";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_exchange_rate";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_groups_customer";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_payment";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_permission";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_permission_func";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_permission_groups";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rent_status";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_cat";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_extra";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_sign";
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
  status_del tinyint(4) NOT NULL DEFAULT '0',
  userid_del int(11) NOT NULL DEFAULT '0',
  time_del int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_charge(
  cid int(11) NOT NULL AUTO_INCREMENT,
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  weight int(11) NOT NULL DEFAULT '0',
  active int(2) NOT NULL,
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  update_date int(11) NOT NULL,
  PRIMARY KEY (cid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_company(
  cid int(11) NOT NULL AUTO_INCREMENT,
  companycode varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
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
  status_del int(11) NOT NULL DEFAULT '0',
  userid_del int(11) NOT NULL DEFAULT '0',
  time_del int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (cid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_company_users(
  userid int(11) NOT NULL DEFAULT '0',
  companyid int(11) NOT NULL DEFAULT '0',
  permisstionid int(11) NOT NULL DEFAULT '0',
  weight int(11) NOT NULL DEFAULT '0',
  active int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (userid,companyid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract(
  id int(11) NOT NULL AUTO_INCREMENT,
  pid int(11) NOT NULL DEFAULT '0',
  cid int(11) NOT NULL DEFAULT '0',
  companyid int(11) NOT NULL DEFAULT '0',
  yearmonth varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  year int(11) NOT NULL DEFAULT '0',
  datefrom int(11) NOT NULL DEFAULT '0',
  dateto int(11) NOT NULL DEFAULT '0',
  ccode varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  cycle varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  pricevnd float NOT NULL DEFAULT '0',
  priceusd float NOT NULL DEFAULT '0',
  yearpercent float NOT NULL,
  feedateto int(11) NOT NULL DEFAULT '0',
  feedatefrom int(11) NOT NULL DEFAULT '0',
  feedatemain int(11) NOT NULL DEFAULT '15',
  feedateextra int(11) NOT NULL DEFAULT '15',
  note text COLLATE utf8mb4_unicode_ci NOT NULL,
  active int(11) NOT NULL DEFAULT '0',
  weight int(11) NOT NULL DEFAULT '0',
  adminid int(11) NOT NULL DEFAULT '0',
  crtd_date int(11) NOT NULL DEFAULT '0',
  userid_edit int(11) NOT NULL DEFAULT '0',
  update_date int(11) NOT NULL DEFAULT '0',
  feevnd int(11) NOT NULL DEFAULT '0',
  feeusd int(11) NOT NULL DEFAULT '0',
  areareal float NOT NULL DEFAULT '0',
  ccat int(11) NOT NULL DEFAULT '0',
  sid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  UNIQUE KEY pid (pid,cid,yearmonth)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_cat(
  cid int(11) NOT NULL AUTO_INCREMENT,
  parentid int(11) NOT NULL DEFAULT '0',
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  active int(11) NOT NULL DEFAULT '0',
  weight int(11) NOT NULL DEFAULT '0',
  sort int(11) NOT NULL DEFAULT '0',
  lev int(11) NOT NULL DEFAULT '0',
  status_del tinyint(4) NOT NULL DEFAULT '0',
  adminid int(11) NOT NULL DEFAULT '0',
  addtime int(11) NOT NULL DEFAULT '0',
  userid_edit int(11) NOT NULL DEFAULT '0',
  update_time int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (cid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info(
  id int(11) NOT NULL AUTO_INCREMENT,
  contractid int(11) NOT NULL DEFAULT '0',
  productid int(11) NOT NULL DEFAULT '0',
  customerid int(11) NOT NULL DEFAULT '0',
  serviceid int(11) NOT NULL DEFAULT '0',
  yearmonth varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  datedocument int(11) NOT NULL DEFAULT '0',
  feedatefrom int(11) NOT NULL DEFAULT '0',
  feedateto int(11) NOT NULL DEFAULT '0',
  price_vi float NOT NULL DEFAULT '0',
  price_en float NOT NULL DEFAULT '0',
  fee_vi float NOT NULL DEFAULT '0',
  fee_en float NOT NULL DEFAULT '0',
  active tinyint(4) NOT NULL DEFAULT '0',
  weight int(11) NOT NULL DEFAULT '0',
  status_del tinyint(4) NOT NULL DEFAULT '0',
  adminid int(11) NOT NULL DEFAULT '0',
  crt_date int(11) NOT NULL DEFAULT '0',
  userid_edit int(11) NOT NULL DEFAULT '0',
  update_time int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_money(
  id int(11) NOT NULL AUTO_INCREMENT,
  contractid int(11) NOT NULL DEFAULT '0',
  month int(11) NOT NULL,
  year int(11) NOT NULL,
  pid int(11) NOT NULL DEFAULT '0',
  cid int(11) NOT NULL DEFAULT '0',
  sid int(11) NOT NULL DEFAULT '0',
  moneyvnd float NOT NULL DEFAULT '0',
  moneyusd float NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer(
  cid int(11) NOT NULL AUTO_INCREMENT,
  cuscode varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  companyid int(11) NOT NULL DEFAULT '0',
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  gid int(11) NOT NULL DEFAULT '0',
  address varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  mobile varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  fax varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  email varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  taxcode varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  person_legal varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  person_legal_mobile varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  vi_note text COLLATE utf8mb4_unicode_ci NOT NULL,
  en_note varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  weight int(11) NOT NULL DEFAULT '0',
  active int(1) NOT NULL,
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  update_date int(11) NOT NULL,
  status_del int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (cid),
  UNIQUE KEY cuscode (cuscode)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote(
  id int(11) NOT NULL AUTO_INCREMENT,
  pid int(11) NOT NULL DEFAULT '0',
  cid int(11) NOT NULL DEFAULT '0',
  yearmonth varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  debitnotedate int(11) NOT NULL DEFAULT '0',
  datefrom int(11) NOT NULL DEFAULT '0',
  dateto int(11) NOT NULL DEFAULT '0',
  areareal float NOT NULL,
  exchangeusd int(11) NOT NULL DEFAULT '1',
  recipients_vi varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  recipients_en varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  explain_vi varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  explain_en varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  account_bank_vi varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  account_bank_en varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  holding_vi varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  holding_en varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  bank_name_vi varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  bank_name_en varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  bank_address_vi varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  bank_address_en varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  swiftcode varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  note_vi text COLLATE utf8mb4_unicode_ci NOT NULL,
  note_en text COLLATE utf8mb4_unicode_ci NOT NULL,
  companyid int(11) NOT NULL DEFAULT '0',
  year int(11) NOT NULL DEFAULT '0',
  comapyname_vi varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  comapyname_en varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  manager_name_vi varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  manager_name_en varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  adminid int(11) NOT NULL DEFAULT '0',
  crt_date int(11) NOT NULL DEFAULT '0',
  userid_edit int(11) NOT NULL DEFAULT '0',
  update_date int(11) NOT NULL DEFAULT '0',
  weight int(11) NOT NULL DEFAULT '0',
  debitcode varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  active int(11) NOT NULL DEFAULT '0',
  note text COLLATE utf8mb4_unicode_ci NOT NULL,
  status int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  UNIQUE KEY pid (pid,cid,yearmonth)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_extra(
  id int(11) NOT NULL AUTO_INCREMENT,
  debitnoteid int(11) NOT NULL DEFAULT '0',
  pid int(11) NOT NULL DEFAULT '0',
  cid int(11) NOT NULL DEFAULT '0',
  yearmonth varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  adddate int(11) NOT NULL DEFAULT '0',
  serviceid int(11) NOT NULL DEFAULT '0',
  service_name varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '',
  service_main int(11) NOT NULL DEFAULT '0',
  exchangeusd int(11) NOT NULL DEFAULT '1',
  price_vi float NOT NULL,
  price_en float NOT NULL,
  amount float NOT NULL DEFAULT '0',
  total_vi float NOT NULL,
  total_en float NOT NULL,
  note text COLLATE utf8mb4_unicode_ci NOT NULL,
  userid_edit int(11) NOT NULL DEFAULT '0',
  update_date int(11) NOT NULL DEFAULT '0',
  adminid int(11) NOT NULL DEFAULT '0',
  crt_date int(11) NOT NULL DEFAULT '0',
  weight int(11) NOT NULL DEFAULT '0',
  active int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_money(
  id int(11) NOT NULL AUTO_INCREMENT,
  debitnoteid int(11) NOT NULL DEFAULT '0',
  pid int(11) NOT NULL DEFAULT '0',
  cid int(11) NOT NULL DEFAULT '0',
  yearmonth varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  adddate int(11) NOT NULL DEFAULT '0',
  serviceid int(11) NOT NULL DEFAULT '0',
  exchangeid int(11) NOT NULL DEFAULT '0',
  price_vi float NOT NULL,
  price_en float NOT NULL,
  amount float NOT NULL DEFAULT '0',
  total_vi float NOT NULL,
  total_en float NOT NULL,
  note text COLLATE utf8mb4_unicode_ci NOT NULL,
  userid_edit int(11) NOT NULL DEFAULT '0',
  update_date int(11) NOT NULL DEFAULT '0',
  adminid int(11) NOT NULL DEFAULT '0',
  crt_date int(11) NOT NULL DEFAULT '0',
  weight int(11) NOT NULL DEFAULT '0',
  active int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  UNIQUE KEY pid (pid,cid,yearmonth)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_discount(
  id int(11) NOT NULL AUTO_INCREMENT,
  pid int(11) NOT NULL DEFAULT '0',
  cid int(11) NOT NULL DEFAULT '0',
  yearmonth varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  discountvnd float NOT NULL DEFAULT '0',
  discountusd float NOT NULL DEFAULT '0',
  note text COLLATE utf8mb4_unicode_ci NOT NULL,
  adminid int(11) NOT NULL DEFAULT '0',
  active int(11) NOT NULL DEFAULT '0',
  weight int(11) NOT NULL DEFAULT '0',
  crtd_date int(11) NOT NULL DEFAULT '0',
  userid_edit int(11) NOT NULL DEFAULT '0',
  update_time int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  UNIQUE KEY pid (pid,cid,yearmonth)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_exchange_rate(
  id int(11) NOT NULL AUTO_INCREMENT,
  mount varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  exchange_rate int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  UNIQUE KEY mount (mount)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor(
  fid int(11) NOT NULL AUTO_INCREMENT,
  floorcode varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  title_vi varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  title_en varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  alias varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  area float NOT NULL,
  common_area float NOT NULL,
  area_for_rent float NOT NULL,
  elevator smallint(2) NOT NULL,
  stair smallint(2) NOT NULL,
  image varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  note text COLLATE utf8mb4_unicode_ci NOT NULL,
  weight int(11) NOT NULL DEFAULT '0',
  active int(1) NOT NULL,
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  update_time int(11) NOT NULL,
  status_del int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (fid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_groups_customer(
  id int(11) NOT NULL AUTO_INCREMENT,
  code varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  note text COLLATE utf8mb4_unicode_ci NOT NULL,
  weight int(11) NOT NULL DEFAULT '0',
  active int(1) NOT NULL,
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  time_update int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_payment(
  id int(11) NOT NULL AUTO_INCREMENT,
  debitnote int(11) NOT NULL DEFAULT '0',
  customerid int(11) NOT NULL DEFAULT '0',
  customername varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  yearmonth varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  addtime int(11) NOT NULL DEFAULT '0',
  note_vi varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  note_en varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  exchangeusd int(11) NOT NULL DEFAULT '1',
  total_vi float NOT NULL DEFAULT '0',
  total_en float NOT NULL DEFAULT '0',
  status_payment int(11) NOT NULL DEFAULT '-1',
  adminid int(11) NOT NULL DEFAULT '0',
  crt_date int(11) NOT NULL DEFAULT '0',
  userid_edit int(11) NOT NULL DEFAULT '0',
  update_date int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_permission(
  id int(11) NOT NULL AUTO_INCREMENT,
  titte varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  type varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  adminid int(11) NOT NULL DEFAULT '0',
  crt_date int(11) NOT NULL DEFAULT '0',
  userid_edit int(11) NOT NULL DEFAULT '0',
  update_time int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_permission_func(
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  adminid int(11) NOT NULL DEFAULT '0',
  crt_date int(11) NOT NULL DEFAULT '0',
  userid_edit int(11) NOT NULL DEFAULT '0',
  update_time int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_permission_groups(
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  groupid int(11) NOT NULL DEFAULT '0',
  addtime int(11) NOT NULL DEFAULT '0',
  adminid int(11) NOT NULL DEFAULT '0',
  edittime int(11) NOT NULL DEFAULT '0',
  userid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product(
  pid int(11) NOT NULL AUTO_INCREMENT,
  fid int(11) NOT NULL,
  title_vi varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  title_en varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  alias varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  productcode varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  area float NOT NULL,
  price_usd_min float NOT NULL,
  price_usd_max float NOT NULL,
  price_vnd_min float NOT NULL,
  price_vnd_max float NOT NULL,
  rent_status int(11) NOT NULL,
  image varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  note text COLLATE utf8mb4_unicode_ci NOT NULL,
  weight int(11) NOT NULL DEFAULT '0',
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
  maindefault tinyint(4) NOT NULL DEFAULT '0',
  active int(2) NOT NULL,
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  update_date int(11) NOT NULL,
  status_del tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (rid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service(
  sid int(11) NOT NULL AUTO_INCREMENT,
  service_main int(11) NOT NULL DEFAULT '0',
  title_vi varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  title_en varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  servicecode varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  catid int(11) NOT NULL,
  unitid int(11) NOT NULL,
  price_usd float NOT NULL,
  price_vnd float NOT NULL,
  chargeid int(11) NOT NULL,
  dailyreport tinyint(4) NOT NULL DEFAULT '0',
  note text COLLATE utf8mb4_unicode_ci NOT NULL,
  weight int(11) NOT NULL DEFAULT '0',
  active int(2) NOT NULL,
  typein varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  update_time int(11) NOT NULL,
  status_del tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (sid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_cat(
  cid int(11) NOT NULL AUTO_INCREMENT,
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  weight int(11) NOT NULL DEFAULT '0',
  active int(2) NOT NULL,
  status_del tinyint(4) NOT NULL DEFAULT '0',
  adminid int(11) NOT NULL,
  crtd_date int(11) NOT NULL,
  userid_edit int(11) NOT NULL,
  update_date int(11) NOT NULL,
  PRIMARY KEY (cid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_extra(
  id int(11) NOT NULL AUTO_INCREMENT,
  pid int(11) NOT NULL DEFAULT '0',
  cid int(11) NOT NULL DEFAULT '0',
  sid int(11) NOT NULL DEFAULT '0',
  yearmonth varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  datefrom int(11) NOT NULL DEFAULT '0',
  dateto int(11) NOT NULL DEFAULT '0',
  pricevnd float NOT NULL DEFAULT '0',
  priceusd float NOT NULL DEFAULT '0',
  amount float NOT NULL DEFAULT '0',
  totalvnd float NOT NULL DEFAULT '0',
  totalusd float NOT NULL DEFAULT '0',
  note text COLLATE utf8mb4_unicode_ci NOT NULL,
  active int(11) NOT NULL DEFAULT '0',
  userid_edit int(11) NOT NULL DEFAULT '0',
  update_date int(11) NOT NULL DEFAULT '0',
  adminid int(11) NOT NULL DEFAULT '0',
  crt_date int(11) NOT NULL DEFAULT '0',
  weight int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_sign(
  userid int(11) NOT NULL,
  sign_vi varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  image_sign_vi varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  sign_en varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  image_sign_en varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (userid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit(
  uid int(11) NOT NULL AUTO_INCREMENT,
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (uid)
) ENGINE=MyISAM";

$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'sortcomm', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'auto_postcomm', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'allowed_comm', '-1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'view_comm', '6')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'setcomm', '4')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'activecomm', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'emailcomm', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'adminscomm', '')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'captcha', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'perpagecomm', '5')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'timeoutcomm', '360')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'allowattachcomm', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'alloweditorcomm', '0')";
