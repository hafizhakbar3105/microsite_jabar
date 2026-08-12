<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class LinkController extends Controller
{
    /**
     * Menampilkan daftar link.
     */
    public function index(): View
    {
        $links = Link::latest()->paginate(10);

        return view('admin.links.index', compact('links'));
    }

    /**
     * Menampilkan form tambah link.
     */
    public function create(): View
    {
        return view('admin.links.create');
    }

    /**
     * Menyimpan link baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('links', 'public');
        }

        Link::create([
            'title' => $validated['title'],
            'url' => $validated['url'],
            'image' => $imagePath,
            'is_active' => $request->boolean('is_active'),
            'clicks' => 0,
        ]);

        return redirect()
            ->route('admin.links.index')
            ->with('success', 'Tautan berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit.
     */
    public function edit(Link $link): View
    {
        return view('admin.links.edit', compact('link'));
    }

    /**
     * Memperbarui data link.
     */
    public function update(Request $request, Link $link): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = $link->image;

        if ($request->hasFile('image')) {

            if ($link->image && Storage::disk('public')->exists($link->image)) {
                Storage::disk('public')->delete($link->image);
            }

            $imagePath = $request->file('image')->store('links', 'public');
        }

        $link->update([
            'title' => $validated['title'],
            'url' => $validated['url'],
            'image' => $imagePath,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.links.index')
            ->with('success', 'Tautan berhasil diperbarui!');
    }

    /**
     * Menghapus link.
     */
    public function destroy(Link $link): RedirectResponse
    {
        if ($link->image && Storage::disk('public')->exists($link->image)) {
            Storage::disk('public')->delete($link->image);
        }

        $link->delete();

        return redirect()
            ->route('admin.links.index')
            ->with('success', 'Tautan berhasil dihapus!');
    }
}