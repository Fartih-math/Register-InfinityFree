<?php
$id = $_GET['id'];
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$email = $_GET['email'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Guest</title>

<link rel="preload" as="image" href="Sky_Serene_4k.jpg">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<style>
html, body {
  height: 100%;
  margin: 0;
  overflow: hidden;   /* ADD THIS */
}

html {
  background: url("Sky_Serene_4k.jpg") no-repeat center/cover;
}

body {
  font-family: Arial;
  min-height: 100vh;
  background: url("Sky_Serene_4k.jpg") no-repeat center/cover;
  background-attachment: fixed;

  display: flex;
  justify-content: center;
  align-items: center;
}
    
.wrapper {
  width: 340px;
  padding: 40px;
  background: rgba(255,255,255,0.1);
  border-radius: 12px;
  backdrop-filter: blur(12px);
  max-height: 90vh;
}

h2 {
  text-align: center;
  color: #fff;
  margin-bottom: 30px;
}

.input-field {
  position: relative;   /* ADD THIS */
  margin-bottom: 25px;
}

.input-field label {
  position: absolute;
  top: -10px;
  left: 0;
  font-size: 12px;
  color: #fff;
}
    
.input-field input {
  width: 100%;
  padding: 10px 0;
  background: transparent;
  border: none;
  border-bottom: 2px solid #fff;
  color: #fff;
  outline: none;
}

button {
  width: 100%;
  padding: 10px;
  background: rgba(255,255,255,0.8);
  border: none;
  cursor: pointer;
  margin-top: 2px;
  border-radius: 1px;
}

.view {
  background: transparent;
  border: 1px solid #fff;
  margin-top: 8px;
  color: #fff;
}
    
.alert {
  position: fixed;
  top: 20px;
  right: 20px;
  padding: 15px;
  color: white;
  border-radius: 6px;
  z-index: 9999;
  min-width: 220px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.3);

  opacity: 0;                  /* start hidden */
  transform: translateY(-10px);/* slight move */
  transition: all 0.4s ease;   /* smooth */
}

/* SHOW (fade in) */
.alert.show {
  opacity: 1;
  transform: translateY(0);
}

/* HIDE (fade out) */
.alert.hide {
  opacity: 0;
  transform: translateY(-10px);
}

.success {
  background-color: #4CAF50;
}

.closebtn {
  float: right;
  margin-left: 10px;
  cursor: pointer;
}
    
button {
  width: 100%;
  padding: 10px;

  background: rgba(255,255,255,0.8);  /* same as your register */
  border: none;
  cursor: pointer;
  margin-top: 10px;   /* IMPORTANT: spacing fix */
  border-radius: 1px;

  transition: 0.2s;
}
    
button:hover {
  background: rgba(255,255,255,1);   /* slightly brighter */
}
    
.view {
  background: transparent;
  border: 1px solid #fff;
  margin-top: 8px;
  color: #fff;
}

.view:hover {
  background: rgba(255,255,255,0.2);
}
</style>
</head>

<body>

<div id="successBox" class="alert success" style="display:none;">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <span id="msgText"></span>
</div>
    
<div class="wrapper">

<form action="Update.php" method="post">

<h2>Edit Guest</h2>

<input type="hidden" name="id" value="<?php echo $id; ?>">
    
<div class="input-field">
	<input type="text" name="firstname" value="<?php echo $firstname; ?>" required>
    <label>Enter first name</label>
</div>

<div class="input-field">
	<input type="text" name="lastname" value="<?php echo $lastname; ?>" required>
    <label>Enter last name</label>
</div>

<div class="input-field">
	<input type="email" name="email" value="<?php echo $email; ?>" required>
    <label>Enter email</label>
</div>

<button type="submit">Update</button>
<button type="button" class="view" onclick="goBack()">Back to Table</button>

</form>
</div>

<script>
function goBack() {
  document.body.style.opacity = "0";
  document.body.style.transition = "opacity 0.3s";

  setTimeout(() => {
    window.location.href = "Table.php";
  }, 300);
}

/* SHOW ALERT AFTER REDIRECT */
const params = new URLSearchParams(window.location.search);

if (params.get("msg") === "2") {
  showAlert("Updated successfully");
  window.history.replaceState({}, document.title, "Update_Form.php");
}
    
function showAlert(message) {
  const box = document.getElementById("successBox");
  const text = document.getElementById("msgText");

  text.innerText = message;
  box.style.display = "block";

  // trigger fade in
  setTimeout(() => {
    box.classList.add("show");
  }, 10);

  // fade out after 1s
  setTimeout(() => {
    box.classList.remove("show");
    box.classList.add("hide");

    setTimeout(() => {
      box.style.display = "none";
      box.classList.remove("hide");
    }, 400);
  }, 1000);
}
</script>

</body>
</html>