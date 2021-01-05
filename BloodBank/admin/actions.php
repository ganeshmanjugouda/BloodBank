<?php

//xdebug_break();

require_once './session.php';
require_once '../db/db.class.php';

$db = new DB();

$message = array();



try {

    if (isset($_POST['command'])) {
    
    $command = $_POST['command'];


    if ('addDoctor' == $command) {
        $name = $_POST['doctorname'];
        $contactno = $_POST['contactno'];
        $mailid = $_POST['mailid'];
        $address = $_POST['address'];
        $specialization = $_POST['specialization'];


        $insertDctor = "INSERT INTO doctor(d_name, d_contactno, d_email, d_address, d_specialization)"
                . " VALUES('$name', '$contactno', '$mailid', '$address', '$specialization')";

        $db->executeInsertAndGetId($insertDctor);
        $_SESSION['success'] = ' Doctor Added Successfully';
        header("location: add_doctor.php");
    }
    else if ('addUser' == $command){

        $name = $_POST['username'];
        $contactno = $_POST['contactno'];
        $mailid = $_POST['mailid'];
        $address = $_POST['address'];
        $bloodgrpup = $_POST['bloodgrpup'];


        $insertUser = "INSERT INTO user(u_name, u_contact, u_email, u_address, u_bloodgroup)"
                . " VALUES('$name', '$contactno', '$mailid', '$address', '$bloodgrpup')";


        $db->executeInsertAndGetId($insertUser);
        $_SESSION['success'] = 'User Added Successfully';
        header("location: add_user.php");

    } 
    else if ('addDonar' == $command){

        $userid = $_POST['userid'];
        $donardoctor = $_POST['doctor'];

        $description = $_POST['decription'];
        $quantity = $_POST['quantity'];


        $insertDonar = "INSERT INTO donar(donar_user_id, donar_doctor_id, datetime, donar_description,d_quantity)"
                . " VALUES('$userid', '$donardoctor', NOW(),'$description','$quantity')";


        $db->executeInsertAndGetId($insertDonar);
        $_SESSION['success'] = 'Donar Added Successfully';
        header("location: add_donar.php");

    } 
    else if ('addPatient' == $command) {

        $userid = $_POST['userid'];
        $doctorsid = $_POST['doctorid'];
        $description = $_POST['decription'];


        $insertpatient = "INSERT INTO patient(p_user_id, p_doctor_id, p_description, p_datetime)"
                . " VALUES('$userid', '$doctorsid', '$description',NOW())";


        $db->executeInsertAndGetId($insertpatient);
        $_SESSION['success'] = 'Patient Added Successfully';
        header("location: add_patient.php");
    } 
    else if ('addRecipient' == $command) {

        $userid = $_POST['userid'];
        $description = $_POST['decription'];
        $quantity = $_POST['quantity'];
        

        $insertrecipient = "INSERT INTO recipient(r_patient_id, r_datetime, r_description, r_quantity)"
                . " VALUES('$userid',NOW(), '$description','$quantity')";
        
        
        $db->executeInsertAndGetId($insertrecipient);
        $_SESSION['success'] = 'Recipient Added Successfully';
        header("location: add_recipient.php");
    }
} else {
    throw new Exception("Invalid HTTP request");
    }
} catch (Exception $ex) {

}

//viewing doctor info in table
function view_doctor_info()
{
    global $db;
    $value = "";
    $value = '<table class="table table-responsive-sm text-center table-striped table-bordered" style="background-color: white" >
    <thead class="thead-dark">
        <tr class="font-weight-bold">
            <th>Id</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Address</th>
            <th>Specialization</th>
            <th colspan="2">Action</th>
        </tr>';
    $doctors = "SELECT * FROM doctor";
    $doctorList = $db->executeSelect($doctors);
    foreach ($doctorList as $row)
    {
        $value.= '<tr>
            <td>'.$row['d_id'].'</td>
            <td>'.$row['d_name'].'</td>
            <td>'.$row['d_contactno'].'</td>
            <td>'.$row['d_email'].'</td>
            <td>'.$row['d_address'].'</td>
            <td>'.$row['d_specialization'].'</td>
            <td>
                <button class="btn btn-success" id="update_doctor_info" doctor-id='.$row['d_id'].'><span class="fa fa-edit"></span></button>
            </td>
            <td>
                <button class="btn btn-danger" id="del_doctor" data-doctor-id='.$row['d_id'].'><span class="fa fa-trash"></span></button>
            </td>
        </tr>';
    }
    $value.='</table>';
    echo json_encode(['status'=>'success','html'=>$value]);
}

