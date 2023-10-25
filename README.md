# Génération des urls de connexion des plateformes et marketplace Qantis

## En php via Composer

Installer le package 'qantis/url-generator' : `composer require qantis/url-generator`

### Plateformes Qantis

```
<?php

use Qantis\Tools\UrlGenerator;

include __DIR__.'/vendor/autoload.php';

$urlGenerator = new UrlGenerator('ma_clé_secrete');
$url = $urlGenerator('test@example.com');
echo $url;
// renvoit /connexion/?email=test@example.com&timestamp=111111&hash=xxxxxx
```

#### Marketplace Qantis

```
<?php

use Qantis\Tools\MkpUrlGenerator;

include __DIR__.'/vendor/autoload.php';

$urlGenerator = new MkpUrlGenerator('ma_clé_secrete');
$url = $urlGenerator('test@example.com');
echo $url;

// renvoit /login/auto-login/?email=test@example.com&timestamp=111111&hash=xxxxxx
```

- Faire un appel GET sur l'url généré, en retour est envoyé une url sur laquelle rediriger l'utilisateur pour qu'il soit automatiquement connecté à la marketplace

## Algorithme général

Les parametres requis :

- `email` qui correspond à l'email de l'utilisateur à connecter
- `timestamp` en secondes
- `hash` qui est calcul :
  - Concatener email, timestamp et la clé
  - Hasher le résultat avec SHA256
  - Convertir le hash en base-64

## Récupérer la clé secrete

Vous devez demander à votre interlocuteur chez Qantis pour obtenir votre clé.
