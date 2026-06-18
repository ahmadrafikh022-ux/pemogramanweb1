<?php
include '../users.php';
include '../database.php';

$db = new Database();
$conn = $db->connect();
$users = new User($conn);

$result = $users->getAllUsers();
$daftar_user = $result->fetch_all(MYSQLI_ASSOC);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<h2>Daftar User</h2>
<a href="index.php?halaman=tambah_user_form" class="btn btn-primary mb-3">Tambah User</a>

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
              foreach ($daftar_user as $user) {
                ?>
                <tr>
                  <td><?= $user['id'] ?></td>
                  <td><?= $user['username'] ?></td>
                  <td><?= $user['email'] ?></td>
                  <td><?= $user['asal'] ?></td>
                  <td>
                   <a href="delete_users.php?id=<?= $user['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Delete</a>
                   <a href="index.php?halaman=edit_user_form&id=<?= $user['id'] ?>"  class="btn btn-success btn-sm <?= (isset($_GET['id']) && $user['id'] == $_GET['id']) ? 'disabled' : '' ?>">Edit</a>
              </td>
              </tr>
                 <?php
                 } 
                 ?>
              </tbody>
            </table>
          </div>
        </main>