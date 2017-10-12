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

    $this->name  = $name;
    $this->date  = $date;
    $this->id    = $id;
    $this->res   = $res;
    $this->cp    = $cp;
    $this->to    = $to;
    $this->subj  = $subj;
    // "Mail Object ready";
  }
  /*
  * render_html
  * Returns the html rendered with the values.
  *
   */
  function render_html(){
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
        <p style='font-family: Times, serif; text-align: center; font-style: italic'>Positive Compliance LLC - Sistemas anticorrupción.</p>
        <hr style='width: 80%; margin: 0 10% 0 10%'>
        <br>
        <p style='font-family: Times, serif; text-align: center; font-style: italic'>Transferencia procesada a la fecha ".$this->date."</p>
        <table style='width: 80%; text-align: left; border-collapse: collapse; margin: 0 10% 0 10%; font-size: 12px'>
            <tr style='border: #dfdfdf 1px solid; text-align:center;'>
                <th style='padding: 5px; border: #dfdfdf 1px solid; width: 50%'>Campo</th>
                <th style='padding: 5px; border: #dfdfdf 1px solid;  width: 50%'>Información</th>
            </tr>
            <tr style='border: #dfdfdf 1px solid;'>
                <td style='padding: 5px;'><strong>Nombre</strong></td>
                <td style='padding: 5px;'>".$this->name."</td>
            </tr>
            <tr style='border: #dfdfdf 1px solid;'>
                <td style='padding: 5px;'><strong>Empresa</strong></td>
                <td style='padding: 5px;'>".$this->cp."</td>
            </tr>
            <tr style='border: #dfdfdf 1px solid;'>
                <td style='padding: 5px;'><strong>Resultado</strong></td>
                <td style='padding: 5px;'>".$this->res."</td>
            </tr>
        </table>
        <br>
        <h1 style=' text-align: center; line-height: 10px; font-size: 11px'>Para mayor información consultar su perfil en nuestro servicio <a href='backoffice.positivecompliance.com'>backoffice</a>.</h1>
        <p style='font-family: Times, serif; text-align: center; font-style: italic; font-size: 12px'>Somos la diferencia entre evaluar y resolver.</p>
        <h1 style=' text-align: center; line-height: 10px; font-size: 11px'>Digital Signature: <strong>".$this->id."</strong>.</h1>

    </body>
    </html>
    ";
    return $html;
  }
}

/*
 * not_found
 * In case of several types of bad requests.
 */
function not_found(){
  http_response_code(404);
}

/*
 * verify_input
 * This function validate if the input is complete.
 */
function verify_input( $dict ){
  $indexes = ['nombre','fecha','id','resume','empresa'];
  $error = 0;

  foreach ($indexes as $in => $value) {
    if ( !array_key_exists( $value, $dict ) ) {
      $error = $error + 1;
    }
  }

  if ( $error > 0 ) {
    return FALSE;
  }

  return TRUE;
}

// Company variables
// $to   = 'contraloria@positivecompliance.com, nissim@yahoo.com.mx,'; // Main persons
$to   = 'jesus.fragoso@positivecompliance.com, dante.bazaldua@positivecompliance.com';// Developers
$subject = 'Transferencia exitosa.';

// Request methods.
$method   = $_SERVER['REQUEST_METHOD'];
$request  = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input    = json_decode(file_get_contents('php://input'),true);

// By POST
if ( $method == 'POST' ) {
  if ( $input != null ) {

    if ( verify_input( $input ) ){
      // Creating the mail message object
      $mailmsg  = new Message($input['nombre'], $input['fecha'], $input['id'], $input['resume'], $input['empresa'], $to, $subject);
      // echo $mailmsg->render_html();
      // Always set content-type when sending HTML email
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      // More headers
      $headers .= 'From: <noreply@positivecompliance.com>' . "\r\n";
      $headers .= 'Transferencia exitosa' . "\r\n";
      $headers .= "Bcc: nissimheffes@yahoo.com"."\r\n";

      if(mail($to,$subject,$mailmsg->render_html(),$headers)) {
        echo "Mail Sent Successfully";
      }
      else{
        echo "Mail Not Sent";
      }
    }
    else {
      echo "Error en input.";
    }

  }
  else{
    not_found();
  }
}
else {
  not_found();
}

?>
