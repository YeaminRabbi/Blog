<?php

use Illuminate\Support\Facades\Route;
use App\Listeners\SendNewUserNotification;



Route::get('/', 'App\Http\Controllers\PagesController@index')->name('homepage');

Route::get('/home',function(){
  return redirect()->route('homepage');
})->middleware(['auth']);


Route::prefix('admin')->group(function(){
    Route::get('/dashboard', 'App\Http\Controllers\HomeController@dashboard')->name('admin.dashboard');

    Route::post('/mark-as-read', 'HomeController@markNotification')->name('markNotification');
    // These are slider routes
    Route::get('/sliders/create', 'App\Http\Controllers\SliderPagesController@create')->name('admin.sliders.create');
    Route::put('/sliders/create', 'App\Http\Controllers\SliderPagesController@store')->name('admin.sliders.store');
    Route::get('/sliders/list', 'App\Http\Controllers\SliderPagesController@list')->name('admin.sliders.list');
    Route::get('/sliders/edit/{id}', 'App\Http\Controllers\SliderPagesController@edit')->name('admin.sliders.edit');
    Route::post('/sliders/update/{id}', 'App\Http\Controllers\SliderPagesController@update')->name('admin.sliders.update');
    Route::delete('/sliders/destroy/{id}', 'App\Http\Controllers\SliderPagesController@destroy')->name('admin.sliders.destroy');
    // Restore Sliders Lists //
    Route::get('/sliders/restoreList', 'App\Http\Controllers\SliderPagesController@restoreList')->name('admin.sliders.restoreList');
    // Restore Sliders Lists //
    Route::get('/sliders/destroyList/{id}', 'App\Http\Controllers\SliderPagesController@restoreData')->name('admin.sliders.restoreData');







    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                      // Admin Blog Routes //
   /////////////////////////////////////////////////////////////////////////////////////////////////////////////





    // Admin Blog Create Route
    Route::get('/blogs/create', 'App\Http\Controllers\BlogPagesController@create')->name('admin.blogs.create');
    // Admin Blog Create Store Data Route
    Route::put('/blogs/create', 'App\Http\Controllers\BlogPagesController@store')->name('admin.blogs.store');
    // Admin Blog List Show Route
    Route::get('/blogs/list', 'App\Http\Controllers\BlogPagesController@list')->name('admin.blogs.list');
    // Admin Blog Edit Route
    Route::get('/blogs/edit/{id}', 'App\Http\Controllers\BlogPagesController@edit')->name('admin.blogs.edit');
    // Admin Blog Update Route By Using Blog id
    Route::post('/blogs/update/{id}', 'App\Http\Controllers\BlogPagesController@update')->name('admin.blogs.update');
    // Admin Blog Destroy Route By Using Blog id
    Route::delete('/blogs/destroy/{id}', 'App\Http\Controllers\BlogPagesController@destroy')->name('admin.blogs.destroy');
    // Admin Blog Restore Show List
    Route::get('/blogs/restoreList', 'App\Http\Controllers\BlogPagesController@restoreList')->name('admin.blogs.restoreList');
    // Admin Blog Restore Data
    Route::get('/blogs/destroyList/{id}', 'App\Http\Controllers\BlogPagesController@restoreData')->name('admin.blogs.restoreData');
    // Admin views all the users in the system
    Route::get('/blogs/users', 'App\Http\Controllers\BlogPagesController@userlist')->name('admin.allusers.list');
      // Admin making a User as a Writer
    Route::get('/makewriter/{id}', 'App\Http\Controllers\BlogPagesController@makeBlogWriter')->name('makeBlogWriter');
   // Admin viewing the writer list
   Route::get('/writerlist', 'App\Http\Controllers\BlogPagesController@writerlist')->name('writerlist');
   // Admin removing blog writer

   Route::get('/removeBlogWriter/{id}', 'App\Http\Controllers\BlogPagesController@removeBlogWriter')->name('removeBlogWriter');



     // User's Blogs Review Edit Using id. Admin Can Edit User's Blog //
     Route::get('/UsersblogsReview/edit/{id}', 'App\Http\Controllers\BlogPagesController@reviewedit')->name('admin.users_review_blogs.edit');
     // User's Blogs Review Update. Admin Can Update User's Blog //
     Route::post('/UsersblogsReview/update', 'App\Http\Controllers\BlogPagesController@reviewupdate')->name('admin.users_review_blogs.update');
     // User's Blogs Review List Show.Admin Can Show All the blogs of User's //
     Route::get('/UsersblogsReview/list', 'App\Http\Controllers\BlogPagesController@ShowUsersBlogslist')->name('admin.users_review_blogs.list');
     Route::get('/UsersblogsReview/approve/{id}', 'App\Http\Controllers\BlogPagesController@reviewapprove')->name('admin.users_review_blogs.approve');
     Route::get('/UsersblogsReview/comment_review_list', 'App\Http\Controllers\BlogPagesController@ShowUsersBlogsCommentlist')->name('admin.users_review_blogs.Commentlist');




    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                      // Admin Blog Routes End Here//
   /////////////////////////////////////////////////////////////////////////////////////////////////////////////



   Route::get('/subscribers/list', 'App\Http\Controllers\SubscriberPagesController@list')->name('admin.subscriber.list');
   Route::delete('/subscribers/destroy/{id}', 'App\Http\Controllers\SubscriberPagesController@destroy')->name('admin.subscriber.destroy');


   Route::get('/contact/list', 'App\Http\Controllers\ContactPagesController@list')->name('admin.contact.list');
    // These are aboutUs routes
    Route::get('/aboutUs/create', 'App\Http\Controllers\AboutUsPagesController@create')->name('admin.about.create');
    Route::put('/aboutUs/create', 'App\Http\Controllers\AboutUsPagesController@store')->name('admin.about.store');
    Route::get('/aboutUs/list', 'App\Http\Controllers\AboutUsPagesController@list')->name('admin.about.list');
    Route::get('/aboutUs/edit/{id}', 'App\Http\Controllers\AboutUsPagesController@edit')->name('admin.about.edit');
    Route::post('/aboutUs/update/{id}', 'App\Http\Controllers\AboutUsPagesController@update')->name('admin.about.update');
    Route::delete('/aboutUs/destroy/{id}', 'App\Http\Controllers\AboutUsPagesController@destroy')->name('admin.about.destroy');


      // These are TermsConditions routes
      Route::get('/Terms_Conditions/create', 'App\Http\Controllers\TermsConditionsPagesController@create')->name('admin.termsConditions.create');
      Route::put('/Terms_Conditions/create', 'App\Http\Controllers\TermsConditionsPagesController@store')->name('admin.termsConditions.store');
      Route::get('/Terms_Conditions/list', 'App\Http\Controllers\TermsConditionsPagesController@list')->name('admin.termsConditions.list');
      Route::get('/Terms_Conditions/edit/{id}', 'App\Http\Controllers\TermsConditionsPagesController@edit')->name('admin.termsConditions.edit');
      Route::post('/Terms_Conditions/update/{id}', 'App\Http\Controllers\TermsConditionsPagesController@update')->name('admin.termsConditions.update');
      Route::delete('/Terms_Conditions/destroy/{id}', 'App\Http\Controllers\TermsConditionsPagesController@destroy')->name('admin.termsConditions.destroy');

        // These are PrivacyPolicy routes
        Route::get('/PrivacyPolicy/create', 'App\Http\Controllers\PrivacyPolicyPagesController@create')->name('admin.privacy.create');
        Route::put('/PrivacyPolicy/create', 'App\Http\Controllers\PrivacyPolicyPagesController@store')->name('admin.privacy.store');
        Route::get('/PrivacyPolicy/list', 'App\Http\Controllers\PrivacyPolicyPagesController@list')->name('admin.privacy.list');
        Route::get('/PrivacyPolicy/edit/{id}', 'App\Http\Controllers\PrivacyPolicyPagesController@edit')->name('admin.privacy.edit');
        Route::post('/PrivacyPolicy/update/{id}', 'App\Http\Controllers\PrivacyPolicyPagesController@update')->name('admin.privacy.update');
        Route::delete('/PrivacyPolicy/destroy/{id}', 'App\Http\Controllers\PrivacyPolicyPagesController@destroy')->name('admin.privacy.destroy');


});


