<?php 
include('security.php');

if (isset($_POST['check_submit_btn'])) 
{
	$email = $_POST['email_id'];
	$email_query = "select * from register where email = '$email'";
	$email_query_run = mysqli_query($connection, $email_query);
	if(mysqli_num_rows($email_query_run)>0)
	{
		echo "Email already exists. Please try another one.";
    }
}

if (isset($_POST['registerbtn'])) 
{
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$pass_enc = password_hash($password, PASSWORD_BCRYPT);
	$cpassword = $_POST['confirmpassword'];

	$email_query = "select * from register where email = '$email'";
	$email_query_run = mysqli_query($connection, $email_query);
	if(mysqli_num_rows($email_query_run)>0)
	{
		$_SESSION['status'] = "Email already taken. Please try another one.";
		$_SESSION['status_code'] = "error";
    	header('Location: register.php');
	}
	else
	{
	if($password === $cpassword)
	{
	$query = "Insert into register (name,email,password) values (trim('$username'),trim('$email'),'$pass_enc')";
	$query_run = mysqli_query($connection,$query);
    
    if ($query_run) 
    {
    	$_SESSION['status'] = "Admin Profile Successfully Added";
    	$_SESSION['status_code'] = "success";
    	header('Location: register.php');
    }
    else
    {
    	$_SESSION['status'] = "Admin Profile Not Added";
    	$_SESSION['status_code'] = "error";
    	header('Location: register.php');	
    }
 }
 else
 {
 	$_SESSION['status'] = "Password and Confirm Password does not match";
 	$_SESSION['status_code'] = "error";
    header('Location: register.php');
 }

}
}


if (isset($_POST['updatebtn'])) 
{
	$id = $_POST['edit_id'];
	$username = $_POST['edit_username'];
	$email = $_POST['edit_email'];
	$password = $_POST['edit_password'];
	$pass_enc = password_hash($password, PASSWORD_DEFAULT);

	$query = "update register set name = trim('$username'), email = trim('$email') , password = trim('$pass_enc') where id = '$id'";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) 
	{
		$_SESSION['status'] = "Data Updated Successfully";
		$_SESSION['status_code'] = "success";
		header('Location: register.php');
	}
	else
	{
		$_SESSION['status'] = "Your data is not updated";
		$_SESSION['status_code'] = "error";
		header('Location: register.php');
	}
}


if (isset($_POST['check_delete_btn'])) 
{
	$delete_id = $_POST['delete_id'];

	$query = "delete from register where id = '$delete_id'";
	$query_run = mysqli_query($connection,$query);
}



if (isset($_POST['login_btn'])) 
{
	$email_login = $_POST['email'];
	$password_login = $_POST['password'];

	if(empty($email_login) || empty($password_login)  )
      {  
           $_SESSION['status'] = "Both the fields are required.";
					header('Location: login.php');
      } 

    else
    {

	$query = "select * from register where email='$email_login'";
	$query_run = mysqli_query($connection,$query);
	$num_rows = mysqli_num_rows($query_run);

	if ($num_rows == 1) 
	{
		$row = mysqli_fetch_array($query_run);
		$password_check = $row['password'];
		
		if (password_verify($password_login, $password_check)) 
		{
			$_SESSION['username'] = $email_login;
			header('Location: index.php');		
		}
			else
				{
					$_SESSION['status'] = "Email or Password is incorrect";
					header('Location: login.php');
				}
	}

	else
	{
		$_SESSION['status'] = "Email or Password is incorrect";
		header('Location: login.php');
	}
}
}


// ---------------------------------Clients-------------------------------------


