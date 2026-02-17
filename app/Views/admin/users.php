<p>Collaborateur</p>
<a href="?controller=users&action=dashboard">Home</a>
<a href="?controller=admin&action=addUser">Ajouter un Collaborateur</a>

<?php if(!empty($users)): ?>
<table border="1">
<tr><th>ID</th><th>Login</th><th>Email</th><th>Rôle</th></tr>
<?php foreach($users as $user): ?>
<tr>
    <td><?= htmlspecialchars($user->getId_user()) ?></td>
    <td><?= htmlspecialchars($user->getUsername()) ?></td>
    <td><?= htmlspecialchars($user->getEmail()) ?></td>
    <td><?= htmlspecialchars($user->getRole()) ?></td>
    <td>
        <form action="?controller=admin&action=delete" method="POST" style="display:inline;">
            <input type="hidden" name="id_user" value="<?= $user->getId_user() ?>">
            <button type="submit">Supprimer</button>
        </form>
    </td>
    <td>
        <a href="index.php?controller=admin&action=edit&id_user=<?= $user->getId_user() ?>"><button>Modifier</button></a>
    </td>
</tr>
<?php endforeach; ?>
</table>
<?php else: ?>
<p>Aucun utilisateur trouvé</p>
<?php endif; ?>