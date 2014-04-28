<?php
/**
 * This file is part of the Oxyfony UI Bundle
 *
 * (c) 2014 Oxyfony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace O2\Bundle\UIBundle\Twig\Extension;

/**
 * Manage and disply flash messages
 *
 * @author Laurent Chedanne <laurent@chedanne.pro>
 *
 */
class FlashAlertsExtension extends \Twig_Extension {
	
	protected $session;
	/**
	 * @var \Twig_Environment
	 */
	protected $environment;
	
	public function __construct($session) {
		$this->session = $session;
	}
	
	public function initRuntime(\Twig_Environment $environment)
	{
		$this->environment = $environment;
	}
	
	/**
	 * Déclaration des fonctions étendant Twig
	 *
	 * @see Twig_Extension::getFunctions()
	 */
	public function getFunctions() {
		return array(
				'o2_flash_alerts'          => new \Twig_Function_Method($this, 'flashMessages', array('is_safe' => array('html'))),
		);
	}
	
	/**
	 * Retourne le nom de l'extension
	 *
	 * @see Twig_ExtensionInterface::getName()
	 */
	public function getName()
	{
		return 'oxygen_framework_flash_messages';
	}
	
	public function addError($message) {
		$this->session->getFlashBag()->add('danger', $message);
	}
	
	public function addWarning($message) {
		$this->session->getFlashBag()->add('warning', $message);
	}
	
	public function addSuccess($message) {
		$this->session->getFlashBag()->add('success', $message);
	}
	
	public function addInfo($message) {
		$this->session->getFlashBag()->add('info', $message);
	}
	
	/**
	 * Return HTML of flash messages according to flash_alerts.html.twig
	 *
	 * @param array $options
	 * 	- button_close : display a close button
	 * 	- trans_domain set the domain for translation
	 * @return string
	 */
	public function flashMessages(array $options = array()) {
		$params = array_merge(array(
			'button_close' => true, 'trans_domain' => null
		), $options);
		
		$template = $this->environment->loadTemplate('O2UIBundle::flashalerts_template.html.twig');
		return $template->renderBlock('flash_messages', array_merge($this->environment->getGlobals(), $params));
	}
	
}