<?php

namespace App\Http\Controllers;

use App\Mail\ArticleLinkSendToFriend;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LandingPageController extends Controller
{
    public function index()
    {
        $blogs = Post::whereIsactive(1)->latest()->limit(3)->get();

        return view('welcome',compact('blogs'));
    }

    public function viewitem(Post $post)
    {
        $post->increment('postcount');

        $related_posts = $post->relatedPost()->orderBy('id', 'desc')->take(3)->get(['title','category_id','slug','body']);

        return view('pages.landing-post-view-page',compact('post','related_posts'));
    }

    public function latestpost()
    {
        return view('pages.landing-post-lists');
    }

    public function articles_by_category()
    {
        return view('pages.landing-list-of-category');
    }

    public function articles_by_tag()
    {
        return view('pages.landing-list-of-tag');

    }

    public function article_shares_to_friend(Request $request)
    {
        $validatedData = $request->validate([
            'post_sender_email' => ['required','email'],
            'post_receiver_email' => ['required','email'],
        ]);
        // dd($request->url());
        $getArticleURL = $request->currentPageURL;

        Mail::to($validatedData['post_receiver_email'])->send(new ArticleLinkSendToFriend($getArticleURL));

        return redirect()->back()->withMessage('Successfully Sent');
    }

    public function print_article($print_article)
    {
        $print_article = Post::where('slug',$print_article)->activeArticle()->get();

        return view('pages.printpost',compact('print_article'));
    }
}
