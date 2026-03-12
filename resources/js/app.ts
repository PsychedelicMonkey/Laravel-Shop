import '@/bootstrap';
import { initializeTheme } from '@/theme';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

initializeTheme();
