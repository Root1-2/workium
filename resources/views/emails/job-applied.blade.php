<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Workium Job Applicatiopn</title>
</head>

<body>
    <p>There has been a new Job Application to your Workium Listing.</p>

    <p><strong>Jop Title: </strong>{{ $job->title }}</p>

    <p><strong>Application Details: </strong>{{ $job->title }}</p>

    <p><strong>Full Name: </strong> {{ $application->full_name }}</p>
    <p><strong>Contact Phone: </strong> {{ $application->contact_phone }}</p>
    <p><strong>Contact Email: </strong> {{ $application->contact_email }}</p>
    <p><strong>Message: </strong> {{ $application->message }}</p>
    <p><strong>Location: </strong> {{ $application->location }}</p>

    <p>Login to your Workium Account to view the application.</p>
</body>

</html>
