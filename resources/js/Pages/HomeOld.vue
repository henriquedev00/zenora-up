<!--<script setup>-->
<!--const user = {-->
<!--    name: "João Silva",-->
<!--};-->

<!--const próximos = [-->
<!--    { id: 1, paciente: "Maria Oliveira", horário: "09:00", tipo: "Online" },-->
<!--    { id: 2, paciente: "Carlos Santos", horário: "11:30", tipo: "Presencial" },-->
<!--];-->
<!--</script>-->

<!--<template>-->
<!--    <div class="p-6 space-y-6">-->

<!--        &lt;!&ndash; Header &ndash;&gt;-->
<!--        <div class="flex justify-between items-center">-->
<!--            <h1 class="text-2xl font-bold text-gray-800">-->
<!--                Bem-vindo, {{ user.name }} 👋-->
<!--            </h1>-->
<!--        </div>-->

<!--        &lt;!&ndash; Cards de Acesso Rápido &ndash;&gt;-->
<!--        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">-->
<!--            <div class="p-5 bg-white shadow-md rounded-xl hover:shadow-lg transition cursor-pointer">-->
<!--                <h3 class="font-semibold text-gray-700">Agendar Consulta</h3>-->
<!--                <p class="text-gray-500 text-sm mt-1">Criar novo agendamento</p>-->
<!--            </div>-->

<!--            <div class="p-5 bg-white shadow-md rounded-xl hover:shadow-lg transition cursor-pointer">-->
<!--                <h3 class="font-semibold text-gray-700">Meus Pacientes</h3>-->
<!--                <p class="text-gray-500 text-sm mt-1">Acessar registros</p>-->
<!--            </div>-->

<!--            <div class="p-5 bg-white shadow-md rounded-xl hover:shadow-lg transition cursor-pointer">-->
<!--                <h3 class="font-semibold text-gray-700">Agenda Completa</h3>-->
<!--                <p class="text-gray-500 text-sm mt-1">Ver calendário</p>-->
<!--            </div>-->

<!--            <div class="p-5 bg-white shadow-md rounded-xl hover:shadow-lg transition cursor-pointer">-->
<!--                <h3 class="font-semibold text-gray-700">Financeiro</h3>-->
<!--                <p class="text-gray-500 text-sm mt-1">Relatórios e pagamentos</p>-->
<!--            </div>-->
<!--        </div>-->

<!--        &lt;!&ndash; Próximas consultas &ndash;&gt;-->
<!--        <div class="bg-white rounded-xl shadow-md p-6">-->
<!--            <h2 class="text-lg font-semibold text-gray-800">Próximas Consultas</h2>-->

<!--            <div v-if="próximos.length" class="mt-4 space-y-3">-->
<!--                <div v-for="item in próximos" :key="item.id" class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">-->
<!--                    <div>-->
<!--                        <p class="font-semibold">{{ item.paciente }}</p>-->
<!--                        <p class="text-sm text-gray-500">{{ item.tipo }}</p>-->
<!--                    </div>-->

<!--                    <span class="text-blue-600 font-bold">{{ item.horário }}</span>-->
<!--                </div>-->
<!--            </div>-->

<!--            <p v-else class="text-gray-500 text-sm mt-3">Nenhuma consulta para hoje.</p>-->
<!--        </div>-->

<!--    </div>-->
<!--</template>-->


<template>
    <div class="min-h-screen --bg-gray-50">
        <!-- Top header (fixed) -->
        <header class="fixed left-64 right-0 top-0 h-16 bg-white border-b z-30 flex items-center px-6">
            <div class="flex items-center gap-4 w-full">
                <!-- Search -->
