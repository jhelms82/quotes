<?php
class Quote {
    // DB stuff
    private $conn;
    private $table = 'quotes';

    // Post Properties
    public $id;
    public $category_id;
    public $author_id;
    public $category;
    public $author;
    public $quote;
    public $limit;
  
 

    // Constructor with DB
    public function __construct($db) {
        $this->conn = $db;
    }

    // Get Quote
//    public function read() {
//        // Create query
//
//
//        $query = 'SELECT q.id, quote, q.category_id, category, q.author_id, author
//                    FROM ' . $this->table . ' q
//                    LEFT JOIN categories c
//                    ON q.category_id = c.id
//                    LEFT JOIN authors a
//                    ON q.author_id = a.id
//'
//;
//
//
//
//
//        // Prepare statement
//        $stmt = $this->conn->prepare($query);
//
//        // Execute query
//        $stmt->execute();
//
//        return $stmt;
//    }

    public function read() {
        // Create query
        $query = 'SELECT c.category as category_name, q.id, q.category_id, q.quote, q.author_id, a.author as author_name FROM '
            . $this->table . ' q LEFT JOIN categories c ON q.category_id = c.id
            LEFT JOIN authors a ON q.author_id = a.id ORDER BY q.id';
        if($this->author_id && $this->category_id && $this->author_id > 0 && $this->category_id > 0){
            $query = $query . ' WHERE q.author_id = :author_id AND q.category_id = :category_id';
        } else if($this->author_id && $this->author_id > 0){
            $query = $query . ' WHERE q.author_id = :author_id';
        } else if($this->category_id && $this->category_id > 0){
            $query = $query . ' WHERE q.category_id = :category_id';
        }
        if($this->limit){
            $query = $query . ' LIMIT 0,:limit';
        }
        // prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean Data
        if($this->limit){
            $this->limit = htmlspecialchars(strip_tags($this->limit));
        }
        if($this->author_id){
            $this->author_id = htmlspecialchars(strip_tags($this->author_id));
        }
        if($this->category_id){
            $this->category_id = htmlspecialchars(strip_tags($this->category_id));

            // Bind Data
            $stmt->bindParam(':category_id', $this->category_id);
        }
        // Bind Data
        if($this->limit){
            $stmt->bindParam(':limit', $this->limit);
        }
        if($this->author_id){
            $stmt->bindParam(':author_id', $this->author_id);
        }
        if($this->category_id){
            $stmt->bindParam(':category_id', $this->category_id);
        }

        // Execute Query
        $stmt->execute();

        return $stmt;
    }


    // Get Single Post
    public function read_single() {
        // Create query
        $query = 'SELECT q.id, quote, q.category_id, category, q.author_id, author
                    FROM ' . $this->table . ' q 
                    LEFT JOIN categories c 
                    ON q.category_id = c.id 
                    LEFT JOIN authors a 
                    ON q.author_id = a.id
                                    WHERE
                                      q.id = ?
                                    LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->quote = $row['quote'];
        $this->author_id = $row['author_id'];
        $this->category_id = $row['category_id'];
        // $this->category_name = $row['category_name'];
    }

    // Create Post
    public function create() {
        // Create query
        $query = 'INSERT INTO ' . $this->table . '
         SET 
         quote = :quote, 
         author_id = :author_id, 
         category_id = :category_id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->quote = htmlspecialchars(strip_tags($this->quote));
        $this->author_id = htmlspecialchars(strip_tags($this->author_id));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));

        // Bind data
        $stmt->bindParam(':quote', $this->quote);
        $stmt->bindParam(':author_id', $this->author_id);
        $stmt->bindParam(':category_id', $this->category_id);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // Update Post
    public function update() {
        // Create query
        $query = 'UPDATE ' . $this->table . '
                                SET  
                                quote = :quote, 
                                author_id = :author_id, 
                                category_id = :category_id
                                WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->quote = htmlspecialchars(strip_tags($this->quote));
        $this->author_id = htmlspecialchars(strip_tags($this->author_id));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $stmt->bindParam(':quote', $this->quote);
        $stmt->bindParam(':author_id', $this->author_id);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // Delete Post
    public function delete() {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

}