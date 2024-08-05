<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="bower_components/jquery-confirm-master/dist/jquery-confirm.min.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <!-- DataTables -->

    <link type="text/css" rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

</head>

<body>
<?php include("header.php")?>




<div class="col-sm-12">


        <div class="panel-body">

            <table id="tbl-projects" class="table table-striped table-bordered" width="100%">
                <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
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

<!-- FastClick -->

<script src="bower_components/jquery.validate.min.js"></script>

<!-- SlimScroll -->
<script src="bower_components/jquery.validate.min.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>
member();







function member()
{
    $('#tbl-projects').dataTable().fnDestroy();
    $.ajax({
        url: "all_member.php",
        type: "GET",
        dataType: "JSON",
        success: function (data)
        {
            console.log(data);
            $('#tbl-projects').dataTable({
                "aaData": data,
                "scrollX": true,
                "aoColumns": [
                    {"sTitle": "Member Number", "mData": "mno"},
                    {"sTitle": "Member Name", "mData": "name"},
                    {"sTitle": "Nic", "mData": "nic"},
                    {"sTitle": "Gender", "mData": "gender"},
                    {"sTitle": "Phone", "mData": "phone"},
                    {"sTitle": "Join Date", "mData": "joindate"},

                    {"sTitle": "Relationship", "mData": "relationship"},
                    {"sTitle": "Relationship No", "mData": "epno"},


                ]
            });
        },
        error: function (xhr)
        {
            console.log(xhr.responseText);
            var text = $($.parseHTML(xhr.responseText)).filter('.trace-message').text();
        }
    });
}






</script>

</body>


</html>