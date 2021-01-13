// import components
import HomeContent from "../components/HomeContent.vue";
import Login from "../components/pages/Login.vue";
import Registration from "../components/pages/Registration.vue";
import Profile from "../components/pages/Profile.vue";
import OrderTracking from "../components/pages/OrderTracking.vue";
import Register from "../components/partial/Register.vue";
import UserProfile from "../components/customer/UserProfile.vue";

//Category Route
import SubCategory from "../components/productcategory/SubCategory.vue";
//Category Route
import ChildCategory from "../components/productcategory/ChildCategory.vue";
// product related
import ProductDetails from "../components/product/ProductDetails.vue";

// search componenet
import SearchProduct from "../components/search/SearchProduct.vue";

import Store from "../components/product/Store.vue";
import Audio from "../components/product/Audio.vue";

import Support from "../components/pages/Support.vue";
import Policy from "../components/pages/Policy.vue";


// order related
import Cart from "../components/pages/Cart.vue";
import Checkout from "../components/order/Checkout.vue";
import Payment from "../components/order/Payment.vue";
import OrderInvoice from "../components/order/OrderInvoice.vue";
import OrderList from "../components/order/OrderList.vue";
import OrderView from "../components/order/OrderView.vue";
import Invoice from "../components/order/Invoice.vue";

export const routes = [
    // customer realated
    {name: "home", path: "/", component: HomeContent},
    {name: "login", path: "/login", component: Login},
    {name: "register", path: "/register", component: Registration},
    {name: "order_tracking", path: "/order_tracking", component: OrderTracking},
    {name: "sign-up", path: "/sign-up", component: Register},
    {name: "my_profile", path: "/my_profile", component: Profile},
    {
        name: "user-profile", path: "/user-profile", component: UserProfile,
        meta: {
            requiresAuth: true,
            is_customer: true,
        },
    },

    {name: "store", path: "/store", component: Store},
    {name: "audio", path: "/audio", component: Audio},
    {name: "support", path: "/support", component: Support},
    {name: "policy", path: "/policy", component: Policy},

    //Category Route
    {name: "subcategory", path: "/slug", component: SubCategory},
    {name: "childcategory", path: "/slug", component: ChildCategory},

    // product related
    {name: "product-details", path: "/product/:id", component: ProductDetails},
    {name: "invoice", path: "/invoice/:id", component: Invoice},

    // search product

    {name: "searchProduct", path: "/search", component: SearchProduct},

    // order related
    {name: "cart", path: "/cart", component: Cart},
    {
        name: "checkout", path: "/checkout", component: Checkout,
        // meta: {
        //     requiresAuth: true,
        //     is_customer: true,
        // },
    },
    {
        name: "payment", path: "/payment", component: Payment,
        meta: {
            requiresAuth: true,
            is_customer: true,
        },
    },
    {
        name: "orderinvoice", path: "/invoice", component: OrderInvoice,
        meta: {
            requiresAuth: true,
            is_customer: true,
        },
    },
    {
        name: "orderlist", path: "/my-order", component: OrderList,
        meta: {
            requiresAuth: true,
            is_customer: true,
        },
    },
    {
        name: "vieworder", path: "/view-order/:id", component: OrderView,
        meta: {
            requiresAuth: true,
            is_customer: true,
        },
    }
]

// :src="baseUrlPath + '/frontend/img/macbookpro.png'"
