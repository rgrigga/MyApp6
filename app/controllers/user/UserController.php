<?php

class UserController extends BaseController {

    /**
     * User Model
     * @var User
     */
    protected $user;

    /**
     * Post Model
     * @var Post
     */

    protected $post;

        /**
     * Company Model
     * @var Company
     */
    protected $company;

    /**
     * Inject the models.
     * @param User $user
     * @param Company $company
     */
    public function __construct(User $user, Company $company, Post $post)
    {
        parent::__construct();
        $this->user = $user;

        $brand=App::environment();
        $this->company = $company->where('brand','LIKE',$brand)->first();

        // $company=$this->company
        $this->post = $post;

    }

    /**
     * Users settings page
     *
     * @return View
     */
    public function getIndex($company='')
    {   
        // var_dump($company);
        // http://php.net/manual/en/function.list.php
        // list($user,$redirect) = $this->user->checkAuthAndRedirect('user');
        // if($redirect){return $redirect;}

        // Show the page

        $brand=App::environment();
        $company=$this->company->where('brand','LIKE',$brand)->first();
        // die("BAM");
        // $company = App::make('company');
        return View::make('site/user/index')
            ->with('user',$this->user)
            ->with(compact('company'));
    }

    /**
     * Stores new user
     *
     */
    public function postIndex()
    {
        $this->user->username = Input::get( 'username' );
        $this->user->email = Input::get( 'email' );

        // If using ReCaptcha, add it to the list of inputs
        // if( Confide::isUsingReCaptcha() )
        // {
        //     $this->user->recaptcha_response_field = Input::get( 'recaptcha_response_field' );
        // }
        

        $password = Input::get( 'password' );
        $passwordConfirmation = Input::get( 'password_confirmation' );

        if(!empty($password)) {
            if($password === $passwordConfirmation) {
                $this->user->password = $password;
                // The password confirmation will be removed from model
                // before saving. This field will be used in Ardent's
                // auto validation.
                $this->user->password_confirmation = $passwordConfirmation;
            } else {
                // Redirect to the new user page
                return Redirect::to('user/create')
                    ->withInput(Input::except('password'))
                    ->with('error', Lang::get('admin/users/messages.password_does_not_match'));
            }
        } else {
            unset($this->user->password);
            unset($this->user->password_confirmation);
        }

        // Save if valid. Password field will be hashed before save
        $this->user->save();

        if ( $this->user->id )
        {
            $posts=$this->post->where('meta_keywords', 'LIKE', $company->brand)->paginate(5);
            View::share('posts',$posts);
            // Redirect with success message, You may replace "Lang::get(..." for your custom message.
            return Redirect::to('user/login')
                ->with('user',$this->user)
                ->with(compact($posts))
                // ->with( 'notice', Lang::get('user/user.user_account_created') );
                ->with( 'info', 'Please check your email, confirm, & we\'ll see you soon.' );
            // 
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $this->user->errors()->all();

            return Redirect::to('user/create')
                ->withInput(Input::except('password'))
                ->with( 'error', $error );
        }
    }

    /**
     * Edits a user
     *
     */
    public function postEdit($user)
    {
        // Validate the inputs
        $validator = Validator::make(Input::all(), $user->getUpdateRules());


        if ($validator->passes())
        {
            $oldUser = clone $user;
            $user->username = Input::get( 'username' );
            $user->email = Input::get( 'email' );

            $password = Input::get( 'password' );
            $passwordConfirmation = Input::get( 'password_confirmation' );

            if(!empty($password)) {
                if($password === $passwordConfirmation) {
                    $user->password = $password;
                    // The password confirmation will be removed from model
                    // before saving. This field will be used in Ardent's
                    // auto validation.
                    $user->password_confirmation = $passwordConfirmation;
                } else {
                    // Redirect to the new user page
                    return Redirect::to('users')->with('error', Lang::get('admin/users/messages.password_does_not_match'));
                }
            } else {
                unset($user->password);
                unset($user->password_confirmation);
            }

            $user->prepareRules($oldUser, $user);

            // Save if valid. Password field will be hashed before save
            $user->amend();
        }

        // Get validation errors (see Ardent package)
        $error = $user->errors()->all();

        if(empty($error)) {
            return Redirect::to('user')
                ->with( 'success', Lang::get('user/user.user_account_updated') );
        } else {
            return Redirect::to('user')
                ->withInput(Input::except('password','password_confirmation'))
                ->with( 'error', $error );
        }
    }

    /**
     * Displays the form for user creation
     *
     */
    public function getCreate()
    {
        return View::make('site/user/create');
    }


    /**
     * Displays the login form
     *
     */
    public function getLogin()
    {

        $user = Auth::user();
            if(!empty($user->id)){
            return Redirect::to('/');
        }

        // $company=App::make('company');
        $brand=App::environment();
        $company = $this->company->where('brand', 'LIKE', $brand)->first();

        if(!$company){
            $company = $this->company->where('brand', 'LIKE', 'gristech')->first();
            // die(var_dump("Problem in user.getLogin.", $company));
            // $company = $this->company->findOrFail(3);
        }
        // $company = $this->company->findOrFail(3);

        $posts=$this->post
        ->where('meta_keywords', 'LIKE', '%'.$company->brand.'%')
        ->where('meta_keywords','LIKE','%public%')
        ->paginate(5);
        View::share('posts',$posts);

        return View::make('site/user/login')
            // put this somewhere?
            // ->nest('login','site.user.login')
            ->with(compact('user'))
            ->with(compact('company'));
            // ->nest('nav','site.partials.nav-default');
    }
// $roles = DB::table('roles')->lists('title');



    // public function buckeye(){
        
    // }



