Dependencias
===============

composer install

wkhtmltopdf

crontab -e

Producción
Todos los dias a la 1am
0 1 * * * php [base_path]/app/console pepper:radicados:estado >> /dev/null 2>&1

Desarrollo
* * * * * php [base_path]/app/console pepper:radicados:estado >> [base_path]/cron.log

sudo service cron reload
