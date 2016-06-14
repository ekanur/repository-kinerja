<?php namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use DB;
//\Composer\Autoload\includeFile(App\josso-php-inc\josso-cfg.inc);

class Data_global {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $data_global;
        
	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $data_global)
	{
		$this->data_global = $data_global;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		/* @var $josso_agent type */
                $query = DB::select("SELECT * FROM public.errortype");
                $request->merge(array("errortype" =>$query));
                return $next($request);
	}
        
        public static function format_date_abb($date, $country, $long = 'N')
    {
        if (!$date || $date == '0000-00-00'):
			$out = '-';
		else:
			if ($country == 'ina'):
				if ($long == 'N'):
					$format = "d M Y";
				elseif ($long == 'A'):
					$format = "d M y";
				else:
					$format = "l, d M Y";
				endif;
			else:
				if ($long == 'N'):
					$format = "M d, Y";
				elseif ($long == 'A'):
					$format = "d M y";
				else:
					$format = "l, d M Y";
				endif;
			endif;
			$out = date($format, strtotime($date));
			if ($country == 'ina'):
				$eng = array("/Jan/", "/Feb/", "/Mar/", "/Apr/", "/May/", "/Jun/", "/Jul/", "/Aug/", "/Sep/", "/October/", "/Nov/", "/Dec/");
				$ina = array("Jan", "Peb", "Mar", "Apr", "Mei","Jun", "Jul", "Agt", "Sep", "Okt", "Nop", "Des");
				$out = preg_replace($eng, $ina, $out);
				if ($long != 'N'):
					$eng = array("/Mon/", "/Tue/", "/Wed/", "/Thu/", "/Fri/", "/Sat/", "/Sun/");
					$ina = array("Sen", "Sel", "Rab", "Kam", "Jum","Sab", "Ming");
					$out = preg_replace($eng, $ina, $out);
				endif;
			endif;
		endif;
		return $out;
    }

}
