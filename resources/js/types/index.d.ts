import { Alpine } from 'alpinejs';

declare global {
    interface Window {
        Alpine: Alpine;
    }
}

export type Appearance = 'light' | 'dark' | 'default';
