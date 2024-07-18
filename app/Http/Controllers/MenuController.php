<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menus'] = Menu::orderBy('id', 'desc')->paginate(5);
        return view('menu.index', $data);
    }

    /**
     * Display the frontend with all menus.
     *
     * @return \Illuminate\Http\Response
     */
    public function frontend()
    {
        $menus = Menu::all();
        return view('frontend.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'price' => 'required|numeric',
            'ingredients' => 'required',
            'category' => 'required'
        ]);

        // Upload and resize image
        $imagePath = $this->handleImageUpload($request->file('image'));

        // Create new menu
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->image = $imagePath;
        $menu->price = $request->price;
        $menu->ingredients = $request->ingredients;
        $menu->category = $request->category;
        $menu->save();

        return redirect()->route('menu.index')
            ->with('success', 'Menu item has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'price' => 'required|numeric',
            'ingredients' => 'required',
            'category' => 'required'
        ]);

        // Check if image is uploaded
        if ($request->hasFile('image')) {
            $imagePath = $this->handleImageUpload($request->file('image'));
            Storage::delete(str_replace('storage/', 'public/', $menu->image));
            $menu->image = $imagePath;
        }

        // Update other menu properties
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->ingredients = $request->ingredients;
        $menu->category = $request->category;
        $menu->save();

        return redirect()->route('menu.index')
            ->with('success', 'Menu item has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        // Delete image
        Storage::delete(str_replace('storage/', 'public/', $menu->image));

        // Delete menu
        $menu->delete();

        return redirect()->route('menu.index')
            ->with('success', 'Menu item has been deleted successfully');
    }

    /**
     * Handle image upload and manipulation.
     *
     * @param  \Illuminate\Http\UploadedFile  $image
     * @return string
     */
    private function handleImageUpload($image)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        // Move image to uploads directory
        $image->move('uploads', $imageName);

        $imgManager = new ImageManager(new Driver());
        $thumbImage = $imgManager->read('uploads/' . $imageName);
        $thumbImage->resize(400, 400);

        $thumbnailPath = 'uploads/thumbnails/' . $imageName;
        $thumbImage->save($thumbnailPath);

        return $thumbnailPath;
    }
}
