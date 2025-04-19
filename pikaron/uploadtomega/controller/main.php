<?php
/**
 *
 * Upload To Mega extension for the phpBB >=3.3.9 Forum Software package.
 *
 * @copyright (c) 2025 Picaron
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace pikaron\uploadtomega\controller;

class main
{
    /** @var \pikaron\uploadtomega\core\uploadtomega_input_upload */
    protected $uploadtomega_input_upload;

    /** @var \phpbb\language\language */
    protected $language;

    /** @var \phpbb\request\request */
    protected $request;


    /**
    * Constructor
    *
    * @var \pikaron\uploadtomega\core\uploadtomega_input_upload     $uploadtomega_input_upload
    * @param \phpbb\language\language                               $language
    * @param \phpbb\request\request                                 $request
    *
    */
    public function __construct(
        \pikaron\uploadtomega\core\uploadtomega_input_upload $uploadtomega_input_upload,
        \phpbb\language\language $language,
        \phpbb\request\request $request
    )
    {
        $this->uploadtomega_input_upload    = $uploadtomega_input_upload;
        $this->language                     = $language;
        $this->request                      = $request;
    }

    public function handle_uploadtomega()
    {
        $mode = $this->request->variable('mode', '');

        if (!$mode)
        {
            trigger_error($this->language->lang('MEGA_INTERNAL_ERROR'), E_USER_WARNING);
        }

        switch ($mode)
        {
            case 'upload':
                $this->uploadtomega_input_upload->main();
            break;
        }
    }
}
