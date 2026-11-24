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
        $contrasennaSalida = "yiex izsm waow xzlh";

        $correoSalida = trim($correoSalida);
        $contrasennaSalida = str_replace(' ', '', trim($contrasennaSalida));

        if($correoSalida == "" || $contrasennaSalida == "") {
            throw new RuntimeException('El correo de salida no está configurado.');
        }

        if (!filter_var($correoSalida, FILTER_VALIDATE_EMAIL) || !filter_var($destinatario, FILTER_VALIDATE_EMAIL)) {
            throw new RuntimeException('La dirección de correo no es válida.');
        }

        require_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Controller/PHPMailer/src/Exception.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Controller/PHPMailer/src/PHPMailer.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Controller/PHPMailer/src/SMTP.php';

        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        $mail->CharSet = 'UTF-8';

        $mail->IsSMTP();
        $mail->IsHTML(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Timeout = 15;
        $mail->Timelimit = 20;
        $mail->Username = $correoSalida;
        $mail->Password = $contrasennaSalida;

        $mail->SetFrom($correoSalida, "Kath's Kitchen");
        $mail->Subject = $asunto;
        $mail->MsgHTML($contenido);
        $mail->AltBody = html_entity_decode(strip_tags($contenido), ENT_QUOTES, 'UTF-8');
        $mail->AddAddress($destinatario);
        if (!$mail->send()) {
            throw new RuntimeException($mail->ErrorInfo ?: 'El servidor no aceptó el correo.');
        }
        return true;
    } catch (Throwable $e) {
        RegistrarFalloCorreo($e);
        return false;
    }
}

function RegistrarFalloCorreo($exc, $accion = 'EnviarCorreo')
{
    try {
        if (function_exists('RegistrarError')) {
            RegistrarError($exc, $accion);
            return;
        }
    } catch (Throwable $errorBitacora) {
        // Un fallo de la bitácora no debe interrumpir la respuesta del formulario.
    }
    error_log('KathsKitchen: fallo en ' . $accion . '; código ' . $exc->getCode());
}

function CargarPlantillaCorreo($archivo, $reemplazos)
{
    $ruta = $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/View/template/' . $archivo;
    $plantilla = is_readable($ruta) ? @file_get_contents($ruta) : false;
    if ($plantilla === false) {
        throw new RuntimeException('No se pudo cargar la plantilla de correo.');
    }
    foreach ($reemplazos as $marcador => $valor) {
        $plantilla = str_replace($marcador, htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8'), $plantilla);
    }
    return $plantilla;
}
