<!--
This is the basic HTML skeleton in which the whole application will be wrapped
There is only two dynamic variables : $pageTitle and $contentTemplate
$pageTitle - is coming from src/public/configurations/config.php and it's defined based on the URL parameter pageTitle
            (see the links inside <nav> in this file)

$contentTemplate - it's also coming from src/public/configurations/config.php and it's defined based on the URL parameter section
            (see the links inside <nav> in this file)
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Skills Test</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <!-- Inside your navigation links -->
            <a class="nav-link" href="index.php?section=list&pageTitle=Product List">Product List</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?section=create&pageTitle=Create Product">Create Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?section=task2&pageTitle=Task 2">Task 2</a>
        </li>
    </ul>
</nav>
<div>
    <?php echo $contentTemplate; ?>
</div>
</body>
</html>
