<!-- @import jquery & sweet alert  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
// $connection = new mysqli('localhost', 'root', '', 'cms_project');
$connection = new mysqli('localhost', 'root', '', 'cms_projecttest');
function get_logo($status)
{
    global $connection;
    $sql = "SELECT `thumbnail` FROM `logo` WHERE `status` = '$status' ORDER BY `id` DESC LIMIT 1";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);

    echo $row['thumbnail'];
}

function get_icon_all($all,$footer)
{
    global $connection;
    $sql = "SELECT `icon`, `label`,`url` FROM `follow_us` WHERE `status` = '$all' OR `status` = '$footer'";
    $rs = $connection->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        echo'
        <li>
            <img src="../admin/assets/image/'.$row['icon'].'" width="40px"> 
            <a href="'.$row['url'].'">'.$row['label'].'</a>
        </li>
        ';
    }
}
function get_icon_footer($all,$footer){
    global $connection;
    $sql = "SELECT `icon`,`url` FROM `follow_us` WHERE `status` = '$all' OR `status` = '$footer'";
    $rs = $connection->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        echo'
        <li>
        <a href="'.$row['url'].'"><img src="../admin/assets/image/'.$row['icon'].'" alt="" width="50px" height="50px" style="object-fit: cover;"></a>
        </li>
        ';
    }
}

function get_description(){
    global $connection;
    $sql = "SELECT * FROM `description` ORDER BY `id` DESC LIMIT 3";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);

    echo $row['description'];
}

function get_trending_title()
{
    global $connection;
    $sql = "SELECT * FROM `news` ORDER BY `id` DESC LIMIT 3";
    $rs = $connection->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        echo '
        <i class="fas fa-angle-double-right"></i>
        <a href="./news-detail.php?id=' . $row['id'] . '">' . $row['title'] . '</a> &ensp;
        ';
    }
}


function get_news_detail($post_id)
{
    global $connection;
    $sql = "SELECT * FROM `news` WHERE `id` =$post_id ORDER BY `id` DESC LIMIT 3";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);
    $date = $row['create_at'];
    $date = date('d/m/y');
    if ($row) {
        print '
        <div class="thumbnail">
            <img src="../admin/assets/image/' . $row['banner'] . '" class="card-img">
        </div>
        <div class="detail">
            <h3 class="title">' . $row['title'] . '</h3>
            <div class="date">' . $date . '</div>
            <div class="description">' . $row['description'] . '</div>
        </div> 
      ';
    }
}

function get_type($id)
{
    global $connection;
    $sql = "SELECT * FROM `news` WHERE `id` =$id";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);

    return $row['type'];
}

function get_news_type($news_id)
{
    global $connection;
    $new_content = get_type($news_id);
    $sql = "SELECT * FROM `news` WHERE `type`='$new_content' AND `id` NOT IN ($news_id) ORDER BY `id` DESC LIMIT 3 ";
    $rs = $connection->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        $date = $row['create_at'];
        $date = date('d/m/y');
        echo '
         <figure>
            <a href="./news-detail.php?id='.$row['id'].'">
                <div class="thumbnail">
                    <img src="../admin/assets/image/' . $row['thumbnail'] . '" 
                    alt="" class="card-img-top">
                </div>
                <div class="detail">
                    <h3 class="title">'.$row['title'].'</h3>
                    <div class="date">'.$date.'</div>
                    <div class="description">'.$row['description'].'</div>
                </div>
            </a>
        </figure> 
        
        ';
    }
}
function get_view($id_view){
    global $connection;
    $sql = "UPDATE `news` SET `view` = view+1 WHERE id='$id_view'";
    $rs  = $connection->query($sql);
}

function get_min_news($type){
    global $connection;
    if ($type == 'Trending') {
        $sql = "SELECT * FROM `news` ORDER BY view DESC LIMIT 1";
        $rs  = $connection->query($sql);
        $row = mysqli_fetch_assoc($rs);
        echo '
            <figure>
                <a href="news-detail.php?id='.$row['id'].'">
                    <div class="thumbnail">
                        <img src="../admin/assets/image/'.$row['banner'].'" alt=""
                            class="card-img-top" height="450px" style="object-fit: cover;">
                        <div class="title">'.$row['title'].'</div>
                    </div>
                </a>
            </figure>
        ';
    }else{
        $sql = "SELECT * FROM `news` WHERE `id` !=(SELECT `id` FROM `news` ORDER BY view DESC LIMIT 1) ORDER BY `id` DESC LIMIT 2";
        $rs  = $connection->query($sql);
        while($row = mysqli_fetch_assoc($rs)){
            echo'
                
                <figure>
                    <a href="./news-detail.php?id='.$row['id'].'">
                        <div class="thumbnail">
                            <img src="../admin/assets/image/'.$row['thumbnail'].'" alt=""
                                class="card-img-top" height="220px" style="object-fit: cover;">
                        <div class="title">'.$row['title'].'</div>
                        </div>
                    </a>
                </figure>
            ';
        }
    }
}

