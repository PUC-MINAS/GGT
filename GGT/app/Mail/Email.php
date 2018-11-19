<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\PHPMailer\PHPMailer;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        

        // $subject = 'Laravel Email';
        // return $this->view('emails.email')
        //     ->from($address, $name)
        //     ->subject($subject);
    }

    public static function enviar($destinatario, $assunto, $corpo){
        $mail = new PHPMailer(); // instancia a classe PHPMailer

		$mail->IsSMTP();

        //configuração do gmail
		$mail->Port = env('MAIL_PORT'); //porta usada pelo gmail.
		$mail->Host = env('MAIL_HOST'); 
		$mail->IsHTML(true); 
		$mail->Mailer = env('MAIL_DRIVER'); 
		$mail->SMTPSecure = env('MAIL_ENCRYPTION');

		//configuração do usuário do gmail
		$mail->SMTPAuth = true; 
		$mail->Username = env('MAIL_USERNAME'); // usuario gmail.   
		$mail->Password = env('MAIL_PASSWORD'); // senha do email.

		$mail->SingleTo = true; 

		// configuração do email a ver enviado.
		$mail->From = "ravi.g.assis@gmail.com"; 
		$mail->FromName = "Ravi Assis."; 

		$mail->addAddress($destinatario); // email do destinatario.

		$mail->Subject = $assunto; 
		$mail->Body = $corpo;

		if(!$mail->Send())
			echo "Erro ao enviar Email:" . $mail->ErrorInfo;
    }
}
