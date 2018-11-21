<?php include "../partials/header.php" ?>
<?php include "../mysql_connect.php"?>
<?php

if(!isset($_SESSION['id'])){
    exit();
}


$project_id = $_GET['id'];
    $sql = "SELECT * FROM `projectf` WHERE `id`='$project_id';";
    $res = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($res); ?>



<main>
    <div class="container edit-page">
        <div class="row fotospreview">
            <div class="col-md-3 addform">

                <div class="row preview mb-1">
                    <div class="col" style="background-image: url(../uploads/<?php echo $row['image1']?>); background-size: cover; background-position: center center;">
                        <div class="numeration mt-1">1</div>
                    </div>
                </div>
                <div class="row preview mb-1">
                    <div class="col" style="background-image: url(../uploads/<?php echo $row['image2']?>); background-size: cover; background-position: center center;">
                        <div class="numeration mt-1">2</div>
                    </div>
                </div>
                <div class="row preview mb-1">
                    <div class="col" style="background-image: url(../uploads/<?php echo $row['image3']?>); background-size: cover; background-position: center center;">
                        <div class="numeration mt-1">3</div>
                    </div>
                </div>
                <div class="row preview mb-1">
                    <div class="col" style="background-image: url(../uploads/<?php echo $row['image4']?>); background-size: cover; background-position: center center;">
                        <div class="numeration mt-1">4</div>
                    </div>
                </div>
                <div class="row preview">
                    <div class="col" style="background-image: url(../uploads/<?php echo $row['image5']?>); background-size: cover; background-position: center center;">
                        <div class="numeration mt-1">5</div>
                    </div>
                </div>



            </div>

            <div class="col-md-9">
                <div class="triangle-displayN">
                    <div class="numerationL">1</div>
                    <div class="numerationR">2</div>
                    <div class="triangleLN" style="background-image: url(../uploads/<?php echo $row['image1']?>); background-size: cover; /*background-position: center center;*/"></div>
                    <div class="triangleRN" style="background-image: url(../uploads/<?php echo $row['image2']?>); background-size: cover; /*background-position: center center;*/"></div>
                        <!--                            <div class="numerationL">1</div>-->
                        <!--                            <div class="numerationR">1</div>-->
                </div>
            </div>
        </div>


        <form class="addform" action="/public/project.php?id=<?php echo $project_id ?>" method="POST">
            <div class="row">
                <div class="col-md-3 newform">
<!--                    <input type="file" name="images[]" class="form-control-file">-->
<!--                    <div class="numeration">1</div><i class="far fa-image text-success"></i>-->
<!--                    <input type="file" name="images[]" class="form-control-file">-->
<!--                    <div class="numeration">2</div><i class="far fa-image text-success"></i>-->
<!--                    <input type="file" name="images[]" class="form-control-file">-->
<!--                    <div class="numeration">3</div><i class="far fa-image text-success"></i>-->
<!--                    <input type="file" name="images[]" class="form-control-file">-->
<!--                    <div class="numeration">4</div><i class="far fa-image text-success"></i>-->
<!--                    <input type="file" name="images[]" class="form-control-file mb-3">-->
<!--                    <div class="numeration">5</div><i class="far fa-image text-success"></i>-->
                    <input type="text" name="date" class="form-control" value="<?php echo $row['projectDate']?>">
                    <input type="text" name="type" class="form-control" value="<?php echo $row['projectType']?>">
                    <input type="text" name="timespent" class="form-control" value="<?php echo $row['timespent']?>">

                    <!--                        <input type="text" class="form-control" placeholder="Additional info">-->
                    <!--                        <input type="text" class="form-control" placeholder="Additional info">-->
                    <!--                        <input type="text" class="form-control" placeholder="Additional info">-->

                    <input type="submit" name="submitTextEdit" class="btn btn-success mt-3" value="Edit project text">

                </div>
                <div class="col-md-9">
                    <input type="text" name="title" class="form-control" id="newtitle" value="<?php echo $row['title'] ?>" required>
                    <textarea name="text" class="form-control mt-2" id="newtext" rows="14" placeholder="Text" required><?php echo $row['text'] ?></textarea>
                </div>
            </div>
        </form>




    </div>
</main>
<?php include "../partials/footer.php" ?>