    /**
     * Attempt to do login
     *
     */
    public function postLogin()
    {

        $input = array(
            'email'    => Input::get( 'email' ), // May be the username too
            'username' => Input::get( 'email' ), // May be the username too
            'password' => Input::get( 'password' ),
            'remember' => Input::get( 'remember' ),
        );

        // If you wish to only allow login from confirmed users, call logAttempt
        // with the second parameter as true.
        // logAttempt will check if the 'email' perhaps is the username.
        // Check that the user is confirmed.
        if ( Confide::logAttempt( $input, true ) )
        {

            // if(Auth::user()->hasRole('admin')){
            //     return Redirect::to('admin');    
            // }

            $r = Session::get('loginRedirect');
            if (!empty($r))
            {
                Session::forget('loginRedirect');
                return Redirect::to($r);
            }
            return Redirect::to('/');
        }
        else
        {
            // Check if there was too many login attempts
            if ( Confide::isThrottled( $input ) ) {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            } elseif ( $this->user->checkUserExists( $input ) && ! $this->user->isConfirmed( $input ) ) {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            } else {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }

            return Redirect::to('user/login')
                ->withInput(Input::except('password'))
                ->with( 'error', $err_msg );
        }
    }

    /**
     * Attempt to confirm account with code
     *
     * @param  string  $code
     */
    public function getConfirm( $code )
    {
        if ( Confide::confirm( $code ) )
        {
            return Redirect::to('user/login')
                ->with( 'notice', Lang::get('confide::confide.alerts.confirmation') );
        }
        else
        {
            return Redirect::to('user/login')
                ->with( 'error', Lang::get('confide::confide.alerts.wrong_confirmation') );
        }
    }

    /**
     * Displays the forgot password form
     *
     */
    public function getForgot()
    {
        $brand=App::environment();
        $company = $this->company->where('brand', 'LIKE', $brand)->first();

        if(!$company){
            $company = $this->company->where('brand', 'LIKE', 'gristech')->first();
            // die(var_dump("Problem in user.getLogin.", $company));
            // $company = $this->company->findOrFail(3);
        }
        return View::make('site/user/forgot')
        ->with(compact('company'));
    }

    /**
     * Attempt to reset password with given email
     *
     */
    public function postForgot()
    {
        $rules = array(
          'email' => 'required|email',
        );

        // If using ReCaptcha, add his field to the Validation rules
        // if( Confide::isUsingReCaptcha() )
        // {
        //     $rules['recaptcha_response_field'] = 'required|recaptcha';
        // }        

        $validator = Validator::make( Input::all(), $rules );

        if ( $validator->passes() ) {
            if( Confide::forgotPassword( Input::get( 'email' ) ) )
            {
                return Redirect::to('user/login')
                    ->with( 'notice', Lang::get('confide::confide.alerts.password_reset') );
            }
            else
            {
                return Redirect::to('user/forgot')
                    ->withInput()
                    ->with( 'error', Lang::get('confide::confide.alerts.wrong_password_forgot') );
            }
        }
        else
        {
            $error = $validator->messages()->all();
            
            return Redirect::to('user/forgot')
                ->withInput()
                ->with( 'error', $error );
        }
    }

    /**
     * Shows the change password form with the given token
     *
     */
    public function getReset( $token )
    {

        return View::make('site/user/reset')
            ->with('token',$token);
    }


    /**
     * Attempt change password of the user
     *
     */
    public function postReset()
    {
        $input = array(
            'token'=>Input::get( 'token' ),
            'password'=>Input::get( 'password' ),
            'password_confirmation'=>Input::get( 'password_confirmation' ),
        );

        // By passing an array with the token, password and confirmation
        if( Confide::resetPassword( $input ) )
        {
            return Redirect::to('user/login')
            ->with( 'notice', Lang::get('confide::confide.alerts.password_reset') );
        }
        else
        {
            return Redirect::to('user/reset')
                ->withInput()
                ->with( 'error', Lang::get('confide::confide.alerts.wrong_password_reset') );
        }
    }

    /**
     * Log the user out of the application.
     *
     */
    public function getLogout()
    {
        Confide::logout();
        
        return Redirect::to('/');
    }

    /**
     * Get user's profile
     * @param $username
     * @return mixed
     */
    public function getProfile($username)
    {
        $userModel = new User;
        $user = $userModel->getUserByUsername($username);

        // Check if the user exists
        if (is_null($user))
        {
            return App::abort(404);
        }


        return View::make('site/user/profile', compact('user','company'));
    }

    public function getSettings()
    {

        $brand=App::environment();
        $company = $this->company->where('brand', 'LIKE', $brand)->first();

        if(!$company){
            $company = $this->company->where('brand', 'LIKE', 'gristech')->first();
            // die(var_dump("Problem in user.getLogin.", $company));
            // $company = $this->company->findOrFail(3);
        }
        // $company = $this->company->findOrFail(3);

        $posts=$this->post
        ->where('meta_keywords', 'LIKE', '%'.$company->brand.'%')
        ->where('meta_keywords','LIKE','%public%')
        ->paginate(5);
        View::share('posts',$posts);

        list($user,$redirect) = User::checkAuthAndRedirect('user/settings');
        if($redirect){return $redirect;}

        return View::make('site/user/profile', compact('user','company'));
    }

    /**
     * Process a dumb redirect.
     * @param $url1
     * @param $url2
     * @param $url3
     * @return string
     */
    public function processRedirect($url1,$url2,$url3)
    {
        $redirect = '';
        if( ! empty( $url1 ) )
        {
            $redirect = $url1;
            $redirect .= (empty($url2)? '' : '/' . $url2);
            $redirect .= (empty($url3)? '' : '/' . $url3);
        }
        return $redirect;
    }
}
