function getDataByWindowUrlKey() {
    let windowUrl = window.location.href;
    let windowUrlKey = windowUrl.replace(/\/\s*$/, "").split('/').pop();
    let url = baseUrl + '/api/medicines/' + windowUrlKey;

    axios.get(url, {}, apiHeaders)
    .then(function (response) {
        console.log('[DATA] response..', response.data);
        let template = '';

        $('.product-img-main-href').attr('href', response.data.cover_image);
        $('.product-img-main-src').attr('src', response.data.cover_image);
        $('#product-name').html(response.data.name);
        $('#product-price').html('IDR ' + parseFloat(response.data.price).toLocaleString());
        $('#product-description').html(response.data.description);
        $('#product-stock').html(response.data.stock);
        $('#product-supplier').html(response.data.supplier);
        $('#product-medtype').html(response.data.medicine_type);

        let stars = randomIntFromInterval(1, 5);
        template = '';

        for (let index = 0; index < 5; index++) {
            template += '<i class="' + (index < stars ? 'yellow' : '') + ' icon_star"></i>';
        }

        $('#product-review-stars').html(template);

        let reviewCount = randomIntFromInterval(1, 1000) + ' customer review';
        $('#product-review-body-count').html(reviewCount);
    })
    .catch(function (error) {
        console.log('[ERROR] response..', error.code);

        if (error.code == 'ERR_BAD_REQUEST') {
            Swal.fire({
                position: "top-end",
                icon: "warning",
                title: "Yaah...",
                html: "Produk yang Anda cari tidak ditemukan",
                showConfirmButton: false,
                timer: 5000
            });
        } else {
            Swal.fire({
                icon: 'error',
                width: 600,
                title: "Error",
                html: error.message,
                confirmButtonText: 'Ya',
            });
        }
    })

}

$(function () {
    getDataByWindowUrlKey();
})
