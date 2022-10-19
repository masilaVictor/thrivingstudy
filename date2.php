<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>JavaScript confirmation box</title>
    <script>
      // The function below will start the confirmation dialog
      function confirmAction() {
        let confirmAction = confirm("Are you sure to execute this action?");
        if (confirmAction) {
          alert("Action successfully executed");
        } else {
          alert("Action canceled");
        }
      }
    </script>
  </head>
  <body>
    <h1>Call the confirmation box</h1>
    <button onclick="confirmAction()">Delete</button>
  </body>
</html>

</body>
</html>