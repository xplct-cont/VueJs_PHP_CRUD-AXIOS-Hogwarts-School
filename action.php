
<?php

//action.php

$connect = new PDO("mysql:host=localhost;dbname=vuejs_crud", "root", "");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
if($received_data->action == 'fetchall')
{
 $query = "
 SELECT * FROM tbl_student 
 ORDER BY id DESC
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}
if($received_data->action == 'insert')
{
 $data = array(
  ':first_name' => $received_data->firstName,
  ':last_name' => $received_data->lastName,
  ':email' => $received_data->Email,
  ':contact' => $received_data->Contact
 );

 $query = "
 INSERT INTO tbl_student 
 (first_name, last_name, email, contact) 
 VALUES (:first_name, :last_name, :email, :contact)
 ";

 $statement = $connect->prepare($query);

 $statement->execute($data);

 $output = array(
  'message' => 'Student Added!'
 );

 echo json_encode($output);
}
if($received_data->action == 'fetchSingle')
{
 $query = "
 SELECT * FROM tbl_student 
 WHERE id = '".$received_data->id."'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 foreach($result as $row)
 {
  $data['id'] = $row['id'];
  $data['first_name'] = $row['first_name'];
  $data['last_name'] = $row['last_name'];
  $data['email'] = $row['email'];
  $data['contact'] = $row['contact'];
 }

 echo json_encode($data);
}
if($received_data->action == 'update')
{
 $data = array(
  ':first_name' => $received_data->firstName,
  ':last_name' => $received_data->lastName,
  ':email' => $received_data->Email,
  ':contact' => $received_data->Contact,
  ':id'   => $received_data->hiddenId
 );

 $query = "
 UPDATE tbl_student 
 SET first_name = :first_name, 
 last_name = :last_name,
 email = :email,
 contact = :contact 
 WHERE id = :id
 ";

 $statement = $connect->prepare($query);

 $statement->execute($data);

 $output = array(
  'message' => 'Informations Updated!'
 );

 echo json_encode($output);
}

if($received_data->action == 'delete')
{
 $query = "
 DELETE FROM tbl_student 
 WHERE id = '".$received_data->id."'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $output = array(
  'message' => 'Student Deleted!'
 );

 echo json_encode($output);
}

?>
