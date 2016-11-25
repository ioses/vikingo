
     ,-----.,--.                  ,--. ,---.   ,--.,------.  ,------.
    '  .--./|  | ,---. ,--.,--. ,-|  || o   \  |  ||  .-.  \ |  .---'
    |  |    |  || .-. ||  ||  |' .-. |`..'  |  |  ||  |  \  :|  `--, 
    '  '--'\|  |' '-' ''  ''  '\ `-' | .'  /   |  ||  '--'  /|  `---.
     `-----'`--' `---'  `----'  `---'  `--'    `--'`-------' `------'
    ----------------------------------------------------------------- 


Hi there! Welcome to Cloud9 IDE!

To get you started, we have created a small hello world application.

1) Open the hello-world.php file

2) Follow the run instructions in the file's comments

3) If you want to look at the Apache logs, check out ~/lib/apache2/log

And that's all there is to it! Just have fun. Go ahead and edit the code, 
or add new files. It's all up to you! 

Happy coding!
The Cloud9 IDE team


## Support & Documentation

Visit http://docs.c9.io for support, or to learn more about using Cloud9 IDE. 
To watch some training videos, visit http://www.youtube.com/user/c9ide

Instalar symfony en una carpeta

composer create-project symfony/framework-standard-edition symfony/ 3.0.7

Crear bundle

php bin/console generate:bundle --namespace="BackendBundle" --format=yml

mysql-ctl start



Entity DB Traer de la base de datos

php bin/console doctrine:mapping:import BackendBundle yml   // opcional   --filter="NombreTabla"

 Generar entidad
 
 php bin/console doctrine:generate:entities BackendBundle 
 
 Update entidad
 php app/console doctrine:schema:update --force
 
 actualizar composer
 
 composer update
 
 
 
CREAR REPOSITORIO

git init

git add .

git commit -m "comentario"

git remote add origin URL repositorio

git push origin master

PARA ACTUALIZAR

git add .

git commit -m "Comentario"

git push



PARA VER LOS COMMITS