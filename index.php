<?php include("inc/header.php"); ?>
<?php include("inc/menu.php"); ?>
<?php include("inc/slider.php"); ?>
<section id="phpCoding" class="heading">
    <article>
    <header>
        <h1>PHP Training</h1>
    </header>
    <div id="practice">
           <?php 
           $nameErr = $emailErr = $websiteErr = $genderErr = $commentErr = "";
           $name = $email = $website = $gender = $comment = "";
           
           if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST["name"])){
                $nameErr = "The field is required";
            }else{
                $name = testInput($_POST["name"]);
                if(!preg_match("/^[a-zA-Z ]*$/", $name)) {
                    $nameErr = "Only letters and white space allowed"; 
                }
            }

            if(empty($_POST["email"])){
                $emailErr = "The field is required";
            }else{
                $email = testInput($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format"; 
                }
            }

            if(empty($_POST["website"])){
                $websiteErr = "The field is required";
            }else{
                $website = testInput($_POST["website"]);
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                  $websiteErr = "Invalid URL"; 
                }
            }

            if(empty($_POST["gender"])){
                $genderErr = "The field is required";
            }else{
                $gender = testInput($_POST["gender"]);
            }

            if(empty($_POST["comment"])){
                $commentErr = "";
            }else{
                $comment = testInput($_POST["comment"]);
            }

           }

           function testInput($data){
                $data = trim($data);
                $data = stripcslashes($data);
                $data = htmlspecialchars($data);
                return $data;
           }

           ?>

           <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                Name : <input type="text" name="name" value="<?php echo $name; ?>">
                <span class="error">* <?php echo $nameErr; ?></span><br>
                Email : <input type="text" name="email" value="<?php echo $email; ?>">
                <span class="error">* <?php echo $emailErr; ?></span><br>
                Website : <input type="text" name="website" value="<?php echo $website; ?>">
                <span class="error">* <?php echo $websiteErr; ?></span><br>
                Gender : <input type="radio" name="gender" <?php if(isset($gender) && $gender == "male") echo "checked";?> value="male">Male 
                          <input type="radio" name="gender" <?php if(isset($gender) && $gender == "female") echo "checked";?> value="female">Female 
                          <span class="error">* <?php echo $genderErr; ?></span><br>
                Comments : <textarea name="comment" cols="30" rows="4"><?php echo $comment; ?></textarea>
                <span class="error">* <?php echo $commentErr; ?></span><br>
                <input type="submit">
            </form>

            <?php 
            echo "Name is : ".$name;
            echo "<br>";
            echo "Email account is : ".$email;
            echo "<br>";
            echo "Website url is : ".$website;
            echo "<br>";
            echo "Gender : ".$gender;
            echo "<br>";
            echo "User comment : ".$comment;

            ?>
    </div>
    </article>
</section>
<?php include("inc/footer.php"); ?>