if (isset($_POST['register-clients-btn'])) 
{
	$name = $_POST['name'];
	$type = $_POST['type'];
	$image = $_FILES['clients-image']['name'];

	$img_type = array('image/jpg','image/png','image/jpeg');
	$img_extension = in_array($_FILES['clients-image']['type'], $img_type);

	if($img_extension)
	{

	if (file_exists("upload/clients/" . $_FILES['clients-image']['name'])) 
	{
		$store = $_FILES['clients-image']['name'];
		$_SESSION['status'] = "Image Already Exists With Same Name OR Image Not Selected.";
    	$_SESSION['status_code'] = "error";
    	header('Location: clients.php');
	}

	else
	{

	$query = "Insert into clients (name,type,image) values (trim('$name'),'$type','$image')";
	$query_run = mysqli_query($connection,$query);
    
    if ($query_run) 
    {
    	move_uploaded_file($_FILES['clients-image']['tmp_name'], "upload/clients/".$_FILES['clients-image']['name']);
    	$_SESSION['status'] = "Clients Successfully Added";
    	$_SESSION['status_code'] = "success";
    	header('Location: clients.php');
    }
    else
    {
    	$_SESSION['status'] = "Clients Not Added";
    	$_SESSION['status_code'] = "error";
    	header('Location: clients.php');	
    }

}

}

else
{
	    $_SESSION['status'] = "Only JPG, PNG and JPEG allowed. Choose another.";
    	$_SESSION['status_code'] = "error";
    	header('Location: clients.php');
}

}


if (isset($_POST['update-clients-btn'])) 
{
	$id = $_POST['edit_id'];
	$name = $_POST['edit_name'];
	$type = $_POST['edit_type'];
	$image = $_FILES['clients-image']['name'];

	$img_type = array('image/jpg','image/png','image/jpeg');
	$img_extension = in_array($_FILES['clients-image']['type'], $img_type);

	if($img_extension)
	{

	$clients_query = "select * from clients where id = '$id'";
	$clients_query_run = mysqli_query($connection,$clients_query);
	foreach ($clients_query_run as $clients_row) 
	{ 

		if($image == NULL)
		{
			$image_data = $clients_row['image'];
		
		}
		else
		{
			if ($img_path = "upload/clients/".$clients_row['image']) 
			{
				unlink($img_path);
				$image_data = $image;
			}
		}
	}

	$query = "update clients set name = trim('$name'), type = '$type' , image = '$image_data' where id = '$id'";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) 
	{
		if ($image == NULL) 
		{
	    	$_SESSION['status'] = "Client Data Successfully Updated";
	    	$_SESSION['status_code'] = "success";
	    	header('Location: clients.php');
		}
		else
		{
			move_uploaded_file($_FILES['clients-image']['tmp_name'], "upload/clients/".$_FILES['clients-image']['name']);
	    	$_SESSION['status'] = "Client Data Successfully Updated";
	    	$_SESSION['status_code'] = "success";
	    	header('Location: clients.php');
		}
	}

	else
	{
		$_SESSION['status'] = "Clients Not Updated";
    	$_SESSION['status_code'] = "error";
    	header('Location: clients.php');
	}

	}

else
{
	    $_SESSION['status'] = "Only JPG, PNG and JPEG allowed. Choose another.";
    	$_SESSION['status_code'] = "error";
    	header('Location: clients.php');
}

	
}


if (isset($_POST['check_delete_clients_btn'])) 
{
	$delete_id = $_POST['delete_id'];

	$clients_query = "select * from clients where id = '$delete_id'";
	$clients_query_run = mysqli_query($connection,$clients_query);
	foreach ($clients_query_run as $clients_row) 
	{ 
			if ($img_path = "upload/clients/".$clients_row['image']) 
			{
				unlink($img_path);
				$query = "delete from clients where id = '$delete_id'";
				$query_run = mysqli_query($connection,$query);
	
			}
		}
	}



// ------------------------------Testmonials--------------------------------------------------//



