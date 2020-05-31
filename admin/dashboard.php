<?php require_once("config/config.php"); ?>
<?php require_once("inc/header.php"); ?>
<div class="row">

  <div class="col-md-8 mx-auto">
    <a href="index.php" class="btn btn-info">Logout</a>
<table class="table table-dark table-striped" style="margin-top: 100px;">
    <thead>
      <tr>
        <th>Sno<?php $sno='1';?></th>
        <th>Email</th>
        <th>Status</th>
        
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
                
          
  $getAllUser_list = "SELECT `id`, `username`, `user_password`, `isBlocked` FROM `userlogin` WHERE 1";
  $getAllUser_list = mysqli_query($conn,$getAllUser_list);
  if(mysqli_num_rows($getAllUser_list)>0){

   //while ($view_users_data ->fetch()) {
    while($view_AllUser_data = mysqli_fetch_assoc($getAllUser_list)) {
  ?>
      <tr>
        <td><?php echo $sno++; ?></td>
                        <td><?php  echo $view_AllUser_data['username'];?></td>
                        <?php  if($view_AllUser_data['isBlocked']== 1 ){?>
                        <td class="bg-danger">Blocked</td>
                        <?php 
                      }
                      else{
                        ?>
                        <td class="bg-success">Active</td>
                        <?php
                      }
                      ?>
                        
       <?php  if($view_AllUser_data['isBlocked']== 1 ){?>
                        <td><button class="btn btn-info" value="0" onclick="return Unblock_user(this.value,<?php echo $view_AllUser_data['id']; ?>);">Unblock</button></td>
                        <?php 
                      }
                      else{
                        ?>
                        <td><button class="btn btn-danger" value="1" onclick="return block_user(this.value,<?php echo $view_AllUser_data['id']; ?>);">Block</button></td>
                        <?php
                      }
                      ?>
      </tr>
     <?php
 } 
}
else{
  ?>
  <tr>
    <td colspan="3">No data found </td>
  </tr>
<?php
}
?>
     
    </tbody>
  </table>
</div>
</div>
  <?php require_once("inc/footer.php"); ?>
  <script type="text/javascript">
     /* Unblockng User */
    function Unblock_user(val,user_id){
      var conf = confirm("Do yo want to unblock user ?");

      if(conf){
      $.ajax({
      type:'post',
      url:'unblock_user.php',
      data:{val:val,user_id:user_id},
      success:function(result){
        //console.log(result);
        if(result == "Unblock"){
          //alert(result);
          
          location.reload();

        }
        else{
          //alert(result);
          location.reload();
          
          

        }

      }


    });


    }
  }


 /* Blockng User */
    function block_user(val,user_id){
      var conf = confirm("Do yo want to Block this user?");
      

      if(conf){
      $.ajax({
      type:'post',
      url:'block_user.php',
      data:{val:val,user_id:user_id},
      success:function(result){
        //console.log(result);
        if(result == "block"){
         location.reload();

        }
        else{
          location.reload();

        }

      }


    });


    }

    }



  </script>