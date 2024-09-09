<?php 
    // include('function.php');
    include('sidebar.php');

    $id = $_GET['id'];
    $sql = "SELECT * FROM `description` WHERE id='$id'";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);

?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Update Description</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" <?php echo $row['description']?>></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="btn-update-description">Save</button>
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