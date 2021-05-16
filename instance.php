<?php
include_once("routes.php");
class ml
{
    public $info;
    public $db;
    function __construct()
    {
        $this->info = json_decode(file_get_contents("db/info.json"), $associative = true);
        $this->db = json_decode(file_get_contents("db/test.json"), $associative = true);
    }
    function getManga($id)
    {
        foreach ($this->db["manga"] as $manga)
        {
            if ($manga["info"]["id"] == $id)
            {
                return($manga);
            }
        }
        return(0);
    }
    function getAllMangaInfo()
    {
        $response = [];
        foreach ($this->db["manga"] as $manga)
        {
            array_push($response, $manga["info"]);
        }
        return $response;
    }
    function run()
    {
        echo(route(explode("?", $_SERVER["REQUEST_URI"])[0], $this));
    }
}
?>