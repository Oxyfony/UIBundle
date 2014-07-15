Installer une librairie GitHub comme un composant
=================================================

De nombreuses librairies CSS ou javascript ne sont pas packagées comme un composant installable avec Composer Installer.

Pour cela vous devez déclarer le dépôt GitHub comme un composant dans le fichier composer.json de votre application.
Prenons un exemple avec l'installation de `necolas/normalize <https://github.com/necolas/normalize.css.git>`_

Déclarer le dépôt GitHub dans composer.json :

.. code-block:: json

   ...
   "repositories": [
        {
            "type": "package",
            "package": {
                "name": "necolas/normalize.css",
                "type": "component",
                "version": "3.0",
                "source": {
                    "url": "https://github.com/necolas/normalize.css.git",
                    "type": "git",
                    "reference": "3.0.1"
                },
                "extra": {
                    "component": {
                        "files": [
                            "normalize.css"
                        ]
                    }
                },
                "require": {
                    "robloach/component-installer": "*"
                }
            }
        }
    ],
    ...
    
Voici quelques explications sur son paramétrage :

* package.version : c'est le n° de version que vous donnez au sein de votre application et qui est à utiliser dans
le require de composer.json
* package.source.reference : c'est la branche ou le tag à utiliser au sein du dépôt
* package.extra.component.files : si vous ne souhaitez installer que quelques fichiers du dépôt, vous les préciser ici

Puis vous ajouter dans *require* de composer.json la ligne suivante :

.. code-block:: json

   {
      ...
       "require": {
            ...
            "necolas/normalize.css": "3.*"
       }
       ...
   }
   
Enfin vous mettez à jour cette nouvelle dépendance :

.. code-block:: bash

   $ php composer.phar update necolas/normalize.css
