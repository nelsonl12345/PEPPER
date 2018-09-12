Dependencias
===============

- Instalación de dependencias
```bash
composer install en la misma carpet DONDE ESTA EL ARCHIVO COMPOSER.JSON 
```

- Modificar parameter.yml

- Generacion de PDF
```bash
sudo apt-get install wkhtmltopdf
```

- Agregar tarea a crontab
```bash
crontab -e

sudo service cron reload
```

- Producción
Todos los dias a la 1am
0 1 * * * php [base_path]/app/console pepper:radicados:estado >> /dev/null 2>&1

- Desarrollo
php app/console pepper:radicados:estado
* * * * * php [base_path]/app/console pepper:radicados:estado >> [base_path]/cron.log


