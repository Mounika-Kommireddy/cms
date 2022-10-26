<?php

if(isset($_POST['create_user'])){
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

        $query="INSERT INTO users(username,user_password,user_firstname,user_lastname,user_email,user_role) 
        VALUES('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_role}')";

        $create_user_query=mysqli_query($connection,$query);

        confirm($create_user_query);
        echo "user created!"." "."<a href='users.php'>view users</a>";
        
}







?>




<form action="" method="post" enctype="multipart/form-data">


<div class="form_group">
        <label for="user_firstname">firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form_group">
        <label for="user_lastname">lastname</label>
        <input tpye="text" class="form-control" name="user_lastname">
    </div>
    <br>
    <div class="form_group">
        <select name="user_role" id="">
            <option value="subscriber">select options</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>

    <!--<div class="form_group">
        <label for="post_image">post image</label>
        <input type="file"  name="image">
    </div>-->


    <div class="form_group">
        <label for="username">username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form_group">
        <label for="user_email">email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form_group">
        <label for="user_password">password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

<br>

    <div class="form_group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Add user">
    </div>
</form>