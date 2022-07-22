<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Blog;
use App\Slider;
use DB;
use App\CommentReply;
use App\User;
use App\Comment;
use App\UsersBlog;
use App\AboutUs;
use App\TermsConditions;
use App\PrivacyPolicy;

class HomeController extends Controller
{
    //



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function dashboard()
    {

        $user = Auth::user();
        if($user->user_type == 'admin')
        {
            // Total Users
            $total_Users =DB::table('users')->where('user_type','user')->get()->count();

            // Total Blogs Accepted
            $total_blogs_accepted =DB::table('blogs')->where('status',1)->whereNull('deleted_at')->get()->count();

            // Total Blogs pending
            $total_blogs_pending =DB::table('blogs')->where('status',0)->whereNull('deleted_at')->get()->count();

            // Total Comment
            $total_comments =DB::table('comments')->get()->count();

            // Total Contacts
            $total_contacts =DB::table('contacts')->get()->count();

            // Total Subscribers
            $total_subscribers =DB::table('subscribers')->get()->count();

            // Total Sliders
            $total_sliders =DB::table('sliders')->get()->count();

            // Total Comment
            $total_writers =DB::table('users')->where('blog_access',1)->get()->count();

            // Total Comment
            $total_channel_names =DB::table('users')->whereNotNull('channel_name')->get()->count();

            return view('pages.dashboard',compact('total_Users','total_blogs_accepted','total_blogs_pending','total_comments','total_contacts','total_subscribers','total_sliders','total_writers','total_channel_names'));
        }
        else{
            return view('pages.404NotFound');
        }
    }

    public function User_dashboard()
    {
        $user = Auth::user();
        $total_users = User::all()->count();
        $total_blogs = Blog::where('user_id', $user->id)->count();
        $accepted_blogs = Blog::where('user_id', $user->id)->where('status', 1)->count();
        $pending_blogs = Blog::where('user_id', $user->id)->where('status', 0)->count();
        if($user->user_type == 'user')
        {
            return view('pages.User_dashboard',compact('total_blogs','total_users','accepted_blogs','pending_blogs'));
        }
        else{
            return view('pages.404NotFound');
        }

    }


    public function index()
    {
        return view('pages.dashboard');
    }
    public function markNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }


}