if (isset($_POST['register-testmonials-btn'])) 
{
	$name = $_POST['name'];
	$address = $_POST['address'];
	$message = $connection -> real_escape_string($_POST['message']);
	$image = $_FILES['testmonials-image']['name'];

	$img_type = array('image/jpg','image/png','image/jpeg');
	$img_extension = in_array($_FILES['testmonials-image']['type'], $img_type);

	if($img_extension)
	{

	if (file_exists("upload/testmonials/" . $_FILES['testmonials-image']['name'])) 
	{
		$store = $_FILES['testmonials-image']['name'];
		$_SESSION['status'] = "Image Already Exists With Same Name OR Image Not Selected.";
    	$_SESSION['status_code'] = "error";
    	header('Location: testmonials.php');
	}

	else
	{

	$query = "Insert into testmonials (name,address,message,image) values (trim('$name'),trim('$address'),trim('$message'),'$image')";
	$query_run = mysqli_query($connection,$query);
    
    if ($query_run) 
    {
    	move_uploaded_file($_FILES['testmonials-image']['tmp_name'], "upload/testmonials/".$_FILES['testmonials-image']['name']);
    	$_SESSION['status'] = "Testmonials Successfully Added";
    	$_SESSION['status_code'] = "success";
    	header('Location: testmonials.php');
    }
    else
    {
    	$_SESSION['status'] = "Testmonials Not Added";
    	$_SESSION['status_code'] = "error";
    	header('Location: testmonials.php');	
    }

}
}

else
{
	    $_SESSION['status'] = "Only JPG, PNG and JPEG allowed. Choose another.";
    	$_SESSION['status_code'] = "error";
    	header('Location: testmonials.php');
}

}


if (isset($_POST['update-testmonials-btn'])) 
{
	$id = $_POST['edit_id'];
	$name = $_POST['edit_name'];
	$address = $_POST['edit_address'];
	$message = $connection -> real_escape_string($_POST['edit_message']);
	$image = $_FILES['testmonials-image']['name'];

	$img_type = array('image/jpg','image/png','image/jpeg');
	$img_extension = in_array($_FILES['testmonials-image']['type'], $img_type);

	if($img_extension)
	{

	$testmonials_query = "select * from testmonials where id = '$id'";
	$testmonials_query_run = mysqli_query($connection,$testmonials_query);
	foreach ($testmonials_query_run as $testmonials_row) 
	{ 

		if($image == NULL)
		{
			$image_data = $testmonials_row['image'];
		
		}
		else
		{
			if ($img_path = "upload/testmonials/".$testmonials_row['image']) 
			{
				unlink($img_path);
				$image_data = $image;
			}
		}
	}

	$query = "update testmonials set name = trim('$name'), address = trim('$address') , message = trim('$message') , image = '$image_data' where id = '$id'";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) 
	{
		if ($image == NULL) 
		{
	    	$_SESSION['status'] = "Testmonials Successfully Updated";
	    	$_SESSION['status_code'] = "success";
	    	header('Location: testmonials.php');
		}
		else
		{
			move_uploaded_file($_FILES['testmonials-image']['tmp_name'], "upload/testmonials/".$_FILES['testmonials-image']['name']);
	    	$_SESSION['status'] = "Testmonials Successfully Updated";
	    	$_SESSION['status_code'] = "success";
	    	header('Location: testmonials.php');
		}
	}

	else
	{
		$_SESSION['status'] = "Testmonials Not Updated";
    	$_SESSION['status_code'] = "error";
    	header('Location: testmonials.php');
	}
}

else
{
	    $_SESSION['status'] = "Only JPG, PNG and JPEG allowed. Choose another.";
    	$_SESSION['status_code'] = "error";
    	header('Location: testmonials.php');
}
	
}


if (isset($_POST['check_delete_testmonials_btn'])) 
{
	$delete_id = $_POST['delete_id'];

	$testmonials_query = "select * from testmonials where id = '$delete_id'";
	$testmonials_query_run = mysqli_query($connection,$testmonials_query);
	foreach ($testmonials_query_run as $testmonials_row) 
	{ 
			if ($img_path = "upload/testmonials/".$testmonials_row['image']) 
			{
				unlink($img_path);
				$query = "delete from testmonials where id = '$delete_id'";
				$query_run = mysqli_query($connection,$query);
	
			}
		}
	}


// -----------------------------------Gallery------------------------------------------------------//

