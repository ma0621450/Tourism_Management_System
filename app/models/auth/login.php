<?php
function authenticateUser($email, $password)
{

    require_once ("app/config/database.php");

    try {
        $conn = connectDB();

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        return false;
    }
}
