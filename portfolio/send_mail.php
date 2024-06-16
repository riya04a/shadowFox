<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $phone=$_POST['phone'];
    $message=$_POST['message']; 

    require "Mail/phpmailer/PHPMailerAutoload.php";
    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';

    $mail->Username = 'kmshah15234@gmail.com'; 
    $mail->Password = 'zaqe nvif xdlv xtqr'; 

    $mail->setFrom('kmshah15234@gmail.com', 'Portfolio');
    $mail->addAddress('kmshah15234@gmail.com'); 

    $mail->isHTML(true);
    $mail->Subject = "New Contact Form Submission: $subject";
    $mail->Body = "
        <h3>Contact Details</h3>
        <p><b>Name:</b> $name</p>
        <p><b>Email:</b> $email</p>
        <p><b>Phone:</b> $phone</p>
        <p><b>Message:</b> $message</p>
    ";

    if (!$mail->send()) {
        echo '<script>alert("Failed to send email. Please try again."); window.location.href = "index.html";</script>';
    } else {
        echo '<script>alert("Email sent successfully!"); window.location.href = "index1.html";</script>';
    }
}
 else {
  
    header("Location: index1.html");
    exit();
}
?>
