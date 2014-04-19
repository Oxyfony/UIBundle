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
namespace O2\Bundle\UIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Oxygen UI Bundle Twitter Bootstrap Theming Test Display Controller
 * 
 * @author Nicolas Claverie <info@artscore-studio.fr>
 *
 */
class TwbsThemingController extends Controller
{
	/**
	 * Twitter Bootstrap Component Test Display  
	 */
	public function componentThemingAction()
	{
		$this->get('o2_ui.flash_message')->info('This is a flash message');
		return $this->render('O2UIBundle:TwbsTheming:component_theming.html.twig', array());
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
    	
    	return $this->render('O2UIBundle:TwbsTheming:form_theming.html.twig', array('form' => $form->createView()));
    }
}