if (isset($_POST['register-gallery-btn'])) 
{
	$description = $connection -> real_escape_string($_POST['description']);
	$image = $_FILES['gallery-image']['name'];

	$img_type = array('image/jpg','image/png','image/jpeg');
	$img_extension = in_array($_FILES['gallery-image']['type'], $img_type);

	if($img_extension)
	{

	if (file_exists("upload/gallery/" . $_FILES['gallery-image']['name'])) 
	{
		$store = $_FILES['gallery-image']['name'];
		$_SESSION['status'] = "Image Already Exists With Same Name OR Image Not Selected.";
    	$_SESSION['status_code'] = "error";
    	header('Location: gallery.php');
	}

	else
	{

	$query = "Insert into gallery (description,image) values (trim('$description'),'$image')";
	$query_run = mysqli_query($connection,$query);
    
    if ($query_run) 
    {
    	move_uploaded_file($_FILES['gallery-image']['tmp_name'], "upload/gallery/".$_FILES['gallery-image']['name']);
    	$_SESSION['status'] = "Gallery Data Successfully Added";
    	$_SESSION['status_code'] = "success";
    	header('Location: gallery.php');
    }
    else
    {
    	$_SESSION['status'] = "Gallery Data Not Added";
    	$_SESSION['status_code'] = "error";
    	header('Location: gallery.php');	
    }

}

}

else
{
	    $_SESSION['status'] = "Only JPG, PNG and JPEG allowed. Choose another.";
    	$_SESSION['status_code'] = "error";
    	header('Location: gallery.php');
}

}


if (isset($_POST['update-gallery-btn'])) 
{
	$id = $_POST['edit_id'];
	$description = $connection -> real_escape_string($_POST['edit_description']);
	$image = $_FILES['gallery-image']['name'];

	$img_type = array('image/jpg','image/png','image/jpeg');
	$img_extension = in_array($_FILES['gallery-image']['type'], $img_type);

	if($img_extension)
	{

	$gallery_query = "select * from gallery where id = '$id'";
	$gallery_query_run = mysqli_query($connection,$gallery_query);
	foreach ($gallery_query_run as $gallery_row) 
	{ 

		if($image == NULL)
		{
			$image_data = $gallery_row['image'];
		
		}
		else
		{
			if ($img_path = "upload/gallery/".$gallery_row['image']) 
			{
				unlink($img_path);
				$image_data = $image;
			}
		}
	}

	$query = "update gallery set description = trim('$description'), image = '$image_data' where id = '$id'";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) 
	{
		if ($image == NULL) 
		{
	    	$_SESSION['status'] = "Gallery Data Successfully Updated";
	    	$_SESSION['status_code'] = "success";
	    	header('Location: gallery.php');
		}
		else
		{
			move_uploaded_file($_FILES['gallery-image']['tmp_name'], "upload/gallery/".$_FILES['gallery-image']['name']);
	    	$_SESSION['status'] = "Gallery Data Successfully Updated";
	    	$_SESSION['status_code'] = "success";
	    	header('Location: gallery.php');
		}
	}

	else
	{
		$_SESSION['status'] = "Gallery Data Not Updated";
    	$_SESSION['status_code'] = "error";
    	header('Location: gallery.php');
	}

}

else
{
	    $_SESSION['status'] = "Only JPG, PNG and JPEG allowed. Choose another.";
    	$_SESSION['status_code'] = "error";
    	header('Location: gallery.php');
}

	
}


if (isset($_POST['check_delete_gallery_btn'])) 
{
	$delete_id = $_POST['delete_id'];

	$gallery_query = "select * from gallery where id = '$delete_id'";
	$gallery_query_run = mysqli_query($connection,$gallery_query);
	foreach ($gallery_query_run as $gallery_row) 
	{ 
			if ($img_path = "upload/gallery/".$gallery_row['image']) 
			{
				unlink($img_path);
				$query = "delete from gallery where id = '$delete_id'";
				$query_run = mysqli_query($connection,$query);
	
			}
		}
	}



