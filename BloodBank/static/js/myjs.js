$(document).ready(function()
{
  view_doctor_info();
  get_doctor_info();
  update_doctor_info();
  delete_doctor_info()
  
  view_user_info();
  get_user_info();
  update_user_info();
  delete_user_info();
  
  view_donar_info();
  get_donar_info();
  update_donar_info();
  delete_donar_info();
  
  view_patient_info();
  get_patient_info();
  update_patient_info();
  delete_patient_info();
  
  view_recipient_info();
  get_recipient_info();
  update_recipient_info();
  delete_recipient_info();
});

//viewing doctor in table
function view_doctor_info()
{
    $.ajax({
        url:'view_doctor.php',
        method:'post',
        success: function(data)
        {
            data = $.parseJSON(data);
            if(data.status == 'success')
            {
                $('#doctor_info').html(data.html);
            }
        }
    })
}

//load doctor info
function get_doctor_info()
{
    $(document).on('click','#update_doctor_info',function()
    {
        var d_id = $(this).attr('doctor-id');
        $.ajax({
            url: 'update_doctor.php',
            method: 'post',
            data:{doctor_id: d_id},
            dataType: 'JSON',
            success: function(data)
            {
                $('#up_doctor_id').val(data[0]);
                $('#up_doctor_name').val(data[1]);
                $('#up_doctor_contact').val(data[2]);
                $('#up_doctor_email').val(data[3]);
                $('#up_doctor_address').val(data[4]);
                $('#up_doctor_specialization').val(data[5]);
                $('#update_doctor').modal('show');
                
            }
        })
    })
};

//load and update doctor info
function update_doctor_info()
{
    $(document).on('click','#up_doctor_info', function()
    {
        var up_doctor_id = $('#up_doctor_id').val();
        var up_doctor_name = $('#up_doctor_name').val();
        var up_doctor_contact = $('#up_doctor_contact').val();
        var up_doctor_email = $('#up_doctor_email').val()
        var up_doctor_address = $('#up_doctor_address').val();
        var up_doctor_specialization = $('#up_doctor_specialization').val();
        
        if(up_doctor_name == ""|| up_doctor_contact == ""|| up_doctor_email == ""|| up_doctor_address == ""|| up_doctor_specialization == "")
        {
            $('#up_message').html('Please fill the blank');
            $('#update_doctor').modal('show');
        }
        else
        {
         $.ajax({
             url: 'update_doctor_info.php',
             method: 'post',
             data:{doctor_id:up_doctor_id,doctor_name:up_doctor_name, doctor_contact: up_doctor_contact, doctor_email: up_doctor_email, 
                 doctor_adress:up_doctor_address, doctor_specialization:up_doctor_specialization},
             success: function(data)
             {
                $('#up_message').html(data);
                $('#update_doctor').modal('show');
                $('form').trigger('reset');
                view_doctor_info();
             }
         })   
        }
    })
    $(document).on('click','#doctor_close', function(){
        $('form').trigger('reset');
        $('#up_message').html('');
    })
}

//deleting doctor info
function delete_doctor_info()
{
    $(document).on('click','#del_doctor', function()
    {
        var delete_doctor_id = $(this).attr('data-doctor-id');
        $('#delete_doctor').modal('show');
        
        $(document).on('click','#delete_doctor_info', function()
        {
            $.ajax({
            url:'delete_doctor.php',
            method:'post',
            data:{del_doctor_id:delete_doctor_id},
            success: function(data)
            {
                $('#delete_message').html(data);
                view_doctor_info();
            }
        })
        })
        $(document).on('click','#doctor_del_close', function(){
        $('form').trigger('reset');
        $('#delete_message').html('');
        
    })
    })
}

//view user info in table
function view_user_info()
{
    $.ajax({
        url:'view_user.php',
        method:'post',
        success: function(data)
        {
            data = $.parseJSON(data);
            if(data.status == 'success')
            {
                $('#user_info').html(data.html);
            }
        }
    })
}


//load user info
function get_user_info()
{
    $(document).on('click','#update_user_info',function()
    {
        var u_id = $(this).attr('data-id');
        $.ajax({
            url: 'update_user.php',
            method: 'post',
            data:{user_id: u_id},
            dataType: 'JSON',
            success: function(data)
            {
                $('#up_user_id').val(data[0]);
                $('#up_user_name').val(data[1]);
                $('#up_user_contact').val(data[2]);
                $('#up_user_email').val(data[3]);
                $('#up_user_address').val(data[4]);
                $('#up_user_bloodgroup').val(data[5]);
                $('#update_user').modal('show');
                
            }
        })
    })
};

