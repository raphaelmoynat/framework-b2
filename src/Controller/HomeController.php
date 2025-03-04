<?php

namespace App\Controller;
use Core\Attributes\Route;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;


class HomeController extends \Core\Controller\Controller
{
    #[Route(path: "/", name: "app_home")]
    public function index()
    {

        echo "page home";


    }

    #[Route(path: "/home/index", name: "app_index")]
    public function show()
    {

        echo "page show";



    }

  #[Route(path: "/mail", name: "app_mail")]
  public function dockerMailer() {
    $mail = new PHPMailer(true);

    try {
      $mail->isSMTP();
      $mail->Host = 'localhost';
      $mail->Port = 1025;
      $mail->SMTPAuth   = false;
      $mail->isHTML(true);
      $mail->setFrom('test@mail.com', 'test');
      $mail->addAddress('luc@mail.com','luc' );
      $mail->Body = "test coucou";
      $mail->send();
      echo 'Message has been sent';
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }

}
