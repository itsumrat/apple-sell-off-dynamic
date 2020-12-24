<template>
    <div>
        <section id="banner-contact">
        </section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <h1>Order Tracking</h1>
                    </div>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-6 col-md-6">
                    <div class="login-area">
                        <h4>Order Tracking</h4>
                        <form>
                            <div class="form-group">
                                <label for="loginEmail">Order ID</label>
                                <input type="email" class="form-control" name="email" id="loginEmail">

                            </div>
                            <button type="submit" class="btn">Track Order</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name : 'register',
    data() {
        return {
            form : {

            },
            Errors:[],


            regErrors:[],
        }
    },
    methods : {
        //
    },
    created() {

    }
}
</script>
