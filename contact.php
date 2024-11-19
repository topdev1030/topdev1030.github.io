<?php
    // require_once 'mail.php';
    //     $name = strip_tags(trim($_POST["name"]));
	// 	$name = str_replace(array("\r","\n"),array(" "," "),$name);
    //     $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    //     $message = trim($_POST["message"]);
        
    //     $mail->setFrom($email , $name);
    //     $mail->addAddress('liobeckam@gmail.com');

    //     $mail->Subject = 'Contact Us Message';
    //     $mail->Body    = 
    //     '
    //     <center>
    //         <big>
    //             <table border="0" style="width: 70%; background-color: #34495e; overflow: hidden;">
    //                 <tr>
    //                     <td colspan="2" style=" background-color: #95a5a6; padding: 10px;">
    //                         <center><h1 style="font-size: 40px; margin: 10px;">Contact Message</h1></center>
    //                     </td>
    //                 </tr>
    //                 <tr>
    //                     <td style="width: 30%; background-color: #bdc3c7; padding: 10px;">Name:</td>
    //                     <td style="width: 70%; background-color: #b5bebe; padding: 10px;">' . $name . '</td>
    //                 </tr>
    //                 <tr>
    //                     <td style="width: 30%; background-color: #bdc3c7; padding: 10px;">Email:</td>
    //                     <td style="width: 70%; background-color: #b5bebe; padding: 10px;">' . $email . '</td>
    //                 </tr>
    //                 <tr>
    //                     <td style="width: 30%; background-color: #bdc3c7; padding: 10px;">Message:</td>
    //                     <td style="width: 70%; background-color: #b5bebe; padding: 10px;">' . $message . '</td>
    //                 </tr>
    //             </table>
    //         </big>
    //     </center>
    //     ';
    //     $mail->send();




    // Load PHPMailer classes
    require 'vendor/PHPMailer/src/PHPMailer.php';
    require 'vendor/PHPMailer/src/SMTP.php';
    require 'vendor/PHPMailer/src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                       // Specify main SMTP server (Gmail in this case)
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'zoran.lazic.work@gmail.com';             // SMTP username
            $mail->Password = 'Star123!@#';                    // SMTP password (use App Password if 2FA is enabled)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Enable TLS encryption
            $mail->Port = 587;                                    // TCP port to connect to

            // Recipients
            $mail->setFrom('zoran.lazic.work@gmail.com', 'panther');
            $mail->addAddress('zoran.lazic.work@gmail.com');              // Add recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'New message from ' . $name;
            $mail->Body    = 'You have received a new message from ' . $name . ' (' . $email . '):<br><br>' . nl2br($message);

            // Send email
            $mail->send();
            echo 'Email has been sent successfully!';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>
