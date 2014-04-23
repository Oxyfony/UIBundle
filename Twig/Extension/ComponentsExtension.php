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
 * Oxygen UI Bundle Twig Badge Extension
 *
 * @author Nicolas Claverie <info@artscore-studio.fr>
 *
 */
class ComponentsExtension extends \Twig_Extension
{
	/**
	 * @var string
	 */
	protected $templatePath;
	
	/**
	 * @var \Twig_Environment
	 */
	protected $twig;
	
	public function __construct(\Twig_Environment $twig, $template_path)
	{
		$this->twig = $twig;
		$this->templatePath = $template_path;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Twig_Extension::getFunctions()
	 */
	public function getFunctions()
	{
		$options = array('pre_escape' => 'html', 'is_safe' => array('html'));
		
		return array(
			'o2_badge' => new \Twig_Function_Method($this, 'badgeFunction', $options),
			'o2_alert' => new \Twig_Function_Method($this, 'alertFunction', $options),
			'o2_label' => new \Twig_Function_Method($this, 'labelFunction', $options)
		);
	}
	
	/**
	 * Displaying labels
	 * 
	 * @param string $text Text to display
	 * @return string
	 */
	public function badgeFunction($text)
	{
		$template = $this->twig->loadTemplate($this->templatePath);
		return $template->renderBlock('badge', array('text' => $text));
	}
	
	/**
	 * Displaying alerts
	 *
	 * @param string $text Text to display
	 * @param string $type type of alert (succes, error, etc.)
	 * @return string
	 */
	public function alertFunction($text, $type = 'default')
	{
		$template = $this->twig->loadTemplate($this->templatePath);
		return $template->renderBlock('alert', array('text' => $text, 'type' => $type));
	}
	
	/**
	 * Displaying labels
	 *
	 * @param string $text Text to display
	 * @param string $type Type of label (default, success, etc.)
	 * @return string
	 */
	public function labelFunction($text, $type = 'default')
	{
		$template = $this->twig->loadTemplate($this->templatePath);
		return $template->renderBlock('label', array('text' => $text, 'type' => $type));
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Twig_ExtensionInterface::getName()
	 */
	public function getName()
	{
		return 'o2_ui_components_extension';
	}
}