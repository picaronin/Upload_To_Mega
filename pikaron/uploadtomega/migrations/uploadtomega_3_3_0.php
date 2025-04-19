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

class uploadtomega_3_3_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return !empty($this->config['version_uploadtomega']);
	}

	public function update_data()
	{
		return array(
			// Add config
			array('config.add', array('version_uploadtomega', '3.3.0')),
			array('config.add', array('uploadtomega_user', '')),
			array('config.add', array('uploadtomega_pass', '')),
			array('config.add', array('uploadtomega_file_size', 10)),
		);
	}

	public function revert_data()
	{
		return array(
			// Delete config
			array('config.remove', array('version_uploadtomega')),
			array('config.remove', array('uploadtomega_user')),
			array('config.remove', array('uploadtomega_pass')),
			array('config.remove', array('uploadtomega_file_size')),
		);
	}
}
