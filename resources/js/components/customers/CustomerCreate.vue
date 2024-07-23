<template>
    <div class="page_title text-xl mb-4">Create customer</div>
    <form class="space-y-6" v-on:submit.prevent="saveCustomer">
        <div class="space-y-4 rounded-md shadow-sm">
             <!-- common customer data  -->
            <div>
                <div class="mt-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="form.name">
                    </div>
                </div>

                <div  class="mt-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                        <input type="text" name="email" id="email"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="form.email">
                    </div>
                </div>


                <div class="mt-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Fhone</label>
                    <div class="mt-1">
                        <input type="text" name="phone" id="phone"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="form.phone">
                    </div>
                </div>
                <div class="mt-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <div class="mt-1">
                        <input type="text" name="address" id="address"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="form.address">
                    </div>
                </div>
                <div class="mt-4">
                    <label for="code" class="block text-sm font-medium text-gray-700">Status</label>
                    <div class="mt-1">
                        <select class="short_select_widget px-4 py-3 rounded-full" name="is_legal" v-model="form.is_legal" style="width: 10rem !important;">
                            <option value="0">-- Person --</option>
                            <option value="1">-- Legal person --</option>
                        </select>
                    </div>
                </div>
            </div>

             <!-- legal customer data   -->
            <div v-if="form.is_legal == 1">

                <div class="mt-4">
                    <label for="code" class="block text-sm font-medium text-gray-700">VAT code</label>
                    <div class="mt-1">
                        <input type="text" name="code" id="code"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="form.code">
                    </div>
                </div>

                <div class="mt-4">
                    <label for="contact_name" class="block text-sm font-medium text-gray-700">Contact</label>
                    <div class="mt-1">
                        <input type="text" name="contact_name" id="contact_name"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="form.contact_name">
                    </div>
                </div>

                <div class="mt-4">
                    <label for="contact_email" class="block text-sm font-medium text-gray-700">Contact email</label>
                    <div class="mt-1">
                        <input type="text" name="contact_email" id="contact_email"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="form.contact_email">
                    </div>
                </div>

                <div class="mt-4">
                    <label for="contact_phone" class="block text-sm font-medium text-gray-700">Contact phone</label>
                    <div class="mt-1">
                        <input type="text" name="contact_phone" id="contact_phone"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="form.contact_phone">
                    </div>
                </div>

            </div>
            <div  class="mt-4">
                <button
                    type="submit"
                    class="btn btn_green inline-flex items-center ml-1 px-4 py-2 text-xs font-semiboldtext-sm font-medium mt-4">
                    Save
                </button>
                <router-link
                    class="btn btn_gray ml-2 inline-flex items-center px-4 py-2 text-xs font-semibold"
                    :to="{ name: 'customers.index' }">
                    Cancel
                </router-link>
            </div>
        </div>
    </form>
</template>


<script setup>

import useCustomers from '../../composables/customers';

import {reactive} from 'vue';

const { storeCustomer, customer} = useCustomers();

const form = reactive({
    'name': '',
    'email': '',
    'phone': '',
    'address': '',
    'is_legal': '',
    'code': '',
    'contact_name': '',
    'contact_email': '',
    'contact_phone': '',
});

const saveCustomer = async () => {
    await storeCustomer({ ...form });

}
</script>
