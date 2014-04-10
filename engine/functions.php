<?php //namespace Blog\DB;

$config = array(
		'username' => 'database username',
		'password' => 'database password'
	);

// This function will connect to database
function connect($config) {

	try{
		$conn = new PDO('mysql:host=localhost;dbname=blog',
						$config['username'],
						$config['password']);

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $conn;
	} catch(Exception $e) {
		return false;
	}
}

// This function query the database and fetch all the rows
/*
	if your table has more than 1000 rows,
	then this function will reflect all of these.
	so if you want to show some of the rows just set the limit = 10 or 20.
	Otherwise remove limit to show all posts.
*/
function get($tableName, $conn) {
	try{
		$results = $conn->query("SELECT id, title, name, email, category,created_at, LEFT(body, 330) as body FROM $tableName ORDER BY id DESC");	

		return ( $results->rowCount() > 0 )
			? $results
			: false;
	}
	catch (Exception $e) {
		return false;
	}
}
function get_users($tableName, $conn)
{	
	try{
		$results = $conn->query("SELECT * FROM $tableName");
		return ( $results->rowCount() > 0 )
			? $results
			: false;
	}
	catch (Exception $e) {
		return false;
	}
	
}
// This function query the database for inserting rows
function query($query, $bindings, $conn) {
	
	$stmt = $conn->prepare($query);
	$stmt->execute($bindings);
	return ($stmt->rowCount() > 0) ? $stmt : false;	
}

// Fetch spcefic row or for single link
function get_by_id($id, $tableName,$conn) {

	$query = query("SELECT * FROM $tableName WHERE id = :id LIMIT 1",
				array('id' => $id),
				$conn);

	if( $query ) return $query->fetchAll();
}

function update($id, $title, $body, $tableName, $conn){
	$results = query("UPDATE $tableName SET title = :title, body = :body WHERE id = :id",
				array('title' => $title,
					  'body'  => $body,
					   'id'   => $id),
				$conn);
	return ( $results->rowCount() > 0 )
			? $results
			: false;	
}

function delete($id, $tableName, $conn){
	$results = query("DELETE FROM $tableName WHERE id = :id",
				array('id' => $id),
				$conn);
	return ( $results->rowCount() > 0 )
			? $results
			: false;	
}
// resusable function for header
function head($title) {
	return "
		<title>Blog | $title</title>
		<link rel='stylesheet' href='css/pure.css'>
		<link rel='stylesheet' href='css/main-grid.css'>
		<link rel='stylesheet' href='css/custom.css'>
	";	
}
 // Checks weather user is login or not.
function is_logged_in() {
	return isset($_SESSION['username']);
}
