<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Lead</title>
</head>

<body>
    <h1>Hello Admin</h1>
    <p>You receveid a new message from your website</p>
    <p>
        Name: {{$lead->name}} <br>
        Email: {{$lead->email}} <br>
        Message: <br>
        {{$lead->message}}
    </p>
</body>

</html>