<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Options;
use App\Model\Role;
use App\User;
use App\Model\Post;
use App\Model\Category;
use App\Model\Comment;
use App\Model\Message;
use App\Model\MessageUser;
use App\Model\Contact;
use Carbon\Carbon;
use DB;

class optionController extends AdminController {
    
//********************************settings of site**************************************
    public function options() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }
        $option = DB::table('options')->whereIn('option_group', ['setting','contact','meta','social'])->pluck('option_value', 'option_key')->toArray();
        foreach ($option as $key => $value) {
            $$key = $value;
        }
        $roles = Role::pluck('display_name', 'id');
        return view('admin.pages.option', compact(
                        'user_active', 'post_active', 'comment_active', 'comment_user', 'email_active', 'default_role', 'admin_url', 'description', 'keywords', 'facebook_pixel', 'google_analytic', 'share_image', 'default_image', 'logo_image', 'table_limit', 'pagi_limit', 'roles', 'site_open', 'site_title', 'email', 'phone', 'address', 'site_url', 'facebook', 'youtube', 'whatsapp', 'twitter', 'linkedin', 'googleplus'
        ));
    }
    public function optionsStore(Request $request) {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }

        $this->validate($request, [
            'site_title' => 'required',
            'site_url' => 'required',
            'admin_url' => 'required|alpha_dash',
            'email' => 'required|email',
//            'phone' => 'required',
            'table_limit' => 'required|numeric',
            'pagi_limit' => 'required|numeric',
        ]);


        $input = $request->all();
        foreach ($input as $key => $value) {
            if ($key != 'google_analytic' && $key != 'facebook_pixel' && $key != 'description' && $key != 'keywords') {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
        }

        Options::updateOption("site_title", $input['site_title'],0,'setting');
        Options::updateOption("site_open", $input['site_open'],0,'setting');
        Options::updateOption("site_url", $input['site_url'],0,'setting');
        Options::updateOption("admin_url", $input['admin_url'],0,'setting');
        Options::updateOption("pagi_limit", $input['pagi_limit'],0,'setting');
        Options::updateOption("table_limit", $input['table_limit'],0,'setting');
        Options::updateOption("default_role", $input['default_role'],0,'setting');
        Options::updateOption("user_active", $input['user_active'],0,'setting');
        Options::updateOption("email_active", $input['email_active'],0,'setting');
        Options::updateOption("post_active", $input['post_active'],0,'setting');
        Options::updateOption("comment_active", $input['comment_active'],0,'setting');
        Options::updateOption("comment_user", $input['comment_user'],0,'setting');

        Options::updateOption("email", $input['email'],1,'contact');
        Options::updateOption("phone", $input['phone'],1,'contact');
        Options::updateOption("address", $input['address'],1,'contact');
        
        Options::updateOption("facebook", $input['facebook'],1,'social');
        Options::updateOption("twitter", $input['twitter'],1,'social');
        Options::updateOption("googleplus", $input['googleplus'],1,'social');
        Options::updateOption("youtube", $input['youtube'],1,'social');
        Options::updateOption("linkedin", $input['linkedin'],1,'social');
        Options::updateOption("whatsapp", $input['whatsapp'],1,'social');
        
        Options::updateOption("facebook_pixel", $input['facebook_pixel'],1,'meta');
        Options::updateOption("google_analytic", $input['google_analytic'],1,'meta');
        Options::updateOption("description", $input['description'],1,'meta');
        Options::updateOption("keywords", $input['keywords'],1,'meta');
        Options::updateOption("logo_image", $input['logo_image'],1,'meta');
        Options::updateOption("share_image", $input['share_image'],1,'meta');
        Options::updateOption("default_image", $input['default_image'],1,'meta');

        return redirect($input['admin_url'] . '/options')->with('success', 'Options update successfully');
//        return redirect()->route('admin.options')->with('success', 'Options update successfully');
    }
    
    public function sendMessage() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }
        $option = DB::table('options')->whereIn('option_group', ['setting','contact','meta','social'])->pluck('option_value', 'option_key')->toArray();
        foreach ($option as $key => $value) {
            $$key = $value;
        }
        $roles = Role::pluck('display_name', 'id');
        return view('admin.pages.option', compact(
                        'user_active', 'post_active', 'comment_active', 'comment_user', 'email_active', 'default_role', 'admin_url', 'description', 'keywords', 'facebook_pixel', 'google_analytic', 'share_image', 'default_image', 'logo_image', 'table_limit', 'pagi_limit', 'roles', 'site_open', 'site_title', 'email', 'phone', 'address', 'site_url', 'facebook', 'youtube', 'whatsapp', 'twitter', 'linkedin', 'googleplus'
        ));
    }
    public function sendMessageStore(Request $request) {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }

        $this->validate($request, [
            'site_title' => 'required',
            'site_url' => 'required',
            'admin_url' => 'required|alpha_dash',
            'email' => 'required|email',
//            'phone' => 'required',
            'table_limit' => 'required|numeric',
            'pagi_limit' => 'required|numeric',
        ]);


        $input = $request->all();
        foreach ($input as $key => $value) {
            if ($key != 'google_analytic' && $key != 'facebook_pixel' && $key != 'description' && $key != 'keywords') {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
        }

        Options::updateOption("site_title", $input['site_title'],0,'setting');
        Options::updateOption("site_open", $input['site_open'],0,'setting');
        Options::updateOption("site_url", $input['site_url'],0,'setting');
        Options::updateOption("admin_url", $input['admin_url'],0,'setting');
        Options::updateOption("pagi_limit", $input['pagi_limit'],0,'setting');
        Options::updateOption("table_limit", $input['table_limit'],0,'setting');
        Options::updateOption("default_role", $input['default_role'],0,'setting');
        Options::updateOption("user_active", $input['user_active'],0,'setting');
        Options::updateOption("email_active", $input['email_active'],0,'setting');
        Options::updateOption("post_active", $input['post_active'],0,'setting');
        Options::updateOption("comment_active", $input['comment_active'],0,'setting');
        Options::updateOption("comment_user", $input['comment_user'],0,'setting');

        Options::updateOption("email", $input['email'],1,'contact');
        Options::updateOption("phone", $input['phone'],1,'contact');
        Options::updateOption("address", $input['address'],1,'contact');
        
        Options::updateOption("facebook", $input['facebook'],1,'social');
        Options::updateOption("twitter", $input['twitter'],1,'social');
        Options::updateOption("googleplus", $input['googleplus'],1,'social');
        Options::updateOption("youtube", $input['youtube'],1,'social');
        Options::updateOption("linkedin", $input['linkedin'],1,'social');
        Options::updateOption("whatsapp", $input['whatsapp'],1,'social');
        
        Options::updateOption("facebook_pixel", $input['facebook_pixel'],1,'meta');
        Options::updateOption("google_analytic", $input['google_analytic'],1,'meta');
        Options::updateOption("description", $input['description'],1,'meta');
        Options::updateOption("keywords", $input['keywords'],1,'meta');
        Options::updateOption("logo_image", $input['logo_image'],1,'meta');
        Options::updateOption("share_image", $input['share_image'],1,'meta');
        Options::updateOption("default_image", $input['default_image'],1,'meta');

        return redirect($input['admin_url'] . '/options')->with('success', 'Options update successfully');
//        return redirect()->route('admin.options')->with('success', 'Options update successfully');
    }
    
    public function allowTime() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }
        $option = DB::table('options')->whereIn('option_group', ['setting','contact','meta','social'])->pluck('option_value', 'option_key')->toArray();
        foreach ($option as $key => $value) {
            $$key = $value;
        }
        $roles = Role::pluck('display_name', 'id');
        return view('admin.pages.option', compact(
                        'user_active', 'post_active', 'comment_active', 'comment_user', 'email_active', 'default_role', 'admin_url', 'description', 'keywords', 'facebook_pixel', 'google_analytic', 'share_image', 'default_image', 'logo_image', 'table_limit', 'pagi_limit', 'roles', 'site_open', 'site_title', 'email', 'phone', 'address', 'site_url', 'facebook', 'youtube', 'whatsapp', 'twitter', 'linkedin', 'googleplus'
        ));
    }
    public function allowTimeStore(Request $request) {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }

        $this->validate($request, [
            'site_title' => 'required',
            'site_url' => 'required',
            'admin_url' => 'required|alpha_dash',
            'email' => 'required|email',
//            'phone' => 'required',
            'table_limit' => 'required|numeric',
            'pagi_limit' => 'required|numeric',
        ]);


        $input = $request->all();
        foreach ($input as $key => $value) {
            if ($key != 'google_analytic' && $key != 'facebook_pixel' && $key != 'description' && $key != 'keywords') {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
        }

        Options::updateOption("site_title", $input['site_title'],0,'setting');
        Options::updateOption("site_open", $input['site_open'],0,'setting');
        Options::updateOption("site_url", $input['site_url'],0,'setting');
        Options::updateOption("admin_url", $input['admin_url'],0,'setting');
        Options::updateOption("pagi_limit", $input['pagi_limit'],0,'setting');
        Options::updateOption("table_limit", $input['table_limit'],0,'setting');
        Options::updateOption("default_role", $input['default_role'],0,'setting');
        Options::updateOption("user_active", $input['user_active'],0,'setting');
        Options::updateOption("email_active", $input['email_active'],0,'setting');
        Options::updateOption("post_active", $input['post_active'],0,'setting');
        Options::updateOption("comment_active", $input['comment_active'],0,'setting');
        Options::updateOption("comment_user", $input['comment_user'],0,'setting');

        Options::updateOption("email", $input['email'],1,'contact');
        Options::updateOption("phone", $input['phone'],1,'contact');
        Options::updateOption("address", $input['address'],1,'contact');
        
        Options::updateOption("facebook", $input['facebook'],1,'social');
        Options::updateOption("twitter", $input['twitter'],1,'social');
        Options::updateOption("googleplus", $input['googleplus'],1,'social');
        Options::updateOption("youtube", $input['youtube'],1,'social');
        Options::updateOption("linkedin", $input['linkedin'],1,'social');
        Options::updateOption("whatsapp", $input['whatsapp'],1,'social');
        
        Options::updateOption("facebook_pixel", $input['facebook_pixel'],1,'meta');
        Options::updateOption("google_analytic", $input['google_analytic'],1,'meta');
        Options::updateOption("description", $input['description'],1,'meta');
        Options::updateOption("keywords", $input['keywords'],1,'meta');
        Options::updateOption("logo_image", $input['logo_image'],1,'meta');
        Options::updateOption("share_image", $input['share_image'],1,'meta');
        Options::updateOption("default_image", $input['default_image'],1,'meta');

        return redirect($input['admin_url'] . '/options')->with('success', 'Options update successfully');
//        return redirect()->route('admin.options')->with('success', 'Options update successfully');
    }
    
