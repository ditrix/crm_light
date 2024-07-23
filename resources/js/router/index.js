import { createRouter, createWebHistory } from 'vue-router'

/* импортируем все что будет роутиться? */
import CustomersIndex from '../components/customers/CustomersIndex.vue';
import CustomerShow from '../components/customers/CustomerShow.vue';
import CustomerCreate from '../components/customers/CustomerCreate.vue';

import DealsIndex from '../components/deals/DealsIndex.vue';
import DealShow from '../components/deals/DealShow.vue';
import DealCreate from '../components/deals/DealCreate.vue';


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

    {
        path: '/deals',
        name: 'deals.index',
        title: 'Customers',
        component: CustomersIndex
    },
    {
        path: '/deals/:id/show',
        name: 'deals.show',
        title: 'Deal',
        component: DealShow,
        props: true,
    },
    {
        path: '/deals/store',
        name: 'deals.store',
        title: 'Create deal',
        component: DealCreate
    },
    {
        path: '/deals/new/:customer_id',
        name: 'deals.new',
        props: true,
        component: DealCreate
    },

];


/* экспорт этих самых проутеров, которые выше? */
export default createRouter({
    history: createWebHistory(),
    routes
})

