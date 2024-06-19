<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    public function scopeFilters($query, $data)
    {
        $query->when(isset($data['search']) || isset($data['tags']), function ($query) use ($data) {
            $query->where(function ($q) use ($data) {
                $q->where('title', 'like', '%' . $data['search'] . '%')
                    ->when(isset($data['tags']), function ($q) use ($data) {
                        $q->whereHas('tags', function ($q) use ($data) {
                            $q->whereIn('tag_id', $data['tags']);
                        });
                    });

            });
        });
    }

    public function scopeSort($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

}
