<?php
include_once '../include/header.php';
include_once './navbar.php';
include_once './session.php';
include '../db/db.class.php';

?>

<body class="login" style="background-image: url('../static/images/common.jpg');font-family:Helvetica, Arial,sans-serif">
    <div id="doctor_info"></div>
    
    <!--update doctor info modal-->
    <div class="modal fade" id="update_doctor">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Update Doctor Info</h3>
                </div>
                <div class="modal-body">
                    <label id="up_message" class="badge badge-pill badge-success"></label>
                    <form>
                        <input type="hidden" class="form-control my-3"  placeholder="Docotr id" id="up_doctor_id">
                        <input type="text" class="form-control my-3" placeholder="Name" id="up_doctor_name">
                        <input type="text" class="form-control my-3" placeholder="Contact" id="up_doctor_contact">
                        <input type="text" class="form-control my-3" placeholder="Email" id="up_doctor_email">
                        <input type="text" class="form-control my-3" placeholder="Address" id="up_doctor_address">
                        <input type="text" class="form-control my-3" placeholder="Specialization" id="up_doctor_specialization">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="up_doctor_info">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="doctor_close">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!--delete doctor info modal-->
     <div class="modal fade" id="delete_doctor">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Delete Doctor Info</h3>
                </div>
                <div class="modal-body">
                    <label id="delete_message" class="badge badge-pill badge-success"></label>
                    <label>Do you want to delete the record?</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="delete_doctor_info">Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="doctor_del_close">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

<?php include_once '../include/footer.php'; ?>



