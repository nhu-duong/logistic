<?php namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Input;

class AgentController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function indexAction()
    {
        $agents = Agent::paginate(8);
        return view('agent.index', [
            'agents' => $agents,
        ]);
    }
    
    public function newAction()
    {
        return view('agent.edit', [
            'agent' => new Agent(),
            'hasSubmitBtn' => true,
        ]);
    }
    
    /**
     * 
     * @param type $orderId
     */
    public function editAction($id)
    {
        $agent = Agent::find($id);
        if (empty($agent)) {
            App::abort(404);
        }
        return view('agent.edit', [
            'agent' => $agent, 
            'hasSubmitBtn' => true,
        ]);
    }
    
    public function ajaxNewAction()
    {
        $agent = new Agent();
        return view('agent.form', [
            'agent' => $agent,
        ]);
    }
    
    public function saveAction(Request $request)
    {
        $id = Input::has('id') ? Input::get('id') : 0;
        if ($id) {
            $agent = Agent::find($id);
        } else {
            $agent = new Agent();
        }
        $agent->fill(Input::all());
        $agent->save();
        
        if ($request->ajax()) {
            return response()->json([
                'result' => 1,
                'object' => $agent,
            ]);
        } else {
            return response()->redirectToRoute('list_agent');
        }
    }
    
    /**
     * 
     * @param integer $id
     * @return Model
     */
    public function getModelObject($id)
    {
        return Agent::find($id);
    }
}
