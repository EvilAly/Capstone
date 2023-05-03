<aside id="sidebar">
    <div>
        <!-- links to each of the search options available -->
        <a href="../categories/index.php?action=" data-action="breakfast">Breakfast</a><br>
        <a href="../categories/index.php?action=" data-action="appetizer">Appetizer</a><br>
        <a href="../categories/index.php?action=" data-action="dinner">Dinner</a><br>
        <a href="../categories/index.php?action=" data-action="dessert">Dessert</a><br>
        <a href="../categories/index.php?action=" data-action="all">All Recipes</a><br>

        <script>
            // Retrieve all the <a> tags that have a data-action attribute
            const links = document.querySelectorAll('a[data-action]');

            // Loop through all the <a> tags and add a click event listener to each one
            links.forEach(link => {
                link.addEventListener('click', (event) => {
                    event.preventDefault(); // Prevent the default link behavior

                    // Retrieve the value of the data-action attribute
                    const action = link.getAttribute('data-action');

                    // Create a new form element
                    const form = document.createElement('form');
                    form.method = 'post';
                    form.action = '../categories/index.php';

                    // Create a hidden input field and set its value to the action parameter
                    const actionInput = document.createElement('input');
                    actionInput.type = 'hidden';
                    actionInput.name = 'action';
                    actionInput.value = action;

                    // Append the hidden input field to the form
                    form.appendChild(actionInput);

                    // Append the form to the document and submit it
                    document.body.appendChild(form);
                    form.submit();
                });
            });
        </script>

        <a href="../search/search.php">Search Recipes</a><br>

    </div>
    <br>
    <br>
    <br>
    <div>
        <!-- If/Else statement that will show the log in box if user is not logged in,
        but will show links to their shopping list and saved recipes if they are logged in.-->
        <?php
        if (!isset($_SESSION['username'])) {
            include '../includes/logIn.php';
        } else {
            echo '<a href="../user_manager/list">Shopping List</a>';
            echo '<a href="../user_manager/saved">Saved Recipes</a>';
        }
        ?>

    </div>



</aside>
