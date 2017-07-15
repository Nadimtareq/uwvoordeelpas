<?php
namespace App\Http\Controllers\Admin;
use Mail;
use App;
use Alert;
use App\Http\Controllers\Controller;
use App\Models\CompanyService;
use App\Models\NewsletterJob;
use App\Models\Company;
use App\Models\Invoice;
use App\Helpers\DealHelper;
use Config;
use Sentinel;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;
use Intervention\Image\Exception\NotReadableException;
use Redirect;
use Setting;

class SettingsController extends Controller
{

    public function __construct(Request $request)
    {
       	$this->slugController = 'settings';
       	$this->section = 'Website instellingen';
    }

    public function index(Request $request)
    {
        $websiteSettings = json_decode(json_encode(Setting::get('website')), true);
        $discountSettings = json_decode(json_encode(Setting::get('discount')), true);
        $cronjobSettings = json_decode(json_encode(Setting::get('cronjobs')), true);
        $apiSettings = json_decode(json_encode(Setting::get('settings')), true);
        $kitchensSettings = json_decode(json_encode(Setting::get('filters')), true);
        $invoicesSettings = json_decode(json_encode(Setting::get('default')), true);

        $kitchens = Config::get('preferences.kitchens');
        $cities = array_values(Config::get('preferences.cities'));


        sort($cities);

        foreach ($cities as $key => $city) {
            $citiesArray[str_slug($city)] = $city;
        }

        $citiesData = App\Models\Preference::where('category_id', 9)->get();
        return view('admin/'.$this->slugController.'/index', [
            'cities' => $citiesArray,
            'citiesData' => $citiesData,
            'kitchens' => $kitchens,
            'slugController' => $this->slugController,
            'section' => $this->section,
            'currentPage' => 'Overzicht',
            'kitchensSettings' => $kitchensSettings,
            'cronjobSettings' => $cronjobSettings,
            'apiSettings' => $apiSettings,
            'discountSettings' => $discountSettings,
            'invoicesSettings' => $invoicesSettings,
            'websiteSettings' => $websiteSettings
        ]);
    }

    public function indexAction(Request $request)
    {
        $requests = $request->all();
        unset($requests['_token']);

        $settingsArray = array(
            'affilinet_name',
            'affilinet_pw',
            'daisycon_name',
            'daisycon_pw',
            'tradetracker_name',
            'tradetracker_pw',
            'tradedoubler_name',
            'tradedoubler_pw',
            'zanox_name',
            'zanox_pw',
            'hotspot_pw',
            'callcenter_reminder',
            'callcenter_reminder_status'
        );

        foreach ($requests as $key => $value) {
            if (in_array($key, $settingsArray)) {
                Setting::set('settings.'.$key, $value);
            }
        }

        Alert::success('De instellingen zijn succesvol aangepast.')->persistent('Sluiten');

        return Redirect::to('admin/settings');
    }

    public function cronjobsAction(Request $request)
    {
        $requests = $request->all();
        unset($requests['_token']);

        Setting::forget('cronjobs');

        $settingsArray = array(
            'affilinet_name',
            'affilinet_pw',
            'daisycon_name',
            'daisycon_pw',
            'tradetracker_name',
            'tradetracker_pw',
            'tradedoubler_name',
            'tradedoubler_pw',
            'zanox_name',
            'zanox_pw',
            'hotspot_pw',
            'callcenter_reminder',
            'newsletter_dealmail',
            'callcenter_reminder_status',
        );

        foreach ($requests as $key => $value) {
            Setting::set('cronjobs.'.$key, 1);
        }

        Alert::success('De instellingen zijn succesvol aangepast.')->persistent('Sluiten');

        return Redirect::to('admin/settings');
    }

    public function invoicesAction(Request $request)
    {
        if ($request->isMethod('post')) {
            $requests = $request->all();

            Setting::set('default.services_noshow', $request->input('services_noshow'));
            Setting::set('default.services_name', $request->input('name'));
            Setting::set('default.services_price', $request->input('price'));
            Setting::set('default.services_tax', $request->input('tax'));

            Alert::success('De instellingen zijn succesvol aangepast.')->persistent('Sluiten');

            return Redirect::to('admin/settings');
        } else {
            alert()->error('', 'Het formulier is niet correct ingevuld.')->persistent('Sluiten');
            return Redirect::to('admin/settings');
        }
    }

    public function websiteAction(Request $request)
    {
        if ($request->isMethod('post')) {
            $requests = $request->all();

            Setting::set('website.facebook', $request->input('facebook'));
            Setting::set('website.source', $request->input('source'));
            Setting::set('website.regio', $request->input('regio'));

            Alert::success('De instellingen zijn succesvol aangepast.')->persistent('Sluiten');

            return Redirect::to('admin/settings');
        } else {
            alert()->error('', 'Het formulier is niet correct ingevuld.')->persistent('Sluiten');
            return Redirect::to('admin/settings');
        }
    }

