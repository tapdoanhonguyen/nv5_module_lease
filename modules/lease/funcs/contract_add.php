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

if ($nv_Request->isset_request('delete_id', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
    $id = $nv_Request->get_int('delete_id', 'get');
    $delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
    if ($id > 0 and $delete_checkss == md5($id . NV_CACHE_PREFIX . $client_info['session_id'])) {
        $db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract  WHERE id = ' . $db->quote($id));
        $nv_Cache->delMod($module_name);
        nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Contract_add', 'ID: ' . $id, $admin_info['userid']);
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
}

$row = array();
$error = array();
$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $row['pid'] = $nv_Request->get_int('pid', 'post', 0);
    $row['cid'] = $nv_Request->get_int('cid', 'post', 0);
    $row['yearmonth'] = $nv_Request->get_int('yearmonth', 'post', 0);
    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('datefrom', 'post'), $m))     {
        $_hour = 0;
        $_min = 0;
        $row['datefrom'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
    }
    else
    {
        $row['datefrom'] = 0;
    }
    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('dateto', 'post'), $m))     {
        $_hour = 0;
        $_min = 0;
        $row['dateto'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
    }
    else
    {
        $row['dateto'] = 0;
    }
    $row['ccode'] = $nv_Request->get_title('ccode', 'post', '');
    $row['pricevnd'] = $nv_Request->get_title('pricevnd', 'post', '');
    $row['priceusd'] = $nv_Request->get_title('priceusd', 'post', '');
    $row['note'] = $nv_Request->get_textarea('note', '', NV_ALLOWED_HTML_TAGS);
    $row['active'] = $nv_Request->get_int('active', 'post', 0);
    $row['adminid'] = $nv_Request->get_int('adminid', 'post', 0);
    $row['crtd_date'] = $nv_Request->get_int('crtd_date', 'post', 0);
    $row['userid_edit'] = $nv_Request->get_int('userid_edit', 'post', 0);
    $row['update_date'] = $nv_Request->get_int('update_date', 'post', 0);
    $row['feevnd'] = $nv_Request->get_int('feevnd', 'post', 0);
    $row['feeusd'] = $nv_Request->get_int('feeusd', 'post', 0);
    $row['areareal'] = $nv_Request->get_title('areareal', 'post', '');
    $row['ccat'] = $nv_Request->get_int('ccat', 'post', 0);

    if (empty($error)) {
        try {
            if (empty($row['id'])) {
                $row['weight'] = 0;

                $stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_contract (pid, cid, yearmonth, datefrom, dateto, ccode, pricevnd, priceusd, note, active, weight, adminid, crtd_date, userid_edit, update_date, feevnd, feeusd, areareal, ccat) VALUES (:pid, :cid, :yearmonth, :datefrom, :dateto, :ccode, :pricevnd, :priceusd, :note, :active, :weight, :adminid, :crtd_date, :userid_edit, :update_date, :feevnd, :feeusd, :areareal, :ccat)');

                $stmt->bindParam(':weight', $row['weight'], PDO::PARAM_INT);

            } else {
                $stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_contract SET pid = :pid, cid = :cid, yearmonth = :yearmonth, datefrom = :datefrom, dateto = :dateto, ccode = :ccode, pricevnd = :pricevnd, priceusd = :priceusd, note = :note, active = :active, adminid = :adminid, crtd_date = :crtd_date, userid_edit = :userid_edit, update_date = :update_date, feevnd = :feevnd, feeusd = :feeusd, areareal = :areareal, ccat = :ccat WHERE id=' . $row['id']);
            }
            $stmt->bindParam(':pid', $row['pid'], PDO::PARAM_INT);
            $stmt->bindParam(':cid', $row['cid'], PDO::PARAM_INT);
            $stmt->bindParam(':yearmonth', $row['yearmonth'], PDO::PARAM_INT);
            $stmt->bindParam(':datefrom', $row['datefrom'], PDO::PARAM_INT);
            $stmt->bindParam(':dateto', $row['dateto'], PDO::PARAM_INT);
            $stmt->bindParam(':ccode', $row['ccode'], PDO::PARAM_STR);
            $stmt->bindParam(':pricevnd', $row['pricevnd'], PDO::PARAM_STR);
            $stmt->bindParam(':priceusd', $row['priceusd'], PDO::PARAM_STR);
            $stmt->bindParam(':note', $row['note'], PDO::PARAM_STR, strlen($row['note']));
            $stmt->bindParam(':active', $row['active'], PDO::PARAM_INT);
            $stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
            $stmt->bindParam(':crtd_date', $row['crtd_date'], PDO::PARAM_INT);
            $stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);
            $stmt->bindParam(':update_date', $row['update_date'], PDO::PARAM_INT);
            $stmt->bindParam(':feevnd', $row['feevnd'], PDO::PARAM_INT);
            $stmt->bindParam(':feeusd', $row['feeusd'], PDO::PARAM_INT);
            $stmt->bindParam(':areareal', $row['areareal'], PDO::PARAM_STR);
            $stmt->bindParam(':ccat', $row['ccat'], PDO::PARAM_INT);

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['id'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Contract_add', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Contract_add', 'ID: ' . $row['id'], $admin_info['userid']);
                }
                nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_contract WHERE id=' . $row['id'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
} else {
    $row['id'] = 0;
    $row['pid'] = 0;
    $row['cid'] = 0;
    $row['yearmonth'] = 0;
    $row['datefrom'] = 0;
    $row['dateto'] = 0;
    $row['ccode'] = '';
    $row['pricevnd'] = '0';
    $row['priceusd'] = '0';
    $row['note'] = '';
    $row['active'] = 0;
    $row['adminid'] = 0;
    $row['crtd_date'] = 0;
    $row['userid_edit'] = 0;
    $row['update_date'] = 0;
    $row['feevnd'] = 0;
    $row['feeusd'] = 0;
    $row['areareal'] = '0';
    $row['ccat'] = 0;
}

