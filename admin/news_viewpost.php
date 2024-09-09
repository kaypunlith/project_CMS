<?php 
    // include('function.php');
    include('sidebar.php');
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>All Sport News</h3>
                        </div>
                        <div class="bottom view-post">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <!-- <div class="block-search">
                                        <input type="text" class="form-control" placeholder="SEARCH HERE">
                                        <button type="submit">
                                        <img src="search.png" alt=""></button>
                                    </div> -->
                                    <table class="table" border="1px">
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th>Categories</th>
                                            <th>Thumbnail</th>
                                            <th>Banner</th>
                                            <th>Views</th>
                                            <th>Post By</th>
                                            <th>Description</th>
                                            <th>Publish Date</th>
                                            <th>Actions</th>
                                        </tr>
                                        <!-- <tr>
                                            <td>1</td>
                                            <td>Why do we use it?</td>
                                            <td>National</td>
                                            <td>Sport</td>
                                            <td>imagename</td>
                                            <td>0</td>
                                            <td>Victory</td>
                                            <td>27/June/2022</td>
                                            <td width="150px">
                                                <a href=""class="btn btn-primary">Update</a>
                                                <button  type="button" remove-id="1" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr> -->
                                        <?php view_newspost();?>
                                    </table>
                                    <ul class="pagination">
                                        <li>
                                            <a href="">1</a>
                                            <a href="">2</a>
                                            <a href="">3</a>
                                            <a href="">4</a>
                                        </li>
                                    </ul>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to remove this post?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="" method="post">
                                                        <input type="hidden" class="value_remove" name="news_remove">
                                                        <button name="btn-delete-news" type="submit" class="btn btn-danger">Yes</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>  
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>