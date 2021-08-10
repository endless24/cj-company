<div class="container-fluid py-4">
    <div class="alert alert-info"style=" box-shadow: 3px 3px  6px  #3f5378 !important;">
        <div id="del_visitor" class="btn btn-sm float-right text-light" style="box-shadow: 3px 3px  6px; background-color: #3f5378 !important">Delete all</div>
        <strong>
            <span id="visit_counter"></span> Visitors Found.
        </strong>
    </div>
    
    <div class="container  table-responsive">
        <table class="table table-bordered" style="box-shadow: 3px 3px  6px  #3f5378 !important; max-height:200px; overflow-y:auto;" id="dataTables-example">
            <thead  style="background-color: #3f5378;">
            <tr class="text-light">
                <th>Ip Address</th>
                <th>Device</th>
                <th>Date/Time</th>
            </tr>
            </thead>
            <tbody id="tbl_visits">
            
            </tbody>
        </table>
    </div>
</div>

<script src="dataTables/jquery.dataTables.js"></script>
<script src="dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>

<script>

    function fetchvisit(){
        $.ajax({
            type:'post',
            url:'./backend/visitors.php',
            data:{action:'get_visits'},
            dataType:'json',
            success: function(res){
                if(res.status === 'success'){
                    $list = '';
                    res.visitor_list.forEach(function (list) {
                        // console.log(list);
                        $list += `<tr>
                                        <td>${list.user_ip}</td>
                                        <td>${list.device}</td>
                                        <td>${list.visited_time}</td>
                                    </tr> `;
                    });
                    $('#tbl_visits').html($list);
                }
            },
            error: function (xhr,status,message){
                console.log(message);
                
            }
        });
    }
    fetchvisit();


    function count_no_visits() {
        $.ajax({
            type: 'post',
            url:'./backend/visitors.php',
            data:{action:'no_visits'},
            dataType: 'json',
            success: function(res){
                if (res.status == 'success') {
                    $('#visit_counter').text(res.no_visits);
                    fetchvisit();

                }else{
                    alert(res.message);
                }
                
            },
            error:  function (xhr,status,message) {
                console.log(message);
            }
        });
        
    }
    count_no_visits();



    $('#del_visitor').on('click', function(){
        $.ajax({
            type:'post',
            url:'./backend/visitors.php',
            data:{action:'delete'},
            dataType:'json',
            success: function (res) {
               if (res.status== 'success') {
                   alert(res.message);
                fetchvisit();
                count_no_visits();
               }
            }
        })
           

    });
       
</script>
