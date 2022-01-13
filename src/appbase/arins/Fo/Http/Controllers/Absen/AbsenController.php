<?php

namespace Arins\Fo\Http\Controllers\Absen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Arins\Services\Locater\LocaterInterface;
use Illuminate\Support\Facades\Auth;
use Arins\Facades\Response;
use Arins\Facades\Formater;
use Arins\Facades\ConvertDate;
use Arins\Fo\Repositories\Attend\AttendRepositoryInterface;

//TODO: Sementara saja, nanti pakai repository
use Arins\Fo\Models\Attend;

class AbsenController extends Controller
{
    protected $sViewRoot;
    protected $data;
    protected $oLocater;
    protected $ip;
    protected $baseURL, $latlng, $key;


    /**
     * Create a new controller instance.
     *
     * Method Name: Constructor
     * 
     * @return void
     */
    public function __construct($psViewRoot = 'fo.absen',
    AttendRepositoryInterface $parData,
    LocaterInterface $poLocater)
    {
        $this->sViewRoot = $psViewRoot;
        $this->data = $parData;
        $this->oLocater = $poLocater;
        
        $this->middleware('auth');

        //#HCD: Set NULL for production
        $this->ip = '103.119.144.11'; //BALI Fiber ( for testing purpose )
        $this->ip = null; //Production

        $this->baseURL = 'https://maps.googleapis.com/maps/api/geocode/json?';
        $this->latlng = null;
        $this->key = config("a1.google.geocodekey");

    }

    protected function getFullURL($latitude, $longitude)
    {
        $this->latlng = 'latlng=' . $latitude . ',' . $longitude;

        return $fullURL = $this->baseURL . $this->latlng . $this->key;
    } //end method

    protected function setCity($parData)
    {
        $data = $parData;
        $cityLevel1 = null;
        $cityLevel2 = null;
        $nCount = 0;

        foreach ($data->results[0]->address_components as $key => $component) {

            // if ($key == 7)
            // {
            //     return dd($component);
            // }

            if ($nCount >= 2)
            {
                break;
            } //end if

            foreach ($component->types as $item) {

                if ($nCount >= 2)
                {
                    break;
                } //end if

                //City Level 1
                if ($item == 'administrative_area_level_1')
                {
                    $cityLevel1 = $component->short_name;
                    $nCount++;
                } //end if

                //City Level 2
                if ($item == 'administrative_area_level_2')
                {
                    $cityLevel2 = $component->short_name;
                    $nCount++;
                } //end if

            } //end loop

        } //end loop


        //return $cityLevel2 . ' - ' . $cityLevel1;
        return $cityLevel2;
    }

