<?php
//	Database configuration


//$server='us-cdbr-iron-east-03.cleardb.net';
//$db_user='bf478180bec9f1';
//$db_pwd='1a582896';
//$db_name='ad_24323cc4e82a822';


$server='localhost';
$db_user='root';
$db_pwd='root';
$db_name='Principals';



$table_name='users';
$table_name_social='users_social';
//email configuraion
$from_address="admin@devlup.com";
//domain configuration
$url="http://projects.devlup.com/LoginSystemv21";
//Admin username
$admin_user='admin';
$admin_password='123456';

//strings
//login
$msg_pwd_error='Password incorrect';
$msg_un_error='Username Doesn\'t exist';
$msg_email_1='User Account not yet activated.';
$msg_email_2='Click here to resend activation email';

//Registration form
$msg_reg_user='Username taken.Kindly choose different username';
$msg_reg_email='Email Already registered';
$msg_reg_activ='Your account has been successfully created';

//Admin login
$msg_admin_pwd='Incorect password';
$msg_admin_user='Username Doesn\'t exist';


//LOGO text
$logotxt="Expedius";

//Twitter Configuration
define('CONSUMER_KEY', 'CONSUMER_KEY_HERE');
define('CONSUMER_SECRET', 'CONSUMER_SECRET_HERE');
define('OAUTH_CALLBACK', $url.'/twitter_callback.php');

//Google Configuration
$Clientid='TYPE_CLIENTID_HERE';
$Email_address='TYPE_EMAILADDRESS_HERE';
$Client_secret='TYPE_CLIENT_SECRET_HERE';
$Redirect_URIs =$url.'/google_connect.php';
$apikeys='TYPE_API_KEYS_HERE';

//facebook configuration
$fbappid='FB_APP_ID';
$fbsecret='FB_SECRET';

?>
