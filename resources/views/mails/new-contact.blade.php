<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>Hello Admin! Here is a new contact request!</h1>

  <h3>Name: {{ $lead->name }}</h3>
  <h3>Email: {{ $lead->email }}</h3>
  <p>Message: {{ $lead->message }}</p>
</body>
</html>