<?php include('header.php'); ?>

<div class="site-size">
    <div class="content">
        <h3 class="h3T center">Edit User <?php echo $user->name; ?></h3>
        <div class="top-link-wrapper">
            <a href="/">Back To Main Page</a>
        </div>
        <form method="post" action="/users/edit/<?php echo $user->id; ?>">
            <div class="form-control-item">
                <label for="user_name">User Name:</label>
                <input type="text" name="user_name" id="user_name" required value="<?php echo $user->name; ?>">
            </div>
            <div class="form-control-item">
                <label for="user_email">User Email:</label>
                <input type="email" name="user_email" id="user_email" required value="<?php echo $user->email; ?>">
            </div>
            <div class="form-control-item">
                <label for="country_id">User Email:</label>
                <select name="country_id" id="country_id">
                    <?php foreach ($countries as $country) { ?>
                        <option value="<?php echo $country->id; ?>" <?php  if ($country->id == $user->country_id) { echo ' selected '; } ?>><?php echo $country->country; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-control-item">
                <input type="submit" value="Save User">
            </div>
        </form>
    </div>
</div>

<?php include('footer.php'); ?>
