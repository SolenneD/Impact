IMPACT
==

Lancer XAMP, WAMP ou MAMP

Si composer n'est pas installé
-

`$ curl -sS https://getcomposer.org/installer | php`


Si le composer est installé
-

**Cloner le git**

`git clone https://github.com/SolenneD/Impact.git`

**Installer les bundles**

`$ composer install` (Windows)

`$ php composer.phar install` (Mac)

**Création de la base de données**

`$ php bin/console doctrine:database:create`

**Mettre à jour la structure de la base de données**

`$ php bin/console doctrine:schema:update --force`

**Créer des fixtures pour remplir la base de données**

`$ php bin/console doctrine:fixtures:load`

**Lancer le serveur**

`$ php bin/console server:start`

**A ajouter dans le .env**
###> symfony/swiftmailer-bundle ###
# For Gmail as a transport, use: "gmail://username:password@localhost"
# For a generic SMTP server, use: "smtp://localhost:25?encryption=&auth_mode="
# Delivery is disabled by default via "null://localhost"
MAILER_URL=gmail://impactiesa:b3deviesa@localhost
###< symfony/swiftmailer-bundle ###