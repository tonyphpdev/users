<?php include('header.php'); ?>

<div class="site-size">
    <div class="content">
        <div class="top-link-wrapper">
            <a href="/users/add">New User</a>
        </div>
        <table>
            <tr>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Country</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($users as $user) { ?>
            <tr>
                <td><?php echo $user->name; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->country_name[0]->country; ?></td>
                <td>
                    <a href="/users/edit/<?php echo $user->id; ?>">Edit User</a>
                    <a href="#" onclick="if (confirm('Delete user?')) document.location = '/users/delete/<?php echo $user->id; ?>'">Delete User</a>
                </td>
            </tr>
            <? } ?>
        </table>
    </div>
</div>

<?php include('footer.php'); ?>