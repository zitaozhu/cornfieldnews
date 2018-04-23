

    <?php

    // Initialize the session

    session_start();
     
    // Unset all of the session variables

    $_SESSION = array();
     
    // Destroy the session.

    session_destroy();
     
    // Redirect to login page

    $previous = "javascript:history.go(-1)";
    if(isset($_SERVER['HTTP_REFERER'])) {
        $previous = $_SERVER['HTTP_REFERER'];
    }

    ?>


<html>
<body>

<a href="<?= $previous ?>">Back</a>

</body>
</html>