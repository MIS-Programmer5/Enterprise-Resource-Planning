<x-app-layout>
@push('style')
    <style>
        /* Style the table */
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        /* Style for the table headers */
        th {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #ddd;
        }

        /* Style for the table cells */
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        /* Add zebra stripes to rows */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Hover effect for rows */
        tr:hover {
            background-color: #ddd;
        }

        /* Adjust column widths */
        td:first-child, th:first-child {
            width: 10%;
        }

        td:nth-child(2), th:nth-child(2) {
            width: 30%;
        }

        td:nth-child(3), th:nth-child(3) {
            width: 15%;
        }

        td:nth-child(4), th:nth-child(4) {
            width: 10%;
        }

        td:nth-child(5), th:nth-child(5) {
            width: 10%;
        }

        td:nth-child(6), th:nth-child(6) {
            width: 15%;
        }

        td:nth-child(7), th:nth-child(7) {
            width: 10%;
        }
    </style>
@endpush
  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <table>
                    <tr>
                        <th>ITEM CODE</th>
                        <th>DESCRIPTION</th>
                        <th>COST</th>
                        <th>VAT</th>
                        <th>MARKUP AMOUNT</th>
                        <th>MARKUP PERCENTAGE(%)</th>
                        <th>RETAIL PRICE</th>
                    </tr>
                    @php($cost=85)
                    @foreach($pricelevels as $pricelevel)
                    <tr>
                        <td>{{$pricelevel->id}}</td>
                        <td>{{$pricelevel->description}}</td>
                        <td>{{$cost}}</td>
                        <td>{{$pricelevel->vat}}</td>
                        <td>{{$pricelevel->markup}}</td>
                        <td>{{((($cost+$pricelevel->markup)-$cost)/100)*100}}%</td>
                        <td>{{$cost+$pricelevel->markup}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
