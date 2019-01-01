<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use Illuminate\Support\Facades\View;
use DB;
use App\Model\Post;
use App\User;
use App\Model\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
    Schema::defaultStringLength(191);

        Relation::morphMap([
            'posts' => 'App\Model\Post',
            'comments' => 'App\Model\Comment',
            'searches' => 'App\Model\Search',
            'categories' => 'App\Model\Category',
        ]);

        Validator::extend('uniqueCategoryLinkType', function ($attribute, $value, $parameters, $validator) {
            $count = DB::table('categories')->where('link', $value)
                    ->where('type', $parameters[0])
                    ->count();

            return $count === 0;
        });

        Validator::extend('uniqueCategoryUpdateLinkType', function ($attribute, $value, $parameters, $validator) {
            $count = DB::table('categories')->where('link', $value)
                    ->where('type', $parameters[0])
                    ->where('id', '!=', $parameters[1])
                    ->count();

            return $count === 0;
        });

        Validator::extend('uniquePostLinkType', function ($attribute, $value, $parameters, $validator) {
            $count = DB::table('posts')->where('link', $value)
                    ->where('type', $parameters[0])
                    ->count();

            return $count === 0;
        });

        Validator::extend('uniquePostUpdateLinkType', function ($attribute, $value, $parameters, $validator) {
            $count = DB::table('posts')->where('link', $value)
                    ->where('type', $parameters[0])
                    ->where('id', '!=', $parameters[1])
                    ->count();

            return $count === 0;
        });

        view()->composer('admin.layouts.app', function($view) {
            $user_account = Auth::user();
            $post_count = 0; //Post::countPostTypeUnRead('posts');
            $message_count = 0;
            $comment_count = 0; //Comment::countUnRead();
            $contact_count = 0;

            $access_all = $user_all = $post_all = $tag_all = $search_all = $message_all = $category_all = $comment_all = $contact_all = 0;
            if ($user_account->can('access-all')) {
                $access_all = $user_all = $post_all = $tag_all = $search_all = $message_all = $category_all = $comment_all = $contact_all = 1;
            }

            if ($user_account->can(['post-type-all', 'post-all'])) {
                $post_all = $tag_all = $search_all = $category_all = $comment_all = $contact_all = 1;
            }

            if ($user_account->can(['user*'])) {
                $user_all = 1;
            }

            if ($user_account->can(['post-list', 'post-edit', 'post-delete', 'post-show'])) {
                $post_all = 1;
            }

            if ($user_account->can(['message*'])) {
                $message_all = 1;
            }

            if ($user_account->can(['category*'])) {
                $category_all = 1;
            }

            if ($user_account->can(['comment-all', 'comment-create', 'comment-list', 'comment-edit', 'comment-delete'])) {
                $comment_all = 1;
            }
            $name_list = '';
            $array_link = explode('/', $_SERVER['REQUEST_URI']);
            if (count($array_link) >= 3) {
                $name_list = $array_link[2];
            }
            $view->with(array(
                'user_account' => $user_account, 'access_all' => $access_all, 'user_all' => $user_all,
                'category_all' => $category_all, 'tag_all' => $tag_all, 'search_all' => $search_all,
                'post_all' => $post_all, 'post_count' => $post_count, 'name_list' => $name_list,
                'contact_count' => $contact_count, 'contact_all' => $contact_all,
                'comment_all' => $comment_all, 'comment_count' => $comment_count,
                'message_all' => $message_all, 'message_count' => $message_count
            ));
        });

        view()->composer('site.layouts.app', function($view) {
            $title='Friending';
            $option = DB::table('options')->where('autoload', 1)->pluck('option_value', 'option_key')->toArray();
            foreach ($option as $key => $value) {
                $$key = $value;
            }
            $user_id = $message_count = $admin_panel = 0;
            $user_name=$user_key = "";
            $user_account = Auth::user();
            if (!empty($user_account)) {
                $user_id = $user_account->id;
                $user_name = $user_account->display_name;
                $user_key = $user_account->name;
                $message_count = 0; // MessageUser::countUserUnRead($user_account->id);
                if ($user_account->can(['access-all', 'category*', 'user*', 'message*', 'post-type-all', 'post-all', 'comment-all', 'admin-panel'])) {
                    $admin_panel = 1;
                }
            }
            $view->with(array(
                'user_key' => $user_key, 'user_account' => $user_account, 'user_id' => $user_id, 'user_name' => $user_name, 'message_count' => $message_count,
                'email' => $email, 'phone' => $phone, 'address' => $address, 'admin_panel' => $admin_panel,'title'=>$title,
                'description' => $description, 'keywords' => $keywords, 'facebook_pixel' => $facebook_pixel, 'google_analytic' => $google_analytic,
                'facebook' => $facebook, 'twitter' => $twitter, 'youtube' => $youtube, 'googleplus' => $googleplus, 'whatsapp' => $whatsapp, 'linkedin' => $linkedin,
                'about_page' => $about_page, 'contact_page' => $contact_page, 'privacy_page' => $privacy_page, 'payment_page' => $payment_page, 'terms_page' => $terms_page, 'faq_page' => $faq_page,
                'share_image' => $share_image, 'default_image' => $default_image, 'logo_image' => $logo_image,
            ));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {

        // ...
        if ($this->app->environment('local')) {
            // register the service provider
            $this->app->register('Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider');
            $this->app->register('Barryvdh\Debugbar\ServiceProvider');
            // register an alias
            $this->app->booting(function() {
                $loader = \Illuminate\Foundation\AliasLoader::getInstance();
                $loader->alias('Debugbar', 'Barryvdh\Debugbar\Facade');
            });
        }
        // ...
    }

}
