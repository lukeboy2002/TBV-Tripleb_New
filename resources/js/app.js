import './bootstrap';
import 'flowbite';
import './leftslider';
import './switcher';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
