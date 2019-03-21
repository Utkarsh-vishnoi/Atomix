require('./bootstrap');

import { library } from '@fortawesome/fontawesome-svg-core'
import { faEye as fasEye, faHeart as fasHeart } from '@fortawesome/free-solid-svg-icons'
import { faHeart as farHeart } from '@fortawesome/free-regular-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(farHeart, fasHeart, fasEye);

window.Vue = require('vue');
Vue.use(require('vue2-filters'));

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.component('IframeGridComponent', require('./components/IframeGridComponent.vue').default);

let state = JSON.parse(window.__INITIAL_STATE__);

const app = new Vue({
    el: '#app',
    data: function () {
        return {
            state: state,
            per_row: 3
        }
    },
    computed: {
        aria1: function() {
            return this.state.current_page == 1 ? 'page' : null;
        },
        ariaLast: function() {
            return this.state.current_page == this.state.last_page ? 'page' : '';
        },
        baseUrl: function() {
            return this.state.path + '?page=';
        },
        loopCounter: function() {
            return this.state.last_page - 3 >= 0 ? this.state.last_page - 2 : 0;
        },
        current_page_view: function () {
            return this.state.to - this.state.from;
        },
        rows: function() {
            return Math.ceil((this.current_page_view + 1) / this.per_row);
        }
    }
});

$(document).ready(function() {
    $('iframe').on('load', function() {
        console.log('loaded!');
    });
});
