<?php

namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Support\Str;

class TagRepository implements TagRepositoryInterface {

    protected $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function findAll()
    {
        return $this->tag->get(['id', 'tag_name', 'tag_slug']);
    }

    public function findById($id)
    {

    }

    public function saveData($attribute): Tag
    {
        $attribute['tag_slug'] = Str::slug($attribute['tag_name']);

        return $this->tag->create([
            'tag_name' => $attribute['tag_name'],
            'tag_slug' => $attribute['tag_slug'],
        ]);
    }

    public function updateData($tag, $attribute)
    {
        $attribute['tag_slug'] = Str::slug($attribute['tag_name']);

        return $tag->update([
            'tag_name' => $attribute['tag_name'],
            'tag_slug' => $attribute['tag_slug'],
        ]);
    }

    public function deleteData($tag)
    {
        return $tag->delete();
    }

    public function findTagByPaginate()
    {
        return $this->tag->paginate(10);
    }

}
