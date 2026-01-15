<script setup>
    import { Link, usePage } from '@inertiajs/vue3';
    import { XMarkIcon } from '@heroicons/vue/24/outline';
    import { Dialog, DialogPanel, TransitionRoot, TransitionChild } from '@headlessui/vue';
    import { HomeIcon, UsersIcon, CalendarDaysIcon, BanknotesIcon } from '@heroicons/vue/24/outline';

    const page = usePage();

    const emit = defineEmits(['close']);

    function isActivePath(path) {
        return page.url === path || page.url.startsWith(path + '?') || page.url.startsWith(path + '/');
    }

    defineProps({
        open: {
            type: Boolean,
            default: false
        }
    });
</script>

<template>
    <aside class="hidden w-64 lg:fixed lg:inset-y-0 lg:left-0 lg:flex lg:flex-col">
        <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r bg-white pb-6">
            <div class="h-16 flex items-center gap-3 border-b -mx-6 px-12">
                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500 to-blue-400 flex items-center justify-center text-white font-bold">ZU</div>

                <div class="leading-tight font-semibold text-gray-800">Zenora Up</div>
            </div>

            <nav class="flex flex-1 flex-col pl-6 pr-3">
                <ul class="flex flex-1 flex-col gap-y-2.5">
                    <li>
                        <Link
                            href="/"
                            class="group relative flex items-center gap-3 rounded-lg px-3 py-1.5 text-sm font-medium transition-all"
                            :class="isActivePath('/') ? 'bg-blue-50 text-blue-700 shadow-sm ring-1 ring-blue-100' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900'"
                        >
                            <span
                                aria-hidden="true"
                                class="absolute left-0 top-1/2 -translate-y-1/2 h-7 w-1 rounded-full transition"
                                :class="isActivePath('/') ? 'bg-blue-600' : 'bg-transparent group-hover:bg-gray-200'"
                            />

                            <span
                                aria-hidden="true"
                                class="flex size-9 items-center justify-center rounded-xl border transition"
                                :class="isActivePath('/') ? 'bg-white border-blue-100 text-blue-700' : 'bg-white border-gray-200 text-gray-500 group-hover:text-gray-700 group-hover:border-gray-300'"
                            >
                                <HomeIcon class="size-5" />
                            </span>

                            <span class="truncate">Home</span>
                        </Link>
                    </li>

                    <li>
                        <Link
                            href="/agenda"
                            class="group relative flex items-center gap-3 rounded-lg px-3 py-1.5 text-sm font-medium transition-all"
                            :class="isActivePath('/agenda') ? 'bg-blue-50 text-blue-700 shadow-sm ring-1 ring-blue-100' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900'"
                        >
                            <span
                                aria-hidden="true"
                                class="absolute left-0 top-1/2 -translate-y-1/2 h-7 w-1 rounded-full transition"
                                :class="isActivePath('/agenda') ? 'bg-blue-600' : 'bg-transparent group-hover:bg-gray-200'"
                            />

                            <span
                                aria-hidden="true"
                                class="flex size-9 items-center justify-center rounded-xl border transition"
                                :class="isActivePath('/agenda') ? 'bg-white border-blue-100 text-blue-700' : 'bg-white border-gray-200 text-gray-500 group-hover:text-gray-700 group-hover:border-gray-300'"
                            >
                                <CalendarDaysIcon class="size-5" />
                            </span>

                            <span class="truncate">Agenda</span>
                        </Link>
                    </li>

                    <li>
                        <Link
                            href="/patients"
                            class="group relative flex items-center gap-3 rounded-lg px-3 py-1.5 text-sm font-medium transition-all"
                            :class="isActivePath('/patients') ? 'bg-blue-50 text-blue-700 shadow-sm ring-1 ring-blue-100' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900'"
                        >
                            <span
                                aria-hidden="true"
                                class="absolute left-0 top-1/2 -translate-y-1/2 h-7 w-1 rounded-full transition"
                                :class="isActivePath('/patients') ? 'bg-blue-600' : 'bg-transparent group-hover:bg-gray-200'"
                            />

                            <span
                                aria-hidden="true"
                                class="flex size-9 items-center justify-center rounded-xl border transition"
                                :class="isActivePath('/patients') ? 'bg-white border-blue-100 text-blue-700' : 'bg-white border-gray-200 text-gray-500 group-hover:text-gray-700 group-hover:border-gray-300'"
                            >
                                <UsersIcon class="size-5" />
                            </span>

                            <span class="truncate">Pacientes</span>
                        </Link>
                    </li>

                    <li>
                        <Link
                            href="/finance"
                            class="group relative flex items-center gap-3 rounded-lg px-3 py-1.5 text-sm font-medium transition-all"
                            :class="isActivePath('/finance') ? 'bg-blue-50 text-blue-700 shadow-sm ring-1 ring-blue-100' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900'"
                        >
                            <span
                                aria-hidden="true"
                                class="absolute left-0 top-1/2 -translate-y-1/2 h-7 w-1 rounded-full transition"
                                :class="isActivePath('/finance') ? 'bg-blue-600' : 'bg-transparent group-hover:bg-gray-200'"
                            />

                            <span
                                aria-hidden="true"
                                class="flex size-9 items-center justify-center rounded-xl border transition"
                                :class="isActivePath('/finance') ? 'bg-white border-blue-100 text-blue-700' : 'bg-white border-gray-200 text-gray-500 group-hover:text-gray-700 group-hover:border-gray-300'"
                            >
                                <BanknotesIcon class="size-5" />
                            </span>

                            <span class="truncate">Financeiro</span>
                        </Link>
                    </li>
                </ul>
            </nav>

            <button type="button" class="mx-3 font-semibold py-3 bg-gradient-to-br from-blue-600 to-blue-500 text-white rounded-xl shadow hover:bg-blue-700 transition">
                Agendar atendimento
            </button>
        </div>
    </aside>

    <TransitionRoot appear :show="open" as="div">
        <Dialog as="div" v-if="open"  @close="emit('close')">
            <TransitionChild
                as="template"
                leave-to="opacity-0"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave-from="opacity-100"
                leave="duration-200 ease-in"
                enter="duration-300 ease-out"
            >
                <div class="fixed inset-0 bg-black/30" aria-hidden="true" />
            </TransitionChild>

            <div class="fixed inset-0 flex">
                <TransitionChild
                    as="template"
                    leave="duration-200 ease-in"
                    enter="duration-300 ease-out"
                    leave-to="opacity-0 scale-95"
                    enter-from="opacity-0 scale-95"
                    enter-to="opacity-100 scale-100"
                    leave-from="opacity-100 scale-100"
                >
                    <DialogPanel class="relative flex max-w-80 flex-1 bg-white shadow-xl">
                        <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r bg-white pb-6">
                            <div class="h-16 flex items-center justify-between border-b -mx-6 px-12">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500 to-blue-400 flex items-center justify-center text-white font-bold">ZU</div>

                                    <div class="leading-tight font-semibold text-gray-800">Zenora Up</div>
                                </div>

                                <button type="button" class="p-2 rounded-lg hover:bg-gray-100" @click="emit('close')">
                                    <XMarkIcon class="size-7 text-gray-600" />
                                </button>
                            </div>

                            <nav class="flex flex-1 flex-col pl-6 pr-3">
                                <ul class="flex flex-1 flex-col gap-y-2.5">
                                    <li>
                                        <Link
                                            href="/"
                                            class="group relative flex items-center gap-3 rounded-lg px-3 py-1.5 text-sm font-medium transition-all"
                                            :class="isActivePath('/') ? 'bg-blue-50 text-blue-700 shadow-sm ring-1 ring-blue-100' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900'"
                                        >
                                            <span
                                                aria-hidden="true"
                                                class="absolute left-0 top-1/2 -translate-y-1/2 h-7 w-1 rounded-full transition"
                                                :class="isActivePath('/') ? 'bg-blue-600' : 'bg-transparent group-hover:bg-gray-200'"
                                            />

                                            <span
                                                aria-hidden="true"
                                                class="flex size-9 items-center justify-center rounded-xl border transition"
                                                :class="isActivePath('/') ? 'bg-white border-blue-100 text-blue-700' : 'bg-white border-gray-200 text-gray-500 group-hover:text-gray-700 group-hover:border-gray-300'"
                                            >
                                                <HomeIcon class="size-5" />
                                            </span>

                                            <span class="truncate">Home</span>
                                        </Link>
                                    </li>

                                    <li>
                                        <Link
                                            href="/agenda"
                                            class="group relative flex items-center gap-3 rounded-lg px-3 py-1.5 text-sm font-medium transition-all"
                                            :class="isActivePath('/agenda') ? 'bg-blue-50 text-blue-700 shadow-sm ring-1 ring-blue-100' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900'"
                                        >
                                            <span
                                                aria-hidden="true"
                                                class="absolute left-0 top-1/2 -translate-y-1/2 h-7 w-1 rounded-full transition"
                                                :class="isActivePath('/agenda') ? 'bg-blue-600' : 'bg-transparent group-hover:bg-gray-200'"
                                            />

                                            <span
                                                aria-hidden="true"
                                                class="flex size-9 items-center justify-center rounded-xl border transition"
                                                :class="isActivePath('/agenda') ? 'bg-white border-blue-100 text-blue-700' : 'bg-white border-gray-200 text-gray-500 group-hover:text-gray-700 group-hover:border-gray-300'"
                                            >
                                                <CalendarDaysIcon class="size-5" />
                                            </span>

                                            <span class="truncate">Agenda</span>
                                        </Link>
                                    </li>

                                    <li>
                                        <Link
                                            href="/patients"
                                            class="group relative flex items-center gap-3 rounded-lg px-3 py-1.5 text-sm font-medium transition-all"
                                            :class="isActivePath('/patients') ? 'bg-blue-50 text-blue-700 shadow-sm ring-1 ring-blue-100' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900'"
                                        >
                                            <span
                                                aria-hidden="true"
                                                class="absolute left-0 top-1/2 -translate-y-1/2 h-7 w-1 rounded-full transition"
                                                :class="isActivePath('/patients') ? 'bg-blue-600' : 'bg-transparent group-hover:bg-gray-200'"
                                            />

                                            <span
                                                aria-hidden="true"
                                                class="flex size-9 items-center justify-center rounded-xl border transition"
                                                :class="isActivePath('/patients') ? 'bg-white border-blue-100 text-blue-700' : 'bg-white border-gray-200 text-gray-500 group-hover:text-gray-700 group-hover:border-gray-300'"
                                            >
                                                <UsersIcon class="size-5" />
                                            </span>

                                            <span class="truncate">Pacientes</span>
                                        </Link>
                                    </li>

                                    <li>
                                        <Link
                                            href="/finance"
                                            class="group relative flex items-center gap-3 rounded-lg px-3 py-1.5 text-sm font-medium transition-all"
                                            :class="isActivePath('/finance') ? 'bg-blue-50 text-blue-700 shadow-sm ring-1 ring-blue-100' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900'"
                                        >
                                            <span
                                                aria-hidden="true"
                                                class="absolute left-0 top-1/2 -translate-y-1/2 h-7 w-1 rounded-full transition"
                                                :class="isActivePath('/finance') ? 'bg-blue-600' : 'bg-transparent group-hover:bg-gray-200'"
                                            />

                                            <span
                                                aria-hidden="true"
                                                class="flex size-9 items-center justify-center rounded-xl border transition"
                                                :class="isActivePath('/finance') ? 'bg-white border-blue-100 text-blue-700' : 'bg-white border-gray-200 text-gray-500 group-hover:text-gray-700 group-hover:border-gray-300'"
                                            >
                                                <BanknotesIcon class="size-5" />
                                            </span>

                                            <span class="truncate">Financeiro</span>
                                        </Link>
                                    </li>
                                </ul>
                            </nav>

                            <button type="button" class="mx-3 font-semibold py-3 bg-gradient-to-br from-blue-600 to-blue-500 text-white rounded-xl shadow hover:bg-blue-700 transition">
                                Agendar atendimento
                            </button>
                        </div>
                    </DialogPanel>
                </TransitionChild>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
