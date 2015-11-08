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
