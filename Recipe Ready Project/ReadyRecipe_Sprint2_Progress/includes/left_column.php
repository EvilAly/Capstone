<aside id="sidebar">
    <div>
        <a href="/categories/breakfast">Breakfast</a><br>
        <a href="/categories/appetizer">Appetizer</a><br>
        <a href="/categories/dinner">Dinner</a><br>
        <a href="/categories/dessert">Dessert</a><br>
        <a href="/categories/search">Search Recipes</a><br>
    </div>
    <br>
    <br>
    <br>
    <div>
        <?php
        if (!isset($_SESSION['username'])) {
            include 'includes/logIn.php';
        } else {
            echo '<a href="user_manager/list">Shopping List</a>';
            echo '<a href="user_manager/saved">Saved Recipes</a>';
        }
        ?>

    </div>



</aside>
