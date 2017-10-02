<?php
/*
 @author: Dante Bazaldua
 @brief: Mail Server for notifications
 @date: 29-Sept-2017
 */

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);

if ( $method == 'POST' ) {
  echo "Método POST! YEEEI.";
  echo $input;
}
else {
  http_response_code(404);
}

?>
