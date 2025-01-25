<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="md-sifat">
    <link rel="icon" href="https://md-shefat-masum.github.io/index/images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="https://md-shefat-masum.github.io/index/images/logo.png" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="./backend/assets/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="./backend/assets/icofont.css">
    <link rel="stylesheet" type="text/css" href="./backend/assets/themify.css">
    <link rel="stylesheet" type="text/css" href="./backend/assets/flag-icon.css">
    <link rel="stylesheet" type="text/css" href="./backend/assets/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./backend/assets/style.css">
    <link rel="stylesheet" type="text/css" href="./backend/assets/responsive.css">

    @vite(['resources/js/backend/app.js'])

</head>

<body main-theme-layout="main-theme-layout-4">
    <div id="app">
        <app-component></app-component>
    </div>

    <!-- latest jquery-->
    <script src="./backend/assets/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="./backend/assets/bootstrap.bundle.min.js"></script>
    <!-- Sidebar jquery-->
    <script src="./backend/assets/sidebar-menu.js"></script>
    <!-- Theme js-->
    <script src="./backend/assets/script.js"></script>

</body>

</html>
