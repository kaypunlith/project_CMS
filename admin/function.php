<!-- Sweet Alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
$connection = new mysqli('localhost', 'root', '', 'cms_projecttest');

function moveImage($thumbnail){
    $profile = date('dmyhis').'-'.$_FILES[$thumbnail]['name'];
    $path = './assets/image/'.$profile;
    move_uploaded_file($_FILES[$thumbnail]['tmp_name'],$path);
    return $profile;
}

function register_acc(){
    if(isset($_POST['btn_register'])){
        global $connection;
       $username = $_POST['username'];
       $email = $_POST['email'];
       $password = $_POST['password'];
       $password = md5($password);
       $profile = moveImage('profile');

    //    check username
    $sql_uname = "SELECT `name` FROM `user`";
    $rs_uname = $connection->query($sql_uname);
    while($row = mysqli_fetch_assoc($rs_uname)){
        if($username == $row['name']){
            $username = null;
        }else{
            $username;
        }
    }
    
       if(!empty($username)&& !empty($password)&& !empty($email)&& !empty($profile)){
        // echo'hello';
            $sql = "INSERT INTO `user`(`name`, `email`, `password`, `profile`) 
                    VALUES ('$username','$email','$password','$profile')";
            $rs = $connection->query($sql);
        
        if($rs){
            echo'
            <script>
            $(document).ready(function(){
                swal({
                    title: "Success...!",
                    text: "Register account success...!",
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
                    text: "Register account not success...!",
                    icon: "error",
                    button: "Ok",
                    });
                });
            </script>
            ';
        } 
       }
       else{
        echo'
        <script>
        $(document).ready(function(){
            swal({
                title: "Error...!",
                text: "Register account already Exist...!",
                icon: "error",
                button: "Ok",
                });
            });
        </script>
        ';
    }
    }
}
register_acc();

