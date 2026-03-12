import { updateAppearance } from '@/theme';
import { Alpine } from 'alpinejs';

declare global {
    interface Window {
        Alpine: Alpine;
        updateAppearance: typeof updateAppearance;
    }
}

export type Appearance = 'light' | 'dark' | 'default';
