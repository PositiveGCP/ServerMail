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
        <meta charset=\"utf-8\" />
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <title>Results</title>
    </head>
    <body style=\"margin:0; padding:10px 0 0 0;\" bgcolor=\"#F8F8F8\">
        <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"95%\">
            <tr>
                <td align=\"center\">
                    <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"500\"
                        bgcolor=\"#FFFFFF\">
                        <tr>
                            <td align=\"center\">
                                <img src=\"http://positivecompliance.com/resources/banner.png\" alt=\"Image Banner\" style=\"display: block;border:0;\" height=\"142\" width=\"500\"/>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor=\"#ffffff\" style=\"padding: 15px 15px 0px 15px\">
                                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                                    <tr>
                                        <td style=\"padding: 2px 0 2px 10px; font-family: Avenir, sans-serif; font-size: 15px;\">
                                            <p> Nos complace ofrecerte el resultado de la última transacción:</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style=\"padding: 0px 20px;\">
                                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%%\" style=\"padding: 20px; font-family: Avenir, sans-serif; font-size: 15px;\">
                                    <col width=\"30%\">
                                    <col width=\"70%\">
                                    <tr>
                                        <td style=\"padding-right: 5px; padding-top: 2px;\">
                                            <strong> Fecha: </strong>
                                        </td>
                                        <td>" . $this->date . "</td>
                                    </tr>
                                    <tr>
                                        <td style=\"padding-right: 5px; padding-top: 2px;\">
                                            <strong> Nombre: </strong>
                                        </td>
                                        <td>" . $this->name . "</td>
                                    </tr>
                                    <tr>
                                        <td style=\"padding-right: 5px; padding-top: 2px;\">
                                            <strong> Id de transacción: </strong>
                                        </td>
                                        <td> " . $this->id . " </td>
                                    </tr>
                                    <tr>
                                        <td style=\"padding-right: 5px; padding-top: 2px;\">
                                            <strong> Empresa: </strong>
                                        </td>
                                        <td> " . $this->cp . " </td>
                                    </tr>
                                    <tr>
                                        <td style=\"padding-right: 5px; padding-top: 2px;\">
                                            <strong> Resultado: </strong>
                                        </td>
                                        <td> " . $this->res . " </td>
                                    </tr>
                                </table>
                            </td>
                            
                        </tr>
                        <tr>
                            <td bgcolor=\"#ffffff\" style=\"padding: 15px 15px 0px 15px\">
                                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                                    <tr>
                                        <td style=\"padding: 2px 0 2px 10px; font-family: Avenir, sans-serif; font-size: 15px; text-align:center;\">
                                            <p> Somos la <strong> diferencia</strong> entre <strong> evaluar</strong> y <strong> resolver</strong>.</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor=\"#ffffff\" style=\"padding: 0px 15px 0px 15px\">
                                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                                    <tr>
                                        <td style=\"padding: 2px 0 2px 10px; font-family: Avenir, sans-serif; font-size: 13px; text-align:center;\">
                                            <p>Para visualizar el reporte completo favor de revisarlo en nuestro sistema <a href=\"https://backoffice.positivecompliance.com/resultados/reporte/" . $this->id . "\">Backoffice.</a></p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor=\"#ffffff\" style=\"padding: 0px 15px 25px 15px\">
                                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                                    <tr>
                                        <td style=\"padding: 2px 0 2px 10px; font-family: Avenir, sans-serif; font-size: 12px; text-align:center;\">
                                            <p> Este correo se generó <strong>automáticamente</strong>. Si tienes dudas respecto al resultado favor de mandar un correo a <a href=\"mailto:soporte@positivecompliance.com\">soporte.</a> </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor=\"#3A3A3A\" style=\"padding: 5px 15px 0px 15px;\">
                                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                                    <tr>
                                        <td style=\"padding: 2px 0 2px 10px; color:#fff; font-family: Avenir, sans-serif; font-size: 11px; text-align:center;\">
                                            <p> Copyright (c) 2017--, The Positive Compliance Development Team, México D.F. </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    
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
$to   = 'tania.ubaldo@positivecompliance.com, jesus.fragoso@positivecompliance.com, dante.bazaldua@positivecompliance.com, ricardo.vega@positivecompliance.com, jose.fragoso@positivecompliance.com';// Developers
// $to = 'dante.bazaldua@positivecompliance.com';
$subject = 'Transferencia exitosa.';

// Request methods.
$method   = $_SERVER['REQUEST_METHOD'];
$request  = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input    = json_decode(file_get_contents('php://input'),true);

// echo "$input";

// By POST
if ( $method == 'POST' ) {
  if ( $input != null ) {

    if ( verify_input( $input ) ){
      // Creating the mail message object
      $mailmsg  = new Message($input['nombre'], $input['fecha'], $input['id'], $input['resume'], $input['empresa'], $to, $subject);
      // Always set content-type when sending HTML email
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      // More headers
      $headers .= 'From: <noreply@positivecompliance.com>' . "\r\n";
      $headers .= 'Transferencia exitosa' . "\r\n";
      // $headers .= "Bcc: nissimheffes@yahoo.com"."\r\n";

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
//   $mail = new Message("dante", "dante", "dante", "dante", "dante", $to, $subject);
//   $html = $mail->render_html();
//   echo "$html";
  not_found();
}

?>
