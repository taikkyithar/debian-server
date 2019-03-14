apt install apt-transport-https lsb-release ca-certificates
wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list
apt update

#php 7.1
apt install php7.1

#php 7.2
apt install php7.2
apt install php7.2 php7.2-cli php7.2-common php7.2-json php7.2-opcache php7.2-mysql php7.2-zip php7.2-fpm php7.2-mbstring

#php 7.3
apt install php 7.3

Disable php 7.0

a2dismod php7.0
systemctl restart apache2

Enable php 7.2

a2enmod php7.2
systemctl restart apache2

Let’s create a phpinfo file

nano /var/www/html/phpinfo.php

Append the following lines to the file, then save and exit nano

<?php
phpinfo();
?>

Now, open http://your_ip/phpinfo.php on your preferred web browser and you will see that apache is now using PHP 7.2
