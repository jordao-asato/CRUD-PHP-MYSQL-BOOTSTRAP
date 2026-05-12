<?php

session_start();
require 'connection.php';

if (isset($_POST['create_user'])) {
    $name = mysqli_real_escape_string($connection, trim($_POST['name']));
    $email = mysqli_real_escape_string($connection, trim($_POST['email']));
    $birth_date = mysqli_real_escape_string($connection, trim($_POST['birth_date']));
    $password = isset($_POST['password']) ? mysqli_real_escape_string($connection, password_hash(trim($_POST['password']), PASSWORD_DEFAULT)) : '';

    $sql = "INSERT INTO users(name, email, birth_date, password) VALUES ('$name','$email', '$birth_date', '$password')";

    mysqli_query($connection, $sql);

    if (mysqli_affected_rows($connection) > 0) {
        $_SESSION['mensagem'] = 'Usuário criado com sucesso!';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Usuário não foi criado...';
        header('Location: index.php');
        exit;
    }

}

if (isset($_POST['update_user'])) {

    $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);

    $name = mysqli_real_escape_string($connection, trim($_POST['name']));
    $email = mysqli_real_escape_string($connection, trim($_POST['email']));
    $birth_date = mysqli_real_escape_string($connection, trim($_POST['birth_date']));
    $password = mysqli_real_escape_string($connection, trim($_POST['password']));

    $sql = "UPDATE users SET name = '$name', email = '$email', birth_date = '$birth_date'";

    if(!empty($password)) {
        $sql .= ", password='" . password_hash($password, PASSWORD_DEFAULT) . "'";
    }

    $sql .= " WHERE id = '$user_id'";

    mysqli_query($connection, $sql);

    if (mysqli_affected_rows($connection) > 0) {
        $_SESSION['mensagem'] = 'Usuário atualizado com sucesso!';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Usuário não foi atualizado...';
        header('Location: index.php');
        exit;
    }

}

if (isset($_POST['delete_user'])) {
    $user_id = mysqli_real_escape_string($connection, $_POST['delete_user']);
    
    $sql = "DELETE FROM users WHERE id = '$user_id'";

    mysqli_query($connection, $sql);

    if(mysqli_affected_rows($connection) > 0) {
        $_SESSION['message'] = "Usuário deletado com sucesso!";
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['message'] = "Usuário não foi deletado!";
        header('Location: index.php');
        exit;
    }
}

?>