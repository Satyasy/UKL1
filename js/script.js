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


        // document.addEventListener('DOMContentLoaded', function() {
        //     const fadeIns = document.querySelectorAll('.fade-in');
          
        //     function fadeInElements() {
        //       fadeIns.forEach(function(element) {
        //         if (isElementInViewport(element)) {
        //           element.classList.add('fade-in-show');
        //         }
        //       });
        //     }
          
        //     function isElementInViewport(el) {
        //       const rect = el.getBoundingClientRect();
        //       return (
        //         rect.top >= 0 &&
        //         rect.left >= 0 &&
        //         rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        //         rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        //       );
        //     }
          
        //     document.addEventListener('scroll', fadeInElements);
        //     window.addEventListener('resize', fadeInElements);
        //     window.addEventListener('load', fadeInElements);
        //   });
          

