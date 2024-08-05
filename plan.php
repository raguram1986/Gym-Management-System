<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="bower_components/jquery-confirm-master/dist/jquery-confirm.min.css">

    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->

    <link type="text/css" rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
</head>

<body>
<?php include("header.php")?>

<br><br>



<div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">          
                <h4 class="modal-title">Add Plan</h4>
            </div>

            <div class="modal-body">
                <form role="form" id="frmPlan">
              
            <div class="row">

                <div class="form-group col-md-6">
                    <label>Plan Name</label>
                    <input type="text" class="form-control" id="planname" name="planname" placeholder="Plan Name">
                </div>

                <div class="form-group col-md-6">
                    <label>Validity</label>
                    <input type="text" class="form-control" id="validity" name="validity" placeholder="Validity">
                </div>

                </div>
                   
                <div class="row">
                <div class="form-group col-md-6">
                    <label>Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
                </div>

                </div>
                   
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">
                                <button type="button" class="btn btn-info" onclick="validate()">Save</button>
                                <button type="submit" class="btn btn-default" onclick="cancel()">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<div class="col-sm-12">
    <div class="col s12 m6 offset-m4">

        <div class="panel-body">

            <table id="tbl-projects" class="table table-striped table-bordered" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>

                   


                </tr>

            </table>
        </div>
    </div>

</div>


<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->

<!-- DataTables -->

<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->

<script src="bower_components/jquery.validate.min.js"></script>


<!-- SlimScroll -->


<script src="bower_components/jquery.validate.min.js"></script>
<script src="bower_components/jquery-confirm-master/dist/jquery-confirm.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
//product();
var isNew=true;
var version_id=null;

plan();


function plan() {

    $('#tbl-projects').dataTable().fnDestroy();
    $.ajax({
        url: "all_plan.php",
        type: "GET",
        dataType: "JSON",

        success: function (data) {


            $('#tbl-projects').dataTable({
                "aaData": data
                ,
                "scrollX": true,
                "aoColumns": [
                    {"sTitle": "Plan Name", "mData": "planname"},
                    {"sTitle": "Validity", "mData": "validity"},

                    {"sTitle": "Amount", "mData": "amount"},


                    {
                        "sTitle": "Edit",
                        "mData": "pid",
                        "render": function (mData, type, row, meta) {

                            return '<button class="btn btn-xs btn-success" onclick="get_project_details(' + mData + ')">Edit</button>';
                        }
                    }





                ]

            });
        },
        error: function (xhr) {
            //console.log('Request Status: ' + xhr.status  );
            //console.log('Status Text: ' + xhr.statusText );
            console.log(xhr.responseText);
            var text = $($.parseHTML(xhr.responseText)).filter('.trace-message').text();
            // console.log(text)


        }
    });
}





function validate() 
{
    if ($("#frmPlan").valid())
    {
        var _url = '';
        var _data = '';
        var _method;


        if (isNew == true) {
            _url = 'add_plan.php';
            _data = $('#frmPlan').serialize();
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
            beforeSend: function () 
            {
                $('#save').prop('disabled', true);
                $('#save').html('');
                $('#save').append('<i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>Saving</i>');
            },
            success: function (data) 
            {
                $('#save').prop('disabled', false);
                $('#save').html('');
                $('#save').append('Save');
               
                var msg;

                if (isNew)
                {
                    msg="Registation Successfully Created";
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
                $('#frmPlan')[0].reset();




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