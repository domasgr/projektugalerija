<?php include "../partials/header.php" ?>
<?php include "../mysql_connect.php"?>
<?php    if(!isset($_SESSION['id'])){
    exit();
    }
    ?>
    <main>
        <div class="container">
            <div class="row fotospreview">
                <div class="col-md-3 addform">

                    <div class="row preview mb-1">
                        <div class="col">
                            <div class="numeration mt-1">1</div>
                        </div>
                    </div>
                    <div class="row preview mb-1">
                        <div class="col">
                            <div class="numeration mt-1">2</div>
                        </div>
                    </div>
                    <div class="row preview mb-1">
                        <div class="col">
                            <div class="numeration mt-1">3</div>
                        </div>
                    </div>
                    <div class="row preview mb-1">
                        <div class="col">
                            <div class="numeration mt-1">4</div>
                        </div>
                    </div>
                    <div class="row preview">
                        <div class="col">
                            <div class="numeration mt-1">5</div>
                        </div>
                    </div>



                </div>

                <div class="col-md-9">
                    <div class="triangle-displayN">
                        <div class="numerationL">1</div>
                        <div class="numerationR">2</div>
                        <div class="triangleLN">
<!--                            <div class="numerationL">1</div>-->
                        </div>
                        <div class="triangleRN">
<!--                            <div class="numerationR">1</div>-->
                        </div>
                    </div>
                </div>
            </div>


            <form class="addform" action="/public/index.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-3 newform">
                        <input type="file" name="images[]" class="form-control-file">
                        <div class="numeration">1</div><i class="far fa-image text-success"></i>
                        <input type="file" name="images[]" class="form-control-file">
                        <div class="numeration">2</div><i class="far fa-image text-success"></i>
                        <input type="file" name="images[]" class="form-control-file">
                        <div class="numeration">3</div><i class="far fa-image text-success"></i>
                        <input type="file" name="images[]" class="form-control-file">
                        <div class="numeration">4</div><i class="far fa-image text-success"></i>
                        <input type="file" name="images[]" class="form-control-file mb-3">
                        <div class="numeration">5</div><i class="far fa-image text-success"></i>
                        <input type="text" name="date" class="form-control" placeholder="Date">
                        <input type="text" name="type" class="form-control" placeholder="Work type">
                        <input type="text" name="timespent" class="form-control" placeholder="Time spent">

<!--                        <input type="text" class="form-control" placeholder="Additional info">-->
<!--                        <input type="text" class="form-control" placeholder="Additional info">-->
<!--                        <input type="text" class="form-control" placeholder="Additional info">-->

                        <input type="submit" name="submit" class="btn btn-success mt-3" value="Create project">

                    </div>
                    <div class="col-md-9">
                        <input type="text" name="title" class="form-control" id="newtitle" placeholder="Project title" required>
                        <textarea name="text" class="form-control mt-2" id="newtext" rows="14" placeholder="Text" required></textarea>
                    </div>
                </div>
            </form>




        </div>
    </main>











<?php include "../partials/footer.php" ?>