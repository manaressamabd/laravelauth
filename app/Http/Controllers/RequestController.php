<?php
namespace App\Http\Controllers;
use App\Models\RFQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
class RequestController extends Controller
{

    public function create()
    {
        return view('contact.request');
    }

    public function AddRequest(Request $request)
    {
        try {
            $input = json_decode($request->input('RequestModel'), true);
    
            if (!$input) {
                throw new Exception('Invalid JSON data');
            }
    
            $fileName = '';
            $fileContent = '';
    
            if ($request->hasFile('File')) {
                $file = $request->file('File');
                $fileName = $file->getClientOriginalName();
                $fileContent = file_get_contents($file->getRealPath());
            }
    
            RFQ::create([
                'Name' => $input['Name'],
                'Email' => $input['Email'],
                'ServiceName' => $input['Service'],
                'BrandName' => $input['Brand'],
                'ModelName' => $input['Model'],
                'ProductName' => $input['Product'],
                'Message' => $input['Message'],
                'FileName' => $fileName,
                'FileContent' => $fileContent
            ]);
    
            return response()->json(['Message' => 'Request is Added Successfully', 'State' => 'Success']);
        } catch (Exception $e) {
            return response()->json(['Message' => 'Request is Failed: ' . $e->getMessage(), 'State' => 'error']);
        }
    }
    

}
