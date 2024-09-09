<?php 
    // include('function.php');
    include('sidebar.php');

    $id = $_GET['id'];

    $sql = "SELECT * FROM `news` WHERE id='$id'";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);
    $thumbnail = $row['thumbnail'];
    $banner = $row['banner'];
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Add Sport News</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" value="<?php  print $row['title']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-select" name="type">
                                            <option value="National"<?php if($row['type']=="National") print 'selected'?>>National</option>
                                            <option value="International" <?php if($row['type']=="International") print 'selected'?>>International</option>  
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-select" name="category">
                                            <option value="Sport" <?php if($row['type']=="Sport") print 'selected'?>>SPORTS</option>
                                            <option value="Social" <?php if($row['type']=="Social") print 'selected'?>>SOCAIAL</option> 
                                            <option value="Entertainment" <?php if($row['type']=="Entertainment") print 'selected'?>>ENTERTAINMENT</option> 
                                        </select>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Thumbnail</label>
                                        <input type="file" class="form-control" name="thumbnail">
                                        <img src="./assets/image/<?php print $thumbnail?>" alt="" width="100px" height="100px">
                                        <!-- Hidden Logo -->
                                        <input type="hidden" name="old-thumbnail" id="" value="<?php print $thumbnail?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Banner</label>
                                        <input type="file" class="form-control" name="banner">
                                        <img src="./assets/image/<?php print $banner?>" alt="" width="100px" height="100px">
                                        <!-- Hidden Logo -->
                                        <input type="hidden" name="old-banner" id="" value="<?php print $banner?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" <?php print $row['description']?>></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="btn-news">Save</button>
                                        <button type="submit" class="btn btn-danger">Cancel</button>
                                        
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