<?php
session_start();
require 'connection.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-4">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lista de usuários
                        <a href="user-create.php" class="btn btn-primary float-end">Adicionar usuário</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>NOME </th>
                                    <th>EMAIL </th>
                                    <th>DATA NASCIMENTO </th>
                                    <th>AÇÕES </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sql = 'SELECT * FROM users';
                                $users = mysqli_query($connection, $sql);
                                if (mysqli_num_rows($users) > 0) {
                                    foreach ($users as $user) {
                                ?>
                                <tr>
                                    <td><?= $user['id']?></td>
                                    <td><?= $user['name']?></td>
                                    <td><?= $user['email']?></td>
                                    <td><?= date('d/m/Y', strtotime($user['birth_date']))?></td>
                                    <td>
                                        <a href="user-view.php?id=<?=$user['id']?>" class="btn btn-secondary btn-sm"><span class="bi-eye-fill"></span> &nbsp;
                                         Visualizar</a>
                                        <a href="user-edit.php?id=<?=$user['id']?>" class="btn btn-success btn-sm"><span class="bi-pencil-fill"></span> &nbsp;
                                            Editar</a>
                                        <form action="actions.php" method="POST" class="d-inline">
                                            <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_user" value="<?=$user['id']?>" class="btn btn-danger btn-sm">
                                                <span class="bi-trash3-fill"></span>&nbsp;Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo '<h5> Nenhum usuário encontrado </h5>';
                                }
                                ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>