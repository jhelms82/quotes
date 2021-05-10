<?php

// Models and Database
require('config/Database.php');
require('models/Author.php');
require('models/Category.php');
require('models/Quote.php');

// Instantiate DB & Connect
$database = new Database();
$db = $database->connect();

// Create Objects
$quote = new Quote($db);
$author = new Author($db);
$category = new Category($db);

$author_id = filter_input(INPUT_GET, 'author_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
$limit = filter_input(INPUT_GET, 'limit', FILTER_VALIDATE_INT);

// Get Request Quote Data
if ($author_id) { $quote->author_id = $author_id; }
if ($category_id) { $quote->category_id = $category_id; }
if ($limit) { $quote->limit = $limit;}

// Read Data
$quotes = $quote->read();
$authors = $author->read();
$categories = $category->read();

include('view/quote_list.php');
