<?php 
    include("admin_functions.php"); //All query data is obtained here.
    require_once("../functions.php"); //Website functions.

    validateRoleAdmin(); //validates a role is active and is the appropiate role for the page.
    verifyActivity(); //validates the user has been active for X amount of time.

    //=========================Get ID===================================================================
    if(isset($_GET) & !empty($_GET)){                           //gets id, if no id, redirects.
        $id = $_GET['id'];
    } else {
        redirect('tutors.php');
    }
    //==========================End Get ID==============================================================

    //==========================Submit==================================================================
    //updates the selected tutors offers.
    if(isset($_POST) & !empty($_POST)){
        $course = $_POST['course'];
        $professor = $_POST['professor'];
        $visibility = $_POST['visibility'];                     //takes from the form field ' ' the selected value (The visilibity status).
        $query = "UPDATE lc_tutor_offers SET course_id = '$course', professor_entry_id = '$professor', visibility = '$visibility' WHERE offer_id = '$id'";
        $res = query($query);
        confirm($query);
        redirect('tutors.php?Offer_edit');
    }
    //==========================End Submit===============================================================
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
      <link rel="shortcut icon" href="../assets/images/lc_Icon.png" type="image/x-icon">
      <meta name="description" content="">

      <title>Edit Tutor Offer - LC:TAM</title>
      <link rel="stylesheet" href="../assets/web/assets/mobirise-icons2/mobirise2.css">
      <link rel="stylesheet" href="../assets/web/assets/mobirise-icons/mobirise-icons.css">
      <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-grid.min.css">
      <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-reboot.min.css">
      <link rel="stylesheet" href="../assets/dropdown/css/style.css">
      <link rel="stylesheet" href="../assets/socicon/css/styles.css">
      <link rel="stylesheet" href="../assets/theme/css/style.css">
      <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
      <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
      <link rel="preload" as="style" href="../assets/mobirise/css/mbr-additional.css">
        <link rel="stylesheet" href="../assets/mobirise/css/mbr-additional.css" type="text/css">
    </head>
    <body>
        <?php 
            select_header($_SESSION['type']);
            ?>
        <main class="container d-flex justify-content-center">
            <article>
            <div class="container-sm>">
                <h3 class = "h3 d-flex justify-content-center">Edit Tutor Offer</h3>
                <?php 
                $info = getSelectedTutorOffer($id);
                $row = fetch_array($info);
                ?>
            <form action="edit_tutor_offer.php?id=<?php echo $row['offer_id']; ?>" method="POST"><br>
                    <div class="form-group">
                        <label for="tutor">Tutor: </label>
                        <input class="form-control" id="tutor" name = "tutor"  type = "text" value = "<?php echo $row['tutor_full_name']; ?>" disabled>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="course">Course: </label>
                        <select class="form-control" id="course" name = "course" required>
                            <?php 
                            $info2 = getCourses();
                            while($row2 = fetch_array($info2)) {
                                ?>
                        <option value= "<?php echo $row2['course_id'] ?>" <?php if ( $row['course_id'] == $row2['course_id']) { echo "selected"; } ?> ><?php echo $row2['course_id']?> - <?php echo $row2['course_name'];  } ?></option>
                        </select>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="tutor">Professor: </label>
                        <select class="form-control" id="professor" name = "professor" required>
                        <?php 
                            $info3 = getProfessors2();
                            while($row3 = fetch_array($info3)) { ?>
                            <option value = <?php echo $row3['professor_entry_id'] ?> <?php if ( $row['professor_entry_id'] == $row3['professor_entry_id']) { echo "selected"; } ?> > <?php echo $row3['professor_name']; ?> - <?php echo $row3['course_id']; ?> <?php echo $row3['course_name']; } ?></option>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="visibility">Visibility: </label>
                        <select class="form-control" id="visibility" name = "visibility" required>
                            <option value="0" <?php if ( $row['visibility'] == "0") { echo "selected"; } ?> >Hidden</option>
                            <option value="1"<?php if ( $row['visibility'] == "1") { echo "selected"; } ?> >Visible</option>
                        </select>
                    </div>
                    <br>
                    <div class = "container d-flex justify-content-center">
                        <button type="submit" name="submit"  class="btn btn-primary display-4 d-flex justify-content-center">Submit</button>
                    </div><br>
            </form>
            </div>
            </article>
        </main>
        <?php
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>