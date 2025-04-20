<?php
/**
 *
 * Upload To Mega extension for the phpBB >=3.3.9 Forum Software package.
 *
 * @copyright (c) 2025 Picaron
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
    exit;
}

if (empty($lang) || !is_array($lang))
{
    $lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
    'TITLE_LINK_MEGA'           => 'Upload File to MEGA',
    'LINK_EXPLAIN_MEGA'         => 'From this section you can upload and host in MEGA any file with a MAXIMUM size of ',
    'ADD_FILE_MEGA'             => 'Upload File to MEGA Account',
    'BUTTOM_TO_MEGA'            => 'Upload File',
    'ADD_FILE_PC'               => 'Select a file from your PC',
    'ADD_NOTE_MEGA'             => '<i>Note: Copy the generated download link and use it to create a "Download Link" in the Forum</i>',
    'NOT_FILE_TO_MEGA'          => 'No file has been selected for Upload',
    'FILE_TO_BIG_MEGA'          => 'The file: <b>%1$s</b><br>is too big (%2$s bytes) Max Size: %3$s bytes',
    'NOT_CACH_FILE_MEGA'        => 'The upload failed. Failed to cache file.',
    'FILE_UP_OK_MEGA'           => 'Upload File --- <b>%1$s</b> --- to MEGA, Done Correctly.<br><br>',
    'FILE_WARNING_MEGA'         => 'WARNING: Upload process to MEGA.<br>File ---  <b>%1$s</b> --- It already exists in MEGA.<br>MEGA file download link is provided.<br><br>',
    'LINK_FILE_MEGA'            => 'Download Link<br>',
    'LINK_TITLE_MEGA'           => 'Click -> Right button -> Copy',
    'MEGA_INTERNAL_ERROR'       => '!! UNEXPECTED ERROR IN THE MANAGEMENT OF Upload To Mega !!<br>Report this error to the forum moderators.',
    'NO_INST_MEGA'              => 'MEGA CMD ERROR: This Extension needs the <a href="https://mega.io/es/cmd#download" target="_blank">MEGA CMD</a> tool installed and enabled on the Server.<br>',
    'HMTL_UP_PORCE_MEGA'        => 'Uploaded',
    'HMTL_UP_BYTES_MEGA'        => 'bytes of',
    'HMTL_UP_TOTAL_MEGA'        => '% Uploaded... Please Wait.',
    'HMTL_UP_FAILED_MEGA'       => 'Upload has Failed',
    'HMTL_UP_CANCEL_MEGA'       => 'Upload has Canceled',
    'UPLOADTOMEGA_VERSION'      => 'Release',
    'VARS_WARNING_MEGA'         => 'ERROR by MEGA CMD: MEGA account access data is missing or wrong.<br>Report this error to the forum moderators.',
    'SUSPENDED_ACCOUNT_MEGA'    => 'ERROR with MEGA Account: The MEGA account configured by the administration IS LOCKED.<br>Please report this error to the Forum moderators so they can reassign a new MEGA account.',
    'LINK_ADD_ERROR'            => 'ERROR Upload MEGA CMD: Uploading the file --- <b>%1$s</b> --- failed.<br>Please report this error to the Forum moderators.',
    'LINK_MEGA_ERROR'           => 'ERROR Upload MEGA CMD: Uploading file --- <b>%1$s</b> --- failed.<br>Cannot get download link.<br>Repeat the file upload process and if the error persists, inform the Forum Moderators.',

    // INSTALL
    'MEGACMD_ERROR'             => '<b>Upload To Mega cannot be installed.</b><br><br>- Required the <a href="https://mega.io/es/cmd#download" target="_blank">MEGA CMD</a> tool installed and enabled on the Server.',
    'MEGACMD_DIR_ERROR'         => '<b>Upload To Mega cannot be installed.</b><br><br>SOLUTION: From the terminal (PuTTY) and as ROOT,<br>it is necessary to create the folder ".megaCmd" with permissions 775 <br>within the path <b>%1$s</b><br>and assign the user <b>%2$s</b> as the owner.',
    'LINUX_ERROR'               => '<b>Upload To Mega cannot be installed.</b><br><br>- Required server under <b>Debian</b> or <b>Ubuntu</b>.',
    'PHPBB_ERROR'               => '<b>Upload To Mega cannot be installed.</b><br><br>- PhpBB 3.3.9 or later is required.',
    'PHP_ERROR'                 => '<b>Upload To Mega cannot be installed.</b><br><br>- PHP 7.2.0 or later is required.',
    'MEGA_NO_HOME_ERROR'        => 'The value for the variable <b>$_SERVER[\'HOME\']</b> cannot be found.<br>The status of the folder <b>$_SERVER[\'HOME\']/.megaCmd</b> cannot be verified.<br><br><b>Upload To Mega cannot be installed.</b><br>',
    'MEGA_NO_DIR_ERROR'         => 'The folder <b>%1$s/.megaCmd</b> does not exist. <b>And it could not be created.</b><br>',
    'MEGA_NOREA_DIR_ERROR'      => 'The <b>%1$s</b> folder is unalterable.<br>',
    'MEGA_NO_USER_ERROR'        => 'The <b>%1$s</b> folder is not owned by user <b>%2$s</b>. Its current owner is <b>%3$s</b><br>',
    'MEGA_NO_SHELL_ERROR'       => 'The PHP <b>shell_exec()</b> function is disabled.<br>This extension must be enabled for proper operation.<br><br><b>Upload To Mega cannot be installed.</b><br>',

    // ACP
    'ACP_UPLOADTOMEGA_SETTINGS'          => 'Extension: Upload To Mega',
    'DISPLAY_UPLOADTOMEGA_USER'          => 'Account in MEGA: User Name',
    'DISPLAY_UPLOADTOMEGA_PASS'          => 'Account in MEGA: Password',
    'DISPLAY_UPLOADTOMEGA_SIZE'          => 'Maximum File Size to Upload in MB',
    'DISPLAY_UPLOADTOMEGA_SIZE_EXPLAIN'  => '<br><br>Your server has the following limitations:',
    'DISPLAY_SSERVER_VARS'               => '<br><br>upload_max_filesize: <b>%1$s MB</b><br>post_max_size: <b>%2$s MB</b>',
));
