<div class="well" style="background:white;margin-left:10px">
<span style="text-align:center"><h3>View Users</h3></span>
<hr>
<div class="row">
<div class="col-sm-12">
<table class="table table-bordered table-striped table-responsive table-condensed table-hovered">
<thead>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Username</th>
<th>PfNumber</th>
<th>User Type</th>
<th>Action</th>


</tr>
</thead>
<tbody>
<?php
//fetching array
$select="SELECT * FROM users";
$que=$connect->query($select);
while($data=$que->fetch_object()){
    $id=$data->user_id;
    $first=$data->firstname;
    $last=$data->lastname;
    $user=$data->username;
    $pf=$data->pf_number;
    $usertype=$data->user_type;
    $status=$data->status;
    
    echo "<form method='POST' action=''>
    <input type='text' name='user_idd[]' value='$id' style='visibility:hidden'>
    <tr>

    <td>$first</td>
    <td>$last</td>
    <td>$user</td>
    <td>$pf</td>
    <td>$usertype</td>
    <td>";
   
        echo "<button type='submit' name='delete' class='btn btn-danger'>Delete</button></td>
        </tr></form>";
    
    
    
    
}
if(isset($_POST['delete'])){
    foreach($_POST['user_idd'] as $user_idd){
        $update="DELETE  FROM users  WHERE user_id='$user_idd'";
        $quer=$connect->query($update);
        if($quer){
            echo "<div class='alert alert-success'>Deleted successfully</div>";
        }else{
            echo "<div class='alert alert-danger'>Error deleting</div>";
        }
    }

}

?>
</tbody>
</table>
</div>
</div>
</div>