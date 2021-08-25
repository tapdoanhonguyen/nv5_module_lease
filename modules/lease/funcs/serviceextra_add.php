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

$row = array();
$error = array();
$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $row['pid'] = $nv_Request->get_int('pid', 'post', 0);
    $row['cid'] = $nv_Request->get_int('cid', 'post', 0);
    $row['yearmount'] = $nv_Request->get_int('yearmount', 'post', 0);
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
    $row['sid'] = $nv_Request->get_int('sid', 'post', 0);
    $row['pricevnd'] = $nv_Request->get_title('pricevnd', 'post', '');
    $row['priceusd'] = $nv_Request->get_title('priceusd', 'post', '');
    $row['amount'] = $nv_Request->get_title('amount', 'post', '');
    $row['totalvnd'] = $nv_Request->get_title('totalvnd', 'post', '');
    $row['totalusd'] = $nv_Request->get_title('totalusd', 'post', '');
    $row['note'] = $nv_Request->get_textarea('note', '', NV_ALLOWED_HTML_TAGS);
    $row['userid_edit'] = $nv_Request->get_int('userid_edit', 'post', 0);
    $row['update_date'] = $nv_Request->get_int('update_date', 'post', 0);
    $row['adminid'] = $nv_Request->get_int('adminid', 'post', 0);
    $row['crt_date'] = $nv_Request->get_int('crt_date', 'post', 0);

    if (empty($row['pid'])) {
        $error[] = $lang_module['error_required_pid'];
    } elseif (empty($row['cid'])) {
        $error[] = $lang_module['error_required_cid'];
    } elseif (empty($row['yearmount'])) {
        $error[] = $lang_module['error_required_yearmount'];
    } elseif (empty($row['datefrom'])) {
        $error[] = $lang_module['error_required_datefrom'];
    } elseif (empty($row['dateto'])) {
        $error[] = $lang_module['error_required_dateto'];
    } elseif (empty($row['sid'])) {
        $error[] = $lang_module['error_required_sid'];
    }

    if (empty($error)) {
        try {
            if (empty($row['id'])) {
                $row['active'] = 0;
                $row['weight'] = 0;

                $stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_service_extra (pid, cid, yearmount, datefrom, dateto, sid, pricevnd, priceusd, amount, totalvnd, totalusd, note, active, userid_edit, update_date, adminid, crt_date, weight) VALUES (:pid, :cid, :yearmount, :datefrom, :dateto, :sid, :pricevnd, :priceusd, :amount, :totalvnd, :totalusd, :note, :active, :userid_edit, :update_date, :adminid, :crt_date, :weight)');

                $stmt->bindParam(':active', $row['active'], PDO::PARAM_INT);
                $stmt->bindParam(':weight', $row['weight'], PDO::PARAM_INT);

            } else {
                $stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_service_extra SET pid = :pid, cid = :cid, yearmount = :yearmount, datefrom = :datefrom, dateto = :dateto, sid = :sid, pricevnd = :pricevnd, priceusd = :priceusd, amount = :amount, totalvnd = :totalvnd, totalusd = :totalusd, note = :note, userid_edit = :userid_edit, update_date = :update_date, adminid = :adminid, crt_date = :crt_date WHERE id=' . $row['id']);
            }
            $stmt->bindParam(':pid', $row['pid'], PDO::PARAM_INT);
            $stmt->bindParam(':cid', $row['cid'], PDO::PARAM_INT);
            $stmt->bindParam(':yearmount', $row['yearmount'], PDO::PARAM_INT);
            $stmt->bindParam(':datefrom', $row['datefrom'], PDO::PARAM_INT);
            $stmt->bindParam(':dateto', $row['dateto'], PDO::PARAM_INT);
            $stmt->bindParam(':sid', $row['sid'], PDO::PARAM_INT);
            $stmt->bindParam(':pricevnd', $row['pricevnd'], PDO::PARAM_STR);
            $stmt->bindParam(':priceusd', $row['priceusd'], PDO::PARAM_STR);
            $stmt->bindParam(':amount', $row['amount'], PDO::PARAM_STR);
            $stmt->bindParam(':totalvnd', $row['totalvnd'], PDO::PARAM_STR);
            $stmt->bindParam(':totalusd', $row['totalusd'], PDO::PARAM_STR);
            $stmt->bindParam(':note', $row['note'], PDO::PARAM_STR, strlen($row['note']));
            $stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);
            $stmt->bindParam(':update_date', $row['update_date'], PDO::PARAM_INT);
            $stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
            $stmt->bindParam(':crt_date', $row['crt_date'], PDO::PARAM_INT);

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['id'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Serviceextra_add', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Serviceextra_add', 'ID: ' . $row['id'], $admin_info['userid']);
                }
                nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_service_extra WHERE id=' . $row['id'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
} else {
    $row['id'] = 0;
    $row['pid'] = 0;
    $row['cid'] = 0;
    $row['yearmount'] = 0;
    $row['datefrom'] = 0;
    $row['dateto'] = 0;
    $row['sid'] = 0;
    $row['pricevnd'] = '0';
    $row['priceusd'] = '0';
    $row['amount'] = '0';
    $row['totalvnd'] = '0';
    $row['totalusd'] = '0';
    $row['note'] = '';
    $row['userid_edit'] = 0;
    $row['update_date'] = 0;
    $row['adminid'] = 0;
    $row['crt_date'] = 0;
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

$array_sid_lease = array();
$_sql = 'SELECT sid,title FROM vidoco_vi_lease_service';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_sid_lease[$_row['sid']] = $_row;
}


$array_yearmount = array();
$array_yearmount[2019] = '2019';
$array_yearmount[2020] = '2020';
$array_yearmount[2021] = '2021';
$xtpl = new XTemplate('serviceextra_add.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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
foreach ($array_sid_lease as $value) {
    $xtpl->assign('OPTION', array(
        'key' => $value['sid'],
        'title' => $value['title'],
        'selected' => ($value['sid'] == $row['sid']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_sid');
}

foreach ($array_yearmount as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'selected' => ($key == $row['yearmount']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_yearmount');
}

if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['serviceextra_add'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
