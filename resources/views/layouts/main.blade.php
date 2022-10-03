<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MAJESTIC House - Dashboard</title>
    <link rel="shortcut icon" type="image" href="/favicon.png">
    <!-- Custom fonts for this template-->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"
    >
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="{{asset('css/main.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/JsBarcode.all.min.js') }}"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                </div>
                {{-- <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> --}}
                <div style="margin-left: -5px; font-family: 'Audiowide'; font-weight: normal; text-transform: lowercase; font-size: 1.3rem"
                class="sidebar-brand-text">
                    majestic house
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">
                    {{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
                    <i style='font-size:21px' class='bx bx-grid-alt' ></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Products Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
                    aria-expanded="true" aria-controls="collapseProducts">
                    <i style='font-size:21px' class="fas fa-cubes"></i>
                    <span>Products</span>
                </a>
                <div id="collapseProducts" class="collapse" aria-labelledby="headingProducts" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('products.index') }}">View All Product</a>
                        <a class="collapse-item" href="{{ route('products.create') }}">Create New Product</a>
                        <!-- Divider -->
                        <hr style='background-color: black;' class="sidebar-divider">
                        <a class="collapse-item" href="{{ route('orders.index') }}">View all Orders</a>
                        <a class="collapse-item" href="{{ route('orders.create') }}">Orders Catalog</a>
                        <!-- Divider -->
                        <hr style='background-color: black;' class="sidebar-divider">
                        <a class="collapse-item" href="{{ route('items.index') }}">Items</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Customers Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomers"
                    aria-expanded="true" aria-controls="collapseCustomers">
                    <i class='fas fa-users' style='font-size:21px'></i>
                    <span>Customers</span>
                </a>
                <div id="collapseCustomers" class="collapse" aria-labelledby="headingCustomers"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('customers.index') }}">View All Customers</a>
                        <a class="collapse-item" href="{{ route('customers.create') }}">Create New Customers</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <!-- Nav Item - Linked Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLinked"
                aria-expanded="true" aria-controls="collapseLinked">
                <i class="fas fa-network-wired" style='font-size:21px'></i>
                {{-- <i class="fas fa-bezier-curve" style='font-size:21px'></i> --}}
                    <span>Link Products</span>
                </a>
                <div id="collapseLinked" class="collapse" aria-labelledby="headingLinked"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('linked.index') }}">View Linked Products</a>
                        <a class="collapse-item" href="{{ route('linked.create') }}">Create New Link</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - User Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                    aria-expanded="true" aria-controls="collapseUser">
                    <i class='fas fa-user-cog' style='font-size:21px'></i>
                    <span>User Management</span>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingUser"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('users.index') }}">View All User</a>
                        <a class="collapse-item" href="{{ route('users.create') }}">Create New User</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->employee_name}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('img/indian-flag.jpg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Logout') }}
                                </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div style="display: block !important;" class="row">
                        @yield('content')
                    </div>
                    {{-- <input onfocusout="bc_generate()" type="text" name="name" value="" id="txt_input">


	<button id="btn_generate">Generate Barcode</button>
    <svg class="barcode" id="barcode"></svg> --}}
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer" style="background-color: #c8c8c8; height: 1%;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span style="color: black; font-size: 0.7rem; font-family: Nunito;">Copyright &copy; <b> MAJESTIC House - </b> <?php echo date("Y");?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <!-- <script src="{{ mix('js/app.js') }}"></script> -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/majestic.admin.min.js') }}"></script>
    <!-- {{-- <script src="{{ asset('js/getUIDs.js')}}"></script> --}} -->

    <script type="text/javascript">
        $(function() {
            function getInitials(valStr) {
                var words = valStr.split(" "),
                initials = "";
                words.forEach(function(word) {
                initials += word.charAt(0);
                });
                return initials.toUpperCase();
            }
            $("input[name=customer_name]").focusout(function() {

                if(this.value){
                    var val = $(this).val();
                    const customerName = getInitials(val);
                    const month = new Date().getMonth() + 1;
                    const year = new Date().getFullYear().toString().substr(-2);
                    // const uid = Math.floor(Math.random() * 326565);
                    customerUID = "MH-C/" + month + year + "/" + customerName;
                    // customerUID = "MH-C/" + month + year + "/" + customerName + "-" + uid;
                    document.getElementById('customer_unq_id').innerHTML = customerUID;
                    localStorage.setItem("storageName",customerUID);
                }
                // console.log(customerUID);
            })
            $("input[name=product_name]").focusout(function() {

                if(this.value){
                    var val = $(this).val();
                    const productName = getInitials(val);
                    const month = new Date().getMonth() + 1;
                    const year = new Date().getFullYear().toString().substr(-2);
                    productUID = "MH-P/" + month + year + "/" + productName;
                    document.getElementById('product_unq_id').innerHTML = productUID;
                    localStorage.setItem("storageName",productUID);
                }
                // console.log(productUID);
            })
            $("input[name=product_name]").focusout(function() {

                if(this.value){
                    var val = $(this).val();
                    const productName = getInitials(val);
                    const month = new Date().getMonth() + 1;
                    const year = new Date().getFullYear().toString().substr(-2);
                    productUID = "MH-P/" + month + year + "/" + productName;
                    document.getElementById('product_unq_id').innerHTML = productUID;
                    localStorage.setItem("storageName",productUID);
                }
                // console.log(productUID);
            })
            $("input[name=item_name]").focusout(function() {

                if(this.value){
                    var val = $(this).val();
                    const itemName = getInitials(val);
                    const month = new Date().getMonth() + 1;
                    const year = new Date().getFullYear().toString().substr(-2);
                    itemUID = "MH-P/" + month + year + "/" + itemName;
                    document.getElementById('item_unq_id').innerHTML = itemUID;
                    localStorage.setItem("storageName",itemUID);
                }
                // console.log(productUID);
            })

            $(".item_no").select2(/*Your code*/)

            //Part 2 - continued

            $(".item_no").on("select2:select", function (e) {
                var val = $(e.currentTarget).val();
                const linkedName = getInitials(val);
                const month = new Date().getMonth() + 1;
                const year = new Date().getFullYear().toString().substr(-2);
                linkedUID = "MH-CL/P-Itm/" + month + year + "/" + linkedName;
                document.getElementById('linked_unq_id').innerHTML = linkedUID;
                localStorage.setItem("storageName",linkedUID);
                console.log(linkedUID);
            });

            $(document).ready(function() {

                /* Set rates */
                var taxRate = 0.05;
                var fadeTime = 350;

                /* Assign actions */
                $('.pass-quantity input').change(function() {
                    updateQuantity(this);
                });

                $('.remove-item button').click(function() {
                    removeItem(this);
                });


                /* Recalculate cart */
                    function recalculateCart() {
                    var subtotal = 0;

                    /* Sum up row totals */
                    $('.item').each(function() {
                        subtotal += parseFloat($(this).children('.product-line-price').text());
                    });

                    // $('.product_name').each(function() {
                    //     var prdct = $(this).val();
                    //     // var m = jQuery(this).parent().find('.month').val();
                    //     // var y = jQuery(this).parent().find('.year').val();
                    //     // var dmy = d + '/' + m + '/' + y;
                    //     $('.product_name_input').val(prdct);
                    // });
                    // alert(prdct);

                    /* Calculate totals */
                    var tax = subtotal * taxRate;
                    var total = subtotal + tax;

                    /* Update totals display */
                    $('.totals-value').fadeOut(fadeTime, function() {
                        $('#cart-subtotal').html(subtotal.toFixed(2));
                        $('#subtotal_input').html(subtotal.toFixed(2));
                        $('#cart-tax').html(tax.toFixed(2));
                        $('#tax_input').html(tax.toFixed(2));
                        $('.cart-total').html(total.toFixed(2));
                        $('#total_input').html(total.toFixed(2));
                        // $('.itemTotal_input').html(subtotal.toFixed(2));
                        if (total == 0) {
                            $('.checkout').fadeOut(fadeTime);
                        } else {
                            $('.checkout').fadeIn(fadeTime);
                        }
                        $('.totals-value').fadeIn(fadeTime);
                        // alert($('#subtotal_input').html(subtotal.toFixed(2)));
                    });
                }

                /* Update quantity */
                function updateQuantity(quantityInput) {
                    /* Calculate line price */
                    var productRow = $(quantityInput).parent().parent();
                    var itemTotal = $(quantityInput).parent().parent();
                    var price = parseFloat(productRow.children('.product-price').text());
                    var quantity = $(quantityInput).val();
                    var linePrice = price * quantity;

                    /* Update line price display and recalc cart totals */
                    productRow.children('.product-line-price').each(function() {
                        $(this).fadeOut(fadeTime, function() {
                            $(this).text(linePrice.toFixed(2));
                            recalculateCart();
                            $(this).fadeIn(fadeTime);
                            // $('.itemTotal_input').html(linePrice.toFixed(2));
                        });
                    });
                    itemTotal.children('.itemTotal_input').each(function() {
                        $(this).fadeOut(fadeTime, function() {
                            $(this).text(linePrice.toFixed(2));
                            recalculateCart();
                            $(this).fadeIn(fadeTime);
                            // $('.itemTotal_input').html(linePrice.toFixed(2));
                        });
                    });
                }

                /* Remove item from cart */
                function removeItem(removeButton) {
                    /* Remove row from DOM and recalc cart total */
                    var productRow = $(removeButton).parent().parent();
                    productRow.slideUp(fadeTime, function() {
                        productRow.remove();
                        recalculateCart();
                    });
                }
                $('.select2').select2();
                // $("#item_id").select2().maximizeSelect2Height();
                // $(document).ready(function() {
                //     $('.select2').select2();
                //     $("#item_id").select2().maximizeSelect2Height();
                // });
            });

        });


        function orderUID(){
            const customer = document.getElementById('customer_name');
            const selectedCustomer = customer.options[customer.selectedIndex].text;
            document.getElementById('order_unq_id').innerHTML = selectedCustomer;
            const date = new Date().getDate();
            const month = new Date().getMonth() + 1;
            const year = new Date().getFullYear().toString().substr(-2);
            const randomNum = Math.floor(Math.random() * 90000) + 10000;
            const ordUID = "MH-Ord/" + date + month + year + "/" + randomNum + "/" + selectedCustomer;
            console.log(ordUID);
            document.getElementById('order_unq_id').innerHTML = ordUID;
        }

        function showDiv() {
            document.getElementById('catalog').style.display = "block";
            customerName();
            orderUID();
            display_barcode();
            // bc_generate();
        }

        function revFunction() {
            // document.getElementById("excel_btn").disabled = false;
            document.getElementById("excel_btn").classList.remove('disabled');
        }

        function customerName(){
            const customer = document.getElementById('customer_name');
            const selectedCustomer = customer.options[customer.selectedIndex].text;
            document.getElementById('customerName1').innerHTML = selectedCustomer;
            document.getElementById('order_save_customerName').innerHTML = selectedCustomer;
            document.getElementById('customerName_order_save_input').innerHTML = selectedCustomer;
            document.getElementById('customerName_input').innerHTML = selectedCustomer;
            document.getElementById('customerName_input2').innerHTML = selectedCustomer;
            console.log(selectedCustomer);
            // totalAmount();
        }

        // giving item name to input
        const item = document.getElementById('item_name');
        const itemName = item.innerHTML;
        document.getElementById('item_name_input').innerHTML = itemName;
        console.log(itemName);

        // giving item no. to input
        const itemNo = document.getElementById('item_no');
        const itemNumber = itemNo.innerHTML;
        document.getElementById('item_no_input').innerHTML = itemNumber;
        console.log(itemNumber);

        // giving item description to input
        const itemDesc = document.getElementById('item_description');
        const itemDescription = itemDesc.innerHTML;
        document.getElementById('item_description_input').innerHTML = itemDescription;
        console.log(itemDescription);

        //giving supplier_ref_no to input
        const suppRef = document.getElementById('supplier_ref_no');
        const supplierRefNo = suppRef.innerHTML;
        document.getElementById('supplier_ref_no_input').innerHTML = supplierRefNo;
        console.log(supplierRefNo);

        // giving supplier_barcode to input
        const supplier_barcode = document.getElementById('supplier_barcode');
        const supplierBarcode = supplier_barcode.innerHTML;
        // document.getElementById('supplier_barcode_input').innerHTML = supplierBarcode;
        document.getElementById('supplier_barcode').innerHTML = supplierBarcode;
        // document.getElementById('supplier_barcode_input-' + id).innerHTML = supplierBarcode;
        console.log(supplierBarcode);

        // // giving item cost to input
        const item_cost = document.getElementById('item_cost');
        const itemCost = item_cost.innerHTML;
        document.getElementById('item_cost_input').innerHTML = itemCost;
        console.log(itemCost);


        window.onload = function() {
            var selCustomer = sessionStorage.getItem("selCustomer");
            $('#customer_name').val(selCustomer);
        }
        $('#customer_name').change(function() {
            var selVal = $(this).val();
            sessionStorage.setItem("selCustomer", selVal);
        });

        //Generating BARCODE
        function bc_generate(id) {
            //alert(document.getElementById('supplier_barcode').value);
            // for input field value
            var text = document.getElementById('supplier_barcode').value;
            // var odr_text = document.getElementById('supplier_barcode_input-'+id).value;
            // for span tag value
            //var text = document.getElementById('supplier_barcode').value;
            //var odr_text = document.getElementById('supplier_barcode_input-'+id).value;

            JsBarcode("#barcode", text, {
                fontSize: 15,
                width: 1.3,
                height: 37,
                margin: 1,
                displayValue: true
            });
        };

        function bc_generate2(id) {
            // alert(id);
            var odr_text = document.getElementById('supplier_barcode_input-'+ id).value;
            JsBarcode("#ord_barcode-"+ id, odr_text, {
                fontSize: 15,
                width: 1.3,
                height: 37,
                margin: 5,
                displayValue: true
            });
        };

        function display_barcode(){
            // var info = document.getElementsByClassName('supplier_barcode_input');
            // for (i = 0; i <info.length; i++){
            //     console.log(info[i].id);
            // }
            $('.supplier_barcode_input').each(function() {
                //alert( this.id );
                var ids = this.id;
                var id = ids.replace("supplier_barcode_input-", "");
                // alert(id);
                bc_generate2(id);
            });
        };

        // document.getElementById("btn_generate").addEventListener('click', function() {
        //     var text = document.getElementById('txt_input').value;
        //     JsBarcode("#barcode", text);
        // });

    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>