// -------------------------------------FAQ's-----------------------------------------------//


	if (isset($_POST['register-faqs-btn'])) 
{
	$question = $_POST['question'];
	$answer = $connection -> real_escape_string($_POST['answer']);

	$query = "Insert into faqs (question,answer) values (trim('$question'),trim('$answer'))";
	$query_run = mysqli_query($connection,$query);
    
    if ($query_run) 
    {
    	$_SESSION['status'] = "Data Successfully Added";
    	$_SESSION['status_code'] = "success";
    	header('Location: faqs.php');
    }
    else
    {
    	$_SESSION['status'] = "Data Not Added";
    	$_SESSION['status_code'] = "error";
    	header('Location: faqs.php');	
    }

}



if (isset($_POST['update-faqs-btn'])) 
{
	$id = $_POST['edit_id'];
	$question = $_POST['edit_question'];
	$answer = $connection -> real_escape_string($_POST['edit_answer']);

	$query = "update faqs set question = trim('$question'), answer = trim('$answer') where id = '$id'";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) 
	{
	   	$_SESSION['status'] = "Data Successfully Updated";
    	$_SESSION['status_code'] = "success";
    	header('Location: faqs.php');
	}

	else
	{
		$_SESSION['status'] = "Data Not Updated";
    	$_SESSION['status_code'] = "error";
    	header('Location: faqs.php');
	}

	
}


if (isset($_POST['check_delete_faqs_btn'])) 
{
	$delete_id = $_POST['delete_id'];

			unlink($img_path);
			$query = "delete from faqs where id = '$delete_id'";
			$query_run = mysqli_query($connection,$query);
}




// ---------------------------Career----------------------------------------




	if (isset($_POST['register-career-btn'])) 
{
	$position = $_POST['position'];
	$opening = $_POST['opening'];
	$level = $_POST['level'];
	$type = $_POST['type'];
	$salary = $_POST['salary'];
	$experience = $_POST['experience'];
	$skills = $_POST['skills'];
	$description = $connection -> real_escape_string($_POST['description']);

	$query = "Insert into career (position,opening,level,type,salary,experience,skills,description) values (trim('$position'),trim('$opening'),'$level','$type',trim('$salary'),trim('$experience'),trim('$skills'),trim('$description'))";
	$query_run = mysqli_query($connection,$query);
    
    if ($query_run) 
    {
    	$_SESSION['status'] = "Vacancy Successfully Added";
    	$_SESSION['status_code'] = "success";
    	header('Location: career.php');
    }
    else
    {
    	$_SESSION['status'] = "Vacancy Not Added";
    	$_SESSION['status_code'] = "error";
    	header('Location: career.php');	
    }

}



if (isset($_POST['update-career-btn'])) 
{
	$id = $_POST['edit_id'];
	$position = $_POST['edit_position'];
	$opening = $_POST['edit_opening'];
	$level = $_POST['edit_level'];
	$type = $_POST['edit_type'];
	$salary = $_POST['edit_salary'];
	$experience = $_POST['edit_experience'];
	$skills = $_POST['edit_skills'];
	$description = $connection -> real_escape_string($_POST['edit_description']);

	$query = "update career set position = trim('$position'), opening = trim('$opening'), level = '$level', type = '$type', salary = trim('$salary'), experience = trim('$experience'), skills = trim('$skills'), description = trim('$description') where id = '$id'";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) 
	{
	   	$_SESSION['status'] = "Vacancy Successfully Updated";
    	$_SESSION['status_code'] = "success";
    	header('Location: career.php');
	}

	else
	{
		$_SESSION['status'] = "Vacancy Not Updated";
    	$_SESSION['status_code'] = "error";
    	header('Location: career.php');
	}

	
}


if (isset($_POST['check_delete_career_btn'])) 
{
	$delete_id = $_POST['delete_id'];

			unlink($img_path);
			$query = "delete from career where id = '$delete_id'";
			$query_run = mysqli_query($connection,$query);
}



?>
