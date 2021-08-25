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
        $db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote  WHERE id = ' . $db->quote($id));
        $nv_Cache->delMod($module_name);
        nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Debitnote_add', 'ID: ' . $id, $admin_info['userid']);
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
}

$row = array();
$error = array();
$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $row['pid'] = $nv_Request->get_int('pid', 'post', 0);
    $row['cid'] = $nv_Request->get_int('cid', 'post', 0);
    $row['yearmount'] = $nv_Request->get_title('yearmount', 'post', '');
    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('debitnotedate', 'post'), $m))     {
        $_hour = 0;
        $_min = 0;
        $row['debitnotedate'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
    }
    else
    {
        $row['debitnotedate'] = 0;
    }
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
    $row['areareal'] = $nv_Request->get_title('areareal', 'post', '');
    $row['exchangeusd'] = $nv_Request->get_int('exchangeusd', 'post', 0);
    $row['recipients_vi'] = $nv_Request->get_title('recipients_vi', 'post', '');
    $row['recipients_en'] = $nv_Request->get_title('recipients_en', 'post', '');
    $row['explain_vi'] = $nv_Request->get_title('explain_vi', 'post', '');
    $row['explain_en'] = $nv_Request->get_title('explain_en', 'post', '');
    $row['account_bank_vi'] = $nv_Request->get_title('account_bank_vi', 'post', '');
    $row['account_bank_en'] = $nv_Request->get_title('account_bank_en', 'post', '');
    $row['holding_vi'] = $nv_Request->get_title('holding_vi', 'post', '');
    $row['holding_en'] = $nv_Request->get_title('holding_en', 'post', '');
    $row['bank_name_vi'] = $nv_Request->get_title('bank_name_vi', 'post', '');
    $row['bank_name_en'] = $nv_Request->get_title('bank_name_en', 'post', '');
    $row['bank_address_vi'] = $nv_Request->get_title('bank_address_vi', 'post', '');
    $row['bank_address_en'] = $nv_Request->get_title('bank_address_en', 'post', '');
    $row['swiftcode'] = $nv_Request->get_title('swiftcode', 'post', '');
    $row['note_vi'] = $nv_Request->get_textarea('note_vi', '', NV_ALLOWED_HTML_TAGS);
    $row['note_en'] = $nv_Request->get_textarea('note_en', '', NV_ALLOWED_HTML_TAGS);
    $row['companyid'] = $nv_Request->get_int('companyid', 'post', 0);
    $row['comapyname_vi'] = $nv_Request->get_title('comapyname_vi', 'post', '');
    $row['comapyname_en'] = $nv_Request->get_title('comapyname_en', 'post', '');
    $row['manager_name_vi'] = $nv_Request->get_title('manager_name_vi', 'post', '');
    $row['manager_name_en'] = $nv_Request->get_title('manager_name_en', 'post', '');
    $row['adminid'] = $nv_Request->get_int('adminid', 'post', 0);
    $row['crt_date'] = $nv_Request->get_int('crt_date', 'post', 0);
    $row['userid_edit'] = $nv_Request->get_int('userid_edit', 'post', 0);
    $row['update_date'] = $nv_Request->get_int('update_date', 'post', 0);
    $row['debitcode'] = $nv_Request->get_title('debitcode', 'post', '');
    $row['note'] = $nv_Request->get_textarea('note', '', NV_ALLOWED_HTML_TAGS);

    if (empty($row['pid'])) {
        $error[] = $lang_module['error_required_pid'];
    } elseif (empty($row['cid'])) {
        $error[] = $lang_module['error_required_cid'];
    } elseif (empty($row['yearmount'])) {
        $error[] = $lang_module['error_required_yearmount'];
    } elseif (empty($row['debitnotedate'])) {
        $error[] = $lang_module['error_required_debitnotedate'];
    } elseif (empty($row['datefrom'])) {
        $error[] = $lang_module['error_required_datefrom'];
    } elseif (empty($row['dateto'])) {
        $error[] = $lang_module['error_required_dateto'];
    } elseif (empty($row['areareal'])) {
        $error[] = $lang_module['error_required_areareal'];
    } elseif (empty($row['exchangeusd'])) {
        $error[] = $lang_module['error_required_exchangeusd'];
    } elseif (empty($row['recipients_vi'])) {
        $error[] = $lang_module['error_required_recipients_vi'];
    } elseif (empty($row['recipients_en'])) {
        $error[] = $lang_module['error_required_recipients_en'];
    } elseif (empty($row['explain_vi'])) {
        $error[] = $lang_module['error_required_explain_vi'];
    } elseif (empty($row['explain_en'])) {
        $error[] = $lang_module['error_required_explain_en'];
    } elseif (empty($row['account_bank_vi'])) {
        $error[] = $lang_module['error_required_account_bank_vi'];
    } elseif (empty($row['account_bank_en'])) {
        $error[] = $lang_module['error_required_account_bank_en'];
    } elseif (empty($row['holding_vi'])) {
        $error[] = $lang_module['error_required_holding_vi'];
    } elseif (empty($row['holding_en'])) {
        $error[] = $lang_module['error_required_holding_en'];
    } elseif (empty($row['bank_name_vi'])) {
        $error[] = $lang_module['error_required_bank_name_vi'];
    } elseif (empty($row['bank_name_en'])) {
        $error[] = $lang_module['error_required_bank_name_en'];
    } elseif (empty($row['bank_address_vi'])) {
        $error[] = $lang_module['error_required_bank_address_vi'];
    } elseif (empty($row['bank_address_en'])) {
        $error[] = $lang_module['error_required_bank_address_en'];
    } elseif (empty($row['swiftcode'])) {
        $error[] = $lang_module['error_required_swiftcode'];
    } elseif (empty($row['note_vi'])) {
        $error[] = $lang_module['error_required_note_vi'];
    } elseif (empty($row['note_en'])) {
        $error[] = $lang_module['error_required_note_en'];
    } elseif (empty($row['companyid'])) {
        $error[] = $lang_module['error_required_companyid'];
    } elseif (empty($row['comapyname_vi'])) {
        $error[] = $lang_module['error_required_comapyname_vi'];
    } elseif (empty($row['comapyname_en'])) {
        $error[] = $lang_module['error_required_comapyname_en'];
    } elseif (empty($row['manager_name_vi'])) {
        $error[] = $lang_module['error_required_manager_name_vi'];
    } elseif (empty($row['manager_name_en'])) {
        $error[] = $lang_module['error_required_manager_name_en'];
    }

    if (empty($error)) {
        try {
            if (empty($row['id'])) {
                $row['weight'] = 0;
                $row['active'] = 0;

                $stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote (pid, cid, yearmount, debitnotedate, datefrom, dateto, areareal, exchangeusd, recipients_vi, recipients_en, explain_vi, explain_en, account_bank_vi, account_bank_en, holding_vi, holding_en, bank_name_vi, bank_name_en, bank_address_vi, bank_address_en, swiftcode, note_vi, note_en, companyid, comapyname_vi, comapyname_en, manager_name_vi, manager_name_en, adminid, crt_date, userid_edit, update_date, weight, debitcode, active, note) VALUES (:pid, :cid, :yearmount, :debitnotedate, :datefrom, :dateto, :areareal, :exchangeusd, :recipients_vi, :recipients_en, :explain_vi, :explain_en, :account_bank_vi, :account_bank_en, :holding_vi, :holding_en, :bank_name_vi, :bank_name_en, :bank_address_vi, :bank_address_en, :swiftcode, :note_vi, :note_en, :companyid, :comapyname_vi, :comapyname_en, :manager_name_vi, :manager_name_en, :adminid, :crt_date, :userid_edit, :update_date, :weight, :debitcode, :active, :note)');

                $stmt->bindParam(':weight', $row['weight'], PDO::PARAM_INT);
                $stmt->bindParam(':active', $row['active'], PDO::PARAM_INT);

            } else {
                $stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote SET pid = :pid, cid = :cid, yearmount = :yearmount, debitnotedate = :debitnotedate, datefrom = :datefrom, dateto = :dateto, areareal = :areareal, exchangeusd = :exchangeusd, recipients_vi = :recipients_vi, recipients_en = :recipients_en, explain_vi = :explain_vi, explain_en = :explain_en, account_bank_vi = :account_bank_vi, account_bank_en = :account_bank_en, holding_vi = :holding_vi, holding_en = :holding_en, bank_name_vi = :bank_name_vi, bank_name_en = :bank_name_en, bank_address_vi = :bank_address_vi, bank_address_en = :bank_address_en, swiftcode = :swiftcode, note_vi = :note_vi, note_en = :note_en, companyid = :companyid, comapyname_vi = :comapyname_vi, comapyname_en = :comapyname_en, manager_name_vi = :manager_name_vi, manager_name_en = :manager_name_en, adminid = :adminid, crt_date = :crt_date, userid_edit = :userid_edit, update_date = :update_date, debitcode = :debitcode, note = :note WHERE id=' . $row['id']);
            }
            $stmt->bindParam(':pid', $row['pid'], PDO::PARAM_INT);
            $stmt->bindParam(':cid', $row['cid'], PDO::PARAM_INT);
            $stmt->bindParam(':yearmount', $row['yearmount'], PDO::PARAM_STR);
            $stmt->bindParam(':debitnotedate', $row['debitnotedate'], PDO::PARAM_INT);
            $stmt->bindParam(':datefrom', $row['datefrom'], PDO::PARAM_INT);
            $stmt->bindParam(':dateto', $row['dateto'], PDO::PARAM_INT);
            $stmt->bindParam(':areareal', $row['areareal'], PDO::PARAM_STR);
            $stmt->bindParam(':exchangeusd', $row['exchangeusd'], PDO::PARAM_INT);
            $stmt->bindParam(':recipients_vi', $row['recipients_vi'], PDO::PARAM_STR);
            $stmt->bindParam(':recipients_en', $row['recipients_en'], PDO::PARAM_STR);
            $stmt->bindParam(':explain_vi', $row['explain_vi'], PDO::PARAM_STR);
            $stmt->bindParam(':explain_en', $row['explain_en'], PDO::PARAM_STR);
            $stmt->bindParam(':account_bank_vi', $row['account_bank_vi'], PDO::PARAM_STR);
            $stmt->bindParam(':account_bank_en', $row['account_bank_en'], PDO::PARAM_STR);
            $stmt->bindParam(':holding_vi', $row['holding_vi'], PDO::PARAM_STR);
            $stmt->bindParam(':holding_en', $row['holding_en'], PDO::PARAM_STR);
            $stmt->bindParam(':bank_name_vi', $row['bank_name_vi'], PDO::PARAM_STR);
            $stmt->bindParam(':bank_name_en', $row['bank_name_en'], PDO::PARAM_STR);
            $stmt->bindParam(':bank_address_vi', $row['bank_address_vi'], PDO::PARAM_STR);
            $stmt->bindParam(':bank_address_en', $row['bank_address_en'], PDO::PARAM_STR);
            $stmt->bindParam(':swiftcode', $row['swiftcode'], PDO::PARAM_STR);
            $stmt->bindParam(':note_vi', $row['note_vi'], PDO::PARAM_STR, strlen($row['note_vi']));
            $stmt->bindParam(':note_en', $row['note_en'], PDO::PARAM_STR, strlen($row['note_en']));
            $stmt->bindParam(':companyid', $row['companyid'], PDO::PARAM_INT);
            $stmt->bindParam(':comapyname_vi', $row['comapyname_vi'], PDO::PARAM_STR);
            $stmt->bindParam(':comapyname_en', $row['comapyname_en'], PDO::PARAM_STR);
            $stmt->bindParam(':manager_name_vi', $row['manager_name_vi'], PDO::PARAM_STR);
            $stmt->bindParam(':manager_name_en', $row['manager_name_en'], PDO::PARAM_STR);
            $stmt->bindParam(':adminid', $row['adminid'], PDO::PARAM_INT);
            $stmt->bindParam(':crt_date', $row['crt_date'], PDO::PARAM_INT);
            $stmt->bindParam(':userid_edit', $row['userid_edit'], PDO::PARAM_INT);
            $stmt->bindParam(':update_date', $row['update_date'], PDO::PARAM_INT);
            $stmt->bindParam(':debitcode', $row['debitcode'], PDO::PARAM_STR);
            $stmt->bindParam(':note', $row['note'], PDO::PARAM_STR, strlen($row['note']));

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['id'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Debitnote_add', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Debitnote_add', 'ID: ' . $row['id'], $admin_info['userid']);
                }
                nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_debitnote WHERE id=' . $row['id'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
} else {
    $row['id'] = 0;
    $row['pid'] = 0;
    $row['cid'] = 0;
    $row['yearmount'] = '';
    $row['debitnotedate'] = 0;
    $row['datefrom'] = 0;
    $row['dateto'] = 0;
    $row['areareal'] = '';
    $row['exchangeusd'] = 1;
    $row['recipients_vi'] = '';
    $row['recipients_en'] = '';
    $row['explain_vi'] = '';
    $row['explain_en'] = '';
    $row['account_bank_vi'] = '';
    $row['account_bank_en'] = '';
    $row['holding_vi'] = '';
    $row['holding_en'] = '';
    $row['bank_name_vi'] = '';
    $row['bank_name_en'] = '';
    $row['bank_address_vi'] = '';
    $row['bank_address_en'] = '';
    $row['swiftcode'] = '';
    $row['note_vi'] = '';
    $row['note_en'] = '';
    $row['companyid'] = 0;
    $row['comapyname_vi'] = '';
    $row['comapyname_en'] = '';
    $row['manager_name_vi'] = '';
    $row['manager_name_en'] = '';
    $row['adminid'] = 0;
    $row['crt_date'] = 0;
    $row['userid_edit'] = 0;
    $row['update_date'] = 0;
    $row['debitcode'] = '';
    $row['note'] = '';
}

if (empty($row['debitnotedate'])) {
    $row['debitnotedate'] = '';
}
else
{
    $row['debitnotedate'] = date('d/m/Y', $row['debitnotedate']);
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

$row['note_vi'] = nv_htmlspecialchars(nv_br2nl($row['note_vi']));
$row['note_en'] = nv_htmlspecialchars(nv_br2nl($row['note_en']));
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

$array_exchangeusd_lease = array();
$_sql = 'SELECT id,mount FROM vidoco_vi_lease_exchange_rate';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_exchangeusd_lease[$_row['id']] = $_row;
}

$array_companyid_lease = array();
$_sql = 'SELECT cid,vi_title FROM vidoco_vi_lease_company';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_companyid_lease[$_row['cid']] = $_row;
}


$array_yearmount = array();
$array_yearmount[2019] = '2019';
$array_yearmount[2020] = '2020';
$array_yearmount[2021] = '2021';
$xtpl = new XTemplate('debitnote_add.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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
foreach ($array_exchangeusd_lease as $value) {
    $xtpl->assign('OPTION', array(
        'key' => $value['id'],
        'title' => $value['mount'],
        'selected' => ($value['id'] == $row['exchangeusd']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_exchangeusd');
}
foreach ($array_companyid_lease as $value) {
    $xtpl->assign('OPTION', array(
        'key' => $value['cid'],
        'title' => $value['vi_title'],
        'selected' => ($value['cid'] == $row['companyid']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_companyid');
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

$page_title = $lang_module['debitnote_add'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
