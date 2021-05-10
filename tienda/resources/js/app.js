require('./bootstrap');

require('alpinejs');

/*IMPORTANDO VUE*/

import { createApp } from 'vue';
import AdminComponent from './components/AdminComponent';

createApp({
    components: {
        AdminComponent,
      }
}).mount('#app');


