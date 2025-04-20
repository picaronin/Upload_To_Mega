<?php
/**
 *
 * Upload To Mega extension for the phpBB >=3.3.9 Forum Software package.
 *
 * @copyright (c) 2025 Picaron
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace pikaron\uploadtomega\migrations;

class uploadtomega_3_3_1 extends \phpbb\db\migration\migration
{
    static public function depends_on()
    {
        return array(
            '\pikaron\uploadtomega\migrations\uploadtomega_3_3_0',
        );
    }

    public function update_data()
    {
        global $request;
        return array(
            array('config.update', array('version_uploadtomega', '3.3.1')),
            array('config.update', array('uploadtomega_file_size', 20)),
        );
    }
}
