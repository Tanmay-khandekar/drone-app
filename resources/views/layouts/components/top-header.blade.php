<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!--begin::Header Menu-->
            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                
            </div>
            <!--end::Header Menu-->
        </div>
        <!--end::Header Menu Wrapper-->
        <!--begin::Topbar-->
        <div class="topbar">
            <!--begin::Notifications-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
                        <span class="svg-icon svg-icon-xl svg-icon-primary">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                            <i class="flaticon2-notification text-primary"></i>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="pulse-ring"></span>
                        @if(count(auth()->user()->unreadNotifications) !== 0) <span style="position: absolute; top: 0px; right: 0px; background-color: green; color: #ffffff; border-radius: 50%; width: 15px; font-size: 10px; height: 15px;">{{ count(auth()->user()->unreadNotifications) }}</span>@endif
                    </div>
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    <form>
                        <!--begin::Header-->
                        <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url({{ url('') }}/assets/media/misc/bg-1.jpg)">
                            <!--begin::Title-->
                            <h4 class="d-flex flex-center rounded-top">
                                <span class="text-white">User Notifications</span>
                                <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">{{ count(auth()->user()->unreadNotifications) }} new</span>
                            </h4>
                            <!--end::Title-->
                            <!--begin::Tabs-->
                            <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#topbar_notifications_events">Events</a>
                                </li>
                            </ul>
                            <!--end::Tabs-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Content-->
                        <div class="tab-content">
                            <!--begin::Tabpane-->
                            <div class="tab-pane active" id="topbar_notifications_events" role="tabpanel">
                                <!--begin::Nav-->
                                <div class="navi navi-hover scroll my-4" id="notification-list" data-scroll="true" data-height="300" data-mobile-height="200">
                                    @foreach(auth()->user()->notifications as $notification)
                                    <!--begin::Item-->
                                    <div class="navi-item">
                                        <div class="navi-link d-flex">
                                            <a href="#" class="d-flex" style="width: 70%;">
                                                <div class="navi-icon mr-2 mt-3">
                                                    <i class="flaticon2-notification text-primary"></i>
                                                </div>
                                                <div class="navi-text">
                                                    <div class="font-weight-bold"><?php print_r($notification->data['data']); ?></div>
                                                    <div class="text-muted">{{ $notification->created_at }}</div>
                                                </div>
                                            </a>
                                            <a href="{{url('mark-as-read')}}/{{$notification->id}}" class="float-right">
                                                {{ (isset($notification->read_at) && !empty($notification->read_at)) ? '' : 'mark as read' }}
                                            </a>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    @endforeach
                                </div>
                                <!--end::Nav-->
                            </div>
                            <!--end::Tabpane-->
                        </div>
                        <!--end::Content-->
                    </form>
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Notifications-->
            <!--begin::Languages-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                        <img class="h-20px w-20px rounded-sm" src="{{ env('APP_URL', 'http://drone-app.test') }}/assets/media/svg/flags/{{ Config::get('locale') }}.svg" alt="" />
                    </div>
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                    <!--begin::Nav-->
                    <ul class="navi navi-hover py-4">
                        <!--begin::Item-->
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                <li class="navi-item">
                                    <a class="navi-link language" data-code="{{$lang}}">
                                        <span class="symbol symbol-20 mr-3">
                                            <img src="{{$language['flag-icon']}}" alt="" />
                                        </span>
                                        <span class="navi-text">{{$language['display']}}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                        <li class="navi-item">
                            <a class="navi-link language" data-code="en">
                                <span class="symbol symbol-20 mr-3">
                                    <img src="{{ env('APP_URL', 'http://drone-app.test') }}/assets/media/svg/flags/en.svg" alt="" />
                                </span>
                                <span class="navi-text">English</span>
                            </a>
                        </li>
                    </ul>
                    <!--end::Nav-->
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Languages-->
            <!--begin::User-->
            <div class="topbar-item">
                <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ auth()->user()->first_name }}</span>
                    <span class="symbol symbol-35 symbol-light-success">
                        <span class="symbol-label font-size-h5 font-weight-bold text-uppercase">{{substr(auth()->user()->first_name, 0, 1)}}</span>
                    </span>
                </div>
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>