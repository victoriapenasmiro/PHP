<?php

// count all contacts
$total_rows = $contacto->allContacts();

// calculate total number of pages
$total_pages = ceil($total_rows / $records_per_page);

echo "<ul class=\"pagination\">";
 
// button for first page
if($page>1){
    echo "<li><a href='{$page_url}' title='Go to the first page.'>";
        echo "First Page";
    echo "</a></li>";
}
 
for ($x=0; $x<=$total_pages; $x++) {
 
    // be sure '$x is greater than 0' AND 'less than or equal to the $total_pages'
    if (($x > 0) && ($x <= $total_pages)) {
 
        // current page
        if ($x == $page) {
            echo "<li class='active'><a href=\"#\">$x</a></li>";
        } 
 
        // not current page
        else {
            echo "<li><a href='{$page_url}page=$x'>$x</a></li>";
        }
    }
}

// button for last page
if($page<$total_pages){
    echo "<li><a href='" .$page_url . "page={$total_pages}' title='Last page is {$total_pages}.'>";
        echo "Last Page";
    echo "</a></li>";
}

echo "</ul>";

