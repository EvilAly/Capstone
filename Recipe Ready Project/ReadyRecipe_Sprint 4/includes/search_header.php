<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ready Recipes</title>
        <link type="text/css" rel="stylesheet" href="/ReadyRecipe/main.css">
<!-- Script that changes the text fields based on the radio search parameter selected. -->
        <script>
            function toggleFields() {
                var radio = document.getElementsByName("searchType");
                var textField1 = document.getElementById("textField1");
                var textField2 = document.getElementById("textField2");
                var textField3 = document.getElementById("textField3");
                var textField4 = document.getElementById("textField4");
                var textField5 = document.getElementById("textField5");
                   //radio[0] is for recipe name
                if (radio[0].checked) {
                    textField1.style.display = "block";
                    textField2.style.display = "none";
                    textField3.style.display = "none";
                    textField4.style.display = "none";
                    textField5.style.display = "none";
                } //radio[1] is to search for an ingredient
                else if (radio[1].checked) {
                    textField1.style.display = "none";
                    textField2.style.display = "block";
                    textField3.style.display = "none";
                    textField4.style.display = "none";
                    textField5.style.display = "none";
                } //all other radios will be for nutritional values
                //nutritional values will have a min and max value
                //if radio for calories is checked
                else if (radio[2].checked) {
                    textField1.style.display = "none";
                    textField2.style.display = "none";
                    textField3.style.display = "block";
                    textField4.style.display = "none";
                    textField5.style.display = "none";
                } //if radios for items measured in grams is selected
                else if (radio[3].checked || radio[6].checked || radio[7].checked || radio[9].checked) {
                    textField1.style.display = "none";
                    textField2.style.display = "none";
                    textField3.style.display = "none";
                    textField4.style.display = "block";
                    textField5.style.display = "none";
                }
                else {
                    textField1.style.display = "none";
                    textField2.style.display = "none";
                    textField3.style.display = "none";
                    textField4.style.display = "none";
                    textField5.style.display = "block";
                }
            }
        </script>

    </head>
    <body>
        <h1>Ready Recipes</h1>
        <h3>The Recipe site that lets you get straight to cooking!</h3>