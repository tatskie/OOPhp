<?php
require 'Database.php';

$database = new Database;

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if (isset($post['delete'])) {
	$id = $post['post_id'];

	$database->query('DELETE FROM posts WHERE id =:id');
	$database->bind(':id', $id);
	$database->execute();
}

if (isset($post['submit'])) {
	$title = $post['title'];
	$body = $post['body'];

	$database->query('INSERT INTO posts (title, body) VALUES(:title, :body)');
	$database->bind(':title', $title);
	$database->bind(':body', $body);
	$database->execute();
}

$database->query('SELECT * FROM posts');
// $database->bind(':id', 2);
$rows = $database->resultSet();
?>
<!DOCTYPE html>
<html>
<head>
	<title>OOP</title>
</head>
<body>
	<div style="text-align: center;">
		<h1>Add Post</h1>	
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<label>Post Title</label>
			<br>
			<input type="text" name="title" placeholder="Please enter Title..."> 
			<br>
			<br>
			<label>Post Body</label>
			<br>
			<textarea name="body"  placeholder="Please enter Body..."></textarea>
			<br>
			<input type="submit" name="submit" value="Submit" >
		</form>
	</div>
	<hr>
	<div style="text-align: center;">
		<h1>Posts</h1>
		<?php foreach ($rows as $row): ?>
			<div>
				<h4><?php echo $row['title']; ?></h4>
			</div>	
			<div>
				<p><?php echo $row['body']; ?></p>
			</div>
			<div>
				<form method="post" accept="<?php $_SERVER['PHP_SELF']; ?>">
					<input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
					<input type="submit" name="delete" value="DELETE">
				</form>
			</div>
		<?php endforeach;?>
	</div>
</body>
</html>