if (empty($row['datefrom'])) {
    $row['datefrom'] = '';
}
else
{
    $row['datefrom'] = date('d/m/Y', $row['datefrom']);
}

if (empty($row['dateto'])) {
    $row['dateto'] = '';
}
else
{
    $row['dateto'] = date('d/m/Y', $row['dateto']);
}

$row['note'] = nv_htmlspecialchars(nv_br2nl($row['note']));

$array_pid_lease = array();
$_sql = 'SELECT pid,title FROM vidoco_vi_lease_product';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_pid_lease[$_row['pid']] = $_row;
}

$array_cid_lease = array();
$_sql = 'SELECT cid,title FROM vidoco_vi_lease_customer';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_cid_lease[$_row['cid']] = $_row;
}

$array_ccat_lease = array();
$_sql = 'SELECT ciđ,title FROM vidoco_vi_lease_contract_cat';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_ccat_lease[$_row['ciđ']] = $_row;
}


$array_yearmonth = array();
$array_yearmonth[2019] = '2029';
$array_yearmonth[2020] = '2020';
$array_yearmonth[2021] = '2021';
$xtpl = new XTemplate('contract_add.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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
$xtpl->assign('ROW', $row);

foreach ($array_pid_lease as $value) {
    $xtpl->assign('OPTION', array(
        'key' => $value['pid'],
        'title' => $value['title'],
        'selected' => ($value['pid'] == $row['pid']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_pid');
}
foreach ($array_cid_lease as $value) {
    $xtpl->assign('OPTION', array(
        'key' => $value['cid'],
        'title' => $value['title'],
        'selected' => ($value['cid'] == $row['cid']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_cid');
}
foreach ($array_ccat_lease as $value) {
    $xtpl->assign('OPTION', array(
        'key' => $value['ciđ'],
        'title' => $value['title'],
        'selected' => ($value['ciđ'] == $row['ccat']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_ccat');
}

foreach ($array_yearmonth as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'selected' => ($key == $row['yearmonth']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_yearmonth');
}

if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['contract_add'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
