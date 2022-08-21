<html>
    <head>
        <link rel="icon" type="image/x-icon" href="Mini_project/icon.png" />
	</head>

    <?php
        $id = $_GET['id'];
        $data = file_get_contents('Order.json');
        $data = json_decode($data,true);
        unset($data[$id]);

        $index = 0;
		foreach ($data as $row) 
		{
			$row = (++$index);
		}
		
		$data = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents('Order.json', $data);

        header('location: Order_Index.php');
    ?> 
</html>