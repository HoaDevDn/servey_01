<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Charts;

class ChartController extends Controller
{
    public function index()
    {
        Charts::new('donut', 'highcharts')
            ->setTitle('My nice chart')
            ->setLabels(['First', 'Second', 'Third'])
            ->setValues([5,10,20])
            ->setDimensions(1000,500)
            ->setResponsive(false);
        // return view('survey.chart-result', ['chart' => $chart]);
    }
}
