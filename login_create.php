<?php include "db.php"; ?>
<?php include "functions.php"; ?>

<?php
    if(isset($_POST['submit'])){
        createRows();
    }
?>

<?php include "includes/header.php"; ?>

    <div class="container">
        <div class="col-sm-4">
            <h1 class="text-center">Create</h1>
            <form action="login_create.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password">
                </div>
                <br>
                <input class="btn btn-primary" type="submit" name="submit" value="Create">
            </form>
        </div>
    </div>
<?php include "includes/footer.php"; ?>