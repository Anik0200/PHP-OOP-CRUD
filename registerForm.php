<?php
include_once 'classes/Register.php';
include_once 'header.php';

$re = new Register();

if (isset($_POST['submit'])) {
    $register = $re->fromData($_POST);

}

?>

<div class="container" id="section_register">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card shadow">

                <?php
                if (isset($register)) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><?= $register ?></strong>
                    </div>
                <?php
                }
                ?>

                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>ADD STUDENTS</h2>
                        </div>
                        <div class="col-md-6">
                            <a href="index.php" class="btn btn-sm btn-info" style="float: right;">STUDENTS</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="name">
                            <label class="mb-1" for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="email mt-2">
                            <label class="mb-1" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="phone mt-2">
                            <label class="mb-1" for="phone">Phone</label>
                            <input type="phone" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="address mt-2">
                            <label class="mb-1" for="address">address</label>
                            <textarea name="address" id="address" class="form-control"></textarea>
                        </div>
                        <div class="button mt-2">
                            <input type="submit" name="submit" value="SUBMIT" class=" btn btn-sm btn-primary round-1 form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>