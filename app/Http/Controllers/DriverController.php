<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Carbon\Carbon;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDriver()
    {

        $licenseNumber = Input::get('strLicenseNumber');
        $driver = DB::table('tblDriver')
            ->join('tblLicenseType', 'tblLicenseType.intLicenseId','=' ,'tblDriver.intLicenseType')
            ->select('strDrivFname', 'strDrivLname', 'datExpiration', 'strDrivLicense', 'strLicenseType')
            ->where('strDrivLicense', $licenseNumber)
            ->first();
        if (is_null($driver)){
            return response()->json(false);
        }
        $restriction = DB::table('tblDriverRestriction')
            ->select('intDRRestId')
            ->where('strDRLicense', $licenseNumber)
            ->get();

        $driver->strDate = (new Carbon($driver->datExpiration))->toFormattedDateString();
        $driver->restriction = $restriction;

        return response()->json($driver);
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
        try{
            DB::beginTransaction();

            $id = DB::table('tblDriver')->insertGetId([
                'strDrivLicense' => $request->strDrivLicense,
                'strDrivAccNo' => $request->strDrivAccNo,
                'strDrivUname' => $request->strDrivUname,
                'strDrivPword' => $request->strDrivPword,
                'strDrivFname' => $request->strDrivFname,
                'strDrivLname' => $request->strDrivLname,
                'strDrivMname' => $request->strDrivMname,
                'intLicenseType' => $request->intLicenseType,
            ]);

            foreach ($request->arrRestriction as $value) {
                DB::table('tblDriverRestriction')->insert([
                    'intDRRestId' => $value,
                    'strDRLicense' => $request->strDrivLicense
                ]);
            }

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDriver(Request $request)
    {
        try{
            DB::beginTransaction();
            //$driverID = $request->session()->get('id');
            $driverID = 13;
            $licenseNumber = DB::table('tblDriver')
                ->select('strDrivLicense')
                ->where('intDrivId', $driverID)
                ->first();

            DB::table('tblDriver')
                ->where('intDrivId', $driverID)
                ->update([
                    'strDrivAccNo' => $request->strDrivAccNo,
                    'strDrivUname' => $request->strDrivUname,
                    'strDrivPword' => $request->strDrivPword,
                    'strDrivFname' => $request->strDrivFname,
                    'strDrivLname' => $request->strDrivLname,
                    'strDrivMname' => $request->strDrivMname,
                    'intLicenseType' => $request->intLicenseType,
                ]);

            DB::table('tblDriverRestriction')->where('strDRLicense', $licenseNumber->strDrivLicense)->delete();
            
            foreach ($request->arrRestriction as $value) {
                DB::table('tblDriverRestriction')->insert([
                    'intDRRestId' => $value,
                    'strDRLicense' => $licenseNumber->strDrivLicense
                ]);
            }

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
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
