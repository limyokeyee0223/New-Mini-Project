<html>
    <?php
        $id=$_GET['id'];
        $data=file_get_contents('Register.json');
		$tempdata=json_decode($data);
        $data=json_decode($data,true);
        $row = $data['register_information'][$id-1];

        if(isset($_POST['update']))
        {
			foreach ($tempdata->register_information as $key => $value) 
            {
				if ($value->id == $row['id']) 
                {
					$value->Username = $_POST['username'];
					$value->Ic = $_POST['ic_no'];
                    $value->ContactNumber = $_POST['contact'];
                    $value->Address = $_POST['address'];
                    $value->Email = $_POST['email'];
                    $value->Password = $_POST['psw'];
				}
			}
            $data = json_encode($tempdata,JSON_PRETTY_PRINT);
            file_put_contents('Register.json',$data);
			header("Location: Register_Index.php"); 
        }
    ?>

    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script src="//cdn.jsdelivr.net/npm/pouchdb@7.3.0/dist/pouchdb.min.js"></script>
        
        <link rel="icon" type="image/x-icon" href="Mini_project/icon.png" />
            
        <style>
            div   /*navigation bar word*/
            {
                font-size: 20px;  
            }
            .nav_logout   /*navigation logout button*/
            {
                background-color: transparent;
                color: white;
                padding: 12px 20px;
                border: none;
                cursor: pointer;
            }
            body 
            {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;

                /* fallback for old browsers */
                background: #6a11cb;
          
                /* Chrome 10-25, Safari 5.1-6 */
                background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
          
                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
            }
            input[type=email], input[type=password], input[type=text], input[type=tel]
            {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }
            img.avatar   /*middle image*/
            {
                width: 40%;
            }
            .container  /*reset password*/
            {
                padding: 16px;
            }
            #message   /* The message box is shown when the user clicks on the password field */
            {
                display:none;
                background: #f1f1f1;
                color: #000;
                position: relative;
                padding: 20px;
                margin-top: 10px;
            }
            #message p   /* The message box is shown when the user clicks on the password field */
            {
                padding: 10px 35px;
                font-size: 18px;
            }
            .valid 
            {
                color: green;
            }
            .valid:before 
            {
                position: relative;
                left: -35px;
                content: "???";
            }
            /* Add a red text color and an "x" when the requirements are wrong */
            .invalid 
            {
                color: red;
            }
            .invalid:before 
            {
                position: relative;
                left: -35px;
                content: "???";
            }
            img /*footer image*/
            {
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
            footer  /*footer*/
            {
                background: #111;
                height: auto;
                width: auto;
                font-family: 'Open Sans';
                padding-top: 20px;
                color: #FFFFFF;
            }
            .footer-content  /*footer*/
            {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                text-align: center;
            }
            .footer-content h3  /*footer*/
            {
                font-size: 1.8rem;
                font-weight: 400;
                text-transform: capitalize;
                line-height: 3rem;
            }
            .footer-content p  /*footer*/
            {
                font-size: 20px;
                word-spacing: 2px;
                text-transform: capitalize;
            }
            .footer-content span  /*footer*/
            {
                text-transform: uppercase;
                opacity: .4;
                font-weight: 200;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <div class="container-fluid">
                <img src="Mini_project/icon.png" alt="Avatar Logo" style="width:50px;">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Course</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Courses</a></li>
                            <li><a class="dropdown-item" href="#">BCS</a></li>
                            <li><a class="dropdown-item" href="#">BSE</a></li>
                            <li><a class="dropdown-item" href="#">BNT</a></li>
                            <li><a class="dropdown-item" href="#">DCS</a></li>
                            <li><a class="dropdown-item" href="#">DEC</a></li>
                            <li><a class="dropdown-item" href="#">DIT</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Order</a>
                    </li>
                    </ul>
                    <div class="topnav-right">
                        <button class="nav_logout" type="button" onclick="window.location.href='Index.html'">Log Out</button>
                    </div>
                </div>
            </div>
        </nav>
        
        <div class="container-fluid" style="margin-top:80px">
            <form onsubmit="return validateForm()" action="Register_Edit.php?id=<?php echo $id?>" class="w-100 px-4 py-5" style="border-radius: .5rem .5rem 0 0;" name="register" method="post">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                            <h1 class="fw-bold mb-2 text-uppercase">Register</h1><br>
                            <img src="Mini_project/icon.png" alt="Avatar" class="avatar"><br><br>
                            <div class="form-outline form-white mb-4">
					            <input type="text" id="username" name="username" placeholder="Username" pattern="/[A-Za-z0-9]/g" value="<?php echo $row['Username']?>" required>
                            </div>

                            <div class="form-outline form-white mb-4">
					            <input type="text" id="ic_no" name="ic_no" placeholder="IC Number" pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}" title="Ic no. should have ???-??? and 12 number only" value="<?php echo $row['Ic']?>" required>
                            </div>

                            <div class="form-outline form-white mb-4">
					            <input type="tel" id="contact" name="contact" placeholder="Contact Number" pattern="[0-9]{3}-[0-9]{7,8}" title="At least 10 numbers and should have ???-???" value="<?php echo $row['ContactNumber']?>" required>
                            </div>

                            <div class="form-outline form-white mb-4">
					            <input type="text" id="address" name="address" placeholder="Address" pattern="/[A-Za-z0-9]/g" value="<?php echo $row['Address']?>" required>
                            </div>

                            <div class="form-outline form-white mb-4">
					            <input type="email" id="email" name="email" placeholder="Email" pattern="^[a-zA-Z0-9]+@(gmail|hotmail|yahoo)+\.(com)$" title="only allow ???@gmail.com???, ???@hotmail.com???, ???@yahoo.com???" value="<?php echo $row['Email']?>" required>
                            </div>
          
                            <div class="form-outline form-white mb-4">
                                <input type="password" id="psw" name="psw" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="<?php echo $row['Password']?>" required>
                            </div>

                            <div id="message" style="text-align: left;">
                                <h4>Password must contain the following:</h4>
                                <p id="uppercase" class="invalid">Uppercase Letters</p>
                                <p id="lowercase" class="invalid">Lowercase Letters</p>
                                <p id="number" class="invalid">Number</p>
                                <p id="length" class="invalid">Minimum 8 Characters</p>
                            </div><br><br>

                            <button class="btn btn-outline-light btn-lg px-5" type="submit" name="update">UPDATE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script>
            var myInput = document.getElementById("psw");
            var uppercase = document.getElementById("uppercase");
            var lowercase = document.getElementById("lowercase");
            var number = document.getElementById("number");
            var length = document.getElementById("length");
            
            // When the user clicks on the password field, show the message box
            myInput.onfocus = function() 
            {
                document.getElementById("message").style.display = "block";
            }
            
            // When the user clicks outside of the password field, hide the message box
            myInput.onblur = function() 
            {
                document.getElementById("message").style.display = "none";
            }
            
            // When the user starts to type something inside the password field
            myInput.onkeyup = function() 
            {
                // Validate uppercase letters
                var upperCaseLetters = /[A-Z]/g;
                if(myInput.value.match(upperCaseLetters)) 
                {  
                    uppercase.classList.remove("invalid");
                    uppercase.classList.add("valid");
                } 
                else 
                {
                    uppercase.classList.remove("valid");
                    uppercase.classList.add("invalid");
                }

                // Validate lowercase letters
                var lowerCaseLetters = /[a-z]/g;
                if(myInput.value.match(lowerCaseLetters)) 
                {  
                    lowercase.classList.remove("invalid");
                    lowercase.classList.add("valid");
                } 
                else 
                {
                    lowercase.classList.remove("valid");
                    lowercase.classList.add("invalid");
                }
            
                // Validate numbers
                var numbers = /[0-9]/g;
                if(myInput.value.match(numbers)) 
                {  
                    number.classList.remove("invalid");
                    number.classList.add("valid");
                } 
                else 
                {
                    number.classList.remove("valid");
                    number.classList.add("invalid");
                }
                
                // Validate length
                if(myInput.value.length >= 8) 
                {
                    length.classList.remove("invalid");
                    length.classList.add("valid");
                } 
                else 
                {
                    length.classList.remove("valid");
                    length.classList.add("invalid");
                }
            }

            function validateForm()
            {
                console.log("Form submitted");
                var username = document.forms['register']['username'].value;
                var ic_no = document.forms['register']['ic_no'].value;
                var contact = document.forms['register']['contact'].value;
                var address = document.forms['register']['address'].value;
                var email = document.forms['register']['email'].value;
                var psw = document.forms['register']['psw'].value;

                var db = new PouchDB('register');
                console.log ("Database created Successfully.");

                doc =
                {
                    _id:'001' + username,
                    username:username,
                    ic_no:ic_no,
                    contact:contact,
                    address:address,
                    email:email,
                    psw:psw
                }

                db.put(doc,function(err,res)
                {
                    if(err)
                    {
                        console.log(err)
                    }
                    else
                    {
                        console.log('document created')
                    }
                })
                return false;

                db.get('001' + username, function(err, doc) 
                {
                    if (err) 
                    {
                        return console.log(err);
                    } 
                    else 
                    {
                        console.log(doc);
                    }
                });
                return false;
            }
        </script>

        <footer>
            <div class="footer-content">
                <h3><img src="Mini_project/icon.png" alt="Avatar Logo" style="width:100px;">WEMIDO</h3>
                <p>New Era University College <br> Education Purpose Only <br> Copyright @ 2120057, 2120076, 2120077 . designed by <span>Lim Yoke Yee, Lim Feng Ting, Melissa Chan Jia Eu</span></p>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        
    </body>
</html>