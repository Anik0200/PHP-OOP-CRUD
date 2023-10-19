<?php
include_once 'classes/Register.php';
include_once 'header.php';

$re = new Register();

if (isset($_GET['delid'])) {
    $register =  $re->deleteData($_GET['delid']);
}

?>

<div class="container" id="section_register">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
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
                            <h2>STUDENTS INFO</h2>
                        </div>
                        <div class="col-md-6">
                            <a href="registerForm.php" class="btn btn-sm btn-info" style="float: right;">ADD STUDENTS</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $allStudents = $re->allData();

                            if ($allStudents) {
                                foreach ($allStudents as $student) {
                            ?>

                                    <tr>
                                        <td scope="row"><?= $student['id'] ?></td>
                                        <td scope="row"><?= $student['name'] ?></td>
                                        <td scope="row"><?= $student['email'] ?></td>
                                        <td scope="row"><?= $student['address'] ?></td>
                                        <td scope="row"><?= $student['phone'] ?></td>
                                        <td scope="row">
                                            <a href="edit.php?id=<?= $student['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                            <a href="?delid=<?= $student['id'] ?>" class="btn btn-sm btn-outline-danger">Del</a>
                                        </td>
                                    </tr>

                            <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<?php
include_once 'footer.php';
?>