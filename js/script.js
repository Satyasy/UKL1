// Sticky Header

const header = document.querySelector("header");

window.addEventListener("scroll", function () {
    header.classList.toggle("sticky", window.scrollY > 60);
});


        // Fungsi pencarian
        function search() {
            var input, filter, products, product, productName, i;
            input = document.getElementById('find');
            filter = input.value.toUpperCase();
            products = document.getElementsByClassName('product');
            
            // Iterasi melalui semua item produk dan menyembunyikan yang tidak cocok
            for (i = 0; i < products.length; i++) {
                product = products[i];
                productName = product.getElementsByTagName('h3')[0];
                if (productName.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    product.style.display = "";
                } else {
                    product.style.display = "none";
                }
            }
        }
