<?php
/**
 *
 * Upload To Mega extension for the phpBB >=3.3.9 Forum Software package.
 *
 * @copyright (c) 2025 Picaron
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace pikaron\uploadtomega;

/**
* Extension class Upload To Mega for custom enable/disable/purge actions
*/
class ext extends \phpbb\extension\base
{
    /**
    * Check whether or not the extension can be enabled.
    * @return bool
    * @access public
    */
    public function is_enableable()
    {
        $config = $this->container->get('config');
        $language = $this->container->get('language');
        $language->add_lang('uploadtomega', 'pikaron/uploadtomega');


        /**
         * Check Server requirements
         *
         * Requires Debian or Ubuntu
         *
         * @return bool
         */

        $linux = shell_exec("lsb_release -a 2>&1");

        // Display a custom warning message if requirement fails.
        if (strpos($linux, 'Debian') === false && strpos($linux, 'Ubuntu') === false)
        {
            trigger_error($language->lang('LINUX_ERROR'), E_USER_WARNING);
        }


        /**
         * Check shell_exec() requirements
         *
         * Requires shell_exec() installed and enabled
         *
         * @return bool
         */

        $disabled = explode(',', ini_get('disable_functions'));
        if (!function_exists('shell_exec') || in_array('shell_exec', $disabled))
        {
            trigger_error($language->lang('MEGA_NO_SHELL_ERROR'), E_USER_WARNING);
        }


        /**
         * Check mega-cmd requirements
         *
         * Requires mega-cmd installed
         *
         * @return bool
         */

        // Check if megaCmd is installed
        $mega = shell_exec("dpkg-query --list | grep -i megacmd 2>&1");

        // Display a custom warning message if requirement fails.
        if (strpos($mega, 'ii') === false || strpos($mega, 'megacmd') === false )
        {
            trigger_error($language->lang('MEGACMD_ERROR'), E_USER_WARNING);
        }

        // Get the value of the variable $_SERVER['HOME']
        global $request;
        $http_host = $request->server('HOME');

        // Display a custom warning message if requirement fails.
        if (!isset($http_host) || $http_host == '')
        {
            trigger_error($language->lang('MEGA_NO_HOME_ERROR'), E_USER_WARNING);
        } else {
            $messa = '';
            // Check if exist dir .megaCmd
            $ok_dir = shell_exec("ls -a $http_host 2>&1");

            if (strpos($ok_dir, '.megaCmd') === false)
            {
                // Create .megaCmd folder
                $creat_d = shell_exec("mkdir $http_host/.megaCmd 2>&1");

                if ($creat_d != '')
                {
                    // Display a custom warning message if requirement fails.
                    $messa .= $language->lang('MEGA_NO_DIR_ERROR', $http_host);

                    // Check if the $http_host folder is unalterable.
                    $check_i  = shell_exec("lsattr -d $http_host 2>&1");
                    $check_ii = explode(' ', $check_i);

                    // Display a custom warning message if requirement fails.
                    if (isset($check_ii[0]) && strpos($check_ii[0], 'i') !== false)
                    {
                        $messa .= $language->lang('MEGA_NOREA_DIR_ERROR', $http_host);
                    }

                    // Check the user and group assigned to the $http_host folder
                    $check_og  = shell_exec("stat -c \"%U %G\" $http_host 2>&1");

                    // Display a custom warning message if requirement fails.
                    if (strpos($check_og, $request->server('USER')) === false || strpos($check_og, 'root root') !== false)
                    {
                        $messa .= $language->lang('MEGA_NO_USER_ERROR', $http_host,  $request->server('USER'), $check_og);
                    }
                }
            }
        }

        if ($messa != '')
        {
            trigger_error($messa . '<br>' . $language->lang('MEGACMD_DIR_ERROR', $http_host, $request->server('USER')), E_USER_WARNING);
        }


        /**
         * Check phpBB requirements
         *
         * Requires phpBB 3.3.9 or greater
         *
         * @return bool
         */

        $is_ver_phpbb = phpbb_version_compare($config['version'], '3.3.9', '>=');

        // Display a custom warning message if requirement fails.
        if (!$is_ver_phpbb)
        {
            trigger_error($language->lang('PHPBB_ERROR'), E_USER_WARNING);
        }


        /**
         * Check PHP requirements
         *
         * Requires PHP 7.2.0 or greater
         *
         * @return bool
         */

        $is_ver_php = phpbb_version_compare(PHP_VERSION, '7.2.0', '>=');

        // Display a custom warning message if requirement fails.
        if (!$is_ver_php)
        {
            trigger_error($language->lang('PHP_ERROR'), E_USER_WARNING);
        }

        return true;
    }
}
