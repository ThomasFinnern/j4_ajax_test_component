<?php
/**
 * @package     Ajax_Responses.Administrator
 * @subpackage  com_ajax_responses
 *
 * @copyright   Copyright (C) 2020 - 2020 Thomas Finnern, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Ajax_responses\Administrator\View\Ajax_response;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;

/**
 * View to edit a ajax_response.
 *
 * @since  1.0
 */
class HtmlView extends BaseHtmlView
{
	/**
	 * The \JForm object
	 *
	 * @var  \JForm
	 */
	protected $form;

	/**
	 * The active item
	 *
	 * @var  object
	 */
	protected $item;

	/**
	 * Display the view.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise an Error object.
	 */
	public function display($tpl = null)
	{
		$this->item = $this->get('Item');

		$this->addToolbar();

		return parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	protected function addToolbar()
	{
		Factory::getApplication()->input->set('hidemainmenu', true);

		$isNew = ($this->item->id == 0);

		ToolbarHelper::title($isNew ? Text::_('COM_AJAX_RESPONSES_MANAGER__NEW') : Text::_('COM_AJAX_RESPONSES_MANAGER__EDIT'), 'address ajax_response');

		ToolbarHelper::apply('ajax_response.apply');
		ToolbarHelper::cancel('ajax_response.cancel', 'JTOOLBAR_CLOSE');
	}
}
