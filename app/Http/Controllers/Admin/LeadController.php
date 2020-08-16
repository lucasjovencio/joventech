<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Lead\LeadService;
use App\Models\Lead;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,LeadService $leadService)
    {
        if($request->ajax()){
            return $leadService->getAllLeads($request);
        }
        return view('adm.leads.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,LeadService $leadService)
    {
        $lead = $leadService->find($id);
        $lead->update(['lido'=>true]);
        return view('adm.leads.show',['lead'=>$lead]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lead::id($id)->firstOrFail()->delete();
        return redirect()->route('lead.index')->with('success','Lead removido com sucesso!');
    }
}
