<?php
if(isset($_GET['edit_user'])) {
    $the_user_id = $_GET['edit_user'];

    $query = "SELECT * FROM users WHERE user_id = $the_user_id";
    $select_users = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_users)) {
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }
}




if (isset($_POST['edit_user'])) {
//    $user_id = $_POST['user_id'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role= $_POST['user_role'];

//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];

    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
//    $post_date = date('d-m-y');


//    move_uploaded_file($post_image_temp, "../images/$post_image");
//
    $query = "INSERT INTO users (user_firstname, user_lastname, user_role, user_name, user_email, user_password) ";
    $query .= "VALUES ('{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$user_name}', '{$user_email}', '{$user_password}' ) ";
    $create_user_query = mysqli_query($connection, $query);

    confirmQuery($create_user_query);
}

?>
   <form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname;?>">
    </div>

     <div class="form-group">
        <label for="title">Lastname</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname;?>">
    </div>

     <div class="form-group">
       <select name="user_role" id="">
        <option value='subscriber'>Select Options</option>
        <option value='admin'>Admin</option>
        <option value='subscriber'>Subscriber</option>

       </select>
    </div>

<!--


     <div class="form-group">
        <label for="title">User</label>
        <input type="file"  name="image">
    </div>
-->

     <div class="form-group">
        <label for="title">Username</label>
        <input type="text" class="form-control" name="user_name" value="<?php echo $user_name;?>">
    </div>

     <div class="form-group">
        <label for="title">Email</label>
        <input type="email" name="user_email" class="form-control" value="<?php echo $user_email;?>">
    </div>

     <div class="form-group">
        <label for="title">Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password;?>">
    </div>



     <div class="form-group">
        <input class="btn btn-primary" type="submit"  name="edit_user" value="Add user">
    </div>















</form>
