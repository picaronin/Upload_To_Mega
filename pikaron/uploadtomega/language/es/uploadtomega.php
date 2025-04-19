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
    'TITLE_LINK_MEGA'           => 'Subir Archivo a MEGA',
    'LINK_EXPLAIN_MEGA'         => 'Desde esta sección podrá subir y hospedar en MEGA cualquier arhivo con un tamaño MÁXIMO de ',
    'ADD_FILE_MEGA'             => 'Subir Archivo a Cuenta MEGA',
    'BUTTOM_TO_MEGA'            => 'Subir Archivo',
    'ADD_FILE_PC'               => 'Seleccione un Archivo desde su PC',
    'ADD_NOTE_MEGA'             => '<i>Nota: Copie el link de descarga generado y utilicelo para crear un "Enlace de Descarga" en el Foro</i>',
    'NOT_FILE_TO_MEGA'          => 'No se ha seleccionado ningún archivo para Subir',
    'FILE_TO_BIG_MEGA'          => 'El Archivo: <b>%1$s</b><br>es demasiado grande (%2$s bytes) Maximo Tamaño: %3$s bytes',
    'NOT_CACH_FILE_MEGA'        => 'La subida ha fallado. No se ha podido cachear el archivo.',
    'FILE_UP_OK_MEGA'           => 'Subida del Archivo --- <b>%1$s</b> --- a MEGA, Realizada Correctamente.<br><br>',
    'FILE_WARNING_MEGA'         => 'ADVERTENCIA: Proceso de Subida a MEGA.<br>El Archivo ---  <b>%1$s</b> --- Ya existe en MEGA.<br>Se facilita enlace de descarga del archivo existente en MEGA<br>',
    'LINK_FILE_MEGA'            => 'Enlace de Descarga<br>',
    'LINK_TITLE_MEGA'           => 'Click -> Botón Derecho -> Copiar',
    'MEGA_INTERNAL_ERROR'       => '!! ERROR INESPERADO EN LA GESTION DE Upload To Mega !!<br>Informe de este error a los moderadores del Foro.',
    'NO_INST_MEGA'              => 'ERROR de MEGA CMD: Esta Extensión necesita la herramienta <a href="https://mega.io/es/cmd#download" target="_blank">MEGA CMD</a> instalada y habilitada en el Servidor.<br>',
    'HMTL_UP_PORCE_MEGA'        => 'Subidos',
    'HMTL_UP_BYTES_MEGA'        => 'bytes de',
    'HMTL_UP_TOTAL_MEGA'        => '% Subido... Por favor, espere.',
    'HMTL_UP_FAILED_MEGA'       => 'La Subida ha Fallado',
    'HMTL_UP_CANCEL_MEGA'       => 'La Subida se ha Cancelado',
    'UPLOADTOMEGA_VERSION'      => 'Versión',
    'VARS_WARNING_MEGA'         => 'ERROR de MEGA CMD: Faltan o son erroneos los datos de acceso a la cuenta de MEGA.<br>Informe de este error a los moderadores del Foro.',
    'SUSPENDED_ACCOUNT_MEGA'    => 'ERROR con la Cuenta de MEGA: La cuenta de MEGA configurada por la administracion ESTA BLOQUEADA.<br>Informe de este error a los moderadores del Foro para que reasignen una nueva cuenta de MEGA.',
    'LINK_ADD_ERROR'            => 'ERROR Upload MEGA CMD: La subida del archivo ---  <b>%1$s</b> --- ha fallado.<br>Informe de este error a los moderadores del Foro.',
    'LINK_MEGA_ERROR'           => 'ERROR Upload MEGA CMD: La subida del archivo ---  <b>%1$s</b> --- ha fallado.<br>No se obtiene el enlace de descarga.<br>Repita el proceos de subida del Archivo y si el error persite, informe a los moderadores del Foro.',

    // INSTALL
    'MEGACMD_ERROR'             => 'Upload To Mega no se puede instalar.<br><br>- Se requiere la herramienta <a href="https://mega.io/es/cmd#download" target="_blank">MEGA CMD</a> instalada y habilitada en el Servidor.',
    'MEGACMD_DIR_ERROR'         => 'Upload To Mega no se puede instalar.<br><br>ADVERTENCIA: Desde la terminal (PuTTY) y como ROOT,<br>es necesario crear la carpeta ".megaCmd" con permisos 775 <br>dentro de la ruta <b>%1$s</b><br>y asignar como propietario al usuario <b>%2$s</b>.',
    'LINUX_ERROR'               => 'Upload To Mega no se puede instalar.<br><br>- Se requiere un servidor con <b>Debian</b> o <b>Ubuntu</b>.',
    'PHPBB_ERROR'               => 'Upload To Mega no se puede instalar.<br><br>- Se requiere phpBB 3.3.9 o posterior.',
    'PHP_ERROR'                 => 'Upload To Mega no se puede instalar.<br><br>- Se requiere php 7.2.0 o posterior.',

    // ACP
    'ACP_UPLOADTOMEGA_SETTINGS'          => 'Extensión: Upload To Mega',
    'DISPLAY_UPLOADTOMEGA_USER'          => 'Cuenta en MEGA: Nombre de Usuario',
    'DISPLAY_UPLOADTOMEGA_PASS'          => 'Cuenta en MEGA: Contraseña',
    'DISPLAY_UPLOADTOMEGA_SIZE'          => 'Tamaño Máximo de Archivo a Subir en MB',
    'DISPLAY_UPLOADTOMEGA_SIZE_EXPLAIN'  => '<br><br>Su servidor tiene las siguientes limitaciones:',
    'DISPLAY_SSERVER_VARS'               => '<br><br>upload_max_filesize: <b>%1$s MB</b><br>post_max_size: <b>%2$s MB</b>',
));
