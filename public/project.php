<?php include "../partials/header.php" ?>
<?php include "../mysql_connect.php"?>


<?php
$project_id = $_GET['id'];
if(isset($_POST['submitEdit']) && isset($_SESSION['id'])){
    $title = $_POST['title'];
    $text = $_POST['text'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $order = 1;
    $timespent = $_POST['timespent'];

    // **************** reArray function *******************
    function reArrayFiles($file_post)
    {
        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }
        return $file_ary;
    }


//******************** UPLOADING FILES *********************
    $file_array = reArrayFiles($_FILES['images']);
    for ($i = 0; $i < count($file_array); $i++) {
        if ($file_array[$i]['error']) {
//            ?>
<!--            <div class="alert alert-danger">-->
<!--                --><?php //echo "Error while uploading file";
//                ?><!--</div> --><?php
        } else {
            $extensions = array('jpg', 'jpeg', 'gif', 'png');
            $file_ext = explode('.', $file_array[$i]['name']);
            $file_ext = end($file_ext);

            if (!in_array($file_ext, $extensions)) {
                ?>
                <div class="alert alert-danger">
                    <?php echo "{$file_array[$i]['name']} - Invalid file extension!";
                    ?></div> <?php
            } else {
                $img_dir = "uploads/" . $file_array[$i]['name'];
                move_uploaded_file($file_array[$i]['tmp_name'], $img_dir);
//                ?>
<!--                <div class="alert alert-succes">-->
<!--                    --><?php //echo "Files uploaded succesfully!";
//                    ?><!--</div> --><?php
            }
        }
    }



    $sql = "UPDATE `projectf` SET `title` = ?, `image1` = ?, `image2` = ?,`image3` = ?, `image4` = ?, `image5` = ?, `text` = ? , `imageOrder` =?, `projectDate` =?, `projectType` =?, `timespent` =? WHERE `projectf`.`id` = '$project_id';";
    $stmt = mysqli_stmt_init($db);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL ERROR";
    } else{
        mysqli_stmt_bind_param($stmt, "sssssssssss", $title, $file_array[0]['name'], $file_array[1]['name'], $file_array[2]['name'], $file_array[3]['name'], $file_array[4]['name'], $text, $order, $date, $type, $timespent);
        mysqli_stmt_execute($stmt);
    }
//    $stmt = mysqli_stmt_init($db);
//    if(!mysqli_stmt_prepare($stmt, $sql)){
//        echo "SQL ERROR";
//    } else{
//        mysqli_stmt_bind_param($stmt, "sss", $title, $image, $text);
//        mysqli_stmt_execute($stmt);
//    }
}




