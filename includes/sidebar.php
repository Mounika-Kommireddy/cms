<div class="col-md-4">
<?php
if(isset($_POST['submit'])){
$search= $_POST['search'];
$query="select * from posts where post_tags like '%$search%' ";
$search_query=mysqli_query($connection,$query);
if(!$search_query){
die("query failed".mysqli_error($connection));
}
$count=mysqli_num_rows($search_query);
if($count==0)
echo "No Result";
else
echo $count ;
} 
?>
<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php"method="post">
    <div class="input-group">
        <input name="search" type="text" class="form-control">
        <span class="input-group-btn">
            <button name="submit" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
</form>
    <!-- /.input-group -->
</div>

<!-- Login -->
<div class="well">
    <h4>Login</h4>
    <form action="includes/login.php"method="post">
    <div class="form-group">
        <input name="username" type="text" class="form-control" placeholder="Enter username">
    </div>
    <div class="input-group">
        <input name="password" type="password" class="form-control" placeholder="Enter password">
        <span class="input-group-btn">
            <button class="btn btn-primary" name="login" type="submit">Submit</button>

        </span>
    </div>
</form>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
    <?php
    $query="select * from categories";
    $select_categories_sidebar=mysqli_query($connection,$query);
    ?>
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                <?php
                while($row=mysqli_fetch_assoc($select_categories_sidebar )){
                    $id=$row['cat_id'];
                    $title=$row['cat_title'];
                    echo "<li><a href='./category.php?category=$id'>{$title}</a></li>";
                }
                ?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        <!--<div class="col-lg-6">
            <ul class="list-unstyled">
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
            </ul>
        </div>-->
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include "widget.php"; ?>

</div>