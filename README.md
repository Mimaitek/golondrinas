Para ejecutarlo

Copiar 001-genios-del-marketing.conf a /etc/apache2/sites-available/

y modificar ServerName, DocumentRoot y Directory 

        ServerName genios-del-marketing.diamobile.com
        DocumentRoot /var/www/golondrinas
        <Directory /var/www/golondrinas>
                Options Indexes FollowSymLinks
                AllowOverride All
                Require all granted
        </Directory>

Después hay que copiar conexion.example.php a conexion.php y modificar los datos del servidor

Después hay que crear la base de datos proyecto e importar desde phpmyadmin el fichero inicial.sql que cargará la estructura de tablas.

