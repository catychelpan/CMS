<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Confirmation</title>
</head>

<body>
    <h2>Delete Confirmation</h2>
    <p>Are you sure you want to delete the page with ID <?= $page->id ?>?</p>

    <form method="post" action="/CMS/public/admin/index.php?module=page&action=deletePage&id=<?= $page->id ?>">

        <button class="btn btn-primary" type="submit">Yes, delete</button>
        <input type="hidden" name="confirm_delete" value="yes">

    </form>

    <a class="btn btn-danger" href="/CMS/public/admin/index.php">Cancel</a>
</body>

</html>