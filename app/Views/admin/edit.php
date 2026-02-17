<?php var_dump($user) ?>
<a href="?controller=admin&action=users">Back</a>
<form action="?controller=admin&action=edit" method="POST">
    <input type="hidden" name="id_user" value="<?= $user->getId_user(); ?>">
    Username : <input type="text" name="username" value="<?= $user->getUsername(); ?>">
    Email : <input type="text" name="email" value="<?= $user->getEmail(); ?>">

</form>