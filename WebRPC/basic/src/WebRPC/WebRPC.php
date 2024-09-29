<?php

namespace WebRPC;

class WebRPC {
    private $service;

    public function __construct($service) {
        $this->service = $service;
    }

    public function run() {
        $requestPayload = file_get_contents('php://input');
        $request = json_decode($requestPayload, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Invalid JSON']);
            exit;
        }

        $method = $request['method'];
        $params = $request['params'];

        if (method_exists($this->service, $method)) {
            $response = call_user_func([$this->service, $method], $params);
        } else {
            $response = ['success' => false, 'message' => 'Method not found'];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
