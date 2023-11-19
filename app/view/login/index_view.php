
<?php if(!defined("APP_PATH")){ exit("Can not access"); } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men Shop - <?= $title ?? null ?></title>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= APP_PATH_PUBLIC . "css/styles.css" ?>" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 offset-md-3">
                <h5 class="text-center my-3">Login</h5>
                <form class="p-3 border" action="?c=login&m=handle" method="post">
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" />
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm"> submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>