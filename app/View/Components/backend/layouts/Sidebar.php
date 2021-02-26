<?php

namespace App\View\Components\backend\layouts;

use App\Models\ManageMenu;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $menuLists = ManageMenu::with('children')->where('parent_id', null)->orderBy('position', 'asc')->get();
        return view('components.backend.layouts.sidebar', compact('menuLists'));
    }
}
