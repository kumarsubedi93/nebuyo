<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
class BannerRightSide extends Model
{

    protected $table = "banner_rightside";

    protected $fillable = [
        'title', 'image', 'link', 'link_name', 'status', 'order'
    ];

}