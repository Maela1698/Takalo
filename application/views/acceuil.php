<?php
    if($this->session->has_userdata('number')){
        $number = $this->session->userdata('number');
        echo $number;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Login success avec le nombre : 
    
</body>
</html>