<?php
session_start();
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
	
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Practical Website">
    <meta name="author" content="Kunal Kirimkar">

    <title>Welcome </title>
</head>
<body>
    <div class="container">
        <header class="jumbotron hero-spacer">
            <h1>Welcome...</h1>
            <p>You are logged in successfully.</p>
			<p><a  href="logout.php" class="btn btn-primary btn-large">Logout</a>
            </p>
        </header>

        <hr>
        </div>
        <hr>
    </div>
</body>

</html>
<?php } ?>