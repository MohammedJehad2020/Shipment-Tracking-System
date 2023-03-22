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
                    url: "{{route('role.users', $role->id)}}",
    
                },
                columns: [
                  { data: 'checkboxes', name: 'checkboxes', orderable: false, searchable: false },
                  { data: 'id' },
                  { data: 'name' },
                  { data: 'email' },
                  { data: 'joined_date' },
                  {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
    
                columnDefs: [
                    {
                        "targets": 2,
                        "orderable": false,
                        "render": function (data, type, full) {
                                 return `<div class="d-flex align-items-center">
                                 <td class="d-flex align-items-center">
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="../../demo9/dist/apps/user-management/users/view.html">
                                                    <div class="symbol-label">
                                                        <img src="${full.image}" alt="${full.name}" class="w-100">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="../../demo9/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">${full.name}</a>
                                                
                                            </div>
										</td></div>`;
                                        //<span>${full.email}</span>
                        }
                    },
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
            const filterSearch = document.querySelector('[data-kt-roles-table-filter="search"]');
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