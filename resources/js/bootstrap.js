window._ = require('lodash');

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

try {
    require('bootstrap');
} catch (e) {
    console.error('Bootstrap non chargé', e);
}
