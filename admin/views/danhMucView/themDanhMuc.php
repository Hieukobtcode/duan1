<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/danhMuc.css">
</head>

<body>
    <?php require_once 'views/components/navBar.html' ?>
    <div class="list">
        <div class="title">
            <h3>Thêm danh mục</h3>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <table border="1">
                <thead>
                    <tr>
                        <th>Tên danh mục</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" name="ten_danh_muc">
                        </td>
                        <td>
                            <input type="file" name="img">
                        </td>
                        <td>
                            <input type="text" name="mo_ta">
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn" name="btn_them">Thêm</button>
        </form>
    </div>
</body>

</html>