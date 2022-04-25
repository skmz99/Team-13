<?php
// Uncomment next line if you're not using a dependency loader (such as Composer)
// require_once '<PATH TO>/sendgrid-php.php';

use SendGrid\Mail\Mail;

$email = new Mail();
$email->setFrom("team13webiste@gmail.com", "Team#13");
$email->setSubject("testing if email works");
$email->addTo("sergiomendez5587@gmail.com", "Serigo Mendez");
$email->addContent("text/plain", "Testing if email works");
$email->addContent(
    "text/html", "<strong>Testing</strong>"
);
$sendgrid = new \SendGrid(getenv('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'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '.  $e->getMessage(). "\n";
}
?>