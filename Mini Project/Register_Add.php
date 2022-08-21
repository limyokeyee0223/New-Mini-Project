<html>
    <html>
        <link rel="icon" type="image/x-icon" href="Mini_project/icon.png" />
    </html>

    <?php
        if(isset($_POST['submit']))
        {
            /*
            $last_count = 0;
            $data=file_get_contents('Register.json');
			$tempdata=json_decode($data);
            $data=json_decode($data,true);
			$tempdata=$tempdata->register_information;

            if(!empty($tempdata))
			$last_count = sizeof($tempdata);
			
			$lastId = $data['register_information'][$last_count-1]['id'];

            */

            $data=file_get_contents('Register.json');
            //get the file users content
            $data=json_decode($data,false);

           
            $add_ary=array(
                'Username'=>$_POST['username'],
                'Ic'=>$_POST['ic_no'],
                'ContactNumber'=>$_POST['contact'],
                'Address'=>$_POST['address'],
                'Email'=>$_POST['email'],
                'Password'=>$_POST['psw']
            );

            $data[]=$add_ary;  //all form value store into data files
            $data = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents('Register.json', $data);

            header("Location: Register_Index.php"); 
            
            /*
            $data['register_information'][]=$add_ary;
			
            $data = json_encode($data,JSON_PRETTY_PRINT);
            file_put_contents('Register.json',$data);
			header('Location: Register_Index.php');
			exit();*/
        }
    ?>
</html>