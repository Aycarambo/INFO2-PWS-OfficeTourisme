# Démarrage de la stack

docker-compose up --build -d

docker exec -it iut-php bash

cd projet

composer install

php bin/console d:m:m

php bin/console d:fix:load
>yes

# Pour push dans une branche spécifique :
git checkout -B nomBranche

git status

git add .

git commit

git push -u origin nomBranche

git push -u origin nomBranche

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

# Logins :
## Responsable
valentin@yahoo.fr:mdpval

## Conseiller
theotimeo@free.fr:mdpmdp

