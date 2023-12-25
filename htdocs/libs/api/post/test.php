<?
${basename(__FILE__)} = function () {

    echo "I got Called by API";
    $result = [
        "success" => True,
        "message" => "invalid request"
    ];
    $this->response($this->json($result), 200);
};
echo "Its Me";
