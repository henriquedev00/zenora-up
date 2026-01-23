import '@/bootstrap';
import '@/../css/app.css';
import { createApp, h } from 'vue';
import 'vue-toastification/dist/index.css';
import Toast, { useToast } from 'vue-toastification';
import { createInertiaApp, router } from '@inertiajs/vue3';

const toast = useToast();

router.on('start', () => {
    toast.clear();
});

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });

        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(Toast, { position: 'top-right', timeout: 5000 })
            .mount(el);
    }
}).catch(error => {
    console.error('Error initializing Inertia:', error);
});
