<?php

// Récupérer les information du form avecune vérification de la method

if ($_SERVER["REQUEST_METHOD"]= "POST") {
    $name = $_POST["name"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $project_name = $_POST["project_name"];
    $message = $_POST["message"];

    // Vérifier si tous les champs sont remplis
    if (empty($name) || empty($prenom) || empty($email) || empty($project_name) || empty($message)) {
        echo "Tous les champs sont obligatoires.";
        return;
    }
    
    // Vérifier si l'email est valide
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "L'adresse email n'est pas valide.";
        return;
    }
    
    // Envoyer le message à votre adresse email
    $to = "your_email@example.com";
    $subject = "Formulaire de contact";
    $body = "Nom: $name \n Prénom : $prenom\nEmail: $email\nProjet: $project_name\nMessage: $message";
    
    if (mail($to, $subject, $body)) {
        // Si le message est envoyé, effacer les champs du formulaire
        $_POST = array();
        // Afficher un message de réussite
        echo "Votre message a été envoyé avec succès.";
        // Rediriger vers la page d'accueil
        header("refresh:3;url=index.html");

    } else {
        echo "Une erreur est survenue lors de l'envoi de votre message.";
    }
}
