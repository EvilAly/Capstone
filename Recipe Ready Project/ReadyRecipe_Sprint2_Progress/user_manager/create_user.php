<?php include '../includes/header.php'; ?>
<?php include '../includes/left_column_all.php'; ?>
<main id="main">
    <h1>Create New User</h1>
    <form action="." method="post" id="aligned">
        <input type="hidden" name="action" value="add_user">
        
        <label>First Name:</label>
        <input type="text" name="firstName"><br>

        <label>Last Name:</label>
        <input type="text" name="lastName"><br>

        <label>Email Address:</label>
        <input type="text" name="email"><br>

        <label>Password:</label>
        <input type="password" name="pass"><br>
        
        <label>Re-Enter Password:</label>
        <input type="password" name="pass2"><br>
        
        <input type="submit" value="Create User">
    </form>
</main>
<?php include '../includes/footer.php'; ?>
