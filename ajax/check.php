<?php
$conn = new PDO('mysql:host=localhost;dbname=task', 'root', '');

$stmt = $conn->prepare('SELECT `content` FROM `t_table` WHERE id = '.$_POST['id']);
$stmt->execute();
$content = $stmt->fetchAll(PDO::FETCH_ASSOC);

$words = explode(" ", $content[0]['content']);

$max = count($words);
#print_r($_POST['order']-1);
#print_r($words);
session_start();
if(isset($_SESSION['username'])){
	
    if($words[$_POST['order']-1] == $_POST['answer'])
    {
     
        $sql = "SELECT * FROM s_table WHERE u_id = (SELECT id from u_table 
        WHERE u_name = '".$_SESSION['username']."') AND senid = ".$_POST['id'].";";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($result) == 0){
            $sql = "INSERT INTO `s_table` (`senid`, `u_id`, `correct`, `incorrect`) VALUES 
            ('".$_POST['id']."', (SELECT id from u_table WHERE u_name = '".$_SESSION['username']."'), '1', '0')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $conn->lastInsertId();
            
            if(is_numeric($result)){
                    $sql = "SELECT * FROM `s_table` 
                WHERE  u_id = (SELECT id from u_table WHERE u_name = '".$_SESSION['username']."')";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if(!empty($result))
                    echo json_encode($result);
                else
                    echo 0;
            }
            else{
                    $sql = "SELECT * FROM `s_table` 
                WHERE  u_id = (SELECT id from u_table WHERE u_name = '".$_SESSION['username']."')";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if(!empty($result))
                    echo json_encode($result);
                else
                    echo 0;
                    
            }

        }else{
            
         $sql = "UPDATE `s_table` SET `correct` = `correct`+1 
            WHERE u_id = (SELECT id from u_table WHERE u_name = '".$_SESSION['username']."') AND senid = ".$_POST['id'].";";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $sql = "SELECT * FROM `s_table` 
            WHERE u_id = (SELECT id from u_table WHERE u_name = '".$_SESSION['username']."')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if(!empty($result))
                echo json_encode($result);
            else
                echo 0;
        }
        
        
        
    }else{
        $sql = "UPDATE `s_table` SET `incorrect` = `incorrect`+1 
            WHERE u_id = (SELECT id from u_table WHERE u_name = '".$_SESSION['username']."') AND senid = ".$_POST['id'].";";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $sql = "SELECT * FROM `s_table` 
            WHERE  u_id = (SELECT id from u_table WHERE u_name = '".$_SESSION['username']."')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($result))
                echo json_encode($result);
            else
                echo 0;
    }


}else{
    echo 0;
}
$conn = null;

?>
