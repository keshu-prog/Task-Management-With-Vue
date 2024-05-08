import { createApp } from 'vue'; // Import the createApp function from Vue

import App from './components/App.vue';
import VueAxios from 'vue-axios';
import axios from 'axios';
import { createRouter, createWebHistory } from 'vue-router';
import { routes } from './routes.js';

const router = createRouter({
    history: createWebHistory(),
    routes: routes
});

const app = createApp(App); // Create a Vue app instance

app.use(router); // Use the router plugin
app.use(VueAxios, axios);

app.mount('#app'); // Mount the app to the #app element in your HTML
