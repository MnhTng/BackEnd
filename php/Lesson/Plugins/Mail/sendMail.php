<?php
require 'Uploads/upload.php';

$configEmail = array(
    'fullname' => 'MnhTng',
    'username' => 'emailtestcode321@gmail.com',
    'password' => 'pouorjlizeyeuoyo',
);

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['btn_send_mail'])) {
    $sendMailInfo = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'subject' => $_POST['subject'],
        'message' => $_POST['message'],
        'attachment' => upload()
    );

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        global $configEmail, $sendMailInfo;

        //* Server settings

        // Enable verbose debug output
        // Kích hoạt gỡ lỗi đầu ra
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        // Send using SMTP
        // SMTP: Simple Mail Transfer Protocol
        $mail->isSMTP();

        // Set the SMTP server to send through
        // Server của email 
        $mail->Host = 'smtp.gmail.com';

        // Enable SMTP authentication
        // Kích hoạt xác thực SMTP
        $mail->SMTPAuth = true;

        // SMTP username
        $mail->Username = $configEmail['username'];

        // SMTP password
        $mail->Password = $configEmail['password'];

        // Enable implicit TLS encryption
        // Kích hoạt mã hõa TLS ngầm
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        // TCP port to connect to 
        // Use 465 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_SMTPS`
        // Use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->Port = 465;

        // Set email charset
        $mail->CharSet = "UTF-8";

        //* Recipients

        // Người gửi
        $mail->setFrom($configEmail['username'], $configEmail['fullname']);

        // Add a recipient
        // Người nhận
        $mail->addAddress($sendMailInfo['email'], $sendMailInfo['name']);

        // Name is optional
        // Gửi thêm cho 1 người nữa
        // $mail->addAddress('ellen@example.com');

        // Email nhận tin khi được người nhận phản hồi
        $mail->addReplyTo($configEmail['username'], $configEmail['fullname']);

        // Sử dụng khi bạn muốn một vài người khác, không phải người nhận chính cũng nhận được bản sao của email
        // Người nhận thư sẽ thấy toàn bộ danh sách những người cùng nhận được email
        // $mail->addCC('cc@example.com');

        // Cũng sử dụng khi bạn muốn gửi bản sao email đến nhiều người nhưng không muốn những người nhận biết bạn đã gửi thêm cho người khác
        // $mail->addBCC('bcc@example.com');

        //* Attachments

        // Add attachments
        // Đính kèm file
        // $mail->addAttachment('/var/tmp/file.tar.gz');

        // Optional name
        // Đính kèm file với tên tự custom
        // $mail->addAttachment('PHPMailer/README.md', 'Hướng-dẫn-sử-dụng-PHPMailer.md');
        foreach ($sendMailInfo['attachment'] as $index => $fileName) {
            $mail->addAttachment($index, $fileName);
        }

        //* Content

        // Set email format to HTML
        // Định dạng email hiển thị dưới dạng HTML
        $mail->isHTML(true);

        // Tiêu đề email
        $mail->Subject = $sendMailInfo['subject'];

        // Nội dung email
        $mail->Body = $sendMailInfo['message'];

        // Nội dung email dạng text
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