<!--                <div class="flex items-center w-1/3">-->
<!--                    <div class="relative w-full">-->
<!--                        <input-->
<!--                            v-model="search"-->
<!--                            type="search"-->
<!--                            placeholder="Buscar paciente, consulta ou ação..."-->
<!--                            class="w-full pl-4 pr-10 py-2 rounded-lg border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"-->
<!--                        />-->
<!--                        <MagnifyingGlassIcon class="w-5 h-5 absolute right-3 top-1/2 -translate-y-1/2 text-gray-400" />-->
<!--                    </div>-->
<!--                </div>-->

                <div class="flex-1"></div>

                <div class="flex items-center gap-4">
                    <button class="relative p-2 rounded-lg hover:bg-gray-100">
                        <BellIcon class="w-6 h-6 text-gray-600" />
                        <span v-if="notifications > 0" class="absolute -top-1 -right-0.5 bg-red-500 text-white rounded-full text-xs px-1"> {{ notifications }} </span>
                    </button>

                    <div class="flex items-center gap-3">
                        <div class="text-right">
                            <div class="text-sm font-semibold text-gray-800">{{ user.name }}</div>
                            <div class="text-xs text-gray-500">{{ user.role }}</div>
                        </div>

                        <img :src="user.avatar" alt="avatar" class="w-10 h-10 rounded-full border" />
                    </div>
                </div>
            </div>
        </header>

        <!-- Sidebar (fixed, white) -->
        <aside
            :class="['fixed left-0 top-0 bottom-0 w-64 border-r bg-white z-40 transition-transform', { '-translate-x-64': !sidebarOpen }]"
            aria-label="Sidebar"
        >
            <div class="h-16 flex items-center px-6 border-b">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500 to-blue-400 flex items-center justify-center text-white font-bold">ZU</div>
                    <div>
                        <div class="font-semibold text-lg text-gray-800">Zenora Up</div>
                        <div class="text-xs text-gray-500">Painel</div>
                    </div>
                </div>

                <!-- collapse control (mobile / small screens) -->
                <button @click="toggleSidebar" class="ml-auto p-2 rounded-md hover:bg-gray-100 hidden md:inline-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM4 14a1 1 0 100 2h12a1 1 0 100-2H4z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <nav class="px-2 py-4 space-y-1">
                <SidebarItem icon="home" label="Visão Geral" :active="active === 'overview'" @click="active='overview'" />
                <SidebarItem icon="calendar" label="Agenda" :active="active === 'agenda'" @click="active='agenda'" />
                <SidebarItem icon="users" label="Pacientes" :active="active === 'patients'" @click="active='patients'" />
                <SidebarItem icon="credit" label="Financeiro" :active="active === 'finance'" @click="active='finance'" />
                <SidebarItem icon="settings" label="Configurações" :active="active === 'settings'" @click="active='settings'" />
            </nav>

            <div class="absolute bottom-6 left-6 right-6">
                <button class="w-full flex items-center gap-3 px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                    <PlusIcon class="w-5 h-5" /> <span class="font-medium">Novo agendamento</span>
                </button>
            </div>
        </aside>

        <!-- Main content area -->
        <main :class="['pt-20 pl-72 pr-6 pb-8 transition-all', { 'pl-16': !sidebarOpen && isSmall }]">
            <div class="max-w-7xl mx-auto space-y-6">
                <!-- Greeting + quick KPIs -->
                <section class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="lg:col-span-2">
                        <h2 class="text-2xl font-bold text-gray-800">Olá, {{ user.name }} 👋</h2>
                        <p class="text-sm text-gray-500 mt-1">Visão geral rápida do seu dia e métricas importantes.</p>
                    </div>

                    <div class="flex items-center gap-4">
                        <!-- small KPI cards -->
                        <div class="flex-1 grid grid-cols-3 gap-3 w-full">
                            <div class="p-4 bg-white rounded-xl shadow-sm">
                                <div class="text-xs text-gray-500">Consultas hoje</div>
                                <div class="text-xl font-semibold text-gray-800">{{ kpis.todayAppointments }}</div>
                            </div>

                            <div class="p-4 bg-white rounded-xl shadow-sm">
                                <div class="text-xs text-gray-500">Receita (mês)</div>
                                <div class="text-xl font-semibold text-gray-800">R$ {{ kpis.monthRevenue }}</div>
                            </div>

                            <div class="p-4 bg-white rounded-xl shadow-sm">
                                <div class="text-xs text-gray-500">Taxa de comparecimento</div>
                                <div class="text-xl font-semibold text-gray-800">{{ kpis.attendanceRate }}%</div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Quick actions -->
                <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="p-6 bg-white rounded-2xl shadow-md">
                        <h3 class="font-semibold text-gray-800">Ações rápidas</h3>
                        <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <button class="flex items-center gap-3 p-3 rounded-lg border hover:shadow-sm">
                                <svg class="w-5 h-5 text-blue-600" viewBox="0 0 24 24" fill="none"><path d="M12 4v16M4 12h16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                <div class="text-left">
                                    <div class="text-sm font-medium">Agendar</div>
                                    <div class="text-xs text-gray-500">Criar nova consulta</div>
                                </div>
                            </button>

                            <button class="flex items-center gap-3 p-3 rounded-lg border hover:shadow-sm">
                                <UsersIcon class="w-5 h-5 text-green-500" />
                                <div class="text-left">
                                    <div class="text-sm font-medium">Pacientes</div>
                                    <div class="text-xs text-gray-500">Ver lista</div>
                                </div>
                            </button>

                            <button class="flex items-center gap-3 p-3 rounded-lg border hover:shadow-sm">
                                <CalendarIcon class="w-5 h-5 text-indigo-500" />
                                <div class="text-left">
                                    <div class="text-sm font-medium">Calendário</div>
                                    <div class="text-xs text-gray-500">Abrir agenda</div>
                                </div>
                            </button>

                            <button class="flex items-center gap-3 p-3 rounded-lg border hover:shadow-sm">
                                <CreditCardIcon class="w-5 h-5 text-yellow-500" />
                                <div class="text-left">
                                    <div class="text-sm font-medium">Financeiro</div>
                                    <div class="text-xs text-gray-500">Cobranças</div>
                                </div>
                            </button>
                        </div>
                    </div>

                    <!-- Upcoming appointments -->
                    <div class="p-6 bg-white rounded-2xl shadow-md md:col-span-2">
                        <div class="flex justify-between items-center">
                            <h3 class="font-semibold text-gray-800">Próximas Consultas</h3>
                            <a href="#" class="text-sm text-blue-600 hover:underline">Ver todas</a>
                        </div>

                        <div class="mt-4 space-y-3">
                            <div v-for="appt in upcoming" :key="appt.id" class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-blue-400 to-blue-600 text-white flex items-center justify-center font-semibold">
                                        {{ initials(appt.patient) }}
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-800">{{ appt.patient }}</div>
                                        <div class="text-xs text-gray-500">{{ appt.reason }} · {{ appt.mode }}</div>
                                    </div>
                                </div>

                                <div class="flex items-center gap-4">
                                    <div class="text-sm font-semibold text-gray-700">{{ appt.time }}</div>
                                    <div class="flex items-center gap-2">
                                        <button class="px-3 py-1 text-sm rounded-lg border hover:bg-gray-100">Detalhes</button>
                                        <button class="px-3 py-1 text-sm rounded-lg bg-blue-600 text-white hover:bg-blue-700">Iniciar</button>
                                    </div>
                                </div>
                            </div>

                            <div v-if="upcoming.length === 0" class="text-gray-500 text-sm">Nenhuma consulta marcada para os próximos horários.</div>
                        </div>
                    </div>
                </section>

                <!-- Larger KPI/Tables Row -->
                <section class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="bg-white rounded-2xl shadow-md p-6 lg:col-span-2">
                        <h3 class="font-semibold text-gray-800">Visão Financeira</h3>
                        <p class="text-xs text-gray-500 mt-1">Resumo do mês e valores pendentes</p>

                        <!-- placeholder grafico -->
                        <div class="mt-6 h-40 rounded-lg bg-gradient-to-r from-white to-gray-50 border border-dashed border-gray-200 flex items-center justify-center text-gray-400">
                            Gráfico (placeholder)
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-md p-6">
                        <h3 class="font-semibold text-gray-800">Mensagens & Avisos</h3>
                        <ul class="mt-4 space-y-3 text-sm text-gray-600">
                            <li v-for="(msg, idx) in messages" :key="idx" class="p-3 bg-gray-50 rounded-lg">
                                <div class="font-medium text-gray-800">{{ msg.title }}</div>
                                <div class="text-xs text-gray-500 mt-1">{{ msg.time }}</div>
                            </li>
                            <li v-if="messages.length === 0" class="text-gray-500">Sem novas mensagens.</li>
                        </ul>
                    </div>
                </section>
            </div>
        </main>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';

