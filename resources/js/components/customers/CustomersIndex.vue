<template>
    <!-- <h3>Customers</h3>
    <div>
        <div class="inline-flex items-center px-4 py-2 text-xs font-semibold text-white  bg-gray-800">
            <button class="text-sm font-medium">Create customer</button>
        </div>
    </div> -->

    <div class="min-w-full overflow-hidden overflow-x-auto align-middle sm:rounded-md">

        <table class="min-w-full  border divide-y divide-gray-300">
                <thead class="greed_thead">
                <tr>
                    <th class="text-sm text-gray-600">
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
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">{{ customer.id }}</td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">{{ customer.name }}</td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">{{ customer.email }}</td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">{{ customer.phone }}</td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">{{ formatDate(customer.updated_at) }}</td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">{{ formatDate(customer.created_at) }}</td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            <!-- TODO delete customer -->
                        <div class="btn btn_green inline-flex items-center px-4 py-2 text-xs font-semibold">
                            <button class="text-sm font-medium">Edit</button>
                        </div>
                        <div class="btn btn_red inline-flex items-center ml-3 px-4 py-2 text-xs font-semibold">
                            <button class="text-sm font-medium">Delete</button>
                        </div>
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
import {formatDate} from '@/helpers/date'


const { customers, getCustomers } = useCustomers()

onMounted(getCustomers)

</script>
