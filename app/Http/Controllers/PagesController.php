<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class PagesController extends Controller
{
    // index page
    public function index()
    {

        $ll= Hash::make('123');
        return $ll;
        die();

        // Show All Blog Posts Show
        $blogs = DB::table('users')->join('blogs','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->orderBy('blogs.id', 'DESC')->paginate(30);

        $users_blogs =DB::table('users')->join('users_blogs','users_blogs.user_id','users.id')->where('users_blogs.status',1)->whereNull('deleted_at')->orderBy('users_blogs.id', 'DESC')->paginate(30);

        return view('pages.index',compact('blogs','users_blogs'));
    }

    public function individualAuthorBlogs($id)
    {

        $user_id = $id;
        $users_blogs_one = DB::table('users')->join('blogs','blogs.user_id','users.id')->where('blogs.user_id', $user_id)->where('blogs.status', 1)->orderBy('blogs.id', 'DESC')->get();
        $user = DB::table('users')->where('id', $user_id)->first();

        return view ('pages.author',[
          'users_blogs_one' => $users_blogs_one,
          'user'=> $user
        ]);

    }





    // public function blog(){
    //     // $recentposts=  Blog::latest()->limit(2)->get();
    //     $blogs = Blog::paginate(2);
    //     // $categories = Blog::orderBy('category','desc')->get();
    //     return view('pages.blog',compact('blogs'));

    // }


    //  function likePost(Request $request)
    // {
    //   $user= Auth::user();
    //   return $user;
    //   $likePost = $user->likedPosts()->where('post_id',$request->blog_id)->count();
    //   if($likePost == 0)
    //   {
    //     $user->likedPosts()->attach($request->blog_id);
    //   }
    //   else{
    //     $user->likedPosts()->detach($request->blog_id);
    //   }
    //   return redirect()->back();
    // }



    public function allpost($id, $category){
        // SinglePost find
        $blogs = Blog::find($id);

        //blog author
        $user = DB::table('users')->where('id', $blogs->user_id)->first();


       // Count Comments Query
        $countComments = DB::table('comments')->where('post_id', $id)->get()->count();



        // Related Posts Show
        $relatedposts= Blog::where('category',"=", $category)->take(3)->where('status', 1)->get();
        // Related Posts Show




        // Travel Category Post Count //
        $categorytravelCount= Blog::where('category',"=","travel")->get()->count();
        // Travel Category Post Count //

        // Travel Category Post Count //
        $categorystartupsCount= Blog::where('category',"=","startups")->get()->count();
        // Travel Category Post Count //




        // Health Category Post Count //
        $categoryhealthCount= Blog::where('category',"=","health")->get()->count();
        // Health Category Post Count //




        // Law Category Post Count
        $categorylawCount= Blog::where('category',"=","law")->get()->count();
        // Law Category Post Count




        // Lifestyle Category Post Count
        $categorylifestyleCount= Blog::where('category',"=","lifestyle")->get()->count();
        // Lifestyle Category Post Count




        // Review Category Post Count
        $categoryreviewCount= Blog::where('category',"=","review")->get()->count();
        // Review Category Post Count




        // howto Category Post Count
        $categoryhowtoCount= Blog::where('category',"=","howto")->get()->count();
        // howto Category Post Count




        // BrandStories Category Post Count
        $categorybrandstoriesCount= Blog::where('category',"=","brandstories")->get()->count();
        // BrandStories Category Post Count




        // Food Category Post Count
        $categoryfoodCount= Blog::where('category',"=","food")->get()->count();
        // Food Category Post Count




        // Career Category Post Count
        $categorycareerCount= Blog::where('category',"=","career")->get()->count();
        // Career Category Post Count




        // Education Category Post Count
        $categoryeducationCount= Blog::where('category',"=","education")->get()->count();
        // Education Category Post Count

        $user_detail= DB::table('users')->join('comments','users.id','comments.user_id')->get();
        $comments = DB::table('comments')->where('post_id', $id)->get();

        return view('pages.blog_category_pages.post',compact('blogs','relatedposts','categorytravelCount','categoryhealthCount',
        'categorylawCount','categorylifestyleCount','categoryreviewCount','categoryhowtoCount','categorybrandstoriesCount','categoryfoodCount',
        'categorycareerCount','categoryeducationCount','categorystartupsCount','comments','user_detail','countComments','user'));

    }


    // Here we show Startups
    public function startups()
    {

               // Travel Category Post Count //
               $categorytravelCount= Blog::where('category',"=","travel")->where('status', 1)->get()->count();
               // Travel Category Post Count //

              // Related Posts Show
              $relatedposts= Blog::latest()->limit(5)->where('status', 1)->get();
              // Related Posts Show


              // Travel Category Post Count //
               $categorystartupsCount= Blog::where('category',"=","startups")->where('status', 1)->get()->count();
              // Travel Category Post Count //

               // Health Category Post Count //
               $categoryhealthCount= Blog::where('category',"=","health")->where('status', 1)->get()->count();
               // Health Category Post Count //




               // Law Category Post Count
               $categorylawCount= Blog::where('category',"=","law")->where('status', 1)->get()->count();
               // Law Category Post Count




               // Lifestyle Category Post Count
               $categorylifestyleCount= Blog::where('category',"=","lifestyle")->where('status', 1)->get()->count();
               // Lifestyle Category Post Count




               // Review Category Post Count
               $categoryreviewCount= Blog::where('category',"=","review")->where('status', 1)->get()->count();
               // Review Category Post Count




               // howto Category Post Count
               $categoryhowtoCount= Blog::where('category',"=","howto")->where('status', 1)->get()->count();
               // howto Category Post Count




               // BrandStories Category Post Count
               $categorybrandstoriesCount= Blog::where('category',"=","brandstories")->where('status', 1)->get()->count();
               // BrandStories Category Post Count




               // Food Category Post Count
               $categoryfoodCount= Blog::where('category',"=","food")->where('status', 1)->get()->count();
               // Food Category Post Count




               // Career Category Post Count
               $categorycareerCount= Blog::where('category',"=","career")->where('status', 1)->get()->count();
               // Career Category Post Count


               $user_information = DB::table('blogs')->join('users','blogs.user_id','users.id')->where('blogs.status', 1)->get();

               // Education Category Post Count
               $categoryeducationCount= Blog::where('category',"=","education")->where('status', 1)->get()->count();
               // Education Category Post Count

      $blogs_startups =DB::table('users')->join('blogs','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','startups')->orderBy('blogs.id', 'DESC')->paginate(30);

      return view('pages.blog_category_pages.startup',compact('blogs_startups','relatedposts','categorytravelCount','categoryhealthCount',
      'categorylawCount','categorylifestyleCount','categoryreviewCount','categoryhowtoCount','categorybrandstoriesCount','categoryfoodCount',
      'categorycareerCount','categoryeducationCount','categorystartupsCount','user_information'));
    }

    // Here we show health
    public function health()
    {
              // Related Posts Show
               $relatedposts= Blog::latest()->limit(5)->where('status', 1)->get();
              // Related Posts Show



              // Travel Category Post Count //
              $categorytravelCount= Blog::where('category',"=","travel")->where('status', 1)->get()->count();
              // Travel Category Post Count //


              // Startups Category Post Count //
                $categorystartupsCount= Blog::where('category',"=","startups")->where('status', 1)->get()->count();
              // Startups Category Post Count //


              // Health Category Post Count //
              $categoryhealthCount= Blog::where('category',"=","health")->where('status', 1)->get()->count();
              // Health Category Post Count //




              // Law Category Post Count
              $categorylawCount= Blog::where('category',"=","law")->where('status', 1)->get()->count();
              // Law Category Post Count




              // Lifestyle Category Post Count
              $categorylifestyleCount= Blog::where('category',"=","lifestyle")->where('status', 1)->get()->count();
              // Lifestyle Category Post Count




              // Review Category Post Count
              $categoryreviewCount= Blog::where('category',"=","review")->where('status', 1)->get()->count();
              // Review Category Post Count




              // howto Category Post Count
              $categoryhowtoCount= Blog::where('category',"=","howto")->where('status', 1)->get()->count();
              // howto Category Post Count




              // BrandStories Category Post Count
              $categorybrandstoriesCount= Blog::where('category',"=","brandstories")->where('status', 1)->get()->count();
              // BrandStories Category Post Count




              // Food Category Post Count
              $categoryfoodCount= Blog::where('category',"=","food")->where('status', 1)->get()->count();
              // Food Category Post Count




              // Career Category Post Count
              $categorycareerCount= Blog::where('category',"=","career")->where('status', 1)->get()->count();
              // Career Category Post Count




              // Education Category Post Count
              $categoryeducationCount= Blog::where('category',"=","education")->where('status', 1)->get()->count();
              // Education Category Post Count

              $user_information = DB::table('blogs')->join('users','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','health')->orderBy('blogs.id', 'DESC')->get();


      $blogs_health = DB::table('users')->join('blogs','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','health')->orderBy('blogs.id', 'DESC')->paginate(30);
      return view('pages.blog_category_pages.health',compact('blogs_health','relatedposts','categorytravelCount','categoryhealthCount',
      'categorylawCount','categorylifestyleCount','categoryreviewCount','categoryhowtoCount','categorybrandstoriesCount','categoryfoodCount',
      'categorycareerCount','categoryeducationCount','categorystartupsCount','user_information'));
    }

    // Here we show Law
    public function law()
    {
              // Travel Category Post Count //
              $categorytravelCount= Blog::where('category',"=","travel")->where('status', 1)->get()->count();
              // Travel Category Post Count //


              // Startups Category Post Count //
               $categorystartupsCount= Blog::where('category',"=","startups")->where('status', 1)->get()->count();
              // Travel Category Post Count //


              // Startups Category Post Count //
              $categoryhealthCount= Blog::where('category',"=","health")->where('status', 1)->get()->count();
              // Startups Category Post Count //




              // Law Category Post Count
              $categorylawCount= Blog::where('category',"=","law")->where('status', 1)->get()->count();
              // Law Category Post Count




              // Lifestyle Category Post Count
              $categorylifestyleCount= Blog::where('category',"=","lifestyle")->where('status', 1)->get()->count();
              // Lifestyle Category Post Count




              // Review Category Post Count
              $categoryreviewCount= Blog::where('category',"=","review")->where('status', 1)->get()->count();
              // Review Category Post Count




              // howto Category Post Count
              $categoryhowtoCount= Blog::where('category',"=","howto")->where('status', 1)->get()->count();
              // howto Category Post Count




              // BrandStories Category Post Count
              $categorybrandstoriesCount= Blog::where('category',"=","brandstories")->where('status', 1)->get()->count();
              // BrandStories Category Post Count




              // Food Category Post Count
              $categoryfoodCount= Blog::where('category',"=","food")->where('status', 1)->get()->count();
              // Food Category Post Count




              // Career Category Post Count
              $categorycareerCount= Blog::where('category',"=","career")->where('status', 1)->get()->count();
              // Career Category Post Count


              $user_information = DB::table('blogs')->join('users','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','health')->orderBy('blogs.id', 'DESC')->get();

              // Education Category Post Count
              $categoryeducationCount= Blog::where('category',"=","education")->where('status', 1)->get()->count();
              // Education Category Post Count

    // Related Posts Show
       $relatedposts= Blog::latest()->where('status', 1)->limit(5)->get();
    // Related Posts Show

      $blogs_law = DB::table('users')->join('blogs','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','law')->orderBy('blogs.id', 'DESC')->paginate(30);
      return view('pages.blog_category_pages.law',compact('blogs_law','relatedposts','categorytravelCount','categoryhealthCount',
      'categorylawCount','categorylifestyleCount','categoryreviewCount','categoryhowtoCount','categorybrandstoriesCount','categoryfoodCount',
      'categorycareerCount','categoryeducationCount','categorystartupsCount','user_information'));
    }


    // Here we show lifestyle
    public function lifestyle()
    {

             // Travel Category Post Count //
             $categorytravelCount= Blog::where('category',"=","travel")->where('status', 1)->get()->count();
            // Travel Category Post Count //

             // Related Posts Show
             $relatedposts= Blog::latest()->limit(5)->where('status', 1)->get();
             // Related Posts Show


             // Startups Category Post Count //
             $categorystartupsCount= Blog::where('category',"=","startups")->where('status', 1)->get()->count();
             // Startups Category Post Count //


              // Health Category Post Count //
              $categoryhealthCount= Blog::where('category',"=","health")->where('status', 1)->get()->count();
              // Health Category Post Count //




              // Law Category Post Count
              $categorylawCount= Blog::where('category',"=","law")->where('status', 1)->get()->count();
              // Law Category Post Count




              // Lifestyle Category Post Count
              $categorylifestyleCount= Blog::where('category',"=","lifestyle")->where('status', 1)->get()->count();
              // Lifestyle Category Post Count




              // Review Category Post Count
              $categoryreviewCount= Blog::where('category',"=","review")->where('status', 1)->get()->count();
              // Review Category Post Count




              // howto Category Post Count
              $categoryhowtoCount= Blog::where('category',"=","howto")->where('status', 1)->get()->count();
              // howto Category Post Count




              // BrandStories Category Post Count
              $categorybrandstoriesCount= Blog::where('category',"=","brandstories")->where('status', 1)->get()->count();
              // BrandStories Category Post Count




              // Food Category Post Count
              $categoryfoodCount= Blog::where('category',"=","food")->where('status', 1)->get()->count();
              // Food Category Post Count




              // Career Category Post Count
              $categorycareerCount= Blog::where('category',"=","career")->where('status', 1)->get()->count();
              // Career Category Post Count


              $user_information = DB::table('blogs')->join('users','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','health')->orderBy('blogs.id', 'DESC')->get();

              // Education Category Post Count
              $categoryeducationCount= Blog::where('category',"=","education")->where('status', 1)->get()->count();
              // Education Category Post Count


      $blogs_lifestyle = DB::table('users')->join('blogs','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','lifestyle')->orderBy('blogs.id', 'DESC')->paginate(30);
      return view('pages.blog_category_pages.lifestyle',compact('blogs_lifestyle','relatedposts','categorytravelCount','categoryhealthCount',
      'categorylawCount','categorylifestyleCount','categoryreviewCount','categoryhowtoCount','categorybrandstoriesCount','categoryfoodCount',
      'categorycareerCount','categoryeducationCount','categorystartupsCount','user_information'));
    }

    // Here we show review
    public function review()
    {
              // Travel Category Post Count //
              $categorytravelCount= Blog::where('category',"=","travel")->where('status', 1)->get()->count();
              // Travel Category Post Count //

             // Related Posts Show
               $relatedposts= Blog::latest()->limit(5)->where('status', 1)->get();
             // Related Posts Show

             // Startups Category Post Count //
                $categorystartupsCount= Blog::where('category',"=","startups")->where('status', 1)->get()->count();
             // Startups Category Post Count //


              // Health Category Post Count //
              $categoryhealthCount= Blog::where('category',"=","health")->where('status', 1)->get()->count();
              // Health Category Post Count //




              // Law Category Post Count
              $categorylawCount= Blog::where('category',"=","law")->where('status', 1)->get()->count();
              // Law Category Post Count




              // Lifestyle Category Post Count
              $categorylifestyleCount= Blog::where('category',"=","lifestyle")->where('status', 1)->get()->count();
              // Lifestyle Category Post Count




              // Review Category Post Count
              $categoryreviewCount= Blog::where('category',"=","review")->where('status', 1)->get()->count();
              // Review Category Post Count




              // howto Category Post Count
              $categoryhowtoCount= Blog::where('category',"=","howto")->where('status', 1)->get()->count();
              // howto Category Post Count




              // BrandStories Category Post Count
              $categorybrandstoriesCount= Blog::where('category',"=","brandstories")->where('status', 1)->get()->count();
              // BrandStories Category Post Count




              // Food Category Post Count
              $categoryfoodCount= Blog::where('category',"=","food")->where('status', 1)->get()->count();
              // Food Category Post Count




              // Career Category Post Count
              $categorycareerCount= Blog::where('category',"=","career")->where('status', 1)->get()->count();
              // Career Category Post Count

              $user_information = DB::table('blogs')->join('users','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','health')->orderBy('blogs.id', 'DESC')->get();


              // Education Category Post Count
              $categoryeducationCount= Blog::where('category',"=","education")->where('status', 1)->get()->count();
              // Education Category Post Count


      $blogs_review = DB::table('users')->join('blogs','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','review')->orderBy('blogs.id', 'DESC')->paginate(30);
      return view('pages.blog_category_pages.review',compact('blogs_review','relatedposts','categorytravelCount','categoryhealthCount',
      'categorylawCount','categorylifestyleCount','categoryreviewCount','categoryhowtoCount','categorybrandstoriesCount','categoryfoodCount',
      'categorycareerCount','categoryeducationCount','categorystartupsCount','user_information'));
    }

    // Here we show howto
    public function howto()
    {
              // Travel Category Post Count //
              $categorytravelCount= Blog::where('category',"=","travel")->where('status', 1)->get()->count();
              // Travel Category Post Count //

              // Related Posts Show
               $relatedposts= Blog::latest()->limit(5)->where('status', 1)->get();
               // Related Posts Show

            // Travel Category Post Count //
              $categorystartupsCount= Blog::where('category',"=","startups")->where('status', 1)->get()->count();
            // Travel Category Post Count //



              // Health Category Post Count //
              $categoryhealthCount= Blog::where('category',"=","health")->where('status', 1)->get()->count();
              // Health Category Post Count //




              // Law Category Post Count
              $categorylawCount= Blog::where('category',"=","law")->where('status', 1)->get()->count();
              // Law Category Post Count




              // Lifestyle Category Post Count
              $categorylifestyleCount= Blog::where('category',"=","lifestyle")->where('status', 1)->get()->count();
              // Lifestyle Category Post Count




              // Review Category Post Count
              $categoryreviewCount= Blog::where('category',"=","review")->where('status', 1)->get()->count();
              // Review Category Post Count




              // howto Category Post Count
              $categoryhowtoCount= Blog::where('category',"=","howto")->where('status', 1)->get()->count();
              // howto Category Post Count




              // BrandStories Category Post Count
              $categorybrandstoriesCount= Blog::where('category',"=","brandstories")->where('status', 1)->get()->count();
              // BrandStories Category Post Count




              // Food Category Post Count
              $categoryfoodCount= Blog::where('category',"=","food")->where('status', 1)->get()->count();
              // Food Category Post Count




              // Career Category Post Count
              $categorycareerCount= Blog::where('category',"=","career")->where('status', 1)->get()->count();
              // Career Category Post Count


              $user_information = DB::table('blogs')->join('users','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','health')->orderBy('blogs.id', 'DESC')->get();

              // Education Category Post Count
              $categoryeducationCount= Blog::where('category',"=","education")->where('status', 1)->get()->count();
              // Education Category Post Count


      $blogs_howto = DB::table('users')->join('blogs','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','howto')->orderBy('blogs.id', 'DESC')->paginate(30);
      return view('pages.blog_category_pages.howto',compact('blogs_howto','relatedposts','categorytravelCount','categoryhealthCount',
      'categorylawCount','categorylifestyleCount','categoryreviewCount','categoryhowtoCount','categorybrandstoriesCount','categoryfoodCount',
      'categorycareerCount','categoryeducationCount','categorystartupsCount','user_information'));
    }

    // Here we show religion
    public function brandstories()
    {
              // Travel Category Post Count //
              $categorytravelCount= Blog::where('category',"=","travel")->where('status', 1)->get()->count();
              // Travel Category Post Count //


               // Related Posts Show
               $relatedposts= Blog::latest()->limit(5)->where('status', 1)->get();
               // Related Posts Show

              // Startup Category Post Count //
              $categorystartupsCount= Blog::where('category',"=","startups")->where('status', 1)->get()->count();
              // Startup Category Post Count //




              // Health Category Post Count //
              $categoryhealthCount= Blog::where('category',"=","health")->where('status', 1)->get()->count();
              // Health Category Post Count //




              // Law Category Post Count
              $categorylawCount= Blog::where('category',"=","law")->where('status', 1)->get()->count();
              // Law Category Post Count




              // Lifestyle Category Post Count
              $categorylifestyleCount= Blog::where('category',"=","lifestyle")->where('status', 1)->get()->count();
              // Lifestyle Category Post Count




              // Review Category Post Count
              $categoryreviewCount= Blog::where('category',"=","review")->where('status', 1)->get()->count();
              // Review Category Post Count




              // howto Category Post Count
              $categoryhowtoCount= Blog::where('category',"=","howto")->where('status', 1)->get()->count();
              // howto Category Post Count




              // BrandStories Category Post Count
              $categorybrandstoriesCount= Blog::where('category',"=","brandstories")->where('status', 1)->get()->count();
              // BrandStories Category Post Count




              // Food Category Post Count
              $categoryfoodCount= Blog::where('category',"=","food")->where('status', 1)->get()->count();
              // Food Category Post Count




              // Career Category Post Count
              $categorycareerCount= Blog::where('category',"=","career")->where('status', 1)->get()->count();
              // Career Category Post Count


              $user_information = DB::table('blogs')->join('users','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','brandstories')->orderBy('blogs.id', 'DESC')->get();

              // Education Category Post Count
              $categoryeducationCount= Blog::where('category',"=","education")->where('status', 1)->get()->count();
              // Education Category Post Count


      $blogs_brandstories = DB::table('users')->join('blogs','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','brandstories')->orderBy('blogs.id', 'DESC')->paginate(30);
      return view('pages.blog_category_pages.brandstories',compact('blogs_brandstories','relatedposts','categorytravelCount','categoryhealthCount',
      'categorylawCount','categorylifestyleCount','categoryreviewCount','categoryhowtoCount','categorybrandstoriesCount','categoryfoodCount',
      'categorycareerCount','categoryeducationCount','categorystartupsCount','user_information'));
    }

    // Here we show food
    public function food()
    {
              // Travel Category Post Count //
              $categorytravelCount= Blog::where('category',"=","travel")->where('status', 1)->get()->count();
              // Travel Category Post Count //



               // Related Posts Show
               $relatedposts= Blog::latest()->limit(5)->where('status', 1)->get();
               // Related Posts Show

              // Startup Category Post Count //
              $categorystartupsCount= Blog::where('category',"=","startups")->where('status', 1)->get()->count();
              // Startup Category Post Count //




              // Health Category Post Count //
              $categoryhealthCount= Blog::where('category',"=","health")->where('status', 1)->get()->count();
              // Health Category Post Count //




              // Law Category Post Count
              $categorylawCount= Blog::where('category',"=","law")->where('status', 1)->get()->count();
              // Law Category Post Count




              // Lifestyle Category Post Count
              $categorylifestyleCount= Blog::where('category',"=","lifestyle")->where('status', 1)->get()->count();
              // Lifestyle Category Post Count




              // Review Category Post Count
              $categoryreviewCount= Blog::where('category',"=","review")->where('status', 1)->get()->count();
              // Review Category Post Count




              // howto Category Post Count
              $categoryhowtoCount= Blog::where('category',"=","howto")->where('status', 1)->get()->count();
              // howto Category Post Count




              // BrandStories Category Post Count
              $categorybrandstoriesCount= Blog::where('category',"=","brandstories")->where('status', 1)->get()->count();
              // BrandStories Category Post Count




              // Food Category Post Count
              $categoryfoodCount= Blog::where('category',"=","food")->get()->where('status', 1)->count();
              // Food Category Post Count




              // Career Category Post Count
              $categorycareerCount= Blog::where('category',"=","career")->where('status', 1)->get()->count();
              // Career Category Post Count


              //$user_information = DB::table('blogs')->join('users','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','food')->orderBy('blogs.id', 'DESC')->get();

              $user_information = DB::table('blogs')->join('users','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','brandstories')->orderBy('blogs.id', 'DESC')->get();

              // Education Category Post Count
              $categoryeducationCount= Blog::where('category',"=","education")->where('status', 1)->get()->count();
              // Education Category Post Count


       $blogs_food = DB::table('users')->join('blogs','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','food')->orderBy('blogs.id', 'DESC')->paginate(30);
       return view('pages.blog_category_pages.food',compact('blogs_food','relatedposts','categorytravelCount','categoryhealthCount',
       'categorylawCount','categorylifestyleCount','categoryreviewCount','categoryhowtoCount','categorybrandstoriesCount','categoryfoodCount',
       'categorycareerCount','categoryeducationCount','categorystartupsCount','user_information'));


    }


    // Here we show travel
    public function travel()
    {
              // Travel Category Post Count //
              $categorytravelCount= Blog::where('category',"=","travel")->where('status', 1)->get()->count();
              // Travel Category Post Count //


               // Related Posts Show
               $relatedposts= Blog::latest()->limit(5)->where('status', 1)->get();
               // Related Posts Show

              // Startup Category Post Count //
              $categorystartupsCount= Blog::where('category',"=","startups")->where('status', 1)->get()->count();
              // Startup Category Post Count //





              // Health Category Post Count //
              $categoryhealthCount= Blog::where('category',"=","health")->where('status', 1)->get()->count();
              // Health Category Post Count //




              // Law Category Post Count
              $categorylawCount= Blog::where('category',"=","law")->where('status', 1)->get()->count();
              // Law Category Post Count




              // Lifestyle Category Post Count
              $categorylifestyleCount= Blog::where('category',"=","lifestyle")->where('status', 1)->get()->count();
              // Lifestyle Category Post Count




              // Review Category Post Count
              $categoryreviewCount= Blog::where('category',"=","review")->where('status', 1)->get()->count();
              // Review Category Post Count




              // howto Category Post Count
              $categoryhowtoCount= Blog::where('category',"=","howto")->where('status', 1)->get()->count();
              // howto Category Post Count




              // BrandStories Category Post Count
              $categorybrandstoriesCount= Blog::where('category',"=","brandstories")->where('status', 1)->get()->count();
              // BrandStories Category Post Count




              // Food Category Post Count
              $categoryfoodCount= Blog::where('category',"=","food")->where('status', 1)->get()->count();
              // Food Category Post Count




              // Career Category Post Count
              $categorycareerCount= Blog::where('category',"=","career")->where('status', 1)->get()->count();
              // Career Category Post Count


              $user_information = DB::table('blogs')->join('users','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','health')->orderBy('blogs.id', 'DESC')->get();

              // Education Category Post Count
              $categoryeducationCount= Blog::where('category',"=","education")->where('status', 1)->get()->count();
              // Education Category Post Count


      $blogs_travel = DB::table('users')->join('blogs','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','travel')->orderBy('blogs.id', 'DESC')->paginate(30);
      return view('pages.blog_category_pages.travel',compact('blogs_travel','relatedposts','categorytravelCount','categoryhealthCount',
      'categorylawCount','categorylifestyleCount','categoryreviewCount','categoryhowtoCount','categorybrandstoriesCount','categoryfoodCount',
      'categorycareerCount','categoryeducationCount','categorystartupsCount','user_information'));
    }

    // Here we show career
    public function career()
    {
                // Travel Category Post Count //
                 $categorytravelCount= Blog::where('category',"=","travel")->where('status', 1)->get()->count();
                // Travel Category Post Count //

                 // Related Posts Show
                 $relatedposts= Blog::latest()->limit(5)->where('status', 1)->get();
                 // Related Posts Show

                // Startup Category Post Count //
                $categorystartupsCount= Blog::where('category',"=","startups")->where('status', 1)->get()->count();
                // Startup Category Post Count //




              // Health Category Post Count //
              $categoryhealthCount= Blog::where('category',"=","health")->where('status', 1)->get()->count();
              // Health Category Post Count //




              // Law Category Post Count
              $categorylawCount= Blog::where('category',"=","law")->where('status', 1)->get()->count();
              // Law Category Post Count




              // Lifestyle Category Post Count
              $categorylifestyleCount= Blog::where('category',"=","lifestyle")->where('status', 1)->get()->count();
              // Lifestyle Category Post Count




              // Review Category Post Count
              $categoryreviewCount= Blog::where('category',"=","review")->where('status', 1)->get()->count();
              // Review Category Post Count




              // howto Category Post Count
              $categoryhowtoCount= Blog::where('category',"=","howto")->where('status', 1)->get()->count();
              // howto Category Post Count




              // BrandStories Category Post Count
              $categorybrandstoriesCount= Blog::where('category',"=","brandstories")->where('status', 1)->get()->count();
              // BrandStories Category Post Count




              // Food Category Post Count
              $categoryfoodCount= Blog::where('category',"=","food")->where('status', 1)->get()->count();
              // Food Category Post Count




              // Career Category Post Count
              $categorycareerCount= Blog::where('category',"=","career")->where('status', 1)->get()->count();
              // Career Category Post Count

              $user_information = DB::table('blogs')->join('users','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','health')->orderBy('blogs.id', 'DESC')->get();


              // Education Category Post Count
              $categoryeducationCount= Blog::where('category',"=","education")->where('status', 1)->get()->count();
              // Education Category Post Count


      $blogs_career = DB::table('users')->join('blogs','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','career')->orderBy('blogs.id', 'DESC')->paginate(30);
      return view('pages.blog_category_pages.career',compact('blogs_career','relatedposts','categorytravelCount','categoryhealthCount',
      'categorylawCount','categorylifestyleCount','categoryreviewCount','categoryhowtoCount','categorybrandstoriesCount','categoryfoodCount',
      'categorycareerCount','categoryeducationCount','categorystartupsCount','user_information'));
    }

    // Here we show sports
    public function education()
    {
               // Travel Category Post Count //
               $categorytravelCount= Blog::where('category',"=","travel")->where('status', 1)->get()->count();
               // Travel Category Post Count //


              // Related Posts Show
              $relatedposts= Blog::latest()->limit(5)->where('status', 1)->get();
              // Related Posts Show


             // Startup Category Post Count //
              $categorystartupsCount= Blog::where('category',"=","startups")->where('status', 1)->get()->count();
             // Startup Category Post Count //

              // Health Category Post Count //
              $categoryhealthCount= Blog::where('category',"=","health")->where('status', 1)->get()->count();
              // Health Category Post Count //




              // Law Category Post Count
              $categorylawCount= Blog::where('category',"=","law")->where('status', 1)->get()->count();
              // Law Category Post Count




              // Lifestyle Category Post Count
              $categorylifestyleCount= Blog::where('category',"=","lifestyle")->where('status', 1)->get()->count();
              // Lifestyle Category Post Count




              // Review Category Post Count
              $categoryreviewCount= Blog::where('category',"=","review")->where('status', 1)->get()->count();
              // Review Category Post Count




              // howto Category Post Count
              $categoryhowtoCount= Blog::where('category',"=","howto")->where('status', 1)->get()->count();
              // howto Category Post Count




              // BrandStories Category Post Count
              $categorybrandstoriesCount= Blog::where('category',"=","brandstories")->where('status', 1)->get()->count();
              // BrandStories Category Post Count




              // Food Category Post Count
              $categoryfoodCount= Blog::where('category',"=","food")->where('status', 1)->get()->count();
              // Food Category Post Count




              // Career Category Post Count
              $categorycareerCount= Blog::where('category',"=","career")->where('status', 1)->get()->count();
              // Career Category Post Count

              $user_information = DB::table('blogs')->join('users','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','health')->orderBy('blogs.id', 'DESC')->get();


              // Education Category Post Count
              $categoryeducationCount= Blog::where('category',"=","education")->where('status', 1)->get()->count();
              // Education Category Post Count


      $blogs_education =  DB::table('users')->join('blogs','blogs.user_id','users.id')->whereNull('deleted_at')->where('status', 1)->where('category','education')->orderBy('blogs.id', 'DESC')->paginate(30);

      return view('pages.blog_category_pages.education',compact('blogs_education','relatedposts','categorytravelCount','categoryhealthCount',
      'categorylawCount','categorylifestyleCount','categoryreviewCount','categoryhowtoCount','categorybrandstoriesCount','categoryfoodCount',
      'categorycareerCount','categoryeducationCount','categorystartupsCount','user_information'));
    }


    public function contact()
    {
      return view('pages.contact');
    }

    public function aboutUs()
    {
      $aboutDetails = AboutUs::where('id',1)->first();
      return view('pages.about',compact('aboutDetails'));
    }

    public function termsConditions()
    {
      $termsConditions = TermsConditions::where('id',1)->first();
      return view('pages.termsConditions',compact('termsConditions'));
    }


    public function privacyPolicies()
    {
      $privacyPolicies = PrivacyPolicy::where('id',1)->first();
      return view('pages.privacyPolicies',compact('privacyPolicies'));
    }


}
