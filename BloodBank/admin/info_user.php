<?php
include_once '../include/header.php';
include_once './navbar.php';
include_once './session.php';
include '../db/db.class.php';

?>

<body class="login" style="background-image: url('../static/images/common.jpg');font-family:Helvetica, Arial,sans-serif">
    <div id="user_info"></div>
    
    <!--update user info modal-->
    <div class="modal fade" id="update_user">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Update User Info</h3>
                </div>
                <div class="modal-body">
                    <label id="up_message" class="badge badge-pill badge-success"></label>
                    <form>
                        <input type="hidden" class="form-control my-3"  placeholder="user id" id="up_user_id">
                        <input type="text" class="form-control my-3" placeholder="Name" id="up_user_name">
                        <input type="text" class="form-control my-3" placeholder="Contact" id="up_user_contact">
                        <input type="text" class="form-control my-3" placeholder="Email" id="up_user_email">
                        <input type="text" class="form-control my-3" placeholder="Address" id="up_user_address">
                        <input type="text" class="form-control my-3" placeholder="Bloodgroup" id="up_user_bloodgroup">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="up_user_info">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="user_close">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!--delete user info modal-->
     <div class="modal fade" id="delete_user">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Delete User Info</h3>
                </div>
                <div class="modal-body">
                    <label id="delete_message" class="badge badge-pill badge-success"></label>
                    <label>Do you want to delete the record?</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="delete_user_info">Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="user_del_close">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

<?php include_once '../include/footer.php'; ?>