/* Heroicons */
import { MagnifyingGlassIcon, BellIcon, PlusIcon, UsersIcon, CalendarIcon, CreditCardIcon } from '@heroicons/vue/24/outline';

/* Local component for sidebar item inline to keep single-file structure */
const SidebarItem = {
    props: ['icon', 'label', 'active'],
    emits: ['click'],
    template: `
    <button @click="$emit('click')" :class="['w-full flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 transition', active ? 'bg-blue-50 border-l-4 border-blue-500' : '']">
      <span v-if="icon === 'home'">
        <svg class="w-5 h-5 text-gray-600" viewBox="0 0 24 24" fill="none"><path d="M3 10.5L12 4l9 6.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </span>
      <span v-else-if="icon === 'calendar'">
        <CalendarIcon class="w-5 h-5 text-gray-600" />
      </span>
      <span v-else-if="icon === 'users'">
        <UsersIcon class="w-5 h-5 text-gray-600" />
      </span>
      <span v-else-if="icon === 'credit'">
        <CreditCardIcon class="w-5 h-5 text-gray-600" />
      </span>
      <span v-else-if="icon === 'settings'">
        <svg class="w-5 h-5 text-gray-600" viewBox="0 0 24 24" fill="none"><path d="M12 8.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </span>
      <span class="text-sm font-medium text-gray-700">{{ label }}</span>
    </button>
  `
};

