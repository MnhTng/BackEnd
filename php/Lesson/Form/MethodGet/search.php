<?php
function showArray($arr)
{
    if (is_array($arr)) {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
}

// showArray($_GET);

if (isset($_GET['btn_search'])) {
    $search = $_GET['q'];
    echo "<h1>Search results for: $search</h1>";
} else
    echo "<h1>No search results</h1>";