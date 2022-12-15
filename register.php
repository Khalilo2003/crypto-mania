<?php include "components/navbar.php" ;
checklogin();
// de functie controleert of het een post is als je wilt inloggen.
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    register();
}
?>

<div class="container mt-2">
    <form action="" method="POST" class="d-flex flex-column gap-3">
        <div class="form-group">
            <label>username</label>
            <input name="username" type="text" placeholder="Username" class="form-control">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input name="password" type="text" placeholder="Password" class="form-control">
        </div>
        <div class="form-group">
            <label>Again Password</label>
            <input name="againpassword"type="text" placeholder="Again Password" class="form-control">
        </div>
        <input type="submit" value="Register" class="btn btn-primary w-25">
    </form>
</div>
<?php include "components/footer.php" ?>