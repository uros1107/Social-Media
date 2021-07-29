<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
</head>
<body>
    <div>
	  <h1>Thanks for your Contact Us</h1>
      @php
            $issue_type = '';
            switch ($data['issue_type']) {
            case 1:
                $issue_type = 'Billing Issues';
                break;
            case 2:
                $issue_type = 'Payment Method';
                break;
            case 3:
                $issue_type = 'Profile Setup';
                break;
            case 4:
                $issue_type = 'Requests';
                break;
            case 5:
                $issue_type = 'Change Email';
                break;
            case 5:
                $issue_type = 'Others';
                break;
            default:
                break;
            }
      @endphp
      <p>Issue Type: {{ $issue_type }}</p>
      <p>User Email: {{ $data['email'] }}</p>
      <p>Message: {{ $data['message'] }}</p>
    </div>
</body>
</html>