let id_el_list = "#product-preview";

function formatToIDR(price) {
    // Convert the number to a string and split it into an array of individual characters
    let priceString = price.toString();
    // Use a regular expression to insert thousand separators
    let formattedPrice = priceString.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

    // Prepend the "Rp " prefix to indicate Indonesian Rupiah
    return "Rp " + formattedPrice;
}

function getData() {
    let url = baseUrl + '/api/medicines';
    let payload = {
        '_limit': 5,
        '_page': 1,
        '_sort_by': 'latest_published'
    };

    axios.get(url, {params: payload}, apiHeaders)
    .then(function (response) {
        console.log('[DATA] response..', response.data);
        let template = ``;
        (response.data.products).forEach((item) => {
            template += `
            <div class="single-hero-slider-7" onclick="location.href='`+ baseUrl + `/medicine/`+ item.id + `'">
               <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hero-content-wrap">
                                <div class="hero-text-7">
                                    <h6 class="mb-20 second-font-light">
                                        Latest medicine on PharmaStore
                                    </h6>
                                    
                                    <h1 class="mb-4">` + item.name +`</h1>

                                    <div class="mb-3" style="width: 450px;">
                                        <p class="third-font-size second-font-medium">` + item.description +`</p>
                                    </div>

                                    <div class="row">
                                        <div class="col d-flex gap-2">
                                            <i class="bi bi-tags-fill h2"></i>
                                            <h3 class="mb-20 second-font-medium">`+ formatToIDR(item.price) +`</h3>
                                        </div>

                                        <div class="col">
                                            <p class="second-font-size second-font-light mt-1">Stock Left: `+ item.stock +`</p>
                                        </div>
                                    </div>
                                    
                                    <div class="button-box section-space--mt_20">
                                        <a href="#" class="btn btn-success text-btn-large font-weight--reguler font-lg-p second-font-medium px-4" style="border-radius: 70px; font-size: 17px;">DISCOVER NOW</a>

                                        <a href="#" class="btn text-btn-large font-weight--reguler font-lg-p second-font-medium px-4" style="border-radius: 70px; font-size: 20px;"><i class="bi bi-cart-plus-fill h2"></i></a>

                                        <a href="#" class="btn text-btn-large font-weight--reguler font-lg-p second-font-medium px-4" style="border-radius: 70px; font-size: 20px;"><i class="bi bi-bookmark-plus-fill h2"></i></a>

                                        <a href="#" class="btn text-btn-large font-weight--reguler font-lg-p second-font-medium px-4" style="border-radius: 70px; font-size: 20px;"><i class="bi bi-heart h2"></i></a>
                                    </div>
                                </div>

                                <div class="inner-images">
                                    <div class="image-one">
                                       <img src="` + item.cover_image + `" width="350" class="img-fluid" alt="product image">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>`;
        });

        $(id_el_list).html(template);
        $(id_el_list).slick({
            dots: false,
            infinite: true,
            slidesToShow: 1,
            slideToScroll: 1,
            autoplay: false,
            prevArrow: '<span class="arrow-prv"><i class="icon-chevron-left"></i></span>',
            nextArrow: '<span class="arrow-next"><i class="icon-chevron-right"></i></span>',
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    })
    .catch(function (error) {
        console.log('[ERROR] response..', error);
        Swal.fire({
            icon: 'error',
            width: 600,
            title: "Error",
            html: error.message,
            confirmButtonText: 'Ya',
        });
    });
}

$(function () {
    getData();
})