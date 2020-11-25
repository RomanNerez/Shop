//adaptive images function
function ibg() {
    let ibg = document.querySelectorAll(".ibg");
    for (var i = 0; i < ibg.length; i++) {
        if (ibg[i].querySelector("img")) {
            ibg[i].style.backgroundImage =
                "url(" + ibg[i].querySelector("img").getAttribute("src") + ")";
        }
    }
}
ibg();

//burger menu open
const burger = document.querySelector(".burger");
const menu = document.querySelector(".menu");
const body = document.querySelector("body");
const closeButton = document.querySelector(".menu__close");
//open menu function
function openMenu() {
    menu.classList.add("active");
    body.classList.add("blocked");
}
burger.addEventListener("click", openMenu);
//close manu function
function closeMenu() {
    menu.classList.remove("active");
    body.classList.remove("blocked");
}
closeButton.addEventListener("click", closeMenu);
//main slider
$(document).ready(function() {
    $(".hero__slider").slick({
        arrows: true,
        autoplay: true
    });
});

//brands slider
$(document).ready(function() {
    $(".brands__slider").slick({
        autoplay: true,
        slidesToShow: 5,
        mobileFirst: true,
        autoplaySpeed: 1000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 320,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
});

$(document).ready(function() {
    $(".item__slider").slick({
        asNavFor: ".item__thumbnails",
        fade: true,
        arrows: false,
        draggable: false
    });
});
$(document).ready(function() {
    $(".item__thumbnails").slick({
        arrows: false,
        slidesToShow: 5,
        asNavFor: ".item__slider",
        focusOnSelect: true,
        draggable: false
    });
});



//vue starts here
var Vue = require("vue");
window.axios = require("axios");
Vue.component('Cart', require('./public/components/Cart/Cart.vue').default);
new Vue({
    el: "#app",
    data: {
        carts: [],
        countCart: 1
    },
    mounted: function() {
        this.loadCart();
    },
    computed: {
        summeryCart: function() {
            let count = 0,
                fullPrice = 0.0;
            if (this.carts.length) {
                this.carts.forEach(item => {
                    count += item.count;
                    fullPrice += item.count * item.price;
                });
                return {
                    allCount: count,
                    allPrice: Math.trunc(fullPrice * 100) / 100
                };
            }
            return {
                allPrice: fullPrice
            };
        }
    },
    methods: {
        addToCart: async function(id, count) {
            await axios
                .post("/cart/add", {
                    input: {
                        id,
                        count
                    }
                })
                .then(responce => {
                    if (responce.data.item) {
                        this.carts.push(responce.data.item);
                    }
                })
                .catch(err => {
                    console.log(err);
                });
        },
        removeCart: async function(id) {
            await axios
                .post("/cart/delete", { id })
                .then(responce => {
                    if (responce.data.done) {
                        for (let i = 0; i < this.carts.length; i++) {
                            if (this.carts[i].id === id) {
                                this.carts.splice(i, 1);
                            }
                        }
                    }
                })
                .catch(err => {
                    console.log(err);
                });
        },
        existsCart: function(id) {
            for (let i = 0; i < this.carts.length; i++) {
                let item = this.carts[i];
                if (item.id === id) {
                    return true;
                }
            }
            return false;
        },
        loadCart: async function() {
            await axios
                .post("/cart/all")
                .then(responce => {
                    if (responce.data.done) {
                        if (responce.data.items) {
                            this.carts = responce.data.items;
                            return;
                        }
                        this.carts = [];
                    }
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
});
