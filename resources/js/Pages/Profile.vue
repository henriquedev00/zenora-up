<script setup>
    import { computed, ref } from 'vue';
    import App from '@/Layouts/Auth/App.vue';
    import { useForm } from '@inertiajs/vue3';
    import { useToast } from 'vue-toastification';
    import { LockClosedIcon } from '@heroicons/vue/24/outline';
    import {EyeIcon, EyeSlashIcon, PencilSquareIcon, XMarkIcon } from '@heroicons/vue/24/outline/index.js';

    defineOptions({ layout: App });

    const props = defineProps({
        authenticatedUser: {
            type: Object,
            required: true
        }
    });

    const toast = useToast();

    const showNewPassword = ref(false);

    const isProfessional = computed(() => props.authenticatedUser.hasOwnProperty('professional'));

    const form1 = useForm({
        email: props.authenticatedUser.email,
        full_name: props.authenticatedUser.full_name
    });

    if (isProfessional.value) {
        form1.professional = {
            title: props.authenticatedUser.professional.title,
            professional_license: props.authenticatedUser.professional.professional_license
        }
    }

    const form2 = useForm({
        new_password: '',
        new_password_confirmation: ''
    });

    function updatePassword() {
        form2.patch('update-password', {
            onError: (errors) => {
                toast.warning(errors.new_password);
            },
            onSuccess: () => {
                form2.reset('new_password', 'new_password_confirmation');

                toast.success('Senha atualizada com sucesso.');
            }
        });
    }
</script>

<template>
    <div class="flex-1 bg-white rounded-lg">
        <div class="px-4 sm:px-6 lg:px-8 py-8 space-y-6">
            <div>
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900">Meu perfil</h1>

                <p class="text-sm sm:text-base text-gray-500 mt-1">Atualize seus dados.</p>
            </div>

            <div class="bg-white rounded-lg shadow-md border border-gray-100 p-4 sm:p-6">
                <form method="POST" @submit.prevent="" class="flex flex-col items-center sm:flex-row sm:items-start gap-6">
                    <div class="relative">
                        <label for="file_input" class="group w-24 h-24 rounded-full bg-gray-100 overflow-hidden border flex items-center justify-center hover:cursor-pointer focus:ring-2 focus:ring-blue-400">
                            <img :src="authenticatedUser.profile_image">

                            <input type="file" id="file_input" accept="image/*" class="hidden">

                            <div class="absolute inset-0 rounded-full bg-black/30 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <div class="inline-flex items-center gap-2 text-white text-sm font-medium">
                                    <PencilSquareIcon class="w-5 h-5" />
                                </div>
                            </div>
                        </label>
                    </div>

                    <div class="flex-1">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="text-sm md:text-base lg:text-lg font-medium text-gray-700">Nome completo</label>

                                <input type="text" v-model="form1.full_name" placeholder="Seu nome" required class="w-full mt-1 px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:bg-white focus:border-blue-500 focus-visible:outline-blue-500 transition">
                            </div>

                            <div>
                                <label class="text-sm md:text-base lg:text-lg font-medium text-gray-700">E-mail</label>

                                <input type="email" v-model="form1.email" placeholder="seu@email.com" required class="w-full mt-1 px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:bg-white focus:border-blue-500 focus-visible:outline-blue-500 transition">
                            </div>

                            <div v-if="isProfessional">
                                <label class="text-sm md:text-base lg:text-lg font-medium text-gray-700">Título</label>

                                <input type="text" v-model="form1.professional.title" placeholder="Ex.: Cardiologista" required class="w-full mt-1 px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:bg-white focus:border-blue-500 focus-visible:outline-blue-500 transition">
                            </div>

                            <div v-if="isProfessional">
                                <label class="text-sm md:text-base lg:text-lg font-medium text-gray-700">Licença profissional</label>

                                <input type="text" v-model="form1.professional.professional_license" placeholder="Ex.: CRM 123456/SP" required class="w-full mt-1 px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:bg-white focus:border-blue-500 focus-visible:outline-blue-500 transition" disabled>

                                <p class="text-xs text-gray-500 mt-1">Este campo não pode ser editado.</p>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end">
                            <button :disabled="form1.processing" class="px-4 py-3 mt-4 bg-blue-600 text-white rounded-xl font-semibold shadow-md hover:bg-blue-700 transition" :class="form1.processing ? 'opacity-70 cursor-not-allowed' : ''">
                                {{ form1.processing ? 'Atualizar…' : 'Atualizar dados' }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="bg-white rounded-lg shadow-md border border-gray-100 p-4 sm:p-6">
                <div class="flex items-center gap-2">
                    <LockClosedIcon class="w-5 h-5 sm:w-6 sm:h-6 text-gray-600" />

                    <h2 class="text-base sm:text-lg lg:text-xl font-semibold text-gray-900">Segurança</h2>
                </div>

                <p class="text-sm sm:text-base text-gray-500 mt-1">Defina uma nova senha.</p>

                <form method="POST" @submit.prevent="updatePassword()" class="mt-4 flex flex-col">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 flex-1">
                        <div>
                            <label class="text-sm font-medium text-gray-700">Nova senha</label>

                            <div class="relative">
                                <input :type="showNewPassword ? 'text' : 'password'" v-model="form2.new_password" placeholder="••••••••" required class="w-full mt-1 px-4 py-3 pr-12 rounded-xl border border-gray-300 bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:bg-white focus:border-blue-500 focus-visible:outline-blue-500 transition">

                                <button type="button" @click="showNewPassword = !showNewPassword" class="absolute bottom-0 top-2 right-4 flex items-center text-gray-500 hover:text-gray-700" tabindex="-1">
                                    <EyeIcon v-if="!showNewPassword" class="w-5 h-5" />

                                    <EyeSlashIcon v-else class="w-5 h-5" />
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-700">Confirmar nova senha</label>

                            <div class="relative">
                                <input :type="showNewPassword ? 'text' : 'password'" v-model="form2.new_password_confirmation" placeholder="••••••••" required class="w-full mt-1 px-4 py-3 pr-12 rounded-xl border border-gray-300 bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:bg-white focus:border-blue-500 focus-visible:outline-blue-500 transition">

                                <button type="button" @click="showNewPassword = !showNewPassword" class="absolute bottom-0 top-2 right-4 flex items-center text-gray-500 hover:text-gray-700" tabindex="-1">
                                    <EyeIcon v-if="!showNewPassword" class="w-5 h-5" />

                                    <EyeSlashIcon v-else class="w-5 h-5" />
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end">
                        <button :disabled="form2.processing" class="px-4 py-3 mt-4 bg-blue-600 text-white rounded-xl font-semibold shadow-md hover:bg-blue-700 transition" :class="form2.processing ? 'opacity-70 cursor-not-allowed' : ''">
                            {{ form2.processing ? 'Atualizando…' : 'Atualizar senha' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
