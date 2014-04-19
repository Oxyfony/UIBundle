<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2014 Oxyfony
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
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
	 * @var \Twig_Environment
	 */
	protected $twig;
	
	/**
	 * @var \Twig_Template
	 */
	protected $template;
	
	/**
	 * @param \Twig_Environment $twig
	 */
	public function __construct(\Twig_Environment $twig, $template_path)
	{
		$this->twig = $twig;
		$this->template	= $this->twig->loadTemplate($template_path);
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
		return $this->template->renderBlock('badge', array('text' => $text));
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
		return $this->template->renderBlock('alert', array('text' => $text, 'type' => $type));
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
		return $this->template->renderBlock('label', array('text' => $text, 'type' => $type));
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