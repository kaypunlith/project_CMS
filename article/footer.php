    <footer>
        <div class="container">
            <div class="logo">
                <a href="">
                    <!-- <img src="https://dummyimage.com/120" alt=""> -->
                    <img src="../admin/assets/image/<?php get_logo('Footer')?>" 
                     alt="" width="100px" height="100px" style="object-fit: cover;">
                </a>
            </div>
            <div class="about">
                <div class="description">
                    <?php get_description()?>
                </div>
            </div>
            <div class="connect">
                <ul>
                   <?php  get_icon_footer('All','Footer')?>
                </ul>
            </div>
        </div>
    </footer> 
</body>
<!-- @slick slider -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- @theme js -->
<script src="assets/script/theme.js"></script>
<!-- @funcy box -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>