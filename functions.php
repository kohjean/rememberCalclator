<?php 
function h($str) {
    return htmlspecialchars($str);
}

function get_header($title) {
    require_once("header.php");
}

function get_footer() {
    require_once("footer.php");
}

function mail_validate( $email ) {
    if( filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
        return true;
    } else {
        return false;
    }
}
?>