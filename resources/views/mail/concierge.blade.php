<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
</head>
<body>
    <div>
	  <h1>Thanks for your Contact Us</h1>
      <p>Issue Type: {{ $data['issue_type'] }}</p>
      <p>User Email: {{ $data['email'] }}</p>
      <p>Message: {{ $data['message'] }}</p>
    </div>
</body>
</html>