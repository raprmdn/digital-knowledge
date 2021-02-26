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
        return $this->tag->get();
    }

    public function findById($id)
    {

    }

    public function saveData($attribute)
    {
        $attribute['tag_slug'] = Str::slug($attribute['tag_name']);
        
        $result = $this->tag->create([
            'tag_name' => $attribute['tag_name'],
            'tag_slug' => $attribute['tag_slug'],
        ]);

        return $result;
    }

    public function updateData($tag, $attribute)
    {
        $attribute['tag_slug'] = Str::slug($attribute['tag_name']);

        $result = $tag->update([
            'tag_name' => $attribute['tag_name'],
            'tag_slug' => $attribute['tag_slug'],
        ]);

        return $result;
    }

    public function deleteData($tag)
    {
        $result = $tag->delete();
        return $result;
    }

    public function findTagByPaginate() 
    {
        return $this->tag->paginate(10);
    }

}