<?php 

if(isset($_GET['edit_user'])){
    $the_user_id=$_GET['edit_user'];
    $query="select * from users WHERE user_id=$the_user_id";
                        $select_users=mysqli_query($connection,$query);
    
                        while($row=mysqli_fetch_assoc($select_users )){
                        $user_id=$row['user_id'];
                        $username=$row['username'];
                        $user_password=$row['user_password'];
                        $user_firstname=$row['user_firstname'];
                        $user_lastname=$row['user_lastname'];
                        $user_email=$row['user_email'];
                        $user_image=$row['user_image'];
                        $user_role=$row['user_role'];
                        }
}
if(isset($_POST['edit_user'])){
        $user_firstname=$_POST['user_firstname'];
        $user_lastname=$_POST['user_lastname'];
        $user_role=$_POST['user_role'];

        /*$post_image=$_FILES['image']['name'];
        $post_image_temp=$_FILES['image']['tmp_name'];*/

        $username=$_POST['username'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];
        //$post_date=date('d-m-y');
        //$post_comment_count=4;

        //move_uploaded_file($post_image_temp,"../images/$post_image");

        $query="UPDATE users SET ";
        $query.="user_firstname='{$user_firstname}',";
        $query.="user_lastname='{$user_lastname}',";
        $query.="user_role='{$user_role}', ";
        $query.="username='{$username}', ";
        $query.="user_email='{$user_email}', ";
        $query.="user_password='{$user_password}' ";
        $query.="WHERE user_id={$the_user_id}";

        $update_user=mysqli_query($connection,$query);
        
}







?>




<form action="" method="post" enctype="multipart/form-data">


<div class="form_group">
        <label for="user_firstname">firstname</label>
        <input type="text" value="<?php echo $user_firstname ;?>" class="form-control" name="user_firstname">
    </div>

    <div class="form_group">
        <label for="user_lastname">lastname</label>
        <input tpye="text" value="<?php echo $user_lastname ;?>"  class="form-control" name="user_lastname">
    </div>
    <br>
    <div class="form_group">
        <select name="user_role" id="">
        <option value="subscriber"><?php echo $user_role ;?></option>
            <?php
                if($user_role=='admin'){
                echo "<option value='subscriber'>Subscriber</option>";}
                else{
                echo "<option value='admin'>Admin</option>";}
            
            
            ?>
            
        </select>
    </div>

    <!--<div class="form_group">
        <label for="post_image">post image</label>
        <input type="file"  name="image">
    </div>-->


    <div class="form_group">
        <label for="username">username</label>
        <input type="text" value="<?php echo $username ;?>" class="form-control" name="username">
    </div>

    <div class="form_group">
        <label for="user_email">email</label>
        <input type="email" value="<?php echo $user_email ;?>" class="form-control" name="user_email">
    </div>

    <div class="form_group">
        <label for="user_password">password</label>
        <input type="password"value="<?php echo $user_password ;?>"  class="form-control" name="user_password">
    </div>

<br>

    <div class="form_group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Edit user">
    </div>
</form>