Route::post('subscriber','App\Http\Controllers\SubscriberPagesController@store')->name('subscriber.store');
Route::post('contact','App\Http\Controllers\ContactPagesController@store')->name('contact.store');


Route::get('login-with-github', 'App\Http\Controllers\SocialPagesController@loginWithGithub')->name('loginWithGithub');
Route::get('github-callback-url', 'App\Http\Controllers\SocialPagesController@GithubCallBack')->name('GithubCallBack');


Route::get('login-with-google', 'App\Http\Controllers\SocialPagesController@loginWithGoogle')->name('loginWithGoogle');
Route::get('callback-url', 'App\Http\Controllers\SocialPagesController@GoogleCallBack')->name('GoogleCallBack');


Route::get('login-with-linkedin', 'App\Http\Controllers\LinkedinPagesController@linkedinRedirect')->name('loginWithLinkedin');
Route::get('callback-url-linkedin', 'App\Http\Controllers\LinkedinPagesController@linkedinCallback')->name('LinkedinCallBack');


Route::get('login-with-facebook', 'App\Http\Controllers\SocialPagesController@loginWithFacebook')->name('loginWithFacebook');
// Auth::routes();

Route::get('/homeAdmin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Authentication Routes...
Route::get('/loginAdmin', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('loginadmin');
Route::post('/loginAdmin', 'App\Http\Controllers\Auth\LoginController@login')->name('loginadmin');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('/registerAdmin', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('registeradmin');
Route::post('registerAdmin', 'App\Http\Controllers\Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset');


// This is allpost Route Url Start
Route::get('/blog', 'App\Http\Controllers\PagesController@index')->name('blog');
// This is allpost Route Url End


// This is aboutus Route Url Start
Route::get('/about-us', 'App\Http\Controllers\PagesController@aboutUs')->name('about');
// This is aboutus Route Url End


// This is termsConditions Route Url Start
Route::get('/termsConditions', 'App\Http\Controllers\PagesController@termsConditions')->name('terms');
// This is termsConditions Route Url End

// This is termsConditions Route Url Start
Route::get('/privacyPolicies', 'App\Http\Controllers\PagesController@privacyPolicies')->name('privacyPolicies');
// This is termsConditions Route Url End



// This is singlepost Route Url Start
Route::get('/allpost/singlePost/{id}/{category}', 'App\Http\Controllers\PagesController@allpost')->name('allpost')->middleware(['auth']);
// Route::get('/allpost/singlePost/{id}/{category}', 'App\Http\Controllers\PagesController@allpost2')->name('allpost2');

// This is singlepost Route Url End





// This is startups Route Url Start
Route::get('/startups', 'App\Http\Controllers\PagesController@startups')->name('startups');
// This is startups Route Url End

// This is health Route Url Start
Route::get('/health', 'App\Http\Controllers\PagesController@health')->name('health');
// This is health Route Url End


// This is law Route Url Start
Route::get('/law', 'App\Http\Controllers\PagesController@law')->name('law');
// This is law Route Url End

// This is lifestyle Route Url Start
Route::get('/lifestyle', 'App\Http\Controllers\PagesController@lifestyle')->name('lifestyle');
// This is lifestyle Route Url End

// This is review Route Url Start
Route::get('/review', 'App\Http\Controllers\PagesController@review')->name('review');
// This is review Route Url End


// This is howto Route Url Start
Route::get('/howto', 'App\Http\Controllers\PagesController@howto')->name('howto');
// This is howto Route Url End

// This is brandstories Route Url Start
Route::get('/brandstories', 'App\Http\Controllers\PagesController@brandstories')->name('brandstories');
// This is brandstories Route Url End


// This is food Route Url Start
Route::get('/food', 'App\Http\Controllers\PagesController@food')->name('food');
// This is food Route Url End

// This is travel Route Url Start
Route::get('/travel', 'App\Http\Controllers\PagesController@travel')->name('travel');
// This is travel Route Url End


// This is career Route Url Start
Route::get('/career', 'App\Http\Controllers\PagesController@career')->name('career');
// This is career Route Url End

// This is education Route Url Start
Route::get('/education', 'App\Http\Controllers\PagesController@education')->name('education');
// This is education Route Url End

// This is Contact Route Url Start
Route::get('/contact', 'App\Http\Controllers\PagesController@contact')->name('contact');
// This is Contact Route Url End


// This is Contact Route Url Start
Route::get('/author/{id}', 'App\Http\Controllers\PagesController@individualAuthorBlogs')->name('individualAuthorBlogs');
// This is Contact Route Url End

// Comment Routes //
Route::get('/comments/list', 'App\Http\Controllers\CommentDeletePagesController@list')->name('admin.comment.list');
Route::delete('/comments/destroy/{id}', 'App\Http\Controllers\CommentDeletePagesController@destroy')->name('admin.comment.destroy');

Route::get('/commentsReply/list', 'App\Http\Controllers\CommentReplyDeletePagesController@list')->name('admin.commentreply.list');
Route::delete('/commentsReply/destroy/{id}', 'App\Http\Controllers\CommentReplyDeletePagesController@destroy')->name('admin.commentreply.destroy');
Route::post('/comment/{blogs}','App\Http\Controllers\CommentController@store')->name('comment.store');

Route::post('/comment-reply/{comment}','App\Http\Controllers\CommentReplyPagesController@store')->name('commentReply.store');

// This route is not working
Route::post('/like-post','PagesController@likePost')->name('post.like')->middleware('auth');



Route::prefix('user')->group(function(){
  Route::get('/dashboard', 'App\Http\Controllers\HomeController@User_dashboard')->name('user.dashboard')->middleware(['auth']);



    // These are Users blog routes
    Route::get('/User_blogs/create', 'App\Http\Controllers\UsersBlogPagesController@create')->name('users.users_blogs.create')->middleware(['auth']);
    Route::put('/User_blogs/create', 'App\Http\Controllers\UsersBlogPagesController@store')->name('users.users_blogs.store')->middleware(['auth']);
    Route::get('/User_blogs/list', 'App\Http\Controllers\UsersBlogPagesController@list')->name('users.users_blogs.list')->middleware(['auth']);
    Route::get('/User_blogs/edit/{id}', 'App\Http\Controllers\UsersBlogPagesController@edit')->name('users.users_blogs.edit')->middleware(['auth']);
    Route::post('/User_blogs/update/{id}', 'App\Http\Controllers\UsersBlogPagesController@update')->name('users.users_blogs.update')->middleware(['auth']);

    Route::get('/User_blogs/delete/{id}', 'App\Http\Controllers\UsersBlogPagesController@delete')->name('users.users_blogs.delete')->middleware(['auth']);
    Route::get('/User_blogs/list', 'App\Http\Controllers\UsersBlogPagesController@list')->name('users.users_blogs.list')->middleware(['auth']);
    Route::post('/User_blogs/userCreateChannelName', 'App\Http\Controllers\UsersBlogPagesController@userCreateChannelName')->name('userCreateChannelName')->middleware(['auth']);
    Route::post('/User_blogs/userCreateChannelNameUpdate', 'App\Http\Controllers\UsersBlogPagesController@userCreateChannelNameUpdate')->name('userCreateChannelNameUpdate')->middleware(['auth']);


    Route::get('/User_blogs/Comment_review_list', 'App\Http\Controllers\UsersBlogPagesController@ReviewCommentlist')->name('users.users_blogs.review')->middleware(['auth']);
    Route::get('/User_blogs/channel', 'App\Http\Controllers\UsersBlogPagesController@userChannelName')->name('userChannelName')->middleware(['auth']);
});

