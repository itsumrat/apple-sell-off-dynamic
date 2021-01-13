<template>
    <div>
        <section id="banner-contact"></section>
        <div id="invoiceholder">
            <div id="invoice">

                <div id="invoice-top">
                    <div class="logo"></div>
                    <div class="info">
                        <h2>{{ generalSetting.name }}</h2>
                        <p>{{ generalSetting.email }}</br>
                            {{ generalSetting.cus_support_phone }}
                        </p>
                    </div><!--End Info-->
                    <div class="title">
                        <h1>Invoice #{{ invoiceData.order_no }}</h1>
                    </div><!--End Title-->
                </div><!--End InvoiceTop-->


                <div id="invoice-mid">

                    <div class="clientlogo"></div>
                    <div class="info">
                        <h2>{{ invoiceData.address.name }}</h2>
                        <p>{{ invoiceData.address.email }}</br>
                            {{ invoiceData.address.phone }}</br></p>
                    </div>

                </div><!--End Invoice Mid-->


                <div id="invoice-address" style="width: 100%">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5>Billing Address</h5>
                            <div class="address-info">
                                <h2>{{ invoiceData.address.bname }}</h2>
                                <p>{{ invoiceData.address.bemail }}</p>
                                <p>{{ invoiceData.address.billing_country.name }}, {{ invoiceData.address.billing_division.name }}, {{ invoiceData.address.billing_district.name }}</p>
                                <p>{{ invoiceData.address.baddress }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h5>Shipping Address</h5>
                            <div class="address-info">
                                <h2>{{ invoiceData.address.sname }}</h2>
                                <p>{{ invoiceData.address.semail }}</p>
                                <p>{{ invoiceData.address.shipping_country.name }}, {{ invoiceData.address.shipping_division.name }}, {{ invoiceData.address.shipping_district.name }}</p>
                                <p>{{ invoiceData.address.saddress }}</p>
                            </div>
                        </div>
                    </div>
                </div><!--End Invoice Mid-->

                <div id="invoice-bot">

                    <div id="table">
                        <table>
                            <tr class="tabletitle">
                                <td class=""><h2>Item</h2></td>
                                <td class="Hours"><h2>Quantity</h2></td>
                                <td class="Rate"><h2>Rate</h2></td>
                                <td class="subtotal"><h2>Sub-total</h2></td>
                            </tr>

                            <tr class="service" v-for="data_value in invoiceData.product">
                                <td class="tableitem"><p class="itemtext">{{ data_value.product.name }}</p></td>
                                <td class="tableitem"><p class="itemtext">{{ data_value.quantity }}</p></td>
                                <td class="tableitem"><p class="itemtext">${{ data_value.price }}</p></td>
                                <td class="tableitem"><p class="itemtext">
                                    ${{ parseFloat(data_value.quantity) * parseFloat(data_value.price) }}</p></td>
                            </tr>

                            <tr class="tabletitle">
                                <td></td>
                                <td></td>
                                <td class="Rate"><h2>Total</h2></td>
                                <td class="payment"><h2>${{ invoiceData.total_price }}</h2></td>
                            </tr>

                        </table>
                    </div><!--End Table-->

                    <div id="legalcopy">
                        <p class="legal"><strong>Thank you for your business!</strong>
                        </p>
                    </div>

                </div><!--End InvoiceBot-->
            </div><!--End Invoice-->
        </div><!-- End Invoice Holder-->
        <!-- partial -->
    </div>
</template>
<script>
export default {
    name: "Checkout",
    data() {
        return {
            invoiceData: {},
            generalSetting: {},
        }
    },
    methods: {
        invoice() {
            const _this = this;
            axios.get(`/api/invoice/${this.$route.params.id}`)
                .then((response) => {
                    _this.invoiceData = response.data.data;
                    _this.generalSetting = response.data.setting;
                })
                .catch((error) => {
                    console.log(error);
                })
        },
    },
    mounted() {
        this.invoice();
    }
}
</script>
<style scoped>
@import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);

* {
    margin: 0;
    box-sizing: border-box;
}

body {
    background: #E0E0E0;
    font-family: 'Roboto', sans-serif;
}

::selection {
    background: #f31544;
    color: #FFF;
}

::moz-selection {
    background: #f31544;
    color: #FFF;
}

h1 {
    font-size: 1.5em;
    color: #222;
}

h2 {
    font-size: .9em;
}

h3 {
    font-size: 1.2em;
    font-weight: 300;
    line-height: 2em;
}

p {
    font-size: .7em;
    color: #666;
    line-height: 1.2em;
}

#invoiceholder {
    width: 100%;
    height: 100%;
    padding-top: 50px;
}

#invoice {
    position: relative;
    top: -30px;
    margin: 0 auto;
    width: 700px;
    background: #FFF;
    box-shadow: -1px 3px 18px -4px;
}

[id*='invoice-'] { /* Targets all id with 'col-' */
    border-bottom: 1px solid #EEE;
    padding: 30px;
}

#invoice-top {
    min-height: 120px;
}

#invoice-mid {
    min-height: 120px;
}

#invoice-bot {
    min-height: 250px;
}

.logo {
    float: left;
    display: inline-block;
    height: 62px;
    width: 115px;
    background: url(/frontend/img/logo-black.png) center/cover no-repeat;
}

.clientlogo {
    float: left;
    height: 60px;
    width: 60px;
    background: url(http://michaeltruong.ca/images/client.jpg) center/cover no-repeat;
    border-radius: 50px;
}

.info {
    display: block;
    float: left;
    margin-left: 20px;
}

.title {
    float: right;
}

.title p {
    text-align: right;
}

table {
    width: 100%;
    border-collapse: collapse;
}

td {
    padding: 5px 0 5px 15px;
    border: 1px solid #EEE
}

.tabletitle {
    padding: 5px;
    background: #EEE;
}

.service {
    border: 1px solid #EEE;
}

.item {
    width: 50%;
}

.itemtext {
    font-size: .9em;
}

#legalcopy {
    margin-top: 30px;
}

</style>