//loading doctor info to update
function load_doctor_info()
{
    global $db;
    $doctor_id = $_POST['doctor_id'];
    $query = "select * from doctor where d_id = '$doctor_id'";
    $d_id = $db->executeSelect($query);
    foreach ($d_id as $row)
    {
        $doctor_data[0] = $row['d_id'];
        $doctor_data[1] = $row['d_name'];
        $doctor_data[2] = $row['d_contactno'];
        $doctor_data[3] = $row['d_email'];
        $doctor_data[4] = $row['d_address'];
        $doctor_data[5] = $row['d_specialization'];
    }
    echo json_encode($doctor_data);
}

//updating the doctor info
function update_doctor_info()
{
    global $db;
    $doctor_id = $_POST['doctor_id'];
    $doctor_name = $_POST['doctor_name'];
    $doctor_contact = $_POST['doctor_contact'];
    $doctor_email = $_POST['doctor_email'];
    $doctor_address = $_POST['doctor_adress'];
    $doctor_specialization = $_POST['doctor_specialization'];
    
    $query = "update doctor set d_name = '$doctor_name', d_contactno ='$doctor_contact', d_email = '$doctor_email', "
            . "d_address ='$doctor_address', d_specialization ='$doctor_specialization' where d_id = '$doctor_id'" ;
    
    $result = $db->executeUpdate($query);
    if($result)
    {
        echo 'Update Success';
    }
    else 
    {
        echo 'Update Fail';
    }
}

//deleting doctor record
function delete_doctor_info()
{
    global $db;
    
    $del_doctor_id = $_POST['del_doctor_id'];
    $query = "DELETE from doctor where d_id = '$del_doctor_id'";
    $result = $db->executeUpdate($query);
    
    if($result)
    {
        echo 'Your record has been deleted';
    }
    else 
    {
        echo 'Record not deleted'; 
    }
}



//viewing user info in table
function view_user_info()
{
    global $db;
    $value = "";
    $value = '<table class="table table-responsive-sm text-center table-striped table-bordered" style="background-color: white" >
    <thead class="thead-dark">
        <tr class="font-weight-bold">
            <th>Id</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Address</th>
            <th>Blood Group</th>
            <th colspan="2">Action</th>
        </tr>';
    $users = "SELECT * FROM user";
    $userList = $db->executeSelect($users);
    foreach ($userList as $row)
    {
        $value.= '<tr>
            <td>'.$row['u_id'].'</td>
            <td>'.$row['u_name'].'</td>
            <td>'.$row['u_contact'].'</td>
            <td>'.$row['u_email'].'</td>
            <td>'.$row['u_address'].'</td>
            <td>'.$row['u_bloodgroup'].'</td>
            <td>
                <button class="btn btn-success" id="update_user_info" data-id='.$row['u_id'].'><span class="fa fa-edit"></span></button>
            </td>
            <td>
                <button class="btn btn-danger" id="del_user" data-user-id='.$row['u_id'].'><span class="fa fa-trash"></span></button>
            </td>
        </tr>';
    }
    $value.='</table>';
    echo json_encode(['status'=>'success','html'=>$value]);
}


//loading user info to update
function load_user_info()
{
    global $db;
    $user_id = $_POST['user_id'];
    $query = "select * from user where u_id = '$user_id'";
    $u_id = $db->executeSelect($query);
    foreach ($u_id as $row)
    {
        $user_data[0] = $row['u_id'];
        $user_data[1] = $row['u_name'];
        $user_data[2] = $row['u_contact'];
        $user_data[3] = $row['u_email'];
        $user_data[4] = $row['u_address'];
        $user_data[5] = $row['u_bloodgroup'];
    }
    echo json_encode($user_data);
}

