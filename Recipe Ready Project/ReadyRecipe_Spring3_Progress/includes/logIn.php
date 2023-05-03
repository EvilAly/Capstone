<form id="login" method="post" action="login.php">
    <label>User Login</label><br>
    <br><label><b>Email Address
        </b>
    </label>
    <input type="text" name="user" id="user" placeholder="Email Address">
    <br><br>
    <label><b>Password
        </b>
    </label>
    <input type="password" name="password" id="pass" placeholder="Password">
    <br><br>

    <input type="hidden" name="action" value="log_in">
    <input type="submit" value="Log In">


    <br><br>
    <a href="user_manager/rest_pass.php">Forgot Password</a>
    <a href="user_manager/create_user.php">New User?</a>
</form>
