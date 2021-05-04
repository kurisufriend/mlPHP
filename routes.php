<?php
include_once("instance.php");
function route($path, $ml)
{
    header('Content-Type:application/json');
    switch ($path)
    {
        case "/info":
            return file_get_contents("db/info.json");
            break;
        case "/manga/search":
            $response = [];
            foreach ($ml->db["manga"] as $manga)
            {
                array_push($response, $manga["info"]);
            }
            return json_encode($response);
            break;
        case "/manga/from_id":
            if (isset($_GET["id"]))
            {
                return json_encode($ml->getManga($_GET["id"])["info"]);
            }
            http_response_code(400);
            break;
        case "/manga/get_chapters":
            if (isset($_GET["id"]))
            {
                return json_encode($ml->getManga($_GET["id"])["chapters"]);
            }
            http_response_code(400);
            break;
        case "/manga/thumbnail":
            if (isset($_GET["id"]))
            {
                header('Content-Type:image/webp');
                readfile("thumbnail/".$_GET["id"].".webp");
                return;
            }
            http_response_code(400);
            break;
        default:
            http_response_code(404);
    }
}
?>