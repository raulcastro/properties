<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once ($root . '/Framework/Connection_Data.php');
require_once ($root . '/Framework/Mysqli_Tool.php');

$db = new Mysqli_Tool(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$query = 'SELECT * FROM datayuri';

$datos = $db->getArray($query);

foreach ($datos as $dato)
{
	echo $dato['member_id'].'<br />';
	/*$query = 'INSERT INTO members(member_id, agent, member_name, company_name, company_type, position, brand, address, notes, date) 
		VALUES(
			'.$dato['member_id'].',
			1,
			"'.$dato['contacto'].'",
			"'.$dato['empresa'].'",
			"'.$dato['giro'].'",
			"'.$dato['puesto'].'",
			"'.$dato['1'].'",
			"'.$dato['address'].'",
			"'.$dato['notes'].'",
			CURDATE()
			)';
	$db->run($query);*/
	
	/*if ($dato['phone'])
	{
			$query = 'INSERT INTO member_phones(member_id, phone, type) VALUES('.$dato['member_id'].', "'.$dato['phone'].'", 1)';
			$db->run($query);
	}*/

	/*if ($dato['movil'])
		 {
		 $query = 'INSERT INTO member_phones(member_id, phone, type) VALUES('.$dato['member_id'].', "'.$dato['movil'].'", 2)';
		 $db->run($query);
 	}*/
	
	/*if ($dato['email'])
	 {
	 $query = 'INSERT INTO member_emails(member_id, email) VALUES('.$dato['member_id'].', "'.$dato['email'].'")';
	 $db->run($query);
	 }*/
	
	
}
















