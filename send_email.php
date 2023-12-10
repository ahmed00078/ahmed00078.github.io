<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $name = $_POST["name"];
    $subject = $_POST["subject"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Adresse e-mail de destination
    $to = "ahmedsidimohammed78@gmail.com";

    // En-têtes du mail
    $headers = "From: $name <$email>" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Envoyer l'e-mail
    mail($to, $subject, $message, $headers);

    // Redirection après l'envoi du formulaire (vous pouvez personnaliser l'URL de redirection)
    header("Location: thank-you.html");
    exit();
}
?>