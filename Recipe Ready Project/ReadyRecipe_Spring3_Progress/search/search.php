<?php include '../includes/search_header.php'; ?>
<?php include '../includes/left_search.php'; ?>
<main id="main">

    <form action="index.php" method="POST">
        <input type="hidden" name="action" value="search">
        
        <p>Please select your search feature:</p><br>
        <label><input type="radio" name="searchType" value="recName" onclick="toggleFields()">Recipe Name</label>
        <label><input type="radio" name="searchType" value="ingredient" onclick="toggleFields()">Ingredient</label>
        <label><input type="radio" name="searchType" value="calories" onclick="toggleFields()">Calories</label>
        <label><input type="radio" name="searchType" value="fat" onclick="toggleFields()">Fat</label>
        <label><input type="radio" name="searchType" value="cholesterol" onclick="toggleFields()">Cholesterol</label>
        <label><input type="radio" name="searchType" value="sodium" onclick="toggleFields()">Sodium</label><br>
        <label><input type="radio" name="searchType" value="carbohydrates" onclick="toggleFields()">Total Carbohydrates</label>
        <label><input type="radio" name="searchType" value="sugar" onclick="toggleFields()">Sugar</label>
        <label><input type="radio" name="searchType" value="calcium" onclick="toggleFields()">Calcium</label>
        <label><input type="radio" name="searchType" value="protein" onclick="toggleFields()">Protein</label>
        <br><br>
        <div id="textField1" style="display:none">
            <p>Please enter the full, or partial, name of the recipe you are looking for.</p>
            <label>Recipe Name:</label>
            <input type="text" name="recipeName">
           
        </div>
        <div id="textField2" style="display:none">
            <p>Please enter which ingredient you would like to search for.</p>
            <label>Ingredient:</label>
            <input type="text" name="ingredientName">
        </div>
        <div id="textField3" style="display:none">
            <p>Please enter the minimum and maximum number of calories.</p>
            <label>Minimum:</label>
            <input type="text" name="calMin">
            <br>
            <label>Maximum:</label>
            <input type="text" name="calMax">
        </div>
        <div id="textField4" style="display:none">
            <p>Please enter numbers without the grams (g) (i.e. 4.7 ).</p>
            <label>Minimum:</label>
            <input type="text" name="gramsMin">
            <br>
            <label>Maximum:</label>
            <input type="text" name="gramsMax">
        </div>
        <div id="textField5" style="display:none">
            <p>Please enter numbers without the milligrams (mg) (i.e. 57 ).</p>
            <label>Minimum:</label>
            <input type="text" name="mgMin">
            <br>
            <label>Maximum:</label>
            <input type="text" name="mgMax">
        </div>
        <br>
        <input type="submit" name="submit" value="Submit">

    </form>

</main>
<?php include '../includes/footer.php'; ?>
