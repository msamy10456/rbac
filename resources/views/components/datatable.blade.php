<script>
    const footerNumber= @if(isset($footer)) @json($footer) @else  []  @endif;
    // $('#users_table_datatable').DataTable().clear().destroy();
    // function dataTableAjax(from,to) {
        // var date_form = from ?? $('.date_from').val();
        // var date_to = to ?? $('.date_to').val();
        var table_table = $("{{ $tableId }}").DataTable({
            responsive: true,
            fixedHeader: {
                header: true,
                footer: true
            },
            processing: false,
            serverSide: false,
            ajax: {
                url: "{{ $url }}" //route('admin.users.usersGet')

            },
            columns: [
                @foreach ($columns as $column)
                    {
                        data: "{{ $column }}",
                        name: "{{ $column }}",
                    },
                @endforeach {
                    data: "action",
                    name: "action",
                },
            ],
            footerCallback: function(tfoot, data, start, end, display) {
                if(footerNumber.length > 0){
                    var api = this.api();
                    for(number  in  footerNumber){
                        var total_unit_cost = api.column(footerNumber[number]).data().reduce(function(a, b) {
                            return parseFloat(a) + parseFloat(b);
                        }, 0);
                        $(api.column(footerNumber[number]).footer()).html(total_unit_cost + " ج.م");

                    }

                    // var total_unit_price = api.column(5).data().reduce(function(a, b) {
                    //         return parseFloat(a) + parseFloat(b);
                    //     }, 0);
                    // var total_cost = api.column(6).data().reduce(function(a, b) {
                    //         return parseFloat(a) + parseFloat(b);
                    //     }, 0);
                    // var total_price = api.column(7).data().reduce(function(a, b) {
                    //         return parseFloat(a) + parseFloat(b);
                    //     }, 0);
                    // var total_profit = api.column(8).data().reduce(function(a, b) {
                    //         return parseFloat(a) + parseFloat(b);
                    //     }, 0);

                    // $(api.column(4).footer()).html(total_unit_cost + " ج.م");
                    // $(api.column(5).footer()).html(total_unit_price + " ج.م");
                    // $(api.column(6).footer()).html(total_cost + " ج.م");
                    // $(api.column(7).footer()).html(total_price + " ج.م");
                    // $(api.column(8).footer()).html(total_profit + " ج.م");
                }
                },
            "order": [],
            'language': {
                'lengthMenu': '_MENU_ {{ __('records per page') }}',
                "info": '{{ __('Showing') }} _START_ - _END_ (_TOTAL_)',
                "search": '{{ __('Search') }}',
                'paginate': {
                    'previous': '{{ __('Previous') }}',
                    'next': '{{ __('Next') }}'
                }
            },
            // 'columnDefs': [
            //     {
            //         "orderable": false,
            //         'targets': [0, 1],
            //     },
            // ],
            'lengthMenu': [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],

        });
        // $('table').DataTable().clear();
    //     //  $('table').DataTable().destroy();
    // }
    // dataTableAjax()
</script>