//Login
session_start();
function login_acc(){
    if(isset($_POST['btn_login'])){
        global $connection;
        $name_email = $_POST['name_email'];
        $password = $_POST['password'];
        $password = md5 ($password);

        if(!empty($name_email) && !empty($password)){
            $sql = "SELECT * FROM `user` WHERE `name`='$name_email' OR `email`='$name_email' AND `password`='$password'";
            $rs = $connection->query($sql);
            $row = mysqli_fetch_assoc($rs);
        if($row && $row['password'] === $password){
            // echo'success';
            // header('location: index.php');
            $_SESSION['user'] = $row['id'];
            echo'
            <script>
            $(document).ready(function(){
                swal({
                    title: "Success...!",
                    text: "Login account success...!",
                    icon: "success",
                    button: "Ok",
                    }).then(()=>{
                        window.location.href = "index.php";
                    })    
                })
            </script>
            ';
        }
        else{
            echo'
            <script>
            $(document).ready(function(){
                swal({
                    title: "Error...!",
                    text: "Login account Not Success...!",
                    icon: "error",
                    button: "Ok",   
                })
            </script>
            ';
        }
        }
    }
}
login_acc();

function logout(){
    if(isset($_POST['btn-logout'])){
        // echo'123';
        unset($_SESSION['user']);
        header('location: login.php');
    }
}
logout();


function logo_add_post(){
    if(isset($_POST['btn-save'])){
        // echo'123';
        global $connection;
        $logo_thumbnail = moveImage('thumbnail');
        $status = $_POST['status'];
        if(!empty($logo_thumbnail)&& !empty($status)){
            // echo'hello';
                $sql = "INSERT INTO `logo`(`thumbnail`,`status`) VALUES ('$logo_thumbnail','$status')";
                $rs = $connection->query($sql);
            if($rs){
                echo'
                <script>
                $(document).ready(function(){
                    swal({
                        title: "Success...!",
                        text: "Add Logo success...!",
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
                        text: "Add Logo not success...!",
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
logo_add_post();

//View_logopost
function view_logopost(){
    global $connection;
    $sql = "SELECT * FROM `logo` ORDER BY `id` DESC LIMIT 4";
    $rs = $connection->query($sql);
    while($row = mysqli_fetch_assoc($rs)){
        echo'
        <tr class="align middle">
        <td>'.$row['id'].'</td>
        <td>'.$row['status'].'</td>
        <td><img src="./assets/image/'.$row['thumbnail'].'"width="100px" height="100px" style="object-fit-cover"/></td>
        <td width="150px">
            <a href="./logo_updatepost.php?id='.$row['id'].'" class="btn btn-primary">Update</a>
            <button type="button" remove-id="'.$row['id'].'" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Remove
            </button>
        </td>
    </tr>
        ';
    }
}

//Remove
function deletelogo(){
    global $connection;
    if(isset($_POST['btn-delete-logo'])){
        // echo 123;
        $id = $_POST['remove_id'];
        $sql = "DELETE FROM `logo` WHERE id='$id'";
        $rs = $connection->query($sql);
        if($rs){
            echo'
            <script>
                $(document).ready(function(){
                    swal({
                        title: "Delete Data Success...!",
                        text: "You clicked the button!",
                        icon: "success",
                        button: "Okay Lesgo!",
                    });
                })
            </script>
            ';
        }
        else{
            echo'
            <script>
            $(document).ready(function(){
                swal({
                    title: "Delete Data Not Success...!",
                    text: "You clicked the button!",
                    icon: "success",
                    button: "Okay Lesgo!",
                });
            })
            </script>
            ';
        }
    }
}
deletelogo();

function logo_updatepost(){
    global $connection;
    if(isset($_POST['btn_updatelogo'])){
        // echo 123;
        $status = $_POST['status'];
        $thumbnail = $_FILES['thumbnail']['name'];
        $id = $_GET['id'];
        if(empty($thumbnail)){
            $thumbnail = $_POST['old-logo'];
        }
        else{
            $thumbnail = moveImage('thumbnail'); 
        }
        if(!empty($status)&& !empty($thumbnail)){
            $sql = "UPDATE `logo` SET `thumbnail` = '$thumbnail',`status`='$status' WHERE id='$id'";
            $rs = $connection->query($sql);
            if($rs){
                echo'
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "Update Data Success...!",
                            text: "Update Success",
                            icon: "success",
                            button: "Okay Lesgo!",
                        });
                    })
                </script>
                ';
            }
            else{
                echo'
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "Update Data Not Success...!",
                            text: "Update Failed",
                            icon: "success",
                            button: "Okay Lesgo!",
                        });
                    })
                </script>
                ';
            }
        }
    }
}
logo_updatepost();


function addnews(){
    if(isset($_POST['btn-save-new'])){
        // echo'123';
        global $connection;
        $author_id = $_SESSION['user'];
        $news_title = $_POST['title'];
        $news_type = $_POST['type'];
        $news_category = $_POST['category'];
        $news_thumbnail = moveImage('thumbnail');
        $news_banner = moveImage('banner');
        $news_description = $_POST['description'];

        if(!empty($author_id)&& !empty($news_title)&& !empty($news_type)&& !empty($news_category)&& !empty($news_thumbnail)&& !empty($news_banner)&& !empty($news_description)){
            // echo'hello';
                $sql = "INSERT INTO `news`(`banner`, `thumbnail`, `title`, `description`,`category`, `type`, `author_id`) VALUES ('$news_banner','$news_thumbnail','$news_title','$news_description','$news_category','$news_type','$author_id')";
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
addnews();

function view_newspost(){
    global $connection;
    $sql = "SELECT `name`,t_news. * FROM `news` as t_news INNER JOIN `user` as t_user ON t_news.author_id = t_user.id ORDER BY `id` DESC";
    $rs = $connection->query($sql);
    while($row = mysqli_fetch_assoc($rs)){
        echo'
        <tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['title'].'</td>
            <td>'.$row['type'].'</td>
            <td>'.$row['category'].'</td>
            <td><img src="./assets/image/'.$row['thumbnail'].'"width="100px" height="100px" style="object-fit-cover"/></td>
            <td><img src="./assets/image/'.$row['banner'].'"width="100px" height="100px" style="object-fit-cover"/></td>
            <td>'.$row['view'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['description'].'</td>
            <td>'.$row['create_at'].'</td>
            <td width="150px">
                <a href="./news_update.php?id='.$row['id'].'"class="btn btn-primary"> Update</a>
                <button type="button" remove-id="'.$row['id'].'" class="btn btn-danger btn-remove pe-2" data-bs-toggle="modal" data-bs-target="#exampleModal"> Delete
                </button>
            </td>
        </tr>
        ';
    }
}

function news_delete(){
    global $connection;
    if(isset($_POST['btn-delete-news'])){
        // echo 123;
        $id = $_POST['news_remove'];
        $sql = "DELETE FROM `news` WHERE id='$id'";
        $rs = $connection->query($sql);
        if($rs){
            echo'
            <script>
                $(document).ready(function(){
                    swal({
                        title: "Delete Data Success...!",
                        text: "You clicked the button!",
                        icon: "success",
                        button: "Okay Lesgo!",
                    });
                })
            </script>
            ';
        }
        else{
            echo'
            <script>
            $(document).ready(function(){
                swal({
                    title: "Delete Data Not Success...!",
                    text: "You clicked the button!",
                    icon: "success",
                    button: "Okay Lesgo!",
                });
            })
            </script>
            ';
        }
    }
}
news_delete();

function news_update(){
    global $connection;
    if(isset($_POST['btn-news'])){
        // print 123;

        $news_title = $_POST['title'];
        $news_description = $_POST['description'];
        $news_type = $_POST['type']; 
        $news_category = $_POST['category'];
        $thumbnail = $_FILES['thumbnail']['name'];
        $banner = $_FILES['banner']['name']; 
        
        $id = $_GET['id'];
        if(empty($thumbnail)&& empty($banner)){
            $thumbnail = $_POST['old-thumbnail'];
            $banner = $_POST['old-banner'];
        }
        else{
            $thumbnail = moveImage('thumbnail');
            $banner = moveImage('banner');
        }
        if(!empty($banner)&& !empty($thumbnail)&& !empty($news_title)&& !empty($news_description)&& !empty($news_category)&& !empty($news_type)){
            $sql = "UPDATE `news` SET `banner`='$banner',`thumbnail`='$thumbnail',`title`='$news_title',`description`='$news_description',`category`='$news_category',`type`='$news_type' WHERE id='$id'";
            $rs = $connection->query($sql);
            if ($rs) {
                print '
                <script>
                    $(document).ready(function () {
                        swal({
                            title: "Update News Success...!",
                            text: "success...!",
                            icon: "success",
                            button: "OK",
                        })
                    })
              </script>
              '; 
            }
            else{
                print '
                <script>
                    $(document).ready(function () {
                        swal({
                            title: "Update News Unsuccess...!",
                            text: "Unsuccess...!",
                            icon: "error",
                            button: "OK",
                        })
                    })
              </script>
              '; 
            }
        }
        
        
    }
}
news_update();

function add_description(){
    if(isset($_POST['btn-save-description'])){
        // echo'123';
        global $connection;
        $news_description = $_POST['description'];

        if(!empty($news_description)){
            // echo'hello';
                $sql = "INSERT INTO `description`(`description`) VALUES ('$news_description')";
                $rs = $connection->query($sql);
            if($rs){
                echo'
                <script>
                $(document).ready(function(){
                    swal({
                        title: "Success...!",
                        text: "Add Description success...!",
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
                        text: "Add Description not success...!",
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
add_description();

function view_description(){
    global $connection;
    $sql = "SELECT * FROM `description` ORDER BY `id` DESC LIMIT 4";
    $rs = $connection->query($sql);
    while($row = mysqli_fetch_assoc($rs)){
        echo'
        <tr class="align middle">
        <td>'.$row['id'].'</td>
        <td>'.$row['description'].'</td>
        <td width="150px">
            <a href="./description_update.php?id='.$row['id'].'" class="btn btn-primary">Update</a>
            <button type="button" remove-id="'.$row['id'].'" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Remove
            </button>
        </td>
    </tr>
        ';
    }
}
function description_update(){
    global $connection;
    if(isset($_POST['btn-update-description'])){
        // echo 123;
        $new_description = $_POST['description'];    
        $id = $_GET['id'];
        if(!empty($new_description)){
            $sql = "UPDATE `description` SET `description`='$new_description' WHERE id='$id'";
            $rs = $connection->query($sql);
            if ($rs) {
                echo '
                <script>
                    $(document).ready(function () {
                        swal({
                            title: "Update Description Success...!",
                            text: "success...!",
                            icon: "success",
                            button: "OK",
                        })
                    })
              </script>
              '; 
            }
            else{
                echo '
                <script>
                    $(document).ready(function () {
                        swal({
                            title: "Update News Unsuccess...!",
                            text: "Unsuccess...!",
                            icon: "error",
                            button: "OK",
                        })
                    })
              </script>
              '; 
            }
        }  
    }
    }
description_update();

function description_delete(){
    global $connection;
    if(isset($_POST['btn-delete-description'])){
        // echo 123;
        $id = $_POST['des_remove'];
        $sql = "DELETE FROM `description` WHERE id='$id'";
        $rs = $connection->query($sql);
        if($rs){
            echo'
            <script>
                $(document).ready(function(){
                    swal({
                        title: "Delete Data Success...!",
                        text: "You clicked the button!",
                        icon: "success",
                        button: "Okay Lesgo!",
                    });
                })
            </script>
            ';
        }
        else{
            echo'
            <script>
            $(document).ready(function(){
                swal({
                    title: "Delete Data Not Success...!",
                    text: "You clicked the button!",
                    icon: "success",
                    button: "Okay Lesgo!",
                });
            })
            </script>
            ';
        }
    }
}
description_delete();

function follow_add(){
    if(isset($_POST['btn-save-follow'])){
        // echo'123';
        global $connection; 
        $icon = moveImage('icon');
        $label = $_POST['label'];
        $status = $_POST['status'];
        $url = $_POST['url'];
        if(!empty($icon)&& !empty($label)&& !empty($status)&& !empty($url)){
            // echo'hello';
                $sql = "INSERT INTO `follow_us`(`icon`, `label`, `status`, `url`) VALUES ('$icon','$label','$status','$url')";
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
follow_add();

function follow_view(){
    global $connection;
    $sql = "SELECT * FROM `follow_us` ORDER BY `id`";
    $rs = $connection->query($sql);
    while($row = mysqli_fetch_assoc($rs)){
        echo'
        <tr class="align middle">
            <td class="p-4">'.$row['id'].'</td>
            <td><img src="./assets/image/'.$row['icon'].'"width="60px" height="60px" style="object-fit-cover"/></td>
            <td class="p-4">'.$row['label'].'</td>
            <td class="p-4">'.$row['status'].'</td>
            <td class="p-4">'.$row['url'].'</td>
            <td width="150px" class="p-2">
                <a href="./follow-update.php?id='.$row['id'].'" class="btn btn-primary">Update</a>
                <button type="button" remove-id="'.$row['id'].'" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Remove
                </button>
            </td>
        </tr>
            ';
    }
}

function follow_update(){
    global $connection;
    if(isset($_POST['btn-follow-update'])){
        // echo 123;
        $new_icon = $_FILES['icon']['name'];
        $new_label = $_POST['label'];
        $new_status = $_POST['status'];
        $new_url = $_POST['url'];
 
        $id = $_GET['id'];
        if(empty($new_icon)){
            $new_icon = $_POST['old-icon'];
        }
        else{
            $new_icon = moveImage('icon');
        }
        if(!empty($new_icon)&& !empty($new_label)&& !empty($new_status)&& !empty($new_url)){
            $sql = "UPDATE `follow_us` SET `icon`='$new_icon',`label`='$new_label',`status`='$new_status',`url`='$new_url' WHERE id='$id'";
            $rs = $connection->query($sql);
            if ($rs) {
                echo '
                <script>
                    $(document).ready(function () {
                        swal({
                            title: "Update News Success...!",
                            text: "success...!",
                            icon: "success",
                            button: "OK",
                        })
                    })
              </script>
              '; 
            }
            else{
                echo '
                <script>
                    $(document).ready(function () {
                        swal({
                            title: "Update News Unsuccess...!",
                            text: "Unsuccess...!",
                            icon: "error",
                            button: "OK",
                        })
                    })
              </script>
              '; 
            }
        }
        
        
    }
}
follow_update();

function follow_delete(){
    global $connection;
    if(isset($_POST['btn-delete-follow'])){
        // echo 123;
        $id = $_POST['remove_follow_id'];
        $sql = "DELETE FROM `follow_us` WHERE id='$id'";
        $rs = $connection->query($sql);
        if($rs){
            echo'
            <script>
                $(document).ready(function(){
                    swal({
                        title: "Delete Data Success...!",
                        text: "You clicked the button!",
                        icon: "success",
                        button: "Okay Lesgo!",
                    });
                })
            </script>
            ';
        }
        else{
            echo'
            <script>
            $(document).ready(function(){
                swal({
                    title: "Delete Data Not Success...!",
                    text: "You clicked the button!",
                    icon: "success",
                    button: "Okay Lesgo!",
                });
            })
            </script>
            ';
        }
    }
}
follow_delete();

function feedback_view(){
    global $connection;
    $sql = "SELECT * FROM `feedback` ORDER BY `id`";
    $rs = $connection->query($sql);
    while($row = mysqli_fetch_assoc($rs)){
        echo'
        <tr class="align middle">
        <td>'.$row['id'].'</td>
        <td>'.$row['username'].'</td>
        <td>'.$row['email'].'</td>
        <td>'.$row['telephone'].'</td>
        <td>'.$row['address'].'</td>
        <td>'.$row['message'].'</td>
        <td>'.$row['create_at'].'</td>
        <td width="150px">
            <a href="./feedback-update.php?id='.$row['id'].'" class="btn btn-primary">Update</a>
            <button type="button" remove-id="'.$row['id'].'" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Remove
            </button>
        </td>
    </tr>
        ';
    }
}

function feedback_update(){
    global $connection;
    if(isset($_POST['btn-feedback-update'])){
        // echo 123;
        $new_username = $_POST['username'];
        $new_email = $_POST['email'];
        $new_telephone = $_POST['telephone'];
        $new_address = $_POST['address'];
 
        $id = $_GET['id'];

        if(!empty($new_username)&& !empty($new_email)&& !empty($new_telephone)&& !empty($new_address)){
            $sql = "UPDATE `feedback` SET `username`='$new_username',`email`='$new_email',`telephone`='$new_telephone',`address`='$new_address' WHERE id='$id'";
            $rs = $connection->query($sql);
            if ($rs) {
                echo '
                <script>
                    $(document).ready(function () {
                        swal({
                            title: "Update News Success...!",
                            text: "success...!",
                            icon: "success",
                            button: "OK",
                        })
                    })
              </script>
              '; 
            }
            else{
                echo '
                <script>
                    $(document).ready(function () {
                        swal({
                            title: "Update News Unsuccess...!",
                            text: "Unsuccess...!",
                            icon: "error",
                            button: "OK",
                        })
                    })
              </script>
              '; 
            }
        }
        
        
    }
}
feedback_update();
?>