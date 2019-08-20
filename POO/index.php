<?php
require('./controllers/frontend/controller.php');

try
{
	test();
}
catch(Exception $e)
{
    $errorMessage = $e->getMessage();
	require('./views/frontend/errorView.php');
}