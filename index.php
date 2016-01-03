<?php
set_include_path(get_include_path()
					.PATH_SEPARATOR.'application/controllers'
					.PATH_SEPARATOR.'application/models'
					.PATH_SEPARATOR.'application/views'
                    .PATH_SEPARATOR.'application'
                    .PATH_SEPARATOR.'libs');

define('USER_DEFAULT_FILE', 'user_default.php');
define('USER_ROLE_FILE', 'user_role.php');
define('USER_LIST_FILE', 'user_list.php');
define('USER_ADD_FILE', 'user_add.php');
define('TEMPLATE', 'template.php');
define('ADMIN_TEMPLATE', 'admin_template.php');
define('ADMIN_LOGIN', 'admin_login.php');


function __autoload($class){
	require_once($class.'.php');
}

$front = FrontController::getInstance();
$front->route();

echo $front->getBody();