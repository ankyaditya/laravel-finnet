<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\IpAddress;
 
class AutoCompleteController extends Controller
{
 
    public function index()
    {
        return view('search');
    }
 
    public function search(Request $request)
    {
          $search = $request->get('term');
      
          $result = IpAddress::where('ip', 'LIKE', '%'. $search. '%')->get();
 
          return response()->json($result);
            
    } 
}