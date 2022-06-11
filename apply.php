<?php session_start() ?>
<!DOCTYPE html>

<html>
<?php
$title = "Apply for Retrospective";
include("includes/head.php") ?>

<body>
    <?php
    include("includes/header.php");
    ?>
    <main onclick="fermer()" class="blur-el">
        <div class="apply-div-el">
            <h1>JOIN THE TEAM</h1>
            <h1>...</h1>
            <div class="apply-form-el">
                <h2>Apply for Retrospective</h2>
                <?php echo isset($_GET['message']) ? '<p class="' . $_GET['type'] . '">' . $_GET['message'] . '<p>' : '' ?>
                <form action="verifications/apply_verification.php" method="post" enctype="multipart/form-data" id="letter_form">
                    <label>First name <span class="champ_obligatoire">*</span></label>
                    <input type="text" name="firstName" value="<?php echo isset($_COOKIE['firstName']) ? $_COOKIE['firstName'] : ''; ?>" placeholder="Frédéric">
                    <label>Last name <span class="champ_obligatoire">*</span></label>
                    <input type="text" name="lastName" value="<?php echo isset($_COOKIE['lastName']) ? $_COOKIE['lastName'] : ''; ?>" placeholder="Sananes">
                    <label>Email <span class="champ_obligatoire">*</span></label>
                    <input type="email" name="email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>" placeholder="fsananes@esgi.fr">
                    <label>Phone</label>
                    <input type="text" name="phone" value="<?php echo isset($_COOKIE['phone']) ? $_COOKIE['phone'] : ''; ?>" placeholder="07********">
                    <label>CV <span class="champ_obligatoire">*</span></label>
                    <input class="files_apply" type="file" name="cv">
                    <label>Please tell us in short about your experience <span class="champ_obligatoire">*</span></label>
                    <textarea type="text" name="area1" value="<?php echo isset($_COOKIE['area1']) ? $_COOKIE['area1'] : ''; ?>" placeholder="" form="letter_form"></textarea>
                    <label>Which programming language(s)/Libraries/Technologies are you most comfortable with ? <span class="champ_obligatoire">*</span></label>
                    <textarea type="text" name="area2" value="<?php echo isset($_COOKIE['area2']) ? $_COOKIE['area2'] : ''; ?>" placeholder="" form="letter_form"></textarea>
                    <label>LinkedIn Profile</label>
                    <input type="text" name="linkedIn" value="<?php echo isset($_COOKIE['linkedIn']) ? $_COOKIE['linkedIn'] : ''; ?>" placeholder="">
                    <label>Website Portfolio</label>
                    <input type="text" name="portflio" value="<?php echo isset($_COOKIE['portflio']) ? $_COOKIE['portflio'] : ''; ?>" placeholder="">
                    <button class="button-passwordSubmit-el" type="submit"><i class="fa-solid fa-check mt-2"></i></button>
                </form>
            </div>
        </div>

    </main>
    <?php include("includes/footer.php") ?>
    <script src="js/index.js"></script>
</body>

</html>