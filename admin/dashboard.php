
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/dist/style.css">
</head>

<body>
    <?php include "../layout/superheader.php" ?>

    <div class="container">
        <div class="dashboard-header">
            <h1>Welcome, <?php //echo $_SESSION['username']; ?>!</h1>
        </div>
        <div class="dashboard-content">
            <h2>Dashboard</h2>
            <p>This is a simple admin dashboard. You can customize it according to your needs.</p>
        </div>
    </div>
</body>

</html>