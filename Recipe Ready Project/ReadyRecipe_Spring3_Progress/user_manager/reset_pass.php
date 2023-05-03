<?php include '../includes/header.php'; ?>
<?php include '../includes/left_column_all.php'; ?>
<main id="main">

    <p>Please enter your email address you signed up with and your new password.</p>
    <br>
    <form action="reset" method="post">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">New Password:</label>
            <input type="password" id="password" name="pass" required>
        </div>
        <div>
            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" id="confirm_password" name="pass2" required>
        </div>
        <input type="submit" value="Reset Password">
    </form>

</main>
<?php include '../includes/footer.php'; ?>
