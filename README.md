# Démarrage de la stack

docker-compose up --build -d

docker exec -it iut-php bash

cd projet

composer install

php bin/console d:m:m

php bin/console d:fix:load
>yes


# Utilisation User
## Dans template :
```twig
{% if is_granted('IS_AUTHENTICATED_FULLY') %}
    <p>Email: {{ app.user.email }}</p>
{% endif %}
```

## Dans controller :
```php
$user = $this->getUser();
$mail = $user->getEmail();
```