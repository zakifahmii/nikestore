<footer>
    <div class="footerLeft">
        <div class="footerMenu">
            <h1 class="fMenuTitle">About Us</h1>
            <ul class="fList">
                <li class="fListItem">Company</li>
                <li class="fListItem">Contact</li>
                <li class="fListItem">Careers</li>
                <li class="fListItem">Affiliates</li>
                <li class="fListItem">Stores</li>
            </ul>
        </div>
        <div class="footerMenu">
            <h1 class="fMenuTitle">Useful Links</h1>
            <ul class="fList">
                <li class="fListItem">Support</li>
                <li class="fListItem">Refund</li>
                <li class="fListItem">FAQ</li>
                <li class="fListItem">Feedback</li>
                <li class="fListItem">Stories</li>
            </ul>
        </div>
        <div class="footerMenu">
            <h1 class="fMenuTitle">Products</h1>
            <ul class="fList">
                <li class="fListItem">Air Force</li>
                <li class="fListItem">Air Jordan</li>
                <li class="fListItem">Blazer</li>
                <li class="fListItem">Crater</li>
                <li class="fListItem">Hippie</li>
            </ul>
        </div>
    </div>
    <div class="footerRight">
        <div class="footerRightMenu">
            <h1 class="fMenuTitle">Subscribe to our newsletter</h1>
            <div class="fMail">
                <input type="text" placeholder="your@email.com" class="fInput">
                <button class="fButton">Join!</button>
            </div>
        </div>
        <div class="footerRightMenu">
            <h1 class="fMenuTitle">Follow Us</h1>
            <div class="fIcons">
                <img src="<?= base_url('assets/img/'); ?>facebook.png" alt="" class="fIcon">
                <img src="<?= base_url('assets/img/'); ?>twitter.png" alt="" class="fIcon">
                <img src="<?= base_url('assets/img/'); ?>instagram.png" alt="" class="fIcon">
                <img src="<?= base_url('assets/img/'); ?>whatsapp.png" alt="" class="fIcon">
            </div>
        </div>

    </div>
</footer>
<script>
const wrapper = document.querySelector(".sliderWrapper");
const menuItems = document.querySelectorAll(".menuItem");

const products = [{
        id: 1,
        title: "Air Force",
        price: 119,
        colors: [{
                code: "black",
                img: "<?= base_url('assets/img/air.png'); ?>",
            },
            {
                code: "darkblue",
                img: "<?= base_url('assets/img/air2.png'); ?>",
            },
        ],
    },
    {
        id: 2,
        title: "Air Jordan",
        price: 149,
        colors: [{
                code: "lightgray",
                img: "<?= base_url('assets/img/jordan.png'); ?>",
            },
            {
                code: "green",
                img: "<?= base_url('assets/img/jordan2.png'); ?>",
            },
        ],
    },
    {
        id: 3,
        title: "Blazer",
        price: 109,
        colors: [{
                code: "lightgray",
                img: "<?= base_url('assets/img/blazer.png'); ?>",
            },
            {
                code: "green",
                img: "<?= base_url('assets/img/blazer2.png'); ?>",
            },
        ],
    },
    {
        id: 4,
        title: "Crater",
        price: 129,
        colors: [{
                code: "black",
                img: "<?= base_url('assets/img/crater.png'); ?>",
            },
            {
                code: "lightgray",
                img: "<?= base_url('assets/img/crater2.png'); ?>",
            },
        ],
    },
    {
        id: 5,
        title: "Hippie",
        price: 99,
        colors: [{
                code: "gray",
                img: "<?= base_url('assets/img/hippie.png'); ?>",
            },
            {
                code: "black",
                img: "<?= base_url('assets/img/hippie2.png'); ?>",
            },
        ],
    },
];

let choosenProduct = products[0];

const currentProductImg = document.querySelector(".productImg");
const currentProductTitle = document.querySelector(".productTitle");
const currentProductPrice = document.querySelector(".productPrice");
const currentProductColors = document.querySelectorAll(".color");
const currentProductSizes = document.querySelectorAll(".size");

menuItems.forEach((item, index) => {
    item.addEventListener("click", () => {
        //change the current slide
        wrapper.style.transform = `translateX(${-100 * index}vw)`;

        //change the choosen product
        choosenProduct = products[index];

        //change texts of currentProduct
        currentProductTitle.textContent = choosenProduct.title;
        currentProductPrice.textContent = "$" + choosenProduct.price;
        currentProductImg.src = choosenProduct.colors[0].img;

        //assing new colors
        currentProductColors.forEach((color, index) => {
            color.style.backgroundColor = choosenProduct.colors[index].code;
        });
    });
});

currentProductColors.forEach((color, index) => {
    color.addEventListener("click", () => {
        currentProductImg.src = choosenProduct.colors[index].img;
    });
});

currentProductSizes.forEach((size, index) => {
    size.addEventListener("click", () => {
        currentProductSizes.forEach((size) => {
            size.style.backgroundColor = "white";
            size.style.color = "black";
        });
        size.style.backgroundColor = "black";
        size.style.color = "white";
    });
});





// const productButton = document.querySelector(".productButton");
// const payment = document.querySelector(".payment");
// const close = document.querySelector(".close");

// productButton.addEventListener("click", () => {
//   payment.style.display = "flex";
// });

// close.addEventListener("click", () => {
//   payment.style.display = "none";
// });
</script>
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>
</body>

</html>