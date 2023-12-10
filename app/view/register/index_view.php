
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
                <h5 class="text-center my-3">Account register</h5>
                <p class="text-danger">(*) is required</p>

                <?php if(!empty($_SESSION['err_register'])): ?>
                    <div class="alert alert-danger my-2">
                        <ul>
                            <?php foreach($_SESSION['err_register'] as $err): ?>
                                <li class="text-danger"><?= $err; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form class="p-3 border mb-5" action="?c=register&m=handle" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>First name(*)</label>
                        <input type="text" class="form-control" name="first_name" />
                    </div>
                    <div class="mb-3">
                        <label>Last name(*)</label>
                        <input type="text" class="form-control" name="last_name" />
                    </div>
                    <div class="mb-3">
                        <label>Username(*)</label>
                        <input type="text" class="form-control" name="username" />
                    </div>
                    <div class="mb-3">
                        <label>Password(*)</label>
                        <input type="password" class="form-control" name="password" />
                    </div>
                    <div class="mb-3">
                        <label>Email(*)</label>
                        <input type="email" class="form-control" name="email" />
                    </div>
                    <div class="mb-3">
                        <label>Phone(*)</label>
                        <input type="text" class="form-control" name="phone" />
                    </div>
                    <div class="mb-3">
                        <label>Gender(*)</label>
                        <select class="form-control" name="gender">
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" />
                    </div>
                    <div class="mb-3">
                        <label>Birthday</label>
                        <input type="date" class="form-control" name="birthday" />
                    </div>
                    <div class="mb-3">
                        <label>Avatar</label>
                        <input type="file" class="form-control" name="avatar" />
                    </div>
                    
                    <button name="btnRegister" type="submit" class="btn btn-primary"> Save</button>
                    <a href="?c=login" class="ms-3">Login</a>
                    <a href="?c=home" class="ms-3"> Home </a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>