    /**
     * Method Name: index
     * 
     * http method: GET
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Attend::all();

        $viewModel = Response::viewModel();
        $viewModel->data = $data;

        //return dd($viewModel->data[0]->user->name);

        return view($this->sViewRoot.'.index',
        ['viewModel' => $viewModel]);
    }

    /**
     * Method Name: create
     * 
     * http method: GET
     * 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view($this->sViewRoot.'.create');
    }

    /**
     * Method Name: store
     * 
     * http method: POST
     * 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Method Name: show
     * 
     * http method: GET
     * 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view($this->sViewRoot.'.show');
    }

    /**
     * Method Name: edit
     * 
     * http method: GET
     * 
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view($this->sViewRoot.'.edit');
    }

    /**
     * Method Name: udate
     * 
     * http method: POST
     * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Method Name: destroy
     * 
     * http method: POST
     * 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Method Name: edit
     * 
     * http method: GET
     * 
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        //return view($this->sViewRoot.'.delete');
        return 'DDDD';
    }


    /**
     * Method Name: create
     * 
     * http method: GET
     * 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function check()
    {

        $user = Auth::user();
        $date = Formater::date(now());
        $dateIso = ConvertDate::strDateToDate($date);

        // return dd($this->data->getAttendanceByUserIdAndDate($user->id, $dateIso));

        // $attend = $user->attends->where('user_id', $user->id)
        //            ->where('attend_dt', $dateIso->toDateString())
        //            ->first();

        $attend = $this->data->getAttendanceByUserIdAndDate($user->id, $dateIso);
        //return dd($attend);
        $attend_list = $user->attends->sortByDesc('attend_dt');
        $action = 'absen.checkin.post';
        $actionButton = 'Checkin';
        
        //return dd(Formater::time($attend_list[0]->checkin_time));
        //return dd(Formater::time($attend->checkin_time));
        //return dd($attend);

        $data = null;
        $data = [
            'action' => $action,
            'action_button' => $actionButton,
            'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'dept' => $user->dept,
                        'attend_id' => null,
                        'checkin_time' => null,
                        'checkin_city' => null,
                        'checkout_time' => null,
                        'checkout_city' => null,
                    ],
            'date' => null,
            'attend_list' => []
        ];

        if ($attend != null)
        {
            if ($attend->checkin_time) {
                $action = 'absen.checkout.post';
                $actionButton = 'Checkout';
            }

            $data = [
                'action' => $action,
                'action_button' => $actionButton,
                'user' => [
                            'id' => $user->id,
                            'name' => $user->name,
                            'email' => $user->email,
                            'dept' => $user->dept,
                            'attend_id' => $attend->id,
                            'checkin_time' => Formater::time($attend->checkin_time),
                            'checkin_city' => $attend->checkin_city,
                            'checkout_time' => Formater::time($attend->checkout_time),
                            'checkout_city' => $attend->checkout_city,
                        ],
                'date' => $date,
                'attend_list' => []
            ];

        } //end if

        foreach ($attend_list as $key => $value) {
            
            $data['attend_list'][$key] = [
                'attend_dt' => Formater::dateMonth($value->attend_dt),
                'checkin_time' => Formater::time($value->checkin_time),
                'checkin_city' => $value->checkin_city,
                'checkout_time' => Formater::time($value->checkout_time),
                'checkout_city' => $value->checkout_city,
            ];

        } //end loop

        $viewModel = Response::viewModel($data);
        return view($this->sViewRoot.'.check',
        ['viewModel' => $viewModel]);
    }

    /**
     * Method Name: store
     * 
     * http method: POST
     * 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkin(Request $request)
    {
        $authUser = Auth::user();
        $attend = new Attend();
        
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $host = $this->getFullURL($latitude, $longitude);
        $data = $this->oLocater->locate($host);

        // $data = $parData;
        // $city1 = $data->results[0]->address_components[2]->short_name;
        // $city2 = $data->results[0]->address_components[3]->short_name;
        //return dd($data->results[0]->address_components);

        //convert to JSON
        if ($data) {

            $attend->user_id = $authUser->id;
            $attend->attend_dt = now();
            $attend->checkin_time = now();
            $attend->checkin_city = $this->setCity($data);
            $attend->checkin_latitude = $latitude;
            $attend->checkin_longitude = $longitude;
            $attend->checkin_ip = null;
            $attend->checkin_metadata = json_encode($data);
            $attend->save();

        } //end if

        $response = [
            'message' => 'data absensi tersimpan',
            'result' => $data,
            'metadata' => json_encode($data)
        ];

        return redirect('/')->with('status', 'data absensi tersimpan');
        return dd($response);
    }

    /**
     * Method Name: store
     * 
     * http method: POST
     * 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {

        $attend = Attend::find($request->input('attend_id'));

        if ($attend)
        {

            $latitude = $request->input('latitude');
            $longitude = $request->input('longitude');
    
            $host = $this->getFullURL($latitude, $longitude);
            $data = $this->oLocater->locate($host);
            if ($data)
            {

                $attend->checkout_time = now();
                $attend->checkout_city = $this->setCity($data);
                $attend->checkout_latitude = $latitude;
                $attend->checkout_longitude = $longitude;
                $attend->checkout_ip = null;
                $attend->checkout_metadata = json_encode($data);
                $attend->save();

            } //end if

        } //end if

        return redirect('/')->with('status', 'data absensi tersimpan');
    } //end method

} //end method
