
<?

class Like
{

    use SQLGetterSetter;
    public $conn;
    public $id;
    public $data;
    public $table;




    public function __construct(Post $post)
    {
        // error_log("like constructor");
        $userId = Session::getUser()->getID();
        $postId = $post->getID();
        $this->table = "likes";
        $this->id = md5($userId . "-" . $postId);
        $this->conn = Database::get_connection();
        $this->data = null;

        $sql = "SELECT * FROM `likes` WHERE `id`='$this->id' ";

        $res = $this->conn->query($sql);
        if ($res->num_rows == 0) {
            $sql = "INSERT INTO `likes` (`id`, `user_id`, `post_id`, `like`, `timestamp`)VALUES('$this->id', '$userId', '$postId', 0, now())";
            $res = $this->conn->query($sql);
            if ($res) {
                if (!$res) {
                    throw new Exception("Unable to Like the post");
                }
            }
        }
    }

    public function toggleLike()
    {
        $liked = $this->getLike();
        if (boolval($liked) == true) {
            $this->setLike(0);
        } else {
            $this->setLike(1);
        }
    }

    public function isLiked()
    {
        return boolval($this->getLike());
    }

    public static function isliked_frontend()
    {
        $isloggedin = Session::isauthenticated();
        if ($isloggedin) {
            $userid = Session::getUser()->getId();

            $sql = "SELECT `post_id` FROM `likes` WHERE `user_id`='$userid' AND `like`='1' LIMIT 20";
            $conn = Database::get_connection();
            $res = $conn->query($sql);
            if ($res) {

                while ($row = $res->fetch_assoc()) {
                    $postIds[] = $row['post_id'];
                }
                if ($postIds != null) {
                    return $postIds;
                } else {
                    return false;
                }
            } else {
                return false;
                error_log("Query failed: " . $conn->error);
            }
        } else {
            return false;
        }
    }
}
