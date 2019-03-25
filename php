apt install apt-transport-https lsb-release ca-certificates
wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list
apt update

#Install PhpVersion
php=php7.2

#DisablePhp
dphp=php7.0

#php
apt install $php
apt install $php $php-cli $php-common $php-json $php-opcache $php-mysql $php-zip $php-fpm $php-mbstring

#Disable php 7.0

a2dismod $dphp
#systemctl restart apache2

#Enable php 7.2

a2enmod $php
apachectl -t
systemctl restart apache2

#Let’s create a phpinfo file
#nano /var/www/html/phpinfo.php
#Append the following lines to the file, then save and exit nano

cat <<EOF > /var/www/html/phpinfo.php
<?php
phpinfo();
?>
EOF

wget localhost

echo "Now, open http://your_ip/phpinfo.php on your preferred web browser and you will see that apache is now using $php"
