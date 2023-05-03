<?php include '../includes/header.php'; ?>
<?php include '../includes/left_other.php'; ?>
<main id="main">

    <p>Please enter your email address you signed up with and your new password.</p>
    <br>
    <form action="." method="post" id="aligned">
        <input type="hidden" name="action" value="reset">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">New Password:</label>
            <input type="password" id="pass" name="pass" required>
        </div>
        <div>
            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" id="pass2" name="pass2" required>
        </div>
        <input type="submit" value="Reset Password">
    </form>

</main>
<?php include '../includes/footer.php'; ?>
