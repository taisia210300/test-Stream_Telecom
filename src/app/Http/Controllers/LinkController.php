<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\LinkVisit;
use App\Services\ShortCodeGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    protected ShortCodeGenerator $codeGenerator;

    public function __construct(ShortCodeGenerator $codeGenerator)
    {
        $this->codeGenerator = $codeGenerator;
    }

    public function index()
    {
        return view('links.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url|max:2048',
        ]);

        try {
            $link = Link::create([
                'user_id' => Auth::id(),
                'original_url' => $request->url,
                'short_code' => $this->codeGenerator->generate(),
            ]);

            $shortUrl = url('/go/' . $link->short_code);

            return view('links.index', [
                'shortUrl' => $shortUrl,
                'originalUrl' => $link->original_url,
            ]);
        } catch (\RuntimeException $e) {
            return back()->withErrors(['error' => 'Failed to generate unique short code. Please try again.']);
        }
    }

    public function redirect($shortCode)
    {
        $link = Link::where('short_code', $shortCode)->firstOrFail();

        LinkVisit::create([
            'link_id' => $link->id,
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'visited_at' => now(),
        ]);

        return redirect()->away($link->original_url);
    }
}
