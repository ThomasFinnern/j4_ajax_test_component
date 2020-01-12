<?php
/**
 * @package     Ajax_Responses.Administrator
 * @subpackage  com_ajax_responses
 *
 * @copyright   Copyright (C) 2020 - 2020 Thomas Finnern, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Dispatcher\ComponentDispatcherFactoryInterface;
use Joomla\CMS\Extension\ComponentInterface;
use Joomla\CMS\Extension\Service\Provider\CategoryFactory;
use Joomla\CMS\Extension\Service\Provider\ComponentDispatcherFactory;
use Joomla\CMS\Extension\Service\Provider\MVCFactory;
use Joomla\CMS\HTML\Registry;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Component\Ajax_responses\Administrator\Extension\Ajax_responsesComponent;

/**
 * The ajax_responses service provider.
 * https://github.com/joomla/joomla-cms/pull/20217
 *
 * @since  1.0.0
 */
return new class implements ServiceProviderInterface
{
	/**
	 * Registers the service provider with a DI container.
	 *
	 * @param   Container  $container  The DI container.
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	public function register(Container $container)
	{
		$container->registerServiceProvider(new CategoryFactory('\\Joomla\\Component\\Ajax_responses'));
		$container->registerServiceProvider(new MVCFactory('\\Joomla\\Component\\Ajax_responses'));
		$container->registerServiceProvider(new ComponentDispatcherFactory('\\Joomla\\Component\\Ajax_responses'));

		$container->set(
			ComponentInterface::class,
			function (Container $container)
			{
				$component = new Ajax_responsesComponent($container->get(ComponentDispatcherFactoryInterface::class));

				$component->setRegistry($container->get(Registry::class));
				$component->setMVCFactory($container->get(MVCFactoryInterface::class));

				return $component;
			}
		);
	}
};
