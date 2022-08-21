<html>
    <?php
        $id = $_GET['id'];
        $data = file_get_contents('Order.json');
        $data = json_decode($data,true);

        $row = $data[$id];

        if(isset($_POST['update']))
        {
            $add_ary=array(
                'date'=>$_POST[''],
                'name'=>$_POST['name'],
                'course'=>$_POST['course'],
                'price'=>$_POST['price'],
            );

            $data[$id] = $add_ary;
            $data = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents('Order.json', $data);

            header('location: Order_Index.php');
        }
    ?>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->       
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="icon" type="image/x-icon" href="Mini_project/icon.png" />

        <script src="//cdn.jsdelivr.net/npm/pouchdb@7.3.0/dist/pouchdb.min.js"></script>

        <title>Mini Project - WEMIDO</title>

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
                background: #9795EF;

                /* Chrome 10-25, Safari 5.1-6 */
                background: -webkit-linear-gradient(to right, rgba(151, 149, 239, 1), rgba(249, 197, 209, 1));

                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                background: linear-gradient(to right, rgba(151, 149, 239, 1), rgba(249, 197, 209, 1))
            }
            input[type=text], input[type=number] 
            {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }
            table 
            {
                border-collapse: collapse;
                width: auto;
                margin-left: auto; 
                margin-right: auto;
            }
            th
            {
                border: none;
                text-align: right;
                padding: 8px;
                color:white;
                font-size: 20px;
            }
            td
            {
                border: none;
                text-align: left;
                padding: 8px;
                color: white;
            }
            img /*round-pill*/
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
                        <a class="nav-link" href="Home.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="About.html">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Course</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="Courses_Name.html">Courses</a></li>
                            <li><a class="dropdown-item" href="BCS.html">BCS</a></li>
                            <li><a class="dropdown-item" href="BSE.html">BSE</a></li>
                            <li><a class="dropdown-item" href="BNT.html">BNT</a></li>
                            <li><a class="dropdown-item" href="DCS.html">DCS</a></li>
                            <li><a class="dropdown-item" href="DEC.html">DEC</a></li>
                            <li><a class="dropdown-item" href="DIT.html">DIT</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Customer_Profile.html">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Order.html">Order</a>
                    </li>
                    </ul>
                    <div class="topnav-right">
                        <button class="nav_logout" type="button" onclick="window.location.href='Index.html'">Log Out</button>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container-fluid" style="margin-top:40px">
            <form name="new_customer" class="w-100 px-4 py-5" style="border-radius: .5rem .5rem 0 0;" method="post">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                    <h1 class="fw-bold mb-2 text-uppercase">Edit Information</h1><br>
                    <table>
                        <tr>
                            <th>Name: </th>
                            <td><input type="text" name="name" value="<?php echo $row['name']?>"></td>
                        </tr>
                        <tr>
                            <th>Course: </th>
                            <td><input type="text" name="course" value="<?php echo $row['course']?>"></td>
                        </tr>
                        <tr>
                            <th>Price (RM): </th>
                            <td><input type="number" name="price" value="<?php echo $row['price']?>"></td>
                        </tr>
                    </table><br><br>
                    <center><button class="btn btn-outline-light btn-lg px-5" type="submit" name="update"><b>UPDATE</b></button></center>
                    
                    </div>
                    </div>
                    </div>
                </div>
            </form>
        </div>

        <footer>
            <div class="footer-content">
                <h3><img src="Mini_project/icon.png" alt="Avatar Logo" style="width:100px;">WEMIDO</h3>
                <p>New Era University College <br> Education Purpose Only <br> Copyright @ 2120057, 2120076, 2120077 . designed by <span>Lim Yoke Yee, Lim Feng Ting, Melissa Chan Jia Eu</span></p>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>