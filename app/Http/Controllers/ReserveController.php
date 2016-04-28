<?php 

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Reserve;
use Laracasts\Flash\Flash;
use App\User;
use App\Http\Models\Rooms;
use App\Utils\Date;
class ReserveController extends Controller{

protected $message;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    	$this->message = 'Dados não encontrados';
    }

    public function index()
    {
       $models = Reserve::all();
       $message = $this->message ;
     
        return view('reserve.index', ['models' => $models , compact('message')]);
    }


        public function create()
    {
         $userArray = User::getArray();
         $roomsArray = Rooms::getArray();
  		

        return view('reserve.create' ,compact('userArray' , 'roomsArray'));
    }


    	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request) {

		$this->validate($request, [
        'date' => 'required',
        'time_ini' => 'required',
        
    	]);
    	
		$model = new Reserve();

		$model->user_id = $request->user_id;
		$model->rooms_id = $request->rooms_id;
		$model->date = Date::toTime($request->date);
		$model->time_ini = $request->time_ini;
		$explode = explode(":", $request->time_ini);
		$model->time_end = ($explode[0]+1) . ":" . $explode[1] . ":" . $explode[2];

		$myValidation = 
		Reserve::whereRaw("time_ini <= ? and time_end >= ? and DATE_FORMAT(date, '%Y-%m-%d') = DATE_FORMAT(?, '%Y-%m-%d')" , 
			[$model->time_ini , 
			 $model->time_ini , 
			 $model->date ])->get();


			if(count($myValidation)){
					Flash::error('Sala já reservada');
					return back();
			}																			   	
	
	

		if ($model->save()) {

			Flash::success('Registro inserido com sucesso');
			return redirect('reserve');
		} else {
			Flash::error('Dados não cadasrados');
			return back();
		}
	}


	public function edit($id){
       	
	     $model = Reserve::find($id);	
	       $userArray = User::getArray();
         $roomsArray = Rooms::getArray();	

        return view('reserve.edit', compact('model', 'userArray' , 'roomsArray'));
    }


  	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function update(Request $request, $id) {

		$this->validate($request, [
        'date' => 'required',
        'time_ini' => 'required',
        
    	]);
    	
		$model =  Reserve::find($id);

		$model->user_id = $request->user_id;
		$model->rooms_id = $request->rooms_id;
		$model->date = Date::toTime($request->date);
		$model->time_ini = $request->time_ini;
		$explode = explode(":", $request->time_ini);
		$model->time_end = ($explode[0]+1) . ":" . $explode[1] . ":" . $explode[2];

		$myValidation = 
		Reserve::whereRaw("time_ini <= ? and time_end >= ? and DATE_FORMAT(date, '%Y-%m-%d') = DATE_FORMAT(?, '%Y-%m-%d')" , 
			[$model->time_ini , 
			 $model->time_ini , 
			 $model->date ])->get();


			if(count($myValidation)){
					Flash::error('Sala já reservada');
					return back();
			}																			   	
	
	

		if ($model->save()) {

			Flash::success('Registro inserido com sucesso');
			return redirect('reserve');
		} else {
			Flash::error('Dados não cadasrados');
			return back();
		}
	}

	public function destroy(Request $request, $id)
	{
		 Reserve::destroy($id);
		 	Flash::success('Registro deletado com sucesso');
			return redirect('reserve');
	}


}