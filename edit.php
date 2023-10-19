<?php
include_once 'classes/Register.php';
include_once 'header.php';

$re = new Register();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_POST['submit'])) {
    $register = $re->editfromData($_POST, $id);
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
                            <h2>EDIT STUDENTS</h2>
                        </div>
                        <div class="col-md-6">
                            <a href="index.php" class="btn btn-sm btn-info" style="float: right;">STUDENTS</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <?php

                    $students = $re->allDataById($id);

                    if ($students) {
                        foreach ($students as $student) {

                    ?>

                            <form method="post">
                                <div class="name">
                                    <label class="mb-1" for="name">Name</label>
                                    <input value="<?= $student['name'] ?>" type="text" name="name" id="name" class="form-control">
                                </div>
                                <div class="email mt-2">
                                    <label class="mb-1" for="email">Email</label>
                                    <input value="<?= $student['email'] ?>" type="email" name="email" id="email" class="form-control">
                                </div>
                                <div class="phone mt-2">
                                    <label class="mb-1" for="phone">Phone</label>
                                    <input value="<?= $student['phone'] ?>" type="phone" name="phone" id="phone" class="form-control">
                                </div>
                                <div class="address mt-2">
                                    <label class="mb-1" for="address">address</label>
                                    <textarea name="address" id="address" class="form-control"><?= $student['address'] ?></textarea>
                                </div>
                                <div class="button mt-2">
                                    <input type="submit" name="submit" value="SUBMIT" class=" btn btn-sm btn-primary round-1 form-control">
                                </div>
                            </form>

                    <?php

                        }
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>