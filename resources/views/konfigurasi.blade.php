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
                <select name="paket" id="paket" class="w-[300px] rounded-md p-2 mr-0">
                    <option value="1" selected>1 tahun</option>
                    <option value="2">2 tahun</option>
                    <option value="3">3 tahun</option>
                </select>
            </div>
            <div class="border-2 border-slate-600 p-3 flex justify-end">
                <label for="harga" class="text-md font-medium p-1">Harga <span>Rp 100.000</span></label>
            </div>

            {{-- bagian jika sudah login --}}
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


            {{-- bagian jika belum login --}}
            <div class="flex flex-col space-y-3 ">
                <div class="flex items-center space-x-3">
                    <label for="paket" class="text-md font-bold">Nama :</label>

                </div>
                <div class="flex items-center space-x-3">
                    <label for="paket" class="text-md font-bold">Email :</label>
                    <label for="paket" class="text-md font-bold" id="email">&nbsp;</label>
                </div>
            </div>

            {{-- checkout --}}
            <div class="flex justify-end items-center space-x-3">
                <button class="bg-blue-500 rounded-md p-2 text-white " id="checkout">Checkout</button>
            </div>
        </div>

    </div>
</body>
</html>

{{-- script import from vite --}}
@vite('resources/js/home.js')
