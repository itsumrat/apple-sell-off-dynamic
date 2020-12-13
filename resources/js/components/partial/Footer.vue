<template>
    <div>
        <section id="footer">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="footer-contents">
                            <h5>Apple</h5>
                            <ul>
                                <li><a href="#">Mac Pro</a></li>
                                <li><a href="#">iMac</a></li>
                                <li><a href="#">MacBooks</a></li>
                                <li><a href="#">Mac Mini</a></li>
                                <li><a href="#">iPad</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="footer-contents">
                            <h5>Audio</h5>
                            <ul>
                                <li><a href="#">Speakers</a></li>
                                <li><a href="#">Home Cinema</a></li>
                                <li><a href="#">Headphones</a></li>
                                <li><a href="#">Hi-Fi Speakers</a></li>
                                <li><a href="#">Cables</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="footer-contents">
                            <h5>Support</h5>
                            <ul>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Delivery</a></li>
                                <li><a href="#">Payments</a></li>
                                <li><a href="#">VAT</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="footer-contents">
                            <h5>About Us</h5>
                            <ul>
                                <li><a href="#">Who we are</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Sell Your Device</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="footer-contents">
                            <h5>Policies</h5>
                            <ul>
                                <li><a href="#">Communication</a></li>
                                <li><a href="#">Acceptable Use</a></li>
                                <li><a href="#">Cookie</a></li>
                                <li><router-link :to="{name: 'policy'}">Privacy</router-link></li>
                                <li>
                                    <a href="#">Warranty & Returns</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <p class="copyright">
                            © 2020 AppleSellOff is trading name of reApp Ltd,
                            registered in England and Wales. Registration No.
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <img :src="baseUrlPath + '/frontend/img/payment.png'" class="payment-way" />
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: "Footer",
    data() {
    return {
      baseUrlPath: null
    };
  },

  mounted() {
    this.baseUrlPath = axios.defaults.baseURL;
  },
};
</script>
