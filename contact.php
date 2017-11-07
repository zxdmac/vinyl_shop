<?php
  include('header.php');
?>


  <?

    if (isset($_POST['submit'])) {
      $klientoEmail = $_POST["email"];
      $klientoAntraste = $_POST["phone"];
      $klientoKlausimas = $_POST["message"];
      $klientoVardas = $_POST["name"];
      require 'PHPMailer-master/PHPMailerAutoload.php';

      $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
      try {
          //Server settings
          $mail->SMTPDebug = 3;                                 // Enable verbose debug output // buvo 2
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = 'zxdmac@';                 // SMTP username
          $mail->Password = '***';                           // SMTP password
          $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587;                                    // TCP port to connect to

          //Recipients
          $mail->setFrom( $klientoEmail, $klientoVardas);
          $mail->addAddress('zxdmac@', 'Creator');     // Add a recipient
          // $mail->addAddress('ellen@example.com');               // Name is optional
          $mail->addReplyTo($klientoEmail, 'Information');
          // $mail->addCC('cc@example.com');
          // $mail->addBCC('bcc@example.com');

          //Attachments
          // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
          // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

          //Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = $klientoAntraste;
          $mail->Body    = $klientoKlausimas;
          $mail->AltBody = $klientoKlausimas;

          $mail->send();
          echo 'Message has been sent';
          header('Location: contact.php');
      } catch (Exception $e) {
        header('Location: contact.php');
          echo 'Message could not be sent.';
      }
    }
  ?>

    <div class="contact-container">
      <div class="contact-form">
          <h1>SENT US A MESSAGE</h1>
          <p>We would love to hear from you!</p>
        <form action="contact.php" method="post">
          <input type="text" name="name" placeholder="Your name: " id="name" required />
          <input type="email" name="email" placeholder="Your email: " id="email" required/>
          <input type="tel" name="phone" placeholder="Your phone number: " id="phone" required />
          <textarea name="message" placeholder="Your message: " required></textarea>
          <input type="submit" name="submit" value="SEND MESSAGE">
        </form>
      </div>
      <!-- end of contact-form div -->
    </div>
    <!-- end of contact-container div -->





    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
  </body>

  </html>
