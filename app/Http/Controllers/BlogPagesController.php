<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Blog;
use App\UsersBlog;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
// notify();

//Notification
use App\Subscriber;
use App\Notifications\NewPostNotify;
use App\Notifications\confirmAuthorPost;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as Image;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class BlogPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {


        $user_id = Auth::id();
        $blogs = Blog::where('user_id', $user_id)->whereNull('deleted_at')->orderBy('id', 'DESC')->get();


        return view ('pages.blogs.list',compact('blogs'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('pages.blogs.create');
    }


    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title' => 'required|string',
            'category' => 'required|string',
            'description' => 'required|string',
            'highlightedText' => 'required|string',
            'image' => 'required|image',

        ]);

        $user_id = Auth::id();
        $blogs = new Blog;
        $blogs->user_id = $user_id;
        $blogs->title = $request->title;
        $blogs->category= $request->category;
        $blogs->description = $request->description;
        $blogs->highlightedText = $request->highlightedText;
        $blogs->status = 1;


        // $image  = $request->file('image');
        // Storage::putFile('public/img/',$image);
        // $blogs->image ="storage/img/".$image->hashName();

        if($request->hasFile('image')){

            $image= $request->file('image');
            $IMGNAME = Str::random(10).'.'. $image->getClientOriginalExtension();

            $thumbnail_location = 'images/blog/'
            . Carbon::now()->format('Y/M/')
            .'/';

            //Make Directory
            File::makeDirectory($thumbnail_location, $mode=0777, true, true);
            //save Image to the thumbnail path
            Image::make($image)->save(public_path($thumbnail_location.$IMGNAME));

            $blogs->image = $IMGNAME;
        }

        $blogs->save();

        // Notification
        $user_id =Auth::id();
        $user_all_data = Auth::user();
        $blogs->user_id = $user_id;

        // $subscribers = Subscriber::all();
        // foreach($subscribers as $subscriber)
        // {
        //     Notification::route('mail',$subscriber->email)
        //         ->notify(new NewPostNotify($user_all_data,));
        // }
        // Notification

        return redirect()->route('admin.blogs.create')->with('success','New Posts Category & details created Successfully');
    }

    public function restoreList()
    {
        //
        $blogs = Blog::onlyTrashed()->get();
        return view ('pages.blogs.restoreList',compact('blogs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blogs = Blog::find($id);
        return view('pages.blogs.edit',compact('blogs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $blogs = Blog::find($id);
        $blogs->title = $request->title;
        $blogs->category= $request->category;
        $blogs->description = $request->description;
        $blogs->highlightedText = $request->highlightedText;
        if($request->hasFile('image')){

            $image= $request->file('image');
            $IMGNAME = Str::random(10).'.'. $image->getClientOriginalExtension();

            $thumbnail_location = 'images/blog/'
            . Carbon::now()->format('Y/M/')
            .'/';

            //Make Directory
            File::makeDirectory($thumbnail_location, $mode=0777, true, true);
            //save Image to the thumbnail path
            Image::make($image)->save(public_path($thumbnail_location.$IMGNAME));

            //Delete previous Image
            $old_img_location = public_path('images/blog/'.$blogs->created_at->format('Y/M/').'/'.$blogs->image);
            if(file_exists($old_img_location)){
               unlink($old_img_location);
            }
            //saving the new image
            $blogs->image = $IMGNAME;
        }
        $blogs->save();


        return redirect()->route('admin.blogs.list')->with('success','New Posts Category & details updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $blogs = Blog::find($id);
        $blogs->delete();
        return redirect()->route('admin.blogs.list')->with('success',"Post Deleted Successfully");
    }
    public function restoreData($id)
    {
        //
        $blogs = Blog::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.blogs.restoreList')->with('success',"Blog Restored Successfully");
    }

    public function ShowUsersBlogslist()
    {

        $users_blogs=DB::table('users')->join('blogs','blogs.user_id','users.id')->where('blogs.status',0)->whereNull('deleted_at')->orderBy('blogs.id', 'desc')->get();

        return view ('pages.blogs.reviewBlogslist',compact('users_blogs'));
    }

    function reviewedit($id)
    {

        $users_blogs = Blog::find($id);

        return view('pages.blogs.reviewBlogsedit',compact('users_blogs'));
    }


    public function reviewupdate(Request $request)
    {
        $id = $request->blog_id;

        $users_blogs = Blog::where('id',$id)->first();
        $users_blogs->title = $request->title;
        $users_blogs->category= $request->category;
        $users_blogs->description = $request->description;
        $users_blogs->review_comment = $request->review_comment;
        $users_blogs->highlightedText = $request->highlightedText;
        $users_blogs->status = 1;
        if($request->file('image')){
            $image  = $request->file('image');
            Storage::putFile('public/img/',$image);
            $users_blogs->image ="storage/img/".$image->hashName();
        }
        $users_blogs->save();


        return redirect()->route('admin.users_review_blogs.list')->with('success','Blog updated and published Successfully');
    }


    public function reviewapprove($id)
    {
        $reviewBlog = Blog::where('id', $id)->first();

        $reviewBlog->status = 1;


        $reviewBlog->save();

        $user_id =Auth::id();
        $user_all_data = Auth::user();


        $fetch_blog_title = $reviewBlog->title;
        //Notification Part
        $users = User::all();
        Notification::send($users,new confirmAuthorPost($user_all_data->name,$fetch_blog_title));

        return redirect()->route('admin.users_review_blogs.list')->with('success','Blog Approved Successfully');


    }

    public function ShowUsersBlogsCommentlist()
    {
        $users_blogs=DB::table('users')->join('blogs','blogs.user_id','users.id')->where('blogs.status',1)->whereNull('deleted_at')->whereNotNull('review_comment')->orderBy('blogs.id', 'desc')->get();

        return view ('pages.blogs.reviewBlogsCommentlist',compact('users_blogs'));
    }



    function userlist()
    {
        $users = DB::table('users')->where('user_type', 'user')->where('blog_access', 0)->get();

        return view ('pages.blogs.userlist',compact('users'));

    }


    public function makeBlogWriter($id)
    {

       $user = User::where('id', $id)->first();

       $user->blog_access =1;
       $user->save();

        return back();


    }


    public function writerlist()
    {
        $users = DB::table('users')->where('user_type', 'user')->where('blog_access', 1)->get();

        return view ('pages.blogs.writerlist',compact('users'));
    }


    public function removeBlogWriter($id)
    {
        $user = User::where('id', $id)->first();

        $user->blog_access =0;
        $user->save();
        return back();
    }
}
