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