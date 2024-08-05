<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="bower_components/jquery-confirm-master/dist/jquery-confirm.min.css">
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <link type="text/css" rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
</head>

<body>
<?php include("header.php")?>

<br><br>

<div class="container-fluid">
<div class="row">
    <div class="col-sm-4">
      <img src="images/logo.jpg" width=441px; height=352;/>
    </div>

    <div class="col-sm-8">
        <div class="col s12 m6 offset-m4">

            <div class="panel-body">

                <table id="tbl-projects" class="table table-responsive table-bordered" cellspacing="0"
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
</div><br><br>

<script src="bower_components/jquery/dist/jquery.js"></script>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery.validate.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-confirm-master/dist/jquery-confirm.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="bower_components/jquery.validate.min.js"></script>

<script>
    get_all();

   
    function get_all() 
    {
        $('#tbl-projects').dataTable().fnDestroy();
        $.ajax({
            url: "check.php",
            type: "GET",
            dataType: "JSON",
            success: function (data) 
            {
                console.log(data);
                $('#tbl-projects').dataTable({
                    "aaData": data
                    ,
                    "scrollX": true,
                    "aoColumns": [
                        {"sTitle": "Member No", "mData": "mid"},                      
                        {"sTitle": "Paid Date", "mData": "paid_date"},
                        {"sTitle": "Expire date", "mData": "expire_date"},
                        {"sTitle": "Status", "mData": "status"},

                    ]
                });
            },
            error: function (xhr) {
                console.log('Request Status: ' + xhr.status  );
                console.log('Status Text: ' + xhr.statusText );
                console.log(xhr.responseText);
                var text = $($.parseHTML(xhr.responseText)).filter('.trace-message').text();
                // console.log(text)

            }
        });
    }


</script>

</body>


</html>