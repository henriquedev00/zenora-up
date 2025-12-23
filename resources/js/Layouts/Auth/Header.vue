<script setup>
    import { usePage } from '@inertiajs/vue3';
    import { BellIcon, ChevronDownIcon } from '@heroicons/vue/24/outline';
    import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue';

    const page = usePage();

    const user = {
        name: page.props.authenticatedUser.name,
        avatar: page.props.authenticatedUser.profile_image
    };

    if (page.props.authenticatedUser.hasOwnProperty('professional')) {
        user.title = page.props.authenticatedUser.professional.title
    }
</script>

<template>
    <header class="fixed top-0 w-full h-16 bg-white px-3 sm:px-6 border-b flex items-center justify-end">
        <div class="flex items-center gap-5">
            <button type="button" class="relative p-2 rounded-lg hover:bg-gray-100 transition focus:outline-none" aria-label="Notificações">
                <BellIcon class="w-6 h-6 text-gray-600" />

                <span v-if="true" class="absolute -top-0.5 -right-0.5 bg-red-600 text-white text-[10px] px-1 py-[1px] rounded-full leading-none font-semibold">
                    2
                </span>
            </button>

            <Menu as="div" class="relative inline-block text-left">
                <div class="flex items-center gap-3">
                    <div class="text-right leading-tight">
                        <div class="text-sm font-semibold text-gray-800">{{ user.name }}</div>

                        <div v-if="user.title" class="text-xs text-gray-500">{{ user.title }}</div>
                    </div>

                    <MenuButton class="relative flex items-center focus:outline-none group">
                        <img :src="user.avatar" alt="avatar" class="w-10 h-10 rounded-full border cursor-pointer group-hover:ring-2 group-hover:ring-blue-400 transition">

                        <ChevronDownIcon class="size-4 text-gray-500 ml-1" />
                    </MenuButton>
                </div>

                <transition enter-active-class="transition duration-100 ease-out" enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100" leave-active-class="transition duration-75 ease-in" leave-from-class="transform scale-100 opacity-100" leave-to-class="transform scale-95 opacity-0">
                    <MenuItems class="absolute right-0 mt-2 w-52 origin-top-right bg-white rounded-lg shadow-lg ring-1 ring-black/5 focus:outline-none divide-y divide-gray-100">
                        <MenuItem v-slot="{ active }">
                            <a
                                href="/account/profile"
                                class="block px-4 py-2 text-sm rounded-t-lg transition"
                                :class="active ? 'bg-gray-100 text-gray-800' : 'text-gray-700'"
                            >
                                Perfil
                            </a>
                        </MenuItem>

                        <MenuItem v-slot="{ active }">
                            <a
                                href="/account/settings"
                                class="block px-4 py-2 text-sm transition"
                                :class="active ? 'bg-gray-100 text-gray-800' : 'text-gray-700'"
                            >
                                Configurações
                            </a>
                        </MenuItem>

                        <MenuItem v-slot="{ active }">
                            <a
                                href="/logout"
                                class="block px-4 py-2 text-sm text-red-600 rounded-b-lg transition"
                                :class="active ? 'bg-gray-100' : ''"
                            >
                                Sair
                            </a>
                        </MenuItem>
                    </MenuItems>
                </transition>
            </Menu>
        </div>
    </header>
</template>
