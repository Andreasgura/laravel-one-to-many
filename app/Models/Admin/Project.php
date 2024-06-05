<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'screenshot', 'link_github', 'link_website', 'slug'];

    public static function generateSlug($className, $string)
    {
        $count = 1;
        $slug = Str::slug($string, '-');
        while ($className::where('slug', $slug)->first()) {
            $slug = Str::slug($string . '-' . $count, '-');
            $count++;
        }
        return $slug;
    }
}
