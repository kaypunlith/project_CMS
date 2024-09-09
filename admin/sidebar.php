<!DOCTYPE html>
<html lang="en">
<?php 
    include('function.php');
    $author_id = $_SESSION['user'];
    global $connection;
    // echo $author_id;
    $sql = "SELECT * FROM `user` WHERE id='$author_id'";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);
    
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- @theme style -->
    <link rel="stylesheet" href="assets/style/theme.css">

    <!-- @Bootstrap -->
    <link rel="stylesheet" href="assets/style/bootstrap.css">

    <!-- @script -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.js"></script>

    <!-- @tinyACE -->
    <script src="https://cdn.tiny.cloud/1/5gqcgv8u6c8ejg1eg27ziagpv8d8uricc4gc9rhkbasi2nc4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

</head>
<body>
    <main class="admin">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2">
                    <div class="content-left">
                        <div class="wrap-top">
                            <img src="assets/icon/270524013740-logo4.jpg" alt="" width="70px">
                            <h5>My News</h5>
                        </div>
                        <div class="wrap-center">
                            <img src="./assets/image/<?php echo $row['profile']?>" alt="" width="50px" height="50px">
                            <h6>Welcome Admin <?php echo $row['name']?></h6>
                        </div>
                        <div class="wrap-bottom">
                            <ul>
                                <li class="parent">
                                    <a class="parent" href="javascript:void(0)">
                                        <span>MAIN MENU</span>
                                        <!-- <img src="assets/icon/arrow.png" alt=""> -->
                                    </a>
                                    <!-- <ul class="child">
                                        <li>
                                            <a href="view-post.php">View Post</a>
                                            <a href="add-post.php">Add New</a>
                                        </li>
                                    </ul> -->
                                </li>
                                <li class="parent">
                                    <a class="parent" href="javascript:void(0)">
                                        <span>Logo</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="./logo_viewpost.php">View Logo</a>
                                            <a href="./logo_addnew.php">Add Logo</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent">
                                    <a class="parent" href="javascript:void(0)">
                                        <span>New Contents</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="./news_viewpost.php">View Post</a>
                                            <a href="./news_addpost.php">Add New</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent">
                                    <a class="parent" href="javascript:void(0)">
                                        <span>About Us</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="./view-description.php">View Description</a>
                                            <a href="./add-description.php">Add Description</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent">
                                    <a class="parent" href="javascript:void(0)">
                                        <span>Follow Us</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="./follow-view.php">View Post</a>
                                            <a href="./follow-add.php">Add New</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent">
                                    <a class="parent" href="javascript:void(0)">
                                        <span>Feedback</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="./feedback-view.php">View Feedback</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent">
                                    <a class="parent" href="./logout.php">
                                        <span>Log Out</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>