import './bootstrap';
import Alpine from 'alpinejs'
import Mask from "@ryangjchandler/alpine-mask";
import screen from '@victoryoalli/alpinejs-screen';
import 'flowbite';

Alpine.plugin(Mask);
Alpine.plugin(screen);

window.Alpine = Alpine;
window.Alpine.start();