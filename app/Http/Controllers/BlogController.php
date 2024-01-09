<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        $blogsData = [];

        foreach ($blogs as $blog) {
            $featuredImage = asset('storage/blog-photos/' . $blog->id . '-featured.jpg');
            $imagePath = storage_path('app/public/blog-photos/' . $blog->id . '-body.jpg');
            $image = file_exists($imagePath) ? asset('storage/blog-photos/' . $blog->id . '-body.jpg') : null;

            $blogsData[] = [
                'id' => $blog->id,
                'title' => $blog->title,
                'intro' => $blog->intro,
                'detailsOne' => $blog->detailsOne,
                'detailsTwo' => $blog->detailsTwo,
                'detailsThree' => $blog->detailsThree,
                'featuredImage' => $featuredImage,
                'image' => $image,
                'category' => $blog->category,
                'created_at' => $blog->created_at,
            ];
        }

        return Response::json(['blogs' => $blogsData]);
    }

    public function getFeaturedBlogs()
    {
        $featuredBlogs = Blog::where('featured', 1)->limit(3)->get();

        $featuredBlogsData = [];

        foreach ($featuredBlogs as $blog) {
            $featuredImage = asset('storage/blog-photos/' . $blog->id . '-featured.jpg');
            $imagePath = storage_path('app/public/blog-photos/' . $blog->id . '-body.jpg');
            $image = file_exists($imagePath) ? asset('storage/blog-photos/' . $blog->id . '-body.jpg') : null;

            $featuredBlogsData[] = [
                'id' => $blog->id,
                'title' => $blog->title,
                'intro' => $blog->intro,
                'detailsOne' => $blog->detailsOne,
                'detailsTwo' => $blog->detailsTwo,
                'detailsThree' => $blog->detailsThree,
                'featuredImage' => $featuredImage,
                'image' => $image,
                'category' => $blog->category,
                'created_at' => $blog->created_at,
            ];
        }
        return response()->json(['featuredBlogs' => $featuredBlogsData]);
    }

    public function getBlogById($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return Response::json(['message' => 'Blog not found'], 404);
        }

        $featuredImage = asset('storage/blog-photos/' . $blog->id . '-featured.jpg');

        $imagePath = storage_path('app/public/blog-photos/' . $blog->id . '-body.jpg');

        $image = file_exists($imagePath) ? asset('storage/blog-photos/' . $blog->id . '-body.jpg') : null;

        return response()->json(['blog' => $blog, 'featuredImage' => $featuredImage, 'image' => $image]);
    }

    public function getAllCategories()
    {
        $categoriesWithCounts = Blog::select('category')
                            ->groupBy('category')
                            ->get()
                            ->pluck('category', 'category')
                            ->toArray();

        return response()->json(['categories' => $categoriesWithCounts]);
    }
}
