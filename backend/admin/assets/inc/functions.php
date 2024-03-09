<?php

    function getCategories(){
        global $mysqli ;
        $sql = "SELECT * FROM `categories`";
        $categories=mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_assoc($categories)){
            $cat_id=$row['cat_id'];
            $cat_title=$row['cat_title'];
        
        ?>
        <tr>
            <td><?= $cat_id ?></td>
            <td><?= $cat_title ?></td>
            <td class="text-center"><a href="his_admin_add_news_cat.php?edit=<?=$cat_id?>" class="btn btn-sm btn-dark">edit</a></td>
            <td class="text-center"><a href="his_admin_add_news_cat.php?delete=<?=$cat_id?>" class="btn btn-sm btn-danger">delete</a></td>
        </tr>
        <?php } 
    } //getCategories

    function insertCategories(){
        global $mysqli ;
        if (isset($_POST['addCat'])) {
            $cat_title=$_POST['cat_title'] ;
            if (empty($cat_title)) {
             echo '<div class="alert alert-danger w-75 mx-auto text-center" role="alert">
                     This is a danger alert—check it out!
                 </div>';
            }else {
             $addCat="INSERT INTO `categories`(`cat_title`) VALUES ('$cat_title')";
             $addOneCat=mysqli_query($mysqli,$addCat);
             header('location:his_admin_add_news_cat.php');
            }
         }

    }
   
    function deleteCategories(){
        global $mysqli;
        if(isset($_GET["delete"])){
            $del=$_GET["delete"];
            $delete="DELETE FROM `categories` WHERE `cat_id`=$del ";
            $delCategories=mysqli_query($mysqli,$delete);
            header("location:his_admin_add_news_cat.php");
        }
    }
    
    function insertPost(){
        global $mysqli ;
        if (isset($_POST['add-post'])) {
            $post_title=$_POST['post_title'] ;
            $post_date= date("y-m-d");
            $post_content=$_POST['post_content'] ;

            $post_image_name=$_FILES["post_image"]["name"];
		    move_uploaded_file($_FILES["post_image"]["tmp_name"],"assets/images/blog/".$_FILES["post_image"]["name"]);

           
            $cat_id=$_POST['cat_id'] ;
            if (empty($post_title) || (empty($post_content)) || empty( $post_image_name)) {
             echo '<div class="alert alert-danger w-75 mx-auto text-center" role="alert">
                     please fill the form
                 </div>';
            }else {
             $addPost=
             "INSERT INTO 
             `posts`( `post_title`, `post_date`, `post_content`, `post_image`, `cat_id`)
              VALUES 
                    ('$post_title','$post_date',' $post_content','$post_image_name',' $cat_id')";
             $addOnePost=mysqli_query($mysqli,$addPost);
             header('location:posts.php');
            }
         }

    }
    
?>