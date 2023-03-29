# important Setup

create a config folder and add a config.php file inside and enter the code below to set up your local configurations

```php
<?php
define('DEV', true);                       // In development or live? Development = true | Live = false
define('DOMAIN', 'http://localhost'); // Domain (used to create links in emails)
define('ROOT_FOLDER', 'public_html');           // Name of document root folder (e.g. public, content, htdocs)

// DOC_ROOT is created because the download code has several versions of the sample site
// On a live site a single forward slash / would indicate the document root folder
$this_folder   = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']));
$parent_folder = dirname($this_folder);
define("DOC_ROOT", $parent_folder . DIRECTORY_SEPARATOR . ROOT_FOLDER . DIRECTORY_SEPARATOR);

// database on development
define("DBHOST", "");
define("DBUSER", "");
define("DBPASS", "");
define("DBNAME", "");


// SMTP server settings
$email_config = [
 'server'      => 'smtp.gmail.com',
 'port'        => '587',
 'username'    => '',
 'password'    => '',
 'security'    => '',
 'admin_email' => '',
 'debug'       => (DEV) ? 2 : 0,
];

// File upload settings
define('MEDIA_TYPES', ['image/jpeg', 'image/png', 'image/gif',]); // Allowed file types
define('FILE_EXTENSIONS', ['jpeg', 'jpg', 'png', 'gif',]);       // Allowed file extensions
define('MAX_SIZE', '5242880');                                    // Max file size
// DO NOT EDIT:
define('UPLOADS', dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . ROOT_FOLDER . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR); // Image upload folder
```

Add an images folder inside public_html and add your personal images to fill images with missing links on the website
