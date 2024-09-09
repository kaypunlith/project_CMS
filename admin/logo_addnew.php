<?php 
    // include('function.php');
    include('sidebar.php');
    
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Add Logo News</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                   <label for="">Status</label>
                                   <select name="status" id="" class="form-select">
                                        <option value="Header">Header</option>
                                        <option value="Footer">Footer</option>
                                   </select>                                 
                                    <div class="form-group mt-3">
                                        <label>Thumbnail</label>
                                        <input name="thumbnail" type="file" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="btn-save">Save</button>
                                        <button type="submit" class="btn btn-danger" name="btn-cancel">Cancel</button>
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