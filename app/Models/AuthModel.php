<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama_lengkap', 'username', 'email', 'password', 'level', 'reset_token', 'token_expiry', 'otp'];

    public function save_register($data)
    {
        $this->db->table($this->table)->insert($data);
    }

    public function login($username, $password)
    {
        return $this->db->table($this->table)->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->get();
    }

    public function getUserById($id)
    {
        return $this->where('id_user', $id)->get();
    }


    public function setResetToken($userId, $token)
    {
        return $this->update($userId, [
            'reset_token' => $token,
            'token_expiry' => date('Y-m-d H:i:s', strtotime('+1 hour')) // Token berlaku 1 jam
        ]);
    }

    public function getUserByToken($token)
    {
        return $this->where('reset_token', $token)
            ->where('token_expiry >=', date('Y-m-d H:i:s'))
            ->first();
    }

    public function resetPassword($userId, $newPassword)
    {
        return $this->update($userId, [
            'password' => password_hash($newPassword, PASSWORD_BCRYPT),
            'reset_token' => null,
            'token_expiry' => null
        ]);
    }
}
