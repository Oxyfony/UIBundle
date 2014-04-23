<?php
/**
 * This file is part of the Oxyfony UI Bundle
 *
 * (c) 2014 Oxyfony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace O2\Bundle\UIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Oxygen UI Bundle Twitter Bootstrap Theming Test Display Controller
 * 
 * @author Nicolas Claverie <info@artscore-studio.fr>
 *
 */
class ThemingController extends Controller
{
	/**
	 * Components Test Display  
	 */
	public function componentThemingAction()
	{
		$this->get('o2_ui.flash_message')->info('This is a flash message');
		return $this->render('O2UIBundle:Theming:component_theming.html.twig', array());
	}
	
	/**
	 * Forms Theming Test Display
	 */
    public function formThemingAction()
    {
    	$form = $this->createFormBuilder()
    		
    		// Text field Types
	    	->add('text', 'text', array('label' => 'Text'))
	    	->add('textarea', 'textarea', array('label' => 'Textarea'))
	    	->add('email', 'email', array('label' => 'Email'))
	    	->add('number', 'integer', array('label' => 'Integer'))
	    	->add('money', 'money', array('label' => 'Money'))
	    	->add('number', 'number', array('label' => 'Number'))
	    	->add('password', 'password', array('label' => 'Password'))
	    	->add('percent', 'percent', array('label' => 'Percent'))
	    	->add('search', 'search', array('label' => 'Search'))
	    	->add('url', 'url', array('label' => 'Url'))
	    	
	    	// Choice field Types 
	    	->add('choice1', 'choice', array(
	    		'label' => 'Liste',
	    		'choices' => array('choice01' => 'Choice 01', 'choice02' => 'Choice 02')
	    	))

	    	->add('choice2', 'choice', array(
    			'label' => 'Liste avec attribut multiple',
    			'choices' => array('choice01' => 'Choice 01', 'choice02' => 'Choice 02'),
	    		'multiple' => true
	    	))
	    	->add('choice3', 'choice', array(
	    			'label' => 'Bouton radio',
	    			'choices' => array('choice01' => 'Choice 01', 'choice02' => 'Choice 02'),
	    			'multiple' => false,
	    			'expanded' => true
	    	))
	    	->add('choice4', 'choice', array(
	    			'label' => 'Case à cocher',
	    			'choices' => array('choice01' => 'Choice 01', 'choice02' => 'Choice 02'),
	    			'multiple' => true,
	    			'expanded' => true
	    	))
	    	
	    	->add('country', 'country', array(
	    			'label' => 'Pays'
	    	))
	    	
	    	->add('language', 'language', array(
	    		'label' => 'Langue'
	    	))
	    	
	    	->add('locale', 'locale', array(
	    		'label' => 'Locale'
	    	))
	    	
	    	->add('timezone', 'timezone', array(
	    		'label' => 'Timezone'
	    	))
	    	
	    	->add('currency', 'currency', array(
	    		'label' => 'Currency'
	    	))

	    	
	    	// Date and time field types
	    	->add('date', 'date', array(
	    		'label' => 'Date'
	    	))
	    	
	    	->add('datetime', 'datetime', array(
	    		'label' => 'DateTime'
	    	))
	    	
	    	->add('time', 'time', array(
	    		'label' => 'Time'
	    	))
	    	
	    	->add('birthday', 'birthday', array(
	    		'label' => 'Birthday'
	    	))
	    	
	    	// Other field Type
	    	->add('file', 'file', array(
	    		'label' => 'File'
	    	))
	    	
	    	// Group field types
	    	->add('collection', 'collection', array(
	    		'label' => 'Collection',
	    		'prototype' => true,
	    		'allow_add' => true,
	    		'type' => 'text',
	    		'options' => array(
	    			'required' => false,
	    			'attr' => array('class' => 'text-box')
	    		)
	    	))
	    	
	    	->add('repeated', 'repeated', array(
	    		'first_options' => array('label' => 'Mot de passe'),
	    		'second_options' => array('label' => 'Retape ton mot de passe')
	    	))
	    	
	    	// Buttons Field Types
	    	->add('submit', 'submit', array(
	    		'label' => 'Save'
	    	))
	    	
	    	->getForm();
    	
    	return $this->render('O2UIBundle:Theming:form_theming.html.twig', array('form' => $form->createView()));
    }
}
