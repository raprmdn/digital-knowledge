<?php

namespace App\View\Components\front\layouts;

use App\Models\Category;
use Illuminate\View\Component;
use Spatie\Permission\Models\Role;

class Header extends Component
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
        $roles = Role::get();
        $categories = Category::limit(10)->get();
        return view('components.front.layouts.header', compact('roles', 'categories'));
    }
}
