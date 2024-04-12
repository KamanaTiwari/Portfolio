
<?php require("inc/header.php"); ?>


<body>
    
<?php require("inc/navbar.php"); ?>

            <?php

            if (isset($_GET['id'])) {

                $id = $_GET['id'];
                $query = "SELECT * FROM files WHERE id=$id";
                $result = mysqli_query($con, $query);
                $data = $result->fetch_assoc();
            }

            ?>

            <?php

            if (isset($_POST['submit'])) {
                $title = $_POST['tile'];
                $file = $_FILES['img_link']['type'];
                $file_size = $_FILES['img_link']['description'];

                // submit previous file
                if ($title != "" && $img_link == "" && $description == ""  && $type == "") {
                    $querry = "UPDATE  files  SET  title='$title' WHERE id='" . $id . "'";

                    $result = mysqli_query($conn, $querry);
                    if ($result) {
                        echo "You didnot changed any thing ";
                    } else
                        echo "not 1st";
                }

                // submit new file & replace old file
                if ($file != "" && $name != "") {

                    if ($file_size <= 200040) {
                        $explode = explode('.', $file); // explode cuts the name after the dot.
                        $flink = strtolower($explode[0]);
                        $ext = strtolower($explode[1]);
                        $replace = str_replace(' ', '', $file); //to remove space
                        $finalname = $replace . time() . '.' . $extlink; //concating names with time
                        $targrt_file = 'uploads/' . $finalname;
                        if ($extlink == 'jpg' || $extlink == 'png' || $extlink == 'jpeg') {

                            // replace old file
                            $oldfilelink = $data['img_link']; //file link from database
                            $finallink = '../uploads/' . $oldfilelink;
                            unlink($finallink);

                            if (move_uploaded_file($_FILES['dataFile']['tmp_name'], $targrt_file)) {

                                $querry = "UPDATE  filemanager  SET  title='$title', img_link='$finalname', type='$ext', description='$description' WHERE id='" . $id . "'";
                                $result = mysqli_query($conn, $querry);
                                if ($result) {
                                    echo "File uploaded";
                                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
                                }
                                else{
                                    echo "File is not uploaded";
                                }
                            } else {
                                echo "fiels  upload failed";
                            }
                        } else {

                            echo "extension doesno mattch";
                        }
                    } else {
            ?>
                        <div class="alert alert-primary" role="alert">
                            file size must be less than  2MB
                        </div>

                    <?php

                    }
                } else {
                    ?>
                    <div class="alert alert-primary" role="alert">
                        Filed are required
                    </div>

            <?php
                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=manage-file.php\">";
                }
            }
            ?>
            

    
<?php require("inc/footer.php"); ?>