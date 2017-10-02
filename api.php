<?php
/*
 @author: Dante Bazaldua
 @brief: Mail Server for notifications
 @date: 29-Sept-2017
 */

/**
 * Message
 * The mail class in order to make the information more easily readable.
 */
class Message
{
  public  $name = '',
          $date = '',
          $id   = '',
          $res  = '',
          $cp   = '',
          $to   = '',
          $subj = '';

  function __construct( $name, $date, $id, $res, $cp, $to, $subj ){
    print "Mail Object ready";
  }
  /*
  * render_html
  * Returns the html rendered with the values.
  *
   */
  function render_html(  ){
    $html =
    "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv='X-UA-Compatible' content='ie=edge'>
        <title>Alta exitosa</title>
    </head>
    <body style='font-family: Arial, sans-serif; padding-top: 30px; color: #3b3b3b ;'>
        <h1 style=' text-align: center; line-height: 10px'>Transferencia exitosa.</h1>
        <p style='font-family: Times, serif; text-align: center; font-style: italic'>Positive Compliance LLC - Sistemas anticorrupciÃ³n.</p>
        <hr style='width: 80%; margin: 0 10% 0 10%'>
        <br>
        <p style='font-family: Times, serif; text-align: center; font-style: italic'>Transferencia procesada a la fecha ".$this->$date."</p>
        <table style='width: 80%; text-align: left; border-collapse: collapse; margin: 0 10% 0 10%; font-size: 12px'>
            <tr style='border: #dfdfdf 1px solid; text-align:center;'>
                <th style='padding: 5px; border: #dfdfdf 1px solid; width: 50%'>Campo</th>
                <th style='padding: 5px; border: #dfdfdf 1px solid;  width: 50%'>InformaciÃ³n</th>
            </tr>
            <tr style='border: #dfdfdf 1px solid;'>
                <td style='padding: 5px;'><strong>Nombre</strong></td>
                <td style='padding: 5px;'>".$this->$name."</td>
            </tr>
            <tr style='border: #dfdfdf 1px solid;'>
                <td style='padding: 5px;'><strong>Empresa</strong></td>
                <td style='padding: 5px;'>".$this->$cp."</td>
            </tr>
            <tr style='border: #dfdfdf 1px solid;'>
                <td style='padding: 5px;'><strong>Resultado</strong></td>
                <td style='padding: 5px;'>".$this->$res."</td>
            </tr>
        </table>
        <br>
        <h1 style=' text-align: center; line-height: 10px; font-size: 11px'>Para mayor informaciÃ³n consultar su perfil en nuestro servicio <a href='backoffice.positivecompliance.com'>backoffice</a>.</h1>
        <p style='font-family: Times, serif; text-align: center; font-style: italic; font-size: 12px'>Somos la diferencia entre evaluar y resolver.</p>
        <h1 style=' text-align: center; line-height: 10px; font-size: 11px'>Digital Signature: <strong>".$this->$id."</strong>.</h1>

    </body>
    </html>
    "
    return $html;
  }
}

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);

if ( $method == 'POST' ) {
  if ( $input != null ) {


  }
  else{

  }
  echo "Método POST! YEEEI.";
  echo $input;
}
else {
  http_response_code(404);
}

?>
