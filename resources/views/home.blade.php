<x-master>
    <!--begin::Row-->
    <div class="row gy-5 g-xl-10">
        <!--begin::Col-->
        <div class="col-xxl-6 mb-lg-10 mb-xl-5 mb-xxl-10">
            <div class="row g-5 g-lg-10">
                <div class="col-md-6 col-xl-6 mb-md-5 mb-xxl-10">
                    <!--begin::Card widget 8-->
                    <div class="card overflow-hidden h-md-50 mb-5 mb-lg-10">
                        <!--begin::Card body-->
                        <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                            <!--begin::Statistics-->
                            <div class="mb-4 px-9">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Currency-->
                                    <span class="fs-4 fw-bold text-gray-400 align-self-start me-1&gt;">$</span>
                                    <!--end::Currency-->
                                    <!--begin::Value-->
                                    <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1">{{ $salesCount }}</span>
                                    <!--end::Value-->
                                    <!--begin::Label-->
                                    <span class="badge badge-success fs-6 lh-1 py-1 px-2 d-flex flex-center">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr067.svg-->
                                    <span class="svg-icon svg-icon-7 svg-icon-white ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.5" d="M13 9.59998V21C13 21.6 12.6 22 12 22C11.4 22 11 21.6 11 21V9.59998H13Z" fill="black" />
                                            <path d="M5.7071 7.89291C5.07714 8.52288 5.52331 9.60002 6.41421 9.60002H17.5858C18.4767 9.60002 18.9229 8.52288 18.2929 7.89291L12.7 2.3C12.3 1.9 11.7 1.9 11.3 2.3L5.7071 7.89291Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->2.2%</span>
                                    <!--end::Label-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Description-->
                                <span class="fs-6 fw-bold text-gray-400">{{ t('Total Sales') }}</span>
                                <!--end::Description-->
                            </div>
                            <!--end::Statistics-->
                            <!--begin::Chart-->
                            <div id="kt_card_widget_8_chart" class="min-h-auto" style="height: 125px"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 8-->
                    <!--begin::Card widget 5-->
                    <div class="card card-flush h-md-50 mb-lg-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bolder text-dark me-2 lh-1">{{ $pending_shipment_count }}</span>
                                    <!--end::Amount-->
                                    <!--begin::Badge-->
                                    <span class="badge badge-danger fs-6 lh-1 py-1 px-2 d-flex flex-center" style="height: 22px">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr068.svg-->
                                    <span class="svg-icon svg-icon-7 svg-icon-white ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.5" d="M13 14.4V3.00003C13 2.40003 12.6 2.00003 12 2.00003C11.4 2.00003 11 2.40003 11 3.00003V14.4H13Z" fill="black" />
                                            <path d="M5.7071 16.1071C5.07714 15.4771 5.52331 14.4 6.41421 14.4H17.5858C18.4767 14.4 18.9229 15.4771 18.2929 16.1071L12.7 21.7C12.3 22.1 11.7 22.1 11.3 21.7L5.7071 16.1071Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->2.2%</span>
                                    <!--end::Badge-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-bold fs-6">{{ t('Pending Shipments') }}</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                      
                    </div>
                    <!--end::Card widget 5-->
                </div>
                <div class="col-md-6 col-xl-6 mb-md-5 mb-xxl-10">
                    <!--begin::Card widget 9-->
                    <div class="card overflow-hidden h-md-50 mb-5 mb-lg-10">
                        <!--begin::Card body-->
                        <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                            <!--begin::Statistics-->
                            <div class="mb-4 px-9">
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Currency-->
                                    <span class="fs-4 fw-bold text-gray-400 align-self-start me-1&gt;">$</span>
                                    <!--end::Currency-->
                                    <!--begin::Value-->
                                    <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1">{{ $shipments }}</span>
                                    <!--end::Value-->
                                    <!--begin::Label-->
                                    <span class="badge badge-success fs-6 lh-1 py-1 px-2 d-flex flex-center">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr067.svg-->
                                    <span class="svg-icon svg-icon-7 svg-icon-white ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.5" d="M13 9.59998V21C13 21.6 12.6 22 12 22C11.4 22 11 21.6 11 21V9.59998H13Z" fill="black" />
                                            <path d="M5.7071 7.89291C5.07714 8.52288 5.52331 9.60002 6.41421 9.60002H17.5858C18.4767 9.60002 18.9229 8.52288 18.2929 7.89291L12.7 2.3C12.3 1.9 11.7 1.9 11.3 2.3L5.7071 7.89291Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->2.6%</span>
                                    <!--end::Label-->
                                </div>
                                <!--end::Statistics-->
                                <!--begin::Description-->
                                <span class="fs-6 fw-bold text-gray-400">{{ t('Shipments') }}</span>
                                <!--end::Description-->
                            </div>
                            <!--end::Statistics-->
                            <!--begin::Chart-->
                            <div id="kt_card_widget_9_chart" class="min-h-auto" style="height: 125px"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 9-->
                    <!--begin::Card widget 7-->
                    <div class="card card-flush h-md-50 mb-lg-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bolder text-dark me-2 lh-1">{{ $complete_shipment_count }}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-bold fs-6">{{ t('Completed Shipments') }}</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex flex-column justify-content-end">
                            <!--begin::Title-->
                            <span class="fs-6 fw-boldest text-gray-800 d-block mb-2">Today’s Heroes</span>
                            <!--end::Title-->
                            <!--begin::Users group-->
                            <div class="symbol-group symbol-hover">
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Alan Warden">
                                    <span class="symbol-label bg-warning text-inverse-warning fw-bolder">A</span>
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Michael Eberon">
                                    <img alt="Pic" src="assets/media/avatars/300-11.jpg" />
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Susan Redwood">
                                    <span class="symbol-label bg-primary text-inverse-primary fw-bolder">S</span>
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
                                    <img alt="Pic" src="assets/media/avatars/300-2.jpg" />
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Perry Matthew">
                                    <span class="symbol-label bg-danger text-inverse-danger fw-bolder">P</span>
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Barry Walter">
                                    <img alt="Pic" src="assets/media/avatars/300-12.jpg" />
                                </div>
                                <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                                    <span class="symbol-label bg-gray-900 text-gray-300 fs-8 fw-bolder">+42</span>
                                </a>
                            </div>
                            <!--end::Users group-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 7-->
                </div>
            </div>
        </div>
        <!--end::Col-->
   
    </div>
    <!--end::Row-->
</x-master>