    public function eetnuAction(Request $request)
    {
        if ($request->isMethod('post')) {
            $requests = $request->all();

            Setting::set('filters.kitchens', json_encode($request->input('kitchens')));

            if (trim($request->input('cities')) != '') {
                Setting::set('filters.cities', json_encode(array_values($request->input('cities'))));
            } else {
                Setting::set('filters.cities', '');
            }

            Alert::success('De instellingen zijn succesvol aangepast.')->persistent('Sluiten');

            return Redirect::to('admin/settings');
        } else {
            alert()->error('', 'Het formulier is niet correct ingevuld.')->persistent('Sluiten');
            return Redirect::to('admin/settings');
        }
    }

    public function discountAction(Request $request)
    {
        if ($request->isMethod('post')) {
            $requests = $request->all();

            $files = array(
                'discount_image',
                'discount_image2',
                'discount_image3',
                'discount_image4',
            );

            if ($request->has('remove_image2')) {
                Setting::forget('discount.discount_image2');
            }

            if ($request->has('remove_image2')) {
                Setting::forget('discount.discount_image3');
            }

            foreach ($files as $id => $file) {
                if ($request->hasFile($file)) {
                    try {
                        ImageManagerStatic::make($request->file($file))->save(public_path('images/voordeelpas.'.$request->file($file)->getClientOriginalExtension()));
                    } catch (NotReadableException $e) {
                    }

                    Setting::set('discount.'.$file, 'images/voordeelpas.'.$request->file($file)->getClientOriginalExtension());
                }
            }

            Setting::set('discount.discount_width', $request->input('discount_width'));
            Setting::set('discount.discount_width2', $request->input('discount_width2'));
            Setting::set('discount.discount_width3', $request->input('discount_width3'));
            Setting::set('discount.discount_width4', $request->input('discount_width4'));

            Setting::set('discount.discount_height', $request->input('discount_height'));
            Setting::set('discount.discount_height2', $request->input('discount_height2'));
            Setting::set('discount.discount_height3', $request->input('discount_height3'));
            Setting::set('discount.discount_height4', $request->input('discount_height4'));

            Setting::set('discount.discount_old', $request->input('discount_old'));
            Setting::set('discount.discount_new', $request->input('discount_new'));
            Setting::set('discount.discount_old3', $request->input('discount_old3'));
            Setting::set('discount.discount_new3', $request->input('discount_new3'));

            Setting::set('discount.discount_url', $request->input('discount_url'));
            Setting::set('discount.discount_url2', $request->input('discount_url2'));
            Setting::set('discount.discount_url3', $request->input('discount_url3'));

            Alert::success('De instellingen zijn succesvol aangepast.')->persistent('Sluiten');

            return Redirect::to('admin/settings');
        } else {
            alert()->error('', 'Het formulier is niet correct ingevuld.')->persistent('Sluiten');
            return Redirect::to('admin/settings');
        }
    }

    public function run(Request $request, $slug)
    {
        switch ($slug) {
            case 'affilinet':
                Setting::set('cronjobs.affilinet_affiliate', 1);
                break;

            case 'tradetracker':
                Setting::set('cronjobs.tradetracker_affiliate', 1);
                break;

            case 'zanox':
                Setting::set('cronjobs.zanox_affiliate', 1);
                break;

            case 'daisycon':
                Setting::set('cronjobs.daisycon_affiliate', 1);
                break;

            case 'tradedoubler':
                Setting::set('cronjobs.tradedoubler_transaction', 1);
                break;

            case 'hotspot':
                Setting::set('cronjobs.wifi_guest', 1);
                break;
        }

        Alert::success('De gekozen api wordt nu uitgevoerd.')->persistent('Sluiten');

        return Redirect::to('admin/settings');
    }

	public function newsletterAction(Request $request)
	{
		 if ($request->isMethod('post')) {
       $data = $request->all();

       foreach ($data['date_jobs'] as $key => $value) {
         # code...
         $city = $key;
         $days = json_encode($value);
         $time = json_encode($data['time_jobs'][$key]);
         $status = $data['status_jobs'][$key];
         NewsletterJob::updateOrCreate(['city_id' => $city],['city_id' => $city,'date' => $days, 'time' => $time, 'status' => $status]);
       }


       Alert::success('De gekozen api wordt nu uitgevoerd.')->persistent('Sluiten');

       return Redirect::to('admin/settings');
	  }
    else {
          alert()->error('', 'Het formulier is niet correct ingevuld.')->persistent('Sluiten');
          return Redirect::to('admin/settings');
    }

}}
