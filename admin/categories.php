<?php include "includes/admin_header.php";?>

    <div id="wrapper">



        <!-- Navigation -->
      <?php include "includes/admin_navigation.php";?>





        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>


                        <div class="col-xs-6">
                        <?php
                            if (isset($_POST['submit'])) {
                                $cat_title = $_POST['cat_title'];
                                if ($cat_title == "" || empty($cat_title)) {
                                    echo "This field should not be empty";
                                } else {

                                    $query = "INSERT INTO categories (cat_title)";
                                    $query .= " VALUES ('{$cat_title}')";
                                    $create_category_query = mysqli_query($connection, $query);
                                    if (!$create_category_query) {
                                        die("Query failed" . mysqli_error($connection));
                                    }


                                }
                            }

                        ?>





                        <form action="" method="post">
                            <div class="form-group">
                               <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>



                        </form>

                          <form action="" method="post">
                            <div class="form-group">
                               <label for="cat-title">Edit Category</label>
<?php
        if (isset($_GET['edit'])) {
            $the_cat_id = $_GET['edit'];
            $query = "SELECT * FROM categories WHERE cat_id = {$the_cat_id}";
            $select_categories_id = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_categories_id)) {
                $the_cat_id = $row['cat_id'];
                $the_cat_title = $row['cat_title'];
                ?>


                <input value="<?php if(isset($the_cat_title)) {echo $the_cat_title;} ?>" type="text" class="form-control" name="cat_title">

            <?php
                }} ?>

<?php
        if (isset($_POST['update_category'])) {
            $the_cat_title = $_POST['cat_title'];
            if ($the_cat_title == "" || empty($the_cat_title)) {
                echo "You can not update an empty category";
            }
            $query = "UPDATE categories SET cat_title = ";
            $query .= "'{$the_cat_title}' ";
            $query .= "WHERE cat_id = {$the_cat_id}";
            $update_category = mysqli_query($connection, $query);
            if (!$update_category) {
                die("Query Failed" . mysqli_error($connection));
            }
        }

?>


<!--                                <input type="text" class="form-control" name="cat_title">    -->
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                            </div>



                        </form>


                        </div>
<!--                        add category form-->
<?php
                        $query = "SELECT * FROM categories ";
                        $select_categories = mysqli_query($connection, $query);

?>

                    <div class="col-xs-6">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
            while($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<tr>";
                echo "<td>{$cat_id}</td>";
                echo "<td>{$cat_title}</td>";
                echo "<td><a href='categories.php?delete={$cat_id}' >Delete</a></td>";
                echo "<td><a href='categories.php?edit={$cat_id}' >Edit</a></td>";
                echo "</tr>";
            }



        ?>

            <?php
            if(isset($_GET['delete'])) {
                $the_cat_id = $_GET['delete'];
                $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
                $delete_query = mysqli_query($connection, $query);
                if (!$delete_query) {
                    die("Query failed" . mysqli_error($connection));
                }
                header("Location: categories.php");
            }

            ?>

                        </tbody>
                    </table>

                    </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>


        <!-- /#page-wrapper -->


<?php include "includes/admin_footer.php"; ?>
