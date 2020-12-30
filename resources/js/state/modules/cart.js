export const state = {
    products: window.localStorage.getItem("products")
        ? JSON.parse(window.localStorage.getItem("products"))
        : [],
};

export const getters = {
    products: (state) => state.products,
};

export const actions = {
    addProduct({commit, state}, item) {
        let pro = state.products;
        for (var i = 0; i < pro.length; i++) {
            if (pro[i].id == item.id) {
                commit("UPDATE_COUNT", {count: pro[i].count + 1, index: i});
                saveProduct(state.products);
                return;
            }
        }
        let p = {
            id: item.id,
            price: item.stock_product ? item.stock_product.unit_price : 0,
            discount: item.stock_product ? item.stock_product.discount : 0,
            product_stock: item.stock_product ? item.stock_product.stock_quantity : 0,
            name: item.name,
            image: item.feature_image,
            count: 1,
        };

        commit("ADD_PRODUCT", p);
        saveProduct(state.products);
    },

    removeProduct({commit, state}, item) {
        let pro = state.products;
        for (var i = 0; i < pro.length; i++) {
            if (pro[i].id == item.id) {
                if (pro[i].count <= 1) {
                    commit("REMOVE_ITEM", i);
                    saveProduct(state.products);
                    return;
                }
                commit("UPDATE_COUNT", {count: pro[i].count - 1, index: i});
                saveProduct(state.products);
                return;
            }
        }
    },

    allProductRemove({commit, state}, id) {
        let pro = state.products;
        for (var i = 0; i < pro.length; i++) {
            if (pro[i].id == id) {
                commit("REMOVE_ITEM", i);
                saveProduct(state.products);
                return;
            }
        }
    },

    allProductRemoveCart({commit, state}) {
        let pro = state.products;
        commit("REMOVE_ITEMAll", pro);
        saveProduct(state.products);
        return;
    },
};

export const mutations = {
    ADD_PRODUCT(state, item) {
        state.products.push(item);
    },

    UPDATE_COUNT(state, {count, index}) {
        state.products[index].count = count;
    },

    REMOVE_ITEM(state, index) {
        state.products.splice(index, 1);
    },
    REMOVE_ITEMAll(state, index) {
        state.products.splice(index);
    },
};

function saveProduct(products) {
    window.localStorage.setItem("products", JSON.stringify(products));
}
