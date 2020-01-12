<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_ajax_responses
 *
 * @copyright   Copyright (C) 2020 - 2020 Thomas Finnern, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Ajax_responses\Site\View\Ajax_response;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;

/**
 * HTML Ajax_responses View class for the Ajax_response component
 *
 * @since  1.0.0
 */
class HtmlView extends BaseHtmlView
{
	/**
	 * The item object details
	 *
	 * @var    \JObject
	 * @since  1.0.0
	 */
	protected $item;

	/**
	 * Execute and display a template script.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise an Error object.
	 */
	public function display($tpl = null)
	{
		$this->item = $this->get('Item');

		return parent::display($tpl);
	}
}
