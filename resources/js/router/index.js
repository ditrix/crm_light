import { createRouter, createWebHistory } from 'vue-router'

/* импортируем все что будет роутиться? */
import CustomersIndex from '../components/customers/CustomersIndex.vue';
import CustomerShow from '../components/customers/CustomerShow.vue';
import CustomerCreate from '../components/customers/CustomerCreate.vue';


/* тут будут все роуты */
const routes = [
    {
        path: '/dashboard',
        name: 'customers.index',
        title: 'Customers',
        component: CustomersIndex
    },
    {
        path: '/customers/:id/show',
        name: 'customers.show',
        title: 'Customers',
        component: CustomerShow,
        props: true,
    },
    {
        path: '/customers/create',
        name: 'customers.store',
        title: 'Customers',
        component: CustomerCreate
    },

];


/* экспорт этих самых проутеров, которые выше? */
export default createRouter({
    history: createWebHistory(),
    routes
})

