<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Http\Request;


class MailController extends Controller {

public function sendEmail(Request $request) {
    $ime = $request->input('ime');
    $email = $request->input('email');
    $predmet = $request->input('predmet');
    $poruka = $request->input('poruka');

    $mail = new PHPMailer(true);

    try {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'probninalog443@gmail.com'; 
        $mail->Password = 'sicjtvtpupaonalz'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email, $ime);
        $mail->addAddress('probninalog443@gmail.com'); 
        $mail->Subject = 'Nova poruka: ' . $predmet;
        $mail->Body = 'Ime: ' . $ime . "\r\n" .
                      'Email adresa: ' . $email . "\r\n" .
                      'Poruka: ' . $poruka;

        $mail->send();

        return redirect()->back()->with('success', 'Poruka je uspešno poslata.');

    } catch (Exception $e) {

        return redirect()->back()->with('error', 'Došlo je do greške prilikom slanja poruke: ' . $mail->ErrorInfo);
    }
}
}