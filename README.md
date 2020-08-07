# Génération des urls de connexion QantisAchat

## En php via Composer

Installer le package 'qantis/url-generator' : `composer require qantis/url-generator`

```
<?php

use Qantis\Tools\UrlGenerator;

include __DIR__.'/vendor/autoload.php';

$urlGenerator = new UrlGenerator('ma_clé_secrete');
$url = $urlGenerator('test@example.com');
echo $url;
```

## Algorithme général
La base de l'url est `https://achat.qantis.co/connexion/`
Les parametres requis : 
- `email` qui correspond à l'email de l'utilisateur à connecter
- `timestamp` en secondes
- `hash` qui est calcul : 
  - Concatener email, timestamp et la clé
  - Hasher le résultat avec SHA256
  - Convertir le hash en base-64
  
## Récupérer la clé secrete
Vous devez demander à votre interlocuteur chez Qantis pour obtenir votre clé.
