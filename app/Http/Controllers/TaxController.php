<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tax;

class TaxController extends Controller
{
    public function getIndex()
    {
        $taxes = Tax::paginate(10);
        return view('taxes.index')->withTaxes($taxes);
    }

    public function postTax(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'type' => 'required',
            'rate' => 'required|numeric',
        ]);

        $tax = new Tax;
        $tax->name = $request->get('name');
        $tax->type = $request->get('type');
        $tax->rate = $request->get('rate');
        $tax->save();

        $message = trans('core.saved');
        return redirect()->back()->withSuccess($message);
    }

    public function editTax(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'type' => 'required',
            'rate' => 'required|numeric',
        ]);

        $tax = Tax::find($request->get('id'));
        $tax->name = $request->get('name');
        $tax->type = $request->get('type');
        $tax->rate = $request->get('rate');
        $tax->save();

        $message = trans('core.changes_saved');
        return redirect()->back()->withSuccess($message);
    }

    public function deleteTax(Request $request)
    {
        $tax = Tax::find($request->get('id'));
        $tax->delete();

        $message = trans('core.deleted');
        return redirect()->route('tax.index')->withMessage($message);
    }
}