/* sidebar state */
const sidebarOpen = ref(true);
const search = ref('');
const active = ref('overview');
const notifications = ref(2);

/* sample user */
const user = {
    name: 'Dra. Marina Costa',
    role: 'Cardiologista',
    avatar: 'https://i.pravatar.cc/100?img=12'
};

/* KPIs */
const kpis = {
    todayAppointments: 5,
    monthRevenue: '12.340,00',
    attendanceRate: 92
};

/* upcoming appointments sample */
const upcoming = ref([
    { id: 1, patient: 'Maria Oliveira', reason: 'Retorno', mode: 'Online', time: '09:00' },
    { id: 2, patient: 'Carlos Santos', reason: 'Avaliação', mode: 'Presencial', time: '11:30' },
    { id: 3, patient: 'Patrícia Gomes', reason: 'Primeira consulta', mode: 'Online', time: '14:00' },
]);

/* messages */
const messages = ref([
    { title: 'Pagamento pendente - João', time: '2 horas atrás' },
    { title: 'Novo paciente cadastrado', time: 'Ontem' },
]);

/* small screen detection to adjust padding when sidebar hidden */
const isSmall = ref(false);

onMounted(() => {
    const check = () => (isSmall.value = window.innerWidth < 1024);
    check();
    window.addEventListener('resize', check);
});

/* helpers */
function toggleSidebar() {
    sidebarOpen.value = !sidebarOpen.value;
}

function initials(name) {
    return name.split(' ').map(n => n[0]).slice(0,2).join('').toUpperCase();
}
</script>

<style scoped>
/* ensure header & sidebar z stacking works nicely on small screens */
@media (max-width: 1024px) {
    header { left: 0 !important; right: 0 !important; }
    aside { transform: translateX(-100%); }
}
</style>