//load and update user info
function update_user_info()
{
    $(document).on('click','#up_user_info', function()
    {
        var up_update_id = $('#up_user_id').val();
        var up_user_name = $('#up_user_name').val();
        var up_user_contact = $('#up_user_contact').val();
        var up_user_email = $('#up_user_email').val()
        var up_user_address = $('#up_user_address').val();
        var up_user_bloodgroup = $('#up_user_bloodgroup').val();
        
        if(up_user_name == ""|| up_user_contact == ""|| up_user_email == ""|| up_user_address == ""|| up_user_bloodgroup == "")
        {
            $('#up_message').html('Please fill the blank');
            $('#update_user').modal('show');
        }
        else
        {
         $.ajax({
             url: 'update_user_info.php',
             method: 'post',
             data:{user_id:up_update_id,user_name:up_user_name, user_contact: up_user_contact, user_email: up_user_email, 
                 user_adress:up_user_address, user_bloodgroup:up_user_bloodgroup},
             success: function(data)
             {
                $('#up_message').html(data);
                $('#update_user').modal('show');
                $('form').trigger('reset');
                view_user_info();
             }
         })   
        }
    })
    $(document).on('click','#user_close', function(){
        $('form').trigger('reset');
        $('#up_message').html('');
    })
}

//delete user info
function delete_user_info()
{
    $(document).on('click','#del_user', function()
    {
        var delete_user_id = $(this).attr('data-user-id');
        $('#delete_user').modal('show');
        
        $(document).on('click','#delete_user_info', function()
        {
            $.ajax({
            url:'delete_user.php',
            method:'post',
            data:{del_user_id:delete_user_id},
            success: function(data)
            {
                $('#delete_message').html(data);
                view_user_info();
            }
        })
        })
        $(document).on('click','#user_del_close', function(){
        $('form').trigger('reset');
        $('#delete_message').html('');
        
    })
    })
}

//view donar info in table
function view_donar_info()
{
    $.ajax({
        url:'view_donar.php',
        method:'post',
        success: function(data)
        {
            data = $.parseJSON(data);
            if(data.status == 'success')
            {
                $('#donar_info').html(data.html);
            }
        }
    })
}

//load donar info
function get_donar_info()
{
    $(document).on('click','#update_donar_info',function()
    {
        var donar_id = $(this).attr('donar-id');
        $.ajax({
            url: 'update_donar.php',
            method: 'post',
            data:{dona_id: donar_id},
            dataType: 'JSON',
            success: function(data)
            {
                $('#up_donar_id').val(data[0]);
                $('#up_donar_user_id').val(data[1]);
                $('#up_donar_doctor_id').val(data[2]);
                $('#up_donar_description').val(data[3]);
                $('#up_donar_quantity').val(data[4]);
                $('#update_donar').modal('show');
            }
        })
    })
};

//load and update donar info
function update_donar_info()
{
    $(document).on('click','#up_donar_info', function()
    {
        var up_donar_id = $('#up_donar_id').val();
        var up_donar_user_id = $('#up_donar_user_id').val();
        var up_donar_doctor_id = $('#up_donar_doctor_id').val();
        var up_donar_description = $('#up_donar_description').val();
        var up_donar_quantity = $('#up_donar_quantity').val();
        
        if(up_donar_user_id == ""|| up_donar_doctor_id == ""|| up_donar_description == ""|| up_donar_quantity == "")
        {
            $('#up_message').html('Please fill the blank');
            $('#update_donar').modal('show');
        }
        else
        {
         $.ajax({
             url: 'update_donar_info.php',
             method: 'post',
             data:{donar_id:up_donar_id,up_donar_user_id:up_donar_user_id, up_donar_doctor_id: up_donar_doctor_id, 
                 up_donar_description:  up_donar_description, up_donar_quantity: up_donar_quantity },
             success: function(data)
             {
                $('#up_message').html(data);
                $('#update_donar').modal('show');
                $('form').trigger('reset');
                view_donar_info();
             }
         })   
        }
    })
    $(document).on('click','#donar_close', function(){
        $('form').trigger('reset');
        $('#up_message').html('');
    })
}

//delete donar info
function delete_donar_info()
{
    $(document).on('click','#del_donar', function()
    {
        var delete_donar_id = $(this).attr('data-donar-id');
        $('#delete_donar').modal('show');
        
        $(document).on('click','#delete_donar_info', function()
        {
            $.ajax({
            url:'delete_donar.php',
            method:'post',
            data:{del_donar_id:delete_donar_id},
            success: function(data)
            {
                $('#delete_message').html(data);
                view_donar_info();
            }
        })
        })
        $(document).on('click','#donar_del_close', function(){
        $('form').trigger('reset');
        $('#delete_message').html('');
        
    })
    })
}

//view patient info in table
function view_patient_info()
{
    $.ajax({
        url:'view_patient.php',
        method:'post',
        success: function(data)
        {
            data = $.parseJSON(data);
            if(data.status == 'success')
            {
                $('#patient_info').html(data.html);
            }
        }
    })
}

