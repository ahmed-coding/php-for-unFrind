<?php
include_once 'tempalets/header.php';
include 'database_conn.php';
?>
<h2 class="text-center h1 header">All Item </h2>

<div class="row">
    <?php
    if (!isset($_COOKIE['login'])) {
        header("Location: login.php?login");
    }
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    foreach ($result as $item) {
        echo '<div class="col-6 col-md-3">';
        echo '<div class="img-thumbnail item-box">';
        echo '<span class="price-tag">$' . $item['price'] . '</span>';
        echo "<img src='admin/upload/items/" . $item['Item_Img'] . "' alt=''  class='card-img' height='200px'  />";
        echo '<div class="caption">';
        echo '<h4 class="desc" style="margin:5px"><a class="title" href="items.php?itemid=' . $item['id'] . '">' . $item['name'] . '</a></h4>';
        echo '<p class="desc">' . $item['description'] . '</p>';
        // echo '<p style="color: #636363; margin:5px; text-align:right; font-size:13px; font-weight:bold ">' . $item['Add_Date'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    ?>
</div>

</div>
<?php include('tempalets/footer.php');
?>