<?php


//Verify how the user got acess to the page
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $lname = $_POST['new_name'];
    $fsname = $_POST['new_surname'];
    $username = $_POST['new_username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $role_type = $_POST['statut'] ?? 'passenger'; // Default to 'passenger' if not set
    $preference = $_POST['preference_animals'] ?? 'animals_accepted'; // Default preference for animals
    $smoker_preference = $_POST['preference_smoker'] ?? 'smoker_accepted'; // Default preference for smokers

    try {

        require_once 'DBlink.php';
        require_once 'signup_model.php';
        require_once 'signup_contr.php';

        // Error Handlers
            $errors = [];

            // Check if inputs are empty
            if (is_input_empty($lname, $fsname, $username, $email, $pwd)) {
                $errors['empty_input'] = 'Remplissez tous les champs.';
            }

            // Check if email is valid
            if (is_email_invalid($email)) {
                $errors['invalid_email'] = 'Email invalide.';
            }

            // Check if email is registered
            if (is_email_registered($pdo, $email)) {
                $errors['email_used'] = 'Email déjà enregistré.';
            }

            // Check if username is taken
            if (is_username_taken($pdo, $username)) {
                $errors['username_taken'] = 'Nom d\'utilisateur déjà pris.';
            }

        require_once 'config_session.php';

        if ($error){
            $_SESSION['errors_signup'] = $errors;
            header("Location: ../PHP/signup.php");
            die();
        }

        create_user($pdo, $lname, $fsname, $username, $email, $pwd);
        create_role($pdo, $role_type, $username);

        switch ($role_type) {
            case 'driver' :
                header('Location: ../PHP/driver_profile.php?signup=succes');
                break;
            case 'passenger' :
                header('Location: ../PHP/profile_page.php?signup=succes');
                break;
        }

        $pdo = null; // Close the connection
        $stmt = null; // Close the statement

        die();

    } catch (PDOException $e) {
        die('Query failed: ' . $e->getMessage());
    }

} else {
    header("Location: ../PHP/index.php");
    die();
};