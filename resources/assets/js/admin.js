// import $ from 'jquery';
// global.jQuery = $;


import Vue from 'vue'
import store from './components/Admin/store/vuex';
import router from './components/Admin/routes';

import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.css';

// import 'froala-editor/css/froala_editor.pkgd.min.css'
// import 'froala-editor/css/froala_style.min.css'
// import 'froala-editor/css/themes/royal.min.css'
// import 'froala-editor/css/plugins/colors.min.css'
import frola from 'froala-editor/js/froala_editor.pkgd.min'


require('froala-editor/js/froala_editor.pkgd.min')

// Require Froala Editor css files.
require('froala-editor/css/froala_editor.pkgd.min.css')
require('font-awesome/css/font-awesome.css')
require('froala-editor/css/froala_style.min.css')

// Import and use Vue Froala lib.
import VueFroala from 'vue-froala-wysiwyg'
Vue.use(VueFroala)


Vue.use(VueMaterial);



// import VueBlu from 'vue-blu'
// import 'vue-blu/dist/css/vue-blu.min.css'
//
// Vue.use(VueBlu)




import Draggable from 'vuedraggable';
import Datepicker from 'vuejs-datepicker';

Vue.component( 'draggable', Draggable );
Vue.component( 'datepicker', Datepicker );


const app = new Vue({
    el: '#app',
    router,
    store
}).$mount('#admin-app');
