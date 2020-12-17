var main_url = window.location.href;
main_url = main_url.slice(0, -1);
const CONFIG = {
  // http://apple.devcorn.xyz/
  // API_BASE_URL: 'http://127.0.0.1:8000',
  API_BASE_URL: window.location.origin,
  // API_BASE_URL: "http://apple.devcorn.xyz",
};
export default CONFIG;
