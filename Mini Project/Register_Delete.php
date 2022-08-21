<html>
    <html>
        <link rel="icon" type="image/x-icon" href="Mini_project/icon.png" />
    </html>

    <?php
        $id=$_GET['id'];
        $data=file_get_contents('Register.json');
		$tempdata=json_decode($data);
        $data=json_decode($data,true);
		$arr_index = array();
		
		foreach ($tempdata->register_information as $key => $value) 
		{
			if ($value->id == $id) 
			{
				$arr_index[] = $key;
			}
		}

		foreach ($arr_index as $i)
		{
			unset($tempdata->register_information[$i]);
		}
		
		$tempdata->register_information = array_values($tempdata->register_information);

		$index = 0;
		foreach ($tempdata->register_information as $key => $value) 
		{
			$value->id = (++$index);
		}
		
		$data = json_encode($tempdata,JSON_PRETTY_PRINT);
        file_put_contents('Register.json',$data);
		header("Location: Register_Index.php"); 
    ?>
</html>