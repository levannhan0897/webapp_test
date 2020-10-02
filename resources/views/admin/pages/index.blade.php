@extends('admin.layout.index')
@section('content')
<div class="content-i">
   <div class="content-box">
       <div class="row">
           <div class="col-sm-12 col-xxxl-9">
               <div class="element-wrapper">
                   <h6 class="element-header">
                       Revenue
                   </h6>
                   <div class="element-box">
                       <div class="os-tabs-w">
                           <div class="os-tabs-controls">
                               <ul class="nav nav-tabs smaller">
                                   <li class="nav-item">
                                       <a class="nav-link active" data-toggle="tab" href="#tab_overview">Overview</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" data-toggle="tab" href="#tab_sales">Sales</a>
                                   </li>
                               </ul>
                               <ul class="nav nav-pills smaller d-none d-md-flex">
                                   <li class="nav-item">
                                       <a class="nav-link" data-toggle="tab" href="#">Today</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link active" data-toggle="tab" href="#">7 Days</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" data-toggle="tab" href="#">14 Days</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" data-toggle="tab" href="#">Last Month</a>
                                   </li>
                               </ul>
                           </div>
                           <div class="tab-content">
                               <div class="tab-pane active" id="tab_overview">
                                   <div class="el-tablo bigger">
                                       <div class="label">
                                           Unique Visitors
                                       </div>
                                       <div class="value">
                                           12,537
                                       </div>
                                   </div>
                                   <div class="el-chart-w"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                       <canvas height="201" id="lineChart" width="805" class="chartjs-render-monitor" style="display: block; width: 805px; height: 201px;"></canvas>
                                   </div>
                               </div>
                               <div class="tab-pane" id="tab_sales"></div>
                               <div class="tab-pane" id="tab_conversion"></div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="d-none d-xxxl-block col-xxxl-3">
               <div class="element-wrapper">
                   <h6 class="element-header">
                       Visitors by Browser
                   </h6>
                   <div class="element-box less-padding">
                       <div class="el-chart-w"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                           <canvas height="244" id="donutChart1" width="244" class="chartjs-render-monitor" style="display: block; width: 244px; height: 244px;"></canvas>
                           <div class="inside-donut-chart-label">
                               <strong>1,248</strong><span>Visitors</span>
                           </div>
                       </div>
                       <div class="el-legend condensed">
                           <div class="row">
                               <div class="col-auto col-xxxxl-6 ml-sm-auto mr-sm-auto">
                                   <div class="legend-value-w">
                                       <div class="legend-pin legend-pin-squared" style="background-color: #6896f9;"></div>
                                       <div class="legend-value">
                                           <span>Safari</span>
                                           <div class="legend-sub-value">
                                               17%, 12 Visits
                                           </div>
                                       </div>
                                   </div>
                                   <div class="legend-value-w">
                                       <div class="legend-pin legend-pin-squared" style="background-color: #85c751;"></div>
                                       <div class="legend-value">
                                           <span>Chrome</span>
                                           <div class="legend-sub-value">
                                               22%, 763 Visits
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-sm-6 d-none d-xxxxl-block">
                                   <div class="legend-value-w">
                                       <div class="legend-pin legend-pin-squared" style="background-color: #806ef9;"></div>
                                       <div class="legend-value">
                                           <span>Firefox</span>
                                           <div class="legend-sub-value">
                                               3%, 7 Visits
                                           </div>
                                       </div>
                                   </div>
                                   <div class="legend-value-w">
                                       <div class="legend-pin legend-pin-squared" style="background-color: #d97b70;"></div>
                                       <div class="legend-value">
                                           <span>Explorer</span>
                                           <div class="legend-sub-value">
                                               15%, 45 Visits
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="row">
           <div class="col-sm-12 col-xxxl-9">
               <div class="element-wrapper">
                   <h6 class="element-header">
                       Systems
                   </h6>
                   <div class="element-box">
                       <div class="os-tabs-w">
                           <div class="os-tabs-controls">
                               <ul class="nav nav-tabs smaller">
                                   <li class="nav-item">
                                       <a class="nav-link active" data-toggle="tab" href="#tab_overview">Overview</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" data-toggle="tab" href="#tab_sales">Sales</a>
                                   </li>
                               </ul>
                               <ul class="nav nav-pills smaller d-none d-md-flex">
                                   <li class="nav-item">
                                       <a class="nav-link" data-toggle="tab" href="#">Today</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link active" data-toggle="tab" href="#">7 Days</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" data-toggle="tab" href="#">14 Days</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" data-toggle="tab" href="#">Last Month</a>
                                   </li>
                               </ul>
                           </div>
                           <div class="tab-content">
                               <div class="tab-pane active" id="tab_overview">
                                   <div class="el-tablo bigger">
                                       <div class="label">
                                           Unique Visitors
                                       </div>
                                       <div class="value">
                                           12,537
                                       </div>
                                   </div>
                                   <div class="el-chart-w"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                       <canvas height="201" id="lineChart" width="805" class="chartjs-render-monitor" style="display: block; width: 805px; height: 201px;"></canvas>
                                   </div>
                               </div>
                               <div class="tab-pane" id="tab_sales"></div>
                               <div class="tab-pane" id="tab_conversion"></div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="d-none d-xxxl-block col-xxxl-3">
               <div class="element-wrapper">
                   <h6 class="element-header">
                       Visitors by Browser
                   </h6>
                   <div class="element-box less-padding">
                       <div class="el-chart-w"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                           <canvas height="244" id="donutChart1" width="244" class="chartjs-render-monitor" style="display: block; width: 244px; height: 244px;"></canvas>
                           <div class="inside-donut-chart-label">
                               <strong>1,248</strong><span>Visitors</span>
                           </div>
                       </div>
                       <div class="el-legend condensed">
                           <div class="row">
                               <div class="col-auto col-xxxxl-6 ml-sm-auto mr-sm-auto">
                                   <div class="legend-value-w">
                                       <div class="legend-pin legend-pin-squared" style="background-color: #6896f9;"></div>
                                       <div class="legend-value">
                                           <span>Safari</span>
                                           <div class="legend-sub-value">
                                               17%, 12 Visits
                                           </div>
                                       </div>
                                   </div>
                                   <div class="legend-value-w">
                                       <div class="legend-pin legend-pin-squared" style="background-color: #85c751;"></div>
                                       <div class="legend-value">
                                           <span>Chrome</span>
                                           <div class="legend-sub-value">
                                               22%, 763 Visits
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-sm-6 d-none d-xxxxl-block">
                                   <div class="legend-value-w">
                                       <div class="legend-pin legend-pin-squared" style="background-color: #806ef9;"></div>
                                       <div class="legend-value">
                                           <span>Firefox</span>
                                           <div class="legend-sub-value">
                                               3%, 7 Visits
                                           </div>
                                       </div>
                                   </div>
                                   <div class="legend-value-w">
                                       <div class="legend-pin legend-pin-squared" style="background-color: #d97b70;"></div>
                                       <div class="legend-value">
                                           <span>Explorer</span>
                                           <div class="legend-sub-value">
                                               15%, 45 Visits
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="row">
           <div class="col-sm-12 col-xxxl-9">
               <div class="element-wrapper">
                   <h6 class="element-header">
                       System Size (kW)
                   </h6>
                   <div class="element-box">
                       <div class="os-tabs-w">
                           <div class="os-tabs-controls">
                               <ul class="nav nav-tabs smaller">
                                   <li class="nav-item">
                                       <a class="nav-link active" data-toggle="tab" href="#tab_overview">Overview</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" data-toggle="tab" href="#tab_sales">Sales</a>
                                   </li>
                               </ul>
                               <ul class="nav nav-pills smaller d-none d-md-flex">
                                   <li class="nav-item">
                                       <a class="nav-link" data-toggle="tab" href="#">Today</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link active" data-toggle="tab" href="#">7 Days</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" data-toggle="tab" href="#">14 Days</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" data-toggle="tab" href="#">Last Month</a>
                                   </li>
                               </ul>
                           </div>
                           <div class="tab-content">
                               <div class="tab-pane active" id="tab_overview">
                                   <div class="el-tablo bigger">
                                       <div class="label">
                                           Unique Visitors
                                       </div>
                                       <div class="value">
                                           12,537
                                       </div>
                                   </div>
                                   <div class="el-chart-w"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                       <canvas height="201" id="lineChart" width="805" class="chartjs-render-monitor" style="display: block; width: 805px; height: 201px;"></canvas>
                                   </div>
                               </div>
                               <div class="tab-pane" id="tab_sales"></div>
                               <div class="tab-pane" id="tab_conversion"></div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="d-none d-xxxl-block col-xxxl-3">
               <div class="element-wrapper">
                   <h6 class="element-header">
                       Visitors by Browser
                   </h6>
                   <div class="element-box less-padding">
                       <div class="el-chart-w"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                           <canvas height="244" id="donutChart1" width="244" class="chartjs-render-monitor" style="display: block; width: 244px; height: 244px;"></canvas>
                           <div class="inside-donut-chart-label">
                               <strong>1,248</strong><span>Visitors</span>
                           </div>
                       </div>
                       <div class="el-legend condensed">
                           <div class="row">
                               <div class="col-auto col-xxxxl-6 ml-sm-auto mr-sm-auto">
                                   <div class="legend-value-w">
                                       <div class="legend-pin legend-pin-squared" style="background-color: #6896f9;"></div>
                                       <div class="legend-value">
                                           <span>Safari</span>
                                           <div class="legend-sub-value">
                                               17%, 12 Visits
                                           </div>
                                       </div>
                                   </div>
                                   <div class="legend-value-w">
                                       <div class="legend-pin legend-pin-squared" style="background-color: #85c751;"></div>
                                       <div class="legend-value">
                                           <span>Chrome</span>
                                           <div class="legend-sub-value">
                                               22%, 763 Visits
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-sm-6 d-none d-xxxxl-block">
                                   <div class="legend-value-w">
                                       <div class="legend-pin legend-pin-squared" style="background-color: #806ef9;"></div>
                                       <div class="legend-value">
                                           <span>Firefox</span>
                                           <div class="legend-sub-value">
                                               3%, 7 Visits
                                           </div>
                                       </div>
                                   </div>
                                   <div class="legend-value-w">
                                       <div class="legend-pin legend-pin-squared" style="background-color: #d97b70;"></div>
                                       <div class="legend-value">
                                           <span>Explorer</span>
                                           <div class="legend-sub-value">
                                               15%, 45 Visits
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="row">
           <div class="col-sm-12 col-xxxl-9">
               <div class="element-wrapper">
                   <h6 class="element-header">
                       Potential Carbon Savings
                   </h6>
                   <div class="element-box">
                       <div class="os-tabs-w">
                           <div class="os-tabs-controls">
                               <ul class="nav nav-tabs smaller">
                                   <li class="nav-item">
                                       <a class="nav-link active" data-toggle="tab" href="#tab_overview">Overview</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" data-toggle="tab" href="#tab_sales">Sales</a>
                                   </li>
                               </ul>
                               <ul class="nav nav-pills smaller d-none d-md-flex">
                                   <li class="nav-item">
                                       <a class="nav-link" data-toggle="tab" href="#">Today</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link active" data-toggle="tab" href="#">7 Days</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" data-toggle="tab" href="#">14 Days</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" data-toggle="tab" href="#">Last Month</a>
                                   </li>
                               </ul>
                           </div>
                           <div class="tab-content">
                               <div class="tab-pane active" id="tab_overview">
                                   <div class="el-tablo bigger">
                                       <div class="label">
                                           Unique Visitors
                                       </div>
                                       <div class="value">
                                           12,537
                                       </div>
                                   </div>
                                   <div class="el-chart-w"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                       <canvas height="201" id="lineChart" width="805" class="chartjs-render-monitor" style="display: block; width: 805px; height: 201px;"></canvas>
                                   </div>
                               </div>
                               <div class="tab-pane" id="tab_sales"></div>
                               <div class="tab-pane" id="tab_conversion"></div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="d-none d-xxxl-block col-xxxl-3">
               <div class="element-wrapper">
                   <h6 class="element-header">
                       Visitors by Browser
                   </h6>
                   <div class="element-box less-padding">
                       <div class="el-chart-w"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                           <canvas height="244" id="donutChart1" width="244" class="chartjs-render-monitor" style="display: block; width: 244px; height: 244px;"></canvas>
                           <div class="inside-donut-chart-label">
                               <strong>1,248</strong><span>Visitors</span>
                           </div>
                       </div>
                       <div class="el-legend condensed">
                           <div class="row">
                               <div class="col-auto col-xxxxl-6 ml-sm-auto mr-sm-auto">
                                   <div class="legend-value-w">
                                       <div class="legend-pin legend-pin-squared" style="background-color: #6896f9;"></div>
                                       <div class="legend-value">
                                           <span>Safari</span>
                                           <div class="legend-sub-value">
                                               17%, 12 Visits
                                           </div>
                                       </div>
                                   </div>
                                   <div class="legend-value-w">
                                       <div class="legend-pin legend-pin-squared" style="background-color: #85c751;"></div>
                                       <div class="legend-value">
                                           <span>Chrome</span>
                                           <div class="legend-sub-value">
                                               22%, 763 Visits
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-sm-6 d-none d-xxxxl-block">
                                   <div class="legend-value-w">
                                       <div class="legend-pin legend-pin-squared" style="background-color: #806ef9;"></div>
                                       <div class="legend-value">
                                           <span>Firefox</span>
                                           <div class="legend-sub-value">
                                               3%, 7 Visits
                                           </div>
                                       </div>
                                   </div>
                                   <div class="legend-value-w">
                                       <div class="legend-pin legend-pin-squared" style="background-color: #d97b70;"></div>
                                       <div class="legend-value">
                                           <span>Explorer</span>
                                           <div class="legend-sub-value">
                                               15%, 45 Visits
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection