<?php

namespace App\Http\Controllers\Admin;

//use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Model\Options;
use App\Role;
use App\User;
use App\Model\Post;
use App\Model\Category;
use App\Model\Comment;
use App\Model\Contact;
use Carbon\Carbon;

class StatisticsReportController extends AdminController {

    public function homeAdmin() {
        if ($this->user->can('access-all')) {
            return $this->statisticsUsers();
        } elseif ($this->user->can('post*')) {
            return redirect()->route('admin.posts.index');
        } elseif ($this->user->can('category*')) {
            return redirect()->route('admin.categories.index');
        } else {
            return redirect()->route('admin.users.edit', [$this->user->id]);
        }
    }

//********************************statistics of site**************************************
    
    public function statisticsUsers() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }
        $user_id = 1;
        $month = Carbon::now()->subMonth()->toDateString();
        $week = Carbon::now()->subWeek()->toDateString();
        $day = Carbon::now()->subDay()->toDateString();
        $date = Carbon::now()->addDay()->toDateString();

        $user_count = User::count();

        $user_count_month = User::lastMonth($month, $date);

        $user_count_week = User::lastMonth($week, $date);

        $user_count_day = User::lastDay($day, $date);

        return view('admin.statistics.users', compact(
                        'user_count', 'user_count_month', 'user_count_week', 'user_count_day'
        ));
    }

    public function statisticsPublic() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }
        $user_id = 1;
        $month = Carbon::now()->subMonth()->toDateString();
        $week = Carbon::now()->subWeek()->toDateString();
        $day = Carbon::now()->subDay()->toDateString();
        $date = Carbon::now()->addDay()->toDateString();

        $user_count = User::count();
        $post_count = Post::where('type', 'posts')->count();
        $category_count = Category::count();
        $comment_count = Comment::count();
        $message_count = 0;

        $contact_count = Contact::count();

        $post_count_read = 0;//Post::countPostTypeUnRead();
        $comment_count_read =0;// Comment::countUnRead();
        $message_count_read = 0;
        $contact_count_read = 0;//Contact::countUnRead();
        $contact_count_reply = 0;//Contact::countUnReply();

        $post_count_month = Post::lastMonth($month, $date);
        $comment_count_month = Comment::lastMonth($month, $date);
        $user_count_month = User::lastMonth($month, $date);
        $message_count_month = 0; //Message::lastMonth($month, $date, $user_id);
        $contact_count_month = Contact::lastMonth($month, $date);

        $post_count_week = Post::lastMonth($week, $date);
        $comment_count_week = Comment::lastMonth($week, $date);
        $user_count_week = User::lastMonth($week, $date);
        $message_count_week = 0; // Message::lastMonth($week, $date, $user_id);
        $contact_count_week = Contact::lastMonth($week, $date);

        $post_count_day = Post::lastDay($day, $date);
        $comment_count_day = Comment::lastDay($day, $date);
        $user_count_day = User::lastDay($day, $date);
        $message_count_day = 0; // Message::lastDay($day, $date, $user_id);
        $contact_count_day = Contact::lastDay($day, $date);

        return view('admin.statistics.public', compact(
                        'category_count', 'user_count', 'user_count_month', 'user_count_week', 'user_count_day', 'post_count', 'post_count_read', 'post_count_month', 'post_count_week', 'post_count_day', 'comment_count', 'comment_count_read', 'comment_count_month', 'comment_count_week', 'comment_count_day', 'message_count', 'message_count_read', 'message_count_month', 'message_count_week', 'message_count_day', 'contact_count', 'contact_count_read', 'contact_count_month', 'contact_count_week', 'contact_count_day', 'contact_count_reply'
        ));
    }

//********************************report of site**************************************
}
