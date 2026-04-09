<?php require_once '../template/header.php'; ?>
<title>Public About Page</title>
</head>
<body>
<div class="container">
    <div class="header clearfix">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">Members About</a></li>
                <li><a href="about_public.php">Public About</a></li>
                <li><a href="contacts.php">Contact</a></li>
            </ul>
        </nav>
        <h3 class="text-muted">Public Information</h3>
    </div>

    <div class="mainarea">
        <h1>Welcome, Guest!</h1>
        <p class="lead">This page is visible to everyone, even without logging in.</p>
        <p><a href="login.php">Login here</a> to access member-only pages.</p>
    </div>

    <div class="row marketing">
        <div>
            <h4>About Our Company (Public)</h4>
            <p>This information is available to all visitors. You don't need an account to read this.</p>
        </div>
    </div>
</div>
<?php require_once '../template/footer.php'; ?>