
<?

use function Laravel\Prompts\error;
use function Symfony\Component\VarDumper\Dumper\esc;

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
        if ($res->num_rows == 1) {
        } else {
            $sql = "INSERT INTO `likes` (`id`, `user_id`, `post_id`, `like`, `timestamp`)VALUES('$this->id', '$userId', '$postId', 0, now())";

            $res = $this->conn->query($sql);
            if ($res) {
                // error_log("Constructing success");
                if (!$this->conn->query($sql)) {
                    throw new Exception("Unable to Like the post");
                }
            }
        }
    }

    public function togglelike()
    {
        error_log("toggle liek got ccc");
        error_log("like toggle");
        $liked = $this->getLike();
        error_log("liked =" . $liked);
        if (boolval($liked) == true) {
            $this->setLike(0);
        } else {
            $this->setLike(1);
        }
    }

    public function isliked()
    {
        $res = $this->getlike();
        return boolval($res);
    }
}
