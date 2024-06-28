<?php

namespace App\Http\Controllers\Owner\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        // ownerフォルダ/authフォルダ/login
        return view('owner.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $latestBreads = Item::with('images')->orderBy('created_at', 'desc')->take(4)->get();
        $categories = Category::all();
        // dd($latestBreads);
        return redirect()->route('owner.index', compact('latestBreads', 'categories'));

        // return redirect()->intended(route('owner.dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('owners')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/owner/login');
    }
}
