<?php
/**
 *
 * Upload To Mega extension for the phpBB >=3.3.9 Forum Software package.
 *
 * @copyright (c) 2025 Picaron
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace pikaron\uploadtomega\core;

class uploadtomega_input_upload
{
    /** @var \phpbb\language\language */
    protected $language;

    /** @var \phpbb\request\request */
    protected $request;

    /**
    * Constructor
    *
    * @param \phpbb\language\language           $language
    * @param \phpbb\request\request             $request
    *
    */
    public function __construct(
        \phpbb\language\language $language,
        \phpbb\request\request $request
    )
    {
        $this->language             = $language;
        $this->request              = $request;
    }

    function main()
    {
        global $config;

        // Display a custom warning message if megaCmd not installed.
        $mega = shell_exec("dpkg-query --list | grep -i megacmd 2>&1");

        if (strpos($mega, 'ii') === false && strpos($mega, 'megacmd') === false )
        {
            echo '<p class="error">' . $this->language->lang('NO_INST_MEGA') . '</p>';
            exit();
        }

        $file           = $this->request->file('mega');
        $muser          = $config['uploadtomega_user'] != '' ? $config['uploadtomega_user'] : 'clear';
        $puser          = $config['uploadtomega_pass'] != '' ? $config['uploadtomega_pass'] : 'clear';
        $size           = $config['uploadtomega_file_size'];
        $maxsize        = ($size * 1024 * 1024);

        $fileName       = isset($file['name']) ? $file['name'] : '';
        $fileTmpLoc     = isset($file['tmp_name']) ? $file['tmp_name'] : '';
        $fileSize       = isset($file['size']) ? $file['size'] : '';

        if ($fileTmpLoc != '')
        {
            // We clean the file name (NO SPACES)
            $tofind = "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ·()[]{}+";
            $replac = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn-______-";
            $cadena = utf8_decode($fileName);
            $cadena = strtr($cadena, utf8_decode($tofind), $replac);
            $filen = utf8_encode($cadena);

            // Generate the destination path
            $path  = './ext/pikaron/uploadtomega/tmp/' . $filen;

            if ($fileSize < $maxsize)
            {
                if (move_uploaded_file($fileTmpLoc, $path))
                {
                    // We sanitize THE SPACES in the name of the Archive for MEGA
                    $namemega = str_replace(' ', '\ ', $filen);
                    $tomega = './ext/pikaron/uploadtomega/tmp/' . $namemega;

                    // Check if there is a login started in mega
                    $check_login  = shell_exec("timeout --signal=HUP 3s mega-whoami -l 2>&1");
                    $are_login    = strpos($check_login, $muser);

                    // Now Make Login to MEGA
                    if ($are_login === false)
                    {
                        $close_login  = shell_exec("mega-logout 2>&1");
                        $send_login   = shell_exec("timeout --signal=HUP 10s mega-login $muser \"$puser\" 2>&1");

                        //User or password empty ???
                        if (strpos($send_login, "Failed to Login: Invalid argument") !== false)
                        {
                            echo '<p class="error">' . $this->language->lang('VARS_WARNING_MEGA') . '</p>';
                            $close_login  = shell_exec("mega-logout 2>&1");
                            $quit_mega    = shell_exec("mega-quit 2>&1");
                            @unlink($path);
                            exit();
                        }

                        // Bad user or password ???
                        if (strpos($send_login, "Login failed: invalid email or password") !== false)
                        {
                            echo '<p class="error">' . $this->language->lang('VARS_WARNING_MEGA') . '</p>';
                            $close_login  = shell_exec("mega-logout 2>&1");
                            $quit_mega    = shell_exec("mega-quit 2>&1");
                            @unlink($path);
                            exit();
                        }

                        // Account has been temporarily suspended ????
                        if (strpos($check_login, "Your account has been temporarily suspended for your safety") !== false || strpos($send_login, "Your account has been temporarily suspended for your safety") !== false)
                        {
                            echo '<p class="error">' . $this->language->lang('SUSPENDED_ACCOUNT_MEGA') . '</p>';
                            $close_login  = shell_exec("mega-logout 2>&1");
                            $quit_mega    = shell_exec("mega-quit 2>&1");
                            @unlink($path);
                            exit();
                        }

                        // Internal error ???
                        if (strpos($send_login, "Failed to fetch nodes: Internal error") !== false)
                        {
                            echo '<p class="error">' . $this->language->lang('MEGA_INTERNAL_ERROR') . '</p>';
                            $close_login  = shell_exec("mega-logout 2>&1");
                            $quit_mega    = shell_exec("mega-quit 2>&1");
                            @unlink($path);
                            exit();
                        }

                    }

                    // Does the file exist in the MEGA account?
                    $ok_find = shell_exec("timeout --signal=HUP 10s mega-ls -r $namemega 2>&1");

                    if (strpos($ok_find, "Couldn't find") === false)
                    {
                        $link_file = shell_exec("mega-export /$namemega 2>&1");
                        $matches = $this->Get_Substrings($link_file, 'link: ', ')');

                        // Now get the MEGA link
                        if(!isset($matches[0]) || strpos($matches[0], "mega.nz") === false)
                        {
                            echo '<p class="error">' . $this->language->lang('LINK_MEGA_ERROR', $filen) . '</p>';
                            $del_file = shell_exec("mega-rm -f /$namemega 2>&1");
                            $close_login  = shell_exec("mega-logout 2>&1");
                            $quit_mega    = shell_exec("mega-quit 2>&1");
                            @unlink($path);
                            exit();
                        } else {
                            echo '<p class="error">' . $this->language->lang('FILE_WARNING_MEGA', $filen) . '</p>';
                        }
                        $link_ok = $matches[0];
                    } else {
                        // Now upload the file to MEGA
                        $upload_file = shell_exec("mega-put $tomega / 2>&1");

                        if (strpos($upload_file, "TRANSFERRING") !== false && strpos($upload_file, "Upload finished") !== false)
                        {
                            echo $this->language->lang('FILE_UP_OK_MEGA', $filen);
                            $link_file = shell_exec("mega-export -a -f /$namemega 2>&1");
                            $matches = explode('https', $link_file);

                            // Now get the MEGA link
                            if(!isset($matches[1]) || strpos($matches[1], "mega.nz") === false)
                            {
                                echo '<p class="error">' . $this->language->lang('LINK_MEGA_ERROR', $filen) . '</p>';
                                $del_file = shell_exec("mega-rm -f /$namemega 2>&1");
                                $close_login  = shell_exec("mega-logout 2>&1");
                                $quit_mega    = shell_exec("mega-quit 2>&1");
                                @unlink($path);
                                exit();
                            }
                            $link_ok = 'https' . $matches[1];
                        } else {
                            echo '<p class="error">' . $this->language->lang('LINK_ADD_ERROR', $filen) . '</p>';
                            $close_login  = shell_exec("mega-logout 2>&1");
                            $quit_mega    = shell_exec("mega-quit 2>&1");
                            @unlink($path);
                            exit();
                        }
                    }

                    $close_login  = shell_exec("mega-logout 2>&1");
                    $quit_mega    = shell_exec("mega-quit 2>&1");
                    echo $this->language->lang('LINK_FILE_MEGA');
                    echo '<input type="text" name="enlacemega" onfocus="this.select();" value="'.$link_ok.'" title="'.$this->language->lang('LINK_TITLE_MEGA').'" class="inputbox" readonly>';
                } else {
                    echo '<p class="error">' . $this->language->lang('NOT_CACH_FILE_MEGA') . '</p>';
                }
                // The temporary file is deleted
                @unlink($path);
            } else {
                echo '<p class="error">' . $this->language->lang('FILE_TO_BIG_MEGA', $filen, $fileSize, $maxsize) . '</p>';
            }
        } else {
            // No file upload message
            echo '<p class="error">' . $this->language->lang('NOT_FILE_TO_MEGA') . '</p>';
        }
        exit();
    }

    // Get Substrings of the String
    function Get_Substrings($text, $sopener, $scloser)
    {
        $result = array();
        $noresult = substr_count($text, $sopener);
        $ncresult = substr_count($text, $scloser);

        if ($noresult < $ncresult)
        {
            $nresult = $noresult;
        } else {
            $nresult = $ncresult;
        }

        unset($noresult);
        unset($ncresult);

        for ($i=0;$i<$nresult;$i++)
        {
            $pos = strpos($text, $sopener) + strlen($sopener);
            $text = substr($text, $pos, strlen($text));
            $pos = strpos($text, $scloser);
            $result[] = substr($text, 0, $pos);
            $text = substr($text, $pos + strlen($scloser), strlen($text));
        }
        return $result;
    }
}
