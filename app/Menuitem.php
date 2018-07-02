<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menuitem extends Model
{
    use SoftDeletes;

    public function getlinkAttribute()
    {
        if ($this->link_type == "post") {

            $post_slug = Post::find($this->relative_id)->slug;

            return route('page.view', $post_slug);

        } else if ($this->link_type == "application") {
            $app_slug = Application::find($this->relative_id)->slug;
            return route('app.view', $app_slug);

        } else if ($this->link_type == "external") {

            return $this->attributes['link'];
        }
    }
}
