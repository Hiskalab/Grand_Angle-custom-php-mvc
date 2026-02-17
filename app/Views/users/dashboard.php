<?php
    if (isset($_SESSION['id_user']) && $_SESSION['id_user'] == 1 && $_SESSION['role'] === 'Admin') {
        echo "<a href='?controller=admin&action=dashboard'>Admin</a>";
    }
?>
<a href="?controller=users&action=logout">Déconnexion</a>