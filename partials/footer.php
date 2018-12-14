
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });



    //
    var modal = document.getElementById('myModal');
    //
    //
    var img = document.getElementsByClassName('col');
    //
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    var arrowLeft = document.querySelector(".left");
    var arrowRight = document.querySelector(".right");

    var photo;


    img[0].onclick = function(){
        modal.style.display = "block";
        modalImg.src = '../uploads/<?php echo $row['image1']?>';
        // captionText.innerHTML = this.alt;
        photo = 0;
    }
    img[1].onclick = function(){
        modal.style.display = "block";
        modalImg.src = '../uploads/<?php echo $row['image2']?>';
        //captionText.innerHTML = this.alt;
        photo = 1;
    }
    img[2].onclick = function(){
        modal.style.display = "block";
        modalImg.src = '../uploads/<?php echo $row['image3']?>';
        //captionText.innerHTML = this.alt;
        photo = 2;
    }
    img[3].onclick = function(){
        modal.style.display = "block";
        modalImg.src = '../uploads/<?php echo $row['image4']?>';
        //captionText.innerHTML = this.alt;
        photo = 3;
    }
    img[4].onclick = function(){
        modal.style.display = "block";
        modalImg.src = '../uploads/<?php echo $row['image5']?>';
        //captionText.innerHTML = this.alt;
        photo = 4;
    }

    arrowLeft.onclick = function(){
        //console.log('now photo is :'+photo)
        var nextPhoto = photo - 1;
        //console.log('next photo : '+nextPhoto);
       img[nextPhoto].onclick();
    }
    arrowRight.onclick = function(){
        var nextPhoto = photo + 1;
        console.log(nextPhoto);
        img[nextPhoto].onclick();
    }
    
    var span = document.getElementsByClassName("closem")[0];


    span.onclick = function() {
       modal.style.display = "none";
    }

</script>
</body>
</html>