<?php include "../partials/header.php" ?>


<div class="container">
    <div class="email-form mx-auto">
        <div class="place-holder"></div>
            <h3> Turite klausimų ?</h3>
            <h4>Susisiekite su mumis, mielai Jums atsakysime</h4>
            <form action="/public/sendmail.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="usersName" placeholder="Jūsų vardas" required>
                    <input type="text" class="form-control" name="usersEmail" placeholder="Jūsų pašto adresas" required>
                    <textarea class="form-control" name="usersMessage" placeholder="Jūsų pranešimas" rows="5" required></textarea>
                    <input type="submit" name="submitEmail" value="Siųsti" class="btn btn-primary my-3">
                </div>
            </form>
    </div>
</div>


<?php include "../partials/footer.php" ?>
