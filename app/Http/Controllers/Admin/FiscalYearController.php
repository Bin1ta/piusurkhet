<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Faq\UpdateFaqRequest;
use App\Http\Requests\FiscalYear\StoreFiscalYearRequest;
use App\Http\Requests\FiscalYear\UpdateFiscalYearRequest;
use App\Models\FiscalYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class FiscalYearController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        abort_if(
            Gate::denies('fiscal_year_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $fiscalYears=FiscalYear::latest()->get();
        return view('admin.fiscalYear.index',compact('fiscalYears'));
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
    public function store(StoreFiscalYearRequest $request)
    {
        abort_if(
            Gate::denies('fiscal_year_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
       FiscalYear::create($request->validated());
       toast('New Fiscal Year Created Successfully','success');
       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FiscalYear $fiscalYear)
    {
        abort_if(
            Gate::denies('fiscal_year_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.fiscalYear.edit',compact('fiscalYear'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFiscalYearRequest $request,FiscalYear $fiscalYear)
    {
        abort_if(
            Gate::denies('fiscal_year_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $fiscalYear->update($request->validated());
        toast('Fiscal Year Updated Successfully','success');
        return to_route('admin.fiscalYear.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FiscalYear $fiscalYear)
    {
        abort_if(
            Gate::denies('fiscal_year_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $fiscalYear->delete();
        toast('Fiscal Year Deleted Successfully','success');
        return back();
    }
}
