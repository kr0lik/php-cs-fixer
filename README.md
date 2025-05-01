# php-cs-fixer

A tool to automatically fix PHP Coding Standards

# Installation

Run

```
composer require --dev kr0lik/php-cs-fixer
```

Copy rules:

    cp ./vendor/kr0lik/php-cs-fixer/.php_cs.dist ./



More info: https://github.com/FriendsOfPHP/PHP-CS-Fixer

## Develop:

docker pull composer:2.2.20

docker run -v .:/app --rm composer:2.2.20 composer install

docker run -v .:/app --rm composer:2.2.20 vendor/bin/php-cs-fixer fix

docker run -v .:/app --rm composer:2.2.20 vendor/bin/phpunit tests
