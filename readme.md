# Local Development

`/Applications/MAMP/conf/apache/extra/httpd-vhosts.conf`

```
<VirtualHost *:80>
    ServerAdmin amy@pork-chop.org
    DocumentRoot "/Users/adalrymple/Sites/amydalrymple.dev/skeins/" 
    ServerName skeins.dev
    ServerAlias www.skeins.dev

    <Directory "/Users/adalrymple/Sites/amydalrymple.dev/skeins/">
        Options All
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>
```