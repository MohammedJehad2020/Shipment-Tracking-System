<script>
    var KTDatatablesServerSide = function () {
        // Shared variables
        var table;
        var dt;
        var filterPayment;
    
        // Private functions
        var initDatatable = function () {
            dt = $("#datatable").DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,
                order: [[0, 'desc']],
                stateSave: true,
              
                ajax: {
                    url: "{{route('permissions.index')}}",
    
                },
                columns: [
                    { data: 'name' },
                    { data: 'assigned_to' },
                    { data: 'created_at' },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
    
                columnDefs: [
                    // {
                    //     "targets": 1,
                    //     "orderable": false,
                    //     "render": function (data, type, full) {
                    //              return `<div class="d-flex align-items-center">
                    //              <td class="d-flex align-items-center">
                    //                         <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    //                             <a href="../../demo9/dist/apps/user-management/users/view.html">
                    //                                 <div class="symbol-label">
                    //                                     <img src="${full.image}" alt="${full.name}" class="w-100">
                    //                                 </div>
                    //                             </a>
                    //                         </div>
                    //                         <div class="d-flex flex-column">
                    //                             <a href="../../demo9/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">${full.name}</a>
                                                
                    //                         </div>
					// 					</td></div>`;
                    //                     //<span>${full.email}</span>
                    //     }
                    // },
                     {
                        targets: 1,
                        orderable: false,
                        render: function (data) {
                            return `<a href="#" class="badge badge-light-primary fs-7 m-1">${data}</a>`;
    
                        }
                    }, 
                  /*   {
                        targets: 3,
                        orderable: false,
                        render: function (data) {
                                 return `<td>
											<div class="badge badge-light-success fw-bolder">${data}</div>
										</td>`;
                        }
                    }, */

                    // {
                    //     targets: 0,
                    //     orderable: false,
                    //     render: function (data) {
                    //         return `
                    //             <div class="form-check form-check-sm form-check-custom form-check-solid">
                    //                 <input class="form-check-input" type="checkbox" value="${data}" />
                    //             </div>`;
                    //     }
                    // },
                    // {
                    //     targets: 4,
                    //     render: function (data, type, row) {
                    //         return `<img src="${hostUrl}media/svg/card-logos/${row.CreditCardType}.svg" class="w-35px me-3" alt="${row.CreditCardType}">` + data;
                    //     }
                    // },
                    // {
                    //     targets: -1,
                    //     data: null,
                    //     orderable: false,
                    //     className: 'text-end',
                    //     render: function (data, type, row) {
                    //         return `
                    //             <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                    //                 Actions
                    //                 <span class="svg-icon svg-icon-5 m-0">
                    //                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    //                         <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    //                             <polygon points="0 0 24 0 24 24 0 24"></polygon>
                    //                             <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                    //                         </g>
                    //                     </svg>
                    //                 </span>
                    //             </a>
                    //             <!--begin::Menu-->
                    //             <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                    //                 <!--begin::Menu item-->
                    //                 <div class="menu-item px-3">
                    //                     <a href="#" class="menu-link px-3" data-kt-docs-table-filter="edit_row">
                    //                         Edit
                    //                     </a>
                    //                 </div>
                    //                 <!--end::Menu item-->
    
                    //                 <!--begin::Menu item-->
                    //                 <div class="menu-item px-3">
                    //                     <a href="#" class="menu-link px-3" data-kt-docs-table-filter="delete_row">
                    //                         Delete
                    //                     </a>
                    //                 </div>
                    //                 <!--end::Menu item-->
                    //             </div>
                    //             <!--end::Menu-->
                    //         `;
                    //     },
                    // },
                ],
             
              
            });
            table = dt.$;
            // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
            dt.on('draw', function () {
                KTMenu.createInstances();
             
            });
        }
    
        // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
        var handleSearchDatatable = function () {
            const filterSearch = document.querySelector('[data-kt-permissions-table-filter="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                dt.search(e.target.value).draw();
            });
        }
    
        return {
            init: function () {
                initDatatable();
                handleSearchDatatable();
    
         
            
            }
        }
    }();
    
    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTDatatablesServerSide.init();
    });
    </script>