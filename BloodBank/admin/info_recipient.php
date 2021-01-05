<?php
include_once '../include/header.php';
include_once './navbar.php';
include_once './session.php';
include '../db/db.class.php';

$db = new DB();

$users = "SELECT user.u_name AS pname, patient.p_user_id AS pid FROM user JOIN patient ON patient.p_user_id = user.u_id";
$userList = $db->executeSelect($users);
?>

<body class="login" style="background-image: url('../static/images/common.jpg');font-family:Helvetica, Arial,sans-serif">
    <div id="recipient_info"></div>
    
    <!--update recipient info modal-->
    <div class="modal fade" id="update_recipient">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Update recipient Info</h3>
                </div>
                <div class="modal-body">
                    <label id="up_message" class="badge badge-pill badge-success"></label>
                    <form>
                        <input type="hidden" class="form-control my-3"  placeholder="recipient id" id="up_recipient_id">
                      
                        <select class="form-control my-3" id="up_recipient_user_id" name="userid">
                            <option value="-1">-- Select Patient --</option>
                            <?php foreach ($userList as $user) { ?>
                                <option value="<?php echo $user['pid'] ?>"><?php echo $user['pname'] ?></option>

                            <?php } ?>
                        </select>
                        
                        <input type="text" class="form-control my-3" placeholder="Description" id="up_recipient_description">
                        <input type="text" class="form-control my-3" placeholder="Blood quantity" id="up_recipient_quantity">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="up_recipient_info">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="recipient_close">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!--delete recipient info modal-->
     <div class="modal fade" id="delete_recipient">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Delete Recipient Info</h3>
                </div>
                <div class="modal-body">
                    <label id="delete_message" class="badge badge-pill badge-success"></label>
                    <label>Do you want to delete the record?</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="delete_recipient_info">Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="recipient_del_close">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

<?php include_once '../include/footer.php'; ?>



