<?php

function get_category($cat_id) {
    global $db;
    $query = "SELECT * FROM recipe 
        WHERE catID = '$cat_id'";
    $result = $db->query($query);
    $category = $result->fetch_assoc();
    $result->free();
    return $category;
        
    }
    


    
