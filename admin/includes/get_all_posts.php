               <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Tags</th>
                            <th>Comments</th>
                            <th>Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        
                        $query="select * from posts";
                        $select_posts=mysqli_query($connection,$query);
    
                        while($row=mysqli_fetch_assoc($select_posts )){
                        $post_id=$row['post_id'];
                        $post_author=$row['post_author'];
                        $post_title=$row['post_title'];
                        $post_content=$row['post_content'];
                        $post_category_id=$row['post_category_id'];
                        $post_status=$row['post_status'];
                        $post_image=$row['post_image'];
                        $post_tags=$row['post_tags'];
                        $post_comment_count=$row['post_comment_count'];
                        $post_date=$row['post_date'];
                        echo "<tr>";
                        echo "<td>$post_id</td>";
                        echo "<td>$post_author</td>";
                        echo "<td>$post_title</td>";
                        echo "<td>$post_content</td>";

                        $query="select * from categories WHERE cat_id={$post_category_id}";
                            $select_categories_sidebar=mysqli_query($connection,$query);
                            
                            while($row=mysqli_fetch_assoc($select_categories_sidebar )){
                                $id=$row['cat_id'];
                                $title=$row['cat_title'];
                        echo "<td>{$title}</td>";}


                        echo "<td>$post_status</td>";
                        echo "<td><img width='150' src='../images/$post_image' alt='image'></td>";
                        echo "<td>$post_tags</td>";
                        echo "<td>$post_comment_count</td>";
                        echo "<td>$post_date</td>";
                        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                        echo "</tr>";
                        }
                        
                        
                        
                        ?>
                        </tbody>

                    </table>
                    <?php
                    if(isset($_GET['delete'])){
                        $id=$_GET['delete'];
                    $query="DELETE FROM posts WHERE post_id={$id}";
                    $delete_query=mysqli_query($connection,$query);
                    header("Location: posts.php");
                    }
                    
                    ?>