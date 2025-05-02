<?php



namespace App\Models;

  use Illuminate\Foundation\Auth\User as Authenticatable;

  class SecureUser extends Authenticatable
  {
      protected $table = 'secure_users';
      protected $primaryKey = 'primary_key';

      public $incrementing = true;
    public $timestamps = false; // ✅ 关闭 created_at 和 updated_at 自动管理
      protected $fillable = ['username', 'password'];

      public function getAuthPassword()
      {
          return $this->password;
      }
  }