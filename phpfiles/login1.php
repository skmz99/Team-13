<script>
    var state = false;
    function toggle(){
        if(state){
            document.getElementById("ipassword").setAttribute("type","password");
            document.getElementById("icon").innerText = "visibility_off";
            state = false;
        }
        else{
            document.getElementById("ipassword").setAttribute("type","text");
            document.getElementById("icon").innerText = "visibility";
            state = true;
            icon.innerT = "visibility";
        }
    }
</script>

<style>
    .errors {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        color: red;
        font-size: 15px;
    }
    
    
    
    .login-body{
    overflow: auto;
    position:fixed;
    padding:0;
    margin:0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80%;
    width: 100%;
    box-sizing: border-box;
    letter-spacing: 0.5px;
}

    
    

    
    
    
    
    .login-input input{
    display: inline-block;
    border: 2px solid #54585A;
    width: 100%;
    padding: 10px;
    margin: 10px auto;
    margin-bottom: 10px;
    border-radius: 5px; 
}
    
    
    
/*    .login-button button, .login-button td input {*/
/*    background: #960c22;*/
/*    padding: 10px;*/
/*    width: 435px;*/
/*    color: #fff;*/
/*    margin-top: 20px;*/
/*    border-radius: 10px;*/
/*}*/
    
    
    

    
</style>

<?php
//  include_once 'index.php';
 include_once 'header.php';
    // include 'connect.php';
include 'db.inc.php';

$port = $_SERVER['WEBSITE_MYSQL_PORT'];
$host = "localhost:$port";
$username = "azure";
$password = "6#vWHD_$";
$db_name = "localdb";

//Initializes MySQLi
$mysqli = new mysqli($host,$username,$password,$db_name);

if($mysqli->connect_errno){
    echo"Failed to connect to MySQL: ". $mysqli->connect_error;
    exit();
}



    

    $errors = array('username'=>'','password'=>'');

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$Username = $_POST['Username'];
		$Password = $_POST['Password'];
     
		if(!empty($Username) && !empty($Password))
		{

			//Reads from DB
			$query = "SELECT * FROM employeedatabaseaccess WHERE Login_username  = '$Username'  limit 1";
			
			$result = mysqli_query($mysqli, $query);
            
		if($result && mysqli_num_rows($result) > 0)
			{
				$user_data = mysqli_fetch_assoc($result);
                echo "$user_data good";
                // password_verify($Password,
            //  
				if ($Password == $user_data['Login_password']  && 'admin' == $user_data['Login_role']) {
				    $user_data['Login_password'];
				    echo "accessed here";
				   // echo($user_data['Login_password']);
					$_SESSION['Login_id'] = $user_data['Login_id'];
                    $_SESSION['Login_role'] = $user_data['Login_role'];
                    $_SESSION['Login_username'] = $user_data['Login_username'];
					header("Location: Admin_home.php");
					die;
				 }                     
                 else{
                   
                     $errors['password'] = "Password does not match For UserAdmin<br/><br/>";
                }
                
                 if($Password == $user_data['Login_password'] &&'employee' == $user_data['Login_role']){ // admin else then user login to index
                  $user_data['Login_password'];
				    echo "accessed here";
				   // echo($user_data['Login_password']);
					$_SESSION['Login_id'] = $user_data['Login_id'];
                    $_SESSION['Login_role'] = $user_data['Login_role'];
                    $_SESSION['Login_username'] = $user_data['Login_username'];
					header("Location: index.php");
					die;
                     
                     
                 }
                 else {
                      $errors['password'] = "Password does not match for userEmployee<br/><br/>";
                     
                 } //extra
                
			} //num rows
			
		
			
            else{
                $errors['username'] = "Username does not exist<br/>";
            }
		}
	    else
		{
			$errors['username'] = "Fill all fields<br/>";
		}
	}
?>

    <div class="page-content">
        <div class = "login-body">
            <head2>
                <title>Log In</title>
                <link rel="stylesheet" href="style.css">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
            </head2>
            <form method="post" class="login-form">
            <h2>LOGIN</h2>
                <div class = "login-input">
                    <label class="label-single">User Name</label>
                    <input type="text" name="Username" placeholder="Username..." class="input-single" value="<?php echo isset($_POST['Username']) ? $_POST['Username'] : '' ?>"><br>
                </div>
                <div class="errors">
                        <p>
                            <?php echo $errors['username'];?>
                        </p>
                </div>
                <div class = "login-input">
                    <label class="label-single">Password</label>
                    <input type="password" name="Password" placeholder="Password..." id="ipassword" class="input-single">
                    <i><span class="material-icons-outlined" id ="icon" onclick="toggle()">visibility_off</span></i>
                </div>
                <div class="errors">
                        <p>
                            <?php echo $errors['password'];?>
                        </p>
                </div>
                <div class = "message-logredirect">No Account?</div>
                <div class = "link-logredirect"> 
                    <li><a href="signup.php">Register Instead</a></li>
                </div>
                
                <div class = "forgot-password">
                    <li><a href="simple_pw_reset.php">Forgot Your Password?</a></li>
                </div>
                <div class = "login-button">
                    <button type="submit">LOG IN</button>
                </div>
            </form>
            <div class = "testing-admin">
                FOR ADMIN LOGIN<br>
                USERNAME: username1<br>
                PASSWORD: password<br>
            </div>
        </div>
    </div>
<?php
    include_once 'footer.php';
?>