<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
    <div class="flex justify-center items-center flex-col space-y-4 h-screen w-screen bg-gray-200">
        {{-- input cari domain --}}
        <div class="space-x-0">
            <input type="text" name="domain" id="domain" placeholder="Cari domain" class="w-{300px} rounded-l-md p-2 mr-0">
            {{-- button cari --}}
            <button class="bg-blue-500 rounded-r-md p-2 text-white ml-0" id="btn-cari">Cari</button>
        </div>
        <div class="space-x-0 items-center justify-center hidden" id="domain-result">
            {{-- button pesan --}}
            <div>
                <span>Selamat domain anda tersedia!</span>
            </div>
            <button class="bg-blue-500 rounded-md p-2 text-white ml-0 text-center" id="btn-pesan">Pesan</button>
        </div>
    </div>
</body>
</html>

{{-- script import from vite --}}
@vite('resources/js/home.js')
