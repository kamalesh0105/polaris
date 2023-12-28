<?
${basename(__FILE__, ".php")} = function () {
    if ($this->isAuthenticated() and $this->paramsExists(['id'])) {
        $postid = $this->_request['id'];
        $postobj = new Post($postid);
        $likeobj = new Like($postobj);
        $likeobj->togglelike();
        $this->response($this->json([
            "Liked" => $likeobj->isLiked()
        ]), 200);
    } else {
        $this->response($this->json([
            "message" => "Baad Request"
        ]), 400);
        error_log("Else conditon satisfied");
    }
};
