<?php

require_once ("app/config/database.php");

function createUser($username, $email, $hashed_password, $phone_number, $role_id)
{
    try {
        // Get database connection
        $conn = connectDB();



        $sql_user = "INSERT INTO users (username, email, password, phone_number, role_id) 
                        VALUES ('$username', '$email', '$hashed_password', '$phone_number', $role_id)";
        $conn->exec($sql_user);

        // Get the ID of the inserted user
        $user_id = $conn->lastInsertId();

        // inserting entry depending on the role
        if ($role_id == 3 || $role_id == 2) {

            $table_name = ($role_id == 3) ? 'customers' : 'travel_Agencies';


            $sql_insert_entry = "INSERT INTO $table_name (user_id) VALUES ($user_id)";
            $conn->exec($sql_insert_entry);
        }


        return true;

    } catch (PDOException $e) {
        return false;
    }
}

