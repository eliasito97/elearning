@extends('backend.layouts.app')
@section('title', 'Admin Dashboard')

@push('styles')
<link rel="stylesheet" href="{{asset('public/vendor/jqvmap/css/jqvmap.min.css')}}">
<link rel="stylesheet" href="{{asset('public/vendor/chartist/css/chartist.min.css')}}">
<link rel="stylesheet" href="{{asset('public/css/skin-2.css')}}">
@endpush

@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-primary overflow-hidden">
                    <div class="card-header">
                        <h3 class="card-title text-white">{{__('Total Students')}}</h3>
                        <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i>{{$student->count()}}</h5>
                    </div>
                    <div class="card-body text-center mt-3">
                        <div class="ico-sparkline"
                             style="height: 170px;
                             width: 170px;
                             margin-top: -42px;
                             margin-left: 72px;">
                            <canvas id="pie123"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-success overflow-hidden">
                    <div class="card-header">
                        <h3 class="card-title text-white">{{__('New Students')}}</h3>
                        <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 357</h5>
                    </div>
                    <div class="card-body text-center mt-4 p-0">
                        <div class="ico-sparkline">
                            <div id="spark-bar-2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-secondary overflow-hidden">
                    <div class="card-header pb-3">
                        <h3 class="card-title text-white">{{__('Total Course')}}</h3>
                        <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> {{$course->count()}}</h5>
                    </div>
                    <div class="card-body p-0 mt-2">
                        <div class="px-4"><span id="bar1"
                                data-peity='{ "fill": ["rgb(0, 0, 128)", "rgb(7, 135, 234)"]}'>6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-danger overflow-hidden">
                    <div class="card-header pb-3">
                        <h3 class="card-title text-white">{{__('Subscription Collection')}}</h3>
                        <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i>{{$totalAmount}}</h5>
                    </div>
                    <div class="card-body p-0 mt-1">
                        <span class="peity-line-2" data-width="100%">7,6,8,7,3,8,3,3,6,5,9,2,8</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-6 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{__('New Students')}}</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart_222"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-6 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{__('Income Report')}}</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="areaChart_123"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-xxl-8 col-lg-8 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{__('Courses List')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-hover verticle-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{__('Courses')}}</th>
                                        <th scope="col">{{__('Assigned Professors')}}</th>
                                        <th scope="col">{{__('Status')}}</th>
                                        <th scope="col">{{__('Category_name')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($course as $c)
                                    <tr>
                                        <th>{{$c->id}}</th>
                                        <td>{{$c->title_en}}</td>
                                        <td>{{$c->instructor->name.' '.$c->instructor->lastname}} {{$c->instructor->title_bn}}</td>
                                        <td>
                                             <span class="badge badge-rounded
                                             {{ $c->status == 2 ? 'badge-primary' : ($c->status == 1 ? 'badge-danger' : 'badge-warning') }}">
                                             {{ $c->status == 2 ? __('Active') : ($c->status == 1 ? __('Inactive') : 'Pending') }}
                                             </span>
                                        </td>
                                        <td>{{$c->courseCategory->category_name}}</td>
                                    </tr>
{{--                                    <tr>--}}
{{--                                        <th>2</th>--}}
{{--                                        <td>Fees Collection report</td>--}}
{{--                                        <td>Emma Watson</td>--}}
{{--                                        <td><span class="badge badge-rounded badge-warning">Panding</span></td>--}}
{{--                                        <td>--}}
{{--                                            <div class="progress">--}}
{{--                                                <div class="progress-bar bg-warning" style="width: 70%;"--}}
{{--                                                    role="progressbar">--}}
{{--                                                    <span class="sr-only">70% Complete</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>3</th>--}}
{{--                                        <td>Management report</td>--}}
{{--                                        <td>Mary Adams</td>--}}
{{--                                        <td><span class="badge badge-rounded badge-warning">Panding</span></td>--}}
{{--                                        <td>--}}
{{--                                            <div class="progress">--}}
{{--                                                <div class="progress-bar bg-warning" style="width: 70%;"--}}
{{--                                                    role="progressbar">--}}
{{--                                                    <span class="sr-only">70% Complete</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>4</th>--}}
{{--                                        <td>Library book status</td>--}}
{{--                                        <td>Caleb Richards</td>--}}
{{--                                        <td><span class="badge badge-rounded badge-danger">Suspended</span></td>--}}
{{--                                        <td>--}}
{{--                                            <div class="progress">--}}
{{--                                                <div class="progress-bar bg-danger" style="width: 70%;"--}}
{{--                                                    role="progressbar">--}}
{{--                                                    <span class="sr-only">70% Complete</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>5</th>--}}
{{--                                        <td>Placement status</td>--}}
{{--                                        <td>June Lane</td>--}}
{{--                                        <td><span class="badge badge-rounded badge-warning">Panding</span></td>--}}
{{--                                        <td>--}}
{{--                                            <div class="progress">--}}
{{--                                                <div class="progress-bar bg-warning" style="width: 70%;"--}}
{{--                                                    role="progressbar">--}}
{{--                                                    <span class="sr-only">70% Complete</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>6</th>--}}
{{--                                        <td>Working Design report</td>--}}
{{--                                        <td>Herman Beck</td>--}}
{{--                                        <td><span class="badge badge-rounded badge-primary">DONE</span></td>--}}
{{--                                        <td>--}}
{{--                                            <div class="progress">--}}
{{--                                                <div class="progress-bar" style="width: 70%;" role="progressbar">--}}
{{--                                                    <span class="sr-only">70% Complete</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Notifications') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="widget-todo dz-scroll" style="height:370px;" id="DZ_W_Notifications">
                            <ul class="timeline">
                                @foreach($user as $u)
                                <li>
                                    <div class="timeline-badge primary"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                        href="javascript:void(0);">
                                        <img class="rounded-circle" alt="image" width="50"
                                            src="{{asset('public/uploads/users/'.$u->image)}}">
                                        <div class="col">
                                            <h5 class="mb-1">{{$u->name}} {{$u->lastname}}</h5>
                                            <small class="d-block">{{$u->created_at}}</small>
                                            <small class="d-block">{{$u->Role->name}}</small>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
{{--                                <li>--}}
{{--                                    <div class="timeline-badge warning"></div>--}}
{{--                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center"--}}
{{--                                        href="javascript:void(0);">--}}
{{--                                        <img class="rounded-circle" alt="image" width="50"--}}
{{--                                            src="{{asset('public/images/profile/education/pic2.jpg')}}">--}}
{{--                                        <div class="col">--}}
{{--                                            <h5 class="mb-1">Resport created successfully</h5>--}}
{{--                                            <small class="d-block">29 July 2020 - 02:26 PM</small>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="timeline-badge danger"></div>--}}
{{--                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center"--}}
{{--                                        href="javascript:void(0);">--}}
{{--                                        <img class="rounded-circle" alt="image" width="50"--}}
{{--                                            src="{{asset('public/images/profile/education/pic3.jpg')}}">--}}
{{--                                        <div class="col">--}}
{{--                                            <h5 class="mb-1">Reminder : Treatment Time!</h5>--}}
{{--                                            <small class="d-block">29 July 2020 - 02:26 PM</small>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="timeline-badge success"></div>--}}
{{--                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center"--}}
{{--                                        href="javascript:void(0);">--}}
{{--                                        <img class="rounded-circle" alt="image" width="50"--}}
{{--                                            src="{{asset('public/images/profile/education/pic4.jpg')}}">--}}
{{--                                        <div class="col">--}}
{{--                                            <h5 class="mb-1">Dr sultads Send you Photo</h5>--}}
{{--                                            <small class="d-block">29 July 2020 - 02:26 PM</small>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="timeline-badge warning"></div>--}}
{{--                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center"--}}
{{--                                        href="javascript:void(0);">--}}
{{--                                        <img class="rounded-circle" alt="image" width="50"--}}
{{--                                            src="{{asset('public/images/profile/education/pic5.jpg')}}">--}}
{{--                                        <div class="col">--}}
{{--                                            <h5 class="mb-1">Resport created successfully</h5>--}}
{{--                                            <small class="d-block">29 July 2020 - 02:26 PM</small>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="timeline-badge dark"></div>--}}
{{--                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center"--}}
{{--                                        href="javascript:void(0);">--}}
{{--                                        <img class="rounded-circle" alt="image" width="50"--}}
{{--                                            src="{{asset('public/images/profile/education/pic6.jpg')}}">--}}
{{--                                        <div class="col">--}}
{{--                                            <h5 class="mb-1">Reminder : Treatment Time!</h5>--}}
{{--                                            <small class="d-block">29 July 2020 - 02:26 PM</small>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="timeline-badge info"></div>--}}
{{--                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center"--}}
{{--                                        href="javascript:void(0);">--}}
{{--                                        <img class="rounded-circle" alt="image" width="50"--}}
{{--                                            src="{{asset('public/images/profile/education/pic7.jpg')}}">--}}
{{--                                        <div class="col">--}}
{{--                                            <h5 class="mb-1">Dr sultads Send you Photo</h5>--}}
{{--                                            <small class="d-block">29 July 2020 - 02:26 PM</small>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="timeline-badge danger"></div>--}}
{{--                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center"--}}
{{--                                        href="javascript:void(0);">--}}
{{--                                        <img class="rounded-circle" alt="image" width="50"--}}
{{--                                            src="{{asset('public/images/profile/education/pic8.jpg')}}">--}}
{{--                                        <div class="col">--}}
{{--                                            <h5 class="mb-1">Resport created successfully</h5>--}}
{{--                                            <small class="d-block">29 July 2020 - 02:26 PM</small>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="timeline-badge success"></div>--}}
{{--                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center"--}}
{{--                                        href="javascript:void(0);">--}}
{{--                                        <img class="rounded-circle" alt="image" width="50"--}}
{{--                                            src="{{asset('public/images/profile/education/pic9.jpg')}}">--}}
{{--                                        <div class="col">--}}
{{--                                            <h5 class="mb-1">Reminder : Treatment Time!</h5>--}}
{{--                                            <small class="d-block">29 July 2020 - 02:26 PM</small>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="timeline-badge warning"></div>--}}
{{--                                    <a class="timeline-panel text-muted d-flex align-items-center"--}}
{{--                                        href="javascript:void(0);">--}}
{{--                                        <img class="rounded-circle" alt="image" width="50"--}}
{{--                                            src="{{asset('public/images/profile/education/pic10.jpg')}}">--}}
{{--                                        <div class="col">--}}
{{--                                            <h5 class="mb-1">Dr sultads Send you Photo</h5>--}}
{{--                                            <small class="d-block">29 July 2020 - 02:26 PM</small>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('New Student List') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm mb-0 table-striped">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-3">{{ __('Full Name') }}</th>
{{--                                        <th class="py-3">{{ __('Assigned Professor') }}</th>--}}
                                        <th class="py-3">{{ __('Branch') }}</th>
                                        <th class="py-3">{{ __('Status') }}</th>
                                        <th class="py-3">{{ __('Date Of Admit') }}</th>
                                        <th class="py-3">{{ __('Edit') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="customers">
                                @foreach($student as $us)
                                    <tr class="btn-reveal-trigger">

                                        <td class="p-3">
                                            <a href="javascript:void(0);">
                                                <div class="media d-flex align-items-center">
                                                    <div class="avatar avatar-xl mr-2">
                                                        <img class="rounded-circle img-fluid"
                                                             src="{{asset('public/uploads/users/'.$us->image)}}" width="30"
                                                            alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-0 fs--1">{{$us->name}} {{$us->lastname}}</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
{{--                                        <td class="py-2">Herman Beck</td>--}}
                                        <td class="py-2">{{$us->profession}}</td>
                                        <td>    <span class="badge badge-rounded
                                              {{ $us->status == 1 ? 'badge-primary' : 'badge-danger' }}">
                                              {{ $us->status == 1 ? __('Active') : __('Inactive') }}
                                                </span></td>
                                        <td class="py-2">{{$us->created_at}}</td>
                                        <td>
                                            <a href="{{route('student.edit', encryptor('encrypt',$us->id))}}" class="btn btn-sm btn-primary"><i
                                                    class="la la-pencil"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                    class="la la-trash-o"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
{{--                                    <tr class="btn-reveal-trigger">--}}
{{--                                        <td class="p-3">--}}
{{--                                            <a href="javascript:void(0);">--}}
{{--                                                <div class="media d-flex align-items-center">--}}
{{--                                                    <div class="avatar avatar-xl mr-2">--}}
{{--                                                        <img class="rounded-circle img-fluid"--}}
{{--                                                            src="{{asset('public/images/avatar/1.png')}}" alt=""--}}
{{--                                                            width="30">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <h5 class="mb-0 fs--1">Emma Watson</h5>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                        <td class="py-2">Emma Watson</td>--}}
{{--                                        <td class="py-2">Computer</td>--}}
{{--                                        <td><span class="badge badge-rounded badge-warning">Panding</span></td>--}}
{{--                                        <td class="py-2">11/07/2017</td>--}}
{{--                                        <td>--}}
{{--                                            <a href="edit-student.html" class="btn btn-sm btn-primary"><i--}}
{{--                                                    class="la la-pencil"></i></a>--}}
{{--                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i--}}
{{--                                                    class="la la-trash-o"></i></a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr class="btn-reveal-trigger">--}}
{{--                                        <td class="p-3">--}}
{{--                                            <a href="javascript:void(0);">--}}
{{--                                                <div class="media d-flex align-items-center">--}}
{{--                                                    <div class="avatar avatar-xl mr-2">--}}
{{--                                                        <img class="rounded-circle img-fluid"--}}
{{--                                                            src="{{asset('public/images/avatar/5.png')}}" width="30"--}}
{{--                                                            alt="">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <h5 class="mb-0 fs--1">Rowen Atkinson</h5>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                        <td class="py-2">Mary Adams</td>--}}
{{--                                        <td class="py-2">Mechanical</td>--}}
{{--                                        <td><span class="badge badge-rounded badge-primary">DONE</span></td>--}}
{{--                                        <td class="py-2">05/04/2016</td>--}}
{{--                                        <td>--}}
{{--                                            <a href="edit-student.html" class="btn btn-sm btn-primary"><i--}}
{{--                                                    class="la la-pencil"></i></a>--}}
{{--                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i--}}
{{--                                                    class="la la-trash-o"></i></a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr class="btn-reveal-trigger">--}}
{{--                                        <td class="p-3">--}}
{{--                                            <a href="javascript:void(0);">--}}
{{--                                                <div class="media d-flex align-items-center">--}}
{{--                                                    <div class="avatar avatar-xl mr-2">--}}
{{--                                                        <img class="rounded-circle img-fluid"--}}
{{--                                                            src="{{asset('public/images/avatar/1.png')}}" alt=""--}}
{{--                                                            width="30">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <h5 class="mb-0 fs--1">Antony Hopkins</h5>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                        <td class="py-2">Caleb Richards </td>--}}
{{--                                        <td class="py-2">Computer </td>--}}
{{--                                        <td><span class="badge badge-rounded badge-danger">Suspended</span></td>--}}
{{--                                        <td class="py-2">05/04/2018</td>--}}
{{--                                        <td>--}}
{{--                                            <a href="edit-student.html" class="btn btn-sm btn-primary"><i--}}
{{--                                                    class="la la-pencil"></i></a>--}}
{{--                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i--}}
{{--                                                    class="la la-trash-o"></i></a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr class="btn-reveal-trigger">--}}
{{--                                        <td class="p-3">--}}
{{--                                            <a href="javascript:void(0);">--}}
{{--                                                <div class="media d-flex align-items-center">--}}
{{--                                                    <div class="avatar avatar-xl mr-2">--}}
{{--                                                        <img class="rounded-circle img-fluid"--}}
{{--                                                            src="{{asset('public/images/avatar/1.png')}}" alt=""--}}
{{--                                                            width="30">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <h5 class="mb-0 fs--1">Jennifer Schramm</h5>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                        <td class="py-2">June Lane</td>--}}
{{--                                        <td class="py-2">Fees Collection</td>--}}
{{--                                        <td><span class="badge badge-rounded badge-warning">Panding</span></td>--}}
{{--                                        <td class="py-2">17/03/2016</td>--}}
{{--                                        <td>--}}
{{--                                            <a href="edit-student.html" class="btn btn-sm btn-primary"><i--}}
{{--                                                    class="la la-pencil"></i></a>--}}
{{--                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i--}}
{{--                                                    class="la la-trash-o"></i></a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr class="btn-reveal-trigger">--}}
{{--                                        <td class="p-3">--}}
{{--                                            <a href="javascript:void(0);">--}}
{{--                                                <div class="media d-flex align-items-center">--}}
{{--                                                    <div class="avatar avatar-xl mr-2">--}}
{{--                                                        <img class="rounded-circle img-fluid"--}}
{{--                                                            src="{{asset('public/images/avatar/5.png')}}" width="30"--}}
{{--                                                            alt="">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <h5 class="mb-0 fs--1">Raymond Mims</h5>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                        <td class="py-2">Herman Beck</td>--}}
{{--                                        <td class="py-2">Computer</td>--}}
{{--                                        <td><span class="badge badge-rounded badge-danger">Suspended</span></td>--}}
{{--                                        <td class="py-2">12/07/2014</td>--}}
{{--                                        <td>--}}
{{--                                            <a href="edit-student.html" class="btn btn-sm btn-primary"><i--}}
{{--                                                    class="la la-pencil"></i></a>--}}
{{--                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i--}}
{{--                                                    class="la la-trash-o"></i></a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr class="btn-reveal-trigger">--}}
{{--                                        <td class="p-3">--}}
{{--                                            <a href="javascript:void(0);">--}}
{{--                                                <div class="media d-flex align-items-center">--}}
{{--                                                    <div class="avatar avatar-xl mr-2">--}}
{{--                                                        <img class="rounded-circle img-fluid"--}}
{{--                                                            src="{{asset('public/images/avatar/1.png')}}" alt=""--}}
{{--                                                            width="30">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <h5 class="mb-0 fs--1">Michael Jenkins</h5>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                        <td class="py-2">Jennifer Schramm</td>--}}
{{--                                        <td class="py-2">Mechanical</td>--}}
{{--                                        <td><span class="badge badge-rounded badge-warning">Panding</span></td>--}}
{{--                                        <td class="py-2">15/06/2014</td>--}}
{{--                                        <td>--}}
{{--                                            <a href="edit-student.html" class="btn btn-sm btn-primary"><i--}}
{{--                                                    class="la la-pencil"></i></a>--}}
{{--                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i--}}
{{--                                                    class="la la-trash-o"></i></a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<!-- Chart ChartJS plugin files -->
<script src="{{asset('public/vendor/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Chart piety plugin files -->
<script src="{{asset('public/vendor/peity/jquery.peity.min.js')}}"></script>

<!-- Chart sparkline plugin files -->
<script src="{{asset('public/vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Demo scripts -->
<script src="{{asset('public/js/dashboard/dashboard-3.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Datos desde el controlador
        const data = @json($payments);
        let months = @json($months); // Array de meses en inglés recibido desde el backend

        // Invertimos el orden de los meses
        months = months.reverse();  // Esto cambiará el orden para que noviembre sea el primero

        // Inicializar arrays para los datos del gráfico
        const incomeData = Array(6).fill(0); // Ingresos inicializados a 0

        // Mapeo de los números de mes a los nombres de mes en inglés
        const monthNames = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        // Función para convertir mes de inglés a español
        function convertMonthToSpanish(monthInEnglish) {
            const monthMap = {
                "January": "Enero",
                "February": "Febrero",
                "March": "Marzo",
                "April": "Abril",
                "May": "Mayo",
                "June": "Junio",
                "July": "Julio",
                "August": "Agosto",
                "September": "Septiembre",
                "October": "Octubre",
                "November": "Noviembre",
                "December": "Diciembre"
            };

            return monthMap[monthInEnglish] || monthInEnglish; // Si no lo encuentra, devuelve el mes tal cual
        }

        // Realizamos la conversión y llenamos los ingresos
        data.forEach(item => {
            // Convertimos el mes numérico a su nombre en inglés
            const monthStringInEnglish = `${monthNames[item.month - 1]} ${item.year}`;
            const monthString2 = `${monthNames[item.month - 1]}`;
            const monthString = `${convertMonthToSpanish(monthString2)} ${item.year}`; // Convertido a español

            // Depuración: Verifica la fecha generada y los meses disponibles

            // Busca el índice en months (en inglés)
            const index = months.indexOf(monthStringInEnglish);

            if (index !== -1) {
                incomeData[index] = item.total_income;
            } else {
                console.log(`No se encontró el mes: ${monthString}`);  // Para ver los que no se encuentran
            }
        });

        // Configuración del gráfico
        const ctx = document.getElementById('areaChart_123').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: months.map(month => convertMonthToSpanish(month.split(' ')[0]) + ' ' + month.split(' ')[1]), // Aquí convertimos los meses a español para mostrar
                datasets: [{
                    label: 'Ingresos',
                    data: incomeData, // Datos de ingresos
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Datos enviados desde el controlador
        const studentStatusCounts = @json($studentforstatus);

        // Variables para contar activos e inactivos
        let activeCount = 0;
        let inactiveCount = 0;

        // Procesar los datos para obtener los conteos
        studentStatusCounts.forEach(item => {
            if (item.status === 1) {
                activeCount = item.total;
            } else if (item.status === 0) {
                inactiveCount = item.total;
            }
        });

        // Inicializar el gráfico de pastel
        const ctx = document.getElementById('pie123').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Activos', 'Inactivos'],
                datasets: [{
                    data: [activeCount, inactiveCount],
                    backgroundColor: ["#1fff3e", "#e40a23"],
                }]
            },
            options: {
                plugins: {
                    legend: {
                        labels: {
                            color: '#ffffff',
                            boxWidth: 18,

                        }
                    }
                }
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
        // Datos desde el controlador
        const data = @json($studentData);
        let months = @json($months); // Array de meses en inglés recibido desde el backend

        // Invertimos el orden de los meses
        months = months.reverse();  // Esto cambiará el orden para que noviembre sea el primero
        // Inicializar arrays para los datos del gráfico
        const incomeData = Array(6).fill(0); // Ingresos inicializados a 0

        // Mapeo de los números de mes a los nombres de mes en inglés
        const monthNames = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        // Función para convertir mes de inglés a español
        function convertMonthToSpanish(monthInEnglish) {
            const monthMap = {
                "January": "Enero",
                "February": "Febrero",
                "March": "Marzo",
                "April": "Abril",
                "May": "Mayo",
                "June": "Junio",
                "July": "Julio",
                "August": "Agosto",
                "September": "Septiembre",
                "October": "Octubre",
                "November": "Noviembre",
                "December": "Diciembre"
            };

            return monthMap[monthInEnglish] || monthInEnglish; // Si no lo encuentra, devuelve el mes tal cual
        }

        // Realizamos la conversión y llenamos los ingresos
        data.forEach(item => {
            // Convertimos el mes numérico a su nombre en inglés
            const monthStringInEnglish = `${monthNames[item.month - 1]} ${item.year}`;
            const monthString2 = `${monthNames[item.month - 1]}`;
            const monthString = `${convertMonthToSpanish(monthString2)} ${item.year}`; // Convertido a español

            // Depuración: Verifica la fecha generada y los meses disponibles

            // Busca el índice en months (en inglés)
            const index = months.indexOf(monthStringInEnglish);

            if (index !== -1) {
                incomeData[index] = item.total_income;
            } else {
                console.log(`No se encontró el mes: ${monthString}`);  // Para ver los que no se encuentran
            }
        });
            //gradient bar chart
            const barChart_2 = document.getElementById("barChart_222").getContext('2d');
            //generate gradient
            const barChart_2gradientStroke = barChart_2.createLinearGradient(0, 0, 0, 250);
            barChart_2gradientStroke.addColorStop(0, "rgba(141, 149, 255, 1)");
            barChart_2gradientStroke.addColorStop(1, "rgba(102, 115, 253, 1)");

            barChart_2.height = 100;

            new Chart(barChart_2, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: months.map(month => convertMonthToSpanish(month.split(' ')[0]) + ' ' + month.split(' ')[1]), // Aquí convertimos los meses a español para mostrar
                    datasets: [
                        {
                            label: 'Estudiantes',
                            data: incomeData, // Datos de ingresos
                            borderColor: barChart_2gradientStroke,
                            borderWidth: "0",
                            backgroundColor: barChart_2gradientStroke,
                            hoverBackgroundColor: barChart_2gradientStroke
                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }],
                        xAxes: [{
                            // Change here
                            barPercentage: 0.5
                        }]
                    }
                }
            });

    });
</script>


@endpush
