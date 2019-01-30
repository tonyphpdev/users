<?php include('header.php'); ?>

<div class="site-size">
    <div class="content">
        <h3 class="h3T center">Add New User</h3>
        <div><a href="/">Back To Main Page</a></div>
        <form>
            <div>
                <label for="">User Name:</label>

                <input type="text" name="user_name" required>
            </div>
            <div>
                <label for="">User Email:</label>

                <input type="email" name="user_email" required>
            </div>

            <div>
                <label for="">User Email:</label>

                <select name="country_id">
                    <?php foreach ($countries as $country) { ?>
                    <option value="<?php echo $country->id; ?>"><?php echo $country->country; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div>
                <input type="submit" value="Save User">
            </div>
        </form>
    </div>
</div>

<?php include('footer.php'); ?>
