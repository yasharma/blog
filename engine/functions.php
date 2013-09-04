<?php //namespace Blog\DB;

$config = array(
		'username' => 'root',
		'password' => 'admin'
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
		$results = $conn->query("SELECT * FROM $tableName ORDER BY id DESC");	

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
echo "	
	<title>Blog | $title</title>
		<meta charset=\"utf-8\"/>
		<link rel=\"stylesheet\" href=\"http://yui.yahooapis.com/pure/0.2.1/pure-min.css\">
		<link rel=\"stylesheet\" href=\"css/custom.css\">
	";	
}
