<?php 
    // include('function.php');
    include('sidebar.php');
    $id = $_GET['id'];

    $sql= "SELECT * FROM `follow_us` WHERE id='$id'";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);
    $icon = $row['icon'];
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Follow-Us Add</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                        <label>Icon</label>
                                        <input name="icon" type="file" class="form-control">
                                        <img src="./assets/image/<?php echo $icon?>" alt="" width="70px" height="70px" class="mt-3">
                                        <!-- Hidden icon -->
                                        <input type="hidden" value="<?php echo $icon?>" name="old-icon">
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Label</label>
                                        <input name="label" type="text" class="form-control"  value="<?php  echo $row['label']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-select">
                                            <option value="All"<?php if($row['status']=="All") echo 'selected'?>>All</option>
                                            <option value="Header"<?php if($row['status']=="Follow Us") echo 'selected'?>>Follow Us</option>
                                            <option value="Footer"<?php if($row['status']=="Footer") echo 'selected'?>>Footer</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Url</label>
                                        <input name="url" type="text" class="form-control"value="<?php  echo $row['url']?>">
                                    </div>
                                    <div class="form-group">
                                        <button name="btn-follow-update" type="submit" class="btn btn-primary">Save</button>                              
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