<?php

require_once ("app/config/database.php");
function authenticateUser($email, $password)
{

    try {
        $conn = connectDB();

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user) {
            if (!is_null($user['deleted_at'])) {
                return "blocked";
            }

            if (password_verify($password, $user['password'])) {
                return $user;
            } else {
                return "incorrect_password";
            }
        } else {
            return "user_not_found";
        }
    } catch (PDOException $e) {
        return false;
    }
}