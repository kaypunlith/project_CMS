<?php include('header.php'); ?>
<main class="entertainment">
    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            Entertainment NEWS
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container">
            <div class="row">
                <?php
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }else{
                        $page = 1;
                    }
                    list_news_contents('Entertainment','National',$page,3)
                ?>

            </div>
            <div class="row pagination"> 
                
                <div class="col-12">
                    <ul>
                    <?php 
                        pageination('Entertainment','National',3);
                    ?>
                    </ul>   
                </div>
            </div>
        </div>
    </section>
</main>
<?php include('footer.php'); ?>