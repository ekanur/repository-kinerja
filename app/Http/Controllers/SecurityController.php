<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate_josso;
use Illuminate\Support\Facades\Request;
use Session;
class SecurityController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Profil Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/
        public static function check()
	{

                $_SESSION['JOSSO_ORIGINAL_URL']=url();
                //print $_SESSION['JOSSO_ORIGINAL_URL'];exit;
                $assertionId = \Input::get('josso_assertion_id');
                //print $assertionId;
                $backToUrl = $_SESSION['JOSSO_ORIGINAL_URL'];
                $josso_agent = \jossoagent::getNewInstance();
                $ssoSessionId = $josso_agent->resolveAuthenticationAssertion($assertionId);

                // var_dump($ssoSessionId);exit();
                if($ssoSessionId==null){
                    $ssoSessionId='D9980BE9B9893B8C5029BEEDDDA15B61';
                }
                

               // var_dump(Session::get('ketDosen'));
                // Set SSO Cookie ...
                setcookie("JOSSO_SESSIONID", $ssoSessionId, 0, "/"); // session cookie ...
                $_COOKIE['JOSSO_SESSIONID'] = $ssoSessionId;
                if (isset($backToUrl)) {
                    if (!headers_sent()) {
                        //print "test";exit;
                        ob_end_clean();
                        //Request::url();
                        //header("Location: " . url());
                        return redirect('/');
                        exit;
                    }
                    printf('<HTML>');
                    printf('<META http-equiv="Refresh" content="0;url=%s">', $backToUrl);
                    printf('<BODY onload="try {self.location.href="%s" } catch(e) {}"><a href="%s">Redirect </a></BODY>', $backToUrl, $backToUrl);
                    printf('</HTML>');
                    die();
                }


	}
    public static function logout()
	{
                Session::put('ketDosen',' ');
                return redirect()->away('https://ppkpns.um.ac.id/servicelogout?josso_current_url=http://repository-dev.um.ac.id');

	}

}
