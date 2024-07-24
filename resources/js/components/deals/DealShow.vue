<template>
  <div class="page_title text-xl mb-4">Edit deal</div>
     <form class="space-y-6" v-on:submit.prevent="saveDeal">

        <div class="space-y-4 rounded-md shadow-sm">

            <div class="mt-4">
                <label for="deal_title" class="block text-sm font-medium text-gray-700">Title</label>
                <div class="mt-1">
                    <input type="text" name="title" id="deal_title"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="deal.title">
                </div>
            </div>
        </div>

        <div class="space-y-4 rounded-md shadow-sm">

            <div class="mt-4">
                <label for="deal_type" class="block text-sm font-medium text-gray-700">Type</label>
                <div class="mt-1">
                    <input type="text" name="type" id="deal_type"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="deal.type">
                </div>
            </div>
        </div>

        <div class="mt-4">
            <label for="code" class="block text-sm font-medium text-gray-700">Is active</label>
            <div class="mt-1">
                <select class="short_select_widget px-4 py-3 rounded-full" name="is_active" v-model="deal.is_active">
                    <option value="1">-- Yes --</option>
                    <option value="0">-- No --</option>
                </select>
            </div>
        </div>

        <div class="space-y-4 rounded-md shadow-sm">
            <div class="mt-4">
                <label for="deal_active_from" class="block text-sm font-medium text-gray-700">Active from</label>
                <div class="mt-1">
                    <input type="text" name="active_from" id="deal_active_from"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="deal.active_from">
                </div>
            </div>
        </div>
        <div class="space-y-4 rounded-md shadow-sm">

            <div class="mt-4">
                <label for="active_to" class="block text-sm font-medium text-gray-700">Active to</label>
                <div class="mt-1">
                    <input type="text" name="active_to" id="active_to"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="deal.active_to">
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
                class="btn btn_gray inline-flex items-center px-4 py-2 text-xs font-semibold ml_2"
                :to="{ name: 'customers.show', params: { id: deal.customer_id } }">
                Cancel
            </router-link>
        </div>
    </form>


<br>





</template>

<script setup>

    import useDeals     from '@/composables/deals'
    import { onMounted } from 'vue';

    const { deal, showDeal, updateDeal } = useDeals();

    const props = defineProps({
        id: {
            required: true,
            type: String
        }
    })

    const saveDeal = async () => {

        await updateDeal(props.id);

    }

    onMounted(
        () => showDeal(props.id)
    );

</script>
