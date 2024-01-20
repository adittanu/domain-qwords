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
            <div class="flex justify-between items-center space-x-3 ">
                <label for="paket" class="text-md font-bold">No Invoice #12</label>
                <label for="paket" class="text-md font-bold">UNPAID</label>
            </div>

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

                <table class="table-auto w-full border-collapse border-2 border-gray-400">
                    <tr class="border-2 border-gray-400">
                        <th> No </th>
                        <th> Deskripsi </th>
                        <th> Total </th>
                    </tr>
                    <tr>
                        <td class="border-2 border-gray-400"> 1 </td>
                        @php
                            if (session()->has('paket')) {
                                echo "<td class='border-2 border-gray-400'>Paket ". session('paket'). " tahun</td>";
                            } else {
                                echo "<td class='border-2 border-gray-400'>-</td>";
                            }
                        @endphp
                        @php
                            if (session()->has('paket')) {
                                echo "<td class='border-2 border-gray-400'>". session('paket'). "00000</td>";
                            } else {
                                echo "<td class='border-2 border-gray-400'>-</td>";
                            }
                        @endphp
                    </tr>
                </table>

                <div class="flex items-center space-x-3">
                    <label for="paket" class="text-md font-bold">Total :</label>
                    @php
                        if (session()->has('paket')) {
                            echo "<label for='paket' class='text-md font-bold' id='total'>". session('paket'). "00000</label>";
                        } else {
                            echo "<label for='paket' class='text-md font-bold' id='total'></label>";
                        }
                    @endphp
                </div>
                <div class="flex items-center space-x-3">
                    <label for="paket" class="text-md font-bold">Silahkan Bayar ke no rekening berikut :</label>
                    <label for="paket" class="text-md font-bold">43215324XX</label>
                </div>

            </div>

            @endif
        </div>

    </div>
</body>
</html>

{{-- script import from vite --}}
<script>
    // handle button id checkout
document.getElementById("checkout").addEventListener("click", function () {
    // pindah ke lokasi invoice
    // jika session login ada
    if (sessionStorage.getItem("login") == "true") {
        window.location.href = "/invoice";
    } else {
        // set session dari inputan
        sessionStorage.setItem("login", true);
        sessionStorage.setItem("nama", document.getElementById("nama").value);
        sessionStorage.setItem("email", document.getElementById("email").value);
        sessionStorage.setItem("password", document.getElementById("password").value);
        // pindah ke lokasi invoice
        window.location.href = "/invoice";
    }
});


</script>
{{-- @vite('resources/js/konfiguration.js') --}}
