<div class="container">
        <div class="row">
            <div  class="table-one black-table">
                <div id = "black-table-text">
                    <!-- PHP code to generate HTML with JavaScript -->
                    <!-- Clickable text that submits the form -->
                    <!-- Form to pass value to PHP method -->
                            <!-- Hidden input to store the value -->
                        <a href="#" onclick ="showOrderStatus();" style="color: inherit; text-decoration: none;">
                           Order Status
                        </a>
                    <!-- Hidden form to submit on click -->
                </div>
                <div id = "black-table-text">
                        <a href="#" onclick ="showOrderHistory();" style="color: inherit; text-decoration: none;">
                            Order History
                        </a>
               </div>
                <div id = "black-table-text">
                    <a href="#" onclick ="showVehicles();" style="color: inherit; text-decoration: none;">
                        Vehicle Management
                    </a>
                </div>
                <div id = "black-table-text">
                    <a href="#" onclick ="showCustomers();" style="color: inherit; text-decoration: none;">
                         Customer(s)
                    </a>       
                </div>
                <div id = "black-table-text">Payments</div>
                <div id = "black-table-text-bottom">Delivery</div>
            </div> 
            <!-- onclick display : Order Status-->
            <div  id = "table-right" class="column-right" style = "display: none">
                <?php include 'right_white_table.php'; ?>
            </div> 

           <!-- onclick display : Order History -->
            <div  id = "table-right-order-history" class="column-right" style = "display: none">
                <?php include 'order_history_content.php'; ?>
            </div> 

            <!-- onclick display : Customers-->
            <div  id = "table-right-customers" class="column-right" style = "display: none">
                <?php include 'customer.php'; ?>
            </div> 

             <!-- onclick display : Vehicle Management-->
             <div  id = "table-right-vehicles" class="column-right" style = "display: none">
                <?php include 'vehicle.php'; ?>
            </div> 

        </div>
    </div>

    <script>
        function showOrderStatus() {
            // Hide all other sections
            document.getElementById('table-right-order-history').style.display = 'none';
            document.getElementById('table-right-customers').style.display = 'none';
            document.getElementById('table-right-vehicles').style.display = 'none';

            var textElement = document.getElementById('table-right');
            textElement.style.display = 'block';
        }
        function showOrderHistory() {
             // Hide all other sections
            document.getElementById('table-right').style.display = 'none';
            document.getElementById('table-right-customers').style.display = 'none';
            document.getElementById('table-right-vehicles').style.display = 'none';

            var textElement = document.getElementById('table-right-order-history');
            textElement.style.display = 'block';
        }
        function showCustomers() {
             // Hide all other sections
            document.getElementById('table-right-order-history').style.display = 'none'; 
            document.getElementById('table-right').style.display = 'none';
            document.getElementById('table-right-vehicles').style.display = 'none';

            var textElement = document.getElementById('table-right-customers');
            textElement.style.display = 'block';
        }
        function showVehicles(){
             // Hide all other sections
            document.getElementById('table-right-order-history').style.display = 'none'; 
            document.getElementById('table-right').style.display = 'none';
            document.getElementById('table-right-customers').style.display = 'none';
            
            var textElement = document.getElementById('table-right-vehicles');
            textElement.style.display = 'block';
        }
    </script>
