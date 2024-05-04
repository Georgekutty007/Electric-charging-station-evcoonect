<!DOCTYPE html>
<html>
<head>
	<title>Add Form Page</title>
</head>
<body>
	<h1>Add Form Page</h1>
	<form>
		<label for="location-name">Location Name:</label>
		<input type="text" id="location-name" name="location-name"><br><br>

		<label for="address">Address:</label>
		<input type="text" id="address" name="address"><br><br>

		<label for="city">City:</label>
		<input type="text" id="city" name="city"><br><br>

		<label for="state">State:</label>
		<input type="text" id="state" name="state"><br><br>

		<label for="zip">Zip Code:</label>
		<input type="text" id="zip" name="zip"><br><br>

		
	</form>

	<script>
		function loadPage(url) {
			// Redirect to the specified URL
			window.location.href = url;
		}
	</script>
</body>
</html>
