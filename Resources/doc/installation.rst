Installation
============

Prerequisites
-------------
This version of the bundle requires Symfony 2.3+.

Translation
-----------
If you wish to use default texts provided in this bundle, you have to make sure you have translator enabled in your config.

.. code-block:: yaml

   # app/config/config.yml
   
   framework:
       translator: ~

For more information about translations, check `Symfony documentation <http://symfony.com/doc/current/book/translation.html>`_.

Installation
------------

Installation steps :

1. Download O2UIBundle using composer.
2. Enable the bundle.

Step 1 : Download O2UIBundle using composer
+++++++++++++++++++++++++++++++++++++++++++

Add O2UIBundle in your composer.json :

.. code-block:: json

   {
       "require": {
           "oxyfony/ui-bundle": "dev-master"
       }
   }
   
Now tell composer to download the bundle by running the command :
   
.. code-block:: bash

   $ php composer.phar update oxyfony/ui-bundle
   
A different way is to add it drectly with the command line below :

.. code-block:: bash

   $ cd /path/to/application
   $ php composer.phar require oxyfony/ui-bundle
   
Composer will install the bundle to your project's vendor/oxyfony directory.

Step 2 : Enable the bundle
++++++++++++++++++++++++++

Enable the bundle in the kernel :

.. code-block:: php

   // app/AppKernel.php
   
   public function registerBUndles()
   {
       $bundles = array(
           new O2\Bundle\UIBundle\O2UIBundle(),
       );
   }
   
Add CSS and JS compenents for your project
------------------------------------------

After the installation of the bundle in your project, you have to donwload and install CSS or JS files according to the 
`Symfony Good Practices Guide <http://symfony.com/en/doc/current/cookbook/bundles/best_practices.html#vendors>`_.