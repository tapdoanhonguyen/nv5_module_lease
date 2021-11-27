<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2021 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Thu, 18 Nov 2021 10:35:33 GMT
 */

if (!defined('NV_ADMIN'))
    die('Stop!!!');

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_bank (id, companyid, vi_bank_number, en_bank_number, vi_bank_account_holder, en_bank_account_holder, vi_bank_name, en_bank_name, vi_address, en_address, swiftcode, active, adminid, crtd_date, weight, sort, userid_edit, update_date, status_del, userid_del, time_del) VALUES('1', '1', '132414 111 123', '12313432', 'Le Thuc Vinh', 'Le Thuc Vinh', 'ACB', 'ACB', 'tphcm', 'tphcm', '12453567', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_charge (cid, title, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('1', 'Tính theo giờ', '0', '1', '0', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_charge (cid, title, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('4', 'Theo KWh', '0', '1', '0', '0', '0', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_charge (cid, title, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('5', 'Theo m3', '0', '1', '0', '0', '0', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_charge (cid, title, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('6', 'theo tháng', '0', '1', '0', '0', '0', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_charge (cid, title, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('9', 'Theo số lượng', '0', '1', '0', '0', '0', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_charge (cid, title, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('10', 'Phí cố định', '0', '1', '0', '0', '0', '6')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_company (cid, companycode, vi_title, en_title, vi_address, en_address, vi_province, en_province, phone, fax, email, active, weight, adminid, crt_date, userid_edit, update_date, status_del, userid_del, time_del) VALUES('1', 'VIDOCO', 'vidoco', 'vidoco', 'Bui Quang La', 'Bui Quang La', 'hcm', 'hcm', '098901966', '098901966', 'adminwmt@gmail.com', '0', '0', '0', '0', '2', '1634520627', '1', '0', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_company (cid, companycode, vi_title, en_title, vi_address, en_address, vi_province, en_province, phone, fax, email, active, weight, adminid, crt_date, userid_edit, update_date, status_del, userid_del, time_del) VALUES('5', 'phuogn66666', 'phuong66666699999', 'phuongz', 'phuong', 'phuongz', 'phuong', 'phuong', '0352534380', '123', 'phuongtha27@gmail.com', '1', '1', '2', '1634520451', '4', '1637145550', '0', '0', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_company (cid, companycode, vi_title, en_title, vi_address, en_address, vi_province, en_province, phone, fax, email, active, weight, adminid, crt_date, userid_edit, update_date, status_del, userid_del, time_del) VALUES('6', 'NV', 'nv', 'nv', 'nv', 'nv', 'nv', 'nv', '0909997381', '', 'hoangnt@nguyenvan.vn', '1', '3', '1', '1634525454', '1', '1634525454', '0', '0', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_company (cid, companycode, vi_title, en_title, vi_address, en_address, vi_province, en_province, phone, fax, email, active, weight, adminid, crt_date, userid_edit, update_date, status_del, userid_del, time_del) VALUES('7', 'vidocoưerrrrrrrrrrrrrrrrr', 'ưerrrrrrrrrrr', 'ưerrrrrrrrrrrrrr', 'ưerrrrrrrrrrrrrr', 'ưerrrrrrrrrrrrrrrrr', 'VIETNAM', 'ửeeeeeê', '0352534380', '', 'phuongtha27@gmail.com', '1', '2', '2', '1634528556', '2', '1634528556', '0', '0', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_company (cid, companycode, vi_title, en_title, vi_address, en_address, vi_province, en_province, phone, fax, email, active, weight, adminid, crt_date, userid_edit, update_date, status_del, userid_del, time_del) VALUES('10', 'nvsystems', 'công ty TNHH TM NV Systems', 'NV systems', '195 đường 11, Linh Xuân', '195 street, linh xuan ward', 'Thủ Đức, TPHCM', 'Thu Duc city, Ho Chi Minh City', '0988455066', '', 'adminwmt@gmail.com', '1', '4', '1', '1635327855', '1', '1635327855', '0', '0', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_company (cid, companycode, vi_title, en_title, vi_address, en_address, vi_province, en_province, phone, fax, email, active, weight, adminid, crt_date, userid_edit, update_date, status_del, userid_del, time_del) VALUES('11', '123', '456', '132132', '123123', '213321', '213312', '132321', '123213123', '', '', '1', '5', '4', '1637145902', '4', '1637145902', '0', '0', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_company_users (userid, companyid, permisstionid, weight, active) VALUES('1', '1', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_company_users (userid, companyid, permisstionid, weight, active) VALUES('1', '10', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_company_users (userid, companyid, permisstionid, weight, active) VALUES('2', '1', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_company_users (userid, companyid, permisstionid, weight, active) VALUES('3', '1', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_company_users (userid, companyid, permisstionid, weight, active) VALUES('4', '1', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract (id, pid, cid, companyid, yearmonth, year, datefrom, dateto, ccode, cycle, pricevnd, priceusd, yearpercent, feedateto, feedatefrom, feedatemain, feedateextra, note, active, weight, adminid, crtd_date, userid_edit, update_date, feevnd, feeusd, areareal, ccat, sid) VALUES('16', '1', '1', '1', '112021', '2021', '1636131600', '1735578000', '0002/HD/2021/VIDOCO', 'month', '22000000', '0', '0', '1735578000', '1636131600', '15', '15', '', '1', '2', '1', '1636186486', '1', '1636199668', '2000000', '0', '100', '1', '25')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_cat (cid, parentid, title, active, weight, sort, lev, status_del, adminid, addtime, userid_edit, update_time) VALUES('1', '0', 'Bảng giá cho thuê văn phòng', '1', '0', '0', '0', '0', '0', '0', '1', '1635734429')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('156', '16', '1', '1', '25', '122024', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '38', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('155', '16', '1', '1', '25', '112024', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '37', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('154', '16', '1', '1', '25', '102024', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '36', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('153', '16', '1', '1', '25', '092024', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '35', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('152', '16', '1', '1', '25', '082024', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '34', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('151', '16', '1', '1', '25', '072024', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '33', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('150', '16', '1', '1', '25', '062024', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '32', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('149', '16', '1', '1', '25', '052024', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '31', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('148', '16', '1', '1', '25', '042024', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '30', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('147', '16', '1', '1', '25', '032024', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '29', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('146', '16', '1', '1', '25', '022024', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '28', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('145', '16', '1', '1', '25', '012024', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '27', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('144', '16', '1', '1', '25', '122023', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '26', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('143', '16', '1', '1', '25', '112023', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '25', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('142', '16', '1', '1', '25', '102023', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '24', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('141', '16', '1', '1', '25', '092023', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '23', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('140', '16', '1', '1', '25', '082023', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '22', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('139', '16', '1', '1', '25', '072023', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '21', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('138', '16', '1', '1', '25', '062023', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '20', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('137', '16', '1', '1', '25', '052023', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '19', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('136', '16', '1', '1', '25', '042023', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '18', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('135', '16', '1', '1', '25', '032023', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '17', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('134', '16', '1', '1', '25', '022023', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '16', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('133', '16', '1', '1', '25', '012023', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '15', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('132', '16', '1', '1', '25', '122022', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '14', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('131', '16', '1', '1', '25', '112022', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '13', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('130', '16', '1', '1', '25', '102022', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '12', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('129', '16', '1', '1', '25', '092022', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '11', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('128', '16', '1', '1', '25', '082022', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '10', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('127', '16', '1', '1', '25', '072022', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '9', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('126', '16', '1', '1', '25', '062022', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '8', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('125', '16', '1', '1', '25', '052022', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '7', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('124', '16', '1', '1', '25', '042022', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '6', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('123', '16', '1', '1', '25', '032022', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '5', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('122', '16', '1', '1', '25', '022022', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '4', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('121', '16', '1', '1', '25', '012022', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '3', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('120', '16', '1', '1', '25', '122021', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '2', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_contract_info (id, contractid, productid, customerid, serviceid, yearmonth, datedocument, feedatefrom, feedateto, price_vi, price_en, fee_vi, fee_en, active, weight, status_del, adminid, crt_date, userid_edit, update_time) VALUES('119', '16', '1', '1', '25', '112021', '1636199668', '1636131600', '1735578000', '22000000', '0', '2000000', '0', '1', '1', '0', '1', '1636199668', '1', '1636199668')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('1', 'GPB', '1', 'GP BANK', '2', '', '3823 2345', '3827 2345', 'a@email.com', '02700113651', 'Ms. Nhàn', '', '', '', '1', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('2', 'HLB', '1', 'HONG LEONG BANK', '2', '', '(+84 28) 6299 8100', '(+84 28) 6299 8101', 'a@email.com', '0309231612', 'Ms. Thảo', '', '', '', '2', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('3', 'RICE', '1', 'RICE CREATIVE', '1', '', '028 3822 9559', '', 'a@email.com', '0311879111', 'Ms.  Th?y', '', '', '', '3', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('4', 'VCT', '1', 'VIETCETERA COMPANY LIMITED', '2', '', '+84 337 824 25
0938 123 111', '', 'a@email.com', '0314912825', 'Ms. Trâm', '', '', '', '4', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('5', 'CTY', '1', 'NEWSROOM COMPANY LIMITED', '3', '', '037 443 2390', '', 'a@email.com', '0316474119', 'Ms. Trâm', '', '', '', '5', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('6', 'SHB', '1', 'SHINHAN BANK VIETNAM', '2', '', '(028) 3823 0012', '(028) 3823 0009', 'a@email.com', '0309103635', 'Ms. Th?
Ms. Linh', '', '', '', '6', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('7', 'SPN', '1', 'SAO PHUONG NAM CORPORATION', '1', '', '028 38233366', '028 3823 2666', 'a@email.com', '', '', '', '', '', '7', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('8', 'SPNI', '1', 'SAO PHUONG NAM INVESTMENT', '1', '', '028 38233366', '028 3823 2666', 'a@email.com', '', '', '', '', '', '8', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('9', 'DAFC', '1', 'DUY ANH FASHION & COMESTICS', '1', '', '(028) 3825 7537', '(028) 3825 7540', 'a@email.com', '0304130177', 'Ms. Liên', '', '', '', '9', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('10', 'ICC', '1', 'INDOCHINE COUNSEL', '1', '', '+84 28 3823 9640', '+84 28 3823 9641', 'a@email.com', '0306239451', 'Ms. Vân', '', '', '', '10', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('11', 'APFL', '1', 'AUDIER & PARTNERS', '1', '', '38275045', '38270546', 'a@email.com', '0103420327-001', 'Ms. Huy?n', '', '', '', '11', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('12', 'CATHAY', '1', 'CATHAY PACIFIC AIRWAYS', '1', '', ' 0838 223 203', '', 'a@email.com', '0301472221', 'Ms. Minh', '', '', '', '12', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('13', 'SATO', '1', 'SATO - SHOJI', '1', '', '0838 279 141', '0838 295 557', 'a@email.com', '0309883456', 'Ms. Vi', '', '', '', '13', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('14', 'PNS', '1', 'PNS NETWORKS', '1', '', '0966950499', '', 'a@email.com', '0316228473', 'Ms. Ng?c', '', '', '', '14', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('15', 'EDM', '1', 'EMBASSY OF DENMARK', '1', '', '028 3821 9372', '', 'a@email.com', '', 'Ms. Ph??ng', '', '', '', '15', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('16', 'GLS', '1', 'TRANSWORLD', '1', '', '028 3827 0440', '', 'a@email.com', '0312732256', 'Ms. Ngân', '', '', '', '16', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('17', 'YSKN', '1', 'YOOSUNG', '1', '', '0243 787 8851', '', 'a@email.com', '0106390078-001', 'Ms. Lan', '', '', '', '17', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('18', 'EJA', '1', 'E-JUNG', '1', '', '+84 28 3824 4770', '+84 28 3824 4760', 'a@email.com', '0309645959', 'Ms. Nh?', '', '', '', '18', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('19', 'LDL', '1', 'LAC DUY', '1', '', '(028) 36221603', '', 'a@email.com', '0316477222', 'Ms. Linh Cao
Ms. Linh Nguy?n', '', '', '', '19', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('20', 'OTTOGI', '1', 'OTTOGI', '1', '', '0274 3556176', '', 'a@email.com', '3700860461-003', 'x', '', '', '', '20', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('21', 'RGF', '1', 'RGF HR AGENT', '1', '', '028 3911 5800', '', 'a@email.com', '0311046543', 'Ms. H??ng', '', '', '', '21', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('22', 'LINK', '1', 'LINKFARM CO.,LTD', '1', '', '', '', 'a@email.com', '', '', '', '', '', '22', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('23', 'FEDDY', '1', 'FEDDY CO.,LTD', '1', '', '', '', 'a@email.com', '', '', '', '', '', '23', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('24', 'UFF', '1', 'UNITED FAMILY FOOD', '1', '', '08 39390118', '', 'a@email.com', '0311852053', 'Ms. H?ng', '', '', '', '24', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('25', 'JEO', '1', 'JEOLLANAMDO', '1', '', '84283620819', '', 'a@email.com', '0316119428', 'Ms. Ng?c', '', 'đt cty search gg, có thể chưa chính xác', '', '25', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('26', 'GVL', '1', 'GLOBAL VIETNAM LAWYERS', '1', '', '0828032659', '', 'a@email.com', '0315852537-002', 'Ms. Trang', '', '', '', '26', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('27', 'SOHO', '1', 'SOHO SQUARE', '1', '', '08 3821 9529', '', 'a@email.com', '0310950876', 'Ms. Cúc', '', '?t cty search gg, có th? ch?a chính xác', '', '27', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('28', 'VILC', '1', 'VINA INTERNATIONAL LEASING', '1', '', '0838232788', '0838232789', 'a@email.com', '0301465369', 'Ms. Tâm', '', '?t cty, s? fax search gg, có th? ch?a chính xác', '', '28', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('29', 'IPSEN', '1', 'IPSEN PHARMA REP OFFICE', '1', '', '', '', 'a@email.com', '', 'Ms. Bách', '', '', '', '29', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('30', 'IPC', '1', 'IPSEN CONSUMER HEALTHCARE', '1', '', '', '', 'a@email.com', '0315613560', 'Ms. Bách', '', '', '', '30', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('31', 'NVT', '1', 'NOVARTIS VIETNAM', '1', '', '', '', 'a@email.com', '', 'Ms. Thoa', '', '', '', '31', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('32', 'SHBHCM', '1', 'SHINHAN BANK VIETNAM LIMITED - HO CHI MINH CITY BRANCH', '2', '', '', '', 'a@email.com', '', '', '', '', '', '32', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('33', 'O&M', '1', 'OGILVY & MATHER (VIETNAM)', '1', '', '', '', 'a@email.com', '', 'Ms. Khánh', '', '', '', '33', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('34', 'T&A', '1', 'T&A OGILVY', '1', '', '', '', 'a@email.com', '', 'Ms. Trinh', '', '', '', '34', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('35', 'SOHO1', '1', 'SOHO SQUARE', '1', '', '', '', 'a@email.com', '', 'Ms. Khánh', '', '', '', '35', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('36', 'O&O', '1', 'OGILVY ONE', '1', '', '', '', 'a@email.com', '', 'Ms. Khánh', '', '', '', '36', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('37', 'LLD', '1', 'LOCALIZE DIRECT VIETNAM ', '1', '', '', '', 'a@email.com', '', 'Ms. Giang
Mr. Trí', '', '', '', '37', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('38', '3A', '1', '3A  NUTRITION', '1', '', '', '', 'a@email.com', '', 'Ms. Th?', '', '', '', '38', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('39', 'SAB', '1', 'SABRE', '1', '', '', '', 'a@email.com', '', 'Ms. Nguyen', '', '', '', '39', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('40', 'VCBF', '1', 'VIETCOMBANK FUND ', '1', '', '', '', 'a@email.com', '', 'Ms. Thùy', '', '', '', '40', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('41', 'SRF', '1', 'SEAREFICO CORP', '1', '', '', '', 'a@email.com', '', 'Ms. Hi?n', '', '', '', '41', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('42', 'HDE', '1', 'HUYNDAI ELECTRIC', '1', '', '', '', 'a@email.com', '', 'Mr. YunYoung Keong', '', '', '', '42', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('43', 'HDC', '1', 'HUYNDAI CORP', '1', '', '', '', 'a@email.com', '', 'Ms. Ng?c Anh', '', '', '', '43', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('44', 'JACCS', '1', 'JACCS', '1', '', '', '', 'a@email.com', '', 'Ms. Chi
Ms. Ph?ng', '', '', '', '44', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('45', 'NOVS', '1', 'THE REP OFFICE OF NOVARTIS SINGAPORE', '1', '', '', '', 'a@email.com', '', 'Ms. Duyên', '', '', '', '45', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('46', 'NOVS1', '1', 'NOVARTIS VIETNAM COMPANY LIMITED', '1', '', '', '', 'a@email.com', '', 'Ms. Duyên', '', '', '', '46', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('47', 'MAIN', '1', 'MAINETTI VIETNAM', '1', '', '', '', 'a@email.com', '', 'Ms. H??ng
Ms. Nguyên', '', '', '', '47', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('48', 'RLB', '1', 'RIDER LEVETT BUCKNALL', '1', '', '', '', 'a@email.com', '', 'Ms. Th?o', '', '', '', '48', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('49', 'JYJ', '1', 'JIPYONG', '1', '', '', '', 'a@email.com', '', 'Ms. Vy', '', '', '', '49', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('50', 'TLGV', '1', 'TOSHIBA LOGISTIC VIETNAM ', '1', '', '', '', 'a@email.com', '', 'Ms. Nh?', '', '', '', '50', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('51', 'TVCP ', '1', 'TOSHIBA VN CONSUMER ', '1', '', '', '', 'a@email.com', '', 'Ms. S??ng
Ms. Nhi', '', '', '', '51', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('52', 'TAPL', '1', 'TOSHIBA ASIA PACIPIC', '1', '', '', '', 'a@email.com', '', 'Ms. Ph??ng Anh', '', '', '', '52', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('53', 'TTDV', '1', 'TOSHIBA TRANSMISSION', '1', '', '', '', 'a@email.com', '', 'Ms. Hi?n
Ms. Ph??ng', '', '', '', '53', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('54', 'ADAM', '1', 'ADAM ASSOCIATION', '1', '', '', '', 'a@email.com', '', '', '', '', '', '54', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('55', 'BATE', '1', 'BATES 141 ', '1', '', '', '', 'a@email.com', '', 'Mr. Khánh', '', '', '', '55', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('56', 'BDF', '1', 'BEIERSDORF ', '1', '', '', '', 'a@email.com', '', 'Ms. H?ng', '', '', '', '56', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('57', 'PAV', '1', 'PAN ASIA VIETNAM', '1', '', '', '', 'a@email.com', '', 'Ms. Ph?ng
Ms. Tiên', '', '', '', '57', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('58', 'AGR', '1', 'AGRIFERT HOLDINGS', '1', '', '', '', 'a@email.com', '', 'Ms. Mai Anh
Ms. Th?y', '', '', '', '58', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('59', 'TTCL', '1', 'TAN TAO', '1', '', '', '', 'a@email.com', '', 'Ms. Trâm
Ms. Uyên', '', '', '', '59', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('60', 'FILM', '1', 'FILMORE', '1', '', '', '', 'a@email.com', '', 'Ms. ?ông', '', '', '', '60', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('61', 'YSKC', '1', 'YASKAWA', '1', '', '', '', 'a@email.com', '', 'Ms. Linh', '', '', '', '61', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('62', 'ENER', '1', 'ENERCON VIETNAM', '1', '', '', '', 'a@email.com', '', 'Ms. Thanh', '', '', '', '62', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('63', 'GEOP', '1', 'GEOPETROL VIET NAM', '1', '', '', '', 'a@email.com', '', 'Ms. Hoàng Anh', '', '', '', '63', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('64', 'LVC', '1', 'LUAT VIET ', '1', '', '', '', 'a@email.com', '', 'Ms. Hiên', '', '', '', '64', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('65', 'LGOS', '1', 'LOGOS ATTORNEYS AT LAW', '1', '', '', '', 'a@email.com', '', 'Ms. Hoa', '', '', '', '65', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('66', 'QDG', '1', 'QUANG DUNG', '1', '', '', '', 'a@email.com', '', 'Ms. Dung', '', '', '', '66', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('67', 'FEDDY1', '1', 'FEDDY', '1', '', '', '', 'a@email.com', '', 'Ms. Linh', '', '', '', '67', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('68', 'CAAV', '1', 'CA ADVANCE VIETNAM', '1', '', '', '', 'a@email.com', '', 'Ms. Trân
Ms. Nhi', '', '', '', '68', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('69', 'GFC', '1', 'GREENFEED', '1', '', '', '', 'a@email.com', '', 'Ms. Nhi', '', '', '', '69', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('70', 'SHRI', '1', 'SHRI', '2', '', '', '', 'a@email.com', '', 'Ms. Nga
Ms. C?m', '', '', '', '70', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('71', 'IDIP', '1', 'IDIP', '1', '', '', '', 'a@email.com', '', 'Mr. Hi?u
Ms. Hoa', '', '', '', '71', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('72', 'TESA', '1', 'THE R.O OF TESA TAPE ASIA PACIFIC PTE. LTD. IN HCMC', '1', '', '', '', 'a@email.com', '', 'Ms Loan
Ms Vân', '', '', '', '72', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('73', 'DMK', '1', 'DORMAKABA SINGAPORE PTE. LTD.', '1', '', '', '', 'a@email.com', '', 'Mr. V?', '', '', '', '73', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('74', 'BEST', '1', 'CÔNG TY C? PH?N BESTON', '1', '', '', '', 'a@email.com', '', 'Ms. Ng?c', '', '', '', '74', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('75', 'APSEN', '1', 'THE R.O OF ASPEN PHARMACARE AUSTRALIA PTY LIMITED IN HCMC', '1', '', '', '', 'a@email.com', '', 'Ms. Minh', '', '', '', '75', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('76', 'XOLVE', '1', 'CÔNG TY TNHH TH??NG HI?U XOLVE', '1', '', '', '', 'a@email.com', '', 'Mr.Khoa
Mr. Ngh?a', '', '', '', '76', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('77', 'BITZ', '1', 'THE R.O OF BITZER REFRIGERATION ASIA IN HCMC', '1', '', '', '', 'a@email.com', '', 'Mr. ??c', '', '', '', '77', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('78', 'SDIN', '1', 'THE R.O OF SHELF DRILING INTERNATIONAL, INC. IN HCMC', '1', '', '', '', 'a@email.com', '', 'Ms.Hoa', '', '', '', '78', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('79', 'LOGI', '1', 'THE R.O OF LOGITECH SINGAPORE PTE.LTD IN HCMC', '1', '', '', '', 'a@email.com', '', 'Ms.Tuy?t', '', '', '', '79', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('80', 'ASCL', '1', 'ASIAPAY COMPANY LIMITED', '1', '', '', '', 'a@email.com', '', 'Uyên
Thi', '', '', '', '80', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('81', 'T&T', '1', 'TURNER & TOWNSEND COMPANY LIMITED', '1', '', '', '', 'a@email.com', '', 'Ms Dung', '', '', '', '81', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('82', 'SEAR', '1', 'SEAHORSE RESORT & SPA', '1', '', '', '', 'a@email.com', '', 'Vinh', '', '', '', '82', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('83', 'RCR', '1', 'RCR TECHNICAL INFRASTRUCTURE VIETNAM CO., LTD', '1', '', '', '', 'a@email.com', '', 'Giang', '', '', '', '83', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('84', 'TSDV', '1', 'TOSHIBA SOFTWARE DEVELOPMENT (VIETNAM) CO., LTD', '1', '', '', '', 'a@email.com', '', 'Ph??ng', '', '', '', '84', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('85', 'KESC', '1', 'KANDEN ENERGY SOLUTION COMPANY INCORPORATED', '1', '', '', '', 'a@email.com', '', 'Ms. Vân', '', '', '', '85', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('86', 'HRC', '1', 'THE R.O. OF HARRISCHEM IN HCMC', '1', '', '', '', 'a@email.com', '', 'H?ng', '', '', '', '86', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('87', 'VILO', '1', 'VILOMIX VIET NAM LIMITED COMPANY', '1', '', '', '', 'a@email.com', '', 'Giang', '', '', '', '87', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('88', 'ARTH', '1', 'THE RO OF ARTHREX SINGAPORE IN HCMC', '1', '', '', '', 'a@email.com', '', 'Ms. Kimie, Duong', '', '', '', '88', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('89', 'TML', '1', 'RIVERFRONT TML (VIETNAM) COMPANY LIMITED', '1', '', '', '', 'a@email.com', '', 'Ms. Hà', '', '', '', '89', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('90', 'AVATEC', '1', 'AVATEC.AI (S) PTE. LTD. OR ITS NOMINEE (“AVATEC NOMINEE”)', '1', '', '', '', 'a@email.com', '', 'Ms. Valin lim', '', '', '', '90', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('91', 'DURA', '1', 'DURAVIT ASIA LIMITED', '1', '', '', '', 'a@email.com', '', 'Mr. H??ng', '', '', '', '91', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('92', 'GAJV', '1', 'GOLDEN AGE JOINT – VENTURE LTD. CO,', '1', '', '', '', 'a@email.com', '', 'Ms. Truc', '', '', '', '92', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('93', 'OHMO', '1', 'OHMORI ADVAN COMPANY LIMITED', '1', '', '', '', 'a@email.com', '', 'Ms.Vy', '', '', '', '93', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('94', 'YSKF', '1', 'YASAKA FRUIT PROCESSING LIMITED COMPANY', '1', '', '', '', 'a@email.com', '', 'Ms. Y?n
Ms. Th?m', '', '', '', '94', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('95', 'NOMA', '1', 'NOMAC LTD.', '1', '', '', '', 'a@email.com', '', 'Ms. Trang', '', '', '', '95', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('96', 'TMN', '1', 'TMN INVESTMENT CO.,LTD', '1', '', '', '', 'a@email.com', '', 'Mr.??c
Mr. Danh', '', '', '', '96', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('97', 'C7C', '1', 'C7 CONSULTANT SERVICES COMPANY LIMITED', '1', '', '', '', 'a@email.com', '', 'Mr. Davit', '', '', '', '97', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('98', 'WLP', '1', 'WORLEYPARSONS VIETNAM LLC', '1', '', '', '', 'a@email.com', '', 'Ms. Weilin Sim', '', '', '', '98', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('99', 'BECK', '1', 'BECKMAN COULTER HONG KONG LIMITED', '1', '', '', '', 'a@email.com', '', 'Mr. Sachin', '', '', '', '99', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('100', 'LUSI', '1', 'CÔNG TY TNHH LUSINE', '4', '', '', '', 'a@email.com', '', 'Ms. Kim Ph?ng', '', '', '', '100', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('101', '84C1', '1', 'EIGHT FOUR CONCEPT ONE VIETNAM COMPANY LIMITED', '4', '', '', '', 'a@email.com', '', 'Ms. Trâm ', '', '', '', '101', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_customer (cid, cuscode, companyid, title, gid, address, mobile, fax, email, taxcode, person_legal, person_legal_mobile, vi_note, en_note, weight, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('102', 'BDN', '1', 'BODYNITS TIEN GIANG COMPANY LIMITED', '4', '', '', '', 'a@email.com', '', 'Ms. Trân', '', '', '', '102', '1', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote (id, pid, cid, yearmonth, debitnotedate, datefrom, dateto, areareal, exchangeusd, recipients_vi, recipients_en, explain_vi, explain_en, account_bank_vi, account_bank_en, holding_vi, holding_en, bank_name_vi, bank_name_en, bank_address_vi, bank_address_en, swiftcode, note_vi, note_en, companyid, year, comapyname_vi, comapyname_en, manager_name_vi, manager_name_en, adminid, crt_date, userid_edit, update_date, weight, debitcode, active, note, status) VALUES('19', '3', '1', '092021', '1631379600', '1631379600', '1631379600', '50', '26000', 'Lễ tân', 'Recipients', '12/09/2021  12/09/2021', '&#91;object HTMLInputElement&#93;', '132414', '12313432', 'Le Thuc Vinh', 'Le Thuc Vinh', 'ACB', 'ACB', 'tphcm', 'tphcm', '1245356', '', '', '1', '2021', 'vidoco', 'vidoco', 'Nguyễn Thanh Hoàng', 'Nguyen Thanh Hoang', '1', '1631431633', '1', '1631431633', '1', '0001/DN/2021/VIDOCO', '1', '', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote (id, pid, cid, yearmonth, debitnotedate, datefrom, dateto, areareal, exchangeusd, recipients_vi, recipients_en, explain_vi, explain_en, account_bank_vi, account_bank_en, holding_vi, holding_en, bank_name_vi, bank_name_en, bank_address_vi, bank_address_en, swiftcode, note_vi, note_en, companyid, year, comapyname_vi, comapyname_en, manager_name_vi, manager_name_en, adminid, crt_date, userid_edit, update_date, weight, debitcode, active, note, status) VALUES('55', '1', '1', '112021', '1637082000', '1637082000', '1637082000', '100', '26', 'Lễ tân', 'Recipients', '17/11/2021  17/11/2021', '&#91;object HTMLInputElement&#93;', '132414', '12313432', 'Le Thuc Vinh', 'Le Thuc Vinh', 'ACB', 'ACB', 'tphcm', 'tphcm', '12453567', '', '', '1', '2021', 'vidoco', 'vidoco', '', '', '1', '1637156333', '1', '1637156333', '4', '0004/DN/2021/VIDOCO', '1', '', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote (id, pid, cid, yearmonth, debitnotedate, datefrom, dateto, areareal, exchangeusd, recipients_vi, recipients_en, explain_vi, explain_en, account_bank_vi, account_bank_en, holding_vi, holding_en, bank_name_vi, bank_name_en, bank_address_vi, bank_address_en, swiftcode, note_vi, note_en, companyid, year, comapyname_vi, comapyname_en, manager_name_vi, manager_name_en, adminid, crt_date, userid_edit, update_date, weight, debitcode, active, note, status) VALUES('22', '4', '5', '122021', '1633885200', '1633885200', '1634230800', '32423400', '234234', 'Lễ tân', 'Recipients', '10/10/2021  10/10/2021', '&#91;object HTMLInputElement&#93;', '132414', '12313432', 'Le Thuc Vinh', 'Le Thuc Vinh', 'ACB', 'ACB', 'tphcm', 'tphcm', '12453567', '', '', '1', '2021', 'vidoco', 'vidoco', '', '', '2', '1633875722', '2', '1633875722', '2', '0002/DN/2021/VIDOCO', '1', '23423423', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote (id, pid, cid, yearmonth, debitnotedate, datefrom, dateto, areareal, exchangeusd, recipients_vi, recipients_en, explain_vi, explain_en, account_bank_vi, account_bank_en, holding_vi, holding_en, bank_name_vi, bank_name_en, bank_address_vi, bank_address_en, swiftcode, note_vi, note_en, companyid, year, comapyname_vi, comapyname_en, manager_name_vi, manager_name_en, adminid, crt_date, userid_edit, update_date, weight, debitcode, active, note, status) VALUES('23', '3', '5', '102021', '1633885200', '1633885200', '1633885200', '0', '26000', 'Lễ tân', 'Recipients', '11/10/2021  11/10/2021', '&#91;object HTMLInputElement&#93;', '132414', '12313432', 'Le Thuc Vinh', 'Le Thuc Vinh', 'ACB', 'ACB', 'tphcm', 'tphcm', '12453567', '', '', '1', '2021', 'vidoco', 'vidoco', '', '', '2', '1633914946', '2', '1633914946', '3', '0003/DN/2021/VIDOCO', '1', '', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_extra (id, debitnoteid, pid, cid, yearmonth, adddate, serviceid, service_name, service_main, exchangeusd, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) VALUES('3', '19', '3', '1', '092021', '1631379600', '1', '', '0', '26000', '4000', '0.1', '100', '400000', '10', '', '1', '1631431633', '1', '1631431633', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_extra (id, debitnoteid, pid, cid, yearmonth, adddate, serviceid, service_name, service_main, exchangeusd, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) VALUES('4', '19', '3', '1', '092021', '1631379600', '2', '', '0', '26000', '4000', '0.4', '20', '80000', '8', '', '1', '1631431633', '1', '1631431633', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_extra (id, debitnoteid, pid, cid, yearmonth, adddate, serviceid, service_name, service_main, exchangeusd, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) VALUES('5', '19', '3', '1', '092021', '1631379600', '3', '', '1', '26000', '50000000', '2000', '1', '50000000', '2000', '', '1', '1631431633', '1', '1631431633', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_extra (id, debitnoteid, pid, cid, yearmonth, adddate, serviceid, service_name, service_main, exchangeusd, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) VALUES('31', '51', '1', '1', '112021', '1637082000', '25', '', '1', '26', '22000000', '0', '1', '22000000', '0', '', '1', '1637155620', '1', '1637155620', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_extra (id, debitnoteid, pid, cid, yearmonth, adddate, serviceid, service_name, service_main, exchangeusd, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) VALUES('30', '48', '1', '1', '112021', '1637082000', '25', 'Thuê văn phòng', '1', '26', '22000000', '0', '1', '22000000', '0', '', '1', '1637151449', '1', '1637151449', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_extra (id, debitnoteid, pid, cid, yearmonth, adddate, serviceid, service_name, service_main, exchangeusd, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) VALUES('29', '47', '1', '1', '112021', '1637082000', '25', 'Thuê văn phòng', '1', '26', '22000000', '0', '1', '22000000', '0', '', '1', '1637151325', '1', '1637151325', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_extra (id, debitnoteid, pid, cid, yearmonth, adddate, serviceid, service_name, service_main, exchangeusd, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) VALUES('28', '46', '1', '1', '112021', '1637082000', '25', 'Thuê văn phòng', '1', '26', '22000000', '0', '1', '22000000', '0', '', '1', '1637150955', '1', '1637150955', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_extra (id, debitnoteid, pid, cid, yearmonth, adddate, serviceid, service_name, service_main, exchangeusd, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) VALUES('27', '45', '1', '1', '112021', '1637082000', '25', '', '1', '26', '22000000', '0', '1', '22000000', '0', '', '1', '1637150765', '1', '1637150765', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_extra (id, debitnoteid, pid, cid, yearmonth, adddate, serviceid, service_name, service_main, exchangeusd, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) VALUES('26', '44', '1', '1', '112021', '1637082000', '25', '', '1', '26', '22000000', '0', '1', '22000000', '0', '', '1', '1637150608', '1', '1637150608', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_extra (id, debitnoteid, pid, cid, yearmonth, adddate, serviceid, service_name, service_main, exchangeusd, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) VALUES('32', '52', '1', '1', '112021', '1637082000', '25', '', '1', '26', '22000000', '0', '1', '22000000', '0', '', '1', '1637155709', '1', '1637155709', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_extra (id, debitnoteid, pid, cid, yearmonth, adddate, serviceid, service_name, service_main, exchangeusd, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) VALUES('33', '53', '1', '1', '112021', '1637082000', '25', '', '1', '26', '22000000', '0', '1', '22000000', '0', '', '1', '1637155898', '1', '1637155898', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_extra (id, debitnoteid, pid, cid, yearmonth, adddate, serviceid, service_name, service_main, exchangeusd, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) VALUES('34', '54', '1', '1', '112021', '1637082000', '25', '', '1', '26', '22000000', '0', '1', '22000000', '0', '', '1', '1637156040', '1', '1637156040', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_extra (id, debitnoteid, pid, cid, yearmonth, adddate, serviceid, service_name, service_main, exchangeusd, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) VALUES('35', '54', '1', '1', '112021', '1637082000', '3', '', '0', '26', '3700', '200', '20', '74000', '4000', '', '1', '1637156040', '1', '1637156040', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_extra (id, debitnoteid, pid, cid, yearmonth, adddate, serviceid, service_name, service_main, exchangeusd, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) VALUES('36', '54', '1', '1', '112021', '1637082000', '4', '', '0', '26', '5000', '20', '2', '10000', '40', '', '1', '1637156040', '1', '1637156040', '3', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_extra (id, debitnoteid, pid, cid, yearmonth, adddate, serviceid, service_name, service_main, exchangeusd, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) VALUES('37', '55', '1', '1', '112021', '1637082000', '25', '', '1', '26', '22000000', '0', '1', '22000000', '0', '', '1', '1637156333', '1', '1637156333', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_extra (id, debitnoteid, pid, cid, yearmonth, adddate, serviceid, service_name, service_main, exchangeusd, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) VALUES('38', '55', '1', '1', '112021', '1637082000', '3', '', '0', '26', '3700', '200', '20', '74000', '4000', '', '1', '1637156333', '1', '1637156333', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_debitnote_extra (id, debitnoteid, pid, cid, yearmonth, adddate, serviceid, service_name, service_main, exchangeusd, price_vi, price_en, amount, total_vi, total_en, note, userid_edit, update_date, adminid, crt_date, weight, active) VALUES('39', '55', '1', '1', '112021', '1637082000', '4', '', '0', '26', '5000', '20', '2', '10000', '40', '', '1', '1637156333', '1', '1637156333', '3', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_exchange_rate (id, mount, exchange_rate) VALUES('4', '102021', '26000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_exchange_rate (id, mount, exchange_rate) VALUES('2', '082021', '25000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_exchange_rate (id, mount, exchange_rate) VALUES('5', '112021', '26000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_exchange_rate (id, mount, exchange_rate) VALUES('6', '122021', '26000')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('1', 'GF', 'Ground Floor', 'Ground Floor', 'GF', '2.516', '1.164', '1.352', '1', '0', '', '', '1', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('2', 'F1', '1st Floor', '1st Floor', 'F1', '1.33', '630', '700', '1', '0', '', '', '2', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('3', 'F2', '2nd Floor', '2nd Floor', 'F2', '1.452', '296', '1.156', '1', '0', '', '', '3', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('4', 'F3', '3rd Floor', '3rd Floor', 'F3', '1.452', '285', '1.167', '1', '0', '', '', '4', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('5', 'F4', '4th Floor', '4th Floor', 'F4', '1.452', '693', '759', '1', '0', '', '', '5', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('6', 'F5', '5th Floor', '5th Floor', 'F5', '1.452', '374', '1.078', '1', '0', '', '', '6', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('7', 'F6', '6th Floor', '6th Floor', 'F6', '1.452', '563', '889', '1', '0', '', '', '7', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('8', 'F7', '7th Floor', '7th Floor', 'F7', '1.452', '273', '1.179', '1', '0', '', '', '8', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('9', 'F8', '8th Floor', '8th Floor', 'F8', '1.452', '279', '1.173', '1', '0', '', '', '9', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('10', 'F9', '9th Floor', '9th Floor', 'F9', '1.452', '454', '998', '1', '0', '', '', '10', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('11', 'F10', '10th Floor', '10th Floor', 'F10', '1.452', '283', '1.169', '1', '0', '', '', '11', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('12', 'F11', '11th Floor', '11th Floor', 'F11', '1.452', '274', '1.178', '1', '0', '', '', '12', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('13', 'F12', '12th Floor', '12th Floor', 'F12', '1.452', '263', '1.189', '1', '0', '', '', '13', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('14', 'F13', '13th Floor', '13th Floor', 'F13', '1.452', '273', '1.179', '1', '0', '', '', '14', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('15', 'F14', '14th Floor', '14th Floor', 'F14', '1.452', '275', '1.177', '1', '0', '', '', '15', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('16', 'F15', '15th Floor', '15th Floor', 'F15', '1.452', '258', '1.194', '1', '0', '', '', '16', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('17', 'F16', '16th Floor', '16th Floor', 'F16', '1.452', '278', '1.174', '1', '0', '', '', '17', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('18', 'F17', '17th Floor', '17th Floor', 'F17', '1.452', '283', '1.169', '1', '0', '', '', '18', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('19', 'F18', '18th Floor', '18th Floor', 'F18', '1.452', '541', '911', '1', '0', '', '', '19', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('20', 'F19', '19th Floor', '19th Floor', 'F19', '1.452', '626', '826', '1', '0', '', '', '20', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('21', 'F20', '20th Floor', '20th Floor', 'F20', '1.452', '274', '1.178', '1', '0', '', '', '21', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('22', 'F21', '21st Floor', '21st Floor', 'F21', '1.452', '266', '1.186', '1', '0', '', '', '22', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('23', 'F22', '22nd Floor', '22nd Floor', 'F22', '1.452', '275', '1.177', '1', '0', '', '', '23', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('24', 'F23', '23rd Floor', '23rd Floor', 'F23', '1.452', '601', '851', '1', '0', '', '', '24', '1', '1', '1635339160', '1', '1635339160', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('25', 'F4A', '4Ath Floor', '4Ath Floor', 'F4A', '824', '810', '14', '1', '0', '', '', '25', '1', '1', '1635339160', '1', '1635506527', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('26', 'F4B', '4Bth Floor', '4Bth Floor', 'F4B', '824', '810', '14', '1', '0', '', '', '26', '1', '1', '1635506659', '1', '1635506659', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('27', 'F24', '24th Floor', '24th Floor', 'F24', '824', '810', '14', '1', '0', '', '', '26', '1', '1', '1635506659', '1', '1635506659', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('28', 'F25', '25th Floor', '25th Floor', 'F25', '824', '810', '14', '1', '0', '', '', '26', '1', '1', '1635506659', '1', '1635506659', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('29', 'F26', '26th Floor', '26th Floor', 'F26', '824', '810', '14', '1', '0', '', '', '26', '1', '1', '1635506659', '1', '1635506659', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('30', 'F26&F27', '26th-27th Floor', '26th-27th Floor', 'F26-FF27', '824', '810', '14', '1', '0', '', '', '26', '1', '1', '1635506659', '1', '1635506659', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('31', '1111', '213123', '123', '2131233', '12', '12', '23', '1', '0', '', '11', '27', '1', '4', '1636716073', '4', '1636716073', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('32', '666666666666', '66', '6666', '66', '6', '6', '6', '1', '0', '', '666', '28', '1', '4', '1636716157', '4', '1636716517', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_floor (fid, floorcode, title_vi, title_en, alias, area, common_area, area_for_rent, elevator, stair, image, note, weight, active, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('33', '77777', '77777', '77777', '77777', '7', '77', '7', '0', '1', '', '', '29', '1', '4', '1636716538', '4', '1636716702', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_groups_customer (id, code, title, note, weight, active, adminid, crtd_date, userid_edit, time_update) VALUES('1', 'VP', 'Văn phòng', '', '1', '1', '0', '0', '1', '1635592833')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_groups_customer (id, code, title, note, weight, active, adminid, crtd_date, userid_edit, time_update) VALUES('2', 'NH', 'Ngân Hàng', '', '2', '1', '1', '1635593912', '1', '1635593912')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_groups_customer (id, code, title, note, weight, active, adminid, crtd_date, userid_edit, time_update) VALUES('3', 'RES', 'Nhà Hàng', '', '3', '1', '1', '1635593979', '1', '1635593979')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_groups_customer (id, code, title, note, weight, active, adminid, crtd_date, userid_edit, time_update) VALUES('4', 'NN', 'Nhà ngoài', '', '4', '1', '1', '1635594040', '1', '1635594040')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_payment (id, debitnote, customerid, customername, yearmonth, addtime, note_vi, note_en, exchangeusd, total_vi, total_en, status_payment, adminid, crt_date, userid_edit, update_date) VALUES('1', '19', '1', 'Nguyễn Thanh Hoàng', '092021', '1634171530', '', '', '26000', '50480000', '2018', '-1', '1', '1634171530', '1', '1634171530')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_payment (id, debitnote, customerid, customername, yearmonth, addtime, note_vi, note_en, exchangeusd, total_vi, total_en, status_payment, adminid, crt_date, userid_edit, update_date) VALUES('3', '19', '1', 'Nguyễn Thanh Hoàng', '092021', '1634203922', '', '', '26000', '100000', '3.84615', '1', '1', '1634203922', '1', '1634203922')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_payment (id, debitnote, customerid, customername, yearmonth, addtime, note_vi, note_en, exchangeusd, total_vi, total_en, status_payment, adminid, crt_date, userid_edit, update_date) VALUES('4', '21', '1', 'Nguyễn Thanh Hoàng', '102021', '1634218438', '', '', '26000', '0', '0', '-1', '1', '1634218438', '1', '1634218438')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_payment (id, debitnote, customerid, customername, yearmonth, addtime, note_vi, note_en, exchangeusd, total_vi, total_en, status_payment, adminid, crt_date, userid_edit, update_date) VALUES('5', '22', '5', 'Trương Quang Phươ', '122021', '1634346821', '', '', '234234', '10000', '0.0426924', '1', '2', '1634346821', '2', '1634346821')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_payment (id, debitnote, customerid, customername, yearmonth, addtime, note_vi, note_en, exchangeusd, total_vi, total_en, status_payment, adminid, crt_date, userid_edit, update_date) VALUES('6', '22', '5', 'Trương Quang Phươ', '122021', '1634348430', '', '', '234234', '1222220000', '5217.95', '1', '2', '1634348430', '2', '1634348430')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_permission_groups (id, title, groupid, addtime, adminid, edittime, userid) VALUES('1', 'Quản trị tối cao', '0', '0', '0', '0', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_permission_groups (id, title, groupid, addtime, adminid, edittime, userid) VALUES('2', 'Quản trị hệ thống', '0', '0', '0', '0', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_permission_groups (id, title, groupid, addtime, adminid, edittime, userid) VALUES('3', 'Ban giám đốc', '0', '0', '0', '0', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_permission_groups (id, title, groupid, addtime, adminid, edittime, userid) VALUES('4', 'Ban điều hành', '0', '0', '0', '0', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_permission_groups (id, title, groupid, addtime, adminid, edittime, userid) VALUES('5', 'Quản lý cấp cao', '0', '0', '0', '0', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_permission_groups (id, title, groupid, addtime, adminid, edittime, userid) VALUES('6', 'Quản lý', '0', '0', '0', '0', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_permission_groups (id, title, groupid, addtime, adminid, edittime, userid) VALUES('7', 'Nhân viên văn phòng', '0', '0', '0', '0', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_permission_groups (id, title, groupid, addtime, adminid, edittime, userid) VALUES('8', 'Nhân viên dịch vụ', '0', '0', '0', '0', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_permission_groups (id, title, groupid, addtime, adminid, edittime, userid) VALUES('9', 'Nhân viên lễ tân', '0', '0', '0', '0', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_permission_groups (id, title, groupid, addtime, adminid, edittime, userid) VALUES('10', 'Nhân viên kế toán', '0', '0', '0', '0', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('1', '1', 'Văn phòng G01', 'Unit G01', 'G01', 'G01', '144', '0', '0', '0', '0', '2', '', '', '1', '1', '1', '1635339160', '4', '1636716966')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('2', '1', 'Văn phòng G02', 'Unit G02', 'G02', 'G02', '309', '0', '0', '0', '0', '2', '', '', '2', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('3', '1', 'Văn phòng G04', 'Unit G04', 'G04A', 'G04A', '215', '0', '0', '0', '0', '2', '', '', '3', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('4', '1', 'Văn phòng G04B', 'Unit G04B', 'G04B', 'G04B', '0', '0', '0', '0', '0', '2', '', '', '4', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('5', '1', 'Văn phòng G05A', 'Unit G05A', 'G05A', 'G05A', '413', '0', '0', '0', '0', '2', '', '', '5', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('6', '1', 'Văn phòng G05B', 'Unit G05B', 'G05B', 'G05B', '172', '0', '0', '0', '0', '2', '', '', '6', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('7', '2', 'Văn phòng 101', 'Unit 101', '101', '101', '149', '0', '0', '0', '0', '2', '', '', '7', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('8', '2', 'Văn phòng 102-104', 'Unit 102-104', '102-104', '102-104', '700', '0', '0', '0', '0', '2', '', '', '8', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('9', '2', 'Văn phòng 105', 'Unit 105', '105', '105', '200', '0', '0', '0', '0', '2', '', '', '9', '1', '1', '1635339160', '3', '1636427359')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('10', '3', 'Văn phòng 201', 'Unit 201', '201', '201', '250', '0', '0', '0', '0', '2', '', '', '10', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('11', '3', 'Văn phòng 202', 'Unit 202', '202', '202', '307', '0', '0', '0', '0', '2', '', '', '11', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('12', '3', 'Văn phòng 202A', 'Unit 202A', '202A', '202A', '0', '0', '0', '0', '0', '2', '', '', '12', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('13', '3', 'Văn phòng 203', 'Unit 203', '203', '203', '239', '0', '0', '0', '0', '2', '', '', '13', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('14', '3', 'Văn phòng 204', 'Unit 204', '204', '204', '150', '0', '0', '0', '0', '2', '', '', '14', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('15', '3', 'Văn phòng 205', 'Unit 205', '205', '205', '200', '0', '0', '0', '0', '2', '', '', '15', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('16', '4', 'Văn phòng 301-304', 'Unit 301-304', '301-304', '301-304', '885', '0', '0', '0', '0', '2', '', '', '16', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('17', '4', 'Văn phòng 305', 'Unit 305', '305', '305', '282', '0', '0', '0', '0', '2', '', '', '17', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('18', '6', 'Văn phòng 501', 'Unit 501', '501', '501', '265', '0', '0', '0', '0', '2', '', '', '18', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('19', '6', 'Văn phòng 502', 'Unit 502', '502', '502', '308', '0', '0', '0', '0', '2', '', '', '19', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('20', '6', 'Văn phòng 503', 'Unit 503', '503', '503', '92', '0', '0', '0', '0', '2', '', '', '20', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('21', '6', 'Văn phòng 504A', 'Unit 504A', '504A', '504A', '124', '0', '0', '0', '0', '2', '', '', '21', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('22', '6', 'Văn phòng 504B', 'Unit 504B', '504B', '504B', '54', '0', '0', '0', '0', '2', '', '', '22', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('23', '6', 'Văn phòng 505', 'Unit 505', '505', '505', '289', '0', '0', '0', '0', '2', '', '', '23', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('24', '7', 'Văn phòng 601A', 'Unit 601A', '601A', '601A', '160', '0', '0', '0', '0', '2', '', '', '24', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('25', '7', 'Văn phòng 601B', 'Unit 601B', '601B', '601B', '106', '0', '0', '0', '0', '2', '', '', '25', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('26', '7', 'Văn phòng 602', 'Unit 602', '602', '602', '308', '0', '0', '0', '0', '2', '', '', '26', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('27', '7', 'Văn phòng 603', 'Unit 603', '603', '603', '92', '0', '0', '0', '0', '2', '', '', '27', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('28', '7', 'Văn phòng 604', 'Unit 604', '604', '604', '264', '0', '0', '0', '0', '2', '', '', '28', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('29', '7', 'Văn phòng 605', 'Unit 605', '605', '605', '223', '0', '0', '0', '0', '2', '', '', '29', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('30', '8', 'Văn phòng 701', 'Unit 701', '701', '701', '265', '0', '0', '0', '0', '2', '', '', '30', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('31', '8', 'Văn phòng 702-703', 'Unit 702-703', '702-703', '702-703', '399', '0', '0', '0', '0', '2', '', '', '31', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('32', '8', 'Văn phòng 704-705', 'Unit 704-705', '704-705', '704-705', '515', '0', '0', '0', '0', '2', '', '', '32', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('33', '9', 'Văn phòng 801A', 'Unit 801A', '801A', '801A', '160', '0', '0', '0', '0', '2', '', '', '33', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('34', '9', 'Văn phòng 801B', 'Unit 801B', '801B', '801B', '112', '0', '0', '0', '0', '2', '', '', '34', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('35', '9', 'Văn phòng 802-803', 'Unit 802-803', '802-803', '802-803', '399', '0', '0', '0', '0', '2', '', '', '35', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('36', '9', 'Văn phòng 804', 'Unit 804', '804', '804', '302', '0', '0', '0', '0', '2', '', '', '36', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('37', '9', 'Văn phòng 805', 'Unit 805', '805', '805', '200', '0', '0', '0', '0', '2', '', '', '37', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('38', '10', 'Văn phòng 901A', 'Unit 901A', '901A', '901A', '160', '0', '0', '0', '0', '2', '', '', '38', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('39', '10', 'Văn phòng 902', 'Unit 902', '902', '902', '510', '0', '0', '0', '0', '2', '', '', '39', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('40', '10', 'Văn phòng 904', 'Unit 904', '903', '903', '98', '0', '0', '0', '0', '2', '', '', '40', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('41', '10', 'Văn phòng 903A', 'Unit 903A', '903A', '903A', '390', '0', '0', '0', '0', '2', '', '', '41', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('42', '11', 'Văn phòng 1001-1005 ', 'Unit 1001-1005 ', '1001-1005', '1001-1005', '1169', '0', '0', '0', '0', '2', '', '', '42', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('43', '12', 'Văn phòng 1101-1105', 'Unit 1101-1105', '1101-1105', '1101-1105', '1178', '0', '0', '0', '0', '2', '', '', '43', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('44', '13', 'Văn phòng 1201', 'Unit 1201', '1201', '1201', '522', '0', '0', '0', '0', '2', '', '', '44', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('45', '13', 'Văn phòng 1202', 'Unit 1202', '1202', '1202', '350', '0', '0', '0', '0', '2', '', '', '45', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('46', '13', 'Văn phòng 1203', 'Unit 1203', '1203', '1203', '50', '0', '0', '0', '0', '2', '', '', '46', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('47', '13', 'Văn phòng 1205', 'Unit 1205', '1205', '1205', '277', '0', '0', '0', '0', '2', '', '', '47', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('48', '14', 'Văn phòng 1301B', 'Unit 1301B', '1301B', '1301B', '106', '0', '0', '0', '0', '2', '', '', '48', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('49', '14', 'Văn phòng 1301A', 'Unit 1301A', '1301A', '1301A', '160', '0', '0', '0', '0', '2', '', '', '49', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('50', '14', 'Văn phòng1304+14', 'Unit 1304+14', '1304+14', '1304+14', '913', '0', '0', '0', '0', '2', '', '', '50', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('51', '15', 'Văn phòng 1401A', 'Unit 1401A', '1401A', '1401A', '160', '0', '0', '0', '0', '2', '', '', '51', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('52', '15', 'Văn phòng 1402', 'Unit 1402', '1402', '1402', '275', '0', '0', '0', '0', '2', '', '', '52', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('53', '15', 'Văn phòng 1403', 'Unit 1403', '1403', '1403', '540', '0', '0', '0', '0', '2', '', '', '53', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('54', '16', 'Văn phòng 15F', 'Unit 15F', '15F', '15F', '1194', '0', '0', '0', '0', '2', '', '', '54', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('55', '17', 'Văn phòng 1601', 'Unit 1601', '1601', '1601', '160', '0', '0', '0', '0', '2', '', '', '55', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('56', '17', 'Văn phòng 1601A - 1601B', 'Unit 1601A - 1601B', '1601A - 1601B', '1601A - 1601B', '106', '0', '0', '0', '0', '2', '', '', '56', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('57', '17', 'Văn phòng 1602', 'Unit 1602', '1602', '1602', '321', '0', '0', '0', '0', '2', '', '', '57', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('58', '17', 'Văn phòng 1603', 'Unit 1603', '1603', '1603', '296', '0', '0', '0', '0', '2', '', '', '58', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('59', '17', 'Văn phòng 1605', 'Unit 1605', '1605', '1605', '143', '0', '0', '0', '0', '2', '', '', '59', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('60', '18', 'Văn phòng 1701B', 'Unit 1701B', '1701B', '1701B', '106', '0', '0', '0', '0', '2', '', '', '60', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('61', '18', 'Văn phòng 1702', 'Unit 1702', '1702', '1702', '50', '0', '0', '0', '0', '2', '', '', '61', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('62', '18', 'Văn phòng 1702', 'Unit 1702', '1702', '1702', '70', '0', '0', '0', '0', '2', '', '', '62', '1', '1', '1635339160', '2', '1635758507')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('63', '18', 'Văn phòng 1702', 'Unit 1702', '1702', '1702', '637', '0', '0', '0', '0', '2', '', '', '63', '1', '1', '1635339160', '2', '1635758531')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('64', '18', 'Văn phòng1702', 'Unit 1702', '1702', '1702', '50', '0', '0', '0', '0', '2', '', '', '64', '1', '1', '1635339160', '2', '1635758582')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('65', '18', 'Văn phòng 1705', 'Unit 1705', '1705', '1705', '96', '0', '0', '0', '0', '2', '', '', '65', '1', '1', '1635339160', '2', '1635758601')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('66', '19', 'Văn phòng 1801', 'Unit 1801', '1801', '1801', '272', '0', '0', '0', '0', '2', '', '', '66', '1', '1', '1635339160', '2', '1635758641')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('67', '19', 'Văn phòng 1802', 'Unit 1802', '1802', '1802', '639', '0', '0', '0', '0', '2', '', '', '67', '1', '1', '1635339160', '2', '1635758653')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('68', '19', 'Văn phòng 1802A', 'Unit 1802A', '1802A', '1802A', '275', '0', '0', '0', '0', '2', '', '', '68', '1', '1', '1635339160', '2', '1635758713')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('69', '20', 'Ngân hàng 1901A', 'Bank 1901A', '1901A', '1901A', '160', '0', '0', '0', '0', '2', '', '', '69', '1', '1', '1635339160', '1', '1635514024')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('70', '20', 'Văn phòng 1901B', 'Unit 1901B', '1901B', '1901B', '70', '0', '0', '0', '0', '2', '', '', '70', '1', '1', '1635339160', '2', '1635758743')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('71', '20', 'Văn phòng 1901c', 'Unit 1901c', '1901C', '1901C', '36', '0', '0', '0', '0', '2', '', '', '71', '1', '1', '1635339160', '2', '1635758796')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('72', '20', 'Văn phòng 1902', 'Unit 1902', '1902', '1902', '308', '0', '0', '0', '0', '2', '', '', '72', '1', '1', '1635339160', '2', '1635759091')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('73', '20', 'Văn phòng 1904A', 'Unit 1904A', '1904A', '1904A', '212', '0', '0', '0', '0', '2', '', '', '73', '1', '1', '1635339160', '2', '1635762167')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('74', '20', 'Văn phòng 1904B', 'Unit 1904B', '1904B', '1904B', '217', '0', '0', '0', '0', '2', '', '', '74', '1', '1', '1635339160', '2', '1635762200')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('75', '20', 'Văn phòng 1905', 'Unit 1905', '1905', '1905', '160', '0', '0', '0', '0', '2', '', '', '75', '1', '1', '1635339160', '2', '1635762212')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('76', '21', 'Văn phòng 2001A', 'Unit 2001A', '2001A', '2001A', '160', '0', '0', '0', '0', '2', '', '', '76', '1', '1', '1635339160', '2', '1635762224')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('77', '22', 'Văn phòng 2002', 'Unit 2002', '2002', '2002', '144', '0', '0', '0', '0', '2', '', '', '77', '1', '1', '1635339160', '2', '1635762258')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('78', '23', 'Văn phòng 2002A', 'Unit 2002A', '2002A', '2002A', '20', '0', '0', '0', '0', '2', '', '', '78', '1', '1', '1635339160', '2', '1635762273')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('79', '24', 'Văn phòng 2001A', 'Unit 2001A', '2001A', '2001A', '106', '0', '0', '0', '0', '2', '', '', '79', '1', '1', '1635339160', '2', '1635762283')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('80', '27', 'Văn phòng 2002B', 'Unit 2002B', '2002B', '2002B', '111', '0', '0', '0', '0', '2', '', '', '80', '1', '1', '1635339160', '2', '1635762294')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('81', '28', 'Văn phòng 2003', 'Unit 2003', '2003', '2003', '215', '0', '0', '0', '0', '2', '', '', '81', '1', '1', '1635339160', '2', '1635762306')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('82', '29', 'Văn phòng 2003', 'Unit 2003', '2003', '2003', '422', '0', '0', '0', '0', '2', '', '', '82', '1', '1', '1635339160', '2', '1635762316')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('83', '22', 'Văn phòng 21F', 'Unit 21F', '21F', '21F', '1086', '0', '0', '0', '0', '2', '', '', '83', '1', '1', '1635339160', '2', '1635762328')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('84', '23', 'Văn phòng2201', 'Bank 2201', '2201', '2201', '264', '0', '0', '0', '0', '2', '', '', '84', '1', '1', '1635339160', '2', '1635762338')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('85', '23', 'Văn phòng 2202', 'Bank 2202', '2202', '2202', '165', '0', '0', '0', '0', '2', '', '', '85', '1', '1', '1635339160', '2', '1635762347')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('86', '23', 'Văn phòng 2203', 'Unit 2203', '2203', '2203', '748', '0', '0', '0', '0', '2', '', '', '86', '1', '1', '1635339160', '2', '1635762356')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('87', '24', 'Nhà hàng 23F', 'Restaurant 23F', '23F', '23F', '851', '0', '0', '0', '0', '2', '', '', '87', '1', '1', '1635339160', '2', '1635762371')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('88', '30', 'Nhà Hàng 26F& 27F', 'Restaurant 26F& 27F', '26F-27F', '26F& 27F', '599', '0', '0', '0', '0', '2', '', '', '88', '1', '1', '1635339160', '2', '1635762394')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('89', '5', 'Văn phòng 001', 'Unit 001', '001', '001', '14', '0', '0', '0', '0', '2', '', '', '89', '1', '1', '1635339160', '2', '1635762464')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('90', '5', 'Văn phòng 002', 'Unit 002', '002', '002', '12', '0', '0', '0', '0', '2', '', '', '90', '1', '1', '1635339160', '1', '1635763560')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('91', '5', 'Văn phòng 003', 'Unit 003', '003', '003', '12', '0', '0', '0', '0', '2', '', '', '91', '1', '1', '1635339160', '2', '1635987972')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('92', '5', 'Văn phòng004', 'Unit 004', '004', '004', '24', '0', '0', '0', '0', '2', '', '', '92', '1', '1', '1635339160', '2', '1635988227')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('93', '5', 'Văn phòng 005', 'Unit 005', '005', '005', '24', '0', '0', '0', '0', '2', '', '', '93', '1', '1', '1635339160', '2', '1635988253')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('94', '5', 'Văn phòng 007', 'Unit 007', '006', '006', '24', '0', '0', '0', '0', '2', '', '', '94', '1', '1', '1635339160', '2', '1635988265')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('95', '5', 'Văn phòng 006', 'Unit 006', '007', '007', '24', '0', '0', '0', '0', '2', '', '', '95', '1', '1', '1635339160', '2', '1635988288')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('96', '5', 'Văn phòng 008', 'Unit 008', '008', '008', '24', '0', '0', '0', '0', '2', '', '', '96', '1', '1', '1635339160', '2', '1635988298')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('97', '5', 'Văn phòng 009', 'Unit 009', '009', '009', '29', '0', '0', '0', '0', '2', '', '', '97', '1', '1', '1635339160', '2', '1635988339')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('98', '5', 'Văn phòng 010', 'Unit 010', '010', '010', '19', '0', '0', '0', '0', '2', '', '', '98', '1', '1', '1635339160', '2', '1635988348')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('99', '5', 'Văn phòng 011', 'Unit 011', '011', '011', '35', '0', '0', '0', '0', '2', '', '', '99', '1', '1', '1635339160', '2', '1635988356')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('100', '5', 'Văn phòng 012', 'Unit 012', '012', '012', '26', '0', '0', '0', '0', '2', '', '', '100', '1', '1', '1635339160', '2', '1635988370')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('101', '5', 'Văn phòng 012A', 'Unit 012A', '013', '013', '28', '0', '0', '0', '0', '2', '', '', '101', '1', '1', '1635339160', '2', '1635988381')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('102', '5', 'Văn phòng 014', 'Unit 014', '014', '014', '9', '0', '0', '0', '0', '2', '', '', '102', '1', '1', '1635339160', '2', '1635988390')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('103', '5', 'Văn phòng 015', 'Unit 015', '015', '015', '14', '0', '0', '0', '0', '2', '', '', '103', '1', '1', '1635339160', '2', '1635988397')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('104', '5', 'Văn phòng 016', 'Unit 016', '016', '016', '23', '0', '0', '0', '0', '2', '', '', '104', '1', '1', '1635339160', '2', '1635988406')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('105', '5', 'Văn phòng 034', 'Unit 034', '017', '017', '41', '0', '0', '0', '0', '2', '', '', '105', '1', '1', '1635339160', '2', '1635988415')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('106', '5', 'Văn phòng 018', 'Unit 018', '018', '018', '23', '0', '0', '0', '0', '2', '', '', '106', '1', '1', '1635339160', '2', '1635988425')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('107', '5', 'Văn phòng 019A', 'Unit 019A', '019', '019', '20', '0', '0', '0', '0', '2', '', '', '107', '1', '1', '1635339160', '2', '1635988464')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('108', '5', 'Văn phòng 020', 'Unit 020', '020', '020', '21', '0', '0', '0', '0', '2', '', '', '108', '1', '1', '1635339160', '2', '1635988472')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('109', '5', 'Văn phòng 021', 'Unit 021', '021', '021', '20', '0', '0', '0', '0', '2', '', '', '109', '1', '1', '1635339160', '2', '1635988479')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('110', '5', 'Văn phòng 022', 'Unit 022', '022', '022', '26', '0', '0', '0', '0', '2', '', '', '110', '1', '1', '1635339160', '2', '1635988490')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('111', '5', 'Văn phòng 023', 'Unit 023', '023', '023', '26', '0', '0', '0', '0', '2', '', '', '111', '1', '1', '1635339160', '2', '1635988499')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('112', '5', 'Văn phòng 024', 'Unit 024', '024', '024', '22', '0', '0', '0', '0', '2', '', '', '112', '1', '1', '1635339160', '2', '1635988510')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('113', '5', 'Văn phòng 025', 'Unit 025', '025', '025', '11', '0', '0', '0', '0', '2', '', '', '113', '1', '1', '1635339160', '2', '1635988584')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('114', '5', 'Văn phòng 026', 'Unit 026', '026', '026', '13', '0', '0', '0', '0', '2', '', '', '114', '1', '1', '1635339160', '2', '1635988597')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('115', '5', 'Văn phòng 027', 'Unit 027', '027', '027', '13', '0', '0', '0', '0', '2', '', '', '115', '1', '1', '1635339160', '2', '1635988606')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('116', '5', 'Văn phòng 028', 'Unit 028', '028', '028', '11', '0', '0', '0', '0', '2', '', '', '116', '1', '1', '1635339160', '2', '1635988616')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('117', '5', 'Văn phòng 029', 'Unit 029', '029', '029', '12', '0', '0', '0', '0', '2', '', '', '117', '1', '1', '1635339160', '2', '1635989208')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('118', '5', 'Văn phòng 030', 'Unit 030', '030', '030', '12', '0', '0', '0', '0', '2', '', '', '118', '1', '1', '1635339160', '2', '1635989269')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('119', '5', 'Văn phòng 031', 'Unit 031', '031', '031', '12', '0', '0', '0', '0', '2', '', '', '119', '1', '1', '1635339160', '2', '1635989277')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('120', '5', 'Văn phòng 032', 'Unit 032', '032', '032', '13', '0', '0', '0', '0', '2', '', '', '120', '1', '1', '1635339160', '2', '1635989287')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('121', '5', 'Văn phòng 033', 'Unit 033', '033', '033', '13', '0', '0', '0', '0', '2', '', '', '121', '1', '1', '1635339160', '2', '1635989295')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('122', '5', 'Văn phòng 034A', 'Unit 034A', '034', '034', '11', '0', '0', '0', '0', '2', '', '', '122', '1', '1', '1635339160', '2', '1635989303')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('123', '5', 'Văn phòng 035', 'Unit 035', '035', '035', '11', '0', '0', '0', '0', '2', '', '', '123', '1', '1', '1635339160', '2', '1635989312')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('124', '5', 'Văn phòng 036', 'Unit 036', '036', '036', '11', '0', '0', '0', '0', '2', '', '', '124', '1', '1', '1635339160', '2', '1635989321')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('125', '5', 'Văn phòng 037', 'Unit 037', '037', '037', '14', '0', '0', '0', '0', '2', '', '', '125', '1', '1', '1635339160', '2', '1635989328')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('126', '5', 'Văn phòng 038', 'Unit 038', '038', '038', '14', '0', '0', '0', '0', '2', '', '', '126', '1', '1', '1635339160', '2', '1635989337')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('127', '5', 'Văn phòng 039', 'Unit 039', '039', '039', '14', '0', '0', '0', '0', '2', '', '', '127', '1', '1', '1635339160', '2', '1635989347')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('128', '5', 'Văn phòng 040', 'Unit 040', '040', '040', '14', '0', '0', '0', '0', '2', '', '', '128', '1', '1', '1635339160', '1', '1635514362')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('129', '5', 'Văn phòng 041', 'Unit 041', '041', '041', '14', '0', '0', '0', '0', '2', '', '', '129', '1', '1', '1635339160', '1', '1635513967')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('130', '5', 'Văn phòng 043', 'Unit 043', '042', '042', '7', '0', '0', '0', '0', '2', '', '', '130', '1', '1', '1635339160', '1', '1635513942')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('131', '1', 'CÔNG TY TNHH LUSINE', 'CÔNG TY TNHH LUSINE', 'CONG-TY-TNHH-LUSINE', 'NN1', '96', '0', '0', '0', '0', '2', '', '', '131', '1', '1', '1635339160', '1', '1635513676')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('132', '1', 'EIGHT FOUR CONCEPT ONE VIETNAM COMPANY LIMITED', 'EIGHT FOUR CONCEPT ONE VIETNAM COMPANY LIMITED', 'NN2', 'NN2', '0', '0', '0', '0', '0', '2', '', '', '132', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_product (pid, fid, title_vi, title_en, alias, productcode, area, price_usd_min, price_usd_max, price_vnd_min, price_vnd_max, rent_status, image, note, weight, active, adminid, crtd_date, userid_edit, update_date) VALUES('133', '1', 'BODYNITS TIEN GIANG COMPANY LIMITED', 'BODYNITS TIEN GIANG COMPANY LIMITED', 'NN3', 'NN3', '16128', '0', '0', '0', '0', '2', '', '', '133', '1', '1', '1635339160', '1', '1635339160')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rent_status (rid, decription, maindefault, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('1', 'Đã cho thuê', '0', '1', '0', '0', '4', '1636721601', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rent_status (rid, decription, maindefault, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('2', 'Chưa cho thuê', '1', '1', '0', '0', '0', '2', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rent_status (rid, decription, maindefault, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('3', 'Đặt cọc', '0', '1', '0', '0', '0', '3', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rent_status (rid, decription, maindefault, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('7', 'a', '0', '1', '1', '1635500610', '1', '1635500610', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rent_status (rid, decription, maindefault, active, adminid, crtd_date, userid_edit, update_date, status_del) VALUES('8', '111111111', '0', '1', '4', '1636720434', '4', '1636720434', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('3', '0', 'Gửi xe hơi', 'CPAR', 'CPAR', '10', '5', '200', '0', '9', '2', '', '3', '1', 'month', '1', '1635584245', '1', '1635671945', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('2', '0', 'Điện', 'ELEC', 'ELEC', '1', '3', '0', '3700', '9', '3', '', '2', '1', 'month', '1', '1635584245', '1', '1635585819', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('1', '0', 'Tiền nước', 'WTER', 'WTER', '1', '4', '0', '19000', '9', '3', '', '1', '1', 'month', '1', '1635584245', '4', '1637147943', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('4', '0', 'Gửi xe máy', 'BPAR', 'BPAR', '10', '5', '20', '0', '9', '3', '', '4', '1', 'month', '1', '1635584245', '1', '1635671959', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('5', '0', 'Lightbox', 'LIGH', 'LIGH', '1', '2', '500', '0', '6', '3', '', '5', '1', 'month', '1', '1635584245', '1', '1635757080', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('6', '0', 'Máy lạnh ngoài giờ cho 200m2', 'ACF1', 'ACF1', '1', '2', '0', '0', '6', '3', '', '6', '1', 'month', '1', '1635584245', '2', '1635757353', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('7', '0', 'Máy lạnh ngoài giờ cho 500m2', 'ACF2', 'ACF2', '1', '2', '0', '0', '6', '0', '', '7', '1', 'month', '1', '1635584245', '2', '1635757458', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('8', '0', 'Máy lạnh ngoài giờ  cho 1,000m2', 'ACF3', 'ACF3', '1', '2', '0', '0', '1', '0', '', '8', '1', 'month', '1', '1635584245', '2', '1635758100', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('9', '0', 'Phí chứng từ', 'ADMF', 'ADMF', '1', '2', '500', '0', '1', '0', '', '9', '1', 'month', '1', '1635584245', '2', '1635758124', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('10', '0', 'In ấn', 'P A4BW', 'P A4BW', '1', '2', '0', '0', '1', '0', '', '10', '1', 'month', '1', '1635584245', '2', '1635758147', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('11', '0', 'In án', '', 'P A3BW', '1', '2', '0', '0', '3', '0', '', '11', '1', 'month', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('12', '0', 'In án', '', 'P A4C', '1', '2', '0', '0', '3', '0', '', '12', '1', 'month', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('13', '0', 'In án', '', 'P A3C', '1', '2', '0', '0', '3', '0', '', '13', '1', 'month', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('14', '0', 'Scan', '', 'SCAN', '1', '2', '0', '0', '3', '0', '', '14', '1', 'month', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('15', '0', 'Internet', '', 'INET', '1', '2', '30', '0', '3', '0', '', '15', '1', 'month', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('16', '0', 'Telephone', '', 'TELE', '1', '2', '15', '0', '3', '0', '', '16', '1', 'month', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('17', '0', 'Courier', '', 'COUR', '1', '2', '3', '0', '3', '0', '', '17', '1', 'month', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('18', '0', 'Personal Electrical Appliance', '', 'PEAF', '1', '2', '5', '0', '3', '0', '', '18', '1', 'month', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('19', '0', 'Additional Furniture Chair', '', 'ACHR', '1', '2', '20', '0', '3', '0', '', '19', '1', 'month', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('20', '0', 'Additional Furniture Desk', '', 'ADEK', '1', '2', '10', '0', '3', '0', '', '20', '1', 'month', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('21', '0', 'Phòng họp theo giờ', 'MRH2', 'MRH2', '1', '2', '35', '0', '1', '0', '', '21', '1', 'month', '1', '1635584245', '2', '1635758182', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('22', '0', 'Phòng họp theo nữa giờ', 'MRD1', 'MRD1', '1', '2', '0', '0', '1', '0', '', '22', '1', 'month', '1', '1635584245', '2', '1635758213', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('23', '0', 'Phòng họp theo 1 ngày', '', 'MRD2', '1', '2', '0', '0', '3', '0', '', '23', '1', 'month', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('24', '0', 'Phòng họp 30 phút', '', 'MRH1', '1', '2', '0', '0', '3', '0', '', '24', '1', 'month', '1', '1635584245', '1', '1635584245', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('25', '1', 'Thuê văn phòng', 'TVP', 'TVP', '7', '2', '1000', '0', '6', '3', '', '25', '1', 'month', '1', '1635672366', '1', '1635688210', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service (sid, service_main, title_vi, title_en, servicecode, catid, unitid, price_usd, price_vnd, chargeid, dailyreport, note, weight, active, typein, adminid, crtd_date, userid_edit, update_time, status_del) VALUES('26', '1', 'thu nợ thuê', 'thu nợ thuê', 'thu nợ thuê', '1', '1', '22222200', '2222220000', '4', '1', '', '26', '1', 'month', '4', '1637148269', '4', '1637148269', '0')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_cat (cid, title, weight, active, status_del, adminid, crtd_date, userid_edit, update_date) VALUES('1', 'Dịch vụ cố định', '1', '1', '0', '0', '0', '1', '1635671777')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_cat (cid, title, weight, active, status_del, adminid, crtd_date, userid_edit, update_date) VALUES('7', 'Dịch vụ cho thuê văn phòng', '2', '1', '0', '0', '0', '1', '1635671699')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_cat (cid, title, weight, active, status_del, adminid, crtd_date, userid_edit, update_date) VALUES('8', 'Dịch vụ cho thuê thiết bị', '3', '1', '0', '1', '1635671800', '1', '1635671800')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_cat (cid, title, weight, active, status_del, adminid, crtd_date, userid_edit, update_date) VALUES('9', 'Dịch vụ cho thuê phòng họp', '4', '1', '0', '1', '1635671867', '1', '1635671867')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_cat (cid, title, weight, active, status_del, adminid, crtd_date, userid_edit, update_date) VALUES('10', 'Dịch vụ gửi xe', '5', '1', '0', '1', '1635671916', '1', '1635671916')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_cat (cid, title, weight, active, status_del, adminid, crtd_date, userid_edit, update_date) VALUES('11', 'Dịch vụ văn phòng phẩm', '6', '1', '0', '1', '1635671993', '1', '1635672152')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_extra (id, pid, cid, sid, yearmonth, datefrom, dateto, pricevnd, priceusd, amount, totalvnd, totalusd, note, active, userid_edit, update_date, adminid, crt_date, weight) VALUES('1', '3', '1', '1', '092021', '1630515600', '1631034000', '4000', '0.1', '100', '400000', '10', '', '0', '0', '0', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_extra (id, pid, cid, sid, yearmonth, datefrom, dateto, pricevnd, priceusd, amount, totalvnd, totalusd, note, active, userid_edit, update_date, adminid, crt_date, weight) VALUES('2', '3', '1', '2', '092021', '1631293200', '1631293200', '4000', '0.4', '20', '80000', '8', '', '1', '0', '0', '1', '1631368785', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_extra (id, pid, cid, sid, yearmonth, datefrom, dateto, pricevnd, priceusd, amount, totalvnd, totalusd, note, active, userid_edit, update_date, adminid, crt_date, weight) VALUES('6', '5', '10', '2', '02021', '1634576400', '1634576400', '10000', '20', '1', '10000', '20', 'ghi chú', '1', '0', '0', '2', '1634637461', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_extra (id, pid, cid, sid, yearmonth, datefrom, dateto, pricevnd, priceusd, amount, totalvnd, totalusd, note, active, userid_edit, update_date, adminid, crt_date, weight) VALUES('8', '3', '11', '2', '02021', '1635267600', '1635267600', '4000', '0', '40', '160000', '20', '', '1', '0', '0', '1', '1635337393', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_extra (id, pid, cid, sid, yearmonth, datefrom, dateto, pricevnd, priceusd, amount, totalvnd, totalusd, note, active, userid_edit, update_date, adminid, crt_date, weight) VALUES('9', '3', '11', '1', '02021', '1633021200', '1635613200', '3000', '0.5', '40', '120000', '20', '', '1', '0', '0', '1', '1635339160', '6')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_extra (id, pid, cid, sid, yearmonth, datefrom, dateto, pricevnd, priceusd, amount, totalvnd, totalusd, note, active, userid_edit, update_date, adminid, crt_date, weight) VALUES('10', '1', '1', '3', '02021', '1636390800', '1636390800', '3700', '200', '10', '37000', '2000', '', '1', '0', '0', '1', '1636425353', '7')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_extra (id, pid, cid, sid, yearmonth, datefrom, dateto, pricevnd, priceusd, amount, totalvnd, totalusd, note, active, userid_edit, update_date, adminid, crt_date, weight) VALUES('11', '1', '1', '3', '112021', '1636304400', '1636304400', '3700', '200', '20', '74000', '4000', '', '1', '0', '0', '1', '1636425481', '8')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_extra (id, pid, cid, sid, yearmonth, datefrom, dateto, pricevnd, priceusd, amount, totalvnd, totalusd, note, active, userid_edit, update_date, adminid, crt_date, weight) VALUES('12', '1', '1', '4', '112021', '1636477200', '1636477200', '5000', '20', '1', '5000', '20', '', '1', '0', '0', '1', '1636561938', '9')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_service_extra (id, pid, cid, sid, yearmonth, datefrom, dateto, pricevnd, priceusd, amount, totalvnd, totalusd, note, active, userid_edit, update_date, adminid, crt_date, weight) VALUES('13', '1', '1', '4', '112021', '1636477200', '1636477200', '5000', '20', '1', '5000', '20', '', '1', '0', '0', '1', '1636561938', '10')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_sign (userid, sign_vi, image_sign_vi, sign_en, image_sign_en) VALUES('1', 'Nguyễn Thanh Hoàng', '', 'Nguyen Thanh Hoang', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit (uid, title) VALUES('1', 'cái')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit (uid, title) VALUES('2', 'tháng')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit (uid, title) VALUES('3', 'KWh')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit (uid, title) VALUES('4', 'm3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit (uid, title) VALUES('5', 'xe')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit (uid, title) VALUES('6', 'm2/h')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit (uid, title) VALUES('7', 'lần')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit (uid, title) VALUES('8', 'trang')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit (uid, title) VALUES('9', 'line')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit (uid, title) VALUES('10', 'thư')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit (uid, title) VALUES('11', 'giờ')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_unit (uid, title) VALUES('12', 'set')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
