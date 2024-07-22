<template>
    <div class="page_title text-xl mb-4">Edit customer</div>
     <form class="space-y-6" v-on:submit.prevent="saveCustomer">
        <div class="space-y-4 rounded-md shadow-sm">
            <!-- common customer data  -->
            <div>
                <div class="inline-block">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="customer.name">
                    </div>
                </div>

                <div class="mt-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                        <input type="text" name="email" id="email"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="customer.email">
                    </div>
                </div>
                <div class="mt-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <div class="mt-1">
                        <input type="text" name="phone" id="phone"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="customer.phone">
                    </div>
                </div>
                <div class="mt-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <div class="mt-1">
                        <input type="text" name="address" id="address"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="customer.address">
                    </div>
                </div>
                <div class="mt-4">
                    <label for="code" class="block text-sm font-medium text-gray-700">Status</label>
                    <div class="mt-1">
                        <select class="short_select_widget px-4 py-3 rounded-full" name="is_legal" v-model="customer.is_legal">
                            <option value="0">-- Person --</option>
                            <option value="1">-- Legal person --</option>
                        </select>
                    </div>
                </div>
                <hr>
            </div>
            <!-- legal customer data  -->
            <div v-if="customer.is_legal == 1">
                <div class="mt-4">
                    <label for="code" class="block text-sm font-medium text-gray-700">VAT code</label>
                    <div class="mt-1">
                        <input type="text" name="code" id="code"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="customer.code">
                    </div>
                </div>

                <div class="mt-4">
                    <label for="contact_name" class="block text-sm font-medium text-gray-700">Contact</label>
                    <div class="mt-1">
                        <input type="text" name="contact_name" id="contact_name"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="customer.contact_name">
                    </div>
                </div>

                <div class="mt-4">
                    <label for="contact_email" class="block text-sm font-medium text-gray-700">Contact email</label>
                    <div class="mt-1">
                        <input type="text" name="contact_email" id="contact_email"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="customer.contact_email">
                    </div>
                </div>

                <div class="mt-4">
                    <label for="contact_phone" class="block text-sm font-medium text-gray-700">Contact phone</label>
                    <div class="mt-1">
                        <input type="text" name="contact_phone" id="contact_phone"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="customer.contact_phone">
                    </div>
                </div>

            </div>
        <div  class="mt-4">
            <button
                type="submit"
                class="btn btn_green inline-flex items-center ml-1 px-6 py-2 text-xs font-semiboldtext-sm font-medium mt-4">
                Save
            </button>
            <router-link
                class="btn btn_gray ml-2 inline-flex items-center px-6 py-2 text-xs font-semibold"
                :to="{ name: 'customers.index' }">
                Cancel
            </router-link>
        </div>
</div>
</form>
<hr>

<div class="mt-6 px-6 py-6" style="border: 1px lightgray solid; border-radius: 5px;">

    <div class="">Deals</div>


    <table class="min-w-full  border divide-y divide-gray-300 grid_table">
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
                    TYPE
                    </span>
                </th>
                <th class="text-sm text-gray-600 py-2">
                    <span
                    class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                    TITLE
                    </span>
                </th>
                <th class="text-sm text-gray-600">
                    <span
                    class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                    ACTIVE
                    </span>
                </th>
                <th class="text-sm text-gray-600 py-2">
                    <span
                    class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                    DATE FROM
                    </span>
                </th>
                <th class="text-sm text-gray-600">
                    <span
                    class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                    DATE TO
                    </span>
                </th>
                <th class="text-sm text-gray-600 py-2">
                    <span
                    class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                    UPDATED AT
                    </span>
                </th>
                <th class="text-sm text-gray-600">
                    <span
                    class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                    CREATED AT
                    </span>
                </th>
                <th class="text-sm text-gray-600">
                    <span
                    class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                    ACTION
                    </span>
                </th>
            </tr>
        </thead>
    <template v-for="deal in customer.deals">
    <tr class="bg-white greed_tr tr-data">
        <td class="px-6 py-1 leading-5 ">{{ deal.id }}</td>
        <td class="px-6 py-1 leading-5 ">{{ deal.type }}</td>
        <td class="px-6 py-1 leading-5 ">{{ deal.title }}</td>
        <td class="px-6 py-1 leading-5 ">{{ deal.is_active }}</td>
        <td class="px-6 py-1 leading-5 ">{{ deal.active_from }}</td>
        <td class="px-6 py-1 leading-5 ">{{ deal.active_to }}</td>
        <td class="px-6 py-1 leading-5 ">{{ formatDate(deal.updated_at) }}</td>
        <td class="px-6 py-1 leading-5 ">{{ formatDate(deal.created_at) }}</td>
        <td class="px-6 py-1 leading-5 ">
            <router-link
                class="btn btn_gray inline-flex items-center px-4 py-2 text-xs font-semibold"
                :to="{ name: 'deals.show', params: { id: deal.id} }">
                Edit
            </router-link>
            <button
                class="btn btn_red inline-flex items-center ml-1 px-4 py-2 text-xs font-semiboldtext-sm font-medium"
                @click="deleteDeal(deal.id)" >
                X
            </button>
        </td>
    </tr>
    </template>
    </table>
</div>


</template>

<script setup>
import useCustomers from '@/composables/customers'
import useDeals     from '@/composables/deals'
import { onMounted } from 'vue';
import { formatDate } from '@/helpers/date'

const { errors, customer, showCustomer, updateCustomer } = useCustomers();
const { showDeal, destroyDeal } = useDeals();

const props = defineProps({
    id: {
        required: true,
        type: String
    }
})



const saveCustomer = async () => {

    await updateCustomer(props.id);

}

const deleteDeal = async (id) => {
    if (!window.confirm('You sure?')) {
        return
    }
    destroyDeal(id);
    showCustomer(props.id);
}

onMounted(
    () => showCustomer(props.id)
);



</script>
