<?php

function GenerarContrasennaTemporal()
{
    $caracteres = 'ABCDEFGHJKLMNPQRSTUVWXYZ123456789';
    $longitud = 6;
    $resultado = '';

    for ($i = 0; $i < $longitud; $i++) {
        $resultado .= $caracteres[random_int(0, strlen($caracteres) - 1)];
    }

    return $resultado;
}

function EnviarCorreoElectronico($asunto, $contenido, $destinatario)
{
    try {
        $correoSalida = "allansasa15@gmail.com";
        $contrasennaSalida = "";

        if($contrasennaSalida == "") {
            return true; // Simulación: no se envía ningún correo.
        }

        require_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Controller/PHPMailer/src/Exception.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Controller/PHPMailer/src/PHPMailer.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Controller/PHPMailer/src/SMTP.php';

        $mail = new \PHPMailer\PHPMailer\PHPMailer();
        $mail->CharSet = 'UTF-8';

        $mail->IsSMTP();
        $mail->IsHTML(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = $correoSalida;
        $mail->Password = $contrasennaSalida;

        $mail->SetFrom($correoSalida);
        $mail->Subject = $asunto;
        $mail->MsgHTML($contenido);
        $mail->AddAddress($destinatario);
        $mail->send();
        return true;
    } catch (Exception $e) {
        RegistrarError($e, 'EnviarCorreo');
        return false;
    }
}
