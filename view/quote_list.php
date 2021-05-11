
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotes</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</head>

<body>
<main>
    <header>
        <h1>Quotes</h1>
    </header>



    <form action="." method="get" id="author_selection">
    <section id="dropmenus" class="dropmenus">
<?php if ($authors) { ?>
    <label>Make:</label>
    <select name="author_id">
        <option value="0">View All Authors</option>
        <?php foreach ($authors as $author) : ?>
            <?php if ($author['id'] == $author_id) { ?>
                <option value="<?= $author['id']; ?>" selected>
            <?php } else { ?>
                <option value="<?= $author['id']; ?>">
            <?php } ?>
            <?= $author['author']; ?>
            </option>
        <?php endforeach; ?>
    </select>
<?php } ?> <br>


    <section id="dropmenus" class="dropmenus">
<?php if ($categories) { ?>
    <label>Categories:</label>
    <select name="category_id">
        <option value="0">View All Categories</option>
        <?php foreach ($categories as $category) : ?>
            <?php if ($category['id'] == $category_id) { ?>
                <option value="<?= $category['id']; ?>" selected>
            <?php } else { ?>
                <option value="<?= $category['id']; ?>">
            <?php } ?>
            <?= $category['category']; ?>
            </option>
        <?php endforeach; ?>
    </select>
        <?php } ?><br>
    </section>

        <section id="sortBy" class="sortBy">
            <div>

                <input type="submit" value="Submit" class="button blue button-slim">
            </div>
        </section>
    </form>



        <section>
            <?php if($quotes) { ?>
                <div id="table-overflow-customer" class="table-overflow-customer">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Quote</th>
                            <th>Author</th>
                            <th>Category</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($quotes as $quote) : ?>
                            <tr>
                                <td><?= $quote['quote']; ?></td>
                                <?php if ($quote['author_name']) { ?>
                                    <td><?= $quote['author_name']; ?></td>
                                <?php } else { ?>
                                    <td>None</td>
                                <?php } ?>
                                <?php if ($quote['category_name']) { ?>
                                    <td><?= $quote['category_name']; ?></td>
                                <?php } else { ?>
                                    <td>None</td>
                                <?php } ?>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <p>
                    there are no quotes
                </p>
            <?php } ?>
        </section>

    </main>
    </body>

    </html>