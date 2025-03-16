import './bootstrap';
import { createApp } from 'vue';
import viewAjax from './components/viewAjax.vue';


const app = createApp({});
        app.component('view-ajax', viewAjax);
        app.mount('#app');
// document.addEventListener('DOMContentLoaded', () => {
//     const containers = document.querySelectorAll('.view-ajax-container');
    
//     containers.forEach(container => {
//         const app = createApp({});
//         app.component('view-ajax', viewAjax);
//         app.mount(container);
//     });
// });