// function handleShowButtonPesan
function handleShowButtonPesan(hide) {
    if (hide == true) {
        document.getElementById("domain-result").style.display = "block";
    } else {
        document.getElementById("domain-result").style.display = "none";
    }
}

// handle btn-cari
document.getElementById("btn-cari").addEventListener("click", function () {
    // jika id domain kosong maka tampilkan alert
    if (document.getElementById("domain").value == "") {
        alert("Masukkan domain!");
    } else {
        // run api https://portal.qwords.com/apitest/whois.php?domain=testing123.com
        // kemudian tampilkan hasilnya di div #hasil
        var domain = document.getElementById("domain").value;
        // url ke api backend laravel get
        var url = "/api/whois?domain=" + domain;

        fetch(url, {})
            .then((response) => {
                // get value from promise data
                let promise = response.json();
                promise.then((data) => {
                    if (data.result == "success") {
                        if (data.status == "available") {
                            alert("Domain " + domain + " Tersedia!");
                            handleShowButtonPesan(true);
                        } else {
                            alert("Domain " + domain + " tidak tersedia!");
                            handleShowButtonPesan(false);
                        }
                    } else {
                        alert("kesalahan dalam pengambilan data");
                    }
                });
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    }
});

// handle button pesan
document.getElementById("btn-pesan").addEventListener("click", function () {
    // var url = "/api/check-login";
    // fetch(url, {})
    //     .then((response) => {
    //         // get value from promise data
    //         let promise = response.json();
    //         promise.then((data) => {
    //             //jika false masuk menu
    //         });
    //     })
    //     .catch((error) => {
    //         console.error("Error:", error);
    //     });
    window.location.href = "/konfigurasi";
});
