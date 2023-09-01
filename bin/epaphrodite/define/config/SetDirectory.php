<?php

/**************************************************************
 ****************| DEFINE ALL DIRECTORY |********************** 
 ***************************************************************/

// Config language
define('_LANG_', 'fr');

// Config front files
define('_FRONT_', '.html');

// Config API token Key name for POST or GET
define('_KEYGEN_', 'CRSF');

// Main directory folder
define('_DIR_MAIN_', 'bin');

// vendor directory
define('_DIR_VENDOR_', 'vendor');

// Front files extension in end
define('_MAIN_EXTENSION_', '_ep');

// Views directories
define('_DIR_VIEWS_', 'bin/views');

// Main directory
define('_ROOT_', dirname(__DIR__));

// Images directory
define('_DIR_IMG_', 'static/img/');

// Documentation directory
define('_DIR_PDF_', 'static/docs/');

// Main directory for all users
define('_DIR_MAIN_TEMP_', '/main/');

// Main directory for admin pages
define('_DIR_ADMIN_TEMP_', '/admin/');

// Database directory
define('_DIR_database_', 'bin/database');

// Epaphrodite main directory
define('_EPAPHRODITE_', 'bin/epaphrodite');

// Main static datas (static storage)
define('_DIR_CONFIG_', 'bin/database/datas/arrays/');

// Main Json datas directory
define('_DIR_JSON_DATAS_', 'bin/database/datas/json');

// Main config ini directory
define('_DIR_CONFIG_INI_', 'bin/database/config/ini/');

// Set Application domaine when you are in local "epaphrodite-framework/"
define('_DOMAINE_', "");

// Share directory
define('_DIR_PRINTER_', 'bin/share/FilesImportLibrary/fpdf');

// Main home page
define('_HOME_', 'views/index/');

// Logout
define('_LOGOUT_', 'logout/');

// Dashboard home page
define('_DASHBOARD_', 'dashboard/');

// Dashboard home page
define('_PROFIL_', 'users/modifier_infos_users/');

// Login home page
define('_LOGIN_', 'views/login/');

// Login Etablissement home page ---------------- New Login for Ets ----------------
define('_LOGINETS_', 'views/loginets/');

// Session auth login
define('_AUTH_LOGIN_', 'login');

// Session auth login for Ets ---------------- New session auth for Ets ----------------
define('_AUTH_LOGINETS_', 'loginets');

// Session auth contact
define('_AUTH_CONTACT_', 'contact');

// Session auth id
define('_AUTH_ID_', 'id');

// Session auth type
define('_AUTH_TYPE_', 'type');

// Session auth nom et prenoms
define('_AUTH_NAME_', 'nom_prenoms');

// Session auth nom et prenoms
define('_AUTH_EMAIL_', 'email');

// Database config directory
define('DIR_CONFIG', "bin/epaphrodite/define/config/");

// Main static datas (static storage)
define('DIR_DATAS', "bin/database/datas/");