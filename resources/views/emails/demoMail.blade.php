@extends('layout')
<!DOCTYPE html>
<html>
<head>
    <title>Hello</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>
    <a href={{$mailData['url']}}><button type="submit" class="btn btn-primary">Click here to get token</button></a>
    <p>Thank you</p>
</body>
</html>