function get_news($type){
    global $connection;
    $sql = "SELECT * FROM `news` WHERE category='$type' ORDER BY id DESC LIMIT 3";
    $rs  = $connection->query($sql);
    while($row = mysqli_fetch_assoc($rs)){
        echo'
                <div class="col-4">
                    <figure>
                        <a href="./news-detail.php?id='.$row['id'].'">
                            <div class="thumbnail">
                                <img src="../admin/assets/image/'.$row['thumbnail'].'" 
                                        alt="" class="card-img-top" height="220px" style="object-fit: cover;">
                                <div class="title">'.$row['title'].'</div>
                            </div>
                        </a>
                    </figure>
                </div>
        ';
    }
}

function list_news_contents($category,$news_type,$page,$limit){
    global $connection;
    $start = ($page-1)*$limit;
    $sql   = "SELECT * FROM  `news` WHERE (`category`='$category' AND `type`='$news_type') ORDER BY id LIMIT $start,$limit";
    $rs    = $connection->query($sql);
    while($row = mysqli_fetch_assoc($rs)){
        $date  = $row['create_at'];
        $date  = date('d/m/y');
        echo '
            <div class="col-4">
                <figure>
                    <a href="./news-detail.php?id='.$row['id'].'">
                        <div class="thumbnail">
                            <img src="../admin/assets/image/'.$row['thumbnail'].'" alt="" class="card-img-top">
                        </div>
                        <div class="detail">
                            <h3 class="title">'.$row['title'].'</h3>
                            <div class="date">'.$date.'</div>
                            <div class="description">'.$row['description'].'</div>
                        </div>
                    </a>
                </figure>
            </div>
        ';
    }
}

function pageination($category,$new_type,$limit){
    global $connection;
    $sql  = "SELECT COUNT(id) as total_post FROM `news` WHERE `category`='$category' AND `type`='$new_type'";
    $rs   = $connection->query($sql);
    $row  = mysqli_fetch_assoc($rs);
    $total_post =$row['total_post'];
    $pageination = ceil($total_post/$limit);
    for($i=1; $i<=$pageination; $i++){
        echo'
            <li>
                <a href="?page='.$i.'">'.$i.'</a>
            </li>
            
        ';
    }
}

function feedback_add(){
    if(isset($_POST['btn_message'])){
        // echo'123';
        global $connection;
        $username = $_POST['username'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $address = $_POST['address'];
        $message = $_POST['message'];

        if(!empty($username)&& !empty($email)&& !empty($telephone)&& !empty($address)&& !empty($message)){
            // echo'hello';
                $sql = "INSERT INTO `feedback`(`username`, `email`, `telephone`, `address`,`message`) VALUES ('$username','$email','$telephone','$address','$message')";
                $rs = $connection->query($sql);
            if($rs){
                echo'
                <script>
                $(document).ready(function(){
                    swal({
                        title: "Success...!",
                        text: "Add News success...!",
                        icon: "success",
                        button: "Ok",
                        });
                    });
                </script>
                ';
            }else{
                echo'
                <script>
                $(document).ready(function(){
                    swal({
                        title: "Error...!",
                        text: "Add News not success...!",
                        icon: "error",
                        button: "Ok",
                        });
                    });
                </script>
                ';
            } 
        }
    }
}
feedback_add();

function search_news($query){
    global $connection;
    $sql = "SELECT * FROM `news` WHERE title LIKE '%$query%'";
    $rs  = $connection->query($sql);

    while($row = mysqli_fetch_assoc($rs)){
        $date  = $row['create_at'];
        $date  = date('d/M/Y');
        echo'
        <div class="col-4">
        <figure>
            <a href="./news-detail.php?id='.$row['id'].'">
                <div class="thumbnail">
                    <img src="../admin/assets/image/'.$row['thumbnail'].'" alt="">
                </div>
                <div class="detail">
                    <h3 class="title">'.$row['title'].'</h3>
                    <div class="date">'.$date.'</div>
                    <div class="description">'.$row['description'].'</div>
                </div>
            </a>
        </figure>
    </div>
        ';
    }
}
?>