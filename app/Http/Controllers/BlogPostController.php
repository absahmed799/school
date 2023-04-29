<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;
use Carbon\Carbon;

class BlogPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        // Retrieve a list of blogs with the appropriate language version
        $blogs = BlogPost::select(['id', 'user_id', 'title', 'body', 'created_at', 'title_fr', 'body_fr', 'updated_at'])
            ->get()
            ->map(function ($blog) {
                $blog->title = app()->getLocale() === 'fr' ? $blog->title_fr : $blog->title;
                $blog->body = app()->getLocale() === 'fr' ? $blog->body_fr : $blog->body;
                return $blog;
            });

        // Pass the list of blogs to the view for display
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([

            'file' => 'file|mimes:pdf,zip,doc,docx|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('public/files');
            $fileName = $request->titre;
            $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
        }
        $blogPost = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'title_fr' => $request->title_fr,
            'body_fr' => $request->body_fr,
            'user_id' => Auth::user()->id,


        ]);
        if ($file) {
            $blogPost->files()->create([
                'titre_fr' => $request->titre_fr,
                'titre' => $request->titre,
                'file_path' => $filePath,
                'date' => Carbon::now()->format('Y-m-d')
            ]);
        }


        return redirect(route('blog.show', $blogPost->id))->withSuccess('Post inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {

        



        $blogPost = BlogPost::select(['id', 'user_id', 'title', 'body', 'title_fr', 'body_fr'])
        ->where('id', $blogPost->id)
        ->firstOrFail();

 // Get the appropriate language version of the blog post title and body
$title = app()->getLocale() === 'fr' ? $blogPost->title_fr : $blogPost->title;
$body = app()->getLocale() === 'fr' ? $blogPost->body_fr : $blogPost->body;

// Pass the blog post data to the view for display
return view('blog.show', compact('blogPost', 'title', 'body'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        $this->authorize('update', $blogPost);

        return view('blog.edit', ['blogPost' => $blogPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $this->authorize('update', $blogPost);
        $blogPost->update([
            'title' => $request->title,
            'body' => $request->body,
            'title_fr' => $request->title_fr,
            'body_fr' => $request->body_fr,

        ]);

        return redirect(route('blog.show', $blogPost->id))->withSuccess('Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        $this->authorize('delete', $blogPost);
        $blogPost->delete();
        return redirect(route('blog.index'))->withSuccess('Post Deleted');
    }



    public function page()
    {
        $blogs = BlogPost::select()
            ->paginate(5);

        return view('blog.page', ['blogs' => $blogs]);

    }

    public function showPdf(BlogPost $blogPost)
    {
        $pdf = PDF::loadView('blog.show-pdf', ['blogPost' => $blogPost]);
        return $pdf->download('blog.pdf');
        //return $pdf->stream('blog.pdf');

    }
    public function download($id)
    {

        $file = File::where('blog_post_id', $id)->first();

        if ($file) {
            $file_path = storage_path('app/' . $file->file_path);

            if (file_exists($file_path)) {
                return response()->download($file_path);
            }
        }


        abort(404);
    }
}