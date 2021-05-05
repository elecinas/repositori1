require('./bootstrap');

require('alpinejs');

/*IMPORTANDO VUE*/

import { createApp } from 'vue';
import ExampleComponent from  './components/ExampleComponent'

        createApp({
            components: {
                ExampleComponent,
            }
        }).mount('#app');

