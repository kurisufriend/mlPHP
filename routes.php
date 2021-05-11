<?php
include_once("instance.php");
function substrInArr($needle, $haystack)
{
    foreach ($haystack as $str)
    {
        if (strpos($str, $needle))
        {
            return true;
        }
    }
    return false;
}
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
            foreach ($ml->getAllMangaInfo() as $manga)
            {
                if ((isset($_GET["title"]) && substrInArr($_GET["title"], $manga["titles"])) || 
                (isset($_GET["author"]) && in_array($_GET["author"], $manga["authors"])) || 
                (isset($_GET["artist"]) && in_array($_GET["artist"], $manga["artists"])) || 
                (isset($_GET["genre"]) && in_array($_GET["genre"], $manga["genres"])) ||
                (isset($_GET["sort"])))
                {
                    array_push($response, $manga);
                }
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
        case "/manga/people":
            return json_encode($ml->db["people"]);
            break;
        case "/manga/scanlators":
            return json_encode($ml->db["scanlators"]);
            break;

        default:
            http_response_code(404);
    }
}
?>