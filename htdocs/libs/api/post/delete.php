<?
${basename(__FILE__, '.php')} = function () {
    error_log("Delete Api got called");
    if ($this->isAuthenticated() and $this->paramsExists('id')) {
        $p = new Post($this->_request['id']);
        $this->response($this->json(
            ["message" => $p->deletePOst()]
        ), 200);
    } else {
        $this->response($this->json(["message" => "Bad request"]), 400);
    }
};