// EDITING ONLY TEXT
if(isset($_POST['submitTextEdit']) && isset($_SESSION['id'])) {
    $title = $_POST['title'];
    $text = $_POST['text'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $order = 1;
    $timespent = $_POST['timespent'];

    $sqlTxt = "UPDATE `projectf` SET `title` = ?, `text` = ? , `imageOrder` =?, `projectDate` =?, `projectType` =?, `timespent` =? WHERE `projectf`.`id` = '$project_id';";
    $stmt = mysqli_stmt_init($db);
    if(!mysqli_stmt_prepare($stmt, $sqlTxt)){
        echo "SQL ERROR";
    } else{
        mysqli_stmt_bind_param($stmt, "ssssss", $title,  $text, $order, $date, $type, $timespent);
        mysqli_stmt_execute($stmt);
    }
}




$sql = "SELECT * FROM `projectf` WHERE `id`='$project_id';";
$res = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($res);
?>



    <main>
        <?php if(isset($_REQUEST['filter']) && $_REQUEST['filter'] == "textile"){
            echo '<a href="/public/index.php?filter=textile"><div class="backToGallery">'; }
            else{
                echo '<a href="/public/index.php"><div class="backToGallery">';
            }?>
                <div class="homelink gallery">
                    <h1><i class="fas fa-arrow-left"></i></h1>
                </div>
            </div></a>

        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- The Close Button -->
            <span class="closem">&times;</span>
                <div class="modal-flex">
                    <div class="left"><i class="fas fa-chevron-left arrow-icon"></i></div>
                    <!-- Modal Content (The Image) -->
                    <img class="modal-content" id="img01">
                    <div class="right"><i class="fas fa-chevron-right arrow-icon"></i></div>
                </div>                  
            <!-- Modal Caption (Image Text) -->
            <!-- <div id="caption">Projekto nuotraukos</div> -->
        </div>


        <div class="container project-page">

            <div class="row wrapper">


                <div class="col-lg-3 order-1 order-lg-1">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="title-photo">
                                <div>Nuotraukos</div>
                                <small>Spauskite ant nuotraukos norėdami peržiūrėti</small>
                                <i class="fas fa-caret-down"></i> 
                            </div> 
                                          
                        </div>
                    </div>

                    <div class="row flex-column">
                    <div class="photos">
                            <div class="col-12 info d-flex flex-column justify-content-center">
                                    <div class="row preview mb-1">
                                        <div class="col" id="img" style="background-image: url(../uploads/<?php echo $row['image1']?>); background-size: cover; background-position: center center;">
                                        </div>
                                    </div>
                                    <div class="row preview mb-1">
                                        <div class="col" style="background-image: url(../uploads/<?php echo $row['image2']?>); background-size: cover; background-position: center center;">
                                        </div>
                                    </div>
                                    <div class="row preview mb-1">
                                        <div class="col"  style="background-image: url(../uploads/<?php echo $row['image3']?>); background-size: cover; background-position: center center;">
                                        </div>
                                    </div>
                                    <div class="row preview mb-1">
                                        <div class="col"  style="background-image: url(../uploads/<?php echo $row['image4']?>); background-size: cover; background-position: center center;">
                                        </div>
                                    </div>
                                    <div class="row preview">
                                        <div class="col"  style="background-image: url(../uploads/<?php echo $row['image5']?>); background-size: cover; background-position: center center;">
                                        </div>
                                    </div>
                                    
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                    <?php if(isset($_SESSION['id'])) {
                        echo '<div class="dropdown mt-5">';
                        echo '<a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Įrankiai    <i class="fas fa-cog"></i>
                        </a>';

                        echo '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
                        echo '<a class="dropdown-item" href="/public/edittext.php?id='.$project_id.'">Keisti tekstą</a>';
                        echo '<a class="dropdown-item disabled" href="#">Keisti nuotrauką/as</a>';
                        echo '<form action="/public/index.php?id='.$project_id.'&action=DELETE" method="POST">
                                  <input class="dropdown-item" type="submit" name="submitDelete" value="Ištrinti projektą">
                                  </form>';
//                        echo '<a class="dropdown-item" href="#">Something else here</a>';
                        echo '</div>';
                        echo '</div>';
                    }?>
                     <?php if(isset($_SESSION['id'])) {
                        echo '<div class="side-info my-auto d-block">';
                        echo '<ul class="list-group mt-5">';
                        echo '<li class="list-group-item"><i class="far fa-calendar mr-2"></i> <span class="text-light">' . $row["projectDate"] . '</span></li>';
                        echo '<li class="list-group-item"><i class="far fa-clock mr-2"></i><span class="text-light">' . $row["timespent"] . '</span></li>';
                        echo '<li class="list-group-item"><i class="fas fa-hammer mr-2"></i><span class="text-light">' . $row["projectType"] . '</span></li>';

                        echo '</ul>';
                        echo '</div>';
                    }?>
                </div>

            </div>
            </div>


                <div class="col-lg-9 d-flex flex-column order-lg-2">

                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="title">
                            <?php if(isset($_REQUEST['filter']) && $_REQUEST['filter'] == "textile"){
                                echo '<div class="icon-box"><img src="../images/textile-icon-2x.png" class="title-icon"></div>';}
                                else{echo '<div class="icon-box"><img src="../images/icon-2x.png" class="title-icon"></div>';} ?>
                                <div class="title-box"><?php echo $row['title'] ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="row mobile-triangle">
                        <div class="col-12">
                            <div class="triangle-display">
                                <div class="triangleL" style="background-image: url(../uploads/<?php echo $row['image1']?>); background-size: cover; /*background-position: center center;*/"></div>
                                <div class="triangleR" style="background-image: url(../uploads/<?php echo $row['image2']?>); background-size: cover; /*background-position: center center;*/"></div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="information">
                                <!-- <h3 class="image-title"><?php echo $row['title'] ?></h3> -->
                                <p class="project-text"><?php echo $row['text'] ?> </p>
                            </div>                          
                        </div>
                    </div>



                </div>
                </div>
            </div>
    </main>











<?php include "../partials/footer.php" ?>