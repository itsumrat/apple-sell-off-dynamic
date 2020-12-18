<template>
	<div>
		<section id="banner-support">
		</section>
		<div class="container">
		    <div class="row">
		        <div class="col-12 page-title">
		            <h1>support</h1>
		        </div>
		        <div class="col-lg-3 col-xs-12">
		            <div class="nav flex-column support-page nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		                <a style="padding: 1rem 1rem;" class="nav-link active" id="contact-tab" data-toggle="pill" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Contact</a>
		                <a style="padding: 1rem 1rem;" class="nav-link" id="faq-tab" data-toggle="pill" href="#faq" role="tab" aria-controls="faq" aria-selected="false">FAQs</a>
		            </div>
		        </div>
		        <div class="col-lg-9 col-xs-12">
		            <div class="tab-content" id="v-pills-tabContent">
		                <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
		                    <h3>{{ general_setting.support_title }}</h3>
		                    <p>{{ general_setting.support_description }}</p>
		                    <div class="row">
		                        <div class="col-lg-8">
		                            <div class="email-form">
		                                <h5>Send A Message</h5>
		                                <form>
		                                    <div class="form-group">
		                                        <label for="fullName">Your name*</label>
		                                        <input type="text" class="form-control" id="fullName" placeholder="Full name">
		                                    </div>
		                                    <div class="form-group">
		                                        <label for="email">Email address*</label>
		                                        <input type="email" class="form-control" id="email" placeholder="Email address">
		                                    </div>
		                                    <div class="form-group">
		                                        <label for="contactNo">Contact no</label>
		                                        <input type="text" class="form-control" id="contactNo" placeholder="Contact no">
		                                    </div>
		                                    <div class="form-group">
		                                        <label for="enquiryType">Enquiry Type</label>
		                                        <select class="form-control" id="enquiryType">
		                                            <option>Enquiry type</option>
		                                            <option>Sales</option>
		                                            <option>Technical</option>
		                                            <option>Administration</option>
		                                        </select>
		                                    </div>
		                                    <div class="form-group">
		                                        <label for="message">Message*</label>
		                                        <textarea class="form-control" id="message" rows="5" placeholder="Enter message here"></textarea>
		                                    </div>
		                                    <button type="submit" class="btn">Submit</button>
		                                </form>
		                            </div>
		                        </div>
		                        <div class="col-lg-4">
		                            <div class="contact-info">
		                                <h5>Send A Message</h5>
		                                <b style="font-weight: 500">Email</b>: <a href="#">{{ general_setting.tech_support_email }}</a>
		                                <b style="font-weight: 500">Phone</b>: <a href="#">{{ general_setting.tech_support_phone }}</a>
		                                <h6>Technical Support</h6>
		                                <b style="font-weight: 500">Email</b>: <a href="#">{{ general_setting.cus_support_email }}</a>
		                                <b style="font-weight: 500">Phone</b>: <a href="#">{{ general_setting.cus_support_phone }}</a>
		                                <h6>Customer Support</h6>
		                                <b style="font-weight: 500">Email</b>: <a href="#">{{ general_setting.email }}</a>
		                                <h6>Address</h6>
		                                <address>
		                                    {{ general_setting.address }}
                                        </address>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
		                    <div class="accordion">
		                        <div v-for="(data, index) in faqs_setting" class="accordion-item">
		                            <button class="accordion-button" :id="'accordion-button-'+index" @click="faqCollapse('accordion-button-'+index)" aria-expanded="false"><span class="accordion-title">{{ data.name }}</span><span class="icon" aria-hidden="true"></span></button>
		                            <div class="accordion-content">
                                        <div v-for="(data_value, key) in data.faqs_setting">
		                                    <h6>Q: {{ data_value.title }}</h6>
		                                    <p>{{ data_value.description }}</p>
                                        </div>
                                    </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<section id="subscription" style="margin-top: 12rem">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-8 offset-lg-2">
		                <div class="subscribe-box">
		                    <p>Join our newsletter for the latest Apple stock</p>
		                    <input type="email" class="form-control subscribe-input" placeholder="Enter Your Email Here">
		                    <button class="btn subscribe-btn">Subscribe</button>
		                </div>
		            </div>
		            <div class="col-lg-12">
		                <div class="social-links">
		                    <ul>
		                        <li><a :href="home_page_setting.instagram_url"><i class="fab fa-instagram-square"></i></a></li>
		                        <li><a :href="home_page_setting.facebook_url"><i class="fab fa-facebook-square"></i></a></li>
		                        <li><a :href="home_page_setting.twitter_url"><i class="fab fa-twitter-square"></i></a></li>
		                        <li><a :href="home_page_setting.pinterest_url"><i class="fab fa-pinterest-square"></i></a></li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		    </div>
		</section>
	</div>
</template>
<script>
export default {
    name: "Support",
    data() {
        return {
            faqs_setting : {},
            general_setting : {},
            home_page_setting : {},
        };
    },
    methods : {
        getGeneralSetting () {
            const _this = this;
            axios.get(`/api/general_setting`)
                .then((response) => {
                    _this.general_setting = response.data;
                });
        },
        getFaqsSetting () {
            const _this = this;
            axios.get(`/api/faqs_setting`)
                .then((response) => {
                    _this.faqs_setting = response.data;
                });
        },
        getHomePageSetting () {
            const _this = this;
            axios.get(`/api/home_page_setting`)
                .then((response) => {
                    _this.home_page_setting = response.data;
                });
        },
        faqCollapse(id) {
            let id_value = $('#'+id).attr('aria-expanded');
            $('.accordion-button').attr('aria-expanded', false);
            if(id_value == 'true') {
                $('#'+id).attr('aria-expanded', 'false');
            } else {
                $('#'+id).attr('aria-expanded', 'true');
            }
        }
    },

    created() {
        this.getGeneralSetting();
        this.getFaqsSetting();
        this.getHomePageSetting();
    },
}
</script>