//load patient info
function get_patient_info()
{
    $(document).on('click','#update_patient_info',function()
    {
        var patient_id = $(this).attr('patient-id');
        $.ajax({
            url: 'update_patient.php',
            method: 'post',
            data:{patient_id: patient_id},
            dataType: 'JSON',
            success: function(data)
            {
                $('#up_patient_id').val(data[0]);
                $('#up_patient_user_id').val(data[1]);
                $('#up_patient_doctor_id').val(data[2]);
                $('#up_patient_description').val(data[3]);
                $('#update_patient').modal('show');
            }
        })
    })
};

//load and update patient info
function update_patient_info()
{
    $(document).on('click','#up_patient_info', function()
    {
        var up_patient_id = $('#up_patient_id').val();
        var up_patient_user_id = $('#up_patient_user_id').val();
        var up_patient_doctor_id = $('#up_patient_doctor_id').val();
        var up_patient_description = $('#up_patient_description').val();
        
        if(up_patient_id  == ""|| up_patient_user_id   == ""|| up_patient_doctor_id == ""|| up_patient_description == "")
        {
            $('#up_message').html('Please fill the blank');
            $('#update_patient').modal('show');
        }
        else
        {
         $.ajax({
             url: 'update_patient_info.php',
             method: 'post',
             data:{up_patient_id:up_patient_id,up_patient_user_id:up_patient_user_id, up_patient_doctor_id : up_patient_doctor_id , 
                 up_patient_description:  up_patient_description },
             success: function(data)
             {
                $('#up_message').html(data);
                $('#update_patient').modal('show');
                $('form').trigger('reset');
                view_patient_info();
             }
         })   
        }
    })
    $(document).on('click','#patient_close', function(){
        $('form').trigger('reset');
        $('#up_message').html('');
    })
}

//delete patient info
function delete_patient_info()
{
    $(document).on('click','#del_patient', function()
    {
        var delete_patient_id = $(this).attr('data-patient-id');
        $('#delete_patient').modal('show');
        
        $(document).on('click','#delete_patient_info', function()
        {
            $.ajax({
            url:'delete_patient.php',
            method:'post',
            data:{del_patient_id: delete_patient_id},
            success: function(data)
            {
                $('#delete_message').html(data);
                view_patient_info();
            }
        })
        })
        $(document).on('click','#patient_del_close', function(){
        $('form').trigger('reset');
        $('#delete_message').html('');
        
    })
    })
}


//view recipient info in table
function view_recipient_info()
{
    $.ajax({
        url:'view_recipient.php',
        method:'post',
        success: function(data)
        {
            data = $.parseJSON(data);
            if(data.status == 'success')
            {
                $('#recipient_info').html(data.html);
            }
        }
    })
}

//load recipient info
function get_recipient_info()
{
    $(document).on('click','#update_recipient_info',function()
    {
        var recipient_id = $(this).attr('recipient-id');
        $.ajax({
            url: 'update_recipient.php',
            method: 'post',
            data:{recipient_id: recipient_id},
            dataType: 'JSON',
            success: function(data)
            {
                $('#up_recipient_id').val(data[0]);
                $('#up_recipient_user_id').val(data[1]);
                $('#up_recipient_description').val(data[2]);
                $('#up_recipient_quantity').val(data[3]);
                $('#update_recipient').modal('show');
            }
        })
    })
}

//load and update recipient info
function update_recipient_info()
{
    $(document).on('click','#up_recipient_info', function()
    {
        var up_recipient_id = $('#up_recipient_id').val();
        var up_recipient_user_id = $('#up_recipient_user_id').val();
        var up_recipient_description = $('#up_recipient_description').val();
        var up_recipient_quantity = $('#up_recipient_quantity').val();
        
        if(up_recipient_user_id == ""|| up_recipient_description == ""|| up_recipient_quantity == "")
        {
            $('#up_message').html('Please fill the blank');
            $('#update_recipient').modal('show');
        }
        else
        {
         $.ajax({
             url: 'update_recipient_info.php',
             method: 'post',
             data:{up_recipient_id:up_recipient_id, up_recipient_user_id: up_recipient_user_id, up_recipient_description : up_recipient_description , 
                 up_recipient_quantity:  up_recipient_quantity },
             success: function(data)
             {
                $('#up_message').html(data);
                $('#update_recipient').modal('show');
                $('form').trigger('reset');
                view_recipient_info();
             }
         })   
        }
    })
    $(document).on('click','#recipient_close', function(){
        $('form').trigger('reset');
        $('#up_message').html('');
    })
}

//delete patient info
function delete_recipient_info()
{
    $(document).on('click','#del_recipient', function()
    {
        var delete_recipient_id = $(this).attr('data-recipient-id');
        $('#delete_recipient').modal('show');
        
        $(document).on('click','#delete_recipient_info', function()
        {
            $.ajax({
            url:'delete_recipient.php',
            method:'post',
            data:{del_recipient_id: delete_recipient_id},
            success: function(data)
            {
                $('#delete_message').html(data);
                view_recipient_info();
            }
        })
        })
        $(document).on('click','#recipient_del_close', function(){
        $('form').trigger('reset');
        $('#delete_message').html('');
        
    })
    })
}

