<?php if(!defined("APP_PATH")){ exit("Can not access"); } ?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h3> Cart !</h3>
                <form method="post" action="?c=cart&m=remove">
                    <button type="submit" name="btnRemoveAllCart" class="btn btn-danger my-2"> Remove all</button>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>QTY</th>
                            <th>Price</th>
                            <th>Money</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($carts != null): ?>
                            <?php foreach($carts as $item): ?>
                                <tr>
                                    <td><?= $item['id']; ?></td>
                                    <td><?= $item['name']; ?></td>
                                    <td>
                                        <img class="img-fluid" src="<?= $item['image']; ?>" />
                                    </td>
                                    <td>
                                        <form method="POST" action="?c=cart&m=update&id=<?= $item['id'];?>">
                                            <input name="qty" class="form-control" type="number" value="<?= $item['qty'] ?>" min="1" max="10" />
                                            <button type="submit" class="btn btn-info btn-sm mt-2">Update</button>
                                        </form>
                                    </td>
                                    <td>
                                        <?= number_format($item['price']); ?>
                                    </td>
                                    <td>
                                        <?= number_format($item['qty'] * $item['price']); ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" href="?c=cart&m=delete&id=<?= $item['id']; ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>