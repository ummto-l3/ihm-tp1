Source : https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-20-04

`sudo mkdir /var/www/your_domain`
 
Next, assign ownership of the directory with the $USER environment variable, which will reference your current system user:

`sudo chown -R $USER:$USER /var/www/your_domain`
 
Then, open a new configuration file in Apache’s sites-available directory using your preferred command-line editor. Here, we’ll use nano:

`sudo nano /etc/apache2/sites-available/your_domain.conf`
 
This will create a new blank file. Paste in the following bare-bones configuration:

`/etc/apache2/sites-available/your_domain.conf`

```
<VirtualHost *:80>
    ServerName your_domain
    ServerAlias www.your_domain
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/your_domain
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
 ```
Save and close the file when you’re done. If you’re using nano, you can do that by pressing CTRL+X, then Y and ENTER.

With this VirtualHost configuration, we’re telling Apache to serve `your_domain` using `/var/www/your_domain` as the web root directory. If you’d like to test Apache without a domain name, you can remove or comment out the options `ServerName` and `ServerAlias` by adding a `#` character in the beginning of each option’s lines.

You can now use `a2ensite` to enable the new virtual host:

`sudo a2ensite your_domain`
 
You might want to disable the default website that comes installed with Apache. This is required if you’re not using a custom domain name, because in this case Apache’s default configuration would overwrite your virtual host. To disable Apache’s default website, type:

`sudo a2dissite 000-default`
 
To make sure your configuration file doesn’t contain syntax errors, run:

`sudo apache2ctl configtest`
 
Finally, reload Apache so these changes take effect:

`sudo systemctl reload apache2`
 
Your new website is now active, but the web root `/var/www/your_domain` is still empty. Create an `index.html` file in that location so that we can test that the virtual host works as expected:

`nano /var/www/your_domain/index.html`