<?
${basename(__FILE__)} = function () {

    $result = [
        "success" => false,
        "message" => "invalid request"
    ];
    $this->response($this->json($result), 200);
};
