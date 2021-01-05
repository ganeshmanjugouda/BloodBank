<?php
include_once '../include/header.php';
include_once './navbar.php';
include_once './session.php';
?>

<body class="login" style="background-image: url('../static/images/common.jpg');font-family:Helvetica, Arial,sans-serif">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center form-control badge-info font-weight-bold">New User</h1>
                        <hr>
                        <form action="actions.php" method="post" id="formAddUser" enctype="multipart/form-data">
                            <input type="hidden" name="command" value="addUser"/>

                            <div class="form-group">
    <!--                            <select class="form-control" id="place" name="place">
                                    <option value="-1">-- Select Place --</option>
                                <?php foreach ($places as $place) { ?>
                                                                                                                                                                                                <option value="<?php echo $place['place_rid']; ?>"><?php echo $place['name']; ?></option>
                                <?php } ?>
                                </select>-->
                                <input type="text" id="username" name="username" placeholder="Name"
                                       autocomplete="off" class="form-control" required/>
                            </div>

                            <div class="form-group">
                                <input class="form-control" id="contactno" name="contactno"
                                       placeholder="Contact No" autocomplete="off" required/>
                            </div>

                            <div class="form-group">
                                <input class="form-control" id="mallAddress" name="mailid"
                                       placeholder="EmailID" autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" id="address" name="address"
                                          rows="5" placeholder="Address" required></textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="bloodgrpup" name="bloodgrpup"
                                       placeholder="Blood Group" autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-secondary btn-block" type="submit">Save User</button>
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
