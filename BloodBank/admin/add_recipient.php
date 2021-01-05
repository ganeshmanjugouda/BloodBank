<?php
include_once '../include/header.php';
include_once './navbar.php';
include_once './session.php';
require_once '../db/db.class.php';

$db = new DB();

$users = "SELECT user.u_name AS pname, patient.p_user_id AS pid FROM user JOIN patient ON patient.p_user_id = user.u_id";
$userList = $db->executeSelect($users);
?>

<body class="login" style="background-image: url('../static/images/common.jpg');font-family:Helvetica, Arial,sans-serif">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center form-control badge-info font-weight-bold">New Recipient</h1>
                        <hr>
                        <form action="actions.php" method="post" id="formAddRecipient" enctype="multipart/form-data">
                            <input type="hidden" name="command" value="addRecipient"/>

                            <div class="form-group">
                                <select class="form-control" id="userid" name="userid">
                                    <option value="-1">-- Select Patient --</option>
                                    <?php foreach ($userList as $user) { ?>
                                        <option value="<?php echo $user['pid'] ?>"><?php echo $user['pname'] ?></option>

                                    <?php } ?>
                                </select>

                            </div>

                            <div class="form-group">
                                <textarea class="form-control" id="description" name="decription"
                                          rows="5" placeholder="Description if Any" required></textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="quantity" name="quantity"
                                       placeholder="Quantity (in ml)" autocomplete="off" required/>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-secondary btn-block" type="submit">Save Recipient</button>
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


