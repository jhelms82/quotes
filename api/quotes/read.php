
<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require '../../config/Database.php';
require '../../models/Quote.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate Quoteobject
$quote = new Quote($db);

//  post query
$result = $quote->read();
// Get row count
$num = $result->rowCount();


// Check if any posts
if($num > 0) {


    //  array
    $quote_arr = array();



    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $quote_item = array(
            'id' => $id,
            'quote' => html_entity_decode($quote),
            'author' => $author,
             'category' => $category
        );


        array_push($quote_arr, $quote_item);

    }

    // Turn to JSON & output
    echo json_encode($quote_arr);

} else {
    // No Posts
    echo json_encode(
        array('message' => 'No Quote Found')
    );
}