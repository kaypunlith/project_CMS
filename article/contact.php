<?php include('header.php');
global $connection;
$sql = "SELECT * FROM `follow_us` WHERE `status` = 'All' ORDER BY `id` DESC LIMIT 6";
$rs = $connection->query($sql);
$all_icons = array(); 
while ($row = mysqli_fetch_assoc($rs)) {
    $all_icons[] = $row;
}
?>
    <div class="content contact">
        <section class="trending">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="content-trending">
                            <div class="content-left">
                                CONTACT US
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <div class="wrap-follow">
                            <h4 class="title">FOLLOW US</h4>
                            <ul>
                            <?php get_icon_all('All','Footer')?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="wrap-contact">
                            <h4 class="title">FEEDBACK TO US</h4>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="label">Username</div>
                                        <input name="username" type="text" class="box" placeholder="Username" required>
                                    </div>
                                    <div class="col-6">
                                        <div class="label">Email</div>
                                        <input name="email" type="email" class="box" placeholder="Email" required>
                                    </div>
                                    <div class="col-6">
                                        <div class="label">Telephone</div>
                                        <input name="telephone" type="tel" class="box" placeholder="Telephone" required minlength="9" maxlength="10">
                                    </div>
                                    <div class="col-6">
                                        <div class="label">Address</div>
                                        <input name="address" type="text" class="box" placeholder="Address" required>
                                    </div>
                                    <div class="col-12">
                                        <div class="label">Message</div>
                                        <textarea name="message" cols="30" rows="10" placeholder="Message Here" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="wrap-btn">
                                            <button type="submit" name="btn_message"><i class="fab fa-telegram-plane"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php include('footer.php'); 
?>
