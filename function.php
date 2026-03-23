<?php
include "connection/config.php"; // ✅ Make sure DB is connected

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ✅ CAPTCHA verification
    $captcha = $_POST['g-recaptcha-response'] ?? '';
    $secretKey = '6LdcW5QsAAAAAJTde8-jocSRjfjVKNS5313I2j1S'; // Replace this with your actual reCAPTCHA secret key

    if (empty($captcha)) {
        http_response_code(400);
        echo json_encode(["message" => "Please verify that you're not a robot."]);
        exit;
    }

    $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captcha}");
    $responseData = json_decode($verifyResponse);

    if (!$responseData->success) {
        http_response_code(403);
        echo json_encode(["message" => "reCAPTCHA verification failed."]);
        exit;
    }

    // ✅ Sanitizing inputs
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        http_response_code(400);
        echo json_encode(["message" => "Please complete all fields."]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(["message" => "Invalid email address."]);
        exit;
    }

    // ✅ Save enquiry to database
  $stmt = $pdo->prepare("INSERT INTO contact(name,email,subject,phone,message) VALUES(?,?,?,?,?)");

if (!$stmt->execute([$name,$email,$subject,$phone,$message])) {
    http_response_code(500);
    echo json_encode(["message" => "Database error"]);
    exit;
}
    // ✅ Email to support
    $support_recipient = "sarmistha.drafticode@gmail.com";
    $email_subject = "New Enquiry from $name";
    $email_body = "
        <html><body>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong><br>$message</p>
        </body></html>
    ";
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: sarmistha.drafticode@gmail.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($support_recipient, $email_subject, $email_body, $headers)) {
        
        $ack_subject = "We have received your message";
        $ack_body = "
            <html><body>
                <p>Dear $name,</p>
                <p>Thank you for contacting us. We have received your message and will get back to you shortly.</p>
                <p>Best regards,<br>Drafticode Support Team</p>
            </body></html>
        ";
        $ack_headers = "MIME-Version: 1.0\r\n";
        $ack_headers .= "Content-type:text/html;charset=UTF-8\r\n";
        $ack_headers .= "From: sarmistha.drafticode@gmail.com\r\n";
        $ack_headers .= "Reply-To: $email\r\n";

        mail($email, $ack_subject, $ack_body, $ack_headers);

        http_response_code(200);
        echo json_encode(["message" => "Thank you! Your message has been sent and saved."]);
    } else {
        error_log("Failed to send email to support.");
        http_response_code(500);
        echo json_encode(["message" => "Message saved, but email failed to send."]);
    }
} else {
    http_response_code(405);
    echo json_encode(["message" => "Invalid request method."]);
}
?>