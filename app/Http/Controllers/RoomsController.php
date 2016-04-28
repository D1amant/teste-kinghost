<?php 

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Rooms;
use Laracasts\Flash\Flash;
class RoomsController extends Controller{

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
        $models = Rooms::all();
        
   
        return view('rooms.index', ['models' => $models , 'message' => $this->message]);
    }


        public function create()
    {
       

        return view('rooms.create');
    }


    	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request) {

		$this->validate($request, [
        'name' => 'required',
        
    	]);
    	
		$model = new Rooms();

		$model->name = $request->name;
		$model->status = true;
	

		if ($model->save()) {

			Flash::success('Registro inserido com sucesso');
			return redirect('rooms');
		} else {
			Flash::error('Dados não cadasrados');
			return back();
		}
	}


	public function edit($id){
       	
	     $model = Rooms::find($id);		

        return view('rooms.edit', compact('model'));
    }


  	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function update(Request $request, $id) {

		$this->validate($request, [
        'name' => 'required',
        
    	]);
    
		$model =  Rooms::find($id);

		$model->name = $request->name;
		$model->status = true;
	

		if ($model->save()) {

			Flash::success('Registro alterado com sucesso');
			return redirect('rooms');
		} else {
			Flash::error('Dados não cadasrados');
			return back();
		}
	}


		public function destroy(Request $request, $id)
	{
		 Rooms::destroy($id);
		 	Flash::success('Registro deletado com sucesso');
			return redirect('rooms');
	}


}