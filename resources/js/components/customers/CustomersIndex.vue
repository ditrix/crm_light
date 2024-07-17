<template>
    Hello world
    <div>
        <div class="px-4 py-2 black bg-indigo-600 cursor-pointer hover:bg-indigo-700">
            <button class="text-sm font-medium">Create company</button>
        </div>
    </div>

    <div class="container mx-auto px-4">

        <table class="table-fixed">
                <thead>
                <tr>
                    <th class="text-sm text-gray-600">ID</th>
                    <th class="text-sm text-gray-600">name</th>
                    <th class="text-sm text-gray-600">email</th>
                </tr>
                </thead>
                <tbody>
                <template v-for="customer in customers" :key="customer.id">
                    <tr>
                        <td>{{ customer.id }}</td>
                        <td>{{ customer.name }}</td>
                        <td>{{ customer.email }}</td>
                    </tr>

                </template>
                </tbody>
        </table>
    </div>

</template>


<script setup>
import useCustomers from '@/composables/customers'
import { onMounted } from 'vue';

const { customers, getCustomers } = useCustomers()

onMounted(getCustomers)
</script>
