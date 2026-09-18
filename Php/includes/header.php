<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'My Website') ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <nav class="navbar">
        <a href="/" class="logo">My Website</a>

        <div class="nav-links">
            <a href="/" data-page="home">Home</a>
            <a href="/about" data-page="about">About</a>
            <a href="/contact" data-page="contact">Contact</a>
        </div>
    </nav>
</header>

<main class="container">
    <div class="layout">
        <section class="content">
