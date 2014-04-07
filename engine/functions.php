<?php //namespace Blog\DB;

require 'config.php';

// This function will connect to database
function connect($config) {

	try{
		$conn = new PDO('mysql:host=blogpost.mysql.eu1.frbit.com;dbname=blogpost',
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

// This function query the database for inserting rows
function query($query, $bindings, $conn) {
	
	$stmt = $conn->prepare($query);
	$stmt->execute($bindings);
	return ($stmt->rowCount() > 0) ? $stmt : false;	
}

// Fetch spcefic row or for single link
function get_by_id($id, $conn) {

	$query = query('SELECT * FROM posts WHERE id = :id LIMIT 1',
				array('id' => $id),
				$conn);

	if( $query ) return $query->fetchAll();
}


// resusable function for header
function head($title) {
	return "
			<title>Blog | $title</title>
			<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.4.2/pure-min.css'>
			<link rel='stylesheet' href='css/main-grid.css'>
			<link rel='stylesheet' href='css/custom.css'>
			";	
}
 // Checks weather user is login or not.
function is_logged_in() {
	return isset($_SESSION['username']);
}
