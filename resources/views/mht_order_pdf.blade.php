<!DOCTYPE html>
<html>
<head>
    <title>MHT Order PDF</title>
    <style>
        @page { margin: 1%; }

        body { margin: 1%; }
        .order_heading{
            font-family: Arial, Helvetica, sans-serif;
        }
        .orderDtls{
            position: absolute !important;
            margin-top: -2% !important;
            margin-right: 5% !important;
            margin-bottom: -50px !important;
            margin-left: 78% !important;
            width: 60%;
        }
        .orderSummary{
            margin-top: 8%;
            margin-bottom: 4%;
        }
        .date{
            float: right;
            margin-top: 8%;
            font-size: 12px;
        }
        .navbar-brand{
            font-size: 25px;
        }
        .details{
            border: 1px solid #989898;
            margin-top: -25px;
            padding: 5px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
            font-weight: normal;
            width: 40%;
        }
        .details span{
            color: red;
            text-transform: uppercase;
            float: right;
        }
        #orderTable{
            margin-top: -2%;
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            padding-bottom: 5%;
            /* height: 80%; */
        }
        #orderTable td, #orderTable th{
            border: 1px solid #989898;
        }
        #orderTable th{
            background: #4e73df;
            color: white;
            font-size: 13px;
            text-transform: uppercase
        }
        #orderTable td{
            font-size: 13px;
        }

        header {
            position: absolute;
            left: 0px;
            right: 0px;
            height: 50px;
        }
        footer {
            position: fixed;
            bottom: 1%;
            left: 0px;
            right: 0px;
            height: 3%;
            color: white;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
            width: 98%;
            margin-top: 5% !important;
            margin-left: 1%;
        }
        footer .container{
            background-color: blue;
        }
        .contact_details{
            font-size: 12px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin-left: 1% !important;
            margin-top: -4% !important;
        }
        .dtl{
            margin-top: -1%;
        }
        .wrapper-page {
            position: relative;
            page-break-after: always;
            display: block;
        }

        .wrapper-page:last-child {
            margin-bottom: 13%;
            page-break-after: avoid;
        }

        .pagenum:before {
            content: counter(page);
        }
    </style>
</head>
<body>
    <header>
        <div class="d-block text-center" style="text-align: center; margin-top: -15px;">
            <h1 style="text-align: center;" class="navbar-brand text-center"><u> MAJESTIC HOUSE </u></h1>
            <p style="margin-top:-15px">Trading L.L.C.</p>
        </div>
        <div class="contact_details">
            <p class="dtl">Tel.: 04-3334545</p>
            <p class="dtl">Mobile.: 050-5788807</p>
            <p class="dtl">Dubai, UAE.</p>
            <p class="dtl">Email: majestichouse@gmail.com</p>
        </div>
        <hr style="margin-top: -10px; width: 98%">
    </header>
    <footer>
        <span style="color: black; margin-left: 93%; margin-top: 15%;">
            Page No. -
            <span style="color: black;" class="pagenum"></span>
        </span>
        <div class="container my-auto">
            <div class="copyright text-center" style="padding-top: 5px; padding-bottom: 2px !important">
                <span>Copyright &copy; <b> MAJESTIC HOUSE -</b> <?php echo date("Y");?> </span>
            </div>
        </div>
    </footer>
    <div class="order_heading">
        <p class="date"><u>Date: {{$date}}</u></p>
        <h3 class="orderSummary">Order Summary: </h3>
        <h5 class="details">Order ID: <span>{{$order_unq_id}}</span></h5>
        <h5 class="details">Customer Name: <span>{{$customerName_input}}</span></h5>
    </div><br>

    <main class="page wrapper-page">
        <table class="table caption-top" id="orderTable">
            <thead>
              <tr>
                <th style="height: 4%;" scope="col">S.No.</th>
                <th style="height: 4%;" scope="col">Product Name</th>
                <th scope="col">Item Name</th>
                <th scope="col">Item No.</th>
                <th scope="col">Supplier Barcode</th>
                <th scope="col">Units of Measure</th>
                <th scope="col">Item Qty.</th>
                <th scope="col">Item Cost</th>
                <th scope="col">Item Total</th>
              </tr>
            </thead>
            <tbody>
                @php $i = 0 @endphp
                @foreach($orderDtls as $order)
                @php $i++ @endphp
              <tr>
                <td style="height: 3%;">{{$i}}</td>
                <td style="height: 3%;">{{$order->product_name_input}}</td>
                <td>{{$order->item_name_input}}</td>
                <td>{{$order->item_no_input}}</td>
                <td>{{$order->supplier_barcode_input}}</td>
                <td>{{$order->item_unit_measure}}</td>
                <td>{{$order->item_quantity}}</td>
                <td>{{$order->item_cost_input}}</td>
                <td>{{$order->itemTotal_input}}</td>
              </tr>
              @endforeach
            </tbody>
        </table>
        {{-- <div style="height: 10%; width: 10%; color: white;">
            &nbsp
        </div> --}}
        <div class="orderDtls" style="width: 52%;">
            <h3>Order Details: </h3><br>
            <h5 class="details">Subtotal: <span>{{$subtotal_input}}</span></h5>
            <h5 class="details">VAT @5%: <span>{{$tax_input}}</span></h5>
            <span>
                <h5 style="background: blue; font-size: 18px; color:white; font-weight: bold;" class="details text-white">Grand Total:
                    <span   style="color: white; background: blue; float: right;">{{$total}}</span>
                </h5>
            </span>
        </div>
    </main>
</body>
</html>

