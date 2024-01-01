<!-- general form elements disabled -->
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Page id: <?=$page->id?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form role="form" action="" method="post">

            <input type="hidden" name="action" value="1">

            <div class="form-group">
                <label>Page Title</label>
                <input name="title" type="text" class="form-control" value=<?= $page->title?> placeholder="Page title">
            </div>

            <div class="form-group">

                <textarea name="content" class="form-control" rows="3"
                    placeholder="Page content"><?=$page->content?></textarea>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>


        </form>
    </div>
</div>