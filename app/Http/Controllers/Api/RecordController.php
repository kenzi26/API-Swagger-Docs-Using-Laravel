<?php

namespace App\Http\Controllers\Api;

use App\Models\record;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RecordController extends Controller
{
    public function index()
    {
        $records = record::all();
        if ($records->count() > 0){

            return response() -> json([
                'status' => 200,
                'pizzas' => $records
            ], 200);
        }else{

            return response() -> json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 404);
        }
    }

        public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [

            'name' => 'required|string|max:191',
            'course' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|digits:10', 
        ]);

        if ($validator->fails()){

            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else{
            $pizza = record::create([
                'name' => $request->name,
                'course' => $request->course,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            if($pizza){
            
                return response()->json([
                    'status' => 200,
                    'message' => 'Created A Record Successfully'

                ], 200);

            }else{
                return response()->json([
                    'status' => 500,
                    'message' => 'Something Went Wrong'

                ], 500);

            }
        }
    }

    public function show($id)
    {
        $pizza = pizza:: find($id);
        if($student){
            return response()->json([
                'status' => 200,
                'pizza' => $pizza

            ], 200);
        }else{

            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found!'

            ], 404);
        }
    }

    public function edit($id)
    {

        $pizza = pizza:: find($id);
        if($student){
            return response()->json([
                'status' => 200,
                'pizza' => $pizza

            ], 200);
        }else{

            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found!'

            ], 404);
        }
    }

    public function update(Request $request, int $id)

    {

        $validator = Validator::make($request->all(), [

            'name' => 'required|string|max:191',
            'course' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|digits:10', 
        ]);

        if ($validator->fails()){

            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else{

            $pizza = pizza::find($id);
           
            if($pizza){

                $pizza -> pizza::update([
                    'name' => $request->name,
                    'course' => $request->course,
                    'email' => $request->email,
                    'phone' => $request->phone,
                ]);
            
                return response()->json([
                    'status' => 200,
                    'message' => 'Record Updated Successfully'

                ], 200);

            }else{
                return response()->json([
                    'status' => 404,
                    'message' => 'Record Not Found!'

                ], 404);

            }
        }
    }

    public function destory($id)

    {
        $pizza = Pizza:: find($id);
        if($pizza){
            $student-> delete();

            return response()->json([
                'status' => 202,
                'message' => 'Record Deleted!'

            ], 200);

        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Record Not Found!'

            ], 404);  
        }
    }


}
