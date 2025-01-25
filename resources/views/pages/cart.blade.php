<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('theme-dashboard/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>
  <style>
@media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
}

.card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}

.card-registration .select-arrow {
top: 13px;
}
</style>

  </style>
<section class="h-100 h-custom" style="background-color: #fffff;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0">Shopping Cart</h1>
                  </div>
                  <hr class="my-4">
               @foreach($carts as $data)
                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img
                        src="{{ asset('storage/'.$data->products->image) }}"
                        class="img-fluid rounded-3" alt="">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-muted">{{ $data->products->categories->name }}</h6>
                      <h6 class="mb-0">{{ $data->products->product_name }}</h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      <input  class="form-control form-control-sm quantity-input" data-price="{{ $data->products->price }}"data-cart-id="{{ $data->products->id }}"  id="form1" min="1" name="quantity[]" value="{{ $data->quantity }}" type="number"
                        class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h6 class="mb-0"><span id = "subtotal-{{ $data->products->id }}">Rp.{{number_format( $data->products->price, 0 ,',','.') }}</span></h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                        <form action="{{ route('carts.destroy',$data->products->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class = "btn btn-link text-black" type = "submit">
                            <i class="fas fa-times"></i>
                            </button>
                        </form>
                    </div>
                  </div>
                  <hr class="my-4">
                  @endforeach
                  <div class="pt-5">
                    <h6 class="mb-0"><a href="{{ route('shop') }}" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-body-tertiary">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1"></h3>

                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase"></h5>
                    <h5></h5>
                  </div>

                  <h5 class="text-uppercase mb-3"></h5>

                  <br><br><br><br><br><br>

                  <h5 class="text-uppercase mb-3"></h5>

                  <div class="mb-5">
                    <div data-mdb-input-init class="form-outline">
                      <input type="hidden" id="form3Examplea2" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Examplea2"></label>
                    </div>
                  </div>

                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5 summary">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5>Rp.<span id = "total-price">0</span></h5>
                  </div>
                  <form action="{{route('carts.store')}}" method="post">
                    @csrf
                    @foreach ($carts as $data)
                    <input type="hidden" name="quantity[]" value="{{ $data->quantity }}" id="hidden-quantity-{{ $data->products->id }}">
                    @endforeach
                  <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-block btn-lg"
                    data-mdb-ripple-color="dark">CHECKOUTS</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script>
    @if (session('error'))
  Swal.fire({
  icon: "error",
  title: "Oops...",
  text: "{{ session('error') }}",
});
    @endif
</script>

 <script>
    document.addEventListener('DOMContentLoaded', function () {
        const quantityInputs = document.querySelectorAll('.quantity-input'); // Semua input quantity
        const totalPriceElement = document.getElementById('total-price'); // Elemen Total Price

        // Fungsi untuk menghitung total keseluruhan
        function calculateTotalPrice() {
            let totalPrice = 0;
            quantityInputs.forEach(input => {
                const price = parseFloat(input.dataset.price); // Harga per item
                const quantity = parseInt(input.value); // Kuantitas
                if (!isNaN(price) && !isNaN(quantity)) {
                    totalPrice += price * quantity;
                }
            });
            totalPriceElement.textContent = totalPrice.toFixed(2); // Update Total Price
        }

        // Event Listener untuk setiap input quantity
        quantityInputs.forEach(input => {
            input.addEventListener('input', function () {
                const pricePerItem = parseFloat(this.dataset.price); // Harga per item
                const quantity = parseInt(this.value); // Kuantitas
                const cartId = this.dataset.cartId; // ID Cart untuk elemen subtotal

                if (!isNaN(quantity) && quantity > 0) {
                    // Update subtotal
                    const subtotal = pricePerItem * quantity;
                    const subtotalElement = document.getElementById(`subtotal-${cartId}`);
                    subtotalElement.textContent = subtotal.toFixed(2);
                }

                // Hitung ulang total keseluruhan
                calculateTotalPrice();
            });
        });

        // Hitung total saat halaman dimuat
        calculateTotalPrice();
    });
</script>
<script>
    const quantities = document.querySelectorAll('input.quantity-input');
    quantities.forEach((input) => {
        input.addEventListener('input', function () {
            const hiddenInput = document.getElementById('hidden-quantity-' + input.dataset.cartId);
            hiddenInput.value = input.value; // Sinkronkan hidden input
        });
    });
</script>


</body>
</html>