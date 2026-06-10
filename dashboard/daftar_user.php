<?php
include '../users.php';
include '../database.php';

$db = new Database();
$conn = $db->connect();
$users = new Users($conn);

$result = $users->getAllUsers();
$daftar_users = [];

if ($result && $result->num_rows > 0) {
    $daftar_users = $result->fetch_all(MYSQLI_ASSOC);
}
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<h2>Section title</h2>
          <div class="table-responsive small">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Asal</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              foreach ($daftar_users as $user) {
                ?>
                <tr>
                  <td><?= $user['id'] ?></td>
                  <td><?= $user['username'] ?></td>
                  <td><?= $user['email'] ?></td>
                  <td><?= $user['asal'] ?></td>
                  <td>
                    delete | edit
              </td>
              </tr>
                 <?php
                 } 
                 ?>
              </tbody>
            </table>
          </div>
        </main>