<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->       
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <script src="//cdn.jsdelivr.net/npm/pouchdb@7.3.0/dist/pouchdb.min.js"></script>

        <link rel="icon" type="image/x-icon" href="Mini_project/icon.png" />
        <script src="js/jquery-2.2.3.min.js"></script>
        
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
                background: #d299c2;
          
                /* Chrome 10-25, Safari 5.1-6 */
                background: -webkit-linear-gradient(to top, rgba(210, 153, 194, 1), rgba(254, 249, 215, 1));
          
                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                background: linear-gradient(to top, rgba(210, 153, 194, 1), rgba(254, 249, 215, 1))
            }
            h1
            {
                text-align: center;
            }
            table 
            {
                border-collapse: collapse;
                width: 100%;
            }
            th
            {
                border: 1px solid black;
                text-align: center;
                padding: 8px;
                background-color: black;
                color: white;
            }
            td
            {
                border: 1px solid black;
                text-align: center;
                padding: 8px;
            }
            tr:nth-child(even) 
            {
                background-color: #99CCFF;
            }
            tr:nth-child(odd) 
            {
                background-color: #FFFFFF;
            }
            .btn-lg
            {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
                border: none;
                font-size: 25px;
                border-radius: 10px;
                color: black;
                background: #9F98E8;
                background: -webkit-linear-gradient(to left, rgba(159, 152, 232, 1), rgba(175, 246, 207, 1));
                background: linear-gradient(to left, rgba(159, 152, 232, 1), rgba(175, 246, 207, 1));
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
                        <a class="nav-link" href="Register_Index.php">Customer Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Order_Index.php">Customer Order</a>
                    </li>
                    </ul>
                    <div class="topnav-right">
                        <button class="nav_logout" type="button" onclick="window.location.href='Index.html'">Log Out</button>
                    </div>
                </div>
            </div>
        </nav>
                  
        <script>
            var db = new PouchDB('register');
            
            var coun = 1;
            
            db.allDocs({ include_docs: true, ascending: true }, (err, doc) => {

                doc.rows.forEach(e => {
                    console.log(e.doc);
                    console.log(e.doc.order_product_name);
                    let fg = '<tr><td>' + coun + '</td><td>' + e.doc.username + '</td><td>' + e.doc.ic_no + '</td><td>' + e.doc.contact + '</td><td>' + e.doc.address + '</td><td>' + e.doc.email + '</td><td>' + e.doc.psw + '</td><td><a class="button" href="?u=' + e.doc._id + '">Delete<i class="fa fa-trash - alt" ></i></a></td></tr>';
            
                    tableBody = $("table tbody");
                    tableBody.append(fg);
                    ++coun;
                });

            }).catch((err) => {
                console.error(err);
            });
            
            const queryString = window.location.search.substring(3);
            if (queryString) 
            {
                db.get(queryString).then(function (doc) 
                {
                    return db.remove(doc);
                });
                // alert(queryString)
            }
        </script>

        <div class="container-fluid" style="margin-top:80px">
        <br><h1>Customer Data</h1><br>
        <table>
            <tr>
                <th width="50px">No.</th>
                <th width="200px">Username</th>
                <th width="200px">IC no.</th>   
                <th width="200px">Contact Number</th>
				<th width="200px">Address</th>
                <th width="200px">Email</th>
                <th width="200px">Password</th>
                <th colspan="2" width="250px">Action</th>
            </tr>
            <tbody>

            </tbody>
        </table><br><br><br>
        <center><a href="Register.html"><button class="btn-lg" type="button">Add</button></a><center>
        </div><br><br><br><br>

        <footer>
            <div class="footer-content">
                <h3><img src="Mini_project/icon.png" alt="Avatar Logo" style="width:100px;">WEMIDO</h3>
                <p>New Era University College <br> Education Purpose Only <br> Copyright @ 2120057, 2120076, 2120077 . designed by <span>Lim Yoke Yee, Lim Feng Ting, Melissa Chan Jia Eu</span></p>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>