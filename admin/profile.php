<?php include "includes/admin_header.php";?>
<?php
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    $query="select * from users where username='{$username}'";
    $select_user_profile_query=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_user_profile_query)){
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


?>
<?php

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
    $query.="WHERE username='{$username}'";

    $update_user=mysqli_query($connection,$query);
    
}







?>
    <div id="wrapper">
    <!--navigation-->
    <?php include "includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                            Welocome to admin
                            <small>Author</small>
                    </h1>
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
        <input type="submit" class="btn btn-primary" name="edit_user" value="Update profile">
    </div>
</form>
               
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php";?>