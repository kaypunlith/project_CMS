<?php 
    // include('function.php');
    include('sidebar.php');
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
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Label</label>
                                        <input name="label" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-select">
                                            <option value="All">All</option>
                                            <option value="Follow Us">Follow Us</option>
                                            <option value="Footer">Footer</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Url</label>
                                        <input name="url" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button name="btn-save-follow" type="submit" class="btn btn-primary">Save</button>                              
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