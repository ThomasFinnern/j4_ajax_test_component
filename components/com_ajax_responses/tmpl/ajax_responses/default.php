<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_ajax_responses
 *
 * @copyright   Copyright (C) 2020 - 2020 Thomas Finnern, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

if ($this->get('State')->get('params')->get('show_ajax_response_name_label')) {
	echo Text::_('COM_AJAX_RESPONSES_NAME') . $this->item->name;
} else {
	echo $this->item->name;
}

