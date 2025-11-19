<script setup>
    import { useForm } from '@inertiajs/vue3';
    import { useToast } from 'vue-toastification';

    const toast = useToast();

    const form = useForm({ email: null, password: null });

    function authenticate() {
        form.post('/authenticate', {
            onError: () => {
                form.reset('password');

                toast.warning(form.errors.message ?? 'As credenciais fornecidas não correspondem aos nossos registros.');
            }
        });
    }
</script>

<template>
    <div class="h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-6 sm:p-8 space-y-6">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-blue-600">Zenora Up</h1>

                <p class="text-gray-500 mt-1 sm:text-sm">Acesse sua conta</p>
            </div>

            <form method="POST" @submit.prevent="authenticate()" class="space-y-4">
                <div>
                    <label class="text-sm font-medium text-gray-700">E-mail</label>

                    <input type="email" v-model="form.email" name="email" placeholder="seu@email.com" required class="w-full mt-1 px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:bg-white focus:border-blue-500 transition">
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">Senha</label>

                    <input type="password" v-model="form.password" name="password" placeholder="••••••••" required class="w-full mt-1 px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:bg-white focus:border-blue-500 transition">
                </div>

                <button :disabled="form.processing" class="w-full py-3 mt-4 bg-blue-600 text-white rounded-xl font-semibold shadow-md hover:bg-blue-700 transition" :class="form.processing ? 'opacity-70 cursor-not-allowed' : ''">
                    {{ form.processing ? 'Entrando…' : 'Entrar' }}
                </button>
            </form>

            <div class="flex items-center gap-4">
                <div class="h-px bg-gray-200 flex-1"></div>

                <span class="text-gray-400 text-sm">ou</span>

                <div class="h-px bg-gray-200 flex-1"></div>
            </div>

            <div class="text-center text-sm text-gray-500 mt-2">
                <a href="#" class="text-blue-600 hover:underline">Esqueceu sua senha?</a>
            </div>
        </div>
    </div>
</template>
