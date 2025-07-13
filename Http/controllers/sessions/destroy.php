<?php

use Core\App;
use Core\Database;
use Core\Validator;
require_once basePath('Core/functions.php');

// log the user out.
logout();
header ('location: /');
exit();