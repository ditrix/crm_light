<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DealRequest;
use App\Http\Resources\DealResouce;
use App\Models\Deal;
use Illuminate\Http\Request;

class DealController extends Controller
{
    public function index()
    {
        return DealResouce::collection(Deal::all());
    }

    public function store(DealRequest $request)
    {
        $deal = Deal::create($request->validated());

        return new DealResouce($deal);
    }

    public function show(Deal $deal)
    {
        return new DealResouce($deal);
    }

    public function update(Request $request, Deal $deal)
    {
        $deal->update($request->validate());
        return new DealResouce($deal);
    }

    public function destroy(Deal $deal)
    {
        $deal->delete();

        return response()->noContent();
    }
}