//********************************pages of site**************************************
    public function homeOption() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }

        return view('admin.pages.home');
    }
    public function homeStore(Request $request) {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }

        return redirect()->route('admin.pages.home')->with('success', 'Home update successfully');
    }
   
    public function courses() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }

        return view('admin.pages.home');
    }
    public function coursesStore(Request $request) {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }

        return redirect()->route('admin.pages.home')->with('success', 'Home update successfully');
    }
    
    public function courseSingle() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }

        return view('admin.pages.home');
    }
    public function courseSingleStore(Request $request) {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }

        return redirect()->route('admin.pages.home')->with('success', 'Home update successfully');
    }

    public function contact() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }

        $contact_page = DB::table('options')->where('option_key', 'contact_page')->value('option_value');
        $contact_title = DB::table('options')->where('option_key', 'contact_title')->value('option_value');
        $contact_content = DB::table('options')->where('option_key', 'contact_content')->value('option_value');
        return view('admin.pages.contact', compact('contact_page', 'contact_title', 'contact_content'));
    }
    public function contactStore(Request $request) {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }

        $this->validate($request, [
            'contact_page' => 'required',
            'contact_title' => 'required',
            'contact_content' => 'required',
        ]);


        $input = $request->all();
        foreach ($input as $key => $value) {
            if ($key != 'contact_content') {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
        }
        Options::updateOption("contact_page", $input['contact_page'], 1, 'contact');
        Options::updateOption("contact_title", $input['contact_title'], 0, 'contact');
        Options::updateOption("contact_content", $input['contact_content'], 0, 'contact');

        return redirect()->route('admin.pages.contact')->with('success', 'Contact update successfully');
    }

    public function about() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }

        $about_page = DB::table('options')->where('option_key', 'about_page')->value('option_value');
        $about_title = DB::table('options')->where('option_key', 'about_title')->value('option_value');
        $about_content = DB::table('options')->where('option_key', 'about_content')->value('option_value');
        return view('admin.pages.about', compact('about_page', 'about_title', 'about_content'));
    }
    public function aboutStore(Request $request) {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }

        $this->validate($request, [
            'about_page' => 'required',
            'about_title' => 'required',
            'about_content' => 'required',
        ]);


        $input = $request->all();
        foreach ($input as $key => $value) {
            if ($key != 'about_content') {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
        }

        Options::updateOption("about_page", $input['about_page'], 1, 'about');
        Options::updateOption("about_title", $input['about_title'], 0, 'about');
        Options::updateOption("about_content", $input['about_content'], 0, 'about');

        return redirect()->route('admin.pages.about')->with('success', 'About update successfully');
    }

    public function payment() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }


        $payment_page = DB::table('options')->where('option_key', 'payment_page')->value('option_value');
        $payment = DB::table('options')->where('option_group', 'payment')->where('autoload', 0)->get()->toArray();

        return view('admin.pages.payment', compact('payment_page', 'payment'));
    }
    public function paymentStore(Request $request) {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }

        $this->validate($request, [
            'payment_page' => 'required'
        ]);


        $input = $request->all();
        foreach ($input as $key => $value) {
            if ($key != 'payment') {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
        }
        Options::updateOption("payment_page", $input['payment_page'], 1, 'payment_page');

        $option_delete = new Options();
        $option_delete->deleteOptionGroup("payment");

        $payment = isset($input['payment']) ? $input['payment'] : array();
        if (!empty($payment)) {
            foreach ($payment as $payment_value) {
                $payment_all = new Options();
                $image_link = stripslashes(trim(filter_var($payment_value['image_link'], FILTER_SANITIZE_STRING)));
                $account_number = stripslashes(trim(filter_var($payment_value['account_number'], FILTER_SANITIZE_STRING)));
                $account_name = stripslashes(trim(filter_var($payment_value['account_name'], FILTER_SANITIZE_STRING)));
                if ($image_link != NULL || $image_link != '') {
                    $payment_all->insertOption($account_name, $account_number, $image_link, 0, 'payment');
                }
            }
        }

        return redirect()->route('admin.pages.payment')->with('success', 'Payment update successfully');
    }

    public function privacy() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }


        $privacy_page = DB::table('options')->where('option_key', 'privacy_page')->value('option_value');
        $privacy = DB::table('options')->where('option_group', 'privacy')->where('autoload', 0)->get()->toArray();
        return view('admin.pages.privacy', compact('privacy_page', 'privacy'));
    }
    public function privacyStore(Request $request) {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }

        $this->validate($request, [
            'privacy_page' => 'required'
        ]);

        $input = $request->all();
        foreach ($input as $key => $value) {
            if ($key != 'privacy') {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
        }
        Options::updateOption("privacy_page", $input['privacy_page'], 1, 'privacy');

        $option_delete = new Options();
        $option_delete->deleteOption("privacy_content");

        $privacy = isset($input['privacy']) ? $input['privacy'] : array();
        if (!empty($privacy)) {
            foreach ($privacy as $privacy_value) {
                $privacy_all = new Options();
                $content =  stripslashes(trim(filter_var($privacy_value['content'], FILTER_SANITIZE_STRING)));
                if ($content != NULL || $content != '') {
                    $privacy_all->insertOption('privacy_content', 'privacy_content', $content, 0, 'privacy');
                }
            }
        }

        return redirect()->route('admin.pages.privacy')->with('success', 'Privacy update successfully');
    }

    public function terms() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }


        $terms_page = DB::table('options')->where('option_key', 'terms_page')->value('option_value');
        $terms = DB::table('options')->where('option_group', 'terms')->where('autoload', 0)->get()->toArray();
        return view('admin.pages.terms', compact('terms_page', 'terms'));
    }
    public function termsStore(Request $request) {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }

        $this->validate($request, [
            'terms_page' => 'required'
        ]);

        $input = $request->all();
        foreach ($input as $key => $value) {
            if ($key != 'terms') {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
        }
        Options::updateOption("terms_page", $input['terms_page'], 1, 'terms');

        $option_delete = new Options();
        $option_delete->deleteOption("terms_content");

        $terms = isset($input['terms']) ? $input['terms'] : array();
        if (!empty($terms)) {
            foreach ($terms as $terms_value) {
                $terms_all = new Options();
                $content =  stripslashes(trim(filter_var($terms_value['content'], FILTER_SANITIZE_STRING)));
                if ($content != NULL || $content != '') {
                    $terms_all->insertOption('terms_content', 'terms_content', $terms, 0, 'terms');
                }
            }
        }

        return redirect()->route('admin.pages.terms')->with('success', 'Terms update successfully');
    }

    public function faq() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }

        $faq_page = DB::table('options')->where('option_key', 'faq_page')->value('option_value');
        $faq = DB::table('options')->where('option_group', 'faq')->where('autoload', 0)->get()->toArray();
        return view('admin.pages.faq', compact('faq_page', 'faq'));
    }
    public function faqStore(Request $request) {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }

        $this->validate($request, [
            'faq_page' => 'required'
        ]);

        $input = $request->all();
        foreach ($input as $key => $value) {
            if ($key != 'faq') {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
        }
        Options::updateOption("faq_page", $input['faq_page'], 1, 'faq');

        $option_delete = new Options();
        $option_delete->deleteOption("faq_content");

        $faq = isset($input['faq']) ? $input['faq'] : array();
        if (!empty($faq)) {
            foreach ($faq as $faq_value) {
                $faq_all = new Options();
                $content = stripslashes(trim(filter_var($faq_value['content'], FILTER_SANITIZE_STRING)));
                if ($content != NULL || $content != '') {
                    $faq_all->insertOption('faq_content', 'faq_content', $faq, 0, 'faq');
                }
            }
        }

        return redirect()->route('admin.pages.faq')->with('success', 'Faq update successfully');
    }

}
