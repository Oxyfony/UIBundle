<?php
/**
 * This file is part of the Oxyfony UI Bundle
 *
 * (c) 2014 Oxyfony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace O2\Bundle\UIBundle\Session;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
/**
 * Flash Messages
 * 
 * @author Nicolas Claverie winfo@artscore-studio.fr>
 *
 */
class FlashMessage
{
	protected $session;
	
	public function __construct(SessionInterface $session)
	{
		$this->session = $session;
	}
	
	public function alert($message)
	{
		$this->session->getFlashBag()->add('alert', $message);
	}
	
	public function success($message)
	{
		$this->session->getFlashBag()->add('success', $message);
	}
	
	public function info($message)
	{
		$this->session->getFlashBag()->add('info', $message);
	}
	
	public function warning($message)
	{
		$this->session->getFlashBag()->add('warning', $message);
	}
	
	public function danger($message)
	{
		$this->session->getFlashBag()->add('danger', $message);
	}
	
	public function reset()
	{
		$this->session->getFlashBag()->clear();
	}
}