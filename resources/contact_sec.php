  <?php
  include 'db.php';

  // Steg 1: filtrera snvändarens input från otillåtna tecken. Notera att password, email (behöver @) och subscribe avviker.
  $fname = trim(filter_input(INPUT_POST, "user_fname", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
  $lname = trim(filter_input(INPUT_POST, "user_lname", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
  $in_pass = filter_input(INPUT_POST, "user_password");
  $email = trim(filter_input(INPUT_POST, "user_email", FILTER_SANITIZE_EMAIL));
  $msg = trim(filter_input(INPUT_POST, "user_message", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
  $subscribe = isset($_POST['user_subscribe']) ? 1 : 0;

  // Steg 2: dubbelkolla (lita inte på html/css) input
  if ($fname && $lname && $in_pass && $email) {

    // Steg 3: dubbelkolla (lita inte på html/css) email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

      // Steg 4: När väl det garanterat finns ett lösenord (som kan/bör innehålla konstiga tecken) så kryptera det!
      $password = password_hash($in_pass, PASSWORD_DEFAULT);

      RegisterNewUser($fname, $lname, $password, $email, $msg, $subscribe);
    } else {
      // Steg 5: Vid uppvisning av inmatad variabel för användaren (men bara då), filtrera först med htmlspecialchars()
      echo htmlspecialchars($email) . '<h4 class="error"> is not a valid email. Please try again.</h4>';
      $fname = $lname = $in_pass = $email = $msg = null;
      exit;
    }
  } else {
    echo '<h4 class="error">All fields marked with a * required.</h4>';
    echo '<p class="init-button"><a href="index.php">Go back and try again.</a></p>';
    $fname = $lname = $in_pass = $email = $msg = null;
    exit;
  }
