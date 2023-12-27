<?

use Hamcrest\Type\IsObject;

use function Laravel\Prompts\error;

${basename(__FILE__, ".php")} = function () {
    if ($this->isAuthenticated() and $this->paramsExists(['id'])) {
        $postid = $this->_request['id'];
        $postobj = new Post($postid);
        $likeobj = new Like($postobj);
        error_log(is_object($likeobj));
        $likeobj->togglelike();
        $this->response($this->json([
            "Liked" => $likeobj->isliked()
        ]), 200);
    } else {
        $this->response($this->json([
            "message" => "Bad Request"
        ]), 400);
        error_log("Else conditon satisfied");
    }
};
