<?php
/**
 * The main template file
 * @author Arnaud Martin
 */

if(is_404()){
    include('templates/generics/404.php');
}
else if(is_archive()){
    include('templates/generics/archive.php');
}
else if(is_single()){
    include('templates/generics/single.php');
}
else if(is_search()){
    include('templates/generics/search.php');
}
else if(is_comment_feed()){
    include('templates/generics/comments.php');
}
else {
    include('templates/generics/default.php');
}

?>
