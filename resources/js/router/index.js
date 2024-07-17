import { createRouter, createWebHistory } from 'vue-router'

/* импортируем все что будет роутиться? */
import CustomersIndex from '../components/customers/CustomersIndex.vue';


/* тут будут все роуты? */
const routes = [
    {
        path: '/dashboard',
        name: 'companies.index',
        component: CustomersIndex
    }
];


/* экспорт этих самых проутеров, которые выше? */
export default createRouter({
    history: createWebHistory(),
    routes
})

