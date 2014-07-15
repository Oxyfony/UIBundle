Composants CSS et Javascipt
===========================

Après avoir installé le bundle, vous devez installé les composants CSS et JS et les inclure dans les
vues de votre projet.

Components Installer
--------------------

L'installation des composants utilisent l'installateur `développé par Rob Loach <https://github.com/RobLoach/component-installer>`_

Pour l'installer dans votre projet, ajouter les vendor requis :

.. code-block:: json

   {
      ...
       "require": {
            ...
            "robloach/component-installer": "dev-master"
       }
       ...
   }
   
Et configurer le pour installer les composants dans le dossier web/components :

.. code-block:: json

   {
       ...
       "config": {
         ...
         "component-dir": "web/components"
         ...
       },
       ...
   }
   
Puis exécuter la commande de mise à jour :

.. code-block:: bash

   $ php composer.phar update robloach/component-installer
   
Installer LESS, jQuery et Bootstrap
-----------------------------------

jQuery et Bootstrap Components
++++++++++++++++++++++++++++++

Ajouter jQuery et Bootstrap Components dans composer.json 

.. code-block:: json

   {
      ...
       "require": {
            ...
            "components/jquery": "~1.11@stable",
            "components/bootstrap": "~3.1@stable",
       }
       ...
   }

Puis installer la commande de mise à jour :

.. code-block:: bash

   $ php composer.phar update components/jquery components/bootstrap
   
Configurer LESS
+++++++++++++++

Nous utilisons directement la version originale de LESS au lieu d'une bibliothèque PHP.

Nous le déclarons dans la configuration de l'application :

.. code-block:: yaml

   # app/config/config.yml
   assetic:
      filters:
         less:
            node: /usr/local/bin/node
            node_paths: [/usr/local/lib/node_modules]
            apply_to: "\.less$"
            
Intégrer jQuery et Bootstrap dans votre vue
-------------------------------------------

Intégration sans personnalisation
+++++++++++++++++++++++++++++++++

Dans votre vue, ajouter les ressources javascript :

.. code-block:: html+jinja
   
   {% javascripts
      'components/jquery/jquery.js'
      'components/bootstrap/js/bootstrap.js'
   %}
   <script src="{{ asset_url }}"></script>
   {% endjavascripts %}
   
Nous vous conseillons pour des raisons de performance, d'inclure bootstrap dans le pied de page et jquery en entête.
   
Puis les ressources CSS :

.. code-block:: html+jinja
   
   {% stylesheets filter='less,cssrewrite'
      'components/bootstrap/less/bootstrap.less'
    %}
    <link rel="stylesheet" href="{{ asset_url }}" />
   {% endstylesheets %}

Personnaliser Boostrap
++++++++++++++++++++++

Pour générer la feuille de style bootstrap en la personnalisation, il y a deux fichiers clés :

* variables.less qui contient les variables utilisées pour générer les différents composants graphiques
* bootstrap.less qui importe l'ensemble des fichiers .less que l'on souhaite utiliser dans ses vues.

*Inclure qu'une partie de Bootstrap*

Dans les ressources de votre application ou d'un bundle, créer le fichier app.less

En vous inspirant du fichier bootstrap.less de base vous pouvez par exemple n'inclure que le core de boostrap :

.. code-block::

   // src/app/Resources/public/bootstrap/app.less
   
   @path:          "../../../../web/components/bootstrap/less/";
   @import "@{path}variables.less";
   
   // Core variables and mixins
   @import "@{path}mixins.less";
   
   // Reset and dependencies
   @import "@{path}normalize.less";
   @import "@{path}print.less";
   @import "@{path}glyphicons.less";
   
   // Core CSS
   @import "@{path}scaffolding.less";
   @import "@{path}type.less";
   @import "@{path}code.less";
   @import "@{path}grid.less";
   @import "@{path}tables.less";
   @import "@{path}forms.less";
   @import "@{path}buttons.less";
   
   // Utility classes
   @import "@{path}utilities.less";
   @import "@{path}responsive-utilities.less";
   
@path est le chemin dans le dossier web où bootstrap est installé.

Ensuite si par exemple, vous souhaitez une taille de police par défaut de 12px, créer
un fichier app.variables.less :

.. code-block::

   // src/app/Resources/public/boostrap/app.variables.less
   
   //
   // Variables
   // --------------------------------------------------
   
   //== Typography
   @font-size-base:          12px;
   
Puis l'inclure dans votre fichier app.less après le variables.less par défaut :

.. code-block::

   // src/app/Resources/public/boostrap/app.less
   
   ... 
   @import "@{path}variables.less";
   ...
   @import "app.variables.less";
   ...

Pour connaitre toutes les variables, consulter le fichier variables.less de base de bootstrap.

Puis dans la vue de votre application vous n'avez plus qu'à utiliser app.less :

.. code-block:: html+jinja
   
   {% stylesheets filter='less,cssrewrite'
      '%kernel.root_dir%/Resources/public/bootstrap/app.less'
    %}
    <link rel="stylesheet" href="{{ asset_url }}" />
   {% endstylesheets %}


