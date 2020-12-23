<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <h1>Profile</h1>
                    </div>
                </div>
                <div class="col-md-6 offset-md-3 mt-2">
                    <div class="card">
                        <div class="card-header text-uppercase text-info">
                            Profile Info
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <th>:</th>
                                    <th>{{ UserInfo.name }}</th>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <th>:</th>
                                    <th>{{ UserInfo.email }}</th>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <th>:</th>
                                    <th>{{ UserInfo.phone }}</th>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <th>:</th>
                                    <th>{{ UserInfo.address }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            UserInfo : {},
        }
    },
    methods: {

        User() {
            const _this = this;
            axios.get('/api/user_info', _this.form)
                .then((response) => {
                    this.UserInfo = response.data.data
                })
                .catch((error) => {
                    console.log(error);
                })
        },
    },
    mounted() {
        this.User();
    }
};
</script>
