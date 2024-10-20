<?php
// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $motivation = htmlspecialchars($_POST['motivation']);

    // Définir l'adresse email de l'administrateur
    $admin_email = "votre-email@example.com";

    // Sujet de l'email
    $subject = "Nouvelle Soumission de Formulaire d'Implication";

    // Contenu du message
    $message = "Vous avez reçu une nouvelle soumission de formulaire d'implication.\n\n";
    $message .= "Nom et Prénom: $nom\n";
    $message .= "Email: $email\n";
    $message .= "Adresse Physique: $adresse\n";
    $message .= "Motivation: $motivation\n";

    // Entêtes de l'email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envoyer l'email
    if (mail($admin_email, $subject, $message, $headers)) {
        echo "Merci ! Votre formulaire a été envoyé avec succès.";
    } else {
        echo "Erreur : Le formulaire n'a pas pu être envoyé. Veuillez réessayer.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>