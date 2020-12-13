export const state = {
  token: localStorage.getItem("eShop.token"),
  user: JSON.parse(localStorage.getItem("eShop.user")),
};

export const getters = {
  token: (state) => state.token,
  isLoggedIn(state) {
    if (state.token) {
      return true;
    }
    return false;
  },
  user: (state) => state.user,
  isUser(state) {
    if (state.user) {
      return state.user;
    }
    return false;
  },
};

export const actions = {
  setToken({ commit }, token) {
    localStorage.setItem("eShop.token", token);
    commit("SET_TOKEN", token);
  },
  removeToken({ commit }) {
    localStorage.removeItem("eShop.user");
    localStorage.removeItem("eShop.token");
    commit("REMOVE_TOKEN");
  },
  setUser({ commit }, user) {
    localStorage.setItem("eShop.user", JSON.stringify(user));
    commit("SET_USER", user);
  },
};

export const mutations = {
  SET_TOKEN(state, token) {
    state.token = token;
  },
  REMOVE_TOKEN(state) {
    state.token = null;
    state.user = null;
  },
  SET_USER(state, user) {
    state.user = user;
  },
};
