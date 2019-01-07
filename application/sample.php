<?php

include '../system/config.php';
/**
 * Created by PhpStorm.
 * User: neilg
 * Date: 1/5/2019
 * Time: 5:12 PM
 */

if(isset($_POST['login'])){
    if($_POST['username'] == 1 and $_POST['password'] == 1){
        flash('Sample', 'This is a sample message');
        redirect('sample.php');
        exit();
    } else{
        flash('Sample', 'Error');
    }
}



?>


<html>
<head>

</head>
<body>
<form action="" method="POST">
    <div><?php flash('Sample'); ?></div>
    <input type="text" name="username" />
    <input type="password" name="password" />
    <input type="submit" name="login" value="Login" />
</form>
<?php
if(isset($error))
{
    foreach($error as $error)
    {
        ?>
        <script>
            toastr.options.timeOut = "5000";
            toastr.options.closeButton = true;
            toastr.options.positionClass = 'toast-top-right';
            toastr['error']('<?php echo $error; ?>');

        </script>
    <?php }}

    ?>

<?php if(isset($_SESSION['toastr'])){
    echo $_SESSION['toastr'];
    ?>
    <script>
        toastr.options.timeOut = "5000";
        toastr.options.closeButton = true;
        toastr.options.positionClass = 'toast-top-right';
        toastr['success']('<?php echo $_SESSION['toastr']['message']; ?>');
        <?php  unset($_SESSION['toastr']); ?>
    </script>
    <?php
} ?>
</body>
</html>
