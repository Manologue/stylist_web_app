<?php

use StylistCommerce\CMS\Session;

is_admin(Session::action()->role);                                // Check if admin













include APP_ROOT . '/templates/admin/blog.php';
