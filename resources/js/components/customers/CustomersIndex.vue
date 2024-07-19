<template>
    <h3>{{title}}</h3>

    <div class="min-w-full overflow-hidden overflow-x-auto align-middle sm:rounded-md">
        <div class="d-flex mb-4 px-5 mr-1 justify_content_right">
            <router-link
                class="btn btn_blue inline-flex items-center px-4 py-2 mr-5 text-xs font-semibold"
                :to="{ name: 'customers.store' }" >
                    Create
            </router-link>
        </div>

        <table class="min-w-full  border divide-y divide-gray-300">
            <thead class="greed_thead">
            <tr>
                <th class="text-sm text-gray-600 py-2">
                    <span
                    class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                    ID
                    </span>
                </th>
                <th class="text-sm text-gray-600">
                    <span
                    class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                    name
                    </span>
                </th>
                <th class="text-sm text-gray-600">
                    <span
                    class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                    email
                    </span>
                </th>
                <th class="text-sm text-gray-600">
                    <span
                    class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                    phone
                    </span>
                </th>
                <th class="text-sm text-gray-600">
                    <span
                    class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                    updated
                    </span>
                </th>
                <th class="text-sm text-gray-600">
                    <span
                    class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                    created
                    </span>
                </th>
                <th class="text-sm text-gray-600">
                    <span
                    class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                    actions
                    </span>
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <template v-for="customer in customers" :key="customer.id">
                <tr class="bg-white greed_tr">
                    <td class="px-6 py-1 text-sm leading-5 text-gray-900 whitespace-no-wrap">{{ customer.id }}</td>
                    <td class="px-6 py-1 text-sm leading-5 text-gray-900 whitespace-no-wrap">{{ customer.name }}</td>
                    <td class="px-6 py-1 text-sm leading-5 text-gray-900 whitespace-no-wrap">{{ customer.email }}</td>
                    <td class="px-6 py-1 text-sm leading-5 text-gray-900 whitespace-no-wrap">{{ customer.phone }}</td>
                    <td class="px-6 py-1 text-sm leading-5 text-gray-900 whitespace-no-wrap">{{ formatDate(customer.updated_at) }}</td>
                    <td class="px-6 py-1 text-sm leading-5 text-gray-900 whitespace-no-wrap">{{ formatDate(customer.created_at) }}</td>
                    <td class="px-6 py-1 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        <router-link
                            class="btn btn_gray inline-flex items-center px-4 py-2 text-xs font-semibold"
                            :to="{ name: 'customers.show', params: { id: customer.id } }">
                            Edit
                        </router-link>
                        <button
                            class="btn btn_red inline-flex items-center ml-1 px-4 py-2 text-xs font-semiboldtext-sm font-medium"
                            @click="deleteCustomer(customer.id)" >
                            X
                        </button>
                    </td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>

</template>


<script setup>
import useCustomers from '@/composables/customers'
import { onMounted } from 'vue';
import { formatDate} from '@/helpers/date'


const { customers, getCustomers, destroyCustomer } = useCustomers()

const deleteCustomer = async (id) => {

    if (!window.confirm('You sure?')) {
        return
    }

    await destroyCustomer(id);
    await getCustomers();
}

onMounted(getCustomers)

</script>
