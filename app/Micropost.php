<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Micropost;

class Micropost extends Model
{
    /**
     * 投稿データを所有するユーザを取得
     */
    public function user()
    {
      return $this->belongsTo('App\User');
    }

    /**
     * 投稿データを降順で全て取得
     */
    public static function getAll()
    {
      $microposts = Micropost::all()->sortByDesc('id');
      return $microposts;
    }

    /**
     * 投稿データを登録する
     */
    public function micropostSave($params)
    {
      $isSave = $this->fill($params)->save();
      return $isSave;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'user_id',
      'content',
    ];
}
