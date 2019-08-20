<?php

require_once "../vendor/autoload.php";

use PlayStation\Client;

$client = new Client();
//                          v ticket_uuid                 v 2FA code
$client->login('1efeda44-24d6-4c55-a74e-04f722abb494', '305043');

$refreshToken = $client->refreshToken();