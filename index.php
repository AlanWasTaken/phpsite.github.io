    <?php

		if($_POST["submit"]){
						
			if(!$_POST['name']){
				$error="<br />Please enter your name";
			}
			
			if(!$_POST['email']){
				$error.="<br />Please enter your e-mail";
			}
			
			if(!$_POST['comment']){
				$error.="<br />Please enter a comment";
			}
			
			if($_POST['email']!="" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				$error.="<br />Please enter a valid e-mail address";
			}
			
			if($error){	
				$result='<div class="alert alert-danger">There were error(s):'.$error.'</div>';
			} else{
				if(mail("alan@blurbit.co.uk", "Comment from Site", "Name: ".$_POST['name'].
				
				"Email: ".$_POST['email'].
				
				"Comments: ".$_POST['comment']))
				
				{
					$result='<div class="alert alert-success">Thanks for reaching out!</div>';
				} else{
					$result='<div class="alert alert-danger">There was an error, please try again</div>';
				}
			}
		}

	?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<title>PHP Contact Form</title>

	
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    
    <link rel="stylesheet" type="text/css" href="css/mystyles.css">
    
</head>

<body>

	<div class="container">
    	<div class="row">
        	<div class="col-md-6 col-md-offset-3 emailform">
            	
                <h1>Contact Form</h1>
                
                <?php echo $result; ?>
                
                <p class="lead">Please leave your comment and I will respond shortly</p>
                
                <form method="post">
                	<div class="form-group">
                    	<label for="name"> Your Name: </label>
                        <input type="text" name="name" class="form-control" placeholder="Your Name" value="<?php echo $_POST['name']; ?>"/>
                    </div>
                    
                    <div class="form-group">
                    	<label for="e-mail"> Your E-mail: </label>
                        <input type="email" name="email" class="form-control" placeholder="Your Email"value="<?php echo $_POST['email']; ?>"/>
                    </div>
                    
                    <div class="form-group">
                    	<label for="comment"> Your Comment: </label>
                        <textarea name="comment" class="form-control"><?php echo $_POST['comment']; ?></textarea>
                    </div>
                    
                    <input type="submit" name="submit" class="btn btn-success btn-lg" value="submit" />
                
                </form>
            
            </div>
        </div>
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>