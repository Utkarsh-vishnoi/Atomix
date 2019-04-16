require('./bootstrap');
require('./decimalReAdjust');
require('./noty');

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
Vue.component('FooterNavComponent', require('./components/FooterNavComponent').default);

let state = JSON.parse(window.__INITIAL_STATE__ ? window.__INITIAL_STATE__ : '{}');
window.$user = JSON.parse(window.$user ? window.$user : null);

Vue.filter('viewFilter', function (value) {
  if (!value) return 0
  if (value < 1000) // 1K  0 - 999
    return value;
  else if (value < 10000) // 10K   1K - 9.9K
    return ((value % 1000 < 100) ? Math.round(value / 1000) : Math.floor10(value / 1000, -1)) + "K";
  else if (value < 1000000) // 1M  10K - 999K
    return Math.floor(value / 1000) + "K";
  else if (value < 10000000) // 10 M  1M - 9.9M
    return ((value % 1000000 < 100000) ? Math.round(value / 1000000) : Math.floor10(value / 1000000, -1)) + "M";
  else if (value < 1000000000) // 1B 10M - 999M
    return Math.floor(value / 1000000) + "M";
  else if (value < 10000000000) // 10B 1B - 9.9B
    return ((value % 1000000000 < 100000000) ? Math.round(value / 1000000000) : Math.floor10(value / 1000000000, -1)) + "B";
  // else if (value < 1000000000000) // 1T 10B - 999B
  //   return Math.floor(value / 1000000000) + "B";
});

const app = new Vue({
    el: '#app',
    data: function () {
        return {
            state: state,
            per_row: 3
        }
    },
    computed: {
        rows: function() {
            var current_page_views = this.state.to - this.state.from;
            return Math.ceil((current_page_views + 1) / this.per_row);
        },
        nav_state: function() {
            var state = this.state;
            delete state.data;
            return state;
        }
    }
});

$(document).ready(function() {
    $('iframe').on('load', function() {
        console.log('loaded!');
    });
});
