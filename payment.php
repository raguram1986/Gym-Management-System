<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- Theme style -->


    <link rel="stylesheet" href="bower_components/jquery-confirm-master/dist/jquery-confirm.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>


    <!-- DataTables -->

    <link type="text/css" rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<?php include("header.php")?>

<br><br>

<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            
                <h4 class="modal-title">Add New Payment</h4>
            </div>


           

            <div class="modal-body">
                <form role="form" id="frmCustomer">
                <div class="row"> 
                 <div class="form-group col-md-4">
                    <label>Enter the Member No</label>
                    <input type="text" class="form-control" id="mno" name="mno" placeholder="Member No">
                </div>

                <div class="col-sm-3 ">
                        <div class="form-group">
                            <label class="form-label">Plan</label>
                            <select class="form-control" id="plan" name="plan"
                                    placeholder="Plan" required>
                                <option value="">Please Select</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3 ">
                        <div class="form-group">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price"
                           placeholder="Price">
                        </div>
                    </div>
              
                </div>


                 <div class="row">
                    <div class="form-group col-md-6">
                    <label>Name of Participant</label>
                    <input type="text" class="form-control" id="pname" name="pname" placeholder="Name of Participant">
                </div>



                  <div class="form-group col-md-6">
                    <label>Date</label>
                    <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
                 </div>

               

                    </div>

               


                   
                   
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">
                                <button type="button" class="btn btn-info" onclick="validate()">Pay</button>
                                <button type="submit" class="btn btn-default" onclick="cancel()">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->

<!-- DataTables -->

<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="bower_components/jquery.validate.min.js"></script>


<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/jquery.validate.min.js"></script>
<script src="bower_components/jquery-confirm-master/dist/jquery-confirm.min.js"></script>


<script>


    var isNew=true;
    var version_id=null;
    var current_stock=0;
    var product_no =0;
    getProductcode();
    getplan();

                 function getProductcode()
                        {
                            $("#mno").empty();
                            $("#mno").keyup(function(e) 
                            {
                                var q = $("#mno").val();
                                
                                $.ajax({
                                    type: "POST",
                                    url: "get_member.php",
                                    dataType: "JSON",
                                    data: { mno: $("#mno").val() },
                                   
                                    success: function(data)
                                    {
                                       
                                        console.log(data);
                                        $("#pname").val(data[0].name);
                                       
                                    },
                                    error: function(xhr, status, error) {

                                    }
                                });
                            });
                        }














    

          //          $('input[type=radio][name=account_types]').on('change', function() 
         //           {
         //               if (this.value == 'monthly') 
        //                {
         //                   plan = "1";
         //               }
         //               else if (this.value == 'subscription') 
         //               {
                        
           //                 plan = "2";  
                        
           //             }
         //           });


     


function getchoose(){

$.ajax({ 
            
            type : "post",
            url : "get_choose.php",
            data : {"plan": $("#plan").val()},
            dataType: 'JSON',
            async: false,
            success: function (data) {
            
                console.log(data[0]);
              //  $('#price').val(data.amount);
              $("#price").val(data[0].amount);
        
                
            }, 
            error: function (xhr, status, error) {

alert(xhr.responseText);
//
}

});
}















     


$('#plan').change(function ()
{
    getchoose();
});


function getplan()
{
    $.ajax({
        type: 'GET',
        url: 'get_plan.php',
        dataType: 'JSON',
        success: function (data) 
        {
            console.log(data);
            for (var i = 0; i < data.length; i++) 
            {
                $('#plan').append($("<option/>", 
                {
                    value: data[i].pid,
                    text: data[i].planname ,
                }));
            }
        },
        error: function (xhr, status, error) 
        {
            alert(xhr.responseText);
        }
    });
}

function validate() {

if ($("#frmCustomer").valid())
{
    var _url = '';
    var _data = '';
    var _method;
    if (isNew == true) {
        _url = 'add_payment.php';
        _data = $('#frmCustomer').serialize();
        _method = 'POST';

    }
    else {
        _url = 'update_vendor.php',
          _data = $('#frmProject').serialize() + "&project_id=" + project_id;
        _method = 'POST';
    }

    $.ajax({
        type: _method,
        url: _url,
        dataType: 'JSON',
        data: _data,
        beforeSend: function () {

            $('#save').prop('disabled', true);
            $('#save').html('');
            $('#save').append('<i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>Saving</i>');


        },
        success: function (data) {

    
            $('#save').prop('disabled', false);
            $('#save').html('');
            $('#save').append('Save');
           
            var msg;

            if (isNew)
            {
                msg="Paid";
            }
            else{
                msg="Registation Successfully Updated";
            }
            $.alert({
                title: 'Success!',
                content: msg,
                type: 'green',
                boxWidth: '400px',
                theme: 'light',
                useBootstrap: false,
                autoClose: 'ok|2000'


            });
            isNew = true;
            $('#frmCustomer')[0].reset();




        },
        error: function (xhr, status, error) {
            alert(xhr);
            console.log(xhr.responseText);

            $.alert({
                title: 'Fail!',
                //            content: xhr.responseJSON.errors.product_code + '<br>' + xhr.responseJSON.msg,
                type: 'red',
                autoClose: 'ok|2000'

            });
            $('#save').prop('disabled', false);
            $('#save').html('');
            $('#save').append('Save');

        }
    });

}
}


</script>



</body>


</html>