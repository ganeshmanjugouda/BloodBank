<?php
include_once '../include/header.php';
include_once './navbar.php';
include_once './session.php';
require_once '../db/db.class.php';


$db = new DB();


$users = "SELECT * FROM user";
$userList = $db->executeSelect($users);

$doctors = "SELECT * FROM doctor";
$doctorList = $db->executeSelect($doctors);
?>

<body class="login" style="background-image: url('../static/images/common.jpg');font-family:Helvetica, Arial,sans-serif">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center form-control badge-info font-weight-bold">New Patient Registration</h1>
                        <hr>
                        <form action="actions.php" method="post" id="formAddPatient" enctype="multipart/form-data">
                            <input type="hidden" name="command" value="addPatient"/>

                            <div class="form-group">
                                <select class="form-control" id="userid" name="userid">
                                    <option value="-1">-- Select User --</option>
                                    <?php foreach ($userList as $user) { ?>
                                        <option value="<?php echo $user['u_id'] ?>"><?php echo $user['u_name'] ?></option>

                                    <?php } ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <select class="form-control" id="doctorid" name="doctorid">
                                    <option value="-1">-- Select Doctor --</option>
                                    <?php foreach ($doctorList as $doctor) { ?>
                                        <option value="<?php echo $doctor['d_id'] ?>"><?php echo $doctor['d_name'] ?></option>

                                    <?php } ?>
                                </select>

                            </div>


                            <div class="form-group">
                                <textarea class="form-control" id="description" name="decription"
                                          rows="5" placeholder=" Patient Description" required></textarea>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-secondary btn-block" type="submit">Save Patient</button>
                            </div>
                            <?php
                            if (isset($_SESSION['success']) != '') {
                                ?>
                                <div class="form-group">
                                    <label class="form-control badge-info text-center" ><?php echo $_SESSION['success']; ?></label>
                                </div>
                                <?php
                            }
                            unset($_SESSION['success']);
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php include_once '../include/footer.php'; ?>
