<?php
echo '<h1>Author</h1>';

echo '<p>Author: ' . $news_author . '</p>';
echo '<p>Slug: ' . $news_slug . '</p>';
 
echo '<h2>'.$news_item_from_slug['title'].'</h2>';

echo $news_item_from_slug['text'];
