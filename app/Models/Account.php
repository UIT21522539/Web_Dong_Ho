<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';
    protected $primaryKey = 'id'; // Đặt tên primary key nếu nó không phải là 'id'

    public function checkCredentials($data)
    {
        $taiKhoan = $data[0];
        $matKhau = $data[1];

        // Thực hiện truy vấn sử dụng Eloquent
        $account = Account::where('account', $taiKhoan)
            ->where('password', $matKhau)
            ->first();

        // Kiểm tra kết quả truy vấn
        return $account ? true : false;
    }
}
