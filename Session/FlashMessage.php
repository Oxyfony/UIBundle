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