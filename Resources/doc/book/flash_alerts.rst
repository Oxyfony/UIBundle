Flash Alerts
============

Les alertes flashs sont des messages à enregistrer des messages d'information à afficher
une seule fois à l'utilisateur. 

Il existe 4 types de message : erreurs, warning, succès, information.

Utilisation de base
-------------------

Pour enregistrer un message :

.. code-block:: php
   
   <?php
   
   $this->container->get('o2_ui.alerts')->addError("My error");
   $this->container->get('o2_ui.alerts')->addNotice("My error");
   $this->container->get('o2_ui.alerts')->addWarning("My error");
   $this->container->get('o2_ui.alerts')->addInfo("My error");

Pour afficher les messages flashs dans votre vue, vous appelez la fonction twig suivante :

.. code-block:: html+jinja

   {{ o2_flash_alerts() }}
   
Utiliser globalement dans votre application
-------------------------------------------

Nous vous conseillons d'utiliser la fonction twig au sein du ou des layouts principaux de votre application
pour garantir leur affichage à l'internaute quelque soit ses actions.

Vous pourriez avoir ce layout :

.. code-block:: html+jinja

   {# YourBundle::layout.html.twig #}
   <!DOCTYPE html>
   <html lang="fr">
      <head>
         <!-- -->
      </head>
      <body>
         <!-- Header --><!-- /Header -->
         <!-- Nav --><!-- /Nav -->
         {{ o2_flash_alerts() }}
         <!-- Content -->
         {% block mybundle_content %}
         {% endblock %}
         <!-- /Content -->
         <!-- Footer --><!-- /Footer -->
      </body>
   </html>
      
Puis vous l'utilisez pour afficher le résultat de chaque action :

.. code-block:: html+jinja

   {# YourBundle:Default:hello.html.twig #}
   {% extends 'YourBundle::layout.html.twig' %}
   
   {% block mybundle_content %}
   Hello Peter
   {% endblock %}

Si une alerte flash a été enregistré alors elle sera affichée une seule fois.
