
import './bootstrap';

import * as Popper from '@popperjs/core'
window.Popper = Popper

import { createApp } from 'vue';
import App from './components/app.vue';
// import AOS from 'aos';
import router from './router';

import jQuery from 'jquery';
window.$ = jQuery;

// import 'animate.css';
// document.documentElement.style.setProperty('--animate-duration', '1.3s');

createApp(App).use(router).mount('#app');