//updating the user info
function update_user_info()
{
    global $db;
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $user_contact = $_POST['user_contact'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_adress'];
    $user_bloodgroup = $_POST['user_bloodgroup'];
    
    $query = "update user set u_name = '$user_name', u_contact ='$user_contact', u_email = '$user_email', "
            . "u_address ='$user_address', u_bloodgroup ='$user_bloodgroup' where u_id = '$user_id'" ;
    
    $result = $db->executeUpdate($query);
    if($result)
    {
        echo 'Update Success';
    }
    else 
    {
        echo 'Update Fail';
    }
}

//deleting user record
function delete_user_info()
{
    global $db;
    
    $del_user_id = $_POST['del_user_id'];
    $query = "DELETE from user where u_id = '$del_user_id'";
    $result = $db->executeUpdate($query);
    
    if($result)
    {
        echo 'Your record has been deleted';
    }
    else 
    {
        echo 'Record not deleted'; 
    }
}

//viewing donar info in table
function view_donar_info()
{
    global $db;
    $value = "";
    $value = '<table class="table table-responsive-sm text-center table-striped table-bordered" style="background-color: white" >
    <thead class="thead-dark">
        <tr class="font-weight-bold">
            <th>Id</th>
            <th>User Name</th>
            <th>Doctor Name</th>
            <th>Date and Time</th>
            <th>Description</th>
            <th>Quantity</th>
            <th colspan="2">Action</th>
        </tr>';
    $donars = "SELECT * FROM donar, user, doctor where donar_user_id = user.u_id and donar_doctor_id = doctor.d_id";
    $donarrList = $db->executeSelect($donars);
    foreach ($donarrList as $row)
    {
        $value.= '<tr>
            <td>'.$row['donar_id'].'</td>
            <td>'.$row['u_name'].'</td>
            <td>'.$row['d_name'].'</td>
            <td>'.$row['datetime'].'</td>
            <td>'.$row['donar_description'].'</td>
            <td>'.$row['d_quantity'].'</td>
            <td>
                <button class="btn btn-success" id="update_donar_info" donar-id='.$row['donar_id'].'><span class="fa fa-edit"></span></button>
            </td>
            <td>
                <button class="btn btn-danger" id="del_donar" data-donar-id='.$row['donar_id'].'><span class="fa fa-trash"></span></button>
            </td>
        </tr>';
    }
    $value.='</table>';
    echo json_encode(['status'=>'success','html'=>$value]);
}

//loading donar info to update
function load_donar_info()
{
    global $db;
    $donar_id = $_POST['dona_id'];
    $query = "select * from donar, user, doctor where donar_id = '$donar_id' and donar_user_id = user.u_id and donar_doctor_id = doctor.d_id";
    $don_id = $db->executeSelect($query);
    foreach ($don_id as $row)
    {
        $donar_data[0] = $row['donar_id'];
        $donar_data[1] = $row['u_name'];
        $donar_data[2] = $row['d_name'];
        $donar_data[3] = $row['donar_description'];
        $donar_data[4] = $row['d_quantity'];
    }
    echo json_encode($donar_data);
}

//updating the donar info
function update_donar_info()
{
    global $db;
    $donar_id = $_POST['donar_id'];
    $up_donar_user_id = $_POST['up_donar_user_id'];
    $up_donar_doctor_id = $_POST['up_donar_doctor_id'];
    $up_donar_description = $_POST['up_donar_description'];
    $up_donar_quantity = $_POST['up_donar_quantity'];
    
    $query = "update donar set donar_user_id = '$up_donar_user_id', donar_doctor_id ='$up_donar_doctor_id', datetime = NOW(), "
            . "donar_description ='$up_donar_description', d_quantity ='$up_donar_quantity' where donar_id = '$donar_id'" ;
    
    $result = $db->executeUpdate($query);
    if($result)
    {
        echo 'Update Success';
    }
    else 
    {
        echo 'Update Fail';
    }
}


//deleting donar record
function delete_donar_info()
{
    global $db;
    
    $del_donar_id = $_POST['del_donar_id'];
    $query = "delete from donar where donar_id = '$del_donar_id'";
    $result = $db->executeUpdate($query);
    
    if($result)
    {
        echo 'Your record has been deleted';
    }
    else 
    {
        echo 'Record not deleted'; 
    }
}

//viewing patient info in table
function view_patient_info()
{
    global $db;
    $value = "";
    $value = '<table class="table table-responsive-sm text-center table-striped table-bordered" style="background-color: white" >
    <thead class="thead-dark">
        <tr class="font-weight-bold">
            <th>Id</th>
            <th>User Name</th>
            <th>Doctor Name</th>
            <th>Description</th>
            <th>Date and Time</th>
            <th colspan="2">Action</th>
        </tr>';
    $patients = "SELECT * FROM patient, user, doctor where p_user_id = user.u_id and p_doctor_id = doctor.d_id";
    $patientList = $db->executeSelect($patients);
    foreach ($patientList as $row)
    {
        $value.= '<tr>
            <td>'.$row['p_id'].'</td>
            <td>'.$row['u_name'].'</td>
            <td>'.$row['d_name'].'</td>
            <td>'.$row['p_description'].'</td>
            <td>'.$row['p_datetime'].'</td>
            <td>
                <button class="btn btn-success" id="update_patient_info" patient-id='.$row['p_id'].'><span class="fa fa-edit"></span></button>
            </td>
            <td>
                <button class="btn btn-danger" id="del_patient" data-patient-id='.$row['p_id'].'><span class="fa fa-trash"></span></button>
            </td>
        </tr>';
    }
    $value.='</table>';
    echo json_encode(['status'=>'success','html'=>$value]);
}

//loading patient info to update
function load_patient_info()
{
    global $db;
    $patient_id = $_POST['patient_id'];
    $query = "select * from patient, user, doctor where p_id = '$patient_id' and p_user_id = user.u_id and p_doctor_id = doctor.d_id";
    $pat_id = $db->executeSelect($query);
    foreach ($pat_id as $row)
    {
        $patient_data[0] = $row['p_id'];
        $patient_data[1] = $row['u_name'];
        $patient_data[2] = $row['d_name'];
        $patient_data[3] = $row['p_description'];
    }
    echo json_encode($patient_data);
}

//updating the patient info
function update_patient_info()
{
    global $db;
    $up_patient_id = $_POST['up_patient_id'];
    $up_patient_user_id = $_POST['up_patient_user_id'];
    $up_patient_doctor_id = $_POST['up_patient_doctor_id'];
    $up_patient_description = $_POST['up_patient_description'];
    
    $query = "update patient set p_id = '$up_patient_id', p_user_id ='$up_patient_user_id', p_doctor_id = '$up_patient_doctor_id', "
            . "p_description ='$up_patient_description', p_datetime = NOW() where p_id = '$up_patient_id'" ;
    
    $result = $db->executeUpdate($query);
    if($result)
    {
        echo 'Update Success';
    }
    else 
    {
        echo 'Update Fail';
    }
}


//deleting patient record
function delete_patient_info()
{
    global $db;
    
    $del_patient_id = $_POST['del_patient_id'];
    $query = "DELETE FROM patient WHERE p_id = '$del_patient_id'";
    $result = $db->executeUpdate($query);
    
    if($result)
    {
        echo 'Your record has been deleted';
    }
    else 
    {
        echo 'Record not deleted'; 
    }
}

//viewing recipient info in table
function view_recipient_info()
{
    global $db;
    $value = "";
    $value = '<table class="table table-responsive-sm text-center table-striped table-bordered" style="background-color: white" >
    <thead class="thead-dark">
        <tr class="font-weight-bold">
            <th>Id</th>
            <th>Patient Name</th>
            <th>Date and Time</th>
            <th>Description</th>
            <th>Blood Quantity(ml)</th>
            <th colspan="2">Action</th>
        </tr>';
    $patients = "SELECT * FROM patient, recipient, user where p_user_id = user.u_id and r_patient_id = patient.p_id";
    $patientList = $db->executeSelect($patients);
    foreach ($patientList as $row)
    {
        $value.= '<tr>
            <td>'.$row['r_id'].'</td>
            <td>'.$row['u_name'].'</td>
            <td>'.$row['r_datetime'].'</td>
            <td>'.$row['r_description'].'</td>
            <td>'.$row['r_quantity'].'</td>
            <td>
                <button class="btn btn-success" id="update_recipient_info" recipient-id='.$row['r_id'].'><span class="fa fa-edit"></span></button>
            </td>
            <td>
                <button class="btn btn-danger" id="del_recipient" data-recipient-id='.$row['r_id'].'><span class="fa fa-trash"></span></button>
            </td>
        </tr>';
    }
    $value.='</table>';
    echo json_encode(['status'=>'success','html'=>$value]);
}

//loading recipient info to update
function load_recipient_info()
{
    global $db;
    $recipient_id = $_POST['recipient_id'];
    $query = "select * from patient, recipient, user where r_id = '$recipient_id' and p_user_id = user.u_id and r_patient_id = patient.p_id";
    $rec_id = $db->executeSelect($query);
    foreach ($rec_id as $row)
    {
        $recipient_data[0] = $row['r_id'];
        $recipient_data[1] = $row['u_name'];
        $recipient_data[2] = $row['r_description'];
        $recipient_data[3] = $row['r_quantity'];
    }
    echo json_encode($recipient_data);
}

//updating the recipient info
function update_recipient_info()
{
    global $db;
    $up_recipient_id = $_POST['up_recipient_id'];
    $up_recipient_user_id = $_POST['up_recipient_user_id'];
    $up_recipient_description = $_POST['up_recipient_description'];
    $up_recipient_quantity = $_POST['up_recipient_quantity'];
    
    $query = "update recipient set r_id = '$up_recipient_id', r_patient_id ='$up_recipient_user_id', r_datetime = NOW() , "
            . "r_description ='$up_recipient_description', r_quantity = '$up_recipient_quantity' where r_id = '$up_recipient_id'" ;
    
    $result = $db->executeUpdate($query);
    if($result)
    {
        echo 'Update Success';
    }
    else 
    {
        echo 'Update Fail';
    }
}

//deleting recipient record
function delete_recipient_info()
{
    global $db;
    
    $del_recipient_id = $_POST['del_recipient_id'];
    $query = "DELETE FROM recipient WHERE r_id = '$del_recipient_id'";
    $result = $db->executeUpdate($query);
    
    if($result)
    {
        echo 'Your record has been deleted';
    }
    else 
    {
        echo 'Record not deleted'; 
    }
}

?>
