# Vote Citoyen

Code source du site web [vote-citoyen.fr](https://www.vote-citoyen.fr).

# Pré-requis

- PHP 7.2
- MySQL 5.7
- OpenSSL, BCMath, PDO, Mbstring, Tokenizer, XML, Ctype, JSON PHP Extensions
- Composer
- Node.js

# Installation

```
git clone git@github.com:MarceauKa/vote-citoyen.git && cd vote-citoyen/
cp .env.example .env # and configure it
composer install
php artisan key:generate
npm install
npm run dev # or `prod`
php artisan migrate:fresh --seed
```

## Utilisateur par défaut

- Email : `admin@vote-citoyen.fr`
- Pass : `secret`

# Tests

`vendor/bin/phpunit`

# Licence

Ce code source est distribué sous [licence GNU General Public License v3.0](https://choosealicense.com/licenses/gpl-3.0/#).