<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['nom']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $telephone = htmlspecialchars($_POST['telephone']);
    $subject = htmlspecialchars($_POST['objet']);
    $message = htmlspecialchars($_POST['message']);

    // Validation supplémentaire pour le numéro de télételephone
    if (!preg_match('/^\+?[0-9\s\-]{7,15}$/', $telephone)) {
        echo json_encode(['success' => false, 'message' => 'Numéro de téléphone invalide.']);
        exit;
    }

    if ($nom && $email && $telephone && $subject && $message) {
        $to = "hounganamadine88@gmail.com"; // Adresse email destinataire
        $emailSubject = "Formulaire de contact-Portfolio - $subject"; // Objet de l'email
        $body = "Nom: $nom\nEmail: $email\nTéléphone: $telephone\nSujet: $subject\nMessage: $message";

        // Envoi de l'email
        if (mail($to, $emailSubject, $body)) {
            echo json_encode(['success' => true, 'message' => 'Email envoyé avec succès. Vous serez contactez sous peu.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Une erreur est survenue lors de l\'envoi de l\'email.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Données du formulaire invalides.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Requête non autorisée.']);
}
?>
