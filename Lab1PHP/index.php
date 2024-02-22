<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>
    <h3>Contact Form</h3>
    <?php
    // Function to validate name
    function validateName($name) {
        if (empty($name)) {
            return "Name is required.";
        }
        if (preg_match('/[0-9]/', $name)) {
            return "Name should not contain numeric characters.";
        }
        if (strlen($name) > 100) {
            return "Name should be less than 100 characters.";
        }
        return "";
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nameErr = validateName($_POST["name"]);
        if (!empty($nameErr)) {
            echo "Error: $nameErr<br>";
        } else {
            $name = $_POST["name"];
        }
        
        if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            echo "Error: Email is required and should be a valid email address.<br>";
        } else {
            $email = $_POST["email"];
        }
        
        if (empty($_POST["message"]) || strlen($_POST["message"]) > 255) {
            echo "Error: Message is required and should be less than 255 characters.<br>";
        } else {
            $message = $_POST["message"];
        }
        if (isset($name) && isset($email) && isset($message)) {
            echo "Thank you for contacting us!<br>";
            echo "Name: $name<br>";
            echo "Email: $email<br>";
            echo "Message: $message<br>";
        }
    }
    ?>
    <form id="contact_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <label class="required" for="name">Your name:</label><br />
            <input id="name" class="input" name="name" type="text" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" size="30" /><br />
        </div>
        <div class="row">
            <label class="required" for="email">Your email:</label><br />
            <input id="email" class="input" name="email" type="text" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" size="30" /><br />
        </div>
        <div class="row">
            <label class="required" for="message">Your message:</label><br />
            <textarea id="message" class="input" name="message" rows="7" cols="30"><?php echo isset($_POST['message']) ? $_POST['message'] : ''; ?></textarea><br />
        </div>
        <input id="submit" name="submit" type="submit" value="Send email" />
        <input id="clear" name="clear" type="reset" value="Clear form" />
    </form>
</body>
</html>
