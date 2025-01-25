<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarketHaven- Clothing Store</title>
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-YedEbgx2OJcwpD9z"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container my-5">
        <h2 class="mb-4">Checkouts</h2>
            <div class="table-responsive item">
                <table class="table table-borderless align-middle">
                    <thead class="table">
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                           <th></th>
                        </tr>
                    </thead>
                    <tbody id="cart">
                        @foreach($orders as $data)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/' . $data->products->image) }}" alt="Product" class="img-thumbnail me-2" style="width: 50px;">
                                    <span>{{  $data->products->product_name }}</span>
                                </div>
                            </td>
                            <td class="price" data-price="{{ $data->products->price }}">{{ $data->products->price }}</td>
                            <td class = "jumlah"data-jumlah="{{ $data->Jumlah }}">
                                {{ $data->Jumlah}}
                            </td>
                            <td class="subtotal">{{ $data->total_price }}</td>    
                            <td>
                                <form action="{{ route('orders.destroy',$data->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link"><i class="fa-solid fa-x" style="color: #000000;"></i></button>
                                </form>
                            </td>
                        </tbody>                 
                        </tr>
                        @endforeach     
                </table>    
                <div class="d-flex justify-content-between align-items-center">
                <button id="pay-button" type="submit"form="ecommerce" class="btn btn-primary">PROCEED TO CHECKOUT</button>
            </div>
                
            </div>
            
    </div>
  <!-- @TODO: You can add the desired ID as a reference for the embedId parameter. -->
  <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        var snapToken = @json($snapToken); // Gantilah sesuai dengan token yang diterima
        window.snap.pay(snapToken, {
            onSuccess: function(result) {
                if (result.transaction_status === 'settlement') {
                    window.location.href = '/thank-you'; 
                }
            },
            onPending: function(result) {
                console.log("Pembayaran masih pending", result);
            },
            onError: function(result) {
                console.log("Terjadi kesalahan", result);
            },
            onClose: function() {
                console.log("Popup Midtrans ditutup");
            }
        });
            
            });
    </script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   


</body>
</html>
