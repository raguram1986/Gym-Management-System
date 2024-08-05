<html>
<head>

    <link rel="stylesheet" href="bower_components/jquery-confirm-master/dist/jquery-confirm.min.css">
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <link type="text/css" rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>

</head>

<body class="skin-black">

<?php include ("header.php");?>



<br><br>




<div class="container-fluid bg-1 ">
    <div class="row">
        <div class="col-sm-12" >

            <form class="card" id="frmProject">
                <div class="card-body">
                    <h3 class="card-title">Sales Report</h3>
                    <div class="row">

                        <div class="col-sm-6 col-md-3">

                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">From Date</label>
                                <input type="date" class="form-control" id="from_date" name="from_date" placeholder="From Date"  required>
                            </div>
                            
                        </div>




                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">To Date</label>
                                <input type="date" class="form-control" id="to_date" name="to_date" placeholder="To Date"  required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Total</label><br>
                                <label  name="amount" id="amount" style="color: red;  font-weight: bold; font-size: 50;"></label>
                            </div>
                        </div>

                        
                    </div>


                    <div class="modal-footer">
                        <button type="button" class=" btn btn-info" id="save" onclick="get_all()">Search</button>
                        <button type="button"  class="btn btn-warning" data-dismiss="modal" id="close">Close</button>
                    </div>
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
                        <th></th>
                        <th></th>
                    </tr>
                </table>
            </div>
        </div>

    </div>




    


<script src="bower_components/jquery/dist/jquery.js"></script>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery.validate.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-confirm-master/dist/jquery-confirm.min.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="bower_components/jquery.validate.min.js"></script>



    <script>
      //  getProduct();
        var isNew = true;
        var project_id = null;

    </script>

  

    <script>

        function get_all()
         {
            $('#amount').html('');
            $('#tbl-projects').dataTable().fnClearTable();
            $('#tbl-projects').dataTable().fnDraw();
            $('#tbl-projects').dataTable().fnDestroy();
            var total=0;
            var amount=0;
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();        


            $.ajax({
                url:"all_sales.php",

                type: "POST",
                dataType: 'JSON',
                data:{from_date:from_date, to_date:to_date},
              
                success: function (data) 
                {
                       console.log(data);

                    $('#tbl-projects').dataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            , 'excel', 'pdf', 'print'
                        ],
                        "aaData": data
                        ,
                        "scrollX": true,
                        "aoColumns": [
                            {"sTitle": "Member No", "mData": "mno"},
                            {"sTitle": "Member Name", "mData": "name"},
                            {"sTitle": "Amount", "mData": "amount"},
                            {
                            "sTitle": "Month",
                            "mData": "month",
                            "render": function (mData, type, row, meta) {

                              if (mData==1)
                              {
                                  return "January" ;
                              }
                              else if (mData==2)
                              {
                                  return "February" ;
                              }
                              else if (mData==3)
                              {
                                  return "March" ;
                              }
                              else if (mData==4)
                              {
                                  return "April" ;
                              }
                              else if (mData==5)
                              {
                                  return "May" ;
                              }
                              else if (mData==6)
                              {
                                  return "June" ;
                              }

                              else if (mData==7)
                              {
                                  return "July" ;
                              }
                              else if (mData==8)
                              {
                                  return "August" ;
                              }
                              else if (mData==9)
                              {
                                  return "September" ;
                              }
                              else if (mData==10)
                              {
                                  return "October" ;
                              }

                              else if (mData==11)
                              {
                                  return "November" ;
                              }
                              else if (mData==12)
                              {
                                  return "December" ;
                              }
                            }
                        },
                            {"sTitle": "Year", "mData": "year"},
                            {"sTitle": "Payment Date", "mData": "paydate"},

                        ]
                    });

                    data.forEach(function(recordInLoop) 
                    {
                        amount += Number(recordInLoop.amount);
                    });
                    $('#amount').html(amount);
                 
                },
                error: function (xhr) {
                    console.log('Request Status: ' + xhr.status  );
                    console.log('Status Text: ' + xhr.statusText );
                    console.log(xhr.responseText);
                    var text = $($.parseHTML(xhr.responseText)).filter('.trace-message').text();
                    console.log(text)
                }
            });


         

        }



    </script>

</body>


</html>