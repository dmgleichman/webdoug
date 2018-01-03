<h2><?php echo $title; ?></h2>

<p>This is the views/news/index.php file</p>
<p>Data is passed to this view through a variable called allnews</p>

<?php foreach ($allnews as $news_item_one): ?>

        <h3><?php echo "<em>Title:</em> " . $news_item_one['title']; ?></h3>
        <div class="main">
                <?php echo $news_item_one['text']; ?>
        </div>
        <p><a href="<?php echo site_url('news/'.$news_item_one['slug']); ?>">View article</a> <?php echo $news_item_one['slug']; ?></p>

<?php endforeach; ?>
