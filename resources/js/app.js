import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import Shepherd from 'shepherd.js';
import 'shepherd.js/dist/css/shepherd.css';
import './tour';

window.Alpine = Alpine;

window.Shepherd = Shepherd;
Alpine.plugin(focus);

Alpine.start();
