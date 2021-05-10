<?php
session_start();
// date_default_timezone_set('Asia/Kolkata');
// if(isset($_SESSION['username'])){
//     $_SESSION['msg']="You must login first to view this page";
//     header("location:login.php");
// }
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location:login.php');
}
echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home Page</title>
    </head>
    <body>
        <h1>This is the home </h1>
        <?php
        if(isset($_SESSION['success'])):    ?>
        
        <div>
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
<?php endif ?>

// If the user logs in print information about him

<?php if(isset($_SESSION['username'])):?>
    <h3>Welcome <strong><?php echo $_SESSION['username'];?></strong></h3>
    <button ><a href="log.php?logout='1'">Logout </a></button>
    <?php endif ?>
<br>
<?php
// Return current date from the remote server
$date = date('d-m-y h:i:s');
echo $date."<br><br>";
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l")."<br><br>";

if (date_default_timezone_get()) {
    echo 'date_default_timezone_set: ' . date_default_timezone_get() . '<br />';
}

if (ini_get('date.timezone')) {
    echo 'date.timezone: ' . ini_get('date.timezone'). '<br />';
}



?>
</body>
</html>
