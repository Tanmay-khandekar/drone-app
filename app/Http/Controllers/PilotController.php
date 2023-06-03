<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PilotDetails;
use App\Models\User;
use App\Models\Industry;
use App\Imports\PilotsImport;
use Auth;
use Excel;
#Excel library
// use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Files\TemporaryFileFactory;
use Maatwebsite\Excel\Transactions\NullTransactionHandler;
use Maatwebsite\Excel\Helpers\FileTypeDetector;
#use Maatwebsite\Excel\Reader;
use App\ExcelReader;

class PilotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pilots = User::with('pilot_detail')->where('type','pilot')->get();
        return response(['data' => $pilots], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
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
     * Display the specified resource.
     * Display the Pilot varification page
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        if(!Auth::check()){
            return redirect("login")->withSuccess('Opps! You do not have access');
        }
        return view('pilot-varification');
    }
    public function import(Request $request)
    {
        // config(['excel.import.startRow' => 4]);
        // $pilot = Excel::import(new PilotsImport, request()->file('file'));
        $response = $this->open($request);
        $response = $response['sheetsData'][0];
        foreach($response as $key =>$row){
            $pilot = User::updateOrCreate(
                ['email' => $row['email']],
                [
                    'first_name'=> $row['first_name'],
                    'last_name' => $row['last_name'],
                    'email'     => $row['email'],
                    'phone'     => $row['phone'],
                    'password'  => bcrypt($row['password']),
                    'type'      => 'pilot',
                    'status'    => 1,
                    'is_verified'    => 1,
                ]);
        }
        return redirect()->back()->withSuccess('Pilot imported successfully');
    }

    public function open($request){

        $tempFile = new TemporaryFileFactory(
                config('excel.temporary_files.local_path', config('excel.exports.temp_path', storage_path('framework/laravel-excel'))),
                config('excel.temporary_files.remote_disk')
              );

        $readerType = FileTypeDetector::detect($request->file('file'));
        $reader = new ExcelReader($tempFile, new NullTransactionHandler());
        $fileData = $reader->toArray(new PilotsImport, $request->file('file'), 'Xlsx');
        $rows = $reader->getTotalRows();
        $definedSheetNames = array_keys($rows);

        //$result = $this->_formatSpreadsheets($fileData, $vizinfo, $definedSheetNames);
        $response = [
            'sheetNames' => $definedSheetNames,
            'sheetsData' => $fileData,
        ];

        return $response;
        //response(['Workbook' => $response], 200);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pilot = User::with('pilot_detail')
                        ->with('address')
                        ->where('id',$id)
                        ->where('type','pilot')
                        ->first()
                        ->toArray();

        $industry_ids = explode(",",$pilot['industry_id']);
        $industry = Industry::whereIn('id', $industry_ids)->get();
        $industryArr = [];
        foreach($industry as $ind){
            $industryArr[$ind->id] = $ind->name;
        }
        $pilot['industry'] = $industryArr; 
        
        return response(['data' => $pilot], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $params=$request->all();
        $otherLicensesName = [];
        if( isset($params['other_licenses']) && !empty($params['other_licenses']) ){
            foreach ($params['other_licenses'] as $key => $value) {
                $otherUploadedFile = $value;
                $other_license = $params['user_id'].'-'.$key.'-pilot-other-license.'.$otherUploadedFile->getClientOriginalExtension();  
                $otherUploadedFile->move(public_path('licenses'), $other_license);
                $other_licenses_name = 'licenses/'.$other_license;

                $otherLicensesName[] = $other_licenses_name;
            }
            $params['other_licenses'] = json_encode($otherLicensesName);
        }

        if( isset($params['gov_license']) && !empty($params['gov_license']) ){
            $govUploadedFile = $request->file('gov_license');
            $gov_license = $params['user_id'].'-pilot-gov-license.'.$govUploadedFile->getClientOriginalExtension();  
            $govUploadedFile->move(public_path('licenses'), $gov_license);
            $params['gov_license'] = 'licenses/'.$gov_license; 
        }

        if( isset($params['pilot_license']) && !empty($params['pilot_license']) ){
            $uploadedFile = $request->file('pilot_license');
            $pilot_license = $params['user_id'].'-pilot-licenses.'.$uploadedFile->getClientOriginalExtension();  
            $uploadedFile->move(public_path('licenses'), $pilot_license);
            $params['pilot_license'] = 'licenses/'.$pilot_license;
        }
        if ( isset($params['gov_license']) && !empty($params['gov_license']) ) {
            $pilot = PilotDetails::updateOrCreate(['user_id'=>$params['user_id']],
            [
                'user_id'=>$params['user_id'],
                'gov_license'=>$params['gov_license'],
                'pilot_license'=>$params['pilot_license'],
                'other_licenses'=>$params['other_licenses'],
            ]);
        }
        
        $user = User::find($params['user_id']);
        $user->update($params);
        return response()->json(['success'=>'Pilot Varification Details Uploaded Successfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
