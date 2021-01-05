<?php
include_once '../include/header.php';
include_once './navbar.php';
include_once './session.php';
include '../db/db.class.php';

$db = new DB();


$users = "SELECT * FROM user";
$userList = $db->executeSelect($users);

$doctors = "SELECT * FROM doctor";
$doctorList = $db->executeSelect($doctors);
?>

<body class="login" style="background-image: url('../static/images/common.jpg');font-family:Helvetica, Arial,sans-serif">
    <div id="patient_info"></div>
    
    <!--update donar info modal-->
    <div class="modal fade" id="update_patient">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Update Patient Info</h3>
                </div>
                <div class="modal-body">
                    <label id="up_message" class="badge badge-pill badge-success"></label>
                    <form>
                        <input type="hidden" class="form-control my-3"  placeholder="patient id" id="up_patient_id">
                      
                        <select class="form-control my-3" id="up_patient_user_id">
                            <option value="-1">-- select user --</option>
                            <?php foreach ($userList as $user) { ?>
                                <option value="<?php echo $user['u_id'] ?>"><?php echo $user['u_name'] ?></option>
                            <?php } ?>
                        </select>
     
                        <select class="form-control my-3" id="up_patient_doctor_id">
                            <option value="-1">-- select doctor --</option>
                            <?php foreach ($doctorList as $doctor) { ?>
                                <option value="<?php echo $doctor['d_id'] ?>"><?php echo $doctor['d_name'] ?></option>
                            <?php } ?>
                        </select>
                        
                        <input type="text" class="form-control my-3" placeholder="Description" id="up_patient_description">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="up_patient_info">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="patient_close">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!--delete doctor info modal-->
     <div class="modal fade" id="delete_patient">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Delete Patient Info</h3>
                </div>
                <div class="modal-body">
                    <label id="delete_message" class="badge badge-pill badge-success"></label>
                    <label>Do you want to delete the record?</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="delete_patient_info">Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="patient_del_close">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

<?php include_once '../include/footer.php'; ?>



