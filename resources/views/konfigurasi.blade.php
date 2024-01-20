<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
    <div class="flex justify-center items-center flex-col space-y-4 h-screen w-screen bg-gray-200 ">
        <div class="w-[600px] rounded-md p-8 mr-0 bg-slate-300 space-y-4">
            {{-- input select paket domain --}}
            <div class="flex justify-between items-center space-x-3 ">
                <label for="paket" class="text-md font-bold">Paket Domain</label>
                <select name="select_paket" id="select-paket" class="w-[300px] rounded-md p-2 mr-0">
                    <option value="1" selected>1 tahun</option>
                    <option value="2">2 tahun</option>
                    <option value="3">3 tahun</option>
                </select>
            </div>
            <div class="border-2 border-slate-600 p-3 flex justify-end">
                <label for="harga" class="text-md font-medium p-1">Harga <span id="disp-harga">Rp 100.000</span></label>
            </div>
            @php
            @endphp
            {{-- bagian jika sudah login --}}
            @if (session()->has('login'))

            <div class="flex flex-col space-y-3 ">
                <div class="flex items-center space-x-3">
                    <label for="paket" class="text-md font-bold">Nama :</label>
                    @php
                        if (session()->has('nama')) {
                            echo "<label for='paket' class='text-md font-bold' id='nama'>". session('nama'). "</label>";
                        } else {
                            echo "<label for='paket' class='text-md font-bold' id='nama'></label>";
                        }
                    @endphp
                </div>
                <div class="flex items-center space-x-3">
                    <label for="paket" class="text-md font-bold">Email :</label>
                    @php
                    if (session()->has('email')) {
                            echo "<label for='paket' class='text-md font-bold' id='email'>". session('email'). "</label>";
                        } else {
                            echo "<label for='paket' class='text-md font-bold' id='email'></label>";
                        }
                    @endphp
                </div>
            </div>

            @endif



            {{-- bagian jika belum login --}}
            @if (!session()->has('login'))

            <div class="flex flex-col space-y-3 items-center">
                <div class="flex items-center space-x-3">
                    {{-- input nama --}}
                    <input type="text" name="nama" id="nama" class="w-[300px] rounded-md p-2 mr-0" placeholder="Nama">
                </div>
                <div class="flex items-center space-x-3">
                    {{-- input email --}}
                    <input type="text" name="email" id="email" class="w-[300px] rounded-md p-2 mr-0" placeholder="Email">
                </div>
                <div class="flex items-center space-x-3">
                    {{-- input password --}}
                    <input type="password" name="password" id="password" class="w-[300px] rounded-md p-2 mr-0" placeholder="Password">
                </div>
                <div class="flex items-center space-x-3">
                    {{-- jika sudah ada akun login --}}
                    <label for="login" class="text-md font-medium p-1">atau login <span id="disp-login" class="text-blue-500 cursor-pointer">disini</span></label>
                </div>
            </div>
            @endif


            {{-- checkout --}}
            <div class="flex justify-end items-center space-x-3">
                <button class="bg-blue-500 rounded-md p-2 text-white " id="checkout">Checkout</button>
            </div>
        </div>

    </div>
</body>
</html>

{{-- script import from vite --}}
<script>
// handle select mempengaruhi harga
document.getElementById("select-paket").addEventListener("change", function () {
    // ubah disp harga
    document.getElementById("disp-harga").innerHTML = "Rp " + this.value * 100000;
})

    // handle button id checkout
document.getElementById("checkout").addEventListener("click", function () {
    // pindah ke lokasi invoice
    // jika session login ada
    if (sessionStorage.getItem("login") == "true") {
        // gunakan session dari sessionStorage
        window.location.href = "/invoice?login=true&nama=" + sessionStorage.getItem("nama") + "&email=" + sessionStorage.getItem("email") + "&password=" + sessionStorage.getItem("password") + "&paket=" + document.getElementById("select-paket").value;
    } else {
        // set session dari inputan
        // sessionStorage.setItem("login", true);
        // sessionStorage.setItem("nama", document.getElementById("nama").value);
        // sessionStorage.setItem("email", document.getElementById("email").value);
        // sessionStorage.setItem("password", document.getElementById("password").value);
        // pindah ke lokasi invoice
        window.location.href = "/invoice?login=true&nama=" + document.getElementById("nama").value + "&email=" + document.getElementById("email").value + "&password=" + document.getElementById("password").value + "&paket=" + document.getElementById("select-paket").value;
    }
});


</script>
{{-- @vite('resources/js/konfiguration.js') --}}
