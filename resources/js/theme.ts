import { Appearance } from '@/types';

export function updateTheme(value: Appearance): void {
    if (value === 'default') {
        const mediaQueryList = window.matchMedia('(prefers-color-scheme: dark)');
        const systemTheme = mediaQueryList.matches ? 'dark' : 'light';

        document.documentElement.dataset.theme = systemTheme === 'dark' ? 'dark' : 'light';
    } else {
        document.documentElement.dataset.theme = value === 'dark' ? 'dark' : 'light';
    }
}

const setCookie = (name: string, value: string, days = 365) => {
    const maxAge = days * 24 * 60 * 60;

    document.cookie = `${name}=${value};path=/;max-age=${maxAge};SameSite=Lax`;
};

const mediaQuery = () => {
    return window.matchMedia('(prefers-color-scheme: dark)');
};

const getStoredAppearance = () => {
    return localStorage.getItem('appearance') as Appearance | null;
};

const prefersDark = (): boolean => {
    return window.matchMedia('(prefers-color-scheme: dark)').matches;
};

const handleSystemThemeChange = () => {
    const currentAppearance = getStoredAppearance();

    updateTheme(currentAppearance || 'default');
};

export function initializeTheme(): void {
    const savedAppearance = getStoredAppearance();
    updateTheme(savedAppearance || 'default');

    mediaQuery()?.addEventListener('change', handleSystemThemeChange);
}

export function updateAppearance(value: Appearance) {
    localStorage.setItem('appearance', value);

    setCookie('appearance', value);

    updateTheme(value);
}

window.onload = () => {
    const radios = document.querySelectorAll('.theme-controller');

    radios.forEach((radio) => {
        radio.addEventListener('click', function (el) {
            const value = (el.target as HTMLInputElement).value;

            updateAppearance(value as Appearance);
        });
    });
};
