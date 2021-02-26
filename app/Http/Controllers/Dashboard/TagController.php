<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Repositories\TagRepositoryInterface;
use Illuminate\Http\Request;

class TagController extends Controller
{

    protected $tagRepository;

    public function __construct(TagRepositoryInterface $tagRepository) 
    {
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        $tags = $this->tagRepository->findTagByPaginate();
        return view('backend.tags.index', compact('tags'));
    }

    public function create()
    {
        $tag = new Tag;
        return view('backend.tags.create', compact('tag'));
    }

    public function store(TagRequest $request)
    {
        $attribute = request()->all();
        $this->tagRepository->saveData($attribute);
        
        return redirect()->back()->with('success', 'New Tag has been added.');
    }

    public function show($id)
    {
        //
    }

    public function edit(Tag $tag)
    {
        return view('backend.tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $attribute = request()->all();

        $this->tagRepository->updateData($tag, $attribute);

        return redirect()->route('menu.tag.index')->with('success', 'Tag has been updated.');
    }

    public function destroy(Tag $tag)
    {
        $this->tagRepository->deleteData($tag);
        return redirect()->back()->with('success', 'Tag has been deleted.');
    }
}
