<?php

class Notes {

    private $data;
    private $returnData = [];
    private static $fields = ['author', 'title', 'data', 'timestamp'];

    public function __construct($post_data){
        $this->data = $post_data;
    }

    public function AddNote(){
        $author = $_SESSION['username'];
        $title = $this->data['title'];
        $data = $this->data['data'];

        require('db.php');
        try {
            ($database->query("INSERT INTO notes VALUES (NULL, '$author', '$title', '$data', NOW())"));
            $this->returnData['result'] = 'success';
            return $this->returnData;
        }
        catch (Exception $e) {
            echo "There was a problem with database. Developer info: " .$e;
        }
        $database->close();
    }

}

?>