<?php

namespace Examples;

class UserService {
    private $users = [];

    public function createUser($data) {
        $id = count($this->users) + 1;
        $user = [
            'id' => $id,
            'name' => $data['name'],
            'email' => $data['email']
        ];
        $this->users[$id] = $user;
        return ['success' => true, 'user' => $user];
    }

    public function getUser($data) {
        $id = $data['id'];
        if (isset($this->users[$id])) {
            return ['success' => true, 'user' => $this->users[$id]];
        } else {
            return ['success' => false, 'message' => 'User not found'];
        }
    }
}
