<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class ListDataController extends Controller
{

    public function indexDataArticles()
    {
        $articles = Article::with(['author', 'category', 'tags'])->latest()->paginate(10);
        return view('backend.list-article-and-user.articles.index', compact('articles'));
    }

    public function indexDataUsers()
    {
        $users = User::with('roles')->latest()->paginate(10);
        return view('backend.list-article-and-user.users.index', compact('users'));
    }

    public function userDetail() 
    {
        $user = User::findOrFail(request('id'));
        return response(['id' => $user->id, 'name' => $user->name]);
    }

    public function suspend()
    {
        request()->validate([
            'suspend_until' => 'required', 'datetime',
        ]);

        $user = User::findOrFail(request('id'));

        if ( $user->hasRole('super admin') || $user->id == auth()->user()->id ) {
            return redirect()->back()->with('error', "The Action is denied.");
        }

        $user->update([
            'suspend_user' => request('suspend_until'),
        ]);

        return redirect()->back()->with('success', "Success Suspend User $user->email");
    }

    public function recovery(User $user)
    {
        $user->update([
            'suspend_user' => null
        ]);

        return redirect()->back()->with('success', "Success Recovery User $user->email");
    }

}
